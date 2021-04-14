<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?= base_url('assets/vendor/css/jquery-ui.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/css/main.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/css/style.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>

<body>
	<!-- background="<?= base_url('assets/image/bg1.jpg'); ?>" -->
	<div class="fixed-top top-home">
		<div class="top-notif d-none d-md-block">
			<div class="container">
				<div class="content-section">
				</div>
			</div>
		</div>

		<div class="container-desktop">
			<!-- Navbar Menu Desktop -->
			<nav class="navbar navbar-expand-lg desktop-navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand brand-area pt-0" href="<?= base_url(); ?>">
							<img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid logo-home">
						</a>
					</div>
					<div id="ShowMenuMobile" class="navbar-toggler">
						<i class="fa fa-bars text-white" aria-hidden="true"></i>
					</div>

					<div class="collapse navbar-collapse justify-content-end" id="navbarDesktop">
						<ul class="navbar-nav">
							<li class="nav-item <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
								<a class="nav-link" href="<?= base_url(); ?>" style="letter-spacing:2px">Beranda</a>
							</li>
							<li class="nav-item <?= $this->uri->segment(1) == 'profil' ? 'active' : '' ?>">
								<a class="nav-link" href="<?= base_url('profil') ?>" style="letter-spacing:2px">Profil</a>
							</li>
							<li class="nav-item <?= $this->uri->segment(1) == 'informasi_publik' ? 'active' : '' ?>">
								<a class="nav-link" href="<?= base_url('informasi_publik') ?>" style="letter-spacing:2px">Informasi Publik</a>
							</li>
							<li class="nav-item <?= $this->uri->segment(1) == 'berita' ? 'active' : '' ?>">
								<a class="nav-link" href="<?= base_url('berita') ?>" style="letter-spacing:2px">Berita</a>
							</li>
							<li class="nav-item <?= $this->uri->segment(1) == 'kontak' ? 'active' : '' ?>">
								<a class="nav-link" href="<?= base_url('kontak') ?>" style="letter-spacing:2px">Kontak Kami</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<!-- Sidebar Menu Mobile -->
			<div id="mySidenav" class="sidenav">
				<div class="container-fluid">
					<div class="closebtn text-gold" id="CloseMenuMobile">
						<svg width="15" height="15" viewBox="0 0 16 16">
							<path fill="#FFF" fill-rule="evenodd" d="M16 1.622L9.622 8 16 14.378 14.378 16 8 9.622 1.622 16 0 14.378 6.378 8 0 1.622 1.622 0 8 6.378 14.378 0z">
							</path>
						</svg>
					</div>

					<div class="mt-5 mb-3 text-center">
						<img src="<?= base_url('assets/image/logo.png'); ?>" width="400px" class="img-fluid" alt="">
					</div>

					<ul class="navbar-nav-mobile m-t-40 text-center">
						<li class="<?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
							<a href="<?= base_url('home') ?>" style="letter-spacing:2px;">Beranda</a>
						</li>
						<li class="<?= $this->uri->segment(1) == 'profil' ? 'active' : '' ?>">
							<a href="<?= base_url('profil'); ?>" style="letter-spacing:2px;">Profil</a>
						</li>
						<li class="<?= $this->uri->segment(1) == 'informasi_publik' ? 'active' : '' ?>">
							<a href="<?= base_url('informasi_publik') ?>" style="letter-spacing:2px; ">Informasi Publik</a>
						</li>
						<li class="<?= $this->uri->segment(1) == 'berita' ? 'active' : '' ?>">
							<a href="<?= base_url('berita') ?>" style="letter-spacing:2px;">Berita</a>
						</li>
						<li class="<?= $this->uri->segment(1) == 'kontak' ? 'active' : '' ?>">
							<a href="<?= base_url('kontak') ?>" style="letter-spacing:2px;">Kontak Kami</a>
						</li>
					</ul>

				</div>
			</div>

		</div>
	</div>

	<div class="content-box content-page" style="background-color:#750000">
		<div class="container">
		</div>
		<section class="content-blank" style="background-color:#F9EBEA">
			<div class="container">
				<div class="row">
					<div class="col mb-4" style="display: block; margin-left:auto; margin-right:auto">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="Informasi_Tabs" role="tabpanel" aria-labelledby="informasi-tab">
								<div class="heading-blue-rgba with-line mt-1 mb-4"><span> Statistik Layanan Informasi Publik</span></div>
								<div class="row">
									<div class="col mt-4 mb-2">
										<div class="card">
											<div class="d-flex align-items-center m-b-30">
												<div>
													<p class="mb-1">Jumlah Dokumen</p>
													<h5 class="font-700 mb-0 text-warning"><?= $total_info ?></h5>
												</div>
											</div>

											<div class="d-flex align-items-center m-b-30">
												<div>
													<p class="mb-1">Jumlah Permohonan Informasi</p>
													<h5 class="font-700 mb-0 text-warning"><?= $total_permohonan ?></h5>
												</div>
											</div>

											<div class="d-flex align-items-center">
												<div>
													<p class="mb-1">Jumlah Unduhan</p>
													<h5 class="font-700 mb-0 text-warning"><?= $total_unduh ?></h5>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<canvas id="myChart"></canvas>
										<script>
											var ctx = document.getElementById('myChart').getContext('2d');
											var chart = new Chart(ctx, {
												// The type of chart we want to create
												type: 'doughnut',

												// The data for our dataset
												data: {
													labels: ['Dalam Proses', 'Ditolak', 'Selesai'],
													datasets: [{
														backgroundColor: ['#F65058FF', '#FBDE44FF', '#28334AFF'],
														data: [<?= round($dalamproses / $total_permohonan * 100); ?>, <?= round($ditolak / $total_permohonan * 100); ?>, <?= round($selesai / $total_permohonan * 100); ?>]
													}]
												},

												// Configuration options go here
												options: {
													tooltips: {
														callbacks: {
															label: function(tooltipItem, data) {
																return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
															}
														}
													}
												}
											});
										</script>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<footer style="background:#750000; margin-top:-20px; padding-bottom:15px">
		<div class="container text-center">
			<div class="row">

				<div class="col-md-4 pt-4" style="margin-top:50px;">
					<img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid" style="width:300px;">
				</div>
				<div class="col-md-4 pt-4 text-white">
					<!-- <img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid" style="width:300px;"> -->
					<h5 class="text-white text-center" style="letter-spacing:2px">Lokasi Kami</h5>
					<hr style="width:70px;">
					<div class="text-white" style="font-size:13px; line-height:23px; letter-spacing:1px">
						<!-- <br> -->
						<span class="fa fa-map-marker"></span> <span>Jl. Kab., Sabggrahan, Giripurwo, Kec. Wonogiri, Kabupaten Wonogiri, Jawa Tengah 57612</span><br>
						<span class="fa fa-phone"> </span> <span>(021) 000000</span><br>
						<a href="mailto:" class="text-white"><span class="fa fa-envelope"> </span> <span>info@ppid.go.id</span></a>
					</div>
				</div>
				<div class="col-md-4 pt-4">
					<div class="container">
						<div class="row">
							<div class="col">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7566287281193!2d110.92317021477825!3d-7.815566194368149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a2e3638af220f%3A0x9e90485890bebfbe!2sDinas%20Komunikasi%20dan%20Informatika%20(Diskominfo)%20Kab.%20Wonogiri!5e0!3m2!1sid!2sid!4v1578271227963!5m2!1sid!2sid" width="250" height="150" frameborder="0"></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<footer style="background:black; padding-top: 10px; text-align:center">
		<div class="container">
			<div class=" row">
				<div class="col">
					<p class="text-center" style="color:orange"><strong>&copy; <?php echo date('Y'); ?> - PPID Kabupaten Wonogiri. All Rights Reserved.</strong></p>
				</div>
			</div>
		</div>
	</footer>


	<script src="<?= base_url('assets/vendor/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/js/jquery-ui.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/js/my_script.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/js/main.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/js/sidebar-mobile.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/js/app.js') ?>"></script>
</body>

</html>
