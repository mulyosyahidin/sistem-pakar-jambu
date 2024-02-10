<?php

use App\Enums\UserRole;

if (!function_exists('activeClass')) {
    /**
     * Return active class if current route is equal to given route
     *
     * @param array|string $routes
     * @param string $class
     * @param array $queries
     * @return string
     */
    function activeClass(array|string $routes = [], string $class = 'active', array $queries = []): string
    {
        if (is_string($routes)) {
            $routes = [$routes];
        }

        foreach ($routes as $key => $value) {
            if (request()->routeIs($value)) {
                // If current route is equal to given route, return active class
                return $class;
            }
        }

        if (count($queries) > 0) {
            foreach ($queries as $key => $value) {
                if (request()->query($key) == $value) {
                    return $class;
                }
            }
        }

        return '';
    }
}

if (!function_exists('getDashboardUrl')) {
    /**
     * Get dashboard url based on user role
     *
     * @param $role
     * @return string
     */
    function getDashboardUrl($role = null): string
    {
        $role = $role ?? auth()->user()->role;

        return match ($role) {
            UserRole::ADMIN->value => route('admin.dashboard'),
        };
    }
}
