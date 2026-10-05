<!-- =========================================================
     PAGE BANNER / HEADER (HOSPITAL QUALITY MANAGEMENT)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Elements -->
            <div class="banner-molecule-left"><i class="fas fa-file-shield"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-scale-balanced"></i></div>

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
     TOP 3 STATUTORY HIGHLIGHT CARDS
========================================================= -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- Card 1: Independent Quality Platform -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 border shadow-sm text-center d-flex flex-column justify-content-between" style="background-color: #ffffff; border-top: 4px solid #0c74c5 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 56px; height: 56px; background-color: #e6efff; color: #0c74c5; font-size: 1.4rem;">
                            <i class="fas fa-building-shield"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">Independent QMS Platform</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            Pre-assessment preparatory guidance and digital compliance audit tools for hospitals aligning with NABH 5th Edition &amp; JCI standards.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2: DPDP 2023 Statutory Protection -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 border shadow-sm text-center d-flex flex-column justify-content-between" style="background-color: #ffffff; border-top: 4px solid #ff7a00 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 56px; height: 56px; background-color: #fff2e6; color: #ff7a00; font-size: 1.4rem;">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">DPDP Act 2023 Compliance</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            Strict healthcare data fiduciary safeguards, multi-lingual consent records, SHA-256 signatures, and irrevocable audit trails.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Clinical Governance Scope -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 border shadow-sm text-center d-flex flex-column justify-content-between" style="background-color: #ffffff; border-top: 4px solid #10b981 !important; border-color: #dce8f6;">
                    <div>
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 56px; height: 56px; background-color: #e8f9f3; color: #10b981; font-size: 1.4rem;">
                            <i class="fas fa-notes-medical"></i>
                        </div>
                        <h5 class="fw-bold text-navy mb-2 fs-6">Clinical Governance Scope</h5>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            SOPs and checklist workflows are designed for institutional quality management and do not substitute statutory medical registrations.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- =========================================================
             MAIN DOCUMENT BODY & SIDEBAR
        ========================================================= -->
        <div class="row g-4 g-lg-5 align-items-start">
            <!-- Sidebar Navigation & Trust Card -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <!-- Legal Quick Links Card -->
                    <div class="card p-4 mb-4 border-0 shadow-sm rounded-4" style="background-color: #ffffff; border: 1px solid #dce8f6 !important;">
                        <h6 class="fw-bold text-navy mb-3 d-flex align-items-center gap-2">
                            <i class="fas fa-scale-balanced text-primary"></i> Legal &amp; Governance Hub
                        </h6>
                        <div class="list-group list-group-flush border-0">
                            <a href="<?= site_url('privacy-policy') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 mb-2 <?= ($slug ?? '') === 'privacy-policy' ? 'fw-bold shadow-sm' : 'text-navy' ?>" 
                               style="<?= ($slug ?? '') === 'privacy-policy' ? 'background-color: #0c74c5; color: #ffffff !important;' : 'background-color: #f8fafc;' ?>">
                                <i class="fas fa-user-shield me-2"></i> Privacy &amp; DPDP Policy
                            </a>
                            <a href="<?= site_url('terms-of-service') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 mb-2 <?= ($slug ?? '') === 'terms-of-service' ? 'fw-bold shadow-sm' : 'text-navy' ?>"
                               style="<?= ($slug ?? '') === 'terms-of-service' ? 'background-color: #0c74c5; color: #ffffff !important;' : 'background-color: #f8fafc;' ?>">
                                <i class="fas fa-file-contract me-2"></i> Terms of Service
                            </a>
                            <a href="<?= site_url('compliance-disclaimer') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 mb-2 <?= ($slug ?? '') === 'compliance-disclaimer' ? 'fw-bold shadow-sm' : 'text-navy' ?>"
                               style="<?= ($slug ?? '') === 'compliance-disclaimer' ? 'background-color: #0c74c5; color: #ffffff !important;' : 'background-color: #f8fafc;' ?>">
                                <i class="fas fa-triangle-exclamation me-2"></i> Compliance Disclaimer
                            </a>
                            <a href="<?= site_url('portal-gateway') ?>" class="list-group-item list-group-item-action border-0 px-3 py-2 rounded-3 <?= ($slug ?? '') === 'portal-gateway' ? 'fw-bold shadow-sm' : 'text-navy' ?>"
                               style="<?= ($slug ?? '') === 'portal-gateway' ? 'background-color: #0c74c5; color: #ffffff !important;' : 'background-color: #f8fafc;' ?>">
                                <i class="fas fa-network-wired me-2"></i> Portal Gateway Hub
                            </a>
                        </div>
                    </div>

                    <!-- Certified Assessor Review Badge -->
                    <div class="card p-4 mb-4 border-0 shadow-sm rounded-4" style="background-color: #ffffff; border: 1px solid #dce8f6 !important;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-3 text-success d-flex align-items-center justify-content-center" style="background-color: #e8f9f3; width: 48px; height: 48px;">
                                <i class="fas fa-certificate fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-navy mb-0">Periodic Regulatory Review</h6>
                                <span class="small text-muted" style="font-size: 0.78rem;">Reviewed quarterly for NABH 5th Ed</span>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="color: #4b5563 !important; line-height: 1.6;">
                            Our healthcare compliance board continuously updates frameworks based on the latest National Accreditation Board circulars and gazettes.
                        </p>
                    </div>

                    <!-- Advisory Helpline Widget -->
                    <div class="card p-4 text-white border-0 shadow-sm rounded-4" style="background-color: #1a2340;">
                        <div class="d-flex align-items-center gap-2 mb-2 small fw-bold text-uppercase" style="color: #ff7a00; letter-spacing: 0.08em;">
                            <i class="fas fa-headset"></i> Advisory Desk
                        </div>
                        <h5 class="fw-bold text-white mb-2 fs-6">Have Governance Questions?</h5>
                        <p class="small text-light opacity-85 mb-3" style="line-height: 1.6; font-size: 0.82rem; color: #cbd5e1 !important;">
                            Our certified NABH lead assessors are available to clarify regulatory interpretations and audit readiness queries.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="tel:18004195959" class="btn btn-sm fw-bold py-2 text-white shadow-sm" style="background-color: #ff7a00; border-radius: 6px;">
                                <i class="fas fa-phone-alt me-1"></i> Call 1800-419-5959
                            </a>
                            <a href="<?= site_url('contact') ?>" class="btn btn-outline-light btn-sm fw-bold py-2" style="border-radius: 6px;">
                                <i class="fas fa-envelope-open-text me-1"></i> Request Advisory Call
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Document Content Area -->
            <div class="col-lg-8">
                <div class="card p-4 p-md-5 shadow-sm border-0 rounded-4" style="background-color: #ffffff; border: 1px solid #dce8f6 !important;">
                    <!-- Document Header Meta Bar -->
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom pb-4 mb-4" style="border-color: #e2e8f0 !important;">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="badge px-3 py-2 rounded-pill small fw-semibold border" style="background-color: #f1f5f9; color: #1a2340; border-color: #cbd5e1 !important;">
                                <i class="fas fa-clock-rotate-left me-1" style="color: #0c74c5;"></i> 
                                Effective Date: <?= !empty($page['updated_at']) ? date('F j, Y', strtotime($page['updated_at'])) : date('F j, Y') ?>
                            </span>
                            <span class="badge text-success px-3 py-2 rounded-pill small border border-success" style="background-color: #e8f9f3;">
                                <i class="fas fa-circle-check me-1"></i> Active Policy
                            </span>
                        </div>
                        <div class="d-flex gap-2">
                            <button onclick="window.print()" class="btn btn-outline-secondary btn-sm rounded-pill px-3 fw-semibold">
                                <i class="fas fa-print me-1"></i> Print
                            </button>
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm rounded-pill px-3 fw-semibold text-white shadow-sm" style="background-color: #0c74c5;">
                                <i class="fas fa-calculator me-1"></i> Readiness Tool
                            </a>
                        </div>
                    </div>

                    <!-- Page Title & Subtitle -->
                    <div class="mb-4">
                        <span class="badge px-3 py-1 mb-2 fw-bold text-white" style="background-color: #0c74c5; font-size: 0.78rem; border-radius: 6px;">
                            <?= esc($badge ?? 'Institutional Governance') ?>
                        </span>
                        <h2 class="h3 fw-bold text-navy mb-2"><?= esc($page['title'] ?? 'Policy Title') ?></h2>
                        <?php if (!empty($page['subtitle'])): ?>
                            <p class="text-muted small mb-0" style="color: #64748b; font-size: 0.95rem;"><?= esc($page['subtitle']) ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Statutory Notice Box -->
                    <div class="p-4 rounded-3 mb-4 border-start border-4" style="background-color: #fffbeb; border-color: #f59e0b !important; border-top: 1px solid #fef3c7; border-right: 1px solid #fef3c7; border-bottom: 1px solid #fef3c7;">
                        <div class="d-flex gap-3">
                            <i class="fas fa-triangle-exclamation text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold text-navy mb-1 fs-6">Statutory Notice &amp; Legal Interpretation</h6>
                                <p class="small mb-0" style="line-height: 1.65; color: #4b5563;">
                                    This document outlines the operational scope, data protection protocols, and regulatory framework of the Hospital Quality Management platform under applicable Indian healthcare compliance laws.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Parsed Dynamic Content Body (Direct from Super Admin CMS) -->
                    <div class="article-content-body" style="color: #1e293b; font-size: 0.98rem; line-height: 1.85;">
                        <?php 
                        $rawContent = $page['content'] ?? '';
                        
                        // Check if content already contains HTML tags like <p>, <h3>, <div>
                        if (strip_tags($rawContent) !== $rawContent) {
                            // Raw HTML from CMS editor
                            echo $rawContent;
                        } else {
                            // Markdown parsing for structured headings, bold, and bullet points
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
                                    echo '<h4 class="fw-bold text-navy mt-4 mb-2 pt-3 pb-2 border-bottom" style="color: #1a2340; border-color: #e2e8f0 !important;">' . esc($heading) . '</h4>';
                                }
                                // Heading 2: ##
                                elseif (strpos($trimmed, '## ') === 0) {
                                    if ($inList) { echo "</ul>"; $inList = false; }
                                    $heading = substr($trimmed, 3);
                                    echo '<h3 class="fw-bold text-navy mt-4 mb-3" style="color: #1a2340;">' . esc($heading) . '</h3>';
                                }
                                // List items: - or *
                                elseif (strpos($trimmed, '- ') === 0 || strpos($trimmed, '* ') === 0) {
                                    if (!$inList) {
                                        echo '<ul class="list-unstyled mb-3 ps-1 d-flex flex-column gap-2">';
                                        $inList = true;
                                    }
                                    $itemText = substr($trimmed, 2);
                                    $formattedItem = preg_replace('/\*\*(.*?)\*\*/', '<strong class="text-navy">$1</strong>', esc($itemText));
                                    echo '<li class="d-flex align-items-start gap-2"><i class="fas fa-circle-check text-success mt-1" style="font-size: 0.85rem; flex-shrink: 0;"></i> <span style="line-height: 1.55; color: #1e293b;">' . $formattedItem . '</span></li>';
                                }
                                // Paragraph
                                else {
                                    if ($inList) { echo "</ul>"; $inList = false; }
                                    $formattedPara = preg_replace('/\*\*(.*?)\*\*/', '<strong class="text-navy">$1</strong>', esc($trimmed));
                                    echo '<p class="mb-3" style="color: #334155;">' . $formattedPara . '</p>';
                                }
                            endforeach;

                            if ($inList) { echo "</ul>"; }
                        }
                        ?>
                    </div>

                    <!-- Bottom Guarantee Strip -->
                    <div class="mt-5 p-4 rounded-3 border d-flex align-items-center gap-3" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                        <div class="rounded-circle p-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="background-color: #e6efff; color: #0c74c5; width: 48px; height: 48px;">
                            <i class="fas fa-shield-halved fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-navy mb-1 fs-6">Standard Compliance Commitment</h6>
                            <p class="small text-muted mb-0" style="color: #4b5563 !important;">
                                This framework is periodically audited in accordance with the National Accreditation Board for Hospitals &amp; Healthcare Providers (NABH 5th Edition) standards.
                            </p>
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
                    <span class="badge px-3 py-1 fw-bold text-white mb-2" style="background-color: #ff7a00; font-size: 0.78rem;">Toll-Free Hospital Support</span>
                    <h3 class="h3 fw-bold text-white mb-2">Need Immediate Accreditation Guidance?</h3>
                    <p class="text-white-50 mb-0" style="font-size: 0.95rem; color: #cbd5e1 !important;">
                        Connect with our certified quality advisory desk for rapid pre-assessment reviews, document templates, and compliance remediation.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="tel:18004195959" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #ff7a00; border-radius: 8px;">
                        <i class="fas fa-phone-alt me-2"></i> +91 1800-419-5959
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
