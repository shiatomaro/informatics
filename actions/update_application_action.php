<?php
require './db.php';
require '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE student_applications SET status = ?, approved_by = ?, noted_by = ?, updated_at = NOW() WHERE user_id = ?");
    $stmt->bind_param("ssss", $status, $approved_by, $noted_by, $user_id);

    // fetch the data from the form
    $user_id = $conn->real_escape_string($_POST["user-id"]);
    $status = $conn->real_escape_string($_POST["status"]);
    $approved_by = $_POST["approved-by"] != "" ? $conn->real_escape_string($_POST["approved-by"]) : null;
    $noted_by = $_POST["noted-by"] != "" ? $conn->real_escape_string($_POST["noted-by"]) : null;

    // execute the prepared statement
    try {
        if ($stmt->execute()) {
            $msg_type = "success";
            $msg_content = "Successfully updated the application data!";
        }
    } catch (mysqli_sql_exception $e) {
        $msg_type = "danger";
        $msg_content = "Error {$e->getCode()}: {$e->getMessage()}";
    }
    $stmt->close();
    $conn->close();
    header("Location: /system/applications?user_id=$user_id&msg_type=$msg_type&msg_content=$msg_content");
    exit();
}
