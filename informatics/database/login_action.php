<?php
require 'connection.php';

function submitFormData()
{
    $conn = getConn();

    // get params from POST request
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Retrieve the hashed password from the database for the given username
    $stmt = $conn->prepare("SELECT username, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $hashedPassword);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    // Verify the password
    if ($dbUsername && password_verify($password, $hashedPassword)) {
        // Password is correct, set session variables and redirect to a secured page
        $started = session_start();
        if ($started) {
            $_SESSION['username'] = $dbUsername;
            header("Location: /informatics/welcome.php");
        } else {
            header("Location: /informatics/login.php?error=");
        }
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header("Location: /informatics/login.php?error=login_invalid");
    }
    exit();
}

submitFormData();
