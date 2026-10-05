<!-- HR & CREDENTIALING PANEL -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h4 class="h5 fw-bold text-navy mb-1"><i class="fas fa-user-doctor text-primary me-2"></i> Clinical HR, Credentialing &amp; Staff Health Suite</h4>
        <p class="small text-muted mb-0">NABH 5th Edition compliant doctor credentialing, 4-tier privileging matrix, staff Hepatitis-B vaccination tracker, and automated 60/30/15-day council renewal engine.</p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <form action="<?= site_url('hr/run-expiry-check') ?>" method="post" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-outline-warning btn-sm fw-semibold">
                <i class="fas fa-rotate me-1"></i> Scan Expiry Alerts
            </button>
        </form>
        <button class="btn btn-gold-max btn-sm" data-bs-toggle="modal" data-bs-target="#addTrainingModal">
            <i class="fas fa-calendar-plus me-1"></i> Schedule Training
        </button>
        <button class="btn btn-primary-max btn-sm" data-bs-toggle="modal" data-bs-target="#addStaffModal">
            <i class="fas fa-user-plus me-1"></i> Add Doctor / Staff
        </button>
    </div>
</div>

<!-- Hero Banner with Generated AI Image -->
<div class="card card-max p-0 mb-4 overflow-hidden" style="background: linear-gradient(135deg, #0a1931 0%, #15305b 100%);">
    <div class="row g-0 align-items-center">
        <div class="col-lg-7 p-4 p-md-5 text-white">
            <span class="badge badge-max badge-max-emerald mb-2"><i class="fas fa-shield-check me-1"></i> NABH HRM Digital Compliance</span>
            <h3 class="h4 fw-bold mb-2">Primary Source Verification &amp; Staff Health Governance</h3>
            <p class="small text-white-50 mb-3">Ensure 100% staff vaccination immunity (Hepatitis-B &amp; TT), medical board approved procedural privileging, and zero expired medical council registrations.</p>
            <div class="d-flex gap-3 flex-wrap small">
                <div><i class="fas fa-check-circle text-success me-1"></i> 100% PSV Verified</div>
                <div><i class="fas fa-check-circle text-success me-1"></i> Hep-B 3-Dose Tracker</div>
                <div><i class="fas fa-check-circle text-success me-1"></i> 60/30/15d Auto Alerts</div>
            </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block text-end">
            <img src="<?= base_url('assets/images/hr_credentialing_banner.jpg') ?>" alt="Doctor Credentialing" class="img-fluid" style="height: 220px; width: 100%; object-fit: cover; border-top-right-radius: 12px; border-bottom-right-radius: 12px; opacity: 0.9;">
        </div>
    </div>
</div>

<!-- Stats Bar -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-blue">
            <span class="small text-muted d-block mb-1">Total Registered Staff</span>
            <h4 class="h5 fw-bold text-navy mb-0"><?= count($staffMembers ?? []) ?></h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-emerald">
            <span class="small text-muted d-block mb-1">Privileged Clinicians</span>
            <h4 class="h5 fw-bold text-success mb-0"><?= count($credentials ?? []) ?> Approved</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-gold">
            <span class="small text-muted d-block mb-1">Vaccinated &amp; Health Logged</span>
            <h4 class="h5 fw-bold text-warning mb-0"><?= count($healthRoster ?? []) ?> Staff</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-purple">
            <span class="small text-muted d-block mb-1">Active Expiry Alert Logs</span>
            <h4 class="h5 fw-bold mb-0" style="color: #7c3aed;"><?= count($expiryAlerts ?? []) ?> Alerts</h4>
        </div>
    </div>
</div>

<!-- Nav Tabs for HR Panel Sub-modules -->
<ul class="nav nav-pills mb-4 border-bottom pb-3 flex-wrap gap-1" id="hrTabs" role="tablist">
    <li class="nav-item">
        <button class="nav-link active fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-staff">
            <i class="fas fa-users me-1"></i> Staff Directory
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-health">
            <i class="fas fa-syringe me-1 text-success"></i> Staff Health &amp; Vaccination
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-credentialing">
            <i class="fas fa-award me-1 text-primary"></i> Doctor Privileging Workflow
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-training">
            <i class="fas fa-chalkboard-user me-1"></i> Training Management
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-expiring">
            <i class="fas fa-bell me-1 text-warning"></i> Automated Expiry Engine (<?= count($expiryAlerts ?? []) ?>)
        </button>
    </li>
