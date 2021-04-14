  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top: 65px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff;">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>member">Member</a>
  			</li>
  			<li class="breadcrumb-item active">Edit Member</li>
  		</ol>
  		<?= $this->session->flashdata('message'); ?>
  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Admin</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Edit Member</h5>
  				</div>
  				<div class="card-body">
  					<div class="container">
  						<form action="<?= base_url('admin/editMember/'); ?><?= $member['id_member'] ?>" method="POST" enctype="multipart/form-data">
  							<div class="form-group row">
  								<label for="tipe_member" class="col-sm-2 col-form-label">Tipe Member</label>
  								<div class="col-sm-10">
  									<input type="text" class="form-control" id="tipe_member" name="tipe_member" value="<?= $tipe['type']; ?>" readonly>
  									<?= form_error('tipe_member', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="no_identitas" class="col-sm-2 col-form-label">Nomor Identitas</label>
  								<div class="col-sm-10">
  									<input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $member['no_identitas']; ?>" readonly>
  									<?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="nama" class="col-sm-2 col-form-label">Nama</label>
  								<div class="col-sm-10">
  									<input type="text" class="form-control" id="nama" name="nama" value="<?= $member['nama']; ?>">
  									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="email" class="col-sm-2 col-form-label">Email</label>
  								<div class="col-sm-10">
  									<input type="email" class="form-control" id="email" name="email" value="<?= $member['email']; ?>" readonly>
  									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="no_telp" class="col-sm-2 col-form-label">Nomor Telepon</label>
  								<div class="col-sm-10">
  									<input type="tel" class="form-control" id="no_telp" name="no_telp" value="<?= $member['no_telp']; ?>">
  									<?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
  								<div class="col-sm-10">
  									<textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $member['alamat']; ?></textarea>
  									<?= form_error('alamat', '<small class="text-danger" >', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row justify-content-end">
  								<div class="col-sm-10">
  									<button type="submit" class="btn btn-primary">Simpan</button>
  									<a href="<?= base_url('admin/member'); ?>">
  										<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
  									</a>
  								</div>
  							</div>
  						</form>
  						<br>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
