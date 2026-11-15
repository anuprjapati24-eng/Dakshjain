<?php
/**
 * Temporary template for pages planned in later phases.
 * A page file sets $page_intro (optional) and requires this file;
 * replace that require with real content when the page is built.
 */
require_once __DIR__ . '/config.php';

if (current_page() === '') {
    http_response_code(404);
    exit;
}

$page_title       = $pages[current_page()]['label'];
$page_description = $page_intro ?? $site['description'];
$page_noindex     = true;

require __DIR__ . '/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">In preparation</p>
        <h1 class="page-hero__title"><?= e($page_title) ?></h1>
        <?php if (!empty($page_intro)): ?>
            <p class="page-hero__lead"><?= e($page_intro) ?></p>
        <?php endif; ?>
        <p class="page-hero__note">This page is being prepared and will be published soon.</p>
        <a class="btn-site btn-site--outline" href="<?= e(page_url('home')) ?>">
            <i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Home
        </a>
    </div>
</section>
<?php
if (current_page() !== 'contact') {
    require __DIR__ . '/cta.php';
}
require __DIR__ . '/footer.php';
