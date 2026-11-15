<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Projects & Initiatives';
$page_description = 'Verified initiatives, research contributions and areas of work associated with Daksh Jain.';

$hero_eyebrow = 'Projects & Initiatives';
$hero_title   = 'From Ideas to Practical Engagement';
$hero_intro   = 'Projects create opportunities to connect research, planning and public engagement with practical questions. This section is intended to document verified initiatives, research contributions and areas of work associated with Daksh Jain.';

// The keys are the categories used by records in content/projects.php.
$categories = [
    'Research and Policy'                       => 'Research contributions and policy-related work.',
    'Governance and Institutional Analysis'     => 'Work examining institutions, administration and processes.',
    'Social Awareness and Community Engagement' => 'Awareness campaigns and community initiatives.',
    'Education and Public Outreach'             => 'Efforts to inform, explain and reach a wider public.',
    'Technology and Digital Governance'         => 'Work relating to technology in governance and public services.',
];

$entries = load_content('projects');

$empty_text  = 'This section will document selected research contributions, community initiatives and projects as verified details become available.';
$empty_links = [['Policy & Research', 'policy-research'], ['Public Service', 'public-service'], ['Social Initiatives', 'social'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Project categories -->
<section class="section" aria-labelledby="categories-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Portfolio</p>
                <h2 class="section__title" id="categories-heading">Project Categories</h2>
                <p class="section__intro">How this portfolio is organised. A category describes a kind of work; it is not a claim that a project exists under it.</p>
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
                <h2 class="section__title" id="status-heading">No Projects Listed Yet</h2>
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
