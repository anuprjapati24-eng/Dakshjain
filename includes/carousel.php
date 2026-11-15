<?php
defined('SITE_ROOT') || exit;
/**
 * Photo carousel. Expects:
 *   $carousel_images  list of image numbers from assets/images/gallery/ (see gallery_images())
 *   $carousel_label   accessible name, e.g. 'Photographs of Daksh Jain'
 *   $carousel_variant 'single' (one photo at a time) or 'strip' (row of equal cards)
 *
 * It is a horizontally scrolling list, so it works by touch, trackpad and
 * arrow keys without JavaScript; main.js adds the previous/next buttons.
 */
$carousel_variant = $carousel_variant ?? 'single';
$carousel_total   = count($carousel_images);
$carousel_eager   = $carousel_eager ?? false; // load the first photo straight away
?>
<div class="carousel carousel--<?= e($carousel_variant) ?>" role="group" aria-roledescription="carousel" aria-label="<?= e($carousel_label) ?>" data-carousel>
    <ul class="carousel__track" tabindex="0" aria-label="<?= e($carousel_label) ?>: scroll or use the arrow keys" data-carousel-track>
        <?php foreach ($carousel_images as $carousel_index => $carousel_number): ?>
            <li class="carousel__slide">
                <img src="assets/images/gallery/image-<?= (int) $carousel_number ?>.jpg" width="600" height="600"
                     <?= $carousel_eager && $carousel_index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>
                     alt="Daksh Jain, photograph <?= $carousel_index + 1 ?> of <?= $carousel_total ?>">
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="carousel__controls" hidden data-carousel-controls>
        <button class="carousel__button" type="button" aria-label="Previous photograph" data-carousel-prev><i class="bi bi-arrow-left" aria-hidden="true"></i></button>
        <span class="carousel__status" aria-live="polite" data-carousel-status></span>
        <button class="carousel__button" type="button" aria-label="Next photograph" data-carousel-next><i class="bi bi-arrow-right" aria-hidden="true"></i></button>
    </div>
</div>
<?php unset($carousel_variant, $carousel_eager); ?>
