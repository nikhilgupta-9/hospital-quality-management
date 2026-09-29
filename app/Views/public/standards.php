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
                <h1 class="page-banner-title">NABH Standards Directory</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Standards Directory</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     STANDARDS DIRECTORY & SEARCH SECTION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">

        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-navy mb-2"><i class="fas fa-shield-halved text-primary me-1"></i> Accreditation Framework</span>
            <h2 class="display-6 fw-bold text-navy mb-2">NABH 5th Edition Standards Repository</h2>
            <p class="text-muted">Explore all 10 clinical and organizational chapters, measurable objective elements, and departmental SOP guidelines.</p>
        </div>

        <!-- Search & Filter Card (Using Common Card-Max) -->
        <div class="card card-max p-4 mb-5">
            <div class="row g-3 align-items-center">
                <!-- Search Input -->
                <div class="col-lg-5 col-md-12">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-magnifying-glass text-primary me-1"></i> Search Standards &amp; SOPs</label>
                    <input type="text" id="standardSearchInput" class="form-control" placeholder="Search standard, SOP, element (e.g. AAC.1, ICU, Medication, Fire)..." onkeyup="searchStandardsQuery(this.value)">
                </div>

                <!-- Chapter Selector Dropdown -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-book-medical text-primary me-1"></i> Filter by NABH Chapter</label>
                    <select id="chapterSelectFilter" class="form-select" onchange="filterByDropdown(this.value)">
                        <option value="all">All 10 Chapters (Complete Scope)</option>
                        <option value="aac">AAC — Access, Assessment &amp; Continuity of Care</option>
                        <option value="cop">COP — Care of Patients &amp; Intensive Care</option>
                        <option value="mom">MOM — Management of Medication</option>
                        <option value="pre">PRE — Patient Rights &amp; Education</option>
                        <option value="hic">HIC — Hospital Infection Control</option>
                        <option value="cqi">CQI — Continuous Quality Improvement</option>
                        <option value="rom">ROM — Responsibilities of Management</option>
                        <option value="fms">FMS — Facility Management &amp; Safety</option>
                        <option value="hrm">HRM — Human Resource Management</option>
                        <option value="ims">IMS — Information Management System</option>
                    </select>
                </div>

                <!-- Standard Domain Selector -->
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-filter text-primary me-1"></i> Standard Domain</label>
                    <select id="domainSelectFilter" class="form-select" onchange="filterByDomain(this.value)">
                        <option value="all">All Domains (10 Chapters)</option>
                        <option value="patient">Patient-Centered Chapters (5)</option>
                        <option value="org">Organization-Centered Chapters (5)</option>
                    </select>
                </div>
            </div>

            <!-- Quick Chapter Buttons -->
            <div class="pt-3 border-top mt-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="small fw-bold text-navy me-1"><i class="fas fa-tags text-primary me-1"></i> Quick Filter:</span>
                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 py-1 fw-semibold chapter-quick-btn active" onclick="filterStandards('all', this)">
                        All (10)
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('aac', this)">
                        AAC
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('cop', this)">
                        COP
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('mom', this)">
                        MOM
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('pre', this)">
                        PRE
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('hic', this)">
                        HIC
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('cqi', this)">
                        CQI
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('rom', this)">
                        ROM
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('fms', this)">
                        FMS
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('hrm', this)">
                        HRM
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold chapter-quick-btn" onclick="filterStandards('ims', this)">
                        IMS
                    </button>
                </div>
            </div>
        </div>

        <!-- Results Counter Strip -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="small fw-semibold text-muted" id="resultsCount">Showing all 10 core chapters &amp; objective elements</span>
            </div>
            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-hinton-primary">
                <i class="fas fa-calculator me-1"></i> Start Self-Assessment
            </a>
        </div>

        <!-- Standards Grid (All 10 Chapters Matching Checklists Style) -->
        <div class="row g-4" id="standardsGrid">

            <!-- 1. AAC.1 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="aac" data-group="patient">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-door-open me-1"></i> Chapter AAC.1</span>
                        <span class="badge badge-max badge-max-emerald">Patient Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Patient Registration, Admission &amp; Emergency Triage</h5>
                    <p class="small text-muted mb-3">The organization defines and displays the complete scope of clinical services, and implements a standardized 3-tier emergency triage system and transfer protocol.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Defined clinical scope displayed prominently at reception and digital patient portals.</li>
                            <li class="mb-1">Standardized Emergency Department Triage scoring (Priority 1 Red, Priority 2 Yellow, Priority 3 Green).</li>
                            <li>Documented clinical handover during internal transfers and inter-hospital transport.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-primary me-1"></i> SOP: MAX-SOP-AAC-001</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: Door-to-Triage &lt; 5 mins</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View SOP</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. COP.3 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="cop" data-group="patient">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-bed-pulse me-1"></i> Chapter COP.3</span>
                        <span class="badge badge-max badge-max-emerald">Patient Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Care of High-Risk Patients &amp; Intensive Care Protocols</h5>
                    <p class="small text-muted mb-3">Care of vulnerable patients, intensive care unit admission/discharge scoring, and hospital-wide emergency resuscitation are guided by evidence-based clinical protocols.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-danger me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">100% ICU clinical staff certified in Basic Life Support (BLS) and ACLS.</li>
                            <li class="mb-1">Dedicated Code Blue team with documented response time under 3 minutes.</li>
                            <li>Standardized sedation assessment and post-anaesthesia Aldrete recovery scoring.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-danger me-1"></i> SOP: MAX-SOP-COP-004</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: Return to ICU &lt; 48 Hours</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View SOP</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. MOM.2 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="mom" data-group="patient">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-pills me-1"></i> Chapter MOM.2</span>
                        <span class="badge badge-max badge-max-emerald">Patient Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">High-Risk &amp; LASA Medication Safety Protocols</h5>
                    <p class="small text-muted mb-3">Documented policies guide the identification, segregated storage, independent double-verification, and controlled dispensing of Look-Alike Sound-Alike (LASA) and high-alert medications.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-success me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Tall-Man lettering and color-coded neon labeling for all LASA formulations.</li>
                            <li class="mb-1">Dual nursing verification before administering concentrated electrolytes (KCl, 3% NaCl).</li>
                            <li>Narcotic and psychotropic drug inventory under strict double-lock register protocol.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-success me-1"></i> Policy: MAX-POL-MOM-002</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: Zero Dispensing Error Rate</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. PRE.1 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="pre" data-group="patient">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-user-shield me-1"></i> Chapter PRE.1</span>
                        <span class="badge badge-max badge-max-emerald">Patient Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Patient Rights, Informed Consent &amp; Grievance Redressal</h5>
                    <p class="small text-muted mb-3">The organization protects patient and family rights, provides transparent bilingual informed consent, respects patient privacy during examinations, and resolves complaints within 48 hours.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-warning me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Informed consent documented in a language understood by the patient prior to procedures.</li>
                            <li class="mb-1">Patient Charter &amp; Bill of Rights displayed in all OPD, IPD, and billing areas.</li>
                            <li>Documented grievance mechanism with time-bound Root Cause Analysis and resolution.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-warning me-1"></i> Policy: MAX-POL-PRE-001</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: Patient Satisfaction &gt; 95%</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. HIC.1 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="hic" data-group="patient">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-navy" style="background:#f3e8ff; color:#7e22ce;"><i class="fas fa-shield-virus me-1"></i> Chapter HIC.1</span>
                        <span class="badge badge-max badge-max-emerald">Patient Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Hospital Infection Control Program &amp; HAI Surveillance</h5>
                    <p class="small text-muted mb-3">A comprehensive infection prevention program with an active Infection Control Committee (HICC), designated ICN nurses, negative-pressure isolation, and statutory BMW management.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-purple me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Monthly surveillance of device-associated infections (CAUTI, CLABSI, VAP, SSI).</li>
                            <li class="mb-1">WHO 5 Moments Hand Hygiene compliance audited across all clinical touchpoints.</li>
                            <li>Bio-Medical Waste (BMW) 4-color coded segregation per statutory pollution control rules.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-purple me-1"></i> Manual: MAX-MAN-HIC-001</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: Zero Device Infections</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('quality-indicators') ?>" class="btn btn-sm btn-outline-navy">KPI Tracker</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View Manual</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. CQI.1 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="cqi" data-group="org">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-chart-line me-1"></i> Chapter CQI.1</span>
                        <span class="badge badge-max badge-max-navy">Organization Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Continuous Quality Improvement &amp; Clinical Indicators</h5>
                    <p class="small text-muted mb-3">The organization establishes a structured Quality Improvement Committee (QIC), tracks mandated clinical and managerial indicators monthly, and conducts RCA on near misses.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Regular tracking of NABH mandated clinical indicators (ALOS, Bed Occupancy, Return to OT).</li>
                            <li class="mb-1">Structured Incident Reporting System with Root Cause Analysis (Fishbone / 5-Why).</li>
                            <li>Plan-Do-Check-Act (PDCA) quality improvement projects documented annually.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-info me-1"></i> Policy: MAX-POL-CQI-001</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: 100% Incident RCA Closure</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('quality-indicators') ?>" class="btn btn-sm btn-outline-navy">KPI Calculator</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. ROM.1 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="rom" data-group="org">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-navy"><i class="fas fa-landmark me-1"></i> Chapter ROM.1</span>
                        <span class="badge badge-max badge-max-navy">Organization Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Responsibilities of Management &amp; Statutory Compliance</h5>
                    <p class="small text-muted mb-3">The leadership defines the organization's mission, values, organogram, and governance structure while ensuring full adherence to statutory healthcare laws and licensing.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-dark me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Up-to-date statutory license repository (Clinical Establishments Act, AERB, PC PNDT, Pharmacy).</li>
                            <li class="mb-1">Defined organizational hierarchy with documented job descriptions and delegated powers.</li>
                            <li>Annual strategic quality plan reviewed and approved by the Hospital Governing Board.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-dark me-1"></i> Policy: MAX-POL-ROM-001</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: 100% License Validity</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. FMS.4 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="fms" data-group="org">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-fire-extinguisher me-1"></i> Chapter FMS.4</span>
                        <span class="badge badge-max badge-max-navy">Organization Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Facility Management, Fire Safety &amp; Disaster Preparedness</h5>
                    <p class="small text-muted mb-3">The organization ensures patient safety through statutory Fire NOC certification, addressable smoke alarm networks, emergency power backups, and documented disaster evacuation plans.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-danger me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Addressable fire detection, automatic sprinkler, and fire hydrant flow audited monthly.</li>
                            <li class="mb-1">Biannual mock Fire Code Red drills conducted with documented staff evacuation debriefing.</li>
                            <li>Hazardous material (Hazmat) spill kits and Safety Data Sheets (SDS) deployed at all workstations.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-danger me-1"></i> SOP: MAX-SOP-FMS-007</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: Biannual Drill Compliance</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('checklists') ?>" class="btn btn-sm btn-outline-navy"><i class="fas fa-list-check me-1"></i> Fire Checklist</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View SOP</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9. HRM.3 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="hrm" data-group="org">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-user-doctor me-1"></i> Chapter HRM.3</span>
                        <span class="badge badge-max badge-max-navy">Organization Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Doctor &amp; Staff Credentialing, Privileging &amp; Training</h5>
                    <p class="small text-muted mb-3">A standardized process governs primary source verification of medical degrees, state council registrations, procedural privileging scopes, and mandatory annual training hours.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Primary source verification (PSV) of MBBS/MD/MS degrees and State Medical Council validity.</li>
                            <li class="mb-1">Defined clinical privileging matrix approving core, specialized, and high-risk surgical scopes.</li>
                            <li>Mandatory 20+ annual training hours per staff member (BLS, Infection Control, Fire, POC).</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-primary me-1"></i> SOP: MAX-SOP-HRM-003</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: 100% Verified Credentials</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View SOP</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 10. IMS.2 -->
            <div class="col-lg-6 standard-chapter-card" data-chapter="ims" data-group="org">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-navy"><i class="fas fa-database me-1"></i> Chapter IMS.2</span>
                        <span class="badge badge-max badge-max-navy">Organization Centered</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Hospital Information Management System (IMS &amp; EMR)</h5>
                    <p class="small text-muted mb-3">The organization ensures clinical data confidentiality, role-based Electronic Medical Record (EMR) access control, tamper-evident audit logging, and automated off-site disaster backups.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-indigo me-1"></i> Mandatory Objective Elements:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Role-Based Access Control (RBAC) ensuring patient record confidentiality and non-repudiation.</li>
                            <li class="mb-1">Statutory medical records retention schedule and secure digitized archive retrieval.</li>
                            <li>Daily automated off-site data backup with documented disaster recovery restoration drills.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-file-lines text-indigo me-1"></i> Policy: MAX-POL-IMS-001</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-chart-simple text-success me-1"></i> KPI: 99.9% EMR System Uptime</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-sm btn-outline-navy">Self-Assess</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> View Policy</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- No Results Fallback -->
        <div id="noResultsAlert" class="text-center py-5 d-none">
            <div class="card card-max p-4 max-w-500 mx-auto text-center">
                <i class="fas fa-magnifying-glass fs-1 text-muted mb-3"></i>
                <h5 class="fw-bold text-navy mb-2">No Matching Standards Found</h5>
                <p class="text-muted small mb-3">We couldn't find any standard matching your query. Try searching for "ICU", "Fire", "Medication", "Triage" or "Infection".</p>
                <button class="btn btn-sm btn-hinton-primary rounded-pill px-4" onclick="resetStandardsFilter()">Reset All Filters</button>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     NABH ACCREDITATION IMPLEMENTATION PATHWAY (3-STEP ROADMAP)
