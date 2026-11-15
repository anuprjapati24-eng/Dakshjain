<?php
/**
 * XML sitemap of the public pages, built from the page list in includes/config.php.
 * Served as /sitemap.xml through .htaccess. Needs the site address: set 'url' in the config.
 */
require_once __DIR__ . '/includes/config.php';

if (site_base() === '') {
    http_response_code(404);
    exit;
}

header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $key => $page): ?>
<?php if (!is_planned($key) && empty($page['hidden'])): ?>
  <url><loc><?= e(absolute_url($key === 'home' ? '' : $page['file'])) ?></loc></url>
<?php endif; ?>
<?php endforeach; ?>
<?php foreach (load_content('articles') as $article): ?>
<?php if (article_has_page($article)): ?>
  <url><loc><?= e(absolute_url(article_link($article)[0])) ?></loc></url>
<?php endif; ?>
<?php endforeach; ?>
</urlset>
