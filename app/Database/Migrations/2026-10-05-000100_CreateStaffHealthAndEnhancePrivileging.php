<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStaffHealthAndEnhancePrivileging extends Migration
{
    public function up()
    {
        // 1. Staff Health & Vaccination Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'staff_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
            'hepb_dose1_date' => ['type' => 'DATE', 'null' => true],
            'hepb_dose2_date' => ['type' => 'DATE', 'null' => true],
            'hepb_dose3_date' => ['type' => 'DATE', 'null' => true],
            'hepb_booster_date' => ['type' => 'DATE', 'null' => true],
            'hepb_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'not_vaccinated'],
            'anti_hbs_titer' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tt_vaccine_date' => ['type' => 'DATE', 'null' => true],
            'annual_checkup_date' => ['type' => 'DATE', 'null' => true],
            'fitness_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'fit'],
            'medical_officer_name' => ['type' => 'VARCHAR', 'constraint' => 191, 'null' => true],
            'health_remarks' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('staff_id');
        $this->forge->addKey('hepb_status');
        $this->forge->addKey('fitness_status');
        $this->forge->addForeignKey('staff_id', 'staff', 'id', false, 'CASCADE');
        $this->forge->createTable('staff_health_records', true);

        // 2. Enhance Credentialing Table
        if (!$this->db->fieldExists('privilege_type', 'credentialing')) {
            $this->forge->addColumn('credentialing', [
                'privilege_type' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'core', 'after' => 'procedure'],
                'committee_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'draft', 'after' => 'status'],
                'committee_reviewed_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'verified_by'],
                'ms_approved_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'committee_reviewed_at'],
                'notes' => ['type' => 'TEXT', 'null' => true, 'after' => 'valid_until'],
            ]);
        }

        // 3. Expiry Alert Logs Table (60/30/15 Days tracking)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'staff_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
            'alert_type' => ['type' => 'VARCHAR', 'constraint' => 50],
            'days_threshold' => ['type' => 'INT', 'default' => 30],
            'expiry_date' => ['type' => 'DATE', 'null' => false],
            'sent_channel' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'email_sms'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'notified'],
            'details' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('staff_id');
        $this->forge->addKey('alert_type');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('staff_id', 'staff', 'id', false, 'CASCADE');
        $this->forge->createTable('expiry_alert_logs', true);
    }

    public function down()
    {
        $this->forge->dropTable('expiry_alert_logs', true);
        $this->forge->dropTable('staff_health_records', true);
    }
}
