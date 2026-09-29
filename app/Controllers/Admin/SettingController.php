<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\AuditLogModel;

class SettingController extends BaseController
{
    protected SettingModel $settingModel;
    protected AuditLogModel $auditLogModel;

    public function __construct()
    {
        $this->settingModel  = new SettingModel();
        $this->auditLogModel = new AuditLogModel();
    }

    /**
     * Show site-wide & contact settings form
     */
    public function index(): string
    {
        $settings = $this->settingModel->findAll();
        $settingsMap = [];
        foreach ($settings as $s) {
            $settingsMap[$s['setting_key']] = $s['setting_value'];
        }

        return $this->renderWithLayout('admin/settings/index', [
            'settings' => $settingsMap,
        ], 'Site & Contact Settings');
    }

    /**
     * Save updated settings
     */
    public function update()
    {
        $postData = $this->request->getPost();
        unset($postData['csrf_test_name'], $postData['_method']);

        $oldSettings = $this->settingModel->getAllAsMap();

        foreach ($postData as $key => $val) {
            $this->settingModel->setVal($key, trim($val));
        }

        // Record audit trail safely
        try {
            $userId = session()->get('user_id');
            $hospitalId = session()->get('hospital_id');
            $this->auditLogModel->log(
                'UPDATE_SITE_SETTINGS',
                'ADMIN',
                $hospitalId,
                $userId,
                'site_settings',
                1,
                $oldSettings,
                $postData
            );
        } catch (\Throwable $e) {
            log_message('error', 'Audit log error: ' . $e->getMessage());
        }

        return redirect()->to('/admin/settings')->with('success', 'Site & Contact settings updated successfully. All public website pages and banners are updated in real-time!');
    }
}
