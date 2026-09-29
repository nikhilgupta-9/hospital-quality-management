<!-- HR & CREDENTIALING PANEL -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h4 class="h5 fw-bold text-navy mb-1"><i class="fas fa-user-doctor text-gold me-2"></i> Clinical HR, Credentialing & Training Suite</h4>
        <p class="small text-muted mb-0">Doctor credentialing, procedural privileging, medical council registration alerts, and mandatory NABH training compliance.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-gold-max btn-sm" data-bs-toggle="modal" data-bs-target="#addTrainingModal">
            <i class="fas fa-calendar-plus me-1"></i> Schedule Training
        </button>
        <button class="btn btn-primary-max btn-sm" data-bs-toggle="modal" data-bs-target="#addStaffModal">
            <i class="fas fa-user-plus me-1"></i> Add Doctor / Staff
        </button>
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
            <span class="small text-muted d-block mb-1">Credentialed Doctors</span>
            <h4 class="h5 fw-bold text-success mb-0"><?= count($credentials ?? []) ?> Approved</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-gold">
            <span class="small text-muted d-block mb-1">Council Registration Alerts</span>
            <h4 class="h5 fw-bold text-warning mb-0"><?= count($expiringDocs ?? []) ?> Due Soon</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-purple">
            <span class="small text-muted d-block mb-1">NABH Mandatory Trainings</span>
            <h4 class="h5 fw-bold mb-0" style="color: #7c3aed;"><?= count($trainings ?? []) ?> Scheduled</h4>
        </div>
    </div>
</div>

<!-- Nav Tabs for HR Panel Sub-modules -->
<ul class="nav nav-pills mb-4 border-bottom pb-3" id="hrTabs" role="tablist">
    <li class="nav-item">
        <button class="nav-link active fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-staff">
            <i class="fas fa-users me-1"></i> Staff Directory
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-credentialing">
            <i class="fas fa-award me-1"></i> Doctor Privileging Matrix
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-training">
            <i class="fas fa-chalkboard-user me-1"></i> Training Management
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-expiring">
            <i class="fas fa-bell me-1 text-warning"></i> License Expiry Alerts (<?= count($expiringDocs ?? []) ?>)
        </button>
    </li>
</ul>

