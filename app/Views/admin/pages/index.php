<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-navy mb-1" style="font-family: var(--font-heading);">
            <i class="fas fa-file-shield text-primary me-2"></i> Legal &amp; Public Pages (CMS)
        </h4>
        <p class="text-muted small mb-0">Manage and customize your hospital quality platform's public legal policies, regulatory disclaimers, and portal gateways.</p>
    </div>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        <i class="fas fa-circle-check me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
        <i class="fas fa-circle-exclamation me-2"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4" style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Page Title</th>
                    <th style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Route / URL Slug</th>
                    <th style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Last Updated</th>
                    <th style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Status</th>
                    <th class="text-end pe-4" style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pages)) : ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No pages found in system.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($pages as $p) : ?>
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-navy"><?= esc($p['title']) ?></div>
                                <div class="text-muted small text-truncate" style="max-width: 320px;"><?= esc($p['subtitle'] ?? 'Public document') ?></div>
                            </td>
                            <td>
                                <code class="bg-light px-2 py-1 rounded text-primary fw-bold">/<?= esc($p['slug']) ?></code>
                            </td>
                            <td class="small text-muted">
                                <i class="fas fa-calendar-days text-secondary me-1"></i>
                                <?= !empty($p['updated_at']) ? date('M j, Y h:i A', strtotime($p['updated_at'])) : date('M j, Y') ?>
                            </td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1 rounded-pill">
                                    <i class="fas fa-circle-check me-1"></i> Published
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= site_url($p['slug']) ?>" target="_blank" class="btn btn-outline-secondary" title="View Public Page">
                                        <i class="fas fa-eye me-1"></i> View
                                    </a>
                                    <a href="<?= site_url('admin/pages/edit/' . $p['slug']) ?>" class="btn btn-primary" title="Edit Content">
                                        <i class="fas fa-pen-to-square me-1"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
