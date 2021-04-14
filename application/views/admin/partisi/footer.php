<footer class="main-footer text-center my-auto" style="background-color:black;">
	<strong>&copy; <?php echo date('Y'); ?> - PPID Kabupaten Wonogiri. All Rights Reserved.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/admin/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Sweetalert2 -->
<script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/myscript.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url('assets/admin/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/admin/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/') ?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/') ?>admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/') ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

</body>

</html>
