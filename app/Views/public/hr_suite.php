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
                <h1 class="page-banner-title">HR &amp; Credentialing Suite</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">HR &amp; Credentialing Suite</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     HR & CREDENTIALING DIRECTORY SECTION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">

        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-emerald mb-2"><i class="fas fa-user-doctor text-success me-1"></i> Human Resource Governance (HRM)</span>
            <h2 class="display-6 fw-bold text-navy mb-2">Doctor Privileging &amp; Clinical Staff Credentials</h2>
            <p class="text-muted">Comprehensive governance framework for medical staff primary source verification (PSV), clinical procedural privileging matrix, state council renewals, and mandatory annual training logs.</p>
        </div>

        <!-- Metrics & Feature Highlights Strip -->
        <div class="row g-3 mb-5">
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-success fs-3 mb-1"><i class="fas fa-shield-check"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">100%</h3>
                    <span class="small text-muted">PSV Verified Degrees</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-primary fs-3 mb-1"><i class="fas fa-id-card-clip"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">4-Tier</h3>
                    <span class="small text-muted">Privileging Matrix</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-warning fs-3 mb-1"><i class="fas fa-bell"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">60/30/15d</h3>
                    <span class="small text-muted">Council Expiry Alerts</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-info fs-3 mb-1"><i class="fas fa-graduation-cap"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">20+ Hrs</h3>
                    <span class="small text-muted">Annual CNE/CME Credits</span>
                </div>
            </div>
        </div>

        <!-- Search & Filter Card (Using Common Card-Max) -->
        <div class="card card-max p-4 mb-5">
            <div class="row g-3 align-items-center">
                <!-- Search Input -->
                <div class="col-lg-5 col-md-12">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-magnifying-glass text-primary me-1"></i> Search Staff &amp; Privileges</label>
                    <input type="text" id="hrSearchInput" class="form-control" placeholder="Search doctor, nurse, specialty, procedure (e.g. Cardiology, ICU, ACLS, Laparoscopy)..." onkeyup="searchHrQuery(this.value)">
                </div>

                <!-- Staff Cadre Selector Dropdown -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-users text-primary me-1"></i> Staff Cadre / Specialty</label>
                    <select id="cadreSelectFilter" class="form-select" onchange="filterByCadre(this.value)">
                        <option value="all">All Clinical &amp; Allied Cadres</option>
                        <option value="consultant">Consultants &amp; Specialists</option>
                        <option value="rmo">Emergency &amp; Resident Doctors</option>
                        <option value="nursing">Critical Care &amp; Ward Nursing</option>
                        <option value="surgical">OT &amp; Surgical Technologists</option>
                        <option value="paramedical">Paramedical &amp; Perfusion</option>
                        <option value="diagnostics">Pathology &amp; Blood Centre</option>
                    </select>
                </div>

                <!-- Credential Status Selector -->
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-check-double text-primary me-1"></i> Verification Status</label>
                    <select id="statusSelectFilter" class="form-select" onchange="filterByStatus(this.value)">
                        <option value="all">All Verification Statuses</option>
                        <option value="verified">PSV Verified &amp; Active</option>
                        <option value="renewal-due">Privileging Renewal Due</option>
                        <option value="certified">BLS/ACLS Certified</option>
                    </select>
                </div>
            </div>

            <!-- Quick Cadre Filter Buttons -->
            <div class="pt-3 border-top mt-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="small fw-bold text-navy me-1"><i class="fas fa-tags text-primary me-1"></i> Quick Filters:</span>
                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 py-1 fw-semibold hr-quick-btn active" onclick="filterHrCategory('all', this)">
                        All Staff (12)
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold hr-quick-btn" onclick="filterHrCategory('consultant', this)">
                        Consultants
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold hr-quick-btn" onclick="filterHrCategory('nursing', this)">
                        Nursing Staff
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold hr-quick-btn" onclick="filterHrCategory('rmo', this)">
                        Emergency RMOs
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold hr-quick-btn" onclick="filterHrCategory('surgical', this)">
                        OT &amp; Surgical
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold hr-quick-btn" onclick="filterHrCategory('paramedical', this)">
                        Paramedical
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold hr-quick-btn" onclick="filterHrCategory('diagnostics', this)">
                        Diagnostics / Lab
                    </button>
                </div>
            </div>
        </div>

        <!-- Results Counter & Action Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="small fw-semibold text-muted" id="resultsCount">Showing all 12 privileged clinical &amp; nursing dossiers</span>
            </div>
            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">
                <i class="fas fa-user-plus me-1"></i> Register New Staff Credential
            </a>
        </div>

        <!-- HR & Credentialing Cards Grid (Using Common card-max) -->
        <div class="row g-4" id="hrGrid">

            <!-- 1. Dr. Arvind Swaminathan -->
            <div class="col-lg-6 hr-card-item" data-cadre="consultant" data-status="verified" data-title="dr arvind swaminathan md dm cardiology interventional angiography angioplasty">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-user-md me-1"></i> DOC-CR-CARD-001</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Arvind Swaminathan, MD, DM</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Senior Consultant — Interventional Cardiology</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>MCI-48291-MH</strong> | PSV: Direct University Registry Verified | Experience: 14 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-primary me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Adult IPD/OPD Cardiology, Non-invasive Stress Echocardiography, Holter analysis.</li>
                            <li class="mb-1"><strong>Specific (High Risk):</strong> Primary &amp; Elective PTCA / Stenting, Transradial Angiography, IABP insertion.</li>
                            <li><strong>Special:</strong> Permanent Dual Chamber Pacemaker (PPM) &amp; AICD Implantation.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> ACLS / BLS: Valid till Nov 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 32 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Arvind Swaminathan, MD, DM', 'Senior Consultant — Interventional Cardiology', 'DOC-CR-CARD-001', 'MCI-48291-MH (Valid till 2029)', 'AIIMS New Delhi (PSV Verified)', 'Active Level-4 Privileged', ['Coronary Angiography (Radial & Femoral routes)', 'Primary PCI in Acute STEMI (Door-to-Balloon <60 mins)', 'Complex Coronary Bifurcation Stenting', 'Temporary & Permanent Pacemaker Implantation', 'Intra-Aortic Balloon Pump (IABP) Placement', 'Trans-Thoracic and Trans-Oesophageal Echo (TEE)'], 'ACLS & BLS Certified (AHA Guidelines)', '32 Credit Hours (Annual National Cardiological Society)')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Dr. Meenakshi Sundaram -->
            <div class="col-lg-6 hr-card-item" data-cadre="consultant" data-status="verified" data-title="dr meenakshi sundaram ms mch surgical oncology whipple mastectomy laparoscopic">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-user-md me-1"></i> DOC-CR-ONCO-003</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Meenakshi Sundaram, MS, MCh</h5>
                    <span class="small text-danger fw-semibold mb-2 d-block">Lead Consultant — Surgical Oncology</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>TMC-61902-TN</strong> | PSV: Tata Memorial Hospital Verified | Experience: 16 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-danger me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Comprehensive Onco-Surgical evaluation, FNAC biopsy, minor excisions.</li>
                            <li class="mb-1"><strong>Specific (High Risk):</strong> Whipple Pancreaticoduodenectomy, Modified Radical Mastectomy (MRM).</li>
                            <li><strong>Special:</strong> Advanced Laparoscopic &amp; Robotic Colorectal / Oesophageal Resections.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> ATLS / BLS: Valid till Jan 2028</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 45 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Meenakshi Sundaram, MS, MCh', 'Lead Consultant — Surgical Oncology', 'DOC-CR-ONCO-003', 'TMC-61902-TN (Valid till 2028)', 'Tata Memorial Hospital Mumbai (PSV Verified)', 'Active Level-4 Privileged', ['Modified Radical Mastectomy & Sentinel Node Biopsy', 'Whipple’s Pancreaticoduodenectomy', 'Laparoscopic Low Anterior Resection (LAR)', 'Radical Gastrectomy with D2 Lymphadenectomy', 'Composite Resection & Neck Dissection for Head & Neck Ca', 'Chemotherapy Port Insertion & Management'], 'ATLS & BLS Certified', '45 Credit Hours (IASO & International Onco Congress)')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Dr. Rajeshwar Kulkarni -->
            <div class="col-lg-6 hr-card-item" data-cadre="consultant" data-status="verified" data-title="dr rajeshwar kulkarni md idccm critical care icu tracheostomy ecmo">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-user-md me-1"></i> DOC-CR-ICU-002</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Rajeshwar Kulkarni, MD, IDCCM</h5>
                    <span class="small text-success fw-semibold mb-2 d-block">Head &amp; Senior Consultant — Critical Care &amp; ICU</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>MMC-89103-MH</strong> | PSV: King Edward Memorial Verified | Experience: 12 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-success me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Advanced Mechanical Ventilation (Invasive &amp; NIV), Sepsis bundle resuscitation.</li>
                            <li class="mb-1"><strong>Specific:</strong> Percutaneous Dilatational Tracheostomy, Ultrasound-guided Central Venous Line / Arterial Line.</li>
                            <li><strong>Special:</strong> Continuous Renal Replacement Therapy (CRRT), ECMO circuit management.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> ACLS Lead Instructor: Active</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 38 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Rajeshwar Kulkarni, MD, IDCCM', 'Head of Critical Care Medicine', 'DOC-CR-ICU-002', 'MMC-89103-MH (Valid till 2029)', 'KEM Hospital & Seth GS Medical College (PSV Verified)', 'Active Level-4 Privileged', ['USG-guided Central Venous Line (Internal Jugular / Subclavian)', 'Percutaneous Dilatational Tracheostomy', 'Invasive Hemodynamic Monitoring (PICCO / FloTrac)', 'Advanced Mechanical Ventilation for Severe ARDS (Prone Ventilation)', 'Continuous Renal Replacement Therapy (CRRT)', 'Code Blue Team Lead & Advanced Cardiac Resuscitation'], 'ACLS & FCCS Certified Lead Instructor', '38 Credit Hours (ISCCM Annual Congress)')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Dr. Sunita Deshmukh -->
            <div class="col-lg-6 hr-card-item" data-cadre="consultant" data-status="verified" data-title="dr sunita deshmukh md anaesthesiology lead difficult airway fiberoptic nerve blocks">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-user-md me-1"></i> DOC-CR-ANES-005</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Sunita Deshmukh, MD</h5>
                    <span class="small text-warning fw-semibold mb-2 d-block">Lead Consultant — Anaesthesiology &amp; Pain Management</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>DMC-39144-DL</strong> | PSV: Maulana Azad Medical College Verified | Experience: 15 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-warning me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> General, Spinal, and Epidural Anaesthesia for major surgical cases.</li>
                            <li class="mb-1"><strong>Specific:</strong> Fiberoptic Bronchoscopic &amp; Video Laryngoscopy Difficult Airway Management.</li>
                            <li><strong>Special:</strong> Ultrasound-Guided Peripheral Nerve Blocks &amp; Labour Analgesia.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> ACLS / BLS: Valid till Aug 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 40 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Sunita Deshmukh, MD', 'Lead Consultant — Anaesthesiology', 'DOC-CR-ANES-005', 'DMC-39144-DL (Valid till 2028)', 'Maulana Azad Medical College (PSV Verified)', 'Active Level-4 Privileged', ['Pre-Anesthetic Check-up (PAC) Risk Stratification', 'General Anaesthesia with Rapid Sequence Induction', 'Awake Fiberoptic Intubation for Anticipated Difficult Airway', 'USG-Guided Brachial Plexus and Popliteal Sciatic Blocks', 'Continuous Thoracic & Lumbar Epidural Analgesia', 'Post-Anaesthesia Care Unit (PACU) Aldrete Scoring & Discharge'], 'ACLS & ATLS Certified', '40 Credit Hours (ISA Annual National Conference)')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Dr. Vikramaditya Rathore -->
            <div class="col-lg-6 hr-card-item" data-cadre="consultant" data-status="verified" data-title="dr vikramaditya rathore ms orthopaedics joint replacement arthroplasty knee hip">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-user-md me-1"></i> DOC-CR-ORTH-007</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Vikramaditya Rathore, MS</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Senior Consultant — Orthopaedics &amp; Joint Replacement</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>RMC-55210-RJ</strong> | PSV: SMS Medical College Verified | Experience: 11 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-primary me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Closed reduction, plaster casting, polytrauma skeletal stabilization.</li>
                            <li class="mb-1"><strong>Specific:</strong> Open Reduction &amp; Internal Fixation (ORIF), Total Knee Arthroplasty (TKA).</li>
                            <li><strong>Special:</strong> Revision Total Hip Replacement &amp; Arthroscopic ACL Ligament Reconstruction.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> ATLS / BLS: Valid till Jun 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 35 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Vikramaditya Rathore, MS', 'Senior Consultant — Orthopaedics', 'DOC-CR-ORTH-007', 'RMC-55210-RJ (Valid till 2029)', 'SMS Medical College Jaipur (PSV Verified)', 'Active Level-4 Privileged', ['Primary Computer-Navigated Total Knee Arthroplasty (TKA)', 'Total Hip Arthroplasty (THA) Cemented & Uncemented', 'Complex Pelvi-Acetabular Fracture Reconstruction', 'Knee Arthroscopy & ACL/PCL Reconstruction', 'External Fixator Application in Open Compound Fractures', 'Bone Grafting and Musculoskeletal Infection Debridement'], 'ATLS & BLS Certified', '35 Credit Hours (IOA National Conference)')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Sr. Priyamvada Nair -->
            <div class="col-lg-6 hr-card-item" data-cadre="nursing" data-status="certified" data-title="sr priyamvada nair bsc nursing supervisor icu haemodynamic crrt acls">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-user-nurse me-1"></i> NUR-CR-ICU-014</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Sr. Priyamvada Nair, B.Sc (Nursing)</h5>
                    <span class="small text-success fw-semibold mb-2 d-block">Nursing Supervisor — Medical &amp; Surgical ICU</span>
                    <p class="small text-muted mb-3">Nursing Council Reg: <strong>KNC-RN-92041</strong> | PSV: Kerala Nurses &amp; Midwives Council Verified | Experience: 9 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-success me-1"></i> Authorized Nursing Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Vital signs monitoring, IV line cannulation, medication administration with 5-Rights.</li>
                            <li class="mb-1"><strong>Specific:</strong> Arterial blood gas (ABG) sampling, central line dressing with chlorhexidine.</li>
                            <li><strong>Special:</strong> Continuous Renal Replacement Therapy (CRRT) priming, IABP console monitoring.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> AHA Certified ACLS / BLS: 2028</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CNE Hours: 28 / 20 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Sr. Priyamvada Nair, B.Sc (Nursing)', 'Nursing Supervisor — ICU', 'NUR-CR-ICU-014', 'KNC-RN-92041 (Valid till 2030)', 'Kerala Nurses and Midwives Council (PSV Verified)', 'Active Level-3 Privileged', ['Advanced ICU Hemodynamic & Glasgow Coma Scale (GCS) Monitoring', 'Dual Nursing Verification for High-Alert Drugs and Electrolytes', 'Aseptic Central Line & Foley Catheter Maintenance Bundles', 'ABG Sampling and Arterial Line Blood Withdrawal', 'Ventilator Circuit Maintenance & Endotracheal Suctioning', 'Code Blue CPR Chest Compressions & Emergency Drug Draw'], 'ACLS & BLS Certified (AHA)', '28 CNE Credit Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. Dr. Farhan Akhtar -->
            <div class="col-lg-6 hr-card-item" data-cadre="rmo" data-status="verified" data-title="dr farhan akhtar mbbs mem emergency medicine physician triage fast usg chest tube rsi">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-user-md me-1"></i> DOC-CR-EMER-009</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Farhan Akhtar, MBBS, MEM</h5>
                    <span class="small text-danger fw-semibold mb-2 d-block">Emergency Physician &amp; In-Charge — Trauma Casualty</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>UPMC-74128-UP</strong> | PSV: King George’s Medical University Verified | Experience: 8 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-danger me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Priority 1-3 Triage, Medico-Legal Case (MLC) certification, basic suturing.</li>
                            <li class="mb-1"><strong>Specific:</strong> Point-of-Care FAST Ultrasound, Rapid Sequence Intubation (RSI).</li>
                            <li><strong>Special:</strong> Emergency Intercostal Chest Drainage (ICD) Tube Thoracostomy.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> ACLS / ATLS / PALS: Valid till 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 30 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Farhan Akhtar, MBBS, MEM', 'Emergency Physician', 'DOC-CR-EMER-009', 'UPMC-74128-UP (Valid till 2028)', 'KGMU Lucknow (PSV Verified)', 'Active Level-3 Privileged', ['Immediate Resuscitation in Acute Polytrauma and Shock', 'Rapid Sequence Intubation (RSI) in Emergency Department', 'Point-of-Care Ultrasound (e-FAST) for Hemoperitoneum/Pneumothorax', 'Emergency Intercostal Drainage (ICD) Tube Insertion', 'Synchronized Cardioversion & Defibrillation', 'Procedural Sedation and Analgesia in ED'], 'ACLS, ATLS, PALS Certified', '30 CME Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. Sr. Anjali Sharma -->
            <div class="col-lg-6 hr-card-item" data-cadre="surgical" data-status="certified" data-title="sr anjali sharma post basic bsc nursing operation theatre ot lead who surgical checklist">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-user-nurse me-1"></i> NUR-CR-OT-018</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Sr. Anjali Sharma, PB B.Sc (Nursing)</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Operation Theatre Lead Nurse — Surgical Services</span>
                    <p class="small text-muted mb-3">Nursing Council Reg: <strong>DNC-RN-88319</strong> | PSV: Delhi Nursing Council Verified | Experience: 10 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-primary me-1"></i> Authorized Surgical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Aseptic scrub preparation, surgical drape technique, gowning and gloving.</li>
                            <li class="mb-1"><strong>Specific:</strong> WHO Surgical Safety Checklist (Time-Out) coordination and documentation.</li>
                            <li><strong>Special:</strong> Laparoscopic / Robotic surgical tower setup, micro-vascular instrument counts.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> BLS / OT Sterility Certified: 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CNE Hours: 26 / 20 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Sr. Anjali Sharma, PB B.Sc (Nursing)', 'OT Lead Nurse', 'NUR-CR-OT-018', 'DNC-RN-88319 (Valid till 2029)', 'Delhi Nursing Council (PSV Verified)', 'Active Level-3 Privileged', ['WHO Surgical Safety Checklist Execution (Sign-in, Time-out, Sign-out)', 'Scrub and Circulating Nurse Duties in General, Ortho, and Onco OT', 'Pre- and Post-Procedure Surgical Gauze and Instrument Count', 'Biological Spore Indicator & CSSD Bowie-Dick Verification', 'Electrosurgical Cautery & Laser Safety Management', 'Specimen Handling, Formalin Labeling, and Biopsy Register Log'], 'BLS & OT Infection Control Certified', '26 CNE Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9. Mr. Tanmay Sengupta -->
            <div class="col-lg-6 hr-card-item" data-cadre="paramedical" data-status="verified" data-title="mr tanmay sengupta bsc perfusion technology clinical perfusionist cpb ecmo act">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-navy"><i class="fas fa-heart-pulse me-1"></i> TECH-CR-PERF-002</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Mr. Tanmay Sengupta, B.Sc Perfusion</h5>
                    <span class="small text-navy fw-semibold mb-2 d-block">Chief Clinical Perfusionist — CTVS Department</span>
                    <p class="small text-muted mb-3">Professional Reg: <strong>ISECT-CP-304</strong> | PSV: Manipal Academy of Higher Education Verified | Experience: 10 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-primary me-1"></i> Authorized Perfusion Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Cardiopulmonary Bypass (CPB) machine priming and circuit safety tests.</li>
                            <li class="mb-1"><strong>Specific:</strong> Intra-operative Activated Clotting Time (ACT) titration and blood gas monitoring.</li>
                            <li><strong>Special:</strong> Veno-Arterial (VA) and Veno-Venous (VV) ECMO circuit initiation.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> BLS / ACLS: Valid till Apr 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Training Hours: 25 / 20 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Mr. Tanmay Sengupta, B.Sc Perfusion', 'Chief Clinical Perfusionist', 'TECH-CR-PERF-002', 'ISECT-CP-304 (Valid till 2028)', 'Manipal Academy of Higher Education (PSV Verified)', 'Active Level-3 Privileged', ['Cardiopulmonary Bypass (Heart-Lung Machine) Operation in CABG/Valves', 'Extracorporeal Membrane Oxygenation (ECMO) Circuit Maintenance', 'Cell Saver Autologous Blood Recovery Management', 'Blood Cardioplegia Delivery and Temperature Regulation (Hypothermia)', 'Activated Clotting Time (ACT) Heparin and Protamine Titration', 'Emergency CPB Trouble-Shooting and Hand-Cranking Protocols'], 'ACLS & ECMO Specialist Certified', '25 Training Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 10. Dr. Shalini Varma -->
            <div class="col-lg-6 hr-card-item" data-cadre="diagnostics" data-status="verified" data-title="dr shalini varma md pathology blood centre lab incharge transfusion apheresis">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-flask-vial me-1"></i> DOC-CR-PATH-004</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Shalini Varma, MD (Pathology)</h5>
                    <span class="small text-warning fw-semibold mb-2 d-block">Head &amp; In-Charge — Blood Centre &amp; Diagnostic Pathology</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>GMC-29401-GUJ</strong> | PSV: BJ Medical College Verified | Experience: 13 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-warning me-1"></i> Authorized Diagnostic Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Histopathology reporting, frozen sections, cytopathology examination.</li>
                            <li class="mb-1"><strong>Specific:</strong> Gel card automated cross-matching, blood component separation (PRBC, FFP, Platelets).</li>
                            <li><strong>Special:</strong> Therapeutic Apheresis, Single Donor Platelet (SDP) extraction.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> NABH Assessor &amp; BLS: Active</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 42 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Shalini Varma, MD (Pathology)', 'Blood Centre & Lab In-Charge', 'DOC-CR-PATH-004', 'GMC-29401-GUJ (Valid till 2029)', 'BJ Medical College Ahmedabad (PSV Verified)', 'Active Level-4 Privileged', ['Blood Component Separation (PRBC, FFP, Platelet Concentrate, Cryo)', 'Automated Gel Card Cross-Matching & Antibody Screening', 'Plateletpheresis / Single Donor Platelet (SDP) Procedures', 'Transfusion Reaction Investigation and Haemovigilance Reporting', 'External Quality Assurance Scheme (EQAS) Validation', 'Critical Laboratory Panic Value Verification & Telephonic Read-back'], 'NABH Blood Bank Assessor Certified', '42 CME Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 11. Sr. Deepa Kurian -->
            <div class="col-lg-6 hr-card-item" data-cadre="nursing" data-status="certified" data-title="sr deepa kurian gnm infection control nurse hic surveillance cauti clabsi bundle">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-shield-virus me-1"></i> NUR-CR-HIC-008</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Sr. Deepa Kurian, GNM, ICN</h5>
                    <span class="small text-success fw-semibold mb-2 d-block">Lead Infection Control Nurse (ICN) — Quality Dept</span>
                    <p class="small text-muted mb-3">Nursing Council Reg: <strong>TNC-RN-77140-TN</strong> | PSV: Tamil Nadu Nursing Council Verified | Experience: 8 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-success me-1"></i> Authorized Quality Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> Daily ICU healthcare-associated infection surveillance (VAP, CLABSI, CAUTI).</li>
                            <li class="mb-1"><strong>Specific:</strong> Hand hygiene observational audits (WHO 5 Moments target &gt;90%).</li>
                            <li><strong>Special:</strong> Needle-stick injury post-exposure prophylaxis (PEP) coordination.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> Certified ICN &amp; BLS: 2027</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CNE Hours: 24 / 20 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Sr. Deepa Kurian, GNM, ICN', 'Lead Infection Control Nurse', 'NUR-CR-HIC-008', 'TNC-RN-77140-TN (Valid till 2028)', 'Tamil Nadu Nursing Council (PSV Verified)', 'Active Level-3 Privileged', ['Daily Active ICU & Ward Surveillance for Hospital Acquired Infections', 'Conducting WHO 5 Moments of Hand Hygiene Compliance Audits', 'Immediate Investigation and Registering of Needle-Stick Injuries', 'Air Sampling & OT Microbiological Swab Surveillance', 'Bio-Medical Waste Color-Coded Segregation Audits', 'Staff Induction Training on Standard Isolation & Barrier Precautions'], 'Certified Infection Control Professional', '24 CNE Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 12. Dr. Rohan Kapoor -->
            <div class="col-lg-6 hr-card-item" data-cadre="consultant" data-status="verified" data-title="dr rohan kapoor md paediatrics neonatology nicu nals surfactant uvc">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-baby me-1"></i> DOC-CR-NICU-006</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> PSV Verified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Dr. Rohan Kapoor, MD (Paediatrics)</h5>
                    <span class="small text-danger fw-semibold mb-2 d-block">Consultant Neonatologist &amp; In-Charge — Level-III NICU</span>
                    <p class="small text-muted mb-3">Medical Council Reg: <strong>KMC-66320-KA</strong> | PSV: Bangalore Medical College Verified | Experience: 9 Years.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-id-badge text-danger me-1"></i> Authorized Clinical Privileges:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1"><strong>Core:</strong> High-risk delivery room resuscitation, newborn assessment, phototherapy.</li>
                            <li class="mb-1"><strong>Specific:</strong> Umbilical Venous / Arterial Catheter (UVC/UAC) cannulation, Surfactant therapy.</li>
                            <li><strong>Special:</strong> High-Frequency Oscillatory Ventilation (HFOV) &amp; Total Body Hypothermia for HIE.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-certificate text-danger me-1"></i> NALS / NRP Lead Trainer: 2028</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> CME Hours: 36 / 30 required</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openStaffModal('Dr. Rohan Kapoor, MD (Paediatrics)', 'Consultant Neonatologist — NICU', 'DOC-CR-NICU-006', 'KMC-66320-KA (Valid till 2029)', 'BMCRI Bangalore (PSV Verified)', 'Active Level-4 Privileged', ['Neonatal Resuscitation in Delivery Suite for Extreme Preterm (<28 weeks)', 'Endotracheal Intubation and Surfactant Administration (LISA Technique)', 'Umbilical Venous and Arterial Line Placement (UVC / UAC)', 'High Frequency Oscillatory Ventilation (HFOV)', 'Therapeutic Hypothermia (Cooling Therapy) for Birth Asphyxia', 'Exchange Transfusion in Severe Neonatal Hyperbilirubinemia'], 'NRP / NALS Certified Lead Instructor', '36 CME Hours')">
                                <i class="fas fa-eye me-1"></i> Privileging Scope
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Dossier</a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- End HR Grid -->

        <!-- No Results Fallback -->
        <div id="noHrResults" class="card card-max p-5 text-center mt-4 d-none">
            <div class="text-muted fs-1 mb-2"><i class="fas fa-user-slash"></i></div>
            <h5 class="fw-bold text-navy mb-1">No Matching Staff or Privileges Found</h5>
            <p class="text-muted small mb-3">Try adjusting your search keywords, clearing filters, or switching staff cadres.</p>
            <div>
                <button type="button" class="btn btn-sm btn-outline-navy" onclick="resetHrFilters()">
                    <i class="fas fa-rotate-left me-1"></i> Reset All Filters
                </button>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================
     4-PILLAR HR & CREDENTIALING ARCHITECTURE
