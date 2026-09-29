<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PageModel;
use App\Models\AuditLogModel;

class PageController extends BaseController
{
    protected PageModel $pageModel;
    protected AuditLogModel $auditLogModel;

    public function __construct()
    {
        $this->pageModel     = new PageModel();
        $this->auditLogModel = new AuditLogModel();
    }

    /**
     * List all CMS & Legal pages for management
     */
    public function index(): string
    {
        $pages = $this->pageModel->orderBy('id', 'ASC')->findAll();

        return $this->renderWithLayout('admin/pages/index', [
            'pages' => $pages,
        ], 'Legal & Public Pages (CMS)');
    }

    /**
     * Show edit form for a page
     */
    public function edit(string $slug): string
    {
        $page = $this->pageModel->getBySlug($slug);

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Page not found: {$slug}");
        }

        return $this->renderWithLayout('admin/pages/edit', [
            'page' => $page,
        ], "Edit Page — {$page['title']}");
    }

    /**
     * Update page content
     */
    public function update(string $slug)
    {
        $page = $this->pageModel->getBySlug($slug);

        if (!$page) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }

        $rules = [
            'title'   => 'required|min_length[3]|max_length[255]',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $oldData = $page;
        $newData = [
            'title'            => $this->request->getPost('title'),
            'subtitle'         => $this->request->getPost('subtitle'),
            'content'          => $this->request->getPost('content'),
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
        ];

        $this->pageModel->update($page['id'], $newData);

        // Record audit trail safely
        try {
            $userId = session()->get('user_id');
            $hospitalId = session()->get('hospital_id');
            $this->auditLogModel->log(
                'UPDATE_CMS_PAGE',
                'ADMIN',
                $hospitalId,
                $userId,
                'site_pages',
                $page['id'],
                $oldData,
                $newData
            );
        } catch (\Throwable $e) {
            log_message('error', 'Audit log error: ' . $e->getMessage());
        }

        return redirect()->to('/admin/pages')->with('success', "Page '{$page['title']}' updated successfully.");
    }
}
