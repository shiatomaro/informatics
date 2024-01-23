<?php
require_once "actions/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admission Application Tracker</title>
</head>
<body>
    <div class="container">
        <h1>Admission Application Tracker</h1>
        <form id="trackerForm">
            <label for="applicationID">Application ID:</label>
            <input type="text" id="applicationID" name="applicationID" required>
            <button type="button" onclick="trackApplication()">Track Application</button>
        </form>
        <div id="applicationStatus"></div>
    </div>
    <script src="tracker.js"></script>
</body>
</html>
