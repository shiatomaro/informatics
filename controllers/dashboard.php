<?php
// check if user is logged in; if not, send them to the login page
if (!isset($_SESSION['username'])) {
    header("Location: /login");
    exit();
}

// redirect user to the system dashboard if they're not a student
$user_type = strtolower($_SESSION['user_type']);
if ($user_type === 'admin' || $user_type === 'registrar') {
    header("Location: /system");
    exit();
}

require_once 'views/dashboard/index.php';
