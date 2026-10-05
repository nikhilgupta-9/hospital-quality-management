<!-- =========================================================
     PHASE 2: INFRASTRUCTURE, FACILITY SAFETY & EQUIPMENT MANAGEMENT
     (NABH Digital Mitra DQMS Standards & Facility Compliance Grid)
========================================================= -->

<!-- Top Header with Actions -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-max badge-max-emerald px-2 py-1"><i class="fas fa-microscope me-1"></i> Phase 2 Live</span>
            <h4 class="h5 fw-bold text-navy mb-0">Infrastructure, Facility Safety &amp; Equipment Grid</h4>
        </div>
        <p class="small text-muted mb-0">
            NABH 5th Ed. FMS Standards: NABL Calibrations, Facility Rounds Defect Tracking, 3-Tier Condemnation, and 24x7 Digital Safety SOPs.
        </p>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-danger btn-sm fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#logDefectModal">
            <i class="fas fa-triangle-exclamation me-1"></i> Log Facility Defect
        </button>
        <button class="btn btn-outline-warning btn-sm fw-bold shadow-sm text-dark" data-bs-toggle="modal" data-bs-target="#requestCondemnationModal">
            <i class="fas fa-gavel me-1"></i> Request Condemnation
        </button>
        <button class="btn btn-primary-max btn-sm fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">
            <i class="fas fa-plus me-1"></i> Register Medical Asset
        </button>
    </div>
</div>

