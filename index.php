<?php      
    include('db_connect.php');  
		$count = 0;
		if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count != 1){ 
          header("Location: login.php");
        }
			}     
?>  
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Travel Hidayat</title>
		<link
			rel="stylesheet"
			href="libraries/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="styles/main.css" />
		<link
			href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap"
			rel="stylesheet" />
		<link
			href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap"
			rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			<nav class="row navbar navbar-expand-lg navbar-light bg-white">
				<a class="navbar-brand" href="#"><b>Travel Hidayat</b></a>
				<button
					class="navbar-toggler navbar-toggler-right"
					type="button"
					data-toggle="collapse"
					data-target="#navb">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Menu -->
				<div class="collapse navbar-collapse" id="navb">
					<ul class="navbar-nav ml-auto mr-3">
						<li class="nav-item mx-md-2">
							<a class="nav-link active" href="#">Beranda</a>
						</li>
						<li class="nav-item mx-md-2">
							<a class="nav-link" href="#popular">Destinasi</a>
						</li>
						<li class="nav-item mx-md-2">
							<a class="nav-link" href="#testimonialsHeading">Testimoni</a>
						</li>
					</ul>

					<!-- Mobile button -->
					<?php
						if ($count != 1) {	
					?>
					<form action="login.php" class="form-inline d-sm-block d-md-none">
						<button class='btn btn-login my-2 my-sm-0'>Masuk</button>
					</form>
					<?php 
					}
					else { 
					?>
					<form action="logout.php" class="form-inline d-sm-block d-md-none">
						<button class='btn btn-login my-2 my-sm-0'>Logout</button>
					</form>
					<?php } ?>
					<!-- Desktop Button -->
					<?php
						if ($count != 1) {	
					?>
					<form action="login.php" class="form-inline my-2 my-lg-0 d-none d-md-block">
						<button class='btn btn-login btn-navbar-right my-2 my-sm-0 px-4'>Masuk</button>
					</form>
					<?php 
					} 
					else {
					?>
					<form action="logout.php" class="form-inline my-2 my-lg-0 d-none d-md-block">
						<button class='btn btn-login btn-navbar-right my-2 my-sm-0 px-4'>Logout</button>
					</form>
					<?php } ?>
				</div>
			</nav>
		</div>
		<header class="text-center">
			<h1>
				Eksplor Keindahan Dunia
				<br />
				Dengan Travel Hidayat
			</h1>
			<p class="mt-3">
				Nikmati keindahan yang belum
				<br />
				pernah anda rasakan
			</p>
			<a href="#" class="btn btn-get-started px-4 mt-4"> Mulai Sekarang </a>
		</header>
		<main>
			<div class="container">
				<section class="section-stats row justify-content-center" id="stats">
					<div class="col-3 col-md-2 stats-detail">
						<h2>539</h2>
						<p>Trips</p>
					</div>
					<div class="col-3 col-md-2 stats-detail">
						<h2>12</h2>
						<p>Locations</p>
					</div>
					<div class="col-3 col-md-2 stats-detail">
						<h2>857</h2>
						<p>Hotels</p>
					</div>
					<div class="col-3 col-md-2 stats-detail">
						<h2>47</h2>
						<p>Partners</p>
					</div>
				</section>
			</div>
			<section class="section-popular" id="popular">
				<div class="container">
					<div class="row">
						<div class="col text-center section-popular-heading">
							<h2>Wisata Popular</h2>
							<p>
								Destinasi pilihan
								<br />
								yang sangat populer
							</p>
						</div>
					</div>
				</div>
			</section>
			<section class="section-popular-content" id="popularContent">
				<div class="container">
					<div class="section-popular-travel row justify-content-center">
						<div class="col-sm-6 col-md-4 col-lg-3">
							<div
								class="card-travel text-center d-flex flex-column"
								style="background-image: url('images/travel-1.jpg')">
								<div class="travel-country">INDONESIA</div>
								<div class="travel-location">DERATAN, BALI</div>
								<div class="travel-button mt-auto">
								<?php
									if ($count == 1) {	
								?>
									<form action="checkout.php" method="get">
										<button class="btn btn-travel-details px-4" name="deratan">
											Booking
										</button>
									</form>
								<?php 
									} 
									else {
								?>
									<a href="login.php" class="btn btn-travel-details px-4">
										Booking
									</a>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
							<div
								class="card-travel text-center d-flex flex-column"
								style="background-image: url('images/travel-2.jpg')">
								<div class="travel-country">INDONESIA</div>
								<div class="travel-location">BROMO, MALANG</div>
								<div class="travel-button mt-auto">
								<?php
									if ($count == 1) {	
								?>
									<form action="checkout.php" method="get">
										<button class="btn btn-travel-details px-4" name="bromo">
											Booking
										</button>
									</form>
								<?php 
									} 
									else {
								?>
									<a href="login.php" class="btn btn-travel-details px-4">
										Booking
									</a>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
							<div
								class="card-travel text-center d-flex flex-column"
								style="background-image: url('images/travel-3.jpg')">
								<div class="travel-country">INDONESIA</div>
								<div class="travel-location">NUSA PENIDA</div>
								<div class="travel-button mt-auto">
								<?php
									if ($count == 1) {	
								?>
									<form action="checkout.php" method="get">
										<button class="btn btn-travel-details px-4" name="nusa-penida">
											Booking
										</button>
									</form>
								<?php 
									} 
									else {
								?>
									<a href="login.php" class="btn btn-travel-details px-4">
										Booking
									</a>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section-networks" id="networks">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<h2>Our Networks</h2>
							<p>
								Companies are trusted us
								<br />
								more than just a trip
							</p>
						</div>
						<div class="col-md-8 text-center">
							<img src="images/partner.png" class="img-patner" />
						</div>
					</div>
				</div>
			</section>
			<section class="section-testimonials-heading" id="testimonialsHeading">
				<div class="container">
					<div class="row">
						<div class="col text-center">
							<h2>They Are Loving Us</h2>
							<p>
								Moments were giving them
								<br />
								the best experience
							</p>
						</div>
					</div>
				</div>
			</section>
			<section class="section-testimonials-content" id="testimonialsContent">
				<div class="container">
					<div
						class="section-popular-travel row justify-content-center match-height">
						<div class="col-sm-6 col-md-6 col-lg-4">
							<div class="card card-testimonial text-center">
								<div class="testimonial-content">
									<img
										src="images/avatar-1.png"
										alt=""
										class="mb-4 rounded-circle" />
									<h3 class="mb-4">Angga Risky</h3>
									<p class="testimonials">
										“ It was glorious and I could not stop to say wohooo for
										every single moment Dankeeeeee “
									</p>
								</div>
								<hr />
								<p class="trip-to mt-2">Trip to Ubud</p>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-4">
							<div class="card card-testimonial text-center">
								<div class="testimonial-content">
									<img
										src="images/avatar-2.png"
										alt=""
										class="mb-4 rounded-circle" />
									<h3 class="mb-4">Shayna</h3>
									<p class="testimonials">
										“ The trip was amazing and I saw something beautiful in that
										Island that makes me want to learn more “
									</p>
								</div>
								<hr />
								<p class="trip-to mt-2">Trip to Nusa Penida</p>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-4">
							<div class="card card-testimonial text-center">
								<div class="testimonial-content mb-auto">
									<img
										src="images/avatar-3.png"
										alt=""
										class="mb-4 rounded-circle" />
									<h3 class="mb-4">Shabrina</h3>
									<p class="testimonials">
										“ I loved it when the waves was shaking harder — I was
										scared too “
									</p>
								</div>
								<hr />
								<p class="trip-to mt-2">Trip to Karimun Jawa</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer class="section-footer mt-5 mb-4 border-top">
			<div class="container-fluid pt-3">
				<div class="col-12 text-center text-gray-500 font-weight-light mb-3">
					Bandar Lampung, Indonesia | 0821 - 2222 - 8888 | cs@travelhidayat.id
				</div>
				<div class="col-12 text-center text-gray-500 font-weight-light">
					&copy; 2022 Copyright Travel Hidayat • All rights reserved • Made in
					Indonesia
				</div>
			</div>
		</footer>
		<script src="libraries/retina/retina.js"></script>
		<script src="libraries/jquery/jquery-3.4.1.min.js"></script>
		<script src="libraries/bootstrap/js/bootstrap.js"></script>
	</body>
</html>
