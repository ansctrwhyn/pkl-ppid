<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="container">
			<!-- <div class="heading-blue-rgba with-line mt-1 mb-4"><span>Berita</span></div> -->
			<div class="row justify-content-end">
				<div class="col-4 active-cyan-4 mb-3 mr-3">
					<!-- Search form -->
					<?= form_open_multipart('berita'); ?>
					<div class="input-group">
						<input class="form-control" type="text" name="keyword" id="keyword" placeholder="Cari artikel.." aria-label="Search" autofocus>
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<!-- Back to top button -->
					<a id="buttontop"></a>
					<div class="container">
						<div class="row">
							<?php if (!$berita) { ?>
								<div class="col-lg-6 mt-5" style="display:block;margin-bottom:250px;margin-left:auto;margin-right:auto;">
									<div class="alert alert-danger" role="alert">
										Berita tidak ditemukan!
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="row">
							<?php foreach ($berita as $row) : ?>
								<div class="[ col-lg-4 col-md-4 col-sm-4 ]">
									<div class="[ info-card ]" style="max-height: 300px">
										<img style="max-height:200px; width:100%;" src="<?= base_url('assets/image/berita/' . $row->image); ?>" />
										<div class="[ info-card-details ] animater">
											<div class="[ info-card-header ]">
												<h1> <?= word_limiter($row->judul, 5); ?> </h1>
												<!-- <h3> <?= $row->penulis; ?> </h3> -->
												<p class="card-text pl-2" style="margin-bottom: -2px"><small class="text-muted"><?php date_default_timezone_set("Asia/Jakarta"); ?><?= date('d F Y, G:i', $row->date_created); ?></small></p>

											</div>
											<div class="[ info-card-detail ]">
												<!-- Description -->
												<p><?= word_limiter($row->isi, 15); ?></p>
												<a href="<?= base_url('berita/readBerita/' . $row->id_berita); ?>" class="btn btn-sm btn-primary">Baca selengkapnya</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?= $this->pagination->create_links(); ?>
				</div>
			</div>

		</div>

	</section>
</div>