<!-- Visual Banner Strip -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4" style="background: linear-gradient(135deg, #07193b 0%, #0c2d6b 100%);">
    <div class="row g-0 align-items-center">
        <div class="col-lg-8 p-4 p-md-5 text-white">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(0, 208, 132, 0.2); border: 1px solid rgba(0, 208, 132, 0.4); color: #00d084; font-size: 0.8rem; font-weight: 700;">
                <i class="fas fa-shield-halved"></i> SMART DQMS FACILITY &amp; ASSET MONITOR
            </div>
            <h3 class="fw-bold mb-2" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                Biomedical Calibration &amp; Facility Safety Suite
            </h3>
            <p class="text-light opacity-90 small mb-4" style="max-width: 650px; line-height: 1.6;">
                Real-time tracking of critical life-support medical devices, automated NABL calibration alerts, comprehensive facility round deficiency mitigation, and statutory condemnation decommissioning.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="#tab-facility" class="btn btn-sm btn-light fw-bold px-3 py-2 rounded-pill" onclick="switchTab('tab-facility-btn')">
                    <i class="fas fa-clipboard-check text-primary me-1"></i> View Facility Rounds (<?= count($facilityDefects ?? []) ?>)
                </a>
                <a href="#tab-condemnation" class="btn btn-sm btn-outline-light fw-semibold px-3 py-2 rounded-pill" onclick="switchTab('tab-condemnation-btn')">
                    <i class="fas fa-scale-balanced text-warning me-1"></i> Condemnation Desk (<?= count($condemnations ?? []) ?>)
                </a>
                <a href="#tab-sops" class="btn btn-sm btn-outline-light fw-semibold px-3 py-2 rounded-pill" onclick="switchTab('tab-sops-btn')">
                    <i class="fas fa-book-medical text-emerald me-1"></i> 24x7 Safety SOPs (<?= count($safetySops ?? []) ?>)
                </a>
            </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block text-center p-3">
            <img src="<?= base_url('assets/images/biomedical_calibration_banner.jpg') ?>" 
                 alt="Biomedical Engineering" 
                 class="img-fluid rounded-4 shadow-lg" 
                 style="max-height: 220px; width: 92%; object-fit: cover; border: 2px solid rgba(255,255,255,0.2);">
        </div>
    </div>
</div>

<!-- 5 Key Performance KPI Indicators -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg">
        <div class="card-premium-stat border-top-blue h-100">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small text-muted fw-semibold">Medical Assets Tracked</span>
                <i class="fas fa-stethoscope text-primary opacity-50"></i>
            </div>
            <h4 class="h5 fw-bold text-navy mb-1"><?= esc($equipmentMetrics['total_assets'] ?? count($equipments ?? [])) ?> Assets</h4>
            <span class="small text-success fw-bold"><i class="fas fa-circle-check me-1"></i> <?= esc($equipmentMetrics['operational_rate'] ?? 100) ?>% Operational</span>
        </div>
    </div>
    <div class="col-sm-6 col-lg">
        <div class="card-premium-stat border-top-gold h-100">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small text-muted fw-semibold">NABL Calibration Due</span>
                <i class="fas fa-sliders text-warning opacity-50"></i>
            </div>
            <h4 class="h5 fw-bold text-warning mb-1"><?= count($dueCalibrations ?? []) ?> Alerts</h4>
            <span class="small text-muted"><i class="fas fa-clock me-1"></i> Within 30 Days</span>
        </div>
    </div>
    <div class="col-sm-6 col-lg">
        <div class="card-premium-stat border-top-rose h-100">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small text-muted fw-semibold">Facility Round Defects</span>
                <i class="fas fa-triangle-exclamation text-danger opacity-50"></i>
            </div>
            <h4 class="h5 fw-bold text-danger mb-1"><?= esc($facilityMetrics['open_defects'] ?? 0) ?> Active</h4>
            <span class="small text-muted"><?= esc($facilityMetrics['critical_defects'] ?? 0) ?> Critical Priority</span>
        </div>
    </div>
    <div class="col-sm-6 col-lg">
        <div class="card-premium-stat border-top-emerald h-100">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small text-muted fw-semibold">Defect Resolution Rate</span>
                <i class="fas fa-chart-line text-success opacity-50"></i>
            </div>
            <h4 class="h5 fw-bold text-success mb-1"><?= esc($facilityMetrics['resolution_rate'] ?? 100) ?>%</h4>
            <span class="small text-muted"><?= esc($facilityMetrics['resolved_defects'] ?? 0) ?> Resolved Logs</span>
        </div>
    </div>
    <div class="col-sm-6 col-lg">
        <div class="card-premium-stat border-top-navy h-100">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small text-muted fw-semibold">Breakdown Downtime</span>
                <i class="fas fa-stopwatch text-secondary opacity-50"></i>
            </div>
            <h4 class="h5 fw-bold text-navy mb-1"><?= esc($equipmentMetrics['total_downtime'] ?? 0) ?> Hours</h4>
            <span class="small text-danger fw-semibold"><?= esc($equipmentMetrics['out_of_order'] ?? 0) ?> Out of Order</span>
        </div>
    </div>
</div>

<!-- Operational Navigation Tabs -->
<ul class="nav nav-pills mb-4 border-bottom pb-3 gap-2" id="equipmentTabs" role="tablist">
    <li class="nav-item">
        <button class="nav-link active fw-bold btn-sm rounded-pill" id="tab-inventory-btn" data-bs-toggle="pill" data-bs-target="#tab-inventory">
            <i class="fas fa-laptop-medical me-1"></i> 1. Medical Assets &amp; PPM (<?= count($equipments ?? []) ?>)
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm rounded-pill" id="tab-facility-btn" data-bs-toggle="pill" data-bs-target="#tab-facility">
            <i class="fas fa-clipboard-check me-1"></i> 2. Facility Safety Rounds &amp; Defects (<?= count($facilityDefects ?? []) ?>)
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm rounded-pill" id="tab-condemnation-btn" data-bs-toggle="pill" data-bs-target="#tab-condemnation">
            <i class="fas fa-scale-balanced me-1"></i> 3. Condemnation &amp; Scrap Desk (<?= count($condemnations ?? []) ?>)
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm rounded-pill" id="tab-sops-btn" data-bs-toggle="pill" data-bs-target="#tab-sops">
            <i class="fas fa-book-medical me-1"></i> 4. Live Safety SOPs &amp; Disaster Codes (<?= count($safetySops ?? []) ?>)
        </button>
    </li>
    <li class="nav-item">
        <button class="nav-link fw-bold btn-sm rounded-pill" id="tab-utilities-btn" data-bs-toggle="pill" data-bs-target="#tab-utilities">
            <i class="fas fa-building-shield me-1"></i> 5. Building Utilities (<?= count($utilitySystems ?? []) ?>)
        </button>
    </li>
</ul>

<div class="tab-content" id="equipmentTabContent">

    <!-- =========================================================
         TAB 1: MEDICAL ASSETS & PREVENTIVE MAINTENANCE (PPM)
    ========================================================= -->
    <div class="tab-pane fade show active" id="tab-inventory">
        <div class="card card-max p-4 mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3 pb-2 border-bottom">
                <div>
                    <h5 class="h6 fw-bold text-navy mb-0">Biomedical Equipment Master Inventory &amp; Lifecycle Grid</h5>
                    <span class="small text-muted">Comprehensive inventory with real-time status, NABL calibration, and next PPM schedule.</span>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge bg-light text-dark border p-2 small"><i class="fas fa-check-circle text-success me-1"></i> Operational</span>
                    <span class="badge bg-light text-dark border p-2 small"><i class="fas fa-clock text-warning me-1"></i> Under Maintenance</span>
                    <span class="badge bg-light text-dark border p-2 small"><i class="fas fa-circle-xmark text-danger me-1"></i> Out of Order</span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Asset ID</th>
                            <th>Equipment Name &amp; Make</th>
                            <th>Clinical Department</th>
                            <th>Calibration Status</th>
                            <th>Next PPM Due</th>
                            <th>Downtime</th>
                            <th>Live Status</th>
                            <th>Operational Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($equipments)) : ?>
                            <?php foreach ($equipments as $eq) : ?>
                                <tr>
                                    <td>
                                        <span class="badge badge-max badge-max-blue fw-bold"><?= esc($eq['asset_no']) ?></span>
                                        <?php if (($eq['condemnation_status'] ?? 'none') === 'approved') : ?>
                                            <span class="badge bg-danger text-white d-block mt-1" style="font-size: 0.65rem;">CONDEMNED</span>
                                        <?php elseif (($eq['condemnation_status'] ?? 'none') === 'requested') : ?>
                                            <span class="badge bg-warning text-dark d-block mt-1" style="font-size: 0.65rem;">CONDEMNATION PENDING</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($eq['name']) ?></strong>
                                        <span class="small text-muted"><?= esc($eq['manufacturer']) ?> <?= esc($eq['model']) ?> (S/N: <?= esc($eq['serial_no']) ?>)</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border"><?= esc($eq['department_name'] ?? 'General') ?></span>
                                    </td>
                                    <td>
                                        <?php if (!empty($eq['next_calibration_date'])) : ?>
                                            <span class="small text-dark fw-semibold d-block">Due: <?= esc($eq['next_calibration_date']) ?></span>
                                            <?php if (strtotime($eq['next_calibration_date']) < strtotime('+30 days')) : ?>
                                                <span class="badge badge-max badge-max-rose" style="font-size: 0.7rem;"><i class="fas fa-bell me-1"></i> Calib Due (&lt;30d)</span>
                                            <?php else : ?>
                                                <span class="badge badge-max badge-max-emerald" style="font-size: 0.7rem;"><i class="fas fa-check me-1"></i> Traceable NABL</span>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <span class="small text-muted">Not Scheduled</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($eq['next_ppm_date'])) : ?>
                                            <span class="small fw-semibold text-dark"><?= esc($eq['next_ppm_date']) ?></span>
                                            <span class="small text-muted d-block" style="font-size: 0.72rem;">Freq: <?= esc($eq['ppm_frequency_months'] ?? 6) ?>M</span>
                                        <?php else : ?>
                                            <span class="small text-muted">PPM Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($eq['breakdown_downtime_hours']) && $eq['breakdown_downtime_hours'] > 0) : ?>
                                            <span class="badge bg-danger bg-opacity-10 text-danger fw-bold px-2 py-1">
                                                <i class="fas fa-stopwatch me-1"></i> <?= esc($eq['breakdown_downtime_hours']) ?> hrs
                                            </span>
                                        <?php else : ?>
                                            <span class="badge bg-light text-muted fw-semibold">0 hrs</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($eq['status'] === 'active') : ?>
                                            <span class="badge badge-max badge-max-emerald"><i class="fas fa-check-circle me-1"></i> Operational</span>
                                        <?php elseif ($eq['status'] === 'under_maintenance') : ?>
                                            <span class="badge badge-max badge-max-gold"><i class="fas fa-wrench me-1"></i> Maintenance</span>
                                        <?php elseif ($eq['status'] === 'out_of_order') : ?>
                                            <span class="badge badge-max badge-max-rose"><i class="fas fa-ban me-1"></i> Out of Order</span>
                                        <?php else : ?>
                                            <span class="badge bg-secondary text-white"><?= esc(ucfirst($eq['status'])) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Manage
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                <li>
                                                    <a class="dropdown-item small" href="javascript:void(0)" onclick="openPpmModal(<?= $eq['id'] ?>, '<?= esc($eq['name']) ?>', '<?= esc($eq['asset_no']) ?>')">
                                                        <i class="fas fa-screwdriver-wrench text-primary me-2"></i> Record PPM Completion
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item small" href="javascript:void(0)" onclick="openStatusModal(<?= $eq['id'] ?>, '<?= esc($eq['name']) ?>', '<?= esc($eq['status']) ?>')">
                                                        <i class="fas fa-power-off text-warning me-2"></i> Update Operational Status
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item small text-danger" href="javascript:void(0)" onclick="openCondemnModal(<?= $eq['id'] ?>, '<?= esc($eq['name']) ?>', '<?= esc($eq['asset_no']) ?>')">
                                                        <i class="fas fa-gavel me-2"></i> Initiate Condemnation
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="8" class="text-center py-4 text-muted">No biomedical equipment registered.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- =========================================================
         TAB 2: FACILITY SAFETY ROUNDS & DEFICIENCY TRACKER
    ========================================================= -->
    <div class="tab-pane fade" id="tab-facility">
        <div class="card card-max p-4 mb-4">
            <div class="row align-items-center mb-4 pb-3 border-bottom">
                <div class="col-md-8">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge badge-max badge-max-rose px-2 py-1"><i class="fas fa-building-circle-check me-1"></i> Facility Rounds</span>
                        <h5 class="h6 fw-bold text-navy mb-0">Hospital Infrastructure Safety &amp; Deficiency Tracking Log</h5>
                    </div>
                    <p class="small text-muted mb-0">
                        Digital deficiency logging with category classification, severity hierarchy, auto-assignment, and verification closure.
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button class="btn btn-primary-max btn-sm fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#logDefectModal">
                        <i class="fas fa-plus me-1"></i> Log New Deficiency
                    </button>
                </div>
            </div>

            <!-- Visual Feature Row -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="p-3 bg-surface-alt rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-3">
                            <img src="<?= base_url('assets/images/facility_safety_banner.jpg') ?>" alt="Safety Round" class="rounded-3 shadow-sm" style="width: 80px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold text-navy mb-1" style="font-size: 0.88rem;">Digital Safety Inspections</h6>
                                <span class="small text-muted d-block" style="font-size: 0.78rem;">NABH FMS Chapter 1-8 Compliance Checklists</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-surface-alt rounded-3 border h-100">
                        <span class="small text-muted d-block mb-1">Deficiency Categories</span>
                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge bg-light text-dark border small">Fire Safety</span>
                            <span class="badge bg-light text-dark border small">Civil / Tiles</span>
                            <span class="badge bg-light text-dark border small">MGPS Gas</span>
                            <span class="badge bg-light text-dark border small">HVAC Air</span>
                            <span class="badge bg-light text-dark border small">BMW Waste</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-surface-alt rounded-3 border h-100">
                        <span class="small text-muted d-block mb-1">Active Severity Distribution</span>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="badge badge-max badge-max-rose">Critical: <?= esc($facilityMetrics['critical_defects'] ?? 0) ?></span>
                            <span class="badge badge-max badge-max-gold">Active: <?= esc($facilityMetrics['open_defects'] ?? 0) ?></span>
                            <span class="badge badge-max badge-max-emerald">Resolved: <?= esc($facilityMetrics['resolved_defects'] ?? 0) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Defects Table -->
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Round Date</th>
                            <th>Location / Area</th>
                            <th>Category</th>
                            <th>Deficiency Description</th>
                            <th>Severity</th>
                            <th>Assigned Team</th>
                            <th>Target Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($facilityDefects)) : ?>
                            <?php foreach ($facilityDefects as $def) : ?>
                                <tr>
                                    <td>
                                        <span class="small fw-semibold text-dark d-block"><?= esc($def['round_date']) ?></span>
                                        <span class="text-muted" style="font-size: 0.72rem;"><?= esc($def['inspector_name']) ?></span>
                                    </td>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($def['location_area']) ?></strong>
                                        <span class="small text-muted"><?= esc($def['department_name'] ?? 'General Facility') ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border"><?= esc($def['defect_category']) ?></span>
                                    </td>
                                    <td style="max-width: 260px;">
                                        <p class="small text-dark mb-1 text-wrap"><?= esc($def['description']) ?></p>
                                        <?php if (!empty($def['corrective_action_taken'])) : ?>
                                            <div class="p-1 rounded bg-success bg-opacity-10 text-success small" style="font-size: 0.72rem;">
                                                <i class="fas fa-check-circle me-1"></i> <?= esc($def['corrective_action_taken']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($def['severity'] === 'critical') : ?>
                                            <span class="badge badge-max badge-max-rose"><i class="fas fa-circle-exclamation me-1"></i> Critical</span>
                                        <?php elseif ($def['severity'] === 'high') : ?>
                                            <span class="badge badge-max badge-max-gold"><i class="fas fa-triangle-exclamation me-1"></i> High</span>
                                        <?php elseif ($def['severity'] === 'medium') : ?>
                                            <span class="badge badge-max badge-max-blue">Medium</span>
                                        <?php else : ?>
                                            <span class="badge bg-light text-muted border">Low</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="small fw-semibold text-dark"><?= esc($def['assigned_to'] ?? 'Facility Ops') ?></span>
                                    </td>
                                    <td>
                                        <?php if (!empty($def['target_resolution_date'])) : ?>
                                            <span class="small text-muted"><?= esc($def['target_resolution_date']) ?></span>
                                        <?php else : ?>
                                            <span class="small text-muted">Immediate</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($def['status'] === 'open') : ?>
                                            <span class="badge badge-max badge-max-rose">Open</span>
                                        <?php elseif ($def['status'] === 'in_progress') : ?>
                                            <span class="badge badge-max badge-max-gold">In Progress</span>
                                        <?php elseif ($def['status'] === 'resolved') : ?>
                                            <span class="badge badge-max badge-max-emerald"><i class="fas fa-check me-1"></i> Resolved</span>
                                        <?php else : ?>
                                            <span class="badge bg-secondary text-white">Closed</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-navy" onclick="openDefectStatusModal(<?= $def['id'] ?>, '<?= esc(addslashes($def['description'])) ?>', '<?= esc($def['status']) ?>', '<?= esc(addslashes($def['corrective_action_taken'] ?? '')) ?>')">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="9" class="text-center py-4 text-muted">No facility round defects recorded.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- =========================================================
         TAB 3: CONDEMNATION & DECOMMISSIONING WORKFLOW
    ========================================================= -->
    <div class="tab-pane fade" id="tab-condemnation">
        <div class="card card-max p-4 mb-4">
            <div class="row align-items-center mb-4 pb-3 border-bottom">
                <div class="col-md-8">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge badge-max badge-max-gold px-2 py-1"><i class="fas fa-scale-balanced me-1"></i> 3-Tier Workflow</span>
                        <h5 class="h6 fw-bold text-navy mb-0">Equipment Condemnation &amp; Scrap Certification Desk</h5>
                    </div>
                    <p class="small text-muted mb-0">
                        Formal decommissioning pipeline for Beyond Economical Repair (BER) assets with Condemnation Committee and Medical Director approvals.
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button class="btn btn-warning btn-sm fw-bold text-dark shadow-sm" data-bs-toggle="modal" data-bs-target="#requestCondemnationModal">
                        <i class="fas fa-plus me-1"></i> Initiate Condemnation Request
                    </button>
                </div>
            </div>

            <!-- Workflow Stage Explanation -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="p-3 bg-surface-alt rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge rounded-circle bg-primary text-white" style="width: 24px; height: 24px;">1</span>
                            <h6 class="fw-bold text-navy mb-0">BER Evaluation</h6>
                        </div>
                        <p class="small text-muted mb-0">Biomedical Engineer logs repair quotes vs asset replacement value.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-surface-alt rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge rounded-circle bg-warning text-dark" style="width: 24px; height: 24px;">2</span>
                            <h6 class="fw-bold text-navy mb-0">Condemnation Committee</h6>
                        </div>
                        <p class="small text-muted mb-0">Multi-disciplinary committee reviews technical feasibility &amp; endorses recommendation.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-surface-alt rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge rounded-circle bg-success text-white" style="width: 24px; height: 24px;">3</span>
                            <h6 class="fw-bold text-navy mb-0">MS Approval &amp; Scrap Cert</h6>
                        </div>
                        <p class="small text-muted mb-0">Medical Superintendent issues statutory scrap certificate (NABH-SCRAP-XXXX).</p>
                    </div>
                </div>
            </div>

            <!-- Condemnations Table -->
            <div class="table-responsive">
                <table class="table-max">
                    <thead>
                        <tr>
                            <th>Asset ID</th>
                            <th>Equipment Details</th>
                            <th>Initiated By &amp; Reason</th>
                            <th>Cost vs Repair Quote</th>
                            <th>Committee Review</th>
                            <th>MS Final Sign-off</th>
                            <th>Scrap Certificate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($condemnations)) : ?>
                            <?php foreach ($condemnations as $c) : ?>
                                <tr>
                                    <td>
                                        <span class="badge badge-max badge-max-blue fw-bold"><?= esc($c['asset_no']) ?></span>
                                    </td>
                                    <td>
                                        <strong class="text-navy d-block"><?= esc($c['equipment_name']) ?></strong>
                                        <span class="small text-muted"><?= esc($c['manufacturer']) ?> <?= esc($c['model']) ?></span>
                                    </td>
                                    <td style="max-width: 260px;">
                                        <span class="small fw-semibold text-dark d-block"><?= esc($c['requested_by']) ?></span>
                                        <p class="small text-muted mb-0"><?= esc($c['request_reason']) ?></p>
                                    </td>
                                    <td>
                                        <div class="small">
                                            <span class="text-muted d-block">Orig: ₹<?= number_format((float)($c['original_cost'] ?? 0), 2) ?></span>
                                            <span class="text-danger fw-bold">Repair: ₹<?= number_format((float)($c['repair_estimate'] ?? 0), 2) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($c['committee_status'] === 'recommended') : ?>
                                            <span class="badge badge-max badge-max-emerald"><i class="fas fa-check me-1"></i> Recommended</span>
                                            <span class="text-muted d-block" style="font-size: 0.7rem;"><?= esc(substr($c['committee_reviewed_at'] ?? '', 0, 10)) ?></span>
                                        <?php elseif ($c['committee_status'] === 'rejected') : ?>
                                            <span class="badge badge-max badge-max-rose"><i class="fas fa-ban me-1"></i> Rejected</span>
                                        <?php else : ?>
                                            <span class="badge badge-max badge-max-gold">Pending Committee</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($c['ms_status'] === 'approved') : ?>
                                            <span class="badge badge-max badge-max-emerald"><i class="fas fa-certificate me-1"></i> MS Approved</span>
                                            <span class="text-muted d-block" style="font-size: 0.7rem;"><?= esc(substr($c['ms_approved_at'] ?? '', 0, 10)) ?></span>
                                        <?php elseif ($c['ms_status'] === 'rejected') : ?>
                                            <span class="badge badge-max badge-max-rose"><i class="fas fa-ban me-1"></i> MS Rejected</span>
                                        <?php else : ?>
                                            <span class="badge bg-light text-muted border">Pending MS</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($c['scrap_certificate_no'])) : ?>
                                            <span class="badge bg-dark text-warning border border-warning px-2 py-1 font-monospace" style="font-size: 0.75rem;">
                                                <i class="fas fa-stamp me-1"></i> <?= esc($c['scrap_certificate_no']) ?>
                                            </span>
                                        <?php else : ?>
                                            <span class="small text-muted">In Progress</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-navy" onclick="openReviewCondemnModal(<?= $c['id'] ?>, '<?= esc($c['equipment_name']) ?>', '<?= esc($c['committee_status']) ?>', '<?= esc($c['ms_status']) ?>')">
                                            Review / Sign
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="8" class="text-center py-4 text-muted">No equipment condemnation records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- =========================================================
         TAB 4: LIVE SAFETY SOPS & EMERGENCY CODES
    ========================================================= -->
    <div class="tab-pane fade" id="tab-sops">
        <div class="card card-max p-4 mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-3 border-bottom">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge badge-max badge-max-emerald px-2 py-1"><i class="fas fa-tower-broadcast me-1"></i> 24x7 Active</span>
                        <h5 class="h6 fw-bold text-navy mb-0">Emergency Protocols &amp; Disaster Management SOP Directory</h5>
                    </div>
                    <p class="small text-muted mb-0">Instant action protocols for Hospital Codes Red, Blue, Amber, Yellow, Pink, and Hazmat Spills.</p>
                </div>
                <div class="badge bg-danger bg-opacity-10 text-danger border border-danger px-3 py-2 fw-bold">
                    <i class="fas fa-phone-volume me-1"></i> Hospital Emergency Hotline: Ext. 5555
                </div>
            </div>

            <div class="row g-4">
                <?php if (!empty($safetySops)) : ?>
                    <?php foreach ($safetySops as $sop) : ?>
                        <?php 
                            $badgeColor = match($sop['code_type']) {
                                'CODE RED'    => 'bg-danger text-white',
                                'CODE BLUE'   => 'bg-primary text-white',
                                'CODE AMBER'  => 'bg-warning text-dark',
                                'CODE YELLOW' => 'bg-warning text-dark',
                                'CODE PINK'   => 'bg-danger bg-opacity-75 text-white',
                                'CODE HAZMAT' => 'bg-dark text-warning',
                                default       => 'bg-secondary text-white',
                            };
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border rounded-4 p-3 shadow-sm d-flex flex-column justify-content-between transition-all hover-translate" style="background: #ffffff;">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge <?= $badgeColor ?> px-3 py-1 rounded-pill fw-bold" style="font-size: 0.78rem;">
                                            <?= esc($sop['code_type']) ?>
                                        </span>
                                        <span class="small text-muted font-monospace"><?= esc($sop['sop_number']) ?> (<?= esc($sop['version']) ?>)</span>
                                    </div>
                                    <h6 class="fw-bold text-navy mb-2"><?= esc($sop['title']) ?></h6>
                                    <p class="small text-muted mb-3" style="line-height: 1.5;"><?= esc($sop['summary']) ?></p>
                                    
                                    <div class="p-2 rounded bg-light border small text-dark mb-3">
                                        <strong class="d-block text-navy mb-1" style="font-size: 0.76rem;"><i class="fas fa-list-check text-success me-1"></i> Instant Action Steps:</strong>
                                        <pre class="mb-0 text-wrap font-sans-serif" style="font-size: 0.74rem; font-family: var(--font-body); white-space: pre-wrap;"><?= esc($sop['action_steps']) ?></pre>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                    <span class="small text-danger fw-bold"><i class="fas fa-phone me-1"></i> <?= esc($sop['contact_extension']) ?></span>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="alert('Full SOP document for <?= esc($sop['title']) ?> opened.')">
                                        <i class="fas fa-file-pdf me-1"></i> View Full SOP
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- =========================================================
         TAB 5: BUILDING UTILITIES (STP, FIRE, MGPS, DG)
    ========================================================= -->
    <div class="tab-pane fade" id="tab-utilities">
        <div class="card card-max p-4 mb-4">
            <h5 class="h6 fw-bold text-navy mb-3"><i class="fas fa-shield-alt text-sapphire me-2"></i> Hospital Critical Utilities &amp; Infrastructure Safety Grid</h5>
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
</div>

