<?php

$routes = array(
    "index" => "/informatics/main.php",
    "welcome" => "/informatics/welcome.php",
    "login" => "/informatics/login.php",
    "signup" => "/informatics/signup.php",
);

function redirect($path, $error = '')
{
    global $routes;
    $route = $routes[$path];
    if ($error !== '') {
        header("Location: $route/?error=$error");
    } else {
        header("Location: $route");
    }
    exit();
}
