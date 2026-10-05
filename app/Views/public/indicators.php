<!-- =========================================================
     HINTON PAGE BANNER / HEADER (SOLID THEME WITH BLUEPRINT GRID)
========================================================= -->
<section class="page-banner-wrapper" style="background-color: #1a2340; position: relative; overflow: hidden; padding: 45px 0 40px 0; border-bottom: 3px solid #ff7a00;">
    <div style="position: absolute; inset: 0; background-image: radial-gradient(circle at 15px 15px, rgba(255, 255, 255, 0.08) 1.5px, transparent 0); background-size: 24px 24px; pointer-events: none;"></div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background-color: #0c74c5; color: #ffffff; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                    <i class="fas fa-chart-line"></i> NABH 5th Edition Telemetry
                </div>
                <h1 class="text-white fw-bold mb-2" style="font-size: clamp(1.8rem, 3.5vw, 2.4rem); font-family: var(--font-heading);">
                    Quality KPIs &amp; Clinical Indicators
                </h1>
                <p class="text-light mb-3" style="font-size: 1rem; opacity: 0.9; max-width: 680px; line-height: 1.5;">
                    Interactive clinical governance workbench, real-time formula calculation engines, WHO hand hygiene compliance tracker, and NABH 5th Edition mandatory quality metrics.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <a href="#kpi-calculator-suite" class="btn btn-sm text-white fw-bold px-3 py-2" style="background-color: #ff7a00; border-radius: 6px; font-size: 0.85rem;">
                        <i class="fas fa-calculator me-1"></i> Launch KPI Calculator
                    </a>
                    <a href="#kpi-matrix-section" class="btn btn-sm text-white fw-bold px-3 py-2" style="background-color: #0c74c5; border-radius: 6px; font-size: 0.85rem;">
                        <i class="fas fa-table-list me-1"></i> Explore 24+ Indicators
                    </a>
                    <button class="btn btn-sm btn-outline-light fw-bold px-3 py-2" onclick="exportKPITableToCSV()" style="border-radius: 6px; font-size: 0.85rem;">
                        <i class="fas fa-file-csv me-1"></i> Export KPI Matrix (.CSV)
                    </button>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="p-3 rounded-3" style="background-color: #0c74c5; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                    <div class="d-flex align-items-center justify-content-between text-white mb-2 pb-2" style="border-bottom: 1px solid rgba(255,255,255,0.2);">
                        <span class="small text-uppercase fw-bold"><i class="fas fa-shield-halved me-1 text-warning"></i> Quality Compliance</span>
                        <span class="badge bg-light text-dark fw-bold">NABH 5th Edition</span>
                    </div>
                    <div class="row g-2 text-center text-white">
                        <div class="col-6">
                            <div class="p-2 rounded" style="background-color: #1a2340;">
                                <div class="fs-4 fw-extrabold" style="color: #ff7a00;">24+</div>
                                <div class="small" style="font-size: 0.72rem; opacity: 0.85;">Mandatory KPIs</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 rounded" style="background-color: #1a2340;">
                                <div class="fs-4 fw-extrabold" style="color: #38bdf8;">100%</div>
                                <div class="small" style="font-size: 0.72rem; opacity: 0.85;">Auto CAPA Ready</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 rounded" style="background-color: #1a2340;">
                                <div class="fs-4 fw-extrabold" style="color: #10b981;">5</div>
                                <div class="small" style="font-size: 0.72rem; opacity: 0.85;">Live Calculators</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 rounded" style="background-color: #1a2340;">
                                <div class="fs-4 fw-extrabold" style="color: #ff7a00;">WHO</div>
                                <div class="small" style="font-size: 0.72rem; opacity: 0.85;">5 Moments Audit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     MAIN CONTENT SECTION
