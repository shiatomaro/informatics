<?php
require './db.php';
require '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO courses (code, name, description, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $course_code, $course_name, $course_desc, $course_status);

    // fetch the data from the form
    $course_code = strtoupper($conn->real_escape_string($_POST["course_code"]));
    $course_name = $conn->real_escape_string($_POST["course_name"]);
    $course_desc = $conn->real_escape_string($_POST["course_desc"]);
    $course_status = strtolower($conn->real_escape_string($_POST["course_status"]));

    // check if any entries are empty
    if (empty($course_code) || empty($course_name)) {
        $msg_type = "danger";
        $msg_content = "Course code or name cannot be empty!";
        header("Location: /system/courses/new?msg_type=$msg_type&msg_content=$msg_content");
    } else {
        // execute the prepared statement
        try {
            if ($stmt->execute()) {
                $msg_type = "success";
                $msg_content = "Successfully created a new course!";
                header("Location: /system/courses?page=1&msg_type=$msg_type&msg_content=$msg_content");
            }
        } catch (mysqli_sql_exception $e) {
            // MySQL error code for duplicate entry
            $msg_type = "danger";
            if ($e->getCode() == 1062) {
                if (strpos($e->getMessage(), 'code') !== 'false') {
                    $msg_content = "Another course already have the same code!";
                } else if (strpos($e->getMessage(), 'name') !== 'false') {
                    $msg_content = "Another course already have the same name!";
                } else {
                    $msg_content = "An unknown error has occured";
                }
            } else {
                $msg_content = "An unknown error has occured";
            }
            header("Location: /system/courses/new?msg_type=$msg_type&msg_content=$msg_content");
        } finally {
            $stmt->close();
            $conn->close();
        }
    }
    exit();
}
