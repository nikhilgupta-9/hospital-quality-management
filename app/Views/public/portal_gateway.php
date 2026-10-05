<!-- =========================================================
     PAGE BANNER / HEADER (HOSPITAL QUALITY MANAGEMENT)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Elements -->
            <div class="banner-molecule-left"><i class="fas fa-network-wired"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-shield-halved"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">Hospital Accreditation Portals</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Portal Gateway</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gateway Cards Section -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <!-- Introduction Alert -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-white" style="border-left: 5px solid #0c74c5 !important; border: 1px solid #dce8f6;">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center p-3 flex-shrink-0" style="background-color: #e6efff; color: #0c74c5; width: 52px; height: 52px;">
                        <i class="fas fa-key fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-navy mb-1">Single Sign-On (SSO) Role Authentication</h5>
                        <p class="text-muted small mb-0" style="color: #4b5563 !important;">Use your verified institutional credentials to access your designated departmental compliance dashboard.</p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= site_url('login') ?>" class="btn px-4 py-2 text-white fw-bold shadow-sm text-nowrap" style="background-color: #0c74c5; border-radius: 8px;">
                        <i class="fas fa-arrow-right-to-bracket me-1"></i> Staff Sign In
                    </a>
                    <a href="<?= site_url('admin/login') ?>" class="btn px-4 py-2 text-white fw-bold shadow-sm text-nowrap" style="background-color: #1a2340; border-radius: 8px;">
                        <i class="fas fa-crown me-1 text-warning"></i> Admin Portal
                    </a>
                </div>
            </div>
        </div>

        <!-- Role Portals Grid -->
        <div class="row g-4 mb-5">
            <!-- Card 1: Super Admin Gateway -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between" style="border: 1px solid #dce8f6 !important; border-top: 4px solid #1a2340 !important;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 d-inline-flex align-items-center justify-content-center" style="background-color: #e8eaed; color: #1a2340; width: 48px; height: 48px;">
                                <i class="fas fa-crown fs-4"></i>
                            </div>
                            <span class="badge px-3 py-1 rounded-pill small text-white" style="background-color: #1a2340; font-size: 0.75rem;">
                                Tier 1 System Root
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Super Admin Suite</h5>
                        <p class="small mb-3" style="line-height: 1.6; color: #4b5563;">
                            Global system monitoring, multi-branch hospital tenant provisioning, SaaS pricing/subscriptions, and immutable audit logs.
                        </p>
                        <ul class="list-unstyled small mb-4 d-flex flex-column gap-2" style="color: #1a2340;">
                            <li><i class="fas fa-check-circle text-success me-2"></i> Tenant onboarding &amp; branches</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Role-based user administration</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Global compliance audit trail</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Legal &amp; public pages (CMS)</li>
                        </ul>
                    </div>
                    <a href="<?= site_url('admin/login') ?>" class="btn w-100 fw-bold text-white py-2 shadow-sm" style="background-color: #1a2340; border-radius: 8px;">
                        Super Admin Sign In <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2: Hospital Leadership Gateway -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between" style="border: 1px solid #dce8f6 !important; border-top: 4px solid #0c74c5 !important;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 d-inline-flex align-items-center justify-content-center" style="background-color: #e6efff; color: #0c74c5; width: 48px; height: 48px;">
                                <i class="fas fa-hospital fs-4"></i>
                            </div>
                            <span class="badge px-3 py-1 rounded-pill small text-white" style="background-color: #0c74c5; font-size: 0.75rem;">
                                Executive Level
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Hospital Leadership Suite</h5>
                        <p class="small mb-3" style="line-height: 1.6; color: #4b5563;">
                            Accreditation readiness overview, departmental risk heatmaps, SOP authorization workflows, and statutory board reports.
                        </p>
                        <ul class="list-unstyled small mb-4 d-flex flex-column gap-2" style="color: #1a2340;">
                            <li><i class="fas fa-check-circle text-success me-2"></i> Readiness score gauge (0-100%)</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Departmental SOP approvals</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> High-risk CAPA closure queue</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Executive PDF compliance exports</li>
                        </ul>
                    </div>
                    <a href="<?= site_url('admin/login') ?>" class="btn w-100 fw-bold text-white py-2 shadow-sm" style="background-color: #0c74c5; border-radius: 8px;">
                        Hospital Admin Sign In <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3: NABH Quality Coordinator -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between" style="border: 1px solid #dce8f6 !important; border-top: 4px solid #ff7a00 !important;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 d-inline-flex align-items-center justify-content-center" style="background-color: #fff2e6; color: #ff7a00; width: 48px; height: 48px;">
                                <i class="fas fa-clipboard-check fs-4"></i>
                            </div>
                            <span class="badge px-3 py-1 rounded-pill small text-white" style="background-color: #ff7a00; font-size: 0.75rem;">
                                Quality Manager
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">NABH Coordinator Hub</h5>
                        <p class="small mb-3" style="line-height: 1.6; color: #4b5563;">
                            Operational workspace for NABH 5th Edition Chapter coordinators, audit checklist logs, incident CAPA cycles, and SOP uploads.
                        </p>
                        <ul class="list-unstyled small mb-4 d-flex flex-column gap-2" style="color: #1a2340;">
                            <li><i class="fas fa-check-circle text-success me-2"></i> 10 Chapter objective elements</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> OT / ICU / Fire inspection logs</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Document versioning &amp; review</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Incident &amp; CAPA corrective actions</li>
                        </ul>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn w-100 fw-bold text-white py-2 shadow-sm" style="background-color: #ff7a00; border-radius: 8px;">
                        Coordinator Sign In <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 4: HR & Doctor Credentialing -->
            <div class="col-lg-6 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between" style="border: 1px solid #dce8f6 !important; border-top: 4px solid #0c74c5 !important;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 d-inline-flex align-items-center justify-content-center" style="background-color: #e6efff; color: #0c74c5; width: 48px; height: 48px;">
                                <i class="fas fa-user-doctor fs-4"></i>
                            </div>
                            <span class="badge px-3 py-1 rounded-pill small text-white" style="background-color: #0c74c5; font-size: 0.75rem;">
                                HR &amp; Privileging
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">HR &amp; Doctor Credentialing Desk</h5>
                        <p class="small mb-3" style="line-height: 1.6; color: #4b5563;">
                            Full credentialing and privileging suite for consultants, medical officers, nurses, and allied health staff. Tracks mandatory BLS/ACLS trainings and license renewals.
                        </p>
                        <div class="row g-2 small mb-3" style="color: #1a2340;">
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Clinical Privileging</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Council Registration</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> BLS/ACLS Attendance</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Staff Health Vault</div>
                        </div>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn w-100 fw-bold py-2 border shadow-sm" style="background-color: #f8fafc; color: #0c74c5; border-color: #0c74c5 !important; border-radius: 8px;">
                        Access HR &amp; Credentialing <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 5: Biomedical & Clinical Safety Desk -->
            <div class="col-lg-6 col-md-12">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between" style="border: 1px solid #dce8f6 !important; border-top: 4px solid #ff7a00 !important;">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 d-inline-flex align-items-center justify-content-center" style="background-color: #fff2e6; color: #ff7a00; width: 48px; height: 48px;">
                                <i class="fas fa-microscope fs-4"></i>
                            </div>
                            <span class="badge px-3 py-1 rounded-pill small text-white" style="background-color: #ff7a00; font-size: 0.75rem;">
                                Biomedical &amp; Safety
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Biomedical, Facility &amp; Clinical Gates</h5>
                        <p class="small mb-3" style="line-height: 1.6; color: #4b5563;">
                            Centralized equipment inventory, traceable calibration certificates, preventative maintenance (PPM) logs, 6-Point Clinical Safety gates, and DPDP 2023 consent module.
                        </p>
                        <div class="row g-2 small mb-3" style="color: #1a2340;">
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> NABL Calibrations</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Equipment PPM Logs</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> 6-Point Safety Gates</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> DPDP Consent E-Sign</div>
                        </div>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn w-100 fw-bold py-2 border shadow-sm" style="background-color: #f8fafc; color: #ff7a00; border-color: #ff7a00 !important; border-radius: 8px;">
                        Access Biomedical &amp; Safety <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Help Note -->
        <div class="p-4 rounded-4 bg-white border shadow-sm" style="border-color: #dce8f6 !important;">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="background-color: #fff2e6; color: #ff7a00; width: 48px; height: 48px;">
                        <i class="fas fa-circle-info fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-navy mb-1">Need Access Credentials or Technical Assistance?</h6>
                        <p class="text-muted small mb-0" style="color: #4b5563 !important;">Contact your hospital Super Administrator or submit a request to our 24x7 accreditation advisory team.</p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= site_url('contact') ?>" class="btn btn-outline-secondary px-4 py-2 small fw-bold" style="border-radius: 8px;">
                        Contact Support
                    </a>
                    <a href="<?= site_url('login') ?>" class="btn px-4 py-2 small fw-bold text-white" style="background-color: #0c74c5; border-radius: 8px;">
                        Direct Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
