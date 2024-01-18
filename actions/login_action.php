<?php
require './db.php';

function submitFormData()
{
    $conn = getConn();

    // get params from POST request
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Retrieve the hashed password from the database for the given username
    $stmt = $conn->prepare("SELECT username, password_hash, type FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $hashedPassword, $user_type);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    // Verify the password
    if ($dbUsername && password_verify($password, $hashedPassword)) {
        // Password is correct, set session variables and redirect to a secured page
        $started = session_start();
        if ($started) {
            $_SESSION['username'] = $dbUsername;
            $_SESSION['user_type'] = $user_type;
            header("Location: /system");
        } else {
            header("Location: /login?error=unexpected");
        }
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header("Location: /login?error=login_invalid");
    }
    exit();
}

submitFormData();
