<?php
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $path === '' ? '/dashboard' : $path;
if ($url['path'] == '/') {
    header("Location: /home");
    exit();
}

require_once("views/home/index.php");
