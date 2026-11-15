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

$empty_text  = 'Verified speeches, presentations and recorded contributions will be listed here when available.';
$empty_links = [['Articles & Opinions', 'articles'], ['Parliament & Governance', 'parliament'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Content sections -->
<section class="section" aria-labelledby="sections-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Contents</p>
                <h2 class="section__title" id="sections-heading">What This Section Covers</h2>
                <p class="section__intro">Each item will carry only confirmed details: its title, the occasion, and the date and venue where known.</p>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <?php require __DIR__ . '/includes/category-sections.php'; ?>
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
