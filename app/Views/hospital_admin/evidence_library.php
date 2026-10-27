<!-- =========================================================
     MODULE #5: LIVE PHOTO & VIDEO AUDIT EVIDENCE LIBRARY
     Timestamped, Geo-Tagged Photographic & Video Verification Vault
========================================================= -->

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <span class="badge px-3 py-1 mb-2 text-white fw-bold" style="background-color: #10b981; font-size: 0.75rem; letter-spacing: 0.05em;">
            <i class="fas fa-camera me-1"></i> MODULE #5: AUDITOR EVIDENCE VAULT
        </span>
        <h2 class="h4 text-navy fw-bold mb-1" style="font-family: var(--font-heading);">
            Live Photo &amp; Video Evidence Library
        </h2>
        <p class="text-muted small mb-0">
            Timestamped &amp; geo-tagged photographic evidence of fire safety mock drills, BMW waste bays, and biomedical calibration stickers for NABH assessor desktop validation.
        </p>
    </div>

    <button type="button" class="btn btn-sm text-white fw-bold" style="background-color: #0c74c5;" data-bs-toggle="modal" data-bs-target="#uploadEvidenceModal">
        <i class="fas fa-upload me-1"></i> Upload Evidence Photo / Video
    </button>
</div>

<!-- =========================================================
     CATEGORY FILTER PILLS
========================================================= -->
<div class="d-flex flex-wrap gap-2 mb-4">
    <a href="<?= site_url('hospital-admin/evidence-library?category=all') ?>" class="btn btn-sm <?= ($activeCategory === 'all') ? 'btn-navy text-white' : 'btn-outline-secondary bg-white' ?>" style="border-radius: 20px;">
        All Evidence (<?= count($evidence) ?>)
    </a>
    <a href="<?= site_url('hospital-admin/evidence-library?category=fire_drill') ?>" class="btn btn-sm <?= ($activeCategory === 'fire_drill') ? 'btn-danger text-white' : 'btn-outline-danger bg-white' ?>" style="border-radius: 20px;">
        <i class="fas fa-fire-extinguisher me-1"></i> Fire Drills
    </a>
    <a href="<?= site_url('hospital-admin/evidence-library?category=bmw_waste') ?>" class="btn btn-sm <?= ($activeCategory === 'bmw_waste') ? 'btn-warning text-dark' : 'btn-outline-warning bg-white text-dark' ?>" style="border-radius: 20px;">
        <i class="fas fa-recycle me-1"></i> BMW Waste Storage
    </a>
    <a href="<?= site_url('hospital-admin/evidence-library?category=calibration_tag') ?>" class="btn btn-sm <?= ($activeCategory === 'calibration_tag') ? 'btn-primary text-white' : 'btn-outline-primary bg-white' ?>" style="border-radius: 20px;">
        <i class="fas fa-tag me-1"></i> Machine Calibration Tags
    </a>
    <a href="<?= site_url('hospital-admin/evidence-library?category=ot_icu') ?>" class="btn btn-sm <?= ($activeCategory === 'ot_icu') ? 'btn-success text-white' : 'btn-outline-success bg-white' ?>" style="border-radius: 20px;">
        <i class="fas fa-stethoscope me-1"></i> OT &amp; ICU Pressure
    </a>
</div>

<!-- =========================================================
     EVIDENCE GALLERY GRID
