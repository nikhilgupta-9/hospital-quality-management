<!-- =========================================================
     AUTHENTIC HINTON MEDICAL TEMPLATE — HERO SECTION (100% Full-Width)
========================================================= -->
<section class="hinton-hero-area position-relative overflow-hidden w-100">
    <!-- 100% Full-Width Background Image with Zoom Effect & Overlay -->
    <div class="hinton-hero-bg">
        <div class="hinton-hero-overlay-img"></div>
    </div>

    <!-- Floating Molecule Shapes -->
    <img src="<?= base_url('assets/images/hero-shape-1.png') ?>" alt="Shape" class="hinton-hero-shape-1">
    <img src="<?= base_url('assets/images/hero-shape-2.png') ?>" alt="Shape" class="hinton-hero-shape-2">

    <!-- Hero Content Container -->
    <div class="container position-relative" style="z-index: 3;">
        <div class="hinton-hero-content w-100 p-0">
            <div class="row align-items-center">
                <div class="col-lg-10 col-xl-9">
                    <!-- Live Pill Badge -->
                    <div class="hinton-hero-badge">
                        <span class="hinton-pulse-dot"></span>
                        <span>NABH 5th Edition &amp; JCI Compliant Medical Quality Framework</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="hinton-hero-title">
                        Find Accredited <span class="text-emerald">Hospitals, Doctors</span> &amp; Quality Standards
                    </h1>

                    <!-- Subtitle Description -->
                    <p class="hinton-hero-desc">
                        Discover certified NABH &amp; JCI hospitals, verify doctor credentialing, access version-controlled clinical SOPs, and track live healthcare quality indicators with 99.4% audit pass assurance.
                    </p>

                    <!-- Hinton Multi-Tab Search Directory Widget -->
                    <div class="hinton-directory-search-card">
                        <!-- Directory Tab List -->
                        <div class="hinton-search-tablist">
                            <button type="button" class="nav-link active" onclick="setSearchType('standards')">
                                <i class="fas fa-book-medical"></i> Standards &amp; SOPs
                            </button>
                            <button type="button" class="nav-link" onclick="setSearchType('doctors')">
                                <i class="fas fa-user-doctor"></i> Doctor Privileging
                            </button>
                            <button type="button" class="nav-link" onclick="setSearchType('indicators')">
                                <i class="fas fa-chart-line"></i> Quality KPIs
                            </button>
                            <button type="button" class="nav-link" onclick="setSearchType('checklists')">
                                <i class="fas fa-list-check"></i> Audit Checklists
                            </button>
                        </div>

                        <!-- Search Form Box -->
                        <div class="hinton-search-form-wrap">
                            <form id="hintonSearchForm" action="<?= site_url('standards') ?>" method="get" class="row g-2 align-items-center">
                                <div class="col-lg-4 col-md-12">
                                    <div class="hinton-form-field">
                                        <i class="fas fa-magnifying-glass"></i>
                                        <input type="text" id="searchQueryInput" name="q" class="form-control" placeholder="Search standard, SOP, protocol (e.g. MOM 3, OT Fire)...">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="hinton-form-field">
                                        <i class="fas fa-hospital"></i>
                                        <select name="dept" class="form-select">
                                            <option value="">All Departments</option>
                                            <option value="icu">Critical Care (ICU)</option>
                                            <option value="ot">Operation Theatre (OT)</option>
                                            <option value="emergency">Emergency &amp; Triage</option>
                                            <option value="pharmacy">Pharmacy (MOM)</option>
                                            <option value="hic">Infection Control (HIC)</option>
                                            <option value="biomedical">Biomedical Assets</option>
                                            <option value="fms">Facility Safety (FMS)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="hinton-form-field">
                                        <i class="fas fa-award"></i>
                                        <select name="tier" class="form-select">
                                            <option value="">Accreditation Level</option>
                                            <option value="full">NABH 5th Edition Full</option>
                                            <option value="entry">NABH Entry Level</option>
                                            <option value="jci">JCI International</option>
                                            <option value="nabl">NABL Diagnostic Lab</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <button type="submit" class="btn-hinton-search-action w-100">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Trending Keywords -->
                    <div class="hinton-trending-keywords">
                        <span class="text-white opacity-75 fw-bold me-1"><i class="fas fa-fire text-warning me-1"></i> Popular Searches:</span>
                        <a href="<?= site_url('standards?q=ICU') ?>">ICU Protocols</a>
                        <a href="<?= site_url('checklists') ?>">Fire Safety NOC</a>
                        <a href="<?= site_url('hr-suite') ?>">Doctor Privileging</a>
                        <a href="<?= site_url('quality-indicators') ?>">CAUTI / CLABSI Tracker</a>
                        <a href="<?= site_url('sop-suite') ?>">LASA High-Risk Drugs</a>
                    </div>

                    <!-- 4 Stat Counters Strip -->
                    <div class="row g-4 pt-3 border-top border-white border-opacity-15">
                        <div class="col-6 col-md-3">
                            <div class="hinton-hero-stat-item">
                                <div class="hinton-hero-stat-number">100+</div>
                                <div class="hinton-hero-stat-label">NABH Standards</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="hinton-hero-stat-item">
                                <div class="hinton-hero-stat-number">651</div>
                                <div class="hinton-hero-stat-label">Objective Elements</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="hinton-hero-stat-item">
                                <div class="hinton-hero-stat-number">99.4%</div>
                                <div class="hinton-hero-stat-label">1st-Time Pass Rate</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="hinton-hero-stat-item">
                                <div class="hinton-hero-stat-number">500+</div>
                                <div class="hinton-hero-stat-label">Hospitals Certified</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function setSearchType(type) {
    const form = document.getElementById('hintonSearchForm');
    const input = document.getElementById('searchQueryInput');
    const tabs = document.querySelectorAll('.hinton-search-tablist .nav-link');
    tabs.forEach(t => t.classList.remove('active'));
    if (event && event.currentTarget) {
        event.currentTarget.classList.add('active');
    }

    if (type === 'standards') {
        form.action = '<?= site_url('standards') ?>';
        input.placeholder = 'Search standard, SOP, protocol (e.g. MOM 3, OT Fire)...';
    } else if (type === 'doctors') {
        form.action = '<?= site_url('hr-suite') ?>';
        input.placeholder = 'Search doctor name, department, or clinical privileging...';
    } else if (type === 'indicators') {
        form.action = '<?= site_url('quality-indicators') ?>';
        input.placeholder = 'Search KPI indicator (e.g. CAUTI, CLABSI, Return to ICU)...';
    } else if (type === 'checklists') {
        form.action = '<?= site_url('checklists') ?>';
        input.placeholder = 'Search audit checklist (e.g. OT, ICU, Biomedical, BMW)...';
    }
}
</script>

