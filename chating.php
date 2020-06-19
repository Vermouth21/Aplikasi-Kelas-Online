<?php 
session_start();
include_once("lib/koneksi.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<title>SMK Negeri 2 Kerinci</title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/style.css"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 <link href="css/animate.min.css" rel="stylesheet">
		  
		 <link href="css/responsive.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="themea/twitter.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="dist/sweetalert.min.js"></script>
		    <style type="text/css">
<!--
.style2 {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
.style7 {
	font-size: 16px;
	font-family: "Trebuchet MS";
}
-->
        </style>
	</head>
	<body>
		<p align="center">
	<img src="images/smkn2kerinci.jpg" alt="" width="90%"></p>
	
	<div class="navbar" id="menu">
			<?php include_once("menu.php");?>
		</div>
		<div class="page">
			<br>
			<div class="row">
			
				<div class="col-md-8">
					<div class="alert alert-info">
			<marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
			</marquee>
				</div>
			
			<div class="modal-header">
            	<h4>Chatingan</h4>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">

                    <div class="control-group">
                        <label class="control-label" for="tgl_pesan">Tanggal Pesan</label>
                        <div class="controls">
                        	<input name="tgl_pesan" type="date" id="tgl_pesan" class="form-control">
                        </div>
                    </div>


					<div class="control-group">
                        <label class="control-label" for="pesan">Pesan</label>
                        <div class="controls">
                        	 <textarea name="pesan" class="form-control" rows="5" placeholder="Pesan"></textarea>
                        </div>
                    </div>

                    
                    <div class="control-group">
                    	<label class="control-label" for="simpan"></label>
                        <div class="controls">
	                    	<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php
						if(isset($_POST['simpan'])){


							$tgl_pesan = $_POST['tgl_pesan'];
							$pesan	   = $_POST['pesan'];
							$nis       = $_SESSION['nis'];
							
							 mysql_query("INSERT INTO pesan (tgl_pesan,
															pesan,
															 nis)
													  VALUES('$tgl_pesan',
													  		'$pesan',
															 '$nis')")	
							or die(mysql_error);

							$id2 = mysql_insert_id();
							$q2 = mysql_query("INSERT INTO respon (id_pesan,nis,pesan,tgl_pesan) values ('$id2','$nis','$pesan','$tgl_pesan')");
								
							echo "<script language=javascript>
								window.alert('Pesan Terkirim');
								window.location='chating.php';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='chating.php';
								</script>";
							exit;
						}
					?>
                </form>
		</div></div>
    	<div class="col-md-4">
					
					<div class="sidebar-module">
					<?php
					
					include "sidebar.php";
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . <strong>SMK Negeri 2 Kerinci</strong></h6>
		</div>
		<?php 
			include_once("modal-login.php");
		?>
	</body>
</html>