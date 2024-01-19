<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // fetch the data from the form
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $type = strtolower($_POST["type"]);
    $status = strtolower($_POST["status"]);

    // check if any entries are empty
    if (empty($username) || empty($email) || empty($type) || empty($status)) {
        $msg_type = "danger";
        $msg_content = "no fields can be empty!";
    } else {
        // execute the query then close the connection
        $conn = getConn();
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, type = ?, status = ? WHERE id = ?");
        $stmt->bind_param("sssss", $username, $email, $type, $status, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        $msg_type = "success";
        $msg_content = "Successfully updated user data!";
    }

    // redirect to the same page
    header("Location: /system/users?id=$id&msg_type=$msg_type&msg_content=$msg_content");
    exit();
}
