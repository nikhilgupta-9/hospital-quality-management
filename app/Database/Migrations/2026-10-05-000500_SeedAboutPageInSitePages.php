<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedAboutPageInSitePages extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        
        $exists = $db->table('site_pages')->where('slug', 'about')->countAllResults();
        
        if ($exists === 0) {
            $now = date('Y-m-d H:i:s');
            $db->table('site_pages')->insert([
                'slug'             => 'about',
                'title'            => 'About Hospital Quality Management',
                'subtitle'         => 'Empowering Indian Healthcare Facilities with NABH 5th Edition Digital Governance, ABDM M3 Interoperability & DPDP 2023 Compliance',
                'content'          => "### Clinical Excellence & Healthcare Quality Governance
Healthcare quality is a living, everyday commitment to patient safety, clinical accuracy, and zero preventable harm. **Hospital Quality Management (HQM)** bridges the gap between statutory NABH 5th Edition requirements and day-to-day departmental hospital operations.

By replacing fragmented paper files with structured, automated digital workflows, we empower Medical Directors, Nursing Superintendents, and Quality Coordinators to maintain continuous, 24/7 audit readiness.

### Our Core Mission
To eliminate compliance fragmentation across Indian hospitals and clinics by providing accessible, digitized SOP workflows, transparent audit trails, and data-driven clinical safety gates.

### Our Vision
To establish a national benchmark where every healthcare facility—from 20-bed day-care clinics to 500+ bed medical institutes—achieves and sustains accredited patient safety excellence without administrative burnout.

### Key Pillars of Hospital Quality Management
- **Full 10-Chapter NABH Scope**: Complete coverage across all 651 NABH 5th Edition objective elements.
- **Paperless SOPs & Policy Versioning**: Automated revision histories (V1.0 -> V2.0) and digital sign-offs.
- **Doctor Credentialing & Privileging Matrix**: Primary source degree verification and clinical scope tracking.
- **Biomedical Calibration & PPM Radar**: Pre-expiry NABL calibration alerts for critical ICU & OT equipment.
- **6-Point Clinical Safety Gate Architecture**: Enforces mandatory clinical safety checkpoints across triage, admission, surgery, and discharge.
- **DPDP Act 2023 & ABDM M3 Certified**: Secure 14-digit ABHA linking and tamper-proof SHA-256 cryptographic e-consent records.",
                'meta_title'       => 'About Hospital Quality Management Framework & NABH 5th Edition Advisory',
                'meta_description' => 'Learn about Hospital Quality Management (HQM) — the digital accreditation, clinical safety, and quality governance platform for Indian hospitals.',
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
        }
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $db->table('site_pages')->where('slug', 'about')->delete();
    }
}
