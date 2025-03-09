<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Auth System</title>
</head>
<body class="bg-black text-white">
    <p class="flex justify-center items-center text-9xl">
        hi there, this is the index page
    </p>

    <div class="flex justify-center items-center gap-5 text-7xl p-6">
        <a href="login.php" class="text-blue-500 hover:underline">Login</a>
        <a href="register.php" class="text-blue-500 hover:underline">Register</a>
    </div>
</body>
</html>