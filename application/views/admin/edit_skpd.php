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
  				<a href="<?= base_url("admin/") ?>skpd">SKPD</a>
  			</li>
  			<li class="breadcrumb-item active">Edit SKPD</li>
  		</ol>
  		<?= $this->session->flashdata('message'); ?>
  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto;margin-top:100px; padding-bottom:90px">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit SKPD</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Edit SKPD</h5>
  				</div>
  				<div class="card-body">
  					<div class="container">
  						<form action="<?= base_url('admin/editSKPD/'); ?><?= $skpd['id_skpd'] ?>" method="POST" enctype="multipart/form-data">
  							<div class="form-group row">
  								<label for="id_skpd" class="col-sm-2 col-form-label">Kode SKPD</label>
  								<div class="col-sm-10">
  									<input type="text" class="form-control" id="id_skpd" name="id_skpd" value="<?= $skpd['id_skpd']; ?>" readonly>
  									<?= form_error('id_skpd', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row">
  								<label for="skpd" class="col-sm-2 col-form-label">SKPD</label>
  								<div class="col-sm-10">
  									<input type="text" class="form-control" id="skpd" name="skpd" value="<?= $skpd['skpd']; ?>">
  									<?= form_error('skpd', '<small class="text-danger pl-3">', '</small>'); ?>
  								</div>
  							</div>
  							<div class="form-group row justify-content-end">
  								<div class="col-sm-10">
  									<button type="submit" class="btn btn-primary">Simpan</button>
  									<a href="<?= base_url('admin/skpd'); ?>">
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