<div class="tab-content" id="hrTabContent">
    <!-- Staff Directory -->
    <div class="tab-pane fade show active" id="tab-staff">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3">Hospital Clinical & Support Staff Master</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Emp Code</th>
                            <th>Staff Name & Designation</th>
                            <th>Department</th>
                            <th>Qualifications</th>
                            <th>Experience</th>
                            <th>Contact</th>
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
                                    <td><span class="badge bg-light text-dark"><?= esc($s['department_name'] ?? 'General') ?></span></td>
                                    <td class="small"><?= esc($s['qualification'] ?? 'N/A') ?></td>
                                    <td><?= esc($s['experience_years'] ?? 0) ?> Yrs</td>
                                    <td class="small text-muted"><?= esc($s['contact'] ?? 'N/A') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="6" class="text-center py-3 text-muted">No staff members found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Credentialing & Privileging Matrix -->
    <div class="tab-pane fade" id="tab-credentialing">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-stethoscope text-sapphire me-2"></i> Clinical Privileging & Approved Procedural Scope</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Doctor / Clinician</th>
                            <th>Department</th>
                            <th>Approved Clinical Procedure / Privileging Scope</th>
                            <th>Verified By</th>
                            <th>Valid Until</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($credentials)) : ?>
                            <?php foreach ($credentials as $c) : ?>
                                <tr>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($c['staff_name']) ?></strong>
                                        <span class="small text-muted"><?= esc($c['employee_code']) ?> &bull; <?= esc($c['designation']) ?></span>
                                    </td>
                                    <td><span class="badge bg-light text-dark"><?= esc($c['department_name']) ?></span></td>
                                    <td><strong class="text-dark"><?= esc($c['procedure']) ?></strong></td>
                                    <td><?= esc($c['verified_by_name'] ?? 'Medical Director') ?></td>
                                    <td><span class="small text-muted"><?= esc($c['valid_until']) ?></span></td>
                                    <td><span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> Privileged</span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="6" class="text-center py-3 text-muted">No privileging records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Training Management -->
    <div class="tab-pane fade" id="tab-training">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-graduation-cap text-gold me-2"></i> NABH Mandatory Training Programs</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Training Topic</th>
                            <th>Category</th>
                            <th>Scheduled Date</th>
                            <th>Trainer / Assessor</th>
                            <th>Enrolled Staff</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($trainings)) : ?>
                            <?php foreach ($trainings as $t) : ?>
                                <tr>
                                    <td><strong class="text-navy"><?= esc($t['title']) ?></strong></td>
                                    <td><span class="badge badge-max badge-max-navy"><?= esc($t['type']) ?></span></td>
                                    <td><span class="small text-muted"><?= esc($t['scheduled_date']) ?></span></td>
                                    <td><?= esc($t['trainer_name'] ?? 'Senior Faculty') ?></td>
                                    <td><?= esc($t['total_enrolled'] ?? 0) ?> Staff</td>
                                    <td>
                                        <?php if (strtotime($t['scheduled_date']) > time()) : ?>
                                            <span class="badge badge-max badge-max-blue">Upcoming</span>
                                        <?php else : ?>
                                            <span class="badge badge-max badge-max-emerald">Conducted</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="6" class="text-center py-3 text-muted">No trainings recorded.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- License & Document Expiry Alerts -->
    <div class="tab-pane fade" id="tab-expiring">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3 text-warning"><i class="fas fa-clock text-warning me-2"></i> Mandatory Professional Registration & Certificate Expiry Alerts</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Staff Name</th>
                            <th>Department</th>
                            <th>Certificate / Document Type</th>
                            <th>Expiry Date</th>
                            <th>Urgency Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($expiringDocs)) : ?>
                            <?php foreach ($expiringDocs as $ed) : ?>
                                <tr>
                                    <td>
                                        <strong class="text-navy"><?= esc($ed['staff_name']) ?></strong>
                                        <span class="small text-muted d-block"><?= esc($ed['employee_code']) ?></span>
                                    </td>
                                    <td><?= esc($ed['department_name']) ?></td>
                                    <td><?= esc($ed['doc_type']) ?></td>
                                    <td><strong><?= esc($ed['expiry_date']) ?></strong></td>
                                    <td><span class="badge badge-max badge-max-rose">Expires in 15 Days</span></td>
                                    <td><button class="btn btn-sm btn-outline-navy" onclick="alert('Sent renewal reminder to <?= esc($ed['staff_name']) ?>')">Send Alert</button></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="6" class="text-center py-3 text-muted">No licenses expiring in the next 30 days.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Staff Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Add Clinical / Hospital Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('hr/create') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Employee Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Dr. / Sister / Er." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Employee ID / Code</label>
                            <input type="text" name="employee_code" class="form-control" placeholder="DOC-CARD-205" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Department</label>
                            <select name="department_id" class="form-select" required>
                                <?php if (!empty($departments)) : ?>
                                    <?php foreach ($departments as $dept) : ?>
                                        <option value="<?= $dept['id'] ?>"><?= esc($dept['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="Consultant Radiologist" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Qualifications</label>
                            <input type="text" name="qualification" class="form-control" placeholder="MBBS, MD" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Experience (Years)</label>
                            <input type="number" name="experience_years" class="form-control" value="5">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Contact Number / Email</label>
                        <input type="text" name="contact" class="form-control" placeholder="+91 98765 43210">
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Save Staff Record</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Training Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Schedule NABH Training Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('hr/create-training') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Training Title / Topic</label>
                        <input type="text" name="title" class="form-control" placeholder="Infection Control & Hand Hygiene Audit Training" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Category</label>
                        <select name="type" class="form-select">
                            <option>Quality & Compliance</option>
                            <option>Clinical Safety</option>
                            <option>Infection Control</option>
                            <option>Fire Safety & Disaster</option>
                            <option>Biomedical Waste</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Scheduled Date</label>
                        <input type="date" name="scheduled_date" class="form-control" value="<?= date('Y-m-d', strtotime('+7 days')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Trainer / Assessor Name</label>
                        <input type="text" name="trainer_name" class="form-control" placeholder="Dr. Ananya Sen" required>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold-max btn-sm">Schedule Session</button>
                </div>
            </form>
        </div>
    </div>
</div>
