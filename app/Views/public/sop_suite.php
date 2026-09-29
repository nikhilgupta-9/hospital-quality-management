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
                <h1 class="page-banner-title">Document &amp; SOP Suite</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Document &amp; SOP Suite</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     DOCUMENT & SOP DIRECTORY SECTION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">

        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-blue mb-2"><i class="fas fa-file-signature text-primary me-1"></i> Quality Governance</span>
            <h2 class="display-6 fw-bold text-navy mb-2">Hospital Policy &amp; Clinical SOP Repository</h2>
            <p class="text-muted">Centralized repository of NABH 5th Edition compliant Standard Operating Procedures, clinical pathways, hospital policies, and operational work instructions.</p>
        </div>

        <!-- Metrics & Feature Highlights Strip -->
        <div class="row g-3 mb-5">
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-primary fs-3 mb-1"><i class="fas fa-folder-open"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">150+</h3>
                    <span class="small text-muted">Standardized SOPs</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-success fs-3 mb-1"><i class="fas fa-certificate"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">100%</h3>
                    <span class="small text-muted">NABH 5th Ed Aligned</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-warning fs-3 mb-1"><i class="fas fa-code-branch"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">v2.1</h3>
                    <span class="small text-muted">Controlled Versions</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-info fs-3 mb-1"><i class="fas fa-bell"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">30/15/7d</h3>
                    <span class="small text-muted">Review Expiry Alerts</span>
                </div>
            </div>
        </div>

        <!-- Search & Filter Card (Using Common Card-Max) -->
        <div class="card card-max p-4 mb-5">
            <div class="row g-3 align-items-center">
                <!-- Search Input -->
                <div class="col-lg-5 col-md-12">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-magnifying-glass text-primary me-1"></i> Search Documents &amp; SOPs</label>
                    <input type="text" id="sopSearchInput" class="form-control" placeholder="Search by SOP code, title, topic (e.g. Code Blue, LASA, BMW, OT, Fire)..." onkeyup="searchSopQuery(this.value)">
                </div>

                <!-- Department Selector Dropdown -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-hospital text-primary me-1"></i> Department / Domain</label>
                    <select id="departmentSelectFilter" class="form-select" onchange="filterByDepartment(this.value)">
                        <option value="all">All Hospital Departments</option>
                        <option value="critical-care">ICU &amp; Critical Care</option>
                        <option value="pharmacy">Pharmacy &amp; Medication (MOM)</option>
                        <option value="infection-control">Infection Control (HIC)</option>
                        <option value="emergency">Emergency &amp; Triage (AAC)</option>
                        <option value="ot-surgery">OT &amp; Surgical Services</option>
                        <option value="biomedical">Biomedical &amp; Safety (FMS)</option>
                        <option value="hr-training">HR &amp; Staff Credentialing (HRM)</option>
                        <option value="quality-cqi">Quality &amp; Incident Management (CQI)</option>
                        <option value="diagnostics">Laboratory &amp; Diagnostics</option>
                        <option value="mrd">Medical Records &amp; IT (IMS)</option>
                    </select>
                </div>

                <!-- Document Type Selector -->
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-filter text-primary me-1"></i> Document Type</label>
                    <select id="typeSelectFilter" class="form-select" onchange="filterByType(this.value)">
                        <option value="all">All Document Types</option>
                        <option value="sop">Clinical SOP</option>
                        <option value="policy">Hospital Policy</option>
                        <option value="protocol">Safety Protocol</option>
                        <option value="instruction">Work Instruction</option>
                    </select>
                </div>
            </div>

            <!-- Quick Department Filter Buttons -->
            <div class="pt-3 border-top mt-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="small fw-bold text-navy me-1"><i class="fas fa-tags text-primary me-1"></i> Quick Filters:</span>
                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 py-1 fw-semibold sop-quick-btn active" onclick="filterSopCategory('all', this)">
                        All SOPs (12)
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('critical-care', this)">
                        Critical Care
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('pharmacy', this)">
                        Pharmacy / MOM
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('infection-control', this)">
                        Infection Control
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('emergency', this)">
                        Emergency Triage
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('ot-surgery', this)">
                        OT &amp; Surgery
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('biomedical', this)">
                        Safety / FMS
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold sop-quick-btn" onclick="filterSopCategory('quality-cqi', this)">
                        Quality &amp; CQI
                    </button>
                </div>
            </div>
        </div>

        <!-- Results Counter & Action Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="small fw-semibold text-muted" id="resultsCount">Showing all 12 core clinical &amp; operational SOPs</span>
            </div>
            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">
                <i class="fas fa-arrow-up-from-bracket me-1"></i> Upload New Document
            </a>
        </div>

        <!-- SOP Cards Grid (Using Common card-max) -->
        <div class="row g-4" id="sopGrid">

            <!-- 1. MAX-SOP-COP-004 -->
            <div class="col-lg-6 sop-card-item" data-department="critical-care" data-type="sop" data-title="emergency resuscitation code blue management cop.3">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-heart-pulse me-1"></i> MAX-SOP-COP-004</span>
                        <span class="badge badge-max badge-max-emerald">v2.4 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Emergency Resuscitation &amp; Code Blue Management</h5>
                    <p class="small text-muted mb-3">Standardized hospital-wide protocol for activation, response time tracking (&lt;3 mins), resuscitation equipment readiness, and post-event debriefing.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-danger me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Dedicated Code Blue team paging protocol &amp; simultaneous security lift freeze.</li>
                            <li class="mb-1">Crash Cart checklist verification and drug expiry audit every shift.</li>
                            <li>CPR documentation register and monthly resuscitation outcome audit.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-danger me-1"></i> NABH Standard: COP.3</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 15 Oct 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-COP-004', 'Emergency Resuscitation & Code Blue Management', 'Care of Patients (COP.3)', 'v2.4 (Approved)', 'Critical Care & Resuscitation Team', 'Immediate response to cardio-respiratory arrest in adult and paediatric patients across all hospital zones.', ['Activate Code Blue via internal emergency number 2222 with exact ward and bed location.', 'First responder initiates chest compressions (100-120 bpm) and bag-valve-mask ventilation within 30 seconds.', 'Code Blue team arrives with Defibrillator within 3 minutes of alarm broadcast.', 'Doctor leads advanced airway management (Endotracheal Intubation) and IV adrenaline administration.', 'Record CPR sheet MAX-REC-COP-04A and complete debriefing within 24 hours.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. MAX-SOP-MOM-002 -->
            <div class="col-lg-6 sop-card-item" data-department="pharmacy" data-type="sop" data-title="high-alert look-alike sound-alike lasa medication safety mom.2">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-pills me-1"></i> MAX-SOP-MOM-002</span>
                        <span class="badge badge-max badge-max-emerald">v3.0 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">High-Alert &amp; LASA Medication Safety Protocol</h5>
                    <p class="small text-muted mb-3">Segregated storage, Tall-Man lettering, dual nursing verification, and controlled dispensing protocols for Look-Alike Sound-Alike medications.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-success me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Separation of look-alike formulations in central pharmacy and ward medication cabinets.</li>
                            <li class="mb-1">Mandatory dual independent nursing sign-off before administering IV concentrated electrolytes.</li>
                            <li>Annual review and display of updated hospital LASA drug list across all nursing stations.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-success me-1"></i> NABH Standard: MOM.2</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 01 Nov 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-MOM-002', 'High-Alert & LASA Medication Safety Protocol', 'Management of Medication (MOM.2)', 'v3.0 (Approved)', 'Pharmacy & Clinical Nursing Staff', 'Prevention of medication errors during prescribing, stocking, dispensing, and administration of high-risk medicines.', ['Affix High-Alert fluorescent red labels on concentrated electrolytes and chemotherapy agents.', 'Apply Tall-Man lettering on storage bins (e.g., DOBUTamine vs DOPAmine).', 'Nurse A prepares medication; Nurse B independently verifies 5 Rights (Patient, Drug, Dose, Route, Time).', 'No verbal orders permitted for high-alert drugs except during active CPR resuscitations.', 'Log near-misses and adverse drug events in MAX-REC-MOM-02 within 12 hours.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. MAX-SOP-HIC-001 -->
            <div class="col-lg-6 sop-card-item" data-department="infection-control" data-type="sop" data-title="healthcare-associated infection surveillance bundle care hic.1">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-shield-virus me-1"></i> MAX-SOP-HIC-001</span>
                        <span class="badge badge-max badge-max-emerald">v2.2 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Hospital Infection Surveillance &amp; Care Bundles</h5>
                    <p class="small text-muted mb-3">Evidence-based surveillance methodology for CAUTI, CLABSI, VAP, and SSI, hand hygiene compliance audits, and isolation precautions.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Implementation of WHO 5 Moments of Hand Hygiene with monthly unit compliance target &gt;90%.</li>
                            <li class="mb-1">Daily clinical review of Central Line and Indwelling Catheter necessity to prevent device days.</li>
                            <li>Airborne, Droplet, and Contact transmission-based isolation signage and barrier PPE.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Standard: HIC.1</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 20 Dec 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-HIC-001', 'Hospital Infection Surveillance & Care Bundles', 'Hospital Infection Control (HIC.1)', 'v2.2 (Approved)', 'Infection Control Nurses & Clinicians', 'Standardized monitoring, prevention, and control of hospital-acquired infections across all inpatient wards and ICUs.', ['Conduct daily active surveillance rounds in ICUs to calculate device-associated infection rates.', 'Apply Chlorhexidine 2% skin prep prior to vascular catheter insertion with maximum sterile barrier.', 'Check ventilator head-of-bed elevation at 30-45 degrees and perform oral chlorhexidine swab every 6 hours.', 'Audit hand hygiene rub technique using WHO observational checklist MAX-CHK-HIC-01.', 'Report multi-drug resistant organism (MDRO) isolates to HICC team within 6 hours of lab culture.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. MAX-SOP-AAC-001 -->
            <div class="col-lg-6 sop-card-item" data-department="emergency" data-type="sop" data-title="emergency triage clinical handover protocol aac.1">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-truck-medical me-1"></i> MAX-SOP-AAC-001</span>
                        <span class="badge badge-max badge-max-emerald">v2.0 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Emergency Department 3-Tier Triage &amp; Handover</h5>
                    <p class="small text-muted mb-3">Emergency department triage scoring (Priority 1 Red, Priority 2 Yellow, Priority 3 Green), initial stabilization guidelines, and structured SBAR clinical handover.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-warning me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Initial nursing triage completed within 5 minutes of patient arrival at ED entrance.</li>
                            <li class="mb-1">Red category patients (cardiac arrest, severe polytrauma, anaphylaxis) moved immediately to Resus Bay.</li>
                            <li>Standardized SBAR (Situation, Background, Assessment, Recommendation) transfer documentation.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-warning me-1"></i> NABH Standard: AAC.1</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 12 Jan 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-AAC-001', 'Emergency Department 3-Tier Triage & Handover', 'Access & Assessment (AAC.1)', 'v2.0 (Approved)', 'Emergency Medical Officers & Triage Staff', 'Systematic categorization and immediate care initiation for emergent and non-emergent walk-in and ambulance patients.', ['Triage Nurse performs primary survey (Airway, Breathing, Circulation, Disability) and assigns triage band.', 'Priority 1 (Red) seen immediately; Priority 2 (Yellow) assessed within 15 mins; Priority 3 (Green) within 60 mins.', 'Initiate statutory medico-legal case (MLC) intimation for road accidents, burns, and poisoning cases.', 'Conduct SBAR verbal and electronic transfer handover when patient shifts to OT, ICU, or Ward.', 'Review daily ED left-without-being-seen (LWBS) rate and door-to-needle/balloon times.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. MAX-SOP-OT-008 -->
            <div class="col-lg-6 sop-card-item" data-department="ot-surgery" data-type="sop" data-title="who surgical safety checklist sterility workflow cop.7">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-scissors me-1"></i> MAX-SOP-OT-008</span>
                        <span class="badge badge-max badge-max-emerald">v2.3 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">WHO Surgical Safety Checklist &amp; OT Sterility</h5>
                    <p class="small text-muted mb-3">3-phase surgical checklist (Sign-in, Time-out, Sign-out), positive pressure HVAC gradient monitoring, CSSD sterile batch verification, and surgical attire protocols.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Compulsory pre-incision Time-Out confirming patient identity, site marking, and consent.</li>
                            <li class="mb-1">Instrument and gauze swab counts verified jointly by scrub nurse and circulating nurse.</li>
                            <li>Continuous positive air pressure monitoring (&gt;2.5 Pa) and HEPA air change validation.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Standard: COP.7</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 28 Feb 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-OT-008', 'WHO Surgical Safety Checklist & OT Sterility', 'Care of Patients (COP.7)', 'v2.3 (Approved)', 'Surgeons, Anaesthetists & OT Scrub Nurses', 'Zero wrong-site, wrong-procedure, and wrong-person surgical errors while ensuring optimum sterility standards.', ['Phase 1 Sign-In: Confirm patient identity, surgical site mark, anesthesia safety check, and pulse oximeter.', 'Phase 2 Time-Out: Entire team halts before incision; Surgeon, Anaesthetist, and Nurse verbally confirm case details.', 'Administer prophylactic IV antibiotics within 60 minutes prior to surgical incision.', 'Phase 3 Sign-Out: Scrub nurse verbally confirms instrument count, specimen labeling, and key recovery concerns.', 'Maintain strict zoning (Unrestricted, Semi-Restricted, Sterile) with dedicated OT footwear and scrubs.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. MAX-SOP-BMW-003 -->
            <div class="col-lg-6 sop-card-item" data-department="infection-control" data-type="protocol" data-title="biomedical waste segregation barcoding effluent treatment hic.4 fms.5">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-recycle me-1"></i> MAX-SOP-BMW-003</span>
                        <span class="badge badge-max badge-max-emerald">v2.1 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Bio-Medical Waste Segregation &amp; STP Effluent</h5>
                    <p class="small text-muted mb-3">Color-coded segregation (Yellow, Red, Blue, White puncture-proof), CPCB barcode scanner tracking, 48-hour storage limits, and STP effluent compliance.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-success me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Point-of-generation waste segregation using non-chlorinated color bags.</li>
                            <li class="mb-1">Central waste storage yard weighing and barcoded GPS vehicle manifest logging.</li>
                            <li>STP treated water lab tests (BOD &lt; 10 mg/L, TSS &lt; 10 mg/L, pH 6.5-8.5) logged monthly.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-success me-1"></i> NABH Standard: HIC.4 / FMS.5</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 18 Nov 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-BMW-003', 'Bio-Medical Waste Segregation & STP Effluent', 'Infection Control & Safety (HIC.4/FMS.5)', 'v2.1 (Approved)', 'Housekeeping, Nursing & Environmental Safety', 'Statutory compliance with Bio-Medical Waste Management Rules and hospital effluent discharge benchmarks.', ['Segregate anatomical waste & soiled dressings into Yellow bags; contaminated plastic tubing into Red bags.', 'Deposit sharps, needles, and blades directly into translucent puncture-proof White containers.', 'Scan and log barcode on each bag before handing over to authorized common bio-medical waste facility (CBWTF).', 'Ensure bio-medical waste is never stored on hospital premises exceeding 48 hours.', 'Maintain daily operator logbook of Sewage Treatment Plant (STP) parameters and sodium hypochlorite dosing.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. MAX-SOP-FMS-005 -->
            <div class="col-lg-6 sop-card-item" data-department="biomedical" data-type="protocol" data-title="hospital fire safety code red evacuation protocol fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-fire-extinguisher me-1"></i> MAX-SOP-FMS-005</span>
                        <span class="badge badge-max badge-max-emerald">v2.5 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Hospital Fire Safety, Code Red &amp; Evacuation</h5>
                    <p class="small text-muted mb-3">RACE &amp; PASS fire emergency response, addressable smoke detector test cycles, main fire pump pressure monitoring, and horizontal/vertical patient evacuation paths.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-danger me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Immediate RACE protocol execution: Rescue, Alarm, Contain, Extinguish/Evacuate.</li>
                            <li class="mb-1">Fire hydrant automated jockey pump pressure verified above 7.0 kg/cm².</li>
                            <li>Quarterly floor mock drills and annual district fire department joint exercise.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-danger me-1"></i> NABH Standard: FMS.4</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 10 Dec 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-FMS-005', 'Hospital Fire Safety, Code Red & Evacuation', 'Facility Management & Safety (FMS.4)', 'v2.5 (Approved)', 'Safety Officers, Engineering & Hospital Staff', 'Rapid containment of fire threats and structured evacuation of ambulatory and bedridden patients.', ['Upon detecting smoke/fire, staff sounds nearest manual call point and announces Code Red on PA system.', 'Close fire retardant doors to isolate the compartment and switch off localized medical gas zone valves.', 'Use appropriate extinguisher using PASS technique (Pull, Aim, Squeeze, Sweep).', 'Initiate horizontal evacuation to adjacent fire zone behind fire barriers before considering vertical evacuation.', 'Prioritize evacuation: 1. Ambulatory patients, 2. Wheelchair patients, 3. ICU/ventilated patients with oxygen support.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. MAX-SOP-HRM-002 -->
            <div class="col-lg-6 sop-card-item" data-department="hr-training" data-type="policy" data-title="clinical staff credentialing privileging bls competency hrm.3">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-navy"><i class="fas fa-user-check me-1"></i> MAX-SOP-HRM-002</span>
                        <span class="badge badge-max badge-max-emerald">v2.0 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Staff Credentialing, Privileging &amp; BLS Competency</h5>
                    <p class="small text-muted mb-3">Primary source verification (PSV) of medical degrees, state medical council licenses, doctor procedural privileging matrix, and mandatory annual BLS training.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">100% verification of medical qualifications with issuing universities prior to joining.</li>
                            <li class="mb-1">Departmental Credentials Committee approval for advanced clinical and surgical privileges.</li>
                            <li>Automated 60-day expiry notifications for state medical council registrations.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Standard: HRM.3</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 05 Jan 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-HRM-002', 'Staff Credentialing, Privileging & BLS Competency', 'Human Resource Management (HRM.3)', 'v2.0 (Approved)', 'Human Resources & Credentials Committee', 'Structured credentialing of medical, nursing, and paramedical personnel to ensure authorized clinical practice.', ['HR initiates primary source verification via registered post or digital university verification portal.', 'Credentials Committee reviews doctor logbooks and recommends Core vs Specific Procedural Privileges.', 'All nursing staff must complete certified Basic Life Support (BLS) training before independent ward posting.', 'Staff with expired council registrations are automatically suspended from digital EMR prescription access.', 'Maintain comprehensive physical and digital credential dossiers in compliance with NABH HRM elements.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9. MAX-SOP-CQI-001 -->
            <div class="col-lg-6 sop-card-item" data-department="quality-cqi" data-type="sop" data-title="clinical incident reporting sentinel event root cause analysis cqi.3">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-clipboard-check me-1"></i> MAX-SOP-CQI-001</span>
                        <span class="badge badge-max badge-max-emerald">v2.1 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Incident Reporting &amp; Root Cause Analysis (RCA)</h5>
                    <p class="small text-muted mb-3">Non-punitive voluntary and mandatory clinical incident reporting, sentinel event definitions, 48-hour Root Cause Analysis (RCA), and CAPA closure workflows.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Online or physical incident reporting form available across all nursing stations.</li>
                            <li class="mb-1">Immediate notification of Sentinel Events (maternal death, wrong surgery) within 2 hours.</li>
                            <li>Multidisciplinary Root Cause Analysis and corrective action plan closure within 14 days.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Standard: CQI.3</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 15 Mar 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-CQI-001', 'Incident Reporting & Root Cause Analysis (RCA)', 'Continuous Quality Improvement (CQI.3)', 'v2.1 (Approved)', 'Quality Improvement Committee & All Staff', 'Foster a culture of patient safety and transparent reporting of adverse events, near-misses, and sentinel events.', ['Staff reports incident using MAX-REC-CQI-01 without fear of punitive reprisal.', 'Quality Manager categorizes severity: Category 1 (Minor/Near Miss) to Category 4 (Sentinel Event).', 'Form multidisciplinary RCA team (Doctor, Nurse, Pharmacist, Quality Manager) for major incidents.', 'Utilize 5-Why analysis and Fishbone diagram to identify systemic root causes.', 'Formulate Corrective and Preventive Action (CAPA) with designated owner and review re-audit date.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 10. MAX-SOP-LAB-006 -->
            <div class="col-lg-6 sop-card-item" data-department="diagnostics" data-type="sop" data-title="critical panic value reporting eqas quality control cop.9">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-flask-vial me-1"></i> MAX-SOP-LAB-006</span>
                        <span class="badge badge-max badge-max-emerald">v2.2 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Critical Panic Value Reporting &amp; Lab QC</h5>
                    <p class="small text-muted mb-3">Defined critical panic value ranges (e.g., Potassium &lt;2.5 or &gt;6.0, Platelets &lt;20k), immediate telephonic read-back confirmation, and daily internal IQC/EQAS validation.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-warning me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Immediate telephonic communication of critical values within 15 minutes of test result.</li>
                            <li class="mb-1">Mandatory recipient read-back confirmation documented in lab panic logbook.</li>
                            <li>Daily running of Level 1 &amp; Level 2 internal quality control before patient sample testing.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-warning me-1"></i> NABH Standard: COP.9</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 22 Feb 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-LAB-006', 'Critical Panic Value Reporting & Lab QC', 'Diagnostic Services (COP.9)', 'v2.2 (Approved)', 'Pathologists, Biochemists & Lab Technicians', 'Rapid communication of life-threatening laboratory test values to treating doctors for immediate clinical intervention.', ['Lab technician notices result falling within defined Hospital Critical Value List.', 'Re-check and repeat analysis on analyzer to eliminate technical artifact.', 'Call treating physician or in-charge ward nurse within 15 minutes of value verification.', 'Require recipient to write down and read back the patient name, MRN, test, and numerical value.', 'Document call time, caller name, recipient name, and read-back confirmation in MAX-REC-LAB-06.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 11. MAX-SOP-PRE-002 -->
            <div class="col-lg-6 sop-card-item" data-department="emergency" data-type="policy" data-title="informed consent patient rights bill of rights vulnerable care pre.1">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-user-shield me-1"></i> MAX-SOP-PRE-002</span>
                        <span class="badge badge-max badge-max-emerald">v2.0 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Informed Consent &amp; Patient Rights Framework</h5>
                    <p class="small text-muted mb-3">Standardized bilingual informed consent process, clinical privacy protocols, protection of vulnerable patients (paediatric, elderly, comatose), and grievance redressal.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-success me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Informed consent explained in patient’s native language before surgery or blood transfusion.</li>
                            <li class="mb-1">Patient Charter &amp; Bill of Rights clearly displayed across OPD and ward receptions.</li>
                            <li>Time-bound 48-hour resolution workflow for all formal patient grievances.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-success me-1"></i> NABH Standard: PRE.1</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 14 Apr 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-PRE-002', 'Informed Consent & Patient Rights Framework', 'Patient Rights & Education (PRE.1)', 'v2.0 (Approved)', 'Clinical Doctors, Nursing & Patient Relations', 'Respect patient autonomy, dignity, informed decision making, and confidentiality across all care touchpoints.', ['Operating doctor personally explains procedure, benefits, risks, alternatives, and costs in patient language.', 'Obtain signatures of patient/legal guardian and neutral witness; note date and precise timestamp.', 'Ensure visual and auditory privacy using examination curtains and screens in OPD and IPD.', 'Vulnerable patients (minors, unconscious) are provided dedicated nursing accompaniment.', 'Register complaints in Central Grievance Portal; Patient Relations Officer acknowledges within 2 hours.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 12. MAX-SOP-IMS-003 -->
            <div class="col-lg-6 sop-card-item" data-department="mrd" data-type="policy" data-title="medical records management confidentiality retention ims.2">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-navy"><i class="fas fa-file-shield me-1"></i> MAX-SOP-IMS-003</span>
                        <span class="badge badge-max badge-max-emerald">v2.1 Active</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Medical Records Management &amp; Retention Protocol</h5>
                    <p class="small text-muted mb-3">Physical and digital medical records archiving, strict role-based EMR access control, statutory retention timelines (Adult IPD 10 yrs, MLC forever), and discharge summary turnaround.</p>
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-list-check text-primary me-1"></i> Key Operating Procedures:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Discharge summary handed over to patient within 3 hours of doctor discharge order.</li>
                            <li class="mb-1">Strict role-based access control preventing unauthorized clinical chart viewing.</li>
                            <li>Safe physical archive with fire protection and pest control fumigation.</li>
                        </ul>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Standard: IMS.2</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Review: 30 May 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openSopDetail('MAX-SOP-IMS-003', 'Medical Records Management & Retention Protocol', 'Information Management (IMS.2)', 'v2.1 (Approved)', 'Medical Records Department (MRD) & IT Team', 'Safeguarding patient health information, legal compliance, and timely accessibility of clinical records.', ['Collect all IPD charts within 24 hours of discharge and audit for clinical completeness.', 'Ensure discharge summary contains primary diagnosis, procedure, hospital course, and follow-up advice.', 'Enforce password complexity and auto session-timeout (15 mins) on all clinical workstations.', 'Retain general IPD records for 10 years, paediatric records till age 21, and MLC/judicial records permanently.', 'Execute document destruction protocol only through Quality Committee and Legal Counsel approval.'])">
                                <i class="fas fa-eye me-1"></i> Preview SOP
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Full Doc</a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- End SOP Grid -->

        <!-- No Results Fallback -->
        <div id="noSopResults" class="card card-max p-5 text-center mt-4 d-none">
            <div class="text-muted fs-1 mb-2"><i class="fas fa-folder-open"></i></div>
            <h5 class="fw-bold text-navy mb-1">No Matching Documents or SOPs Found</h5>
            <p class="text-muted small mb-3">Try adjusting your search query, clearing filters, or browsing by department.</p>
            <div>
                <button type="button" class="btn btn-sm btn-outline-navy" onclick="resetSopFilters()">
                    <i class="fas fa-rotate-left me-1"></i> Reset All Filters
                </button>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================
     DOCUMENT LIFECYCLE & GOVERNANCE FRAMEWORK
