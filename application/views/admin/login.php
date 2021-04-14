<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?= base_url('assets/vendor/css/main.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/css/style.css') ?>">
	<!-- <style>
		.field-icon {
			float: center;
			padding-right: 25px;
			margin-top: -30px;
			position: relative;
			z-index: 5;
		}
	</style> -->
</head>

<body style="background-image: url('<?= base_url('assets/image/wonogiri.gif'); ?>'); background-size:cover">
	<div class="overlay"></div>

	<section class="content-blank">
		<!-- <div class="row" style="display:block"> -->
		<div class="col-md-4 mt-4" style="display:block;margin-right:auto;margin-left:auto">
			<div class="card card-md shadow" style="background-color:#750000">
				<div class="row" style="display: block; margin-left:auto; margin-right:auto; margin-bottom:-15px">
					<h3 style="font-weight:600; letter-spacing:3px;">LOGIN ADMIN</h3>
				</div>
				<hr class="my-4" style="width:100%;border-color:#F8A50B;border-width:3px;display: block; margin-left:auto; margin-right:auto;">
				<div class="row pb-2" style="display:block; margin-left:auto; margin-right:auto">
					<img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid logo-home">
				</div>
				<?= $this->session->flashdata('message'); ?>
				<div class="row pt-2 text-light pb-2" style="display:block; margin-left:auto; margin-right:auto">
					<h7 style="font-size:14px; letter-spacing:1px">Silahkan masukkan email dan password Anda</h7>
				</div>
				<form method="POST" action="<?= base_url('admin'); ?>">
					<div class="form-group pt-2">
						<input type="email" placeholder="Masukkan email" id="email" name="email" class="form-control col-md-10" style="border-radius: 30px;display:block;margin-right:auto;margin-left:auto;" required>
					</div>
					<div class="form-group">
						<input type="password" placeholder="Masukkan password" id="password2" name="password" class="form-control col-md-10" style="border-radius: 30px;display:block;margin-right:auto;margin-left:auto;" value="<?= set_value('password'); ?>" required>
						<!-- <span toggle="#password2" class="mr-1 fa fa-fw fa-eye field-icon toggle-password"></span> -->
					</div>
					<button type="submit" name="submit" value="login" class="btn" style="display:block;margin-right:auto;margin-left:auto;background:#F8A50B; color:black">Login</button>
				</form>
			</div>
		</div>
		<!-- </div> -->
	</section>

	<!-- <script>
		$(".toggle-password").click(function() {

			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	</script> -->
</body>

</html>
