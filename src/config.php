<?php
require_once __DIR__ . '/../vendor/autoload.php';

function getDatabaseConnection() {
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
        $dotenv->load();

        $dotenv->required(['DB_HOST', 'DB_USER', 'DB_NAME']);

        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $dbname = $_ENV['DB_NAME'];

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Session configuration
session_start();
define('BASE_URL', '/');

// Helper functions
function displayError($message) {
    echo '<div class="error">' . htmlspecialchars($message) . '</div>';
}

function redirect($location) {
    header("Location: $location");
    exit;
}

?>