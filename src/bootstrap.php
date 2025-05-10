<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__FILE__));
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/');
}

$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    die("Composer autoloader not found. Run 'composer install' first.");
}

if (session_status() == PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_samesite', 'Lax');
    ini_set('session.gc_maxlifetime', 1800); // 30 minutes

    session_start();
}

require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/utils/helpers.php';