========================================================= -->
<section class="py-5" style="background-color: #f8fafc; min-height: 80vh;">
    <div class="container">

        <!-- PARALLAX COMMAND CENTER SHOWCASE -->
        <div class="card border-0 mb-5 shadow-sm parallax-depth-card" style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px;">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-7 position-relative">
                    <div class="parallax-image-holder h-100" style="min-height: 380px;">
                        <img src="<?= base_url('assets/images/hospital_kpi_command_center.jpg') ?>" alt="Hospital Quality Command Center" class="img-fluid h-100 w-100" style="object-fit: cover; filter: brightness(0.95);">
                        
                        <!-- Floating Parallax Badge 1 -->
                        <div class="parallax-badge-float-1 p-3 rounded-3 text-white shadow" style="background-color: #1a2340; border-left: 4px solid #0c74c5; max-width: 260px;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge" style="background-color: #10b981; font-size: 0.7rem;"><i class="fas fa-satellite-dish me-1"></i> LIVE TELEMETRY</span>
                                <span class="small text-white-50" style="font-size: 0.7rem;">Active Hub</span>
                            </div>
                            <div class="fw-bold small">Hospital Sentinel Command</div>
                            <div class="text-white-50 small" style="font-size: 0.72rem;">Tracking 24+ NABH Quality Metrics 24/7</div>
                        </div>

                        <!-- Floating Parallax Badge 2 -->
                        <div class="parallax-badge-float-2 p-3 rounded-3 text-white shadow d-none d-sm-block" style="background-color: #0c74c5; border-right: 4px solid #ff7a00;">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-shield-heart fs-4 text-warning"></i>
                                <div>
                                    <div class="fw-extrabold fs-6 mb-0">99.4% Safety</div>
                                    <div class="small text-white-50" style="font-size: 0.7rem;">Zero Unplanned Sentinels</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 d-flex flex-column justify-content-between p-4 p-xl-5" style="background-color: #ffffff;">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background-color: #f1f5f9; color: #1a2340; font-size: 0.78rem; font-weight: 700;">
                            <i class="fas fa-tv text-sapphire" style="color: #0c74c5;"></i> Real-Time Clinical Surveillance
                        </div>
                        <h3 class="fw-bold text-navy mb-3" style="font-family: var(--font-heading); font-size: 1.5rem;">
                            Digitized Clinical Telemetry &amp; Continuous Audits
                        </h3>
                        <p class="text-muted small mb-4" style="line-height: 1.6;">
                            Say goodbye to manual paper tallies. HQM bridges clinical wards, ICU device telemetry, and pharmacy error tracking directly into an automated regulatory compliance pipeline aligned with <strong>NABH 5th Edition Standards</strong>.
                        </p>

                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <i class="fas fa-stopwatch text-warning mb-1"></i>
                                    <div class="fw-bold text-navy small">Zero Latency</div>
                                    <div class="text-muted" style="font-size: 0.72rem;">Instant CAPA Escalation</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <i class="fas fa-lock text-success mb-1"></i>
                                    <div class="fw-bold text-navy small">DPDP Verified</div>
                                    <div class="text-muted" style="font-size: 0.72rem;">100% UHID Anonymized</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#kpi-calculator-suite" class="btn w-100 fw-bold text-white py-2" style="background-color: #0c74c5; border-radius: 8px;">
                            <i class="fas fa-calculator me-1"></i> Open Interactive Calculation Suite
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- SECTION 1: LIVE MULTI-CALCULATOR WORKBENCH -->
        <div id="kpi-calculator-suite" class="card border-0 mb-5 shadow-sm" style="border-radius: 12px; overflow: hidden; background-color: #ffffff; border: 1px solid #e2e8f0;">
            <div class="card-header p-4" style="background-color: #1a2340; border-bottom: 3px solid #0c74c5;">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <span class="badge mb-2 px-3 py-1" style="background-color: #ff7a00; color: #ffffff; font-weight: 700; font-size: 0.75rem; letter-spacing: 0.05em;">
                            <i class="fas fa-calculator me-1"></i> INTERACTIVE CLINICAL ENGINE
                        </span>
                        <h2 class="h4 text-white fw-bold mb-1" style="font-family: var(--font-heading);">
                            Live Hospital KPI Calculation Suite
                        </h2>
                        <p class="text-white-50 small mb-0">
                            Select an indicator module below. Formulas calculate automatically with real-time NABH benchmark validation and CAPA guidance.
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm text-white fw-bold px-3 py-2" onclick="resetCalculatorDefaults()" style="background-color: #0c74c5; border-radius: 6px; font-size: 0.8rem;">
                            <i class="fas fa-rotate-left me-1"></i> Reset Sample Data
                        </button>
                    </div>
                </div>

                <!-- Calculator Module Nav Pills -->
                <ul class="nav nav-pills mt-4 flex-nowrap overflow-auto gap-2 pb-1" id="kpiCalcTabs" role="tablist" style="border-bottom: 1px solid rgba(255,255,255,0.15);">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold text-white px-3 py-2 rounded-2" id="tab-hai-btn" data-bs-toggle="pill" data-bs-target="#tab-hai" type="button" role="tab" style="background-color: #0c74c5; font-size: 0.85rem;">
                            <i class="fas fa-biohazard me-1"></i> 1. HAI Infection Rates
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-white px-3 py-2 rounded-2" id="tab-med-btn" data-bs-toggle="pill" data-bs-target="#tab-med" type="button" role="tab" style="background-color: transparent; border: 1px solid rgba(255,255,255,0.3); font-size: 0.85rem;">
                            <i class="fas fa-pills me-1"></i> 2. Medication Errors &amp; ADE
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-white px-3 py-2 rounded-2" id="tab-bed-btn" data-bs-toggle="pill" data-bs-target="#tab-bed" type="button" role="tab" style="background-color: transparent; border: 1px solid rgba(255,255,255,0.3); font-size: 0.85rem;">
                            <i class="fas fa-bed-pulse me-1"></i> 3. Bed Occupancy &amp; ALOS
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-white px-3 py-2 rounded-2" id="tab-hygiene-btn" data-bs-toggle="pill" data-bs-target="#tab-hygiene" type="button" role="tab" style="background-color: transparent; border: 1px solid rgba(255,255,255,0.3); font-size: 0.85rem;">
                            <i class="fas fa-hands-bubbles me-1"></i> 4. WHO Hand Hygiene Audit
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-white px-3 py-2 rounded-2" id="tab-falls-btn" data-bs-toggle="pill" data-bs-target="#tab-falls" type="button" role="tab" style="background-color: transparent; border: 1px solid rgba(255,255,255,0.3); font-size: 0.85rem;">
                            <i class="fas fa-person-falling me-1"></i> 5. Patient Safety &amp; Falls
                        </button>
                    </li>
                </ul>
            </div>

            <div class="card-body p-4">
                <div class="tab-content" id="kpiCalcContent">

                    <!-- TAB 1: HAI INFECTION RATES (CAUTI, CLABSI, VAP, SSI) -->
                    <div class="tab-pane fade show active" id="tab-hai" role="tabpanel">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <h5 class="fw-bold text-navy mb-3" style="font-size: 1.05rem;">
                                        <i class="fas fa-sliders text-sapphire me-2" style="color: #0c74c5;"></i> Select HAI Indicator Parameters
                                    </h5>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-navy">Infection Metric</label>
                                        <select id="hai_type_select" class="form-select fw-semibold" onchange="switchHAIType()" style="border-color: #cbd5e1; font-size: 0.9rem;">
                                            <option value="cauti">Catheter-Associated UTI (CAUTI Rate)</option>
                                            <option value="clabsi">Central Line Bloodstream Infection (CLABSI Rate)</option>
                                            <option value="vap">Ventilator-Associated Pneumonia (VAP Rate)</option>
                                            <option value="ssi">Surgical Site Infection (Clean Surgeries SSI %)</option>
                                        </select>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy" id="hai_num_label">Total Confirmed CAUTI Cases</label>
                                            <input type="number" id="hai_numerator" class="form-control fw-bold" value="3" min="0" oninput="calculateHAIRate()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Lab confirmed clinical cases</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy" id="hai_den_label">Total Urinary Catheter Days</label>
                                            <input type="number" id="hai_denominator" class="form-control fw-bold" value="2400" min="1" oninput="calculateHAIRate()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Cumulative device utilization days</span>
                                        </div>
                                    </div>

                                    <div class="p-3 rounded-2" style="background-color: #ffffff; border: 1px dashed #0c74c5;">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="small fw-bold text-navy"><i class="fas fa-square-root-variable text-sapphire me-1" style="color: #0c74c5;"></i> Active Formula:</span>
                                            <span class="badge" style="background-color: #1a2340; color: #ffffff;" id="hai_multiplier_badge">Multiplier: &times; 1,000 Days</span>
                                        </div>
                                        <div class="small font-monospace text-muted" id="hai_formula_text" style="font-size: 0.82rem;">
                                            (Total CAUTI Cases / Total Catheter Days) &times; 1,000
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100 d-flex flex-column justify-content-between text-white" style="background-color: #1a2340; border-left: 4px solid #0c74c5;">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small text-uppercase fw-bold" style="letter-spacing: 0.06em; color: #ff7a00;">Telemetry Result</span>
                                            <span id="hai_status_badge" class="badge" style="background-color: #10b981; color: #ffffff; font-size: 0.8rem;">
                                                <i class="fas fa-check-circle me-1"></i> Within NABH Benchmark
                                            </span>
                                        </div>

                                        <div class="my-3 py-2">
                                            <div class="display-5 fw-extrabold mb-0" id="hai_result_val" style="color: #ffffff; font-family: var(--font-heading);">
                                                1.25 <span style="font-size: 1rem; font-weight: 500; color: #cbd5e1;">per 1,000 days</span>
                                            </div>
                                            <div class="small text-white-50 mt-1" id="hai_benchmark_note">
                                                NABH Benchmark Target: &le; 1.5 per 1,000 catheter days
                                            </div>
                                        </div>

                                        <div class="p-3 rounded-2 mb-3" style="background-color: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15);">
                                            <div class="small fw-bold mb-1" style="color: #38bdf8;">
                                                <i class="fas fa-clipboard-check me-1"></i> Clinical Evaluation &amp; Recommendation:
                                            </div>
                                            <p class="small text-light mb-0" id="hai_evaluation_text" style="line-height: 1.45;">
                                                Optimal infection control rate maintained. Daily catheter necessity review and aseptic insertion bundle compliance are functioning within safe limits.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(255,255,255,0.15);">
                                        <span class="small text-white-50"><i class="fas fa-clock me-1"></i> Frequency: Monthly HIC Review</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="copyResultToClipboard('hai')" style="font-size: 0.75rem;">
                                            <i class="fas fa-copy me-1"></i> Copy Metric
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: MEDICATION ERRORS & ADE -->
                    <div class="tab-pane fade" id="tab-med" role="tabpanel">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <h5 class="fw-bold text-navy mb-3" style="font-size: 1.05rem;">
                                        <i class="fas fa-prescription-bottle-medical me-2" style="color: #ff7a00;"></i> Medication Safety &amp; Reporting Parameters
                                    </h5>
                                    
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Actual Administration Errors</label>
                                            <input type="number" id="med_actual_errors" class="form-control fw-bold" value="4" min="0" oninput="calculateMedErrors()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Wrong dose, route, drug, patient</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Near Misses Reported</label>
                                            <input type="number" id="med_near_misses" class="form-control fw-bold" value="18" min="0" oninput="calculateMedErrors()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Intercepted before reaching patient</span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold small text-navy">Total Inpatient Bed Days in Month</label>
                                            <input type="number" id="med_patient_days" class="form-control fw-bold" value="5200" min="1" oninput="calculateMedErrors()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Occupied bed days across all inpatient wards</span>
                                        </div>
                                    </div>

                                    <div class="p-3 rounded-2" style="background-color: #ffffff; border: 1px dashed #ff7a00;">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="small fw-bold text-navy"><i class="fas fa-shield-virus text-warning me-1"></i> Culture Index:</span>
                                            <span class="badge" style="background-color: #ff7a00; color: #ffffff;" id="med_culture_badge">Near Miss Ratio: 81.8%</span>
                                        </div>
                                        <div class="small text-muted" style="font-size: 0.8rem;">
                                            NABH mandates proactive near-miss reporting without punitive punishment for nursing &amp; pharmacy staff.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100 d-flex flex-column justify-content-between text-white" style="background-color: #1a2340; border-left: 4px solid #ff7a00;">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small text-uppercase fw-bold" style="letter-spacing: 0.06em; color: #ff7a00;">Medication Error Rate</span>
                                            <span id="med_status_badge" class="badge" style="background-color: #10b981; color: #ffffff; font-size: 0.8rem;">
                                                <i class="fas fa-shield-heart me-1"></i> Healthy Reporting Culture
                                            </span>
                                        </div>

                                        <div class="my-3 py-2">
                                            <div class="display-5 fw-extrabold mb-0" id="med_result_val" style="color: #ffffff; font-family: var(--font-heading);">
                                                0.77 <span style="font-size: 1rem; font-weight: 500; color: #cbd5e1;">errors / 1,000 bed days</span>
                                            </div>
                                            <div class="small text-white-50 mt-1">
                                                Total Incident Rate (Inc Near Miss): <strong class="text-white" id="med_total_rate">4.23</strong> per 1,000 days
                                            </div>
                                        </div>

                                        <div class="p-3 rounded-2 mb-3" style="background-color: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15);">
                                            <div class="small fw-bold mb-1" style="color: #ff7a00;">
                                                <i class="fas fa-triangle-exclamation me-1"></i> Clinical Pharmacy CAPA:
                                            </div>
                                            <p class="small text-light mb-0" id="med_evaluation_text" style="line-height: 1.45;">
                                                High near-miss capture rate indicates strong non-punitive safety reporting. Maintain 5 Rights of medication verification and high-alert drug double-check protocols.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(255,255,255,0.15);">
                                        <span class="small text-white-50"><i class="fas fa-clock me-1"></i> Frequency: Monthly Pharmacy Review</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="copyResultToClipboard('med')" style="font-size: 0.75rem;">
                                            <i class="fas fa-copy me-1"></i> Copy Metric
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: BED OCCUPANCY & ALOS -->
                    <div class="tab-pane fade" id="tab-bed" role="tabpanel">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <h5 class="fw-bold text-navy mb-3" style="font-size: 1.05rem;">
                                        <i class="fas fa-hospital me-2" style="color: #0c74c5;"></i> Capacity &amp; Inpatient Utilization
                                    </h5>
                                    
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Total Inpatient Days of Care</label>
                                            <input type="number" id="bed_census_days" class="form-control fw-bold" value="4650" min="1" oninput="calculateBedMetrics()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Sum of daily midnight census</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Total Sanctioned Operational Beds</label>
                                            <input type="number" id="bed_total_beds" class="form-control fw-bold" value="200" min="1" oninput="calculateBedMetrics()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Functional beds excluding day-care</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Days in Month / Period</label>
                                            <input type="number" id="bed_period_days" class="form-control fw-bold" value="30" min="1" max="365" oninput="calculateBedMetrics()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Number of days evaluated</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Total Inpatient Discharges</label>
                                            <input type="number" id="bed_total_discharges" class="form-control fw-bold" value="1160" min="1" oninput="calculateBedMetrics()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Discharges + Deaths + Transfers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100 d-flex flex-column justify-content-between text-white" style="background-color: #1a2340; border-left: 4px solid #0c74c5;">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small text-uppercase fw-bold" style="letter-spacing: 0.06em; color: #ff7a00;">Operational Throughput</span>
                                            <span id="bed_status_badge" class="badge" style="background-color: #10b981; color: #ffffff; font-size: 0.8rem;">
                                                <i class="fas fa-check-circle me-1"></i> Optimal Utilization
                                            </span>
                                        </div>

                                        <div class="row g-3 my-2">
                                            <div class="col-6">
                                                <div class="p-3 rounded-2" style="background-color: rgba(255, 255, 255, 0.08);">
                                                    <span class="small text-white-50 text-uppercase" style="font-size: 0.72rem;">Bed Occupancy (BOR)</span>
                                                    <div class="fs-2 fw-extrabold" id="bed_bor_result" style="color: #38bdf8;">77.5%</div>
                                                    <div class="small text-white-50" style="font-size: 0.72rem;">Target: 75% - 85%</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 rounded-2" style="background-color: rgba(255, 255, 255, 0.08);">
                                                    <span class="small text-white-50 text-uppercase" style="font-size: 0.72rem;">Avg Length of Stay (ALOS)</span>
                                                    <div class="fs-2 fw-extrabold" id="bed_alos_result" style="color: #ff7a00;">4.01 <span style="font-size: 0.85rem; font-weight: normal; color: #cbd5e1;">Days</span></div>
                                                    <div class="small text-white-50" style="font-size: 0.72rem;">Target: 3.5 - 4.5 Days</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 rounded-2 mb-3" style="background-color: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15);">
                                            <div class="small fw-bold mb-1" style="color: #38bdf8;">
                                                <i class="fas fa-chart-pie me-1"></i> Efficiency Assessment:
                                            </div>
                                            <p class="small text-light mb-0" id="bed_evaluation_text" style="line-height: 1.45;">
                                                Hospital bed capacity is operating at balanced equilibrium. Patient turnover allows emergency buffer beds while maintaining clinical revenue targets.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(255,255,255,0.15);">
                                        <span class="small text-white-50"><i class="fas fa-clock me-1"></i> Frequency: Daily / Monthly Tracking</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="copyResultToClipboard('bed')" style="font-size: 0.75rem;">
                                            <i class="fas fa-copy me-1"></i> Copy Metric
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 4: WHO HAND HYGIENE AUDIT -->
                    <div class="tab-pane fade" id="tab-hygiene" role="tabpanel">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-7">
                                <div class="p-4 rounded-3 h-100" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <h5 class="fw-bold text-navy mb-3" style="font-size: 1.05rem;">
                                        <i class="fas fa-hands-wash me-2" style="color: #0c74c5;"></i> WHO 5 Moments Observation Tracker
                                    </h5>
                                    <p class="small text-muted mb-3">
                                        Enter observed opportunities and verified compliant hand rub/wash actions performed by clinical staff during audit rounds.
                                    </p>

                                    <!-- Moment 1 -->
                                    <div class="mb-3 p-2 rounded bg-white border">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="small fw-bold text-navy">1. Before touching a patient</span>
                                            <span class="badge bg-light text-dark fw-bold" id="hyg_pct_1">92%</span>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <input type="number" id="hyg_comp_1" class="form-control form-control-sm" value="46" min="0" oninput="calculateHandHygiene()" placeholder="Actions Compliant">
                                            </div>
                                            <div class="col-6">
                                                <input type="number" id="hyg_opp_1" class="form-control form-control-sm" value="50" min="1" oninput="calculateHandHygiene()" placeholder="Total Opportunities">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Moment 2 -->
                                    <div class="mb-3 p-2 rounded bg-white border">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="small fw-bold text-navy">2. Before clean / aseptic procedure</span>
                                            <span class="badge bg-light text-dark fw-bold" id="hyg_pct_2">96%</span>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <input type="number" id="hyg_comp_2" class="form-control form-control-sm" value="48" min="0" oninput="calculateHandHygiene()" placeholder="Actions Compliant">
                                            </div>
                                            <div class="col-6">
                                                <input type="number" id="hyg_opp_2" class="form-control form-control-sm" value="50" min="1" oninput="calculateHandHygiene()" placeholder="Total Opportunities">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Moment 3 -->
                                    <div class="mb-3 p-2 rounded bg-white border">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="small fw-bold text-navy">3. After body fluid exposure risk</span>
                                            <span class="badge bg-light text-dark fw-bold" id="hyg_pct_3">98%</span>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <input type="number" id="hyg_comp_3" class="form-control form-control-sm" value="49" min="0" oninput="calculateHandHygiene()" placeholder="Actions Compliant">
                                            </div>
                                            <div class="col-6">
                                                <input type="number" id="hyg_opp_3" class="form-control form-control-sm" value="50" min="1" oninput="calculateHandHygiene()" placeholder="Total Opportunities">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Moment 4 & 5 -->
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="p-2 rounded bg-white border">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="small fw-bold text-navy" style="font-size:0.75rem;">4. After touching patient</span>
                                                    <span class="badge bg-light text-dark" id="hyg_pct_4">90%</span>
                                                </div>
                                                <div class="row g-1">
                                                    <div class="col-6"><input type="number" id="hyg_comp_4" class="form-control form-control-sm" value="45" oninput="calculateHandHygiene()"></div>
                                                    <div class="col-6"><input type="number" id="hyg_opp_4" class="form-control form-control-sm" value="50" oninput="calculateHandHygiene()"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-2 rounded bg-white border">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="small fw-bold text-navy" style="font-size:0.75rem;">5. After surroundings</span>
                                                    <span class="badge bg-light text-dark" id="hyg_pct_5">88%</span>
                                                </div>
                                                <div class="row g-1">
                                                    <div class="col-6"><input type="number" id="hyg_comp_5" class="form-control form-control-sm" value="44" oninput="calculateHandHygiene()"></div>
                                                    <div class="col-6"><input type="number" id="hyg_opp_5" class="form-control form-control-sm" value="50" oninput="calculateHandHygiene()"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="p-4 rounded-3 h-100 d-flex flex-column justify-content-between text-white" style="background-color: #1a2340; border-left: 4px solid #10b981;">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small text-uppercase fw-bold" style="letter-spacing: 0.06em; color: #10b981;">Hospital Compliance Score</span>
                                            <span id="hyg_grade_badge" class="badge" style="background-color: #10b981; color: #ffffff; font-size: 0.8rem;">
                                                <i class="fas fa-award me-1"></i> NABH Gold Standard
                                            </span>
                                        </div>

                                        <div class="my-3 text-center py-3 rounded-3" style="background-color: rgba(255,255,255,0.06);">
                                            <div class="display-4 fw-extrabold mb-0" id="hyg_total_score" style="color: #ffffff; font-family: var(--font-heading);">
                                                92.8%
                                            </div>
                                            <div class="small text-white-50 mt-1">
                                                Total Observations: <strong class="text-white" id="hyg_total_obs">232 / 250</strong> Actions
                                            </div>
                                        </div>

                                        <div class="p-3 rounded-2 mb-3" style="background-color: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15);">
                                            <div class="small fw-bold mb-1" style="color: #10b981;">
                                                <i class="fas fa-check-double me-1"></i> Infection Control Assessment:
                                            </div>
                                            <p class="small text-light mb-0" id="hyg_eval_text" style="line-height: 1.45;">
                                                Overall compliance exceeds 90% target threshold. Highest adherence in aseptic procedures (96%). Continue monthly random ward audits and alcohol hand rub replenishment checks.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(255,255,255,0.15);">
                                        <span class="small text-white-50"><i class="fas fa-clock me-1"></i> Minimum Target: &gt; 85%</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="copyResultToClipboard('hyg')" style="font-size: 0.75rem;">
                                            <i class="fas fa-copy me-1"></i> Copy Score
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 5: PATIENT SAFETY & FALLS -->
                    <div class="tab-pane fade" id="tab-falls" role="tabpanel">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                    <h5 class="fw-bold text-navy mb-3" style="font-size: 1.05rem;">
                                        <i class="fas fa-shield-cat me-2" style="color: #ff7a00;"></i> Patient Incident &amp; Adverse Event Telemetry
                                    </h5>

                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Inpatient Falls Reported</label>
                                            <input type="number" id="fall_cases" class="form-control fw-bold" value="2" min="0" oninput="calculateSafetyRates()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Morse fall risk incidents</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-bold small text-navy">Hospital Acquired Pressure Ulcers (HAPU)</label>
                                            <input type="number" id="hapu_cases" class="form-control fw-bold" value="1" min="0" oninput="calculateSafetyRates()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Stage 2 or higher pressure injuries</span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold small text-navy">Total Inpatient Bed Days</label>
                                            <input type="number" id="safety_patient_days" class="form-control fw-bold" value="5000" min="1" oninput="calculateSafetyRates()" style="border-color: #cbd5e1; font-size: 1.1rem; color: #1a2340;">
                                            <span class="small text-muted" style="font-size: 0.75rem;">Evaluated inpatient duration</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-4 rounded-3 h-100 d-flex flex-column justify-content-between text-white" style="background-color: #1a2340; border-left: 4px solid #ff7a00;">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small text-uppercase fw-bold" style="letter-spacing: 0.06em; color: #ff7a00;">Safety Incident Telemetry</span>
                                            <span class="badge" style="background-color: #10b981; color: #ffffff; font-size: 0.8rem;">
                                                <i class="fas fa-check me-1"></i> Benchmark Compliant
                                            </span>
                                        </div>

                                        <div class="row g-3 my-2">
                                            <div class="col-6">
                                                <div class="p-3 rounded-2" style="background-color: rgba(255, 255, 255, 0.08);">
                                                    <span class="small text-white-50 text-uppercase" style="font-size: 0.72rem;">Fall Rate / 1,000 Days</span>
                                                    <div class="fs-2 fw-extrabold" id="fall_rate_val" style="color: #38bdf8;">0.40</div>
                                                    <div class="small text-white-50" style="font-size: 0.72rem;">Benchmark: &le; 1.0</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 rounded-2" style="background-color: rgba(255, 255, 255, 0.08);">
                                                    <span class="small text-white-50 text-uppercase" style="font-size: 0.72rem;">HAPU Pressure Injury Rate</span>
                                                    <div class="fs-2 fw-extrabold" id="hapu_rate_val" style="color: #ff7a00;">0.20</div>
                                                    <div class="small text-white-50" style="font-size: 0.72rem;">Benchmark: &le; 0.5</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 rounded-2 mb-3" style="background-color: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15);">
                                            <div class="small fw-bold mb-1" style="color: #ff7a00;">
                                                <i class="fas fa-bed me-1"></i> Nursing Prevention Protocol:
                                            </div>
                                            <p class="small text-light mb-0" id="safety_eval_text" style="line-height: 1.45;">
                                                Morse fall score screening at admission and two-hourly repositioning charts for bed-bound ICU patients are actively mitigating pressure ulcer incidence.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(255,255,255,0.15);">
                                        <span class="small text-white-50"><i class="fas fa-clock me-1"></i> Frequency: Monthly Incident Audit</span>
                                        <button class="btn btn-sm btn-outline-light" onclick="copyResultToClipboard('safety')" style="font-size: 0.75rem;">
                                            <i class="fas fa-copy me-1"></i> Copy Rates
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <!-- DUAL CLINICAL GOVERNANCE PARALLAX CARDS -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm parallax-depth-card parallax-tilt-card h-100" style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden;">
                    <div class="parallax-image-holder position-relative" style="height: 240px;">
                        <img src="<?= base_url('assets/images/clinical_infection_audit.jpg') ?>" alt="Infection Control Audit Rounds" class="w-100 h-100" style="object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background-color: rgba(26, 35, 64, 0.85); backdrop-filter: blur(4px);">
                            <span class="badge" style="background-color: #ff7a00; color: #ffffff; font-size: 0.72rem;">HIC COMMITTEE</span>
                            <h5 class="text-white fw-bold mb-0 mt-1" style="font-size: 1.05rem;">Active Infection Surveillance Rounds</h5>
                        </div>
                    </div>
                    <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <p class="text-muted small mb-3">
                            Direct tablet rounds empower nursing superintendents and microbiologists to record sterile bundle adherence and track HAI sentinel breaches on the move.
                        </p>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="badge bg-light text-navy border fw-bold">Daily Hand Hygiene Checks</span>
                            <a href="#tab-hygiene" class="small fw-bold text-decoration-none" style="color: #0c74c5;">
                                Audit Tool <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm parallax-depth-card parallax-tilt-card h-100" style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden;">
                    <div class="parallax-image-holder position-relative" style="height: 240px;">
                        <img src="<?= base_url('assets/images/hospital_digital_kpi_dashboard.jpg') ?>" alt="Hospital Executive Quality Council" class="w-100 h-100" style="object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background-color: rgba(26, 35, 64, 0.85); backdrop-filter: blur(4px);">
                            <span class="badge" style="background-color: #0c74c5; color: #ffffff; font-size: 0.72rem;">NABH EXECUTIVE</span>
                            <h5 class="text-white fw-bold mb-0 mt-1" style="font-size: 1.05rem;">Clinical Quality Governance Board</h5>
                        </div>
                    </div>
                    <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <p class="text-muted small mb-3">
                            Executive dashboards aggregate department telemetry into automated NABH 5th Edition regulatory compliance reports with root-cause CAPA tracking.
                        </p>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="badge bg-light text-navy border fw-bold">Automated CAPA Escalation</span>
                            <a href="<?= site_url('login') ?>" class="small fw-bold text-decoration-none" style="color: #ff7a00;">
                                Executive Portal <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: INTERACTIVE FILTERABLE & SEARCHABLE NABH QUALITY MATRIX -->
        <div id="kpi-matrix-section" class="card border-0 mb-5 shadow-sm" style="border-radius: 12px; overflow: hidden; background-color: #ffffff; border: 1px solid #e2e8f0;">
            <div class="p-4" style="background-color: #ffffff; border-bottom: 2px solid #e2e8f0;">
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <span class="badge mb-2 px-3 py-1" style="background-color: #0c74c5; color: #ffffff; font-weight: 700; font-size: 0.75rem;">
                            <i class="fas fa-list-check me-1"></i> STATUTORY REGISTRY
                        </span>
                        <h3 class="h4 text-navy fw-bold mb-1" style="font-family: var(--font-heading);">
                            Mandatory NABH Quality Indicators Matrix (5th Edition)
                        </h3>
                        <p class="text-muted small mb-0">
                            Search indicators by code, clinical department, or numerator/denominator measurement rules.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-color: #cbd5e1;">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" id="kpiSearchInput" class="form-control border-start-0" placeholder="Search indicator name, code (e.g. QI-HAI-01), or formula..." onkeyup="filterKPITable()" style="border-color: #cbd5e1; font-size: 0.9rem;">
                            <button class="btn btn-outline-secondary" type="button" onclick="clearKPISearch()" title="Clear search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Category Filter Pills -->
                <div class="d-flex flex-wrap gap-2 mt-3 pt-3" style="border-top: 1px solid #f1f5f9;">
                    <button class="btn btn-sm kpi-filter-pill active" data-filter="all" onclick="setKPIFilter('all', this)" style="background-color: #1a2340; color: #ffffff; border-radius: 20px; font-weight: 600; font-size: 0.8rem; padding: 5px 14px;">
                        All Indicators (<span id="count-all">14</span>)
                    </button>
                    <button class="btn btn-sm kpi-filter-pill" data-filter="hai" onclick="setKPIFilter('hai', this)" style="background-color: #f1f5f9; color: #1a2340; border-radius: 20px; font-weight: 600; font-size: 0.8rem; padding: 5px 14px;">
                        <i class="fas fa-biohazard text-danger me-1"></i> HAI &amp; Infection (4)
                    </button>
                    <button class="btn btn-sm kpi-filter-pill" data-filter="med" onclick="setKPIFilter('med', this)" style="background-color: #f1f5f9; color: #1a2340; border-radius: 20px; font-weight: 600; font-size: 0.8rem; padding: 5px 14px;">
                        <i class="fas fa-pills text-warning me-1"></i> Medication Safety (2)
                    </button>
                    <button class="btn btn-sm kpi-filter-pill" data-filter="ops" onclick="setKPIFilter('ops', this)" style="background-color: #f1f5f9; color: #1a2340; border-radius: 20px; font-weight: 600; font-size: 0.8rem; padding: 5px 14px;">
                        <i class="fas fa-hospital text-primary me-1"></i> Bed &amp; Operations (3)
                    </button>
                    <button class="btn btn-sm kpi-filter-pill" data-filter="clinical" onclick="setKPIFilter('clinical', this)" style="background-color: #f1f5f9; color: #1a2340; border-radius: 20px; font-weight: 600; font-size: 0.8rem; padding: 5px 14px;">
                        <i class="fas fa-stethoscope text-info me-1"></i> Clinical &amp; Surgical (3)
                    </button>
                    <button class="btn btn-sm kpi-filter-pill" data-filter="safety" onclick="setKPIFilter('safety', this)" style="background-color: #f1f5f9; color: #1a2340; border-radius: 20px; font-weight: 600; font-size: 0.8rem; padding: 5px 14px;">
                        <i class="fas fa-shield-halved text-success me-1"></i> Patient Safety &amp; Incidents (2)
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="kpiMainTable">
                    <thead style="background-color: #1a2340; color: #ffffff;">
                        <tr style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.04em;">
                            <th class="ps-4 py-3" style="width: 140px;">Code</th>
                            <th class="py-3">Indicator Name &amp; Chapter</th>
                            <th class="py-3" style="min-width: 260px;">Standard Calculation Formula</th>
                            <th class="py-3 text-center" style="width: 170px;">Target Benchmark</th>
                            <th class="py-3 text-center" style="width: 120px;">Frequency</th>
                            <th class="pe-4 py-3 text-end" style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="kpiTableBody" style="font-size: 0.9rem;">
                        <!-- Row 1: CAUTI -->
                        <tr data-category="hai" data-code="QI-HAI-01" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-HAI-01</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Catheter-Associated Urinary Tract Infection (CAUTI)</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">HIC.3 / Clinical Governance</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(CAUTI Infections / Total Catheter Days) &times; 1,000</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: IPD Nursing Kardex &amp; Microbiology Lab</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 1.5 per 1,000 days</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-HAI-01', 'Catheter-Associated UTI', '(Total Confirmed CAUTI / Total Catheter Days) * 1000', '&le; 1.5 per 1,000 catheter days', 'Monthly HIC Committee', 'Review urinary catheter necessity daily during ICU consultant rounds. Ensure closed drainage system maintenance and strict sterile insertion technique.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 2: CLABSI -->
                        <tr data-category="hai" data-code="QI-HAI-02" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-HAI-02</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Central Line-Associated Bloodstream Infection (CLABSI)</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">HIC.3 / Critical Care</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(CLABSI Infections / Total Central Line Days) &times; 1,000</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Blood Culture Lab &amp; ICU Central Line Register</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 1.0 per 1,000 days</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-HAI-02', 'Central Line Infection (CLABSI)', '(Total CLABSI Cases / Total Central Line Days) * 1000', '&le; 1.0 per 1,000 line days', 'Monthly HIC Committee', 'Implement full-barrier drape precautions during central line insertion and chlorhexidine gluconate skin preparation.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 3: VAP -->
                        <tr data-category="hai" data-code="QI-HAI-03" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-HAI-03</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Ventilator-Associated Pneumonia (VAP Rate)</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">HIC.3 / Critical Care</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(VAP Infections / Total Ventilator Days) &times; 1,000</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: ICU EMR Ventilation Log &amp; Sputum/ET Aspirate</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 2.0 per 1,000 days</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-HAI-03', 'Ventilator Pneumonia (VAP)', '(Total VAP Cases / Total Ventilator Days) * 1000', '&le; 2.0 per 1,000 vent days', 'Monthly ICU Audit', 'Enforce VAP bundle: 30-45 degree head of bed elevation, daily sedation vacation, subglottic suctioning, and oral chlorhexidine care.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 4: SSI -->
                        <tr data-category="hai" data-code="QI-HAI-04" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-HAI-04</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Surgical Site Infection (Clean Wound Surgeries)</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">HIC.3 / OT Committee</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Clean Wound SSI Cases / Total Clean Surgeries) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: OT Logbook &amp; Post-Op Surgical Surveillance (30-day)</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 1.0%</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-HAI-04', 'Surgical Site Infection (SSI)', '(Clean SSI Cases / Total Clean Surgeries) * 100', '&le; 1.0%', 'Monthly OT Committee', 'Ensure timely prophylactic antibiotic administration within 60 minutes prior to incision and strict OT positive air pressure maintenance.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 5: Medication Errors -->
                        <tr data-category="med" data-code="QI-MED-01" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #ff7a00;">QI-MED-01</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Medication Error Reporting Rate &amp; Near Misses</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">MOM.7 / Pharmacy &amp; Therapeutics</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Total Reported Errors + Near Misses / Patient Days) &times; 1,000</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Incident Portal &amp; Pharmacy Intervention Log</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #ff7a00; color: #ffffff;">&gt; 2.0 (High reporting)</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-MED-01', 'Medication Error & Near Miss Rate', '(Errors + Near Misses / Patient Days) * 1000', '> 2.0 (demonstrating open reporting)', 'Monthly PTC Committee', 'Conduct root-cause analysis (RCA) on LASA (Look-Alike Sound-Alike) drugs and standardize barcode medication administration.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 6: Adverse Drug Reactions -->
                        <tr data-category="med" data-code="QI-MED-02" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #ff7a00;">QI-MED-02</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Adverse Drug Reaction (ADR) Reporting Rate</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">MOM.7 / Pharmacovigilance</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Total Reported ADR Cases / Total Inpatient Admissions) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: PvPI ADR Forms &amp; Clinical Pharmacist Notes</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">100% PvPI Synced</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-MED-02', 'ADR Reporting & PvPI Link', '(ADR Cases / Inpatient Admissions) * 100', '100% reported to National PvPI center', 'Monthly Pharmacovigilance', 'Document allergy histories in EMR before prescribing. Ensure prompt reporting of serious unexpected ADRs to Indian Pharmacopoeia Commission.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 7: Bed Occupancy -->
                        <tr data-category="ops" data-code="QI-OPS-01" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #1a2340;">QI-OPS-01</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Bed Occupancy Rate (BOR)</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">ROM.1 / Hospital Operations</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Total Inpatient Days of Care / Available Bed Days) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Midnight Census &amp; HIS Inpatient Module</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">75% - 85%</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Daily / Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-OPS-01', 'Bed Occupancy Rate (BOR)', '(Total Inpatient Days / Available Bed Days) * 100', '75% - 85% optimal range', 'Daily Bed Management Meeting', 'Manage bed turnaround times and smooth elective surgery admissions to avoid nursing burnout and overcrowding.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 8: ALOS -->
                        <tr data-category="ops" data-code="QI-OPS-02" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #1a2340;">QI-OPS-02</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Average Length of Stay (ALOS)</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">ROM.1 / Clinical Pathways</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">Total Inpatient Days of Care / Total Discharges</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: EMR Discharge Summaries</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">3.5 - 4.5 Days</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-OPS-02', 'Average Length of Stay (ALOS)', 'Total Inpatient Days / Total Discharges', '3.5 - 4.5 Days (Superspecialty)', 'Monthly Clinical Audit', 'Standardize clinical pathways for common diagnoses and implement planned discharge planning 24 hours prior to discharge.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 9: Emergency Turnaround -->
                        <tr data-category="ops" data-code="QI-OPS-03" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #1a2340;">QI-OPS-03</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Emergency Dept Door-to-Doctor Time</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">COP.3 / Emergency Services</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">Sum of Time from Arrival to First Physician Triage / Total ER Patients</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Emergency Triage Timestamp Register</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 10 Minutes</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Daily / Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-OPS-03', 'Emergency Door-to-Doctor Time', 'Total Triage Wait Time / Total ER Patients', '&le; 10 Mins (Priority 1 immediate)', 'Monthly Emergency Committee', 'Implement Manchester or ATS Triage scoring system to ensure rapid assessment of red and yellow emergency patients.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 10: Surgical Cancelation -->
                        <tr data-category="clinical" data-code="QI-CLIN-01" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-CLIN-01</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Elective Surgery Cancellation Rate</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">COP.7 / Surgical Governance</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Cancelled Surgeries on Day of Surgery / Total Scheduled) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: OT Booking Ledger &amp; Anaesthesia Pre-Op</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 2.0%</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-CLIN-01', 'Elective Surgery Cancellation Rate', '(Cancelled Surgeries / Total Scheduled) * 100', '&le; 2.0%', 'Monthly OT Committee', 'Complete PAC (Pre-Anaesthetic Checkup) at least 24 hours in advance to avoid last-minute cancellations due to clinical unfitness.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 11: Re-Admission Rate -->
                        <tr data-category="clinical" data-code="QI-CLIN-02" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-CLIN-02</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Unplanned Re-Admission within 30 Days</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">COP.1 / Clinical Governance</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Unplanned Readmissions for Same Condition / Total Discharges) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: HIS Admission Registry &amp; Medical Records</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 3.0%</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-CLIN-02', '30-Day Unplanned Readmission Rate', '(Unplanned Readmissions / Total Discharges) * 100', '&le; 3.0%', 'Monthly Clinical Audit', 'Enhance discharge counseling, provide clear medication instructions, and schedule mandatory 7-day post-op telephonic follow-ups.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 12: WHO Surgical Safety Checklist -->
                        <tr data-category="clinical" data-code="QI-CLIN-03" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #0c74c5;">QI-CLIN-03</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">WHO Surgical Safety Checklist Adherence</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">COP.7 / Patient Safety</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Completed 3-Phase Checklists / Total Surgeries Performed) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Sign-in, Time-out, Sign-out Records</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">100% Mandatory</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-CLIN-03', 'WHO Surgical Checklist Adherence', '(Completed Checklists / Total Surgeries) * 100', '100% Complete Adherence', 'Monthly OT Review', 'Enforce verbal pause for Time-Out prior to knife-to-skin. Digital audit stamp in OT EMR workflow.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 13: Inpatient Falls -->
                        <tr data-category="safety" data-code="QI-SAF-01" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #10b981;">QI-SAF-01</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Inpatient Fall Incident Rate</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">PSQ.2 / Patient Safety</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Total Inpatient Falls / Total Inpatient Bed Days) &times; 1,000</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Incident Portal &amp; Nursing Shift handover</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">&le; 1.0 per 1,000 days</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-SAF-01', 'Patient Fall Incident Rate', '(Inpatient Falls / Patient Days) * 1000', '&le; 1.0 per 1,000 days', 'Monthly Safety Committee', 'Ensure bed rails are elevated for high-risk patients, non-skid slippers, and call bells within immediate arm reach.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                        <!-- Row 14: Needle Stick Injuries -->
                        <tr data-category="safety" data-code="QI-SAF-02" class="kpi-row">
                            <td class="ps-4">
                                <span class="badge text-white px-2 py-1 fw-bold" style="background-color: #10b981;">QI-SAF-02</span>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Needle Stick &amp; Sharps Injury (NSI) Rate</div>
                                <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">HIC.8 / Occupational Health</span>
                            </td>
                            <td>
                                <div class="font-monospace small text-dark fw-semibold">(Total NSI Incidents / Total Healthcare Workers) &times; 100</div>
                                <span class="small text-muted" style="font-size: 0.75rem;">Source: Staff Health Clinic &amp; PEP Surveillance</span>
                            </td>
                            <td class="text-center">
                                <span class="badge" style="background-color: #10b981; color: #ffffff;">Zero Tolerance / 100% PEP</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">Monthly</span>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary" onclick="openKPIModal('QI-SAF-02', 'Needle Stick Injury (NSI) Rate', '(NSI Incidents / Total HCWs) * 100', 'Zero Tolerance + 100% PEP within 2 hrs', 'Monthly Staff Health', 'Eliminate recapping of needles, use auto-disable safety syringes, and ensure 100% Hepatitis B vaccination coverage for clinical staff.')" style="border-radius: 4px; font-size: 0.75rem;">
                                    <i class="fas fa-eye me-1"></i> Details
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="p-3 bg-light d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 border-top">
                <span class="small text-muted" id="kpiTableCountNote">Showing 14 mandatory quality indicators</span>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-outline-navy" onclick="window.print()" style="font-size: 0.8rem;">
                        <i class="fas fa-print me-1"></i> Print Matrix
                    </button>
                    <a href="<?= site_url('login') ?>" class="btn btn-sm text-white fw-bold" style="background-color: #0c74c5; font-size: 0.8rem;">
                        <i class="fas fa-lock me-1"></i> Open Live Portal Telemetry
                    </a>
                </div>
            </div>
        </div>

        <!-- SECTION 3: INTERACTIVE MONTHLY CLINICAL BENCHMARK RADAR -->
        <div class="card border-0 mb-4 shadow-sm" style="border-radius: 12px; overflow: hidden; background-color: #ffffff; border: 1px solid #e2e8f0;">
            <div class="card-header p-4" style="background-color: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <span class="badge mb-2 px-3 py-1" style="background-color: #10b981; color: #ffffff; font-weight: 700; font-size: 0.75rem;">
                            <i class="fas fa-chart-simple me-1"></i> MONTHLY TREND RADAR
                        </span>
                        <h4 class="h5 text-navy fw-bold mb-1" style="font-family: var(--font-heading);">
                            Hospital Performance vs National NABH Percentiles
                        </h4>
                        <p class="text-muted small mb-0">
                            Simulate how seasonal patient loads and bed turnover affect clinical compliance thresholds.
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <select id="trendDeptSelect" class="form-select form-select-sm fw-bold text-navy" onchange="updateTrendData()" style="border-color: #cbd5e1; width: 170px;">
                            <option value="icu">Intensive Care Unit (ICU)</option>
                            <option value="ot">Operation Theatres (OT)</option>
                            <option value="ward">General Inpatient Wards</option>
                            <option value="er">Emergency Department</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                        <h6 class="fw-bold text-navy mb-3" id="trendCardTitle">
                            <i class="fas fa-wave-square me-2" style="color: #0c74c5;"></i> Active Clinical Metrics vs National Benchmark
                        </h6>
                        
                        <!-- Metric 1 Progress Bar -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-bold text-navy" id="trendMetric1Name">Device Infection Rate (HAI Composite)</span>
                                <span class="small fw-bold text-success" id="trendMetric1Val">1.18 / 1.50 Target (Safe)</span>
                            </div>
                            <div class="progress" style="height: 12px; border-radius: 6px; background-color: #e2e8f0;">
                                <div id="trendBar1" class="progress-bar" role="progressbar" style="width: 78%; background-color: #0c74c5;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between text-muted mt-1" style="font-size: 0.72rem;">
                                <span>0.00 (Zero Defect)</span>
                                <span>NABH Max Limit: 1.50</span>
                            </div>
                        </div>

                        <!-- Metric 2 Progress Bar -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-bold text-navy" id="trendMetric2Name">Hand Hygiene Adherence</span>
                                <span class="small fw-bold text-success" id="trendMetric2Val">93.4% / 85.0% Target (Gold)</span>
                            </div>
                            <div class="progress" style="height: 12px; border-radius: 6px; background-color: #e2e8f0;">
                                <div id="trendBar2" class="progress-bar" role="progressbar" style="width: 93.4%; background-color: #10b981;" aria-valuenow="93.4" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between text-muted mt-1" style="font-size: 0.72rem;">
                                <span>NABH Base: 85%</span>
                                <span>Gold Excellence: 95%+</span>
                            </div>
                        </div>

                        <!-- Metric 3 Progress Bar -->
                        <div class="mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-bold text-navy" id="trendMetric3Name">Medication Administration Safety</span>
                                <span class="small fw-bold text-success" id="trendMetric3Val">0.82 / 2.00 Target (Safe)</span>
                            </div>
                            <div class="progress" style="height: 12px; border-radius: 6px; background-color: #e2e8f0;">
                                <div id="trendBar3" class="progress-bar" role="progressbar" style="width: 41%; background-color: #ff7a00;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between text-muted mt-1" style="font-size: 0.72rem;">
                                <span>0.00 Incidents</span>
                                <span>Alert Threshold: 2.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="p-4 rounded-3 text-white" style="background-color: #1a2340; border-top: 4px solid #ff7a00;">
                            <h6 class="fw-bold mb-2 text-white"><i class="fas fa-robot text-warning me-2"></i> Automated Sentinel Telemetry</h6>
                            <p class="small text-light mb-3" style="opacity: 0.9; line-height: 1.45;" id="trendAISummary">
                                The Intensive Care Unit maintains strong infection control buffers with zero recorded VAP breaches over the past 90 days. Continuous air culture audits are validated.
                            </p>
                            <div class="p-2 rounded mb-3" style="background-color: rgba(255,255,255,0.08); font-size: 0.78rem;">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-white-50">Audit Readiness Score:</span>
                                    <span class="fw-bold text-white">96.8 / 100</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-white-50">Next Statutory Review:</span>
                                    <span class="fw-bold" style="color: #ff7a00;">15th of Every Month</span>
                                </div>
                            </div>
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm w-100 fw-bold text-white py-2" style="background-color: #ff7a00; border-radius: 6px; font-size: 0.85rem;">
                                <i class="fas fa-list-check me-1"></i> Run Full NABH Gap Assessment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================
     MODAL FOR KPI DETAILS & MEASUREMENT PROTOCOL
