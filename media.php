<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Media & Public Appearances';
$page_description = 'Verified media coverage, interviews, event photographs and other documented public appearances associated with Daksh Jain.';

$hero_eyebrow = 'Media & Public Appearances';
$hero_title   = 'Documenting Public Engagement';
$hero_intro   = 'This section is intended to bring together verified media coverage, interviews, event photographs and other documented public appearances associated with Daksh Jain.';

// The keys are the categories used by records in content/media.php.
$categories = [
    'News and Press Coverage'         => 'Reports and coverage, with the publication named and linked.',
    'Interviews'                      => 'Interviews given to publications, channels and other platforms.',
    'Public Events'                   => 'Events and occasions attended or addressed.',
    'Photographs'                     => 'Event photographs, each with an accurate caption.',
    'Video and Broadcast Appearances' => 'Recorded and broadcast appearances, linked to their source.',
];

$entries = load_content('media');

$empty_text  = 'Verified media coverage, interviews and public-event documentation will be added as suitable material becomes available.';
$empty_links = [['Public Service', 'public-service'], ['Social Initiatives', 'social'], ['Contact', 'contact']];

if (contact_available()) {
    $cta_heading = 'Media Enquiries';
    $cta_text    = 'For interviews, press enquiries and requests relating to public events, please use the contact page.';
    $cta_links   = [['Contact', 'contact'], ['About Daksh Jain', 'about']];
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Media categories -->
<section class="section" aria-labelledby="categories-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Archive</p>
                <h2 class="section__title" id="categories-heading">Media Categories</h2>
                <p class="section__intro">Material is added only when its source, date and caption can be confirmed.</p>
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
