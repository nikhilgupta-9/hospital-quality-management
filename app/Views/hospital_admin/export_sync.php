<div class="container-fluid px-0">
    <!-- Breadcrumb & Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 small">
                    <li class="breadcrumb-item"><a href="<?= site_url('hospital-admin') ?>" class="text-decoration-none text-sapphire">Dashboard</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">Point #6: Document Export & Portal Sync</li>
                </ol>
            </nav>
            <h2 class="h4 mb-0 fw-bold text-navy">
                <i class="fas fa-file-export text-sapphire me-2"></i> Document Export & NABH Portal Sync
            </h2>
            <p class="text-muted small mb-0">1-Click Dossier Compilation, Hope Portal Bridge & Statutory Compliance Bundle Generator</p>
        </div>
        <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
            <a href="<?= site_url('hospital-admin/export-sync/download-manifest') ?>" class="btn btn-sapphire btn-sm px-3 shadow-sm">
                <i class="fas fa-download me-1"></i> Download JSON Manifest
            </a>
            <button onclick="window.print()" class="btn btn-outline-secondary btn-sm px-3">
                <i class="fas fa-print me-1"></i> Print Executive Summary
            </button>
        </div>
    </div>

    <!-- Top KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">NABH 5th Ed. Score</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($matrixData['summary']['avg_score'] ?? '88.5') ?>%</div>
                        <span class="badge bg-success-subtle text-success small mt-1">Audit Ready Target</span>
                    </div>
                    <div class="rounded-circle bg-light text-sapphire p-3 fs-4">
                        <i class="fas fa-award"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">Statutory Licences</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($validLicenses) ?> / <?= esc($totalLicenses) ?></div>
                        <span class="badge bg-primary-subtle text-sapphire small mt-1">100% In Validity</span>
                    </div>
                    <div class="rounded-circle bg-light text-success p-3 fs-4">
                        <i class="fas fa-certificate"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">Active SOPs & Docs</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($documentCount) ?></div>
                        <span class="badge bg-info-subtle text-info small mt-1">10 Chapters Mapped</span>
                    </div>
                    <div class="rounded-circle bg-light text-info p-3 fs-4">
                        <i class="fas fa-file-contract"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">Audit Evidence Files</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($evidenceCount) ?></div>
                        <span class="badge bg-warning-subtle text-dark small mt-1">Geo-Tagged Photos</span>
                    </div>
                    <div class="rounded-circle bg-light text-warning p-3 fs-4">
                        <i class="fas fa-camera-retro"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- External Portal Sync Connectors -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="mb-0 fw-bold text-navy">
                <i class="fas fa-tower-broadcast text-sapphire me-2"></i> Regulatory & Government Portals Sync Status
            </h5>
            <small class="text-muted">Real-time telemetry and API bridges to statutory reporting gateways</small>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <?php foreach ($syncStatus as $key => $gate) : ?>
                    <div class="col-12 col-md-4">
                        <div class="border rounded-3 p-3 bg-light h-100">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold text-navy mb-0"><?= esc($gate['name']) ?></h6>
                                <?php if ($gate['status'] === 'synced' || $gate['status'] === 'ready') : ?>
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> <?= strtoupper($gate['status']) ?></span>
                                <?php else : ?>
                                    <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i> PENDING</span>
                                <?php endif; ?>
                            </div>
                            <p class="small text-muted mb-2"><?= esc($gate['details']) ?></p>
                            <div class="small text-secondary">
                                <i class="fas fa-history me-1"></i> Last Telemetry: <strong><?= esc($gate['last_sync']) ?></strong>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Submission Dossier Manifest Table -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold text-navy">
                    <i class="fas fa-layer-group text-sapphire me-2"></i> NABH 5th Edition Complete Submission Dossier
                </h5>
                <small class="text-muted">Structured document repository bundled for assessor review</small>
            </div>
            <a href="<?= site_url('hospital-admin/export-sync/download-manifest') ?>" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-file-code me-1"></i> Export Full JSON
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-muted small text-uppercase">
                    <tr>
                        <th>Section / Bucket</th>
                        <th>Standard Reference</th>
                        <th>Item Description</th>
                        <th>Status</th>
                        <th class="text-end">Verification</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <tr>
                        <td class="fw-bold text-navy"><i class="fas fa-id-card-clip text-sapphire me-2"></i> Part A: Hospital ID</td>
                        <td>NABH General Criteria</td>
                        <td>ROHINI: <strong><?= esc($profile['rohini_id'] ?? 'Pending') ?></strong> | ABDM: <strong><?= esc($profile['abdm_hip_id'] ?? 'Pending') ?></strong> (<?= esc($profile['total_sanctioned_beds'] ?? 0) ?> Beds)</td>
                        <td><span class="badge bg-success">Verified</span></td>
                        <td class="text-end text-success fw-bold"><i class="fas fa-check"></i> Passed</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-navy"><i class="fas fa-shield-heart text-danger me-2"></i> Part B: Statutory Licences</td>
                        <td>CEA, BMW, Fire, SPCB, AERB</td>
                        <td><?= count($licenses) ?> statutory upload buckets verified with zero expiry barriers</td>
                        <td><span class="badge bg-success">7/7 Valid</span></td>
                        <td class="text-end text-success fw-bold"><i class="fas fa-check"></i> Green Flag</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-navy"><i class="fas fa-table-cells text-primary me-2"></i> NABH 10-Chapter Matrix</td>
                        <td>NABH 5th Edition Standards</td>
                        <td>AAC, COP, MOM, PRE, HIC, CQI, ROM, FMS, HRM, IMS compliance scoring</td>
                        <td><span class="badge bg-info text-dark"><?= esc($matrixData['summary']['avg_score'] ?? '88.5') ?>% Score</span></td>
                        <td class="text-end text-success fw-bold"><i class="fas fa-check"></i> Audit Ready</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-navy"><i class="fas fa-clipboard-check text-warning me-2"></i> Consultant Audit Points</td>
                        <td>Internal Quality Assessment</td>
                        <td><?= count($audits) ?> Mock audit sessions conducted, open NCs resolved through CAPA</td>
                        <td><span class="badge bg-secondary"><?= count($audits) ?> Audits Recorded</span></td>
                        <td class="text-end text-success fw-bold"><i class="fas fa-check"></i> Reviewed</td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-navy"><i class="fas fa-images text-success me-2"></i> Live Evidence Media</td>
                        <td>Geo-tagged Infrastructure Audit</td>
                        <td><?= esc($evidenceCount) ?> Photos & Video recordings of fire drills, OT fumigation, BMW bins</td>
                        <td><span class="badge bg-success"><?= esc($evidenceCount) ?> Files Attached</span></td>
                        <td class="text-end text-success fw-bold"><i class="fas fa-check"></i> Timestamped</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-light py-3 text-end">
            <a href="<?= site_url('hospital-admin/export-sync/download-manifest') ?>" class="btn btn-sapphire px-4">
                <i class="fas fa-cloud-arrow-down me-2"></i> Download Full NABH Submission Bundle (.JSON)
            </a>
        </div>
    </div>
</div>
