<?php
require_once "utils.php";
// dd($_SESSION);
?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once "views/templates/head.php" ?>
    <title>Home page || Admission</title>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/student_dashboard.css">
    <?php if ($path == "/examination") : ?>
        <link rel="stylesheet" href="css/exam.css">
    <?php elseif ($path == "/application") : ?>
        <link rel="stylesheet" href="css/application_form.css">
    <?php endif ?>
</head>

<body style="height: 100vh;" class="m-0 p-0">
    <div class="d-flex h-100 w-100">
        <div class="col-3 h-100">
            <?php require_once "views/student_dashboard/sidebar.php" ?>
        </div>
        <div class="col d-flex flex-column">
            <main class="container mt-3 mr-3">
                <?php include "views/message_card.php" ?>
                <?php
                switch ($path) {
                    case '/application':
                        require_once "views/student_dashboard/application.php";
                        break;
                    case '/examination':
                        require_once "views/student_dashboard/examination.php";
                        break;
                    case '/verification':
                        require_once "views/student_dashboard/verification.php";
                        break;
                    case '/terms':
                        require_once "views/student_dashboard/terms.php";
                        break;
                    default:
                        require_once "views/student_dashboard/tracker.php";
                        break;
                }
                ?>
            </main>

            <div class="mt-auto">
                <?php require_once "views/footer.php" ?>
            </div>
        </div>
    </div>
    <?php require_once "views/templates/body_scripts.php" ?>
    <?php if ($path == "/examination") : ?>
        <script type="module" src="js/exam.js"></script>
    <?php endif ?>
</body>

</html>