<!-- =========================================================
     HINTON SIGNATURE 3-BOX ELEVATED FEATURE OVERLAP SECTION
========================================================= -->
<section class="feature-overlap-section mb-5">
    <div class="container">
        <div class="row g-4">
            <!-- Box 1 -->
            <div class="col-md-4">
                <div class="card-hinton-feature">
                    <div class="feature-icon icon-blue">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <span class="badge badge-max badge-max-blue align-self-start mb-2">Panel A</span>
                    <h4 class="h5 fw-bold text-navy mb-2">Document & SOP Suite</h4>
                    <p class="text-muted small mb-3">
                        Centralized repository for all hospital policies, clinical SOPs, infection control manuals, and NABH chapter evidence records with multi-stage approval workflows.
                    </p>
                    <ul class="list-unstyled small text-muted mb-4">
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Version Control (V1.0 &rarr; V2.0)</li>
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> 30/15/7 Days Expiry Alerts</li>
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> One-Click NABH Data Export</li>
                    </ul>
                    <a href="<?= site_url('sop-suite') ?>" class="text-primary fw-semibold small text-decoration-none mt-auto">
                        Explore Document &amp; SOP Suite <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Box 2 -->
            <div class="col-md-4">
                <div class="card-hinton-feature">
                    <div class="feature-icon icon-teal">
                        <i class="fas fa-user-doctor"></i>
                    </div>
                    <span class="badge badge-max badge-max-emerald align-self-start mb-2">Panel B</span>
                    <h4 class="h5 fw-bold text-navy mb-2">HR & Credentialing Suite</h4>
                    <p class="text-muted small mb-3">
                        Doctor and nursing staff credentials, state medical council registration tracking, procedural privileging matrix, and mandatory training hours management.
                    </p>
                    <ul class="list-unstyled small text-muted mb-4">
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Procedural Privileging Scope</li>
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Council Registration Expiry Reminders</li>
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> BLS / ACLS & Infection Drills</li>
                    </ul>
                    <a href="<?= site_url('hr-suite') ?>" class="text-primary fw-semibold small text-decoration-none mt-auto">
                        Explore HR &amp; Credentialing Suite <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Box 3 -->
            <div class="col-md-4">
                <div class="card-hinton-feature">
                    <div class="feature-icon icon-gold">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <span class="badge badge-max badge-max-gold align-self-start mb-2">Panel C</span>
                    <h4 class="h5 fw-bold text-navy mb-2">Equipment & Utilities Grid</h4>
                    <p class="text-muted small mb-3">
                        Medical instrument master directory, NABL calibrations, preventive maintenance (PPM), STP plant water logs, and fire safety systems.
                    </p>
                    <ul class="list-unstyled small text-muted mb-4">
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> NABL Calibration Schedule & Alerts</li>
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Fire Safety NOC & Monthly Audit</li>
                        <li class="mb-1"><i class="fas fa-check text-success me-2"></i> STP 150 KLD Effluent Logging</li>
                    </ul>
                    <a href="<?= site_url('equipment-grid') ?>" class="text-primary fw-semibold small text-decoration-none mt-auto">
                        Explore Equipment &amp; Utilities Grid <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON "HOW IT WORKS" — 4-STEP ACCREDITATION JOURNEY
