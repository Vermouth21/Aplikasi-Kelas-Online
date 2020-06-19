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
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "balas" :
	
     if(isset($_GET['id_pesan'])){
      $sql = mysql_query("SELECT a.*, b.*,  c.* FROM pesan a join siswa b join  respon c on a.nis = b.nis and a.pesan = c.pesan and a.id_pesan = c.id_pesan where a.id_pesan='$_GET[id_pesan]'");
      $data=mysql_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){
      $tgl_respon = date('Y-m-d');
      $save=mysql_query("UPDATE respon set respon= '$_POST[respon]',
                                                      tgl_respon = '$tgl_respon'
                                                where id_pesan ='$_GET[id_pesan]'");
    
    
      if($save) {
        echo "<script>
            alert('Berhasil membalas pemesanan!');
            window.location='respon.php';
            </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>


			<div class="modal-header">
            	<h3>Konfirmasi</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="nama_siswa">Nama Siswa</label>
                        <div class="controls">
                            <input name="nama_siswa" type="text" id="nama_siswa" class="form-control"
                             value='<?php echo $data['nama_siswa'];?>' readonly >
                        </div>
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="pesan">Pesan</label>
                        <div class="controls">
                        	<input name="pesan" type="text" id="pesan" 
                        	value='<?php echo $data['pesan'];?>' class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="tgl_pesan">Tanggal Pesan</label>
                        <div class="controls">
                        	<input name="tgl_pesan" type="date" id="tgl_pesan" 
                        	value='<?php echo $data['tgl_pesan'];?>' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="respon">Konfirmasi</label>
                        <div class="controls">
                        	<input name="respon" type="text" id="respon" 
                        	value='<?php echo $data['respon'];?>' class="form-control" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="tgl_respon">Tanggal Konfirmasi</label>
                        <div class="controls">
                        	<input name="tgl_respon" type="date" id="tgl_respon" 
                        	value='<?php echo $data['tgl_respon'];?>' class="form-control" >
                        </div>
                    </div>

                    <div class="control-group">
                    	<label class="control-label" for="update"></label>
                        <div class="controls">
	                    	<input name="save" type="submit" id="update" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    
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

<?php
break;
}
}
?>

	</body>
</html>
    	