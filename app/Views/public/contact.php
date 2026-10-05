<!-- =========================================================
     PAGE BANNER / HEADER (HOSPITAL QUALITY MANAGEMENT)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Elements -->
            <div class="banner-molecule-left"><i class="fas fa-headset"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-calendar-check"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">Contact Accreditation Advisory</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Contact Advisory Desk</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 1: 4 TOP CONTACT INFO CARDS (CRISP & CLINICAL)
========================================================= -->
<section class="py-5 bg-main" style="background-color: #f8fafc;">
    <div class="container">
        
        <div class="row g-4 mb-5">
            <!-- Card 1: Location -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-1">Our Headquarters</h5>
                        <p class="small text-muted mb-3">
                            <?= esc(site_setting('office_address', '245 14h Street, New Delhi, India')) ?>
                        </p>
                    </div>
                    <div class="pt-2 border-top">
                        <span class="small fw-bold text-primary"><i class="fas fa-city me-1"></i> National Advisory Hub</span>
                    </div>
                </div>
            </div>

            <!-- Card 2: Emergency Line -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-success bg-opacity-10 text-success p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-1">Emergency Helpline</h5>
                        <p class="small text-muted mb-1">Direct: <strong><?= esc(site_setting('emergency_phone', '+91 1800-419-5959')) ?></strong></p>
                        <p class="small text-muted mb-3">Toll-Free: <strong><?= esc(site_setting('helpline_tollfree', '1800-419-5959')) ?></strong></p>
                    </div>
                    <div class="pt-2 border-top">
                        <a href="tel:<?= esc(str_replace(' ', '', site_setting('emergency_phone', '+9118004195959'))) ?>" class="small fw-bold text-success text-decoration-none">
                            <i class="fas fa-phone me-1"></i> Call 24/7 Hotline &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Email Support -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-warning bg-opacity-10 text-warning p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-1">Official Desk</h5>
                        <p class="small text-muted mb-1"><?= esc(site_setting('support_email', 'support@hospitalquality.org')) ?></p>
                        <p class="small text-muted mb-3"><?= esc(site_setting('advisory_email', 'advisory@hospitalquality.org')) ?></p>
                    </div>
                    <div class="pt-2 border-top">
                        <a href="mailto:<?= esc(site_setting('support_email', 'support@hospitalquality.org')) ?>" class="small fw-bold text-warning text-decoration-none">
                            <i class="fas fa-paper-plane me-1"></i> Send Email Request &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Working Hours -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-info bg-opacity-10 text-info p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-1">Advisory Hours</h5>
                        <p class="small text-muted mb-1"><?= esc(site_setting('office_hours', 'Mon - Sat: 8:30 AM - 8:00 PM')) ?></p>
                        <p class="small text-muted mb-3">Audit Emergency: <strong>24/7 Available</strong></p>
                    </div>
                    <div class="pt-2 border-top">
                        <span class="small fw-bold text-info"><i class="fas fa-calendar-check me-1"></i> Quick Response SLA</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========================================================
             SECTION 2: MOCK AUDIT & CONSULTATION FORM
        ========================================================= -->
        <div class="row g-5 align-items-start">
            
            <!-- Left Column: Form -->
            <div class="col-lg-7">
                <div class="card card-max p-4 p-md-5 shadow-lg border bg-white" style="border-radius: 18px; border-color: #cbd5e1 !important;">
                    <span class="badge badge-max badge-max-sapphire align-self-start mb-2"><i class="fas fa-clipboard-check me-1"></i> Hospital Advisory Request</span>
                    <h3 class="h4 fw-bold text-navy mb-2">Request A Mock Audit Or DQMS Consultation</h3>
                    <p class="small text-muted mb-4">Submit your hospital details below and our certified NABH lead assessor will get in touch within 24 hours.</p>

                    <?php if (session()->getFlashdata('contact_success')) : ?>
                        <div class="alert alert-success d-flex align-items-center gap-2 mb-4 border-0 shadow-sm" style="border-radius: 12px;">
                            <i class="fas fa-circle-check fs-5"></i>
                            <div><?= esc(session()->getFlashdata('contact_success')) ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= site_url('contact/submit') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Hospital / Institution Name *</label>
                                <input type="text" name="hospital_name" class="form-control" placeholder="e.g. Max Care Hospital" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Contact Person &amp; Designation *</label>
                                <input type="text" name="contact_name" class="form-control" placeholder="e.g. Dr. A. K. Varma (Medical Director)" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Official Email Address *</label>
                                <input type="email" name="email" class="form-control" placeholder="director@hospital.org" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Mobile Number *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+91 98765 43210" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Bed Capacity</label>
                                <select name="bed_capacity" class="form-select">
                                    <option value="below_50">Below 50 Beds (Entry Level)</option>
                                    <option value="50_100">50 - 100 Beds</option>
                                    <option value="100_300" selected>100 - 300 Beds (Full Accreditation)</option>
                                    <option value="300_plus">300+ Beds (Superspeciality / Tertiary)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-navy">Requested Service Scope</label>
                                <select name="service_scope" class="form-select">
                                    <option value="mock_audit">Full NABH 5th Edition Mock Audit</option>
                                    <option value="dqms_platform">Hospital Quality Management (DQMS) Demo</option>
                                    <option value="digital_mitra">NABH Digital Mitra Empanelment Setup</option>
                                    <option value="dpdp_compliance">DPDP Act 2023 Digital Consent Audit</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-navy">Specific Objectives or Current Accreditation Status</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Mention your target audit dates, specific departmental requirements, or current gaps..."></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold shadow-md" style="background: linear-gradient(135deg, #0284c7 0%, #0052cc 100%); border: none; border-radius: 12px;">
                                    <i class="fas fa-paper-plane me-2"></i> Submit Consultation Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Visual Advisory Card -->
            <div class="col-lg-5">
                <div class="card p-4 rounded-4 shadow-md border bg-white mb-4" style="border-radius: 18px; border-color: #cbd5e1 !important;">
                    <h5 class="fw-bold text-navy mb-3"><i class="fas fa-shield-halved text-success me-2"></i> What Happens Next?</h5>
                    
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center flex-shrink-0 fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">1</div>
                            <div>
                                <strong class="text-navy d-block small">Initial Telephonic Triage (Within 4 Hours)</strong>
                                <span class="text-muted small">Our lead assessor reviews your hospital bed size, department mix, and target audit milestone.</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center flex-shrink-0 fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">2</div>
                            <div>
                                <strong class="text-navy d-block small">Gap Analysis &amp; DQMS Demonstration</strong>
                                <span class="text-muted small">Live walkthrough of automated SOPs, doctor privileging, biomedical radar, and DPDP digital consent.</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center flex-shrink-0 fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">3</div>
                            <div>
                                <strong class="text-navy d-block small">Mock Audit Schedule &amp; Roadmap</strong>
                                <span class="text-muted small">Deployment of the on-site / virtual audit team with 651-element scoring report.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="card p-2 rounded-4 shadow-md border bg-white overflow-hidden" style="border-radius: 18px;">
                    <img src="<?= base_url('assets/images/dqms_vision_mission.jpg') ?>" alt="Consultation Command Desk" class="img-fluid rounded-3" style="max-height: 240px; object-fit: cover;">
                </div>
            </div>

        </div>

    </div>
</section>
