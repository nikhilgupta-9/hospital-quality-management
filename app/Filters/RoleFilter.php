<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Route-level half of the two-layer RBAC described in the Blueprint (§03).
 *
 * Usage in Routes.php:
 *   $routes->group('document', ['filter' => 'role:nabh_coordinator,dept_user'], ...);
 *
 * Blocks the request entirely — before the controller ever runs — unless
 * the signed-in user's role slug is in the allowed list.
 */
class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Please sign in to continue.');

            return redirect()->to('/login')->withCookies()->withHeaders();
        }

        $allowedRoles = $arguments ?? [];

        if ($allowedRoles !== [] && ! in_array($session->get('role_slug'), $allowedRoles, true)) {
            return service('response')
                ->setStatusCode(403)
                ->setBody(view('errors/html/error_403', [
                    'message' => "Your role ({$session->get('role_name')}) doesn't have access to this section.",
                ]));
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
