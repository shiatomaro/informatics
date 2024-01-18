<?php

require('functions.php');

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri)['path'];

$routes = [
    '/' => 'controllers/home.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    require "./views/404.php";
}
