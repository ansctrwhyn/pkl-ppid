<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA">
		<div class="col-md-8" style="display:block;margin-left:auto;margin-right:auto;">
			<div class="card ml-4 mr-4">
				<!-- <form id="form-register" method="POST" action="<?= base_url('auth/daftar_kelompok'); ?>"> -->
				<?= form_open_multipart('auth/daftar_kelompok'); ?>
				<div class="card card-md" style="background-color:#F9EBEA">
					<h5 class="text-center text-capitalize head-title">Pendaftaran</h5>
					<p class="head-sub-desc text-center">Silakan masukan informasi Anda</p>
					<div class="col-md-12">
						<div class="d-flex align-items-center mt-3">
							<div class="circle-mini">A</div>
							<p class="text-default font-600 mb-0">Informasi Pribadi</p>
						</div>
						<hr>
						<div class="mb-3">
							<div class="form-group">
								<label for="">Nama Organisasi</label>
								<input type="text" maxlength="100" name="nama" value="<?= set_value('nama'); ?>" placeholder="" aria-describedby="helpId" class="form-control">
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="">Nomor Surat Pendirian (Akta Pendirian/Lainnya)</label>
								<input type="text" maxlength="25" name="no_identitas" value="<?= set_value('no_identitas'); ?>" placeholder="" aria-describedby="helpId" class="form-control">
								<?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="">Scan Surat Pendirian</label>
								<div class="col-sm-10">
									<div class="custom-file">
										<input type="file" class="file_upload" id="Image" name="image">
										<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<textarea maxlength="255" name="alamat" value="alamat" id="" rows="3" class="form-control"><?= set_value('alamat'); ?></textarea>
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="">Nomor Telepon</label>
								<input type="tel" maxlength="25" name="no_telp" value="<?= set_value('no_telp'); ?>" placeholder="" aria-describedby="helpId" class="form-control">
								<?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="d-flex align-items-center w-100">
							<div class="circle-mini">B</div>
							<p class="text-default font-600 mb-0">Informasi Login</p>
						</div>
						<hr>
						<div class="mb-3">
							<div role="alert" class="alert" style="background-color:pink">
								Untuk dapat menggunakan fitur PPID, Anda harus memiliki Email Aktif dan Password. Silakan tentukan Email
								Aktif dan password Anda
							</div>
							<div class=" form-group">
								<label for="">Email Aktif</label>
								<input type="email" maxlength="225" name="email" value="<?= set_value('email'); ?>" placeholder="" aria-describedby="helpId" class="form-control">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" maxlength="100" id="password1" name="password1" value="<?= set_value('password1'); ?>" placeholder="" aria-describedby="helpId" class="form-control">
								<span toggle="#password1" class="mr-1 fa fa-fw fa-eye field-icon toggle-password"></span>
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="">Konfirmasi Password</label>
								<input type="password" maxlength="100" id="password2" name="password2" value="<?= set_value('password2'); ?>" placeholder="" aria-describedby="helpId" class="form-control">
								<span toggle="#password1" class="mr-1 fa fa-fw fa-eye field-icon toggle-password"></span>
								<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-3"><button type="submit" class="btn btn-warning" style="color: black;">Daftarkan Akun</button></div>
					</div>
				</div>
				<!-- </form> -->
				<?= form_close() ?>
			</div>
		</div>
		<div class="col-md-4"></div>
	</section>
</div>

<script>
	$(".toggle-password").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
</script>
