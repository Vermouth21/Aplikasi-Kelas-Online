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
					<h4>Tambah Pemateri</h4>
				</div>
				<div style="margin-top:10px;">
					<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
						<div class="control-group">
							<label class="control-label">Nama Pemateri</label>
							<div class="controls">
								<input name="pemateri" type="text" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Jabatan</label>
							<div class="controls">
								<input name="jabatan" type="text" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Foto</label>
							<div class="controls">
								<input name="gambar" type="file" class="form-control">
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
						if (isset($_POST['simpan'])) {
							$pemateri     	 = $_POST['pemateri'];
							$jabatan 	 = $_POST['jabatan'];
							$nama_gambar = $_FILES['gambar']['name'];
							$lokasi      = $_FILES['gambar']['tmp_name'];

							if (!empty($lokasi)) {
								move_uploaded_file($lokasi, "images/" . $nama_gambar);
							}

							$simpan = mysql_query("INSERT INTO `tb_pemateri`(nama,
                                                                            jabatan,
                                                                            foto) 
                                                                            VALUES
                                                                        	('$pemateri',
                                                                            '$jabatan',
                                                                            '$nama_gambar')");

							if ($simpan) {
								echo "
                        <script language=javascript>
                            alert('Data Tersimpan');
                            window.location='pemateri.php';
                        </script>
                        ";
							} else {
								echo "
                                <script language=javascript>
                                    alert('Data tidak Tersimpan');
                                    window.location='pemateri.php';
                                </script>
                    ";
							}
						}

						if (isset($_POST['batal'])) {
							echo "<script language=javascript>
							window.location = 'pemateri.php';
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