========================================================= -->
<section class="py-5 bg-surface-alt border-top border-bottom">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-emerald mb-2"><i class="fas fa-diagram-project me-1"></i> SOP Architecture</span>
            <h2 class="display-6 fw-bold text-navy mb-2">4-Stage Document Governance Lifecycle</h2>
            <p class="text-muted">How clinical policies and operational procedures are drafted, reviewed, approved, and tracked for NABH 5th Edition compliance.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem;">
                        <span>1</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Drafting &amp; Scope</h5>
                    <p class="small text-muted mb-0">Departmental subject matter experts draft SOPs using standardized MAX template with defined scope and objective elements.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #10b981, #059669);">
                        <span>2</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Clinical Review</h5>
                    <p class="small text-muted mb-0">HOD, Infection Control Officer, and Nursing Superintendent review procedures against national clinical guidelines.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #f59e0b, #d97706);">
                        <span>3</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Quality Approval</h5>
                    <p class="small text-muted mb-0">Quality Head and Medical Superintendent sign off. A controlled version number (e.g. v2.1) and effective date are issued.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #6366f1, #4f46e5);">
                        <span>4</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Staff Training &amp; Audit</h5>
                    <p class="small text-muted mb-0">Mandatory staff training is completed and logged. The document enters automated 30/15/7-day review alert schedule.</p>
                </div>
            </div>
        </div>

        <!-- Document Coding Schema Card -->
        <div class="card card-max p-4 mt-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-3 text-center text-lg-start">
                    <span class="badge badge-max badge-max-navy mb-1">Standardized Coding</span>
                    <h5 class="fw-bold text-navy mb-0">Document Code Schema</h5>
                </div>
                <div class="col-lg-9">
                    <div class="row g-2 text-center text-md-start small">
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-primary d-block font-monospace">MAX</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Hospital Prefix</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-success d-block font-monospace">SOP / POL / PRO</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Document Category</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-warning d-block font-monospace">COP / MOM / HIC</strong>
                                <span class="text-muted" style="font-size:0.75rem;">NABH Chapter / Dept</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-danger d-block font-monospace">001 to 999</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Sequential Serial No.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================
     CTA / PORTAL GATEWAY SECTION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">
        <div class="card card-max p-5 text-center" style="background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);">
            <div class="max-w-700 mx-auto">
                <span class="badge badge-max badge-max-blue mb-2"><i class="fas fa-rocket text-primary me-1"></i> Hospital Quality Management</span>
                <h3 class="display-6 fw-bold text-navy mb-3">Digitize Your Hospital's Entire SOP Library</h3>
                <p class="text-muted mb-4">Empower clinical coordinators, nursing supervisors, and quality auditors with cloud-based version control, automated expiry triggers, and one-click NABH audit documentation.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Sign In to Document Portal
                    </a>
                    <a href="<?= site_url('contact') ?>" class="btn btn-outline-navy">
                        <i class="fas fa-calendar-check me-1"></i> Request Mock Audit Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     INTERACTIVE SOP PREVIEW MODAL
