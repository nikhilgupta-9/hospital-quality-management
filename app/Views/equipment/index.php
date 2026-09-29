<!-- EQUIPMENT & INFRASTRUCTURE PANEL -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h4 class="h5 fw-bold text-navy mb-1"><i class="fas fa-microscope text-emerald me-2"></i> Medical Equipment, Calibration & Infrastructure Suite</h4>
        <p class="small text-muted mb-0">Biomedical inventory, NABL calibrations, preventive maintenance, STP plant logs, and fire safety systems.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-gold-max btn-sm" data-bs-toggle="modal" data-bs-target="#addAuditModal">
            <i class="fas fa-clipboard-check me-1"></i> Start Safety Audit
        </button>
        <button class="btn btn-primary-max btn-sm" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">
            <i class="fas fa-plus me-1"></i> Add Medical Equipment
        </button>
    </div>
</div>

<!-- Stats Bar -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-blue">
            <span class="small text-muted d-block mb-1">Total Medical Equipment</span>
            <h4 class="h5 fw-bold text-navy mb-0"><?= count($equipments ?? []) ?> Assets</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-gold">
            <span class="small text-muted d-block mb-1">Calibration Alerts (&lt; 30 Days)</span>
            <h4 class="h5 fw-bold text-warning mb-0"><?= count($dueCalibrations ?? []) ?> Due Soon</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-emerald">
            <span class="small text-muted d-block mb-1">Building Utilities Tracked</span>
            <h4 class="h5 fw-bold text-success mb-0"><?= count($utilitySystems ?? []) ?> Systems</h4>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card-premium-stat border-top-rose">
            <span class="small text-muted d-block mb-1">Fire Safety & STP Status</span>
            <h4 class="h5 fw-bold text-danger mb-0">100% Compliant</h4>
        </div>
    </div>
</div>

<!-- Nav Tabs for Equipment & Infrastructure Sub-modules -->
<ul class="nav nav-pills mb-4 border-bottom pb-3" id="equipmentTabs" role="tablist">
    <li class="nav-item">
        <button class="nav-link active fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-inventory">
            <i class="fas fa-laptop-medical me-1"></i> Equipment Master Inventory
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-calibration">
            <i class="fas fa-sliders me-1"></i> Calibration Tracking (<?= count($dueCalibrations ?? []) ?> Due)
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-utilities">
            <i class="fas fa-building-shield me-1"></i> Building Utilities (STP, Fire, MGPS, DG)
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm" data-bs-toggle="pill" data-bs-target="#tab-maintenance">
            <i class="fas fa-wrench me-1"></i> Preventive Maintenance (PPM)
        </button>
    </li>
</ul>

