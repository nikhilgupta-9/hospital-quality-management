<?php

namespace App\Controllers\HospitalAdmin;

use App\Controllers\BaseController;
use App\Models\HospitalModel;

class TemplatesVaultController extends BaseController
{
    protected HospitalModel $hospitalModel;

    public function __construct()
    {
        $this->hospitalModel = new HospitalModel();
    }

    protected function getActiveHospitalId(): int
    {
        $sessionHospitalId = (int) session()->get('hospital_id');
        if ($sessionHospitalId > 0) {
            return $sessionHospitalId;
        }

        $requestedId = (int) $this->request->getGet('hospital_id');
        if ($requestedId > 0 && has_role('super_admin')) {
            return $requestedId;
        }

        $firstHospital = $this->hospitalModel->first();
        return $firstHospital ? (int) $firstHospital['id'] : 1;
    }

    public function index()
    {
        $hospitalId = $this->getActiveHospitalId();
        $hospital   = $this->hospitalModel->find($hospitalId);
        $category   = $this->request->getGet('category') ?? 'all';

        // Preloaded Consultant Standard SOPs & Checklists for NABH 5th Edition
        $allTemplates = [
            [
                'id'          => 1,
                'code'        => 'SOP-OT-001',
                'title'       => 'Operation Theater Fumigation & Air Quality Sampling Protocol',
                'chapter'     => 'HIC / COP',
                'clause'      => 'COP.7 / HIC.2',
                'category'    => 'infection_control',
                'category_lbl'=> 'Infection Control (HIC)',
                'badge_color' => 'warning',
                'type'        => 'Standard Operating Procedure (SOP)',
                'updated_at'  => '2026-10-15',
                'downloads'   => 42,
                'description' => 'Comprehensive protocol for OT terminal cleaning, Bacillus stearothermophilus biological indicator verification, HEPA filter air velocity checks (0.45 m/s), and particle count records.',
                'content_summary' => "1. PURPOSE: Ensure zero surgical site infections (SSI) in major/minor operation theaters.\n2. FREQUENCY: Weekly deep clean and immediately post high-infection surgeries.\n3. PROCEDURE: Use accelerated hydrogen peroxide (0.5%) aerosolization, seal doors with warning placards for 4 hours, verify swab cultures before reopening.",
            ],
            [
                'id'          => 2,
                'code'        => 'SOP-MOM-004',
                'title'       => 'High-Alert & Look-Alike Sound-Alike (LASA) Medication Protocol',
                'chapter'     => 'MOM',
                'clause'      => 'MOM.3 / MOM.4',
                'category'    => 'pharmacy',
                'category_lbl'=> 'Pharmacy & Medication (MOM)',
                'badge_color' => 'danger',
                'type'        => 'Clinical Policy & Register',
                'updated_at'  => '2026-10-10',
                'downloads'   => 68,
                'description' => 'Mandatory double-sign protocol, Tall Man lettering standards, separated color-coded storage bins, and restricted access narcotic register.',
                'content_summary' => "1. IDENTIFICATION: Tall Man lettering (e.g., DOBUTamine vs DOPamine, HydrOXYzine vs HydrALAZINE).\n2. STORAGE: Segregated red-bordered shelves in central pharmacy and ICU satellite counters.\n3. ADMINISTRATION: Independent double-check by two Registered Nurses before IV administration.",
            ],
            [
                'id'          => 3,
                'code'        => 'SOP-FMS-009',
                'title'       => 'Hospital Fire Safety, Evacuation Drill & Code Red Protocol',
                'chapter'     => 'FMS',
                'clause'      => 'FMS.4 / FMS.5',
                'category'    => 'facility',
                'category_lbl'=> 'Facility & Safety (FMS)',
                'badge_color' => 'primary',
                'type'        => 'Disaster & Safety Plan',
                'updated_at'  => '2026-10-18',
                'downloads'   => 35,
                'description' => 'R.A.C.E & P.A.S.S standard instructions, fire marshal designation, smoke barrier zoning, and bi-annual mock drill documentation template.',
                'content_summary' => "1. R.A.C.E: Rescue vulnerable patients, Alarm pull station / Call 555, Confine fire by closing fire doors, Extinguish or Evacuate.\n2. ASSEMBLY POINT: Pre-designated North Gate Lawn with triage color zones (Red/Yellow/Green/Black).\n3. MOCK DRILL LOG: Time taken for full ward evacuation must be logged and submitted to Fire Officer.",
            ],
            [
                'id'          => 4,
                'code'        => 'SOP-HIC-003',
                'title'       => 'Bio-Medical Waste Segregation, Spillage Kit & Barcoded Disposal',
                'chapter'     => 'HIC',
                'clause'      => 'HIC.4',
                'category'    => 'infection_control',
                'category_lbl'=> 'Infection Control (HIC)',
                'badge_color' => 'warning',
                'type'        => 'Standard Operating Procedure (SOP)',
                'updated_at'  => '2026-10-01',
                'downloads'   => 89,
                'description' => 'Detailed 4-color categorization (Yellow, Red, White translucent, Blue), mercury & chemical spill kit management, and SPCB barcoded dispatch log.',
                'content_summary' => "1. YELLOW: Anatomical, soiled, expired medicine, chemical waste.\n2. RED: Contaminated plastic tubing, catheters, IV bottles, gloves.\n3. WHITE: Puncture-proof container for sharps, needles, blades.\n4. BLUE: Broken glassware, cytotoxic vials, ampoules.\n5. SPILLAGE: Sodium hypochlorite 1% contact time 20 minutes before cleanup.",
            ],
            [
                'id'          => 5,
                'code'        => 'SOP-PRE-002',
                'title'       => 'Morse Fall Risk Assessment & Vulnerable Patient Fall Prevention',
                'chapter'     => 'PRE / COP',
                'clause'      => 'PRE.2 / COP.2',
                'category'    => 'nursing',
                'category_lbl'=> 'Nursing & Patient Rights',
                'badge_color' => 'info',
                'type'        => 'Assessment Tool & Checklist',
                'updated_at'  => '2026-10-12',
                'downloads'   => 54,
                'description' => 'Admission screening Morse scale (0-125), yellow high-risk wristbands, 2-side bed-rail locks, and non-skid bathroom floor protocol.',
                'content_summary' => "1. SCORE: 0-24 Low Risk, 25-50 Medium Risk, >=51 High Risk.\n2. HIGH RISK INTERVENTIONS: Yellow wristband, bedside call bell within reach, assisted ambulation at all times.\n3. POST-FALL PROTOCOL: Immediate physician assessment, neuro vitals every 15 min for 1 hour, incident report filed within 24 hours.",
            ],
            [
                'id'          => 6,
                'code'        => 'SOP-HRM-005',
                'title'       => 'Doctor Clinical Privileging, 3-Tier Credentialing & Oaths Policy',
                'chapter'     => 'HRM',
                'clause'      => 'HRM.3',
                'category'    => 'hr',
                'category_lbl'=> 'Human Resources & Medical Staff',
                'badge_color' => 'secondary',
                'type'        => 'Governance Policy',
                'updated_at'  => '2026-09-28',
                'downloads'   => 29,
                'description' => 'Medical superintendent review, qualification primary source verification (PSV), core vs specialized procedure privileges, and annual re-evaluation.',
                'content_summary' => "1. PSV: Medical council registration verified directly with NMC / State Medical Council.\n2. CORE PRIVILEGES: Standard procedures granted based on board specialty.\n3. SPECIAL PRIVILEGES: High-complexity interventions (e.g., TAVR, ERCP) require documented case log proof of 50+ successful cases.",
            ],
            [
                'id'          => 7,
                'code'        => 'REG-COP-008',
                'title'       => 'Emergency Crash Cart Daily Shift Inspection & Defibrillator Log',
                'chapter'     => 'COP',
                'clause'      => 'COP.6',
                'category'    => 'clinical',
                'category_lbl'=> 'Clinical Operations (COP)',
                'badge_color' => 'danger',
                'type'        => 'Daily Register & Verification Log',
                'updated_at'  => '2026-10-20',
                'downloads'   => 76,
                'description' => 'Lock-seal integrity check, oxygen cylinder pressure (minimum 1500 psi), defibrillator test shock (30J test load), and drug expiration matrix.',
                'content_summary' => "1. DAILY SHIFT CHECK: Numbered plastic seal integrity logged every 8 hours.\n2. DEFIBRILLATOR: Daily battery test and test discharge log.\n3. DRUG EXPIRY: Visual audit on 1st of every month. Any medication within 30 days of expiry replaced immediately.",
            ],
            [
                'id'          => 8,
                'code'        => 'SOP-IMS-002',
                'title'       => 'DPDP Act 2023 Digital Patient E-Consent & Health Record Archival',
                'chapter'     => 'IMS / PRE',
                'clause'      => 'IMS.3 / PRE.4',
                'category'    => 'clinical',
                'category_lbl'=> 'Digital Health & IMS',
                'badge_color' => 'success',
                'type'        => 'Legal & Compliance Policy',
                'updated_at'  => '2026-10-22',
                'downloads'   => 61,
                'description' => 'Consent manager integration, revocable consent logging, encrypted EHR storage (AES-256), and ABDM FHIR standard adherence.',
                'content_summary' => "1. CONSENT MANAGER: Explicit, itemized, bilingual consent recorded before collecting health data.\n2. RETENTION: IPD records kept for 10 years, MLC (Medico-Legal) records preserved indefinitely.\n3. AUDIT LOGS: Every access to patient EHR timestamped with doctor user_id and IP address.",
            ],
        ];

        // Filter by category if selected
        if ($category !== 'all') {
            $templates = array_filter($allTemplates, function ($t) use ($category) {
                return $t['category'] === $category;
            });
        } else {
            $templates = $allTemplates;
        }

        return $this->renderWithLayout('hospital_admin/templates_vault', [
            'hospital'       => $hospital,
            'templates'      => $templates,
            'activeCategory' => $category,
            'totalCount'     => count($allTemplates),
        ], 'Ready to Use Templates (Consultant Vault)');
    }