========================================================= -->
<section class="py-5 bg-white border-bottom">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-navy mb-2">Implementation Pathway</span>
            <h2 class="display-6 fw-bold text-navy">How Hospital Accreditation Works</h2>
            <p class="text-muted">A structured 4-phase transformation from baseline assessment to certified international hospital quality compliance.</p>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="how-it-works-item card-max p-4 h-100 text-center">
                    <div class="how-it-works-number">01</div>
                    <h5 class="fw-bold text-navy mb-2">Gap Analysis</h5>
                    <p class="small text-muted mb-0">Evaluate 651 objective elements across clinical and facility operations using our online readiness tool.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="how-it-works-item card-max p-4 h-100 text-center">
                    <div class="how-it-works-number">02</div>
                    <h5 class="fw-bold text-navy mb-2">Digital SOPs & HR</h5>
                    <p class="small text-muted mb-0">Upload departmental policies, establish doctor credentialing, and map equipment calibration schedules.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="how-it-works-item card-max p-4 h-100 text-center">
                    <div class="how-it-works-number">03</div>
                    <h5 class="fw-bold text-navy mb-2">Mock Audits & CAPA</h5>
                    <p class="small text-muted mb-0">Execute internal audits in ICU, OT, and Pharmacy. Log non-conformities and execute Root Cause Analysis.</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="how-it-works-item card-max p-4 h-100 text-center">
                    <div class="how-it-works-number">04</div>
                    <h5 class="fw-bold text-navy mb-2">NABH 5th Ed. Pass</h5>
                    <p class="small text-muted mb-0">Generate digital assessment binders for external assessors and achieve certified accreditation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON FEATURED ACCREDITED HOSPITALS DIRECTORY
