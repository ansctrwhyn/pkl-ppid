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
  				<a href="<?= base_url("admin/") ?>berita">Berita</a>
  			</li>
  			<li class="breadcrumb-item active">Tambah Berita</li>
  		</ol>

  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto;margin-top:30px; padding-bottom:10px">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Berita</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Tambah Berita</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<?= form_open_multipart('admin/addBerita'); ?>
  						<div class="form-group row">
  							<label for="judul" class="col-sm-2 col-form-label">Judul</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>" required>
  								<?= form_error('judul', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="isi" class="col-sm-2 col-form-label">Isi</label>
  							<div class="col-sm-10">
  								<textarea class="form-control ckeditor" name="isi" id="ckeditor" rows="5"><?= set_value('isi'); ?></textarea>
  								<?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<div class="col-sm-2 col-form-label text-bold">Gambar</div>
  							<div class="col-sm-10">
  								<div class="custom-file">
  									<input type="file" class="file_upload" id="Image" name="image">
  									<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  						</div>
  						<div class="form-group row justify-content-end">
  							<div class="col-sm-10">
  								<button type="submit" class="btn btn-primary">Simpan</button>
  								<a href="<?= base_url('admin/berita'); ?>">
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
