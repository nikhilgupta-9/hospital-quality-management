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
                <h1 class="page-banner-title">Equipment &amp; Utilities Grid</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Equipment &amp; Utilities Grid</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     EQUIPMENT & UTILITIES DIRECTORY SECTION
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">

        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-gold mb-2"><i class="fas fa-microscope text-warning me-1"></i> Facility &amp; Biomedical Safety (FMS)</span>
            <h2 class="display-6 fw-bold text-navy mb-2">Medical Equipment &amp; Utility Governance</h2>
            <p class="text-muted">Centralized monitoring of biomedical assets, NABL accredited calibrations, preventive maintenance (PPM), medical gas pipeline safety, and critical utility uptime.</p>
        </div>

        <!-- Metrics & Feature Highlights Strip -->
        <div class="row g-3 mb-5">
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-success fs-3 mb-1"><i class="fas fa-screwdriver-wrench"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">100%</h3>
                    <span class="small text-muted">NABL Calibration Pass</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-primary fs-3 mb-1"><i class="fas fa-bolt"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">99.8%</h3>
                    <span class="small text-muted">Life Support Uptime</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-warning fs-3 mb-1"><i class="fas fa-calendar-check"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">24/7</h3>
                    <span class="small text-muted">PPM &amp; Breakdown Log</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card card-max p-3 text-center h-100">
                    <div class="text-danger fs-3 mb-1"><i class="fas fa-shield-halved"></i></div>
                    <h3 class="h4 fw-bold text-navy mb-0">100%</h3>
                    <span class="small text-muted">Statutory NOCs Active</span>
                </div>
            </div>
        </div>

        <!-- Search & Filter Card (Using Common Card-Max) -->
        <div class="card card-max p-4 mb-5">
            <div class="row g-3 align-items-center">
                <!-- Search Input -->
                <div class="col-lg-5 col-md-12">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-magnifying-glass text-primary me-1"></i> Search Assets &amp; Utility Plants</label>
                    <input type="text" id="equipmentSearchInput" class="form-control" placeholder="Search equipment, asset ID, model (e.g. Ventilator, CT Scanner, MGPS, STP, DG)..." onkeyup="searchEquipmentQuery(this.value)">
                </div>

                <!-- Equipment System Dropdown -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-layer-group text-primary me-1"></i> Asset Category / System</label>
                    <select id="categorySelectFilter" class="form-select" onchange="filterByCategory(this.value)">
                        <option value="all">All Equipment &amp; Utility Systems</option>
                        <option value="life-support">Life Support &amp; ICU Assets</option>
                        <option value="radiology">Radiology &amp; Imaging (AERB)</option>
                        <option value="surgical">OT &amp; Surgical Towers</option>
                        <option value="mgps">Medical Gas Pipeline (MGPS)</option>
                        <option value="facility">Facility Utilities (HVAC / STP / DG)</option>
                        <option value="lab-cold">Diagnostics &amp; Cold Chain</option>
                    </select>
                </div>

                <!-- Maintenance Status Selector -->
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small fw-semibold text-navy mb-1"><i class="fas fa-sliders text-primary me-1"></i> Maintenance Status</label>
                    <select id="statusSelectFilter" class="form-select" onchange="filterByStatus(this.value)">
                        <option value="all">All Operational Statuses</option>
                        <option value="calibrated">NABL Calibrated &amp; Active</option>
                        <option value="statutory">Statutory Verified</option>
                        <option value="ppm-due">Upcoming PPM Schedule</option>
                    </select>
                </div>
            </div>

            <!-- Quick System Filter Buttons -->
            <div class="pt-3 border-top mt-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="small fw-bold text-navy me-1"><i class="fas fa-tags text-primary me-1"></i> Quick Filters:</span>
                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 py-1 fw-semibold eq-quick-btn active" onclick="filterEqCategory('all', this)">
                        All Assets (12)
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold eq-quick-btn" onclick="filterEqCategory('life-support', this)">
                        ICU Life Support
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold eq-quick-btn" onclick="filterEqCategory('radiology', this)">
                        Imaging / AERB
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold eq-quick-btn" onclick="filterEqCategory('surgical', this)">
                        OT Systems
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold eq-quick-btn" onclick="filterEqCategory('mgps', this)">
                        MGPS Oxygen
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold eq-quick-btn" onclick="filterEqCategory('facility', this)">
                        HVAC / STP / DG
                    </button>
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 py-1 fw-semibold eq-quick-btn" onclick="filterEqCategory('lab-cold', this)">
                        Cold Chain / Lab
                    </button>
                </div>
            </div>
        </div>

        <!-- Results Counter & Action Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="small fw-semibold text-muted" id="resultsCount">Showing all 12 core biomedical assets &amp; utility plants</span>
            </div>
            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">
                <i class="fas fa-plus me-1"></i> Register Asset / Log PPM
            </a>
        </div>

        <!-- Equipment Grid Cards (Using Common card-max) -->
        <div class="row g-4" id="equipmentGrid">

            <!-- 1. MAX-EQ-ICU-001 -->
            <div class="col-lg-6 eq-card-item" data-category="life-support" data-status="calibrated" data-title="hamilton c6 advanced icu mechanical ventilator life support fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-lungs me-1"></i> MAX-EQ-ICU-001</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> NABL Calibrated</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Hamilton-C6 Advanced ICU Mechanical Ventilator</h5>
                    <span class="small text-danger fw-semibold mb-2 d-block">Critical Care Medicine — Main ICU Bed 04</span>
                    <p class="small text-muted mb-3">Serial: <strong>HAM-C6-88410</strong> | OEM: Hamilton Medical | Battery Backup: 4.5 Hours | NABL Cert: <strong>NABL-BME-2026-091</strong>.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-danger me-1"></i> Maintenance &amp; Safety Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Daily pre-operational circuit tightness &amp; galvanic oxygen sensor calibration passed.</li>
                            <li class="mb-1">Quarterly preventive maintenance (PPM) completed; HEPA filter replacement valid.</li>
                            <li>Electrical safety analyzer test: Chassis leakage current &lt;100 µA (IEC 60601-1).</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-danger me-1"></i> NABH Element: FMS.4 / COP.3</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Calibration: 18 Nov 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Hamilton-C6 Advanced ICU Ventilator', 'MAX-EQ-ICU-001', 'Main ICU (Bed 04)', 'HAM-C6-88410 (Hamilton Medical)', 'NABL-BME-2026-091 (Valid till Nov 2026)', 'IEC 60601-1 Medical Electrical Safety Passed', 'Quarterly (Every 90 Days)', ['Daily Pre-Use Self Test (Tightness & Flow Sensor Calibration)', 'Expiratory Valve Membrane Inspection and Autoclaving', 'Pneumatic Pressure & Tidal Volume Verification using Flow Analyzer', 'Battery Discharge & In-Built Turbine Performance Check', 'Electrical Safety Testing (Chassis Leakage <100 µA)', 'HEPA Dust and Microbial Air Filter Replacement Log'], '24/7 OEM Hotline & In-House Biomedical Resident')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. MAX-EQ-CARD-004 -->
            <div class="col-lg-6 eq-card-item" data-category="life-support" data-status="calibrated" data-title="philips intellivue mx800 multi-parameter monitor defibrillator fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-heart-pulse me-1"></i> MAX-EQ-CARD-004</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> NABL Calibrated</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Philips IntelliVue MX800 Multi-Parameter Monitor &amp; Defib</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Emergency Resuscitation — Crash Cart Bay 01</span>
                    <p class="small text-muted mb-3">Serial: <strong>PH-MX800-4109</strong> | OEM: Philips Healthcare | Energy: 200J Biphasic SMART | NABL Cert: <strong>NABL-BME-2026-114</strong>.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-primary me-1"></i> Maintenance &amp; Safety Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Daily 30-Joule discharge verification and internal diagnostic self-test passed.</li>
                            <li class="mb-1">NIBP, SpO2, IBP, and 12-lead ECG simulator accuracy verified within &plusmn;1%.</li>
                            <li>Adult and paediatric defibrillation paddles and pacing pads stocked and sterile.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Element: FMS.4 / COP.3</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Calibration: 22 Dec 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Philips IntelliVue Multi-Parameter Monitor & Defib', 'MAX-EQ-CARD-004', 'Emergency Department (Bay 01)', 'PH-MX800-4109 (Philips)', 'NABL-BME-2026-114 (Valid till Dec 2026)', 'IEC 60601-2-4 Defibrillator Safety Passed', 'Monthly & Shift Self-Test', ['Daily 30-Joule Internal Discharge Test (Shift Handover Log)', 'ECG Rhythm Simulation (Sinus, VF, VT, Asystole) Validation', 'NIBP Pressure Transducer Calibration using Calibrated Manometer', 'SpO2 Finger Probe Optical Alignment and Signal Quality Audit', 'Defibrillator Energy Delivery Joules Measurement on Fluke Analyzer', 'Sync-Cardioversion R-Wave Trigger Timing Accuracy Check'], 'Crash Cart Resuscitation Team & Biomedical Engineering')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. MAX-EQ-RAD-002 -->
            <div class="col-lg-6 eq-card-item" data-category="radiology" data-status="statutory" data-title="ge revolution 128-slice ct scanner aerb approved radiation safety fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-radiation me-1"></i> MAX-EQ-RAD-002</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-certificate me-1"></i> AERB License Valid</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">GE Revolution 128-Slice Diagnostic CT Scanner</h5>
                    <span class="small text-danger fw-semibold mb-2 d-block">Radiology &amp; Imaging — Gantry Suite 02</span>
                    <p class="small text-muted mb-3">Serial: <strong>GE-REV128-5921</strong> | AERB QA Reg: <strong>AERB/RSD/CT/2024/912</strong> | Shielding: 2.0 mm Lead (Pb) Equivalent.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-danger me-1"></i> Maintenance &amp; Radiation Safety:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Radiation Protection Officer (RPO) bi-annual radiation scatter survey verified.</li>
                            <li class="mb-1">TLD badge personal dosimetry monitoring for 100% radiology staff.</li>
                            <li>CTDIvol dose optimization protocol active with ASiR-V iterative reconstruction.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-danger me-1"></i> NABH Element: FMS.4 / COP.9</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> AERB License: Till Mar 2028</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('GE Revolution 128-Slice CT Scanner', 'MAX-EQ-RAD-002', 'Radiology Department (Ground Floor)', 'GE-REV128-5921 (GE Healthcare)', 'AERB/RSD/CT/2024/912 (Valid till Mar 2028)', 'AERB Safety Code for Medical Diagnostic X-Ray Equipment', 'Bi-Annual AERB QA Audit', ['CT Number Accuracy & Water Phantom Homogeneity Verification', 'High-Contrast Spatial Resolution and Low-Contrast Detectability', 'Radiation Beam Width & Slice Thickness Collimation Audit', 'CT Dose Index (CTDIw / CTDIvol) Measurement with Ion Chamber', 'Lead Apron (0.5mm Pb) Fluoroscopic Integrity Inspection', 'Radiation Warning Red Light Interlock Operation Test'], 'Certified Radiological Safety Officer (RSO Level-III)')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. MAX-EQ-OT-007 -->
            <div class="col-lg-6 eq-card-item" data-category="surgical" data-status="calibrated" data-title="karl storz rubina 4k 3d laparoscopic surgical tower fms.4 cop.7">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-scissors me-1"></i> MAX-EQ-OT-007</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> NABL Calibrated</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Karl Storz Rubina 4K 3D Laparoscopic Surgical Tower</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Operation Theatre Suite — Major Laparoscopy OT 01</span>
                    <p class="small text-muted mb-3">Serial: <strong>KS-RUB-9921</strong> | OEM: Karl Storz | Optical Resolution: 4K UHD NIR/ICG | NABL Cert: <strong>NABL-BME-2026-078</strong>.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-primary me-1"></i> Maintenance &amp; Sterility Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">High-flow CO2 insufflator pressure calibration (&plusmn;1 mmHg accuracy) verified.</li>
                            <li class="mb-1">Xenon/LED cold light source intensity &amp; fiberoptic cable light transmission check passed.</li>
                            <li>Autoclavable 4K endoscope optical alignment and STERRAD plasma validation.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Element: FMS.4 / COP.7</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Calibration: 14 Jan 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Karl Storz Rubina 4K Laparoscopic Tower', 'MAX-EQ-OT-007', 'Operation Theatre 01 (Major Surgical)', 'KS-RUB-9921 (Karl Storz)', 'NABL-BME-2026-078 (Valid till Jan 2027)', 'IEC 60601-2-18 Endoscopic Equipment Safety Passed', 'Quarterly Comprehensive Maintenance', ['CO2 Insufflator High-Flow Rate & Max Intra-Abdominal Pressure Check', 'LED Light Source Color Temperature & Lux Measurement', '4K Camera Head White Balance & NIR Fluorescence Imaging Test', 'Electrosurgical Cautery Unit HF Leakage and Monopolar/Bipolar Output', 'Camera Cable & Light Guide Fiber Integrity Inspection', 'STERRAD Hydrogen Peroxide Gas Plasma Sterilization Log Review'], 'OT Biomedical In-Charge & Senior Laparoscopic Scrub Nurse')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. MAX-EQ-MGPS-001 -->
            <div class="col-lg-6 eq-card-item" data-category="mgps" data-status="statutory" data-title="medical gas pipeline system central oxygen manifold liquid medical oxygen peso fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-bottle-droplet me-1"></i> MAX-EQ-MGPS-001</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-certificate me-1"></i> PESO License Valid</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">MGPS Central Oxygen Plant &amp; 10 KL LMO Cryogenic Tank</h5>
                    <span class="small text-success fw-semibold mb-2 d-block">Facility &amp; Gas Utilities — Cryogenic Yard</span>
                    <p class="small text-muted mb-3">Capacity: <strong>10,000 Litres LMO + 2x20 Manifold Backup</strong> | PESO Approval: <strong>PESO/OX/2023/441</strong> | Standard: HTM 02-01.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-success me-1"></i> Maintenance &amp; Safety Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Automated pneumatic switchover from primary LMO tank to manifold bank active.</li>
                            <li class="mb-1">Master alarm telemetry sensors in ICU, OT, and Security Control Room tested weekly.</li>
                            <li>Line pressure regulator verified at constant 4.2 bar (O2, N2O, Air 4 bar) &amp; 7 bar (Air).</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-success me-1"></i> NABH Element: FMS.4 / FMS.5</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> PESO License: Till Jun 2028</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('MGPS Central Oxygen Plant & 10 KL LMO Tank', 'MAX-EQ-MGPS-001', 'Central Gas Plant & Utility Yard', 'CRY-LMO-10KL (Inox Air Products)', 'PESO/OX/2023/441 (Valid till Jun 2028)', 'HTM 02-01 & ISO 7396-1 Medical Gas Pipeline Standards', 'Daily Shift Audit & Monthly Full Functional Test', ['Daily Cryogenic Tank Liquid Level & Vaporizer Pressure Monitoring', 'High / Low Line Pressure Alarm Broadcast Test (OT & ICU Stations)', 'Emergency Gas Shutoff Valve (AVSU) Zone Isolation Verification', 'Oxygen Purity Gas Chromatography Analysis (>99.5% IP Grade)', 'Medical Air Compressor Dryer Dew Point Check (<-40°C)', 'Vacuum Plant Quadruple Pump Automated Lead-Lag Cycling'], 'Certified MGPS Plant Engineer & 24/7 Gas Operator')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. MAX-EQ-CSSD-003 -->
            <div class="col-lg-6 eq-card-item" data-category="surgical" data-status="calibrated" data-title="tuttnauer heavy duty double-door autoclave steam sterilizer bowie dick cssd fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-temperature-arrow-up me-1"></i> MAX-EQ-CSSD-003</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> NABL Calibrated</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Tuttnauer Double-Door Steam Sterilizer / Autoclave</h5>
                    <span class="small text-warning fw-semibold mb-2 d-block">Central Sterile Supply Department (CSSD)</span>
                    <p class="small text-muted mb-3">Volume: <strong>600 Litres</strong> | Cycle: 134°C @ 2.2 Bar | NABL Calibration: <strong>NABL-CSSD-2026-033</strong> | Standard: EN 285.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-warning me-1"></i> Sterilization Validation Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Daily morning Bowie-Dick steam penetration and air removal test passed.</li>
                            <li class="mb-1">Geobacillus stearothermophilus biological spore ampoule test passed weekly.</li>
                            <li>Physical batch printout graph archiving for every surgical sterilization load.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-warning me-1"></i> NABH Element: FMS.4 / HIC.2</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Calibration: 05 Dec 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Tuttnauer Double-Door Autoclave (CSSD)', 'MAX-EQ-CSSD-003', 'Central Sterile Supply Dept (Dirty/Clean Barrier)', 'TUTT-600L-4419 (Tuttnauer)', 'NABL-CSSD-2026-033 (Valid till Dec 2026)', 'EN 285 & ISO 17665 Steam Sterilization Validation', 'Daily Physical/Chemical & Weekly Biological Cycle', ['Daily Bowie-Dick Vacuum Leak & Air Removal Test (Type 2 Indicator)', 'Class 5 & Class 6 Chemical Integrating Indicators in Every Pack', 'Geobacillus Stearothermophilus Biological Spore Incubation (24 Hrs)', 'Chamber Pressure Vessel Hydrostatic Pressure Test Certification', 'Double-Door Interlock Prevents Simultaneous Opening of Both Sides', 'Clean Steam Quality & Condensate Non-Condensable Gas Analysis'], 'CSSD In-Charge & Infection Control Officer')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. MAX-UT-HVAC-002 -->
            <div class="col-lg-6 eq-card-item" data-category="facility" data-status="statutory" data-title="ot icu positive pressure ahu hepa filtration system iso class 5 fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-wind me-1"></i> MAX-UT-HVAC-002</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> ISO Class 5 Certified</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">OT &amp; ICU Positive Pressure AHU &amp; HEPA Filtration</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Facility Engineering — HVAC Plant Floor 04</span>
                    <p class="small text-muted mb-3">Air Changes: <strong>24 ACPH</strong> | Filtration: 0.3-Micron Terminal HEPA (99.97%) | Differential Pressure: <strong>+3.5 Pa</strong>.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-primary me-1"></i> Environmental &amp; HVAC Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Continuous positive pressure differential (+2.5 to +5.0 Pa) maintained relative to corridor.</li>
                            <li class="mb-1">Temperature (20°C–22°C) and relative humidity (45%–55%) automated BMS control.</li>
                            <li>Quarterly particulate air count and PAO/DOP HEPA filter integrity test passed.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Element: FMS.4 / HIC.3</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Air Audit: 28 Nov 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('OT & ICU Positive Pressure AHU System', 'MAX-UT-HVAC-002', 'AHU Plant Room 04 (Servicing OT Complex)', 'VOLTAS-AHU-3500CFM', 'HVAC-QA-ISO14644-2026 (Valid till Nov 2026)', 'ISO 14644-1 Cleanroom & NABH OT Guidelines', 'Monthly Filter Wash & Quarterly Particle Count Validation', ['Continuous Magnehelic Gauge Positive Pressure Verification (>2.5 Pa)', 'Laminar Air Flow Air Velocity (0.45 m/s ± 20%) at Operating Table', 'DOP / PAO Aerosol Generator HEPA Filter Leakage Test', 'Non-Viable 0.5 µm & 5.0 µm Particle Count Classification Audit', 'Microbiological Settle Plate Air Samping Surveillance', 'Automated BMS Temperature and Relative Humidity Logging (24x7)'], 'Chief HVAC Engineer & Hospital Infection Control Team')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. MAX-UT-STP-001 -->
            <div class="col-lg-6 eq-card-item" data-category="facility" data-status="statutory" data-title="150 kld sewage effluent treatment plant stp etp pollution control board fms.5">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-water me-1"></i> MAX-UT-STP-001</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-certificate me-1"></i> PCB CTO Valid</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">150 KLD Sewage &amp; Effluent Treatment Plant (STP/ETP)</h5>
                    <span class="small text-success fw-semibold mb-2 d-block">Environmental Engineering — Basement Utility Zone</span>
                    <p class="small text-muted mb-3">Design Capacity: <strong>150 KLD MBBR Technology</strong> | State PCB Consent: <strong>SPCB/CTO/HOSP/2024/718</strong> | Re-use: Flushing &amp; Landscaping.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-success me-1"></i> Pollution Control Board Standards:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Biochemical Oxygen Demand (BOD) &lt; 10 mg/L &amp; Total Suspended Solids (TSS) &lt; 10 mg/L.</li>
                            <li class="mb-1">Dual Stage Disinfection: Sodium Hypochlorite dosing &amp; Activated Carbon/Sand filtration.</li>
                            <li>Monthly accredited third-party NABL water testing and SPCB online portal upload.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-success me-1"></i> NABH Element: FMS.5 / HIC.4</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> PCB CTO: Till Dec 2028</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('150 KLD Sewage & Effluent Treatment Plant', 'MAX-UT-STP-001', 'Basement Utility Yard (STP/ETP Compound)', 'THERMAX-MBBR-150KLD', 'SPCB/CTO/HOSP/2024/718 (Valid till Dec 2028)', 'CPCB & State Pollution Control Board Effluent Discharge Norms', 'Daily Parameter Testing & Monthly NABL Lab Analysis', ['Daily pH (6.5 - 8.5), Residual Chlorine (>1.0 mg/L), and Turbidity Log', 'Biological MBBR Media Aeration Blowers Dual-Redundancy Operation', 'Filter Press Sludge Dewatering and Hazardous Sludge Manifest Log', 'Treated Water Recycling Flowmeter Telemetry Connected to SPCB Server', 'Sodium Hypochlorite Dosing Pump Flow Rate Calibration', 'Inlet vs Outlet COD/BOD Reduction Efficiency (>95% Reduction)'], 'Environmental Safety Officer & Certified STP Plant Operator')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9. MAX-UT-DG-003 -->
            <div class="col-lg-6 eq-card-item" data-category="facility" data-status="calibrated" data-title="500 kva cummins auto mains failure amf diesel generator power backup fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-gold"><i class="fas fa-bolt me-1"></i> MAX-UT-DG-003</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> AMF Synchronized</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">500 kVA Cummins Auto-Mains Failure (AMF) Diesel GenSet</h5>
                    <span class="small text-warning fw-semibold mb-2 d-block">Electrical Engineering — Substation Transformer Yard</span>
                    <p class="small text-muted mb-3">Power Rating: <strong>500 kVA / 400 kW</strong> | Auto-Restoration Time: <strong>&lt; 8.5 Seconds</strong> | Fuel Storage: 990 Litres Diesel.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-warning me-1"></i> Emergency Power Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">100% emergency backup connected to ICU, OT, Emergency, Blood Bank, and Lifts.</li>
                            <li class="mb-1">Weekly no-load test run and monthly full-load generator synchronization drill.</li>
                            <li>Online UPS 2x160 kVA provides 0-millisecond zero-break bridging power.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-warning me-1"></i> NABH Element: FMS.4</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Service: 10 Dec 2026</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('500 kVA Cummins AMF Diesel Generator', 'MAX-UT-DG-003', 'Substation Transformer Compound', 'CUMMINS-QSK19-G4 (500 kVA)', 'ELEC-INSPECT-GOVT-2026-88 (Valid till Oct 2027)', 'Central Electricity Authority (CEA) Hospital Safety Norms', 'Weekly Routine Test & Monthly 100% Load Transfer Drill', ['Automated Mains Failure (AMF) Logic Test (Grid Cut-Off to Genset <10s)', 'Battery Bank Starting Voltage & Specific Gravity Monitoring', 'Diesel Fuel Storage Level Inspection (Minimum 24-Hour Continuous Run)', 'Acoustic Enclosure Noise Level Verification (<75 dB @ 1 metre)', 'Air Circuit Breaker (ACB) and Earth Pit Resistance (<1.0 Ohm) Audit', 'Online UPS Battery Load Bank Impedance Testing'], 'Chief Electrical Engineer & Facility Operations Team')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 10. MAX-EQ-LAB-005 -->
            <div class="col-lg-6 eq-card-item" data-category="lab-cold" data-status="calibrated" data-title="sysmex xn 1000 automated 5 part hematology analyzer eqas fms.4 cop.9">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-blue"><i class="fas fa-vial-circle-check me-1"></i> MAX-EQ-LAB-005</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> NABL Calibrated</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Sysmex XN-1000 Automated 5-Part Hematology Analyzer</h5>
                    <span class="small text-primary fw-semibold mb-2 d-block">Diagnostic Pathology &amp; Central Laboratory</span>
                    <p class="small text-muted mb-3">Serial: <strong>SYS-XN1K-3190</strong> | Throughput: 100 Samples/Hr | NABL Cert: <strong>NABL-LAB-2026-441</strong> | Standard: ISO 15189.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-primary me-1"></i> Quality Control &amp; Accuracy Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Daily 3-level (Low, Normal, High) commercial internal quality control (IQC) validation.</li>
                            <li class="mb-1">Monthly External Quality Assurance Scheme (EQAS) through AIIMS New Delhi passed.</li>
                            <li>Automated critical panic flag alert integration with hospital information system.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-primary me-1"></i> NABH Element: FMS.4 / COP.9</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Calibration: 20 Jan 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Sysmex XN-1000 Automated Hematology Analyzer', 'MAX-EQ-LAB-005', 'Central Pathology Laboratory (1st Floor)', 'SYS-XN1K-3190 (Sysmex Corporation)', 'NABL-LAB-2026-441 (Valid till Jan 2027)', 'ISO 15189 Medical Laboratories Quality & Competence', 'Daily 3-Level IQC & Monthly EQAS Proficiency Testing', ['3-Level IQC Levey-Jennings Chart Analysis (Westgard Rules Check)', 'Fluorocell WDF & WBC Differential Flow Cytometry Laser Alignment', 'Hemoglobin Cyanide-Free Photometric Absorbance Calibration', 'Pipetting Precision & Sample Carryover Verification (<1%)', 'AIIMS EQAS External Proficiency Survey Report Archive', 'Reagent Cold-Chain Inventory & Lot-to-Lot Verification Log'], 'Head of Pathology & Senior Biomedical Engineer')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 11. MAX-EQ-COLD-002 -->
            <div class="col-lg-6 eq-card-item" data-category="lab-cold" data-status="calibrated" data-title="vestfrost 2c to 8c vaccine blood storage ilr refrigerator data logger fms.4 mom.2">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-temperature-low me-1"></i> MAX-EQ-COLD-002</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> NABL Calibrated</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Vestfrost 2°C–8°C Vaccine &amp; Blood Storage ILR</h5>
                    <span class="small text-success fw-semibold mb-2 d-block">Main Pharmacy &amp; Blood Centre Cold Chain</span>
                    <p class="small text-muted mb-3">Capacity: <strong>300 Litres</strong> | Holdover Time: 72 Hours | NABL Temp Sensor: <strong>NABL-TEMP-2026-102</strong> | Standard: WHO PQS.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-success me-1"></i> Cold Chain Temperature Governance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Continuous digital Wi-Fi data logger recording temperature every 5 minutes.</li>
                            <li class="mb-1">Automated SMS/Audio buzzer alerts if temperature breaches 2.0°C or 8.0°C threshold.</li>
                            <li>Ice-lined refrigeration maintains safe temperature for 72 hours during total grid blackout.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-success me-1"></i> NABH Element: FMS.4 / MOM.2</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Next Calibration: 12 Feb 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Vestfrost 2°C–8°C Ice-Lined Refrigerator (ILR)', 'MAX-EQ-COLD-002', 'Central Pharmacy Store (Ground Floor)', 'VEST-VLS-304 (Vestfrost)', 'NABL-TEMP-2026-102 (Valid till Feb 2027)', 'WHO PQS E003/014 Vaccine Cold Storage Standards', 'Daily Physical Twice-Daily Log & 24x7 IoT Telemetry', ['Twice-Daily Manual Temperature Recording (Morning & Evening)', 'Calibrated Multi-Point Thermocouple Temperature Mapping (9 Points)', 'Excursion Alarm Audio-Visual Siren & Cloud SMS Escalation Test', 'Compressor Cycle & Refrigerant R600a Gas Pressure Verification', 'Emergency Ice-Pack Freezing and Transfer Protocol Drill', 'NABL Multi-Channel Data Logger Re-Calibration Certificate Archive'], 'Chief Pharmacist & Biomedical Cold-Chain Engineer')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 12. MAX-UT-FIRE-001 -->
            <div class="col-lg-6 eq-card-item" data-category="facility" data-status="statutory" data-title="addressable fire alarm panel automated hydro pneumatic fire hydrant noc fms.4">
                <div class="card card-max p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-max badge-max-rose"><i class="fas fa-fire-extinguisher me-1"></i> MAX-UT-FIRE-001</span>
                        <span class="badge badge-max badge-max-emerald"><i class="fas fa-certificate me-1"></i> Fire NOC Valid</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-1">Addressable Fire Alarm &amp; Multi-Stage Hydrant System</h5>
                    <span class="small text-danger fw-semibold mb-2 d-block">Fire Safety &amp; Disaster Management — Command Control Room</span>
                    <p class="small text-muted mb-3">Fire NOC: <strong>DFS/HQ/NOC/2024/1102</strong> | Main Pump: 2280 LPM @ 8.5 Bar | Smoke Detectors: <strong>480 Addressable Sensors</strong>.</p>
                    
                    <div class="bg-surface-alt p-3 rounded-3 small mb-3">
                        <strong class="text-navy d-block mb-2"><i class="fas fa-clipboard-check text-danger me-1"></i> Life Safety &amp; NBC Compliance:</strong>
                        <ul class="mb-0 ps-3 text-muted">
                            <li class="mb-1">Automated jockey pump maintains ring-main pressure constantly above 7.0 bar.</li>
                            <li class="mb-1">Quarterly physical sprinkler head, hose reel, and landing valve flow discharge test.</li>
                            <li>Fire damper integration with HVAC system automatically shuts air flow upon smoke alarm.</li>
                        </ul>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 mt-auto border-top">
                        <div class="d-flex flex-column">
                            <span class="small text-navy fw-semibold"><i class="fas fa-book-medical text-danger me-1"></i> NABH Element: FMS.4</span>
                            <span class="small text-muted" style="font-size:0.75rem;"><i class="fas fa-clock text-primary me-1"></i> Fire NOC: Valid till Oct 2027</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-navy" onclick="openEqModal('Addressable Fire Alarm & Hydrant System', 'MAX-UT-FIRE-001', 'Central Control Room & Campus Ring Main', 'HONEYWELL-NOTIFIER-NFS2-3030', 'DFS/HQ/NOC/2024/1102 (Valid till Oct 2027)', 'National Building Code (NBC) Part IV Fire & Life Safety', 'Weekly Sensor Test & Monthly Fire Drill', ['Main Fire Pump, Diesel Standby Pump, and Jockey Pump Pressure Check', 'Smoke & Heat Detector Random Sample Sensitivity Testing (10 Sensors/Wk)', 'Manual Call Point (MCP) & PA System Code Red Broadcast Test', 'HVAC Fire Damper Automated Actuator Closure Signal Test', 'Fire Hose Reel & Yard Hydrant Landing Valve Flow Rate Audit', '100% Extinguisher Weight, Hydrostatic Date, and Tag Inspection'], 'Fire Safety Officer & Disaster Management Committee')">
                                <i class="fas fa-eye me-1"></i> View PPM &amp; Logs
                            </button>
                            <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary"><i class="fas fa-lock me-1"></i> Asset Doc</a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- End Equipment Grid -->

        <!-- No Results Fallback -->
        <div id="noEqResults" class="card card-max p-5 text-center mt-4 d-none">
            <div class="text-muted fs-1 mb-2"><i class="fas fa-wrench"></i></div>
            <h5 class="fw-bold text-navy mb-1">No Matching Equipment or Utility Systems Found</h5>
            <p class="text-muted small mb-3">Try adjusting your search terms, clearing filters, or browsing by category.</p>
            <div>
                <button type="button" class="btn btn-sm btn-outline-navy" onclick="resetEqFilters()">
                    <i class="fas fa-rotate-left me-1"></i> Reset All Filters
                </button>
            </div>
        </div>

    </div>
