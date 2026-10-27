<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Create Chapter Matrix, Consultant Audits, and Live Evidence Media Library
 * Supports Diary Points:
 * #3: NABH 10-Chapter matrix
 * #4: Consultant review / auto audit point
 * #5: Live photo & video library
 */
class CreateChapterMatrixAndEvidenceLibrary extends Migration
{
    public function up()
    {
        // -------------------------------------------------------------
        // 1. CHAPTER SCORES TABLE (Point #3)
        // -------------------------------------------------------------
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hospital_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'chapter_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'chapter_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'patient_centric', // patient_centric or organization_centric
            ],
            'total_standards' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 10,
            ],
            'compliant_count' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 8,
            ],
            'partial_count' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 2,
            ],
            'non_compliant_count' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 0,
            ],
            'readiness_percentage' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'default'    => 90.00,
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

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['hospital_id', 'chapter_code']);
        $this->forge->createTable('chapter_scores', true);

        // -------------------------------------------------------------
        // 2. CONSULTANT AUDITS TABLE (Point #4)
        // -------------------------------------------------------------
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hospital_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'audit_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'audit_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'mock_audit',
            ],
            'lead_auditor_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'audit_date' => [
                'type' => 'DATE',
            ],
            'major_nc_count' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 0,
            ],
            'minor_nc_count' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 0,
            ],
            'ofi_count' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 0,
            ],
            'overall_score' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'default'    => 88.50,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'completed',
            ],
            'summary_notes' => [
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

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['hospital_id', 'audit_date']);
        $this->forge->createTable('consultant_audits', true);

        // -------------------------------------------------------------
        // 3. AUDIT EVIDENCE MEDIA TABLE (Point #5)
        // -------------------------------------------------------------
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hospital_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'fire_drill',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'department_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'media_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'image', // image or video
            ],
            'file_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'geo_location' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'capture_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'auditor_verified' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'remarks' => [
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

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['hospital_id', 'category']);
        $this->forge->createTable('audit_evidence_media', true);

        // -------------------------------------------------------------
        // 4. SEED SAMPLE DATA FOR HOSPITAL #1
        // -------------------------------------------------------------
        $db = \Config\Database::connect();
        $now = date('Y-m-d H:i:s');

        // Seed 10 NABH 5th Edition Chapters for Hospital 1
        $chapters = [
            ['AAC', 'Access, Assessment and Care of Patients', 'patient_centric', 15, 14, 1, 0, 96.0],
            ['COP', 'Care of Patients (Clinical & Surgical Safety)', 'patient_centric', 21, 19, 2, 0, 92.5],
            ['MOM', 'Management of Medication (LASA & High-Alert)', 'patient_centric', 14, 12, 2, 0, 88.0],
            ['PRE', 'Patient Rights and Education (DPDP Consent)', 'patient_centric', 10, 9, 1, 0, 95.0],
            ['HIC', 'Hospital Infection Control (WHO 5 Moments)', 'patient_centric', 12, 10, 2, 0, 86.5],
            ['CQI', 'Continuous Quality Improvement (KPI Telemetry)', 'organization_centric', 10, 9, 1, 0, 92.0],
            ['ROM', 'Responsibilities of Management & Governance', 'organization_centric', 8, 8, 0, 0, 100.0],
            ['FMS', 'Facility Management and Safety (Fire & Disaster)', 'organization_centric', 14, 11, 2, 1, 82.0],
            ['HRM', 'Human Resource Management & Credentialing', 'organization_centric', 16, 14, 2, 0, 90.0],
            ['IMS', 'Information Management System (MRD & EMR)', 'organization_centric', 9, 8, 1, 0, 91.0],
        ];

        foreach ($chapters as $ch) {
            $db->table('chapter_scores')->ignore(true)->insert([
                'hospital_id'          => 1,
                'chapter_code'         => $ch[0],
                'chapter_name'         => $ch[1],
                'category'             => $ch[2],
                'total_standards'      => $ch[3],
                'compliant_count'      => $ch[4],
                'partial_count'        => $ch[5],
                'non_compliant_count'  => $ch[6],
                'readiness_percentage' => $ch[7],
                'created_at'           => $now,
                'updated_at'           => $now,
            ]);
        }

        // Seed Initial Mock Audits (Point #4)
        $db->table('consultant_audits')->ignore(true)->insert([
            'hospital_id'       => 1,
            'audit_title'       => 'Q3 Pre-NABH Accreditation Internal Mock Audit',
            'audit_type'        => 'pre_assessment',
            'lead_auditor_name' => 'Dr. Rajiv Menon (Lead NABH Assessor & Quality Advisor)',
            'audit_date'        => '2026-09-18',
            'major_nc_count'    => 0,
            'minor_nc_count'    => 2,
            'ofi_count'         => 4,
            'overall_score'     => 88.50,
            'status'            => 'action_plan_submitted',
            'summary_notes'     => 'Excellent compliance across AAC, PRE and ROM. Minor NCs issued in FMS (AHU filter replacement log) and MOM (High-Alert look-alike labelling). CAPA plan initiated with 30-day timeline.',
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);

        // Seed Initial Live Evidence Media Items (Point #5)
        $evidence = [
            [
                'hospital_id'      => 1,
                'category'         => 'fire_drill',
                'title'            => 'Bi-Annual Fire Safety Evacuation Drill & Hose Pipe Demonstration',
                'department_name'  => 'Safety & Security',
                'media_type'       => 'image',
                'file_path'        => 'assets/images/facility_safety_rounds_1791163181056.jpg',
                'geo_location'     => '28.5355° N, 77.2410° E (Hospital Courtyard)',
                'capture_date'     => '2026-09-10',
                'auditor_verified' => 1,
                'remarks'          => 'Full hospital evacuation response completed in 4 mins 12 secs with Delhi Fire Service observer present.',
            ],
            [
                'hospital_id'      => 1,
                'category'         => 'bmw_waste',
                'title'            => 'Color-Coded BMW Central Waste Storage & Barcoded Handover Area',
                'department_name'  => 'Housekeeping & Infection Control',
                'media_type'       => 'image',
                'file_path'        => 'assets/images/clinical_infection_audit.jpg',
                'geo_location'     => '28.5357° N, 77.2412° E (Basement BMW Bay)',
                'capture_date'     => '2026-09-15',
                'auditor_verified' => 1,
                'remarks'          => 'Separate demarcated zones for Red, Yellow, Blue and Puncture-proof White sharp containers with digital weight scale.',
            ],
            [
                'hospital_id'      => 1,
                'category'         => 'calibration_tag',
                'title'            => 'ICU Ventilator PPM & Traceable Calibration Tagging',
                'department_name'  => 'Biomedical Engineering',
                'media_type'       => 'image',
                'file_path'        => 'assets/images/biomedical_calibration_1791163198485.jpg',
                'geo_location'     => '28.5356° N, 77.2409° E (Main ICU Bay 4)',
                'capture_date'     => '2026-09-22',
                'auditor_verified' => 1,
                'remarks'          => 'NABL accredited calibration sticker with serial #EQ-ICU-VENT-01 valid till 2027.',
            ],
            [
                'hospital_id'      => 1,
                'category'         => 'ot_icu',
                'title'            => 'Operation Theatre Sterile Corridor & Positive Air Pressure Gauge',
                'department_name'  => 'OT Complex',
                'media_type'       => 'image',
                'file_path'        => 'assets/images/hospital_kpi_command_center.jpg',
                'geo_location'     => '28.5359° N, 77.2415° E (OT-3 Air Barrier)',
                'capture_date'     => '2026-09-25',
                'auditor_verified' => 1,
                'remarks'          => 'Magnahelic pressure differential verified at 18 Pa. HEPA filter 0.3 micron velocity compliant.',
            ],
        ];

        foreach ($evidence as $ev) {
            $ev['created_at'] = $now;
            $ev['updated_at'] = $now;
            $db->table('audit_evidence_media')->ignore(true)->insert($ev);
        }
    }

    public function down()
    {
        $this->forge->dropTable('audit_evidence_media', true);
        $this->forge->dropTable('consultant_audits', true);
        $this->forge->dropTable('chapter_scores', true);
    }
}
