<?php
error_reporting(0);
include_once("lib/koneksi.php");
$nama = mysql_escape_string($_POST['namalengkap']);
$password = $_POST['password'];
$passwordrep = md5($_POST['passwordrep']);
$email = mysql_escape_string($_POST['email']);
$jk = mysql_escape_string($_POST['jeniskelamin']);
$hp = mysql_escape_string($_POST['handphone']);
$umur = mysql_escape_string($_POST['umur']);
$pekerjaan = mysql_escape_string($_POST['pekerjaan']);
if(empty($_POST[namalengkap]) 
or empty($_POST[password]) 
or empty($_POST[email]) 
 
or empty($_POST[jeniskelamin]) 
or empty($_POST[handphone]) 
){
 echo"<script>alert('Silahkan Lengkapi Data Anda Terlebih Dahulu !');window.location.href='./'</script>";
}else{
$cek=mysql_query("select * from user where email='$_POST[email]'");
$jumlah=mysql_num_rows($cek);
if ($jumlah)
{
 echo"<script>alert('Maaf, Username ini sudah terdaftar,silahkan masukan akun yang lain !');window.location.href='./'</script>";
} else {
	$sql = mysql_query("INSERT INTO user(nama_lengkap,email,password,hp,jenis_kelamin,umur,pekerjaan) VALUES('$nama','$email','$password','$hp','$jk','$umur','$pekerjaan')");	
	if($sql){
		echo("<script>
			alert('Registrasi Berhasil');
			window.location='index.php';		
		</script>");
	}else{
		echo("<script>
			alert('Registrasi Gagal ".mysql_error()."');
			window.location='index.php';
		</script>");
	}
	}
}
?>