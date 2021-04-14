  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top:65px;padding-bottom:165px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item active">Permohonan</li>
  		</ol>
  		<!-- DataTables Example -->
  		<div class="card mb-3 shadow">
  			<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Data Kotak Saran</div> -->
  			<div class="card-header" style="letter-spacing:1px;">
  				<h3><i class="fas fa-table"></i> TABEL PERMOHONAN
  					<!-- <a href="<?= base_url('admin/addPermohonan'); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-plus"></i> Tambah Data</a> -->
  				</h3>
  			</div>
  			<div class="card-body">
  				<!-- <div id="message"> -->
  				<!-- <?= $this->session->flashdata('message'); ?> -->
  				<div class="flash-permohonan" data-flashdata="<?= $this->session->flashdata('permohonan'); ?>"></div>
  				<div class="flash-dokumen" data-flashdata="<?= $this->session->flashdata('dokumen'); ?>"></div>
  				<div class="table-responsive">
  					<table class="table table-bordered text-center table-striped table-sm" id="tabel_permohonan" width="100%" cellspacing="0">
  						<!-- edited table-->
  						<thead>
  							<tr>
  								<th>No</th>
  								<th>Nama</th>
  								<th>Nomor Identitas</th>
  								<th>Informasi Yang Dibutuhkan</th>
  								<th>Tujuan Penggunaan Informasi</th>
  								<th>Alamat Email</th>
  								<th>Tanggal</th>
  								<th>Status</th>
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
  		$('#tabel_permohonan').DataTable({
  			"processing": true,
  			"serverSide": true,
  			"ajax": {
  				"url": "<?= base_url('admin/get_ajax_permohonan') ?>",
  				"type": "POST"
  			},
  			"columnDefs": [{
  				"targets": [0, -1],
  				"orderable": false
  			}],
  			"order": []

  		})
  	});
  </script>

  <script>
  	function confirm_hide(ele) {
  		if (confirm('Apakah Anda Yakin')) {
  			ele.style.display = 'none';

  			return true;
  		} else return false;
  	}
  </script>
