<?php
error_reporting(0);
include_once("lib/koneksi.php");
$email = mysql_escape_string($_POST['email']);
$password = md5($_POST['password']);
$level = $_POST['level'];

// var_dump($password);
// var_dump($email);
// exit;



if ($level == 'Siswa') {
	$qry = mysql_query("SELECT * FROM siswa WHERE nis='$email' AND password='$password'");
	$numlogin = mysql_num_rows($qry);
	if ($numlogin == 1) {
		$ruser = mysql_fetch_array($qry);
		session_start();
		$_SESSION['nis'] = $ruser['nis'];
		$_SESSION['nama_siswa'] = $ruser['nama_siswa'];
		$_SESSION['level'] = 'Siswa';

		echo "<script>alert('Selamat Datang, $_SESSION[nama_siswa]');window.location.href='index.php'</script>";
	} else {
		echo ("<script>
			alert('Login Gagal');
			window.location='index.php';		
		</script>");
	}
}

if ($level == 'Member') {

	$qry = mysql_query("SELECT * FROM pendaftaran WHERE email='$email' AND password='$password'");
	$numlogin = mysql_num_rows($qry);
	if ($numlogin == 1) {
		$ruser = mysql_fetch_array($qry);
		session_start();
		$_SESSION['email'] = $ruser['email'];
		$_SESSION['password'] = $ruser['password'];
		$_SESSION['status'] = $ruser['status'];
		$_SESSION['level'] = 'Member';


		echo "<script>alert('Selamat Datang, $_SESSION[nama]');window.location.href='index.php'</script>";
	} else {
		echo ("<script>
			alert('Login Gagal');
			window.location='index.php';		
		</script>");
	}
}

if ($level == 'Guru_Piket' || $level == 'Wali_Kelas' || $level == 'Guru_BK' || $level = 'Kepala_Sekolah') {

	$qry = mysql_query("SELECT * FROM guru WHERE nip='$email' AND password='$password' AND level='$level'");
	$numlogin = mysql_num_rows($qry);
	if ($numlogin == 1) {
		$ruser = mysql_fetch_array($qry);
		session_start();
		$_SESSION['nip'] = $ruser['nip'];
		$_SESSION['nama_guru'] = $ruser['nama_guru'];
		$_SESSION['level'] = $ruser['level'];


		echo "<script>alert('Selamat Datang, $_SESSION[nama_guru]');window.location.href='index.php'</script>";
	} else {
		echo ("<script>
			alert('Login Gagal');
			window.location='index.php';		
		</script>");
	}
}
