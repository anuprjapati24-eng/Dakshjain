<?php
defined('SITE_ROOT') || exit;
/**
 * List of content records (articles, speeches, media items, projects).
 * Expects $entries; optional $entry_label (default link text) and
 * $entry_heading (heading element, default 'h3').
 * Only fields present on a record are shown; see the files in content/.
 * An optional 'image' (a .jpg under assets/images/) is shown above the record. */
$entry_label   = $entry_label   ?? 'View';
$entry_heading = $entry_heading ?? 'h3';
?>
<ul class="entry-list">
    <?php foreach ($entries as $entry): ?>
        <?php
        $entry_meta = array_filter([$entry['date'] ?? '', $entry['source'] ?? '', $entry['event'] ?? '', $entry['venue'] ?? '']);
        $entry_url  = $entry['url'] ?? '';
        $entry_external = preg_match('#^https?://#i', $entry_url) === 1;
        // Accept web addresses and local paths only.
        if (!$entry_external && strpos($entry_url, ':') !== false) {
            $entry_url = '';
        }
        ?>
        <li class="entry-list__item" data-category="<?= e($entry['category'] ?? '') ?>">
            <?php if (!empty($entry['image']) && preg_match('#^assets/images/[a-z0-9/_-]+\.jpg$#', $entry['image'])): ?>
                <img class="entry-list__image" src="<?= e($entry['image']) ?>" loading="lazy" alt="<?= e($entry['image_alt'] ?? $entry['title']) ?>">
            <?php endif; ?>
            <p class="entry-list__meta">
                <?php if (!empty($entry['category'])): ?><span class="entry-list__category"><?= e($entry['category']) ?></span><?php endif; ?>
                <?php foreach ($entry_meta as $meta_part): ?><span><?= e($meta_part) ?></span><?php endforeach; ?>
            </p>
            <<?= $entry_heading ?> class="entry-list__title"><?= e($entry['title']) ?></<?= $entry_heading ?>>
            <?php if (!empty($entry['summary'])): ?>
                <p><?= e($entry['summary']) ?></p>
            <?php endif; ?>
            <?php if (!empty($entry['role'])): ?>
                <p><strong>Role:</strong> <?= e($entry['role']) ?></p>
            <?php endif; ?>
            <?php if (!empty($entry['outcomes'])): ?>
                <p><strong>Outcomes:</strong> <?= e($entry['outcomes']) ?></p>
            <?php endif; ?>
            <?php if ($entry_url !== ''): ?>
                <a class="link-arrow" href="<?= e($entry_url) ?>"<?= $entry_external ? ' rel="noopener"' : '' ?>>
                    <?= e($entry['link_label'] ?? $entry_label) ?><span class="visually-hidden">: <?= e($entry['title']) ?></span>
                    <i class="bi <?= $entry_external ? 'bi-arrow-up-right' : 'bi-arrow-right' ?>" aria-hidden="true"></i>
                </a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
