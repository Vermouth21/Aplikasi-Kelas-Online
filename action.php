<?php
session_start();
$sid = session_id();
$userid = $_SESSION['iduser'];
include_once("lib/koneksi.php");
if($_POST){
	$n = $_POST['n'];
	echo $n;
	for($i=1;$i<$n;$i++){
		if(isset($_POST['gejala_'.$i])){
			$gejala = $_POST['gejala_'.$i];
			$qrygetn = mysql_query("SELECT nilai FROM gejala WHERE kdgjl='$gejala'");
			$rnil = mysql_fetch_array($qrygetn);
			$nilaigejala = $rnil['nilai'];
			$nilai = $_POST['nilai_'.$i];
			$qry = mysql_query("INSERT INTO konsultasi(session,username,gejala,nilai,nilaiuser) VALUES('$sid','$userid','$gejala','$nilaigejala','$nilai')");
		}
	}
}
header("Location: result.php");
?>