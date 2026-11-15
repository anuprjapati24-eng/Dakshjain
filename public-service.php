<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Public Service';
$page_description = 'Daksh Jain’s public-service experience: the Rajya Sabha Secretariat (December 2024 – April 2026), advisory committee participation, wildlife conservation volunteering and community initiatives.';

$hero_eyebrow = 'Public Service';
$hero_title   = 'Contributing Through Institutions and Community Engagement';
$hero_intro   = 'Public service brings together institutional responsibility, citizen concerns and the pursuit of practical solutions. Daksh Jain’s experience includes parliamentary research exposure, advisory participation and community initiatives across areas of public interest.';

$secretariat_exposure = [
    'Legislative and parliamentary research',
    'Policy research and analysis',
    'Documentation and institutional coordination',
    'Governance and public policy analysis',
    'Parliamentary and administrative matters',
    'Strategic research support',
];

$committees = [
    [
        'title' => 'Member — Airport Advisory Committee',
        'body'  => 'Ministry of Civil Aviation, Government of India',
        'areas' => [
            'Passenger facilities and public convenience',
            'Airport infrastructure',
            'Customer satisfaction',
            'Transparency and service experience',
        ],
    ],
    [
        'title' => 'Member — Telecom Advisory Committee',
        'body'  => 'Ministry of Communications, Government of India',
        'areas' => [
            'Telecom services and citizen concerns',
            'Public outreach',
            'Digital connectivity',
            'Issues affecting service users',
        ],
    ],
];

$society_areas = [
    'Health awareness and wellness',
    'Education and child protection',
    'Women’s empowerment and human rights',
    'Anti-human-trafficking awareness',
    'Drug awareness and rehabilitation-related initiatives',
    'Community development',
];

$principles = [
    'Citizen-centric thinking'               => 'Beginning with the needs and experience of the people a service is meant for.',
    'Institutional responsibility'           => 'Respecting the role, processes and limits of public institutions.',
    'Transparency and accountability'        => 'Valuing openness about how decisions are reached and carried out.',
    'Awareness and community participation'  => 'Encouraging people to be informed about, and involved in, matters that affect them.',
    'Evidence-informed problem-solving'      => 'Looking to research and facts before settling on a course of action.',
];

$cta_heading = 'Continue Exploring';
$cta_text    = 'Read more about Daksh’s interest in parliamentary institutions and his community work.';
$cta_links   = [['Parliament & Governance', 'parliament'], ['Social Initiatives', 'social'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Rajya Sabha Secretariat -->
<section class="section" aria-labelledby="secretariat-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Parliamentary Experience</p>
                <h2 class="section__title" id="secretariat-heading">Rajya Sabha Secretariat</h2>
                <dl class="facts">
                    <div><dt>Role</dt><dd>Officer on Co-Terminus Basis — Level 11</dd></div>
                    <div><dt>Location</dt><dd>Parliament House, New Delhi</dd></div>
                    <div><dt>Period</dt><dd>December 2024 – April 2026</dd></div>
                </dl>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <p class="lead-text">From December 2024 to April 2026, Daksh worked with the Rajya Sabha Secretariat as an Officer on Co-Terminus Basis (Level 11). The role concluded in April 2026.</p>
                <p>Responsibilities and exposure included:</p>
                <ul class="dash-list">
                    <?php foreach ($secretariat_exposure as $item): ?>
                        <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                </ul>
                <p class="mt-4">The experience gave him a working understanding of how parliamentary institutions function and of the research and documentation that support legislative and public-policy work.</p>
            </div>
        </div>
    </div>
</section>

<!-- Advisory participation -->
<section class="section section--tint" aria-labelledby="advisory-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Advisory Participation</p>
            <h2 class="section__title" id="advisory-heading">Advisory Committees</h2>
            <p class="section__intro">Daksh’s public-service involvement includes membership of two advisory committees.</p>
        </div>
        <div class="row gy-4 reveal">
            <?php foreach ($committees as $committee): ?>
                <div class="col-lg-6">
                    <article class="focus-card h-100">
                        <h3 class="focus-card__title"><?= e($committee['title']) ?></h3>
                        <p class="focus-card__meta"><?= e($committee['body']) ?></p>
                        <p>Areas of input have included:</p>
                        <ul class="dash-list">
                            <?php foreach ($committee['areas'] as $area): ?>
                                <li><?= e($area) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="note reveal">Nothing on this page is a statement by, or on behalf of, either ministry or committee.</p>
    </div>
</section>

<!-- Wildlife conservation -->
<section class="section section--paper" aria-labelledby="wildlife-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Wildlife Conservation</p>
                <h2 class="section__title" id="wildlife-heading">Volunteer — Wildlife Crime Control Bureau</h2>
                <p class="section__intro">Ministry of Environment, Forest and Climate Change, Government of India</p>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <p>As a volunteer with the Wildlife Crime Control Bureau (WCCB), Daksh has been involved in wildlife conservation awareness and in supporting efforts relating to wildlife crime.</p>
                <p>This page describes voluntary involvement in awareness work. It does not describe any enforcement or investigative role.</p>
            </div>
        </div>
    </div>
</section>

<!-- Community and social initiatives -->
<section class="section section--tint" aria-labelledby="community-heading">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-6 reveal">
                <p class="eyebrow">Community and Social Initiatives</p>
                <h2 class="section__title" id="community-heading">Jain Arogya Naturocare Welfare Society</h2>
                <p>Daksh serves as General Secretary of Jain Arogya Naturocare Welfare Society, through which he has been involved in social-service and public-awareness initiatives.</p>
                <p>He has also contributed to the Beti Bachao, Beti Padhao campaign and other public-awareness initiatives.</p>
                <a class="link-arrow" href="<?= e(page_url('social')) ?>">Social Initiatives <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-5 offset-lg-1 reveal">
                <div class="focus-card">
                    <h3 class="focus-card__title">Areas of involvement</h3>
                    <ul class="dash-list">
                        <?php foreach ($society_areas as $area): ?>
                            <li><?= e($area) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Public service principles -->
<section class="section section--navy" aria-labelledby="principles-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Guiding Principles</p>
            <h2 class="section__title" id="principles-heading">Public Service Principles</h2>
            <p class="section__intro">The ideas that guide how Daksh approaches public service.</p>
        </div>
        <ul class="numbered-grid reveal">
            <?php foreach ($principles as $title => $text): ?>
                <li class="numbered-grid__item">
                    <h3 class="numbered-grid__title"><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
