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
						<h3>Edit Data Merchandise</h3>
					</div>
					<div style="margin-top:10px;">
						<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">Nama Merchandise</label>
								<div class="controls">
									<input value="<?php echo $pecah->barang_id ?>" name="id" type="hidden">
									<input name="nama" type="text" class="form-control" value="<?php echo $data['nama_barang']; ?>">
								</div>
							</div>

							<div class="control-group">
								<label>Kategori Merchandise</label>
								<select class="form-control" name="kategori">
									<option value="">Pilih Kategori</option>
									<?php
									$s = mysql_query("SELECT * FROM tbl_kategori");
									while ($datar = mysql_fetch_array($s)) {
										echo '<option value="' . $datar['id_kategori'] . '">' . $datar['nama_kategori'] . '</option>';
									}
									?>
								</select>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Harga Diskon</label>
								<div class="controls">
									<input name="diskon" value="<?php echo $data['harga_diskon']; ?>" type="number" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Harga Asli</label>
								<div class="controls">
									<input name="asli" value="<?php echo $data['harga_asli']; ?>" type="number" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Warna</label>
								<div class="controls">
									<input name="warna" value="<?php echo $data['warna']; ?>" type="text" class="form-control">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="nama">Ukuran</label>
								<div class="controls">
									<input name="ukuran" value="<?php echo $data['ukuran']; ?>" type="text" class="form-control">
								</div>
							</div>

							<fieldset class="form-group">
								<div class="control-group">
									<label class="col-form-label col-sm-1">Label</label>

									<div class="col-sm-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="label[]" value="Diskon" <?php echo in_array("Diskon", $label) ? 'checked' : ''; ?>>Diskon
											<!-- <label class="form-check-label" for="radio1">
												Diskon
											</label> -->
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="label[]" value="Terbaru" <?php echo in_array("Terbaru", $label) ? 'checked' : ''; ?>>Terbaru
											<!-- <label class="form-check-label" for="radio2">
												Terbaru
											</label> -->
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="label[]" value="Terbatas" <?php echo in_array("Terbatas", $label) ? 'checked' : ''; ?>>Terbatas
											<!-- <label class="form-check-label" for="radio3">
												Terbatas
											</label> -->
										</div>
									</div>
								</div>
							</fieldset>

							<div class="control-group">
								<label class="control-label" for="nama">Bahan</label>
								<div class="controls">
									<input name="bahan" value="<?php echo $data['bahan']; ?>" type="text" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="nama">Stok</label>
								<div class="controls">
									<input name="stok" value="<?php echo $data['stok']; ?>" type="text" class="form-control">
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
								<label class="control-label" for="update"></label>
								<div class="controls">
									<input name="update" type="submit" id="update" value="Update" class="btn btn-success">
									<input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
								</div>
							</div>

						<?php }
					if (isset($_POST['update'])) {
						$id       = $_GET['id'];
						$nama     = $_POST['nama'];
						$kategori = $_POST['kategori'];
						$diskon   = $_POST['diskon'];
						$asli     = $_POST['asli'];
						$warna    = $_POST['warna'];
						$ukuran   = $_POST['ukuran'];
						$a  = $_POST['label'];
						$label = implode(" ", $a);


						$bahan    = $_POST['bahan'];
						$stok     = $_POST['stok'];

						$nama_gambar = $_FILES['gambar']['name'];
						$lokasi      = $_FILES['gambar']['tmp_name'];

						if ($nama_gambar != "") {
							$gambar_lama = $data->gambar;

							unlink('images/' . $gambar_lama);
							move_uploaded_file($lokasi, "images/$nama_gambar");

							$update = mysql_query("UPDATE kelas_online SET nama_barang='$nama',
																		id_kategori='$kategori',
																		harga_diskon='$diskon',
																		harga_asli='$asli',
																		warna='$warna',
																		ukuran='$ukuran',
																		label='$label',
																		bahan='$bahan',
																		stok='$stok',
																		gambar='$nama_gambar'
																		WHERE
																		id_barang='$id' ");
						} else {
							$update = mysql_query("UPDATE kelas_online SET nama_barang='$nama',
																		id_kategori='$kategori',
																		harga_diskon='$diskon',
																		harga_asli='$asli',
																		warna='$warna',
																		ukuran='$ukuran',
																		label='$label',
																		bahan='$bahan',
																		stok='$stok'
																		WHERE
																		id_barang='$id' ");
						}
						// var_dump($update);
						// exit;

						if ($update) {
							echo "
									<script>
										alert('Data Berhasil Diupdate');
										window.location='merchan.php';
									</script>
									";
						} else {
							echo "
									<script>
										alert('Data Gagal Diupdate');
										window.location='merchan.php';
									</script>
						";
						}
					}


					if (isset($_POST['batal'])) {
						echo "<script language=javascript>
								window.location='merchan.php';
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