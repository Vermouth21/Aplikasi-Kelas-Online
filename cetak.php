<?php 
ob_start();
require ('fpdf/fpdf.php');
include("lib/koneksi.php");
$pdf = new FPDF();

$tgl=date("Ymd");
    $nis = $_GET['nama'];
	$data = mysql_query("SELECT siswa.nis, jenis_pelanggaran.jenis,jenis_pelanggaran.bobot, siswa.nama_siswa,kelas.nama_kelas,jurusan.nama_jurusan from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas,jurusan where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas and siswa.kode_jurusan=jurusan.kode_jurusan");
	
	$baris= mysql_fetch_assoc($data);

	$data1 = mysql_query("SELECT siswa.nis, jenis_pelanggaran.jenis,jenis_pelanggaran.bobot, siswa.nama_siswa,kelas.nama_kelas,jurusan.nama_jurusan from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas,jurusan where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas and siswa.kode_jurusan=jurusan.kode_jurusan group by jenis_pelanggaran.jenis");
	$column = array();
	while($baris1= mysql_fetch_assoc($data1)){
		$column[] = $baris1['jenis'];
	}
		
	





$pdf->AddPage();
$pdf->SetFont('Times','B','13');
$pdf->Image('images/logo.png',10,8,21);
$pdf->Image('images/sekolah.png',180,8,18);
$pdf->Cell(190,5,'Pemerintahan Provinsi Sumatera Barat',0,1,'C');
$pdf->Cell(190,5,'Dinas Pendidikan',0,1,'C');
$pdf->Cell(190,5,'KELOMPOK TEKNOLOGI DAN BISNIS MANAJEMEN',0,1,'C');
$pdf->SetFont('Times','B','9');
$pdf->Cell(190,5,'Jln. Tebing Tinggi, Siulak, Kabupaten Kerinci, Jambi 3716',0,1,'C');
$pdf->Cell(190,7,'',0,1,'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,33,200,33);
$pdf->SetFont('Times','B','13');
$pdf->Cell(190,5,'SURAT PERJANJIAN',0,1,'C');

$pdf->Cell(4,7,'',0,1);
$pdf->Ln(2);
$pdf->SetFont('Times','','12');
$pdf->Cell(5);
$pdf->Cell(10,5,'Yang bertanda tangan dibawah ini',0,0,'L');
$pdf->Cell(15);
$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,' ',0,1,'L');

$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(10,5,'Nama Siswa',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,$baris['nama_siswa'],0,1,'L');

$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(10,5,'Kelas / Jurusan',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(2,5,':',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,$baris['nama_kelas']." / ". $baris['nama_jurusan'],0,1,'L');


$pdf->Ln(2);
$pdf->Cell(5);
$pdf->Cell(10,5,'Dengan ini sungguh-sungguh dan penuh kesadaran, ',0,0,'L');
$pdf->Ln(6);
$pdf->SetFont('Times','B','13');
$pdf->Cell(190,5,'MENYATAKAN',0,1,'C');
$pdf->Ln(2);
$pdf->Cell(6);
$pdf->SetFont('Times','','12');
$pdf->Cell(10,5,'Benar bahwa saya telah melakukan perbuatan berupa......................................................................................',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(6);
$pdf->Cell(10,5,'dan telah dilakukan pembinaan dan dengan ini berjanji untuk :',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(8);
$pdf->Cell(10,5,'1. Akan belajar dengan tekun dan penuh semangat.',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(8);
$pdf->Cell(10,5,'2. Akan menjaga nama baik pribadi, keluarga dan sekolah. Khususnya untuk tidak : ',0,0,'L');

$no=1;

foreach ($column as $value) {
$pdf->Ln(7);
$pdf->Cell(12);
$pdf->Cell(10,5,"- ".$value,0,0,'L');
$no++;
}

$pdf->Ln(7);
$pdf->Cell(8);
$pdf->Cell(10,5,'3. Sanggup mentaati dan mematuhi pelaksanaan Disiplin, Tata Tertib, Aturan Sekolah dan kegiatan lainnya. ',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(8);
$pdf->Cell(10,5,'4. Bersedia mengikuti kegiatan pembenahan lingkungan sekolah, diluar kegiatan belajar mengajar ',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(8);
$pdf->Cell(10,5,'5. Sanggup menerima sangsi apabila melanggar ketentuan yang berlaku berupa : ',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(12);
$pdf->Cell(10,5,'a. Tidak dibenarkan mengikuti pelajaran dalam jangka waktu tertentu.',0,0,'L');
$pdf->Ln(7);
$pdf->Cell(12);
$pdf->Cell(10,5,'b. Dikembalikan ke orang tua.',0,0,'L');


$pdf->Ln(7);
$pdf->Cell(5);
$pdf->Cell(10,5,'Dan dikemudian hari saya melanggar segala ketentuan tersebut, saya bersedia dijatuhi sanksi dalam bentuk',0,0,'L');
$pdf->Ln(7);
$pdf->Cell(5);
$pdf->Cell(10,5,'apapun dan tidak akan menuntut ganti rugi kepada SMK 1 Negeri Kinali, baik secara moril dan materil.',0,0,'L');

$pdf->Ln(7);
$pdf->Cell(5);
$pdf->Cell(10,5,'Demikian surat perjanjian ini saya buat dengan sebenarnya, agar dapat digunakan sebagaimana mestinya.',0,0,'L');



$tanggal= mktime(date("m"),date("d"),date("Y"));
date_default_timezone_set('Asia/Jakarta');
$tgl=date("d M Y", $tanggal);


$pdf->Ln(10);
$pdf->Cell(140);
$pdf->Cell(10,5,'Kerinci, ' .$tgl,0,0,'L');
$pdf->Cell(15);
$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(0,5,'',0,1,'L');

$pdf->Ln(3);
$pdf->Cell(140);
$pdf->Cell(10,5,'Yang membuat pernyataan,',0,0,'L');
$pdf->Ln(0);
$pdf->Cell(5);
$pdf->Cell(10,5,'Mengetahui',0,0,'L');


$pdf->Ln(5);
$pdf->Cell(5);
$pdf->Cell(10,5,'Orang Tua Siswa,',0,0,'L');
$pdf->Cell(15);
$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(0,5,'',0,1,'L');



$pdf->Ln(22);
$pdf->Cell(140);
$pdf->Image('images/mat.png',150,205,18);
$pdf->Cell(10,5,$baris['nama_siswa'],0,0,'L');
$pdf->Ln(0);
$pdf->Cell(5);
$pdf->Cell(10,5,"..................",0,0,'L');
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->Cell(10,5,"No Hp.",0,0,'L');
$pdf->Cell(15);

$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(1,5,'',0,0,'L');
$pdf->Cell(5);
$pdf->Cell(0,5,'',0,1,'L');












ob_end_clean();
$pdf->Output();
ob_end_flush(); 

?>