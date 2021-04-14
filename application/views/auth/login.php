<div class="content-box content-page" style="background-color:#750000">
	<div class="container">
	</div>
	<section class="content-blank" style="background-color:#F9EBEA; background-size:cover">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-1">&nbsp;</div>
				<div class="col-md-4 mb-4">
					<div class="card card-md" style="background-color:#750000">
						<div class="row pb-2" style="display: block; margin-left:auto; margin-right:auto; ">
							<img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid logo-home">
						</div>
						<?= $this->session->flashdata('message'); ?>
						<div class="row pt-2 text-light pb-2" style="display:block; margin-left:auto; margin-right:auto">
							<h7 style="font-size:14px; letter-spacing:1px">Silahkan masukkan email dan password Anda</h7>
						</div>
						<form method="POST" action="<?= base_url('auth'); ?>">
							<div class="form-group pt-2">
								<input type="email" placeholder="Masukkan email" id="email" name="email" class="form-control col-md-10" style="border-radius: 30px;display:block;margin-right:auto;margin-left:auto;" required>
							</div>
							<div class="form-group">
								<input type="password" placeholder="Masukkan password" id="password1" name="password" class="form-control col-md-10" style="border-radius: 30px;display:block;margin-right:auto;margin-left:auto;" required>
								<span toggle="#password1" class="mr-1 fa fa-fw fa-eye field-icon toggle-password" style="padding-right:50px"></span>
							</div>
							<button type="submit" name="submit" value="login" class="btn" style="display:block;margin-right:auto;margin-left:auto;background:#F8A50B; color:black">Login</button>
						</form>
					</div>
				</div>
				<div class="col-md-7 mb-4">
					<div class="container">
						<div class="row pt-4">
							<img src="<?= base_url('assets/image/icon/ic_register.png') ?>" alt="" style="display:block;margin-right:auto;margin-left:auto;">

						</div>
						<div class="row pt-4" style="display:block;margin-right:auto;margin-left:auto;text-align:center">
							<h5 style="color:#750000;">Belum punya akun?</h5>
						</div>
						<div class="row" style="display:block;margin-right:auto;margin-left:auto;text-align:center">
							<p style="letter-spacing:1px">Jika anda belum memiliki akun, silahkan daftar terlebih dahulu.</p>
						</div>
						<div style="text-align: center;">
							<a href="<?= base_url('auth/daftar_individu') ?>" class="btn" style=" background:#750000; color:white">DAFTAR INDIVIDU</a>
							<a href="<?= base_url('auth/daftar_kelompok') ?>" class="btn" style=" background:#750000; color:white">DAFTAR KELOMPOK</a>
						</div>
					</div>
				</div>
			</div>
		</div>
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
