<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once 'views/templates/head.php'; ?>
	<title>Informatics Admission System</title>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/system.css">
	<!-- JQuery -->
	<script src="js/jquery-3.7.1.min.js"></script>
	<!-- Chart.js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
	<!-- Navbar -->
	<?php require_once "views/system/navbar.php"; ?>

	<div class="row h-100" id="mainContainer">

		<!-- Sidebar -->
		<div class="col col-3 h-100 bg-secondary bg-gradient" id="sidebar">
			<?php require_once "views/system/sidebar.php"; ?>
		</div>

		<!-- main content -->
		<main class="col container-fluid p-3" id="content">
		</main>
	</div>

	<script src="js/system/sidebar.js"></script>
</body>

</html>