========================================================= -->
<section class="py-5 bg-surface-alt border-top border-bottom">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-blue mb-2"><i class="fas fa-id-card me-1"></i> NABH HRM Framework</span>
            <h2 class="display-6 fw-bold text-navy mb-2">4-Pillar Human Resource &amp; Privileging Architecture</h2>
            <p class="text-muted">How medical and nursing personnel are vetted, authorized for high-risk procedures, and continually trained under NABH 5th Edition standards.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem;">
                        <span>1</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Primary Source Verification (PSV)</h5>
                    <p class="small text-muted mb-0">Direct 100% verification of MBBS, Post-Graduate degrees, and medical council registrations from issuing universities before clinical posting.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #10b981, #059669);">
                        <span>2</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Competency &amp; Logbook Review</h5>
                    <p class="small text-muted mb-0">Departmental Credentials Committee evaluates surgical logbooks, case histories, complication rates, and diagnostic precision.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #f59e0b, #d97706);">
                        <span>3</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Clinical Privileging Matrix</h5>
                    <p class="small text-muted mb-0">Issuance of Core vs Specific vs High-Risk procedural privileges signed jointly by Medical Superintendent and HOD.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #6366f1, #4f46e5);">
                        <span>4</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Continuous CME &amp; Re-Privileging</h5>
                    <p class="small text-muted mb-0">Mandatory annual BLS/ACLS drills, 30+ CME hours, and formal 2-year clinical re-credentialing audit cycles.</p>
                </div>
            </div>
        </div>

        <!-- Statutory Council Notice Card -->
        <div class="card card-max p-4 mt-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-3 text-center text-lg-start">
                    <span class="badge badge-max badge-max-rose mb-1"><i class="fas fa-triangle-exclamation me-1"></i> Statutory Compliance</span>
                    <h5 class="fw-bold text-navy mb-0">Council Expiry Shield</h5>
                </div>
                <div class="col-lg-9">
                    <p class="small text-muted mb-0">
                        Our digital credentialing engine sends automated SMS and email alerts at <strong>60 days, 30 days, and 15 days</strong> prior to State Medical Council / Nursing Council registration expiration. Doctors with un-renewed licenses are automatically flagged and restricted from signing digital EMR prescriptions to maintain 100% legal compliance.
                    </p>
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
        <div class="card card-max p-5 text-center" style="background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);">
            <div class="max-w-700 mx-auto">
                <span class="badge badge-max badge-max-emerald mb-2"><i class="fas fa-users-gear text-success me-1"></i> Hospital Quality Management</span>
                <h3 class="display-6 fw-bold text-navy mb-3">Digitize Doctor Privileging &amp; Staff Training</h3>
                <p class="text-muted mb-4">Empower Medical Superintendents, HR Directors, and NABH coordinators with real-time privileging matrices, automated council renewal alerts, and instant audit compliance reports.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Sign In to HR Portal
                    </a>
                    <a href="<?= site_url('contact') ?>" class="btn btn-outline-navy">
                        <i class="fas fa-calendar-check me-1"></i> Request Staffing Audit Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     INTERACTIVE STAFF CREDENTIAL & PRIVILEGE MODAL