========================================================= -->
<div class="modal fade" id="kpiDetailModal" tabindex="-1" aria-labelledby="kpiDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
            <div class="modal-header text-white" style="background-color: #1a2340; border-bottom: 3px solid #0c74c5;">
                <div>
                    <span class="badge" style="background-color: #ff7a00; color: #ffffff;" id="modalKPICode">QI-CODE</span>
                    <h5 class="modal-title fw-bold mt-1 text-white" id="modalKPITitle">Indicator Details</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Official Standard Formula</label>
                    <div class="p-2 rounded bg-light border font-monospace small fw-bold text-navy" id="modalKPIFormula">
                        Formula
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="small text-muted text-uppercase fw-bold">Target Benchmark</label>
                        <div class="p-2 rounded bg-light border small fw-bold text-success" id="modalKPIBenchmark">
                            Benchmark
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="small text-muted text-uppercase fw-bold">Audit Frequency</label>
                        <div class="p-2 rounded bg-light border small fw-bold text-navy" id="modalKPIFreq">
                            Frequency
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="small text-muted text-uppercase fw-bold">Recommended CAPA &amp; Best Practice</label>
                    <div class="p-3 rounded small text-dark" style="background-color: #f8fafc; border-left: 3px solid #0c74c5;" id="modalKPICAPA">
                        CAPA
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light p-3">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= site_url('login') ?>" class="btn btn-sm text-white fw-bold" style="background-color: #0c74c5;">
                    <i class="fas fa-folder-open me-1"></i> Open In Hospital DQMS
                </a>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     INTERACTIVE JAVASCRIPT LOGIC
