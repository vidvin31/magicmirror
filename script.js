/* ===================================================
   MAGIC MIRROR — Modern Interactions
   Custom cursor · Smooth reveals · Parallax · Tilt
   =================================================== */

document.addEventListener('DOMContentLoaded', () => {

    // ─── Preloader ───
    const preloader = document.getElementById('preloader');
    window.addEventListener('load', () => {
        setTimeout(() => preloader.classList.add('done'), 1800);
    });
    // Fallback: hide preloader after 3s
    setTimeout(() => preloader.classList.add('done'), 3000);

    // ─── Custom Cursor ───
    const dot = document.getElementById('cursorDot');
    const ring = document.getElementById('cursorRing');
    let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

    if (window.matchMedia('(hover: hover)').matches) {
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            dot.style.left = mouseX + 'px';
            dot.style.top = mouseY + 'px';
        });

        function animateRing() {
            ringX += (mouseX - ringX) * 0.15;
            ringY += (mouseY - ringY) * 0.15;
            ring.style.left = ringX + 'px';
            ring.style.top = ringY + 'px';
            requestAnimationFrame(animateRing);
        }
        animateRing();

        // Hover effect on interactive elements
        const hoverTargets = 'a, button, input, select, textarea, [data-tilt], .mosaic-item';
        document.querySelectorAll(hoverTargets).forEach(el => {
            el.addEventListener('mouseenter', () => ring.classList.add('hover'));
            el.addEventListener('mouseleave', () => ring.classList.remove('hover'));
        });
    }

    // ─── Navbar scroll ───
    const navbar = document.getElementById('navbar');
    const onScroll = () => {
        navbar.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // ─── Mobile menu ───
    const toggle = document.getElementById('navToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    toggle.addEventListener('click', () => {
        toggle.classList.toggle('active');
        mobileMenu.classList.toggle('open');
        document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
    });

    mobileMenu.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
            toggle.classList.remove('active');
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
        });
    });

    // ─── Smooth scroll ───
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // ─── Reveal on scroll ───
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                // Stagger siblings
                const siblings = entry.target.parentElement.querySelectorAll('.reveal');
                let delay = 0;
                siblings.forEach((sib) => {
                    if (sib === entry.target) {
                        entry.target.style.transitionDelay = delay + 'ms';
                    }
                    delay += 80;
                });
                setTimeout(() => entry.target.classList.add('visible'), 10);
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    revealEls.forEach(el => revealObserver.observe(el));

    // ─── Counter animation ───
    const counters = document.querySelectorAll('.stat-num[data-target]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => counterObserver.observe(c));

    function animateCounter(el) {
        const target = parseInt(el.dataset.target, 10);
        const duration = 2200;
        const start = performance.now();

        function tick(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 4);
            el.textContent = Math.floor(eased * target);
            if (progress < 1) requestAnimationFrame(tick);
            else el.textContent = target;
        }
        requestAnimationFrame(tick);
    }

    // ─── Testimonials Carousel ───
    const tCards = document.querySelectorAll('.t-card');
    const tDots = document.querySelectorAll('.t-dot');
    const prevBtn = document.querySelector('.t-prev');
    const nextBtn = document.querySelector('.t-next');
    let tCurrent = 0;
    let tTimer;

    function showTestimonial(i) {
        tCards.forEach(c => c.classList.remove('active'));
        tDots.forEach(d => d.classList.remove('active'));
        tCards[i].classList.add('active');
        tDots[i].classList.add('active');
        tCurrent = i;
    }

    function nextTestimonial() {
        showTestimonial((tCurrent + 1) % tCards.length);
    }

    function prevTestimonial() {
        showTestimonial((tCurrent - 1 + tCards.length) % tCards.length);
    }

    function resetTimer() {
        clearInterval(tTimer);
        tTimer = setInterval(nextTestimonial, 5000);
    }

    tDots.forEach(dot => {
        dot.addEventListener('click', () => {
            showTestimonial(parseInt(dot.dataset.i, 10));
            resetTimer();
        });
    });

    if (nextBtn) nextBtn.addEventListener('click', () => { nextTestimonial(); resetTimer(); });
    if (prevBtn) prevBtn.addEventListener('click', () => { prevTestimonial(); resetTimer(); });
    resetTimer();

    // ─── Tilt effect on cards ───
    if (window.matchMedia('(hover: hover)').matches) {
        document.querySelectorAll('[data-tilt]').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                card.style.transform = `perspective(800px) rotateY(${x * 5}deg) rotateX(${-y * 5}deg) translateY(-4px)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    }

    // ─── Booking form ───
    const form = document.getElementById('bookingForm');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const nameVal = form.querySelector('#name').value;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnHTML = submitBtn.innerHTML;

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Sending...</span>';

            // Collect form data + device info
            const formData = new FormData(form);
            formData.append('screen_size', window.screen.width + 'x' + window.screen.height);
            formData.append('platform', navigator.platform || navigator.userAgentData?.platform || '');
            formData.append('language', navigator.language || '');

            fetch('send-booking.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    form.parentElement.innerHTML = `
                        <div class="form-success">
                            <div class="success-checkmark">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <h3>Thank You, ${nameVal}!</h3>
                            <p>Your appointment request has been received. We'll contact you within 24 hours to confirm.</p>
                        </div>
                    `;
                } else {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHTML;
                    alert(data.message || 'Something went wrong. Please try again.');
                }
            })
            .catch(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHTML;
                alert('Network error. Please try again or call us at +91 9947758899.');
            });
        });
    }

    // ─── Set min date ───
    const dateInput = document.getElementById('date');
    if (dateInput) {
        dateInput.setAttribute('min', new Date().toISOString().split('T')[0]);
    }

    // ─── Parallax on hero orbs ───
    if (window.matchMedia('(hover: hover)').matches) {
        const orbs = document.querySelectorAll('.gradient-orb');
        window.addEventListener('mousemove', (e) => {
            const cx = e.clientX / window.innerWidth - 0.5;
            const cy = e.clientY / window.innerHeight - 0.5;
            orbs.forEach((orb, i) => {
                const speed = (i + 1) * 15;
                orb.style.transform = `translate(${cx * speed}px, ${cy * speed}px)`;
            });
        });
    }

    // ─── Gallery Page: Filter ───
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryCards = document.querySelectorAll('.gallery-card');

    if (filterBtns.length && galleryCards.length) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const filter = btn.dataset.filter;

                galleryCards.forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    }

    // ─── Gallery Page: Lightbox ───
    const zoomBtns = document.querySelectorAll('.gallery-card-zoom');
    if (zoomBtns.length) {
        // Create lightbox markup
        const overlay = document.createElement('div');
        overlay.className = 'lightbox-overlay';
        overlay.innerHTML = `
            <button class="lightbox-close" aria-label="Close">&times;</button>
            <button class="lightbox-nav lightbox-prev" aria-label="Previous">&#8249;</button>
            <button class="lightbox-nav lightbox-next" aria-label="Next">&#8250;</button>
            <div class="lightbox-content">
                <div class="lightbox-img"></div>
                <div class="lightbox-info"><h3></h3><p></p></div>
            </div>
        `;
        document.body.appendChild(overlay);

        let currentIndex = 0;
        const visibleCards = () => Array.from(galleryCards).filter(c => !c.classList.contains('hidden'));

        function openLightbox(index) {
            const cards = visibleCards();
            if (index < 0 || index >= cards.length) return;
            currentIndex = index;
            const card = cards[currentIndex];
            const title = card.querySelector('h3')?.textContent || '';
            const desc = card.querySelector('.gallery-card-overlay p')?.textContent || '';
            overlay.querySelector('.lightbox-info h3').textContent = title;
            overlay.querySelector('.lightbox-info p').textContent = desc;
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        function navigateLightbox(dir) {
            const cards = visibleCards();
            currentIndex = (currentIndex + dir + cards.length) % cards.length;
            const card = cards[currentIndex];
            const title = card.querySelector('h3')?.textContent || '';
            const desc = card.querySelector('.gallery-card-overlay p')?.textContent || '';
            overlay.querySelector('.lightbox-info h3').textContent = title;
            overlay.querySelector('.lightbox-info p').textContent = desc;
        }

        zoomBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const card = btn.closest('.gallery-card');
                const cards = visibleCards();
                const idx = cards.indexOf(card);
                openLightbox(idx);
            });
        });

        overlay.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
        overlay.querySelector('.lightbox-prev').addEventListener('click', () => navigateLightbox(-1));
        overlay.querySelector('.lightbox-next').addEventListener('click', () => navigateLightbox(1));
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (!overlay.classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') navigateLightbox(-1);
            if (e.key === 'ArrowRight') navigateLightbox(1);
        });
    }
});