========================================================= -->
<div class="modal fade" id="staffCredentialModal" tabindex="-1" aria-labelledby="staffCredentialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge badge-max badge-max-blue" id="modalStaffCode">DOC-CR-000</span>
                        <span class="badge badge-max badge-max-emerald" id="modalStaffStatus">Active Privileged</span>
                    </div>
                    <h5 class="modal-title fw-bold text-navy mb-0" id="modalStaffName">Dr. Full Name</h5>
                    <span class="small text-primary fw-semibold" id="modalStaffDesignation">Specialty Designation</span>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">State Medical Council Registration</span>
                            <strong class="text-navy small" id="modalStaffReg">MCI-00000</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Primary Source Verification (PSV)</span>
                            <strong class="text-navy small" id="modalStaffPsv">University Verified</strong>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Resuscitation Certifications</span>
                            <strong class="text-danger small" id="modalStaffCert"><i class="fas fa-certificate me-1"></i> ACLS &amp; BLS Certified</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Annual CME / CNE Credits</span>
                            <strong class="text-success small" id="modalStaffCme"><i class="fas fa-graduation-cap me-1"></i> 30+ Credit Hours</strong>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="fw-bold text-navy mb-2"><i class="fas fa-list-check text-primary me-1"></i> Approved Procedural Privileges:</h6>
                    <div class="bg-surface-alt p-3 rounded-3">
                        <ul class="mb-0 ps-3 text-muted small" id="modalStaffPrivileges">
                            <!-- Populated dynamically via JS -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top py-3 px-4 d-flex justify-content-between">
                <span class="small text-muted"><i class="fas fa-shield-halved text-success me-1"></i> Credentials Committee Approved</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Sign In to View Full Dossier
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
let currentHrSearch = '';
let currentHrCadre = 'all';
let currentHrStatus = 'all';

