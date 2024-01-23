<?php

@session_start();

function isLoggedIn()
{
    return isset($_SESSION['username']);
}

function redirectToDashboard()
{
    if ($_SESSION['user_type' == 'student']) {
        header("Location: /dashboard");
        exit();
    } else {
        header("Location: /system");
        exit();
    }
}

function requireCredentials()
{
    if (!isLoggedIn()) {
        header("Location: /login");
        exit();
    }
}
