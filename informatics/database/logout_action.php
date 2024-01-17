<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the main page
header("Location: /informatics/main.php");
exit();