========================================================= -->
<div class="modal fade" id="sopDetailModal" tabindex="-1" aria-labelledby="sopDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge badge-max badge-max-blue" id="modalSopCode">MAX-SOP-000</span>
                        <span class="badge badge-max badge-max-emerald" id="modalSopVersion">v1.0</span>
                    </div>
                    <h5 class="modal-title fw-bold text-navy mb-0" id="modalSopTitle">Standard Operating Procedure</h5>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">NABH Standard Clause</span>
                            <strong class="text-navy small" id="modalSopStandard">COP.3</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Target Scope / Audience</span>
                            <strong class="text-navy small" id="modalSopAudience">Clinical Staff</strong>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-navy mb-2"><i class="fas fa-bullseye text-primary me-1"></i> Purpose &amp; Clinical Objective</h6>
                    <p class="small text-muted mb-0" id="modalSopObjective">Purpose text goes here...</p>
                </div>

                <div class="mb-3">
                    <h6 class="fw-bold text-navy mb-2"><i class="fas fa-list-ol text-success me-1"></i> Step-by-Step Standard Operating Procedure</h6>
                    <div class="bg-surface-alt p-3 rounded-3">
                        <ol class="mb-0 ps-3 text-muted small" id="modalSopSteps">
                            <!-- Populated dynamically via JS -->
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top py-3 px-4 d-flex justify-content-between">
                <span class="small text-muted"><i class="fas fa-shield-halved text-success me-1"></i> Quality Committee Approved Document</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Sign In to Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     CLIENT-SIDE INTERACTIVE FILTER SCRIPT
