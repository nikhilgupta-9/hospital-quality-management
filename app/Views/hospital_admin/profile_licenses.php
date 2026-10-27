<!-- =========================================================
     MODULE 2: HOSPITAL PROFILE & STATUTORY LICENCES
     Part A: Hospital ID Profile & Capacity Metrics
     Part B: Statutory & Legal Licences (Traffic Light Engine)
========================================================= -->

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <span class="badge px-3 py-1 mb-2 text-white fw-bold" style="background-color: #0c74c5; font-size: 0.75rem; letter-spacing: 0.05em;">
            <i class="fas fa-hospital me-1"></i> MODULE #2: HOSPITAL MASTER GOVERNANCE
        </span>
        <h2 class="h4 text-navy fw-bold mb-1" style="font-family: var(--font-heading);">
            Hospital Profile &amp; Statutory Licences
        </h2>
        <p class="text-muted small mb-0">
            Manage hospital registration identifiers, sanctioned bed infrastructure, and track government licenses with automated traffic-light expiry warnings.
        </p>
    </div>

    <!-- Quick Traffic Light Metric Pill -->
    <div class="d-flex align-items-center gap-2 bg-white px-3 py-2 rounded-3 border shadow-xs">
        <span class="small fw-bold text-navy me-1">License Health:</span>
        <span class="badge bg-success" title="Safe (>60 Days Remaining)">
            <i class="fas fa-check-circle me-1"></i> <?= esc($counts['green'] ?? 0) ?> Safe
        </span>
        <span class="badge bg-warning text-dark" title="Warning (1-60 Days Remaining)">
            <i class="fas fa-triangle-exclamation me-1"></i> <?= esc($counts['yellow'] ?? 0) ?> Due
        </span>
        <span class="badge bg-danger text-white" title="Critical / Expired">
            <i class="fas fa-circle-xmark me-1"></i> <?= esc($counts['red'] ?? 0) ?> Expired
        </span>
    </div>
</div>

<!-- =========================================================
     NAVIGATION TABS (PART A vs PART B)
========================================================= -->
<ul class="nav nav-pills mb-4 gap-2 bg-white p-2 rounded-3 border shadow-xs" id="profileTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold px-4 py-2 <?= ($activeTab === 'profile') ? 'active' : '' ?>" id="tab-profile-btn" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" style="border-radius: 8px;">
            <i class="fas fa-hospital-user me-2"></i> Part A: Hospital ID &amp; Capacity Profile
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold px-4 py-2 <?= ($activeTab === 'licenses') ? 'active' : '' ?>" id="tab-licenses-btn" data-bs-toggle="pill" data-bs-target="#tab-licenses" type="button" role="tab" style="border-radius: 8px;">
            <i class="fas fa-shield-halved me-2"></i> Part B: Statutory Licences &amp; Upload Buckets
            <?php if (($counts['red'] ?? 0) > 0) : ?>
                <span class="badge bg-danger ms-2"><?= esc($counts['red']) ?> Urgent</span>
            <?php elseif (($counts['yellow'] ?? 0) > 0) : ?>
                <span class="badge bg-warning text-dark ms-2"><?= esc($counts['yellow']) ?> Warning</span>
            <?php endif; ?>
        </button>
    </li>
</ul>

