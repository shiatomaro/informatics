<?php
require_once './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    // fetch the data from the form
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $confirmPassword = $conn->real_escape_string($_POST["confirmPassword"]);
    if ($password !== $confirmPassword) {
        header("Location: /signup?msg_type=danger&msg_content=The passwords do not match!");
        exit();
    }

    // check if any entries are empty
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $msg_type = "danger";
        $msg_content = "no fields can be empty!";
    } else {
        // get the password's hash
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // execute the prepared statement
        try {
            if ($stmt->execute()) {
                $msg_type = "success";
                $msg_content = "Successfully created a new account!";
            }
        } catch (mysqli_sql_exception $e) {
            // MySQL error code for duplicate entry
            $msg_type = "danger";
            if ($e->getCode() == 1062) {
                if (strpos($e->getMessage(), 'username') !== false) {
                    $msg_content = "Username is already taken!";
                } else if (strpos($e->getMessage(), 'email') !== false) {
                    $msg_content = "Email is already taken!";
                }
            } else {
                $msg_content = "An unknown error has occured ({$e->getCode()}): {$e->getMessage()}";
            }
        }
    }
    $stmt->close();
    $conn->close();
    if ($msg_type === "success") {
        header("Location: /dashboard");
    } else {
        header("Location: /signup?&msg_type=$msg_type&msg_content=$msg_content");
    }
    exit();
}