========================================================= -->
<section class="py-5 bg-white border-top border-bottom">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-emerald mb-2">Accreditation Pathway</span>
            <h2 class="display-6 fw-bold text-navy">How Hospitals Achieve 100% NABH Compliance</h2>
            <p class="text-muted">A systematic 3-phase roadmap designed by certified lead assessors to navigate from gap analysis to official certificate award.</p>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-md-4">
                <div class="card card-max text-center p-4 h-100">
                    <div class="feature-icon icon-blue mx-auto mb-3">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <span class="badge badge-max badge-max-blue mb-2">Phase 01</span>
                    <h5 class="fw-bold text-navy mb-2">Baseline Gap Analysis</h5>
                    <p class="small text-muted mb-0">Evaluate all 651 objective elements against current hospital operational realities using our automated readiness diagnostic engine.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-4">
                <div class="card card-max text-center p-4 h-100">
                    <div class="feature-icon icon-teal mx-auto mb-3">
                        <i class="fas fa-file-shield"></i>
                    </div>
                    <span class="badge badge-max badge-max-emerald mb-2">Phase 02</span>
                    <h5 class="fw-bold text-navy mb-2">SOP &amp; Policy Deployment</h5>
                    <p class="small text-muted mb-0">Adopt standardized hospital SOPs, configure doctor privileging matrix, calibrate biomedical equipment, and train nursing teams.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-md-4">
                <div class="card card-max text-center p-4 h-100">
                    <div class="feature-icon icon-gold mx-auto mb-3">
                        <i class="fas fa-award"></i>
                    </div>
                    <span class="badge badge-max badge-max-gold mb-2">Phase 03</span>
                    <h5 class="fw-bold text-navy mb-2">Mock Audit &amp; NABH Award</h5>
                    <p class="small text-muted mb-0">Conduct on-site departmental mock audits, close non-conformities (CAPA), export digital assessment binders, and achieve certified pass.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     NABH 5TH EDITION FAQ ACCORDION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-navy mb-2">Frequently Asked Questions</span>
            <h2 class="display-6 fw-bold text-navy">Standards &amp; Accreditation FAQs</h2>
            <p class="text-muted">Answers to common queries regarding NABH 5th Edition standards, scoring mechanisms, and audit prep.</p>
        </div>

        <div class="max-w-800 mx-auto">
            <div class="accordion accordion-hinton" id="standardsFaqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                            <i class="fas fa-circle-question text-primary me-2"></i> What is the difference between Patient-Centered and Organization-Centered chapters?
                        </button>
                    </h2>
                    <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#standardsFaqAccordion">
                        <div class="accordion-body">
                            NABH 5th Edition divides standards into two groups: <strong>Patient-Centered Standards (Chapters 1 to 5: AAC, COP, MOM, PRE, HIC)</strong> focus directly on patient admission, clinical safety, medication dispensing, patient rights, and infection control. <strong>Organization-Centered Standards (Chapters 6 to 10: CQI, ROM, FMS, HRM, IMS)</strong> focus on quality governance, facility safety, staff credentialing, and EMR data security.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                            <i class="fas fa-circle-question text-primary me-2"></i> How are Objective Elements scored during on-site assessor evaluations?
                        </button>
                    </h2>
                    <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#standardsFaqAccordion">
                        <div class="accordion-body">
                            Each objective element is evaluated on a 3-tier scoring scale: <strong>10 (Fully Compliant)</strong> when policies, evidence records, and staff interviews show 100% implementation; <strong>5 (Partially Compliant)</strong> when documentation exists but operational execution has minor gaps; and <strong>0 (Non-Compliant)</strong> when evidence is absent. Hospitals must achieve overall &gt; 80% with no core zero scores.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                            <i class="fas fa-circle-question text-primary me-2"></i> What mandatory clinical indicators must every hospital track under Chapter CQI?
                        </button>
                    </h2>
                    <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#standardsFaqAccordion">
                        <div class="accordion-body">
                            Mandatory indicators include device-associated infection rates (CAUTI, CLABSI, VAP, SSI), Return to ICU within 48 hours, Return to OT, Medication error rates, Average Length of Stay (ALOS), Bed Occupancy rate, Patient Fall incidence, and Hospital-acquired Pressure Ulcer (HAPU) rates.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                            <i class="fas fa-circle-question text-primary me-2"></i> How long is the NABH Accreditation valid, and what is the renewal cycle?
                        </button>
                    </h2>
                    <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#standardsFaqAccordion">
                        <div class="accordion-body">
                            Full NABH Accreditation is valid for a cycle of <strong>3 years</strong>, with a mandatory mid-term surveillance audit conducted at the 18-month mark. Renewal assessments must be initiated 6 months prior to certificate expiration.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     CTA BAR (HINTON COMPATIBLE)
