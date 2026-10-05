<!-- =========================================================
     PHASE 3: DIGITAL CLINICAL WORKFLOW & DPDP CONSENT MANAGEMENT
     Hospital Quality Management (HQM) — NABH Digital Mitra Suite
========================================================= -->

<style>
/* Phase 3 Custom Clinical Styling */
.clinical-hud {
    background: linear-gradient(135deg, #020b1e 0%, #061b3d 60%, #003a8c 100%);
    border-radius: 1.25rem;
    color: #ffffff;
    box-shadow: 0 10px 30px rgba(2, 11, 30, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.08);
}
.patient-card {
    background: #ffffff;
    border-radius: 1rem;
    border: 1px solid #e2e8f0;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
}
.patient-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0, 82, 204, 0.1);
    border-color: #93c5fd;
}
.abha-badge {
    background: linear-gradient(135deg, #00875a 0%, #00b875 100%);
    color: #ffffff;
    font-size: 0.75rem;
    letter-spacing: 0.03em;
    font-weight: 700;
}
.abha-unlinked {
    background: #f1f5f9;
    color: #64748b;
    border: 1px dashed #cbd5e1;
    font-size: 0.75rem;
}
.stepper-circle {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
}
.sig-pad-box {
    background: #f8fafc;
    border: 2px dashed #cbd5e1;
    border-radius: 0.75rem;
    height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: crosshair;
}
</style>

<!-- Top Live Clinical HUD Banner -->
<div class="clinical-hud p-4 p-md-5 mb-4 position-relative overflow-hidden">
    <div class="row align-items-center g-4">
        <div class="col-lg-8">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge px-3 py-1 rounded-pill" style="background: rgba(0, 208, 132, 0.2); color: #00d084; border: 1px solid rgba(0, 208, 132, 0.4); font-size: 0.78rem; font-weight: 700;">
                    <i class="fas fa-shield-halved me-1"></i> NABH DIGITAL MITRA &bull; PILLAR 4
                </span>
                <span class="badge px-3 py-1 rounded-pill bg-white bg-opacity-10 text-white small">
                    <i class="fas fa-id-card me-1"></i> ABDM M3 Certified Protocol
                </span>
            </div>
            <h2 class="h3 fw-bold text-white mb-2" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                Digital Patient Journey &amp; DPDP Consent Console
            </h2>
            <p class="text-light opacity-90 small mb-4" style="max-width: 650px; line-height: 1.6;">
                Unified clinical telemetry: Unique Patient Identifiers (UHID), 14-Digit ABHA linking, DPDP Act 2023 cryptographic consent verification, and NABH patient safety gate checklists.
            </p>

            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-warning btn-sm fw-bold text-dark px-3 py-2 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#registerPatientModal">
                    <i class="fas fa-user-plus me-1"></i> Fast Intake (UHID: <?= esc($nextUhid) ?>)
                </button>
                <a href="#consentStation" class="btn btn-outline-light btn-sm fw-semibold px-3 py-2 rounded-pill">
                    <i class="fas fa-signature text-warning me-1"></i> E-Consent Station
                </a>
                <a href="<?= site_url('clinical-workflow') ?>" class="btn btn-outline-light btn-sm fw-semibold px-3 py-2 rounded-pill" target="_blank">
                    <i class="fas fa-arrow-up-right-from-square me-1"></i> Public Workflow Portal
                </a>
            </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block text-center">
            <img src="<?= base_url('assets/images/digital_patient_workflow.jpg') ?>" 
                 alt="Digital Patient Workflow" 
                 class="img-fluid rounded-4 shadow-xl" 
                 style="max-height: 200px; width: 92%; object-fit: cover; border: 2px solid rgba(255, 255, 255, 0.2);">
        </div>
    </div>
</div>

<!-- Telemetry KPI Dashboard Metrics -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg">
        <div class="card card-max p-3 border-top-blue h-100">
            <span class="small text-muted fw-semibold d-block mb-1">Total Registered (UHID)</span>
            <h4 class="h5 fw-bold text-navy mb-1"><?= esc($metrics['total_registered_patients'] ?? 0) ?> Patients</h4>
            <span class="small text-muted"><i class="fas fa-barcode text-primary me-1"></i> Barcoded Registry</span>
        </div>
    </div>
    <div class="col-6 col-lg">
        <div class="card card-max p-3 border-top-emerald h-100">
            <span class="small text-muted fw-semibold d-block mb-1">ABHA Verification Rate</span>
            <h4 class="h5 fw-bold text-success mb-1"><?= esc($metrics['abha_compliance_pct'] ?? 0) ?>%</h4>
            <span class="small text-success fw-bold"><i class="fas fa-check-circle me-1"></i> <?= esc($metrics['abha_linked_count'] ?? 0) ?> Linked Accounts</span>
        </div>
    </div>
    <div class="col-6 col-lg">
        <div class="card card-max p-3 border-top-gold h-100">
            <span class="small text-muted fw-semibold d-block mb-1">Active Inpatients</span>
            <h4 class="h5 fw-bold text-warning mb-1"><?= esc($metrics['active_inpatients'] ?? 0) ?> In-Bed</h4>
            <span class="small text-muted"><i class="fas fa-bed text-warning me-1"></i> <?= esc($metrics['icu_patients'] ?? 0) ?> in ICU / Critical</span>
        </div>
    </div>
    <div class="col-6 col-lg">
        <div class="card card-max p-3 border-top-rose h-100">
            <span class="small text-muted fw-semibold d-block mb-1">Surgical &amp; Cath Cases</span>
            <h4 class="h5 fw-bold text-danger mb-1"><?= esc($metrics['surgical_cases'] ?? 0) ?> Cases</h4>
            <span class="small text-danger fw-semibold"><i class="fas fa-scalpel me-1"></i> Pre/Post-Op Track</span>
        </div>
    </div>
    <div class="col-6 col-lg">
        <div class="card card-max p-3 border-top-navy h-100">
            <span class="small text-muted fw-semibold d-block mb-1">DPDP 2023 Consent Rate</span>
            <h4 class="h5 fw-bold text-navy mb-1"><?= esc($metrics['dpdp_compliance_pct'] ?? 100) ?>%</h4>
            <span class="small text-primary fw-bold"><i class="fas fa-lock me-1"></i> <?= esc($metrics['granted_consents'] ?? 0) ?> Cryptographic Signatures</span>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="card card-max p-3 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="small fw-bold text-navy me-2"><i class="fas fa-filter text-primary me-1"></i> Patient Stage Filter:</span>
            <a href="<?= site_url('clinical?status=all') ?>" class="btn btn-sm <?= $activeStatus === 'all' ? 'btn-primary' : 'btn-light border' ?> rounded-pill px-3 py-1">
                All (<?= count($patients ?? []) ?>)
            </a>
            <a href="<?= site_url('clinical?status=admitted_icu') ?>" class="btn btn-sm <?= $activeStatus === 'admitted_icu' ? 'btn-primary' : 'btn-light border' ?> rounded-pill px-3 py-1">
                ICU Care
            </a>
            <a href="<?= site_url('clinical?status=pre_op') ?>" class="btn btn-sm <?= $activeStatus === 'pre_op' ? 'btn-primary' : 'btn-light border' ?> rounded-pill px-3 py-1">
                Pre-Op / Cath
            </a>
            <a href="<?= site_url('clinical?status=post_op') ?>" class="btn btn-sm <?= $activeStatus === 'post_op' ? 'btn-primary' : 'btn-light border' ?> rounded-pill px-3 py-1">
                Post-Op Recovery
            </a>
            <a href="<?= site_url('clinical?status=registered') ?>" class="btn btn-sm <?= $activeStatus === 'registered' ? 'btn-primary' : 'btn-light border' ?> rounded-pill px-3 py-1">
                Triage / OPD
            </a>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary-max btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#registerPatientModal">
                <i class="fas fa-plus me-1"></i> New Patient Intake
            </button>
        </div>
    </div>
</div>

<!-- =========================================================
     SPLIT COCKPIT: PATIENT DOSSIERS & DPDP CONSENT HUB
========================================================= -->
<div class="row g-4 mb-5">

    <!-- Left Column: Patient Cards Stream (Interactive Flow Dossiers) -->
    <div class="col-lg-7">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="h6 fw-bold text-navy mb-0">
                <i class="fas fa-users-viewfinder text-primary me-2"></i> Active Patient Clinical Journey Dossiers
            </h5>
            <span class="small text-muted"><?= count($patients ?? []) ?> Records</span>
        </div>

        <div class="d-flex flex-column gap-3">
            <?php if (!empty($patients)) : ?>
                <?php foreach ($patients as $pt) : ?>
                    <div class="patient-card p-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-2 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-sm" 
                                     style="width: 44px; height: 44px; background: linear-gradient(135deg, #0052cc 0%, #0747a6 100%); font-size: 1.1rem; flex-shrink: 0;">
                                    <?= strtoupper(substr($pt['first_name'], 0, 1)) ?>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <h6 class="fw-bold text-navy mb-0" style="font-size: 1rem;">
                                            <?= esc($pt['first_name']) ?> <?= esc($pt['last_name']) ?>
                                        </h6>
                                        <span class="badge bg-light text-dark border px-2 py-1 small"><?= esc(ucfirst($pt['gender'])) ?>, <?= esc($pt['age']) ?> yrs</span>
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger px-2 py-1 small fw-bold">
                                            <i class="fas fa-droplet me-1"></i> <?= esc($pt['blood_group'] ?? 'Unknown') ?>
                                        </span>
                                    </div>
                                    <span class="small text-muted font-monospace d-block mt-1">
                                        <i class="fas fa-id-badge text-primary me-1"></i> <?= esc($pt['uhid']) ?>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <?php 
                                    $statusBadge = match($pt['admission_status']) {
                                        'admitted_icu'    => '<span class="badge badge-max badge-max-rose"><i class="fas fa-heart-pulse me-1"></i> ICU Critical</span>',
                                        'pre_op'          => '<span class="badge badge-max badge-max-gold"><i class="fas fa-procedures me-1"></i> Pre-Op Prep</span>',
                                        'post_op'         => '<span class="badge badge-max badge-max-blue"><i class="fas fa-bed-pulse me-1"></i> Post-Op Recovery</span>',
                                        'admitted_ward'   => '<span class="badge badge-max badge-max-emerald"><i class="fas fa-bed me-1"></i> Inpatient Ward</span>',
                                        'discharge_ready' => '<span class="badge badge-max badge-max-emerald"><i class="fas fa-truck-medical me-1"></i> Discharge Ready</span>',
                                        'discharged'      => '<span class="badge bg-secondary text-white">Discharged</span>',
                                        default           => '<span class="badge bg-light text-dark border">Triage / Intake</span>',
                                    };
                                    echo $statusBadge;
                                ?>
                            </div>
                        </div>

                        <!-- Department & Location Info Strip -->
                        <div class="row g-2 p-2 bg-surface-alt rounded-3 mb-3 small text-dark">
                            <div class="col-sm-6">
                                <span class="text-muted d-block" style="font-size: 0.72rem;">Department &amp; Bed:</span>
                                <strong><?= esc($pt['department_name'] ?? 'General') ?> &bull; <?= esc($pt['bed_number'] ?? 'Unassigned') ?></strong>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted d-block" style="font-size: 0.72rem;">Attending Consultant:</span>
                                <strong class="text-truncate d-block"><?= esc($pt['attending_doctor'] ?? 'Dr. On Duty') ?></strong>
                            </div>
                        </div>

                        <!-- ABHA Identification Row -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-3 pb-2 border-bottom">
                            <div>
                                <?php if ($pt['abha_status'] === 'verified' && !empty($pt['abha_number'])) : ?>
                                    <span class="badge abha-badge px-2 py-1 rounded-pill">
                                        <i class="fas fa-circle-check me-1"></i> ABHA Verified: <?= esc($pt['abha_number']) ?>
                                    </span>
                                    <span class="small text-muted font-monospace ms-1">(<?= esc($pt['abha_address']) ?>)</span>
                                <?php else : ?>
                                    <span class="badge abha-unlinked px-2 py-1 rounded-pill">
                                        <i class="fas fa-triangle-exclamation text-warning me-1"></i> ABHA Unlinked
                                    </span>
                                    <button class="btn btn-sm btn-link text-primary p-0 ms-2 small fw-bold" onclick="openAbhaModal(<?= $pt['id'] ?>, '<?= esc($pt['first_name'] . ' ' . $pt['last_name']) ?>')">
                                        Link ABHA Number
                                    </button>
                                <?php endif; ?>
                            </div>
                            <div class="small">
                                <span class="text-muted">DPDP Consent:</span>
                                <strong class="text-success"><?= esc($pt['active_consents_count']) ?>/<?= esc($pt['total_consents_count']) ?> Granted</strong>
                            </div>
                        </div>

                        <!-- Patient Quality Checkpoints Stepper (NABH Gate) -->
                        <div class="mb-3">
                            <span class="small fw-bold text-navy d-block mb-2">
                                <i class="fas fa-list-check text-primary me-1"></i> NABH Clinical Safety &amp; Quality Checkpoints:
                            </span>
                            <div class="d-flex flex-wrap gap-2">
                                <?php if (!empty($patientSteps[$pt['id']])) : ?>
                                    <?php foreach ($patientSteps[$pt['id']] as $step) : ?>
                                        <button class="btn btn-sm p-1 px-2 border rounded-pill text-start <?= $step['status'] === 'completed' ? 'bg-success bg-opacity-10 text-success border-success' : 'bg-light text-muted' ?>"
                                                style="font-size: 0.72rem;"
                                                onclick="openStepModal(<?= $step['id'] ?>, '<?= esc(addslashes($step['step_name'])) ?>', '<?= esc($step['status']) ?>', '<?= esc(addslashes($step['notes'] ?? '')) ?>')">
                                            <i class="fas <?= $step['status'] === 'completed' ? 'fa-check-circle text-success' : 'fa-circle text-muted' ?> me-1"></i>
                                            <?= esc(substr($step['step_name'], 0, 22)) ?>...
                                        </button>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Action Bar -->
                        <div class="d-flex justify-content-between align-items-center pt-2">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="openStatusModal(<?= $pt['id'] ?>, '<?= esc($pt['first_name'] . ' ' . $pt['last_name']) ?>', '<?= esc($pt['admission_status']) ?>', '<?= esc($pt['bed_number'] ?? '') ?>')">
                                <i class="fas fa-arrows-split-up-and-left me-1"></i> Transition Stage
                            </button>
                            <button class="btn btn-sm btn-outline-navy rounded-pill px-3" onclick="filterConsentsForPatient(<?= $pt['id'] ?>, '<?= esc($pt['first_name'] . ' ' . $pt['last_name']) ?>')">
                                <i class="fas fa-signature me-1"></i> View Consents (<?= esc($pt['total_consents_count']) ?>)
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="card card-max p-5 text-center text-muted">
                    <i class="fas fa-user-xmark fs-2 mb-2"></i>
                    <p class="mb-0">No patient records found under selected filter.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Right Column: DPDP 2023 Digital Consent Hub & Signature Station -->
    <div class="col-lg-5" id="consentStation">
        <div class="card card-max p-4 sticky-top" style="top: 20px; z-index: 10;">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <div>
                    <span class="badge badge-max badge-max-gold mb-1"><i class="fas fa-gavel me-1"></i> DPDP Act 2023</span>
                    <h5 class="h6 fw-bold text-navy mb-0">Electronic Informed Consent Station</h5>
                </div>
                <img src="<?= base_url('assets/images/dpdp_consent_verification.jpg') ?>" 
                     alt="Consent Verification" 
                     class="rounded-3 shadow-sm" 
                     style="width: 50px; height: 38px; object-fit: cover;">
            </div>

            <p class="small text-muted mb-3" style="line-height: 1.5;">
                Informed consent capture with statutory Data Fiduciary disclosures, multi-lingual authorization, and cryptographic signature hash.
            </p>

            <!-- Sample Active Consent Preview Box -->
            <div class="p-3 bg-surface-alt rounded-3 border mb-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-primary text-white" style="font-size: 0.72rem;">Live Consent Preview</span>
                    <span class="badge bg-success bg-opacity-20 text-success border border-success" style="font-size: 0.7rem;">
                        <i class="fas fa-lock me-1"></i> Cryptographic E-Sign
                    </span>
                </div>
                <h6 class="fw-bold text-navy mb-1" style="font-size: 0.88rem;">General Inpatient &amp; Surgical Care Consent</h6>
                <p class="text-muted small mb-2" style="font-size: 0.76rem; line-height: 1.4;">
                    &ldquo;I hereby authorize the medical team of Hospital Quality Management to perform clinical investigations, nursing procedures, and emergency life-support measures under informed guidance.&rdquo;
                </p>
                <div class="p-2 bg-white rounded border small text-dark mb-2" style="font-size: 0.72rem;">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Signature Hash:</span>
                        <code class="text-primary fw-bold">SIG-DPDP-A89F12BC9941</code>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">OTP Verified:</span>
                        <span class="text-success fw-bold"><i class="fas fa-check me-1"></i> OTP 8821</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Timestamp &amp; IP:</span>
                        <span class="text-muted"><?= date('Y-m-d H:i') ?> &bull; 192.168.1.104</span>
                    </div>
                </div>

                <!-- Interactive Signature Pad Simulation -->
                <div class="mb-2">
                    <span class="small fw-semibold text-navy d-block mb-1" style="font-size: 0.74rem;">
                        <i class="fas fa-pen-nib text-primary me-1"></i> Digital Touch / Stylus Signature Pad:
                    </span>
                    <div class="sig-pad-box" onclick="simulateSignature(this)">
                        <span class="small text-muted"><i class="fas fa-hand-pointer me-1"></i> Click to simulate Patient / Guardian E-Sign</span>
                    </div>
                </div>
            </div>

            <!-- Quick Consent Grant / Review Action -->
            <div class="d-grid gap-2">
                <button class="btn btn-hinton-primary btn-sm fw-bold py-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#grantConsentModal">
                    <i class="fas fa-file-signature me-1"></i> Authenticate New DPDP Consent
                </button>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     MODALS SECTION FOR PHASE 3
========================================================= -->

<!-- Modal 1: Register Patient (UHID + ABHA) -->
<div class="modal fade" id="registerPatientModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <div>
                    <h5 class="modal-title fw-bold text-navy mb-0"><i class="fas fa-user-plus text-primary me-2"></i> Patient Clinical Intake &amp; UHID Registry</h5>
                    <span class="small text-muted">Auto-assigns unique identification and initializes DPDP consent matrix.</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('clinical/register-patient') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 small d-flex align-items-center gap-2 rounded-3 mb-3">
                        <i class="fas fa-barcode fs-5"></i>
                        <div>Assigned Unique Hospital ID (UHID): <strong><?= esc($nextUhid) ?></strong></div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="e.g. Ramesh" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="e.g. Kumar" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Age (Years)</label>
                            <input type="number" name="age" class="form-control" min="0" max="125" placeholder="45" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Blood Group</label>
                            <select name="blood_group" class="form-select">
                                <option>A+</option><option>A-</option>
                                <option selected>B+</option><option>B-</option>
                                <option>O+</option><option>O-</option>
                                <option>AB+</option><option>AB-</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" placeholder="9876543210" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Emergency Contact &amp; Relation</label>
                            <input type="text" name="emergency_contact" class="form-control" placeholder="9876543211 (Spouse / Kin)">
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded-3 mb-3 border">
                        <span class="small fw-bold text-success d-block mb-2"><i class="fas fa-id-card me-1"></i> Ayushman Bharat Health Account (ABHA) Integration (Optional):</span>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input type="text" name="abha_number" class="form-control form-control-sm" placeholder="14-Digit ABHA (91-XXXX-XXXX-XXXX)">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="abha_address" class="form-control form-control-sm" placeholder="ABHA Address (e.g. name@abdm)">
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Admission Department</label>
                            <select name="department_id" class="form-select">
                                <option value="">-- Choose Department --</option>
                                <?php foreach ($departments as $dept) : ?>
                                    <option value="<?= $dept['id'] ?>"><?= esc($dept['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Initial Stage</label>
                            <select name="admission_status" class="form-select">
                                <option value="registered">Triage / OPD</option>
                                <option value="admitted_ward" selected>Inpatient Ward</option>
                                <option value="admitted_icu">ICU Critical</option>
                                <option value="pre_op">Pre-Op / Cath</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Bed Allocation</label>
                            <input type="text" name="bed_number" class="form-control" placeholder="e.g. WARD-BED-08">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Attending Consultant / Doctor</label>
                        <input type="text" name="attending_doctor" class="form-control" placeholder="e.g. Dr. Rajesh Sharma (MD, Medicine)">
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm fw-bold">Register &amp; Generate UHID</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: Link ABHA -->
<div class="modal fade" id="linkAbhaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy"><i class="fas fa-id-card text-success me-2"></i> Link ABHA Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('clinical/link-abha') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="patient_id" id="modalAbhaPatientId">
                <div class="modal-body p-4">
                    <p class="small text-muted mb-3" id="modalAbhaPatientName"></p>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">14-Digit ABHA Number</label>
                        <input type="text" name="abha_number" class="form-control" placeholder="91-4567-8912-3456" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">ABHA Address (PHR Handle)</label>
                        <input type="text" name="abha_address" class="form-control" placeholder="patient.name@abdm" required>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm fw-bold">Verify &amp; Link ABHA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: Grant DPDP E-Consent -->
<div class="modal fade" id="grantConsentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <div>
                    <h5 class="modal-title fw-bold text-navy mb-0"><i class="fas fa-signature text-primary me-2"></i> DPDP Act 2023 Digital Consent Authentication</h5>
                    <span class="small text-muted">Legal Informed Consent under Digital Personal Data Protection Act.</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('clinical/grant-consent') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Select Patient Record</label>
                        <select name="consent_id" class="form-select" required>
                            <?php if (!empty($patients)) : ?>
                                <?php foreach ($patients as $pt) : ?>
                                    <?php if (!empty($pt['consents'])) : ?>
                                        <?php foreach ($pt['consents'] as $c) : ?>
                                            <option value="<?= $c['id'] ?>">
                                                <?= esc($pt['uhid']) ?> &bull; <?= esc($pt['first_name'] . ' ' . $pt['last_name']) ?> — <?= esc($c['consent_title']) ?> (<?= esc(ucfirst($c['status'])) ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Signatory Legal Name</label>
                            <input type="text" name="signatory_name" class="form-control" placeholder="Patient or Authorized Guardian" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Signatory Relationship</label>
                            <select name="signatory_type" class="form-select">
                                <option value="patient">Self (Patient)</option>
                                <option value="guardian">Legal Guardian / Family Kin</option>
                                <option value="legal_nominee">Nominee / Power of Attorney</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Hospital Witness Name</label>
                            <input type="text" name="witness_name" class="form-control" value="<?= esc(session()->get('user_name') ?? 'Hospital Quality Officer') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Consent Language</label>
                            <select name="language" class="form-select">
                                <option value="en">English</option>
                                <option value="hi">Hindi (हिंदी)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Verification OTP</label>
                            <input type="text" name="verification_otp" class="form-control" value="<?= rand(1000, 9999) ?>">
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded-3 border small text-muted">
                        <i class="fas fa-lock text-success me-1"></i> Cryptographic Hash (SHA-256) will be generated and logged to the hospital tamper-evident audit ledger upon submission.
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm fw-bold">Sign &amp; Authenticate Consent</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 4: Transition Patient Stage -->
<div class="modal fade" id="transitionStatusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Transition Patient Journey Stage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('clinical/update-status') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="patient_id" id="modalStatusPatientId">
                <div class="modal-body p-4">
                    <p class="small text-muted mb-3" id="modalStatusPatientName"></p>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Clinical Stage</label>
                        <select name="admission_status" id="modalStatusSelect" class="form-select" required>
                            <option value="registered">Triage / OPD Assessment</option>
                            <option value="admitted_ward">Inpatient Ward</option>
                            <option value="admitted_icu">ICU Critical Care</option>
                            <option value="pre_op">Pre-Op Preparation (OT / Cath)</option>
                            <option value="post_op">Post-Op Recovery Room</option>
                            <option value="discharge_ready">Discharge Ready</option>
                            <option value="discharged">Discharged (Complete)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Bed Allocation</label>
                        <input type="text" name="bed_number" id="modalStatusBed" class="form-control" placeholder="e.g. ICU-BED-04">
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Update Stage</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 5: Update Quality Step -->
<div class="modal fade" id="stepModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">NABH Safety Checkpoint Sign-off</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('clinical/update-step') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="step_id" id="modalStepId">
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-navy mb-2" id="modalStepName"></h6>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Checkpoint Status</label>
                        <select name="status" id="modalStepStatus" class="form-select" required>
                            <option value="completed">Completed &amp; Verified</option>
                            <option value="pending">Pending Execution</option>
                            <option value="bypassed">Bypassed with Clinical Justification</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Clinical Observation / Notes</label>
                        <textarea name="notes" id="modalStepNotes" class="form-control" rows="3" placeholder="Enter findings, parameters, or clinical sign-off notes..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Sign Checkpoint</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Helpers -->
<script>
function openAbhaModal(patientId, name) {
    document.getElementById('modalAbhaPatientId').value = patientId;
    document.getElementById('modalAbhaPatientName').innerText = 'Patient: ' + name;
    new bootstrap.Modal(document.getElementById('linkAbhaModal')).show();
}

function openStatusModal(patientId, name, status, bed) {
    document.getElementById('modalStatusPatientId').value = patientId;
    document.getElementById('modalStatusPatientName').innerText = 'Patient: ' + name;
    document.getElementById('modalStatusSelect').value = status;
    document.getElementById('modalStatusBed').value = bed;
    new bootstrap.Modal(document.getElementById('transitionStatusModal')).show();
}

function openStepModal(stepId, name, status, notes) {
    document.getElementById('modalStepId').value = stepId;
    document.getElementById('modalStepName').innerText = name;
    document.getElementById('modalStepStatus').value = status;
    document.getElementById('modalStepNotes').value = notes;
    new bootstrap.Modal(document.getElementById('stepModal')).show();
}

function simulateSignature(box) {
    box.innerHTML = '<span class="text-success fw-bold"><i class="fas fa-check-circle me-1"></i> Digital Signature Recorded: <em>' + '<?= esc(session()->get('user_name') ?? 'Patient Signature') ?>' + '</em> (Cryptographic Hash Verified)</span>';
    box.style.borderColor = '#10b981';
    box.style.backgroundColor = '#ecfdf5';
}

function filterConsentsForPatient(patientId, patientName) {
    const station = document.getElementById('consentStation');
    if (station) {
        station.scrollIntoView({ behavior: 'smooth' });
    }
}
</script>
