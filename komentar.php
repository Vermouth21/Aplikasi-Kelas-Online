<?php
$id = $_GET['id'];
$tampil_komentar = mysql_query("SELECT * FROM tb_diskusi WHERE id = $id");
while ($data = mysql_fetch_array($tampil_komentar)) {
?>

    <div class="panel">
        <div class="panel-body">
            <h2>Diskusi Kelas</h2>
            <hr>
            <div class="col-md-9">
                <h2><a href=""></a><?php echo $data['judul'] ?></h2>
                <i class="fa fa-user">&nbsp;<?php echo $data['username'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-book">&nbsp;<?php echo $data['modul_id'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-clock-o">&nbsp;10 Bulan Yang Lalu</i>&nbsp;&nbsp;&nbsp;&nbsp;
                <br>
                <br>
                <img src="images/<?php echo $data['gambar'] ?>" alt="" class="img-responsive">
                <h4><?php echo $data['keterangan'] ?></h4>
            </div>
            <div class="col-md-3">
                <h2>Diskusi</h2>
                <i class="fa fa-comments">&nbsp;0 Pembahasan</i>
                <br>
                <br>
                <div>
                    <a class="btn btn-primary col-md-12">Reply</a><br>
                    <br>
                    <a class="btn btn-primary col-md-12" onclick="goBack()">Kembali</a>
                </div>
            </div>
        </div>

        <div class=" panel-body">
            <hr>
            <h4><i class="fa fa-comments"></i> Komentar</h4>
            <hr>
            <div class="col-md-9">
                <?php
                $idk = $_GET['id'];
                $komentar_baru = mysql_query("SELECT * FROM komentar WHERE komentar_id = '$idk'");
                while ($baru = mysql_fetch_array($komentar_baru)) {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="media">
                                <div class="col-md-2">
                                    <div class=" media" align=center>
                                        <img src="img/img.png" alt="">
                                        <div>
                                            <small><?php echo $baru['date'] ?></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="media-body">
                                        <div class="panel panel-default" style="width: 100%;">
                                            <div class="panel-body">
                                                <h4 class="media-heading"><?php echo $baru['nama'] ?>&nbsp;<small><?php echo $baru['email'] ?></small></h4>
                                                <p><?php echo $baru['diskusi'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $idKom = $baru['komentar_id'];
                    $sub_komentar = mysql_query("SELECT * FROM sub_komentar WHERE komentar_id = '$idKom' ORDER BY komentar_id");
                    while ($sub = mysql_fetch_array($sub_komentar)) {
                    ?>
                        <div class="row">
                            <div style="margin-left: 50px" class="media">
                                <div class="col-md-2" align=center>
                                    <div class="media">
                                        <img src="img/img.png" alt="">
                                        <div>
                                            <small><?php echo $sub['date'] ?></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="media-body">
                                        <div class="panel panel-default" style="width:98%">
                                            <div class="panel-body">
                                                <h4 class="media-heading"><?php echo $sub['nama'] ?><small><?php echo $sub['email'] ?></small></h4>
                                                <p><?php echo $sub['sub_komentar'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>

        </div>

        <div class="container">
            <div>
                <h3>Berikan Komentar</h3>
                <hr>
                <form action="">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Anda...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Masukkan Email Anda...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Silahkan isikan komentar...."></textarea>
                        </div>
                        <button class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>