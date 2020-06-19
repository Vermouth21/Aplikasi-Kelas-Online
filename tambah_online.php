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
		<?php include_once("menu1.php"); ?>
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
					<h4>Tambah Kelas</h4>
				</div>
				<div style="margin-top:10px;">
					<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
						<div class="control-group">
							<label>Kategori</label>
							<div class="controls">
								<select class="form-control" name="kategori_kelas">
									<option value="">--Pilih--</option>
									<?php
									// include 'koneksi.php';
									$a = mysql_query("SELECT * FROM kategori");
									while ($b = mysql_fetch_array($a)) {
										echo '<option value="' . $b['kategori'] . '">' . $b['kategori'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nama Kelas</label>
							<div class="controls">
								<input name="judul" type="text" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Jenis Kelas</label>
							<div class="controls">
								<input name="kategori" type="text" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Gambar</label>
							<div class="controls">
								<input name="gambar" type="file" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Tingkatan</label>
							<div class="controls">
								<input name="tingkatan" type="text" class="form-control">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Deskripsi</label>
							<div class="controls">
								<textarea name="deskripsi" type="text" class="form-control" rows="10"></textarea>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Fasilitas</label>
							<div class="controls">
								<input name="fasilitas" type="text" class="form-control"></input>
							</div>
						</div>

						<div class="control-group">
							<label>Nama Mentor</label>
							<div class="controls">
								<select class="form-control" name="mentor">
									<option value="">--Pilih--</option>
									<?php
									// include 'koneksi.php';
									$ambil = mysql_query("SELECT * FROM tb_pemateri");
									while ($sqli = mysql_fetch_array($ambil)) {
										echo '<option value="' . $sqli['nama'] . '">' . $sqli['nama'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label>Jabatan Mentor</label>
							<div class="controls">
								<select class="form-control" name="jb_mentor">
									<option value="">--Pilih--</option>
									<?php
									// include 'koneksi.php';
									$ambil = mysql_query("SELECT * FROM tb_pemateri");
									while ($sqli = mysql_fetch_array($ambil)) {
										echo '<option value="' . $sqli['jabatan'] . '">' . $sqli['jabatan'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Keterangan</label>
							<div class="controls">
								<textarea name="keterangan" type="text" class="form-control"></textarea>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="nama">Harga</label>
							<div class="controls">
								<input name="harga" type="text" class="form-control">
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
							$kelas     	 = $_POST['kategori_kelas'];
							$judul     	 = $_POST['judul'];
							$kategori 	 = $_POST['kategori'];
							$nama_gambar = $_FILES['gambar']['name'];
							$lokasi      = $_FILES['gambar']['tmp_name'];
							$tingkatan   = $_POST['tingkatan'];
							$deskripsi   = $_POST['deskripsi'];
							$fasilitas   = $_POST['fasilitas'];
							$mentor  	 = $_POST['mentor'];
							$jb_mentor   = $_POST['jb_mentor'];
							$keterangan  = $_POST['keterangan'];
							$harga  	 = $_POST['harga'];

							if (!empty($lokasi)) {
								move_uploaded_file($lokasi, "images/" . $nama_gambar);
							}

							$simpan = mysql_query("INSERT INTO `kelas_online`(kategori_kelas,
																				judul,
                                                                                kategori,
                                                                                gambar,
                                                                                tingkatan,
                                                                                deskripsi,
																				fasilitas,
																				mentor,
																				jb_mentor,
                                                                                keterangan,
																				biaya) 
                                                                                VALUES
                                                                        		($kelas,
																				'$judul',
                                                                                '$kategori',
                                                                                '$nama_gambar',
                                                                                '$tingkatan',
                                                                                '$deskripsi',
                                                                                '$fasilitas',
																				'$mentor',
																				'$jb_mentor',
                                                                                '$keterangan',
																				'$harga')");

							if ($simpan) {
								echo "
                        <script language=javascript>
                            alert('Data Tersimpan');
                            window.location='kelas_online.php';
                        </script>
                        ";
							} else {
								echo "
                                <script language=javascript>
                                    alert('Data tidak Tersimpan');
                                    window.location='kelas_online.php';
                                </script>
                    ";
							}
						}

						if (isset($_POST['batal'])) {
							echo "<script language=javascript>
							window.location = 'kelas_online.php';
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