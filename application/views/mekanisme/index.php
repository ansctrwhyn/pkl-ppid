<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 mb-4">
					<div class="d-flex align-items-center mb-4">
						<div class="icon-circle rgba-blue">
							<img src="<?= base_url('assets/image/icon/document.png') ?>" class="img-fluid" alt="" width="20">
						</div>
						<p class="text-default font-600 mb-0 text-uppercase">Mekanisme Layanan Informasi</p>
					</div>

					<ul class="nav tabs-vertical small-list without-primary flex-col" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="item active" id="sop-tab" data-toggle="tab" href="#SOP_Tabs" role="tab" aria-controls="SOP_Tabs" aria-selected="true">
								<div class="head-icon">
									<div class="tabs-icon">
										<img src="<?= base_url('assets/image/icon/circle.png') ?>" class="img-fluid" alt="" width="50">
									</div>
								</div>
								<span>SOP Pelayanan Informasi Publik</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="item" id="cara-permohonan-tab" data-toggle="tab" href="#CaraPermohonan_Tabs" role="tab" aria-controls="CaraPermohonan_Tabs" aria-selected="false">
								<div class="head-icon">
									<div class="tabs-icon">
										<img src="<?= base_url('assets/image/icon/papers.png') ?>" class="img-fluid" alt="" width="50">
									</div>
								</div>
								<span>Tata Cara Permohonan Informasi</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="item" id="form-permohonan-tab" data-toggle="tab" href="#FormPermohonan_Tabs" role="tab" aria-controls="FormPermohonan_Tabs" aria-selected="false">
								<div class="head-icon">
									<div class="tabs-icon">
										<img src="<?= base_url('assets/image/icon/clock.png') ?>" class="img-fluid" alt="" width="50">
									</div>
								</div>
								<span>Form Permohonan Informasi</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="item" id="cara-keberatan-tab" data-toggle="tab" href="#CaraKeberatan_Tabs" role="tab" aria-controls="CaraKeberatan_Tabs" aria-selected="false">
								<div class="head-icon">
									<div class="tabs-icon">
										<img src="<?= base_url('assets/image/icon/clock.png') ?>" class="img-fluid" alt="" width="50">
									</div>
								</div>
								<span>Tata Cara Pengajuan Keberatan Informasi</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="item" id="form-keberatan-tab" data-toggle="tab" href="#FormKeberatan_Tabs" role="tab" aria-controls="FormKeberatan_Tabs" aria-selected="false">
								<div class="head-icon">
									<div class="tabs-icon">
										<img src="<?= base_url('assets/image/icon/clock.png') ?>" class="img-fluid" alt="" width="50">
									</div>
								</div>
								<span>Form Pengajuan Keberatan Informasi</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="item" id="cara-sengketa-tab" data-toggle="tab" href="#CaraSengketa_Tabs" role="tab" aria-controls="CaraSengketa_Tabs" aria-selected="false">
								<div class="head-icon">
									<div class="tabs-icon">
										<img src="<?= base_url('assets/image/icon/clock.png') ?>" class="img-fluid" alt="" width="50">
									</div>
								</div>
								<span>Tata Cara Sengketa Informasi</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="col-12 col-lg-8 mb-4">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="SOP_Tabs" role="tabpanel" aria-labelledby="sopa-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span>SOP Permohonan Informasi Publik</span></div>
							<div class="card card-md p-3">
								<embed src="<?= base_url('assets/file/dokumen/Perbup_SOP.pdf'); ?>" type='application/pdf' width='100%' height='700px'>
							</div>
						</div>

						<div class="tab-pane fade show" id="CaraPermohonan_Tabs" role="tabpanel" aria-labelledby="cara-permohonan-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span>Tata Cara Permohonan Informasi</span></div>
							<div class="card card-md p-3">
								<embed src="<?= base_url('assets/file/dokumen/TATA_CARA_PELAYANAN_PERMOHONAN_INFO_PUBLIK.pdf'); ?>" type='application/pdf' width='100%' height='700px'>
							</div>
						</div>

						<div class="tab-pane fade show" id="FormPermohonan_Tabs" role="tabpanel" aria-labelledby="form-permohonan-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span>Form Permohonan Informasi</span></div>
							<div class="card card-md p-3">
								<embed src="<?= base_url('assets/file/dokumen/Form_Permohonan_Informasi.pdf'); ?>" type='application/pdf' width='100%' height='700px'>
							</div>
						</div>

						<div class="tab-pane fade show" id="CaraKeberatan_Tabs" role="tabpanel" aria-labelledby="cara-keberatan-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span>Tata Cara Pengajuan Keberatan Informasi</span></div>
							<div class="card card-md p-3">
								<embed src="<?= base_url('assets/file/dokumen/TATA_CARA_KEBERATAN_INFORMASI_PUBLIK.pdf'); ?>" type='application/pdf' width='100%' height='700px'>
							</div>
						</div>

						<div class="tab-pane fade show" id="FormKeberatan_Tabs" role="tabpanel" aria-labelledby="form-keberatan-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span>Form Pengajuan Keberatan Informasi</span></div>
							<div class="card card-md p-3">
								<embed src="<?= base_url('assets/file/dokumen/FORMULIR_KEBERATAN.pdf'); ?>" type='application/pdf' width='100%' height='700px'>
							</div>
						</div>

						<div class="tab-pane fade show" id="CaraSengketa_Tabs" role="tabpanel" aria-labelledby="cara-sengketa-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span>Tata Cara Sengketa Informasi</span></div>
							<div class="card card-md p-3">
								<embed src="<?= base_url('assets/file/dokumen/TATA_CARA_SENGKETA_INFORMASI.pdf'); ?>" type='application/pdf' width='100%' height='700px'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