========================================================= -->
<section class="py-5" style="background: linear-gradient(135deg, #07193b 0%, #0a2558 100%);">
    <div class="container text-center py-4">
        <span class="badge badge-max badge-max-emerald mb-3">Audit Readiness</span>
        <h2 class="display-6 fw-bold text-white mb-3">Ready to Assess Your Hospital's Quality Standards?</h2>
        <p class="text-white opacity-75 max-w-700 mx-auto mb-4">
            Take our free 12-checkpoint online readiness assessment or schedule a comprehensive on-site mock audit with our certified lead assessors.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= site_url('assessment-tool') ?>" class="btn btn-hinton-secondary btn-lg">
                <i class="fas fa-calculator me-2"></i> Take Free Readiness Quiz
            </a>
            <a href="<?= site_url('contact') ?>" class="btn btn-hinton-outline btn-lg">
                <i class="fas fa-calendar-check me-2"></i> Book Mock Audit Consultation
            </a>
        </div>
    </div>
</section>

<!-- =========================================================
     JAVASCRIPT: INSTANT CHAPTER FILTER & KEYWORD SEARCH
========================================================= -->
<script>
let currentGroup = 'all';
let currentChapter = 'all';
let currentQuery = '';

function filterByDomain(domain) {
    currentGroup = domain;
    applyFilters();
}

