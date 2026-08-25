<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Safety net for the "Dept / Staff User" role: blocks the request if that
 * role somehow has no department assigned, so a query that forgets to call
 * scope_to_department() fails closed (no department = no rows) rather than
 * silently returning hospital-wide data. The actual narrowing happens in
 * models via scope_to_department() / scope_to_hospital() — see
 * app/Helpers/auth_helper.php — this filter only guards the precondition.
 */
class DeptScopeFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! is_dept_scoped()) {
            return null; // not a dept-scoped role, nothing to check
        }

        $user = current_user();

        if (empty($user['department_id'])) {
            return service('response')
                ->setStatusCode(403)
                ->setBody(view('errors/html/error_403', [
                    'message' => 'Your account has no department assigned yet. Ask your NABH Coordinator to set one.',
                ]));
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
