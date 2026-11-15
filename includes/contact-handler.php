<?php
/**
 * Contact form processing. Require this before any output; it sets $form:
 *   'enabled' whether the form is switched on and has a valid recipient
 *   'values'  submitted values, kept when validation fails
 *   'errors'  field name => message
 *   'status'  '', 'sent', 'invalid' or 'failed'
 *   'token'   CSRF token for the form
 *
 * Messages are emailed to $site['email'] with PHP's mail() and are not stored.
 *
 * Abuse controls, in the order they are checked: CSRF token, hidden trap field,
 * minimum fill time, one message a minute per browser session, and a site-wide
 * hourly cap. The session checks stop casual abuse only (a script can start a
 * new session each time); the hourly cap is what bounds the volume of mail.
 * For stronger protection add rate limiting at the web server or host.
 */
require_once __DIR__ . '/config.php';

const CONTACT_MIN_SECONDS  = 3;   // a form filled faster than this is treated as automated
const CONTACT_WAIT_SECONDS = 60;  // minimum gap between two messages from one session
const CONTACT_HOURLY_CAP   = 20;  // messages accepted per hour across all visitors

/**
 * Site-wide hourly cap. Keeps only the times of recent messages (no personal
 * data) in a file in the system temporary directory. Returns false when the
 * cap is reached or the file cannot be used, so the form fails closed.
 */
function contact_within_hourly_cap(bool $record): bool
{
    $file   = sys_get_temp_dir() . '/contact-' . substr(hash('sha256', __DIR__), 0, 16) . '.log';
    $handle = @fopen($file, 'c+');
    if (!$handle || !flock($handle, LOCK_EX)) {
        error_log('Contact form: cannot use the rate-limit file in ' . sys_get_temp_dir());
        return false;
    }
    $recent = array_filter(
        array_map('intval', explode("\n", (string) stream_get_contents($handle))),
        fn ($time) => $time > time() - 3600
    );
    $allowed = count($recent) < CONTACT_HOURLY_CAP;
    if ($allowed && $record) {
        $recent[] = time();
    }
    ftruncate($handle, 0);
    rewind($handle);
    fwrite($handle, implode("\n", $recent));
    flock($handle, LOCK_UN);
    fclose($handle);
    return $allowed;
}

$form = [
    'enabled' => contact_form_enabled(),
    'values'  => ['name' => '', 'email' => '', 'subject' => '', 'message' => ''],
    'errors'  => [],
    'status'  => '',
    'token'   => '',
];

if (!in_array($_SERVER['REQUEST_METHOD'] ?? 'GET', ['GET', 'HEAD', 'POST'], true)) {
    http_response_code(405);
    header('Allow: GET, HEAD, POST');
    exit;
}

if (!$form['enabled']) {
    return;
}

// The cookie is marked Secure whenever the site is configured or served over HTTPS.
session_start([
    'name'             => 'contact_session',
    'cookie_httponly'  => true,
    'cookie_samesite'  => 'Lax',
    'cookie_secure'    => strpos(site_base(), 'https://') === 0 || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
    'use_strict_mode'  => true,
    'use_only_cookies' => true,
]);

if (empty($_SESSION['contact_token'])) {
    $_SESSION['contact_token'] = bin2hex(random_bytes(32));
}
$form['token'] = $_SESSION['contact_token'];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    if (!empty($_SESSION['contact_sent'])) {
        unset($_SESSION['contact_sent']);
        $form['status'] = 'sent';
    }
    $_SESSION['contact_shown'] = time();
    return;
}

foreach ($form['values'] as $field => $unused) {
    $value = $_POST[$field] ?? '';
    $form['values'][$field] = is_string($value) ? trim($value) : '';
}
$values = $form['values'];

// Requests that fail these checks get a general message, never a confirmation.
$token_ok  = is_string($_POST['token'] ?? null) && hash_equals($_SESSION['contact_token'], $_POST['token']);
$honeypot  = is_string($_POST['website'] ?? '') ? trim($_POST['website'] ?? '') : 'x';
$shown     = (int) ($_SESSION['contact_shown'] ?? 0);
$last_sent = (int) ($_SESSION['contact_last_sent'] ?? 0);

