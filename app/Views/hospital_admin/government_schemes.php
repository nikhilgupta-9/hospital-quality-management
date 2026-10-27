<div class="container-fluid px-0">
    <!-- Breadcrumb & Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 small">
                    <li class="breadcrumb-item"><a href="<?= site_url('hospital-admin') ?>" class="text-decoration-none text-sapphire">Dashboard</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">Point #8: Government Schemes Support</li>
                </ol>
            </nav>
            <h2 class="h4 mb-0 fw-bold text-navy">
                <i class="fas fa-hand-holding-medical text-sapphire me-2"></i> Government Schemes Support (Cashless & Ayush)
            </h2>
            <p class="text-muted small mb-0">PMJAY Ayushman Bharat Empanelment, IRDAI 1-Hour Cashless Desk & AYUSH Standards</p>
        </div>
        <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
            <span class="badge bg-success-subtle text-success px-3 py-2 fs-6 fw-bold">
                <i class="fas fa-shield-halved me-1"></i> Empanelment Eligible
            </span>
        </div>
    </div>

    <!-- TPA Cashless Protocol Telemetry -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">Pre-Auth TAT</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($cashlessMetrics['avg_preauth_time']) ?></div>
                        <span class="badge bg-success-subtle text-success small mt-1">Target &lt; 60 mins</span>
                    </div>
                    <div class="rounded-circle bg-light text-success p-3 fs-4">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">IRDAI Compliance</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($cashlessMetrics['tat_compliance']) ?></div>
                        <span class="badge bg-primary-subtle text-sapphire small mt-1">100% Cashless Mandate</span>
                    </div>
                    <div class="rounded-circle bg-light text-sapphire p-3 fs-4">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">Claim Rejection Ratio</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1"><?= esc($cashlessMetrics['rejection_ratio']) ?></div>
                        <span class="badge bg-success-subtle text-success small mt-1">Industry Avg 8.2%</span>
                    </div>
                    <div class="rounded-circle bg-light text-warning p-3 fs-4">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small fw-semibold text-uppercase">TPA Helpdesk</div>
                        <div class="h3 mb-0 fw-bold text-navy mt-1">24x7</div>
                        <span class="badge bg-info-subtle text-info small mt-1">Dedicated Nodal Desk</span>
                    </div>
                    <div class="rounded-circle bg-light text-info p-3 fs-4">
                        <i class="fas fa-headset"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1: PMJAY Ayushman Bharat Empanelment Readiness Matrix -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-navy">
                <i class="fas fa-hospital-user text-sapphire me-2"></i> Pradhan Mantri Jan Arogya Yojana (PMJAY) Empanelment Checklist
            </h5>
            <small class="text-muted">National Health Authority (NHA) statutory qualifying milestones</small>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-muted small text-uppercase">
                    <tr>
                        <th>Empanelment Requirement</th>
                        <th>NHA Specification</th>
                        <th>Hospital Live Status</th>
                        <th>Category</th>
                        <th class="text-end">Verification</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php foreach ($pmjayCriteria as $crit) : ?>
                        <tr>
                            <td class="fw-bold text-navy"><?= esc($crit['criterion']) ?></td>
                            <td class="text-muted"><?= esc($crit['description']) ?></td>
                            <td>
                                <span class="fw-bold font-monospace text-dark"><?= esc($crit['value']) ?></span>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border"><?= esc($crit['tag']) ?></span>
                            </td>
                            <td class="text-end">
                                <?php if ($crit['status'] === 'verified') : ?>
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Verified</span>
                                <?php else : ?>
                                    <span class="badge bg-warning text-dark"><i class="fas fa-circle-exclamation me-1"></i> Action Required</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section 2: AYUSH & Central Government Health Schemes (CGHS / ECHS) -->
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
                <h5 class="fw-bold text-navy mb-3">
                    <i class="fas fa-spa text-success me-2"></i> AYUSH Daycare & Therapy Center Protocols
                </h5>
                <p class="text-muted small mb-3">
                    Ministry of AYUSH accreditation requires dedicated Panchakarma and integrated therapy infrastructure separated from general surgical wards.
                </p>
                <ul class="list-group list-group-flush small">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="fas fa-check text-success me-2"></i> Panchakarma Therapy Bed Allocation</span>
                        <span class="badge bg-success-subtle text-success"><?= esc($ayushBench['ayush_daycare_beds']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="fas fa-check text-success me-2"></i> Herbarium & Herbal Medicine Storage</span>
                        <span class="badge bg-light text-dark border">Climate Controlled (18-24°C)</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="fas fa-check text-success me-2"></i> Qualified BAMS / MD AYUSH Consultant Privileging</span>
                        <span class="badge bg-primary-subtle text-sapphire">Credentialed (HRM.3)</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
                <h5 class="fw-bold text-navy mb-3">
                    <i class="fas fa-medal text-warning me-2"></i> CGHS & ECHS Priority Defense Veteran Desk
                </h5>
                <p class="text-muted small mb-3">
                    Priority treatment guidelines for Central Government Health Scheme and Ex-Servicemen Contributory Health Scheme beneficiaries.
                </p>
                <ul class="list-group list-group-flush small">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="fas fa-check text-success me-2"></i> Package Rate Master Synchronization</span>
                        <span class="badge bg-info-subtle text-info"><?= esc($ayushBench['cghs_rates_mapping']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="fas fa-check text-success me-2"></i> Veteran & Senior Citizen Helpdesk Counter</span>
                        <span class="badge bg-success-subtle text-success"><?= esc($ayushBench['echs_veterans_desk']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="fas fa-check text-success me-2"></i> Paperless E-Billing Submission</span>
                        <span class="badge bg-secondary-subtle text-secondary">UTI-ITSL Gateway Linked</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
