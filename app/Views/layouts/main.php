<?php
$user = current_user();
$nav  = [];

if (has_role('super_admin')) {
    $nav = [
        ['label' => 'Executive Overview',   'url' => '/admin',               'icon' => 'fas fa-gauge-high'],
        ['label' => 'Hospitals / Branches', 'url' => '/admin/hospitals',     'icon' => 'fas fa-hospital-alt'],
        ['label' => 'User Management & RBAC', 'url' => '/admin/users',       'icon' => 'fas fa-users-gear'],
        ['label' => 'Hospital Subscriptions', 'url' => '/admin/subscriptions', 'icon' => 'fas fa-id-card-clip'],
        ['label' => 'Legal & Public Pages (CMS)', 'url' => '/admin/pages',    'icon' => 'fas fa-file-shield'],
        ['label' => 'Site & Contact Settings', 'url' => '/admin/settings',   'icon' => 'fas fa-sliders'],
        ['label' => 'System Audit Trail',   'url' => '/admin/audit-logs',    'icon' => 'fas fa-shield-halved'],
    ];
} elseif (has_role('hospital_admin')) {
    $nav = [
        ['label' => 'Readiness Dashboard',   'url' => '/hospital-admin',             'icon' => 'fas fa-chart-pie'],
        ['label' => 'Hospital Departments',  'url' => '/hospital-admin/departments', 'icon' => 'fas fa-sitemap'],
        ['label' => 'Approval Queue',        'url' => '/hospital-admin/approvals',   'icon' => 'fas fa-signature'],
        ['label' => 'Executive Reports',     'url' => '/hospital-admin/reports',     'icon' => 'fas fa-file-waveform'],
        ['label' => 'Document Suite',        'url' => '/document',                   'icon' => 'fas fa-file-signature'],
        ['label' => 'HR & Credentialing',    'url' => '/hr',                         'icon' => 'fas fa-user-doctor'],
        ['label' => 'Equipment & Utilities', 'url' => '/equipment',                  'icon' => 'fas fa-microscope'],
    ];
} else {
    // nabh_coordinator and dept_user
    $nav = [
        ['label' => '📄 Document Panel',                'url' => '/document',  'icon' => 'fas fa-file-signature'],
        ['label' => '👥 HR & Credentialing',            'url' => '/hr',        'icon' => 'fas fa-user-doctor'],
        ['label' => '🏥 Equipment & Infrastructure',    'url' => '/equipment', 'icon' => 'fas fa-hospital-symbol'],
    ];
}

$currentPath = trim(current_url(true)->getPath(), '/');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Quality Management') ?> — Hospital Quality Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <!-- Chart.js for analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Theme CSS -->
    <link href="<?= base_url('assets/css/premium-theme.css') ?>" rel="stylesheet">
</head>
<body>

