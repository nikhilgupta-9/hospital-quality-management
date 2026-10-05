<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FacilityAndEquipmentSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Seed Facility Safety Rounds & Defect Logs
        $defects = [
            [
                'hospital_id'             => 1,
                'department_id'           => 1, // Emergency
                'round_date'              => date('Y-m-d', strtotime('-3 days')),
                'inspector_name'          => 'Col. R. S. Rathore (Safety Head)',
                'location_area'           => 'Emergency Triage Bay - Corridor 2',
                'defect_category'         => 'Civil / Infrastructure',
                'description'             => 'Cracked non-slip floor tile near Triage entry creating tripping hazard for stretcher movements.',
                'severity'                => 'medium',
                'assigned_to'             => 'Civil Maintenance Team',
                'target_resolution_date'  => date('Y-m-d', strtotime('+4 days')),
                'resolution_date'         => null,
                'status'                  => 'in_progress',
                'corrective_action_taken' => 'Area cordoned with caution signage. Re-tiling contractor scheduled for night shift.',
                'evidence_notes'          => 'Tile crack span ~14 inches. High traffic corridor.',
                'verified_by'             => null,
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'             => 1,
                'department_id'           => 3, // OT Complex
                'round_date'              => date('Y-m-d', strtotime('-5 days')),
                'inspector_name'          => 'Dr. Ananya Sen (NABH Coordinator)',
                'location_area'           => 'OT Complex - Sterile Zone Fire Exit 3',
                'defect_category'         => 'Fire Safety',
                'description'             => 'Secondary emergency fire exit door push-bar latch sticking; requires lubrication and pressure test.',
                'severity'                => 'critical',
                'assigned_to'             => 'Fire & Security Dept (Officer Verma)',
                'target_resolution_date'  => date('Y-m-d', strtotime('-2 days')),
                'resolution_date'         => date('Y-m-d', strtotime('-1 days')),
                'status'                  => 'resolved',
                'corrective_action_taken' => 'Latch assembly overhauled, lubricated, and cycle-tested 20 times. 100% compliant.',
                'evidence_notes'          => 'Fire audit sign-off attached to building safety logbook.',
                'verified_by'             => 'Dr. Ananya Sen (NABH Quality Head)',
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'             => 1,
                'department_id'           => 2, // ICU
                'round_date'              => date('Y-m-d', strtotime('-1 days')),
                'inspector_name'          => 'Er. Vikram Mehta (Biomedical Lead)',
                'location_area'           => 'ICU Bed 12 Terminal Unit',
                'defect_category'         => 'Medical Gas (MGPS)',
                'description'             => 'Oxygen terminal outlet valve showing slight audible micro-leakage during flowmeter disengagement.',
                'severity'                => 'high',
                'assigned_to'             => 'MGPS Central Engineering Team',
                'target_resolution_date'  => date('Y-m-d', strtotime('+2 days')),
                'resolution_date'         => null,
                'status'                  => 'open',
                'corrective_action_taken' => 'Bed taken off-circuit; auxiliary O2 cylinder standby positioned.',
                'evidence_notes'          => 'O-ring seal degradation detected. Replacement kit requisitioned.',
                'verified_by'             => null,
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'             => 1,
                'department_id'           => 8, // Infection Control
                'round_date'              => date('Y-m-d', strtotime('-2 days')),
                'inspector_name'          => 'Dr. Ananya Sen & Infection Team',
                'location_area'           => 'Central CSSD Sterilization Corridor',
                'defect_category'         => 'HVAC / Clean Air',
                'description'             => 'Differential pressure gauge between Dirty and Clean washing zone reading below 15 Pascals (reading 9 Pa).',
                'severity'                => 'critical',
                'assigned_to'             => 'HVAC Maintenance (Er. Sunil)',
                'target_resolution_date'  => date('Y-m-d', strtotime('+1 days')),
                'resolution_date'         => null,
                'status'                  => 'in_progress',
                'corrective_action_taken' => 'Pre-filter and HEPA filter pressure drop inspected. Damper balance adjustment underway.',
                'evidence_notes'          => 'NABH HIC standard requires min. 15 Pa differential.',
                'verified_by'             => null,
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'             => 1,
                'department_id'           => 6, // Lab
                'round_date'              => date('Y-m-d', strtotime('-6 days')),
                'inspector_name'          => 'Col. R. S. Rathore (Safety Head)',
                'location_area'           => 'Biochemistry Waste Segregation Bay',
                'defect_category'         => 'Bio-Medical Waste',
                'description'             => 'Red and Yellow pedal bin foot-pedal spring loosened; hands-free operation impaired.',
                'severity'                => 'low',
                'assigned_to'             => 'Housekeeping & Facility Officer',
                'target_resolution_date'  => date('Y-m-d', strtotime('-3 days')),
                'resolution_date'         => date('Y-m-d', strtotime('-3 days')),
                'status'                  => 'closed',
                'corrective_action_taken' => 'Replaced with heavy-duty stainless steel foot pedal bin units.',
                'evidence_notes'          => 'BMW guideline compliance re-checked.',
                'verified_by'             => 'Col. R. S. Rathore',
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
        ];

        $db->table('facility_rounds_defects')->emptyTable();
        $db->table('facility_rounds_defects')->insertBatch($defects);

        // 2. Update Equipment PPM, Breakdown, and Statuses
        $equipmentUpdates = [
            1 => [
                'current_ppm_date'         => date('Y-m-d', strtotime('-4 months')),
                'next_ppm_date'            => date('Y-m-d', strtotime('+2 months')),
                'ppm_frequency_months'     => 6,
                'breakdown_downtime_hours' => 3,
                'last_breakdown_at'        => date('Y-m-d H:i:s', strtotime('-45 days')),
                'condemnation_status'      => 'none',
            ],
            2 => [
                'current_ppm_date'         => date('Y-m-d', strtotime('-5 months')),
                'next_ppm_date'            => date('Y-m-d', strtotime('+1 months')),
                'ppm_frequency_months'     => 6,
                'breakdown_downtime_hours' => 0,
                'last_breakdown_at'        => null,
                'condemnation_status'      => 'none',
            ],
            3 => [
                'current_ppm_date'         => date('Y-m-d', strtotime('-2 months')),
                'next_ppm_date'            => date('Y-m-d', strtotime('+4 months')),
                'ppm_frequency_months'     => 6,
                'breakdown_downtime_hours' => 6,
                'last_breakdown_at'        => date('Y-m-d H:i:s', strtotime('-18 days')),
                'condemnation_status'      => 'none',
            ],
        ];

        foreach ($equipmentUpdates as $eqId => $data) {
            $db->table('equipment')->where('id', $eqId)->update($data);
        }

        // Add 2 more realistic equipment to showcase Out of Order & Condemned state
        $additionalEquip = [
            [
                'id'                       => 4,
                'hospital_id'             => 1,
                'department_id'           => 7, // Radiology
                'asset_no'                => 'EQ-RAD-USG-04',
                'name'                    => 'Portable Ultrasound Scanner (Sonosite)',
                'category'                => 'Diagnostic Imaging',
                'manufacturer'            => 'FUJIFILM SonoSite',
                'model'                   => 'M-Turbo v3',
                'serial_no'               => 'SN-2014-99812',
                'purchase_date'           => '2014-06-15',
                'install_date'            => '2014-06-20',
                'warranty_expiry'         => '2017-06-20',
                'amc_cmc_expiry'          => '2023-12-31',
                'status'                  => 'out_of_order',
                'service_agency'          => 'SonoSite India Pvt Ltd',
                'breakdown_downtime_hours' => 240,
                'last_breakdown_at'        => date('Y-m-d H:i:s', strtotime('-30 days')),
                'current_ppm_date'         => '2023-11-10',
                'next_ppm_date'            => '2024-05-10',
                'ppm_frequency_months'     => 6,
                'condemnation_status'      => 'approved',
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
            [
                'id'                       => 5,
                'hospital_id'             => 1,
                'department_id'           => 4, // Cardiology
                'asset_no'                => 'EQ-CARD-ECG-07',
                'name'                    => '12-Channel Electrocardiograph (ECG)',
                'category'                => 'Diagnostic Equipment',
                'manufacturer'            => 'BPL Medical Technologies',
                'model'                   => 'Cardiart 9108D',
                'serial_no'               => 'BPL-2016-5542',
                'purchase_date'           => '2016-03-10',
                'install_date'            => '2016-03-15',
                'warranty_expiry'         => '2019-03-15',
                'amc_cmc_expiry'          => '2025-03-15',
                'status'                  => 'under_maintenance',
                'service_agency'          => 'BPL Technical Services',
                'breakdown_downtime_hours' => 48,
                'last_breakdown_at'        => date('Y-m-d H:i:s', strtotime('-4 days')),
                'current_ppm_date'         => date('Y-m-d', strtotime('-6 months')),
                'next_ppm_date'            => date('Y-m-d', strtotime('-5 days')),
                'ppm_frequency_months'     => 6,
                'condemnation_status'      => 'requested',
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($additionalEquip as $eq) {
            $existing = $db->table('equipment')->where('id', $eq['id'])->get()->getRowArray();
            if ($existing) {
                $db->table('equipment')->where('id', $eq['id'])->update($eq);
            } else {
                $db->table('equipment')->insert($eq);
            }
        }

        // 3. Seed Equipment Condemnations
        $condemnations = [
            [
                'hospital_id'           => 1,
                'equipment_id'          => 4, // Portable Ultrasound
                'requested_by'          => 'Er. Vikram Mehta (Chief Biomedical Engineer)',
                'request_reason'        => 'Transducer crystal burnout; main motherboard non-functional. OEM declared end-of-life and end-of-spare-support.',
                'technical_notes'       => 'BER (Beyond Economical Repair) confirmed by OEM technical team. Repair cost exceeds 85% of replacement asset value.',
                'original_cost'         => 1850000.00,
                'repair_estimate'       => 1600000.00,
                'committee_status'      => 'recommended',
                'committee_reviewed_at' => date('Y-m-d H:i:s', strtotime('-15 days')),
                'ms_status'             => 'approved',
                'ms_approved_at'        => date('Y-m-d H:i:s', strtotime('-10 days')),
                'scrap_certificate_no'  => 'NABH-SCRAP-2026-0041',
                'created_at'            => date('Y-m-d H:i:s', strtotime('-20 days')),
                'updated_at'            => date('Y-m-d H:i:s', strtotime('-10 days')),
            ],
            [
                'hospital_id'           => 1,
                'equipment_id'          => 5, // ECG Machine
                'requested_by'          => 'Dr. Rajesh Nair (Cardiology Incharge)',
                'request_reason'        => 'Frequent thermal printer motor lock and ECG channel artifacting; repeated motherboard resistor failures.',
                'technical_notes'       => 'Technical evaluation in progress by Condemnation Committee. Awaiting secondary quote from OEM.',
                'original_cost'         => 280000.00,
                'repair_estimate'       => 195000.00,
                'committee_status'      => 'pending',
                'committee_reviewed_at' => null,
                'ms_status'             => 'pending',
                'ms_approved_at'        => null,
                'scrap_certificate_no'  => null,
                'created_at'            => date('Y-m-d H:i:s', strtotime('-3 days')),
                'updated_at'            => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
        ];

        $db->table('equipment_condemnations')->emptyTable();
        $db->table('equipment_condemnations')->insertBatch($condemnations);

        // 4. Seed Live Digital Safety SOPs (Emergency Codes)
        $safetySops = [
            [
                'hospital_id'        => 1,
                'code_type'          => 'CODE RED',
                'title'              => 'Fire Safety & R.A.C.E. Emergency Protocol',
                'category'           => 'Fire & Life Safety',
                'sop_number'         => 'SOP-FMS-01',
                'version'            => 'v3.2',
                'summary'            => 'Standard operating response for fire, smoke, or explosion within hospital premises.',
                'action_steps'       => "1. RESCUE anyone in immediate danger.\n2. ALARM: Pull manual fire pull station & dial Ext. 5555 announcing 'Code Red' with floor and room location.\n3. CONTAIN: Close all doors and windows to isolate smoke.\n4. EXTINGUISH / EVACUATE: Use PASS technique (Pull, Aim, Squeeze, Sweep) for small fires or follow horizontal evacuation routes to nearest safe fire compartment.",
                'contact_extension'  => 'Dial 5555 / 101',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'        => 1,
                'code_type'          => 'CODE BLUE',
                'title'              => 'Adult & Pediatric Cardiopulmonary Resuscitation (CPR)',
                'category'           => 'Clinical Emergency',
                'sop_number'         => 'SOP-COP-04',
                'version'            => 'v4.0',
                'summary'            => 'Rapid response activation for cardiac or respiratory arrest.',
                'action_steps'       => "1. Assess responsiveness and check carotid pulse (<10 secs).\n2. Dial Ext. 5555 announcing 'Code Blue' with exact bed number.\n3. Immediate start of high-quality chest compressions (100-120/min, 30:2 ratio).\n4. Crash cart & Defibrillator arrived within 3 minutes; attach pads and analyze rhythm.",
                'contact_extension'  => 'Dial 5555 (Code Blue Team)',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'        => 1,
                'code_type'          => 'CODE AMBER',
                'title'              => 'Medical Gas (Oxygen / Nitrous / Vacuum) Failure Protocol',
                'category'           => 'Facility & Life Support',
                'sop_number'         => 'SOP-FMS-08',
                'version'            => 'v2.1',
                'summary'            => 'Instant contingency mitigation during line pressure drop or manifold valve failure.',
                'action_steps'       => "1. Central MGPS alarm triggers if line pressure drops below 4.0 bar.\n2. Duty Biomedical Engineer activates auxiliary emergency manifold bank instantly.\n3. Nursing staff in ICU/OT switch critical ventilated patients to E-type pin-indexed cylinders.\n4. Non-critical oxygen therapy patients supported via portable oxygen concentrators.",
                'contact_extension'  => 'Dial 5555 / MGPS Central Control Ext 4401',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'        => 1,
                'code_type'          => 'CODE YELLOW',
                'title'              => 'External Disaster & Mass Casualty Incident (MCI) Plan',
                'category'           => 'Disaster Management',
                'sop_number'         => 'SOP-FMS-03',
                'version'            => 'v3.0',
                'summary'            => 'Hospital-wide escalation upon influx of mass trauma casualties (>10 patients).',
                'action_steps'       => "1. Incident Commander (Medical Superintendent) declares Code Yellow.\n2. Triage Area activated in Emergency parking concourse; START triage tags (Red, Yellow, Green, Black) assigned.\n3. Elective surgeries halted; secondary OT teams mobilized for emergent laparotomies/craniotomies.\n4. Blood Bank initiates emergency O-Negative uncrossmatched reserve release.",
                'contact_extension'  => 'Incident Command Room Ext 5000',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'        => 1,
                'code_type'          => 'CODE PINK',
                'title'              => 'Infant / Pediatric Abduction & Security Lockdown',
                'category'           => 'Hospital Security',
                'sop_number'         => 'SOP-SEC-02',
                'version'            => 'v2.0',
                'summary'            => 'Immediate physical security perimeter sealing upon reported child missing.',
                'action_steps'       => "1. Announce Code Pink with floor, infant gender, clothing, and time noticed missing.\n2. Security immediately locks all stairwells, elevators, and vehicular perimeter gates.\n3. Every vehicle leaving premises stopped and searched by armed guards.\n4. CCTV room initiates instant rewind and trace across all exits.",
                'contact_extension'  => 'Chief Security Officer Ext 5500',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'hospital_id'        => 1,
                'code_type'          => 'CODE HAZMAT',
                'title'              => 'Chemical, Cytotoxic, & Blood Spillage Protocol',
                'category'           => 'Infection & Hazardous Materials',
                'sop_number'         => 'SOP-HIC-06',
                'version'            => 'v3.1',
                'summary'            => 'Safe neutralization and cleanup of bloodborne pathogens and chemotherapy spillages.',
                'action_steps'       => "1. Cordon off spillage area (>2 meter radius); put on complete PPE (N95 mask, heavy nitrile gloves, goggles, apron).\n2. Cover spill with absorbent paper towels.\n3. Pour freshly prepared 1% Sodium Hypochlorite (10,000 ppm) solution from outer perimeter inward.\n4. Allow 20 minutes contact time before collection in yellow biohazard autoclave bag.",
                'contact_extension'  => 'Infection Control Desk Ext 4200',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
        ];

        $db->table('safety_sops')->emptyTable();
        $db->table('safety_sops')->insertBatch($safetySops);
    }
}
