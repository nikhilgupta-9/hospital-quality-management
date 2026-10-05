<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePricingPlans extends Migration
{
    public function up()
    {
        // Pricing Plans Table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
            'tagline' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'badge_text' => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => true,
            ],
            'bed_capacity' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Up to 50 Beds',
            ],
            'price_monthly' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0.00,
            ],
            'price_yearly' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0.00,
            ],
            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'default'    => '₹',
            ],
            'billing_period' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '/ month (billed annually)',
            ],
            'max_users' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 15,
            ],
            'features_list' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'is_popular' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 5,
                'default'    => 0,
            ],
            'cta_text' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Start 14-Day Free Trial',
            ],
            'cta_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'contact',
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
        $this->forge->createTable('pricing_plans', true);

        // Seed Initial SaaS Pricing Plans for Hospital Quality Management
        $db = \Config\Database::connect();
        $now = date('Y-m-d H:i:s');

        $initialPlans = [
            [
                'name'           => 'SHCO Essential Quality',
                'slug'           => 'shco-essential',
                'tagline'        => 'Ideal for small clinics, day-care centres, and hospitals up to 50 beds preparing for NABH SHCO accreditation.',
                'badge_text'     => 'Entry Tier',
                'bed_capacity'   => 'Up to 50 Beds',
                'price_monthly'  => 12499.00,
                'price_yearly'   => 119990.00,
                'currency'       => '₹',
                'billing_period' => '/ month (billed annually)',
                'max_users'      => 15,
                'features_list'  => json_encode([
                    'NABH SHCO 5th Edition Standard Checklists',
                    'Digital SOP & Document Version Control',
                    'Departmental CAPA Logging & Closed-Loop Tracker',
                    'Biomedical Calibration & PPM Logbook',
                    'Single Hospital Facility Cockpit',
                    'Standard Email & Ticket Support (24-48h SLA)'
                ]),
                'is_popular'     => 0,
                'is_active'      => 1,
                'sort_order'     => 1,
                'cta_text'       => 'Start SHCO Trial',
                'cta_url'        => 'contact',
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'name'           => 'NABH Digital Mitra Pro',
                'slug'           => 'nabh-pro-mitra',
                'tagline'        => 'The comprehensive quality, clinical safety & compliance automation suite for 50-200 bed secondary/tertiary hospitals.',
                'badge_text'     => 'Most Popular',
                'bed_capacity'   => '50 - 200 Beds',
                'price_monthly'  => 28999.00,
                'price_yearly'   => 279990.00,
                'currency'       => '₹',
                'billing_period' => '/ month (billed annually)',
                'max_users'      => 60,
                'features_list'  => json_encode([
                    'Everything in SHCO Essential, plus:',
                    '6-Point Clinical Safety Gates (COP & AAC)',
                    'ABDM M3 14-Digit ABHA Linkage & UHID Auto-Registry',
                    'DPDP Act 2023 Multi-Lingual E-Consent & SHA-256 Engine',
                    'HR Credentialing, Privileging & Staff Health Vault',
                    'Facility Safety Rounds & Defect Lifecycles (FMS)',
                    'Biomedical Condemnation Committee Workflow',
                    'Dedicated Quality Account Manager & Audit Simulation'
                ]),
                'is_popular'     => 1,
                'is_active'      => 1,
                'sort_order'     => 2,
                'cta_text'       => 'Get Pro Access',
                'cta_url'        => 'contact',
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'name'           => 'NABH Enterprise Multi-Unit',
                'slug'           => 'enterprise-multi-unit',
                'tagline'        => 'Enterprise-grade governance for 200+ bed multi-specialty hospitals, medical colleges, and hospital chains.',
                'badge_text'     => 'Enterprise',
                'bed_capacity'   => '200+ Beds / Chain',
                'price_monthly'  => 54999.00,
                'price_yearly'   => 529990.00,
                'currency'       => '₹',
                'billing_period' => '/ month (billed annually)',
                'max_users'      => 0, // unlimited
                'features_list'  => json_encode([
                    'Everything in Pro Suite, plus:',
                    'Unlimited Hospital Branch / Multi-Unit Orchestration',
                    'Custom NABH & JCI Assessment Modules',
                    'Real-Time HIS / EMR Bidirectional FHIR API Integration',
                    'On-Premises or Private Cloud Hosting Option',
                    'DPDP 2023 Legal Defense Guarantee & Audit Logs Export',
                    'Unlimited Doctor & Staff User Accounts',
                    '24/7 Priority Hotline & Onsite Pre-Assessment Assessor'
                ]),
                'is_popular'     => 0,
                'is_active'      => 1,
                'sort_order'     => 3,
                'cta_text'       => 'Contact Enterprise Team',
                'cta_url'        => 'contact',
                'created_at'     => $now,
                'updated_at'     => $now,
            ]
        ];

        $db->table('pricing_plans')->insertBatch($initialPlans);
    }

    public function down()
    {
        $this->forge->dropTable('pricing_plans', true);
    }
}
