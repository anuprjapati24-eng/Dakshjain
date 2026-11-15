<?php
defined('SITE_ROOT') || exit;
/**
 * Desktop navigation (lg and up). Dropdowns open on hover and keyboard focus
 * through CSS alone; main.js adds click, Escape and aria-expanded handling.
 */
$active = current_page();
?>
<nav class="nav-desktop" aria-label="Primary">
    <ul class="nav-desktop__list">
        <?php foreach ($nav as $i => $entry): ?>
            <?php if (is_string($entry)): ?>
                <li>
                    <a class="nav-desktop__link" href="<?= e(page_url($entry)) ?>"<?= current_attr($entry) ?>>
                        <?= e($pages[$entry]['short'] ?? $pages[$entry]['label']) ?>
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-dropdown" data-dropdown>
                    <button class="nav-desktop__link nav-dropdown__toggle<?= in_array($active, $entry['items'], true) ? ' is-active' : '' ?>"
                            type="button" aria-expanded="false" aria-controls="nav-group-<?= $i ?>">
                        <?= e($entry['label']) ?>
                        <i class="bi bi-chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="nav-dropdown__menu" id="nav-group-<?= $i ?>">
                        <?php foreach ($entry['items'] as $item): ?>
                            <li>
                                <a href="<?= e(page_url($item)) ?>"<?= current_attr($item) ?>><?= e($pages[$item]['label']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <a class="btn-site btn-site--outline btn-site--sm" href="<?= e(page_url('contact')) ?>"<?= current_attr('contact') ?>>Contact</a>
</nav>
