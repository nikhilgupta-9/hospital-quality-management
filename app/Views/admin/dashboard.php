<!-- SUPER ADMIN DASHBOARD -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h4 class="h5 fw-bold text-navy mb-1"><i class="fas fa-crown text-gold me-2"></i> Super Admin Central Control Center</h4>
        <p class="small text-muted mb-0">Multi-hospital tenancy, user management, subscription tiers, and global immutable audit logging.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary-max btn-sm" data-bs-toggle="modal" data-bs-target="#addHospitalModal">
            <i class="fas fa-plus me-1"></i> Register New Hospital / Branch
        </button>
    </div>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-blue">
            <span class="small text-muted d-block mb-1">Registered Hospitals</span>
            <h4 class="h5 fw-bold text-navy mb-0"><?= count($hospitals ?? []) ?> Active</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-gold">
            <span class="small text-muted d-block mb-1">Active User Accounts</span>
            <h4 class="h5 fw-bold text-warning mb-0"><?= count($users ?? []) ?> Users</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-emerald">
            <span class="small text-muted d-block mb-1">Active Enterprise Plans</span>
            <h4 class="h5 fw-bold text-success mb-0"><?= count($subscriptions ?? []) ?> Subscriptions</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-rose">
            <span class="small text-muted d-block mb-1">System Audit Logs</span>
            <h4 class="h5 fw-bold text-danger mb-0"><?= count($auditLogs ?? []) ?> Events</h4>
        </div>
    </div>
</div>

<!-- Hospitals List Table -->
<div class="card card-max p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="h6 fw-bold text-navy mb-0"><i class="fas fa-hospital text-sapphire me-2"></i> Hospital Facilities & Accreditation Branches</h5>
        <span class="badge badge-max badge-max-navy">Multi-Tenant Grid</span>
    </div>

    <div class="table-responsive">
        <table class="table-max">
            <thead>
                <tr>
                    <th>Facility Code</th>
                    <th>Hospital / Branch Name</th>
                    <th>Active Subscription</th>
                    <th>Departments</th>
                    <th>Onboarded Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($hospitals)) : ?>
                    <?php foreach ($hospitals as $h) : ?>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue"><?= esc($h['code']) ?></span></td>
                            <td><strong class="text-navy"><?= esc($h['name']) ?></strong></td>
                            <td><span class="badge badge-max badge-max-gold">Enterprise NABH Suite</span></td>
                            <td>10 Departments</td>
                            <td><span class="small text-muted"><?= esc($h['created_at']) ?></span></td>
                            <td><span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> Active</span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="6" class="text-center py-3 text-muted">No hospitals registered.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- System Audit Logs -->
<div class="card card-max p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="h6 fw-bold text-navy mb-0"><i class="fas fa-shield-halved text-sapphire me-2"></i> System-Wide Immutable Audit Trail</h5>
        <span class="small text-muted">Last <?= count($auditLogs ?? []) ?> Security Actions</span>
    </div>

    <div class="table-responsive">
        <table class="table-max">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Module</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($auditLogs)) : ?>
                    <?php foreach ($auditLogs as $log) : ?>
                        <tr>
                            <td class="small text-muted"><?= esc($log['created_at']) ?></td>
                            <td><strong class="text-navy"><?= esc($log['user_name'] ?? 'System') ?></strong></td>
                            <td><span class="badge badge-max badge-max-blue"><?= esc($log['action']) ?></span></td>
                            <td><?= esc($log['module']) ?></td>
                            <td class="small text-muted"><?= esc($log['ip_address'] ?? '127.0.0.1') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="5" class="text-center py-3 text-muted">No audit events recorded yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addHospitalModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Register New Hospital Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/hospitals') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Hospital Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Max Superspeciality Hospital (Saket)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Unique Facility Code</label>
                        <input type="text" name="code" class="form-control" placeholder="MAX-SAK-02" required>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Create Hospital</button>
                </div>
            </form>
        </div>
    </div>
</div>
