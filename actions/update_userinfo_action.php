<?php
require './db.php';
require '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, type = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssss", $username, $email, $type, $status, $id);

    // fetch the data from the form
    $id = $conn->real_escape_string($_POST["id"]);
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $type = strtolower($conn->real_escape_string($_POST["type"]));
    $status = strtolower($conn->real_escape_string($_POST["status"]));

    // check if any entries are empty
    if (empty($id) || empty($username) || empty($email) || empty($type) || empty($status)) {
        $msg_type = "danger";
        $msg_content = "no fields can be empty!";
    } else {
        // execute the prepared statement
        try {
            if ($stmt->execute()) {
                $msg_type = "success";
                $msg_content = "Successfully updated the user data!";
            }
        } catch (mysqli_sql_exception $e) {
            $msg_type = "danger";
            $msg_content = "Error {$e->getCode()}: {$e->getMessage()}";
        }
    }
    $stmt->close();
    $conn->close();
    header("Location: /system/users?id=$id&msg_type=$msg_type&msg_content=$msg_content");
    exit();
}
