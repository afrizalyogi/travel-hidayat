<?php
session_start();
if (isset($_GET['deratan'])) {
  $destination = "Deratan, Bali";
}
elseif (isset($_GET['bromo'])) {
  $destination = "Bromo, Malang";
}
elseif (isset($_GET['nusa-penida'])) {
  $destination = "Nusa Penida";
}
else {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Checkout</title>
		<link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.css" />
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
				<div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
					<a class="navbar-brand" href="index.php">
						<b>Travel Hidayat</b>
					</a>
				</div>
				<ul class="navbar-nav mr-auto d-none d-lg-block">
					<li>
						<span class="text-muted"
							>| &nbsp; Nikmati keindahan yang belum pernah anda rasakan</span
						>
					</li>
				</ul>
			</nav>
		</div>
		<main>
			<section class="section-details-header"></section>
			<section class="section-details-content">
				<div class="container">
					<div class="row">
						<div class="col p-0 pl-3 pl-lg-0">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item" aria-current="page">
										Paket Travel
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Checkout
									</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8 pl-lg-0">
							<div class="card card-details mb-3">
								<h1>Mulai Perjalanan Anda</h1>
								<p>Trip to <?=$destination?>, Indonesia</p>
								<div class="member mt-3">
									<h2>Dewasa</h2>
									<form class="form-inline">
										<label class="sr-only" for="inputPeople">Jumlah</label>
										<input
											type="number"
											class="form-control mb-2 mr-sm-2 w-75"
											id="inputPeople"
											placeholder="Jumlah Anggota" />
										<button type="submit" class="btn btn-add-now mb-2 px-4">
											Add Now
										</button>
									</form>
                  <br/>
                  <h2>Anak-Anak</h2>
									<form class="form-inline">
										<label class="sr-only" for="inputPeople">Jumlah</label>
										<input
											type="number"
											class="form-control mb-2 mr-sm-2 w-75"
											id="inputPeople"
											placeholder="Jumlah Anggota" />
										<button type="submit" class="btn btn-add-now mb-2 px-4">
											Add Now
										</button>
									</form>
                  <br/>
									<h3 class="mt-2 mb-0">Note</h3>
									<p class="disclaimer mb-0">
										Kategori anak-anak diperuntukan untuk usia 0-12 tahun.
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card card-details card-right">
								<h2>Detail Pemesanan</h2>
								<table class="trip-informations">
									<tr>
										<th width="50%">Dewasa</th>
										<td width="50%" class="text-right">2 orang</td>
									</tr>
									<tr>
										<th width="50%">Anak-Anak</th>
										<td width="50%" class="text-right">2 anak</td>
									</tr>
									<tr>
										<th width="50%">Harga Dewasa</th>
										<td width="50%" class="text-right">Rp 879.000 / orang</td>
									</tr>
                  <tr>
										<th width="50%">Harga Anak-Anak</th>
										<td width="50%" class="text-right">Rp 439.000 / anak</td>
									</tr>
									<tr>
										<th width="50%">Sub Total</th>
										<td width="50%" class="text-right">Rp 2.759.000</td>
									</tr>
									<tr>
										<th width="50%">Total (+Unique)</th>
										<td width="50%" class="text-right text-total">
											<span class="text-blue">Rp 2.758.</span
											><span class="text-orange">874</span>
										</td>
									</tr>
								</table>

								<hr />
								<h2>Metode Pembayaran</h2>
								<p class="payment-instructions">
									Silahkan lakukan pembayaran untuk melanjutkan perjalanan anda
								</p>
								<div class="bank">
									<div class="bank-item pb-3">
										<img src="images/ic_bank.png" alt="" class="bank-image" />
										<div class="description">
											<h3>PT Hidayat Berkah</h3>
											<p>
												0881 8829 8800
												<br />
												Bank Central Asia
											</p>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="bank-item">
										<img src="images/ic_bank.png" alt="" class="bank-image" />
										<div class="description">
											<h3>PT Hidayat Berkah</h3>
											<p>
												0899 8501 7888
												<br />
												Bank Mandiri
											</p>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="join-container">
								<a
									href="success.php"
									class="btn btn-block btn-join-now mt-3 py-2"
									>Sudah Bayar</a
								>
							</div>
							<div class="text-center mt-3">
								<a href="index.php" class="text-muted">Batalkan Pemesanan</a>
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
		<script src="libraries/jquery/jquery-3.4.1.min.js"></script>
		<script src="libraries/bootstrap/js/bootstrap.js"></script>
	</body>
</html>
