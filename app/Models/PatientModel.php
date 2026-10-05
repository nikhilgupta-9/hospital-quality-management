<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table            = 'patients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'department_id', 'uhid', 'first_name', 'last_name',
        'gender', 'dob', 'age', 'mobile', 'emergency_contact', 'blood_group',
        'address', 'abha_number', 'abha_address', 'abha_status',
        'admission_status', 'bed_number', 'attending_doctor',
        'admission_date', 'discharge_date',
    ];

    protected $validationRules = [
        'hospital_id' => 'required|is_natural_no_zero',
        'first_name'  => 'required|min_length[2]|max_length[100]',
        'last_name'   => 'required|min_length[1]|max_length[100]',
        'mobile'      => 'required|min_length[10]|max_length[15]',
    ];

    /**
     * Generate unique standard UHID: UHID-HQM-YYYY-XXXXX
     */
    public function generateUhid(int $hospitalId = 1): string
    {
        $year = date('Y');
        $count = $this->where('hospital_id', $hospitalId)->countAllResults();
        $next = $count + 101;
        return 'UHID-HQM-' . $year . '-' . str_pad($next, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Get patients with department names and DPDP consent summaries
     */
    public function getPatientsWithConsents(int $hospitalId, ?int $deptId = null, ?string $status = null): array
    {
        $builder = $this->select('patients.*, departments.name AS department_name')
            ->join('departments', 'departments.id = patients.department_id', 'left')
            ->where('patients.hospital_id', $hospitalId);

        if ($deptId !== null) {
            $builder->where('patients.department_id', $deptId);
        }

        if ($status !== null && $status !== 'all') {
            $builder->where('patients.admission_status', $status);
        }

        $patients = $builder->orderBy('patients.id', 'DESC')->findAll();

        $consentModel = new DpdpConsentModel();
        foreach ($patients as &$pt) {
            $pt['consents'] = $consentModel->getForPatient($pt['id']);
            $pt['active_consents_count'] = count(array_filter($pt['consents'], fn($c) => $c['status'] === 'granted'));
            $pt['total_consents_count']  = count($pt['consents']);
        }

        return $patients;
    }

    /**
     * Get clinical workflow summary metrics
     */
    public function getClinicalMetrics(int $hospitalId): array
    {
        $all = $this->where('hospital_id', $hospitalId)->findAll();
        $total = count($all);
        $abhaLinked = 0;
        $inpatientCount = 0;
        $icuCount = 0;
        $prePostOpCount = 0;

        foreach ($all as $p) {
            if ($p['abha_status'] === 'verified') {
                $abhaLinked++;
            }
            if (in_array($p['admission_status'], ['admitted_ward', 'admitted_icu', 'pre_op', 'post_op'], true)) {
                $inpatientCount++;
            }
            if ($p['admission_status'] === 'admitted_icu') {
                $icuCount++;
            }
            if (in_array($p['admission_status'], ['pre_op', 'post_op'], true)) {
                $prePostOpCount++;
            }
        }

        $consentModel = new DpdpConsentModel();
        $allConsents = $consentModel->where('hospital_id', $hospitalId)->findAll();
        $grantedConsents = count(array_filter($allConsents, fn($c) => $c['status'] === 'granted'));

        return [
            'total_registered_patients' => $total,
            'active_inpatients'          => $inpatientCount,
            'icu_patients'               => $icuCount,
            'surgical_cases'             => $prePostOpCount,
            'abha_linked_count'          => $abhaLinked,
            'abha_compliance_pct'        => $total > 0 ? round(($abhaLinked / $total) * 100, 1) : 0,
            'total_dpdp_consents'        => count($allConsents),
            'granted_consents'           => $grantedConsents,
            'dpdp_compliance_pct'        => count($allConsents) > 0 ? round(($grantedConsents / count($allConsents)) * 100, 1) : 100,
        ];
    }
}
