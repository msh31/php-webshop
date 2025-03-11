<?php
require_once 'config.php';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['username']) . "!";
} else {
    echo "Please log in first to see this page.";
}