<!-- =========================================================
     MODALS SECTION
========================================================= -->

<!-- Modal 1: Add Medical Equipment -->
<div class="modal fade" id="addEquipmentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy"><i class="fas fa-laptop-medical text-primary me-2"></i> Register Medical Equipment</h5>
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

<!-- Modal 2: Log Facility Safety Round Defect -->
<div class="modal fade" id="logDefectModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy"><i class="fas fa-triangle-exclamation text-danger me-2"></i> Log Facility Safety Round Deficiency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/create-defect') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Inspection Date</label>
                            <input type="date" name="round_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Inspector Name</label>
                            <input type="text" name="inspector_name" class="form-control" value="<?= esc(session()->get('user_name') ?? 'Safety Lead') ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Department</label>
                            <select name="department_id" class="form-select">
                                <option value="">-- General / Common Area --</option>
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
                            <label class="form-label small fw-semibold">Exact Location / Area</label>
                            <input type="text" name="location_area" class="form-control" placeholder="e.g. ICU Corridor 3 Fire Exit / Emergency Bay" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Defect Category</label>
                            <select name="defect_category" class="form-select" required>
                                <option>Fire Safety</option>
                                <option>Civil / Infrastructure</option>
                                <option>Electrical & Illumination</option>
                                <option>Plumbing & Water Supply</option>
                                <option>HVAC / Clean Air</option>
                                <option>Medical Gas (MGPS)</option>
                                <option>Bio-Medical Waste</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Severity</label>
                            <select name="severity" class="form-select" required>
                                <option value="critical">Critical (Immediate Hazard)</option>
                                <option value="high">High</option>
                                <option value="medium" selected>Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Deficiency Findings &amp; Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Describe the physical hazard, non-compliance, or broken infrastructure element..." required></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Assign Action To</label>
                            <input type="text" name="assigned_to" class="form-control" placeholder="e.g. Civil Maintenance Team / Fire Officer" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Target Resolution Date</label>
                            <input type="date" name="target_resolution_date" class="form-control" value="<?= date('Y-m-d', strtotime('+3 days')) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Evidence Notes &amp; Observations</label>
                        <input type="text" name="evidence_notes" class="form-control" placeholder="e.g. Tile cracked 12 inches; photo captured on tablet">
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm fw-bold">Log &amp; Assign Deficiency</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: Update Defect Status -->
<div class="modal fade" id="updateDefectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Update Deficiency Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/update-defect-status') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="defect_id" id="modalDefectId">
                <div class="modal-body p-4">
                    <p class="small text-muted mb-2" id="modalDefectDesc"></p>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Resolution Status</label>
                        <select name="status" id="modalDefectStatus" class="form-select" required>
                            <option value="open">Open</option>
                            <option value="in_progress">In Progress</option>
                            <option value="resolved">Resolved (Fix Completed)</option>
                            <option value="closed">Closed (Verified & Signed-off)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Corrective Action Taken</label>
                        <textarea name="corrective_action_taken" id="modalDefectAction" class="form-control" rows="3" placeholder="Detail the repairs, replacements, or civil work performed..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Save Resolution</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 4: Record PPM -->
