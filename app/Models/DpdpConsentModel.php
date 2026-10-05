<?php

namespace App\Models;

use CodeIgniter\Model;

class DpdpConsentModel extends Model
{
    protected $table            = 'dpdp_consents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'patient_id', 'consent_type', 'consent_title',
        'purpose_description', 'data_fiduciary', 'signatory_type',
        'signatory_name', 'status', 'granted_at', 'revoked_at',
        'expiry_date', 'digital_signature_hash', 'verification_otp',
        'ip_address', 'language', 'witness_name',
    ];

    protected $validationRules = [
        'hospital_id'    => 'required|is_natural_no_zero',
        'patient_id'     => 'required|is_natural_no_zero',
        'consent_title'  => 'required|min_length[3]|max_length[191]',
        'signatory_name' => 'required|min_length[2]|max_length[191]',
    ];

    /**
     * Get all consents for a patient
     */
    public function getForPatient(int $patientId): array
    {
        return $this->where('patient_id', $patientId)
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    /**
     * Seed initial standard consents upon patient admission
     */
    public function createDefaultConsentsForPatient(int $hospitalId, int $patientId, string $patientName): void
    {
        $defaults = [
            [
                'hospital_id'            => $hospitalId,
                'patient_id'             => $patientId,
                'consent_type'           => 'general_admission',
                'consent_title'          => 'General Inpatient Admission & Clinical Care Consent',
                'purpose_description'    => 'Authorization for routine nursing care, diagnostic monitoring, intravenous line placements, and physician examinations under NABH standards.',
                'data_fiduciary'         => 'Hospital Quality Management / Clinical Data Fiduciary',
                'signatory_type'         => 'patient',
                'signatory_name'         => $patientName,
                'status'                 => 'granted',
                'granted_at'             => date('Y-m-d H:i:s'),
                'expiry_date'            => date('Y-m-d', strtotime('+30 days')),
                'digital_signature_hash' => 'SIG-SHA256-' . strtoupper(bin2hex(random_bytes(8))),
                'verification_otp'       => '8821',
                'ip_address'             => '127.0.0.1',
                'language'               => 'en',
                'witness_name'           => 'Staff Nurse Incharge',
            ],
            [
                'hospital_id'            => $hospitalId,
                'patient_id'             => $patientId,
                'consent_type'           => 'abdm_data_sharing',
                'consent_title'          => 'DPDP Act 2023 & ABDM Health Records Data Sharing Consent',
                'purpose_description'    => 'Informed electronic consent for linking diagnostic reports and discharge summary to Ayushman Bharat Health Account (ABHA) for nationwide longitudinal care continuity.',
                'data_fiduciary'         => 'National Health Authority (NHA) & Hospital Quality Fiduciary',
                'signatory_type'         => 'patient',
                'signatory_name'         => $patientName,
                'status'                 => 'granted',
                'granted_at'             => date('Y-m-d H:i:s'),
                'expiry_date'            => date('Y-m-d', strtotime('+365 days')),
                'digital_signature_hash' => 'SIG-DPDP-' . strtoupper(bin2hex(random_bytes(8))),
                'verification_otp'       => '4590',
                'ip_address'             => '127.0.0.1',
                'language'               => 'en',
                'witness_name'           => 'Hospital Quality Officer',
            ],
            [
                'hospital_id'            => $hospitalId,
                'patient_id'             => $patientId,
                'consent_type'           => 'surgery_anesthesia',
                'consent_title'          => 'High-Risk Surgical Procedure & General Anesthesia Consent',
                'purpose_description'    => 'Comprehensive informed consent outlining surgical scope, anticipated complications, anesthesia risks, and emergency blood reserve usage.',
                'data_fiduciary'         => 'Hospital Quality Management Surgery Desk',
                'signatory_type'         => 'patient',
                'signatory_name'         => $patientName,
                'status'                 => 'draft',
                'granted_at'             => null,
                'expiry_date'            => null,
                'digital_signature_hash' => null,
                'verification_otp'       => null,
                'ip_address'             => null,
                'language'               => 'en',
                'witness_name'           => null,
            ],
        ];

        $this->insertBatch($defaults);
    }
}
