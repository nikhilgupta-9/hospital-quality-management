<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFacilityRoundsAndCondemnation extends Migration
{
    public function up()
    {
        // 1. Facility Safety Rounds & Defect Tracker Table
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
            'round_date' => [
                'type' => 'DATE',
            ],
            'inspector_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'default'    => 'Quality Safety Officer',
            ],
            'location_area' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'defect_category' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'Fire Safety',
                    'Civil / Infrastructure',
                    'Electrical & Illumination',
                    'Plumbing & Water Supply',
                    'HVAC / Clean Air',
                    'Medical Gas (MGPS)',
                    'Bio-Medical Waste',
                ],
                'default' => 'Civil / Infrastructure',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'severity' => [
                'type'       => 'ENUM',
                'constraint' => ['critical', 'high', 'medium', 'low'],
                'default'    => 'medium',
            ],
            'assigned_to' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'target_resolution_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'resolution_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['open', 'in_progress', 'resolved', 'closed'],
                'default'    => 'open',
            ],
            'corrective_action_taken' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'evidence_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'verified_by' => [
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
        $this->forge->addKey('department_id');
        $this->forge->addKey('status');
        $this->forge->createTable('facility_rounds_defects', true);

        // 2. Equipment Condemnation & Decommissioning Table
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
            'equipment_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'requested_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'request_reason' => [
                'type' => 'TEXT',
            ],
            'technical_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'original_cost' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'null'       => true,
            ],
            'repair_estimate' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'null'       => true,
            ],
            'committee_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'recommended', 'rejected'],
                'default'    => 'pending',
            ],
            'committee_reviewed_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'ms_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default'    => 'pending',
            ],
            'ms_approved_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'scrap_certificate_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->addKey('equipment_id');
        $this->forge->createTable('equipment_condemnations', true);

        // 3. Safety SOPs & Disaster Protocols Table
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
            'code_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Disaster & Safety',
            ],
            'sop_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'version' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'v1.0',
            ],
            'summary' => [
                'type' => 'TEXT',
            ],
            'action_steps' => [
                'type' => 'TEXT',
            ],
            'contact_extension' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Ext 5555 (Emergency)',
            ],
            'file_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
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
        $this->forge->createTable('safety_sops', true);

        // 4. Enhance Equipment Table with PPM and Downtime Columns
        $fields = [
            'breakdown_downtime_hours' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'last_breakdown_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'current_ppm_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'next_ppm_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'ppm_frequency_months' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 6,
            ],
            'condemnation_status' => [
                'type'       => 'ENUM',
                'constraint' => ['none', 'requested', 'approved', 'scrapped'],
                'default'    => 'none',
            ],
        ];

        // Check if columns exist before adding
        $db = \Config\Database::connect();
        $existingCols = $db->getFieldNames('equipment');
        $toAdd = [];
        foreach ($fields as $col => $def) {
            if (! in_array($col, $existingCols, true)) {
                $toAdd[$col] = $def;
            }
        }
        if (! empty($toAdd)) {
            $this->forge->addColumn('equipment', $toAdd);
        }
    }

    public function down()
    {
        $this->forge->dropTable('facility_rounds_defects', true);
        $this->forge->dropTable('equipment_condemnations', true);
        $this->forge->dropTable('safety_sops', true);
    }
}
