<?php
session_start();

include_once("lib/koneksi.php");
$id	= $_GET['id'];
$sql	= mysql_query("DELETE FROM tbl_barang WHERE id_barang='$id'");

echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='merchan.php';
			</script>";
