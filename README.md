# Daksh Jain — Personal Website

Plain PHP, HTML, CSS and vanilla JavaScript. Bootstrap 5 (grid only) and Bootstrap Icons load from a CDN; there is no build step, database or framework.

## Run locally

```bash
php -S localhost:8000
```

Then open <http://localhost:8000>. With XAMPP on macOS the binary is `/Applications/XAMPP/xamppfiles/bin/php`; alternatively place the folder in `htdocs`. PHP 8.0 or newer.

## Structure

```
index.php                 Homepage (nine sections)
about.php, public-service.php, policy-research.php,
parliament-governance.php, social-initiatives.php
                          Content pages
articles.php, speeches.php, media.php, projects.php
                          Listing pages; records come from content/
contact.php               Contact details and contact form
robots.php, sitemap.php   Served as /robots.txt and /sitemap.xml through .htaccess
.htaccess                 Apache/LiteSpeed rules: blocked folders, rewrites, headers, caching
content/
  articles.php, speeches.php, media.php, projects.php
                          Records for the listing pages (currently empty)
includes/
  config.php              Site settings, page list, navigation groups, helpers
  head.php                <head>: title, description, canonical, Open Graph
  header.php              Opens the document; brand and menu button
  nav-desktop.php         Desktop navigation with dropdown groups
  nav-mobile.php          Mobile navigation drawer
  page-hero.php           Eyebrow, heading and intro at the top of inner pages
  card-grid.php           Numbered grid of topic cards
  cta.php                 Shared closing section; one or several links
  entry-list.php          Renders content records
  category-sections.php   Category structure for speeches, media and projects
  empty-state.php         Notice shown while a listing has no records
  carousel.php            Photo carousel (single photo or strip of equal cards)
  contact-handler.php     Contact form validation, CSRF and spam checks, sending
  footer.php              Footer; closes the document
  coming-soon.php         Template for a future page that is not yet built (unused)
                          Flag such a page 'planned' => true in config.php; it is then
                          left out of the sitemap and marked noindex.
assets/
  css/style.css           Design tokens and all custom styles
  js/main.js              Menu, dropdowns, reveal-on-scroll, back-to-top
  images/                 Local image copies
```

## Common tasks

**Add an article, speech, media item or project.** Add a record to the matching file in `content/`; the fields are described at the top of each file. Add verified items only. The page switches from its "none listed yet" notice to the listing by itself, and the Articles page shows its topic filter once there are two or more articles.

**Add a new page.** Follow `about.php`:

```php
<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Speeches';
$page_description = '…';
$hero_eyebrow = '…'; $hero_title = '…'; $hero_intro = '…';
$cta_links = [['Contact', 'contact']];   // optional
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-hero.php';
?>
<!-- page sections -->
<?php
require __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
```

Then add it to `$pages` in `includes/config.php`, then to `$nav` (header) and `$footer_groups` in `includes/footer.php`.

## Configuration

All settings are in `includes/config.php`. Three can instead be set as environment variables, which keeps real values out of the files.

| Setting | Config key | Environment variable | Effect while unset |
| --- | --- | --- | --- |
| Production address, e.g. `https://www.example.com` (no trailing slash) | `url` | `SITE_URL` | On a public host the pages carry no canonical or Open Graph URLs and there is no sitemap. A host name is never taken from the request, except `localhost`, `127.0.0.1` and `*.test` / `*.local` for development. |
| Verified contact email | `email` | `CONTACT_EMAIL` | No address is shown anywhere. |
| Social profiles (`https://` links only) | `social` | — | None shown. |
| Contact form switch | `contact_form` | `CONTACT_FORM=1` | No form. It also needs a valid `email`. |

Values that are not valid (a malformed URL or email, a non-`https` social link) are ignored rather than published.

**Contact behaviour.** While neither an email nor a social profile is set, the site does not invite visitors to get in touch: closing sections link to other pages instead, links to the Contact page are dropped from page content, and the Contact page states that no channel is available. Setting `email` or `social` restores "Get in Touch" everywhere and lists the details on the Contact page and in the footer. No page needs editing.

**Contact form.** Switch it on only after a test message from the server has arrived. It sends with PHP's `mail()` from the configured address, with the visitor's address as Reply-To, and stores nothing. On most shared hosts `mail()` works only when the From address belongs to the site's own domain, so use a mailbox on that domain. Protections: CSRF token, hidden trap field, a three-second minimum, one message a minute per browser session and 20 messages an hour site-wide (`CONTACT_HOURLY_CAP`, kept as timestamps in the system temp directory). The session limits stop casual misuse only; the hourly cap bounds the volume, and an attacker could use it up and block the form for an hour. If that happens, add rate limiting at the host or a CAPTCHA.

**HTTPS and cookies.** Serve the site over HTTPS only and redirect HTTP to HTTPS at the host. The form's session cookie is HttpOnly and SameSite=Lax, and is marked Secure when `url` starts with `https://` or the request is HTTPS. Behind a proxy that terminates HTTPS, setting `url` is what makes it Secure.

