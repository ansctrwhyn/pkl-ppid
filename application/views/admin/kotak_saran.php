  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top:65px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item active">Kotak Saran</li>
  		</ol>
  		<!-- DataTables Example -->
  		<div class="card mb-3 shadow">
  			<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Data Kotak Saran</div> -->
  			<div class="card-header" style="letter-spacing:1px;">
  				<h3><i class="fas fa-table"></i> TABEL KOTAK SARAN
  					<!-- <a href="<?= base_url('admin/addPesan'); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-plus"></i> Tambah Data</a> -->
  				</h3>
  			</div>
  			<div class="card-body">
  				<!-- <div id="message"> -->
  				<!-- <?= $this->session->flashdata('message'); ?> -->
  				<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>

  				<!-- </div> -->
  				<!-- <a href="<?= base_url('admin/addPesan'); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a> -->
  				<!-- <br><br> -->
  				<div class="table-responsive">
  					<table class="table table-bordered text-center table-striped" id="tabel_kotak_saran" width="100%" cellspacing="0">
  						<!-- edited table-->
  						<thead>
  							<tr>
  								<th>No</th>
  								<th>Nama</th>
  								<th>Email</th>
  								<th>No Telepon</th>
  								<th>Pesan</th>
  								<th>Tanggal</th>
  								<th>Aksi</th>
  							</tr>
  						</thead>
  						<tbody id="data">

  						</tbody>
  					</table>

  				</div>
  			</div>
  		</div>

  	</div>
  	<!-- /.container-fluid -->

  </div>

  <script>
  	$(document).ready(function() {
  		$('#tabel_kotak_saran').DataTable({
  			"processing": true,
  			"serverSide": true,
  			"ajax": {
  				"url": "<?= base_url('admin/get_ajax_kotak_saran') ?>",
  				"type": "POST"
  			},
  			"columnDefs": [{
  				"targets": [0, 4, -1],
  				"orderable": false
  			}],
  			"order": []

  		})
  	});
  </script>
