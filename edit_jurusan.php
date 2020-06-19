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
<?php
	$kode	= $_GET['kode'];
	$sql	= mysql_query("select * from jurusan where kode_jurusan='$kode'");
	$data	= mysql_fetch_array($sql);
	if(mysql_num_rows($sql) > 0){
?>
			<div class="modal-header">
            	<h3>Edit Data Guru</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="kode">Kode Jurusan</label>
                        <div class="controls">
                            <input name="kode_jurusan" type="text" id="kode" class="form-control"
                             value='<?php echo $data['kode_jurusan'];?>' readonly >
                        </div>
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="nama">Nama Jurusan</label>
                        <div class="controls">
                        	<input name="nama_jurusan" type="text" id="nama" 
                        	value='<?php echo $data['nama_jurusan'];?>' class="form-control">
                        </div>
                    </div>
                    
                    <div class="control-group">
                    	<label class="control-label" for="update"></label>
                        <div class="controls">
	                    	<input name="update" type="submit" id="update" value="Update" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php }
						if(isset($_POST['update'])){
						
							mysql_query("update jurusan set
											nama_jurusan= '$_POST[nama_jurusan]'
											where kode_jurusan='$_POST[kode_jurusan]'");
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='jurusan.php';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='jurusan.php';
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
			<h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved . <strong>SMK Negeri 2 Kerinci</strong></h6>
		</div>
		<?php 
			include_once("modal-login.php");
		?>
	</body>
</html>
    	