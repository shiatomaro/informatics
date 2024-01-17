<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['username'])) {
        // send the user to the dashboard if they're not logged in
        header("Location: ./login.php");
        exit();
    } else {
        // display a welcome message
        $username = $_SESSION['username'];
        echo "<p>Welcome, <b>$username!</b> You are now logged in.</h1><br>";
        echo "<a href='./database/logout_action.php'>Logout</a>";
    }
    ?>
</body>

</html>