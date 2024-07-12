<?php
$url = parse_url($_SERVER['REQUEST_URI']);
$path = substr($url['path'], strlen('system/'));
$path = $path === '' ? '/dashboard' : $path;
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/templates/head.php' ?>
    <title>IAS | <?php echo substr(strtoupper($path), 1) ?></title>
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/system.css">
</head>


<body>
    <!-- Navbar -->
    <?php require_once "views/system/navbar.php" ?>

    <!-- main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-block col-2 p-0 text-bg-secondary">
                <?php require_once "views/system/sidebar.php" ?>
            </div>
            <main class="col container" id="content">
                <div class="my-3">
                    <?php require_once "views/message_card.php"; ?>
                </div>
                <?php
                switch ($path) {
                    case '/dashboard':
                        require_once 'views/system/dashboard.php';
                        break;
                    case '/applications':
                        require_once 'views/system/applications/applications.php';
                        break;
                    case '/courses':
                        require_once 'views/system/courses/courses.php';
                        break;
                    case '/courses/new':
                        require_once 'views/system/courses/course_creation.php';
                        break;
                    case '/students':
                        require_once 'views/system/students/students.php';
                        break;
                    case '/users':
                        require_once 'views/system/users/users.php';
                        break;
                    case '/import':
                        require_once 'views/system/students/import.php';
                        break;
                    case '/users/delete':
                        require_once 'views/system/users/delete.php';
                        break;
                    default:
                        require_once 'views/system/dashboard.php';
                        break;
                }
                ?>
            </main>
        </div>
    </div>

    <?php require_once 'views/templates/body_scripts.php' ?>
</body>

</html>

<?php
ob_end_flush();
exit();
?>