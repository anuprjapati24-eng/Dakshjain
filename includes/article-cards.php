<?php
defined('SITE_ROOT') || exit;
/**
 * Articles: a featured article or a grid of article cards.
 * Expects $article_entries (records from content/articles.php) and
 * $article_layout: 'feature' (the first record, large) or 'cards' (all records).
 * Optional $article_heading: heading element for card titles (default 'h3').
 * Only fields present on a record are shown.
 */
$article_layout  = $article_layout ?? 'cards';
$article_heading = $article_heading ?? 'h3';
?>
<?php if ($article_layout === 'feature'): ?>
    <?php
    $article = $article_entries[0];
    [$article_url, $article_external] = article_link($article);
    [$article_img, $article_img_small, $article_alt] = article_image($article);
    $article_meta = array_filter([$article['date'] ?? '', $article['source'] ?? '']);
    ?>
    <article class="row align-items-center gy-5 article-feature">
        <?php if ($article_img !== ''): ?>
            <div class="col-lg-6 reveal">
                <figure class="framed framed--article">
                    <img src="<?= e($article_img) ?>"
                         <?php if ($article_img_small !== ''): ?>srcset="<?= e($article_img_small) ?> 700w, <?= e($article_img) ?> 1200w" sizes="(min-width: 992px) 540px, 92vw"<?php endif; ?>
                         width="1200" height="750" alt="<?= e($article_alt) ?>">
                </figure>
            </div>
        <?php endif; ?>
        <div class="<?= $article_img !== '' ? 'col-lg-5 offset-lg-1' : 'col-lg-8' ?> reveal">
            <p class="eyebrow">Featured Article</p>
            <?php if (!empty($article['category'])): ?>
                <p class="speech-tag"><?= e($article['category']) ?></p>
            <?php endif; ?>
            <?php if ($article_meta): ?>
                <p class="speech-meta"><?php foreach ($article_meta as $meta_part): ?><span><?= e($meta_part) ?></span><?php endforeach; ?></p>
            <?php endif; ?>
            <h2 class="article-feature__title" id="feature-heading">
                <?php if ($article_url !== ''): ?>
                    <a href="<?= e($article_url) ?>"<?= $article_external ? ' rel="noopener"' : '' ?>><?= e($article['title']) ?></a>
                <?php else: ?>
                    <?= e($article['title']) ?>
                <?php endif; ?>
            </h2>
            <?php if (!empty($article['summary'])): ?>
                <p class="article-feature__summary"><?= e($article['summary']) ?></p>
            <?php endif; ?>
            <?php if ($article_url !== ''): ?>
                <a class="link-arrow" href="<?= e($article_url) ?>"<?= $article_external ? ' rel="noopener"' : '' ?> tabindex="-1" aria-hidden="true">
                    <?= e($article['link_label'] ?? 'Read article') ?>
                    <i class="bi <?= $article_external ? 'bi-arrow-up-right' : 'bi-arrow-right' ?>"></i>
                </a>
            <?php endif; ?>
        </div>
    </article>
<?php else: ?>
    <ul class="article-grid<?= count($article_entries) <= 2 ? ' article-grid--count-' . count($article_entries) : '' ?>">
        <?php foreach ($article_entries as $article): ?>
            <?php
            [$article_url, $article_external] = article_link($article);
            [$article_img, $article_img_small, $article_alt] = article_image($article);
            $article_meta = array_filter([$article['date'] ?? '', $article['source'] ?? '']);
            ?>
            <li class="article-card reveal" data-category="<?= e($article['category'] ?? '') ?>">
                <?php if ($article_img !== ''): ?>
                    <div class="article-card__media">
                        <img src="<?= e($article_img_small !== '' ? $article_img_small : $article_img) ?>"
                             <?php if ($article_img_small !== ''): ?>srcset="<?= e($article_img_small) ?> 700w, <?= e($article_img) ?> 1200w" sizes="(min-width: 992px) 30vw, (min-width: 768px) 46vw, 92vw"<?php endif; ?>
                             width="1200" height="750" loading="lazy" alt="<?= e($article_alt) ?>">
                    </div>
                <?php endif; ?>
                <div class="article-card__body">
                    <?php if (!empty($article['category'])): ?>
                        <p class="speech-tag"><?= e($article['category']) ?></p>
                    <?php endif; ?>
                    <?php if ($article_meta): ?>
                        <p class="speech-meta"><?php foreach ($article_meta as $meta_part): ?><span><?= e($meta_part) ?></span><?php endforeach; ?></p>
                    <?php endif; ?>
                    <<?= $article_heading ?> class="article-card__title">
                        <?php if ($article_url !== ''): ?>
                            <a class="article-card__link" href="<?= e($article_url) ?>"<?= $article_external ? ' rel="noopener"' : '' ?>><?= e($article['title']) ?></a>
                        <?php else: ?>
                            <?= e($article['title']) ?>
                        <?php endif; ?>
                    </<?= $article_heading ?>>
                    <?php if (!empty($article['summary'])): ?>
                        <p class="article-card__summary"><?= e($article['summary']) ?></p>
                    <?php endif; ?>
                    <?php if ($article_url !== ''): ?>
                        <span class="link-arrow article-card__more" aria-hidden="true">
                            <?= e($article['link_label'] ?? 'Read article') ?>
                            <i class="bi <?= $article_external ? 'bi-arrow-up-right' : 'bi-arrow-right' ?>"></i>
                        </span>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php unset($article_layout, $article_heading); ?>
