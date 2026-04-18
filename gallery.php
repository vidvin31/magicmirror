<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery — Magic Mirror Makeover Studio</title>
    <link rel="icon" type="image/png" href="logo-pink.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Custom Cursor -->
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <img src="logo-pink.png" alt="Magic Mirror" class="preloader-logo">
            <div class="preloader-bar"><div class="preloader-fill"></div></div>
        </div>
    </div>

    <!-- ========== NAVIGATION ========== -->
    <nav class="navbar" id="navbar">
        <div class="nav-inner">
            <a href="index.php" class="nav-logo">
                <img src="logo-pink.png" alt="Magic Mirror">
            </a>
            <div class="nav-center">
                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.php" class="nav-link" data-text="Home">Home</a></li>
                    <li><a href="index.php#about" class="nav-link" data-text="About">About</a></li>
                    <li><a href="index.php#services" class="nav-link" data-text="Services">Services</a></li>
                    <li><a href="gallery.php" class="nav-link active" data-text="Gallery">Gallery</a></li>
                    <li><a href="index.php#testimonials" class="nav-link" data-text="Reviews">Reviews</a></li>
                </ul>
            </div>
            <div class="nav-right">
                <a href="index.php#booking" class="nav-cta">
                    <span>Book Now</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
                    <div class="hamburger">
                        <span></span><span></span>
                    </div>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-inner">
            <ul class="mobile-nav-links">
                <li><a href="index.php" class="mobile-link"><span>Home</span></a></li>
                <li><a href="index.php#about" class="mobile-link"><span>About</span></a></li>
                <li><a href="index.php#services" class="mobile-link"><span>Services</span></a></li>
                <li><a href="gallery.php" class="mobile-link"><span>Gallery</span></a></li>
                <li><a href="index.php#testimonials" class="mobile-link"><span>Reviews</span></a></li>
                <li><a href="index.php#booking" class="mobile-link"><span>Book Now</span></a></li>
            </ul>
            <div class="mobile-menu-footer">
                <p>hello@magicmirror.com</p>
                <p>+91 9947758899</p>
            </div>
        </div>
    </div>

    <!-- ========== GALLERY HERO ========== -->
    <section class="gallery-page-hero">
        <div class="container">
            <div class="gallery-hero-content">
                <div class="section-tag reveal">Our Portfolio</div>
                <h1 class="gallery-page-title reveal">Transformation <em>Gallery</em></h1>
                <p class="gallery-page-subtitle reveal">Every face tells a story. Explore our finest makeovers, bridal looks, and beauty transformations that have made our clients shine.</p>
            </div>
        </div>
        <div class="gallery-hero-orb gallery-hero-orb-1"></div>
        <div class="gallery-hero-orb gallery-hero-orb-2"></div>
    </section>

    <!-- ========== GALLERY FILTER & GRID ========== -->
    <section class="gallery-page-section">
        <div class="container">
            <!-- Filter Tabs -->
            <div class="gallery-filters reveal">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="bridal">Bridal</button>
                <button class="filter-btn" data-filter="glam">Glam</button>
                <button class="filter-btn" data-filter="hair">Hair</button>
                <button class="filter-btn" data-filter="makeover">Makeover</button>
                <button class="filter-btn" data-filter="skincare">Skincare</button>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid">
                <!-- Row 1 -->
                <div class="gallery-card reveal" data-category="bridal">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Bridal</span>
                            <h3>Elegant Bridal Look</h3>
                            <p>Classic elegance meets modern beauty</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="glam">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Glam</span>
                            <h3>Evening Glamour</h3>
                            <p>Red carpet ready perfection</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card gallery-card-tall reveal" data-category="bridal">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Bridal</span>
                            <h3>Royal Wedding Glam</h3>
                            <p>Fit for royalty, crafted with love</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="hair">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Hair</span>
                            <h3>Modern Updo</h3>
                            <p>Sculpted to perfection</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="gallery-card gallery-card-wide reveal" data-category="makeover">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Makeover</span>
                            <h3>Full Transformation</h3>
                            <p>Before &amp; after magic</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="skincare">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Skincare</span>
                            <h3>Glow Treatment</h3>
                            <p>Radiance from within</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="gallery-card reveal" data-category="glam">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Glam</span>
                            <h3>Cocktail Party Look</h3>
                            <p>Chic and sophisticated</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card gallery-card-tall reveal" data-category="hair">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Hair</span>
                            <h3>Cascading Curls</h3>
                            <p>Volume and movement</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="bridal">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Bridal</span>
                            <h3>South Indian Bridal</h3>
                            <p>Traditional beauty reimagined</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="makeover">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Makeover</span>
                            <h3>Natural Glam</h3>
                            <p>Less is more, beautifully</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Row 4 -->
                <div class="gallery-card reveal" data-category="skincare">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Skincare</span>
                            <h3>Hydra Facial</h3>
                            <p>Deep cleansing luxury</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card gallery-card-wide reveal" data-category="bridal">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Bridal</span>
                            <h3>Engagement Look</h3>
                            <p>Dreamy and ethereal</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Row 5 -->
                <div class="gallery-card reveal" data-category="glam">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Glam</span>
                            <h3>Smoky Eye Masterpiece</h3>
                            <p>Bold, dramatic, unforgettable</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="hair">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Hair</span>
                            <h3>Braided Elegance</h3>
                            <p>Intricate art in every strand</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="gallery-card reveal" data-category="makeover">
                    <div class="gallery-card-inner">
                        <div class="gallery-card-bg"></div>
                        <div class="gallery-card-overlay">
                            <span class="gallery-card-cat">Makeover</span>
                            <h3>Soft Glam Daily</h3>
                            <p>Everyday beauty elevated</p>
                        </div>
                        <button class="gallery-card-zoom" aria-label="View larger">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA BANNER ========== -->
    <section class="gallery-cta">
        <div class="container">
            <div class="gallery-cta-inner reveal">
                <h2>Ready for Your Transformation?</h2>
                <p>Book a session and let us create your perfect look</p>
                <a href="index.php#booking" class="btn-main">
                    <span>Book Now</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-col footer-brand">
                    <img src="logo-pink.png" alt="Magic Mirror" class="footer-logo">
                    <p>Where beauty meets artistry. Your transformation begins here.</p>
                    <div class="social-row">
                        <a href="#" aria-label="Instagram" class="social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
                        </a>
                        <a href="#" aria-label="Facebook" class="social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        <a href="#" aria-label="TikTok" class="social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"/></svg>
                        </a>
                        <a href="https://wa.me/919947758899" aria-label="WhatsApp" class="social-btn" target="_blank" rel="noopener noreferrer">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="index.php#services">Services</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="index.php#booking">Book Now</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="index.php#services">Bridal Makeover</a></li>
                        <li><a href="index.php#services">Party Makeup</a></li>
                        <li><a href="index.php#services">Skincare</a></li>
                        <li><a href="index.php#services">Hair Styling</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <ul>
                        <li>Pallikkara Road, Nandi Bazar, Calicut</li>
                        <li>+91 9947758899</li>
                        <li>hello@magicmirror.com</li>
                        <li>Mon&ndash;Sat: 9AM&ndash;8PM</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Magic Mirror Makeover Studio. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/919947758899" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Chat on WhatsApp">
        <svg viewBox="0 0 32 32" fill="currentColor"><path d="M16.004 0C7.165 0 .002 7.163.002 16c0 2.825.737 5.573 2.137 7.998L.012 32l8.204-2.09A15.95 15.95 0 0 0 16.004 32C24.837 32 32 24.837 32 16S24.837 0 16.004 0zm0 29.09a13.04 13.04 0 0 1-6.65-1.817l-.477-.283-4.94 1.296 1.32-4.822-.31-.494A13.04 13.04 0 0 1 2.91 16c0-7.217 5.875-13.09 13.094-13.09S29.09 8.783 29.09 16c0 7.217-5.867 13.09-13.086 13.09zm7.17-9.8c-.393-.197-2.326-1.148-2.687-1.279-.36-.131-.623-.197-.886.197s-1.017 1.279-1.247 1.542c-.23.263-.459.296-.853.099-.393-.197-1.66-.612-3.163-1.95-1.17-1.042-1.96-2.328-2.19-2.72-.229-.394-.024-.607.173-.803.177-.176.393-.46.59-.69.197-.23.263-.394.394-.656.131-.263.066-.493-.033-.69-.099-.197-.886-2.137-1.214-2.924-.32-.768-.645-.664-.886-.676l-.755-.013c-.263 0-.69.099-1.05.493-.362.394-1.379 1.346-1.379 3.284s1.412 3.81 1.61 4.073c.196.263 2.78 4.245 6.736 5.953.941.407 1.676.649 2.249.831.945.3 1.805.258 2.485.157.758-.113 2.326-.951 2.654-1.87.329-.918.329-1.705.23-1.87-.098-.164-.36-.262-.754-.459z"/></svg>
        <span class="whatsapp-tooltip">Chat with us</span>
    </a>

    <script src="script.js"></script>
</body>
</html>
