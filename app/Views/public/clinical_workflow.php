<!-- =========================================================
     PAGE BANNER / HEADER (HOSPITAL QUALITY MANAGEMENT)
========================================================= -->
<section class="page-banner-wrapper">
    <div class="container">
        <div class="page-banner-hinton">
            <!-- Floating Decorative Elements -->
            <div class="banner-molecule-left"><i class="fas fa-fingerprint"></i></div>
            <div class="banner-molecule-right"><i class="fas fa-shield-halved"></i></div>

            <div class="position-relative" style="z-index: 2;">
                <h1 class="page-banner-title">Digital Clinical Workflow &amp; DPDP Consent</h1>
                <div class="page-banner-nav">
                    <a href="<?= site_url('/') ?>">Home</a>
                    <span class="nav-separator">/</span>
                    <span class="nav-active">Clinical Workflow &amp; DPDP Consent</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     CLINICAL WORKFLOW & DPDP CONSENT DIRECTORY
========================================================= -->
<section class="py-5 bg-main">
    <div class="container">

        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-max badge-max-emerald mb-2"><i class="fas fa-heart-pulse text-success me-1"></i> Patient-Centric Governance (COP &amp; AAC)</span>
            <h2 class="display-6 fw-bold text-navy mb-2">Automated UHID, ABHA Linking &amp; DPDP 2023 Consent</h2>
            <p class="text-muted">NABH 5th Edition Care of Patients (COP) &amp; Digital Health Standards (2nd Edition) framework ensuring seamless longitudinal patient records, cryptographically verifiable electronic consent, and strict patient safety gates.</p>
        </div>

        <!-- Visual Hero Banner Card -->
        <div class="card card-max p-0 mb-5 overflow-hidden border-0 shadow-md" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 60%, #0f4c81 100%); border-radius: 18px;">
            <div class="row g-0 align-items-center">
                <div class="col-lg-7 p-4 p-md-5 text-white">
                    <span class="badge bg-white text-primary mb-3 px-3 py-2 fw-bold"><i class="fas fa-certificate me-1"></i> ABDM M3 Certified Architecture</span>
                    <h3 class="h3 fw-bold mb-3 text-white">Next-Gen Clinical Cockpit &amp; Data Fiduciary Security</h3>
                    <p class="text-white-50 mb-4">Bridging hospital admission, clinical bedside safety checkpoints, and the Digital Personal Data Protection (DPDP) Act 2023 statutory mandate. Eliminate paper consent hazards, unverified identity bottlenecks, and manual compliance auditing.</p>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="p-2 rounded bg-white bg-opacity-10 text-center">
                                <strong class="d-block text-white font-monospace">UHID-HQM</strong>
                                <span class="small text-white-50" style="font-size:0.75rem;">100% Unique ID Flow</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-2 rounded bg-white bg-opacity-10 text-center">
                                <strong class="d-block text-success font-monospace">14-Digit ABHA</strong>
                                <span class="small text-white-50" style="font-size:0.75rem;">M3 ABDM Interoperable</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-2 rounded bg-white bg-opacity-10 text-center">
                                <strong class="d-block text-warning font-monospace">SHA-256 Sig</strong>
                                <span class="small text-white-50" style="font-size:0.75rem;">DPDP 2023 Consent Audit</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="<?= base_url('assets/images/clinical_workflow_banner.jpg') ?>" alt="Digital Clinical Workflow" class="img-fluid" style="height: 360px; width: 100%; object-fit: cover; opacity: 0.95;">
                </div>
            </div>
        </div>

        <!-- Pillar Highlights Grid -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card card-max p-4 h-100 border-0 shadow-sm text-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.6rem;">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h4 class="h5 fw-bold text-navy mb-2">Automated UHID Registry</h4>
                    <p class="text-muted small mb-0">Generates tamper-proof, sequential Unique Hospital Identification Numbers linked to demographic, biometric, and longitudinal emergency contacts.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-max p-4 h-100 border-0 shadow-sm text-center">
                    <div class="rounded-circle bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.6rem;">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4 class="h5 fw-bold text-navy mb-2">ABHA M3 Integration</h4>
                    <p class="text-muted small mb-0">Seamless linking with Ayushman Bharat Digital Mission (ABDM) 14-digit ABHA numbers and PHR addresses (@abdm) for nationwide health record exchange.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-max p-4 h-100 border-0 shadow-sm text-center">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.6rem;">
                        <i class="fas fa-signature"></i>
                    </div>
                    <h4 class="h5 fw-bold text-navy mb-2">DPDP Act 2023 Consent</h4>
                    <p class="text-muted small mb-0">Multi-lingual electronic consent with granular purpose selection, OTP verification, cryptographic signature hash, and immediate right-to-withdraw logging.</p>
                </div>
            </div>
        </div>

        <!-- Detailed Feature Architecture with Images -->
        <div class="row g-4 mb-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative rounded-4 overflow-hidden shadow-lg">
                    <img src="<?= base_url('assets/images/digital_patient_workflow.jpg') ?>" alt="Digital Patient Registration" class="img-fluid w-100" style="min-height: 320px; object-fit: cover;">
                    <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white">
                        <span class="badge bg-success mb-1">NABH COP.1 &amp; AAC.2</span>
                        <div class="small fw-bold">Contactless ABHA Scan &amp; Digital Intake Protocol</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="badge badge-max badge-max-sapphire mb-2">Patient Intake &amp; Triage</span>
                <h3 class="h3 fw-bold text-navy mb-3">6-Point Clinical Safety Gate Architecture</h3>
                <p class="text-muted">NABH 5th Edition strictly demands verified clinical safety checkpoints at every stage of the patient journey. Our system digitally enforces these gates before admission, intervention, or discharge:</p>
                
                <ul class="list-unstyled d-flex flex-column gap-2 mb-4">
                    <li class="d-flex align-items-start gap-2">
                        <i class="fas fa-check-circle text-success mt-1"></i>
                        <div><strong class="text-navy">Gate 1: Triage &amp; Baseline Vitals Log:</strong> Immediate digital recording of SPO2, BP, Pulse, and Temp.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fas fa-check-circle text-success mt-1"></i>
                        <div><strong class="text-navy">Gate 2: Barcode Patient ID Banding:</strong> Verification of 2-identifier patient wristband before bed assignment.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fas fa-check-circle text-success mt-1"></i>
                        <div><strong class="text-navy">Gate 3: DPDP Informed Consent:</strong> Multi-lingual digital consent signed prior to diagnostic or surgical intervention.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fas fa-check-circle text-success mt-1"></i>
                        <div><strong class="text-navy">Gate 4: Fall &amp; Pressure Injury Risk:</strong> Automated Morse Fall Scale &amp; Braden score calculation.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fas fa-check-circle text-success mt-1"></i>
                        <div><strong class="text-navy">Gate 5: Safe Surgery Checklist (WHO):</strong> Sign-in, Time-out, and Sign-out digital verification.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fas fa-check-circle text-success mt-1"></i>
                        <div><strong class="text-navy">Gate 6: Discharge Summary &amp; Medication Reconciliation:</strong> 24-hr post-discharge follow-up log.</div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row g-4 mb-5 align-items-center flex-lg-row-reverse">
            <div class="col-lg-6">
                <div class="position-relative rounded-4 overflow-hidden shadow-lg">
                    <img src="<?= base_url('assets/images/dpdp_consent_verification.jpg') ?>" alt="DPDP Digital Consent Signing" class="img-fluid w-100" style="min-height: 320px; object-fit: cover;">
                    <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white">
                        <span class="badge bg-warning text-dark mb-1">DPDP Act 2023 Statutory Standard</span>
                        <div class="small fw-bold">Electronic Signature &amp; Notice of Data Purpose</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="badge badge-max badge-max-gold mb-2">Statutory DPDP Compliance</span>
                <h3 class="h3 fw-bold text-navy mb-3">Cryptographic Electronic Consent Engine</h3>
                <p class="text-muted">The Digital Personal Data Protection Act (DPDP Act 2023) mandates that healthcare data fiduciaries capture explicit, informed, multi-lingual, and revocable consent. HQM embeds these legal protections directly into clinical operations:</p>
                
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-language text-primary me-1"></i> Multi-Lingual Notice</h6>
                            <p class="text-muted small mb-0">Clear explanation in English, Hindi, and regional languages specifying exactly what data is processed.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-key text-success me-1"></i> SHA-256 Signature</h6>
                            <p class="text-muted small mb-0">Each consent generates a cryptographic checksum sealing IP address, timestamp, and signatory device.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-mobile-screen-button text-info me-1"></i> OTP / Bio Verification</h6>
                            <p class="text-muted small mb-0">Dual-factor authentication prevents impersonation and dispute during legal or quality audits.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                            <h6 class="fw-bold text-navy mb-1"><i class="fas fa-ban text-danger me-1"></i> Instant Revocation</h6>
                            <p class="text-muted small mb-0">Patients retain their statutory Right to Withdraw consent at any point with immutable audit logging.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comparison Table: Traditional vs. NABH Digital Mitra DQMS -->
        <div class="card card-max p-4 p-md-5 mb-5 border-0 shadow-sm">
            <h3 class="h4 fw-bold text-navy mb-3 text-center">Comparison: Traditional Hospital Filing vs. HQM Digital Clinical Cockpit</h3>
            <p class="text-muted text-center max-w-700 mx-auto mb-4">See how Hospital Quality Management transforms clinical compliance into an audit-ready digital powerhouse.</p>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle border">
                    <thead class="bg-navy text-white">
                        <tr>
                            <th style="width: 25%;">Workflow Parameter</th>
                            <th style="width: 35%;" class="bg-secondary text-white">Traditional Paper &amp; Legacy HIS</th>
                            <th style="width: 40%;" class="bg-success text-white">HQM NABH Digital Mitra (DQMS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-navy">Patient Identification</td>
                            <td class="text-muted"><i class="fas fa-times-circle text-danger me-1"></i> Manual register book, duplicate records common</td>
                            <td class="text-navy fw-semibold"><i class="fas fa-check-circle text-success me-1"></i> Standardized UHID-HQM + 14-digit ABHA M3 linking</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-navy">Informed Consent</td>
                            <td class="text-muted"><i class="fas fa-times-circle text-danger me-1"></i> Paper consent forms prone to loss, no language choice</td>
                            <td class="text-navy fw-semibold"><i class="fas fa-check-circle text-success me-1"></i> DPDP 2023 Multi-lingual E-Sign with SHA-256 Hash</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-navy">Consent Revocation</td>
                            <td class="text-muted"><i class="fas fa-times-circle text-danger me-1"></i> Impossible to track; high legal exposure</td>
                            <td class="text-navy fw-semibold"><i class="fas fa-check-circle text-success me-1"></i> Statutory 1-Click Revocation with Reason Audit Log</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-navy">Safety Checkpoints</td>
                            <td class="text-muted"><i class="fas fa-times-circle text-danger me-1"></i> Checked retroactively before audit inspection</td>
                            <td class="text-navy fw-semibold"><i class="fas fa-check-circle text-success me-1"></i> Live 6-Gate Clinical Safety Stepper with instant status</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-navy">NABH / ABDM Telemetry</td>
                            <td class="text-muted"><i class="fas fa-times-circle text-danger me-1"></i> Manual tallying for monthly KPI reports</td>
                            <td class="text-navy fw-semibold"><i class="fas fa-check-circle text-success me-1"></i> Automated clinical KPI counters &amp; ABDM compliance rate</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Action Callout -->
        <div class="card card-max p-4 p-md-5 text-center text-white border-0 shadow-md" style="background: linear-gradient(135deg, #0284c7 0%, #0052cc 100%); border-radius: 18px;">
            <h3 class="h3 fw-bold mb-3 text-white">Experience the Live Clinical Workflow Cockpit</h3>
            <p class="text-white-50 max-w-700 mx-auto mb-4">Hospital quality coordinators, nursing superintendents, and doctors can manage patient dossiers, verify ABHA numbers, and record DPDP e-signatures in real-time.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="<?= site_url('clinical') ?>" class="btn btn-warning px-4 py-2 fw-bold text-dark" style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); border: none;">
                    <i class="fas fa-gauge me-1"></i> Launch Clinical Cockpit
                </a>
                <a href="<?= site_url('contact') ?>" class="btn btn-outline-light px-4 py-2">
                    <i class="fas fa-calendar-check me-1"></i> Book Mock Hospital Audit
                </a>
            </div>
        </div>

    </div>
</section>
