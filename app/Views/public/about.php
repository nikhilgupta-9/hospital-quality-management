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
                <h1 class="page-banner-title"><?= esc($page['title'] ?? 'About Hospital Quality Management') ?></h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">About Us</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 1: CLINICAL EXCELLENCE & PLATFORM MISSION
========================================================= -->
<section class="py-5" style="background-color: #ffffff;">
    <div class="container py-3 py-md-4">
        <div class="row align-items-center g-4 g-lg-5 mb-5">
            
            <!-- Left Column: High-Trust Hospital Visual Card -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="p-2 rounded-4 shadow-sm border bg-white" style="border-color: #dce8f6 !important;">
                        <img src="<?= base_url('assets/images/audit_ready_hospital.jpg') ?>"
                             alt="Hospital Quality Management Healthcare Team" 
                             class="img-fluid rounded-3 w-100" 
                             style="max-height: 440px; object-fit: cover;">
                        
                        <!-- Floating Experience Badge -->
                        <div class="p-3 bg-white rounded-3 shadow-md position-absolute bottom-0 start-0 m-3 border d-flex align-items-center gap-3" style="max-width: 320px; border-color: #dce8f6 !important;">
                            <div class="p-2 text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="background-color: #0c74c5; width: 46px; height: 46px;">
                                <i class="fas fa-award fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-navy">NABH 5th Edition Ready</h6>
                                <span class="small text-muted" style="font-size: 0.78rem;">651 Objective Elements</span>
                            </div>
                        </div>

                        <!-- ABDM & DPDP Badge -->
                        <div class="p-2 px-3 bg-white text-navy border rounded-pill shadow-sm position-absolute top-0 end-0 m-3 d-flex align-items-center gap-2" style="border-color: #dce8f6 !important;">
                            <i class="fas fa-shield-halved" style="color: #ff7a00;"></i>
                            <span class="small fw-bold text-navy" style="font-size: 0.78rem;">ABDM M3 &amp; DPDP 2023</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Mission Content & Governance Checkpoints -->
            <div class="col-lg-6">
                <span class="badge px-3 py-1 mb-2 fw-bold text-white" style="background-color: #0c74c5; font-size: 0.82rem; border-radius: 6px;">
                    <i class="fas fa-heart-pulse text-warning me-1"></i> Patient Safety &amp; Governance
                </span>
                
                <h2 class="display-6 fw-bold text-navy mb-3"><?= esc($page['title'] ?? 'Elevating Healthcare Standards Across Indian Hospitals') ?></h2>
                
                <?php if (!empty($page['subtitle'])): ?>
                    <p class="lead fw-semibold mb-3" style="color: #0c74c5; font-size: 1.05rem; line-height: 1.5;">
                        <?= esc($page['subtitle']) ?>
                    </p>
                <?php endif; ?>

                <p class="text-muted mb-4" style="color: #4b5563 !important; font-size: 0.98rem; line-height: 1.7;">
                    Healthcare quality is a living, everyday commitment to patient safety, clinical accuracy, and zero preventable harm. <strong>Hospital Quality Management (HQM)</strong> bridges the gap between statutory NABH 5th Edition requirements and day-to-day departmental hospital operations.
                </p>

                <!-- Checkpoints Grid -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-circle-check text-success fs-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 text-navy fs-6">Full 10-Chapter Scope</h6>
                                    <p class="small text-muted mb-0" style="font-size: 0.8rem;">Complete coverage across all 651 NABH 5th Edition objective elements.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-circle-check text-success fs-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 text-navy fs-6">Version-Controlled SOPs</h6>
                                    <p class="small text-muted mb-0" style="font-size: 0.8rem;">Automated revision histories (V1.0 &rarr; V2.0) and approval logs.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-circle-check text-success fs-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 text-navy fs-6">Doctor Credentialing</h6>
                                    <p class="small text-muted mb-0" style="font-size: 0.8rem;">Primary source degree verification and 4-tier privileging matrix.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <div class="d-flex align-items-start gap-2">
                                <i class="fas fa-circle-check text-success fs-5 mt-1 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 text-navy fs-6">Biomedical Radar</h6>
                                    <p class="small text-muted mb-0" style="font-size: 0.8rem;">Pre-expiry NABL calibration alerts for critical ICU &amp; OT equipment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= site_url('standards') ?>" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #0c74c5; border-radius: 8px;">
                        <i class="fas fa-book-medical me-1"></i> Explore NABH Standards
                    </a>
                    <a href="<?= site_url('contact') ?>" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #ff7a00; border-radius: 8px;">
                        <i class="fas fa-headset me-1"></i> Book Hospital Audit
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 2: CORE VALUES & GUIDING PRINCIPLES (4-CARD GRID)
========================================================= -->
<section class="py-5" style="background-color: #f8fafc; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div class="container py-3 py-md-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge px-3 py-1 mb-2 fw-bold text-white" style="background-color: #ff7a00; font-size: 0.82rem; border-radius: 6px;">
                <i class="fas fa-gem text-warning me-1"></i> Guiding Principles
            </span>
            <h2 class="display-6 fw-bold text-navy">Core Quality Values &amp; Mission</h2>
            <p class="text-muted small">The foundational principles that steer our healthcare quality governance platform.</p>
        </div>

        <div class="row g-4">
            <!-- Value 1 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 h-100 border bg-white shadow-sm rounded-4 d-flex flex-column justify-content-between" style="border-top: 4px solid #0c74c5 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-3 p-3 d-inline-flex mb-3 align-items-center justify-content-center" style="background-color: #e6efff; color: #0c74c5; font-size: 1.4rem; width: 50px; height: 50px;">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">Our Mission</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            To eliminate compliance fragmentation and empower hospitals with digitized SOP workflows, transparent audit trails, and zero preventable clinical harm.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Value 2 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 h-100 border bg-white shadow-sm rounded-4 d-flex flex-column justify-content-between" style="border-top: 4px solid #ff7a00 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-3 p-3 d-inline-flex mb-3 align-items-center justify-content-center" style="background-color: #fff2e6; color: #ff7a00; font-size: 1.4rem; width: 50px; height: 50px;">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">Our Vision</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            To establish a transparent national quality benchmark where every healthcare facility achieves and sustains accredited patient safety excellence.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Value 3 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 h-100 border bg-white shadow-sm rounded-4 d-flex flex-column justify-content-between" style="border-top: 4px solid #10b981 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-3 p-3 d-inline-flex mb-3 align-items-center justify-content-center" style="background-color: #e8f9f3; color: #10b981; font-size: 1.4rem; width: 50px; height: 50px;">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">Clinical Integrity</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            Rigorous clinician degree verification, transparent credentials committees, and evidence-backed procedural privileging scopes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Value 4 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="p-4 h-100 border bg-white shadow-sm rounded-4 d-flex flex-column justify-content-between" style="border-top: 4px solid #0284c7 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-3 p-3 d-inline-flex mb-3 align-items-center justify-content-center" style="background-color: #e0f2fe; color: #0284c7; font-size: 1.4rem; width: 50px; height: 50px;">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">Safety &amp; Innovation</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
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
<section class="py-5 text-white" style="background-color: #111a30; border-top: 4px solid #0c74c5; position: relative;">
    <div class="footer-grid-overlay"></div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row g-4 text-center">
            <div class="col-6 col-lg-3">
                <div class="p-3">
                    <div class="display-5 fw-bold text-white mb-1" style="font-family: var(--font-heading);">10</div>
                    <div class="small fw-semibold" style="color: #38bdf8;">NABH Core Chapters</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="p-3">
                    <div class="display-5 fw-bold text-white mb-1" style="font-family: var(--font-heading); color: #ff7a00 !important;">651</div>
                    <div class="small fw-semibold" style="color: #cbd5e1;">Objective Elements</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="p-3">
                    <div class="display-5 fw-bold text-white mb-1" style="font-family: var(--font-heading);">32</div>
                    <div class="small fw-semibold" style="color: #38bdf8;">Live Quality KPIs</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="p-3">
                    <div class="display-5 fw-bold text-white mb-1" style="font-family: var(--font-heading); color: #10b981 !important;">100%</div>
                    <div class="small fw-semibold" style="color: #cbd5e1;">Tamper-Proof Audit Trail</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     SECTION 4: DYNAMIC CMS CONTENT & WHY CHOOSE HQM
