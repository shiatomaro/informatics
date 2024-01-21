<?php include('user/connection.php'); ?>

<html>
<head>
    <title>Status Tracker</title>
</head>
<body>

<h2>Status Tracker</h2>

<form action="save_status.php" method="post">
    <label for="item_name">Item Name:</label>
    <input type="text" name="item_name" required><br>

    <label for="status">Status:</label>
    <select name="status" required>
        <option value="In Progress">In Progress</option>
        <option value="Completed">Completed</option>
        <option value="Pending">Pending</option>
    </select><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>