<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title>Online Student Admission System</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.jpg">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="style.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">

<!-- Modernizer for Portfolio -->
<script src="js/modernizer.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
	<!--
	.style1 {
		color: #FFFFFF;
		font-weight: bold;
	}
	-->
</style>
</head>

<body class="host_version">

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header tit-up">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<i>
						<h5 class="modal-title pl-2 pr-2" style="font-size: 20px; border-bottom: 2px solid black; font-weight: bolder;">User Login</h5>
					</i>
				</div>
				<div class="modal-body customer-box">
					<!-- Tab panes -->
					<div class="tab-content">
						<span id="loginMessage"></span>
						<div class="tab-pane active" id="Login">
							<form method="POST" class="login100-form validate-form" id="loginForm">
								<div class="form-group">
									<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fa fa-envelope" aria-hidden="true"></i><label for="username"><b>Username</b></label>
										</span>
										<input class="form-control text-dark"" type=" text" id="username" name="username" placeholder="Username" required>
									</div>
								</div>
								<div class="form-group">
									<div class="wrap-input100 validate-input" data-validate="Password is required">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fa fa-lock" aria-hidden="true"></i><label for="username"><b>Password</b></label>
										</span>
										<input class="form-control text-dark" type="password" id="password" name="password" placeholder="Password" required>
										<input type="checkbox" name="showpass" id="showpass" class="pointer">
										<label for="showpass" class="pointer">Show Password</label>
									</div>
								</div>
								<div class="container-login100-form-btn">
									<input type="submit" name="Submit" class="btn btn-light btn-radius btn-brd grd1" value="Login">
									<input type="hidden" name="action" value="login">
								</div>
								<div class="text-center p-t-12">
									<a class="txt2" href="#">
										No account?
									</a>
									<a class="btn-secondary" class="txt2" data-toggle="modal" data-target="#signup">Sign Up</a>
									<div class="text-center p-t-136">
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Your signup form code here -->
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header tit-up">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<i>
						<h5 class="modal-title pl-2 pr-2" style="font-size: 20px; border-bottom: 2px solid black; font-weight: bolder;">Create your Account</h5>
					</i>
				</div>
				<div class="modal-body customer-box">
					<!-- Tab panes -->
					<div class="tab-content">
						<span id="signupMessage"></span>
						<div class="tab-pane active" id="SignUp">
							<form method="POST" id="signupForm">
								<div class="form-group">
									<label for="username"><b>Username</b><?php echo $required; ?></label>
									<input class="form-control text-dark" id="username" placeholder="Create username." type="text" required>
								</div>
								<div class="form-group">
									<label for="email"><b>Email</b><?php echo $required; ?></label>
									<input class="form-control text-dark" id="email" placeholder="Email Address." type="email" required>
								</div>
								<div class="form-group">
									<label for="username"><b>Password</b><?php echo $required; ?></label>
									<input class="form-control text-dark" id="password" placeholder="Create password." type="password" required>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="showPassword" style="user-select: none; cursor: pointer;">
									<label class="form-check-label" for="showPassword" style="user-select: none; cursor: pointer;">Show Password</label>
								</div>
								<div class="row">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-light btn-radius btn-brd grd1 signupSubmit">
											Submit
										</button>
										<a class="btn-third" data-toggle="modal" data-target="#login">Back to login</a>

									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>

	<!-- LOADER --><!-- END LOADER -->

	<!-- Start header --><!-- End header --><!-- end section -->
	<!-- end section -->
	<!-- end section -->
	<!-- end section -->
	<!-- end section -->
	<footer class="footer">
		<!-- end container -->
	</footer>
	<!-- end footer -->

	<div class="copyrights">
		<div class="container">
			<div class="footer-distributed">
				<div class="footer-center">
					<p class="footer-company-name style1">All Rights Reserved. &copy; Copyright © 2024 | <a href="tbc" target="_blank"> Researchers </a> </p>
				</div>
			</div>
		</div><!-- end container -->
	</div><!-- end copyrights -->

	<!-- ALL JS FILES -->
	<script src="js/all.js"></script>
	<script src="/script.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
		$(document).ready(function() {
			$(document).on('click', '.btn-secondary', function() {
				$("#login").modal("hide");
				setTimeout(function() {
					$("#signup").modal("show");
				}, 500);
			});

			$(document).on('click', '.btn-third', function() {
				$("#signup").modal("hide");
				setTimeout(function() {
					$("#login").modal("show");
				}, 500);
			});
		});
		// Handle form submission
		$(document).ready(function() {
			$('#loginForm').on('submit', function(e) {
				e.preventDefault();
				var username = $('#username').val();
				var password = $('#password').val();
				$.ajax({
					url: "admission_action.php",
					method: "POST",
					data: $(this).serialize(),
					dataType: 'json',
					success: function(data) {
						alert(data.message);
						if (data.redirect != "") {
							window.location.href = data.redirect;
						} else {
							//Do nothing
						}
					}
				});
			});

			// Function For Show Password
			$('#showpass').on('click', function() {
				if ($('#showpass').is(':checked')) {
					$('#password').attr("type", "text");
				} else {
					$('#password').attr("type", "password");
				}
			});
		});
	</script>

</body>

</html>