========================================================= -->
<section class="py-5 bg-main">
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
            <div>
                <span class="badge badge-max badge-max-emerald mb-2">Certified Institutions</span>
                <h2 class="display-6 fw-bold text-navy mb-1">Featured Accredited Hospitals</h2>
                <p class="text-muted mb-0">Healthcare facilities demonstrating superior clinical governance and patient safety protocols.</p>
            </div>
            <a href="<?= site_url('standards') ?>" class="btn btn-outline-navy btn-sm mt-3 mt-md-0">
                View All Standards <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            <!-- Hospital 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-hospital">
                    <div class="hospital-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1587351021759-3e566b6af7cc?auto=format&fit=crop&w=700&q=80" alt="Max Care Superspeciality Hospital">
                        <span class="hospital-badge"><i class="fas fa-certificate text-warning me-1"></i> NABH 5th Edition</span>
                        <span class="hospital-rating-badge"><i class="fas fa-star text-warning me-1"></i> 4.9 (120+ Audits)</span>
                    </div>
                    <div class="hospital-content">
                        <h5 class="fw-bold text-navy mb-1">Max Care Superspeciality Hospital</h5>
                        <p class="small text-muted mb-3"><i class="fas fa-location-dot text-danger me-1"></i> New Delhi, India &bull; 350 Inpatient Beds</p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-light text-dark small">Cardiac ICU</span>
                            <span class="badge bg-light text-dark small">Neuro OT</span>
                            <span class="badge bg-light text-dark small">Level 3 Trauma</span>
                            <span class="badge bg-light text-dark small">STP 150 KLD</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <span class="small text-success fw-bold"><i class="fas fa-check-double me-1"></i> 99.4% Compliance</span>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">View Quality Portal</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hospital 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-hospital">
                    <div class="hospital-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=700&q=80" alt="Apex Heart & Multispeciality Institute">
                        <span class="hospital-badge"><i class="fas fa-award text-info me-1"></i> JCI & NABH Gold</span>
                        <span class="hospital-rating-badge"><i class="fas fa-star text-warning me-1"></i> 4.8 (95 Audits)</span>
                    </div>
                    <div class="hospital-content">
                        <h5 class="fw-bold text-navy mb-1">Apex Heart & Multispeciality Institute</h5>
                        <p class="small text-muted mb-3"><i class="fas fa-location-dot text-danger me-1"></i> Mumbai, Maharashtra &bull; 250 Inpatient Beds</p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-light text-dark small">Cath Lab</span>
                            <span class="badge bg-light text-dark small">CCU Care</span>
                            <span class="badge bg-light text-dark small">Modular OT</span>
                            <span class="badge bg-light text-dark small">NABL Pathology</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <span class="small text-success fw-bold"><i class="fas fa-check-double me-1"></i> 98.8% Compliance</span>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">View Quality Portal</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hospital 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-hospital">
                    <div class="hospital-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=700&q=80" alt="Fortis Global Healthcare & Research">
                        <span class="hospital-badge"><i class="fas fa-shield-halved text-success me-1"></i> NABH 5th Edition</span>
                        <span class="hospital-rating-badge"><i class="fas fa-star text-warning me-1"></i> 4.9 (150+ Audits)</span>
                    </div>
                    <div class="hospital-content">
                        <h5 class="fw-bold text-navy mb-1">Fortis Global Healthcare & Research</h5>
                        <p class="small text-muted mb-3"><i class="fas fa-location-dot text-danger me-1"></i> Bengaluru, Karnataka &bull; 420 Inpatient Beds</p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-light text-dark small">Oncology</span>
                            <span class="badge bg-light text-dark small">Organ Transplant</span>
                            <span class="badge bg-light text-dark small">Robotic Surgery</span>
                            <span class="badge bg-light text-dark small">BMW Grade A</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <span class="small text-success fw-bold"><i class="fas fa-check-double me-1"></i> 99.1% Compliance</span>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">View Quality Portal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON DEPARTMENTS / SPECIALTIES GRID (NABH CLINICAL QUALITY MODULES)
