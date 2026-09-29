<?php

/**
 * Hospital Quality Management — Root Redirection
 * Forwards root folder requests to public/ front controller
 */

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

// If public folder is already in URL, load it
if (file_exists(__DIR__ . '/public/index.php')) {
    header('Location: ' . $protocol . '://' . $host . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/public/');
    exit;
}
