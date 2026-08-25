<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Users & RBAC',
            'message' => 'Create users and assign roles/departments here — CRUD lands in the next build phase.',
        ], 'Users');
    }
}
