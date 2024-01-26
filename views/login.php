<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/templates/head.php'; ?>
    <link rel="stylesheet" href="css/home.css">
    <title>Informatics Admission | Log In</title>
</head>
<body style="height: 100vh;">
    <div class="d-flex row justify-content-center pt-5 mx-2">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="container d-flex align-items-center">
                        <h1 class="card-title">Log in</h1>
                        <a class="btn btn-secondary ms-auto" href="/" role="button" id="home-button"> <img src="images/icons/back-icon.png" class="back-icon"></a>
                    </div>

                    <div class="container">
                        <form method="post" action="actions/login_action.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="logrete">Login</button>
                        </form>
                        <div>
                            <p class="text-muted text-center">Don't have an account?
                                <em><a href="/signup" class="link">Sign up</em><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'views/templates/body_scripts.php'; ?>
</body>

</html>