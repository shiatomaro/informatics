<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn();

    // Prepare and bind the SQL statement
    // $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, type = ?, status = ? WHERE id = ?");
    $stmt = $conn->prepare("UPDATE courses SET code = ?, name = ?, description = ?, instructor = ?, status = ? WHERE code = ?");
    $stmt->bind_param("ssssss", $course_code, $course_name, $course_desc, $course_inst, $course_status, $course_code);

    // fetch the data from the form
    $course_code = strtoupper($conn->real_escape_string($_POST["course_code"]));
    $course_name = $conn->real_escape_string($_POST["course_name"]);
    $course_desc = $conn->real_escape_string($_POST["course_desc"]);
    $course_inst = $conn->real_escape_string($_POST["course_inst"]);
    $course_status = strtolower($conn->real_escape_string($_POST["course_status"]));

    // check if any entries are empty
    if (empty($course_code) || empty($course_name) || empty($course_desc) || empty($course_inst) || empty($course_status)) {
        $msg_type = "danger";
        $msg_content = "no fields can be empty!";
    } else {
        // execute the prepared statement
        try {
            if ($stmt->execute()) {
                $msg_type = "success";
                $msg_content = "Successfully updated the course!";
                header("Location: /system/courses?code=$course_code&msg_type=$msg_type&msg_content=$msg_content");
            }
        } catch (mysqli_sql_exception $e) {
            // MySQL error code for duplicate entry
            $msg_type = "danger";
            if ($e->getCode() == 1062) {
                if (strpos($e->getMessage(), 'code') !== 'false') {
                    $msg_content = "Another course already have the same Code!";
                } else if (strpos($e->getMessage(), 'name') !== 'false') {
                    $msg_content = "Another course already have the same name!";
                } else {
                    $msg_content = "An unknown error has occured";
                }
            } else {
                $msg_content = "An unknown error has occured";
            }
            header("Location: /system/courses?code=$course_code&msg_type=$msg_type&msg_content=$msg_content");
        } finally {
            $stmt->close();
            $conn->close();
        }
    }
    exit();
}