</section>

<!-- =========================================================
     4-TIER EQUIPMENT GOVERNANCE LIFECYCLE
========================================================= -->
<section class="py-5 bg-surface-alt border-top border-bottom">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-gold mb-2"><i class="fas fa-diagram-project me-1"></i> NABH FMS Framework</span>
            <h2 class="display-6 fw-bold text-navy mb-2">4-Tier Medical Device Governance Lifecycle</h2>
            <p class="text-muted">How high-risk biomedical assets and utility infrastructure are procured, tested, calibrated, and condemned under NABH 5th Edition standards.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem;">
                        <span>1</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Tagging &amp; IQ/OQ/PQ</h5>
                    <p class="small text-muted mb-0">Barcoding of all assets upon receipt; Installation, Operational, and Performance Qualification (IQ/OQ/PQ) verified before clinical use.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #10b981, #059669);">
                        <span>2</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Preventive Maintenance (PPM)</h5>
                    <p class="small text-muted mb-0">Strict automated 90-day/180-day PPM schedule executed by OEM certified biomedical engineers with documented checklist closure.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #f59e0b, #d97706);">
                        <span>3</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">NABL Accredited Calibration</h5>
                    <p class="small text-muted mb-0">Annual precision calibration using NABL certified master simulators (electrical safety, flow analyzer, defibrillator tester).</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card card-max p-4 h-100 text-center">
                    <div class="brand-icon mx-auto mb-3" style="width:48px; height:48px; font-size:1.3rem; background:linear-gradient(135deg, #6366f1, #4f46e5);">
                        <span>4</span>
                    </div>
                    <h5 class="fw-bold text-navy mb-2">Condemnation &amp; Replacement</h5>
                    <p class="small text-muted mb-0">Formal Condemnation Committee review for obsolete or non-repairable equipment with safe e-waste and bio-decommissioning protocols.</p>
                </div>
            </div>
        </div>

        <!-- Statutory Licenses Grid -->
        <div class="card card-max p-4 mt-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-3 text-center text-lg-start">
                    <span class="badge badge-max badge-max-rose mb-1"><i class="fas fa-file-shield me-1"></i> Legal Compliance</span>
                    <h5 class="fw-bold text-navy mb-0">Statutory Clearances</h5>
                </div>
                <div class="col-lg-9">
                    <div class="row g-2 text-center text-md-start small">
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-danger d-block"><i class="fas fa-fire me-1"></i> Fire NOC</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Annual Fire Dept Clearance</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-primary d-block"><i class="fas fa-radiation me-1"></i> AERB License</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Diagnostic Radiation Safety</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-success d-block"><i class="fas fa-leaf me-1"></i> SPCB Consent</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Pollution Control / BMW</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2 bg-white rounded border">
                                <strong class="text-warning d-block"><i class="fas fa-gas-pump me-1"></i> PESO License</strong>
                                <span class="text-muted" style="font-size:0.75rem;">Cryogenic Oxygen Tank</span>
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
        <div class="card card-max p-5 text-center" style="background: linear-gradient(135deg, #ffffff 0%, #fffbeb 100%);">
            <div class="max-w-700 mx-auto">
                <span class="badge badge-max badge-max-gold mb-2"><i class="fas fa-microscope text-warning me-1"></i> Hospital Quality Management</span>
                <h3 class="display-6 fw-bold text-navy mb-3">Digitize Your Biomedical Asset &amp; Utility Maintenance</h3>
                <p class="text-muted mb-4">Empower Biomedical Engineers, Facility Managers, and Safety Officers with automated PPM reminders, NABL calibration tracking, and breakdown escalation workflows.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= site_url('login') ?>" class="btn btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Sign In to Equipment Portal
                    </a>
                    <a href="<?= site_url('contact') ?>" class="btn btn-outline-navy">
                        <i class="fas fa-calendar-check me-1"></i> Request Biomedical Safety Audit
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     INTERACTIVE EQUIPMENT DETAIL & PPM MODAL
========================================================= -->
<div class="modal fade" id="equipmentModal" tabindex="-1" aria-labelledby="equipmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge badge-max badge-max-gold" id="modalEqCode">MAX-EQ-000</span>
                        <span class="badge badge-max badge-max-emerald" id="modalEqStatus">Active &amp; Calibrated</span>
                    </div>
                    <h5 class="modal-title fw-bold text-navy mb-0" id="modalEqTitle">Equipment Name</h5>
                    <span class="small text-muted" id="modalEqLocation">Department Location</span>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Model &amp; Serial Identifier</span>
                            <strong class="text-navy small" id="modalEqModel">Model Number</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">NABL Calibration Certificate / QA</span>
                            <strong class="text-success small" id="modalEqCalib">NABL-0000</strong>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Safety Standard Compliance</span>
                            <strong class="text-primary small" id="modalEqSafety">IEC 60601-1</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-surface-alt rounded-3">
                            <span class="small text-muted d-block" style="font-size:0.75rem;">Preventive Maintenance Frequency</span>
                            <strong class="text-warning small" id="modalEqFrequency">Quarterly (90 Days)</strong>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="fw-bold text-navy mb-2"><i class="fas fa-list-check text-primary me-1"></i> Preventive Maintenance &amp; Safety Checklist:</h6>
                    <div class="bg-surface-alt p-3 rounded-3">
                        <ul class="mb-0 ps-3 text-muted small" id="modalEqChecklist">
                            <!-- Populated dynamically via JS -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top py-3 px-4 d-flex justify-content-between">
                <span class="small text-muted" id="modalEqContact"><i class="fas fa-phone-alt text-primary me-1"></i> 24/7 Biomedical Support</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= site_url('login') ?>" class="btn btn-sm btn-hinton-primary">
                        <i class="fas fa-lock me-1"></i> Log Maintenance Work Order
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
let currentEqSearch = '';
let currentEqCat = 'all';
let currentEqStatus = 'all';

