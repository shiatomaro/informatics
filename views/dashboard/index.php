<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/templates/head.php'; ?>
    <title>Informatics Admission System</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/system.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h1>Welcome to the student dashboard, <?php echo $_SESSION['username'] ?></h1>
    <p><em>User Type: </em><?php echo $_SESSION['user_type']; ?></p>
    <?php require_once 'views/templates/body_scripts.php'; ?>
</body>

</html>