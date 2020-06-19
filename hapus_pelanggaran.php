<?php
	session_start();
	
  include_once("lib/koneksi.php");
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from jenis_pelanggaran where kode_pelanggaran='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='pelanggaran.php';
			</script>";
?>