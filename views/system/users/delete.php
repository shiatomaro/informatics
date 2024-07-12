<?php
require_once __DIR__ . '/../../../actions/db.php'; // Adjust path as necessary
require_once __DIR__ . '/../../../utils.php'; // Adjust path as necessary

$queryParams = getQueryParams();
if (!isset($queryParams['id'])) {
    header("Location: /system/users?page=1&message=No+ID+provided");
    exit();
}

$id = $queryParams['id'];

// Validate $id to prevent SQL injection (assuming it's numeric here)
if (!is_numeric($id)) {
    header("Location: /system/users?page=1&message=Invalid+ID");
    exit();
}

$conn = getConn();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete related records first
$sqlDeleteRelated = "DELETE FROM student_information WHERE user_id = ?";
$stmtDeleteRelated = $conn->prepare($sqlDeleteRelated);
$stmtDeleteRelated->bind_param("i", $id);
if (!$stmtDeleteRelated->execute()) {
    die("Failed to delete related records: " . $stmtDeleteRelated->error);
}
$stmtDeleteRelated->close();

// Proceed with deleting the user
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: /system/users?page=1&message=Record+deleted+successfully");
    exit();
} else {
    $stmt->close();
    $conn->close();
    header("Location: /system/users?page=1&message=Failed+to+delete+record");
    exit();
}
?>

