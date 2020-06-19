<?php 
ob_start();
require ('fpdf/fpdf.php');
include("lib/koneksi.php");
include("tglindo.php");
$pdf = new FPDF();

$tgl=date("Ymd");
    $nis = $_POST['nama'];
    $tgl_panggil= $_POST['tgl'];
    $pukul = $_POST['pukul'];
	$data = mysql_query("SELECT siswa.nis, jenis_pelanggaran.jenis,jenis_pelanggaran.bobot, siswa.nama_siswa,kelas.nama_kelas,jurusan.nama_jurusan,guru.nama_guru,kelas.wali_kelas from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas,jurusan,guru where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas and siswa.kode_jurusan=jurusan.kode_jurusan and kelas.wali_kelas=guru.nip group by siswa.nis");
	
	$baris= mysql_fetch_assoc($data);

	$data1 = mysql_query("SELECT siswa.nis, jenis_pelanggaran.jenis,jenis_pelanggaran.bobot, siswa.nama_siswa,kelas.nama_kelas,jurusan.nama_jurusan from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas,jurusan where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas and siswa.kode_jurusan=jurusan.kode_jurusan group by jenis_pelanggaran.jenis");
	$column = array();
	while($baris1= mysql_fetch_assoc($data1)){
		$column[] = $baris1['jenis'];
	}

$day = date('D', strtotime($tgl_panggil));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
		
	





$pdf->AddPage();
$pdf->SetFont('Times','B','13');
$pdf->Image('images/logo.png',10,8,21);
$pdf->Image('images/sekolah.png',180,8,18);
$pdf->Cell(190,5,'Pemerintahan Provinsi Sumatera Barat',0,1,'C');
$pdf->Cell(190,5,'Dinas Pendidikan',0,1,'C');
$pdf->Cell(190,5,'KELOMPOK TEKNOLOGI DAN BISNIS MANAJEMEN',0,1,'C');
$pdf->SetFont('Times','B','9');
$pdf->Cell(190,5,'Jln. Tebing Tinggi, Siulak, Kabupaten Kerinci, Jambi 37161 ',0,1,'C');
$pdf->Cell(190,7,'',0,1,'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,33,200,33);



$tanggal= mktime(date("m"),date("d"),date("Y"));
date_default_timezone_set('Asia/Jakarta');
$tgl=date("d M Y", $tanggal);
$tgl_pemanggilan=date("d M Y", $tgl_panggil);

$pdf->SetFont('Times','','12');
$pdf->Cell(320,5,'Kerinci, '.$tgl,0,1,'C');

$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(10,5,'Nomor',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,"422/............./SMKN 2/KRC-201",0,1,'L');

$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(10,5,'Lamp',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'',0,1,'L');


$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(10,5,'Perihal',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'Panggilan Orang Tua',0,1,'L');


$pdf->Ln(4);
$pdf->Cell(5);
$pdf->Cell(10,5,'Kepada Yth, ',0,0,'L');

$pdf->Ln(6);
$pdf->Cell(30);
$pdf->SetFont('Times','','12');
$pdf->Cell(10,5,'Orang Tua dari Siswa',0,1,'C');

$pdf->Ln(2);
$pdf->Cell(16);
$pdf->Cell(10,5,'Nama',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,$baris['nama_siswa'],0,1,'L');

$pdf->Ln(2);
$pdf->Cell(16);
$pdf->Cell(10,5,'Kelas/Jurusan',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,$baris['nama_kelas'].' / '.$baris['nama_jurusan'],0,1,'L');


$pdf->Ln(2);
$pdf->Cell(16);
$pdf->Cell(10,5,'Di tempat,',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'',0,1,'L');

$pdf->Ln(4);
$pdf->Cell(5);
$pdf->Cell(10,5,'Dengan hormat,',0,0,'L');

$pdf->Ln(6);
$pdf->Cell(5);
$pdf->Cell(10,5,'Dengan ini kami beritahukan kepada Bapak/Ibu Orang Tua Siswa yang namanya tersebut diatas,',0,0,'L');
$pdf->Ln(6);
$pdf->Cell(5);
$pdf->Cell(10,5,'bahwa anak kita tersebut telah melakukan pelanggaran tata tertib sekolah, Adapun bentuk kesalahan ',0,0,'L');
$pdf->Ln(6);
$pdf->Cell(5);
$pdf->Cell(10,5,'yang diperbuat oleh siswa tersebut adalah :',0,0,'L');

$no=1;

foreach ($column as $value) {
$pdf->Ln(7);
$pdf->Cell(16);
$pdf->Cell(10,5,"- ".$value,0,0,'L');
$no++;
}


$pdf->Ln(6);
$pdf->Cell(5);
$pdf->Cell(10,5,'Maka dengan ini kami memanggil Bapak/Ibu untuk dapat hadir pada:',0,0,'L');

$pdf->Ln(6);
$pdf->Cell(16);
$pdf->Cell(10,5,'Hari/Tanggal',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,$dayList[$day]." / ".TanggalIndo($tgl_panggil),0,1,'L');

$pdf->Ln(2);
$pdf->Cell(16);
$pdf->Cell(10,5,'Pukul',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,$pukul,0,1,'L');


$pdf->Ln(2);
$pdf->Cell(16);
$pdf->Cell(10,5,'Tempat',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'SMK Negeri 2 Kerinci',0,1,'L');


$pdf->Ln(2);
$pdf->Cell(6);
$pdf->SetFont('Times','','12');
$pdf->Cell(10,5,'Demikian surat panggilan ini kami buat, atas perhatian dan kehadirannya tepat pada waktu yang ',0,0,'L');


$pdf->Ln(6);
$pdf->Cell(6);
$pdf->SetFont('Times','','12');
$pdf->Cell(10,5,'telah ditentukan kami ucapkan terima kasih.',0,0,'L');

$pdf->Ln(8);
$pdf->Cell(6);
$pdf->Cell(10,5,'Mengetahui',0,0,'L');


$pdf->Ln(5);
$pdf->Cell(6);
$pdf->Cell(10,5,'Ketua Program Studi,',0,0,'L');

$pdf->Ln(0);
$pdf->Cell(140);
$pdf->Cell(10,5,'Guru/Wali Kelas',0,0,'L');




$pdf->Ln(22);
$pdf->Cell(140);
$pdf->Cell(10,5,"( ".$baris['nama_guru']." )",0,0,'L');
$pdf->Ln(0);
$pdf->Cell(5);
$pdf->Cell(10,5,"(...................................)",0,0,'L');
$pdf->Ln(5);
$pdf->Cell(140);
$pdf->Cell(10,5," NIP." .$baris['wali_kelas'],0,0,'L');
$pdf->Ln(0);
$pdf->Cell(5);
$pdf->Cell(10,5,"NIP.",0,0,'L');
$pdf->Cell(15);


$pdf->Ln(10);
$pdf->Cell(65);
$pdf->Cell(10,5,'Wakil Kepala Bidang Kesiswaan,',0,0,'L');

$pdf->Ln(24);
$pdf->Cell(75);
$pdf->SetFont('Times','B','12');
$pdf->Cell(10,5,"(Doni Karlis, S.H)",0,0,'L');
$pdf->Ln(4);
$pdf->Cell(65);
$pdf->SetFont('Times','B','12');
$pdf->Cell(10,5,"NIP. 19781128 200901 1 004",0,0,'L');


$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(0,5,'',0,1,'L');










ob_end_clean();
$pdf->Output();
ob_end_flush(); 

?>