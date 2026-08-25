<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AuditLogController extends BaseController
{
    public function index()
    {
        $logs = $this->db()->table('audit_logs')
            ->orderBy('created_at', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();

        return $this->renderWithLayout('placeholder', [
            'heading' => 'System Audit Trail',
            'message' => count($logs) . ' log entries recorded so far. The full searchable table view lands in the next build phase.',
        ], 'Audit Log');
    }

    private function db()
    {
        return \Config\Database::connect();
    }
}
