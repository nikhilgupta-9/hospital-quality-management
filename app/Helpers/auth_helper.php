<?php

use CodeIgniter\Database\BaseBuilder;

/**
 * Small helpers used everywhere role/department scoping matters.
 * Autoloaded globally — see app/Config/Autoload.php $helpers.
 */
if (! function_exists('current_user')) {
    /**
     * The signed-in user's session data, or null if nobody is logged in.
     * Always includes role_slug once set at login — see LoginController.
     */
    function current_user(): ?array
    {
        $session = session();

        if (! $session->get('isLoggedIn')) {
            return null;
        }

        return [
            'id'            => $session->get('user_id'),
            'name'          => $session->get('user_name'),
            'email'         => $session->get('user_email'),
            'role_slug'     => $session->get('role_slug'),
            'role_name'     => $session->get('role_name'),
            'hospital_id'   => $session->get('hospital_id'),
            'department_id' => $session->get('department_id'),
        ];
    }
}

if (! function_exists('has_role')) {
    function has_role(string ...$slugs): bool
    {
        $user = current_user();

        return $user !== null && in_array($user['role_slug'], $slugs, true);
    }
}

if (! function_exists('is_dept_scoped')) {
    /**
     * True for the "Dept / Staff User" role — the one role in the RBAC
     * matrix (see the Blueprint's §03) whose visibility is narrowed to
     * its own department rather than the whole hospital.
     */
    function is_dept_scoped(): bool
    {
        return has_role('dept_user');
    }
}

if (! function_exists('scope_to_department')) {
    /**
     * Apply department scoping to a query builder for the current user.
     * Dept/Staff Users only ever see their own department's rows;
     * every other role sees the whole hospital. This is the model-layer
     * half of the two-layer RBAC described in the Blueprint (§03/§06) —
     * RoleFilter gates the route, this gates the data.
     */
    function scope_to_department(BaseBuilder $builder, string $column = 'department_id'): BaseBuilder
    {
        $user = current_user();

        if ($user !== null && is_dept_scoped() && $user['department_id']) {
            $builder->where($column, $user['department_id']);
        }

        return $builder;
    }
}

if (! function_exists('scope_to_hospital')) {
    /**
     * Every non-super-admin role only ever operates within their own
     * hospital. Applied on top of scope_to_department() where relevant.
     */
    function scope_to_hospital(BaseBuilder $builder, string $column = 'hospital_id'): BaseBuilder
    {
        $user = current_user();

        if ($user !== null && $user['role_slug'] !== 'super_admin' && $user['hospital_id']) {
            $builder->where($column, $user['hospital_id']);
        }

        return $builder;
    }
}
