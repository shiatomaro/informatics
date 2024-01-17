<?php
require './routes.php';
session_start();
if (isset($_SESSION['username'])) {
    redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="height: 100vh;">
    <div class="p-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Log in</h1>
                <div class="container center">
                    <div class="alert alert-danger" role="alert" id="error" style="display:none;">
                    </div>
                    <form method="post" action="database/login_action.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div>
                        <p class="text-muted text-center">Don't have an account?
                            <em><a href="./signup.php">Sign up</em>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- script to display error messages -->
    <script src="./js/error_disp.js"></script>
</body>

</html>