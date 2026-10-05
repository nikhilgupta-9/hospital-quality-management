<!-- =========================================================
     PAGE BANNER / HEADER (HOSPITAL QUALITY MANAGEMENT)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Elements -->
            <div class="banner-molecule-left"><i class="fas fa-tags"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-shield-halved"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">Transparent Hospital Quality SaaS Pricing</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Pricing &amp; Plans</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     PRICING PLANS & TIERS (CLEAN & HIGH VISIBILITY)
========================================================= -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">

        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="badge px-3 py-2 text-white mb-2 fw-bold" style="background-color: #0c74c5; font-size: 0.85rem; border-radius: 6px;">
                <i class="fas fa-certificate text-warning me-1"></i> Predictable Hospital Compliance Investment
            </span>
            <h2 class="display-6 fw-bold text-navy mb-3">Simple, Transparent Plans Built for Every Hospital Scale</h2>
            <p class="text-muted fs-6">From 20-bed clinics to 500+ bed medical institutes. Every tier includes full NABH 5th Edition standards, ABDM M3 integration, and DPDP Act 2023 statutory consent compliance.</p>
            
            <!-- Billing Toggle Switch (Mobile-Friendly) -->
            <div class="d-inline-flex flex-wrap justify-content-center p-1 rounded-pill mt-3 border shadow-sm" style="background-color: #ffffff; border-color: #dce8f6 !important;">
                <button type="button" id="btnMonthly" class="btn btn-sm rounded-pill px-4 py-2 fw-bold transition-all shadow-none" style="background-color: #0c74c5; color: #ffffff;" onclick="setBilling('monthly')">
                    Monthly Billing
                </button>
                <button type="button" id="btnYearly" class="btn btn-sm rounded-pill px-4 py-2 fw-bold text-navy transition-all shadow-none" style="background: transparent; color: #1a2340;" onclick="setBilling('yearly')">
                    Annual Billing <span class="badge ms-1 text-white" style="background-color: #ff7a00; font-size: 0.72rem;">Save 20%</span>
                </button>
            </div>
        </div>

        <!-- Glassmorphism Pricing Cards Grid -->
        <div class="row g-4 mb-5 justify-content-center align-items-stretch">
            <?php if (empty($plans)): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-navy">Pricing plans are currently being updated. Please check back shortly or contact our advisory team.</p>
                </div>
            <?php else: ?>
                <?php foreach ($plans as $plan): ?>
                    <?php 
                        $features = json_decode($plan['features_list'] ?? '[]', true) ?: [];
                        $isPopular = !empty($plan['is_popular']);
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="w-100 p-4 p-xl-5 rounded-4 d-flex flex-column justify-content-between position-relative pricing-card-glass <?= $isPopular ? 'pricing-card-featured' : '' ?>"
                             style="background: #ffffff; border: <?= $isPopular ? '2px solid #0c74c5' : '1px solid #dce8f6' ?>;">
                            
                            <?php if ($isPopular): ?>
                                <div class="position-absolute top-0 start-50 translate-middle px-3 py-1 rounded-pill text-white fw-bold shadow-sm"
                                     style="background-color: #ff7a00; font-size: 0.75rem; letter-spacing: 0.5px; z-index: 2;">
                                    <i class="fas fa-crown me-1"></i> MOST POPULAR SUITE
                                </div>
                            <?php endif; ?>

                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-2 mt-1">
                                    <span class="badge px-3 py-1 text-white fw-bold" style="background-color: #1a2340; border-radius: 6px; font-size: 0.78rem;">
                                        <?= esc($plan['badge_text'] ?: 'Standard') ?>
                                    </span>
                                    <span class="badge border fw-semibold" style="background-color: #f1f5f9; color: #1a2340; font-size: 0.75rem; border-color: #cbd5e1 !important;">
                                        <i class="fas fa-bed me-1" style="color: #0c74c5;"></i><?= esc($plan['bed_capacity']) ?>
                                    </span>
                                </div>

                                <h3 class="h4 fw-bold text-navy mb-2"><?= esc($plan['name']) ?></h3>
                                <p class="small mb-4 text-muted" style="min-height: 42px; line-height: 1.5; color: #4b5563 !important;"><?= esc($plan['tagline']) ?></p>

                                <!-- Price Display -->
                                <div class="p-3 rounded-3 mb-4 border" style="background-color: #f8fafc; border-color: #e2e8f0 !important;">
                                    <div class="d-flex align-items-baseline">
                                        <span class="fs-4 fw-bold" style="color: #0c74c5;"><?= esc($plan['currency']) ?></span>
                                        <span class="display-6 fw-bold text-navy price-display ms-1" 
                                              data-monthly="<?= number_format((float)$plan['price_monthly'], 0) ?>" 
                                              data-yearly="<?= number_format((float)($plan['price_yearly'] / 12), 0) ?>"
                                              style="color: #1a2340 !important;">
                                            <?= number_format((float)$plan['price_monthly'], 0) ?>
                                        </span>
                                        <span class="small ms-2 fw-semibold" style="color: #64748b;">/ month</span>
                                    </div>
                                    <div class="small mt-1 billing-note" style="font-size: 0.78rem; color: #4b5563;">
                                        Billed monthly &bull; <?= $plan['max_users'] > 0 ? esc($plan['max_users']) . ' Staff Accounts' : 'Unlimited Users' ?>
                                    </div>
                                </div>

                                <!-- Features List -->
                                <div class="mb-4">
                                    <span class="fw-bold text-navy small d-block mb-3"><i class="fas fa-circle-check text-success me-2"></i>What's Included:</span>
                                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0 small" style="color: #1a2340;">
                                        <?php foreach ($features as $feat): ?>
                                            <li class="d-flex align-items-start gap-2">
                                                <i class="fas fa-check-circle text-success mt-1" style="font-size: 0.85rem; flex-shrink: 0;"></i>
                                                <span style="line-height: 1.45; color: #1a2340; font-weight: 500;"><?= esc($feat) ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- Plan CTA -->
                            <div class="pt-3 border-top mt-3" style="border-color: #e2e8f0 !important;">
                                <a href="<?= site_url($plan['cta_url'] ?: 'contact') ?>" 
                                   class="btn w-100 py-3 fw-bold text-white shadow-sm transition-all" 
                                   style="background-color: <?= $isPopular ? '#ff7a00' : '#0c74c5' ?>; border-radius: 8px; font-size: 0.95rem; min-height: 48px;">
                                    <?= esc($plan['cta_text'] ?: 'Get Started') ?> <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                                <div class="text-center small mt-2" style="font-size: 0.75rem; color: #64748b;">
                                    <i class="fas fa-shield-check text-success me-1"></i> 14-day free trial &bull; No lock-in period
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Bed-Capacity Tier Recommender (Interactive Widget) -->
        <div class="card p-4 p-md-5 mb-5 border-0 shadow-sm" style="background-color: #ffffff; border-radius: 18px; border: 1px solid #dce8f6 !important;">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <span class="badge px-3 py-1 mb-2 fw-bold" style="background-color: #e6efff; color: #0c74c5;">Instant Plan Estimator</span>
                    <h3 class="h4 fw-bold text-navy mb-2">Calculate the Right Plan for Your Bed Capacity</h3>
                    <p class="small mb-4" style="color: #4b5563;">Move the slider to select your hospital's operational bed strength. Our engine recommends the optimal accreditation module and compliance capacity.</p>
                    
                    <div class="mb-3">
                        <label class="form-label text-navy fw-bold d-flex justify-content-between">
                            <span>Operational Bed Strength:</span>
                            <span class="font-monospace fs-5 fw-bold" id="bedValue" style="color: #0c74c5;">100 Beds</span>
                        </label>
                        <input type="range" class="form-range" id="bedSlider" min="10" max="500" step="10" value="100" oninput="calculatePlan(this.value)">
                        <div class="d-flex justify-content-between small" style="font-size: 0.78rem; color: #64748b;">
                            <span>10 Beds (Clinic/SHCO)</span>
                            <span>100 Beds (Hospital)</span>
                            <span>500+ Beds (Medical College)</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="p-4 rounded-3 border text-white" style="background-color: #1a2340; border-color: #2b3964 !important;">
                        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: #2b3964 !important;">
                            <span class="badge text-white" style="background-color: #ff7a00;"><i class="fas fa-sparkles me-1"></i> Recommended Suite</span>
                            <span class="badge text-white" style="background-color: #0c74c5;" id="recStandard">NABH Hospital (5th Ed)</span>
                        </div>
                        <h4 class="h4 fw-bold text-white mb-2" id="recPlanName">NABH Digital Mitra Pro</h4>
                        <p class="small mb-3" style="color: #cbd5e1; line-height: 1.6;" id="recDescription">Full clinical safety gates, ABDM M3 14-digit ABHA integration, DPDP 2023 consent module, and biomedical PPM registry for 50-200 bed healthcare organizations.</p>
                        
                        <div class="d-flex flex-wrap align-items-center justify-content-between pt-2 border-top gap-2" style="border-color: #2b3964 !important;">
                            <div>
                                <span class="small d-block" style="color: #94a3b8; font-size: 0.75rem;">Estimated Starting Tier</span>
                                <strong class="h4 text-warning mb-0" id="recPrice" style="color: #ffc107 !important;">₹28,999 / mo</strong>
                            </div>
                            <a href="<?= site_url('contact') ?>" class="btn btn-sm px-3 py-2 fw-bold text-white shadow-sm" style="background-color: #ff7a00; border-radius: 6px;">
                                Request Custom Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comprehensive Features Comparison Matrix -->
        <div class="card p-4 p-md-5 mb-5 border-0 shadow-sm" style="background-color: #ffffff; border-radius: 18px; border: 1px solid #dce8f6 !important;">
            <div class="text-center max-w-700 mx-auto mb-4">
                <span class="badge px-3 py-1 mb-2 fw-bold" style="background-color: #e6efff; color: #0c74c5;">Detailed Specifications</span>
                <h3 class="h4 fw-bold text-navy mb-2">Comprehensive Plan Features Matrix</h3>
                <p class="small" style="color: #4b5563;">Compare all digital capabilities, compliance modules, and enterprise integrations across our tiers.</p>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle border mb-0" style="border-color: #e2e8f0 !important;">
                    <thead style="background-color: #1a2340; color: #ffffff;">
                        <tr>
                            <th class="py-3 px-3 text-white" style="width: 34%; background-color: #1a2340;">Accreditation &amp; Governance Capability</th>
                            <th class="py-3 px-3 text-center text-white" style="width: 22%; background-color: #334155;">SHCO Essential</th>
                            <th class="py-3 px-3 text-center text-white" style="width: 22%; background-color: #0c74c5;">NABH Pro Mitra</th>
                            <th class="py-3 px-3 text-center text-white" style="width: 22%; background-color: #1a2340;">Enterprise Multi-Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Group 1 -->
                        <tr class="table-category-row">
                            <td colspan="4" class="fw-bold py-2 px-3 text-navy" style="background-color: #f1f5f9; color: #1a2340 !important;">
                                <i class="fas fa-file-signature me-2" style="color: #0c74c5;"></i>1. Document Control &amp; Quality Management
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">NABH 5th Edition Standard Checklists &amp; SOP Suite</td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">Departmental CAPA Closed-Loop Tracker</td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">Multi-Level Approval Workflow (Creator &rarr; HOD &rarr; Director)</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>

                        <!-- Group 2 -->
                        <tr class="table-category-row">
                            <td colspan="4" class="fw-bold py-2 px-3 text-navy" style="background-color: #f1f5f9; color: #1a2340 !important;">
                                <i class="fas fa-heart-pulse text-danger me-2"></i>2. Clinical Safety &amp; Statutory DPDP Act 2023
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">6-Point Clinical Safety Gates (COP &amp; AAC)</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">ABDM M3 14-Digit ABHA Link &amp; PHR Address</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">DPDP Multi-Lingual Electronic Consent &amp; SHA-256 Sig</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">1-Click Right-to-Withdraw Statutory Audit Logging</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>

                        <!-- Group 3 -->
                        <tr class="table-category-row">
                            <td colspan="4" class="fw-bold py-2 px-3 text-navy" style="background-color: #f1f5f9; color: #1a2340 !important;">
                                <i class="fas fa-hospital me-2" style="color: #ff7a00;"></i>3. Facility, Biomedical &amp; HR Governance
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">Biomedical Equipment PPM &amp; Calibration Logs</td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">Condemnation Committee Disposal Workflows</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">Doctor Credentialing, Privileging &amp; Vaccine Vault</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                        <tr>
                            <td class="px-3 text-navy fw-medium">Multi-Hospital Chain / Multi-Branch Orchestration</td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-muted"><i class="fas fa-minus fs-6"></i></td>
                            <td class="text-center text-success"><i class="fas fa-check-circle fs-5"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FAQ Section (Using .accordion-hinton for Clean Contrast) -->
        <div class="card p-4 p-md-5 mb-5 border-0 shadow-sm" style="background-color: #ffffff; border-radius: 18px; border: 1px solid #dce8f6 !important;">
            <div class="text-center max-w-700 mx-auto mb-4">
                <span class="badge px-3 py-1 mb-2 fw-bold" style="background-color: #e6efff; color: #0c74c5;">Got Questions?</span>
                <h3 class="h4 fw-bold text-navy mb-2">Frequently Asked Pricing Questions</h3>
                <p class="small" style="color: #4b5563;">Everything you need to know about our subscriptions, onboarding, and compliance guarantees.</p>
            </div>

            <div class="accordion accordion-hinton" id="pricingFaqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button fw-bold text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                            Does HQM support both NABH SHCO and Large Hospital Standards?
                        </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#pricingFaqAccordion">
                        <div class="accordion-body" style="color: #4b5563;">
                            Yes! Our <strong>SHCO Essential</strong> plan is tailor-made for healthcare facilities up to 50 beds aligning with Small Healthcare Organization guidelines. For facilities with 50+ beds, <strong>NABH Pro Mitra</strong> provides complete 5th Edition standards, 650+ objective element trackers, and ABDM M3 integration.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading2">
                        <button class="accordion-button collapsed fw-bold text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                            How does the 14-day free trial work?
                        </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#pricingFaqAccordion">
                        <div class="accordion-body" style="color: #4b5563;">
                            You get full access to your selected tier for 14 days without any credit card or payment obligation. Our team helps seed your departments, staff roster, and initial quality checklists so your quality coordinators can experience live digital governance immediately.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading3">
                        <button class="accordion-button collapsed fw-bold text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                            Can we upgrade or downgrade our plan as our bed capacity expands?
                        </button>
                    </h2>
                    <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#pricingFaqAccordion">
                        <div class="accordion-body" style="color: #4b5563;">
                            Absolutely. You can scale your tier at any billing cycle. All historical SOP versions, incident logs, CAPA audits, and DPDP cryptographic signatures remain 100% intact and searchable.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading4">
                        <button class="accordion-button collapsed fw-bold text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                            Is GST invoice provided for hospital tax deductions?
                        </button>
                    </h2>
                    <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#pricingFaqAccordion">
                        <div class="accordion-body" style="color: #4b5563;">
                            Yes, all commercial plans include GST compliant invoices with full input tax credit (ITC) eligibility for Indian healthcare fiduciaries.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Callout (Solid Flat Style) -->
        <div class="card p-4 p-md-5 text-center text-white border-0 shadow-sm" style="background-color: #1a2340; border-radius: 18px;">
            <h3 class="h3 fw-bold mb-3 text-white">Need a Custom Multi-Hospital or On-Premises Solution?</h3>
            <p class="small max-w-700 mx-auto mb-4" style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.7;">Our healthcare quality engineers and NABH lead assessors are available to evaluate your hospital's digital infrastructure and design a tailored rollout program.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="<?= site_url('contact') ?>" class="btn px-4 py-3 fw-bold text-white shadow-sm" style="background-color: #ff7a00; border-radius: 8px; min-width: 220px;">
                    <i class="fas fa-headset me-2"></i> Schedule Advisory Call
                </a>
                <a href="<?= site_url('assessment-tool') ?>" class="btn btn-outline-light px-4 py-3 fw-bold" style="border-radius: 8px; min-width: 220px;">
                    <i class="fas fa-list-check me-2"></i> Free NABH Readiness Quiz
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Client-side Interactive Pricing Script -->
<script>
let currentBilling = 'monthly';

