<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->

	<div class=" container-fluid" style="padding-top:65px; padding-bottom:115px">
		<h2 class="text-center mt-3 mb-4" style="color:#750000">Selamat datang di PPID Wonogiri, <span style="font-weight:bold"><?= $member['nama']; ?></span> !</h2>

		<div class="card m-3 p-3 shadow"">
			<div class=" card-header" style="letter-spacing:1px;">
			<h4><i class="fas fa-table"></i> RIWAYAT PERMOHONAN INFORMASI</h4>
		</div>
		<div class="card-body">
			<!-- <div id="message"> -->
			<!-- <?= $this->session->flashdata('message'); ?> -->
			<div class="flash-permohonan" data-flashdata="<?= $this->session->flashdata('permohonan'); ?>"></div>
			<div class="flash-password" data-flashdata="<?= $this->session->flashdata('password'); ?>"></div>
			<div class="table-responsive table-striped">
				<table class="table table-bordered text-center" id="tabel_riwayat" width="100%" cellspacing="0">
					<!-- edited table-->
					<thead>
						<tr>
							<th>No</th>
							<th>Informasi Yang Dibutuhkan</th>
							<th>Tujuan Penggunaan Informasi</th>
							<th>Alamat Email</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="data">
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.container-fluid -->

	</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$('#tabel_riwayat').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?= base_url('member/get_ajax_riwayat') ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false
			}],
			"order": [],
			"responsive": true
		})
	});
</script>
