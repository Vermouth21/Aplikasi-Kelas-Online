<?php
session_start();

include_once("lib/koneksi.php");
$id	= $_GET['id'];
$sql	= mysql_query("DELETE FROM kelas_online WHERE kelas_id='$id'");

echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='kelas_online.php';
			</script>";
