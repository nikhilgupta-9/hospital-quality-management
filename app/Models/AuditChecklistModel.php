<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditChecklistModel extends Model
{
    protected $table            = 'audit_checklists';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'hospital_id', 'name', 'applies_to'
    ];

    public function getWithItems(int $checklistId)
    {
        $checklist = $this->find($checklistId);
        if ($checklist) {
            $itemModel = new ChecklistItemModel();
            $checklist['items'] = $itemModel->where('checklist_id', $checklistId)->orderBy('sort_order', 'ASC')->findAll();
        }
        return $checklist;
    }
}
