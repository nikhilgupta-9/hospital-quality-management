<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientWorkflowStepModel extends Model
{
    protected $table            = 'patient_workflow_steps';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'patient_id', 'step_code', 'step_name',
        'status', 'completed_by', 'completed_at', 'notes',
    ];

    /**
     * Get all clinical workflow steps for a patient
     */
    public function getForPatient(int $patientId): array
    {
        return $this->where('patient_id', $patientId)
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    /**
     * Seed 6 standard NABH clinical quality checkpoints for a new patient
     */
    public function initStepsForPatient(int $hospitalId, int $patientId): void
    {
        $steps = [
            [
                'hospital_id'  => $hospitalId,
                'patient_id'   => $patientId,
                'step_code'    => 'TRIAGE_VITALS',
                'step_name'    => 'Triage Assessment & Baseline Vitals (BP, HR, SpO2, Temp)',
                'status'       => 'completed',
                'completed_by' => 'Triage Nurse',
                'completed_at' => date('Y-m-d H:i:s'),
                'notes'        => 'Baseline vitals stable. GCS 15/15.',
            ],
            [
                'hospital_id'  => $hospitalId,
                'patient_id'   => $patientId,
                'step_code'    => 'IDENTITY_BAND',
                'step_name'    => '2-Identifier Barcoded Patient Wristband Application',
                'status'       => 'completed',
                'completed_by' => 'Admission Desk',
                'completed_at' => date('Y-m-d H:i:s'),
                'notes'        => 'Red wristband verified for Penicillin allergy.',
            ],
            [
                'hospital_id'  => $hospitalId,
                'patient_id'   => $patientId,
                'step_code'    => 'DPDP_CONSENT',
                'step_name'    => 'Digital DPDP Informed Consent & ABHA Health Records Authorization',
                'status'       => 'completed',
                'completed_by' => 'Quality Data Desk',
                'completed_at' => date('Y-m-d H:i:s'),
                'notes'        => 'Digitally signed via OTP verification.',
            ],
            [
                'hospital_id'  => $hospitalId,
                'patient_id'   => $patientId,
                'step_code'    => 'FALL_RISK_SCREEN',
                'step_name'    => 'Morse Fall Risk & Pressure Ulcer (Braden) Screening',
                'status'       => 'pending',
                'completed_by' => null,
                'completed_at' => null,
                'notes'        => null,
            ],
            [
                'hospital_id'  => $hospitalId,
                'patient_id'   => $patientId,
                'step_code'    => 'SAFE_SURGERY_CHECK',
                'step_name'    => 'WHO Safe Surgery Checklist (Sign-In, Time-Out, Sign-Out)',
                'status'       => 'pending',
                'completed_by' => null,
                'completed_at' => null,
                'notes'        => null,
            ],
            [
                'hospital_id'  => $hospitalId,
                'patient_id'   => $patientId,
                'step_code'    => 'DISCHARGE_CARE_PLAN',
                'step_name'    => 'Electronic Discharge Summary & Post-Hospital Care Instructions',
                'status'       => 'pending',
                'completed_by' => null,
                'completed_at' => null,
                'notes'        => null,
            ],
        ];

        $this->insertBatch($steps);
    }
}
