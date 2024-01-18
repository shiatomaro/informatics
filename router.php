<?php

// Get the requested URI
$request_uri = $_SERVER['REQUEST_URI'];

// Remove leading and trailing slashes and explode the URI into an array
$uri_segments = explode('/', trim($request_uri, '/'));

// Get the first segment as the page (controller)
$page = isset($uri_segments[0]) ? $uri_segments[0] : 'index';

// Define the path to the requested PHP file
$file_path = __DIR__ . '/' . $page . '.php';

// Check if the file exists
if (file_exists($file_path)) {
    // Include the requested PHP file
    require_once $file_path;
    // header("Location: " . $page);
} else {
    // Handle 404 error - File not found
    header("HTTP/1.0 404 Not Found");
    $title = "404 Not Found";
    include_once("./pages/404.php");
    echo "<h1>$uri_segments[0]</h1>";
    echo "<h1>$request_uri</h1>";
}

switch ($request_uri) {
    case '/':
    case '/home':
        header("Location: home");
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        include_once("./pages/404.php");
        break;
}
