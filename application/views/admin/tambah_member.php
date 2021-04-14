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
  			<li class="breadcrumb-item active">Tambah Member</li>
  		</ol>

  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Member</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Tambah Member</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<?= form_open_multipart('admin/addMember'); ?>
  						<div class="form-group row">
  							<label for="tipe_member" class="col-sm-2 col-form-label">Tipe Member</label>
  							<div class="col-sm-10">
  								<select name="tipe_member" class="form-control" required>
  									<option value="">--Pilih--</option>
  									<?php
										foreach ($tipe_member as $row) {
										?>
  										<option value="<?php echo $row['id_type']; ?> "><?php echo $row['type']; ?></option>
  									<?php
										}
										?>
  								</select>
  								<?= form_error('tipe_member', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
  								<?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="no_identitas" class="col-sm-2 col-form-label">Nomor Identitas</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= set_value('no_identitas'); ?>" required>
  								<?= form_error('no_identitas', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<div class="col-sm-2 col-form-label text-bold">Scan Kartu Identitas</div>
  							<div class="col-sm-10">
  								<div class="custom-file">
  									<input type="file" class="file_upload" id="Image" name="image">
  									<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="email" class="col-sm-2 col-form-label">Email</label>
  							<div class="col-sm-10">
  								<input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required>
  								<?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="password" class="col-sm-2 col-form-label">Password</label>
  							<div class="col-sm-10">
  								<input type="password" class="form-control" id="password1" name="password" value="<?= set_value('password'); ?>" required>
  								<span toggle="#password1" class="mr-1 fa fa-fw fa-eye field-icon toggle-password"></span>
  								<?= form_error('password', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="password" class="col-sm-2 col-form-label">Nomor Telepon</label>
  							<div class="col-sm-10">
  								<input type="tel" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp'); ?>" required>
  								<?= form_error('no_telp', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
  							<div class="col-sm-10">
  								<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" required><?= set_value('alamat'); ?></textarea>
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
  </div>


  <script>
  	$(".toggle-password").click(function() {

  		$(this).toggleClass("fa-eye fa-eye-slash");
  		var input = $($(this).attr("toggle"));
  		if (input.attr("type") == "password") {
  			input.attr("type", "text");
  		} else {
  			input.attr("type", "password");
  		}
  	});
  </script>
