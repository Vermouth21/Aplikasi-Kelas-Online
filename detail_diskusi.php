<?php
$id = $_GET['id'];
$koneksi = mysql_query("SELECT * FROM kelas_online JOIN tb_diskusi ON kelas_online.kelas_id = tb_diskusi.id JOIN modul ON modul.id = kelas_online.kelas_id WHERE kelas_id= $id");
while ($pecah = mysql_fetch_array($koneksi)) {
?>

    <div class="nvabar-inner">
        <div class="card">
            <ul class="nav nav-tabs">
                <li><a href="?p=detail_kelas&id=<?php echo $pecah['kelas_id']; ?>">Informasi Kelas</a></li>
                <li><a href="?p=detail_modul&id=<?php echo $pecah['id'] ?>">Materi</a></li>
                <li class="active"><a href="?p=detail_diskusi&id=<?php echo $pecah['id']; ?>">Konsultasi Materi</a></li>
            </ul>
        </div>
    </div>
<?php } ?>
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
$koneksi = mysql_query("SELECT * FROM tb_diskusi WHERE id='$id'");
while ($a = mysql_fetch_array($koneksi)) {
?>

    <div class="row">
        <div>
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
                    <div class="row">
                        <div class="form-group col-md-10">
                            <input class="form-control" type="text" name="cari" value="Cari Judul Diskusi">
                        </div>
                        <div class="form-group col-md-2">
                            <input class="btn btn-primary col-lg-12" type="submit" value="Cari">
                        </div>
                    </div>
                    <br>
                    <?php
                    // $id = $_GET['id'];
                    $a = mysql_query("SELECT * FROM tb_diskusi");
                    while ($sql = mysql_fetch_array($a)) {
                    ?>
                        <div class="box" style="height: auto">
                            <h3><a class="text-danger" href=""><?php echo $sql['judul'] ?></a></h3>
                            <p>
                                <?php echo substr($sql['keterangan'], 0, 200); ?>...
                                <br><br>

                                <i class="fa fa-user">&nbsp;Aby</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-book">&nbsp;Modul 7</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-clock-o">&nbsp;10 Bulan Yang Lalu</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-comments">&nbsp;0 Pembahasan</i>
                            </p>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
<?php } ?>