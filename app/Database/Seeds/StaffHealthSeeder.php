<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StaffHealthSeeder extends Seeder
{
    public function run()
    {
        $hospital = $this->db->table('hospitals')->get()->getRow();
        if (!$hospital) return;

        $staffList = $this->db->table('staff')->where('hospital_id', $hospital->id)->get()->getResultArray();
        if (empty($staffList)) return;

        // 1. Seed Health & Vaccination Records
        foreach ($staffList as $index => $staff) {
            $existingHealth = $this->db->table('staff_health_records')->where('staff_id', $staff['id'])->get()->getRow();
            if (!$existingHealth) {
                $statusList = ['vaccinated', 'vaccinated', 'partially_vaccinated', 'due_booster'];
                $status = $statusList[$index % count($statusList)];
                $titerList = ['>100 mIU/mL (Strong Immunity)', '>50 mIU/mL (Adequate Protection)', '12 mIU/mL (Low Titer - Booster Due)', '>150 mIU/mL (Optimal Immunity)'];

                $this->db->table('staff_health_records')->insert([
                    'staff_id' => $staff['id'],
                    'hepb_dose1_date' => '2023-01-10',
                    'hepb_dose2_date' => '2023-02-12',
                    'hepb_dose3_date' => ($status === 'partially_vaccinated') ? null : '2023-07-15',
                    'hepb_booster_date' => ($status === 'due_booster') ? null : '2025-08-10',
                    'hepb_status' => $status,
                    'anti_hbs_titer' => $titerList[$index % count($titerList)],
                    'tt_vaccine_date' => '2024-03-20',
                    'annual_checkup_date' => date('Y-m-d', strtotime('-' . ($index * 30 + 10) . ' days')),
                    'fitness_status' => ($index === 2) ? 'fit_with_restriction' : 'fit',
                    'medical_officer_name' => 'Dr. R. K. Saxena (Occupational Health Officer)',
                    'health_remarks' => ($index === 2) ? 'Cleared for clinical duties with mandatory N95 mask and latex-free gloves.' : 'Fit for full clinical and procedural hospital duties without restrictions.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        // 2. Enhance Credentialing with Privileging Status
        $procedures = [
            ['proc' => 'Invasive Arterial Line & Central Venous Cannulation', 'type' => 'core', 'status' => 'approved', 'comm' => 'ms_approved', 'notes' => 'Credentials Committee verified with ICU logbook.'],
            ['proc' => 'Primary PCI & Transradial Coronary Angioplasty', 'type' => 'specific', 'status' => 'approved', 'comm' => 'ms_approved', 'notes' => 'Specific High-Risk privilege granted after cath lab peer review.'],
            ['proc' => 'WHO Surgical Safety Checklist & Sterility Zone Lead', 'type' => 'core', 'status' => 'approved', 'comm' => 'committee_approved', 'notes' => 'Awaiting final Medical Superintendent countersign.'],
            ['proc' => 'Fiberoptic Bronchoscopy & Difficult Airway Intubation', 'type' => 'high_risk', 'status' => 'approved', 'comm' => 'ms_approved', 'notes' => 'High-risk anaesthesia privilege verified by Credentials Board.'],
        ];

        foreach ($staffList as $i => $s) {
            $pData = $procedures[$i % count($procedures)];
            $this->db->table('credentialing')
                ->where('staff_id', $s['id'])
                ->update([
                    'procedure' => $pData['proc'],
                    'privilege_type' => $pData['type'],
                    'committee_status' => $pData['comm'],
                    'committee_reviewed_at' => date('Y-m-d H:i:s', strtotime('-15 days')),
                    'ms_approved_at' => ($pData['comm'] === 'ms_approved') ? date('Y-m-d H:i:s', strtotime('-10 days')) : null,
                    'notes' => $pData['notes'],
                    'valid_until' => date('Y-m-d', strtotime('+1 year')),
                ]);
        }

        // 3. Seed Expiry Alert Logs
        $alerts = [
            [
                'staff_id' => $staffList[0]['id'],
                'alert_type' => 'council_reg',
                'days_threshold' => 30,
                'expiry_date' => date('Y-m-d', strtotime('+28 days')),
                'sent_channel' => 'email_sms',
                'status' => 'notified',
                'details' => 'State Medical Council license MMC-89103-MH expiring in 28 days. Renewal link sent.',
            ],
            [
                'staff_id' => $staffList[1]['id'],
                'alert_type' => 'bls_acls',
                'days_threshold' => 15,
                'expiry_date' => date('Y-m-d', strtotime('+12 days')),
                'sent_channel' => 'email_sms',
                'status' => 'notified',
                'details' => 'AHA ACLS Provider recertification drill required before 12 days.',
            ],
            [
                'staff_id' => $staffList[2]['id'],
                'alert_type' => 'vaccine_booster',
                'days_threshold' => 60,
                'expiry_date' => date('Y-m-d', strtotime('+45 days')),
                'sent_channel' => 'in_app',
                'status' => 'acknowledged',
                'details' => 'Hepatitis-B anti-HBs titer <100 mIU/mL; booster dose scheduled with occupational health clinic.',
            ],
        ];

        foreach ($alerts as $a) {
            $this->db->table('expiry_alert_logs')->insert(array_merge($a, [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]));
        }
    }
}
