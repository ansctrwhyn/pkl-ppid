<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9 mb-4" style="display: block; margin-left:auto; margin-right:auto">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="Informasi_Tabs" role="tabpanel" aria-labelledby="informasi-tab">
							<div class="heading-blue-rgba with-line mt-1 mb-4"><span> Detail Informasi</span></div>
							<div class="card card-md">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<label class="col-sm-3">Judul</label>
											<div class="col-sm-9 pb-2 text-uppercase" style="color:#941717cc; font-weight:500">
												<?= $informasi['judul'] ?>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3">Kode Dokumen</label>
											<div class="col-sm-9 pb-2" style="color:#941717cc; font-weight:500">
												<?= $informasi['id_informasi'] ?>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3">Tanggal Publikasi</label>
											<div class="col-sm-9 pb-2" style="color:#941717cc; font-weight:500">
												<?php date_default_timezone_set("Asia/Jakarta"); ?>
												<?= date('d-m-Y', $informasi['date_upload']); ?>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3">Jenis Informasi</label>
											<div class="col-sm-9 pb-2" style="color:#941717cc; font-weight:500">
												<?= $jenis['jenis'] ?>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3">Kategori Informasi</label>
											<div class="col-sm-9 pb-2" style="color:#941717cc; font-weight:500">
												<?= $kategori['kategori'] ?>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3">SKPD</label>
											<div class="col-sm-9 pb-2" style="color:#941717cc; font-weight:500">
												<?= $skpd['skpd'] ?>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3">Ukuran File</label>
											<div class="col-sm-9 pb-2" style="color:#941717cc; font-weight:500">
												<?php
												$file_path = FCPATH . 'assets/file/informasi_publik/' . $informasi['file'];
												$size_in_byte = filesize($file_path);
												$size_in_kb = round($size_in_byte / 1024);
												?>
												<?= $size_in_kb ?> KB
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8 float-center">
												<a href="<?= base_url('informasi_publik') ?>" class="btn btn-danger btn-xs pb-2"><i class="fas fa-arrow-left"></i></i> Kembali ke Daftar Informasi</a>
												<a href="<?= base_url('assets/file/informasi_publik/' . $informasi['file']) ?>" target=" _blank" class="btn btn-warning btn-xs pb-2 text-white"><i class="fa fa-search"></i> Lihat</a>
												<a href="<?= base_url('admin/downloadInformasi/' . $informasi['id_informasi']) ?>" target=" _blank" class="btn btn-success btn-xs pb-2"><i class="fas fa-download"></i> Download</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
