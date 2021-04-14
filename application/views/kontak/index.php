<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="d-flex align-items-center mb-4">
						<div class="icon-circle rgba-blue">
							<img src="<?= base_url('assets/image/icon/contact.png') ?>" class="img-fluid" alt="" width="20">
						</div>
						<p class="text-default font-600 mb-0 text-uppercase">Hubungi Kami</p>
					</div>
					<div class="container flex-col">
						<div class="card card-md p-4" style="background-color:#750000">
							<!-- <?= $this->session->flashdata('message'); ?> -->
							<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
							<div class="row">
								<div class="col-md-12 mb-2">
									<?= form_open_multipart('kontak'); ?>
									<div class="form-group">
										<label class="font-600" style="color:white">Nama</label>
										<input type="text" placeholder="Masukkan nama" id="nama" name="nama" class="form-control" required>
										<?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
									</div>
									<div class="form-group">
										<label class="font-600" style="color:white">Email</label>
										<input type="email" placeholder="Masukkan email" id="email" name="email" class="form-control" required>
										<?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
									</div>
									<div class="form-group">
										<label class="font-600" style="color:white">Nomor Telepon</label>
										<input type="tel" placeholder="Masukkan nomor telepon" id="no_telp" name="no_telp" class="form-control" required>
										<?= form_error('no_telp', '<small class="text-danger" >', '</small>'); ?>
									</div>
									<div class="form-group">
										<label class="font-600" style="color:white">Pesan</label>
										<textarea type="textfield" placeholder="Tulis pesan" id="pesan" name="pesan" class="form-control" required></textarea>
										<?= form_error('pesan', '<small class="text-danger" >', '</small>'); ?>
									</div>

									<button type="submit" name="submit" value="kirim" class="btn" style="display:block;margin-left:auto;margin-right:auto; background:#F8A50B; color:black">Kirim</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 mb-4">
					<div class="heading-blue-rgba with-line mt-1 mb-4"><span>Alamat Kantor Kami</span></div>
					<!-- <div class="row">
						<div class="col-md-9 mb-4">
							<input class="form-control" id="start" type="text" placeholder="Masukan Alamat atau Daerah Anda Saat Ini">
						</div>
						<div class="col-md-3 mb-4">
							<button style="margin-left:15px;" class="btn btn-danger" onclick="return calcRoute()">Cari</button>
						</div>
					</div> -->
					<div class="row">
						<div class="container">
							<div class="card card-md p-3">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7566287281193!2d110.92317021477825!3d-7.815566194368149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a2e3638af220f%3A0x9e90485890bebfbe!2sDinas%20Komunikasi%20dan%20Informatika%20(Diskominfo)%20Kab.%20Wonogiri!5e0!3m2!1sid!2sid!4v1578271227963!5m2!1sid!2sid" width="auto" height="460px" frameborder="0"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
