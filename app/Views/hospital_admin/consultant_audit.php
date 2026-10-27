<!-- =========================================================
     MODULE #4: CONSULTANT REVIEW & AUTO AUDIT POINTS
     Internal Mock Audits, Non-Compliance (NC) & Action Plans
========================================================= -->

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
    <div>
        <span class="badge px-3 py-1 mb-2 text-white fw-bold" style="background-color: #ff7a00; font-size: 0.75rem; letter-spacing: 0.05em;">
            <i class="fas fa-user-check me-1"></i> MODULE #4: CONSULTANT &amp; ASSESSOR AUDITS
        </span>
        <h2 class="h4 text-navy fw-bold mb-1" style="font-family: var(--font-heading);">
            Consultant Review &amp; Auto Audit Points
        </h2>
        <p class="text-muted small mb-0">
            Log mock assessment inspections, categorize Major/Minor Non-Compliances (NCs), and auto-track CAPA closure timelines before official NABH inspection.
        </p>
    </div>

    <button type="button" class="btn btn-sm text-white fw-bold" style="background-color: #0c74c5;" data-bs-toggle="modal" data-bs-target="#newAuditModal">
        <i class="fas fa-plus me-1"></i> Log New Mock Audit / NC Review
    </button>
</div>

<!-- =========================================================
     AUDIT RUNS & HISTORY LIST
========================================================= -->
<div class="row g-4 mb-4">
    <?php if (empty($audits)) : ?>
        <div class="col-12">
            <div class="card p-5 text-center border bg-white rounded-3">
                <i class="fas fa-clipboard-question fs-1 text-muted mb-3"></i>
                <h5 class="h6 text-navy fw-bold">No Mock Audits Logged Yet</h5>
                <p class="text-muted small mb-3">Conduct your first desktop or on-site mock audit to generate auto audit action items.</p>
                <div>
                    <button type="button" class="btn btn-sm text-white fw-bold" style="background-color: #0c74c5;" data-bs-toggle="modal" data-bs-target="#newAuditModal">
                        Start First Mock Audit
                    </button>
                </div>
            </div>
        </div>
    <?php else : ?>
        <?php foreach ($audits as $audit) : ?>
            <div class="col-12">
                <div class="card border bg-white shadow-sm rounded-3 overflow-hidden" style="border-color: #e2e8f0 !important; border-left: 4px solid #ff7a00 !important;">
                    <div class="card-header p-4 bg-white border-bottom">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="badge bg-light text-navy border fw-bold text-uppercase" style="font-size: 0.72rem;">
                                        <?= esc(str_replace('_', ' ', $audit['audit_type'])) ?>
                                    </span>
                                    <span class="badge bg-success-subtle text-success fw-bold" style="font-size: 0.72rem;">
                                        Status: <?= esc(str_replace('_', ' ', $audit['status'])) ?>
                                    </span>
                                </div>
                                <h4 class="h5 fw-bold text-navy mb-0"><?= esc($audit['audit_title']) ?></h4>
                                <span class="text-muted small">
                                    <i class="fas fa-user-doctor me-1 text-primary"></i> Lead Assessor: <strong><?= esc($audit['lead_auditor_name']) ?></strong> &bull; Date: <?= date('d M Y', strtotime($audit['audit_date'])) ?>
                                </span>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <div class="text-center px-3 py-2 rounded bg-light border">
                                    <span class="text-muted d-block small" style="font-size: 0.7rem;">Audit Score</span>
                                    <span class="fs-4 fw-extrabold text-navy"><?= esc($audit['overall_score']) ?>%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-4">
                                <div class="p-3 rounded border bg-light d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted small d-block">Major Non-Compliances (NC)</span>
                                        <strong class="fs-4 text-danger"><?= esc($audit['major_nc_count']) ?></strong>
                                    </div>
                                    <i class="fas fa-circle-xmark text-danger fs-3"></i>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="p-3 rounded border bg-light d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted small d-block">Minor Non-Compliances</span>
                                        <strong class="fs-4 text-warning"><?= esc($audit['minor_nc_count']) ?></strong>
                                    </div>
                                    <i class="fas fa-triangle-exclamation text-warning fs-3"></i>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="p-3 rounded border bg-light d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted small d-block">Opportunities for Impr. (OFI)</span>
                                        <strong class="fs-4 text-success"><?= esc($audit['ofi_count']) ?></strong>
                                    </div>
                                    <i class="fas fa-lightbulb text-success fs-3"></i>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($audit['summary_notes'])) : ?>
                            <div class="p-3 rounded bg-light border small text-dark" style="border-left: 3px solid #0c74c5 !important;">
                                <strong class="d-block text-navy mb-1"><i class="fas fa-clipboard-list me-1 text-primary"></i> Consultant Observation &amp; Executive Summary:</strong>
                                <?= nl2br(esc($audit['summary_notes'])) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer p-3 bg-white border-top d-flex justify-content-between align-items-center">
                        <span class="text-muted small">CAPA Action Tracker Active</span>
                        <div class="d-flex gap-2">
                            <a href="<?= site_url('document') ?>" class="btn btn-sm btn-outline-navy fw-bold">
                                <i class="fas fa-file-signature me-1"></i> View Resolved CAPAs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- =========================================================
     MODAL: LOG NEW MOCK AUDIT
