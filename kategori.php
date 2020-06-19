<h2>
	<center>Produk Merchandise</center>
</h2>

<?php
// $id = $_GET['id'];
$nagari = mysql_query("SELECT * FROM tbl_barang WHERE id_kategori=$_GET[id]");
while ($sql = mysql_fetch_array($nagari)) {
?>

	<div class="col-md-3">
		<div class="box text-center">
			<a href="?p=detail_kategori&id=<?php echo $sql['nama_barang']; ?>"><img style="height: 250px; width: 90%" src="images/<?php echo $sql['gambar']; ?>"></a>
			<div class="desc">
				<h4><?php echo $sql['nama_barang']; ?></h4>
				<center>
					<?php
					$label = explode(" ", $sql['label']);
					$warna = "";
					foreach ($label as $lb) {
						if ($lb == "Terbatas") {
							$warna = "warning";
						} elseif ($lb == "Diskon") {
							$warna = "primary";
						} elseif ($lb == "Terbaru") {
							$warna = "success";
						}
						echo "<span class='label label-$warna'>$lb</span> ";
					}

					?>
				</center>
			</div>
			<div class="social">
				<div class="likes"><span style="text-decoration: line-through red;"><?php echo  "Rp " . number_format($sql['harga_asli'], 2, ',', '.') ?></span></div>
				<div class="prize"><?php echo  "Rp " . number_format($sql['harga_diskon'], 2, ',', '.') ?></div>
			</div>
		</div>
	</div>
<?php } ?>