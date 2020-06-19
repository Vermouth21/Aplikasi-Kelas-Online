<?php
$id = $_GET['id'];
$data_informasi = mysql_fetch_assoc(mysql_query("SELECT * FROM kelas_online WHERE kelas_id='$id'"));
$data_materi = mysql_fetch_assoc(mysql_query("SELECT * FROM modul WHERE id='$id'"));
$data_diskusi = mysql_fetch_assoc(mysql_query("SELECT tb_diskusi WHERE id='$id'"));
?>

<div class="nvabar-inner">
    <div class="card">
        <ul class="nav nav-tabs">
            <li><a href="#">Informasi Kelas</a></li>
            <li class="#"><a href="?p=detail_modul&id=<?php echo $data_materi['id'] ?>">Materi</a></li>
            <li><a href="#">Konsultasi Materi</a></li>
        </ul>
    </div>
</div>
<br>
<!-- <div class="row">
        <div class="content">
            <article class="card">
                <div class="panel">
                    <div class="panel-body">
                        <div class="box bg-danger" style="height: 110px">
                            <div class="col-md-12 bg-danger">
                                <h4>
                                    <p style="height: 50px">Fitur diskusi ini adalah layanan premium untuk siswa yang sudah terdaftar penuh.</p>
                                    <p>Anda dapat berdiskusi langsung dengan Ahli dan Pelajar lainnya.</p>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-top: -30px">
                        <div class="col-md-12">
                            <h4>
                                <p>Bila Anda memiliki pertanyaan terkait proses belajar Anda di Kelas Memulai Pemrograman Dengan C, Anda dapat menghubungi tim kami melalui saluran berikut ini.</p>
                                <br>
                                <ul>
                                    <li>Halaman Bantuan</li>
                                    <li>Email info@dicoding.com</li>
                                    <li>Whatsapp: +6282-1272-77-101</li>
                                </ul>
                                <br>

                                <p>Bantuan pada saluran non-premium ini akan dibalas dalam waktu kurang dari 3x24 jam.</p>

                            </h4>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div> -->

<?php
$id = $_GET['id'];
$koneksi = mysql_query("SELECT * FROM modul WHERE id='$id'");
while ($a = mysql_fetch_array($koneksi)) {
?>
    <div class="row">
        <div class="col-md-3">
            <aside>
                <div class="panel">
                    <div class="panel-body bg-primary">
                        <h2>Diskusi Kelas</h2><br>
                        <h4>
                            <p>
                                Fitur diskusi ini bertujuan untuk mempermudah siswa dalam memahami materi, kamu dapat bertanya dan menjawab materi tentang kelas ini.
                            </p>
                        </h4><br>
                        <div class="text-center">
                            <a class="btn btn-danger" href="?p=tambah_diskusi">Buat Diskusi Baru</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <div class="col-md-8">
            <form action="index.php" method="get">
                <!-- <div class="row">
                    <div class="form-group col-md-10">
                        <input class="form-control" type="text" name="cari" value="Cari Judul Diskusi">
                    </div>
                    <div class="form-group col-md-2">
                        <input class="btn btn-primary col-lg-12" type="submit" value="Cari">
                    </div>
                </div> -->
                <br>
                <div class="box" style="height: auto">
                    <table class="table table-condensed table-bordered table-hover">
                        <thead>
                            <td>No</td>
                            <td>Judul Materi</td>
                            <td>Nama Modul</td>
                            <td>Aksi</td>
                        </thead>
                        <?php
                        $no = 1;
                        $a = mysql_query("SELECT * FROM modul");
                        while ($sql = mysql_fetch_array($a)) {
                        ?>
                            <tbody>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $sql['judul_kelas']; ?></td>
                                <td><?php echo $sql['modul']; ?></td>
                                <td>
                                    <a href="images/<?php echo $sql['modul']; ?>">
                                        <i class="fas fa-cloud-download-alt text-success">Download</i>
                                    </a>
                                </td>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
<?php } ?>