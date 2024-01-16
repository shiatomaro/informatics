<?php
// // Connect to the database
// $conn = new mysqli("localhost", "username", "password", "database_name");

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Insert data into the database
// $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

// if ($conn->query($sql) === TRUE) {
//     echo "Record inserted successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Close the database connection
// $conn->close();
echo "<p>user: $username<br/>pass: $password</p>";
