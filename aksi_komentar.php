<?php
include "lib/koneksi.php";
$id_diskusi = $_POST['id_diskusi'];
$kelas_id   = $_POST['kelas_id'];
$nama       = $_POST['nama'];
$email      = $_POST['email'];
$diskusi    = $_POST['diskusi'];
$date       = date('Y-m-d');



$sql = mysql_query("INSERT INTO `komentar`(id_diskusi, kelas_id, nama, email, diskusi, date) 
VALUES
('$id_diskusi','$kelas_id','$nama','$email','$diskusi','$date')");

if ($sql) {
    echo "
<script language=javascript>
var id = " . $id_diskusi . "
    alert('Komentar Berhasil Ditambahkan');
    window.location.href='index.php?p=komentar&id='+ id;
</script>
";
} else {
    echo "
        <script language=javascript>
        var id = " . $id_diskusi . "
            alert('Komentar Gagal Ditambahkan');
            window.location.href='index.php?p=komentar&id='+ id;
        </script>
";
}

// if (isset($_POST['batal'])) {
//     echo "<script language=javascript>
//     window.location = 'index.php?p=detail_kelas';
// </script>";
//     exit;
// }
