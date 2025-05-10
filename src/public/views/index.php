<?php
require_once 'includes/header.php';
?>

    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">
        <h1 class="display-4 mb-5 text-center">Welcome to PHP Auth System</h1>

        <div class="d-flex gap-3 mb-4">
            <a href="<?php echo BASE_URL; ?>login" class="btn btn-primary btn-lg">Login</a>
            <a href="<?php echo BASE_URL; ?>register" class="btn btn-primary btn-lg">Register</a>
            <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-primary btn-lg">Dashboard</a>
            <a href="<?php echo BASE_URL; ?>logout" class="btn btn-primary btn-lg">Logout</a>
        </div>
    </div>

<?php
require_once 'includes/footer.php';
?>