<?php 
@session_start();
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
			
				<div class="col-md-12">
					<div class="alert alert-info">
			<marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
			</marquee>
				</div>
			
			<div class="modal-header">
            	<h4>Cetak Surat Pemanggilan Orang tua</h4>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-ntal" name="form1" method="post" target="_blank" action="cetakPemanggilan.php" enctype="multipart/form-data">


                     
					<div class="control-group">
						<label class="control-label" for="Level">Nama Siswa</label>
						<select class="form-control" name="nama" id="level">
					     <option value="">Pilih Siswa</option>
						<?php
							$sql = mysql_query("SELECT * from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and kelas.wali_kelas=
								'$_SESSION[nip]' and siswa.kode_kelas=kelas.kode_kelas HAVING sum(jenis_pelanggaran.bobot )>=100");
							while($r = mysql_fetch_array($sql)){
						?>
						<option value="<?php echo $r['nis'] ?>"><?php echo $r['nama_siswa'] ?>
							<?php } ?>
						</option>
					            
					    </select>
					</div>

                   
                    <div class="control-group">
                    	<label class="control-label" for="simpan"></label>
                        <div class="controls">
	                    	<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                   
                </form>
			</div></div>
    	
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