function applyEqFilters() {
    const cards = document.querySelectorAll('.eq-card-item');
    let visibleCount = 0;

    cards.forEach(card => {
        const cat = card.getAttribute('data-category') || '';
        const status = card.getAttribute('data-status') || '';
        const text = (card.getAttribute('data-title') || '') + ' ' + (card.innerText || '').toLowerCase();

        const matchesCat = (currentEqCat === 'all' || cat === currentEqCat);
        const matchesStatus = (currentEqStatus === 'all' || status === currentEqStatus);
        const matchesSearch = (!currentEqSearch || text.includes(currentEqSearch.toLowerCase()));

        if (matchesCat && matchesStatus && matchesSearch) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Update Counter
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noEqResults');

    if (resultsCount) {
        resultsCount.innerText = `Showing ${visibleCount} biomedical & utility asset${visibleCount === 1 ? '' : 's'}`;
    }

    if (noResults) {
        if (visibleCount === 0) {
            noResults.classList.remove('d-none');
        } else {
            noResults.classList.add('d-none');
        }
    }
}

function searchEquipmentQuery(val) {
    currentEqSearch = val.trim();
    applyEqFilters();
}

function filterByCategory(val) {
    currentEqCat = val;
    // Sync quick buttons
    document.querySelectorAll('.eq-quick-btn').forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light', 'border');
    });
    const matchBtn = Array.from(document.querySelectorAll('.eq-quick-btn')).find(b => b.textContent.trim().toLowerCase().includes(val.replace('-', ' ')));
    if (matchBtn) {
        matchBtn.classList.remove('btn-light', 'border');
        matchBtn.classList.add('btn-primary', 'active');
    }
    applyEqFilters();
}

