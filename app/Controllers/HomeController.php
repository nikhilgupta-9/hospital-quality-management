<?php

namespace App\Controllers;

use App\Models\PageModel;

class HomeController extends BaseController
{
    protected PageModel $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    public function index(): string
    {
        return view('layouts/public', [
            'title'   => 'Hospital Quality Management — NABH 5th Edition & JCI Guidance',
            'content' => view('public/home'),
        ]);
    }

    public function standards(): string
    {
        return view('layouts/public', [
            'title'   => 'NABH 5th Edition Standards Directory & Objective Elements — Hospital Quality',
            'content' => view('public/standards'),
        ]);
    }

    public function sopSuite(): string
    {
        return view('layouts/public', [
            'title'   => 'Document & SOP Suite — NABH 5th Edition Policies & Clinical Protocols',
            'content' => view('public/sop_suite'),
        ]);
    }

    public function hrSuite(): string
    {
        return view('layouts/public', [
            'title'   => 'HR & Credentialing Suite — Doctor Privileging & Staff Competency (HRM)',
            'content' => view('public/hr_suite'),
        ]);
    }

    public function equipmentGrid(): string
    {
        return view('layouts/public', [
            'title'   => 'Equipment & Utilities Grid — NABH 5th Edition Medical Device & Facility Safety (FMS)',
            'content' => view('public/equipment_grid'),
        ]);
    }

    public function clinicalWorkflow(): string
    {
        return view('layouts/public', [
            'title'   => 'Digital Clinical Workflow & DPDP Consent Management — Hospital Quality Management (HQM)',
            'content' => view('public/clinical_workflow'),
        ]);
    }

    public function qualityIndicators(): string
    {
        return view('layouts/public', [
            'title'   => 'Hospital Quality Indicators & Live KPI Calculator — NABH Benchmark',
            'content' => view('public/indicators'),
        ]);
    }

    public function checklists(): string
    {
        return view('layouts/public', [
            'title'   => 'Hospital Audit Checklists (OT, ICU, Fire Safety, BMW) — Hospital Quality',
            'content' => view('public/checklists'),
        ]);
    }

    public function assessmentTool(): string
    {
        return view('layouts/public', [
            'title'   => 'Interactive NABH Hospital Readiness Quiz & Gap Estimator — Hospital Quality',
            'content' => view('public/assessment'),
        ]);
    }

    public function about(): string
    {
        return view('layouts/public', [
            'title'   => 'About Hospital Quality Management Framework & Advisory',
            'content' => view('public/about'),
        ]);
    }

    public function contact(): string
    {
        return view('layouts/public', [
            'title'   => 'Contact & Accreditation Consultation Request — Hospital Quality',
            'content' => view('public/contact'),
        ]);
    }

    public function submitContact()
    {
        session()->setFlashdata('contact_success', 'Thank you! Your quality advisory request has been received. Our NABH lead assessor will contact you within 24 hours.');
        return redirect()->to('/contact');
    }

    /**
     * Privacy Policy page
     */
    public function privacyPolicy(): string
    {
        $page = $this->pageModel->getBySlug('privacy-policy');
        return view('layouts/public', [
            'title'   => $page['meta_title'] ?? 'Privacy Policy — Hinton Hospital Quality Management',
            'content' => view('public/page', [
                'page'      => $page,
                'slug'      => 'privacy-policy',
                'badge'     => 'Data Protection & Security',
                'badgeIcon' => 'fas fa-user-shield',
            ]),
        ]);
    }

    /**
     * Terms of Service page
     */
    public function termsOfService(): string
    {
        $page = $this->pageModel->getBySlug('terms-of-service');
        return view('layouts/public', [
            'title'   => $page['meta_title'] ?? 'Terms of Service — Hinton Hospital Quality Management',
            'content' => view('public/page', [
                'page'      => $page,
                'slug'      => 'terms-of-service',
                'badge'     => 'Governance & Compliance Agreement',
                'badgeIcon' => 'fas fa-file-contract',
            ]),
        ]);
    }

    /**
     * Compliance Disclaimer page
     */
    public function complianceDisclaimer(): string
    {
        $page = $this->pageModel->getBySlug('compliance-disclaimer');
        return view('layouts/public', [
            'title'   => $page['meta_title'] ?? 'Compliance Disclaimer — Hinton Hospital Quality Management',
            'content' => view('public/page', [
                'page'      => $page,
                'slug'      => 'compliance-disclaimer',
                'badge'     => 'Statutory & Regulatory Advisory',
                'badgeIcon' => 'fas fa-scale-balanced',
            ]),
        ]);
    }

    /**
     * Portal Gateway Hub
     */
    public function portalGateway(): string
    {
        $page = $this->pageModel->getBySlug('portal-gateway');
        return view('layouts/public', [
            'title'   => $page['meta_title'] ?? 'Portal Gateway — Hinton Hospital Quality Management',
            'content' => view('public/portal_gateway', [
                'page' => $page,
            ]),
        ]);
    }
}
