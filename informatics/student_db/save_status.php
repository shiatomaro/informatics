<?php
include('/user/connection.php');

$status = $_POST['status'];

$sql = "INSERT INTO status (status) VALUES ('$status')";

if ($conn->query($sql) === TRUE) {
    echo "Status saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
