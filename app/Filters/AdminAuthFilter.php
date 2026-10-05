<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Administrative Authentication Guard Filter
 * 
 * Ensures only authenticated users with administrative privileges (super_admin, hospital_admin)
 * can access /admin/* and /hospital-admin/* endpoints.
 */
class AdminAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // If not logged in at all or not an admin
        if (! $session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Please sign in with your administrative credentials.');
            return redirect()->to('/admin/login')->withCookies()->withHeaders();
        }

        $roleSlug = $session->get('role_slug');
        $allowedAdminRoles = ['super_admin', 'hospital_admin'];

        // If a specific sub-role requirement was passed (e.g. ['super_admin'])
        if (! empty($arguments)) {
            $allowedAdminRoles = $arguments;
        }

        if (! in_array($roleSlug, $allowedAdminRoles, true)) {
            // Staff attempting to access admin route
            return service('response')
                ->setStatusCode(403)
                ->setBody(view('errors/html/error_403', [
                    'message' => "Access Restricted: Role '{$session->get('role_name')}' lacks administrative clearance for this section.",
                ]));
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
