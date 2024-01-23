<?php
// Include necessary files and functions
require_once "actions/db.php";
require_once "utils.php"; // Include your database connection logic

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConn(); // Use your function to get a database connection

    // Fetch application status from the database based on the provided application ID
    $applicationId = $_POST['applicationId']; // Make sure to validate and sanitize user input

    // Check if the user ID exists
    $userExists = checkUserExists($applicationId);

    if ($userExists) {
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("SELECT status FROM admission_applications WHERE id = ?");
        $stmt->bind_param("i", $applicationId);
        $stmt->execute();
        $stmt->bind_result($applicationStatus);

        // Fetch the result
        if ($stmt->fetch()) {
            $response = [
                'status' => 'success',
                'applicationStatus' => $applicationStatus,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Application not found',
                'applicationStatus' => null,
            ];
        }

        // Close the statement
        $stmt->close();
    } else {
        $response = [
            'status' => 'error',
            'message' => 'User not found',
            'applicationStatus' => null,
        ];
    }

    // Close the connection
    $conn->close();

    // Output JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

function checkUserExists($userId) {
    // Check if the user ID exists in your user database table
    // Implement the logic based on your actual database structure
    // Return true if the user exists, false otherwise

    // Example: Check if the user ID exists in a hypothetical users table
    $conn = getConn(); // Use your function to get a database connection

    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($userCount);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $userCount > 0;
}
?>
