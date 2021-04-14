<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background-color: #750000">
	<!-- Brand Logo -->
	<a href="<?= base_url('member') ?>" class="brand-link pb-0">
		<img src="<?= base_url('assets/') ?>image/wonogiri.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light text-white " style="font-size:20px;">PPID Wonogiri</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 mb-3 pt-3 pb-3 d-flex" style="background-color:#F9EBEA; border-radius:10px">
			<div class="image ">
				<!-- <img src="" style="min-height:35px; max-height:35px; border: 1px solid #750000; border-radius:50px" class="img-circle elevation-2" alt="User Image"> -->
				<i class="far fa-user-circle fa-2x" style="color:black"></i>
			</div>
			<div class="info " style="color:#750000; font-weight:600">
				<?= $member['nama']; ?>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('member/beranda') ?>" class="nav-link <?= $this->uri->segment(2) == '' | $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Beranda
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('member/createPermohonan') ?>" class="nav-link <?= $this->uri->segment(2) == 'createPermohonan' ? 'active' : '' ?>">
						<i class="nav-icon far fa-edit"></i>
						<p>
							Permohonan Informasi
						</p>
					</a>
				</li>
				<!-- <li class=" nav-item">
							<a href="<?= base_url('member/createKeberatan') ?>" class="nav-link <?= $this->uri->segment(2) == 'createKeberatan' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-exclamation-circle"></i>
								<p>
									Pengajuan Keberatan
								</p>
							</a>
				</li> -->

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih 'Logout' untuk keluar dari sistem.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>
