<?php
defined('SITE_ROOT') || exit;
/**
 * Category structure for a listing page (speeches, media, projects).
 * Expects $categories (title => description) and $entries.
 * With no records at all it outlines the categories; once records exist,
 * each category lists its own and says so when it has none.
 */
$entry_heading = 'h4';
$all_entries   = $entries;
?>
<?php if (!$all_entries): ?>
    <dl class="deflist">
        <?php foreach ($categories as $category_title => $category_text): ?>
            <div>
                <dt><?= e($category_title) ?></dt>
                <dd><?= e($category_text) ?></dd>
            </div>
        <?php endforeach; ?>
    </dl>
<?php else: ?>
    <?php foreach ($categories as $category_title => $category_text): ?>
        <?php $entries = in_category($all_entries, $category_title); ?>
        <div class="category">
            <h3 class="category__title"><?= e($category_title) ?></h3>
            <p class="category__text"><?= e($category_text) ?></p>
            <?php if ($entries): ?>
                <?php require __DIR__ . '/entry-list.php'; ?>
            <?php else: ?>
                <p class="category__empty">No verified items are listed in this category yet.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php $entries = $all_entries; ?>
<?php endif; ?>
