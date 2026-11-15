<?php
defined('SITE_ROOT') || exit;
/**
 * Notice shown when a listing has no verified records yet.
 * Expects $empty_text; optional $empty_links, a list of [label, page key].
 */
$empty_links = $empty_links ?? [];
if (!contact_available()) {
    // Do not point to the Contact page while it offers no way to get in touch.
    $empty_links = array_filter($empty_links, fn ($link) => $link[1] !== 'contact');
}
?>
<div class="empty-state reveal">
    <p class="empty-state__text"><?= e($empty_text) ?></p>
    <?php if ($empty_links): ?>
        <ul class="empty-state__links">
            <?php foreach ($empty_links as [$empty_label, $empty_page]): ?>
                <li>
                    <a class="link-arrow" href="<?= e(page_url($empty_page)) ?>"><?= e($empty_label) ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