========================================================= -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-navy mb-2">Hospital Departments</span>
            <h2 class="display-6 fw-bold text-navy">Specialized Clinical Quality Modules</h2>
            <p class="text-muted">Standardized clinical guidelines, SOPs, and inspection toolkits across all core hospital departments under NABH 5th Edition standards.</p>
        </div>

        <div class="row g-4">
            <!-- 1. ICU -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-rose">
                        <i class="fas fa-bed-pulse"></i>
                    </div>
                    <span class="badge bg-danger-subtle text-danger align-self-start mb-2 fw-semibold" style="font-size:0.75rem;">Critical Care / COP.6</span>
                    <h5 class="fw-bold text-navy mb-2">Intensive Care Unit (ICU)</h5>
                    <p class="small text-muted mb-3">Ventilator care bundles (VAP), central line insertion checklist (CLABSI), 24/7 Code Blue response logs, and crash cart daily audit registers.</p>
                    <a href="<?= site_url('standards?q=ICU') ?>" class="service-link">View ICU Standards <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 2. Operation Theatre -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-blue">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <span class="badge bg-primary-subtle text-primary align-self-start mb-2 fw-semibold" style="font-size:0.75rem;">Surgical Safety / COP.7</span>
                    <h5 class="fw-bold text-navy mb-2">Operation Theatre (OT)</h5>
                    <p class="small text-muted mb-3">WHO 3-phase Surgical Safety Checklist (Sign-In, Time-Out, Sign-Out), HEPA positive pressure airflow (20+ ACPH), and autoclave Bowie-Dick testing.</p>
                    <a href="<?= site_url('standards?q=OT') ?>" class="service-link">View OT Protocols <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 3. Emergency -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-gold">
                        <i class="fas fa-truck-medical"></i>
                    </div>
                    <span class="badge bg-warning-subtle text-warning-emphasis align-self-start mb-2 fw-semibold" style="font-size:0.75rem;">Emergency / AAC.2</span>
                    <h5 class="fw-bold text-navy mb-2">Emergency &amp; Trauma</h5>
                    <p class="small text-muted mb-3">Standardized 3-tier emergency triage (Red/Yellow/Green), fast-track acute stroke &amp; STEMI pathways, and mass casualty disaster protocols.</p>
                    <a href="<?= site_url('standards?q=Emergency') ?>" class="service-link">View Emergency Toolkits <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 4. Pharmacy -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-teal">
                        <i class="fas fa-pills"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success align-self-start mb-2 fw-semibold" style="font-size:0.75rem;">Pharmacy &amp; MOM</span>
                    <h5 class="fw-bold text-navy mb-2">Medication Safety (MOM)</h5>
                    <p class="small text-muted mb-3">Look-Alike Sound-Alike (LASA) tall-man lettering, high-alert drug double verification, cold-chain monitoring (2°C–8°C), and narcotic double-lock logs.</p>
                    <a href="<?= site_url('sop-suite') ?>" class="service-link">View Medication SOPs <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 5. Infection Control -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-purple">
                        <i class="fas fa-shield-virus"></i>
                    </div>
                    <span class="badge align-self-start mb-2 fw-semibold" style="font-size:0.75rem; background:#f3e8ff; color:#9333ea;">Infection Control / HIC</span>
                    <h5 class="fw-bold text-navy mb-2">Infection Control (HIC)</h5>
                    <p class="small text-muted mb-3">Monthly HAI surveillance (CAUTI, CLABSI, SSI, VAP), WHO 5 moments hand hygiene audits, airborne isolation negative pressure, and BMW segregation.</p>
                    <a href="<?= site_url('quality-indicators') ?>" class="service-link">View Infection Guidelines <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 6. Biomedical -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-indigo">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <span class="badge align-self-start mb-2 fw-semibold" style="font-size:0.75rem; background:#e0e7ff; color:#4338ca;">Biomedical / FMS.5</span>
                    <h5 class="fw-bold text-navy mb-2">Biomedical Engineering</h5>
                    <p class="small text-muted mb-3">Medical device master inventory, NABL calibration certificates, preventive maintenance (PPM) schedule, and electrical safety leakage testing.</p>
                    <a href="<?= site_url('checklists') ?>" class="service-link">View Calibration Logs <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 7. Fire & Safety -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-orange">
                        <i class="fas fa-fire-extinguisher"></i>
                    </div>
                    <span class="badge bg-danger-subtle text-danger align-self-start mb-2 fw-semibold" style="font-size:0.75rem;">Life Safety / FMS.1</span>
                    <h5 class="fw-bold text-navy mb-2">Fire &amp; Facility Safety</h5>
                    <p class="small text-muted mb-3">Statutory Fire NOC validity, addressable smoke alarm &amp; fire hydrant pressure audits, monthly mock Code Red drills, and spill management kits.</p>
                    <a href="<?= site_url('checklists') ?>" class="service-link">View Safety Checklists <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- 8. STP & Utilities -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-service">
                    <div class="feature-icon icon-green">
                        <i class="fas fa-faucet-drip"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success align-self-start mb-2 fw-semibold" style="font-size:0.75rem;">Utilities / FMS.7</span>
                    <h5 class="fw-bold text-navy mb-2">MGPS &amp; Hospital Utilities</h5>
                    <p class="small text-muted mb-3">Medical Gas Pipeline (MGPS) liquid oxygen purity logs, 150 KLD Sewage Treatment Plant (STP) effluent testing, dual DG sets, and RO microbiology.</p>
                    <a href="<?= site_url('equipment-grid') ?>" class="service-link">View Utility Protocols <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     LIVE INTERACTIVE QUALITY KPI CALCULATOR