<div class="tab-content" id="profileTabsContent">

    <!-- =========================================================
         TAB 1: PART A — HOSPITAL ID & INFRASTRUCTURE PROFILE
    ========================================================= -->
    <div class="tab-pane fade <?= ($activeTab === 'profile') ? 'show active' : '' ?>" id="tab-profile" role="tabpanel">
        <form action="<?= site_url('hospital-admin/profile/update') ?>" method="POST">
            <?= csrf_field() ?>

            <!-- Section 1: Basic & National Identity -->
            <div class="card border bg-white shadow-sm mb-4" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                <div class="card-header p-4 bg-white border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: #0c74c5;">
                            <i class="fas fa-building" style="font-size: 0.95rem;"></i>
                        </div>
                        <div>
                            <h5 class="h6 fw-bold text-navy mb-0">1. Hospital Basic &amp; National Registry Identity</h5>
                            <span class="text-muted small">Standardized identification for state health authorities, Ayushman Bharat (ABDM), and insurance (ROHINI).</span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-navy">Hospital Legal Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?= esc($hospital['name'] ?? '') ?>" required>
                            <span class="text-muted small" style="font-size: 0.72rem;">Exact registered name matching state clinical establishment license</span>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-navy">Hospital Code</label>
                            <input type="text" class="form-control bg-light" value="<?= esc($hospital['code'] ?? '') ?>" readonly>
                            <span class="text-muted small" style="font-size: 0.72rem;">Unique system branch identifier</span>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-navy">Facility Category</label>
                            <select name="hospital_type" class="form-select">
                                <option value="Superspeciality Tertiary Care Hospital" <?= ($profile['hospital_type'] ?? '') === 'Superspeciality Tertiary Care Hospital' ? 'selected' : '' ?>>Superspeciality Hospital</option>
                                <option value="Multispeciality Hospital" <?= ($profile['hospital_type'] ?? '') === 'Multispeciality Hospital' ? 'selected' : '' ?>>Multispeciality Hospital</option>
                                <option value="General Hospital" <?= ($profile['hospital_type'] ?? '') === 'General Hospital' ? 'selected' : '' ?>>General Hospital</option>
                                <option value="Eye & Daycare Centre" <?= ($profile['hospital_type'] ?? '') === 'Eye & Daycare Centre' ? 'selected' : '' ?>>Eye &amp; Daycare Centre</option>
                                <option value="Maternity & Nursing Home" <?= ($profile['hospital_type'] ?? '') === 'Maternity & Nursing Home' ? 'selected' : '' ?>>Maternity &amp; Nursing Home</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-navy">ROHINI ID (Insurance Information Bureau)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="fas fa-fingerprint"></i></span>
                                <input type="text" name="rohini_id" class="form-control font-monospace" placeholder="e.g. ROHINI-890241-DEL" value="<?= esc($profile['rohini_id'] ?? '') ?>">
                            </div>
                            <span class="text-muted small" style="font-size: 0.72rem;">Mandatory for cashless insurance and TPA empanelment verification</span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-navy">ABDM HIP ID (National Health Facility Registry)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="fas fa-network-wired"></i></span>
                                <input type="text" name="abdm_hip_id" class="form-control font-monospace" placeholder="e.g. IN0710000421" value="<?= esc($profile['abdm_hip_id'] ?? '') ?>">
                            </div>
                            <span class="text-muted small" style="font-size: 0.72rem;">Required for NHA Ayushman Bharat Digital Mission (M3) record discovery</span>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-navy">Hospital Campus &amp; Physical Address</label>
                            <textarea name="address" class="form-control" rows="2"><?= esc($hospital['address'] ?? ($profile['address_details'] ?? '')) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Quality & Nodal Officer Details -->
            <div class="card border bg-white shadow-sm mb-4" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                <div class="card-header p-4 bg-white border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: #ff7a00;">
                            <i class="fas fa-user-tie" style="font-size: 0.95rem;"></i>
                        </div>
                        <div>
                            <h5 class="h6 fw-bold text-navy mb-0">2. Nodal Officer &amp; Quality Management Contact</h5>
                            <span class="text-muted small">Designated point of contact for regulatory assessors, fire authorities, and pollution board notices.</span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-navy">Nodal Officer / Quality Head Name</label>
                            <input type="text" name="nodal_officer_name" class="form-control" value="<?= esc($profile['nodal_officer_name'] ?? '') ?>" placeholder="e.g. Dr. Ananya Sen">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-navy">Official Email ID</label>
                            <input type="email" name="nodal_officer_email" class="form-control" value="<?= esc($profile['nodal_officer_email'] ?? '') ?>" placeholder="e.g. nabh@hospital.org">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-navy">Direct Mobile Number</label>
                            <input type="text" name="nodal_officer_phone" class="form-control" value="<?= esc($profile['nodal_officer_phone'] ?? '') ?>" placeholder="e.g. +91 98112-XXXXX">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Capacity & Specialties Matrix -->
            <div class="card border bg-white shadow-sm mb-4" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                <div class="card-header p-4 bg-white border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: #10b981;">
                            <i class="fas fa-bed-pulse" style="font-size: 0.95rem;"></i>
                        </div>
                        <div>
                            <h5 class="h6 fw-bold text-navy mb-0">3. Inpatient Bed Capacity &amp; Specialties Matrix</h5>
                            <span class="text-muted small">Sanctioned beds determining statutory nurse-to-patient ratios and biomedical waste limits.</span>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 border bg-light">
                                <label class="form-label small fw-bold text-navy">Total Sanctioned Operational Beds <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-primary"><i class="fas fa-bed"></i></span>
                                    <input type="number" name="total_sanctioned_beds" class="form-control form-control-lg fw-bold" value="<?= esc($profile['total_sanctioned_beds'] ?? 100) ?>" min="1" required>
                                </div>
                                <span class="text-muted small" style="font-size: 0.72rem;">As endorsed in your state Clinical Establishment Act certificate</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 rounded-3 border bg-light">
                                <label class="form-label small fw-bold text-navy">Total ICU / Critical Care Beds <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-danger"><i class="fas fa-heart-pulse"></i></span>
                                    <input type="number" name="total_icu_beds" class="form-control form-control-lg fw-bold" value="<?= esc($profile['total_icu_beds'] ?? 15) ?>" min="0" required>
                                </div>
                                <span class="text-muted small" style="font-size: 0.72rem;">Includes Medical, Surgical, Neonatal (NICU) and Cardiac ICUs</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="form-label small fw-bold text-navy mb-2">Available Clinical Specialties (Select all that apply):</label>
                        <?php 
                        $allSpecialties = [
                            'General Medicine', 'General Surgery', 'Cardiology & Cath Lab', 
                            'Orthopaedics & Joint Replacement', 'Obstetrics & Gynaecology', 
                            'Pediatrics & NICU', 'Critical Care & ICU', 'Emergency & Trauma', 
                            'Nephrology & Dialysis', 'Radio-Diagnosis & Imaging', 'Oncology', 
                            'Neurology & Neurosurgery', 'ENT & Ophthalmology', 'Urology', 
                            'Gastroenterology', 'Dermatology & Cosmetology'
                        ];
                        $selectedSpecs = $profile['specialties_list'] ?? [];
                        ?>
                        <div class="row g-2">
                            <?php foreach ($allSpecialties as $spec) : ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-check p-2 rounded border bg-light">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="specialties[]" value="<?= esc($spec) ?>" id="spec_<?= md5($spec) ?>" <?= in_array($spec, $selectedSpecs, true) ? 'checked' : '' ?>>
                                        <label class="form-check-label small fw-semibold text-dark" for="spec_<?= md5($spec) ?>">
                                            <?= esc($spec) ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer p-3 bg-light border-top text-end">
                    <button type="submit" class="btn text-white fw-bold px-4 py-2" style="background-color: #0c74c5; border-radius: 6px;">
                        <i class="fas fa-floppy-disk me-1"></i> Save Hospital Profile &amp; Metrics
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- =========================================================
         TAB 2: PART B — STATUTORY & LEGAL LICENCES (TRAFFIC LIGHT)
    ========================================================= -->
    <div class="tab-pane fade <?= ($activeTab === 'licenses') ? 'show active' : '' ?>" id="tab-licenses" role="tabpanel">

        <!-- Traffic Light Rules Banner -->
        <div class="card border-0 mb-4 text-white shadow-xs" style="background-color: #1a2340; border-radius: 12px; border-left: 4px solid #ff7a00 !important;">
            <div class="p-3 p-md-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <h5 class="h6 fw-bold text-white mb-1">
                            <i class="fas fa-traffic-light text-warning me-2"></i> Automated Traffic-Light Expiry Engine
                        </h5>
                        <p class="text-white-50 small mb-0">
                            The system continuously calculates <code>(Expiry Date - Today)</code> for all 7 statutory government licenses and automatically generates tiered alerts.
                        </p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-success px-3 py-2 small fw-bold">🟢 &gt; 60 Days: Safe</span>
                        <span class="badge bg-warning text-dark px-3 py-2 small fw-bold">🟡 1 to 60 Days: Renewal Alert</span>
                        <span class="badge bg-danger text-white px-3 py-2 small fw-bold">🔴 &le; 0 Days: Expired / Critical</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7 License Cards Grid -->
        <div class="row g-4">
            <?php foreach ($licenses as $lic) : ?>
                <div class="col-lg-6">
                    <div class="card border bg-white shadow-sm h-100 d-flex flex-column justify-content-between" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                        <div class="card-header p-3 bg-white border-bottom">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div>
                                    <span class="badge bg-light text-muted border mb-1" style="font-size: 0.7rem;">
                                        <?= esc($lic['license_category']) ?>
                                    </span>
                                    <h5 class="h6 fw-bold text-navy mb-0">
                                        <?= esc($lic['title']) ?>
                                    </h5>
                                </div>
                                <span class="badge <?= esc($lic['badge_class']) ?> px-2 py-1" style="font-size: 0.75rem;">
                                    <?= esc($lic['light_text']) ?>
                                </span>
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="row g-2 mb-3 small">
                                <div class="col-6">
                                    <span class="text-muted d-block" style="font-size: 0.72rem;">License / Cert No:</span>
                                    <strong class="text-navy font-monospace"><?= esc($lic['license_number'] ?: 'Not Specified') ?></strong>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted d-block" style="font-size: 0.72rem;">Issuing Authority:</span>
                                    <span class="text-dark fw-semibold text-truncate d-block" title="<?= esc($lic['issuing_authority']) ?>"><?= esc($lic['issuing_authority'] ?: 'State Authority') ?></span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted d-block" style="font-size: 0.72rem;">Issue Date:</span>
                                    <span class="text-dark"><?= !empty($lic['issue_date']) ? date('d M Y', strtotime($lic['issue_date'])) : '—' ?></span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted d-block" style="font-size: 0.72rem;">Expiry Date:</span>
                                    <strong class="<?= $lic['traffic_light'] === 'red' ? 'text-danger' : ($lic['traffic_light'] === 'yellow' ? 'text-warning' : 'text-success') ?>">
                                        <?= !empty($lic['expiry_date']) ? date('d M Y', strtotime($lic['expiry_date'])) : '—' ?>
                                    </strong>
                                </div>
                            </div>

                            <!-- Remarks / Subtext -->
                            <?php if (!empty($lic['remarks'])) : ?>
                                <div class="p-2 rounded mb-3 small" style="background-color: #f8fafc; border-left: 3px solid #0c74c5; font-size: 0.78rem;">
                                    <span class="text-muted"><?= esc($lic['remarks']) ?></span>
                                </div>
                            <?php endif; ?>

                            <!-- Document Attachment -->
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light border">
                                <div class="d-flex align-items-center gap-2 overflow-hidden">
                                    <i class="fas fa-file-pdf text-danger fs-5"></i>
                                    <div class="text-truncate">
                                        <span class="small fw-semibold text-dark d-block text-truncate">
                                            <?= !empty($lic['document_path']) ? basename($lic['document_path']) : 'No Certificate Uploaded' ?>
                                        </span>
                                        <span class="text-muted" style="font-size: 0.7rem;">S3 / Local Encrypted Storage</span>
                                    </div>
                                </div>

                                <?php if (!empty($lic['document_path'])) : ?>
                                    <a href="<?= base_url($lic['document_path']) ?>" target="_blank" class="btn btn-sm btn-outline-navy fw-bold" style="font-size: 0.72rem;">
                                        <i class="fas fa-arrow-up-right-from-square me-1"></i> View File
                                    </a>
                                <?php else : ?>
                                    <span class="badge bg-secondary-subtle text-muted" style="font-size: 0.7rem;">Pending Upload</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-footer p-3 bg-white border-top text-end">
                            <button type="button" class="btn btn-sm text-white fw-bold px-3" style="background-color: #0c74c5; border-radius: 6px; font-size: 0.8rem;" 
                                    onclick="openLicenseModal(<?= htmlspecialchars(json_encode($lic), ENT_QUOTES, 'UTF-8') ?>)">
                                <i class="fas fa-pen-to-square me-1"></i> Update License &amp; Upload
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<!-- =========================================================
     MODAL: UPDATE LICENSE & FILE UPLOAD
