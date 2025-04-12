<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_samesite', 'Lax');
ini_set('session.gc_maxlifetime', 1800); // 30 minutes
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

function getDatabaseConnection() {
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $dotenv->required(['DB_HOST', 'DB_USER', 'DB_NAME']);

        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $dbname = $_ENV['DB_NAME'];

        $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $user, $pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        setErrorMessage("Database connection failed: " . $e->getMessage());
        redirect("index.php");
    }
}

define('BASE_URL', '/');

// Helper functions
function setErrorMessage($message) {
    $_SESSION['error_message'] = $message;
}

function setSuccessMessage($message) {
    $_SESSION['success_message'] = $message;
}

function displayError($message) {
    setErrorMessage($message);
}

function displayMessages() {
    $output = '';

    // Check for error messages
    if (isset($_SESSION['error_message'])) {
        $message = $_SESSION['error_message'];
        $output .= '<div class="p-4 mb-4 text-sm text-red-400 rounded-lg bg-red-50 " role="alert">';
        $output .= htmlspecialchars($message);
        $output .= '</div>';
        unset($_SESSION['error_message']);
    }

    // Check for success messages
    if (isset($_SESSION['success_message'])) {
        $message = $_SESSION['success_message'];
        $output .= '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">';
        $output .= htmlspecialchars($message);
        $output .= '</div>';
        unset($_SESSION['success_message']);
    }

    return $output;
}

function redirect($location) {
    header("Location: $location");
    exit;
}

function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        setErrorMessage("CSRF token validation failed");
        return false;
    }
    return true;
}

function checkSessionTimeout() {
    $max_idle_time = 1800;
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $max_idle_time)) {
        // Session expired
        session_unset();
        session_destroy();
        redirect("login.php?timeout=1");
    }
    $_SESSION['last_activity'] = time();
}
?>