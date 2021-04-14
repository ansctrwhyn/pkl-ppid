<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand fixed-top" style="background-color: #750000">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link text-white" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<!-- <li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li> -->
			</ul>

			<!-- SEARCH FORM -->
			<!-- <form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar text-white" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form> -->

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-weight:500">
							<?= $member['nama']; ?>
						</span>
						<i class="far fa-user-circle fa-lg"></i>
						<!-- <img class="img-circle elevation-1" width="30px" height="30px" src="<?= base_url('assets/image/avatar/') . $admin['image']; ?>"> -->

					</a>

					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<!-- <a class="dropdown-item" href="<?= base_url('admin/profil') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profil
						</a> -->
						<a class="dropdown-item" href="<?= base_url('member/ubah_password') ?>">
							<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
							Ubah Password
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<script src="<?= base_url('assets/admin/') ?>plugins/jquery/jquery.min.js"></script>
