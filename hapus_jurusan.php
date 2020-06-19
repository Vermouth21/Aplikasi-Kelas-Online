<?php
	session_start();
	
  include_once("lib/koneksi.php");
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from jurusan where kode_jurusan='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='jurusan.php';
			</script>";
?>