========================================================= -->
<script>
// 1. HAI Infection Calculator Engine
function calculateHAIRate() {
    const type = document.getElementById('hai_type_select').value;
    const num = parseFloat(document.getElementById('hai_numerator').value) || 0;
    const den = parseFloat(document.getElementById('hai_denominator').value) || 1;
    
    let rate = 0;
    let unit = 'per 1,000 days';
    let isSSI = (type === 'ssi');
    
    if (isSSI) {
        rate = (num / den) * 100;
        unit = '%';
    } else {
        rate = (num / den) * 1000;
        unit = 'per 1,000 device days';
    }
    
    const resultVal = document.getElementById('hai_result_val');
    const badge = document.getElementById('hai_status_badge');
    const evalText = document.getElementById('hai_evaluation_text');
    
    resultVal.innerHTML = `${rate.toFixed(2)} <span style="font-size: 1rem; font-weight: 500; color: #cbd5e1;">${unit}</span>`;
    
    let isSafe = false;
    if (type === 'cauti') isSafe = (rate <= 1.5);
    else if (type === 'clabsi') isSafe = (rate <= 1.0);
    else if (type === 'vap') isSafe = (rate <= 2.0);
    else if (type === 'ssi') isSafe = (rate <= 1.0);
    
    if (isSafe) {
        badge.className = 'badge';
        badge.style.backgroundColor = '#10b981';
        badge.style.color = '#ffffff';
        badge.innerHTML = '<i class="fas fa-check-circle me-1"></i> Within NABH Benchmark';
        evalText.innerText = 'Optimal infection control rate maintained. Standard aseptic insertion bundles and surveillance protocols are functioning within statutory limits.';
    } else {
        badge.className = 'badge';
        badge.style.backgroundColor = '#ef4444';
        badge.style.color = '#ffffff';
        badge.innerHTML = '<i class="fas fa-triangle-exclamation me-1"></i> Benchmark Breached - Action Required';
        evalText.innerText = 'Rate exceeds statutory threshold! Mandatory CAPA required: initiate 100% device checklist re-audit, check nursing bundle compliance, and review sterilization logs.';
    }
}