function applyHrFilters() {
    const cards = document.querySelectorAll('.hr-card-item');
    let visibleCount = 0;

    cards.forEach(card => {
        const cadre = card.getAttribute('data-cadre') || '';
        const status = card.getAttribute('data-status') || '';
        const text = (card.getAttribute('data-title') || '') + ' ' + (card.innerText || '').toLowerCase();

        const matchesCadre = (currentHrCadre === 'all' || cadre === currentHrCadre);
        const matchesStatus = (currentHrStatus === 'all' || status === currentHrStatus);
        const matchesSearch = (!currentHrSearch || text.includes(currentHrSearch.toLowerCase()));

        if (matchesCadre && matchesStatus && matchesSearch) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Update Counter
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noHrResults');

    if (resultsCount) {
        resultsCount.innerText = `Showing ${visibleCount} staff credential dossier${visibleCount === 1 ? '' : 's'}`;
    }

    if (noResults) {
        if (visibleCount === 0) {
            noResults.classList.remove('d-none');
        } else {
            noResults.classList.add('d-none');
        }
    }
}

function searchHrQuery(val) {
    currentHrSearch = val.trim();
    applyHrFilters();
}

function filterByCadre(val) {
    currentHrCadre = val;
    // Sync quick buttons
    document.querySelectorAll('.hr-quick-btn').forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light', 'border');
    });
    const matchBtn = Array.from(document.querySelectorAll('.hr-quick-btn')).find(b => b.textContent.trim().toLowerCase().includes(val.replace('-', ' ')));
    if (matchBtn) {
        matchBtn.classList.remove('btn-light', 'border');
        matchBtn.classList.add('btn-primary', 'active');
    }
    applyHrFilters();
}