========================================================= -->
<div class="modal fade" id="newAuditModal" tabindex="-1" aria-labelledby="newAuditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
            <form action="<?= site_url('hospital-admin/consultant-audit/create') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="modal-header text-white" style="background-color: #1a2340; border-bottom: 3px solid #ff7a00;">
                    <h5 class="modal-title h6 fw-bold text-white mb-0">Log Internal Mock Audit / Consultant Review</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Audit Title <span class="text-danger">*</span></label>
                        <input type="text" name="audit_title" class="form-control" placeholder="e.g. Q4 Internal Surveillance Audit" required>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Audit Scope</label>
                            <select name="audit_type" class="form-select">
                                <option value="pre_assessment">Pre-Assessment Mock Audit</option>
                                <option value="surveillance">Annual Surveillance Audit</option>
                                <option value="desktop_review">Desktop Document Review</option>
                                <option value="internal_audit">Department Internal Audit</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-navy">Audit Date <span class="text-danger">*</span></label>
                            <input type="date" name="audit_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Lead Assessor / Consultant Name <span class="text-danger">*</span></label>
                        <input type="text" name="lead_auditor_name" class="form-control" placeholder="e.g. Dr. Rajiv Menon" required>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-4">
                            <label class="form-label small fw-bold text-danger">Major NCs</label>
                            <input type="number" name="major_nc_count" class="form-control fw-bold text-danger" value="0" min="0">
                        </div>
                        <div class="col-4">
                            <label class="form-label small fw-bold text-warning">Minor NCs</label>
                            <input type="number" name="minor_nc_count" class="form-control fw-bold text-warning" value="2" min="0">
                        </div>
                        <div class="col-4">
                            <label class="form-label small fw-bold text-success">OFI Count</label>
                            <input type="number" name="ofi_count" class="form-control fw-bold text-success" value="3" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Overall Calculated Readiness Score (%) <span class="text-danger">*</span></label>
                        <input type="number" name="overall_score" step="0.1" class="form-control fw-bold" value="88.5" min="0" max="100" required>
                    </div>

                    <div class="mb-0">
                        <label class="form-label small fw-bold text-navy">Consultant Findings &amp; Summary Notes</label>
                        <textarea name="summary_notes" class="form-control" rows="3" placeholder="Key observations, root causes, and recommended corrective action timelines..."></textarea>
                    </div>
                </div>

                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm text-white fw-bold px-3" style="background-color: #ff7a00;">
                        <i class="fas fa-check me-1"></i> Save Mock Audit Findings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
