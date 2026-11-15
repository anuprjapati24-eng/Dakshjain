(function () {
    'use strict';

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* Mobile navigation drawer */
    var menu = document.querySelector('[data-menu]');
    var openButton = document.querySelector('[data-menu-open]');

    if (menu && openButton) {
        var panel = menu.querySelector('.mobile-nav__panel');
        var closeButton = menu.querySelector('.mobile-nav__close');

        var background = document.querySelectorAll('.site-header, #main, .site-footer, .back-to-top');

        var setMenu = function (open) {
            menu.classList.toggle('is-open', open);
            document.body.classList.toggle('menu-open', open);
            openButton.setAttribute('aria-expanded', String(open));
            // Keep pointer, keyboard and assistive technology out of the page behind the drawer.
            background.forEach(function (el) { el.inert = open; });
            if (open) {
                closeButton.focus();
            } else {
                openButton.focus();
            }
        };

        openButton.addEventListener('click', function (event) {
            event.preventDefault();
            setMenu(true);
        });

        menu.querySelectorAll('[data-menu-close]').forEach(function (el) {
            el.addEventListener('click', function (event) {
                event.preventDefault();
                setMenu(false);
            });
        });

        // Links styled as buttons should also respond to the space bar.
        [openButton, closeButton].forEach(function (el) {
            el.addEventListener('keydown', function (event) {
                if (event.key === ' ') {
                    event.preventDefault();
                    el.click();
                }
            });
        });

        // Keep keyboard focus inside the open drawer.
        panel.addEventListener('keydown', function (event) {
            if (event.key !== 'Tab') { return; }
            var focusable = panel.querySelectorAll('a[href]');
            var first = focusable[0];
            var last = focusable[focusable.length - 1];
            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && menu.classList.contains('is-open')) {
                setMenu(false);
            }
        });

        window.matchMedia('(min-width: 992px)').addEventListener('change', function (event) {
            if (event.matches && menu.classList.contains('is-open')) {
                setMenu(false);
            }
        });
    }

    /* Desktop dropdowns: click and Escape on top of the CSS hover/focus behaviour */
    var dropdowns = document.querySelectorAll('[data-dropdown]');

    var closeDropdowns = function (except) {
        dropdowns.forEach(function (dropdown) {
            if (dropdown !== except) {
                dropdown.classList.remove('is-open');
                dropdown.querySelector('button').setAttribute('aria-expanded', 'false');
            }
        });
    };

    dropdowns.forEach(function (dropdown) {
        var toggle = dropdown.querySelector('button');

        toggle.addEventListener('click', function () {
            var open = !dropdown.classList.contains('is-open');
            closeDropdowns(dropdown);
            dropdown.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
        });

        dropdown.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeDropdowns();
                dropdown.classList.add('is-dismissed');
                toggle.focus();
            }
        });

        dropdown.addEventListener('focusout', function (event) {
            if (!dropdown.contains(event.relatedTarget)) {
                dropdown.classList.remove('is-open', 'is-dismissed');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });

        dropdown.addEventListener('mouseleave', function () {
            dropdown.classList.remove('is-dismissed');
        });
    });

    document.addEventListener('click', function (event) {
        if (!event.target.closest('[data-dropdown]')) {
            closeDropdowns();
        }
    });

    /* Header shadow and back-to-top visibility */
    var header = document.querySelector('[data-header]');
    var backToTop = document.querySelector('[data-back-to-top]');

    var onScroll = function () {
        var y = window.scrollY;
        if (header) { header.classList.toggle('is-scrolled', y > 8); }
        if (backToTop) { backToTop.classList.toggle('is-visible', y > 900); }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* Photo carousels: previous/next buttons over a native scrolling row */
    document.querySelectorAll('[data-carousel]').forEach(function (carousel) {
        var track = carousel.querySelector('[data-carousel-track]');
        var slides = track.children;
        var controls = carousel.querySelector('[data-carousel-controls]');
        var prev = carousel.querySelector('[data-carousel-prev]');
        var next = carousel.querySelector('[data-carousel-next]');
        var status = carousel.querySelector('[data-carousel-status]');
        if (slides.length < 2) { return; }

        var step = function () {
            return slides[1].offsetLeft - slides[0].offsetLeft;
        };

        var update = function () {
            var max = track.scrollWidth - track.clientWidth;
            var first = Math.min(slides.length, Math.round(track.scrollLeft / step()) + 1);
            var visible = Math.max(1, Math.round(track.clientWidth / step()));
            var last = track.scrollLeft >= max - 2 ? slides.length : Math.min(slides.length, first + visible - 1);
            // aria-disabled rather than disabled, so a button keeps keyboard focus at either end
            prev.setAttribute('aria-disabled', String(track.scrollLeft <= 2));
            next.setAttribute('aria-disabled', String(track.scrollLeft >= max - 2));
            var text = (last > first ? first + '–' + last : String(last)) + ' / ' + slides.length;
            if (status.textContent !== text) { status.textContent = text; }
        };

        var move = function (direction) {
            var visible = Math.max(1, Math.floor(track.clientWidth / step()));
            track.scrollBy({ left: direction * visible * step(), behavior: reducedMotion ? 'auto' : 'smooth' });
        };

        prev.addEventListener('click', function () { move(-1); });
        next.addEventListener('click', function () { move(1); });

        var pending = false;
        track.addEventListener('scroll', function () {
            if (pending) { return; }
            pending = true;
            window.requestAnimationFrame(function () { pending = false; update(); });
        }, { passive: true });
        window.addEventListener('resize', update);

        controls.hidden = false;
        update();
    });

    /* Category filter for listings (articles, speeches) */
    document.querySelectorAll('[data-filter]').forEach(function (filter) {
        var bar = filter.querySelector('[data-filter-bar]');
        if (!bar) { return; }

        var noun = filter.getAttribute('data-filter-noun') || 'article';

        var buttons = bar.querySelectorAll('[data-filter-value]');
        var items = filter.querySelectorAll('[data-category]');
        var empty = filter.querySelector('[data-filter-empty]');
        var status = filter.querySelector('[data-filter-status]');

        bar.hidden = false;

        bar.addEventListener('click', function (event) {
            var button = event.target.closest('[data-filter-value]');
            if (!button) { return; }

            var value = button.getAttribute('data-filter-value');
            var shown = 0;

            buttons.forEach(function (other) {
                other.setAttribute('aria-pressed', String(other === button));
            });

            items.forEach(function (item) {
                var match = value === '' || item.getAttribute('data-category') === value;
                item.hidden = !match;
                if (match) { shown += 1; }
            });

            if (empty) { empty.hidden = shown > 0; }
            if (status) {
                status.textContent = shown + ' ' + noun + (shown === 1 ? '' : 's') + ' shown' +
                    (value === '' ? '.' : ' under ' + value + '.');
            }
        });
    });

    /* Move focus to a form result message so it is announced and visible.
       Done after load because the browser resets focus when it scrolls to the #fragment. */
    var result = document.querySelector('[data-focus]');
    if (result) {
        window.addEventListener('load', function () {
            window.setTimeout(function () { result.focus(); }, 0);
        });
    }

    /* Reveal on scroll */
    var revealItems = document.querySelectorAll('.reveal');

    if (reducedMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

        revealItems.forEach(function (el) { observer.observe(el); });
    }
})();
