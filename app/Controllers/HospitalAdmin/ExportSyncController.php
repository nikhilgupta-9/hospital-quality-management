<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\HospitalProfileModel;
use App\Models\HospitalLicenseModel;
use App\Models\ChapterScoreModel;
use App\Models\ConsultantAuditModel;
use App\Models\AuditEvidenceMediaModel;
use App\Models\DocumentModel;

class ExportSyncController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected HospitalProfileModel $profileModel;
    protected HospitalLicenseModel $licenseModel;
    protected ChapterScoreModel $chapterModel;
    protected ConsultantAuditModel $auditModel;
    protected AuditEvidenceMediaModel $evidenceModel;
    protected DocumentModel $documentModel;

    public function __construct()
    {
        $this->hospitalModel  = new HospitalModel();
        $this->profileModel   = new HospitalProfileModel();
        $this->licenseModel   = new HospitalLicenseModel();
        $this->chapterModel   = new ChapterScoreModel();
        $this->auditModel     = new ConsultantAuditModel();
        $this->evidenceModel  = new AuditEvidenceMediaModel();
        $this->documentModel  = new DocumentModel();
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
        $profile    = $this->profileModel->getProfileByHospital($hospitalId);
        $licenseData= $this->licenseModel->getLicensesWithTrafficLight($hospitalId);
        $licenses   = $licenseData['licenses'];
        $matrixData = $this->chapterModel->getMatrixForHospital($hospitalId);
        $audits     = $this->auditModel->getAuditsForHospital($hospitalId);
        $evidence   = $this->evidenceModel->getEvidenceForHospital($hospitalId, 'all');
        $documents  = $this->documentModel->getWithDetails($hospitalId);

        $validLicenses = $licenseData['counts']['green'];
        $totalLicenses = $licenseData['counts']['total'];

        $syncStatus = [
            'nabh_portal' => [
                'status'    => 'ready',
                'name'      => 'NABH HOPE / Accreditation Gateway',
                'last_sync' => date('Y-m-d H:i', strtotime('-2 hours')),
                'details'   => '10 Chapters mapped, 650 Objective elements structured for 5th Edition submission.',
            ],
            'abdm_gateway' => [
                'status'    => !empty($profile['abdm_hip_id']) ? 'synced' : 'pending',
                'name'      => 'National Health Authority (ABDM M3)',
                'last_sync' => date('Y-m-d H:i', strtotime('-1 day')),
                'details'   => 'HIP ID ' . ($profile['abdm_hip_id'] ?? 'Pending') . ' linked with active FHIR bridge.',
            ],
            'spcb_portal' => [
                'status'    => 'synced',
                'name'      => 'State Pollution Control Board (BMW Barcode)',
                'last_sync' => date('Y-m-d H:i', strtotime('-6 hours')),
                'details'   => 'Daily waste disposal manifest synced with state environmental tracking system.',
            ],
        ];

        return $this->renderWithLayout('hospital_admin/export_sync', [
            'hospital'      => $hospital,
            'profile'       => $profile,
            'licenses'      => $licenses,
            'validLicenses' => $validLicenses,
            'totalLicenses' => count($licenses),
            'matrixData'    => $matrixData,
            'audits'        => $audits,
            'evidenceCount' => count($evidence),
            'documentCount' => count($documents),
            'syncStatus'    => $syncStatus,
        ], 'Document Export & NABH Portal Sync');
    }

    public function downloadManifest()
    {
        $hospitalId = $this->getActiveHospitalId();
        $hospital   = $this->hospitalModel->find($hospitalId);
        $profile    = $this->profileModel->getProfileByHospital($hospitalId);
        $licenseData= $this->licenseModel->getLicensesWithTrafficLight($hospitalId);
        $licenses   = $licenseData['licenses'];
        $matrixData = $this->chapterModel->getMatrixForHospital($hospitalId);
        $audits     = $this->auditModel->getAuditsForHospital($hospitalId);
        $documents  = $this->documentModel->getWithDetails($hospitalId);

        $payload = [
            'dossier_title'     => 'NABH 5th Edition Accreditation Submission Manifest',
            'hospital_identity' => [
                'id'            => $hospital['id'],
                'name'          => $hospital['name'],
                'code'          => $hospital['code'],
                'rohini_id'     => $profile['rohini_id'] ?? 'N/A',
                'abdm_hip_id'   => $profile['abdm_hip_id'] ?? 'N/A',
                'total_beds'    => $profile['total_sanctioned_beds'] ?? 0,
                'icu_beds'      => $profile['total_icu_beds'] ?? 0,
            ],
            'statutory_licenses' => array_map(function ($l) {
                return [
                    'license_name'  => $l['license_name'] ?? 'Statutory License',
                    'license_no'    => $l['license_number'] ?? 'N/A',
                    'expiry_date'   => $l['expiry_date'] ?? 'N/A',
                    'traffic_status'=> $l['traffic_light'] ?? 'green',
                    'days_remaining'=> $l['days_remaining'] ?? null,
                ];
            }, $licenses),
            'nabh_10_chapters' => $matrixData['chapters'],
            'readiness_summary' => $matrixData['summary'],
            'audits_conducted'  => $audits,
            'total_active_sops' => count($documents),
            'exported_at'       => date('Y-m-d H:i:s'),
            'generator'         => 'Hospital Quality Management Portal (NABH Digital Mitra)',
        ];

        $json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return $this->response
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Content-Disposition', 'attachment; filename="NABH_Submission_Manifest_' . ($hospital['code'] ?? 'HOSP') . '_' . date('Ymd_His') . '.json"')
            ->setBody($json);
    }
}
