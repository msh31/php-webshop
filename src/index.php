<?php
require_once __DIR__ . '/bootstrap.php';
require_once ROOT_PATH . '/controllers/auth-controller.php';
require_once ROOT_PATH . '/controllers/dashboard-controller.php';
require_once ROOT_PATH . '/controllers/product-controller.php';
//require_once ROOT_PATH . '/controllers/cart-controller.php';
//require_once ROOT_PATH . '/controllers/order-controller.php';

checkSessionTimeout();

$request = $_SERVER['REQUEST_URI'];
$basePath = '/';

$request = trim(str_replace($basePath, '', $request), '/');
$parts = explode('/', $request);
$route = $parts[0] ?: 'home';

$authController = new AuthController();
$dashboardController = new DashboardController();
$productController = new ProductController();
//$cartController = new CartController();
//$orderController = new OrderController();

switch ($route) {
    // Auth routes
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

    // Webshop routes
    case 'products':
        $productController->index();
//        if (isset($parts[1]) && !empty($parts[1])) {
//            $productController->show($parts[1]);
//        } else {
//            $productController->index();
//        }
        break;
//    case 'cart':
//        if (isset($parts[1]) && $parts[1] == 'add') {
//            $cartController->add();
//        } elseif (isset($parts[1]) && $parts[1] == 'remove') {
//            $cartController->remove();
//        } else {
//            $cartController->index();
//        }
//        break;
//    case 'checkout':
//        $orderController->checkout();
//        break;
//    case 'orders':
//        $orderController->index();
//        break;
//    case 'wishlist':
//        $wishlistController->index();
        break;
    case 'home':
    default:
        include ROOT_PATH . '/public/views/index.php';
        break;
}