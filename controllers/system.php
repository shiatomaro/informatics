<?php

require_once "controllers/credentials.php";
requireCredentials();

// redirect user to the student dashboard if they do not have the right credentials
$user_type = strtolower($_SESSION['user_type']);
if ($user_type !== 'admin' && $user_type !== 'registrar') {
    header("Location: /dashboard");
    exit();
}

require_once "views/system/system.php";
