<?php
ob_start();
include "lib/koneksi.php";

$nis = $_POST['nama'];
	$data = mysql_query("SELECT siswa.nis, jenis_pelanggaran.jenis,jenis_pelanggaran.bobot, siswa.nama_siswa,kelas.nama_kelas,jurusan.nama_jurusan,sum(jenis_pelanggaran.bobot) as jumlah from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas,jurusan where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas and siswa.kode_jurusan=jurusan.kode_jurusan");
	
	$baris= mysql_fetch_array($data);


	if($baris['jumlah'] <=100){
		echo "<script>window.location = 'cetak.php?nama=$_POST[nama]' </script>";

	}
	else if($baris['jumlah'] >100){
	// echo "<script>window.location = 'cetakPemanggilan.php?nama=$_POST[nama]' </script>";
		echo "<script>window.location = 'tampilanCetak.php?nama=$_POST[nama]' </script>";

	// }
	}


?>