<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>style.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js') ?>"></script>

	<style>
		.field-icon {
			float: right;
			margin-left: -25px;
			margin-top: -25px;
			position: relative;
			z-index: 2;
		}
	</style>
</head>
