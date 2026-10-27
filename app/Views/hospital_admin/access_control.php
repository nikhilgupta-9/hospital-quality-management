<div class="container-fluid px-0">
    <!-- Breadcrumb & Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 small">
                    <li class="breadcrumb-item"><a href="<?= site_url('hospital-admin') ?>" class="text-decoration-none text-sapphire">Dashboard</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">Point #9: Settings & Access Control</li>
                </ol>
            </nav>
            <h2 class="h4 mb-0 fw-bold text-navy">
                <i class="fas fa-user-shield text-sapphire me-2"></i> Settings & Access Control (RBAC)
            </h2>
            <p class="text-muted small mb-0">Role-Based Access Control, Tenant Isolation, and Doctor/Staff Authentication Gates</p>
        </div>
        <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
            <button type="button" class="btn btn-sapphire btn-sm px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus me-1"></i> Add Authorized Staff
            </button>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show small" role="alert">
            <i class="fas fa-check-circle me-1"></i> <?= esc(session()->getFlashdata('message')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
            <i class="fas fa-exclamation-triangle me-1"></i> <?= esc(session()->getFlashdata('error')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Security Policy Pillars -->
    <div class="row g-3 mb-4">
        <?php foreach ($securityPolicies as $policy) : ?>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="rounded-circle bg-light text-sapphire p-2 fs-5">
                            <i class="<?= esc($policy['icon']) ?>"></i>
                        </div>
                        <span class="badge <?= esc($policy['badge']) ?> small"><i class="fas fa-check me-1"></i> <?= esc($policy['status']) ?></span>
                    </div>
                    <h6 class="fw-bold text-navy mb-1"><?= esc($policy['title']) ?></h6>
                    <p class="small text-muted mb-0"><?= esc($policy['description']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Authorized Users Directory Table -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold text-navy">
                    <i class="fas fa-users-gear text-sapphire me-2"></i> Authorized Hospital Users & Role Assignments
                </h5>
                <small class="text-muted">Strictly partitioned to <?= esc($hospital['name'] ?? 'Active Hospital') ?> (Zero Cross-Tenancy)</small>
            </div>
            <span class="badge bg-primary-subtle text-sapphire fw-bold px-3 py-2">
                <?= count($users) ?> Active Users
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-muted small text-uppercase">
                    <tr>
                        <th>User Name & Email</th>
                        <th>Assigned Role</th>
                        <th>Scope / Permissions</th>
                        <th>Status</th>
                        <th>Registered Date</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light text-navy d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">
                                        <?= strtoupper(substr($u['name'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-navy"><?= esc($u['name']) ?></div>
                                        <div class="text-muted small"><?= esc($u['email']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if ($u['role_slug'] === 'super_admin') : ?>
                                    <span class="badge bg-dark text-white"><i class="fas fa-shield-halved me-1"></i> Super Admin</span>
                                <?php elseif ($u['role_slug'] === 'hospital_admin') : ?>
                                    <span class="badge bg-primary text-white"><i class="fas fa-user-tie me-1"></i> Hospital Admin</span>
                                <?php elseif ($u['role_slug'] === 'nabh_coordinator') : ?>
                                    <span class="badge bg-warning text-dark"><i class="fas fa-clipboard-check me-1"></i> NABH Coordinator</span>
                                <?php else : ?>
                                    <span class="badge bg-info text-dark"><i class="fas fa-user-doctor me-1"></i> Clinical / Nursing Staff</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($u['role_slug'] === 'hospital_admin') : ?>
                                    <span class="text-muted">Full Hospital Cockpit, Licences, Approvals & Reports</span>
                                <?php elseif ($u['role_slug'] === 'nabh_coordinator') : ?>
                                    <span class="text-muted">SOPs, Chapter Scores, CAPA Audits & Evidence Media</span>
                                <?php elseif ($u['role_slug'] === 'dept_user') : ?>
                                    <span class="text-muted">Clinical Rounds, OT Surgical Checklist, Hand Hygiene</span>
                                <?php else : ?>
                                    <span class="text-muted">Global Platform Multi-Tenant Super Control</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success fw-bold">Active</span>
                            </td>
                            <td class="text-muted">
                                <?= !empty($u['created_at']) ? date('M d, Y', strtotime($u['created_at'])) : 'System Default' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Security Information Card -->
    <div class="card border-0 shadow-sm rounded-3 p-4 bg-light">
        <div class="d-flex align-items-start gap-3">
            <div class="rounded-circle bg-warning-subtle text-warning p-3 fs-3">
                <i class="fas fa-lock"></i>
            </div>
            <div>
                <h5 class="fw-bold text-navy mb-1">Strict Authentication & Access Control Architecture</h5>
                <p class="small text-muted mb-2">
                    "कोई भी अजनबी या अनधिकृत व्यक्ति सीधे लॉगिन नहीं कर सकता।"
                </p>
                <div class="row g-2 small text-secondary">
                    <div class="col-md-4">
                        <i class="fas fa-check-circle text-success me-1"></i> <strong>Gateway Partition:</strong> Administrators authenticate through <code>/admin/login</code>; doctors & nurses use <code>/login</code>.
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-check-circle text-success me-1"></i> <strong>Hospital Tenancy Lock:</strong> User tokens are bound to <code>hospital_id</code>. Cross-hospital access triggers instant termination.
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-check-circle text-success me-1"></i> <strong>Cryptographic Passwords:</strong> Passwords stored via BCRYPT hash (cost 10) with brute-force rate-limiting.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Staff User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-navy text-white py-3">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-user-plus text-warning me-2"></i> Register Authorized Hospital User
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('hospital-admin/access-control/create-user') ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Full Name & Professional Title</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Dr. Rajesh Sharma (HOD Anaesthesia)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Official Email Address (Login ID)</label>
                        <input type="email" name="email" class="form-control" placeholder="doctor@maxcarehospital.org" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Role & Departmental Access</label>
                        <select name="role_id" class="form-select" required>
                            <?php foreach ($roles as $r) : ?>
                                <?php if ($r['slug'] !== 'super_admin') : ?>
                                    <option value="<?= $r['id'] ?>" <?= ($r['slug'] === 'dept_user') ? 'selected' : '' ?>>
                                        <?= esc($r['name']) ?> (<?= esc($r['slug']) ?>)
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text small">Dept / Staff User is for Doctors and Nurses; NABH Coordinator is for Quality Managers.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-navy">Initial Temporary Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimum 8 characters" minlength="8" required>
                    </div>
                </div>
                <div class="modal-footer bg-light py-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sapphire btn-sm">
                        <i class="fas fa-shield-check me-1"></i> Create Authorized User
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
