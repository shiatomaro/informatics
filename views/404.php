<?php
$request_uri = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/templates/head.php'; ?>
    <title>Informatics | 404</title>
</head>

<body style="height: 100vh;" class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h1>404 not found</h1>
                <em class="text-muted">This is not the page you are looking for</em><br />
                <span class="text-info">Request URI: <?php echo "$request_uri" ?></span>
            </div>
        </div>
    </div>
</body>

</html>