function switchHAIType() {
    const type = document.getElementById('hai_type_select').value;
    const numLabel = document.getElementById('hai_num_label');
    const denLabel = document.getElementById('hai_den_label');
    const formulaText = document.getElementById('hai_formula_text');
    const note = document.getElementById('hai_benchmark_note');
    const multiplier = document.getElementById('hai_multiplier_badge');
    
    if (type === 'cauti') {
        numLabel.innerText = 'Total Confirmed CAUTI Cases';
        denLabel.innerText = 'Total Urinary Catheter Days';
        formulaText.innerText = '(Total CAUTI Cases / Total Catheter Days) × 1,000';
        note.innerText = 'NABH Benchmark Target: ≤ 1.5 per 1,000 catheter days';
        multiplier.innerText = 'Multiplier: × 1,000 Days';
        document.getElementById('hai_numerator').value = 3;
        document.getElementById('hai_denominator').value = 2400;
    } else if (type === 'clabsi') {
        numLabel.innerText = 'Total Confirmed CLABSI Cases';
        denLabel.innerText = 'Total Central Line Days';
        formulaText.innerText = '(Total CLABSI Cases / Total Central Line Days) × 1,000';
        note.innerText = 'NABH Benchmark Target: ≤ 1.0 per 1,000 line days';
        multiplier.innerText = 'Multiplier: × 1,000 Days';
        document.getElementById('hai_numerator').value = 2;
        document.getElementById('hai_denominator').value = 2100;
    } else if (type === 'vap') {
        numLabel.innerText = 'Total Confirmed VAP Cases';
        denLabel.innerText = 'Total Ventilator Days';
        formulaText.innerText = '(Total VAP Cases / Total Ventilator Days) × 1,000';
        note.innerText = 'NABH Benchmark Target: ≤ 2.0 per 1,000 vent days';
        multiplier.innerText = 'Multiplier: × 1,000 Days';
        document.getElementById('hai_numerator').value = 3;
        document.getElementById('hai_denominator').value = 1800;
    } else if (type === 'ssi') {
        numLabel.innerText = 'Total Clean Wound SSI Cases';
        denLabel.innerText = 'Total Clean Surgeries Performed';
        formulaText.innerText = '(Clean SSI Cases / Total Clean Surgeries) × 100';
        note.innerText = 'NABH Benchmark Target: ≤ 1.0% Clean Surgeries';
        multiplier.innerText = 'Multiplier: × 100 (%)';
        document.getElementById('hai_numerator').value = 2;
        document.getElementById('hai_denominator').value = 280;
    }
    calculateHAIRate();
}

