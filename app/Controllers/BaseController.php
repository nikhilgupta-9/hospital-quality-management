<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    /**
     * Renders a panel view inside the authenticated app shell
     * (app/Views/layouts/main.php). Every logged-in-only controller
     * should render through this rather than calling view() directly,
     * so the sidebar/header stay consistent across all three panels.
     *
     * Swap in the real project theme by editing layouts/main.php alone —
     * no panel controller needs to change.
     */
    protected function renderWithLayout(string $viewPath, array $data = [], string $title = 'Dashboard'): string
    {
        $body = view($viewPath, $data);

        return view('layouts/main', [
            'title' => $title,
            'body'  => $body,
        ]);
    }
}
