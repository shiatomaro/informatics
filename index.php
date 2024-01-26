<?php
require('utils.php');

session_start();

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri)['path'];

$routes = [
    '/' => 'controllers/home.php',
    '/home' => 'controllers/home.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
    '/system' => 'controllers/system.php',
    '/dashboard' => 'controllers/dashboard.php',
    '/dashboard/tracker' => 'controllers/dashboard.php',
    '/dashboard/application' => 'controllers/dashboard.php',
    '/dashboard/examination' => 'controllers/dashboard.php',
    '/dashboard/verification' => 'controllers/dashboard.php',
    '/dashboard/terms' => 'controllers/dashboard.php',
    '/system/dashboard' => 'controllers/system.php',
    '/system/applications' => 'controllers/system.php',
    '/system/courses' => 'controllers/system.php',
    '/system/courses/new' => 'controllers/system.php',
    '/system/students' => 'controllers/system.php',
    '/system/users' => 'controllers/system.php',
];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    require "./views/404.php";
}