========================================================= -->
<section class="py-5" style="background-color: #ffffff;">
    <div class="container py-3 py-md-4">
        
        <?php if (!empty($page['content'])): ?>
            <!-- Dynamic Super Admin CMS Managed Article -->
            <div class="card p-4 p-md-5 mb-5 border-0 shadow-sm rounded-4" style="background-color: #f8fafc; border: 1px solid #dce8f6 !important;">
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3" style="border-color: #e2e8f0 !important;">
                    <span class="badge px-3 py-1 text-white fw-bold" style="background-color: #0c74c5;">
                        <i class="fas fa-file-lines me-1"></i> Institutional Governance Overview
                    </span>
                    <span class="small text-muted font-monospace" style="font-size: 0.75rem;">
                        Last Updated: <?= !empty($page['updated_at']) ? date('M d, Y', strtotime($page['updated_at'])) : date('M d, Y') ?>
                    </span>
                </div>

                <div class="article-content-body" style="color: #1e293b; font-size: 0.98rem; line-height: 1.85;">
                    <?php 
                    $rawContent = $page['content'];
                    if (strip_tags($rawContent) !== $rawContent) {
                        echo $rawContent;
                    } else {
                        $lines = explode("\n", $rawContent);
                        $inList = false;

                        foreach ($lines as $line) :
                            $trimmed = trim($line);
                            if (empty($trimmed)) {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                continue;
                            }

                            if (strpos($trimmed, '### ') === 0) {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                echo '<h4 class="fw-bold text-navy mt-4 mb-2 pt-3 pb-2 border-bottom" style="color: #1a2340; border-color: #e2e8f0 !important;">' . esc(substr($trimmed, 4)) . '</h4>';
                            } elseif (strpos($trimmed, '## ') === 0) {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                echo '<h3 class="fw-bold text-navy mt-4 mb-3" style="color: #1a2340;">' . esc(substr($trimmed, 3)) . '</h3>';
                            } elseif (strpos($trimmed, '- ') === 0 || strpos($trimmed, '* ') === 0) {
                                if (!$inList) {
                                    echo '<ul class="list-unstyled mb-3 ps-1 d-flex flex-column gap-2">';
                                    $inList = true;
                                }
                                $itemText = substr($trimmed, 2);
                                $formattedItem = preg_replace('/\*\*(.*?)\*\*/', '<strong class="text-navy">$1</strong>', esc($itemText));
                                echo '<li class="d-flex align-items-start gap-2"><i class="fas fa-circle-check text-success mt-1" style="font-size: 0.85rem; flex-shrink: 0;"></i> <span style="line-height: 1.55; color: #1e293b;">' . $formattedItem . '</span></li>';
                            } else {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                $formattedPara = preg_replace('/\*\*(.*?)\*\*/', '<strong class="text-navy">$1</strong>', esc($trimmed));
                                echo '<p class="mb-3" style="color: #334155;">' . $formattedPara . '</p>';
                            }
                        endforeach;

                        if ($inList) { echo "</ul>"; }
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Feature Pillars & Command Visual Grid -->
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left: 4 Feature Highlights -->
            <div class="col-lg-6">
                <span class="badge px-3 py-1 mb-2 fw-bold text-white" style="background-color: #ff7a00; font-size: 0.82rem; border-radius: 6px;">
                    <i class="fas fa-check-double text-warning me-1"></i> Purpose-Built DQMS
                </span>
                <h2 class="display-6 fw-bold text-navy mb-3">Engineered Specifically For Hospital Accreditation</h2>
                <p class="text-muted mb-4" style="color: #4b5563 !important; line-height: 1.7;">
                    Unlike generic document repositories, Hospital Quality Management is built around the exact statutory inspection criteria established by NABH 5th Edition, the National Health Authority (ABDM), and DPDP Act 2023.
                </p>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-file-signature text-primary me-2"></i> Paperless SOPs</h6>
                            <p class="small text-muted mb-0" style="font-size: 0.8rem;">Multi-tier review, version control, and instant one-click evidence packaging.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-user-doctor text-success me-2"></i> Doctor Privileging</h6>
                            <p class="small text-muted mb-0" style="font-size: 0.8rem;">Council validity alerts and procedural competency grids.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-wrench text-warning me-2"></i> Calibration Radar</h6>
                            <p class="small text-muted mb-0" style="font-size: 0.8rem;">Pre-expiry notifications for ICU &amp; OT biomedical assets.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-chart-line text-info me-2"></i> Real-time KPIs</h6>
                            <p class="small text-muted mb-0" style="font-size: 0.8rem;">Automated calculation of 32 NABH quality indicators.</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= site_url('assessment-tool') ?>" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #ff7a00; border-radius: 8px;">
                        <i class="fas fa-calculator me-1"></i> Start Gap Assessment
                    </a>
                    <a href="<?= site_url('clinical-workflow') ?>" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #0c74c5; border-radius: 8px;">
                        <i class="fas fa-heart-pulse me-1"></i> Clinical &amp; DPDP Hub
                    </a>
                </div>
            </div>

            <!-- Right: Command Visual -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="p-2 rounded-4 shadow-sm border bg-white" style="border-color: #dce8f6 !important;">
                        <img src="<?= base_url('assets/images/dqms_vision_mission.jpg') ?>" 
                             alt="Hospital Accreditation Command Center" 
                             class="img-fluid rounded-3 w-100" 
                             style="max-height: 420px; object-fit: cover;">
                        <div class="p-3 rounded-3 mt-2 border text-center" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                            <span class="text-navy fw-bold small"><i class="fas fa-award text-success me-1"></i> 100% NABH 5th Edition Compliance &amp; Digital Audit Defense</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Action Callout (Solid Flat Style) -->
<section class="py-5" style="background-color: #ffffff; border-top: 1px solid #e2e8f0;">
    <div class="container">
        <div class="card p-4 p-md-5 text-center text-white border-0 shadow-sm" style="background-color: #1a2340; border-radius: 18px;">
            <div class="row align-items-center g-4">
                <div class="col-lg-8 text-lg-start">
                    <span class="badge px-3 py-1 fw-bold text-white mb-2" style="background-color: #ff7a00; font-size: 0.78rem;">Hospital Governance Advisory</span>
                    <h3 class="h3 fw-bold text-white mb-2">Ready to Standardize Hospital Quality &amp; NABH Compliance?</h3>
                    <p class="text-white-50 mb-0" style="font-size: 0.95rem; color: #cbd5e1 !important;">
                        Schedule an executive walkthrough with our NABH lead assessors and discover how HQM transforms accreditation preparation.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= site_url('contact') ?>" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #ff7a00; border-radius: 8px;">
                        <i class="fas fa-calendar-check me-2"></i> Book Mock Hospital Audit
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
