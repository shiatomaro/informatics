<!DOCTYPE html>
<html lang="en">

<head>

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

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/informatics.png" type="image/png" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- ALL VERSION CSS -->
	<link rel="stylesheet" href="css/versions.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chatbox.css">
</head>

<body class="host_version">
	<!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" style="width: 200px; height: 80px;" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
						<li class="nav-item"><a class="nav-link login" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a></li>
						<li class="nav-item"><a class="nav-link">Contact Us</a></li>

						<ul class="nav navbar-nav navbar-right mt-1 pb-1">
						</ul>

					</ul>

				</div>
			</div>
		</nav>
	</header>

	<!-- LOGIN MODAL -->
	<?php include_once("templates/login_modal.php"); ?>
	<?php include_once("templates/signup_modal.php"); ?>

	<!-- End header -->
	<!-- Body, Slider -->
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
	<!-- end section -->
	<div id="overtemplates" class="section wb">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="message-box">
						<h4 style="color: #9AC5F4">Informatics College Northgate </h4>
						<h2>Welcome to Informatics Northgate Admission! </h2>
						<p class="lead">Informatics College Northgate, Indo China Drive informatics is one of the pioneers of online learning in the Philippines. We have been using online platforms to teach and give certifications since the early 2000s when we launched Purple Train. Long before the pandemic began, students of Informatics College have been receiving a blended form of education: online learning and traditional face-to-face school setup. Learn more about our globally recognized and award-winning digital learning resources and online learning management system.</p>

						<a class="hover-btn-new" class="nav-link login"><span>Apply Now!</span></a>
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
					<div class="col-md-12 col-sm-12 text-justify">
						<div class="big-tagline">
							<h2><strong style="color:#9AC5F4">Our History</strong></h2>
							<p class="lead">
								Our roots can be traced back to 1983 when Informatics Education was founded in Singapore in response to the demands for skilled Information Technology professionals in Asia. With the passion for technology and the vision of making IT education more accessible to Filipinos, Leonardo “Leo” Angeles Riingen established Informatics Philippines in 1993.

								Making quality IT education more accessible to Filipinos, the very first Informatics Computer School was inside one of the most visited malls in the country and in one of the main business districts of Metro Manila. This eventually paved the way for more centers and colleges as demand grew, expanding to a network of over 30 computer schools and colleges all over the country.

								Today, Informatics Philippines (or “Informatics”) is an independently owned and operated local educational institution that continues to ignite the very passion that brought it to life. Helping Filipinos acquire I.T. knowledge and skills that are vital for their personal and professional growth is the driving force of Informatics.

								We offer Senior High School tracks, programs and courses for Tertiary Education (College or Higher Education), training programs and short courses for Professionals (Corporate), and Diploma courses, with special focus on I.T.-related core competencies and disciplines. These tracks, courses and programs are offered in a wide array of learning modes, from face-to-face learning to remote learning.

								All our programs, backed by qualified educators and globally-recognized learning platforms and tools, are designed to equip students with the essential knowledge and skills necessary to become globally competitive and in-demand in any field or industry.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
						<div class="post-media wow fadeIn">
							<img src="images/blog_6.jpg" alt="" width="530" height="420" class="img-fluid img-rounded">
						</div>
						<!-- end media -->
					</div><!-- end col -->
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-justify">
						<div class="message-box">
							<h2>Leonardo Riingen</h2>
							<p class="lead">Our Founder</p>
							<p class="lead">
								Leonardo Riingen is an entrepreneur who has already contributed immensely to improving information technology (IT) training and education in the Philippines.

								Riingen came up with the idea that an Information Technology training should be made available to people. When you think of Informatics, "the computer school in the mall ", Riingen is the man behind it. That is the innovative and creative, if not a proactive way of making business and fulfilling his dream of making IT accessible to the people.

								Utilizing his education in U.K., he applied the ladderized program in IT, patterned after the British education system, to allow students to learn skills and make them immediately employable. Also, he designed and customized IT training programs and curriculum for companies and government offices to give learners a comprehensive, organization-wide IT training. To make the IT education and training that his schools offer at par with international standards, his schools boast of international courses validated by the world's leading IT qualification awarding bodies; and maintains affiliations with IT industry technology frontrunners.

								Reference: UST 400 Alumni</p>
						</div><!-- end messagebox -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div>

		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="post-media wow fadeIn"></div>
			</div>

		</div>
	</div>
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
	<?php include('templates/chatbox.php'); ?>
	<script src="js/all.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>