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
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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
				<?php
				$id	= $_GET['id'];
				$sql	= mysql_query("SELECT * FROM pendaftaran WHERE pendaftaran_id='$id'");
				$data	= mysql_fetch_array($sql);
				if (mysql_num_rows($sql) > 0) {
				?>
					<div class="modal-header">
						<h3>Edit Member</h3>
					</div>
					<div style="margin-top:10px;">
						<form class="form-horizontal" method="post" action="">
							<div class="control-group">
								<label class="control-label">Nama</label>
								<div class="controls">
									<input name="id" value="<?php echo $data['pendaftaran_id'] ?>" type="hidden">
									<input name="kelas_id" value="<?php echo $data['kelas_id'] ?>" type="hidden" class="form-control">
									<input name="nama" value="<?php echo $data['nama'] ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Email</label>
								<div class="controls">
									<input name="email" value="<?php echo $data['email'] ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Password</label>
								<div class="controls">
									<input name="password" type="password" value="<?php echo $data['password'] ?>" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label>Jenis Kelamin</label>
								<div class="controls">
									<select class="form-control" name="jenis_kelamin">
										<option value="<?php echo $data['jenis_kelamin'] ?>"><?php echo $data['jenis_kelamin'] ?></option>
										<option value="">--Pilih--</option>
										<option value="Laki - Laki">Laki - Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">No Hp</label>
								<div class="controls">
									<input name="nohp" value="<?php echo $data['nohp'] ?>" type="number" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Alamat</label>
								<div class="controls">
									<input name="alamat" value="<?php echo $data['alamat'] ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label for="">Status</label>
								<div class="controls">
									<select name="status" class="form-control">
										<option value="<?php echo $data['status'] ?>"><?php echo $data['status'] ?></option>
										<option value="">--Pilih--</option>
										<option value="Aktif">Aktif</option>
										<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="update"></label>
								<div class="controls">
									<input type="hidden" name="level" value="Member">
									<button name="update" type="submit" value="update" class="btn btn-success">Update</button>
									<button name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">Batal</button>
								</div>
							</div>
						</form>
					<?php }

				if (isset($_POST['update'])) {
					$kelas     		= $_POST['kelas_id'];
					$nama     		= $_POST['nama'];
					$email 	 		= $_POST['email'];
					$password   	= $_POST['password'];
					$jenis_kelamin	= $_POST['jenis_kelamin'];
					$nohp  	 		= $_POST['nohp'];
					$alamat  		= $_POST['alamat'];
					$level  		= $_POST['level'];
					$status  	 	= $_POST['status'];

					$update = mysql_query("UPDATE pendaftaran SET  			kelas_id		='$kelas',
																			nama			='$nama',
																			email			='$email',
																			password		='$password',
																			jenis_kelamin	='$jenis_kelamin',
																			nohp			='$nohp',
																			alamat			='$alamat',
																			level			='$level',
																			status			='$status'
																			WHERE
																			pendaftaran_id	='$id'");

					echo "<script language=javascript>
				window.alert('Edit Berhasil');
				window.location='member.php';
				</script>";
					exit;
				}

				if (isset($_POST['batal'])) {
					echo "<script language=javascript>
							window.location='member.php';
							</script>";
					exit;
				}
					?>


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
		<h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved . <strong>SMK Negeri 2 Kerinci</strong></h6>
	</div>
	<?php
	include_once("modal-login.php");
	?>
	<script type="text/javascript">
		function readTextFile(file, callback, encoding) {
			var reader = new FileReader();
			reader.addEventListener('load', function(e) {
				callback(this.result);
			});
			if (encoding) reader.readAsText(file, encoding);
			else reader.readAsText(file);
		}

		function fileChosen(input, output) {
			if (input.files && input.files[0]) {
				readTextFile(
					input.files[0],
					function(str) {
						output.value = str;
					}
				);
			}
		}

		$('#files').on('change', function() {
			var result = $("#files").text();

			fileChosen(this, document.getElementById('editor1'));
			CKEDITOR.instances['editor1'].setData(result);
		});
	</script>

</body>

</html>