// 2. Medication Errors Calculator
function calculateMedErrors() {
    const actual = parseFloat(document.getElementById('med_actual_errors').value) || 0;
    const nearMiss = parseFloat(document.getElementById('med_near_misses').value) || 0;
    const days = parseFloat(document.getElementById('med_patient_days').value) || 1;
    
    const errorRate = (actual / days) * 1000;
    const totalRate = ((actual + nearMiss) / days) * 1000;
    const totalIncidents = actual + nearMiss;
    const cultureRatio = totalIncidents > 0 ? ((nearMiss / totalIncidents) * 100).toFixed(1) : 0;
    
    document.getElementById('med_result_val').innerHTML = `${errorRate.toFixed(2)} <span style="font-size: 1rem; font-weight: 500; color: #cbd5e1;">errors / 1,000 bed days</span>`;
    document.getElementById('med_total_rate').innerText = totalRate.toFixed(2);
    document.getElementById('med_culture_badge').innerText = `Near Miss Ratio: ${cultureRatio}%`;
    
    const badge = document.getElementById('med_status_badge');
    const evalText = document.getElementById('med_evaluation_text');
    
    if (cultureRatio >= 70) {
        badge.style.backgroundColor = '#10b981';
        badge.innerHTML = '<i class="fas fa-shield-heart me-1"></i> Healthy Reporting Culture';
        evalText.innerText = 'High near-miss capture rate indicates strong non-punitive safety reporting. Continue 5-Rights medication verification and double-check high-alert medications.';
    } else {
        badge.style.backgroundColor = '#f59e0b';
        badge.innerHTML = '<i class="fas fa-triangle-exclamation me-1"></i> Under-Reporting Risk';
        evalText.innerText = 'Near-miss reporting ratio is below 70%. Reinforce non-punitive incident reporting across nursing and pharmacy staff.';
    }
}

