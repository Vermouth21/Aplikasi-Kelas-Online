<?php
$id = $_GET['id'];
$data_informasi = mysql_fetch_assoc(mysql_query("SELECT * FROM kelas_online WHERE kelas_id='$id'"));
$data_materi = mysql_fetch_assoc(mysql_query("SELECT * FROM modul WHERE id='$id'"));
$data_diskusi = mysql_fetch_assoc(mysql_query("SELECT tb_diskusi WHERE id='$id'"));
?>

<div class="nvabar-inner">
    <div class="card">
        <ul class="nav nav-tabs">
            <li class="active"><a href="?p=detail_kelas&id=<?php echo $data_informasi['kelas_id']; ?>">Informasi Kelas</a></li>

            <li><a href="?p=detail_modul&id=<?php echo $data_materi['id'] ?>">Materi</a></li>
            <li><a href="?p=detail_diskusi&id=<?php echo $data_diskusi['id']; ?>">Konsultasi Materi</a></li>
        </ul>
    </div>
</div>

<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Part 11 : Membuat Navigasi Tabs dan Pills Bootstrap</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#informasi">Informasi Kelas</a></li>
        <li><a data-toggle="tab" href="#modul">Materi</a></li>
        <li><a data-toggle="tab" href="#diskusi">Konsultasi Materi</a></li>
    </ul>
    <br>

    <div class="tab-content">
        <div class="row">
            <div id="informasi" class="tab-pane fade in active">
                <article class="card">
                    <div class="col-md-8">
                        <div class="thumbnail" style="box-shadow: 2px;">
                            <div class="container">
                                <h3>Webinar</h3>
                                <?php

                                ?>
                                <h2 class="text text-primary"><?php echo $data_informasi['judul']; ?></h2>
                                <div class="col-md-2">
                                    <h5>Kategori</h5>
                                    <span class="text text-primary"><?php echo $data_informasi['kategori'] ?></span>
                                </div>
                                <div class="col-md-2">
                                    <h5>Tingkatan</h5>
                                    <span class="text text-primary"><?php echo $data_informasi['tingkatan'] ?></span>
                                </div>
                            </div>
                            <hr>
                            <div class="container">
                                <strong>
                                    <h4 class="lead">Deskripsi Kelas</h4>
                                </strong>
                                <div class="col-md-8">
                                    <p class="text-justify text-capitalize">
                                        <?php echo $data_informasi['deskripsi']; ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </article>
                <div class="col-md-4" style="margin-top:10px">
                    <aside>
                        <?php
                        $id = $_GET['id'];
                        $nagari = mysql_query("SELECT * FROM kelas_online JOIN tb_pemateri ON kelas_online.mentor_id = tb_pemateri.id_pemateri where kelas_id=$id");
                        $sql = mysql_fetch_array($nagari); {
                        ?>
                            <div class="box" style="height: auto">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span>
                                            <img style="width: 100%; height: 200px;" class="img-fluid" src="images/<?php echo $sql['gambar']; ?>">
                                        </span>
                                    </div>

                                    <div class="panel-body">
                                        <h4 class="text-center" style="margin-top: -20px; margin-bottom: -10px">
                                            <strong> <?php echo $sql['judul']; ?> </strong><br>
                                            <strong>Rp.&nbsp;<span class="text-primary" align=left><?php echo $sql['biaya']; ?></span> </strong><br><br>
                                            <strong><a class="btn btn-danger lead" href="">Daftar Webinar </a></strong>
                                        </h4>
                                    </div>

                                    <div class="panel-body" style="margin-top: -20px; height: 70px">
                                        <div class="row text-center" style="height: 70px">
                                            <div class=" col-md-2">
                                                <img style="height: 50px; margin-left: 40px; " src="images/<?php echo $sql['foto']; ?>" class="img-circle" alt=" Mentor">
                                            </div>
                                            <div class="col-md-8">
                                                <p><b><?php echo $sql['nama']; ?></b><br><?php echo $sql['jabatan']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <!-- <div class="col-md-12"> -->
                                        <strong class="lead">Keterangan</strong>
                                        <div class="col-md-12">
                                            <h5>
                                                <?php
                                                $pecah = explode(',', $sql['keterangan']);
                                                $data3 = $pecah[0];
                                                $data4 = $pecah[1];
                                                $data5 = $pecah[2];
                                                ?>
                                                <?php echo $data3 ?><br>
                                                <?php echo $data4 ?><br>
                                                <?php echo $data5 ?><br>
                                            </h5>

                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </aside>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="modul" class="tab-pane fade">
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
        </div>

        <div class="row">
            <div id="diskusi" class="tab-pane fade">
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
    </div>
</div>