<?php
require __DIR__ . '/includes/contact-handler.php';

$page_title   = 'Contact';
$hero_eyebrow = 'Contact';

if (contact_available()) {
    $page_description = 'Contact Daksh Jain for professional correspondence, research discussions, writing and public-policy conversations.';
    $hero_title       = 'Let’s Connect';
    $hero_intro       = 'For professional correspondence, research discussions, writing, public-policy conversations and opportunities for constructive collaboration, please use the verified contact channels listed on this page.';
} else {
    // Nothing is configured in includes/config.php yet, so the page says so.
    $page_description = 'Verified contact details for Daksh Jain will be published on this page.';
    $hero_title       = 'Contact Details';
    $hero_intro       = 'Verified contact details for Daksh Jain have not been published yet. They will be listed on this page once they are confirmed.';
}

$fields = [
    'name'    => ['label' => 'Name',    'type' => 'text',  'autocomplete' => 'name',  'maxlength' => 100],
    'email'   => ['label' => 'Email',   'type' => 'email', 'autocomplete' => 'email', 'maxlength' => 254],
    'subject' => ['label' => 'Subject', 'type' => 'text',  'autocomplete' => 'off',   'maxlength' => 150],
];

$cta_heading = 'Explore Further';
$cta_text    = 'Read about Daksh’s background and his writing on law, policy and public affairs.';
$cta_links   = [['About Daksh Jain', 'about'], ['Articles & Opinions', 'articles']];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>

<section class="section" aria-labelledby="channels-heading">
    <div class="container">
        <div class="row gy-5">
            <!-- Contact details -->
            <div class="col-lg-4">
                <p class="eyebrow">Channels</p>
                <h2 class="section__title" id="channels-heading"><?= contact_available() ? 'Contact Details' : 'Current Status' ?></h2>
                <?php if (!contact_available()): ?>
                    <p>No email address, social profile or contact form is available at present.</p>
                <?php else: ?>
                    <dl class="facts">
                        <?php if ($site['email'] !== ''): ?>
                            <div><dt>Email</dt><dd><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></dd></div>
                        <?php endif; ?>
                        <?php foreach ($site['social'] as $social_label => $social_url): ?>
                            <div><dt><?= e($social_label) ?></dt><dd><a href="<?= e($social_url) ?>" rel="me noopener"><?= e(preg_replace('#^https?://(www\.)?#i', '', rtrim($social_url, '/'))) ?></a></dd></div>
                        <?php endforeach; ?>
                    </dl>
                <?php endif; ?>
                <p class="note">This is a personal website. It is not an official channel of any government body or institution.</p>
            </div>

            <!-- Contact form, or a plain statement of what is available instead -->
            <div class="col-lg-7 offset-lg-1" id="contact-form">
                <?php if (!contact_available()): ?>
                    <div class="alert-site" role="note">
                        <p><strong>It is not yet possible to get in touch through this website.</strong></p>
                        <p>Contact details will be added here once they have been verified. Until then, the rest of the site describes Daksh’s background, public-service experience and research interests.</p>
                    </div>
                <?php elseif (!$form['enabled']): ?>
                    <div class="alert-site" role="note">
                        <p><strong>There is no contact form on this page.</strong></p>
                        <p>Please use the contact details listed here.</p>
                    </div>
                <?php elseif ($form['status'] === 'sent'): ?>
                    <h2 class="form-title">Send a Message</h2>
                    <div class="alert-site alert-site--success" role="status" tabindex="-1" data-focus>
                        <p><strong>Your message has been sent.</strong></p>
                        <p>Thank you for writing. <a href="<?= e(page_url('contact')) ?>#contact-form">Send another message</a>.</p>
                    </div>
                <?php else: ?>
                    <h2 class="form-title">Send a Message</h2>
                    <?php if ($form['errors']): ?>
                        <div class="alert-site alert-site--error" role="alert" tabindex="-1" data-focus>
                            <?php if (isset($form['errors']['form'])): ?>
                                <p><strong><?= e($form['errors']['form']) ?></strong></p>
                            <?php else: ?>
                                <p><strong>Your message was not sent. Please correct the following:</strong></p>
                                <ul>
                                    <?php foreach ($form['errors'] as $field => $message): ?>
                                        <li><a href="#field-<?= e($field) ?>"><?= e($message) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <form class="form-site" method="post" action="<?= e(page_url('contact')) ?>#contact-form" novalidate>
                        <input type="hidden" name="token" value="<?= e($form['token']) ?>">
                        <p class="form-site__hint">All fields are required.</p>

                        <?php foreach ($fields as $name => $field): ?>
                            <?php $error = $form['errors'][$name] ?? ''; ?>
                            <div class="field">
                                <label class="field__label" for="field-<?= e($name) ?>"><?= e($field['label']) ?></label>
                                <input class="field__input" id="field-<?= e($name) ?>" name="<?= e($name) ?>" type="<?= e($field['type']) ?>"
                                       value="<?= e($form['values'][$name]) ?>" maxlength="<?= (int) $field['maxlength'] ?>"
                                       autocomplete="<?= e($field['autocomplete']) ?>" required
                                       <?php if ($error !== ''): ?>aria-invalid="true" aria-describedby="error-<?= e($name) ?>"<?php endif; ?>>
                                <?php if ($error !== ''): ?>
                                    <p class="field__error" id="error-<?= e($name) ?>"><?= e($error) ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                        <?php $error = $form['errors']['message'] ?? ''; ?>
                        <div class="field">
                            <label class="field__label" for="field-message">Message</label>
                            <textarea class="field__input" id="field-message" name="message" rows="7" maxlength="5000" required
                                      <?php if ($error !== ''): ?>aria-invalid="true" aria-describedby="error-message"<?php endif; ?>><?= e($form['values']['message']) ?></textarea>
                            <?php if ($error !== ''): ?>
                                <p class="field__error" id="error-message"><?= e($error) ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Spam trap: hidden from sighted users and labelled for screen readers. -->
                        <div class="visually-hidden">
                            <label for="field-website">Leave this field empty</label>
                            <input id="field-website" name="website" type="text" tabindex="-1" autocomplete="off">
                        </div>

                        <button class="btn-site btn-site--primary" type="submit">Send Message <i class="bi bi-arrow-right" aria-hidden="true"></i></button>

                        <p class="form-site__privacy">Privacy: the details you enter are used only to email your message to Daksh Jain so that he can reply. They are not stored on this website. A temporary cookie protects the form from misuse and holds none of your details. Please do not include sensitive personal information.</p>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
