<?php
	session_start();
	
  include_once("lib/koneksi.php");
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from siswa where nis='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='siswa.php';
			</script>";
?>