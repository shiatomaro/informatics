<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("views/templates/head.php"); ?>
    <link rel="stylesheet" href="css/home.css">
    <title>Informatics Admission | Sign Up</title>
</head>

<body style="height: 100vh;">
    <div class="d-flex row justify-content-center pt-5 mx-2 ">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="container d-flex align-items-center">
                        <h1 class="card-title">Sign up</h1>
                        <a class="btn btn-secondary ms-auto" href="/" role="button" id="home-button"> <img src="images/icons/back-icon.png" class="back-icon"></img></a>
                    </div>

                    <div class="container">
                        <?php require_once "views/message_card.php" ?>
                        <form method="post" action="actions/signup_action.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary w-100" id="logrete">Create Account</button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <p class="text-muted text-center">
                            Already have an account?
                            <em><a href="/login" class="link">Log in</a></em><br>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include 'views/templates/body_scripts.php'; ?>
</body>

</html>