<?php
require_once __DIR__ . '/bootstrap.php';
require_once ROOT_PATH . '/controllers/auth-controller.php';
require_once ROOT_PATH . '/controllers/dashboard-controller.php';

checkSessionTimeout();

$request = $_SERVER['REQUEST_URI'];
$basePath = '/';

$request = trim(str_replace($basePath, '', $request), '/');
$parts = explode('/', $request);
$route = $parts[0] ?: 'home';

$authController = new AuthController();
$dashboardController = new DashboardController();

switch ($route) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'dashboard':
        $dashboardController->index();
        break;
    case 'home':
    default:
        include ROOT_PATH . '/public/views/index.php';
        break;
}