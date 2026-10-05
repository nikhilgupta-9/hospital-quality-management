<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Hospital Quality Management (HQM) — NABH 5th Edition & DQMS Platform') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hospital Quality Management (HQM) — Smart Digital Quality Management System (DQMS), NABH Digital Mitra, ABDM M3, UHID & DPDP Act 2023 Consent Platform.">

    <!-- Bootstrap 5.3 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Theme CSS with Dynamic Cache Buster -->
    <link href="<?= base_url('assets/css/premium-theme.css?v=' . (file_exists(FCPATH . 'assets/css/premium-theme.css') ? filemtime(FCPATH . 'assets/css/premium-theme.css') : time())) ?>" rel="stylesheet">
</head>
<body>

    <!-- Top Header Bar (Blue & Orange Accents) -->
    <div class="hinton-top-header d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <a href="<?= site_url('clinical-workflow') ?>" class="btn btn-topabha"><i class="fas fa-id-card me-1"></i>ABHA Card</a>
                <a href="https://esanjeevani.mohfw.gov.in" target="_blank" rel="noopener noreferrer" class="btn btn-esanjeevni"><i class="fas fa-heart-pulse me-1"></i>E-Sanjeevani</a>
                <span class="ms-2 text-white-50 small">&bull; NABH Digital Health Standards (2nd Edition)</span>
            </div>
            <div class="d-flex align-items-center gap-4">
                <a href="tel:+9118004195959"><i class="fas fa-phone text-warning me-1"></i> <strong>Helpline: +91 1800-419-5959</strong></a>
                <a href="mailto:support@hospitalquality.org"><i class="fas fa-envelope text-info me-1"></i> support@hospitalquality.org</a>
                <a href="<?= site_url('login') ?>" class="text-white fw-bold"><i class="fas fa-user-lock text-warning me-1"></i> Login / Portal</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar (Clean & Professional) -->
    <nav class="navbar navbar-expand-lg navbar-hinton">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">
                <div class="brand-icon" style="background: #0c74c5;">
                    <i class="fas fa-hospital text-white"></i>
                </div>
                <div>
                    <span class="d-block lh-1 fw-extrabold text-navy" style="font-size:1.35rem; font-family: var(--font-heading); color: #1a2340;">Hospital <span style="color:#ff7a00;">Quality</span></span>
                    <span class="d-block text-muted" style="font-size:0.68rem; letter-spacing:0.06em; font-weight:700;">HOSPITAL QUALITY MANAGEMENT (DQMS)</span>
                </div>
            </a>

            <!-- Mobile Hamburger Button triggering Offcanvas -->
            <button class="navbar-toggler border-0 shadow-none p-2 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileOffcanvasNav" aria-controls="mobileOffcanvasNav" aria-label="Toggle navigation">
                <i class="fas fa-bars fs-3 text-navy"></i>
            </button>

            <!-- Desktop Navigation Menu -->
            <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() === '' || uri_string() === '/') ? 'active' : '' ?>" href="<?= site_url('/') ?>">
                            Home
                        </a>
                    </li>

                    <!-- Dropdown: Standards & Accreditation -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (in_array(uri_string(), ['standards', 'sop-suite', 'hr-suite', 'equipment-grid', 'clinical-workflow', 'checklists', 'assessment-tool'])) ? 'active' : '' ?>" href="#" id="standardsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            NABH Standards
                        </a>
                        <ul class="dropdown-menu shadow-lg border-0" aria-labelledby="standardsDropdown">
                            <li>
                                <a class="dropdown-item" href="<?= site_url('standards') ?>">
                                    <i class="fas fa-book-medical" style="color: #0c74c5;"></i>
                                    <div>
                                        <span class="item-title">Standards Directory</span>
                                        <span class="item-desc">All 10 chapters & 651 objective elements</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('sop-suite') ?>">
                                    <i class="fas fa-file-signature" style="color: #ff7a00;"></i>
                                    <div>
                                        <span class="item-title">Document &amp; SOP Suite</span>
                                        <span class="item-desc">Clinical SOPs, policies &amp; version control</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('hr-suite') ?>">
                                    <i class="fas fa-user-doctor" style="color: #0c74c5;"></i>
                                    <div>
                                        <span class="item-title">HR &amp; Credentialing Suite</span>
                                        <span class="item-desc">Doctor privileging, PSV &amp; council renewals</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('equipment-grid') ?>">
                                    <i class="fas fa-microscope" style="color: #ff7a00;"></i>
                                    <div>
                                        <span class="item-title">Equipment &amp; Utilities Grid</span>
                                        <span class="item-desc">Biomedical calibrations, PPM &amp; utility NOCs</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('clinical-workflow') ?>">
                                    <i class="fas fa-heart-pulse" style="color: #0c74c5;"></i>
                                    <div>
                                        <span class="item-title">Clinical &amp; DPDP Workflow</span>
                                        <span class="item-desc">UHID, ABHA linking &amp; DPDP 2023 e-consent</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('checklists') ?>">
                                    <i class="fas fa-list-check" style="color: #ff7a00;"></i>
                                    <div>
                                        <span class="item-title">Hospital Audit Checklists</span>
                                        <span class="item-desc">OT, ICU, Fire Safety & BMW inspection logs</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('assessment-tool') ?>">
                                    <i class="fas fa-calculator" style="color: #0c74c5;"></i>
                                    <div>
                                        <span class="item-title">Accreditation Readiness Quiz</span>
                                        <span class="item-desc">12-question instant compliance score</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'clinical-workflow' ? 'active' : '' ?>" href="<?= site_url('clinical-workflow') ?>">
                            Clinical &amp; DPDP
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'quality-indicators' ? 'active' : '' ?>" href="<?= site_url('quality-indicators') ?>">
                            Quality KPIs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'contact' ? 'active' : '' ?>" href="<?= site_url('contact') ?>">
                            Contact
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <a href="<?= site_url('contact') ?>" class="btn-hinton-outline-nav d-none d-xl-inline-flex" style="border-color: #ff7a00; color: #ff7a00;">
                        <i class="fas fa-calendar-check"></i> Book Mock Audit
                    </a>
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Portal Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Offcanvas Drawer -->
    <div class="offcanvas offcanvas-end offcanvas-hinton" tabindex="-1" id="mobileOffcanvasNav" aria-labelledby="mobileOffcanvasNavLabel">
        <div class="offcanvas-header border-bottom py-3">
            <div class="d-flex align-items-center gap-2">
                <div class="brand-icon" style="width:36px; height:36px; font-size:1.1rem; background: #0c74c5;">
                    <i class="fas fa-hospital text-white"></i>
                </div>
                <div>
                    <h5 class="offcanvas-title fw-bold text-navy mb-0" id="mobileOffcanvasNavLabel" style="font-size:1.1rem;">Hospital <span style="color:#ff7a00;">Quality</span></h5>
                    <span class="text-muted" style="font-size:0.65rem; font-weight:700;">HOSPITAL QUALITY MANAGEMENT</span>
                </div>
            </div>
            <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between p-4">
            <div>
                <div class="text-uppercase text-muted fw-bold mb-2" style="font-size: 0.72rem; letter-spacing: 0.08em;">Navigation Menu</div>
                <ul class="navbar-nav gap-1 mb-4">
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() === '' || uri_string() === '/') ? 'active' : '' ?>" href="<?= site_url('/') ?>">
                            <i class="fas fa-house text-primary"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'standards' ? 'active' : '' ?>" href="<?= site_url('standards') ?>">
                            <i class="fas fa-book-medical text-primary"></i> NABH Standards
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'sop-suite' ? 'active' : '' ?>" href="<?= site_url('sop-suite') ?>">
                            <i class="fas fa-file-signature" style="color: #ff7a00;"></i> Document &amp; SOP Suite
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'hr-suite' ? 'active' : '' ?>" href="<?= site_url('hr-suite') ?>">
                            <i class="fas fa-user-doctor text-primary"></i> HR &amp; Credentialing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'equipment-grid' ? 'active' : '' ?>" href="<?= site_url('equipment-grid') ?>">
                            <i class="fas fa-microscope" style="color: #ff7a00;"></i> Equipment &amp; Utilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'clinical-workflow' ? 'active' : '' ?>" href="<?= site_url('clinical-workflow') ?>">
                            <i class="fas fa-heart-pulse text-primary"></i> Clinical &amp; DPDP
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'quality-indicators' ? 'active' : '' ?>" href="<?= site_url('quality-indicators') ?>">
                            <i class="fas fa-chart-line text-primary"></i> Quality KPIs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'checklists' ? 'active' : '' ?>" href="<?= site_url('checklists') ?>">
                            <i class="fas fa-list-check" style="color: #ff7a00;"></i> Audit Checklists
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'assessment-tool' ? 'active' : '' ?>" href="<?= site_url('assessment-tool') ?>">
                            <i class="fas fa-calculator text-primary"></i> Readiness Quiz
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">
                            <i class="fas fa-circle-info text-primary"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'contact' ? 'active' : '' ?>" href="<?= site_url('contact') ?>">
                            <i class="fas fa-headset text-primary"></i> Contact Us
                        </a>
                    </li>
                </ul>

                <div class="text-uppercase text-muted fw-bold mb-2" style="font-size: 0.72rem; letter-spacing: 0.08em;">Quick Portals &amp; Health ID</div>
                <div class="d-grid gap-2 mb-4">
                    <a href="https://healthid.ndhm.gov.in" target="_blank" class="btn btn-topabha text-center justify-content-center" style="border-radius: 6px;">
                        <i class="fas fa-id-card-clip me-1"></i> Create ABHA Card
                    </a>
                    <a href="https://esanjeevani.mohfw.gov.in" target="_blank" class="btn btn-esanjeevni text-center justify-content-center" style="border-radius: 6px;">
                        <i class="fas fa-video me-1"></i> E-Sanjeevani Teleconsult
                    </a>
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary text-center justify-content-center" style="border-radius: 6px;">
                        <i class="fas fa-lock me-1"></i> Portal Sign In
                    </a>
                </div>
            </div>

            <!-- Offcanvas Footer Contact Info -->
            <div class="p-3 rounded-3 bg-light border">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="fas fa-phone-alt text-warning"></i>
                    <strong class="text-navy small">+91 1800-419-5959</strong>
                </div>
                <div class="text-muted small" style="font-size: 0.75rem;">
                    support@hospitalquality.org | 24/7 Quality &amp; NABH Support
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <footer class="footer-hinton">
        <!-- Floating Ambient Decoration Circle -->
        <div class="footer-decor-circle"></div>

        <div class="container position-relative">
            <!-- Pre-Footer Contact Bar -->
            <div class="hinton-pre-footer-bar">
                <div class="row align-items-center g-3">
                    <!-- Item 1: Support Hotline -->
                    <div class="col-lg-4 col-md-12">
                        <div class="hinton-pre-footer-item">
                            <div class="contact-icon" style="background: rgba(255, 122, 0, 0.15); color: #ff7a00;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <div class="contact-label">Hospital Support Helpline</div>
                                <div class="contact-val">+91 1800-419-5959</div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider 1 -->
                    <div class="col-lg-auto d-none d-lg-block">
                        <div class="hinton-pre-footer-divider"></div>
                    </div>

                    <!-- Item 2: Support Email -->
                    <div class="col-lg-3 col-md-12">
                        <div class="hinton-pre-footer-item">
                            <div class="contact-icon" style="background: rgba(12, 116, 197, 0.15); color: #0c74c5;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="contact-label">Official Support Email</div>
                                <div class="contact-val">support@hospitalquality.org</div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider 2 -->
                    <div class="col-lg-auto d-none d-lg-block">
                        <div class="hinton-pre-footer-divider"></div>
                    </div>

                    <!-- Item 3: Visit Us On -->
                    <div class="col-lg-4 col-md-12">
                        <div class="hinton-pre-footer-item">
                            <div class="contact-icon" style="background: rgba(255, 122, 0, 0.15); color: #ff7a00;">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div>
                                <div class="contact-label">Headquarters</div>
                                <div class="contact-val">New Delhi, India</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Main 4-Column Grid -->
            <div class="row g-4 mb-4">
                <!-- Column 1: Brand Logo & Mission -->
                <div class="col-lg-4 col-md-6 pe-lg-4">
                    <a href="<?= site_url('/') ?>" class="brand-logo-wrap text-decoration-none">
                        <div class="brand-logo-icon" style="background: #0c74c5;">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <span class="brand-logo-text text-white">Hospital <span style="color:#ff7a00;">Quality</span></span>
                    </a>
                    <p class="footer-desc">
                        Empowering hospitals, clinical networks, and healthcare providers across India with robust NABH 5th Edition digital quality management, ABHA / ABDM ecosystem integration, and DPDP compliant patient workflows.
                    </p>
                    <div class="d-flex align-items-center gap-2">
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="col-lg-3 col-6">
                    <h5 class="footer-heading">NABH &amp; Quality Suites</h5>
                    <ul class="footer-links">
                        <li><a href="<?= site_url('standards') ?>">NABH Standards (5th Ed)</a></li>
                        <li><a href="<?= site_url('sop-suite') ?>">Document &amp; SOP Suite</a></li>
                        <li><a href="<?= site_url('hr-suite') ?>">HR &amp; Doctor Privileging</a></li>
                        <li><a href="<?= site_url('equipment-grid') ?>">Equipment &amp; Utilities Grid</a></li>
                        <li><a href="<?= site_url('clinical-workflow') ?>">Clinical &amp; DPDP Workflow</a></li>
                        <li><a href="<?= site_url('quality-indicators') ?>">Quality KPIs &amp; Metrics</a></li>
                    </ul>
                </div>

                <!-- Column 3: Useful Links -->
                <div class="col-lg-2 col-6">
                    <h5 class="footer-heading">Portals &amp; Tools</h5>
                    <ul class="footer-links">
                        <li><a href="<?= site_url('/') ?>">Home Portal</a></li>
                        <li><a href="<?= site_url('about') ?>">About Framework</a></li>
                        <li><a href="<?= site_url('checklists') ?>">Audit &amp; Inspection Checklists</a></li>
                        <li><a href="<?= site_url('assessment-tool') ?>">Compliance Readiness Quiz</a></li>
                        <li><a href="<?= site_url('contact') ?>">Contact Advisory Desk</a></li>
                        <li><a href="https://healthid.ndhm.gov.in" target="_blank">ABHA Health ID Portal</a></li>
                        <li><a href="https://esanjeevani.mohfw.gov.in" target="_blank">E-Sanjeevani Teleconsult</a></li>
                    </ul>
                </div>

                <!-- Column 4: Subscribe Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Stay Updated</h5>
                    <p class="newsletter-text">
                        Subscribe to receive monthly NABH compliance bulletins, statutory updates, and clinical safety alerts.
                    </p>
                    <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing to Hospital Quality Management updates!');">
                        <input type="email" placeholder="Enter your email address" required>
                        <button type="submit" class="btn-newsletter" aria-label="Subscribe" style="background: #0c74c5;">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Footer Bottom Strip -->
            <div class="footer-hinton-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <p class="mb-0 copyright-text text-white small">
                    &copy; <?= date('Y') ?> <strong class="text-white">Hospital Quality Management</strong> (HQM). All Rights Reserved. &nbsp;|&nbsp; Developed by <a href="https://nikhilworks.com" target="_blank" rel="noopener noreferrer" class="dev-link" style="color: #ff7a00;">nikhilworks.com</a>
                </p>
                <div class="d-flex flex-wrap gap-4 small">
                    <a href="<?= site_url('privacy-policy') ?>" style="color: #a0aec0;">Privacy Policy</a>
                    <a href="<?= site_url('terms-of-service') ?>" style="color: #a0aec0;">Terms of Service</a>
                    <a href="<?= site_url('compliance-disclaimer') ?>" style="color: #a0aec0;">Compliance Disclaimer</a>
                    <a href="<?= site_url('portal-gateway') ?>" style="color: #a0aec0;">Portal Gateway</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTopBtn" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Bootstrap JS & Interactive Engine -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/quality-tools.js') ?>"></script>
</body>
</html>
