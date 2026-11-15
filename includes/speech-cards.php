<?php
defined('SITE_ROOT') || exit;
/**
 * Speeches page: a featured recording or a grid of recording cards.
 * Expects $speech_entries (records from content/speeches.php) and
 * $speech_layout: 'feature' (the first record, large) or 'cards' (all records).
 * Only fields present on a record are shown.
 */
$speech_layout = $speech_layout ?? 'cards';
?>
<?php if ($speech_layout === 'feature'): ?>
    <?php
    $speech = $speech_entries[0];
    [$speech_url, $speech_external, $speech_thumb] = entry_media($speech);
    $speech_meta = array_filter([$speech['date'] ?? '', $speech['event'] ?? '', $speech['venue'] ?? '']);
    ?>
    <article class="row align-items-center gy-5 speech-feature">
        <?php if ($speech_thumb !== ''): ?>
            <div class="col-md-5 col-lg-4 reveal">
                <?php if ($speech_url !== ''): ?>
                    <a class="speech-cover speech-cover--framed speech-feature__cover" href="<?= e($speech_url) ?>"<?= $speech_external ? ' rel="noopener"' : '' ?> tabindex="-1" aria-hidden="true">
                <?php else: ?>
                    <div class="speech-cover speech-cover--framed speech-feature__cover">
                <?php endif; ?>
                    <span class="speech-cover__media">
                        <img src="<?= e($speech_thumb) ?>" width="480" height="640" alt="Video cover: <?= e($speech['title']) ?>">
                    </span>
                    <?php if ($speech_url !== ''): ?><span class="speech-cover__play"><i class="bi bi-play-fill"></i></span><?php endif; ?>
                <?= $speech_url !== '' ? '</a>' : '</div>' ?>
            </div>
        <?php endif; ?>
        <div class="<?= $speech_thumb !== '' ? 'col-md-7 col-lg-7 offset-lg-1' : 'col-lg-8' ?> reveal">
            <p class="eyebrow">Latest Recording</p>
            <?php if (!empty($speech['category'])): ?>
                <p class="speech-tag"><?= e($speech['category']) ?></p>
            <?php endif; ?>
            <?php if ($speech_meta): ?>
                <p class="speech-meta"><?php foreach ($speech_meta as $meta_part): ?><span><?= e($meta_part) ?></span><?php endforeach; ?></p>
            <?php endif; ?>
            <h2 class="speech-feature__title" id="feature-heading"><?= e($speech['title']) ?></h2>
            <?php if (!empty($speech['summary'])): ?>
                <p class="speech-feature__summary"><?= e($speech['summary']) ?></p>
            <?php endif; ?>
            <?php if ($speech_url !== ''): ?>
                <a class="link-arrow" href="<?= e($speech_url) ?>"<?= $speech_external ? ' rel="noopener"' : '' ?>>
                    <?= e($speech['link_label'] ?? 'View') ?><span class="visually-hidden">: <?= e($speech['title']) ?></span>
                    <i class="bi <?= $speech_external ? 'bi-arrow-up-right' : 'bi-arrow-right' ?>" aria-hidden="true"></i>
                </a>
            <?php endif; ?>
        </div>
    </article>
<?php else: ?>
    <ul class="speech-grid">
        <?php foreach ($speech_entries as $speech): ?>
            <?php
            [$speech_url, $speech_external, $speech_thumb] = entry_media($speech);
            $speech_meta = array_filter([$speech['date'] ?? '', $speech['event'] ?? '', $speech['venue'] ?? '']);
            ?>
            <li class="speech-card reveal" data-category="<?= e($speech['category'] ?? '') ?>">
                <?php if ($speech_thumb !== ''): ?>
                    <?php if ($speech_url !== ''): ?>
                        <a class="speech-cover" href="<?= e($speech_url) ?>"<?= $speech_external ? ' rel="noopener"' : '' ?> tabindex="-1" aria-hidden="true">
                    <?php else: ?>
                        <div class="speech-cover">
                    <?php endif; ?>
                        <span class="speech-cover__media">
                            <img src="<?= e($speech_thumb) ?>" width="480" height="640" loading="lazy" alt="Video cover: <?= e($speech['title']) ?>">
                        </span>
                        <?php if ($speech_url !== ''): ?><span class="speech-cover__play"><i class="bi bi-play-fill"></i></span><?php endif; ?>
                    <?= $speech_url !== '' ? '</a>' : '</div>' ?>
                <?php endif; ?>
                <div class="speech-card__body">
                    <?php if (!empty($speech['category'])): ?>
                        <p class="speech-tag"><?= e($speech['category']) ?></p>
                    <?php endif; ?>
                    <?php if ($speech_meta): ?>
                        <p class="speech-meta"><?php foreach ($speech_meta as $meta_part): ?><span><?= e($meta_part) ?></span><?php endforeach; ?></p>
                    <?php endif; ?>
                    <h3 class="speech-card__title"><?= e($speech['title']) ?></h3>
                    <?php if (!empty($speech['summary'])): ?>
                        <p class="speech-card__summary"><?= e($speech['summary']) ?></p>
                    <?php endif; ?>
                    <?php if ($speech_url !== ''): ?>
                        <a class="link-arrow" href="<?= e($speech_url) ?>"<?= $speech_external ? ' rel="noopener"' : '' ?>>
                            <?= e($speech['link_label'] ?? 'View') ?><span class="visually-hidden">: <?= e($speech['title']) ?></span>
                            <i class="bi <?= $speech_external ? 'bi-arrow-up-right' : 'bi-arrow-right' ?>" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php unset($speech_layout); ?>
