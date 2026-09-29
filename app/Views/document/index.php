<!-- DOCUMENT PANEL -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h4 class="h5 fw-bold text-navy mb-1"><i class="fas fa-file-signature text-sapphire me-2"></i> NABH Document & Quality Evidence Suite</h4>
        <p class="small text-muted mb-0">Manage hospital SOPs, clinical protocols, version control, multi-tier approval workflows, and NABH evidence.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= site_url('document/export') ?>" class="btn btn-gold-max btn-sm">
            <i class="fas fa-file-export me-1"></i> One-Click NABH Export
        </a>
        <button class="btn btn-primary-max btn-sm" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
            <i class="fas fa-plus me-1"></i> Upload New Document / SOP
        </button>
    </div>
</div>

<!-- Stats Bar -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-blue">
            <span class="small text-muted d-block mb-1">Total Published Documents</span>
            <h4 class="h5 fw-bold text-navy mb-0"><?= count($documents ?? []) ?></h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-gold">
            <span class="small text-muted d-block mb-1">Review Due (Next 30 Days)</span>
            <h4 class="h5 fw-bold text-warning mb-0"><?= count($expiringDocs ?? []) ?></h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-emerald">
            <span class="small text-muted d-block mb-1">Active Quality Indicators</span>
            <h4 class="h5 fw-bold text-success mb-0">6 Recorded</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-rose">
            <span class="small text-muted d-block mb-1">Open CAPA Actions</span>
            <h4 class="h5 fw-bold text-danger mb-0"><?= count($capas ?? []) ?></h4>
        </div>
    </div>
</div>

<!-- Documents Repository Table -->
<div class="card card-max p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="h6 fw-bold text-navy mb-0">Active SOPs, Policies & NABH Evidence Records</h5>
        <div class="d-flex gap-2">
            <span class="badge badge-max badge-max-navy">Version Controlled</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table-max">
            <thead>
                <tr>
                    <th>Doc Number</th>
                    <th>Document Title & Category</th>
                    <th>Department</th>
                    <th>Version</th>
                    <th>Review / Expiry Date</th>
                    <th>Workflow Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($documents)) : ?>
                    <?php foreach ($documents as $doc) : ?>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue"><?= esc($doc['doc_number'] ?? 'DOC-001') ?></span></td>
                            <td>
                                <strong class="d-block text-navy"><?= esc($doc['title']) ?></strong>
                                <span class="small text-muted"><?= esc($doc['category']) ?></span>
                            </td>
                            <td><span class="badge bg-light text-dark"><?= esc($doc['department_name'] ?? 'Hospital-Wide') ?></span></td>
                            <td><span class="badge bg-secondary">V<?= esc($doc['version_no'] ?? '1.0') ?></span></td>
                            <td>
                                <span class="small text-muted d-block"><?= esc($doc['expiry_date'] ?? 'N/A') ?></span>
                                <?php if (!empty($doc['expiry_date']) && strtotime($doc['expiry_date']) < strtotime('+30 days')) : ?>
                                    <span class="badge badge-max badge-max-rose">Review Due Soon</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($doc['status'] === 'published') : ?>
                                    <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> Published</span>
                                <?php elseif ($doc['status'] === 'review') : ?>
                                    <span class="badge badge-max badge-max-gold"><i class="fas fa-clock me-1"></i> Under Review</span>
                                <?php else : ?>
                                    <span class="badge badge-max badge-max-navy"><?= esc(ucfirst($doc['status'])) ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-navy" title="Download & View" onclick="alert('Viewing file: <?= esc($doc['file_path'] ?? 'sample_sop.pdf') ?>')">
                                    <i class="fas fa-download me-1"></i> View
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No documents found. Click 'Upload New Document' to add.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- CAPA & Root Cause Analysis Section -->
<div class="card card-max p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="h6 fw-bold text-navy mb-0"><i class="fas fa-shield-virus text-danger me-2"></i> CAPA (Corrective & Preventive Actions) & Audit Findings</h5>
        <span class="badge badge-max badge-max-rose"><?= count($capas ?? []) ?> Active Actions</span>
    </div>

    <div class="table-responsive">
        <table class="table-max">
            <thead>
                <tr>
                    <th>Source & Finding</th>
                    <th>Responsible Person</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($capas)) : ?>
                    <?php foreach ($capas as $capa) : ?>
                        <tr>
                            <td>
                                <strong class="text-dark d-block"><?= esc($capa['source_type']) ?></strong>
                                <span class="small text-muted"><?= esc($capa['finding']) ?></span>
                            </td>
                            <td><?= esc($capa['responsible_user_name'] ?? 'Quality Coordinator') ?></td>
                            <td><span class="badge bg-warning-subtle text-warning"><?= esc($capa['due_date']) ?></span></td>
                            <td><span class="badge badge-max badge-max-gold"><?= esc(ucfirst($capa['status'])) ?></span></td>
                            <td>
                                <form action="<?= site_url('document/close-capa/' . $capa['id']) ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-outline-success">Close Finding</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center py-3 text-muted">No open CAPA findings.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadDocModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Upload New Document / Clinical SOP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('document/create') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Document Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. ICU Central Line Insertion Protocol" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Document / SOP Number</label>
                            <input type="text" name="doc_number" class="form-control" placeholder="MAX-SOP-COP-012" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">NABH Chapter / Category</label>
                            <select name="category" class="form-select" required>
                                <option>SOP - Access, Assessment & Continuity of Care (AAC)</option>
                                <option>Clinical Protocol - Care of Patients (COP)</option>
                                <option>Policy - Management of Medication (MOM)</option>
                                <option>Manual - Hospital Infection Control (HIC)</option>
                                <option>Safety Protocol - Facility Management & Safety (FMS)</option>
                                <option>SOP - Human Resource Management (HRM)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Target Department</label>
                            <select name="department_id" class="form-select" required>
                                <?php if (!empty($departments)) : ?>
                                    <?php foreach ($departments as $dept) : ?>
                                        <option value="<?= $dept['id'] ?>"><?= esc($dept['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Issue Date</label>
                            <input type="date" name="issue_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Review / Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control" value="<?= date('Y-m-d', strtotime('+1 year')) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Change Summary / Notes</label>
                        <textarea name="change_note" class="form-control" rows="2" placeholder="Initial version creation for NABH 5th edition alignment"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Save & Submit for Approval</button>
                </div>
            </form>
        </div>
    </div>
</div>
