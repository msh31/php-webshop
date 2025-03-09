<?php
// Display PHP information
echo "<h2>PHP Version:</h2>";
echo PHP_VERSION . "<br>";
echo "PDO Drivers:<br>";
print_r(PDO::getAvailableDrivers());

// Try direct MySQL connection
echo "<h2>Testing MySQL Connection:</h2>";
try {
    $connection = new PDO('mysql:host=localhost', 'root', '');
    echo "Successfully connected to MySQL!";
} catch (PDOException $e) {
    echo "Error connecting to MySQL: " . $e->getMessage();
}
?>