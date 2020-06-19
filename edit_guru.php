<?php 
session_start();
include_once("lib/koneksi.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>SMK Negeri 2 Kerinci</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="themea/twitter.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="dist/sweetalert.min.js"></script>
		    <style type="text/css">

.style2 {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
}
.style7 {
	font-size: 16px;
	font-family: "Trebuchet MS";
}

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
	$sql	= mysql_query("select * from guru where nip='$kode'");
	$data	= mysql_fetch_array($sql);
	if(mysql_num_rows($sql) > 0){
?>
			<div class="modal-header">
            	<h3>Edit Data Guru</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="kode">NIP</label>
                        <div class="controls">
                            <input name="nip" type="text" id="kode" class="form-control"
                             value='<?php echo $data['nip'];?>' readonly >
                        </div>
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="nama">Nama Guru</label>
                        <div class="controls">
                        	<input name="nama_guru" type="text" id="nama" 
                        	value='<?php echo $data['nama_guru'];?>' class="form-control">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="nama">Password</label>
                        <div class="controls">
                        	<input name="password" type="password" id="password" 
                        	 class="form-control">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="nama">Jenis Kelamin</label>
                        <div class="controls">
                        	 <div class="row">
                            <div class="col-md-2">
                            <label class="white-color">L</label>
                                <input name="jk" type="radio"  class="input-text input-large full-width" placeholder="" value="L">
                            </div>
                            <div class="col-md-2">
                            <label class="white-color">P</label>
                                <input name="jk" type="radio"  class="input-text input-large full-width" placeholder="" value="P">
                            </div>
                            </div>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="nama">Alamat</label>
                        <div class="controls">
                        	 <textarea name="alamat" class="form-control" rows="5" placeholder="Alamat"><?php echo $data['alamat'];?></textarea>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label" for="nama">No Telepon</label>
                        <div class="controls">
                        	<input name="no_telp" type="text" id="nama"
                        	value="<?php echo $data['no_telp'];?>" class="form-control">
                        </div>
                    </div>

					<div class="control-group">
						<label class="control-label" for="Level">Level</label>
						<select class="form-control" name="level" id="level">
            <option value="Guru_Piket">Guru Piket</option>
            <option value="Wali_Kelas">Wali Kelas</option>
           
            <option value="Guru_BK">Guru BK</option>
            <option value="Kepala_Sekolah">Kepala Sekolah</option>
            
        </select>
					</div>
                   
                    <div class="control-group">
                    	<label class="control-label" for="update"></label>
                        <div class="controls">
	                    	<input name="update" type="submit" id="update" value="Update" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php {
						if(isset($_POST['update'])){
							$hash=md5($_POST['password']);
							mysql_query("update guru set
											password='$hash',
											nama_guru= '$_POST[nama_guru]',
											jk= '$_POST[jk]',
											alamat= '$_POST[alamat]',
											no_telp= '$_POST[no_telp]' ,
											level= '$_POST[level]' 

											where nip='$_POST[nip]'") or die(mysql_error);
						}
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='guru.php';
								</script>";
							exit;
					}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='guru.php';
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
    	