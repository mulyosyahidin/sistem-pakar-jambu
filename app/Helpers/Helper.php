<?php

use App\Enums\UserRole;

if (! function_exists('activeClass')) {
    /**
     * Return active class if current route is equal to given route
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

if (! function_exists('getDashboardUrl')) {
    /**
     * Get dashboard url based on user role
     */
    function getDashboardUrl($role = null): string
    {
        $role = $role ?? auth()->user()->role;

        return match ($role) {
            UserRole::ADMIN->value => route('admin.dashboard'),
            UserRole::USER->value => route('user.dashboard'),
        };
    }
}

if (! function_exists('getSidebarFileName')) {

    /**
     * Get sidebar file name based on user role
     */
    function getSidebarFileName($role = null): string
    {
        $role = $role ?? auth()->user()->role;

        return match ($role) {
            UserRole::ADMIN->value => 'layouts.includes.admin.sidebar',
            UserRole::USER->value => 'layouts.includes.user.sidebar',
        };
    }
}

if (! function_exists('getYoutubeVideoId')) {
    /**
     * Get youtube video id from youtube url
     */
    function getYoutubeVideId($url): string
    {
        $videoId = '';

        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
            $videoId = $id[1];
        } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
            $videoId = $id[1];
        } elseif (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
            $videoId = $id[1];
        } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
            $videoId = $id[1];
        }

        return $videoId;
    }
}
