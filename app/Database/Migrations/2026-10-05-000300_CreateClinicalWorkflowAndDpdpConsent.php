<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClinicalWorkflowAndDpdpConsent extends Migration
{
    public function up()
    {
        // 1. Patients Registry Table (with UHID & ABHA Linking)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hospital_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'department_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'uhid' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['male', 'female', 'other'],
                'default'    => 'male',
            ],
            'dob' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'age' => [
                'type'       => 'INT',
                'constraint' => 3,
                'null'       => true,
            ],
            'mobile' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'emergency_contact' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'blood_group' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'abha_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'abha_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'abha_status' => [
                'type'       => 'ENUM',
                'constraint' => ['verified', 'pending', 'unlinked'],
                'default'    => 'unlinked',
            ],
            'admission_status' => [
                'type'       => 'ENUM',
                'constraint' => ['registered', 'admitted_ward', 'admitted_icu', 'pre_op', 'post_op', 'discharge_ready', 'discharged'],
                'default'    => 'registered',
            ],
            'bed_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'attending_doctor' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'admission_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'discharge_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('department_id');
        $this->forge->addKey('admission_status');
        $this->forge->createTable('patients', true);

        // 2. DPDP Digital Consents Table (DPDP Act 2023 Compliant)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hospital_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'patient_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'consent_type' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'general_admission',
                    'surgery_anesthesia',
                    'abdm_data_sharing',
                    'blood_transfusion',
                    'contrast_radiology',
                    'icu_invasive_care',
                ],
                'default' => 'general_admission',
            ],
            'consent_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'purpose_description' => [
                'type' => 'TEXT',
            ],
            'data_fiduciary' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'default'    => 'Hospital Quality Management / Healthcare Data Fiduciary',
            ],
            'signatory_type' => [
                'type'       => 'ENUM',
                'constraint' => ['patient', 'guardian', 'legal_nominee'],
                'default'    => 'patient',
            ],
            'signatory_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'granted', 'revoked', 'expired'],
                'default'    => 'draft',
            ],
            'granted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'revoked_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'expiry_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'digital_signature_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'verification_otp' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => true,
            ],
            'language' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'default'    => 'en',
            ],
            'witness_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('patient_id');
        $this->forge->addKey('status');
        $this->forge->createTable('dpdp_consents', true);

        // 3. Patient Workflow Steps & Quality Gate Log
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hospital_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'patient_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'step_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'step_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'completed', 'bypassed'],
                'default'    => 'pending',
            ],
            'completed_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'completed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('hospital_id');
        $this->forge->addKey('patient_id');
        $this->forge->createTable('patient_workflow_steps', true);
    }

    public function down()
    {
        $this->forge->dropTable('patient_workflow_steps', true);
        $this->forge->dropTable('dpdp_consents', true);
        $this->forge->dropTable('patients', true);
    }
}
