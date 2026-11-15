<?php
defined('SITE_ROOT') || exit;
/**
 * Shared closing call-to-action. Pages may override any of:
 *   $cta_heading, $cta_text
 *   $cta_links   list of [label, page key]; the first is the primary button
 *
 * With no overrides it invites visitors to get in touch. While no verified
 * contact channel is configured, links to the Contact page are left out and
 * the default becomes an invitation to read further instead.
 */
$cta_default = !isset($cta_links);

if ($cta_default && contact_available()) {
    $cta_heading = 'Let’s Connect';
    $cta_text    = 'For meaningful conversations around law, public policy, research, governance, social initiatives and ideas that can contribute to a better society.';
    $cta_links   = [['Get in Touch', 'contact']];
} elseif ($cta_default) {
    $cta_heading = 'Explore Further';
    $cta_text    = 'Read more about Daksh’s background, his public-service experience and his research interests.';
    $cta_links   = [['About Daksh Jain', 'about'], ['Public Service', 'public-service'], ['Policy & Research', 'policy-research']];
} elseif (!contact_available()) {
    $cta_links = array_filter($cta_links, fn ($link) => $link[1] !== 'contact');
}

if (!$cta_links) {
    $cta_links = [['About Daksh Jain', 'about'], ['Public Service', 'public-service']];
}

// A page does not link to itself.
$cta_links = array_values(array_filter($cta_links, fn ($link) => $link[1] !== current_page()));
?>
<section class="section cta" aria-labelledby="cta-heading">
    <div class="container">
        <div class="cta__inner<?= count($cta_links) > 1 ? ' cta__inner--stack' : '' ?> reveal">
            <div>
                <h2 class="cta__heading" id="cta-heading"><?= e($cta_heading) ?></h2>
                <p class="cta__text"><?= e($cta_text) ?></p>
            </div>
            <div class="cta__actions">
                <?php foreach ($cta_links as $i => [$link_label, $link_page]): ?>
                    <a class="btn-site <?= $i === 0 ? 'btn-site--primary' : 'btn-site--outline' ?>" href="<?= e(page_url($link_page)) ?>">
                        <?= e($link_label) ?><?php if ($i === 0): ?> <i class="bi bi-arrow-right" aria-hidden="true"></i><?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
