<?php
defined('SITE_ROOT') || exit;
/**
 * Global footer; closes the document opened by header.php.
 */
$footer_groups = [
    'Profile'            => ['home', 'about', 'contact'],
    'Public Life'        => ['public-service', 'parliament', 'social'],
    'Research & Writing' => ['policy-research', 'articles', 'speeches'],
    'Media & Projects'   => ['media', 'projects'],
];
?>
</main>

<footer class="site-footer">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <a class="brand brand--light" href="<?= e(page_url('home')) ?>">
                    <span class="brand__name"><?= e($site['name']) ?></span>
                    <span class="brand__tagline"><?= e($site['tagline']) ?></span>
                </a>
                <p class="site-footer__about">Legal professional, public policy researcher, social worker and writer.</p>
                <?php if ($site['email'] !== ''): ?>
                    <p class="site-footer__contact"><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></p>
                <?php endif; ?>
                <?php if ($site['social']): ?>
                    <ul class="site-footer__social">
                        <?php foreach ($site['social'] as $label => $url): ?>
                            <li><a href="<?= e($url) ?>" rel="me noopener"><?= e($label) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <nav class="col-lg-8" aria-label="Footer">
                <div class="row gy-4">
                    <?php foreach ($footer_groups as $heading => $items): ?>
                        <div class="col-6 col-md-3">
                            <h2 class="site-footer__heading"><?= e($heading) ?></h2>
                            <ul class="site-footer__list">
                                <?php foreach ($items as $item): ?>
                                    <li><a href="<?= e(page_url($item)) ?>"<?= current_attr($item) ?>><?= e($pages[$item]['label']) ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </nav>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; <?= date('Y') ?> <?= e($site['name']) ?>. All rights reserved.</p>
            <p>This is a personal website. Views expressed are personal and do not represent any institution.</p>
        </div>
    </div>
</footer>

<a class="back-to-top" href="#top" aria-label="Back to top" data-back-to-top>
    <i class="bi bi-arrow-up" aria-hidden="true"></i>
</a>

<script src="assets/js/main.js" defer></script>
</body>
</html>
