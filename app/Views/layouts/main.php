<?php
$user = current_user();
$nav  = [];

if (has_role('super_admin')) {
    $nav = [
        ['label' => 'Overview',      'url' => '/admin'],
        ['label' => 'Hospitals',     'url' => '/admin/hospitals'],
        ['label' => 'Users',         'url' => '/admin/users'],
        ['label' => 'Subscriptions', 'url' => '/admin/subscriptions'],
        ['label' => 'Audit Log',     'url' => '/admin/audit-logs'],
    ];
} elseif (has_role('hospital_admin')) {
    $nav = [
        ['label' => 'Overview',     'url' => '/hospital-admin'],
        ['label' => 'Departments',  'url' => '/hospital-admin/departments'],
        ['label' => 'Approvals',    'url' => '/hospital-admin/approvals'],
        ['label' => 'Reports',      'url' => '/hospital-admin/reports'],
    ];
} else {
    // nabh_coordinator and dept_user share the three operational panels;
    // dept_user's queries are narrowed to their department by the model
    // layer (scope_to_department()), not by hiding nav items.
    $nav = [
        ['label' => 'Documents',                'url' => '/document'],
        ['label' => 'HR',                       'url' => '/hr'],
        ['label' => 'Equipment & Infrastructure', 'url' => '/equipment'],
    ];
}

$currentPath = trim(current_url(true)->getPath(), '/');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Dashboard') ?> — Hospital Quality Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Placeholder styling only — replace with the project theme (Phase 2). -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f5; }
        .sidebar { min-height: 100vh; background: #17221d; color: #dbe3de; width: 230px; }
        .sidebar a { color: #c3cec8; text-decoration: none; display: block; padding: 10px 18px; font-size: .92rem; }
        .sidebar a.active, .sidebar a:hover { background: #0f5c56; color: #fff; }
        .brand { color: #fff; font-weight: 600; padding: 18px; font-size: .95rem; border-bottom: 1px solid #2c3a2f; }
        .topbar { border-bottom: 1px solid #dbe3de; background: #fff; }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar flex-shrink-0">
        <div class="brand">Hospital Quality<br>Management</div>
        <?php foreach ($nav as $item) :
            $itemPath = trim($item['url'], '/'); ?>
            <a href="<?= site_url($item['url']) ?>" class="<?= $currentPath === $itemPath ? 'active' : '' ?>">
                <?= esc($item['label']) ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="flex-grow-1">
        <div class="topbar d-flex justify-content-between align-items-center px-4 py-2">
            <span class="text-muted small"><?= esc($title ?? '') ?></span>
            <div class="d-flex align-items-center gap-3">
                <span class="small">
                    <?= esc($user['name'] ?? '') ?>
                    <span class="text-muted">· <?= esc($user['role_name'] ?? '') ?></span>
                </span>
                <a href="<?= site_url('logout') ?>" class="btn btn-sm btn-outline-secondary">Sign out</a>
            </div>
        </div>

        <div class="p-4">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success py-2"><?= esc(session()->getFlashdata('message')) ?></div>
            <?php endif; ?>
            <?= $body ?? '' ?>
        </div>
    </div>
</div>
</body>
</html>
