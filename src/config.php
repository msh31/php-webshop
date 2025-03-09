<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$dotenv->required(['DB_HOST', 'DB_USER', 'DB_NAME']);

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

// Create a database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Session configuration
session_start();
define('BASE_URL', '/');

// Helper function for displaying error messages
function displayError($message) {
    echo '<div class="error">' . htmlspecialchars($message) . '</div>';
}

// Helper function for redirecting
function redirect($location) {
    header("Location: $location");
    exit;
}