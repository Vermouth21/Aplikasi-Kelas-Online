<?php
session_start();

include_once("lib/koneksi.php");
$id	= $_GET['id'];
$sql	= mysql_query("DELETE FROM tb_diskusi WHERE id='$id'");

echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='diskusi.php';
			</script>";
