<?php
session_start();

include_once("lib/koneksi.php");
$id	= $_GET['id'];
$sql	= mysql_query("DELETE FROM pendaftaran WHERE id='$id'");

echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='member.php';
			</script>";
