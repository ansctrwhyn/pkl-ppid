<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background-color: #750000">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin') ?>" class="brand-link pb-0">
		<img src="<?= base_url('assets/') ?>image/wonogiri.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light text-white " style="font-size:20px;">PPID Wonogiri</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<a href="<?= base_url('admin') ?>" class="user-panel mt-3 mb-3 pt-3 pb-3 d-flex" style="background-color:#F9EBEA; border-radius:10px">
			<div class="image ">
				<i class="far fa-user-circle fa-2x" style="color:black"></i>
				<!-- <img src="<?= base_url('assets/image/avatar/') . $admin['image']; ?>" style="min-height:35px; max-height:35px; border: 1px solid #750000; border-radius:50px" class="img-circle elevation-2" alt="User Image"> -->
			</div>
			<div class="info " style="color:#750000; font-weight:600">
				<?= $admin['nama']; ?>
			</div>
		</a>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == '' | $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-header text-white">DATABASE</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/member') ?>" class="nav-link <?= $this->uri->segment(2) == 'member' | $this->uri->segment(2) == 'addMember' | $this->uri->segment(2) == 'editMember' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Member
						</p>
					</a>
				</li>
				<!-- 
				<li class="nav-item has-treeview <?= $this->uri->segment(2) == 'data_admin' | $this->uri->segment(2) == 'member' ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users-cog"></i>

						<p>
							User
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('admin/data_admin') ?>" class="nav-link <?= $this->uri->segment(2) == 'data_admin' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Admin</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/member') ?>" class="nav-link <?= $this->uri->segment(2) == 'member' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Member</p>
							</a>
						</li>
					</ul>
				</li> -->
				<li class="nav-item has-treeview <?= $this->uri->segment(2) == 'informasi_berkala' | $this->uri->segment(2) == 'informasi_serta_merta' | $this->uri->segment(2) == 'informasi_setiap_saat' ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-folder-open"></i>
						<p>
							Informasi Publik
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('admin/informasi_berkala') ?>" class="nav-link <?= $this->uri->segment(2) == 'informasi_berkala' | $this->uri->segment(2) == 'addInformasiBerkala' | $this->uri->segment(2) == 'editInformasiBerkala' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Informasi Berkala</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/informasi_serta_merta') ?>" class="nav-link <?= $this->uri->segment(2) == 'informasi_serta_merta' | $this->uri->segment(2) == 'addInformasiSertaMerta' | $this->uri->segment(2) == 'editInformasiSertaMerta' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Informasi Serta Merta</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/informasi_setiap_saat') ?>" class="nav-link <?= $this->uri->segment(2) == 'informasi_setiap_saat' | $this->uri->segment(2) == 'addInformasiSetiapSaat' | $this->uri->segment(2) == 'editInformasiSetiapSaat' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Informasi Setiap Saat</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview <?= $this->uri->segment(2) == 'kategori' | $this->uri->segment(2) == 'skpd' ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-database"></i>
						<p>
							Kategori dan SKPD
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<!-- <li class="nav-item">
							<a href="<?= base_url('admin/dokumen') ?>" class="nav-link <?= $this->uri->segment(2) == 'dokumen' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Dokumen</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?= base_url('admin/kategori') ?>" class="nav-link <?= $this->uri->segment(2) == 'kategori' | $this->uri->segment(2) == 'addKategori' | $this->uri->segment(2) == 'editKategori' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Kategori Informasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/skpd') ?>" class="nav-link <?= $this->uri->segment(2) == 'skpd' | $this->uri->segment(2) == 'addSKPD' | $this->uri->segment(2) == 'editSKPD' ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>SKPD</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- <li class="nav-header text-white">FORM</li> -->

				<li class="nav-item">
					<a href="<?= base_url('admin/permohonan') ?>" class="nav-link <?= $this->uri->segment(2) == 'permohonan' | $this->uri->segment(2) == 'kirimPermohonan' ? 'active' : '' ?>">
						<i class="nav-icon fab fa-wpforms"></i>
						<p>
							Permohonan Informasi
						</p>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a href="<?= base_url('admin/keberatan') ?>" class="nav-link <?= $this->uri->segment(2) == 'keberatan' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-exclamation-circle"></i>
						<p>
							Pengajuan Keberatan
						</p>
					</a>
				</li> -->

				<!-- <li class="nav-header text-white">LAIN-LAIN</li> -->

				<li class="nav-item">
					<a href="<?= base_url('admin/berita') ?>" class="nav-link <?= $this->uri->segment(2) == 'berita' | $this->uri->segment(2) == 'addBerita' | $this->uri->segment(2) == 'editBerita' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-newspaper"></i>
						<p>
							Berita
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/kotak_saran') ?>" class="nav-link <?= $this->uri->segment(2) == 'kotak_saran' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-envelope"></i>
						<p>
							Kotak Saran
						</p>
					</a>
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
				<a class="btn btn-primary" href="<?= base_url('admin/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>
