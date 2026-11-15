<?php
require_once __DIR__ . '/includes/config.php';

$page_description = 'Daksh Jain — legal professional, public policy researcher, social worker and writer with experience across law, parliamentary affairs, governance and social development.';

$areas = [
    ['icon' => 'bi-bank',          'title' => 'Law',                   'text' => 'Legal research, legislative understanding and policy interpretation.'],
    ['icon' => 'bi-diagram-3',     'title' => 'Public Policy',         'text' => 'Research, analysis and development of practical policy perspectives.'],
    ['icon' => 'bi-building',      'title' => 'Governance',            'text' => 'Understanding institutions, administration and implementation.'],
    ['icon' => 'bi-journal-text',  'title' => 'Parliamentary Affairs', 'text' => 'Exposure to legislative processes, parliamentary research and institutional functioning.'],
    ['icon' => 'bi-people',        'title' => 'Social Service',        'text' => 'Community initiatives focused on education, health, child protection and social welfare.'],
    ['icon' => 'bi-pen',           'title' => 'Research & Writing',    'text' => 'Strategic analysis, research and informed public discourse.'],
];

$research_interests = ['Public policy', 'Legislative affairs', 'Governance', 'Institutional research', 'Technology and society'];

$social_focus = [
    'Child protection', 'Education', 'Women empowerment', 'Human rights',
    'Prevention of human trafficking', 'Drug awareness', 'Health and wellness', 'Community development',
];

$vision_pillars = ['Knowledge', 'Technology', 'Governance', 'Empathy', 'Integrity'];

// Photographs shown in the About carousel (numbers in assets/images/gallery/).
$featured_photos = [15, 2, 18, 76, 88];

$person_schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Person',
    'name'        => $site['name'],
    'url'         => absolute_url(),
    'description' => $page_description,
];
$person_schema = array_filter($person_schema); // no 'url' while the site address is unknown

require __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero -->
<section class="hero" aria-labelledby="hero-heading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <p class="eyebrow">Law · Public Policy · Governance · Social Impact</p>
                <h1 class="hero__title" id="hero-heading">Daksh Jain</h1>
                <ul class="hero__roles" aria-label="Professional identity">
                    <li>Legal Professional</li>
                    <li>Public Policy Researcher</li>
                    <li>Social Worker</li>
                    <li>Writer</li>
                </ul>
                <p class="lead-text">Daksh Jain is a young legal professional, public policy researcher, social worker and writer with experience across law, parliamentary affairs, governance, public policy, research and social development.</p>
                <p>His work brings together legal knowledge, institutional exposure and an interest in understanding how law, policy, technology and society shape public outcomes.</p>
                <div class="btn-row">
                    <a class="btn-site btn-site--primary" href="<?= e(page_url('about')) ?>">Explore My Journey <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                    <a class="btn-site btn-site--outline" href="<?= e(page_url('public-service')) ?>">Public Service</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <figure class="framed framed--hero">
                    <img src="assets/images/hero-daksh-jain-960.jpg"
                         srcset="assets/images/hero-daksh-jain-640.jpg 640w, assets/images/hero-daksh-jain-960.jpg 960w"
                         sizes="(min-width: 992px) 440px, (min-width: 576px) 448px, 92vw"
                         width="960" height="1200" fetchpriority="high"
                         alt="Daksh Jain standing in a vaulted corridor with an ornate painted ceiling">
                </figure>
            </div>
        </div>
    </div>
</section>

