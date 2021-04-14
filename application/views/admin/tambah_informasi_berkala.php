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
  				<a href="<?= base_url("admin/") ?>informasi_berkala">Informasi Berkala</a>
  			</li>
  			<li class="breadcrumb-item active">Tambah Informasi Berkala</li>
  		</ol>

  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto; margin-top:20px; padding-bottom:7px">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Informasi Berkala</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Tambah Informasi Berkala</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<?= form_open_multipart('admin/addInformasiBerkala'); ?>
  						<div class="form-group row">
  							<label for="judul" class="col-sm-2 col-form-label">Judul</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>" required>
  								<?= form_error('judul', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="id_jenis" name="id_jenis" value="<?= $jenis_info->jenis ?>" readonly>
  								<?= form_error('jenis', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
  							<div class="col-sm-10">
  								<select name="id_kategori" class="form-control" required>
  									<option value="">--Pilih--</option>
  									<?php
										foreach ($kategori as $row) {
										?>
  										<option value="<?php echo $row->id_kategori; ?> "><?php echo $row->kategori; ?></option>
  									<?php
										}
										?>
  								</select>
  								<?= form_error('kategori', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="skpd" class="col-sm-2 col-form-label">SKPD</label>
  							<div class="col-sm-10">
  								<select name="id_skpd" class="form-control" required>
  									<option value="">--Pilih--</option>
  									<?php
										foreach ($skpd as $row) {
										?>
  										<option value="<?php echo $row['id_skpd']; ?> "><?php echo $row['skpd']; ?></option>
  									<?php
										}
										?>
  								</select>
  								<?= form_error('skpd', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<div class="col-sm-2 col-form-label text-bold">Upload File</div>
  							<div class="col-sm-10">
  								<div class="custom-file">
  									<input type="file" class="file_upload" id="file" name="file">
  									<?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  						</div>
  						<div class="form-group row justify-content-end">
  							<div class="col-sm-10">
  								<button type="submit" class="btn btn-primary">Simpan</button>
  								<a href="<?= base_url('admin/informasi_berkala'); ?>">
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
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
