<?php

namespace App\Controllers\Equipment;

use App\Controllers\BaseController;

class EquipmentController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Equipment & Infrastructure Panel',
            'message' => 'Inventory, calibration, maintenance, utility systems, and checklist audits land here in the next build phase.',
        ], 'Equipment & Infrastructure');
    }
}
