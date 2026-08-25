<?php

namespace App\Controllers\Document;

use App\Controllers\BaseController;

class DocumentController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Document Panel',
            'message' => 'SOPs, policies, NABH evidence, versioning, and the approval workflow land here in the next build phase.',
        ], 'Documents');
    }
}
