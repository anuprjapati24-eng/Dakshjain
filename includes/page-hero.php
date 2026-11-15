<?php
defined('SITE_ROOT') || exit;
/**
 * Opening section of an inner page.
 * Expects $hero_eyebrow, $hero_title and $hero_intro.
 */
?>
<section class="page-hero" aria-labelledby="page-heading">
    <div class="container">
        <p class="eyebrow"><?= e($hero_eyebrow) ?></p>
        <h1 class="page-hero__title" id="page-heading"><?= e($hero_title) ?></h1>
        <p class="page-hero__lead"><?= e($hero_intro) ?></p>
    </div>
</section>
