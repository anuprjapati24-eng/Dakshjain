<?php
require_once __DIR__ . '/includes/config.php';

/**
 * One article from content/articles.php, shown in full: article.php?slug=…
 * Only records with a 'slug' and a 'body' have a page here.
 */
$entries = load_content('articles');
$slug    = is_string($_GET['slug'] ?? null) ? $_GET['slug'] : '';
$article = null;
foreach ($entries as $candidate) {
    if (article_has_page($candidate) && $candidate['slug'] === $slug) {
        $article = $candidate;
        break;
    }
}

if ($article === null) {
    http_response_code(404);
    $page_title       = 'Article Not Found';
    $page_description = 'The requested article could not be found.';
    $page_noindex     = true;
} else {
    $page_title       = $article['title'];
    $page_description = $article['summary'] ?? $site['description'];
    $page_canonical   = article_link($article)[0];
    [$article_img, $article_img_small, $article_alt] = article_image($article);
    if ($article_img !== '') {
        $page_image = $article_img;
    }
    $article_meta = array_filter([$article['date'] ?? '', $article['source'] ?? '']);

    // Up to two other articles to read next.
    $related = array_slice(array_values(array_filter($entries, fn ($entry) => $entry !== $article)), 0, 2);
}

$cta_heading = 'Continue Exploring';
$cta_text    = 'Read more of Daksh’s writing or learn about his public-service experience.';
$cta_links   = [['Articles & Opinions', 'articles'], ['Public Service', 'public-service'], ['About Daksh Jain', 'about']];

require __DIR__ . '/includes/header.php';
?>

<?php if ($article === null): ?>
<section class="page-hero" aria-labelledby="page-heading">
    <div class="container">
        <p class="eyebrow">Articles &amp; Opinions</p>
        <h1 class="page-hero__title" id="page-heading">Article Not Found</h1>
        <p class="page-hero__lead">The article you are looking for is not available. It may have been moved or the link may be incomplete.</p>
        <a class="link-arrow" href="<?= e(page_url('articles')) ?>">All Articles <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
    </div>
</section>
<?php else: ?>
<article aria-labelledby="page-heading">
    <header class="page-hero article-hero">
        <div class="container">
            <div class="article-hero__inner">
                <a class="article-back" href="<?= e(page_url('articles')) ?>"><i class="bi bi-arrow-left" aria-hidden="true"></i> Articles &amp; Opinions</a>
                <?php if (!empty($article['category'])): ?>
                    <p class="speech-tag"><?= e($article['category']) ?></p>
                <?php endif; ?>
                <h1 class="article-hero__title" id="page-heading"><?= e($article['title']) ?></h1>
                <?php if (!empty($article['subtitle'])): ?>
                    <p class="article-hero__subtitle"><?= e($article['subtitle']) ?></p>
                <?php endif; ?>
                <p class="speech-meta article-hero__meta">
                    <span>By <?= e($site['name']) ?></span><?php foreach ($article_meta as $meta_part): ?><span><?= e($meta_part) ?></span><?php endforeach; ?>
                </p>
            </div>
        </div>
    </header>

    <div class="section article-page">
        <div class="container">
            <?php if ($article_img !== ''): ?>
                <figure class="framed framed--article article-page__image">
                    <img src="<?= e($article_img) ?>"
                         <?php if ($article_img_small !== ''): ?>srcset="<?= e($article_img_small) ?> 700w, <?= e($article_img) ?> 1200w" sizes="(min-width: 1200px) 860px, 92vw"<?php endif; ?>
                         width="1200" height="750" fetchpriority="high" alt="<?= e($article_alt) ?>">
                </figure>
            <?php endif; ?>

            <div class="article-body">
                <?php foreach ($article['body'] as $block): ?>
                    <?php $type = $block[0] ?? ''; ?>
                    <?php if ($type === 'h2' || $type === 'h3'): ?>
                        <<?= $type ?>><?= e($block[1]) ?></<?= $type ?>>
                    <?php elseif ($type === 'p'): ?>
                        <p><?= e($block[1]) ?></p>
                    <?php elseif ($type === 'ul'): ?>
                        <ul>
                            <?php foreach ($block[1] as $item): ?><li><?= e($item) ?></li><?php endforeach; ?>
                        </ul>
                    <?php elseif ($type === 'dl'): ?>
                        <dl class="article-body__terms">
                            <?php foreach ($block[1] as [$term, $description]): ?>
                                <div><dt><?= e($term) ?></dt><dd><?= e($description) ?></dd></div>
                            <?php endforeach; ?>
                        </dl>
                    <?php elseif ($type === 'link' && preg_match('#^https://[a-z0-9.-]+(/[^\s"<>]*)?$#i', $block[2] ?? '')): ?>
                        <p class="article-body__link">
                            <a class="link-arrow" href="<?= e($block[2]) ?>" rel="noopener"><?= e($block[1]) ?> <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                        </p>
                    <?php elseif ($type === 'note'): ?>
                        <aside class="article-note" aria-label="<?= e($block[1]) ?>">
                            <h2 class="article-note__title"><?= e($block[1]) ?></h2>
                            <?php foreach ($block[2] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
                        </aside>
                    <?php endif; ?>
                <?php endforeach; ?>

                <p class="article-body__back">
                    <a class="link-arrow" href="<?= e(page_url('articles')) ?>"><i class="bi bi-arrow-left" aria-hidden="true"></i> All Articles</a>
                </p>
            </div>
        </div>
    </div>
</article>

<?php if ($related): ?>
<!-- More to read -->
<section class="section section--tint" aria-labelledby="related-heading">
    <div class="container">
        <div class="speech-archive__head reveal">
            <p class="eyebrow">Keep Reading</p>
            <h2 class="section__title" id="related-heading">More Articles</h2>
        </div>
        <?php
        $article_entries = $related;
        $article_layout  = 'cards';
        require __DIR__ . '/includes/article-cards.php';
        ?>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