**Errors and logging.** On a public host the site turns `display_errors` off itself. Also set, in the hosting PHP settings: `display_errors = Off`, `log_errors = On`, an `error_log` path outside the web root, `expose_php = Off` and `mail.add_x_header = Off`.

**Paths.** Links and assets are relative, so the site works at a domain root or in a subfolder without changes.

**Other servers.** `.htaccess` applies to Apache and LiteSpeed. On nginx, add equivalent rules: deny `includes/`, `content/`, `assets/images/daksh-real-images/`, `README.md` and dotfiles, and map `/robots.txt` and `/sitemap.xml` to `robots.php` and `sitemap.php`. The PHP partials also refuse to run when requested directly.

## Launch checklist

1. Set the real production domain in `url` (or `SITE_URL`).
2. Set the verified `email` and `social` links.
3. Confirm the server can send mail, send a test message to the address, and only then set `contact_form`.
4. Confirm HTTPS works, HTTP redirects to it, and the `contact_session` cookie shows the Secure flag.
5. Turn off public error display and set up error logging (see above).
6. Re-run the checks: every page loads, no broken links or images, the form rejects bad input, keyboard navigation works.
7. Open `/robots.txt` and `/sitemap.xml`; confirm the sitemap lists the eleven pages on the production domain and that page canonicals use it.
8. Confirm `/includes/config.php`, `/content/articles.php`, `/README.md` and `/assets/images/daksh-real-images/` all return 403.
9. Confirm every published photograph and caption has been approved, including the homepage portrait.
10. Test on the production server itself, on a phone and a desktop browser.
11. Take a backup of whatever is currently on the server before uploading.

Known limits: no Content-Security-Policy header is sent (the page loads fonts, Bootstrap and icons from CDNs); Bootstrap's full stylesheet and the icon font are loaded although only part of each is used.

## Design system

Colours, fonts, type scale and section spacing are CSS custom properties at the top of `assets/css/style.css`. Headings use Newsreader, body text uses Public Sans (Google Fonts). Reusable classes: `.section` with `--paper`, `--tint` or `--navy`; `.eyebrow`; `.section__title`; `.btn-site` with `--primary`, `--outline` or `--light`; `.link-arrow`; `.framed` for images; `.reveal` for scroll-in. Inner pages add `.facts` (label–value rows), `.timeline`, `.deflist` (term–description rows), `.dash-list`, `.numbered-grid` (steps and principles on navy), `.link-list`, `.note` and `.tag`.

## Images

`daksh-real-images/` holds the supplied original photographs, named `image-1.jpeg` to `image-78.jpeg`. `gallery/` holds a web-sized copy of each (`image-N.jpg`, longest side 800 px); these are what the site shows. `hero-daksh-jain-*` are cropped copies of `image-60.jpeg` used in the homepage hero. The remaining photographs are from Unsplash (Unsplash License), stored locally; none of them shows Daksh Jain.

**Carousels.** `includes/carousel.php` shows gallery photos. The homepage About section and the About page show photos 1–5, one at a time; the strip below Vision on the homepage shows every photo in `gallery/`. To add a photo, put the original in `daksh-real-images/` as the next number and a resized copy in `gallery/`:

```bash
sips -Z 800 -s format jpeg -s formatOptions 68 assets/images/daksh-real-images/image-79.jpeg --out assets/images/gallery/image-79.jpg
```

To remove a photo from the site, delete its file from `gallery/`. Photos carry no captions; their alt text is generic ("Daksh Jain, photograph 3 of 78").

| File | Photographer | Source |
| --- | --- | --- |
| `secretariat-reflection-*` | Zoshua Colah | https://unsplash.com/photos/e3mU98_L2hU |
| `research-reading-room-*` | Zoshua Colah | https://unsplash.com/photos/klbApl9mxr0 |

`og-default.png` (1200 × 630) is the link-preview image: the name and tagline on navy, with no photograph. `favicon.svg` is a placeholder "DJ" monogram.

On Apache/LiteSpeed, `.htaccess` blocks web access to `assets/images/daksh-real-images/`, so only the web-sized copies are served, not the full-size originals.

## Pending

Needed from the site owner:

- Confirmation that the homepage portrait shows Daksh Jain.
- Captions (who, where, when) for the photographs, if they are to be captioned or listed on the Media page.
- Verified email address and social profile links.
- Production domain.
- Dates and current/past status of the advisory committee memberships and the WCCB volunteer role. The pages use tense-neutral wording until confirmed.
- Verified articles, speeches, media items and projects for the files in `content/`.
- Real favicon or branding, if any.

Not yet done:

- Real email delivery has not been tested; no recipient address exists.
- No screen-reader testing, and no testing in Safari, Firefox or on a physical phone.
- No test on a production server.
