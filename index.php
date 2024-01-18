<?php
require('utils.php');

session_start();

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri)['path'];

$routes = [
    '/' => 'controllers/home.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
    '/system' => 'controllers/system.php',
    '/system/dashboard' => 'controllers/system.php',
    '/system/students' => 'controllers/system.php',
];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    require "./views/404.php";
}
