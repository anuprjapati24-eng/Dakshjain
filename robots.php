<?php
/**
 * robots.txt, served as /robots.txt through .htaccess.
 * The sitemap line appears once the site address is known.
 */
require_once __DIR__ . '/includes/config.php';

header('Content-Type: text/plain; charset=UTF-8');
echo "User-agent: *\nAllow: /\n";

if (site_base() !== '') {
    echo "\nSitemap: ", absolute_url('sitemap.xml'), "\n";
}
