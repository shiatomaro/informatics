<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Md Yaseen Ahmed">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <script src="js/progress.js"></script>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/reg_styles.css">

    <!--Custom Favicon.-->
    <link rel="icon" type="image/png" sizes="64x64" href="css/images/logo.png">
    <style type="text/css">
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            display: none;
            outline: none;
        }

        .mh3:hover {
            border: 2px solid black;
            padding: 5px;
            border-radius: 5px;
            color: white;
            background-color: black;
        }

        .mnav ul li a:hover {
            color: whitesmoke;
            padding: 2px;
            border: 5px solid black;
            border-radius: 5px;
            background-color: black;
        }
    </style>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("phone").onchange = passwdlen;
            document.getElementById("pass1").onchange = passwdlen2;
        }

        function passwdlen() {
            var num = document.getElementById("phone").value;
            if (num.length < 10)
                document.getElementById("phone").setCustomValidity("phone length shuld be = 10");
            else
                document.getElementById("phone").setCustomValidity('');
            //empty string means no validation error
        }

        function passwdlen2() {
            var pass = document.getElementById("pass1").value;
            if (pass.length < 8)
                document.getElementById("pass1").setCustomValidity("passwd length shuld be > 8");
            else
                document.getElementById("pass1").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <title>Registration</title>
</head>

<body>
    <div id="progress"></div>
    <!-- Navigation -->
    <nav class="navbar mnav navbar-expand-lg navbar-dark static-top" style="background-color: #30888D;padding:20px;border-bottom: 2px solid black;box-shadow: 3px 3px 5px black;">
        <div class="container" style="font-family:'PT Serif';font-size:22px;padding-right:0px;margin-right:0%;">
            <a style="margin-left:0%;padding-left:0px" class="navbar-brand" href="http://bmsce.ac.in">
                <h3 class="mh3">BMSCE</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Registration
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-key" aria-hidden="true"></i> Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php"><i class="fa fa-lock" aria-hidden="true"></i> Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="help.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>