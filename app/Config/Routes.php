<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Guidance & Accreditation Platform (International Standard)
$routes->get('/', 'HomeController::index');
$routes->get('standards', 'HomeController::standards');
$routes->get('sop-suite', 'HomeController::sopSuite');
$routes->get('documents-sop', 'HomeController::sopSuite');
$routes->get('hr-suite', 'HomeController::hrSuite');
$routes->get('hr-credentialing', 'HomeController::hrSuite');
$routes->get('equipment-grid', 'HomeController::equipmentGrid');
$routes->get('equipment-utilities', 'HomeController::equipmentGrid');
$routes->get('clinical-workflow', 'HomeController::clinicalWorkflow');
$routes->get('patient-workflow', 'HomeController::clinicalWorkflow');
$routes->get('dpdp-consent', 'HomeController::clinicalWorkflow');
$routes->get('quality-indicators', 'HomeController::qualityIndicators');
$routes->get('checklists', 'HomeController::checklists');
$routes->get('assessment-tool', 'HomeController::assessmentTool');
$routes->get('pricing', 'HomeController::pricing');
$routes->get('about', 'HomeController::about');
$routes->get('contact', 'HomeController::contact');
$routes->post('contact/submit', 'HomeController::submitContact');

// Legal & Gateway Pages
$routes->get('privacy-policy', 'HomeController::privacyPolicy');
$routes->get('terms-of-service', 'HomeController::termsOfService');
$routes->get('compliance-disclaimer', 'HomeController::complianceDisclaimer');
$routes->get('portal-gateway', 'HomeController::portalGateway');

// --- Isolated Authentication Suites ------------------------------------------
// 1. Executive Admin Authentication Suite (Tier-1 Super Admin & Hospital Admin)
$routes->get('admin/login', 'Auth\AdminAuthController::login');
$routes->post('admin/login', 'Auth\AdminAuthController::attemptLogin');
$routes->get('admin/register', 'Auth\AdminAuthController::register');
$routes->post('admin/register', 'Auth\AdminAuthController::attemptRegister');
$routes->get('admin/logout', 'Auth\AdminAuthController::logout');

// 2. Clinical & Departmental Staff Authentication Suite (Coordinators, Doctors, Nurses, Staff)
$routes->get('login', 'Auth\StaffAuthController::login');
$routes->post('login', 'Auth\StaffAuthController::attemptLogin');
$routes->get('register', 'Auth\StaffAuthController::register');
$routes->post('register', 'Auth\StaffAuthController::attemptRegister');
$routes->get('logout', 'Auth\StaffAuthController::logout');
$routes->get('api/departments-by-hospital/(:num)', 'Auth\StaffAuthController::getDepartments/$1');

// --- Post-login landing, redirects by role ----------------------------------
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'role']);

// --- Super Admin -------------------------------------------------------------
$routes->group('admin', ['filter' => 'admin_auth:super_admin'], static function ($routes) {
    $routes->get('/', 'Admin\HospitalController::index');
    $routes->post('hospitals', 'Admin\HospitalController::create');
    $routes->resource('hospitals', ['controller' => 'Admin\HospitalController']);
    $routes->resource('users', ['controller' => 'Admin\UserController']);
    $routes->resource('subscriptions', ['controller' => 'Admin\SubscriptionController']);
    $routes->get('audit-logs', 'Admin\AuditLogController::index');
    
    // SaaS Pricing Plans Management
    $routes->get('pricing', 'Admin\PricingController::index');
    $routes->post('pricing/create', 'Admin\PricingController::create');
    $routes->post('pricing/update/(:num)', 'Admin\PricingController::update/$1');
    $routes->post('pricing/delete/(:num)', 'Admin\PricingController::delete/$1');
    $routes->post('pricing/toggle-active/(:num)', 'Admin\PricingController::toggleActive/$1');

    // CMS Legal & Public Pages Management
    $routes->get('pages', 'Admin\PageController::index');
    $routes->get('pages/edit/(:segment)', 'Admin\PageController::edit/$1');
    $routes->post('pages/update/(:segment)', 'Admin\PageController::update/$1');

    // Global Site & Contact Settings
    $routes->get('settings', 'Admin\SettingController::index');
    $routes->post('settings/update', 'Admin\SettingController::update');
});

