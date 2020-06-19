<?php 
session_start();
include_once("lib/koneksi.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- meta character set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Download Script PHP</title>		
		<!-- Meta Description -->
        <meta name="description" content="Download script php, Sistem Pakar, Sistem Pendukung Keputusan, Portal Berita, Data Mining, E-Learning, E-Discussion, Toko Online, Minimarket, Absensi, Aplikasi Penggajian, Sistem Informasi Akademik ">
        <meta name="keywords" content="PHP,Download,Program,Script,download code php, script php, belajar php, tutorial php, cara mudah belajar php, Download script php, Sistem Pakar, Sistem Pendukung Keputusan, Portal Berita, Data Mining, E-Learning, E-Discussion, Toko Online, Minimarket, Absensi, Aplikasi Penggajian, Sistem Informasi Akademik">
        <meta name="author" content="Download Script PHP">
		<link rel="shortcut icon" href="favicon.png"/>
		<!-- Mobile Specific Meta -->
        
		
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/style.css"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <link href="css/animate.min.css" rel="stylesheet">
		 <link href="css/responsive.css" rel="stylesheet">
		
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			$("#modal-login").modal("show");
		</script>
	    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
        </style>
</head>
	<body>
		<div class="navbar" id="menu">
			<?php include_once("menu.php");?>
		</div>
		<div class="jumbotron">
		
			<marquee><h1>&nbsp;</h1></marquee> 
			<p class="style1">&nbsp;</p>
			
			<p>&nbsp;&nbsp;<a class="btn btn-primary btn-large" data-toggle="modal" data-target="#howto">Pelajari Sekarang!</a></p>
	</div>
		<div class="page">
			<div class="page-header">
				<div class="alert alert-info">
			<marquee>Selamat Datang di Komunitas Download Center RajaPhp.com untuk menjadi member silahkan lakukan registrasi dan kemudian donasi hanya <strong>Rp 50.000</strong> untuk menjadi member biasa dan dapatkan 3 program sesuai dengan keinginan atau menjadi Premium Member dengan donasi <strong>Rp 200.000</strong> untuk mendapat akun yang aktif selamanya dan dapatkan kemudahan untuk download semua program pada RajaPhp.com yang selalu update tiap minggunya. Untuk info lebih lanjut silahkan hubungi WhatsApp / Sms 082170214495 atau info@rajaphp.com  
			</marquee></div>
			 <?
$page=$_GET[page];
if($page=='home'){
	if(empty($_SESSION[iduser])){
	include"beranda.php";
	}else{
	include"user.php";
	}
}
else if($page=='artikel'){
include"artikel.php";
}
else if($page=='hubungi'){
include"hubungi.php";
}
else if($page=='help'){
include"kontak.php";
}
else if($page=='judul'){
include"judul.php";
}
else if($page=='struktur'){
include"strukture.php";
}
else if($page=='download'){
include"download.php";
}
else if($page=='edit_akun'){
include"edit_akun.php";
}
else if($page=='testimonial'){
include"testimonial.php";
}
else if($page=='pencarian'){
include"tampil.php";
}
else if($page=='editakunaksi'){
include"editaccount.php";
}
else if($page=='forum'){
include"forum.php";
}
else if($page=='course'){
include"course.php";
}

?>

	</div>
				
				  <?php 
			include_once("modal-howto.php");
			include_once("modal-login.php");
			include_once("modal-register.php");
			include_once("modal-hubungi.php");
		?>
                
	</body>
	
<section id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Main Menu</h3>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="http://rajaphp.com">Artikel</a></li>
                            <li><a href="media.php?page=judul">Judul TA</a></li>
                            <li><a href="#" role="button" data-toggle="modal" data-target="#howto">Petunjuk</a></li>
                            <li><a href="media.php?page=help">T.O.S</a></li>
							 
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Customer</h3>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="#" role="button" data-toggle="modal" data-target="#modal-register">Registrasi</a></li>
                            <li><a href="#" role="button" data-toggle="modal" data-target="#modal-login">Login</a></li>
                            <li><a href="media.php?page=diskusi"> Forum</a></li>
                            <li><a href="#" role="button" data-toggle="modal" data-target="#modal-hubungi">Request Aplikasi</a></li>
                           
                        </ul>
                    </div>
                </div>
				
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Contact us</h3>
                    <div class="footer_menu_contact">
                        <ul>
                            <li> </i>
                                <span> Jl. Berok Raya No 40 Siteba</span></li>
                            <li></i>
                                <span> 082170214495</span></li>
                            <li></i>
                                <span> info@rajaphp.com</span></li>
                            
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Tags</h3>
                    <div class="footer_menu tags">
                        <a href="http://rajaphp.com"> Design</a>
                        <a href="http://rajaphp.com"> User Interface</a>
                        <a href="http://rajaphp.com"> Graphics</a>
                        <a href="http://rajaphp.com"> Web Design</a>
                        <a href="http://rajaphp.com"> Development</a>
                        <a href="http://rajaphp.com"> PHP</a>
                        <a href="http://rajaphp.com"> Bootstrap</a>
                        <a href="http://rajaphp.com"> CodeIgniter</a>
                        <a href="http://rajaphp.com"> SEO</a>
                        <a href="http://rajaphp.com"> Wordpress</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer_b">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom">
                       <h6>Member Area - Komunitas Download Center </h6>
					   <?php 
					   $sqldat = mysql_query("select * from user_pengunjung");
					   $jmldat = mysql_num_rows($sqldat);
					   ?>
			<h6>Develop by <a href="http://padangwebsite.com">Tim RajaPhp.com</a>  <?php echo "<br>Jumlah Member : $jmldat";?></h6>
                    </div>
                </div>
               

            </div>
        </div>
    </div>
</section>
<?php
  // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

 
  ?>
</html>