  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top: 65px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff;">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item active">Informasi Serta Merta</li>
  		</ol>
  		<!-- DataTables Example -->
  		<div class="card mb-3">
  			<div class="card-header" style="letter-spacing:1px;">
  				<h3><i class="fas fa-table"></i> TABEL INFORMASI SERTA MERTA
  					<a href="<?= base_url('admin/addInformasiSertaMerta'); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-plus"></i> Tambah Data</a>
  				</h3>
  			</div>
  			<div class="card-body">
  				<!-- <div id="message"> -->
  				<!-- <?= $this->session->flashdata('message'); ?> -->
  				<div class="flash-informasi" data-flashdata="<?= $this->session->flashdata('informasi'); ?>"></div>

  				<div class="table-responsive">
  					<table class="table table-bordered text-center table-striped" id="tabel_informasi_serta_merta" width="100%" cellspacing="0">
  						<!-- edited table-->
  						<thead>
  							<tr>
  								<th>No</th>
  								<!-- <th>Kode Dokumen</th> -->
  								<th>Judul</th>
  								<th>Kategori</th>
  								<th>SKPD</th>
  								<th>File</th>
  								<th>Ukuran File</th>
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
  <!-- /.content-wrapper -->

  <script>
  	$(document).ready(function() {
  		$('#tabel_informasi_serta_merta').DataTable({
  			"processing": true,
  			"serverSide": true,
  			"ajax": {
  				"url": "<?= base_url('admin/get_ajax_informasi_serta_merta') ?>",
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
