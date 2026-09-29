<?php

namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;

class ComprehensiveHospitalSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Demo Hospital
        $hospital = $this->db->table('hospitals')->where('code', 'MAX-DEL-01')->get()->getRow();
        if (!$hospital) {
            $this->db->table('hospitals')->insert([
                'name' => 'Max Care Superspeciality Hospital',
                'code' => 'MAX-DEL-01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $hospitalId = $this->db->insertID();
        } else {
            $hospitalId = $hospital->id;
        }

        // 2. Create Departments
        $deptNames = [
            'Emergency & Trauma Care',
            'Intensive Care Unit (ICU)',
            'Operation Theatre (OT) Complex',
            'Cardiology & Cath Lab',
            'Pharmacy & Medication Management',
            'Laboratory & Pathology',
            'Radiology & Imaging',
            'Infection Control & Quality',
            'Biomedical & Facility Engineering',
            'Human Resources & Credentialing',
        ];

        $deptMap = [];
        foreach ($deptNames as $name) {
            $existing = $this->db->table('departments')
                ->where('hospital_id', $hospitalId)
                ->where('name', $name)
                ->get()->getRow();
            if (!$existing) {
                $this->db->table('departments')->insert([
                    'hospital_id' => $hospitalId,
                    'name' => $name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                $deptMap[$name] = $this->db->insertID();
            } else {
                $deptMap[$name] = $existing->id;
            }
        }

        // 3. Create Subscription
        $sub = $this->db->table('subscriptions')->where('hospital_id', $hospitalId)->get()->getRow();
        if (!$sub) {
            $this->db->table('subscriptions')->insert([
                'hospital_id' => $hospitalId,
                'plan' => 'Enterprise NABH Compliance Suite',
                'max_users' => 150,
                'features_json' => json_encode(['document_panel', 'hr_panel', 'equipment_panel', 'audit_engine', 'api_access', 'custom_export']),
                'expiry_date' => date('Y-m-d', strtotime('+1 year')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        // 4. Create Roles and Demo Users
        $roles = $this->db->table('roles')->get()->getResultArray();
        $roleMap = [];
        foreach ($roles as $r) {
            $roleMap[$r['slug']] = $r['id'];
        }

        $defaultPassword = password_hash('Admin@123456', PASSWORD_DEFAULT);

        $demoUsers = [
            [
                'hospital_id' => null,
                'department_id' => null,
                'role_id' => $roleMap['super_admin'],
                'name' => 'Dr. Rajesh Sharma (Super Admin)',
                'email' => 'admin@hospitalquality.org',
                'password_hash' => $defaultPassword,
                'status' => 'active',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => null,
                'role_id' => $roleMap['hospital_admin'],
                'name' => 'Dr. A. K. Varma (Medical Director)',
                'email' => 'director@maxcarehospital.org',
                'password_hash' => $defaultPassword,
                'status' => 'active',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Infection Control & Quality'] ?? null,
                'role_id' => $roleMap['nabh_coordinator'],
                'name' => 'Dr. Ananya Sen (NABH & Quality Head)',
                'email' => 'nabh@maxcarehospital.org',
                'password_hash' => $defaultPassword,
                'status' => 'active',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Intensive Care Unit (ICU)'] ?? null,
                'role_id' => $roleMap['dept_user'],
                'name' => 'Dr. Vikram Malhotra (ICU Incharge)',
                'email' => 'icu.head@maxcarehospital.org',
                'password_hash' => $defaultPassword,
                'status' => 'active',
            ],
        ];

        $userMap = [];
        foreach ($demoUsers as $u) {
            $exists = $this->db->table('users')->where('email', $u['email'])->get()->getRow();
            if (!$exists) {
                $u['created_at'] = date('Y-m-d H:i:s');
                $u['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('users')->insert($u);
                $userMap[$u['email']] = $this->db->insertID();
            } else {
                $userMap[$u['email']] = $exists->id;
            }
        }

        $nabhUserId = $userMap['nabh@maxcarehospital.org'] ?? 1;
        $directorId = $userMap['director@maxcarehospital.org'] ?? 1;
        $icuUserId = $userMap['icu.head@maxcarehospital.org'] ?? 1;

        // 5. Seed Sample Documents & SOPs
        $sampleDocs = [
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Emergency & Trauma Care'] ?? 1,
                'category' => 'SOP - Access, Assessment & Continuity of Care (AAC)',
                'title' => 'Standard Operating Procedure for Triage & Emergency Admission',
                'doc_number' => 'MAX-SOP-AAC-001',
                'owner_id' => $nabhUserId,
                'approver_id' => $directorId,
                'issue_date' => date('Y-m-d', strtotime('-6 months')),
                'review_date' => date('Y-m-d', strtotime('+6 months')),
                'expiry_date' => date('Y-m-d', strtotime('+18 months')),
                'status' => 'published',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Intensive Care Unit (ICU)'] ?? 1,
                'category' => 'Clinical Protocol - Care of Patients (COP)',
                'title' => 'Code Blue Resuscitation & Rapid Response Team Activation',
                'doc_number' => 'MAX-SOP-COP-004',
                'owner_id' => $icuUserId,
                'approver_id' => $directorId,
                'issue_date' => date('Y-m-d', strtotime('-3 months')),
                'review_date' => date('Y-m-d', strtotime('+9 months')),
                'expiry_date' => date('Y-m-d', strtotime('+21 months')),
                'status' => 'published',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Pharmacy & Medication Management'] ?? 1,
                'category' => 'Policy - Management of Medication (MOM)',
                'title' => 'High-Risk & Sound-Alike Look-Alike (LASA) Medication Safety Protocol',
                'doc_number' => 'MAX-POL-MOM-002',
                'owner_id' => $nabhUserId,
                'approver_id' => $directorId,
                'issue_date' => date('Y-m-d', strtotime('-1 month')),
                'review_date' => date('Y-m-d', strtotime('+11 months')),
                'expiry_date' => date('Y-m-d', strtotime('+23 months')),
                'status' => 'published',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Infection Control & Quality'] ?? 1,
                'category' => 'Manual - Hospital Infection Control (HIC)',
                'title' => 'Hospital Infection Prevention, Hand Hygiene & BMW Management Manual',
                'doc_number' => 'MAX-MAN-HIC-001',
                'owner_id' => $nabhUserId,
                'approver_id' => $directorId,
                'issue_date' => date('Y-m-d', strtotime('-8 months')),
                'review_date' => date('Y-m-d', strtotime('+25 days')), // Due soon!
                'expiry_date' => date('Y-m-d', strtotime('+25 days')),
                'status' => 'published',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Biomedical & Facility Engineering'] ?? 1,
                'category' => 'Safety Protocol - Facility Management & Safety (FMS)',
                'title' => 'Fire & Disaster Management, Evacuation & Hazard Response Plan',
                'doc_number' => 'MAX-SOP-FMS-007',
                'owner_id' => $nabhUserId,
                'approver_id' => $directorId,
                'issue_date' => date('Y-m-d', strtotime('-2 months')),
                'review_date' => date('Y-m-d', strtotime('+10 months')),
                'expiry_date' => date('Y-m-d', strtotime('+22 months')),
                'status' => 'published',
            ],
        ];

        foreach ($sampleDocs as $d) {
            $existing = $this->db->table('documents')->where('doc_number', $d['doc_number'])->get()->getRow();
            if (!$existing) {
                $d['created_at'] = date('Y-m-d H:i:s');
                $d['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('documents')->insert($d);
                $docId = $this->db->insertID();

                // Add Version
                $this->db->table('document_versions')->insert([
                    'document_id' => $docId,
                    'version_no' => '1.0',
                    'file_path' => 'uploads/documents/sample_sop.pdf',
                    'change_note' => 'Initial approved draft for NABH 5th edition alignment',
                    'uploaded_by' => $nabhUserId,
                    'uploaded_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                $verId = $this->db->insertID();

                $this->db->table('documents')->where('id', $docId)->update(['current_version_id' => $verId]);
            }
        }

        // 6. Seed Staff & Credentialing
        $staffList = [
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Intensive Care Unit (ICU)'] ?? 1,
                'user_id' => $icuUserId,
                'employee_code' => 'DOC-ICU-101',
                'name' => 'Dr. Vikram Malhotra',
                'designation' => 'Senior Consultant & ICU Incharge',
                'qualification' => 'MD (Anaesthesia), IDCCM (Critical Care)',
                'joining_date' => '2020-03-15',
                'experience_years' => 14,
                'contact' => '+91 98765 43210',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Cardiology & Cath Lab'] ?? 1,
                'user_id' => null,
                'employee_code' => 'DOC-CARD-202',
                'name' => 'Dr. Priya Nair',
                'designation' => 'Chief Interventional Cardiologist',
                'qualification' => 'MBBS, MD (Medicine), DM (Cardiology)',
                'joining_date' => '2019-07-01',
                'experience_years' => 16,
                'contact' => '+91 98765 11223',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Infection Control & Quality'] ?? 1,
                'user_id' => null,
                'employee_code' => 'NUR-ICN-305',
                'name' => 'Sister Mary Joseph',
                'designation' => 'Lead Infection Control Nurse (ICN)',
                'qualification' => 'M.Sc Nursing, Certified Infection Control (CIC)',
                'joining_date' => '2021-01-10',
                'experience_years' => 9,
                'contact' => '+91 98765 99887',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Biomedical & Facility Engineering'] ?? 1,
                'user_id' => null,
                'employee_code' => 'ENG-BME-401',
                'name' => 'Er. Amit Verma',
                'designation' => 'Head Biomedical & Facility Engineer',
                'qualification' => 'B.Tech Biomedical Engineering',
                'joining_date' => '2018-11-20',
                'experience_years' => 11,
                'contact' => '+91 98765 33445',
            ],
        ];

        foreach ($staffList as $s) {
            $existing = $this->db->table('staff')->where('employee_code', $s['employee_code'])->get()->getRow();
            if (!$existing) {
                $s['created_at'] = date('Y-m-d H:i:s');
                $s['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('staff')->insert($s);
                $staffId = $this->db->insertID();

                // Add Credentialing
                $this->db->table('credentialing')->insert([
                    'staff_id' => $staffId,
                    'procedure' => 'Invasive Arterial Line & Central Venous Line Placement',
                    'status' => 'approved',
                    'verified_by' => $directorId,
                    'valid_until' => date('Y-m-d', strtotime('+1 year')),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                // Add Staff Document Expiry
                $this->db->table('staff_documents')->insert([
                    'staff_id' => $staffId,
                    'doc_type' => 'State Medical Council Registration Certificate',
                    'file_path' => 'uploads/staff_docs/reg_cert.pdf',
                    'issue_date' => date('Y-m-d', strtotime('-5 years')),
                    'expiry_date' => date('Y-m-d', strtotime('+15 days')), // Expiry alert trigger
                    'status' => 'valid',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        // 7. Seed Trainings
        $trainings = [
            [
                'hospital_id' => $hospitalId,
                'title' => 'NABH 5th Edition Standards Implementation & Audit Readiness',
                'type' => 'Quality & Compliance',
                'scheduled_date' => date('Y-m-d', strtotime('+10 days')),
                'trainer_name' => 'Dr. Ananya Sen (NABH Lead Assessor)',
            ],
            [
                'hospital_id' => $hospitalId,
                'title' => 'Basic Life Support (BLS) & Code Blue Resuscitation Drill',
                'type' => 'Clinical Safety',
                'scheduled_date' => date('Y-m-d', strtotime('-15 days')),
                'trainer_name' => 'Dr. Vikram Malhotra',
            ],
            [
                'hospital_id' => $hospitalId,
                'title' => 'Hospital Infection Control & Biomedical Waste Color Coding',
                'type' => 'Infection Control',
                'scheduled_date' => date('Y-m-d', strtotime('-5 days')),
                'trainer_name' => 'Sister Mary Joseph',
            ],
        ];

        foreach ($trainings as $t) {
            $t['created_at'] = date('Y-m-d H:i:s');
            $t['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('trainings')->insert($t);
        }

        // 8. Seed Medical Equipment & Infrastructure
        $equipments = [
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Intensive Care Unit (ICU)'] ?? 1,
                'asset_no' => 'EQ-ICU-VENT-01',
                'name' => 'ICU Ventilator (Dräger Evita V300)',
                'category' => 'Critical Medical Equipment',
                'manufacturer' => 'Dräger Medical',
                'model' => 'Evita V300',
                'serial_no' => 'DRG-2023-9941',
                'purchase_date' => '2022-04-10',
                'install_date' => '2022-04-15',
                'warranty_expiry' => '2025-04-15',
                'amc_cmc_expiry' => date('Y-m-d', strtotime('+8 months')),
                'status' => 'active',
                'service_agency' => 'Dräger India Pvt Ltd',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Operation Theatre (OT) Complex'] ?? 1,
                'asset_no' => 'EQ-OT-ANES-03',
                'name' => 'Anesthesia Workstation (Datex Ohmeda Avance CS2)',
                'category' => 'Critical Medical Equipment',
                'manufacturer' => 'GE Healthcare',
                'model' => 'Avance CS2',
                'serial_no' => 'GE-2021-8834',
                'purchase_date' => '2021-08-20',
                'install_date' => '2021-08-25',
                'warranty_expiry' => '2024-08-25',
                'amc_cmc_expiry' => date('Y-m-d', strtotime('+15 days')), // AMC expiring soon
                'status' => 'active',
                'service_agency' => 'Wipro GE Healthcare',
            ],
            [
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Emergency & Trauma Care'] ?? 1,
                'asset_no' => 'EQ-EMR-DEFIB-02',
                'name' => 'Biphasic Defibrillator with Pacing (Philips HeartStart XL+)',
                'category' => 'Emergency Equipment',
                'manufacturer' => 'Philips Healthcare',
                'model' => 'HeartStart XL+',
                'serial_no' => 'PH-2022-3341',
                'purchase_date' => '2022-01-15',
                'install_date' => '2022-01-20',
                'warranty_expiry' => '2025-01-20',
                'amc_cmc_expiry' => date('Y-m-d', strtotime('+12 months')),
                'status' => 'active',
                'service_agency' => 'Philips Medical Systems',
            ],
        ];

        foreach ($equipments as $eq) {
            $existing = $this->db->table('equipment')->where('asset_no', $eq['asset_no'])->get()->getRow();
            if (!$existing) {
                $eq['created_at'] = date('Y-m-d H:i:s');
                $eq['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('equipment')->insert($eq);
                $eqId = $this->db->insertID();

                // Add Calibration
                $this->db->table('calibrations')->insert([
                    'equipment_id' => $eqId,
                    'last_date' => date('Y-m-d', strtotime('-11 months')),
                    'next_date' => date('Y-m-d', strtotime('+20 days')), // Due alert!
                    'agency' => 'NABL Certified Biomedical Calibration Lab',
                    'certificate_path' => 'uploads/calibrations/cert_vent.pdf',
                    'status' => 'due_soon',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        // 9. Seed Utility Systems (STP, Fire, DG, MGPS, HVAC)
        $utilities = [
            [
                'hospital_id' => $hospitalId,
                'type' => 'STP Plant',
                'name' => 'Sewage Treatment Plant (150 KLD MBR System)',
                'location' => 'Basement Level 2 (Service Yard)',
                'install_date' => '2020-01-10',
            ],
            [
                'hospital_id' => $hospitalId,
                'type' => 'Fire System',
                'name' => 'Automated Fire Hydrant & Sprinkler Ring System',
                'location' => 'Hospital Tower A & B All Floors',
                'install_date' => '2019-11-05',
            ],
            [
                'hospital_id' => $hospitalId,
                'type' => 'Fire Alarm',
                'name' => 'Addressable Fire Alarm Panel & Smoke Detection Grid',
                'location' => 'Central Security Control Room',
                'install_date' => '2019-11-10',
            ],
            [
                'hospital_id' => $hospitalId,
                'type' => 'DG/UPS',
                'name' => 'Dual 1000 KVA Diesel Generator Sets & Online UPS',
                'location' => 'Main Electrical Substation Yard',
                'install_date' => '2019-10-15',
            ],
            [
                'hospital_id' => $hospitalId,
                'type' => 'Medical Gas',
                'name' => 'Medical Gas Pipeline System (MGPS - O2, N2O, Air4, Air7, Vacuum)',
                'location' => 'Liquid Medical Oxygen (LMO) Cryogenic Compound',
                'install_date' => '2020-02-12',
            ],
            [
                'hospital_id' => $hospitalId,
                'type' => 'HVAC',
                'name' => 'Central Air Handling Units (AHU) with HEPA 99.97% OT Filtration',
                'location' => 'OT Floor Plant Room (Level 4)',
                'install_date' => '2020-03-01',
            ],
        ];

        foreach ($utilities as $util) {
            $existing = $this->db->table('utility_systems')
                ->where('hospital_id', $hospitalId)
                ->where('name', $util['name'])
                ->get()->getRow();
            if (!$existing) {
                $util['created_at'] = date('Y-m-d H:i:s');
                $util['updated_at'] = date('Y-m-d H:i:s');
                $this->db->table('utility_systems')->insert($util);
            }
        }

        // 10. Seed Audit Checklists (Fire Safety, OT, ICU, STP)
        $chk = $this->db->table('audit_checklists')->where('name', 'NABH Monthly Fire & Life Safety Audit')->get()->getRow();
        if (!$chk) {
            $this->db->table('audit_checklists')->insert([
                'hospital_id' => $hospitalId,
                'name' => 'NABH Monthly Fire & Life Safety Audit',
                'applies_to' => 'Fire System',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $chkId = $this->db->insertID();

            $fireQuestions = [
                'Are all fire exit passages, fire doors, and staircases unobstructed and clearly marked with illuminated signs?',
                'Are all fire extinguishers in their designated positions with valid inspection tags and proper pressure gauge reading?',
                'Was the main fire pump tested on auto-start mode and main hydrant pressure found above 7 kg/cm²?',
                'Is the central addressable fire alarm panel free of system faults and connected to the 24x7 control room?',
                'Are smoke and heat detectors in high-risk zones (ICU, OT, Electrical Panels, Pharmacy) functionally verified?',
                'Are manual call points (MCP) accessible without keys or obstruction in patient care corridors?',
                'Is the fire sprinkler control valve locked open with supervisory tamper switches tested?',
            ];

            foreach ($fireQuestions as $idx => $q) {
                $this->db->table('checklist_items')->insert([
                    'checklist_id' => $chkId,
                    'question' => $q,
                    'sort_order' => $idx + 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        // 11. Seed Quality Indicators (KPIs)
        $qualityIndicators = [
            ['type' => 'bed_occupancy', 'val' => ['rate' => 82.4, 'census' => 247, 'available_beds' => 300, 'unit' => '%']],
            ['type' => 'cauti_rate', 'val' => ['rate' => 0.85, 'cases' => 1, 'catheter_days' => 1176, 'unit' => 'per 1000 catheter days']],
            ['type' => 'clabsi_rate', 'val' => ['rate' => 0.52, 'cases' => 1, 'line_days' => 1923, 'unit' => 'per 1000 line days']],
            ['type' => 'ssi_rate', 'val' => ['rate' => 0.78, 'infections' => 2, 'surgeries' => 256, 'unit' => '%']],
            ['type' => 'med_error', 'val' => ['rate' => 1.15, 'errors' => 6, 'patient_days' => 5217, 'unit' => 'per 1000 patient days']],
            ['type' => 'patient_fall_rate', 'val' => ['rate' => 0.19, 'falls' => 1, 'patient_days' => 5217, 'unit' => 'per 1000 patient days']],
        ];

        foreach ($qualityIndicators as $qi) {
            $this->db->table('quality_records')->insert([
                'hospital_id' => $hospitalId,
                'department_id' => $deptMap['Infection Control & Quality'] ?? null,
                'type' => $qi['type'],
                'recorded_date' => date('Y-m-d'),
                'value_json' => json_encode($qi['val']),
                'recorded_by' => $nabhUserId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        // 12. Seed Sample CAPA (Corrective and Preventive Action)
        $this->db->table('capa')->insert([
            'hospital_id' => $hospitalId,
            'source_type' => 'Audit Finding - FMS Chapter',
            'source_id' => 1,
            'finding' => 'Fire damper inspection log in 3rd floor AHU room was overdue by 14 days during internal safety audit.',
            'responsible_user_id' => $nabhUserId,
            'due_date' => date('Y-m-d', strtotime('+10 days')),
            'evidence_path' => null,
            'status' => 'open',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        CLI::write("Comprehensive Demo Hospital Data Seeded Successfully!", 'green');
    }
}
