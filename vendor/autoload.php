<?php

/**
 * Hand-written PSR-4 autoloader.
 *
 * This project's sandbox build environment cannot reach Packagist, so the two
 * runtime dependencies (laminas/laminas-escaper, psr/log) and the framework
 * itself (codeigniter4/framework) were vendored directly from their GitHub
 * sources instead of via `composer install`. This file replaces the
 * Composer-generated autoloader with an equivalent minimal PSR-4 loader.
 *
 * IMPORTANT FOR THE TEAM: once this project is on a machine with normal
 * Packagist access (e.g. via XAMPP on a regular network), you can safely
 * run `composer install` there — a standard composer.json is included at
 * the project root — and Composer will regenerate this file properly.
 * Nothing else in the app depends on this file being hand-written.
 */

require_once __DIR__ . '/intl_polyfill.php';

spl_autoload_register(static function (string $class): void {
    static $prefixes = [
        'CodeIgniter\\'    => __DIR__ . '/../system/',
        'Config\\'         => __DIR__ . '/../app/Config/',
        'App\\'            => __DIR__ . '/../app/',
        'Psr\\Log\\'       => __DIR__ . '/psr/log/src/',
        'Laminas\\Escaper\\' => __DIR__ . '/laminas/laminas-escaper/src/',
    ];

    foreach ($prefixes as $prefix => $baseDir) {
        if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
            continue;
        }

        $relative = substr($class, strlen($prefix));
        $file     = $baseDir . str_replace('\\', '/', $relative) . '.php';

        if (is_file($file)) {
            require $file;
            return;
        }
    }
});