function filterByStatus(val) {
    currentHrStatus = val;
    applyHrFilters();
}

function filterHrCategory(cadre, btnElement) {
    currentHrCadre = cadre;
    
    // Sync Dropdown
    const cadreSelect = document.getElementById('cadreSelectFilter');
    if (cadreSelect) {
        cadreSelect.value = cadre;
    }

    // Toggle Button styling
    document.querySelectorAll('.hr-quick-btn').forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light', 'border');
    });
    if (btnElement) {
        btnElement.classList.remove('btn-light', 'border');
        btnElement.classList.add('btn-primary', 'active');
    }

    applyHrFilters();
}

function resetHrFilters() {
    currentHrSearch = '';
    currentHrCadre = 'all';
    currentHrStatus = 'all';

    const searchInput = document.getElementById('hrSearchInput');
    const cadreSelect = document.getElementById('cadreSelectFilter');
    const statusSelect = document.getElementById('statusSelectFilter');

    if (searchInput) searchInput.value = '';
    if (cadreSelect) cadreSelect.value = 'all';
    if (statusSelect) statusSelect.value = 'all';

    document.querySelectorAll('.hr-quick-btn').forEach((btn, index) => {
        if (index === 0) {
            btn.classList.remove('btn-light', 'border');
            btn.classList.add('btn-primary', 'active');
        } else {
            btn.classList.remove('btn-primary', 'active');
            btn.classList.add('btn-light', 'border');
        }
    });

    applyHrFilters();
}

function openStaffModal(name, designation, code, reg, psv, status, privileges, cert, cme) {
    document.getElementById('modalStaffName').innerText = name;
    document.getElementById('modalStaffDesignation').innerText = designation;
    document.getElementById('modalStaffCode').innerText = code;
    document.getElementById('modalStaffReg').innerText = reg;
    document.getElementById('modalStaffPsv').innerText = psv;
    document.getElementById('modalStaffStatus').innerText = status;
    document.getElementById('modalStaffCert').innerHTML = '<i class="fas fa-certificate me-1"></i> ' + cert;
    document.getElementById('modalStaffCme').innerHTML = '<i class="fas fa-graduation-cap me-1"></i> ' + cme;

    const privList = document.getElementById('modalStaffPrivileges');
    privList.innerHTML = '';
    if (Array.isArray(privileges)) {
        privileges.forEach(p => {
            const li = document.createElement('li');
            li.className = 'mb-2';
            li.innerText = p;
            privList.appendChild(li);
        });
    }

    const modalEl = document.getElementById('staffCredentialModal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
}
</script>
