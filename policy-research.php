<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Policy & Research';
$page_description = 'Daksh Jain’s research interests in public policy, legislative processes, governance, strategic analysis and the role of evidence in decision-making.';

$hero_eyebrow = 'Policy & Research';
$hero_title   = 'Research That Informs Better Decisions';
$hero_intro   = 'Sound public policy depends on careful research, institutional understanding and an informed assessment of public needs. Daksh Jain’s research interests focus on governance, legislative processes, strategic analysis and the role of evidence in decision-making.';

$cards = [
    ['icon' => 'bi-clipboard-data',  'title' => 'Public Policy Analysis',               'text' => 'Examining policy objectives, implementation considerations, stakeholder needs and the broader implications of public decisions.'],
    ['icon' => 'bi-journal-text',    'title' => 'Legislative Research',                 'text' => 'Understanding legislative processes, parliamentary affairs, policy proposals and the information needed for informed deliberation.'],
    ['icon' => 'bi-building',        'title' => 'Governance and Institutional Research', 'text' => 'Exploring administrative systems, institutional coordination, transparency and public-sector effectiveness.'],
    ['icon' => 'bi-signpost-split',  'title' => 'Strategic Planning',                   'text' => 'Considering priorities, operational challenges, implementation pathways and longer-term institutional objectives.'],
    ['icon' => 'bi-graph-up',        'title' => 'Project Monitoring and Evaluation',    'text' => 'Exploring ways to track implementation, assess progress and identify opportunities for improvement.'],
    ['icon' => 'bi-cpu',             'title' => 'Technology, AI and Digital Governance', 'text' => 'Examining how digital systems and artificial intelligence may affect public services, governance, access, accountability and society.'],
];

$approach = [
    'Define the question'     => 'Establish the issue and its context.',
    'Gather information'      => 'Identify relevant evidence, documents and perspectives.',
    'Analyse'                 => 'Examine implications, constraints and possible approaches.',
    'Develop recommendations' => 'Outline practical, evidence-informed options.',
    'Review implementation'   => 'Consider outcomes, feedback and opportunities to improve.',
];

$excellence = [
    'Administrative efficiency'  => 'How routine work can be organised so that time and resources are used well.',
    'Process improvement'        => 'Identifying steps that can be simplified, clarified or better sequenced.',
    'Transparency'               => 'Making processes and decisions easier to follow and understand.',
    'Organisational development' => 'How institutions build capacity and adapt as their responsibilities change.',
    'Institutional coordination' => 'How offices and institutions share information and work together.',
    'Strategic analysis'         => 'Weighing priorities, constraints and longer-term objectives before acting.',
];

$cta_heading = 'Continue Exploring';
$cta_text    = 'Read Daksh’s writing and more about his interest in parliamentary institutions and governance.';
$cta_links   = [['Articles & Opinions', 'articles'], ['Parliament & Governance', 'parliament'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Research focus areas -->
<section class="section" aria-labelledby="focus-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Focus</p>
            <h2 class="section__title" id="focus-heading">Research Focus Areas</h2>
            <p class="section__intro">These are areas of research interest. They are not a record of completed studies or published work.</p>
        </div>
        <?php require __DIR__ . '/includes/card-grid.php'; ?>
    </div>
</section>

<!-- Research approach -->
<section class="section section--navy" aria-labelledby="approach-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Method</p>
            <h2 class="section__title" id="approach-heading">Research Approach</h2>
            <p class="section__intro">A general approach to working through a policy question, described in five steps. It is a way of working, not an account of a specific project.</p>
        </div>
        <ol class="numbered-grid reveal">
            <?php foreach ($approach as $title => $text): ?>
                <li class="numbered-grid__item">
                    <h3 class="numbered-grid__title"><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- Governance and operational excellence -->
<section class="section section--paper" aria-labelledby="excellence-heading">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Institutions</p>
                <h2 class="section__title" id="excellence-heading">Governance and Operational Excellence</h2>
                <p>Good policy depends on institutions that work well. Daksh is interested in the practical side of governance: how organisations run, coordinate and improve.</p>
                <figure class="framed mt-5">
                    <img src="assets/images/research-reading-room-1000.jpg"
                         srcset="assets/images/research-reading-room-600.jpg 600w, assets/images/research-reading-room-1000.jpg 1000w"
                         sizes="(min-width: 992px) 460px, 92vw"
                         width="1000" height="750" loading="lazy"
                         alt="A reader working at a long desk in a library reading room">
                </figure>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <dl class="deflist deflist--stacked">
                    <?php foreach ($excellence as $term => $text): ?>
                        <div>
                            <dt><?= e($term) ?></dt>
                            <dd><?= e($text) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
    </div>
</section>

<!-- Publications and research outputs -->
<section class="section section--tint" aria-labelledby="outputs-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Outputs</p>
                <h2 class="section__title" id="outputs-heading">Publications and Research Outputs</h2>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <p class="lead-text">No publications are listed here yet.</p>
                <p>This section will feature verified articles, research notes and analytical contributions as they become available.</p>
            </div>
        </div>
    </div>
</section>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
