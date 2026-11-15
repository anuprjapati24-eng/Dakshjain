<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'About — Law, Governance and Public Service';
$page_description = 'The background, education and interests of Daksh Jain, a legal professional, public policy researcher, social worker and writer.';

$hero_eyebrow = 'About Daksh Jain';
$hero_title   = 'Law, Governance and Public Service';
$hero_intro   = 'Daksh Jain is a legal professional, public policy researcher, social worker and writer with interests spanning governance, parliamentary affairs, institutional research and social development. His work and interests reflect a commitment to informed public discourse, responsible institutions and meaningful community engagement.';

$education = [
    [
        'period' => 'Completed 2022',
        'title'  => 'LL.M.',
        'place'  => 'Kurukshetra University',
        'note'   => 'First Division',
    ],
    [
        'period' => '2015–2020',
        'title'  => 'B.B.A. LL.B. (Hons.)',
        'place'  => 'Guru Gobind Singh Indraprastha University, Delhi',
        'note'   => '',
    ],
];

$interests = [
    'Law and legal research'                                  => 'How legal frameworks are built and interpreted, and how careful research supports sound legal reasoning.',
    'Public policy and governance'                            => 'How policies are shaped, implemented and experienced by the people they are meant to serve.',
    'Parliamentary affairs and legislative research'          => 'The working of parliamentary institutions and the information that supports informed deliberation.',
    'Institutional coordination and administrative efficiency' => 'How institutions organise their work, coordinate with one another and improve their processes.',
    'Social development and community engagement'             => 'Awareness, participation and welfare at the community level.',
    'Technology, artificial intelligence and digital governance' => 'What digital systems and artificial intelligence may mean for public services, access and accountability.',
    'Writing, reading and public communication'               => 'Clear writing and wide reading as a basis for informed public discourse.',
];

$personal_interests = [
    'Social service', 'Yoga', 'Travel', 'Reading spiritual and religious literature',
    'Playing guitar', 'Writing', 'Information technology', 'Engaging with people from diverse backgrounds',
];

$cta_heading = 'Continue Exploring';
$cta_text    = 'Read about Daksh’s public-service experience and his research interests.';
$cta_links   = [['Public Service', 'public-service'], ['Policy & Research', 'policy-research'], ['Contact', 'contact']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<!-- Professional profile -->
<section class="section" aria-labelledby="profile-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Profile</p>
                <h2 class="section__title" id="profile-heading">Professional Profile</h2>
                <?php
                $carousel_images = [15, 2, 18, 76, 88];
                $carousel_label  = 'Photographs of Daksh Jain';
                require __DIR__ . '/includes/carousel.php';
                ?>
            </div>
            <div class="col-lg-7 offset-lg-1 prose reveal">
                <p class="lead-text">Daksh’s interests lie in the relationship between law, public institutions, public policy and citizen welfare — how rules are made, how institutions apply them and what that means for people in practice.</p>
                <p>His professional journey combines legal education, exposure to parliamentary work, research interests and social initiatives. He holds an LL.M. from Kurukshetra University and a B.B.A. LL.B. (Hons.) from Guru Gobind Singh Indraprastha University, Delhi.</p>
                <p>From December 2024 to April 2026 he worked with the Rajya Sabha Secretariat at Parliament House, New Delhi, as an Officer on Co-Terminus Basis (Level 11), where his work involved legislative and parliamentary research, policy analysis, documentation and institutional coordination.</p>
                <p>Alongside this, he serves as General Secretary of Jain Arogya Naturocare Welfare Society and has taken part in public-awareness initiatives relating to health, education, child protection and community development.</p>
                <a class="link-arrow" href="<?= e(page_url('public-service')) ?>">Explore Public Service <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Education -->
<section class="section section--tint" aria-labelledby="education-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Education</p>
                <h2 class="section__title" id="education-heading">Legal Education</h2>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <ol class="timeline">
                    <?php foreach ($education as $item): ?>
                        <li class="timeline__item">
                            <p class="timeline__period"><?= e($item['period']) ?></p>
                            <h3 class="timeline__title"><?= e($item['title']) ?></h3>
                            <p class="timeline__place"><?= e($item['place']) ?></p>
                            <?php if ($item['note'] !== ''): ?>
                                <p class="timeline__note"><?= e($item['note']) ?></p>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Areas of interest -->
<section class="section section--paper" aria-labelledby="interests-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Interests</p>
                <h2 class="section__title" id="interests-heading">Areas of Interest</h2>
                <p class="section__intro">Subjects Daksh follows, reads about and works around. They describe interests rather than formal roles or qualifications.</p>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <dl class="deflist">
                    <?php foreach ($interests as $term => $text): ?>
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

<!-- Beyond professional work -->
<section class="section section--tint" aria-labelledby="beyond-heading">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 reveal">
                <p class="eyebrow">Personal</p>
                <h2 class="section__title" id="beyond-heading">Beyond Professional Work</h2>
            </div>
            <div class="col-lg-7 offset-lg-1 reveal">
                <p>Outside his professional interests, Daksh gives time to social service and practises yoga. He enjoys travel, reads spiritual and religious literature, plays the guitar and writes. He also has an interest in information technology, and values engaging with people from diverse backgrounds.</p>
                <ul class="plain-list plain-list--columns" aria-label="Personal interests">
                    <?php foreach ($personal_interests as $interest): ?>
                        <li><?= e($interest) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Personal philosophy -->
<section class="section section--navy philosophy" aria-labelledby="philosophy-heading">
    <div class="container">
        <div class="narrow reveal">
            <p class="eyebrow">Outlook</p>
            <h2 class="section__title" id="philosophy-heading">Personal Philosophy</h2>
            <blockquote class="philosophy__quote">
                <p>“Success belongs to those who believe in their dreams, work with dedication, and have unwavering faith in the divine.”</p>
            </blockquote>
        </div>
    </div>
</section>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
