<?php
include "lib/koneksi.php";
$id_diskusi     = $_POST['id_diskusi'];
$komentar_id    = $_POST['komentar_id'];
$kelas_id       = $_POST['kelas_id'];
$nama           = $_POST['nama'];
$email          = $_POST['email'];
$sub_komentar   = $_POST['sub_komentar'];
$date           = date('Y-m-d');





$sql = mysql_query("INSERT INTO `sub_komentar`(komentar_id, kelas_id, nama, email, sub_komentar, date) 
VALUES
('$komentar_id','$kelas_id','$nama','$email','$sub_komentar','$date')");

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
