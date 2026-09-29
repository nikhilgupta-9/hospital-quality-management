<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

if (!function_exists('site_setting')) {
    /**
     * Retrieve a global site setting by key with an optional fallback.
     */
    function site_setting(string $key, ?string $default = null): ?string
    {
        static $settingsMap = null;
        if ($settingsMap === null) {
            try {
                $model = new \App\Models\SettingModel();
                $settingsMap = $model->getAllAsMap();
            } catch (\Throwable $e) {
                $settingsMap = [];
            }
        }

        return $settingsMap[$key] ?? $default;
    }
}
