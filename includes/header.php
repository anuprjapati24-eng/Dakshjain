<?php
/**
 * Opens the document and renders the global header.
 * Pages include this first and footer.php last.
 */
require_once __DIR__ . '/config.php';

// Reached only through a page file, never requested directly.
if (current_page() === '') {
    http_response_code(404);
    exit;
}
?>
<!doctype html>
<html lang="en-IN" class="no-js">
<head>
<?php require __DIR__ . '/head.php'; ?>
</head>
<body id="top">
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" data-header>
    <div class="container site-header__inner">
        <a class="brand" href="<?= e(page_url('home')) ?>" aria-label="<?= e($site['name']) ?> — home">
            <span class="brand__name"><?= e($site['name']) ?></span>
            <span class="brand__tagline"><?= e($site['tagline']) ?></span>
        </a>

        <?php require __DIR__ . '/nav-desktop.php'; ?>

        <a class="menu-toggle" href="#mobile-nav" role="button" aria-controls="mobile-nav" aria-expanded="false" data-menu-open>
            <span class="menu-toggle__label">Menu</span>
            <i class="bi bi-list" aria-hidden="true"></i>
        </a>
    </div>
</header>

<?php require __DIR__ . '/nav-mobile.php'; ?>

<main id="main">
