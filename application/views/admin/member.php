  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top: 65px;padding-bottom:115px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff;">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item active">Member</li>
  		</ol>
  		<!-- DataTables Example -->
  		<div class="card mb-3 shadow">
  			<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Data Member</div> -->
  			<div class="card-header" style="letter-spacing:1px;">
  				<h3><i class="fas fa-table"></i> TABEL MEMBER
  					<a href="<?= base_url('admin/addMember'); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-plus"></i> Tambah Data</a>
  				</h3>
  			</div>
  			<div class="card-body">
  				<!-- <?= $this->session->flashdata('message'); ?> -->
  				<div class="flash-member" data-flashdata="<?= $this->session->flashdata('member'); ?>"></div>

  				<!-- <a href="<?= base_url('admin/addMember'); ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah</a> -->
  				<!-- <br><br> -->
  				<div class="table-responsive">
  					<table class="table table-bordered text-center table-striped table-sm" id="tabel_member" width="100%" cellspacing="0">
  						<!-- edited table-->
  						<thead>
  							<tr>
  								<th>No</th>
  								<th>Nama</th>
  								<th>Nomor Identitas</th>
  								<th>Kartu Identitas</th>
  								<th>Email</th>
  								<th>Alamat</th>
  								<th>Nomor Telepon</th>
  								<th>Tipe</th>
  								<th>Tanggal Gabung</th>
  								<th>Aksi</th>
  							</tr>
  						</thead>
  						<tbody>

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
  		$('#tabel_member').DataTable({
  			"processing": true,
  			"serverSide": true,
  			"ajax": {
  				"url": "<?= base_url('admin/get_ajax_member') ?>",
  				"type": "POST"
  			},
  			"columnDefs": [{
  				"targets": [0, 3, 7, -1],
  				"orderable": false
  			}],
  			"order": []

  		})
  	});
  </script>