function filterStandards(chapter, element) {
    currentChapter = chapter;
    
    // Update quick buttons active state
    const quickButtons = document.querySelectorAll('.chapter-quick-btn');
    quickButtons.forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light');
    });
    if (element) {
        element.classList.remove('btn-light');
        element.classList.add('btn-primary', 'active');
    }
    
    // Sync dropdown
    const select = document.getElementById('chapterSelectFilter');
    if (select) {
        select.value = chapter;
    }
    
    applyFilters();
}

function filterByDropdown(chapter) {
    currentChapter = chapter;
    
    // Sync quick buttons
    const quickButtons = document.querySelectorAll('.chapter-quick-btn');
    quickButtons.forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light');
        if (btn.getAttribute('onclick') && btn.getAttribute('onclick').includes(`'${chapter}'`)) {
            btn.classList.remove('btn-light');
            btn.classList.add('btn-primary', 'active');
        }
    });
    
    applyFilters();
}

function searchStandardsQuery(query) {
    currentQuery = query.trim().toLowerCase();
    applyFilters();
}

function applyFilters() {
    const cards = document.querySelectorAll('.standard-chapter-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const cardChapter = card.getAttribute('data-chapter');
        const cardGroup = card.getAttribute('data-group');
        const text = card.innerText.toLowerCase();

        const matchesGroup = (currentGroup === 'all' || cardGroup === currentGroup);
        const matchesChapter = (currentChapter === 'all' || cardChapter === currentChapter);
        const matchesQuery = (currentQuery === '' || text.includes(currentQuery));

        if (matchesGroup && matchesChapter && matchesQuery) {
            card.classList.remove('d-none');
            visibleCount++;
        } else {
            card.classList.add('d-none');
        }
    });

    updateResultsCounter(visibleCount);
}

