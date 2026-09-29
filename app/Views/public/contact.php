<!-- =========================================================
     HINTON PAGE BANNER / HEADER (EXACT CLONE WITH MOLECULES)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Molecule Elements -->
            <div class="banner-molecule-left"><i class="fas fa-circle-nodes"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-circle-nodes"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">Contact Us</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Contact</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON TOP 4 CONTACT INFO CARDS (DYNAMIC FROM ADMIN)
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- Card 1: Location -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-contact-info">
                    <div class="contact-icon-box icon-blue">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Our Headquarters</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        <?= esc(site_setting('office_address', '245 14h Street, Toronto, Canada')) ?>
                    </p>
                    <a href="#mapSection" class="small fw-bold text-primary text-decoration-none mt-auto">
                        View On Google Maps &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 2: Phone -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-contact-info">
                    <div class="contact-icon-box icon-teal">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Emergency Helpline</h5>
                    <p class="small text-muted mb-1">Emergency: <strong><?= esc(site_setting('emergency_phone', '+1 (234) 567 890 43')) ?></strong></p>
                    <p class="small text-muted mb-3 flex-grow-1">Toll-Free: <strong><?= esc(site_setting('helpline_tollfree', '+91 1800-419-5959')) ?></strong></p>
                    <a href="tel:<?= esc(str_replace(' ', '', site_setting('emergency_phone', '+123456789043'))) ?>" class="small fw-bold text-success text-decoration-none mt-auto">
                        Call Advisory Desk &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Email -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-contact-info">
                    <div class="contact-icon-box icon-gold">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Official Emails</h5>
                    <p class="small text-muted mb-1"><?= esc(site_setting('support_email', 'support@hinton.com')) ?></p>
                    <p class="small text-muted mb-3 flex-grow-1"><?= esc(site_setting('advisory_email', 'advisory@hospitalquality.org')) ?></p>
                    <a href="mailto:<?= esc(site_setting('support_email', 'support@hinton.com')) ?>" class="small fw-bold text-warning text-decoration-none mt-auto">
                        Send An Email &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 4: Working Hours -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-contact-info">
                    <div class="contact-icon-box icon-purple">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Advisory Hours</h5>
                    <p class="small text-muted mb-1"><?= esc(site_setting('office_hours', 'Mon - Sat: 8:30 AM - 8:00 PM')) ?></p>
                    <p class="small text-muted mb-3 flex-grow-1"><?= esc(site_setting('emergency_hours', '24/7 Available Everyday')) ?></p>
                    <a href="<?= site_url('assessment-tool') ?>" class="small fw-bold text-purple text-decoration-none mt-auto">
                        Take Readiness Quiz &rarr;
                    </a>
                </div>
            </div>
        </div>

        <!-- =========================================================
             HINTON MAIN CONTACT FORM & SIDEBAR BOXES
        ========================================================= -->
        <div class="row g-5 align-items-start">
            <!-- Left Column: Contact & Mock Audit Request Form -->
            <div class="col-lg-7">
                <div class="card card-max p-4 p-md-5 shadow-lg border-0">
                    <span class="badge badge-max badge-max-blue align-self-start mb-2">Hospital Consultation Desk</span>
                    <h3 class="h4 fw-bold text-navy mb-2">Send Us A Message &amp; Request Mock Audit</h3>
                    <p class="small text-muted mb-4">Fill in the details below and our certified NABH lead assessor will get in touch with your hospital management within 24 hours.</p>

                    <?php if (session()->getFlashdata('contact_success')) : ?>
                        <div class="alert alert-success py-3 mb-4 d-flex align-items-center gap-2 shadow-sm rounded-3">
                            <i class="fas fa-circle-check fs-4"></i>
                            <div>
                                <strong>Request Received!</strong><br>
                                <?= esc(session()->getFlashdata('contact_success')) ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= site_url('contact/submit') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-navy">Your Full Name &amp; Designation *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-user-doctor"></i></span>
                                    <input type="text" name="name" class="form-control border-start-0 ps-0" placeholder="e.g. Dr. Rajesh Sharma (Medical Dir.)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-navy">Official Work Email *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control border-start-0 ps-0" placeholder="director@hospital.org" required>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-navy">Hospital / Healthcare Facility Name *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-hospital"></i></span>
                                    <input type="text" name="hospital_name" class="form-control border-start-0 ps-0" placeholder="e.g. Max Care Superspeciality" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-navy">Phone / WhatsApp Number *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="phone" class="form-control border-start-0 ps-0" placeholder="+91 98765 43210" required>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-navy">Hospital Bed Capacity *</label>
                                <select name="bed_capacity" class="form-select">
                                    <option value="<50">&lt; 50 Beds (SHCO / Entry Level Track)</option>
                                    <option value="50-200" selected>50 - 200 Beds (Mid-Sized Hospital)</option>
                                    <option value=">200">&gt; 200 Beds (Tertiary Care / Medical College)</option>
                                    <option value="chain">Hospital Chain / Multiple Branches</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-navy">Inquiry Subject *</label>
                                <select name="subject" class="form-select">
                                    <option>NABH 5th Edition Full Gap Assessment</option>
                                    <option>Pre-Assessment Mock Audit &amp; Non-Conformity Review</option>
                                    <option>Digital SOP Repository &amp; Approval Workflow</option>
                                    <option>Doctor Credentialing &amp; Privileging Matrix</option>
                                    <option>Biomedical Equipment &amp; NABL Calibrations Engine</option>
                                    <option>Enterprise Multi-Branch License Demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-semibold text-navy">Message &amp; Specific Requirements</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Mention your target accreditation date, specific departments (OT, ICU, Pharmacy), or current compliance challenges..."></textarea>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="consentCheck" checked required>
                            <label class="form-check-label small text-muted" for="consentCheck">
                                I agree to receive official consultation communication and NABH readiness materials.
                            </label>
                        </div>

                        <button type="submit" class="btn btn-hinton-primary btn-lg w-100 py-3 shadow-md">
                            <i class="fas fa-paper-plane me-2"></i> Submit Hospital Consultation Request
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Assessor Card & Why Choose Us -->
            <div class="col-lg-5">
                <!-- Assessor Card -->
                <div class="card card-max p-4 mb-4 border-0 shadow-md">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://images.unsplash.com/photo-1594824813501-489e246949f7?auto=format&fit=crop&w=150&q=80"
                             alt="Dr. Ananya Sen" class="rounded-circle object-fit-cover border border-3 border-success" style="width: 64px; height: 64px;">
                        <div>
                            <h5 class="fw-bold text-navy mb-0">Dr. Ananya Sen</h5>
                            <span class="small text-muted d-block">NABH 5th Edition Lead Assessor</span>
                            <span class="badge badge-max badge-max-emerald mt-1"><i class="fas fa-check-circle me-1"></i> Available for Pre-Audit</span>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">
                        &ldquo;Our expert team assists medical directors and quality managers in closing objective element gaps before the formal statutory assessment.&rdquo;
                    </p>
                </div>

                <!-- Why Choose Hinton Quality -->
                <div class="card card-max p-4 mb-4">
                    <h5 class="fw-bold text-navy mb-3"><i class="fas fa-shield-halved text-success me-2"></i> Why Consult Our Quality Desk?</h5>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li class="d-flex align-items-start gap-2 mb-3">
                            <i class="fas fa-circle-check text-success fs-6 mt-1"></i>
                            <div>
                                <strong class="text-navy d-block">99.4% First-Time Pass Rate</strong>
                                Over 500 healthcare facilities successfully guided across India and internationally.
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2 mb-3">
                            <i class="fas fa-circle-check text-success fs-6 mt-1"></i>
                            <div>
                                <strong class="text-navy d-block">Full 10-Chapter NABH 5th Coverage</strong>
                                AAC, COP, MOM, PRE, HIC, CQI, ROM, FMS, HRM, and IMS.
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2 mb-3">
                            <i class="fas fa-circle-check text-success fs-6 mt-1"></i>
                            <div>
                                <strong class="text-navy d-block">24-Hour Guaranteed Turnaround</strong>
                                Direct response at <?= esc(site_setting('support_email', 'support@hinton.com')) ?>.
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="fas fa-circle-check text-success fs-6 mt-1"></i>
                            <div>
                                <strong class="text-navy d-block">Digital Evidence Binder Export</strong>
                                Automated documentation ready for statutory inspection.
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Portal Access Card -->
                <div class="card card-max p-4 bg-navy-gradient text-white border-0 shadow-lg">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="p-2 bg-warning text-navy rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fas fa-key fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Existing Hospital Client?</h6>
                            <span class="small text-light opacity-75">Sign in to your quality workspace</span>
                        </div>
                    </div>
                    <p class="small text-light mb-3 opacity-90">
                        Access your departmental SOP queues, doctor privileging records, and biomedical calibration logs.
                    </p>
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-secondary btn-sm w-100 py-2">
                        <i class="fas fa-lock me-1"></i> Sign In to Quality Portal
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON INTERACTIVE GOOGLE MAP EMBED (DYNAMIC FROM ADMIN)
========================================================= -->
<section class="py-5 bg-white" id="mapSection">
    <div class="container py-2">
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="badge badge-max badge-max-navy mb-2">Location &amp; Presence</span>
            <h2 class="display-6 fw-bold text-navy">Visit Our National Quality Headquarters</h2>
            <p class="text-muted">Conveniently located with regional accreditation cells across major healthcare hubs.</p>
        </div>

        <div class="hinton-map-wrapper shadow-sm rounded-4 overflow-hidden border">
            <iframe src="<?= esc(site_setting('google_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14008.114835684784!2d77.2144888871582!3d28.628901800000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd37b9278917%3A0xb3998b671a1c3c97!2sConnaught%20Place%2C%20New%20Delhi%2C%20Delhi%20110001!5e0!3m2!1sen!2sin!4v1711728000000!5m2!1sen!2sin')) ?>"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Hospital Quality National HQ Map" style="width: 100%; height: 380px; border: 0;"></iframe>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON FAQ ACCORDION
