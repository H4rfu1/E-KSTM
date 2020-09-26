<!-- untuk membuat pagenya terus https -->
<?php
	if($_SERVER['HTTPS']!="on")
	{
		 $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		 header("Location:$redirect");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=  $title; ?></title>

	<link rel="shortcut icon" href="<?= base_url('assets/') ?>favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?= base_url('assets/') ?>favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/blog-home.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/blog-post.css" rel="stylesheet">

	<style type="text/css">
 a:hover {
  cursor:pointer;
 }
 @media only screen and (min-width: 650px) {
  .res {
    margin-top: 0;
		margin-bottom: 0;
  }
}
</style>

</head>

<body id="page-top" style="padding:0;">

  <!-- Page Wrapper -->
  <div id="wrapper">