========================================================= -->
<div class="row g-4 mb-4">
    <?php if (empty($evidence)) : ?>
        <div class="col-12">
            <div class="card p-5 text-center border bg-white rounded-3">
                <i class="fas fa-images fs-1 text-muted mb-3"></i>
                <h5 class="h6 text-navy fw-bold">No Evidence Uploaded in this Category</h5>
                <p class="text-muted small mb-3">Upload timestamped photos of hospital mock drills or equipment tags for assessor review.</p>
                <div>
                    <button type="button" class="btn btn-sm text-white fw-bold" style="background-color: #0c74c5;" data-bs-toggle="modal" data-bs-target="#uploadEvidenceModal">
                        Upload Evidence
                    </button>
                </div>
            </div>
        </div>
    <?php else : ?>
        <?php foreach ($evidence as $ev) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="card border bg-white shadow-sm h-100 d-flex flex-column justify-content-between rounded-3 overflow-hidden" style="border-color: #e2e8f0 !important;">
                    <!-- Media Preview -->
                    <div class="position-relative bg-dark" style="height: 220px; overflow: hidden;">
                        <?php if ($ev['media_type'] === 'video') : ?>
                            <video src="<?= base_url($ev['file_path']) ?>" controls class="w-100 h-100" style="object-fit: cover;"></video>
                        <?php else : ?>
                            <img src="<?= base_url($ev['file_path']) ?>" alt="<?= esc($ev['title']) ?>" class="w-100 h-100" style="object-fit: cover;">
                        <?php endif; ?>

                        <!-- Top Floating Badges -->
                        <div class="position-absolute top-0 start-0 m-2">
                            <span class="badge text-white" style="background-color: #1a2340; font-size: 0.7rem;">
                                <?= esc(ucfirst(str_replace('_', ' ', $ev['category']))) ?>
                            </span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-success shadow-xs" style="font-size: 0.7rem;">
                                <i class="fas fa-check-double me-1"></i> Verified
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <h5 class="h6 fw-bold text-navy mb-2"><?= esc($ev['title']) ?></h5>
                        
                        <div class="d-flex flex-column gap-1 text-muted small mb-3" style="font-size: 0.75rem;">
                            <div>
                                <i class="fas fa-sitemap me-1 text-primary"></i> Department: <strong><?= esc($ev['department_name'] ?: 'General') ?></strong>
                            </div>
                            <div>
                                <i class="fas fa-calendar me-1 text-success"></i> Date: <?= date('d M Y', strtotime($ev['capture_date'])) ?>
                            </div>
                            <?php if (!empty($ev['geo_location'])) : ?>
                                <div class="text-truncate">
                                    <i class="fas fa-location-dot me-1 text-danger"></i> Geo-Tag: <?= esc($ev['geo_location']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($ev['remarks'])) : ?>
                            <p class="text-muted small mb-0" style="font-size: 0.78rem; line-height: 1.4;">
                                <?= esc($ev['remarks']) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer p-2 bg-light border-top text-end">
                        <a href="<?= base_url($ev['file_path']) ?>" target="_blank" class="btn btn-sm btn-outline-navy" style="font-size: 0.75rem;">
                            <i class="fas fa-up-right-and-down-left-from-center me-1"></i> Full View
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- =========================================================
     MODAL: UPLOAD EVIDENCE
========================================================= -->
<div class="modal fade" id="uploadEvidenceModal" tabindex="-1" aria-labelledby="uploadEvidenceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
            <form action="<?= site_url('hospital-admin/evidence-library/upload') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="modal-header text-white" style="background-color: #1a2340; border-bottom: 3px solid #10b981;">
                    <h5 class="modal-title h6 fw-bold text-white mb-0">Upload Auditor Evidence Photo / Video</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Evidence Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Q4 Basement Fire Evacuation Mock Drill" required>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Evidence Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required>
                                <option value="fire_drill">Fire &amp; Disaster Mock Drill</option>
                                <option value="bmw_waste">BMW Central Waste Room</option>
                                <option value="calibration_tag">Biomedical Calibration Tag</option>
                                <option value="ot_icu">OT &amp; ICU Pressure Differential</option>
                                <option value="hospital_signage">Hospital Bilingual Signage</option>
                                <option value="other">General Clinical Evidence</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Department</label>
                            <input type="text" name="department_name" class="form-control" placeholder="e.g. Safety / ICU / OT">
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Capture Date</label>
                            <input type="date" name="capture_date" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Geo-Location Coordinates</label>
                            <input type="text" name="geo_location" class="form-control" placeholder="e.g. 28.5355° N, 77.2410° E">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Attach Media File (JPG, PNG, MP4, Max 25MB) <span class="text-danger">*</span></label>
                        <input type="file" name="media_file" class="form-control" accept="image/*,video/*" required>
                    </div>

                    <div class="mb-0">
                        <label class="form-label small fw-bold text-navy">Verification Remarks / Assessor Notes</label>
                        <textarea name="remarks" class="form-control" rows="2" placeholder="Describe participant count, evacuation timing, or equipment serial numbers..."></textarea>
                    </div>
                </div>

                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm text-white fw-bold px-3" style="background-color: #10b981;">
                        <i class="fas fa-cloud-arrow-up me-1"></i> Upload to Evidence Vault
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