========================================================= -->
<section class="py-5 bg-main border-top">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-gold mb-2">Frequently Asked Questions</span>
            <h2 class="display-6 fw-bold text-navy">Hospital Accreditation Inquiries</h2>
            <p class="text-muted">Quick answers to common questions regarding NABH 5th edition compliance, mock audits, and portal deployment.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion accordion-hinton" id="faqContact">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                                <i class="fas fa-circle-question text-primary me-2"></i> How soon can our hospital schedule an on-site NABH Mock Audit?
                            </button>
                        </h2>
                        <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqContact">
                            <div class="accordion-body">
                                Mock audits can be scheduled within <strong>5 to 7 business days</strong> of submitting your consultation request. Our certified lead assessor team reviews your pre-assessment questionnaire and arrives on-site to inspect high-risk clinical areas including OT, ICU, Pharmacy, and Central Sterilization (CSSD).
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                <i class="fas fa-circle-question text-primary me-2"></i> What is included in the digital NABH 5th Edition SOP suite?
                            </button>
                        </h2>
                        <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqContact">
                            <div class="accordion-body">
                                The platform provides over <strong>120+ customizable clinical and administrative SOPs</strong> mapped across all 10 NABH 5th Edition chapters. It includes automated versioning (e.g. V1.0 &rarr; V2.0), electronic multi-tier approval sign-offs, and 30/15/7-day renewal reminder alerts.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                <i class="fas fa-circle-question text-primary me-2"></i> How does the system handle doctor credentialing and privileging?
                            </button>
                        </h2>
                        <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqContact">
                            <div class="accordion-body">
                                Each clinician profile stores verified medical council registrations, specialized degree certificates, and a defined procedural privileging scope (e.g., Core vs Specialized ICU/Surgical privileges) approved by your hospital Credentials Committee.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                <i class="fas fa-circle-question text-primary me-2"></i> Can we manage multiple hospital branches under one portal subscription?
                            </button>
                        </h2>
                        <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqContact">
                            <div class="accordion-body">
                                Yes. Our <strong>Super Admin</strong> suite allows enterprise healthcare networks to manage multi-branch quality scores, cross-hospital indicator comparisons, and centralized SOP synchronization from a single corporate overview.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON EMERGENCY ACTION CALLOUT BANNER (DYNAMIC)
========================================================= -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="hinton-emergency-banner">
            <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
                <div class="col-lg-8">
                    <span class="badge bg-white text-navy px-3 py-1 fw-bold rounded-pill mb-3">Toll-Free Hospital Support</span>
                    <h3 class="display-6 fw-bold text-white mb-2">Need Immediate Accreditation Support?</h3>
                    <p class="lead text-light mb-0" style="font-size: 1.05rem; opacity: 0.9;">
                        Connect with our 24x7 quality advisory desk. We assist in rapid non-conformity remediation and pre-audit readiness.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="tel:<?= esc(str_replace(' ', '', site_setting('helpline_tollfree', '+9118004195959'))) ?>" class="btn btn-hinton-secondary btn-lg">
                        <i class="fas fa-phone-alt me-2"></i> <?= esc(site_setting('helpline_tollfree', '+91 1800-419-5959')) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
