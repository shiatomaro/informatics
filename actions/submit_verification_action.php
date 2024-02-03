<?php
require_once './db.php';
require_once '../controllers/credentials.php';
require_once '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireCredentials();
    $pdo = getPDO();
    $user_id = $_SESSION['user_id'];
    $verified = $_POST["face-match"] === "on" ? true : false;

    // create a new application
    $stmt = $pdo->prepare("INSERT IGNORE INTO student_applications (user_id) VALUES (:user_id);");
    $stmt->bindParam(":user_id", $user_id);
    try {
        if ($stmt->execute()) {
            $msg_type = "danger";
            $msg_content = "Unable to finish the verification process";
        } else {
            $msg_type = "danger";
            $msg_content = "An unknown error has occured.";
            header("Location: /dashboard/verification?msg_type=$msg_type&msg_content=$msg_content");
            exit();
        }
    } catch (PDOException $e) {
        $msg_type = "danger";
        $msg_content = "An unknown error has occured (" . $e->getCode() . "): " . $e->getMessage();
        header("Location: /dashboard/verification?msg_type=$msg_type&msg_content=$msg_content");
        exit();
    }

    // verify the application
    $stmt = $pdo->prepare("UPDATE student_information SET verified = :verified WHERE user_id = :user_id;");
    $stmt->bindParam(":verified", $verified);
    $stmt->bindParam(":user_id", $user_id);
    try {
        if ($stmt->execute()) {
            $msg_type = "success";
            $msg_content = "Sucessfully validated the user's information!";
            header("Location: /dashboard/verification?msg_type=$msg_type&msg_content=$msg_content");
            exit();
        } else {
            $msg_type = "danger";
            $msg_content = "An unknown error has occured.";
            header("Location: /dashboard/verification?msg_type=$msg_type&msg_content=$msg_content");
            exit();
        }
    } catch (PDOException $e) {
        $msg_type = "danger";
        $msg_content = "An unknown error has occured (" . $e->getCode() . "): " . $e->getMessage();
        header("Location: /dashboard/verification?msg_type=$msg_type&msg_content=$msg_content");
        exit();
    }
}
