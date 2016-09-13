<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="shortcut icon" href="<?=base_url()?>themes/bootstrap3/img/receipt.ico">
	<meta charset="utf-8">
	<title><?=$title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?=base_url()?>themes/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>themes/bootstrap3/css/font-awesome.min.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="<?=base_url()?>themes/bootstrap3/css/styles.css" rel="stylesheet">
	<link href="<?=base_url()?>themes/bootstrap3/css/simple-sidebar.css" rel="stylesheet">
	<!-- script references -->
	<script src="<?=base_url()?>themes/bootstrap3/js/jquery.min.js"></script>
	<script src="<?=base_url()?>themes/bootstrap3/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>themes/bootstrap3/js/scripts.js"></script>
	<script src="<?=base_url()?>themes/bootstrap3/js/smoothscroll.js"></script>
</head>
<body data-spy="scroll" data-offset="0" data-target="#sidebar">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?=base_url()?>user"><img src="<?=base_url()?>themes/bootstrap3/img/logo.png"> <b><?=$title?></b></a>
			</div>
			<div class="navbar-collapse collapse">
				<?=$topnav?>
			</div>
		</div>
	</nav>
	<div id="wrapper">

		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<div id="sidebar" class="sidebar-nav">
				<?=$sidebar?>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<a href="#menu-toggle" class="btn btn-info" id="menu-toggle"><i class="fa fa-angle-double-left"></i></a>
			<div class="container-fluid well main">
				<?=$content?>
			</div>
		</div> <!-- end content -->
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<div class="container-fluid">
				<p class="navbar-text"><?=$footer?>
				</p>
			</div>
		</nav>
	</div>
	<!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Menu Toggle Script -->
<script type="text/javascript">
jQuery(document).ready(function($){
	var url = window.location.href;
	$('.nav a[href="'+url+'"]').parent().addClass('active');
});
</script>
<script>

$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});

</script>
</body>
</html>
