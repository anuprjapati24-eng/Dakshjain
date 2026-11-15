<?php
/**
 * Vercel entry point. Vercel runs PHP only inside api/, so every page request
 * is routed here (see vercel.json) and the matching top-level page is run.
 * On Apache / LiteSpeed hosting this file is not used.
 */

$root = dirname(__DIR__);
$page = $_GET['__page'] ?? '';
unset($_GET['__page']);

$aliases = ['' => 'index.php', 'robots.txt' => 'robots.php', 'sitemap.xml' => 'sitemap.php'];
$file = $aliases[$page] ?? $page;

// Only top-level pages; never the partials in includes/ or content/.
if (!preg_match('/^[a-z0-9-]+\.php$/', $file) || !is_file($root . '/' . $file)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    echo "Page not found\n";
    exit;
}

// Make the page see itself as the running script (used for the active nav link).
$_SERVER['SCRIPT_NAME'] = $_SERVER['PHP_SELF'] = '/' . $file;
$_SERVER['SCRIPT_FILENAME'] = $root . '/' . $file;

chdir($root);
require $root . '/' . $file;
