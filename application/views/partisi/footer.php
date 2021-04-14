<footer style="background:#750000; margin-top:-20px; padding-bottom:15px">
	<div class="container text-center">
		<div class="row">

			<div class="col-md-4 pt-4" style="margin-top:50px;">
				<img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid" style="width:300px;">
			</div>
			<div class="col-md-4 pt-4 text-white">
				<!-- <img src="<?= base_url('assets/image/logo.png'); ?>" alt="" class="img-fluid" style="width:300px;"> -->
				<h5 class="text-white text-center" style="letter-spacing:2px">Lokasi Kami</h5>
				<hr style="width:70px;">
				<div class="text-white" style="font-size:13px; line-height:23px; letter-spacing:1px">
					<!-- <br> -->
					<span class="fa fa-map-marker"></span> <span>Jl. Kab., Sabggrahan, Giripurwo, Kec. Wonogiri, Kabupaten Wonogiri, Jawa Tengah 57612</span><br>
					<span class="fa fa-phone"> </span> <span>(021) 000000</span><br>
					<a href="mailto:" class="text-white"><span class="fa fa-envelope"> </span> <span>info@ppid.go.id</span></a>
				</div>
			</div>
			<div class="col-md-4 pt-4">
				<div class="container">
					<div class="row">
						<div class="col">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7566287281193!2d110.92317021477825!3d-7.815566194368149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a2e3638af220f%3A0x9e90485890bebfbe!2sDinas%20Komunikasi%20dan%20Informatika%20(Diskominfo)%20Kab.%20Wonogiri!5e0!3m2!1sid!2sid!4v1578271227963!5m2!1sid!2sid" width="250" height="150" frameborder="0"></iframe>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</footer>

<footer style="background:black; padding-top: 10px; text-align:center">
	<div class="container">
		<div class=" row">
			<div class="col">
				<p class="text-center" style="color:orange"><strong>&copy; <?php echo date('Y'); ?> - PPID Kabupaten Wonogiri. All Rights Reserved.</strong></p>
			</div>
		</div>
	</div>
</footer>


<script src="<?= base_url('assets/vendor/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/myscript.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/main.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/sidebar-mobile.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/app.js') ?>"></script>
<script type="text/javascript">
	$(function() {
		$("#from").datepicker();
	});
	$(function() {
		$("#to").datepicker();
	});
</script>
</body>

</html>
