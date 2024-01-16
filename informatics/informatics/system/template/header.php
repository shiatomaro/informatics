<?php

require_once '../conn/conn.php';
$db = New DbConnection();
$required = '<span class="text-danger">*</span>';
$optional = ' <small class="text-secondary">(Optional)</small>';
if(!isset($_SESSION['userId'])){
    header('Location: ./login');
}else{
    $userId = $_SESSION['userId'];
    $query = "SELECT * FROM user_tbl WHERE user_id='$userId'";
    $result = mysqli_query($db->conn, $query);
    if(mysqli_num_rows($result) > 0){
        foreach($result as $v){
            $userName = $v['username'];
            $userType = $v['user_type'];
        }
    }
}
if(isset($_GET['p'])){
    if($_GET['p'] == 'dashboard'){
        $dashboardMenu = 'active';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
    }
    if($_GET['p'] == 'index'){
        $dashboardMenu = 'active';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
    }
    if($_GET['p'] == 'courses'){
        $dashboardMenu = '';
        $coursesMenu = 'active';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
    }
    if($_GET['p'] == 'assign-course'){
        $dashboardMenu = '';
        $coursesMenu = 'active';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
    }
    if($_GET['p'] == 'student-admin'){
        $dashboardMenu = '';
        $coursesMenu = '';
        $studentAdmin = 'active';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
    }
    if($_GET['p'] == 'app-form'){
        $dashboardMenu = '';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = 'active';
        $requirements = '';
        $manageUser = '';
    }
    if($_GET['p'] == 'requirements'){
        $dashboardMenu = '';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = '';
        $requirements = 'active';
        $manageUser = '';
    }
    if($_GET['p'] == 'manage-user'){
        $dashboardMenu = '';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = 'active';
    }
    if($_GET['p'] == 'evaluation'){
        $dashboardMenu = '';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
        $eval = 'active';
    }
    if($_GET['p'] == 'year-level'){
        $dashboardMenu = '';
        $coursesMenu = '';
        $studentAdmin = '';
        $appForm = '';
        $requirements = '';
        $manageUser = '';
        $eval = '';
        $yearlevel = 'active';
    }
}else{
    $dashboard = 'active';
}
if(isset($_COOKIE['sidebarToggle'])){
    if($_COOKIE['sidebarToggle'] == 0){
        $bodySidebarToggle = 'sidebar-toggled';
        $ulSidebarToggle = 'toggled';
    }else{
        $bodySidebarToggle = '';
        $ulSidebarToggle = '';
    }
}else{
    setCookie('sidebarToggle', '1', time() + (86400 * 30), "/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/informatics.png">
    <!-- Custom fonts for this template -->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- AJAX JQuery script -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="./vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .text-black{
            color: black;
        }

        .noneSelect{
            user-select: none;
        }
    </style>

</head>

<body id="page-top" class="<?php echo $bodySidebarToggle?>">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion <?php echo $ulSidebarToggle?>" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index">
                <div class="sidebar-brand-icon">
                    <img src="img/informatics_logo_transparent.png" width="60px" alt="Informatics Logo" title="Informatics">
                </div>
                <div class="sidebar-brand-text">Admission <sup>System</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $dashboardMenu; ?>">
                <a class="nav-link pt-2 pb-1" href="./dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
            if($userType == "Admin"){
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                CATEGORIES
            </div>

            <li class="nav-item <?php echo $yearlevel; ?>">
                <a class="nav-link pt-2 pb-1" href="./year-level">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Year Level</span>
                </a>
            </li>

            <li class="nav-item <?php echo $coursesMenu; ?>">
                <a class="nav-link collapsed pt-2 pb-1" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Course/Strand</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./courses">Manage Course/Strand</a>
                        <a class="collapse-item" href="./assign-course">Assign Course/Strand</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?php echo $studentAdmin; ?>">
                <a class="nav-link pt-2 pb-1" href="./student-admin">
                    <i class="fas fa-fw fa-school"></i>
                    <span>Student Admin/Registrar</span>
                </a>
            </li>

            <?php }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                STUDENT APPLICANT'S
            </div>

            <!-- Nav Item - Student Information -->
            <li class="nav-item <?php echo $appForm; ?>">
                <a class="nav-link pt-2 pb-1" href="./app-form">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Student Information</span>
                </a>
            </li>

            <!-- Nav Item - Requirements -->
            <li class="nav-item <?php echo $requirements; ?>">
                <a class="nav-link pt-2 pb-1" href="./requirements">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Student Requirements</span></a>
            </li>

            <!-- Nav Item - Student Evaluation -->
            <li class="nav-item <?php echo $eval; ?>">
                <a class="nav-link pt-2 pb-1" href="./evaluation">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Student Evaluation</span>
                </a>
            </li>
            <?php 
            if($userType == "Admin"){
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MANAGEMENT
            </div>

            <!-- Nav Item - Users -->
            <li class="nav-item <?php echo $manageUser; ?>">
                <a class="nav-link pt-2 pb-1" href="./manage-user">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userName;?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--<a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->