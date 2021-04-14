<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="container">
			<div class="row">
				<div class=" col-md-10 mb-4" style="display: block; margin-left:auto; margin-right:auto">
					<div class="heading-blue-rgba with-line mt-1 mb-4"><span> Daftar Informasi Publik</span></div>
					<div class="card card-md">
						<div class="row">
							<div class="col-md-4 mb-3">
								<a href="<?= site_url('auth') ?>" class="btn" style="display:block;margin-left:auto;margin-right:auto;background:#F8A50B; color:black; font-size:16px">PERMOHONAN INFORMASI</a>
							</div>
							<div class="col-md-4 mb-3"></div>
							<div class="col-md-4 mb-3">
								<?= form_open_multipart('informasi_publik'); ?>
								<div class="input-group">
									<input class="form-control" type="text" name="keyword" id="keyword" placeholder="Cari dokumen.." aria-label="Search" autofocus>
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary">Cari</button>
									</div>
								</div>
							</div>
						</div>
						<div class="table-wrapper" id="data">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-responsive table-bordered table-hovered table-striped">
										<thead>
											<tr>
												<th class="text-white" style="width: 5%">No.</th>
												<th class="text-white" style="width: 80%">Judul Dokumen Informasi</th>
												<th class="text-white" style="width: 15%; text-align: center;">Tampilkan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (empty($informasi)) : ?>
												<tr>
													<td colspan="3">
														<div> Tidak ada data.</div>
													</td>
												</tr>
											<?php endif; ?>
											<?php
											foreach ($informasi as $data) { ?>
												<tr>
													<td><?= ++$start ?>.</td>
													<td>
														<div class="title text-uppercase" style="color:#941717cc; font-weight:500"><?= $data->judul ?></div>
														<div class="name"></div>
														<?php date_default_timezone_set("Asia/Jakarta"); ?>
														<div class="helper"><?= date('d-m-Y', $data->date_upload); ?> | Informasi <?= $data->jenis ?> | <?= $data->kategori ?> | <?= $data->skpd ?></div>
													</td>
													<td style="text-align: center;vertical-align: middle;"><a href="<?= base_url('informasi_publik/showDetail/' . $data->id_informasi) ?>"><i class="fa fa-search"></i> Detail</a></td>
												</tr>
											<?php
											} ?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<?= $this->pagination->create_links() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
