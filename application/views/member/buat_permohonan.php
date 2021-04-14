  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top: 65px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff;">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("member/") ?>beranda">Beranda</a>
  			</li>
  			<li class="breadcrumb-item active">Buat Permohonan Informasi</li>
  		</ol>
  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto; margin-top:50px; padding-bottom:45px">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Admin</div> -->
  				<div class="card-header" style="background-color:#F9EBEA; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Permohonan Informasi</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<?= form_open_multipart('member/createPermohonan'); ?>
  						<div class="form-group row">
  							<label for="rincian" class="col-sm-4 col-form-label">Informasi Yang Dibutuhkan</label>
  							<div class="col-sm-8">
  								<textarea class="form-control" name="rincian" id="rincian" cols="30" rows="3" required><?= set_value('rincian'); ?></textarea>
  								<?= form_error('rincian', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="tujuan" class="col-sm-4 col-form-label">Tujuan Penggunaan Informasi</label>
  							<div class="col-sm-8">
  								<textarea class="form-control" name="tujuan" id="tujuan" cols="30" rows="3" required><?= set_value('tujuan'); ?></textarea>
  								<?= form_error('tujuan', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row justify-content-end">
  							<div class="col-sm-8">
  								<button type="submit" class="btn btn-primary">Simpan</button>
  								<a href="<?= base_url('member'); ?>">
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
