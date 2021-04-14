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
	<style>
		.field-icon {
			float: right;
			padding-right: 25px;
			margin-top: -30px;
			position: relative;
			z-index: 2;
		}
	</style>
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
