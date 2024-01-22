
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home page || Admission</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="stylebetter.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chatbox.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="stylebetter.css">
</head>

<body>
<!-- Sidebar -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Informatics Northgate College</h3>
               <img src="informatics.png" alt="icon">
            </div>
            <!-- Start of menu "coz Me-N-U is da best" - S  -->
            <ul class="list-unstyled components">
                  <!-- Button for the tracker -->
				<li>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tracker">
                    Tracker
                    </a>
                <!-- Pop-up box for the tracker -->
                <div class="modal fade" id="tracker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Application Tracker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;<h2>Status Tracker</h2>

    <table border="1">
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
</table></span>
                </button>
                </div>
                <div class="modal-body">
        ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
    </div>
  </div>
</div>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        Apply
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li href="application-form.php">
                            <a href="#">Step 1: Fill Up Form and Payment</a>
                        </li>
                        <li>
                            <a href="#">Step 2: Examination</a>
                        </li>
						<li>
                            <a href="#">Step 3: Identity Verification</a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="#">
                       Terms & Conditions
                    </a>
                </li>
                <li>
                    <a href="#">
                        Log out
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                </div>
            </nav>
	<footer class="footer">
		<div class="container">
			<div class="row">
			</div>
		</div>
	</footer>
	<div class="copyrights">
		<div class="container">
			<div class="footer-distributed">
				<div class="footer-center">
					<p class="footer-company-name style1">

						Indo China Drive, Northgate Cyberzone Filinvest Corporate City, Alabang Muntinlupa City, Metro Manila
						<br>
						Info.northgate@informatics.com.ph
						<br>
						Landline: 8774-24-74 || Mobile: 09695385212 <BR>
						All Rights Reserved Copyright © 2024 | <a href="tbc" target="_blank"> Researchers </a>
					</p>
				</div>
			</div>
		</div>
	</div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
	<script src="js/all.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>