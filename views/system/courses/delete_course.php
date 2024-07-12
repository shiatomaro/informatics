<?php
require_once __DIR__ . '/../../../actions/db.php';
require_once __DIR__ . '/../../../utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id'])) {
    header("Location: /system/courses?page=1&message=No+ID+provided");
    exit();
}

$id = $queryParams['id'];

// Validate $id to prevent SQL injection (assuming it's numeric here)
if (!is_numeric($id)) {
    header("Location: /system/courses?page=1&message=Invalid+ID");
    exit();
}

$conn = getConn();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Proceed with deleting the course
$sql = "DELETE FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: /system/courses?page=1&message=Course+deleted+successfully");
    exit();
} else {
    $stmt->close();
    $conn->close();
    header("Location: /system/courses?page=1&message=Failed+to+delete+course");
    exit();
}
?>
