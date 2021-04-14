<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->

	<div class=" container-fluid" style="padding-top:65px">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb shadow" style="background-color:#fff">
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
		<div class="flash-password" data-flashdata="<?= $this->session->flashdata('password'); ?>"></div>
		<div class="row">
			<div class="col-xl mb-6 pb-3">
				<a href="<?= base_url('admin/informasi_berkala') ?>">
					<div class="card shadow h-100 py-2" style="border-left:7px solid black">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-md font-weight-bold text-dark text-uppercase mb-2">Informasi Publik</div>
									<div class="h3 mb-0 font-weight-bold text-gray-800">
										<?= '<h3> Total : ' . $total_informasi . '</h3>'; ?>
									</div>
								</div>
								<div class="col-auto">
									<i class=" fas fa-folder-open fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl mb-6 pb-3">
				<a href="<?= base_url() . 'admin/permohonan' ?>">
					<div class="card shadow h-100 py-2" style="border-left:7px solid #dc3545">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-md font-weight-bold text-danger text-uppercase mb-2">Permohonan informasi</div>
									<div class="h3 mb-0 font-weight-bold text-gray-800">
										<?= '<h3> Total : ' . $total_permohonan . '</h3>'; ?>
									</div>
								</div>
								<div class="col-auto">
									<i class="fab fa-wpforms fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl mb-6 pb-3">
				<a href="<?= base_url() . 'admin/kotak_saran' ?>">
					<div class="card shadow h-100 py-2" style="border-left:7px solid #28a745">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-md font-weight-bold text-success text-uppercase mb-2">Kotak Saran</div>
									<div class="h3 mb-0 font-weight-bold text-gray-800">
										<?= '<h3> Total : ' . $total_pesan . '</h3>'; ?>
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-envelope fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="container mb-3" style=" width: 500px;height:300px">
				<div class="card shadow h-100 py-2">
					<div class="card-header text-md font-weight-bold text-dark text-uppercase" style="display:block;margin-left:auto;margin-right:auto">Grafik Layanan Permohonan Informasi</div>
					<div class=" card-body">
						<canvas id="myChart"></canvas>
						<script>
							var ctx = document.getElementById('myChart').getContext('2d');
							var chart = new Chart(ctx, {
								// The type of chart we want to create
								type: 'doughnut',

								// The data for our dataset
								data: {
									labels: ['Dalam Proses', 'Ditolak', 'Selesai'],
									datasets: [{
										backgroundColor: ['#F65058FF', '#FBDE44FF', '#28334AFF'],
										data: [<?= round($dalamproses / $total_permohonan * 100); ?>, <?= round($ditolak / $total_permohonan * 100); ?>, <?= round($selesai / $total_permohonan * 100); ?>]
									}]
								},

								// Configuration options go here
								options: {
									responsive: true,
									maintainAspectRatio: false,
									tooltips: {
										callbacks: {
											label: function(tooltipItem, data) {
												return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
											}
										}
									}
								}
							});
						</script>
					</div>
				</div>
			</div>

		</div>
		<!-- /.container-fluid -->

	</div>
</div>
