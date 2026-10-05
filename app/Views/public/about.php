<!-- =========================================================
     PAGE BANNER / HEADER (HOSPITAL QUALITY MANAGEMENT)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Elements -->
            <div class="banner-molecule-left"><i class="fas fa-hospital"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-shield-halved"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">About Our Quality Governance</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">About Hospital Quality Management</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 1: CLINICAL EXCELLENCE & PLATFORM MISSION
========================================================= -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5 mb-5">
            
            <!-- Left Column: High-Trust Hospital Visual Card -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="card p-2 rounded-4 shadow-xl border bg-white" style="border-color: #cbd5e1 !important;">
                        <img src="<?= base_url('assets/images/audit_ready_hospital.jpg') ?>"
                             alt="Hospital Quality Management Team" 
                             class="img-fluid rounded-3 shadow-sm w-100" 
                             style="max-height: 440px; object-fit: cover;">
                        
                        <!-- Experience Floating Badge -->
                        <div class="p-3 bg-white rounded-3 shadow-lg position-absolute bottom-0 start-0 m-3 border d-flex align-items-center gap-3" style="max-width: 320px; border-color: #e2e8f0 !important;">
                            <div class="p-2 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 46px; height: 46px;">
                                <i class="fas fa-award fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-navy">NABH 5th Edition Ready</h6>
                                <span class="small text-muted" style="font-size: 0.78rem;">National Healthcare Standards</span>
                            </div>
                        </div>

                        <!-- ABDM M3 Badge -->
                        <div class="p-2 px-3 bg-white text-navy border rounded-pill shadow-md position-absolute top-0 end-0 m-3 d-flex align-items-center gap-2">
                            <i class="fas fa-shield-halved text-success"></i>
                            <span class="small fw-bold text-navy" style="font-size: 0.78rem;">ABDM M3 &amp; DPDP 2023</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Content & Clinical Governance Checkpoints -->
            <div class="col-lg-6">
                <span class="badge badge-max badge-max-sapphire mb-2"><i class="fas fa-heart-pulse text-primary me-1"></i> Patient Safety &amp; Governance</span>
                <h2 class="display-6 fw-bold text-navy mb-3">Elevating Healthcare Standards Across Indian Hospitals</h2>
                <p class="text-muted mb-3" style="font-size: 1.02rem; line-height: 1.6;">
                    Healthcare quality is a living, everyday commitment to patient safety, clinical accuracy, and zero preventable harm. <strong>Hospital Quality Management (HQM)</strong> bridges the gap between statutory NABH 5th Edition requirements and day-to-day departmental hospital operations.
                </p>
                <p class="text-muted mb-4" style="font-size: 1.02rem; line-height: 1.6;">
                    By replacing fragmented paper files with structured, automated digital workflows, we empower Medical Directors, Nursing Superintendents, and Quality Coordinators to maintain continuous, 24/7 audit readiness.
                </p>

                <!-- Checkpoints Grid -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-circle-check text-success fs-5 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 text-navy">Full 10-Chapter Scope</h6>
                                <p class="small text-muted mb-0">Complete coverage across all 651 NABH 5th Edition objective elements.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-circle-check text-success fs-5 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 text-navy">Version-Controlled SOPs</h6>
                                <p class="small text-muted mb-0">Automated revision histories (V1.0 &rarr; V2.0) and approval logs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-circle-check text-success fs-5 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 text-navy">Doctor Credentialing</h6>
                                <p class="small text-muted mb-0">Primary source degree verification and 4-tier privileging matrix.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-circle-check text-success fs-5 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1 text-navy">Biomedical Radar</h6>
                                <p class="small text-muted mb-0">Pre-expiry NABL calibration alerts for critical ICU &amp; OT equipment.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= site_url('standards') ?>" class="btn btn-primary px-4 py-2 fw-bold" style="background: #0c74c5; border: none; border-radius: 8px;">
                        <i class="fas fa-book-medical me-1"></i> Explore NABH Standards
                    </a>
                    <a href="<?= site_url('contact') ?>" class="btn btn-outline-primary px-4 py-2 fw-semibold" style="border-radius: 8px;">
                        <i class="fas fa-headset me-1"></i> Book Mock Hospital Audit
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 2: CORE VALUES & GUIDING PRINCIPLES (4-CARD GRID)
========================================================= -->
<section class="py-5 bg-main border-top border-bottom" style="background-color: #f8fafc;">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-gold mb-2"><i class="fas fa-gem text-warning me-1"></i> Guiding Principles</span>
            <h2 class="display-6 fw-bold text-navy">Core Quality Values &amp; Mission</h2>
            <p class="text-muted">The foundational principles that steer our healthcare quality governance platform.</p>
        </div>

        <div class="row g-4">
            <!-- Value 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Our Mission</h5>
                        <p class="small text-muted mb-0">
                            To eliminate compliance fragmentation and empower hospitals with digitized SOP workflows, transparent audit trails, and zero preventable clinical harm.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Value 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-info bg-opacity-10 text-info p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Our Vision</h5>
                        <p class="small text-muted mb-0">
                            To establish a transparent national quality benchmark where every healthcare facility achieves and sustains accredited patient safety excellence.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Value 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-success bg-opacity-10 text-success p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Clinical Integrity</h5>
                        <p class="small text-muted mb-0">
                            Rigorous clinician degree verification, transparent credentials committees, and evidence-backed procedural privileging scopes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Value 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-max p-4 h-100 border bg-white shadow-xs d-flex flex-column justify-content-between" style="border-radius: 16px;">
                    <div>
                        <div class="rounded-3 bg-warning bg-opacity-10 text-warning p-3 d-inline-flex mb-3" style="font-size: 1.5rem;">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2">Safety &amp; Innovation</h5>
                        <p class="small text-muted mb-0">
                            Automating high-risk asset monitoring, NABL traceable calibrations, monthly HAI infection surveillance, and facility fire safety systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 3: KEY STATISTICS COUNTER STRIP