========================================================= -->
<section class="py-5 bg-main">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="badge badge-max badge-max-gold mb-2">Live Indicator Engine</span>
                <h2 class="display-6 fw-bold text-navy mb-3">Hospital Quality Indicator Calculator</h2>
                <p class="text-muted">
                    Calculate key clinical indicators and compare them instantly against national benchmarks mandated by NABH and JCI.
                </p>

                <div class="d-flex flex-column gap-3 mt-4">
                    <div class="p-3 bg-surface-alt rounded-3 border-start border-4 border-primary">
                        <h6 class="fw-bold text-navy mb-1">Standardized Formula Matrix</h6>
                        <p class="small text-muted mb-0">Accurate numerator & denominator formulation for device-associated infection rates.</p>
                    </div>
                    <div class="p-3 bg-surface-alt rounded-3 border-start border-4 border-success">
                        <h6 class="fw-bold text-navy mb-1">Threshold Comparison</h6>
                        <p class="small text-muted mb-0">Instant interpretation against CDC & NHSN safety targets.</p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="<?= site_url('quality-indicators') ?>" class="btn btn-hinton-primary">
                        <i class="fas fa-list-check me-2"></i> View Full 15+ Indicator Matrix
                    </a>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="kpi-calc-box">
                    <ul class="nav nav-pills mb-4 border-bottom pb-3" id="kpiTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-bor">Bed Occupancy</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-cauti">CAUTI Rate</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-clabsi">CLABSI Rate</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-alos">ALOS</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="kpiTabContent">
                        <!-- Bed Occupancy -->
                        <div class="tab-pane fade show active" id="tab-bor">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Total Inpatient Census</label>
                                    <input type="number" id="kpi_census" class="form-control" value="245">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Available Beds</label>
                                    <input type="number" id="kpi_available_beds" class="form-control" value="300">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Days in Month</label>
                                    <input type="number" id="kpi_days" class="form-control" value="1">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-hinton-secondary mb-3" onclick="calculateKPI('bed_occupancy')">Calculate Bed Occupancy</button>

                            <div class="kpi-result-display">
                                <span class="small text-uppercase text-light opacity-75">Calculated Utilization</span>
                                <div class="val" id="bed_occupancy_result_val">81.67%</div>
                                <div class="small" id="bed_occupancy_result_meta">
                                    <span class="text-success fw-bold">Status:</span> Optimal utilization aligned with NABH safety margins.
                                    <br><small class="text-light opacity-75">Benchmark: 75% - 85%</small>
                                </div>
                            </div>
                        </div>

                        <!-- CAUTI -->
                        <div class="tab-pane fade" id="tab-cauti">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">CAUTI Infections</label>
                                    <input type="number" id="kpi_cauti_count" class="form-control" value="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Urinary Catheter Days</label>
                                    <input type="number" id="kpi_uc_days" class="form-control" value="1250">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-hinton-secondary mb-3" onclick="calculateKPI('cauti_rate')">Calculate CAUTI Rate</button>

                            <div class="kpi-result-display">
                                <span class="small text-uppercase text-light opacity-75">Catheter Associated UTI Rate</span>
                                <div class="val" id="cauti_rate_result_val">0.80 per 1,000 device days</div>
                                <div class="small" id="cauti_rate_result_meta">
                                    <span class="text-success fw-bold">Status:</span> Within international benchmark (&le; 1.5).
                                </div>
                            </div>
                        </div>

                        <!-- CLABSI -->
                        <div class="tab-pane fade" id="tab-clabsi">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">CLABSI Infections Count</label>
                                    <input type="number" id="kpi_clabsi_count" class="form-control" value="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Total Central Line Days</label>
                                    <input type="number" id="kpi_cl_days" class="form-control" value="1800">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-hinton-secondary mb-3" onclick="calculateKPI('clabsi_rate')">Calculate CLABSI Rate</button>

                            <div class="kpi-result-display">
                                <span class="small text-uppercase text-light opacity-75">Central Line Infection Rate</span>
                                <div class="val" id="clabsi_rate_result_val">0.56 per 1,000 line days</div>
                                <div class="small" id="clabsi_rate_result_meta">
                                    <span class="text-success fw-bold">Status:</span> High compliance with central line insertion protocol.
                                </div>
                            </div>
                        </div>

                        <!-- ALOS -->
                        <div class="tab-pane fade" id="tab-alos">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Total Inpatient Days</label>
                                    <input type="number" id="kpi_discharge_days" class="form-control" value="1420">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Total Discharges</label>
                                    <input type="number" id="kpi_discharges" class="form-control" value="380">
                                </div>
                            </div>
                            <button class="btn btn-sm btn-hinton-secondary mb-3" onclick="calculateKPI('alos')">Calculate ALOS</button>

                            <div class="kpi-result-display">
                                <span class="small text-uppercase text-light opacity-75">Average Length of Stay</span>
                                <div class="val" id="alos_result_val">3.74 Days</div>
                                <div class="small" id="alos_result_meta">
                                    <span class="text-success fw-bold">Status:</span> Optimal clinical throughput.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON DOCTORS / QUALITY LEADERS TEAM SECTION
