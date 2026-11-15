<?php
/**
 * Site configuration, navigation data and small helpers.
 * Included once at the top of every page.
 */

$site = [
    'name'        => 'Daksh Jain',
    'tagline'     => 'Law · Policy · Research',
    'description' => 'Daksh Jain is a legal professional, public policy researcher, social worker and writer working across law, parliamentary affairs, governance and social development.',

    // Production URL without a trailing slash, e.g. https://www.example.com
    // Set it here or through the SITE_URL environment variable.
    // While empty, canonical, Open Graph and sitemap URLs are produced only on a
    // local development host; a public host name is never taken from the request.
    'url'         => getenv('SITE_URL') ?: '',

    'locale'      => 'en_IN',
    'og_image'    => 'assets/images/og-default.png',
    'og_image_alt' => 'Daksh Jain — Law · Policy · Research',

    // Placeholder typographic monogram; replace with real branding when supplied (null disables it).
    'favicon'     => 'assets/images/favicon.svg',

    // Verified contact details and profiles only. Leave empty until supplied.
    // The email address is shown on the Contact page and in the footer. It can
    // also be set through the CONTACT_EMAIL environment variable.
    'email'       => getenv('CONTACT_EMAIL') ?: '',
    'social'      => [], // ['LinkedIn' => 'https://…']

    // Switch the contact form on only after mail delivery from the server to the
    // address above has been tested (or set the CONTACT_FORM=1 environment variable).
    'contact_form' => getenv('CONTACT_FORM') === '1',
];

// Ignore configuration values that are not usable rather than publish them.
if (!preg_match('#^https?://[a-z0-9.-]+(:\d+)?(/[^\s?\#]*)?$#i', $site['url'])) {
    $site['url'] = '';
}
if (!filter_var($site['email'], FILTER_VALIDATE_EMAIL)) {
    $site['email'] = '';
}
$site['social'] = array_filter($site['social'], fn ($url) => is_string($url) && preg_match('#^https://#i', $url));

const SITE_ROOT = __DIR__ . '/..';

// Never show PHP errors to visitors on a public host; they go to the server's error log.
if (!is_local_host()) {
    ini_set('display_errors', '0');
}

if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header_remove('X-Powered-By');
}

/**
 * Every page of the site. Pages flagged 'planned' still render the temporary
 * template in includes/coming-soon.php; remove the flag when a page is built.
 */
$pages = [
    'home'              => ['label' => 'Home',                    'file' => 'index.php'],
    'about'             => ['label' => 'About Daksh Jain',        'file' => 'about.php',                 'short' => 'About'],
    'public-service'    => ['label' => 'Public Service',          'file' => 'public-service.php'],
    'policy-research'   => ['label' => 'Policy & Research',       'file' => 'policy-research.php'],
    'parliament'        => ['label' => 'Parliament & Governance', 'file' => 'parliament-governance.php'],
    'articles'          => ['label' => 'Articles & Opinions',     'file' => 'articles.php'],
    'speeches'          => ['label' => 'Speeches',                'file' => 'speeches.php'],
    'social'            => ['label' => 'Social Initiatives',      'file' => 'social-initiatives.php'],
    'media'             => ['label' => 'Media',                   'file' => 'media.php'],
    'projects'          => ['label' => 'Projects',                'file' => 'projects.php'],
    'contact'           => ['label' => 'Contact',                 'file' => 'contact.php'],
];

/**
 * Desktop navigation. A string is a single link (page key);
 * an array is a labelled dropdown group of page keys.
 */
$nav = [
    'home',
    'about',
    ['label' => 'Public Life',        'items' => ['public-service', 'parliament', 'social']],
    ['label' => 'Research & Writing', 'items' => ['policy-research', 'articles', 'speeches']],
    ['label' => 'Media & Projects',   'items' => ['media', 'projects']],
];

/** Escape a value for HTML output. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Relative link to a page by its key in $pages. */
function page_url(string $key): string
{
    global $pages;
    return $pages[$key]['file'] === 'index.php' ? './' : $pages[$key]['file'];
}

/** Records for a listing page, from content/<name>.php. */
function load_content(string $name): array
{
    return require __DIR__ . '/../content/' . $name . '.php';
}

/**
 * Link and cover image of a content record: [url, is_external, thumb].
 * The url accepts web addresses and local paths only; the thumb must be a
 * .jpg under assets/images/. Either is '' when missing or not acceptable.
 */
function entry_media(array $entry): array
{
    $url = $entry['url'] ?? '';
    $external = preg_match('#^https?://#i', $url) === 1;
    if (!$external && strpos($url, ':') !== false) {
        $url = '';
    }
    $thumb = $entry['thumb'] ?? '';
    if (!preg_match('#^assets/images/[a-z0-9/_-]+\.jpg$#', $thumb)) {
        $thumb = '';
    }
    return [$url, $external, $thumb];
}

/** Records belonging to one category. */
function in_category(array $entries, string $category): array
{
    return array_values(array_filter($entries, fn ($entry) => ($entry['category'] ?? '') === $category));
}

/**
 * Numbers of the photographs in assets/images/gallery/ (image-1.jpg, image-2.jpg, …),
 * in order. The gallery holds web-sized copies of assets/images/daksh-real-images/.
 */
function gallery_images(): array
{
    $numbers = [];
    foreach (glob(SITE_ROOT . '/assets/images/gallery/image-*.jpg') ?: [] as $file) {
        if (preg_match('/image-(\d+)\.jpg$/', $file, $match)) {
            $numbers[] = (int) $match[1];
        }
    }
    sort($numbers);
    return $numbers;
}

/** Whether a page is still a temporary "In preparation" page. */
function is_planned(string $key): bool
{
    global $pages;
    return !empty($pages[$key]['planned']);
}

/** Key of the page currently being served. */
function current_page(): string
{
    global $pages;
    $file = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
    foreach ($pages as $key => $page) {
        if ($page['file'] === $file) {
            return $key;
        }
    }
    return '';
}

/** aria-current attribute for the active navigation link. */
function current_attr(string $key): string
{
    return $key === current_page() ? ' aria-current="page"' : '';
}

/** Whether the request is addressed to a local development host. */
function is_local_host(): bool
{
    $host = strtolower($_SERVER['HTTP_HOST'] ?? '');
    return preg_match('/^(localhost|127\.0\.0\.1|\[::1\]|[a-z0-9-]+\.(test|local|localhost))(:\d{1,5})?$/', $host) === 1;
}

/**
 * Site origin plus the folder the site is served from, no trailing slash.
 * Uses the configured URL; without one, only a local development host is
 * accepted. Returns '' when no trustworthy address is known.
 */
function site_base(): string
{
    global $site;
    if ($site['url'] !== '') {
        return rtrim($site['url'], '/');
    }
    if (!is_local_host()) {
        return '';
    }
    $https  = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    $folder = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
    return ($https ? 'https' : 'http') . '://' . strtolower($_SERVER['HTTP_HOST']) . $folder;
}

/** Absolute URL for a site-relative path, or '' when the site address is unknown. */
function absolute_url(string $path = ''): string
{
    $base = site_base();
    return $base === '' ? '' : $base . '/' . ltrim($path, '/');
}

/** Whether any verified contact channel (email or social profile) is configured. */
function contact_available(): bool
{
    global $site;
    return $site['email'] !== '' || $site['social'];
}

/** Whether the contact form may be shown and can send: needs a recipient and the switch. */
function contact_form_enabled(): bool
{
    global $site;
    return $site['email'] !== '' && $site['contact_form'];
}
