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
  			<li class="breadcrumb-item active">Edit Informasi Berkala</li>
  		</ol>
  		<?= $this->session->flashdata('message'); ?>
  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto;margin-top:20px; padding-bottom:7px">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Informasi Berkala</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Edit Informasi Berkala</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<form action="<?= base_url('admin/editInformasiBerkala/'); ?><?= $informasi_berkala['id_informasi'] ?>" method="POST" enctype="multipart/form-data">
  							<div class="form-group row">
  								<label for="judul" class="col-sm-2 col-form-label">Judul</label>
  								<div class="col-sm-10">
  									<input type="text" class="form-control" id="judul" name="judul" value="<?= $informasi_berkala['judul']; ?>">
  									<?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="id_jenis" class="col-sm-2 col-form-label">Jenis</label>
  								<div class="col-sm-10">
  									<select name="id_jenis" class="form-control" required>
  										<option value="">--Pilih--</option>
  										<?php
											foreach ($all_jenis as $row) { ?>
  											<?php if ($row['jenis'] == $jenis['jenis']) { ?>
  												<option value="<?= $row['id_jenis']; ?>" selected><?= $row['jenis']; ?></option>
  											<?php } else { ?>
  												<option value="<?= $row['id_jenis']; ?>"><?= $row['jenis']; ?></option>
  											<?php } ?>
  										<?php
											}
											?>
  									</select>
  									<?= form_error('jenis', '<small class="text-danger" >', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
  								<div class="col-sm-10">
  									<select name="id_kategori" class="form-control" required>
  										<option value="">--Pilih--</option>
  										<?php
											foreach ($all_kategori as $row) { ?>
  											<?php if ($row['kategori'] == $kategori['kategori']) { ?>
  												<option value="<?= $row['id_kategori']; ?>" selected><?= $row['kategori']; ?></option>
  											<?php } else { ?>
  												<option value="<?= $row['id_kategori']; ?>"><?= $row['kategori']; ?></option>
  											<?php } ?>
  										<?php
											}
											?>
  									</select>
  									<?= form_error('kategori', '<small class="text-danger" >', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="id_skpd" class="col-sm-2 col-form-label">SKPD</label>
  								<div class="col-sm-10">
  									<select name="id_skpd" class="form-control" required>
  										<option value="">--Pilih--</option>
  										<?php
											foreach ($all_skpd as $row) { ?>
  											<?php if ($row['skpd'] == $skpd['skpd']) { ?>
  												<option value="<?= $row['id_skpd']; ?>" selected><?= $row['skpd']; ?></option>
  											<?php } else { ?>
  												<option value="<?= $row['id_skpd']; ?>"><?= $row['skpd']; ?></option>
  											<?php } ?>
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
  	<!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