========================================================= -->
<section class="stats-counter-section">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row g-4">
            <div class="col-6 col-lg-3">
                <div class="stat-counter-box">
                    <div class="counter-number">10</div>
                    <div class="counter-label">NABH Core Chapters</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-counter-box">
                    <div class="counter-number">651</div>
                    <div class="counter-label">Objective Elements</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-counter-box">
                    <div class="counter-number">32</div>
                    <div class="counter-label">Live Quality KPIs</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-counter-box">
                    <div class="counter-number">100%</div>
                    <div class="counter-label">Tamper-Proof Audit Trail</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 4: WHY CHOOSE HOSPITAL QUALITY MANAGEMENT
========================================================= -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            
            <!-- Left: 6 Feature Highlights -->
            <div class="col-lg-6">
                <span class="badge badge-max badge-max-emerald mb-2"><i class="fas fa-check-double text-success me-1"></i> Purpose-Built DQMS</span>
                <h2 class="display-6 fw-bold text-navy mb-3">Engineered Specifically For Hospital Accreditation</h2>
                <p class="text-muted mb-4" style="line-height: 1.6;">
                    Unlike generic document repositories, Hospital Quality Management is built around the exact statutory inspection criteria established by NABH 5th Edition and the National Health Authority.
                </p>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 border h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-file-signature text-primary me-2"></i> Paperless SOPs</h6>
                            <p class="small text-muted mb-0">Multi-tier review, version control, and instant one-click evidence packaging.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 border h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-user-doctor text-success me-2"></i> Doctor Privileging</h6>
                            <p class="small text-muted mb-0">Council validity alerts and procedural competency grids.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 border h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-wrench text-warning me-2"></i> Calibration Radar</h6>
                            <p class="small text-muted mb-0">Pre-expiry notifications for ICU &amp; OT biomedical assets.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 border h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-chart-line text-info me-2"></i> Real-time KPIs</h6>
                            <p class="small text-muted mb-0">Automated calculation of 32 NABH quality indicators.</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= site_url('assessment-tool') ?>" class="btn btn-warning px-4 py-2 fw-bold text-white" style="background: #ff7a00; border: none; border-radius: 8px;">
                        <i class="fas fa-calculator me-1"></i> Start Gap Assessment
                    </a>
                    <a href="<?= site_url('clinical-workflow') ?>" class="btn btn-outline-navy px-4 py-2" style="border-radius: 8px;">
                        <i class="fas fa-heart-pulse me-1"></i> Clinical &amp; DPDP Hub
                    </a>
                </div>
            </div>

            <!-- Right: High-Tech Command Visual -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="card p-2 rounded-4 shadow-xl border bg-white" style="border-color: #cbd5e1 !important;">
                        <img src="<?= base_url('assets/images/dqms_vision_mission.jpg') ?>" 
                             alt="Hospital Accreditation Command Center" 
                             class="img-fluid rounded-3 shadow-sm w-100" 
                             style="max-height: 420px; object-fit: cover;">
                        <div class="p-3 bg-light rounded-3 mt-2 border text-center">
                            <span class="text-navy fw-bold small"><i class="fas fa-award text-success me-1"></i> 100% NABH 5th Edition Compliance Pass Guarantee</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
