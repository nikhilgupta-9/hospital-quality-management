<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PricingPlanModel;
use App\Models\AuditLogModel;

class PricingController extends BaseController
{
    protected PricingPlanModel $pricingModel;
    protected AuditLogModel $auditLogModel;

    public function __construct()
    {
        $this->pricingModel  = new PricingPlanModel();
        $this->auditLogModel = new AuditLogModel();
    }

    /**
     * List all SaaS pricing plans for Super Admin management
     */
    public function index(): string
    {
        $plans = $this->pricingModel->getAllAdminPlans();

        return $this->renderWithLayout('admin/pricing/index', [
            'plans' => $plans,
        ], 'SaaS Pricing Plans & Subscriptions Management');
    }

    /**
     * Create a new Pricing Tier
     */
    public function create()
    {
        $rules = [
            'name'          => 'required|min_length[3]|max_length[150]',
            'slug'          => 'required|min_length[3]|max_length[100]|is_unique[pricing_plans.slug]',
            'bed_capacity'  => 'required',
            'price_monthly' => 'required|numeric',
            'price_yearly'  => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process features from textarea (one per line) into JSON array
        $rawFeatures = $this->request->getPost('features_text');
        $featuresArray = array_values(array_filter(array_map('trim', explode("\n", (string)$rawFeatures))));

        $data = [
            'name'           => trim((string)$this->request->getPost('name')),
            'slug'           => url_title(trim((string)$this->request->getPost('slug')), '-', true),
            'tagline'        => trim((string)$this->request->getPost('tagline')),
            'badge_text'     => trim((string)$this->request->getPost('badge_text')),
            'bed_capacity'   => trim((string)$this->request->getPost('bed_capacity')),
            'price_monthly'  => (float)$this->request->getPost('price_monthly'),
            'price_yearly'   => (float)$this->request->getPost('price_yearly'),
            'currency'       => $this->request->getPost('currency') ?: '₹',
            'billing_period' => $this->request->getPost('billing_period') ?: '/ month (billed annually)',
            'max_users'      => (int)$this->request->getPost('max_users'),
            'features_list'  => json_encode($featuresArray),
            'is_popular'     => $this->request->getPost('is_popular') ? 1 : 0,
            'is_active'      => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'     => (int)$this->request->getPost('sort_order'),
            'cta_text'       => $this->request->getPost('cta_text') ?: 'Get Started',
            'cta_url'        => $this->request->getPost('cta_url') ?: 'contact',
        ];

        $planId = $this->pricingModel->insert($data);

        $userId = session()->get('user_id') ?? 1;
        $this->auditLogModel->log(
            $userId,
            'create',
            'pricing_plans',
            $planId,
            null,
            $data
        );

        return redirect()->to('/admin/pricing')->with('success', "Pricing Plan '{$data['name']}' created successfully.");
    }

    /**
     * Update an existing Pricing Plan
     */
    public function update(int $id)
    {
        $plan = $this->pricingModel->find($id);
        if (!$plan) {
            return redirect()->to('/admin/pricing')->with('error', 'Pricing plan not found.');
        }

        $rules = [
            'name'          => 'required|min_length[3]|max_length[150]',
            'slug'          => "required|min_length[3]|max_length[100]|is_unique[pricing_plans.slug,id,{$id}]",
            'bed_capacity'  => 'required',
            'price_monthly' => 'required|numeric',
            'price_yearly'  => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rawFeatures = $this->request->getPost('features_text');
        $featuresArray = array_values(array_filter(array_map('trim', explode("\n", (string)$rawFeatures))));

        $data = [
            'name'           => trim((string)$this->request->getPost('name')),
            'slug'           => url_title(trim((string)$this->request->getPost('slug')), '-', true),
            'tagline'        => trim((string)$this->request->getPost('tagline')),
            'badge_text'     => trim((string)$this->request->getPost('badge_text')),
            'bed_capacity'   => trim((string)$this->request->getPost('bed_capacity')),
            'price_monthly'  => (float)$this->request->getPost('price_monthly'),
            'price_yearly'   => (float)$this->request->getPost('price_yearly'),
            'currency'       => $this->request->getPost('currency') ?: '₹',
            'billing_period' => $this->request->getPost('billing_period') ?: '/ month (billed annually)',
            'max_users'      => (int)$this->request->getPost('max_users'),
            'features_list'  => json_encode($featuresArray),
            'is_popular'     => $this->request->getPost('is_popular') ? 1 : 0,
            'is_active'      => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'     => (int)$this->request->getPost('sort_order'),
            'cta_text'       => $this->request->getPost('cta_text') ?: 'Get Started',
            'cta_url'        => $this->request->getPost('cta_url') ?: 'contact',
        ];

        $this->pricingModel->update($id, $data);

        $userId = session()->get('user_id') ?? 1;
        $this->auditLogModel->log(
            $userId,
            'update',
            'pricing_plans',
            $id,
            $plan,
            $data
        );

        return redirect()->to('/admin/pricing')->with('success', "Pricing Plan '{$data['name']}' updated successfully.");
    }

    /**
     * Delete / Remove a Pricing Plan
     */
    public function delete(int $id)
    {
        $plan = $this->pricingModel->find($id);
        if (!$plan) {
            return redirect()->to('/admin/pricing')->with('error', 'Pricing plan not found.');
        }

        $this->pricingModel->delete($id);

        $userId = session()->get('user_id') ?? 1;
        $this->auditLogModel->log(
            $userId,
            'delete',
            'pricing_plans',
            $id,
            $plan,
            null
        );

        return redirect()->to('/admin/pricing')->with('success', "Pricing Plan '{$plan['name']}' deleted.");
    }

    /**
     * Quick Toggle Active Status
     */
    public function toggleActive(int $id)
    {
        $plan = $this->pricingModel->find($id);
        if (!$plan) {
            return redirect()->to('/admin/pricing')->with('error', 'Pricing plan not found.');
        }

        $newStatus = $plan['is_active'] ? 0 : 1;
        $this->pricingModel->update($id, ['is_active' => $newStatus]);

        $statusLabel = $newStatus ? 'activated' : 'deactivated';
        return redirect()->to('/admin/pricing')->with('success', "Plan '{$plan['name']}' is now {$statusLabel}.");
    }
}
