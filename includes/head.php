<?php
defined('SITE_ROOT') || exit;
/**
 * Document head and SEO metadata.
 * Optional variables set by the page before including header.php:
 *   $page_title, $page_description, $page_image, $page_noindex, $page_canonical
 */
$current     = current_page();
$title       = isset($page_title) ? $page_title . ' | ' . $site['name'] : $site['name'] . ' | ' . 'Law, Public Policy & Research';
$description = $page_description ?? $site['description'];
// A page with query-string variants (article.php?slug=…) sets $page_canonical itself.
$canonical   = absolute_url($page_canonical ?? ($current === 'home' || $current === '' ? '' : $pages[$current]['file']));
$image       = absolute_url($page_image ?? $site['og_image']);
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($description) ?>">
<?php if ($canonical !== ''): ?>
<link rel="canonical" href="<?= e($canonical) ?>">
<?php endif; ?>
<?php if (!empty($page_noindex)): ?>
<meta name="robots" content="noindex, follow">
<?php endif; ?>

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e($site['name']) ?>">
<meta property="og:locale" content="<?= e($site['locale']) ?>">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($description) ?>">
<?php if ($canonical !== ''): ?>
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e($image) ?>">
<?php if (!isset($page_image)): ?>
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= e($site['og_image_alt']) ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<?php endif; ?>
<?php if ($site['favicon']): ?>
<link rel="icon" href="<?= e($site['favicon']) ?>" type="image/svg+xml">
<?php endif; ?>

<meta name="theme-color" content="#0f1f38">
<script>document.documentElement.className = 'js';</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" integrity="sha384-XGjxtQfXaH2tnPFa9x+ruJTuLE3Aa6LhHSWRr1XeTyhezb4abCG4ccI5AkVDxqC+" crossorigin="anonymous">
<link href="assets/css/style.css" rel="stylesheet">