========================================================= -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-navy mb-2">Accreditation Leadership</span>
            <h2 class="display-6 fw-bold text-navy">Certified Quality Experts & Assessors</h2>
            <p class="text-muted">Meet the healthcare quality directors and NABH lead assessors guiding clinical standards.</p>
        </div>

        <div class="row g-4">
            <!-- Doctor 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-doctor">
                    <div class="doctor-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80" alt="Dr. Rajeshwar Sharma">
                        <div class="doctor-department-badge">Medical Administration</div>
                    </div>
                    <div class="doctor-content">
                        <h5 class="h6 fw-bold text-navy mb-1">Dr. Rajeshwar Sharma</h5>
                        <span class="small text-muted d-block mb-2">Medical Director & Quality Chair</span>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small text-success fw-semibold"><i class="fas fa-award me-1"></i> NABH Assessor</span>
                            <span class="badge bg-light text-dark">20+ Yrs</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-doctor">
                    <div class="doctor-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1594824813501-489e246949f7?auto=format&fit=crop&w=600&q=80" alt="Dr. Ananya Sen">
                        <div class="doctor-department-badge">Quality Assurance</div>
                    </div>
                    <div class="doctor-content">
                        <h5 class="h6 fw-bold text-navy mb-1">Dr. Ananya Sen</h5>
                        <span class="small text-muted d-block mb-2">NABH & Quality Coordinator</span>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small text-success fw-semibold"><i class="fas fa-check-double me-1"></i> Lead Assessor</span>
                            <span class="badge bg-light text-dark">14+ Yrs</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-doctor">
                    <div class="doctor-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80" alt="Dr. Vikram Malhotra">
                        <div class="doctor-department-badge">Critical Care / ICU</div>
                    </div>
                    <div class="doctor-content">
                        <h5 class="h6 fw-bold text-navy mb-1">Dr. Vikram Malhotra</h5>
                        <span class="small text-muted d-block mb-2">Senior Consultant & ICU Incharge</span>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small text-success fw-semibold"><i class="fas fa-shield-halved me-1"></i> BLS/ACLS Lead</span>
                            <span class="badge bg-light text-dark">15+ Yrs</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hinton-doctor">
                    <div class="doctor-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=600&q=80" alt="Sister Mary Joseph">
                        <div class="doctor-department-badge">Infection Control</div>
                    </div>
                    <div class="doctor-content">
                        <h5 class="h6 fw-bold text-navy mb-1">Sister Mary Joseph</h5>
                        <span class="small text-muted d-block mb-2">Lead Infection Control Nurse (ICN)</span>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="small text-success fw-semibold"><i class="fas fa-virus-slash me-1"></i> CIC Certified</span>
                            <span class="badge bg-light text-dark">11+ Yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON TESTIMONIALS & HOSPITAL REVIEWS
========================================================= -->
<section class="py-5 bg-main border-top border-bottom">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-gold mb-2">Accreditation Success</span>
            <h2 class="display-6 fw-bold text-navy">Trusted By Medical Directors & Quality Heads</h2>
            <p class="text-muted">Real feedback from healthcare leadership who streamlined their NABH 5th edition journey.</p>
        </div>

        <div class="row g-4">
            <!-- Review 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-testimonial">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-muted small mb-4 flex-grow-1">
                        &ldquo;Digitizing our 120+ clinical SOPs and doctor credentialing matrices with Hinton Quality allowed our hospital to clear the NABH 5th Edition on-site audit with zero major non-conformities.&rdquo;
                    </p>
                    <div class="d-flex align-items-center gap-3 pt-3 border-top">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" alt="Dr. Meenakshi Sundaram" class="testimonial-author-img">
                        <div>
                            <h6 class="fw-bold text-navy mb-0">Dr. Meenakshi Sundaram</h6>
                            <span class="small text-muted">Medical Superintendent, Apollo Cradle</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-testimonial">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-muted small mb-4 flex-grow-1">
                        &ldquo;The real-time equipment calibration alerts and STP water quality logs saved us from regulatory penalties. Assessors were thoroughly impressed by our one-click audit evidence export.&rdquo;
                    </p>
                    <div class="d-flex align-items-center gap-3 pt-3 border-top">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=120&q=80" alt="Er. Sunil Mehta" class="testimonial-author-img">
                        <div>
                            <h6 class="fw-bold text-navy mb-0">Er. Sunil Mehta</h6>
                            <span class="small text-muted">Head of Biomedical & Facilities, Fortis</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-testimonial">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-muted small mb-4 flex-grow-1">
                        &ldquo;The automated KPI engine for CAUTI, CLABSI, and Bed Occupancy simplified our monthly HICC reporting. Our clinical staff now proactively monitors compliance trends.&rdquo;
                    </p>
                    <div class="d-flex align-items-center gap-3 pt-3 border-top">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=120&q=80" alt="Dr. Priya Kulkarni" class="testimonial-author-img">
                        <div>
                            <h6 class="fw-bold text-navy mb-0">Dr. Priya Kulkarni</h6>
                            <span class="small text-muted">NABH Quality Coordinator, Manipal Health</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON EMERGENCY PRE-ASSESSMENT CALLOUT BANNER
