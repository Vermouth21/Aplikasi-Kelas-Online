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
				$sql	= mysql_query("SELECT * FROM kelas_online WHERE kelas_id='$id'");
				$data	= mysql_fetch_array($sql);
				if (mysql_num_rows($sql) > 0) {
				?>
					<div class="modal-header">
						<h3>Edit Kelas</h3>
					</div>
					<div style="margin-top:10px;">
						<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
							<div class="control-group">
								<label>Kategori</label>
								<div class="controls">
									<select class="form-control" name="kategori_id">
										<option value="<?php echo $data['kategori_id'] ?>"><?php echo $data['kategori_id'] ?></option>
										<option value="">--Pilih--</option>
										<?php
										// include 'koneksi.php';
										$a = mysql_query("SELECT * FROM kategori");
										while ($b = mysql_fetch_array($a)) {
											echo '<option value="' . $b['id'] . '">' . $b['kategori'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Nama Kelas</label>
								<div class="controls">
									<input name="id" value="<?php echo $data['kelas_id'] ?>" type="hidden">
									<input name="judul" value="<?php echo $data['judul'] ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Jenis Kelas</label>
								<div class="controls">
									<input name="kategori" value="<?php echo $data['kategori'] ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Gambar</label>
								<div class="controls">
									<center>
										<img width="80px" height="80px" src="images/<?php echo $data['gambar']; ?>" alt="">
									</center>
									<input name="gambar" type="file" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Tingkatan</label>
								<div class="controls">
									<input name="tingkatan" value="<?php echo $data['tingkatan'] ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Deskripsi</label>
								<div class="controls">
									<textarea name="deskripsi" type="text" class="form-control" rows="10"><?php echo $data['deskripsi'] ?></textarea>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Fasilitas</label>
								<div class="controls">
									<input name="fasilitas" type="text" value="<?php echo $data['fasilitas'] ?>" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label>Nama Mentor</label>
								<div class="controls">
									<select class="form-control" name="mentor">
										<option value="<?php echo $data['mentor_id'] ?>"><?php echo $data['mentor_id'] ?></option>
										<option value="">--Pilih--</option>
										<?php
										// include 'koneksi.php';
										$ambil = mysql_query("SELECT * FROM tb_pemateri");
										while ($sqli = mysql_fetch_array($ambil)) {
											echo '<option value="' . $sqli['id_pemateri'] . '">' . $sqli['nama'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Keterangan</label>
								<div class="controls">
									<textarea name="keterangan" type="text" class="form-control"><?php echo $data['keterangan'] ?></textarea>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Harga</label>
								<div class="controls">
									<input name="harga" value="<?php echo $data['biaya'] ?>" type="text" class="form-control">
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
					if (isset($_POST['update'])) {
						// $id       = $_GET['id'];
						$kelas     	 = $_POST['kategori_id'];
						$judul     	 = $_POST['judul'];
						$kategori 	 = $_POST['kategori'];
						$nama_gambar = $_FILES['gambar']['name'];
						$lokasi      = $_FILES['gambar']['tmp_name'];
						$tingkatan   = $_POST['tingkatan'];
						$deskripsi   = $_POST['deskripsi'];
						$fasilitas   = $_POST['fasilitas'];
						$mentor  	 = $_POST['mentor'];
						$keterangan  = $_POST['keterangan'];
						$harga  	 = $_POST['harga'];

						if ($nama_gambar != "") {
							$gambar_lama = $data->gambar;

							unlink('images/' . $gambar_lama);
							move_uploaded_file($lokasi, "images/$nama_gambar");

							$update = mysql_query("UPDATE kelas_online SET kategori_id	='$kelas',
																			judul		='$judul',
																			kategori	='$kategori',
																			gambar  	='$nama_gambar',
																			tingkatan	='$tingkatan',
																			deskripsi	='$deskripsi',
																			fasilitas	='$fasilitas',
																			mentor_id	='$mentor',
																			keterangan	='$keterangan',
																			biaya		='$harga'
																			WHERE
																			kelas_id='$id' ");
						} else {
							$update = mysql_query("UPDATE kelas_online SET kategori_id ='$kelas', 
																		judul		='$judul',
																		kategori	='$kategori',
																		tingkatan	='$tingkatan',
																		deskripsi	='$deskripsi',
																		fasilitas	='$fasilitas',
																		mentor_id	='$mentor',
																		keterangan	='$keterangan',
																		biaya		='$harga'
																		WHERE
																		kelas_id	='$id' ");
						}

						if ($update) {
							echo "
									<script>
										alert('Data Berhasil Diupdate');
										window.location='kelas_online.php';
									</script>
									";
						} else {
							echo "
									<script>
										alert('Data Gagal Diupdate');
										window.location='kelas_online.php';
									</script>
						";
						}
					}


					if (isset($_POST['batal'])) {
						echo "<script language=javascript>
								window.location='kelas_online.php';
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
		<h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved . <strong>SMK Negeri 2 Kerinci</strong></h6>
	</div>
	<?php
	include_once("modal-login.php");
	?>
</body>

</html>