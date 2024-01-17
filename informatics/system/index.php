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
	<!-- JQuery -->
	<script src="./js/jquery-3.7.1.min.js"></script>
	<!-- Chart.js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
	<!-- Navbar -->
	<?php include_once("./navbar.php") ?>

	<div class="row h-100" id="mainContainer">

		<!-- Sidebar -->
		<div class="col col-3 h-100 bg-secondary bg-gradient" id="sidebar">
			<?php include_once("./sidebar.php") ?>
		</div>

		<!-- main content -->
		<main class="col container-fluid p-3" id="content">
		</main>
	</div>

	<script src="./js/sidebar.js"></script>

</body>

</html>