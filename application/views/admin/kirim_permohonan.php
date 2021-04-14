  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top:65px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>permohonan">Permohonan</a>
  			</li>
  			<li class="breadcrumb-item active">Kirim File</li>
  		</ol>

  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto;margin-top:50px">
  			<div class="card mb-3 shadow">
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Kirim File</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<?php echo validation_errors('<p class="form_error">', '</p>'); ?>
  					<div class="container">
  						<form action="<?= base_url('admin/sendFile/'); ?><?= $permohonan['id_permohonan'] ?>" method="POST" enctype="multipart/form-data">
  							<div class="form-group row">
  								<label for="email" class="col-sm-2 col-form-label">Kirim Ke</label>
  								<div class="col-sm-10">
  									<input type="email" class="form-control" id="email" name="email" value="<?= $permohonan['email']; ?>" readonly>
  									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="file" class="col-sm-2 col-form-label">Upload File</label>
  								<div class="col-sm-10">
  									<div class="custom-file">
  										<input type="file" class="file_upload" id="File" name="file">
  										<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
  									</div>
  								</div>
  							</div>
  							<div class="form-group row justify-content-end">
  								<div class="col-sm-10">
  									<button type="submit" class="btn btn-primary">Kirim</button>
  									<a href="<?= base_url('admin/permohonan'); ?>">
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
  		<br><br><br><br><br><br>
  	</div>
  	<!-- /.container-fluid -->

  </div>
