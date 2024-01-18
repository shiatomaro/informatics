<?php
require './db.php';

function submitFormData()
{
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    // get params from POST request
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    if ($password !== $confirmPassword) {
        header("Location: /signup?error=password_mismatch");
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // execute the prepared statement
    try {
        if ($stmt->execute()) {
            echo "Record inserted successfully";
        }
    } catch (mysqli_sql_exception $e) {
        // MySQL error code for duplicate entry
        if ($e->getCode() == 1062) {
            if (strpos($e->getMessage(), 'username') !== 'false') {
                header("Location: /signup?error=taken_username");
            } else if (strpos($e->getMessage(), 'email') !== 'false') {
                header("Location: /signup?error=taken_email");
            } else {
                header("Location: /signup?error=unexpected");
            }
            // Redirect the user back to the signup page
            exit();
        } else {
            // unhandled errors
            echo "Unexpected Database Error: " . $e->getMessage();
        }
    }

    // close the connections
    $stmt->close();
    $conn->close();
}

submitFormData();