<div class="modal fade" id="recordPpmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy"><i class="fas fa-screwdriver-wrench text-primary me-2"></i> Record Preventive Maintenance (PPM)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/record-ppm') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="equipment_id" id="modalPpmEqId">
                <div class="modal-body p-4">
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <strong class="text-navy d-block" id="modalPpmEqName"></strong>
                        <span class="small text-muted" id="modalPpmAssetNo"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">PPM Cycle Frequency</label>
                        <select name="ppm_frequency_months" class="form-select">
                            <option value="3">Quarterly (Every 3 Months)</option>
                            <option value="6" selected>Biannual (Every 6 Months)</option>
                            <option value="12">Annual (Every 12 Months)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Service Engineer / Performed By</label>
                        <input type="text" class="form-control" value="<?= esc(session()->get('user_name') ?? 'Biomedical Engineer') ?>" readonly>
                    </div>
                    <p class="small text-muted mb-0">
                        <i class="fas fa-info-circle text-primary me-1"></i> Submitting this form marks current PPM complete, creates a timestamped maintenance log, and automatically rolls forward the next due date.
                    </p>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Complete PPM</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 5: Update Operational Status -->
<div class="modal fade" id="updateStatusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy"><i class="fas fa-power-off text-warning me-2"></i> Update Asset Operational Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/update-status') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="equipment_id" id="modalStatusEqId">
                <div class="modal-body p-4">
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <strong class="text-navy d-block" id="modalStatusEqName"></strong>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Operational Status</label>
                        <select name="status" id="modalStatusSelect" class="form-select" required>
                            <option value="active">Operational (In Clinical Service)</option>
                            <option value="under_maintenance">Under Maintenance / Service</option>
                            <option value="out_of_order">Out of Order (Breakdown)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Cumulative Breakdown Downtime (Hours)</label>
                        <input type="number" name="breakdown_downtime_hours" class="form-control" min="0" placeholder="e.g. 24">
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Save Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 6: Request Condemnation -->
<div class="modal fade" id="requestCondemnationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy"><i class="fas fa-scale-balanced text-warning me-2"></i> Initiate Asset Condemnation Evaluation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/request-condemnation') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Select Medical Equipment Asset</label>
                        <select name="equipment_id" id="modalCondemnEqSelect" class="form-select" required>
                            <?php if (!empty($equipments)) : ?>
                                <?php foreach ($equipments as $eq) : ?>
                                    <option value="<?= $eq['id'] ?>">
                                        <?= esc($eq['asset_no']) ?> — <?= esc($eq['name']) ?> (<?= esc($eq['department_name'] ?? 'General') ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Original Acquisition Cost (₹)</label>
                            <input type="number" name="original_cost" step="0.01" class="form-control" placeholder="1500000.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Estimated Repair Quote (₹)</label>
                            <input type="number" name="repair_estimate" step="0.01" class="form-control" placeholder="1200000.00" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Condemnation Rationale / BER Statement</label>
                        <textarea name="request_reason" class="form-control" rows="3" placeholder="Explain why the asset is Beyond Economical Repair (e.g., obsolete technology, spare parts discontinued, repair exceeds 70% value)..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">OEM / Technical Inspection Notes</label>
                        <textarea name="technical_notes" class="form-control" rows="2" placeholder="Manufacturer technical report reference numbers and breakdown history..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm fw-bold text-dark">Submit for Committee Review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 7: Review / Sign Condemnation -->
<div class="modal fade" id="reviewCondemnModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-max border-0 shadow-xl">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-navy">Condemnation Authorization &amp; Sign-off</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('equipment/review-condemnation') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="condemnation_id" id="modalReviewCondemnId">
                <div class="modal-body p-4">
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <strong class="text-navy d-block" id="modalReviewEqName"></strong>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Authorization Stage</label>
                        <select name="stage" class="form-select" required>
                            <option value="committee">Condemnation Committee Review</option>
                            <option value="ms">Medical Superintendent Final Sign-off</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Decision</label>
                        <select name="decision" class="form-select" required>
                            <option value="recommended">Recommended / Approved for Decommissioning</option>
                            <option value="rejected">Rejected (Mandate Further Repair)</option>
                        </select>
                    </div>
                    <p class="small text-muted mb-0">
                        <i class="fas fa-stamp text-warning me-1"></i> Final approval by MS will automatically generate a digital Scrap Certificate and update asset status.
                    </p>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-max btn-sm">Record Authorization</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Helpers for Modals & Tabs -->
<script>
function switchTab(btnId) {
    const triggerEl = document.getElementById(btnId);
    if (triggerEl) {
        bootstrap.Tab.getOrCreateInstance(triggerEl).show();
    }
}

function openPpmModal(id, name, assetNo) {
    document.getElementById('modalPpmEqId').value = id;
    document.getElementById('modalPpmEqName').innerText = name;
    document.getElementById('modalPpmAssetNo').innerText = 'Asset: ' + assetNo;
    new bootstrap.Modal(document.getElementById('recordPpmModal')).show();
}

function openStatusModal(id, name, status) {
    document.getElementById('modalStatusEqId').value = id;
    document.getElementById('modalStatusEqName').innerText = name;
    document.getElementById('modalStatusSelect').value = status;
    new bootstrap.Modal(document.getElementById('updateStatusModal')).show();
}

function openCondemnModal(id, name, assetNo) {
    const select = document.getElementById('modalCondemnEqSelect');
    if (select) {
        select.value = id;
    }
    new bootstrap.Modal(document.getElementById('requestCondemnationModal')).show();
}

function openDefectStatusModal(id, desc, status, action) {
    document.getElementById('modalDefectId').value = id;
    document.getElementById('modalDefectDesc').innerText = desc;
    document.getElementById('modalDefectStatus').value = status;
    document.getElementById('modalDefectAction').value = action;
    new bootstrap.Modal(document.getElementById('updateDefectModal')).show();
}

function openReviewCondemnModal(id, eqName, commStatus, msStatus) {
    document.getElementById('modalReviewCondemnId').value = id;
    document.getElementById('modalReviewEqName').innerText = eqName;
    new bootstrap.Modal(document.getElementById('reviewCondemnModal')).show();
}

// Preserve active tab on page reload via hash
document.addEventListener("DOMContentLoaded", function() {
    if (window.location.hash) {
        const hash = window.location.hash;
        if (hash === '#tab-facility') switchTab('tab-facility-btn');
        if (hash === '#tab-condemnation') switchTab('tab-condemnation-btn');
        if (hash === '#tab-sops') switchTab('tab-sops-btn');
    }
});
</script>