function filterByStatus(val) {
    currentEqStatus = val;
    applyEqFilters();
}

function filterEqCategory(cat, btnElement) {
    currentEqCat = cat;
    
    // Sync Dropdown
    const catSelect = document.getElementById('categorySelectFilter');
    if (catSelect) {
        catSelect.value = cat;
    }

    // Toggle Button styling
    document.querySelectorAll('.eq-quick-btn').forEach(btn => {
        btn.classList.remove('btn-primary', 'active');
        btn.classList.add('btn-light', 'border');
    });
    if (btnElement) {
        btnElement.classList.remove('btn-light', 'border');
        btnElement.classList.add('btn-primary', 'active');
    }

    applyEqFilters();
}

function resetEqFilters() {
    currentEqSearch = '';
    currentEqCat = 'all';
    currentEqStatus = 'all';

    const searchInput = document.getElementById('equipmentSearchInput');
    const catSelect = document.getElementById('categorySelectFilter');
    const statusSelect = document.getElementById('statusSelectFilter');

    if (searchInput) searchInput.value = '';
    if (catSelect) catSelect.value = 'all';
    if (statusSelect) statusSelect.value = 'all';

    document.querySelectorAll('.eq-quick-btn').forEach((btn, index) => {
        if (index === 0) {
            btn.classList.remove('btn-light', 'border');
            btn.classList.add('btn-primary', 'active');
        } else {
            btn.classList.remove('btn-primary', 'active');
            btn.classList.add('btn-light', 'border');
        }
    });

    applyEqFilters();
}

function openEqModal(name, code, location, model, calib, safety, freq, checklist, contact) {
    document.getElementById('modalEqTitle').innerText = name;
    document.getElementById('modalEqCode').innerText = code;
    document.getElementById('modalEqLocation').innerText = location;
    document.getElementById('modalEqModel').innerText = model;
    document.getElementById('modalEqCalib').innerText = calib;
    document.getElementById('modalEqSafety').innerText = safety;
    document.getElementById('modalEqFrequency').innerText = freq;
    document.getElementById('modalEqContact').innerHTML = '<i class="fas fa-headset text-primary me-1"></i> ' + contact;

    const checkList = document.getElementById('modalEqChecklist');
    checkList.innerHTML = '';
    if (Array.isArray(checklist)) {
        checklist.forEach(c => {
            const li = document.createElement('li');
            li.className = 'mb-2';
            li.innerText = c;
            checkList.appendChild(li);
        });
    }

    const modalEl = document.getElementById('equipmentModal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
}
</script>
