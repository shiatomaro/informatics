<?php
require_once '../conn/conn.php';
$object = New DbConnection();
if(isset($_SESSION['userId'])){
	header('Location: ./dashboard');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Informatics Admission</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/informatics.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstraps/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<style>
		.noneSelect{
			user-select: none;
		}

		.pointer{
			cursor: pointer;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 noneSelect">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/informatics_logo_transparent.png" alt="IMG">
				</div>
				<span id="message"></span>
				<form method="POST" class="login100-form validate-form" id="loginForm">
					<span class="login100-form-title">
						Log In
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" id="username" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div>
						<input type="checkbox" name="showpass" id="showpass" class="pointer">
						<label for="showpass" class="pointer">Show Password</label>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" name="Submit" class="login100-form-btn" value="Login">
            <input type="hidden" name="action" value="login">
					</div>

					<div class="text-center p-t-136">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstraps/js/popper.js"></script>
	<script src="vendor/bootstraps/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!-- Custom JS -->
	<script>
		// Handle form submission
		$(document).ready(function(){
			$('#loginForm').on('submit',function(e){
				e.preventDefault();
				var username = $('#username').val();
				var password = $('#password').val();
				$.ajax({
				url:"signin_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:'json',
				success:function(data)
				{
					alert(data.message);
					if(data.redirect != ""){
						window.location.href=data.redirect;
					}else{
						//Do nothing
					}
				}
				});
			});

			// Function For Show Password
			$('#showpass').on('click', function(){
				if($('#showpass').is(':checked')){
					$('#password').attr("type", "text");
				}else{
					$('#password').attr("type", "password");
				}
			});
		});
	</script>

</body>
</html>