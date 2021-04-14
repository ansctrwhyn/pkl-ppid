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
  				<a href="<?= base_url("admin/") ?>profil">Profil</a>
  			</li>
  			<li class="breadcrumb-item active">Edit profil</li>
  		</ol>

  		<!-- DataTables Example -->
  		<div class="col-lg-10" style="display: block; margin-left:auto; margin-right:auto">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Profil</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Edit Profil</h5>
  				</div>
  				<div class="card-body">
  					<div class="container">
  						<div class="row">
  							<div class="col-lg-12" style="display: block; margin-left:auto; margin-right:auto">
  								<?= form_open_multipart('admin/editProfil'); ?>
  								<div class="form-group row">
  									<label for="email" class="col-sm-2 col-form-label">Email</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>" readonly>
  									</div>
  								</div>
  								<div class="form-group row">
  									<label for="nama" class="col-sm-2 col-form-label">Nama</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']; ?>">
  										<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
  									</div>
  								</div>
  								<div class="form-group row">
  									<label for="no_identitas" class="col-sm-2 col-form-label">Nomor Identitas</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $admin['no_identitas']; ?>" readonly>
  									</div>
  								</div>
  								<div class="form-group row">
  									<label for="no_telp" class="col-sm-2 col-form-label">Nomor Telepon</label>
  									<div class="col-sm-10">
  										<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $admin['no_telp']; ?>">
  										<?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
  									</div>
  								</div>
  								<div class="form-group row">
  									<div class="col-sm-2 col-form-label text-bold">Foto Profil</div>
  									<div class="col-sm-8">
  										<div class="row">
  											<!-- <div class="col-sm-4">
  												<img src="<?= base_url('assets/image/avatar/') . $admin['image']; ?>" class="img-thumbnail" style="width:200px; height:150px;">
  											</div> -->
  											<div class="col-sm-8">
  												<!-- <div class="custom-file">
  													<input type="file" class="custom-file-input" id="Image" name="image">
  													<label class="custom-file-label" for="image">Choose file</label>
  													<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
												  </div> -->
  												<div class="custom-file">
  													<input type="file" class="file_upload" id="Image" name="image">
  													<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
  												</div>
  											</div>
  										</div>
  									</div>
  								</div>
  								<div class="form-group row justify-content-end">
  									<div class="col-sm-10">
  										<button type="submit" class="btn btn-primary">Simpan</button>
  										<a href="<?= base_url('admin/profil'); ?>">
  											<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
  										</a>
  									</div>
  								</div>
  								</form>
  							</div>
  						</div>

  					</div>

  				</div>
  				<!-- /.container-fluid -->
  			</div>
  		</div>
  	</div>


  </div>
  <!-- /.content-wrapper -->
