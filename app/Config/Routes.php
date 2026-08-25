<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Root — decides where to send the visitor without exposing a public homepage.
$routes->get('/', 'Auth\LoginController::show');

// --- Auth ------------------------------------------------------------------
$routes->get('login', 'Auth\LoginController::show');
$routes->post('login', 'Auth\LoginController::attempt');
$routes->get('logout', 'Auth\LoginController::logout');

// --- Post-login landing, redirects by role ----------------------------------
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'role']);

// --- Super Admin -------------------------------------------------------------
$routes->group('admin', ['filter' => 'role:super_admin'], static function ($routes) {
    $routes->get('/', 'Admin\HospitalController::index'); // overview lands on hospitals for now
    $routes->resource('hospitals', ['controller' => 'Admin\HospitalController']);
    $routes->resource('users', ['controller' => 'Admin\UserController']);
    $routes->resource('subscriptions', ['controller' => 'Admin\SubscriptionController']);
    $routes->get('audit-logs', 'Admin\AuditLogController::index');
});

// --- Hospital Admin ------------------------------------------------------------
$routes->group('hospital-admin', ['filter' => 'role:hospital_admin'], static function ($routes) {
    $routes->get('/', 'HospitalAdmin\DashboardController::index');
    $routes->get('departments', 'HospitalAdmin\DepartmentController::index');
    $routes->get('approvals', 'HospitalAdmin\ApprovalController::index');
    $routes->get('reports', 'HospitalAdmin\ReportController::index');
});

// --- NABH Coordinator panels (nabh_coordinator sees everything hospital-wide;
//     dept_user is narrowed to their own department at the model layer —
//     see app/Helpers/auth_helper.php) --------------------------------------
$routes->group(
    'document',
    ['filter' => ['role:nabh_coordinator,dept_user', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'Document\DocumentController::index');
    }
);

$routes->group(
    'hr',
    ['filter' => ['role:nabh_coordinator,dept_user', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'HR\StaffController::index');
    }
);

$routes->group(
    'equipment',
    ['filter' => ['role:nabh_coordinator,dept_user', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'Equipment\EquipmentController::index');
    }
);