========================================================= -->
<script>
let currentSearch = '';
let currentDept = 'all';
let currentType = 'all';

function applySopFilters() {
    const cards = document.querySelectorAll('.sop-card-item');
    let visibleCount = 0;

    cards.forEach(card => {
        const dept = card.getAttribute('data-department') || '';
        const type = card.getAttribute('data-type') || '';
        const text = (card.getAttribute('data-title') || '') + ' ' + (card.innerText || '').toLowerCase();

        const matchesDept = (currentDept === 'all' || dept === currentDept);
        const matchesType = (currentType === 'all' || type === currentType);
        const matchesSearch = (!currentSearch || text.includes(currentSearch.toLowerCase()));

        if (matchesDept && matchesType && matchesSearch) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Update Counter
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noSopResults');

    if (resultsCount) {
        resultsCount.innerText = `Showing ${visibleCount} SOP document${visibleCount === 1 ? '' : 's'}`;
    }

    if (noResults) {
        if (visibleCount === 0) {
            noResults.classList.remove('d-none');
        } else {
            noResults.classList.add('d-none');
        }
    }
}

function searchSopQuery(val) {
    currentSearch = val.trim();
    applySopFilters();
}

function filterByDepartment(val) {
    currentDept = val;
    // Sync quick buttons
    document.querySelectorAll('.sop-quick-btn').forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light', 'border');
    });
    const matchBtn = Array.from(document.querySelectorAll('.sop-quick-btn')).find(b => b.textContent.trim().toLowerCase().includes(val.replace('-', ' ')));
    if (matchBtn) {
        matchBtn.classList.remove('btn-light', 'border');
        matchBtn.classList.add('btn-primary', 'active');
    }
    applySopFilters();
}

