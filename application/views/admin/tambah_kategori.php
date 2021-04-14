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
  				<a href="<?= base_url("admin/") ?>kategori">Kategori</a>
  			</li>
  			<li class="breadcrumb-item active">Tambah Kategori</li>
  		</ol>
  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto;margin-top:125px; padding-bottom:120px">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Kategori</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Tambah Kategori</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<?= form_open_multipart('admin/addKategori'); ?>
  						<div class="form-group row">
  							<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="kategori" name="kategori" value="<?= set_value('kategori'); ?>" required>
  								<?= form_error('kategori', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row justify-content-end">
  							<div class="col-sm-10">
  								<button type="submit" class="btn btn-primary">Simpan</button>
  								<a href="<?= base_url('admin/kategori'); ?>">
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
