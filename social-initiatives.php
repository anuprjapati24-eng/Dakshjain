<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Social Initiatives';
$page_description = 'Daksh Jain’s involvement in community and social-awareness work: health, education, child protection, human rights, wildlife conservation and community welfare.';

$hero_eyebrow = 'Social Initiatives';
$hero_title   = 'Community Engagement. Awareness. Social Responsibility.';
$hero_intro   = 'Meaningful social development depends on awareness, participation and sustained attention to community needs. Daksh Jain’s involvement in social initiatives reflects interests in health awareness, education, child protection, human rights, wildlife conservation and community welfare.';

$society_areas = [
    'Health awareness and wellness',
    'Education and child protection',
    'Women’s empowerment',
    'Human rights awareness',
    'Anti-human-trafficking awareness',
    'Drug awareness and rehabilitation-related initiatives',
    'Community development',
];

$principles = [
    'Awareness and education'            => 'Helping people understand an issue is often the first step towards addressing it.',
    'Community participation'            => 'Initiatives work best when the community concerned takes part in them.',
    'Human dignity and inclusion'        => 'Every person is to be treated with respect, whatever their circumstances.',
    'Public health and wellness'         => 'Health and well-being are central to a community’s welfare.',
    'Environmental responsibility'       => 'Care for wildlife and the natural environment is a shared duty.',
    'Respect for vulnerable communities' => 'Work with vulnerable people calls for sensitivity, care and regard for their privacy.',
];

$cta_heading = 'Continue Exploring';
$cta_text    = 'Read about Daksh’s public-service experience and his background.';
$cta_links   = [['Public Service', 'public-service'], ['About Daksh Jain', 'about'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Jain Arogya Naturocare Welfare Society -->
<section class="section" aria-labelledby="society-heading">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-6 reveal">
                <p class="eyebrow">General Secretary</p>
                <h2 class="section__title" id="society-heading">Jain Arogya Naturocare Welfare Society</h2>
                <p class="lead-text">Daksh serves as General Secretary of Jain Arogya Naturocare Welfare Society.</p>
                <p>Through the Society he has been involved in social-service and public-awareness initiatives.</p>
            </div>
            <div class="col-lg-5 offset-lg-1 reveal">
                <div class="focus-card">
                    <h3 class="focus-card__title">Areas of involvement include</h3>
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

<!-- Beti Bachao, Beti Padhao -->
<section class="section section--tint" aria-labelledby="beti-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Public Awareness</p>
                <h2 class="section__title" id="beti-heading">Beti Bachao, Beti Padhao</h2>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <p class="lead-text">Daksh has contributed to the Beti Bachao, Beti Padhao campaign and to related public-awareness initiatives.</p>
                <p>The welfare and education of girls matter to families, to communities and to society as a whole. Awareness plays a part in this: it helps people recognise the value of educating girls and of protecting their rights and opportunities.</p>
                <p class="note">Beti Bachao, Beti Padhao is a Government of India programme. This page does not suggest that Daksh leads or represents it.</p>
            </div>
        </div>
    </div>
</section>

<!-- Wildlife conservation awareness -->
<section class="section section--paper" aria-labelledby="wildlife-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Wildlife Conservation Awareness</p>
                <h2 class="section__title" id="wildlife-heading">Volunteer — Wildlife Crime Control Bureau (WCCB)</h2>
                <p class="section__intro">Ministry of Environment, Forest and Climate Change, Government of India</p>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <p class="lead-text">As a volunteer with the Wildlife Crime Control Bureau, Daksh’s focus has been on wildlife conservation awareness and on the problem of wildlife crime.</p>
                <p>Public awareness supports conservation by helping people understand why wildlife needs protection and why crimes against it are harmful.</p>
                <p class="note">This page describes voluntary involvement in awareness work. It does not describe any enforcement or investigative role.</p>
            </div>
        </div>
    </div>
</section>

<!-- Community engagement principles -->
<section class="section section--navy" aria-labelledby="principles-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Themes</p>
            <h2 class="section__title" id="principles-heading">Community Engagement Principles</h2>
            <p class="section__intro">Themes that run through this work. They describe an approach, not measured results.</p>
        </div>
        <ul class="numbered-grid numbered-grid--three reveal">
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