// --- Hospital Admin (Master 9-Point Diary Blueprint) --------------------------
$routes->group('hospital-admin', ['filter' => 'admin_auth:hospital_admin,super_admin'], static function ($routes) {
    // 1. Readiness Dashboard
    $routes->get('/', 'HospitalAdmin\DashboardController::index');

    // 2. Hospital Profile & Licences (Part A & Part B)
    $routes->get('profile', 'HospitalAdmin\ProfileController::index');
    $routes->post('profile/update', 'HospitalAdmin\ProfileController::updateProfile');
    $routes->post('profile/license/update', 'HospitalAdmin\ProfileController::updateLicense');

    // 3. NABH 10-Chapter Matrix
    $routes->get('chapter-matrix', 'HospitalAdmin\ChapterMatrixController::index');
    $routes->post('chapter-matrix/update-score', 'HospitalAdmin\ChapterMatrixController::updateScore');

    // 4. Consultant Review / Auto Audit Points
    $routes->get('consultant-audit', 'HospitalAdmin\ConsultantAuditController::index');
    $routes->post('consultant-audit/create', 'HospitalAdmin\ConsultantAuditController::create');

    // 5. Live Photo & Video Audit Evidence Library
    $routes->get('evidence-library', 'HospitalAdmin\EvidenceLibraryController::index');
    $routes->post('evidence-library/upload', 'HospitalAdmin\EvidenceLibraryController::upload');

    // 6. Document Export & NABH Portal Sync
    $routes->get('export-sync', 'HospitalAdmin\ExportSyncController::index');
    $routes->get('export-sync/download-manifest', 'HospitalAdmin\ExportSyncController::downloadManifest');

    // 7. Ready to Use Templates (Consultant Vault)
    $routes->get('templates-vault', 'HospitalAdmin\TemplatesVaultController::index');
    $routes->get('templates-vault/download/(:num)', 'HospitalAdmin\TemplatesVaultController::download/$1');

    // 8. Government Schemes Support (Cashless & Ayush)
    $routes->get('government-schemes', 'HospitalAdmin\GovernmentSchemesController::index');

    // 9. Settings & Access Control (RBAC)
    $routes->get('access-control', 'HospitalAdmin\AccessControlController::index');
    $routes->post('access-control/create-user', 'HospitalAdmin\AccessControlController::createUser');

    // Ancillary management panels
    $routes->get('departments', 'HospitalAdmin\DepartmentController::index');
    $routes->get('approvals', 'HospitalAdmin\ApprovalController::index');
    $routes->get('reports', 'HospitalAdmin\ReportController::index');
});

// --- NABH Coordinator & Departmental Panels ---------------------------------
$routes->group(
    'document',
    ['filter' => ['role:nabh_coordinator,dept_user,hospital_admin', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'Document\DocumentController::index');
        $routes->post('create', 'Document\DocumentController::create');
        $routes->post('close-capa/(:num)', 'Document\DocumentController::closeCapa/$1');
        $routes->get('export', 'Document\DocumentController::export');
    }
);

$routes->group(
    'hr',
    ['filter' => ['role:nabh_coordinator,dept_user,hospital_admin', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'HR\StaffController::index');
        $routes->post('create', 'HR\StaffController::create');
        $routes->post('create-training', 'HR\StaffController::createTraining');
        $routes->post('update-health', 'HR\StaffController::updateHealthRecord');
        $routes->post('update-privileging', 'HR\StaffController::updatePrivileging');
        $routes->post('run-expiry-check', 'HR\StaffController::triggerExpiryCheck');
    }
);

$routes->group(
    'equipment',
    ['filter' => ['role:nabh_coordinator,dept_user,hospital_admin,super_admin', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'Equipment\EquipmentController::index');
        $routes->post('create', 'Equipment\EquipmentController::create');
        $routes->post('create-defect', 'Equipment\EquipmentController::createDefect');
        $routes->post('update-defect-status', 'Equipment\EquipmentController::updateDefectStatus');
        $routes->post('update-status', 'Equipment\EquipmentController::updateStatus');
        $routes->post('record-ppm', 'Equipment\EquipmentController::recordPpm');
        $routes->post('request-condemnation', 'Equipment\EquipmentController::requestCondemnation');
        $routes->post('review-condemnation', 'Equipment\EquipmentController::reviewCondemnation');
    }
);

// --- Phase 3: Digital Clinical Workflow & DPDP Consent Management -------------
$routes->group(
    'clinical',
    ['filter' => ['role:nabh_coordinator,dept_user,hospital_admin,super_admin', 'deptscope']],
    static function ($routes) {
        $routes->get('/', 'Clinical\ClinicalWorkflowController::index');
        $routes->post('register-patient', 'Clinical\ClinicalWorkflowController::registerPatient');
        $routes->post('link-abha', 'Clinical\ClinicalWorkflowController::linkAbha');
        $routes->post('grant-consent', 'Clinical\ClinicalWorkflowController::grantConsent');
        $routes->post('revoke-consent', 'Clinical\ClinicalWorkflowController::revokeConsent');
        $routes->post('update-step', 'Clinical\ClinicalWorkflowController::updateStep');
        $routes->post('update-status', 'Clinical\ClinicalWorkflowController::updateAdmissionStatus');
    }
);
