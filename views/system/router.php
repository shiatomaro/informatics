<?php
$route = isset($_GET['route']) ? $_GET['route'] : 'dashboard';

switch ($route) {
    case 'informatics/system/':
    case '/dashboard':
        include './pages/dashboard.php';
        break;
    default:
        include './pages/404.php'; // Display a 404 page for unknown routes
        break;
}
