<?php

function getConn()
{
    $dbhost = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "informatics_admission";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function submitFormData()
{
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    // get params from POST request
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password !== $confirmPassword) {
        header("Location: /informatics/signup.php?error=password_mismatch");
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
                header("Location: /informatics/signup.php?error=taken_username");
            } else if (strpos($e->getMessage(), 'email') !== 'false') {
                header("Location: /informatics/signup.php?error=taken_email");
            } else {
                header("Location: /informatics/signup.php?error=general");
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
