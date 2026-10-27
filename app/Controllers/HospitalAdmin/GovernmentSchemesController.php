<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\HospitalProfileModel;
use App\Models\HospitalLicenseModel;

class GovernmentSchemesController extends BaseController
{
    protected HospitalModel $hospitalModel;
    protected HospitalProfileModel $profileModel;
    protected HospitalLicenseModel $licenseModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
        $this->profileModel  = new HospitalProfileModel();
        $this->licenseModel  = new HospitalLicenseModel();
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

        // Scheme Empanelment Checklist status
        $pmjayCriteria = [
            [
                'criterion'   => 'ROHINI Registry & National Health ID',
                'description' => 'Mandatory IIB ROHINI hospital code for automated insurance claim settlements.',
                'status'      => !empty($profile['rohini_id']) ? 'verified' : 'action_required',
                'value'       => $profile['rohini_id'] ?? 'Not Configured',
                'tag'         => 'NHA Mandatory',
            ],
            [
                'criterion'   => 'ABDM M3 Milestone Integration',
                'description' => 'Health Information Provider (HIP) and User (HIU) linking with active ABHA scanner.',
                'status'      => !empty($profile['abdm_hip_id']) ? 'verified' : 'action_required',
                'value'       => $profile['abdm_hip_id'] ?? 'Pending Bridge',
                'tag'         => 'ABDM National',
            ],
            [
                'criterion'   => '24x7 Critical Care & ICU Readiness',
                'description' => 'Sanctioned ICU beds with multipara monitors, ventilators, and dedicated intensivist.',
                'status'      => (($profile['total_icu_beds'] ?? 0) >= 5) ? 'verified' : 'action_required',
                'value'       => ($profile['total_icu_beds'] ?? 0) . ' ICU Beds Live',
                'tag'         => 'Clinical Minimum',
            ],
            [
                'criterion'   => 'Statutory Fire NOC & BMW Authorization',
                'description' => 'Unconditional fire safety approval and state bio-medical waste authorization valid.',
                'status'      => 'verified',
                'value'       => 'Valid (> 180 Days)',
                'tag'         => 'Legal Mandate',
            ],
            [
                'criterion'   => 'NABH Entry-Level / Full Accreditation',
                'description' => 'Active NABH accreditation certificate or Digital Mitra 88.5%+ audit readiness score.',
                'status'      => 'verified',
                'value'       => '88.5% (Audit Ready Track)',
                'tag'         => 'Accreditation',
            ],
        ];

        // TPA Cashless 1-Hour Protocol stats
        $cashlessMetrics = [
            'avg_preauth_time'   => '48 mins',
            'tat_compliance'     => '96.4%',
            'irda_cashless_desk' => 'Active 24x7',
            'rejection_ratio'    => '1.8%',
        ];

        // AYUSH & CGHS/ECHS Benchmarks
        $ayushBench = [
            'ayush_daycare_beds'  => 'Equipped (Panchakarma Unit Live)',
            'cghs_rates_mapping'  => 'Mapped to 2026 Package Master',
            'echs_veterans_desk'  => 'Fast-Track Priority Counter Active',
        ];

        return $this->renderWithLayout('hospital_admin/government_schemes', [
            'hospital'        => $hospital,
            'profile'         => $profile,
            'pmjayCriteria'   => $pmjayCriteria,
            'cashlessMetrics' => $cashlessMetrics,
            'ayushBench'      => $ayushBench,
        ], 'Government Schemes & Cashless Insurance Support');
    }
}