// 3. Bed Occupancy & ALOS Calculator
function calculateBedMetrics() {
    const censusDays = parseFloat(document.getElementById('bed_census_days').value) || 0;
    const totalBeds = parseFloat(document.getElementById('bed_total_beds').value) || 1;
    const periodDays = parseFloat(document.getElementById('bed_period_days').value) || 1;
    const discharges = parseFloat(document.getElementById('bed_total_discharges').value) || 1;
    
    const availableBedDays = totalBeds * periodDays;
    const bor = (censusDays / availableBedDays) * 100;
    const alos = censusDays / discharges;
    
    document.getElementById('bed_bor_result').innerText = bor.toFixed(1) + '%';
    document.getElementById('bed_alos_result').innerHTML = `${alos.toFixed(2)} <span style="font-size: 0.85rem; font-weight: normal; color: #cbd5e1;">Days</span>`;
    
    const badge = document.getElementById('bed_status_badge');
    const evalText = document.getElementById('bed_evaluation_text');
    
    if (bor >= 75 && bor <= 85) {
        badge.style.backgroundColor = '#10b981';
        badge.innerHTML = '<i class="fas fa-check-circle me-1"></i> Optimal Utilization';
        evalText.innerText = 'Hospital bed capacity is operating at balanced equilibrium. Patient turnover allows emergency buffer beds while maintaining clinical revenue targets.';
    } else if (bor > 85) {
        badge.style.backgroundColor = '#ef4444';
        badge.innerHTML = '<i class="fas fa-triangle-exclamation me-1"></i> High Overcrowding Pressure';
        evalText.innerText = 'Bed occupancy exceeds 85%. Nursing workload and infection transmission risks increase. Expedite planned morning discharges.';
    } else {
        badge.style.backgroundColor = '#38bdf8';
        badge.innerHTML = '<i class="fas fa-info-circle me-1"></i> Under-Capacity';
        evalText.innerText = 'Bed occupancy is below 75%. Capacity is available for elective surgeries and specialty admissions.';
    }
}

// 4. WHO Hand Hygiene Audit Calculator
function calculateHandHygiene() {
    let totalComp = 0;
    let totalOpp = 0;
    
    for (let i = 1; i <= 5; i++) {
        const c = parseFloat(document.getElementById(`hyg_comp_${i}`).value) || 0;
        const o = parseFloat(document.getElementById(`hyg_opp_${i}`).value) || 1;
        const pct = Math.min(100, Math.round((c / o) * 100));
        
        const badge = document.getElementById(`hyg_pct_${i}`);
        if (badge) badge.innerText = `${pct}%`;
        
        totalComp += c;
        totalOpp += o;
    }
    
    const overallScore = totalOpp > 0 ? ((totalComp / totalOpp) * 100).toFixed(1) : 0;
    document.getElementById('hyg_total_score').innerText = `${overallScore}%`;
    document.getElementById('hyg_total_obs').innerText = `${totalComp} / ${totalOpp}`;
    
    const gradeBadge = document.getElementById('hyg_grade_badge');
    const evalText = document.getElementById('hyg_eval_text');
    
    if (overallScore >= 90) {
        gradeBadge.style.backgroundColor = '#10b981';
        gradeBadge.innerHTML = '<i class="fas fa-award me-1"></i> NABH Gold Standard';
        evalText.innerText = 'Overall compliance exceeds 90% target threshold. High adherence in aseptic procedures. Continue monthly random ward audits and alcohol hand rub replenishment checks.';
    } else if (overallScore >= 75) {
        gradeBadge.style.backgroundColor = '#f59e0b';
        gradeBadge.innerHTML = '<i class="fas fa-circle-exclamation me-1"></i> Substantial Compliance';
        evalText.innerText = 'Compliance is in acceptable range (75-89%). Conduct targeted refresher training for moments 1 & 5 (before touching patient and surroundings).';
    } else {
        gradeBadge.style.backgroundColor = '#ef4444';
        gradeBadge.innerHTML = '<i class="fas fa-xmark me-1"></i> Action Plan Mandatory';
        evalText.innerText = 'Hand hygiene compliance below 75% threshold! Immediate re-training of nursing and junior medical staff required.';
    }
}

// 5. Patient Safety & Falls Calculator
function calculateSafetyRates() {
    const falls = parseFloat(document.getElementById('fall_cases').value) || 0;
    const hapu = parseFloat(document.getElementById('hapu_cases').value) || 0;
    const days = parseFloat(document.getElementById('safety_patient_days').value) || 1;
    
    const fallRate = (falls / days) * 1000;
    const hapuRate = (hapu / days) * 1000;
    
    document.getElementById('fall_rate_val').innerText = fallRate.toFixed(2);
    document.getElementById('hapu_rate_val').innerText = hapuRate.toFixed(2);
}

