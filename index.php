<?php
session_start();
include_once("lib/koneksi.php");
//echo "$_SESSION[level]";
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<title>SMK Negeri 2 Kerinci</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="themea/twitter.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="dist/sweetalert.min.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<script type="text/javascript">
		$("#modal-login").modal("show");
	</script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap');

		body,
		div {
			font-family: 'Quicksand', sans-serif;
		}

		< !-- .style7 {
			font-size: 16px;
			font-family: "Trebuchet MS";
		}

		.style8 {
			color: #00FF00
		}

		.box {
			background-color: #fff;
			overflow:
				hidden;
			height: 350px;
			margin:
				0 auto;
			margin-bottom:
				20px;
			-webkit-border-radius:
				5px;
			-moz-border-radius:
				5px;
			-ms-border-radius:
				5px;
			-o-border-radius:
				5px;
			border-radius: 5px;
			-webkit-box-shadow:
				0px 3px 2px 0px rgba(0,
					0,
					0,
					0.3);
			-moz-box-shadow:
				0px 3px 2px 0px rgba(0,
					0,
					0,
					0.3);
			box-shadow:
				0px 3px 2px 0px rgba(0,
					0,
					0,
					0.3);
		}

		/*
		.box
		img
		{
		width:90%;
		height:250px;
		}
		*/
		.box h3 {
			padding: 15px;
			margin: 0px;
		}

		.box h4 {
			padding: 15px;
			margin: 0px;
		}

		.box p {
			overflow: hidden;
			height: 100px;
			padding-left: 15px;
			padding-right: 15px;
			margin: 0px;
		}

		.desc {
			height: 60px;
			border-bottom: 1px solid #ddd;
		}

		.likes {
			float: left;
			padding: 15px;
			margin: 0px;
			font-size:
				15px;
			color:
				#3490DC;
		}

		.prize {
			float: right;
			padding: 15px;
			margin: 0px;
			font-size:
				15px;
			color:
				#E3342F;
		}
	</style>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.js"></script>
</head>

<body>



	<p align="center">
		<img src="images/smkn2kerinci.jpg" alt="" width="90%"></p>

	<div class="navbar" id="menu">
		<?php

		include_once("menu1.php");

		?>
		<ul class="nav">
			<li><a href="?p=produk">Merchandise</a></li>
			<!-- <li><a href="?p=kategori">Merchandise</a></li> -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle">Kategori Merchandise</i></a>
				<ul class="dropdown-menu">
					<?php
					$ambil = mysql_query("SELECT * FROM tbl_kategori");
					while ($pecah = mysql_fetch_object($ambil)) {
					?>
						<li><a href="?p=kategori&id=<?php echo $pecah->id_kategori ?>"><?php echo $pecah->nama_kategori ?></a></li>
					<?php } ?>
				</ul>
			</li>
		</ul>

	</div>
	<div class="page">
		<br>
		<div class="row">

			<div class="col-md-12">
				<div class="alert alert-info">
					<marquee> Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
					</marquee>
				</div>
				<?php include "content.php" ?>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved. <strong>SMK Negeri 2 Kerinci</strong></h6>
	</div>
	<?php
	include_once("modal-login.php");
	?>

	<script>
		function goBack() {
			window.history.back();
		}
	</script>
</body>

</html>
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>