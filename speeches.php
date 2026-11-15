<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Speeches & Public Addresses';
$page_description = 'Verified speeches, presentations, panel contributions and recorded remarks associated with Daksh Jain.';

$hero_eyebrow = 'Speeches & Public Addresses';
$hero_title   = 'Ideas Shared Through Dialogue';
$hero_intro   = 'Public dialogue helps connect research, institutions and the concerns of society. This section is intended to present verified speeches, presentations and public contributions associated with Daksh Jain.';

// The keys are the categories used by records in content/speeches.php.
$categories = [
    'Speeches and Public Addresses'       => 'Addresses given at public events and occasions.',
    'Panel Discussions and Presentations' => 'Contributions to panels, seminars and presentations.',
    'Recorded Talks and Interviews'       => 'Video or audio recordings, listed once verified.',
    'Event Details and Related Resources' => 'Transcripts, slides and information about the events concerned.',
];

$entries = load_content('speeches');

// The newest record is featured; the rest are shown as filterable cards.
$featured_entries = array_slice($entries, 0, 1);
$more_entries     = array_slice($entries, 1);

$empty_text  = 'Verified speeches, presentations and recorded contributions will be listed here when available.';
$empty_links = [['Articles & Opinions', 'articles'], ['Parliament & Governance', 'parliament'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<?php if ($featured_entries): ?>
<!-- Featured recording -->
<section class="section" aria-labelledby="feature-heading">
    <div class="container">
        <?php
        $speech_entries = $featured_entries;
        $speech_layout  = 'feature';
        require __DIR__ . '/includes/speech-cards.php';
        ?>
    </div>
</section>
<?php endif; ?>

<?php if ($more_entries): ?>
<!-- More recordings -->
<section class="section section--tint" aria-labelledby="archive-heading">
    <div class="container">
        <div class="speech-archive__head reveal">
            <p class="eyebrow">Archive</p>
            <h2 class="section__title" id="archive-heading">More Speeches and Recordings</h2>
        </div>
        <div data-filter data-filter-noun="recording">
            <!-- Shown by main.js; without JavaScript every card stays listed. -->
            <div class="filter-bar speech-filter" role="group" aria-label="Filter recordings by category" hidden data-filter-bar>
                <button class="filter-bar__button" type="button" aria-pressed="true" data-filter-value="">All</button>
                <?php foreach ($categories as $category_title => $category_text): ?>
                    <button class="filter-bar__button" type="button" aria-pressed="false" data-filter-value="<?= e($category_title) ?>"><?= e($category_title) ?></button>
                <?php endforeach; ?>
            </div>
            <p class="visually-hidden" role="status" data-filter-status></p>
            <?php
            $speech_entries = $more_entries;
            $speech_layout  = 'cards';
            require __DIR__ . '/includes/speech-cards.php';
            ?>
            <p class="speech-empty" hidden data-filter-empty>No verified items are listed in this category yet. Choose another category or select All.</p>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Categories -->
<section class="section" aria-labelledby="sections-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Contents</p>
                <h2 class="section__title" id="sections-heading">What This Section Covers</h2>
                <p class="section__intro">Each item carries only confirmed details: its title, the occasion, and the date and venue where known.</p>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <ol class="topic-rows">
                    <?php $topic_number = 0; ?>
                    <?php foreach ($categories as $category_title => $category_text): ?>
                        <?php $topic_count = count(in_category($entries, $category_title)); ?>
                        <li>
                            <span class="topic-rows__number" aria-hidden="true"><?= sprintf('%02d', ++$topic_number) ?></span>
                            <div>
                                <h3 class="topic-rows__title"><?= e($category_title) ?></h3>
                                <p class="topic-rows__text"><?= e($category_text) ?></p>
                                <p class="topic-rows__count<?= $topic_count ? ' topic-rows__count--listed' : '' ?>">
                                    <?= $topic_count ? $topic_count . ($topic_count === 1 ? ' item listed' : ' items listed') : 'None listed yet' ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</section>

<?php if (!$entries): ?>
<!-- Current status -->
<section class="section section--tint" aria-labelledby="status-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Status</p>
                <h2 class="section__title" id="status-heading">No Items Listed Yet</h2>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <?php require __DIR__ . '/includes/empty-state.php'; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