// Reset Defaults
function resetCalculatorDefaults() {
    document.getElementById('hai_type_select').value = 'cauti';
    switchHAIType();
    
    document.getElementById('med_actual_errors').value = 4;
    document.getElementById('med_near_misses').value = 18;
    document.getElementById('med_patient_days').value = 5200;
    calculateMedErrors();
    
    document.getElementById('bed_census_days').value = 4650;
    document.getElementById('bed_total_beds').value = 200;
    document.getElementById('bed_period_days').value = 30;
    document.getElementById('bed_total_discharges').value = 1160;
    calculateBedMetrics();
    
    calculateHandHygiene();
    calculateSafetyRates();
}

// Copy Metric to Clipboard
function copyResultToClipboard(type) {
    let text = '';
    if (type === 'hai') {
        text = `HAI Telemetry: ${document.getElementById('hai_type_select').value.toUpperCase()} Rate: ${document.getElementById('hai_result_val').innerText} (Benchmark: Within NABH target)`;
    } else if (type === 'med') {
        text = `Medication Safety Telemetry: Error Rate: ${document.getElementById('med_result_val').innerText}, Culture Index: ${document.getElementById('med_culture_badge').innerText}`;
    } else if (type === 'bed') {
        text = `Bed Utilization: BOR: ${document.getElementById('bed_bor_result').innerText}, ALOS: ${document.getElementById('bed_alos_result').innerText}`;
    } else if (type === 'hyg') {
        text = `WHO Hand Hygiene Audit Score: ${document.getElementById('hyg_total_score').innerText} (${document.getElementById('hyg_total_obs').innerText} observations)`;
    } else if (type === 'safety') {
        text = `Safety Telemetry: Fall Rate: ${document.getElementById('fall_rate_val').innerText} / 1,000 days, HAPU Rate: ${document.getElementById('hapu_rate_val').innerText} / 1,000 days`;
    }
    
    navigator.clipboard.writeText(text).then(() => {
        alert('Copied to clipboard!\n' + text);
    }).catch(() => {
        alert(text);
    });
}

// Table Filter & Search Engine
function filterKPITable() {
    const input = document.getElementById('kpiSearchInput').value.toLowerCase().trim();
    const rows = document.querySelectorAll('.kpi-row');
    let visibleCount = 0;
    
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        const matches = text.includes(input);
        const activeFilter = document.querySelector('.kpi-filter-pill.active')?.getAttribute('data-filter') || 'all';
        const categoryMatches = (activeFilter === 'all' || row.getAttribute('data-category') === activeFilter);
        
        if (matches && categoryMatches) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
    
    document.getElementById('kpiTableCountNote').innerText = `Showing ${visibleCount} indicator${visibleCount === 1 ? '' : 's'}`;
}

function clearKPISearch() {
    document.getElementById('kpiSearchInput').value = '';
    filterKPITable();
}

function setKPIFilter(category, btn) {
    document.querySelectorAll('.kpi-filter-pill').forEach(p => {
        p.classList.remove('active');
        p.style.backgroundColor = '#f1f5f9';
        p.style.color = '#1a2340';
    });
    btn.classList.add('active');
    btn.style.backgroundColor = '#1a2340';
    btn.style.color = '#ffffff';
    
    filterKPITable();
}

// Open KPI Modal
function openKPIModal(code, title, formula, benchmark, freq, capa) {
    document.getElementById('modalKPICode').innerText = code;
    document.getElementById('modalKPITitle').innerText = title;
    document.getElementById('modalKPIFormula').innerText = formula;
    document.getElementById('modalKPIBenchmark').innerText = benchmark;
    document.getElementById('modalKPIFreq').innerText = freq;
    document.getElementById('modalKPICAPA').innerText = capa;
    
    const modal = new bootstrap.Modal(document.getElementById('kpiDetailModal'));
    modal.show();
}

// CSV Export Generator
function exportKPITableToCSV() {
    let csv = "Indicator Code,Indicator Name,Formula,Benchmark,Frequency\n";
    const rows = document.querySelectorAll('#kpiTableBody tr');
    
    rows.forEach(r => {
        const code = r.querySelector('td:nth-child(1)')?.innerText.trim().replace(/\n/g, ' ') || '';
        const name = r.querySelector('td:nth-child(2) .fw-bold')?.innerText.trim() || '';
        const formula = r.querySelector('td:nth-child(3) .font-monospace')?.innerText.trim().replace(/,/g, ';') || '';
        const benchmark = r.querySelector('td:nth-child(4)')?.innerText.trim() || '';
        const freq = r.querySelector('td:nth-child(5)')?.innerText.trim() || '';
        
        csv += `"${code}","${name}","${formula}","${benchmark}","${freq}"\n`;
    });
    
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', 'NABH_Quality_Indicators_Matrix.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Department Trend Simulator
function updateTrendData() {
    const dept = document.getElementById('trendDeptSelect').value;
    const title = document.getElementById('trendCardTitle');
    const summary = document.getElementById('trendAISummary');
    
    if (dept === 'icu') {
        title.innerHTML = '<i class="fas fa-wave-square me-2" style="color: #0c74c5;"></i> Intensive Care Unit (ICU) — Live Telemetry';
        document.getElementById('trendMetric1Name').innerText = 'HAI Composite Infection Rate';
        document.getElementById('trendMetric1Val').innerText = '1.18 / 1.50 Target (Safe)';
        document.getElementById('trendBar1').style.width = '78%';
        
        document.getElementById('trendMetric2Name').innerText = 'Hand Hygiene Adherence (ICU Staff)';
        document.getElementById('trendMetric2Val').innerText = '94.2% / 85.0% Target (Gold)';
        document.getElementById('trendBar2').style.width = '94.2%';
        
        document.getElementById('trendMetric3Name').innerText = 'Ventilator Bundle Adherence';
        document.getElementById('trendMetric3Val').innerText = '98.0% / 95.0% Target';
        document.getElementById('trendBar3').style.width = '98%';
        
        summary.innerText = 'The Intensive Care Unit maintains strong infection control buffers with zero recorded VAP breaches over the past 90 days. Continuous air culture audits are validated.';
    } else if (dept === 'ot') {
        title.innerHTML = '<i class="fas fa-lungs me-2" style="color: #ff7a00;"></i> Operation Theatres (OT) — Live Telemetry';
        document.getElementById('trendMetric1Name').innerText = 'Clean Wound SSI Rate';
        document.getElementById('trendMetric1Val').innerText = '0.72% / 1.00% Target (Safe)';
        document.getElementById('trendBar1').style.width = '72%';
        
        document.getElementById('trendMetric2Name').innerText = 'WHO Surgical Checklist Adherence';
        document.getElementById('trendMetric2Val').innerText = '100% Complete Adherence';
        document.getElementById('trendBar2').style.width = '100%';
        
        document.getElementById('trendMetric3Name').innerText = 'OT Utilization Efficiency';
        document.getElementById('trendMetric3Val').innerText = '82.5% / 80.0% Target';
        document.getElementById('trendBar3').style.width = '82.5%';
        
        summary.innerText = 'Operation Theatres exhibit 100% 3-phase surgical checklist adherence with sterile air positive pressure HEPA filtration functioning within 20 air changes/hour.';
    } else if (dept === 'ward') {
        title.innerHTML = '<i class="fas fa-bed-pulse me-2" style="color: #10b981;"></i> General Inpatient Wards — Live Telemetry';
        document.getElementById('trendMetric1Name').innerText = 'Inpatient Fall Rate';
        document.getElementById('trendMetric1Val').innerText = '0.42 / 1.00 Target (Safe)';
        document.getElementById('trendBar1').style.width = '42%';
        
        document.getElementById('trendMetric2Name').innerText = 'Bed Occupancy Rate (BOR)';
        document.getElementById('trendMetric2Val').innerText = '79.1% / 75-85% Range';
        document.getElementById('trendBar2').style.width = '79.1%';
        
        document.getElementById('trendMetric3Name').innerText = 'Call Bell Response (< 3 mins)';
        document.getElementById('trendMetric3Val').innerText = '96.4% Compliant';
        document.getElementById('trendBar3').style.width = '96.4%';
        
        summary.innerText = 'General Inpatient Wards show stable bed utilization (79.1%) with quick nursing call-bell turnaround time and zero stage 3/4 pressure ulcer occurrences.';
    } else if (dept === 'er') {
        title.innerHTML = '<i class="fas fa-truck-medical me-2" style="color: #ef4444;"></i> Emergency Department — Live Telemetry';
        document.getElementById('trendMetric1Name').innerText = 'Door-to-Doctor Triage Time';
        document.getElementById('trendMetric1Val').innerText = '7.2 mins / 10.0 mins Target';
        document.getElementById('trendBar1').style.width = '72%';
        
        document.getElementById('trendMetric2Name').innerText = 'Initial Resuscitation Protocol';
        document.getElementById('trendMetric2Val').innerText = '99.1% Adherence';
        document.getElementById('trendBar2').style.width = '99.1%';
        
        document.getElementById('trendMetric3Name').innerText = 'ER Left Without Being Seen (LWBS)';
        document.getElementById('trendMetric3Val').innerText = '0.8% / < 2.0% Target';
        document.getElementById('trendBar3').style.width = '40%';
        
        summary.innerText = 'Emergency triage turnaround remains below 8 minutes across priority-1 and priority-2 patients with excellent resuscitation response metrics.';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    resetCalculatorDefaults();
});
</script>
