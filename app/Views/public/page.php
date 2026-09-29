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
                <h1 class="page-banner-title"><?= esc($page['title'] ?? 'Legal & Compliance Policy') ?></h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active"><?= esc($page['title'] ?? 'Policy') ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON TOP 3 STATUTORY HIGHLIGHT CARDS (FOR COMPLIANCE/LEGAL)
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- Card 1: Independent Advisory -->
            <div class="col-md-4">
                <div class="card-hinton-contact-info h-100">
                    <div class="contact-icon-box icon-blue">
                        <i class="fas fa-building-shield"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Independent QMS Platform</h5>
                    <p class="small text-muted mb-0 flex-grow-1">
                        Independent preparatory guidance &amp; digital audit tool for hospitals preparing for NABH 5th Edition &amp; JCI standards.
                    </p>
                </div>
            </div>

            <!-- Card 2: Self-Assessment Estimator -->
            <div class="col-md-4">
                <div class="card-hinton-contact-info h-100">
                    <div class="contact-icon-box icon-teal">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Self-Assessment Scoring</h5>
                    <p class="small text-muted mb-0 flex-grow-1">
                        Readiness scores and gap percentages are self-evaluations based on hospital inputs and do not substitute statutory inspections.
                    </p>
                </div>
            </div>

            <!-- Card 3: Non-Diagnostic Scope -->
            <div class="col-md-4">
                <div class="card-hinton-contact-info h-100">
                    <div class="contact-icon-box icon-gold">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Clinical Governance Scope</h5>
                    <p class="small text-muted mb-0 flex-grow-1">
                        SOPs and checklist workflows are designed for institutional quality management and do not constitute direct patient medical advice.
                    </p>
                </div>
            </div>
        </div>

        <!-- =========================================================
             HINTON MAIN DOCUMENT BODY & SIDEBAR
        ========================================================= -->
        <div class="row g-5 align-items-start">
            <!-- Sidebar Navigation & Trust Card -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <!-- Legal Quick Links Card -->
                    <div class="card card-max p-4 mb-4 border-0 shadow-sm">
                        <h6 class="fw-bold text-navy mb-3 d-flex align-items-center gap-2" style="font-family: var(--font-heading);">
                            <i class="fas fa-scale-balanced text-primary"></i> Legal &amp; Governance Hub
                        </h6>
                        <div class="list-group list-group-flush border-0">
                            <a href="<?= site_url('compliance-disclaimer') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 mb-2 <?= ($slug ?? '') === 'compliance-disclaimer' ? 'bg-primary text-white fw-bold shadow-sm' : 'text-secondary' ?>">
                                <i class="fas fa-triangle-exclamation me-2"></i> Compliance Disclaimer
                            </a>
                            <a href="<?= site_url('privacy-policy') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 mb-2 <?= ($slug ?? '') === 'privacy-policy' ? 'bg-primary text-white fw-bold shadow-sm' : 'text-secondary' ?>">
                                <i class="fas fa-user-shield me-2"></i> Privacy Policy
                            </a>
                            <a href="<?= site_url('terms-of-service') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 mb-2 <?= ($slug ?? '') === 'terms-of-service' ? 'bg-primary text-white fw-bold shadow-sm' : 'text-secondary' ?>">
                                <i class="fas fa-file-contract me-2"></i> Terms of Service
                            </a>
                            <a href="<?= site_url('portal-gateway') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 <?= ($slug ?? '') === 'portal-gateway' ? 'bg-primary text-white fw-bold shadow-sm' : 'text-secondary' ?>">
                                <i class="fas fa-network-wired me-2"></i> Portal Gateway
                            </a>
                        </div>
                    </div>

                    <!-- Certified Assessor Review Badge -->
                    <div class="card card-max p-4 mb-4 border-0 shadow-sm">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-circle bg-success bg-opacity-10 text-success">
                                <i class="fas fa-certificate fs-3"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-navy mb-0">Periodic Regulatory Review</h6>
                                <span class="small text-muted">Reviewed quarterly for NABH 5th Ed updates</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-0">
                            Our compliance advisory board continuously updates frameworks based on the latest National Accreditation Board circulars and gazettes.
                        </p>
                    </div>

                    <!-- Advisory Helpline Widget -->
                    <div class="card card-max p-4 bg-navy-gradient text-white border-0 shadow-lg">
                        <div class="d-flex align-items-center gap-2 mb-2 text-warning small fw-bold text-uppercase" style="letter-spacing: 0.08em;">
                            <i class="fas fa-headset"></i> Advisory Desk
                        </div>
                        <h5 class="fw-bold text-white mb-2">Have Regulatory Questions?</h5>
                        <p class="small text-light opacity-85 mb-3" style="line-height: 1.6;">
                            Our certified NABH lead assessors are available to clarify regulatory interpretations and audit readiness queries.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="tel:<?= esc(str_replace(' ', '', site_setting('helpline_tollfree', '+9118004195959'))) ?>" class="btn btn-hinton-secondary btn-sm fw-bold py-2">
                                <i class="fas fa-phone-alt me-1"></i> Call <?= esc(site_setting('helpline_tollfree', '+91 1800-419-5959')) ?>
                            </a>
                            <a href="<?= site_url('contact') ?>" class="btn btn-outline-light btn-sm fw-bold py-2">
                                <i class="fas fa-envelope-open-text me-1"></i> Request Advisory Call
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Document Content Area -->
            <div class="col-lg-8">
                <div class="card card-max p-4 p-md-5 shadow-lg border-0 bg-white">
                    <!-- Document Header Meta Bar -->
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom pb-4 mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-navy border px-3 py-2 rounded-pill small fw-semibold">
                                <i class="fas fa-clock-rotate-left text-primary me-1"></i> 
                                Effective Date: <?= !empty($page['updated_at']) ? date('F j, Y', strtotime($page['updated_at'])) : date('F j, Y') ?>
                            </span>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-3 py-2 rounded-pill small">
                                <i class="fas fa-circle-check me-1"></i> Active Policy
                            </span>
                        </div>
                        <div class="d-flex gap-2">
                            <button onclick="window.print()" class="btn btn-outline-secondary btn-sm rounded-pill px-3 fw-semibold">
                                <i class="fas fa-print me-1"></i> Print
                            </button>
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-hinton-primary btn-sm rounded-pill px-3 fw-semibold">
                                <i class="fas fa-calculator me-1"></i> Readiness Tool
                            </a>
                        </div>
                    </div>

                    <!-- Statutory Notice Box -->
                    <div class="p-4 rounded-4 mb-4 border-start border-4 border-warning" style="background-color: #fffbeb; border-color: #f59e0b !important;">
                        <div class="d-flex gap-3">
                            <i class="fas fa-triangle-exclamation text-warning fs-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold text-navy mb-1">Statutory Notice &amp; Legal Interpretation</h6>
                                <p class="small text-secondary mb-0" style="line-height: 1.65;">
                                    This document outlines the operational scope, liability limitations, and statutory independence of the Hinton Hospital Quality Management platform under applicable healthcare compliance laws.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Parsed Content Body -->
                    <div class="article-content-body" style="color: #334155; font-size: 1.02rem; line-height: 1.85;">
                        <?php 
                        $rawContent = $page['content'] ?? '';
                        $lines = explode("\n", $rawContent);
                        $inList = false;

                        foreach ($lines as $line) :
                            $trimmed = trim($line);
                            if (empty($trimmed)) {
                                if ($inList) {
                                    echo "</ul>";
                                    $inList = false;
                                }
                                continue;
                            }

                            // Heading 3: ###
                            if (strpos($trimmed, '### ') === 0) {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                $heading = substr($trimmed, 4);
                                echo '<h4 class="fw-bold text-navy mt-4 mb-3 pt-3 pb-2 border-bottom" style="font-family: var(--font-heading); color: #07193b; letter-spacing: -0.01em;">' . esc($heading) . '</h4>';
                            }
                            // Heading 2: ##
                            elseif (strpos($trimmed, '## ') === 0) {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                $heading = substr($trimmed, 3);
                                echo '<h3 class="fw-extrabold text-navy mt-4 mb-3" style="font-family: var(--font-heading); color: #07193b;">' . esc($heading) . '</h3>';
                            }
                            // List items: - or *
                            elseif (strpos($trimmed, '- ') === 0 || strpos($trimmed, '* ') === 0) {
                                if (!$inList) {
                                    echo '<ul class="list-unstyled mb-3 ps-1">';
                                    $inList = true;
                                }
                                $itemText = substr($trimmed, 2);
                                $formattedItem = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', esc($itemText));
                                echo '<li class="mb-2 d-flex align-items-start gap-2"><i class="fas fa-circle-check text-success mt-1" style="font-size: 0.9rem;"></i> <span>' . $formattedItem . '</span></li>';
                            }
                            // Paragraph
                            else {
                                if ($inList) { echo "</ul>"; $inList = false; }
                                $formattedPara = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', esc($trimmed));
                                echo '<p class="mb-3">' . $formattedPara . '</p>';
                            }
                        endforeach;

                        if ($inList) { echo "</ul>"; }
                        ?>
                    </div>

                    <!-- Bottom Guarantee Strip -->
                    <div class="mt-5 p-4 rounded-4 bg-light border border-light-subtle d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 text-primary flex-shrink-0">
                            <i class="fas fa-shield-halved fs-3"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-navy mb-1">Standard Compliance Commitment</h6>
                            <p class="small text-muted mb-0">
                                This framework is periodically reviewed in accordance with the National Accreditation Board for Hospitals &amp; Healthcare Providers (NABH 5th Edition) standards.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON EMERGENCY ACTION CALLOUT BANNER
========================================================= -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <div class="hinton-emergency-banner">
            <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
                <div class="col-lg-8">
                    <span class="badge bg-white text-navy px-3 py-1 fw-bold rounded-pill mb-3">Toll-Free Hospital Support</span>
                    <h3 class="display-6 fw-bold text-white mb-2">Need Immediate Accreditation Guidance?</h3>
                    <p class="lead text-light mb-0" style="font-size: 1.05rem; opacity: 0.9;">
                        Connect with our certified quality advisory desk for rapid pre-assessment reviews and compliance remediation.
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