<div class="tab-content" id="equipmentTabContent">
    <!-- Equipment Inventory -->
    <div class="tab-pane fade show active" id="tab-inventory">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3">Biomedical Equipment Master Directory</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Asset ID</th>
                            <th>Equipment Name & Category</th>
                            <th>Department</th>
                            <th>Make / Model</th>
                            <th>Serial Number</th>
                            <th>AMC / Warranty Expiry</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($equipments)) : ?>
                            <?php foreach ($equipments as $eq) : ?>
                                <tr>
                                    <td><span class="badge badge-max badge-max-blue"><?= esc($eq['asset_no']) ?></span></td>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($eq['name']) ?></strong>
                                        <span class="small text-muted"><?= esc($eq['category']) ?></span>
                                    </td>
                                    <td><span class="badge bg-light text-dark"><?= esc($eq['department_name'] ?? 'General') ?></span></td>
                                    <td class="small"><?= esc($eq['manufacturer']) ?> / <?= esc($eq['model']) ?></td>
                                    <td class="small text-muted"><?= esc($eq['serial_no']) ?></td>
                                    <td>
                                        <span class="small text-muted d-block"><?= esc($eq['amc_cmc_expiry'] ?? 'N/A') ?></span>
                                        <?php if (!empty($eq['amc_cmc_expiry']) && strtotime($eq['amc_cmc_expiry']) < strtotime('+30 days')) : ?>
                                            <span class="badge badge-max badge-max-gold">AMC Due Soon</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><span class="badge badge-max badge-max-emerald"><i class="fas fa-check me-1"></i> <?= esc(ucfirst($eq['status'])) ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="7" class="text-center py-3 text-muted">No equipment found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Calibration Tracking -->
    <div class="tab-pane fade" id="tab-calibration">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-certificate text-gold me-2"></i> Biomedical Calibration Tracking & Alerts</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Asset Number</th>
                            <th>Equipment Name</th>
                            <th>Department</th>
                            <th>Last Calibration</th>
                            <th>Next Calibration Due</th>
                            <th>Testing Agency</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dueCalibrations)) : ?>
                            <?php foreach ($dueCalibrations as $cal) : ?>
                                <tr>
                                    <td><span class="badge badge-max badge-max-blue"><?= esc($cal['asset_no']) ?></span></td>
                                    <td><strong class="text-navy"><?= esc($cal['equipment_name']) ?></strong></td>
                                    <td><?= esc($cal['department_name']) ?></td>
                                    <td><span class="small text-muted"><?= esc($cal['last_date'] ?? 'N/A') ?></span></td>
                                    <td><strong class="text-danger"><?= esc($cal['next_date']) ?></strong></td>
                                    <td class="small"><?= esc($cal['agency'] ?? 'NABL Certified Agency') ?></td>
                                    <td><span class="badge badge-max badge-max-rose">Calibration Due (20 Days)</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-navy" onclick="alert('Calibration schedule request sent for <?= esc($cal['equipment_name']) ?>')">
                                            Schedule Calibration
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="8" class="text-center py-3 text-muted">All equipment calibrations are up to date!</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Building & Utility Systems -->
    <div class="tab-pane fade" id="tab-utilities">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-shield-alt text-sapphire me-2"></i> Hospital Critical Utilities & Infrastructure Safety Grid</h5>
            <div class="row g-3">
                <?php if (!empty($utilitySystems)) : ?>
                    <?php foreach ($utilitySystems as $util) : ?>
                        <div class="col-md-6">
                            <div class="p-3 bg-surface-alt rounded-3 border h-100 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge badge-max badge-max-navy mb-1"><?= esc($util['type']) ?></span>
                                    <h6 class="fw-bold text-dark mb-1"><?= esc($util['name']) ?></h6>
                                    <span class="small text-muted"><i class="fas fa-location-dot me-1"></i> Location: <?= esc($util['location']) ?></span>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-max badge-max-emerald d-block mb-2"><i class="fas fa-check-circle me-1"></i> Operational</span>
                                    <button class="btn btn-sm btn-outline-navy" onclick="alert('Inspection log for <?= esc($util['name']) ?> opened.')">Log Test</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12 text-center py-3 text-muted">No utility systems recorded.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Preventive Maintenance (PPM) -->
    <div class="tab-pane fade" id="tab-maintenance">
        <div class="card card-max p-4">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-screwdriver-wrench text-emerald me-2"></i> Preventive Maintenance & Breakdown Logs</h5>
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Asset Number</th>
                            <th>Equipment Name</th>
                            <th>Service Type</th>
                            <th>Maintenance Date</th>
                            <th>Service Engineer</th>
                            <th>Action / Repairs</th>
                            <th>Next Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">EQ-ICU-VENT-01</span></td>
                            <td><strong>ICU Ventilator (Dräger Evita V300)</strong></td>
                            <td><span class="badge bg-light text-dark">Quarterly PPM</span></td>
                            <td>2026-08-15</td>
                            <td>Er. Amit Verma (Dräger Certified)</td>
                            <td class="small">O2 sensor calibrated, flow sensor membrane replaced, self-test passed.</td>
                            <td><strong>2026-11-15</strong></td>
                        </tr>
                        <tr>
                            <td><span class="badge badge-max badge-max-blue">EQ-OT-ANES-03</span></td>
                            <td><strong>Anesthesia Workstation (Datex Ohmeda)</strong></td>
                            <td><span class="badge bg-light text-dark">Biannual PPM</span></td>
                            <td>2026-06-20</td>
                            <td>Wipro GE Service Lead</td>
                            <td class="small">Vaporizer interlock tested, soda lime canister replaced, leak rate 0.02 L/min.</td>
                            <td><strong>2026-12-20</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Equipment Modal -->
<div class="modal fade" id="addEquipmentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Add Medical Equipment / Instrument</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/create') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Equipment Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Multipara Patient Monitor" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Asset Number / Tag</label>
                            <input type="text" name="asset_no" class="form-control" placeholder="EQ-ICU-MON-05" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Category</label>
                            <select name="category" class="form-select" required>
                                <option>Critical Medical Equipment</option>
                                <option>Emergency Equipment</option>
                                <option>Diagnostic Equipment</option>
                                <option>Surgical Equipment</option>
                                <option>Laboratory Equipment</option>
                            </select>
                        </div>
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
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control" placeholder="Philips Healthcare">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Model</label>
                            <input type="text" name="model" class="form-control" placeholder="ePM 12">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Serial Number</label>
                            <input type="text" name="serial_no" class="form-control" placeholder="PH-2023-8821">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">AMC / CMC Expiry Date</label>
                            <input type="date" name="amc_cmc_expiry" class="form-control" value="<?= date('Y-m-d', strtotime('+1 year')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Service Agency</label>
                            <input type="text" name="service_agency" class="form-control" placeholder="Philips Medical Systems India">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Save Equipment</button>
                </div>
            </form>
        </div>
    </div>
</div>