if (!$token_ok) {
    $form['status'] = 'failed';
    $form['errors']['form'] = 'Your session has expired. Please check your message and send it again.';
    http_response_code(403);
} elseif ($honeypot !== '' || $shown === 0 || time() - $shown < CONTACT_MIN_SECONDS) {
    $form['status'] = 'failed';
    $form['errors']['form'] = 'Your message could not be sent. Please wait a few seconds and try again.';
    http_response_code(400);
} elseif (time() - $last_sent < CONTACT_WAIT_SECONDS) {
    $form['status'] = 'failed';
    $form['errors']['form'] = 'A message was sent from this browser a moment ago. Please wait a minute before sending another.';
    http_response_code(429);
}

if ($form['status'] === 'failed') {
    $_SESSION['contact_shown'] = time() - CONTACT_MIN_SECONDS;
    return;
}

$length = fn (string $text): int => function_exists('mb_strlen') ? mb_strlen($text) : strlen($text);
// One-line fields must not contain line breaks or other control characters,
// which also keeps them from adding mail headers.
$single_line = fn (string $text): bool => !preg_match('/[\x00-\x1F\x7F]/', $text);

if ($values['name'] === '') {
    $form['errors']['name'] = 'Enter your name.';
} elseif ($length($values['name']) > 100 || !$single_line($values['name'])) {
    $form['errors']['name'] = 'Enter a name of up to 100 characters on one line.';
}

if ($values['email'] === '') {
    $form['errors']['email'] = 'Enter your email address.';
} elseif ($length($values['email']) > 254 || !$single_line($values['email']) || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
    $form['errors']['email'] = 'Enter an email address in the format name@example.com.';
}

if ($values['subject'] === '') {
    $form['errors']['subject'] = 'Enter a subject.';
} elseif ($length($values['subject']) > 150 || !$single_line($values['subject'])) {
    $form['errors']['subject'] = 'Enter a subject of up to 150 characters on one line.';
}

if ($values['message'] === '') {
    $form['errors']['message'] = 'Enter your message.';
} elseif ($length($values['message']) < 10) {
    $form['errors']['message'] = 'Enter a message of at least 10 characters.';
} elseif ($length($values['message']) > 5000) {
    $form['errors']['message'] = 'Enter a message of up to 5,000 characters.';
}

if (preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', $values['message'])) {
    $form['errors']['message'] = 'Remove unusual control characters from your message.';
}

if ($form['errors']) {
    $form['status'] = 'invalid';
    $_SESSION['contact_shown'] = time() - CONTACT_MIN_SECONDS;
    http_response_code(422);
    return;
}

if (!contact_within_hourly_cap(false)) {
    $form['status'] = 'failed';
    $form['errors']['form'] = 'The form cannot accept more messages at the moment. Please try again later.';
    $_SESSION['contact_shown'] = time() - CONTACT_MIN_SECONDS;
    http_response_code(429);
    return;
}

$encode = fn (string $text): string => '=?UTF-8?B?' . base64_encode($text) . '?=';

$body = "Name: {$values['name']}\n"
      . "Email: {$values['email']}\n"
      . "Subject: {$values['subject']}\n\n"
      . str_replace(["\r\n", "\r"], "\n", $values['message']) . "\n";

$headers = [
    'From'         => $encode($site['name'] . ' website') . ' <' . $site['email'] . '>',
    'Reply-To'     => $values['email'],
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/plain; charset=UTF-8',
];

$delivered = @mail($site['email'], $encode('[Website] ' . $values['subject']), $body, $headers);

if (!$delivered) {
    error_log('Contact form: mail() did not accept the message');
    $form['status'] = 'failed';
    $form['errors']['form'] = 'Your message could not be sent. Please try again later.';
    $_SESSION['contact_shown'] = time() - CONTACT_MIN_SECONDS;
    http_response_code(500);
    return;
}

contact_within_hourly_cap(true);

// Confirm on a fresh page so that reloading does not send the message twice.
$_SESSION['contact_token']     = bin2hex(random_bytes(32));
$_SESSION['contact_last_sent'] = time();
$_SESSION['contact_sent']      = true;
header('Location: ' . page_url('contact') . '#contact-form', true, 303);
exit;
