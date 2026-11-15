<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Parliament & Governance';
$page_description = 'Daksh Jain’s exposure to parliamentary affairs and his interests in legislative research, institutional functioning, accountability and governance.';

$hero_eyebrow = 'Parliament & Governance';
$hero_title   = 'Understanding Institutions. Strengthening Public Discourse.';
$hero_intro   = 'Parliamentary institutions and governance systems play an important role in democratic deliberation, public accountability and the development of public policy. This section explores Daksh Jain’s professional exposure to parliamentary affairs and his interests in legislative research, institutional functioning and governance.';

$cards = [
    ['icon' => 'bi-bank',         'title' => 'Parliamentary Affairs',        'text' => 'Parliamentary institutions are where laws are debated and made and where the executive is questioned. Their procedures shape how public issues are raised and examined.'],
    ['icon' => 'bi-journal-text', 'title' => 'Legislative Research',         'text' => 'Sound deliberation depends on understanding a proposal, the issue it addresses, the available evidence and its likely policy implications.'],
    ['icon' => 'bi-shield-check', 'title' => 'Governance and Accountability', 'text' => 'Transparency and institutional responsibility help sustain public confidence in the way decisions are made and carried out.'],
    ['icon' => 'bi-gear',         'title' => 'Administrative Effectiveness', 'text' => 'Coordination, process improvement and efficient administration determine how well a policy works once it has been adopted.'],
    ['icon' => 'bi-people',       'title' => 'Citizen-Centred Governance',   'text' => 'Institutions serve people best when they consider public needs, accessibility and the quality of the service a citizen actually receives.'],
    ['icon' => 'bi-cpu',          'title' => 'Digital Governance',           'text' => 'Technology and artificial intelligence offer public institutions new opportunities, along with questions of access, fairness and accountability.'],
];

$engagement = [
    'Informed debate'                 => 'Public discussion is more useful when it rests on facts, context and a fair account of differing views.',
    'Institutional transparency'      => 'Openness about how institutions work helps people understand, and place confidence in, their decisions.',
    'Accessible public information'   => 'Information serves citizens only when it is easy to find, read and use.',
    'Constructive citizen engagement' => 'Institutions benefit when people take part thoughtfully and offer considered feedback.',
];

$related = [
    'public-service'  => 'Institutional experience, advisory participation and community initiatives.',
    'policy-research' => 'Research interests, focus areas and a general approach to policy questions.',
    'articles'        => 'Articles and opinion pieces on law, policy and public affairs.',
    'speeches'        => 'Speeches and public addresses.',
];

$cta_heading = 'Explore Further';
$cta_text    = 'Learn more about Daksh’s background and his work across law, public policy, research and governance.';
$cta_links   = [['About Daksh Jain', 'about'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Parliamentary experience -->
<section class="section" aria-labelledby="experience-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Experience</p>
                <h2 class="section__title" id="experience-heading">Parliamentary Experience</h2>
                <dl class="facts">
                    <div><dt>Institution</dt><dd>Rajya Sabha Secretariat, Parliament House, New Delhi</dd></div>
                    <div><dt>Period</dt><dd>December 2024 – April 2026</dd></div>
                </dl>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <p class="lead-text">From December 2024 to April 2026, Daksh worked with the Rajya Sabha Secretariat as an Officer on Co-Terminus Basis (Level 11).</p>
                <p>His work involved legislative and parliamentary research, documentation, policy analysis and institutional coordination. The experience informs his continuing interest in how parliamentary institutions function.</p>
                <a class="link-arrow" href="<?= e(page_url('public-service')) ?>">Full Public Service Profile <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Core themes -->
<section class="section section--tint" aria-labelledby="themes-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Themes</p>
            <h2 class="section__title" id="themes-heading">Core Themes</h2>
            <p class="section__intro">General, explanatory notes on the subjects Daksh follows. They are personal perspectives, not official statements or findings from any assignment.</p>
        </div>
        <?php require __DIR__ . '/includes/card-grid.php'; ?>
    </div>
</section>

<!-- Democratic institutions and public engagement -->
<section class="section section--paper" aria-labelledby="engagement-heading">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Public Engagement</p>
                <h2 class="section__title" id="engagement-heading">Democratic Institutions and Public Engagement</h2>
                <p>Democratic institutions work best when citizens can follow what they do and take part in an informed way.</p>
                <figure class="framed framed--wide mt-5">
                    <img src="assets/images/parliament-view-960.jpg"
                         srcset="assets/images/parliament-view-600.jpg 600w, assets/images/parliament-view-960.jpg 960w"
                         sizes="(min-width: 992px) 460px, 92vw"
                         width="960" height="720" loading="lazy"
                         alt="Daksh Jain standing between sandstone columns, with the new Parliament building behind him">
                    <figcaption>Parliament House, New Delhi</figcaption>
                </figure>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <dl class="deflist deflist--stacked">
                    <?php foreach ($engagement as $term => $text): ?>
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

<!-- Related content -->
<section class="section section--tint" aria-labelledby="related-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Related</p>
                <h2 class="section__title" id="related-heading">Related Content</h2>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <ul class="link-list">
                    <?php foreach ($related as $related_key => $text): ?>
                        <li>
                            <a href="<?= e(page_url($related_key)) ?>">
                                <span>
                                    <span class="link-list__title">
                                        <?= e($pages[$related_key]['label']) ?>
                                        <?php if (is_planned($related_key)): ?><span class="tag">In preparation</span><?php endif; ?>
                                    </span>
                                    <span class="link-list__text"><?= e($text) ?></span>
                                </span>
                                <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
