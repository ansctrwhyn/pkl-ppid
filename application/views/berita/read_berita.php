<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="row">
						<div class="col-lg-12 ml-2">
							<div class="judul">
								<h1>
									<?= $berita['judul']; ?>
								</h1>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 ml-2">
							<p>
								<i class="far fa-calendar-alt"></i> <?= date('d/m/Y', $berita['date_created']); ?> <span class="ml-2"><i class="far fa-user mr-1"></i><?= 'Administrator' ?> </span> <span class="ml-2"><i class="far fa-eye mr-1"></i><?php $views = $berita['views'];
																																																														echo $views + 1; ?> kali dibaca</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-8">
					<div class="row mb-3">
						<div class="col-lg-12 ml-2 pt-2 isiartikel">
							<figure>
								<img src="<?= base_url('assets/image/berita/' . $berita['image']) ?>" style="display: block; margin-left:auto; margin-right:auto; max-width:100%;height: auto; " alt="">
							</figure>
							<p class="pt-2" style="text-align: justify;"><?= $this->typography->auto_typography($berita['isi']); ?></p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 pt-2" style="padding-left:50px;">
					<div class="card">
						<div class="tagline">
							<div class="widget-sidebar widget_archive" style="margin-bottom:10px; height:400px; overflow-y:auto;">
								<a class="twitter-timeline" href="https://twitter.com/diskominfowng?ref_src=twsrc%5Etfw">Tweets by diskominfowng</a>
								<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
						</div>
					</div>
					<h5 class="col-md-12 mt-4" style="color:#750000; font-weight:bold; letter-spacing:2px; font-size:16px">BERITA TERBARU</h5>
					<div class="card mt-3">
						<!-- <div id="ticker2" class="widget-sidebar widget_archive" style="height: 215px; overflow: hidden; position: relative;"> -->
						<ul class="list-default">
							<?php
							foreach ($new_berita as $row) {
							?>
								<li>
									<div class="row">
										<div class="col-md-2">
											<img style="width:150%;" src="<?= base_url('assets/image/berita/' . $row->image) ?>">
										</div>
										<div class="col-md-10">
											<a target="_blank" style="font-size:14px; color:#750000; text-align:justify" href="<?= base_url('berita/readBerita/' . $row->id_berita) ?>"><?= $row->judul ?></a>
										</div>
									</div>

								</li>
							<?php
							}
							?>
						</ul>

					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>
