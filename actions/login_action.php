<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Retrieve the hashed password from the database for the given username
    $stmt = $conn->prepare("SELECT username, password_hash, type FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // fetch the data from the form
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // fetch the data from the database
    $stmt->execute();
    $stmt->bind_result($dbUsername, $hashedPassword, $user_type);
    $stmt->fetch();

    if ($dbUsername && password_verify($password, $hashedPassword)) {
        $started = session_start();
        if ($started) {
            $_SESSION['username'] = $dbUsername;
            $_SESSION['user_type'] = strtolower($user_type);

            if ($user_type === 'admin' || $user_type === 'registrar') {
                header("Location: /system");
            } else {
                header("Location: /dashboard");
            }
        } else {
            $msg_type = "danger";
            $msg_content = "Unable to start sesssion.";
        }
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        $msg_type = "danger";
        $msg_content = "Invalid credentials.";
    }
    header("Location: /login?msg_type=$msg_type&msg_content=$msg_content");

    exit();
}
