<?php
require '../routes.php';
session_start();
if (!isset($_SESSION['username'])) {
	redirect('login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Informatics System</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="./css/system.css">
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar bg-body-tertiary shadow">
		<div class="container-fluid">
			<div>
				<a class="navbar-brand" href="#">
					<img src="../images/icon.png" alt="Logo" width="64" height="64" class="d-inline-block align-text-top">
				</a>
			</div>
			<div>
				<b>Admission System</b>
			</div>
			<div>
				<a class="navbar-brand" href="#">
					<?php
					$username = $_SESSION['username'];
					echo "<b>$username</b>";
					?>
					<img src="./img/undraw_rocket.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
				</a>
				<a href='../database/logout_action.php'>Logout</a>
			</div>
		</div>
	</nav>

	<div class="row h-100">

		<!-- Sidebar -->
		<div class="col col-3 h-100 bg-secondary bg-gradient">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link" href="#">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Year Level</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Course / Strand</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Student Admin / Registrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Student Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Student Requirements</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Examination Results</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Student Evaluation</a>
				</li>
			</ul>
		</div>

		<!-- main content -->
		<main class="col">
			<?php include_once("./template/dashboard.php"); ?>
		</main>
	</div>

	<!-- Bootstrap JS -->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>