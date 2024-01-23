<?php

require_once './db.php';
require_once '../controllers/credentials.php';
requireCredentials();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO assessments (user_id, score) VALUES (?, ?)");
    $stmt->bind_param("ss", $userId, $score);

    $userId = $conn->real_escape_string($_SESSION["user_id"]);
    $score = $conn->real_escape_string($_POST["score"]);

    // check if any entries are empty
    if (!empty($score)) {

        // execute the prepared statement
        try {
            if ($stmt->execute()) {
                $msg_type = "success";
                $msg_content = "Successfully submitted your exam results!";
            }
        } catch (mysqli_sql_exception $e) {
            // MySQL error code for duplicate entry
            $msg_type = "danger";
            if ($e->getCode() == 1062) {
                $msg_content = "You already took this assessment!";
            } else {
                $msg_content = "An unknown error has occured ({$e->getCode()}): {$e->getMessage()}";
            }
        }
    }
    $stmt->close();
    $conn->close();
    header("Location: /dashboard/examination?&msg_type=$msg_type&msg_content=$msg_content");
    exit();
}
