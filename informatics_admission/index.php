<?php include('header.php'); ?>

<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleControls" data-slide-to="1"></li>
		<li data-target="#carouselExampleControls" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<div id="home" class="first-section" style="background-image:url('images/slide1.jpg');">
			</div><!-- end section -->
		</div>
		<div class="carousel-item">
			<div id="home" class="first-section" style="background-image:url('images/slide2.jpg');">
			</div><!-- end section -->
		</div>
		<div class="carousel-item">
			<div id="home" class="first-section" style="background-image:url('images/slide3.jpg');">
			</div><!-- end section -->
		</div>
		<!-- Left Control -->
		<a class="new-effect carousel-control-prev" href="#carouselExampleControls" style="background: #9AC5F4" role="button" data-slide="prev">
			<span class="fa fa-angle-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<!-- Right Control -->
		<a class="new-effect carousel-control-next" style="background: #9AC5F4" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<div id="overviews" class="section wb">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="message-box">
					<h4 style="color: #9AC5F4">Informatics College Northgate </h4>
					<h2>Welcome to Informatics Northgate Admission! </h2>
					<p>&nbsp;</p>
					<a class="hover-btn-new"><span>Apply Now!</span></a>
				</div><!-- end messagebox -->
			</div><!-- end col -->

			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="post-media wow fadeIn">
					<img src="images/blog_6.jpg" alt="" width="530" height="420" class="img-fluid img-rounded">
				</div>
				<!-- end media -->
			</div><!-- end col -->

		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 text-center">
					<div class="big-tagline">
						<h2><strong style="color:#9AC5F4">About us</strong></h2>
						<p class="lead">Informatics College Northgate, Indo China Drive informatics is one of the pioneers of online learning in the Philippines. We have been using online platforms to teach and give certifications since the early 2000s when we launched Purple Train. Long before the pandemic began, students of Informatics College have been receiving a blended form of education: online learning and traditional face-to-face school setup. Learn more about our globally recognized and award-winning digital learning resources and online learning management system.

						</p>

					</div>
				</div>
			</div><!-- end row -->
		</div><!-- end container -->
	</div>

	<div class="row align-items-center">
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
			<div class="post-media wow fadeIn"></div>
			<!-- end media -->
		</div><!-- end col -->
		<!-- end col -->
	</div>
	<!-- end row -->
</div>
</div><!-- end container -->
</div><!-- end section -->
<!-- end section -->
<!-- end section -->
<!-- end section -->
<!-- end section -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<!-- end col -->
			<!-- end col -->
			<!-- end col -->
		</div>
		<!-- end row -->
	</div><!-- end container -->
</footer><!-- end footer -->

<?php include('footer.php'); ?>
<?php include('chatbox.php'); ?>

<!-- ALL JS FILES -->
<script src="js/all.js"></script>
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
</script>
<script>
	$(document).ready(function() {
		$('#showPassword').on('change', function() {
			if ($(this).is(':checked')) {
				$('#password').attr('type', 'text');
			} else {
				$('#password').attr('type', 'password');
			}
		})
		$('.login').on('click', function(e) {
			e.preventDefault();
			$('#login').modal('show');
		})

		$('#loginForm').on('submit', function(e) {
			e.preventDefault();
			var username = $('#username').val();
			var password = $('#password').val();
			$.ajax({
				url: 'admission_action.php',
				method: 'POST',
				data: {
					username: username,
					password: password,
					action: 'loginStudent'
				},
				dataType: 'JSON',
				success: function(data) {
					if (data.error != '') {
						$('#loginMessage').html(data.error);
					} else {
						$('#loginMessage').html(data.success);
						$('#loginSubmit').attr('disabled', true);
						$('html, body').css('cursor', 'wait');
						setTimeout(function() {
							window.location.href = data.redirect;
							$('html, body').css('cursor', 'auto');
						}, 2000);
					}
				}
			});
		})
	});
	$(document).ready(function() {
		$("#showPassword").click(function() {
			if ($("#password").attr("type") == "password") {
				$("#password").attr("type", "text");
			} else {
				$("#password").attr("type", "password");
			}
		});

		$("#signupForm").submit(function(e) {
			e.preventDefault();
			var username = $("#username").val();
			var email = $("#email").val();
			var password = $("#password").val();
			if (username != '' && email != '' && password != '') {
				$.ajax({
					url: 'admission_action.php',
					method: 'POST',
					data: {
						username: username,
						email: email,
						password: password,
						action: 'signupStudent'
					},
					dataType: 'JSON',
					success: function(data) {
						if (data.error != '') {
							$('#signupMessage').html(data.error);
						} else {
							$('#signupMessage').html(data.success);
							$('#signupForm').trigger('reset');
						}
					}
				});
			}
		});
	});
</script>