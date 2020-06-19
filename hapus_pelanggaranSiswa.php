<?php
	session_start();
	
  include_once("lib/koneksi.php");
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from pelanggaran_siswa where id_plg_siswa='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='kelola.php';
			</script>";
?>