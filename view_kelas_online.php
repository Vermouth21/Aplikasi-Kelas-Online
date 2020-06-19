<?php include_once("lib/koneksi.php"); ?>

<h2>
	<center>Kelas Online</center>
</h2>
<br>
<?php
$id = $_GET['id'];
$nagari = mysql_query("SELECT * FROM kelas_online JOIN tb_pemateri ON kelas_online.mentor_id = tb_pemateri.id_pemateri");
// var_dump($id);
// exit;
while ($sql = mysql_fetch_array($nagari)) {
?>

	<div class="col-md-3">
		<div class="box" style="height: 420px ">
			<a href="?p=detail_kelas&id=<?php echo $sql['kelas_id']; ?>"><img style="width: 100%;" class="img-fluid" src="images/<?php echo $sql['gambar']; ?>"></a>
			<div class="desc">
				<h4>
					<b><a href="?p=detail_kelas&id=<?php echo $sql['kelas_id']; ?>"><?php echo substr($sql['judul'], 0, 20); ?>..</a></b><br>
					<?php echo $sql['tingkatan']; ?><br><br>
					<?php
					$pecah = explode(',', $sql['fasilitas']);
					$data1 = $pecah[0];
					$data2 = $pecah[1];
					?>
					<span class="fa fa-certificate" style="margin-right: 10px">&nbsp;&nbsp;<?php echo $data1 ?></span>
					<span class="fa fa-comments" style="margin-left: 30px"><?php echo $data2 ?></span>
					<hr>
				</h4>
				<div class="row">
					<div class="col-md-2" style="margin-left: 15px">
						<img style="height: 50px" src="images/<?php echo $sql['foto']; ?>" class="img-circle" alt="Mentor">
					</div>
					<div class="col-md-8">
						<p><b><?php echo $sql['nama']; ?></b><br><?php echo $sql['jabatan']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>