========================================================= -->
<div class="modal fade" id="licenseEditModal" tabindex="-1" aria-labelledby="licenseEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
            <form action="<?= site_url('hospital-admin/profile/license/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="license_id" id="modal_license_id">

                <div class="modal-header text-white" style="background-color: #1a2340; border-bottom: 3px solid #ff7a00;">
                    <div>
                        <span class="badge mb-1 text-white" style="background-color: #0c74c5;" id="modal_license_cat">Category</span>
                        <h5 class="modal-title h6 fw-bold text-white mb-0" id="modal_license_title">Update License</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">License / Certificate Registration Number</label>
                        <input type="text" name="license_number" id="modal_license_number" class="form-control" placeholder="e.g. DFS/MS/2024/HQ/892" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Issuing Authority / Government Department</label>
                        <input type="text" name="issuing_authority" id="modal_issuing_authority" class="form-control" placeholder="e.g. State Pollution Control Board">
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Issue Date</label>
                            <input type="date" name="issue_date" id="modal_issue_date" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Expiry Date <span class="text-danger">*</span></label>
                            <input type="date" name="expiry_date" id="modal_expiry_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Upload Certificate Copy (PDF or JPG/PNG, Max 10MB)</label>
                        <input type="file" name="license_document" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                        <span class="text-muted small" style="font-size: 0.72rem;">Drag &amp; drop clean scanned certificate for auditor inspection</span>
                    </div>

                    <div class="mb-0">
                        <label class="form-label small fw-bold text-navy">Internal Notes / Renewal Remarks</label>
                        <textarea name="remarks" id="modal_remarks" class="form-control" rows="2" placeholder="e.g. Inspection fee paid; physical verification scheduled."></textarea>
                    </div>
                </div>

                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm text-white fw-bold px-3" style="background-color: #ff7a00;">
                        <i class="fas fa-check me-1"></i> Save &amp; Recalculate Expiry
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openLicenseModal(license) {
    document.getElementById('modal_license_id').value = license.id;
    document.getElementById('modal_license_cat').innerText = license.license_category;
    document.getElementById('modal_license_title').innerText = license.title;
    document.getElementById('modal_license_number').value = license.license_number || '';
    document.getElementById('modal_issuing_authority').value = license.issuing_authority || '';
    document.getElementById('modal_issue_date').value = license.issue_date || '';
    document.getElementById('modal_expiry_date').value = license.expiry_date || '';
    document.getElementById('modal_remarks').value = license.remarks || '';

    const modal = new bootstrap.Modal(document.getElementById('licenseEditModal'));
    modal.show();
}
</script>