<!-- 2. About -->
<section class="section section--paper" aria-labelledby="about-heading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5 order-2 order-lg-1 reveal">
                <?php
                $carousel_images = $featured_photos;
                $carousel_label  = 'Photographs of Daksh Jain';
                require __DIR__ . '/includes/carousel.php';
                ?>
            </div>
            <div class="col-lg-6 offset-lg-1 order-1 order-lg-2 reveal">
                <p class="eyebrow">About Daksh Jain</p>
                <h2 class="section__title" id="about-heading">A Multidisciplinary Journey in Law, Policy &amp; Public Service</h2>
                <p>Daksh Jain’s professional journey brings together legal education, parliamentary experience, public policy, governance, research and social development.</p>
                <p>With an LL.M. from Kurukshetra University and a B.B.A. LL.B. (Hons.) from Guru Gobind Singh Indraprastha University, Delhi, he has developed a multidisciplinary perspective combining academic knowledge with exposure to public institutions and social initiatives.</p>
                <p>His interests centre on understanding how institutions function, how public policies are shaped and how research can contribute to better outcomes for society.</p>
                <a class="link-arrow" href="<?= e(page_url('about')) ?>">Read More About Daksh <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- 3. Areas of Work -->
<section class="section section--tint" aria-labelledby="areas-heading">
    <div class="container">
        <div class="section__head reveal">
            <p class="eyebrow">Focus</p>
            <h2 class="section__title" id="areas-heading">Areas of Work</h2>
            <p class="section__intro">Daksh’s interests and professional experience span interconnected areas of law, institutions, research and public life.</p>
        </div>
        <ul class="areas reveal">
            <?php foreach ($areas as $i => $area): ?>
                <li class="areas__item">
                    <div class="areas__meta">
                        <span class="areas__number"><?= sprintf('%02d', $i + 1) ?></span>
                        <i class="bi <?= e($area['icon']) ?>" aria-hidden="true"></i>
                    </div>
                    <h3 class="areas__title"><?= e($area['title']) ?></h3>
                    <p><?= e($area['text']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- 4. Public Service highlight -->
<section class="section section--navy" aria-labelledby="service-heading">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6 reveal">
                <p class="eyebrow">Public Service</p>
                <h2 class="section__title" id="service-heading">From Parliament to Public Service</h2>
                <div class="experience">
                    <p class="experience__label">Featured experience</p>
                    <h3 class="experience__org">Rajya Sabha Secretariat</h3>
                    <dl class="experience__facts">
                        <div><dt>Role</dt><dd>Officer on Co-Terminus Basis — Level 11</dd></div>
                        <div><dt>Location</dt><dd>Parliament House, New Delhi</dd></div>
                        <div><dt>Period</dt><dd>December 2024 – April 2026</dd></div>
                    </dl>
                </div>
                <p>Daksh’s experience with the Rajya Sabha Secretariat provided exposure to legislative and parliamentary research, policy analysis, research documentation, governance and institutional coordination.</p>
                <p>This experience contributed to his understanding of India’s parliamentary institutions and the processes through which legislative and public-policy matters are examined.</p>
                <a class="btn-site btn-site--light" href="<?= e(page_url('public-service')) ?>">Explore Public Service <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-5 offset-lg-1 reveal">
                <figure class="framed framed--on-dark">
                    <img src="assets/images/parliament-colonnade-1080.jpg"
                         srcset="assets/images/parliament-colonnade-700.jpg 700w, assets/images/parliament-colonnade-1080.jpg 1080w"
                         sizes="(min-width: 992px) 460px, 92vw"
                         width="1080" height="810" loading="lazy"
                         alt="Daksh Jain standing in the curved sandstone colonnade of Parliament House, New Delhi">
                </figure>
            </div>
        </div>
    </div>
</section>

<!-- 5. Policy & Research -->
<section class="section section--paper" aria-labelledby="research-heading">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-5 reveal">
                <p class="eyebrow">Policy &amp; Research</p>
                <h2 class="section__title" id="research-heading">Research That Serves Society</h2>
                <p class="statement">Good governance begins with good research.</p>
                <figure class="framed">
                    <img src="assets/images/committee-meeting-768.jpg"
                         srcset="assets/images/committee-meeting-600.jpg 600w, assets/images/committee-meeting-768.jpg 768w"
                         sizes="(min-width: 992px) 460px, 92vw"
                         width="768" height="767" loading="lazy"
                         alt="Daksh Jain seated with other members at a committee meeting table">
                </figure>
            </div>
            <div class="col-lg-6 offset-lg-1 reveal">
                <p>Daksh is interested in examining public issues through legal understanding, policy research, institutional analysis and practical problem-solving.</p>
                <p>His broader areas of interest include public policy, legislative affairs, governance, institutional research, technology and society.</p>
                <ul class="plain-list" aria-label="Areas of research interest">
                    <?php foreach ($research_interests as $interest): ?>
                        <li><?= e($interest) ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>He believes research can contribute to better decision-making when it is grounded in evidence and connected to practical implementation.</p>
                <a class="link-arrow" href="<?= e(page_url('policy-research')) ?>">Explore Policy &amp; Research <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- 6. Social Initiatives -->
<section class="section section--tint" aria-labelledby="social-heading">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-6 reveal">
                <p class="eyebrow">Social Initiatives</p>
                <h2 class="section__title" id="social-heading">Creating Impact Beyond Institutions</h2>
                <p>Alongside his professional interests, Daksh has been involved in social-service initiatives through Jain Arogya Naturocare Welfare Society, where he serves as General Secretary.</p>
                <p>His social and public-awareness activities have included initiatives relating to child protection, education, women empowerment, human rights, prevention of human trafficking, drug awareness, health and wellness, and community development.</p>
                <p>He has also contributed to the Beti Bachao, Beti Padhao campaign and other public-awareness initiatives.</p>
                <a class="link-arrow" href="<?= e(page_url('social')) ?>">Explore Social Initiatives <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-5 offset-lg-1 reveal">
                <div class="focus-card">
                    <h3 class="focus-card__title">Areas of social engagement</h3>
                    <ul class="focus-card__list">
                        <?php foreach ($social_focus as $focus): ?>
                            <li><?= e($focus) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Vision -->
<section class="section section--paper vision" aria-labelledby="vision-heading">
    <div class="container">
        <div class="narrow reveal">
            <p class="eyebrow">Vision</p>
            <h2 class="section__title" id="vision-heading">A Young Voice for a Changing India</h2>
            <p>Daksh believes that India’s youth should not merely observe change but participate in creating it.</p>
            <p>As technology, artificial intelligence and digital governance reshape society, he is interested in how institutions can respond to emerging opportunities and challenges while remaining accessible, transparent and citizen-oriented.</p>
            <p class="vision__label">His broader vision brings together:</p>
        </div>
        <ul class="pillars reveal">
            <?php foreach ($vision_pillars as $pillar): ?>
                <li><?= e($pillar) ?></li>
            <?php endforeach; ?>
        </ul>
        <p class="vision__closing reveal">A continuing journey towards a more informed, transparent, innovative and inclusive society.</p>
    </div>
</section>

<!-- Photo gallery -->
<section class="section section--tint gallery" aria-label="Photo gallery">
    <div class="container reveal">
        <?php
        $carousel_images  = gallery_images();
        $carousel_label   = 'Photo gallery';
        $carousel_variant = 'strip';
        require __DIR__ . '/includes/carousel.php';
        ?>
    </div>
</section>

<!-- 8. Personal Philosophy -->
<section class="section section--navy philosophy" aria-labelledby="philosophy-heading">
    <div class="container">
        <div class="narrow reveal">
            <p class="eyebrow">Personal Philosophy</p>
            <h2 class="section__title" id="philosophy-heading">Research. Serve. Learn. Lead.</h2>
            <blockquote class="philosophy__quote">
                <p>“Success belongs to those who believe in their dreams, work with dedication, and have unwavering faith in the divine.”</p>
            </blockquote>
        </div>
    </div>
</section>

<!-- 9. Final CTA -->
<?php require __DIR__ . '/includes/cta.php'; ?>

<script type="application/ld+json"><?= json_encode($person_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>

<?php require __DIR__ . '/includes/footer.php'; ?>