</ul>

<div class="tab-content" id="hrTabContent">
    <!-- 1. Staff Directory -->
    <div class="tab-pane fade show active" id="tab-staff">
        <div class="card card-max p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="h6 fw-bold text-navy mb-0">Hospital Clinical &amp; Support Staff Master</h5>
                <span class="small text-muted">Total: <?= count($staffMembers ?? []) ?> Members</span>
            </div>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Emp Code</th>
                            <th>Staff Name &amp; Designation</th>
                            <th>Department</th>
                            <th>Qualifications</th>
                            <th>Experience</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($staffMembers)) : ?>
                            <?php foreach ($staffMembers as $s) : ?>
                                <tr>
                                    <td><span class="badge badge-max badge-max-blue"><?= esc($s['employee_code']) ?></span></td>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($s['name']) ?></strong>
                                        <span class="small text-muted"><?= esc($s['designation'] ?? 'Staff') ?></span>
                                    </td>
                                    <td><span class="badge bg-light text-dark border"><?= esc($s['department_name'] ?? 'General') ?></span></td>
                                    <td class="small"><?= esc($s['qualification'] ?? 'N/A') ?></td>
                                    <td><?= esc($s['experience_years'] ?? 0) ?> Yrs</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-navy" onclick="openHealthModal(<?= $s['id'] ?>, '<?= esc($s['name']) ?>')">
                                            <i class="fas fa-heart-pulse me-1"></i> Health Log
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" onclick="openPrivilegeModal(<?= $s['id'] ?>, '<?= esc($s['name']) ?>')">
                                            <i class="fas fa-stamp me-1"></i> Privileges
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="6" class="text-center text-muted py-4">No staff members found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 2. Staff Health & Vaccination Tracker -->
    <div class="tab-pane fade" id="tab-health">
        <div class="card card-max p-4 mb-4">
            <div class="row align-items-center mb-4 g-3">
                <div class="col-md-8">
                    <h5 class="h6 fw-bold text-navy mb-1"><i class="fas fa-shield-virus text-success me-2"></i> Staff Health &amp; Occupational Vaccination Roster</h5>
                    <p class="small text-muted mb-0">Tracking Hepatitis-B 3-dose regimen, anti-HBs antibody titers, Tetanus booster, and annual medical fitness certification under NABH HRM.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-double me-1"></i> Mandatory Infection Protocol</span>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/images/staff_vaccination_banner.jpg') ?>" alt="Staff Vaccination" class="img-fluid rounded-3 shadow-sm" style="max-height: 180px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="p-3 bg-surface-alt rounded-3 h-100 d-flex flex-column justify-content-center">
                        <strong class="text-navy small d-block mb-1"><i class="fas fa-circle-info text-primary me-1"></i> NABH Standard HRM.6 Health Guidelines:</strong>
                        <ul class="mb-0 ps-3 small text-muted">
                            <li>All high-risk clinical and laboratory personnel must receive Hepatitis-B vaccine (0, 1, 6 month schedule).</li>
                            <li>Post-vaccination anti-HBs titer testing (>10 mIU/mL considered protective; >100 mIU/mL optimal).</li>
                            <li>Annual medical examination and pre-employment health screening documented in health dossier.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Staff Member</th>
                            <th>Hepatitis-B Status</th>
                            <th>Dose Dates (D1 / D2 / D3)</th>
                            <th>Anti-HBs Titer</th>
                            <th>Annual Checkup</th>
                            <th>Fitness Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($healthRoster)) : ?>
                            <?php foreach ($healthRoster as $h) : ?>
                                <tr>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($h['staff_name']) ?></strong>
                                        <span class="small text-muted"><?= esc($h['designation'] ?? '') ?> (<?= esc($h['department_name'] ?? 'General') ?>)</span>
                                    </td>
                                    <td>
                                        <?php if ($h['hepb_status'] === 'vaccinated') : ?>
                                            <span class="badge badge-max badge-max-emerald"><i class="fas fa-shield-check me-1"></i> Complete (3 Doses)</span>
                                        <?php elseif ($h['hepb_status'] === 'partially_vaccinated') : ?>
                                            <span class="badge badge-max badge-max-gold"><i class="fas fa-clock me-1"></i> Partial (Dose Due)</span>
                                        <?php elseif ($h['hepb_status'] === 'due_booster') : ?>
                                            <span class="badge badge-max badge-max-blue"><i class="fas fa-rotate me-1"></i> Booster Due</span>
                                        <?php else : ?>
                                            <span class="badge badge-max badge-max-rose"><i class="fas fa-triangle-exclamation me-1"></i> Not Vaccinated</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="small text-muted">
                                        D1: <?= esc($h['hepb_dose1_date'] ?: '—') ?><br>
                                        D2: <?= esc($h['hepb_dose2_date'] ?: '—') ?><br>
                                        D3: <?= esc($h['hepb_dose3_date'] ?: '—') ?>
                                    </td>
                                    <td>
                                        <span class="small fw-semibold text-navy"><?= esc($h['anti_hbs_titer'] ?: 'Titer Test Pending') ?></span>
                                    </td>
                                    <td class="small text-muted">
                                        <?= esc($h['annual_checkup_date'] ?: 'Pending') ?><br>
                                        <span style="font-size:0.75rem;"><?= esc($h['medical_officer_name'] ?: '') ?></span>
                                    </td>
                                    <td>
                                        <?php if ($h['fitness_status'] === 'fit') : ?>
                                            <span class="badge bg-success-subtle text-success fw-semibold">Clinically Fit</span>
                                        <?php elseif ($h['fitness_status'] === 'fit_with_restriction') : ?>
                                            <span class="badge bg-warning-subtle text-warning fw-semibold">Fit w/ Restriction</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger-subtle text-danger fw-semibold">Temporary Unfit</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-navy" onclick="openHealthModal(<?= $h['staff_id'] ?>, '<?= esc($h['staff_name']) ?>')">
                                            <i class="fas fa-pen-to-square"></i> Update
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="7" class="text-center text-muted py-4">No health records logged yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 3. Doctor Privileging Workflow -->
    <div class="tab-pane fade" id="tab-credentialing">
        <div class="card card-max p-4 mb-4">
            <div class="row align-items-center mb-4 g-3">
                <div class="col-md-8">
                    <h5 class="h6 fw-bold text-navy mb-1"><i class="fas fa-stamp text-primary me-2"></i> Clinical Privileging &amp; Credentials Committee Approval</h5>
                    <p class="small text-muted mb-0">Multi-tier authorization workflow for Core, Specific, and High-Risk surgical/interventional clinical privileges.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge badge-max badge-max-blue"><i class="fas fa-file-signature me-1"></i> Medical Board Governance</span>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/images/credentials_committee_banner.jpg') ?>" alt="Credentials Committee" class="img-fluid rounded-3 shadow-sm" style="max-height: 180px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="p-3 bg-surface-alt rounded-3 h-100 d-flex flex-column justify-content-center">
                        <strong class="text-navy small d-block mb-1"><i class="fas fa-diagram-project text-primary me-1"></i> 3-Tier Digital Privileging Approval Flow:</strong>
                        <div class="d-flex align-items-center gap-2 flex-wrap text-muted small mt-2">
                            <span class="badge bg-white text-dark border p-2">1. Doctor Privileging Application</span>
                            <i class="fas fa-arrow-right text-primary"></i>
                            <span class="badge bg-white text-dark border p-2">2. Credentials Committee Evaluation</span>
                            <i class="fas fa-arrow-right text-primary"></i>
                            <span class="badge bg-success-subtle text-success border border-success p-2">3. Medical Superintendent Digital Sign-off</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Clinician Name</th>
                            <th>Authorized Procedure / Privileges</th>
                            <th>Privilege Type</th>
                            <th>Committee Approval Status</th>
                            <th>Valid Until</th>
                            <th>Review Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($credentials)) : ?>
                            <?php foreach ($credentials as $c) : ?>
                                <tr>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($c['staff_name']) ?></strong>
                                        <span class="small text-muted"><?= esc($c['designation'] ?? '') ?></span>
                                    </td>
                                    <td><span class="small fw-semibold text-navy"><?= esc($c['procedure']) ?></span></td>
                                    <td>
                                        <?php if (($c['privilege_type'] ?? '') === 'high_risk') : ?>
                                            <span class="badge badge-max badge-max-rose">High-Risk Special</span>
                                        <?php elseif (($c['privilege_type'] ?? '') === 'specific') : ?>
                                            <span class="badge badge-max badge-max-gold">Specific Clinical</span>
                                        <?php else : ?>
                                            <span class="badge badge-max badge-max-blue">Core General</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (($c['committee_status'] ?? '') === 'ms_approved') : ?>
                                            <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> MS Approved</span>
                                        <?php elseif (($c['committee_status'] ?? '') === 'committee_approved') : ?>
                                            <span class="badge badge-max badge-max-gold"><i class="fas fa-user-check me-1"></i> Committee Verified</span>
                                        <?php else : ?>
                                            <span class="badge badge-max badge-max-navy">Draft / Review Due</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="small"><?= esc($c['valid_until'] ?? 'N/A') ?></td>
                                    <td class="small text-muted"><?= esc($c['notes'] ?? 'Peer reviewed.') ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="openPrivilegeModal(<?= $c['staff_id'] ?>, '<?= esc($c['staff_name']) ?>')">
                                            <i class="fas fa-stamp"></i> Update
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="7" class="text-center text-muted py-4">No credentialing records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 4. Training Management -->
    <div class="tab-pane fade" id="tab-training">
        <div class="card card-max p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="h6 fw-bold text-navy mb-0">NABH Mandatory Staff Training Calendar</h5>
                <button class="btn btn-gold-max btn-sm" data-bs-toggle="modal" data-bs-target="#addTrainingModal">
                    <i class="fas fa-plus me-1"></i> Schedule Session
                </button>
            </div>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Training Topic</th>
                            <th>Category</th>
                            <th>Scheduled Date</th>
                            <th>Trainer</th>
                            <th>Staff Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($trainings)) : ?>
                            <?php foreach ($trainings as $t) : ?>
                                <tr>
                                    <td><strong class="text-navy"><?= esc($t['title']) ?></strong></td>
                                    <td><span class="badge badge-max badge-max-gold"><?= esc($t['type']) ?></span></td>
                                    <td><?= esc($t['scheduled_date']) ?></td>
                                    <td><?= esc($t['trainer_name'] ?? 'In-House Quality Lead') ?></td>
                                    <td><span class="badge badge-max badge-max-emerald"><?= esc($t['attended_count'] ?? 0) ?> Attendees</span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="5" class="text-center text-muted py-4">No training sessions scheduled.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 5. Automated Expiry Engine (60/30/15d) -->
    <div class="tab-pane fade" id="tab-expiring">
        <div class="card card-max p-4">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <h5 class="h6 fw-bold text-navy mb-1"><i class="fas fa-bell text-warning me-2"></i> Automated 60/30/15-Day Expiry Engine Logs</h5>
                    <p class="small text-muted mb-0">Real-time alert triggers dispatched for State Medical Council renewals, BLS/ACLS certifications, and booster vaccines.</p>
                </div>
                <form action="<?= site_url('hr/run-expiry-check') ?>" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-sm btn-outline-warning fw-semibold">
                        <i class="fas fa-play me-1"></i> Run Scan Now
                    </button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Staff Member</th>
                            <th>Alert Category</th>
                            <th>Days Window</th>
                            <th>Document Expiry Date</th>
                            <th>Notification Dispatch</th>
                            <th>Alert Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($expiryAlerts)) : ?>
                            <?php foreach ($expiryAlerts as $a) : ?>
                                <tr>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($a['staff_name']) ?></strong>
                                        <span class="small text-muted"><?= esc($a['employee_code']) ?></span>
                                    </td>
                                    <td>
                                        <?php if ($a['alert_type'] === 'council_reg') : ?>
                                            <span class="badge badge-max badge-max-rose"><i class="fas fa-id-card me-1"></i> State Council License</span>
                                        <?php elseif ($a['alert_type'] === 'bls_acls') : ?>
                                            <span class="badge badge-max badge-max-gold"><i class="fas fa-certificate me-1"></i> BLS/ACLS Recert</span>
                                        <?php else : ?>
                                            <span class="badge badge-max badge-max-blue"><i class="fas fa-syringe me-1"></i> Vaccine Booster</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning fw-bold"><?= esc($a['days_threshold']) ?> Days Alert</span>
                                    </td>
                                    <td class="small fw-semibold text-danger"><?= esc($a['expiry_date']) ?></td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success"><i class="fas fa-paper-plane me-1"></i> <?= esc(strtoupper($a['sent_channel'])) ?> Sent</span>
                                    </td>
                                    <td class="small text-muted"><?= esc($a['details']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="6" class="text-center text-muted py-4">All credentials are up to date! No immediate expiry alerts.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================
     MODALS
========================================================= -->

<!-- Add Staff Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <form action="<?= site_url('hr/create') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title fw-bold text-navy mb-0"><i class="fas fa-user-plus text-primary me-2"></i> Register New Staff / Clinician</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Full Name &amp; Title *</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Dr. Ramesh Gupta" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Employee Code *</label>
                            <input type="text" name="employee_code" class="form-control" placeholder="e.g. DOC-CARD-501" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Department *</label>
                            <select name="department_id" class="form-select" required>
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $d) : ?>
                                    <option value="<?= $d['id'] ?>"><?= esc($d['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Designation *</label>
                            <input type="text" name="designation" class="form-control" placeholder="e.g. Senior Consultant / ICU Nurse" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Academic Qualifications *</label>
                            <input type="text" name="qualification" class="form-control" placeholder="e.g. MBBS, MD, DM / B.Sc Nursing" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-navy">Experience (Years)</label>
                            <input type="number" name="experience_years" class="form-control" value="5" min="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-navy">Contact Number</label>
                            <input type="text" name="contact" class="form-control" placeholder="+91 98765 00000">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top py-3 px-4">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary-max">Save Staff Dossier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Staff Health Modal -->
<div class="modal fade" id="updateHealthModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <form action="<?= site_url('hr/update-health') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="staff_id" id="healthStaffId">
                <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title fw-bold text-navy mb-0"><i class="fas fa-heart-pulse text-success me-2"></i> Update Staff Health &amp; Vaccination Log</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 px-3 small mb-3">
                        Updating health &amp; Hepatitis-B records for <strong id="healthStaffName">Staff Member</strong>.
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold text-navy">Hep-B Dose 1 Date</label>
                            <input type="date" name="hepb_dose1_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold text-navy">Hep-B Dose 2 Date</label>
                            <input type="date" name="hepb_dose2_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold text-navy">Hep-B Dose 3 Date</label>
                            <input type="date" name="hepb_dose3_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Hepatitis-B Overall Status</label>
                            <select name="hepb_status" class="form-select">
                                <option value="vaccinated">Fully Vaccinated (3 Doses Complete)</option>
                                <option value="partially_vaccinated">Partially Vaccinated (Dose Pending)</option>
                                <option value="due_booster">Booster Dose Required</option>
                                <option value="not_vaccinated">Not Vaccinated / Exemption</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Anti-HBs Antibody Titer</label>
                            <input type="text" name="anti_hbs_titer" class="form-control" placeholder="e.g. >100 mIU/mL (Optimal)">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Annual Medical Checkup Date</label>
                            <input type="date" name="annual_checkup_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Clinical Fitness Status</label>
                            <select name="fitness_status" class="form-select">
                                <option value="fit">Clinically Fit (No Restrictions)</option>
                                <option value="fit_with_restriction">Fit with Restriction (Latex allergy, N95)</option>
                                <option value="unfit">Temporarily Unfit for Clinical Duty</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label small fw-semibold text-navy">Occupational Health Officer Remarks</label>
                            <textarea name="health_remarks" class="form-control" rows="2" placeholder="Enter clinical fitness remarks and vaccination notes..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top py-3 px-4">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Update Health Record</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Privileging Modal -->
<div class="modal fade" id="updatePrivilegeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <form action="<?= site_url('hr/update-privileging') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="staff_id" id="privStaffId">
                <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title fw-bold text-navy mb-0"><i class="fas fa-stamp text-primary me-2"></i> Doctor Procedural Privileging Decision</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="alert alert-primary py-2 px-3 small mb-3">
                        Evaluating clinical scope &amp; privileges for <strong id="privStaffName">Clinician</strong>.
                    </div>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label small fw-semibold text-navy">Authorized Clinical &amp; Surgical Procedures *</label>
                            <input type="text" name="procedure" class="form-control" placeholder="e.g. Primary PCI, Coronary Angiography, Central Line" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Privilege Category</label>
                            <select name="privilege_type" class="form-select">
                                <option value="core">Core General Privileges</option>
                                <option value="specific">Specific Advanced Privileges</option>
                                <option value="high_risk">High-Risk / Super-specialty Privileges</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Credentials Committee Decision</label>
                            <select name="committee_status" class="form-select">
                                <option value="draft">Draft (Under Departmental Review)</option>
                                <option value="committee_approved">Credentials Committee Verified</option>
                                <option value="ms_approved">Medical Superintendent E-Approved</option>
                                <option value="rejected">Privilege Request Denied</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Privilege Validity Until</label>
                            <input type="date" name="valid_until" class="form-control" value="<?= date('Y-m-d', strtotime('+1 year')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Credentials Committee Review Notes</label>
                            <input type="text" name="notes" class="form-control" placeholder="e.g. Surgical logbook reviewed and approved by HOD.">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top py-3 px-4">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary-max">Submit Privileging Decision</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Training Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <form action="<?= site_url('hr/create-training') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header border-bottom py-3 px-4" style="background: #f8fafc; border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title fw-bold text-navy mb-0"><i class="fas fa-calendar-plus text-primary me-2"></i> Schedule NABH Mandatory Training</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label small fw-semibold text-navy">Training Topic *</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. AHA Basic Life Support (BLS) Hands-on Drill" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Category</label>
                            <select name="type" class="form-select">
                                <option value="Infection Control">Infection Control (HIC)</option>
                                <option value="BLS/ACLS">BLS / ACLS Emergency Resuscitation</option>
                                <option value="Fire Safety">Fire Safety &amp; Code Red Drills</option>
                                <option value="Medication Safety">Medication Safety &amp; LASA Drugs</option>
                                <option value="Patient Rights">Patient Rights &amp; Informed Consent</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-navy">Scheduled Date</label>
                            <input type="date" name="scheduled_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label small fw-semibold text-navy">Certified Trainer / Faculty Name</label>
                            <input type="text" name="trainer_name" class="form-control" placeholder="e.g. Dr. Rajeshwar Kulkarni (AHA Instructor)">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top py-3 px-4">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary-max">Schedule Training</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openHealthModal(staffId, staffName) {
    document.getElementById('healthStaffId').value = staffId;
    document.getElementById('healthStaffName').innerText = staffName;
    const modal = new bootstrap.Modal(document.getElementById('updateHealthModal'));
    modal.show();
}

function openPrivilegeModal(staffId, staffName) {
    document.getElementById('privStaffId').value = staffId;
    document.getElementById('privStaffName').innerText = staffName;
    const modal = new bootstrap.Modal(document.getElementById('updatePrivilegeModal'));
    modal.show();
}
</script>
