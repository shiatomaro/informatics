<?php
require_once './db.php';
require_once '../controllers/credentials.php';
require_once '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireCredentials();
    $conn = getConn();
    $verified = $_POST["face-match"] === "on" ? true : false;

    $stmt = $conn->prepare("INSERT INTO student_applications (user_id) VALUES (?)");
    $user_id = $conn->real_escape_string($_SESSION["user_id"]);
    $stmt->bind_param("s", $user_id);

    try {
        $stmt->execute();
        $msg_type = "success";
        $msg_content = "Successfully submitted the user's information!";
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            // if user already has a record, just proceed normally
            $msg_type = "success";
            $msg_content = "Successfully submitted the user's information!";
        } else {
            // otherwise, display an error
            $msg_type = "danger";
            $msg_content = "An unhandled database error has occured (" . $e->getCode() . "): " . $e->getMessage();
        }
    } catch (Exception $e) {
        $msg_type = "danger";
        $msg_content = "An unknown error has occured (" . $e->getCode() . "): " . $e->getMessage();
    } finally {
        $stmt->close();
        $conn->close();
    }
    if ($msg_type === "success") {
        header("Location: /dashboard/tracker?msg_type=$msg_type&msg_content=$msg_content");
    } else {
        header("Location: /dashboard/verification?msg_type=$msg_type&msg_content=$msg_content");
    }
}
