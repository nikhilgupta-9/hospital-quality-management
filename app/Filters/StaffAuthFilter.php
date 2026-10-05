<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Staff & Departmental Authentication Guard Filter
 * 
 * Ensures requests to operational modules (/document, /hr, /equipment) are authenticated.
 */
class StaffAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Please sign in to access your quality workspace.');
            return redirect()->to('/login')->withCookies()->withHeaders();
        }

        $roleSlug = $session->get('role_slug');
        $allowedRoles = $arguments ?? [];

        if (! empty($allowedRoles) && ! in_array($roleSlug, $allowedRoles, true)) {
            return service('response')
                ->setStatusCode(403)
                ->setBody(view('errors/html/error_403', [
                    'message' => "Access Restricted: Your role ({$session->get('role_name')}) is not authorized to access this module.",
                ]));
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
