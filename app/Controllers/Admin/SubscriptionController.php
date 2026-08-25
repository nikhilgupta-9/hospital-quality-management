<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SubscriptionController extends BaseController
{
    public function index()
    {
        return $this->renderWithLayout('placeholder', [
            'heading' => 'Subscriptions & Licensing',
            'message' => 'Plan, seat count, and license expiry per hospital — lands in the next build phase.',
        ], 'Subscriptions');
    }
}