function filterByType(val) {
    currentType = val;
    applySopFilters();
}

function filterSopCategory(cat, btnElement) {
    currentDept = cat;
    
    // Sync Dropdown
    const deptSelect = document.getElementById('departmentSelectFilter');
    if (deptSelect) {
        deptSelect.value = cat;
    }

    // Toggle Button styling
    document.querySelectorAll('.sop-quick-btn').forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light', 'border');
    });
    if (btnElement) {
        btnElement.classList.remove('btn-light', 'border');
        btnElement.classList.add('btn-primary', 'active');
    }

    applySopFilters();
}

function resetSopFilters() {
    currentSearch = '';
    currentDept = 'all';
    currentType = 'all';

    const searchInput = document.getElementById('sopSearchInput');
    const deptSelect = document.getElementById('departmentSelectFilter');
    const typeSelect = document.getElementById('typeSelectFilter');

    if (searchInput) searchInput.value = '';
    if (deptSelect) deptSelect.value = 'all';
    if (typeSelect) typeSelect.value = 'all';

    document.querySelectorAll('.sop-quick-btn').forEach((btn, index) => {
        if (index === 0) {
            btn.classList.remove('btn-light', 'border');
            btn.classList.add('btn-primary', 'active');
        } else {
            btn.classList.remove('btn-primary', 'active');
            btn.classList.add('btn-light', 'border');
        }
    });

    applySopFilters();
}

function openSopDetail(code, title, standard, version, audience, objective, steps) {
    document.getElementById('modalSopCode').innerText = code;
    document.getElementById('modalSopTitle').innerText = title;
    document.getElementById('modalSopStandard').innerText = standard;
    document.getElementById('modalSopVersion').innerText = version;
    document.getElementById('modalSopAudience').innerText = audience;
    document.getElementById('modalSopObjective').innerText = objective;

    const stepsList = document.getElementById('modalSopSteps');
    stepsList.innerHTML = '';
    if (Array.isArray(steps)) {
        steps.forEach(step => {
            const li = document.createElement('li');
            li.className = 'mb-2';
            li.innerText = step;
            stepsList.appendChild(li);
        });
    }

    const modalEl = document.getElementById('sopDetailModal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
}
</script>
