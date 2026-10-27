<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\ConsultantAuditModel;

class ConsultantAuditController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected ConsultantAuditModel $auditModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->auditModel    = new ConsultantAuditModel();
    }

    protected function getActiveHospitalId(): int
    {
        $sessionHospitalId = (int) session()->get('hospital_id');
        if ($sessionHospitalId > 0) {
            return $sessionHospitalId;
        }

        $requestedId = (int) $this->request->getGet('hospital_id');
        if ($requestedId > 0 && has_role('super_admin')) {
            return $requestedId;
        }

        $firstHospital = $this->hospitalModel->first();
        return $firstHospital ? (int) $firstHospital['id'] : 1;
    }

    public function index()
    {
        $hospitalId = $this->getActiveHospitalId();
        $hospital   = $this->hospitalModel->find($hospitalId);
        $audits     = $this->auditModel->getAuditsForHospital($hospitalId);

        return $this->renderWithLayout('hospital_admin/consultant_audit', [
            'hospital' => $hospital,
            'audits'   => $audits,
        ], 'Consultant Review & Auto Audit Points');
    }

    public function create()
    {
        $hospitalId = $this->getActiveHospitalId();

        $rules = [
            'audit_title'       => 'required|min_length[3]|max_length[191]',
            'audit_type'        => 'required',
            'lead_auditor_name' => 'required',
            'audit_date'        => 'required|valid_date',
            'overall_score'     => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(site_url('hospital-admin/consultant-audit'))
                             ->withInput()
                             ->with('error', 'Please verify audit form inputs.');
        }

        $this->auditModel->insert([
            'hospital_id'       => $hospitalId,
            'audit_title'       => trim($this->request->getPost('audit_title')),
            'audit_type'        => trim($this->request->getPost('audit_type')),
            'lead_auditor_name' => trim($this->request->getPost('lead_auditor_name')),
            'audit_date'        => $this->request->getPost('audit_date'),
            'major_nc_count'    => (int) $this->request->getPost('major_nc_count'),
            'minor_nc_count'    => (int) $this->request->getPost('minor_nc_count'),
            'ofi_count'         => (int) $this->request->getPost('ofi_count'),
            'overall_score'     => (float) $this->request->getPost('overall_score'),
            'status'            => trim($this->request->getPost('status') ?? 'completed'),
            'summary_notes'     => trim($this->request->getPost('summary_notes') ?? ''),
        ]);

        return redirect()->to(site_url('hospital-admin/consultant-audit'))
                         ->with('message', 'New Consultant Mock Audit & NC Action Plan logged successfully.');
    }
}