    public function download($id)
    {
        $id = (int) $id;
        // Generate formatted text document for immediate download
        $templateTitle = "NABH_5th_Ed_SOP_Template_" . $id . ".txt";
        
        $content = "========================================================================\n";
        $content .= "HOSPITAL QUALITY MANAGEMENT SYSTEM — CONSULTANT SOP VAULT\n";
        $content .= "Standard Document for NABH 5th Edition Accreditation\n";
        $content .= "Generated for Active Hospital: " . date('Y-m-d H:i:s') . "\n";
        $content .= "========================================================================\n\n";
        $content .= "DOCUMENT ID: " . $id . "\n";
        $content .= "STATUS: Approved Consultant Baseline Standard\n";
        $content .= "APPLICABILITY: All Inpatient and Outpatient Departments\n\n";
        $content .= "--- [DOCUMENT BODY] ---\n";
        $content .= "1. POLICY STATEMENT: The hospital shall maintain strict adherence to quality and patient safety as stipulated in NABH 5th Edition standards.\n";
        $content .= "2. SCOPE: Medical, Nursing, Paramedical, and Administrative Personnel.\n";
        $content .= "3. RESPONSIBILITY: Head of Department and Quality Manager.\n";
        $content .= "4. AUDIT & REVIEW: Annual internal audit with corrective action tracking (CAPA).\n\n";
        $content .= "Certified by HQM Digital Mitra Quality Engine.\n";

        return $this->response
            ->setHeader('Content-Type', 'text/plain')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $templateTitle . '"')
            ->setBody($content);
    }
}