<div class="portal-wrapper">
    <!-- Sidebar -->
    <aside class="portal-sidebar" id="portalSidebar">
        <div class="sidebar-brand d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <div class="brand-logo">
                    <i class="fas fa-hospital-user"></i>
                </div>
                <div>
                    <h5 class="mb-0 text-white fw-bold" style="font-size: 1.05rem;">QualiHospital</h5>
                    <span class="text-light opacity-75" style="font-size: 0.72rem; letter-spacing: 0.05em; font-weight: 600;">NABH COMPLIANCE</span>
                </div>
            </div>
            <button class="btn btn-link text-white text-decoration-none p-1 d-lg-none" type="button" onclick="toggleSidebar()" aria-label="Close Sidebar">
                <i class="fas fa-xmark fs-5"></i>
            </button>
        </div>

        <div class="sidebar-nav">
            <div class="nav-section-title">Navigation Hub</div>
            <?php foreach ($nav as $item) :
                $itemPath = trim($item['url'], '/');
                $isActive = (strpos($currentPath, $itemPath) !== false && $itemPath !== '') || ($currentPath === '' && $itemPath === 'admin');
            ?>
                <a href="<?= site_url($item['url']) ?>" class="nav-item-link <?= $isActive ? 'active' : '' ?>">
                    <i class="<?= esc($item['icon'] ?? 'fas fa-circle') ?>"></i>
                    <span><?= esc($item['label']) ?></span>
                </a>
            <?php endforeach; ?>

            <div class="nav-section-title mt-4">Guidance & Tools</div>
            <a href="<?= site_url('standards') ?>" target="_blank" class="nav-item-link">
                <i class="fas fa-book-medical"></i>
                <span>NABH 5th Standards</span>
            </a>
            <a href="<?= site_url('quality-indicators') ?>" target="_blank" class="nav-item-link">
                <i class="fas fa-chart-line"></i>
                <span>KPI Calculator</span>
            </a>
            <a href="<?= site_url('/') ?>" target="_blank" class="nav-item-link">
                <i class="fas fa-globe"></i>
                <span>Public Guidance Web</span>
            </a>
        </div>

        <!-- Sidebar footer profile -->
        <div class="p-3 border-top border-white border-opacity-10 mt-auto">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2 overflow-hidden">
                    <div class="rounded-circle bg-gold-soft text-navy d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0;">
                        <?= strtoupper(substr($user['name'] ?? 'U', 0, 1)) ?>
                    </div>
                    <div class="overflow-hidden">
                        <span class="text-white small fw-bold d-block text-truncate" style="font-size: 0.82rem;"><?= esc($user['name'] ?? 'User') ?></span>
                        <span class="text-gold d-block text-truncate" style="font-size: 0.72rem; font-weight: 600;"><?= esc($user['role_name'] ?? 'Staff') ?></span>
                    </div>
                </div>
                <a href="<?= site_url('logout') ?>" class="text-light opacity-75 hover-opacity-100 ms-2" title="Sign Out">
                    <i class="fas fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow-1 d-flex flex-column" style="min-width: 0;">
        <!-- Topbar -->
        <header class="portal-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary d-lg-none" type="button" onclick="toggleSidebar()" aria-label="Toggle Navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h1 class="h5 mb-0 fw-bold text-navy"><?= esc($title ?? 'Dashboard') ?></h1>
                    <span class="small text-muted">
                        <i class="fas fa-hospital text-sapphire me-1"></i> Max Care Superspeciality Hospital 
                        <span class="badge badge-max badge-max-emerald ms-2">NABH 5th Ed. Track</span>
                    </span>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn btn-sm btn-light border position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell text-muted"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            3
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-md p-2" style="width: 300px;">
                        <li class="dropdown-header fw-bold text-navy">Critical Quality Alerts</li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item small py-2 text-wrap" href="<?= site_url('document') ?>">
                                <i class="fas fa-clock text-warning me-1"></i> <strong>HIC Manual</strong> review due in 25 days.
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item small py-2 text-wrap" href="<?= site_url('equipment') ?>">
                                <i class="fas fa-wrench text-danger me-1"></i> <strong>Ventilator V300</strong> calibration due in 20 days.
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item small py-2 text-wrap" href="<?= site_url('hr') ?>">
                                <i class="fas fa-user-clock text-primary me-1"></i> <strong>Doctor Council Reg</strong> renewal due in 15 days.
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="vr d-none d-sm-block"></div>

                <a href="<?= site_url('logout') ?>" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </header>

        <!-- Dynamic Body -->
        <main class="portal-content">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success d-flex align-items-center gap-2 py-3 mb-4 shadow-sm">
                    <i class="fas fa-circle-check fs-5"></i>
                    <div><?= esc(session()->getFlashdata('message')) ?></div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger d-flex align-items-center gap-2 py-3 mb-4 shadow-sm">
                    <i class="fas fa-circle-exclamation fs-5"></i>
                    <div><?= esc(session()->getFlashdata('error')) ?></div>
                </div>
            <?php endif; ?>

            <?= $body ?? '' ?>
        </main>
    </div>
</div>

<!-- Mobile Sidebar Backdrop -->
<div class="portal-backdrop d-lg-none" id="portalBackdrop" onclick="toggleSidebar()"></div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/quality-tools.js') ?>"></script>
<script>
function toggleSidebar() {
    var sidebar = document.getElementById('portalSidebar');
    var backdrop = document.getElementById('portalBackdrop');
    if (sidebar) sidebar.classList.toggle('show');
    if (backdrop) backdrop.classList.toggle('show');
}
</script>
</body>
</html>
