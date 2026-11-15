<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Articles & Opinions';
$page_description = 'Articles, opinions and reflections by Daksh Jain on governance, public policy, institutions, social development and technology.';

$hero_eyebrow = 'Articles & Opinions';
$hero_title   = 'Ideas, Perspectives and Public Affairs';
$hero_intro   = 'Writing offers an opportunity to examine public questions, explain complex issues and encourage constructive discussion. This section brings together Daksh Jain’s articles, opinions and reflections on governance, public policy, institutions and social change.';

// The 'title' values are the categories used by records in content/articles.php.
$cards = [
    ['icon' => 'bi-clipboard-data', 'title' => 'Public Policy',                        'text' => 'How policies are framed, implemented and experienced.'],
    ['icon' => 'bi-bank',           'title' => 'Law and Governance',                   'text' => 'Legal frameworks, institutions and the way public decisions are made.'],
    ['icon' => 'bi-journal-text',   'title' => 'Parliament and Institutions',          'text' => 'Parliamentary processes and the working of public institutions.'],
    ['icon' => 'bi-people',         'title' => 'Social Development',                   'text' => 'Education, health, welfare and community participation.'],
    ['icon' => 'bi-cpu',            'title' => 'Technology, AI and Digital Governance', 'text' => 'Digital systems, artificial intelligence and their place in public life.'],
    ['icon' => 'bi-pen',            'title' => 'Personal Reflections',                 'text' => 'Observations on learning, service and public life.'],
];

$entries = load_content('articles');

// The newest article is featured; the rest are shown as filterable cards.
$featured_articles = array_slice($entries, 0, 1);
$more_articles     = array_slice($entries, 1);

$empty_text  = 'Thoughtful writing on public policy, governance, institutions and social development will be featured here. Verified articles and opinion pieces will be added as they become available.';
$empty_links = [['Policy & Research', 'policy-research'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<?php if ($featured_articles): ?>
<!-- Featured article -->
<section class="section" aria-labelledby="feature-heading">
    <div class="container">
        <?php
        $article_entries = $featured_articles;
        $article_layout  = 'feature';
        require __DIR__ . '/includes/article-cards.php';
        ?>
    </div>
</section>
<?php endif; ?>

<?php if ($more_articles): ?>
<!-- More articles -->
<section class="section section--tint" aria-labelledby="writing-heading">
    <div class="container">
        <div class="speech-archive__head reveal">
            <p class="eyebrow">Writing</p>
            <h2 class="section__title" id="writing-heading">More Articles and Opinion Pieces</h2>
        </div>
        <div data-filter>
            <?php if (count($more_articles) > 1): ?>
                <!-- Shown by main.js; without JavaScript every article stays listed. -->
                <div class="filter-bar speech-filter" role="group" aria-label="Filter articles by topic" hidden data-filter-bar>
                    <button class="filter-bar__button" type="button" aria-pressed="true" data-filter-value="">All</button>
                    <?php foreach ($cards as $card): ?>
                        <button class="filter-bar__button" type="button" aria-pressed="false" data-filter-value="<?= e($card['title']) ?>"><?= e($card['title']) ?></button>
                    <?php endforeach; ?>
                </div>
                <p class="visually-hidden" role="status" data-filter-status></p>
            <?php endif; ?>
            <?php
            $article_entries = $more_articles;
            $article_layout  = 'cards';
            require __DIR__ . '/includes/article-cards.php';
            ?>
            <p class="speech-empty" hidden data-filter-empty>No articles are listed under this topic yet. Choose another topic or select All.</p>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!$entries): ?>
<!-- Current status -->
<section class="section section--tint" aria-labelledby="writing-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Writing</p>
                <h2 class="section__title" id="writing-heading">Articles and Opinion Pieces</h2>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <?php require __DIR__ . '/includes/empty-state.php'; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Editorial topics -->
<section class="section" aria-labelledby="topics-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Topics</p>
                <h2 class="section__title" id="topics-heading">Editorial Topics</h2>
                <p class="section__intro">The subjects this section is organised around.</p>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <ol class="topic-rows">
                    <?php foreach ($cards as $topic_index => $card): ?>
                        <?php $topic_count = count(in_category($entries, $card['title'])); ?>
                        <li>
                            <span class="topic-rows__number" aria-hidden="true"><?= sprintf('%02d', $topic_index + 1) ?></span>
                            <div>
                                <h3 class="topic-rows__title"><?= e($card['title']) ?></h3>
                                <p class="topic-rows__text"><?= e($card['text']) ?></p>
                                <p class="topic-rows__count<?= $topic_count ? ' topic-rows__count--listed' : '' ?>">
                                    <?= $topic_count ? $topic_count . ($topic_count === 1 ? ' article' : ' articles') : 'None listed yet' ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</section>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
