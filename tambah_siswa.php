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
	<link rel="stylesheet" href="css/style.css" />
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
		<?php include_once("menu.php"); ?>
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
					<h4>Tambah Data Siswa</h4>
				</div>
				<div style="margin-top:10px;">
					<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
						<div class="control-group">
							<label class="control-label" for="kode">NIS</label>
							<div class="controls">
								<input name="nis" type="text" id="kode" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Nama Siswa</label>
							<div class="controls">
								<input name="nama_siswa" type="text" id="nama" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Password</label>
							<div class="controls">
								<input name="password" type="password" id="password" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Jenis Kelamin</label>
							<div class="controls">
								<div class="row">
									<div class="col-md-2">
										<label class="white-color">L</label>
										<input name="jk" type="radio" class="input-text input-large full-width" placeholder="" value="L">
									</div>
									<div class="col-md-2">
										<label class="white-color">P</label>
										<input name="jk" type="radio" class="input-text input-large full-width" placeholder="" value="P">
									</div>
								</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="kode">Tempat Lahir</label>
							<div class="controls">
								<input name="tempat_lahir" type="text" id="kode" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="kode">Tanggal Lahir</label>
							<div class="controls">
								<input name="tgl_lahir" type="date" id="kode" class="form-control">
							</div>
						</div>



						<div class="control-group">
							<label class="control-label" for="nama">Alamat</label>
							<div class="controls">
								<textarea name="alamat" class="form-control" rows="5" placeholder="Alamat"></textarea>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">No Telepon</label>
							<div class="controls">
								<input name="no_telp" type="text" id="nama" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Level">Kelas</label>
							<select class="form-control" name="kode_kelas" id="level">
								<option value="">Pilih Kelas</option>
								<?php
								$sql = mysql_query("SELECT * FROM kelas");
								while ($r = mysql_fetch_array($sql)) {
								?>
									<option value="<?php echo $r['kode_kelas'] ?>"><?php echo $r['nama_kelas'] ?>
									<?php } ?>
									</option>

							</select>
						</div>


						<div class="control-group">
							<label class="control-label" for="Level">Jurusan</label>
							<select class="form-control" name="kode_jurusan" id="level">
								<option value="">Pilih Jurusan</option>
								<?php
								$sql = mysql_query("SELECT * FROM jurusan");
								while ($r = mysql_fetch_array($sql)) {
								?>
									<option value="<?php echo $r['kode_jurusan'] ?>"><?php echo $r['nama_jurusan'] ?>
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

						<?php
						if (isset($_POST['simpan'])) {
							$hash = md5($_POST['password']);
							mysql_query("insert into siswa values ('$_POST[nis]', '$hash','$_POST[nama_siswa]', '$_POST[jk]','$_POST[tempat_lahir]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[no_telp]','$_POST[kode_kelas]','$_POST[kode_jurusan]')")
								or die(mysql_error);

							echo "<script language=javascript>
								window.alert('Simpan Berhasil');
								window.location='siswa.php';
								</script>";
							exit;
						}

						if (isset($_POST['batal'])) {
							echo "<script language=javascript>
								window.location='siswa.php';
								</script>";
							exit;
						}
						?>
					</form>
				</div>
			</div>
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