function updateResultsCounter(count) {
    const countEl = document.getElementById('resultsCount');
    const alertEl = document.getElementById('noResultsAlert');
    const gridEl = document.getElementById('standardsGrid');

    if (count === 0) {
        alertEl.classList.remove('d-none');
        gridEl.classList.add('d-none');
        countEl.innerText = 'No matching standards found';
    } else {
        alertEl.classList.add('d-none');
        gridEl.classList.remove('d-none');
        let label = 'all standards';
        if (currentQuery) {
            label = `query "${currentQuery}"`;
        } else if (currentChapter !== 'all') {
            label = `Chapter ${currentChapter.toUpperCase()}`;
        } else if (currentGroup !== 'all') {
            label = currentGroup === 'patient' ? 'Patient-Centered Standards' : 'Organization-Centered Standards';
        }
        countEl.innerText = `Showing ${count} matching standard${count > 1 ? 's' : ''} (${label})`;
    }
}

function resetStandardsFilter() {
    document.getElementById('standardSearchInput').value = '';
    const chapterSelect = document.getElementById('chapterSelectFilter');
    if (chapterSelect) chapterSelect.value = 'all';
    
    const domainSelect = document.getElementById('domainSelectFilter');
    if (domainSelect) domainSelect.value = 'all';

    currentQuery = '';
    currentGroup = 'all';
    currentChapter = 'all';

    const firstBtn = document.querySelector('.chapter-quick-btn');
    if (firstBtn) filterStandards('all', firstBtn);
}

// Check URL query on page load
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const q = urlParams.get('q');
    const chapter = urlParams.get('chapter');
    
    if (q) {
        document.getElementById('standardSearchInput').value = q;
        currentQuery = q.toLowerCase();
    }
    
    if (chapter) {
        currentChapter = chapter.toLowerCase();
        const select = document.getElementById('chapterSelectFilter');
        if (select) select.value = currentChapter;
        
        const matchingBtn = document.querySelector(`.chapter-quick-btn[onclick*="'${currentChapter}'"]`);
        if (matchingBtn) {
            const quickButtons = document.querySelectorAll('.chapter-quick-btn');
            quickButtons.forEach(btn => {
                btn.classList.remove('btn-primary', 'active');
                btn.classList.add('btn-light');
            });
            matchingBtn.classList.remove('btn-light');
            matchingBtn.classList.add('btn-primary', 'active');
        }
    }
    
    applyFilters();
});
</script>
