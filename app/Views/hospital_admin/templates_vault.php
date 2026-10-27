<div class="container-fluid px-0">
    <!-- Breadcrumb & Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 small">
                    <li class="breadcrumb-item"><a href="<?= site_url('hospital-admin') ?>" class="text-decoration-none text-sapphire">Dashboard</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">Point #7: Ready to Use Templates</li>
                </ol>
            </nav>
            <h2 class="h4 mb-0 fw-bold text-navy">
                <i class="fas fa-box-archive text-sapphire me-2"></i> Ready to Use Templates (Consultant Vault)
            </h2>
            <p class="text-muted small mb-0">Pre-Configured NABH 5th Edition SOPs, Registers, Checklists & Disaster Action Plans</p>
        </div>
        <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
            <span class="badge bg-primary-subtle text-sapphire px-3 py-2 fs-6 fw-bold">
                <i class="fas fa-file-shield me-1"></i> <?= count($templates) ?> / <?= esc($totalCount) ?> Templates Active
            </span>
        </div>
    </div>

    <!-- Category Filter Tabs -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="<?= site_url('hospital-admin/templates-vault?category=all') ?>" class="btn btn-sm <?= ($activeCategory === 'all') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-th-large me-1"></i> All Categories
        </a>
        <a href="<?= site_url('hospital-admin/templates-vault?category=infection_control') ?>" class="btn btn-sm <?= ($activeCategory === 'infection_control') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-virus-slash me-1"></i> Infection Control (HIC)
        </a>
        <a href="<?= site_url('hospital-admin/templates-vault?category=pharmacy') ?>" class="btn btn-sm <?= ($activeCategory === 'pharmacy') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-pills me-1"></i> Pharmacy & LASA (MOM)
        </a>
        <a href="<?= site_url('hospital-admin/templates-vault?category=facility') ?>" class="btn btn-sm <?= ($activeCategory === 'facility') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-fire-extinguisher me-1"></i> Facility & Safety (FMS)
        </a>
        <a href="<?= site_url('hospital-admin/templates-vault?category=nursing') ?>" class="btn btn-sm <?= ($activeCategory === 'nursing') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-user-nurse me-1"></i> Nursing & Patient Care
        </a>
        <a href="<?= site_url('hospital-admin/templates-vault?category=clinical') ?>" class="btn btn-sm <?= ($activeCategory === 'clinical') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-stethoscope me-1"></i> Clinical Operations (COP)
        </a>
        <a href="<?= site_url('hospital-admin/templates-vault?category=hr') ?>" class="btn btn-sm <?= ($activeCategory === 'hr') ? 'btn-navy fw-bold' : 'btn-outline-secondary' ?>">
            <i class="fas fa-user-tie me-1"></i> HR & Privileging (HRM)
        </a>
    </div>

    <!-- Templates Grid -->
    <div class="row g-3">
        <?php foreach ($templates as $t) : ?>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 h-100 p-3 bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-light text-navy fw-bold font-monospace border"><?= esc($t['code']) ?></span>
                            <span class="badge bg-<?= esc($t['badge_color']) ?>-subtle text-<?= esc($t['badge_color']) ?> fw-bold small">
                                <?= esc($t['clause']) ?>
                            </span>
                        </div>
                        <h6 class="fw-bold text-navy mb-2"><?= esc($t['title']) ?></h6>
                        <p class="small text-muted mb-3" style="min-height: 54px;"><?= esc($t['description']) ?></p>
                        
                        <div class="p-2 rounded bg-light border mb-3">
                            <div class="small fw-bold text-secondary mb-1">
                                <i class="fas fa-list-check me-1 text-sapphire"></i> Key Protocol Steps:
                            </div>
                            <pre class="small text-muted mb-0 font-monospace" style="white-space: pre-wrap; font-size: 0.72rem;"><?= esc($t['content_summary']) ?></pre>
                        </div>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-clock-rotate-left me-1"></i> <?= esc($t['updated_at']) ?>
                        </small>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?= $t['id'] ?>">
                                <i class="fas fa-eye me-1"></i> Preview
                            </button>
                            <a href="<?= site_url('hospital-admin/templates-vault/download/' . $t['id']) ?>" class="btn btn-sm btn-sapphire">
                                <i class="fas fa-download me-1"></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Preview Modal -->
                <div class="modal fade" id="viewModal<?= $t['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow">
                            <div class="modal-header bg-navy text-white py-3">
                                <h5 class="modal-title fw-bold">
                                    <i class="fas fa-file-contract text-warning me-2"></i> <?= esc($t['title']) ?>
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-light text-dark border">Code: <?= esc($t['code']) ?></span>
                                    <span class="badge bg-primary text-white">NABH Clause: <?= esc($t['clause']) ?></span>
                                    <span class="badge bg-secondary text-white"><?= esc($t['category_lbl']) ?></span>
                                </div>
                                <h6 class="fw-bold text-navy mb-2">Standard Protocol Overview</h6>
                                <p class="text-muted small"><?= esc($t['description']) ?></p>

                                <div class="p-3 bg-light rounded border mb-3">
                                    <h6 class="fw-bold text-navy mb-2">Full Procedural Text</h6>
                                    <pre class="small text-dark font-monospace mb-0" style="white-space: pre-wrap;"><?= esc($t['content_summary']) ?>

4. MONITORING & AUDIT:
   • Internal auditor performs unannounced audit monthly.
   • Root-cause analysis (Fishbone diagram) conducted for any standard deviation.
   • Corrective and Preventive Action (CAPA) must be logged and resolved within 14 calendar days.

5. REGULATORY ALIGNMENT:
   • Adheres to NABH 5th Edition Core & Commitment standards.
   • Compliant with State Clinical Establishment Acts and Statutory Authority norms.</pre>
                                </div>
                            </div>
                            <div class="modal-footer bg-light py-2">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <a href="<?= site_url('hospital-admin/templates-vault/download/' . $t['id']) ?>" class="btn btn-sapphire btn-sm">
                                    <i class="fas fa-download me-1"></i> Download Template (.txt)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
