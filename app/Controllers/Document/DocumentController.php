<?php

namespace App\Controllers\Document;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\DocumentVersionModel;
use App\Models\DepartmentModel;
use App\Models\CapaModel;
use App\Models\AuditLogModel;

class DocumentController extends BaseController
{
    protected $documentModel;
    protected $deptModel;
    protected $capaModel;
    protected $auditLogModel;

    public function __construct()
    {
        $this->documentModel = new DocumentModel();
        $this->deptModel     = new DepartmentModel();
        $this->capaModel     = new CapaModel();
        $this->auditLogModel = new AuditLogModel();
    }

    public function index()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $deptId = session()->get('department_id'); // dept_user scoped if present

        $documents = $this->documentModel->getWithDetails($hospitalId, $deptId);
        $expiring  = $this->documentModel->getExpiringSoon($hospitalId, 30);
        $departments = $this->deptModel->where('hospital_id', $hospitalId)->findAll();
        $capas = $this->capaModel->getWithDetails($hospitalId);

        return $this->renderWithLayout('document/index', [
            'documents'    => $documents,
            'expiringDocs' => $expiring,
            'departments'  => $departments,
            'capas'        => $capas,
        ], 'Document & Quality Evidence Suite');
    }

    public function create()
    {
        $hospitalId = session()->get('hospital_id') ?? 1;
        $userId     = session()->get('user_id') ?? 1;

        $docData = [
            'hospital_id'   => $hospitalId,
            'department_id' => $this->request->getPost('department_id'),
            'category'      => $this->request->getPost('category'),
            'title'         => $this->request->getPost('title'),
            'doc_number'    => $this->request->getPost('doc_number'),
            'owner_id'      => $userId,
            'issue_date'    => $this->request->getPost('issue_date'),
            'review_date'   => $this->request->getPost('expiry_date'),
            'expiry_date'   => $this->request->getPost('expiry_date'),
            'status'        => 'published',
        ];

        $docId = $this->documentModel->insert($docData);

        // Add version
        $versionModel = new DocumentVersionModel();
        $verId = $versionModel->insert([
            'document_id' => $docId,
            'version_no'  => '1.0',
            'file_path'   => 'uploads/documents/' . sanitize_filename($this->request->getPost('title')) . '.pdf',
            'change_note' => $this->request->getPost('change_note') ?: 'Initial version created',
            'uploaded_by' => $userId,
            'uploaded_at' => date('Y-m-d H:i:s'),
        ]);

        $this->documentModel->update($docId, ['current_version_id' => $verId]);

        $this->auditLogModel->log('CREATE_DOCUMENT', 'DOCUMENT', $hospitalId, $userId, 'documents', $docId, null, $docData);

        return redirect()->to('/document')->with('message', 'Document ' . esc($this->request->getPost('doc_number')) . ' created successfully.');
    }

    public function closeCapa($capaId)
    {
        $this->capaModel->update($capaId, [
            'status'    => 'closed',
            'closed_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/document')->with('message', 'CAPA action closed successfully.');
    }

    public function export()
    {
        // Generates structured JSON/text bundle for NABH submission
        $hospitalId = session()->get('hospital_id') ?? 1;
        $documents  = $this->documentModel->getWithDetails($hospitalId);
        
        $exportData = [
            'hospital_code'      => 'MAX-DEL-01',
            'framework'          => 'NABH 5th Edition Standard Evidence Bundle',
            'generated_at'       => date('Y-m-d H:i:s'),
            'total_documents'    => count($documents),
            'documents_manifest' => $documents,
        ];

        return $this->response->setJSON($exportData);
    }
}