function setBilling(type) {
    currentBilling = type;
    const btnM = document.getElementById('btnMonthly');
    const btnY = document.getElementById('btnYearly');
    const priceElements = document.querySelectorAll('.price-display');
    const noteElements = document.querySelectorAll('.billing-note');

    if (type === 'yearly') {
        btnY.style.backgroundColor = '#0c74c5';
        btnY.style.color = '#ffffff';
        btnM.style.backgroundColor = 'transparent';
        btnM.style.color = '#1a2340';

        priceElements.forEach(el => {
            el.textContent = el.getAttribute('data-yearly');
        });
        noteElements.forEach(el => {
            el.innerHTML = 'Billed annually &bull; <strong class="text-success">Saved 20%</strong>';
        });
    } else {
        btnM.style.backgroundColor = '#0c74c5';
        btnM.style.color = '#ffffff';
        btnY.style.backgroundColor = 'transparent';
        btnY.style.color = '#1a2340';

        priceElements.forEach(el => {
            el.textContent = el.getAttribute('data-monthly');
        });
        noteElements.forEach(el => {
            el.innerHTML = 'Billed monthly &bull; Standard billing';
        });
    }
}

function calculatePlan(beds) {
    beds = parseInt(beds);
    document.getElementById('bedValue').textContent = beds + ' Beds';

    const pName = document.getElementById('recPlanName');
    const pStandard = document.getElementById('recStandard');
    const pDesc = document.getElementById('recDescription');
    const pPrice = document.getElementById('recPrice');

    if (beds <= 50) {
        pName.textContent = 'SHCO Essential Quality';
        pStandard.textContent = 'NABH SHCO (5th Ed)';
        pDesc.textContent = 'Tailored for clinics and hospitals up to 50 beds requiring digital SOPs, CAPA, and essential biomedical calibration.';
        pPrice.textContent = '₹12,499 / mo';
    } else if (beds <= 200) {
        pName.textContent = 'NABH Digital Mitra Pro';
        pStandard.textContent = 'NABH Hospital (5th Ed)';
        pDesc.textContent = 'Full clinical safety gates, ABDM M3 14-digit ABHA integration, DPDP 2023 consent module, and biomedical PPM registry for 50-200 bed healthcare organizations.';
        pPrice.textContent = '₹28,999 / mo';
    } else {
        pName.textContent = 'NABH Enterprise Multi-Unit';
        pStandard.textContent = 'Enterprise & JCI Ready';
        pDesc.textContent = 'Multi-hospital chain orchestrations, EHR/FHIR interoperability, unlimited staff accounts, and priority 24/7 quality audit defense support.';
        pPrice.textContent = '₹54,999 / mo';
    }
}
</script>
