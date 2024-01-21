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
    } else {
        header("Location: /system");
    }
}

function requireCredentials()
{
    if (!isLoggedIn()) {
        header("Location: /login");
    }
}
