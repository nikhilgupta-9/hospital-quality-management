<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Create Hospital Profiles and Statutory Licenses Tables
 * Supports Module 2: Hospital Profile & Licences (Part A & Part B with Traffic Light Engine)
 */
class CreateHospitalProfilesAndLicenses extends Migration
{
    public function up()
    {
        // -------------------------------------------------------------
        // 1. HOSPITAL PROFILES TABLE (Part A)
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
            'rohini_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'abdm_hip_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'hospital_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Multispeciality Hospital',
            ],
            'nodal_officer_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'nodal_officer_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'nodal_officer_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'total_sanctioned_beds' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 100,
            ],
            'total_icu_beds' => [
                'type'     => 'INT',
                'unsigned' => true,
                'default'  => 15,
            ],
            'specialties' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'address_details' => [
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
        $this->forge->addUniqueKey('hospital_id');
        $this->forge->createTable('hospital_profiles', true);

        // -------------------------------------------------------------
        // 2. HOSPITAL STATUTORY LICENSES TABLE (Part B)
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
            'license_category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Statutory',
            ],
            'license_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
            ],
            'license_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'issuing_authority' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'issue_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'expiry_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'document_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'remarks' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'default'    => 'active',
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
        $this->forge->addKey(['hospital_id', 'license_type']);
        $this->forge->createTable('hospital_licenses', true);

        // -------------------------------------------------------------
        // 3. SEED DEFAULT SAMPLE DATA FOR HOSPITAL #1
        // -------------------------------------------------------------
        $db = \Config\Database::connect();
        $now = date('Y-m-d H:i:s');

        // Check if hospital 1 exists
        $hospital = $db->table('hospitals')->where('id', 1)->get()->getRowArray();
        if ($hospital) {
            // Seed Part A Profile
            $db->table('hospital_profiles')->ignore(true)->insert([
                'hospital_id'           => 1,
                'rohini_id'             => 'ROHINI-890241-DEL',
                'abdm_hip_id'           => 'IN0710000421',
                'hospital_type'         => 'Superspeciality Tertiary Care Hospital',
                'nodal_officer_name'    => 'Dr. Ananya Sen',
                'nodal_officer_email'   => 'nabh@maxcarehospital.org',
                'nodal_officer_phone'   => '+91 98112-45678',
                'total_sanctioned_beds' => 200,
                'total_icu_beds'        => 35,
                'specialties'           => json_encode([
                    'General Medicine', 'General Surgery', 'Cardiology & Cath Lab', 
                    'Orthopaedics & Joint Replacement', 'Obstetrics & Gynaecology', 
                    'Pediatrics & NICU', 'Critical Care & ICU', 'Emergency & Trauma', 
                    'Nephrology & Dialysis', 'Radio-Diagnosis & Imaging'
                ]),
                'address_details'       => 'Sector 14, Institutional Area, New Delhi - 110001, India',
                'created_at'            => $now,
                'updated_at'            => $now,
            ]);

            // Seed Part B 7 Mandatory Statutory Licenses
            $standardLicenses = [
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Legal & Establishment',
                    'license_type'      => 'cea',
                    'title'             => 'Clinical Establishment Act (CEA) Registration',
                    'license_number'    => 'CEA/DEL/2024/7821',
                    'issuing_authority' => 'Directorate General of Health Services (DGHS), Delhi',
                    'issue_date'        => '2024-04-01',
                    'expiry_date'       => date('Y-m-d', strtotime('+320 days')), // 🟢 Green (>60 days)
                    'document_path'     => 'assets/docs/cea_license_sample.pdf',
                    'remarks'           => 'Permanent registration renewed for 200 in-patient beds.',
                    'status'            => 'active',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Building & Life Safety',
                    'license_type'      => 'fire_noc',
                    'title'             => 'Fire Safety Clearance (Fire NOC)',
                    'license_number'    => 'DFS/MS/2024/HQ/892',
                    'issuing_authority' => 'Delhi Fire Service Headquarters',
                    'issue_date'        => '2024-01-15',
                    'expiry_date'       => date('Y-m-d', strtotime('+210 days')), // 🟢 Green (>60 days)
                    'document_path'     => 'assets/docs/fire_noc_sample.pdf',
                    'remarks'           => 'Basement to 5th floor wet riser, smoke alarms & hydrant validation.',
                    'status'            => 'active',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Environment & Waste',
                    'license_type'      => 'bmw',
                    'title'             => 'Bio-Medical Waste (BMW) Authorization',
                    'license_number'    => 'DPCC/BMW/AUTH/2023/1104',
                    'issuing_authority' => 'Delhi Pollution Control Committee (DPCC)',
                    'issue_date'        => '2023-11-10',
                    'expiry_date'       => date('Y-m-d', strtotime('+28 days')), // 🟡 Yellow (1-60 days)
                    'document_path'     => 'assets/docs/bmw_auth_sample.pdf',
                    'remarks'           => 'Renewal application submitted; inspection report pending.',
                    'status'            => 'warning',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Environment & Pollution',
                    'license_type'      => 'cto',
                    'title'             => 'Consent to Operate (CTO - Air & Water Acts)',
                    'license_number'    => 'DPCC/CTO/AIR-WATER/2022/943',
                    'issuing_authority' => 'State Pollution Control Board (SPCB)',
                    'issue_date'        => '2022-09-01',
                    'expiry_date'       => date('Y-m-d', strtotime('-5 days')), // 🔴 Red (Expired)
                    'document_path'     => 'assets/docs/cto_pollution_sample.pdf',
                    'remarks'           => 'Overdue! ETP/STP effluent testing compliance report required.',
                    'status'            => 'expired',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Radiation & Machinery',
                    'license_type'      => 'aerb',
                    'title'             => 'Atomic Energy Regulatory Board (AERB) Approval',
                    'license_number'    => 'AERB/RSD/MED/DL-0914/2024',
                    'issuing_authority' => 'Radiological Safety Division, AERB Mumbai',
                    'issue_date'        => '2024-03-20',
                    'expiry_date'       => date('Y-m-d', strtotime('+480 days')), // 🟢 Green (>60 days)
                    'document_path'     => 'assets/docs/aerb_xray_sample.pdf',
                    'remarks'           => 'Covers 128-Slice CT, 500mA Fixed X-Ray, and 2 Mobile C-Arms.',
                    'status'            => 'active',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Diagnostic & Legal',
                    'license_type'      => 'pndt',
                    'title'             => 'PC-PNDT Ultrasound Registration Certificate',
                    'license_number'    => 'DM/PNDT/SOUTH/2023/452',
                    'issuing_authority' => 'District Appropriate Authority / DM South Delhi',
                    'issue_date'        => '2023-08-15',
                    'expiry_date'       => date('Y-m-d', strtotime('+45 days')), // 🟡 Yellow (1-60 days)
                    'document_path'     => 'assets/docs/pndt_registration_sample.pdf',
                    'remarks'           => 'Form-F monthly registers up-to-date. Renewal affidavit filed.',
                    'status'            => 'warning',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
                [
                    'hospital_id'       => 1,
                    'license_category'  => 'Clinical & Medication',
                    'license_type'      => 'pharmacy',
                    'title'             => 'Pharmacy & Retail/Wholesale Drug License (Form 20/21)',
                    'license_number'    => 'DL/DRUG/SZ/20/4912-21/4913',
                    'issuing_authority' => 'Drugs Control Department, Govt. of NCT of Delhi',
                    'issue_date'        => '2024-02-10',
                    'expiry_date'       => date('Y-m-d', strtotime('+560 days')), // 🟢 Green (>60 days)
                    'document_path'     => 'assets/docs/drug_license_sample.pdf',
                    'remarks'           => 'Includes Schedule X narcotic drug storage license with 2 registered pharmacists.',
                    'status'            => 'active',
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ],
            ];

            foreach ($standardLicenses as $lic) {
                $db->table('hospital_licenses')->insert($lic);
            }
        }
    }

    public function down()
    {
        $this->forge->dropTable('hospital_licenses', true);
        $this->forge->dropTable('hospital_profiles', true);
    }
}
