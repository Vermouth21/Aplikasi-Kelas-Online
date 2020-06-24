<?php
$id = $_GET['id'];
$data_informasi = mysql_fetch_assoc(mysql_query("SELECT * FROM kelas_online WHERE kelas_id='$id'"));
$data_materi = mysql_fetch_assoc(mysql_query("SELECT * FROM modul WHERE id='$id'"));
$data_diskusi = mysql_fetch_assoc(mysql_query("SELECT tb_diskusi WHERE id='$id'"));

$terdaftar = false;
$status = mysql_query("SELECT * FROM daftar_kelas");

if (isset($_POST['daftar'])) {

    $terdaftar = true;
    $pendaftaran = $_SESSION['pendaftaran_id'];
    $kelas_id =  $id['kelas_id'];

    $sql =  mysql_query("SELECT * FROM daftar_kelas WHERE pendaftaran_id = '$pendaftaran' AND kelas_id = '$kelas_id'");

    $query = mysql_num_rows($sql);

    if ($_SESSION['level'] != 'Member') {

        echo "<script>
                Swal.fire(
                    'Opss!',
                    'Silahkan daftar jadi member terlebih dahulu!',
                    'error'
                );
                </script>";
    } else {
        if ($query < 1) {
            $simpan = mysql_query("INSERT INTO `daftar_kelas`(pendaftaran_id, kelas_id, status) 
                                                VALUES
                                                ('$pendaftaran','$kelas_id','Tidak Aktif')");
            if ($simpan) {
                echo "<script>
                                Swal.fire(
                                    'Selamat!',
                                    'Anda Telah Berhasil Mendaftar Pada Kelas Ini!',
                                    'success'
                                );
                                
                                </script>";
            }
        } else {
            echo "<script>
                                Swal.fire(
                                    'Ops!',
                                    'Anda Sudah terdaftar Pada Kelas Ini!',
                                    'warning'
                                )
                                </script>";
        }
    }
}
?>

<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#kelas">Informasi Kelas</a></li>
        <li><a data-toggle="tab" href="#materi">Materi</a></li>
        <li><a data-toggle="tab" href="#diskusi">Forum Diskusi</a></li>
    </ul>
    <br>
    <div class="tab-content">
        <div id="kelas" class="tab-pane fade in active">
            <div class="row">
                <div class="col-md-8">
                    <article class="card">
                        <div class="thumbnail">
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
                                <div class="col-md-7">
                                    <p class="text-justify text-capitalize">
                                        <?php echo $data_informasi['deskripsi']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4" style="margin-top:10px">
                    <aside>
                        <?php
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
                                            <strong>Rp.&nbsp;<span class="text-primary" align=left><?php echo number_format($sql['biaya'], 0, ',', '.'); ?></span> </strong><br><br>
                                            <form action="" method="POST">
                                                <strong><button type="submit" name="daftar" class="btn btn-danger lead" href="">Daftar Webinar </button></strong>
                                            </form>
                                        </h4>
                                    </div>



                                    <div class="panel-body" style="margin-top: -20px; height: 70px">
                                        <div class="row text-center" style="height: 70px">
                                            <div class=" col-md-2">
                                                <img style="height: 50px; margin-left: 20px; " src="images/<?php echo $sql['foto']; ?>" class="img-circle" alt=" Mentor">
                                            </div>
                                            <div class="col-md-10">
                                                <p style="margin-right: 50px;"><b><?php echo $sql['nama']; ?></b><br><?php echo $sql['jabatan']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <strong class="lead" style="margin-left: 100px;">Keterangan</strong>
                                        <div class="col-md-12">
                                            <h5>
                                                <?php
                                                $pecah = explode(',', $sql['keterangan']);
                                                $data3 = $pecah[0];
                                                $data4 = $pecah[1];
                                                $data5 = $pecah[2];
                                                ?>
                                                <div class="container" style="margin-left: 50px;">
                                                    <i class="fa fa-calendar"> <?php echo $data3 ?></i> |
                                                    <i class="fa fa-book"> <?php echo $data4 ?></i> |
                                                    <i class="fa fa-video-camera"> <?php echo $data5 ?></i>
                                                </div>
                                            </h5>

                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                    </aside>
                </div>
            </div>
        <?php } ?>
        </div>

        <div id="materi" class="tab-pane fade">
            <?php
            $data = mysql_fetch_array(mysql_query("SELECT * FROM daftar_kelas WHERE pendaftaran_id='$_SESSION[pendaftaran_id]' AND kelas_id='$_GET[id]'"));
            if ($_SESSION['level'] == 'Member' && $data['status'] == 'Aktif' && $data['kelas_id'] == $id) {
            ?>
                <div class="col-md-3">
                    <aside>
                        <div class="panel">
                            <div class="panel-body bg-primary">
                                <h2>Materi</h2>
                                <h4>
                                    <p align=justify>
                                        Disini kami menyedikan modul dan video sebagai bahan pembelejaran, silahkan download sesuai dengan urutan yang ada ditabel dan selamat belajar dan menikmati kelas premium!
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-md-9">
                    <form action="index.php" method="get">
                        <div class="box" style="height: auto">
                            <table class="table table-condensed table-bordered table-hover">
                                <thead class="text-center">
                                    <td>No</td>
                                    <td>Judul Materi</td>
                                    <td>Download Modul</td>
                                    <td>Video</td>
                                </thead>
                                <?php
                                $no = 1;
                                $a = mysql_query("SELECT * FROM modul WHERE kelas_id='$id'");
                                while ($sql = mysql_fetch_array($a)) {
                                ?>
                                    <tbody>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td><?php echo $sql['judul_materi']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($sql['modul'] != NULL) { ?>
                                                <center>
                                                    <a href="images/<?php echo $sql['modul']; ?>">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </center>
                                            <?php } else { ?>
                                                <h3>-</h3>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($sql['link'] != NULL) { ?>
                                                <center>
                                                    <a href="<?php echo $sql['link']; ?>" target="_blank">
                                                        <i class="fa fa-video-camera"></i>
                                                    </a>
                                                </center>
                                            <?php } else { ?>
                                                <h3>-</h3>
                                            <?php } ?>
                                        </td>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </form>
                </div>
            <?php
            } else {
            ?>
                <div class="panel panel-default">
                    <div class="panel-body bg-danger">
                        <div class="container">
                            <p>
                                <h4>Anda belum terdaftar pada kelas ini.</h4>
                                <h4>Nikmati kelas premium setelah mengirim bukti transfer.</h4>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <p>
                        <h4>Jika sudah mendaftar, Silahkan kirimkan bukti transfer ke admin melalui kontak dibawah agar dapat mengaskes kelas premium ini.</h4>
                        <br>
                        <h4>
                            <ul>
                                <span>Kontak Admin</span>
                                <br>
                                <li>Email mediatamaweb@gmail.com</li>
                                <li href="https://api.whatsapp.com/send?phone=+6282170214495">Whatsapp</li>
                            </ul>
                        </h4>
                        <br>
                        <h4>Kelas akan dapat diakses dalam waktu 3x24 jam setalah mengirim bukti transfer</h4>

                    </p>
                </div>
            <?php
            } ?>
        </div>

        <div id="diskusi" class="tab-pane fade">
            <?php
            $dataran = mysql_fetch_array(mysql_query("SELECT * FROM daftar_kelas WHERE pendaftaran_id='$_SESSION[pendaftaran_id]' AND kelas_id='$_GET[id]'"));
            if ($_SESSION['level'] == 'Member' && $dataran['status'] == 'Aktif' && $dataran['kelas_id'] == $id) {
            ?>
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
                                    <a class="btn btn-danger" href="?p=tambah_diskusi&id=<?php echo $data_informasi['kelas_id']; ?>">Buat Diskusi Baru</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-md-9">
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
                        function limit_words($string, $word_Limit)
                        {
                            $words = explode(" ", $string);
                            return implode(" ", array_splice($words, 0, $word_Limit));
                        }
                        $id = $_GET['id'];
                        $a = mysql_query("SELECT * FROM tb_diskusi WHERE kelas_id='$id'");
                        while ($sql = mysql_fetch_array($a)) {
                        ?>
                            <div class="box" style="height: auto">
                                <h3><a class="text-danger" href="?p=komentar&id=<?php echo $sql['id'] ?>"><?php echo $sql['judul'] ?></a></h3>
                                <?php echo limit_words($sql['keterangan'], 5); ?>...
                                <div class="container">
                                    <i class="fa fa-user">&nbsp;<?php echo $sql['username'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-book">&nbsp;Modul <?php echo $sql['modul_id'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-clock-o">&nbsp;<?php echo $sql['date'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
                                    $count = mysql_num_rows(mysql_query("SELECT * FROM komentar where id_diskusi='$sql[id]' AND kelas_id='$id'"));
                                    ?>
                                    <i class="fa fa-comments">&nbsp;<?php echo $count ?> Pembahasan</i>
                                </div>

                            </div>
                        <?php } ?>
                    </form>
                </div>
            <?php
            } else { ?>
                <div class="panel panel-default">
                    <div class="panel-body bg-danger">
                        <div class="container">
                            <p>
                                <h4>Anda belum terdaftar pada kelas ini.</h4>
                                <h4>Nikmati kelas premium setelah mengirim bukti transfer.</h4>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <p>
                        <h4>Jika sudah mendaftar, Silahkan kirimkan bukti transfer ke admin melalui kontak dibawah agar dapat mengaskes kelas premium ini.</h4>
                        <br>

                        <h4>
                            <ul>
                                <span>Kontak Admin</span>
                                <br>
                                <li>Email mediatamaweb@gmail.com</li>
                                <li>Whatsapp: 0822-xxxx-xxxx</li>
                            </ul>
                        </h4>
                        <br>
                        <h4>Kelas akan dapat diakses dalam waktu 3x24 jam setalah mengirim bukti transfer</h4>

                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
if ($terdaftar) {
?>
    <script>
        $('a[href="#materi"]').tab('show');
    </script>
<?php
}
?>