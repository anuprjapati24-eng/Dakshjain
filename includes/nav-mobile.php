<?php
defined('SITE_ROOT') || exit;
/**
 * Mobile navigation drawer (below lg). Without JavaScript it opens through the
 * :target selector and its close links return to the top of the page;
 * main.js adds focus handling, Escape and makes the page behind it inert.
 */
?>
<div class="mobile-nav" id="mobile-nav" data-menu>
    <a class="mobile-nav__backdrop" href="#top" tabindex="-1" aria-hidden="true" data-menu-close></a>
    <nav class="mobile-nav__panel" aria-label="Mobile">
        <div class="mobile-nav__head">
            <span class="brand__name"><?= e($site['name']) ?></span>
            <a class="mobile-nav__close" href="#top" role="button" aria-label="Close menu" data-menu-close>
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            </a>
        </div>
        <ul class="mobile-nav__list">
            <?php foreach ($pages as $nav_key => $nav_page): ?>
                <li>
                    <a href="<?= e(page_url($nav_key)) ?>"<?= current_attr($nav_key) ?>><?= e($nav_page['label']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
