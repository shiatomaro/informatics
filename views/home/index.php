<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once("views/templates/head.php"); ?>
	<title>Informatics Admission</title>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/chatbox.css">
	<link rel="stylesheet" href="css/navbar.css">
</head>

<body>
	<!-- Navbar -->
	<?php require_once("views/home/navbar.php") ?>

	<!-- Carousel -->
	<section>
		<?php include_once("views/home/carousel.php") ?>
	</section>
	<section class="row m-5">
		<div class="col col-md-6">
			<h2>Welcome to Informatics Northgate Admission Website!</h2>
			<p>Informatics College Northgate, Indo China Drive informatics is one of the pioneers of online learning in the Philippines. We have been using online platforms to teach and give certifications since the early 2000s when we launched Purple Train. Long before the pandemic began, students of Informatics College have been receiving a blended form of education: online learning and traditional face-to-face school setup. Learn more about our globally recognized and award-winning digital learning resources and online learning management system.</p>
			<div class="container-fluid text-end">
				<a class="btn btn-primary" href="/signup" role="button">Apply Now!</a>
			</div>
		</div>
		<div class="d-none d-md-block col-md-6 text-center">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/ctGIrKOpf8I?si=Xl7w1-EwlZQvx4ja" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		</div>
		</div>
	</section>
	<section class="m-5">
		<h1>Our History</h1>
		<p>
			Our roots can be traced back to 1983 when Informatics Education was founded in Singapore in response to the demands for skilled Information Technology professionals in Asia. With the passion for technology and the vision of making IT education more accessible to Filipinos, Leonardo “Leo” Angeles Riingen established Informatics Philippines in 1993. Making quality IT education more accessible to Filipinos, the very first Informatics Computer School was inside one of the most visited malls in the country and in one of the main business districts of Metro Manila. This eventually paved the way for more centers and colleges as demand grew, expanding to a network of over 30 computer schools and colleges all over the country. Today, Informatics Philippines (or “Informatics”) is an independently owned and operated local educational institution that continues to ignite the very passion that brought it to life. Helping Filipinos acquire I.T. knowledge and skills that are vital for their personal and professional growth is the driving force of Informatics. We offer Senior High School tracks, programs and courses for Tertiary Education (College or Higher Education), training programs and short courses for Professionals (Corporate), and Diploma courses, with special focus on I.T.-related core competencies and disciplines. These tracks, courses and programs are offered in a wide array of learning modes, from face-to-face learning to remote learning. All our programs, backed by qualified educators and globally-recognized learning platforms and tools, are designed to equip students with the essential knowledge and skills necessary to become globally competitive and in-demand in any field or industry.
		</p>
	</section>


	<footer class="text-center mb-0 py-3" id="footer">
		<p>
			Indo China Drive, Northgate Cyberzone Filinvest Corporate City, Alabang Muntinlupa City, Metro Manila
			<br />
			Info.northgate@informatics.com.ph
			<br />
			Landline: 8774-24-74 || Mobile: 09695385212 <BR>
			All Rights Reserved Copyright © 2024
		</p>
	</footer>

	<?php include_once "views/templates/body_scripts.php"; ?>
	<?php include_once("views/home/chatbox.php") ?>
</body>

</html>