========================================================= -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="hinton-emergency-banner">
            <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
                <div class="col-lg-8">
                    <span class="badge bg-white text-navy px-3 py-1 fw-bold rounded-pill mb-3">Accreditation Pre-Assessment</span>
                    <h3 class="display-6 fw-bold text-white mb-2">Preparing for NABH On-Site Assessment?</h3>
                    <p class="lead text-light mb-0" style="font-size: 1.05rem; opacity: 0.9;">
                        Request a mock audit with our NABH certified lead assessors. Identify gaps and non-conformities before statutory inspection.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= site_url('contact') ?>" class="btn btn-hinton-secondary btn-lg">
                        <i class="fas fa-calendar-check me-2"></i> Book Mock Audit Today
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HINTON BLOG / QUALITY ARTICLES SECTION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
            <div>
                <span class="badge badge-max badge-max-blue mb-2">Knowledge Base</span>
                <h2 class="display-6 fw-bold text-navy mb-1">Latest Clinical Standards & Guidelines</h2>
                <p class="text-muted mb-0">Actionable best practices published by certified hospital accreditation assessors.</p>
            </div>
            <a href="<?= site_url('standards') ?>" class="btn btn-outline-navy btn-sm mt-3 mt-md-0">
                Explore All Articles <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            <!-- Blog 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-blog">
                    <div class="blog-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=700&q=80" alt="High Risk Medications">
                        <span class="blog-date-badge"><i class="fas fa-calendar me-1"></i> 28 Sept, 2026</span>
                    </div>
                    <div class="blog-content">
                        <span class="badge badge-max badge-max-rose align-self-start mb-2">Medication Safety</span>
                        <h5 class="fw-bold text-navy mb-2">Mastering High-Alert & LASA Medication Storage in Hospital Pharmacies</h5>
                        <p class="small text-muted mb-3 flex-grow-1">How tall-man lettering, independent double checks, and biometric drug dispensers prevent fatal medication administration errors.</p>
                        <a href="<?= site_url('standards') ?>" class="small fw-bold text-primary text-decoration-none mt-auto">Read Full Protocol &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Blog 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-blog">
                    <div class="blog-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=700&q=80" alt="OT Sterility Protocols">
                        <span class="blog-date-badge"><i class="fas fa-calendar me-1"></i> 24 Sept, 2026</span>
                    </div>
                    <div class="blog-content">
                        <span class="badge badge-max badge-max-blue align-self-start mb-2">Surgical Governance</span>
                        <h5 class="fw-bold text-navy mb-2">Operation Theatre Sterility & AHU Pressure Differential Standards</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Understanding positive pressure airflow, HEPA filter 0.3 micron particle counts, and CSSD autoclave validation under NABH 5th ed.</p>
                        <a href="<?= site_url('standards') ?>" class="small fw-bold text-primary text-decoration-none mt-auto">Read Full Protocol &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Blog 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-hinton-blog">
                    <div class="blog-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&w=700&q=80" alt="Biomedical Calibrations">
                        <span class="blog-date-badge"><i class="fas fa-calendar me-1"></i> 19 Sept, 2026</span>
                    </div>
                    <div class="blog-content">
                        <span class="badge badge-max badge-max-gold align-self-start mb-2">Asset Maintenance</span>
                        <h5 class="fw-bold text-navy mb-2">NABL Traceable Calibrations for Critical Ventilators & Defibrillators</h5>
                        <p class="small text-muted mb-3 flex-grow-1">A step-by-step checklist to organize calibration certificates, electrical safety testing, and preventive maintenance logs.</p>
                        <a href="<?= site_url('standards') ?>" class="small fw-bold text-primary text-decoration-none mt-auto">Read Full Protocol &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
