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
<section class="py-5" style="background-color: var(--hinton-bg);">
    <div class="container">
        <!-- Introduction Alert -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-white border-start border-4 border-primary">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary p-3">
                        <i class="fas fa-key fs-3"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-navy mb-1" style="font-family: var(--font-heading);">Single Sign-On Authentication</h5>
                        <p class="text-muted small mb-0">Use your registered institutional credentials to access your designated departmental compliance dashboard.</p>
                    </div>
                </div>
                <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary px-4 py-2 text-nowrap">
                    <i class="fas fa-arrow-right-to-bracket me-1"></i> Proceed to Login
                </a>
            </div>
        </div>

        <!-- Role Portals Grid -->
        <div class="row g-4 mb-5">
            <!-- Card 1: Super Admin Gateway -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between transition-all hover-translate">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 bg-purple-subtle text-purple" style="background-color: rgba(147, 51, 234, 0.12); color: #9333ea;">
                                <i class="fas fa-crown fs-4"></i>
                            </div>
                            <span class="badge bg-purple-subtle text-purple border px-3 py-1 rounded-pill small" style="background-color: rgba(147, 51, 234, 0.1); color: #9333ea;">
                                Tier 1 Access
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2" style="font-family: var(--font-heading);">Super Admin Suite</h5>
                        <p class="text-muted small mb-3" style="line-height: 1.6;">
                            Global system monitoring, multi-branch hospital tenant provisioning, subscription licensing, and immutable security audit logs.
                        </p>
                        <ul class="list-unstyled small text-secondary mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Tenant onboarding &amp; branches</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Role-based user administration</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Global compliance audit trail</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Legal &amp; public pages (CMS)</li>
                        </ul>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold">
                        Super Admin Sign In <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2: Hospital Admin Gateway -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between transition-all hover-translate">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 bg-primary-subtle text-primary" style="background-color: rgba(0, 82, 204, 0.12); color: #0052cc;">
                                <i class="fas fa-hospital fs-4"></i>
                            </div>
                            <span class="badge bg-primary-subtle text-primary border px-3 py-1 rounded-pill small" style="background-color: rgba(0, 82, 204, 0.1); color: #0052cc;">
                                Hospital Leadership
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2" style="font-family: var(--font-heading);">Hospital Leadership Suite</h5>
                        <p class="text-muted small mb-3" style="line-height: 1.6;">
                            Accreditation readiness overview, departmental risk heatmaps, SOP authorization workflows, and statutory board reports.
                        </p>
                        <ul class="list-unstyled small text-secondary mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Readiness score gauge (0-100%)</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Departmental SOP approvals</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> High-risk CAPA closure queue</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Executive PDF compliance exports</li>
                        </ul>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary w-100 rounded-pill fw-bold">
                        Hospital Admin Sign In <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3: NABH Quality Coordinator -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between transition-all hover-translate">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 bg-emerald-subtle text-emerald" style="background-color: rgba(0, 208, 132, 0.15); color: #00875a;">
                                <i class="fas fa-clipboard-check fs-4"></i>
                            </div>
                            <span class="badge border px-3 py-1 rounded-pill small" style="background-color: rgba(0, 208, 132, 0.1); color: #00875a;">
                                Quality Manager
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2" style="font-family: var(--font-heading);">NABH Coordinator Hub</h5>
                        <p class="text-muted small mb-3" style="line-height: 1.6;">
                            Operational workspace for NABH 5th Edition Chapter coordinators, audit checklist logs, incident CAPA cycles, and SOP uploads.
                        </p>
                        <ul class="list-unstyled small text-secondary mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 10 Chapter objective elements</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> OT / ICU / Fire inspection logs</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Document versioning &amp; review</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Incident &amp; CAPA corrective actions</li>
                        </ul>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold">
                        Coordinator Sign In <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 4: HR & Doctor Credentialing -->
            <div class="col-lg-6 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between transition-all hover-translate">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 bg-warning-subtle text-warning-emphasis" style="background-color: rgba(245, 158, 11, 0.15); color: #b45309;">
                                <i class="fas fa-user-doctor fs-4"></i>
                            </div>
                            <span class="badge border px-3 py-1 rounded-pill small" style="background-color: rgba(245, 158, 11, 0.1); color: #b45309;">
                                HR &amp; Privileging
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2" style="font-family: var(--font-heading);">HR &amp; Doctor Credentialing Desk</h5>
                        <p class="text-muted small mb-3" style="line-height: 1.6;">
                            Full credentialing and privileging suite for consultants, medical officers, nurses, and allied health staff. Tracks mandatory BLS/ACLS trainings and license renewals.
                        </p>
                        <div class="row g-2 small text-secondary mb-3">
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Clinical Privileging</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> State Council Registration</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> BLS / ACLS Attendance</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Background Verifications</div>
                        </div>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold">
                        Access HR &amp; Credentialing <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Card 5: Biomedical Engineering -->
            <div class="col-lg-6 col-md-12">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between transition-all hover-translate">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="p-3 rounded-3 bg-info-subtle text-info-emphasis" style="background-color: rgba(6, 182, 212, 0.15); color: #0e7490;">
                                <i class="fas fa-microscope fs-4"></i>
                            </div>
                            <span class="badge border px-3 py-1 rounded-pill small" style="background-color: rgba(6, 182, 212, 0.1); color: #0e7490;">
                                Biomedical &amp; Facility
                            </span>
                        </div>
                        <h5 class="fw-bold text-navy mb-2" style="font-family: var(--font-heading);">Biomedical &amp; Engineering Desk</h5>
                        <p class="text-muted small mb-3" style="line-height: 1.6;">
                            Centralized equipment inventory, traceable calibration certificates, preventative maintenance (PPM) logs, and breakdown downtime analytics.
                        </p>
                        <div class="row g-2 small text-secondary mb-3">
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> NABL Traceable Calibrations</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Equipment Breakdown MTTR</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> Medical Gas Pipeline (MGPS)</div>
                            <div class="col-6"><i class="fas fa-check text-success me-1"></i> STP &amp; Fire Safety NOCs</div>
                        </div>
                    </div>
                    <a href="<?= site_url('login') ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold">
                        Access Biomedical Desk <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Demo Credentials / Help Note -->
        <div class="p-4 rounded-4 bg-white border shadow-sm">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 rounded-circle bg-warning bg-opacity-15 text-warning">
                        <i class="fas fa-circle-info fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-navy mb-1">Need Access Credentials or Assistance?</h6>
                        <p class="text-muted small mb-0">Contact your hospital Super Administrator or submit a request to our 24x7 accreditation advisory team.</p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= site_url('contact') ?>" class="btn btn-outline-secondary px-4 rounded-pill small fw-bold">
                        Contact Support
                    </a>
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-secondary px-4 rounded-pill small fw-bold">
                        Direct Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
