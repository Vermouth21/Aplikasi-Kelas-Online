<?php
$id = $_GET['id'];
$tampil_komentar = mysql_query("SELECT * FROM tb_diskusi WHERE id = $id");
$count = mysql_num_rows(mysql_query("SELECT * FROM komentar where id_diskusi='$id'"));
while ($data = mysql_fetch_array($tampil_komentar)) {
?>

    <div class="panel">
        <div class="panel-body">
            <h2>Diskusi Kelas</h2>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <h2><a href=""></a><?php echo $data['judul'] ?></h2>
                    <i class="fa fa-user">&nbsp;<?php echo $data['username'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-book">&nbsp;<?php echo $data['modul_id'] ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-clock-o">&nbsp;10 Bulan Yang Lalu</i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <br>
                    <div align=center>
                        <img src="images/<?php echo $data['gambar'] ?>" alt="" class="img-responsive">
                    </div>
                    <br>
                    <p align=justify><?php echo $data['keterangan'] ?></p>
                </div>
                <div class="col-md-3">
                    <h2>Diskusi</h2>
                    <i class="fa fa-comments">&nbsp;<?php echo $count ?> Pembahasan</i>
                    <br>
                    <br>
                    <div>
                        <a class="btn btn-primary col-md-12" onclick="myFunction()">Reply</a><br>
                        <br>
                        <a class="btn btn-primary col-md-12" onclick="goBack()">Kembali</a>
                    </div>
                </div>

            </div>
        </div>

        <div class=" panel-body">
            <hr>
            <h4><i class="fa fa-comments"></i> Komentar</h4>
            <hr>
            <h3>Berikan Komentar</h3>
            <hr>
            <form action="aksi_komentar.php" method="POST">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_diskusi" value="<?php echo $id ?>">
                                <input type="hidden" class="form-control" name="kelas_id" value="<?php echo $data['kelas_id'] ?>">
                                <input type="text" id="fokus" class="form-control" name="nama" placeholder="Masukkan Nama Anda...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="5" name="diskusi" class="form-control" placeholder="Silahkan isikan komentar...."></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </form>
            <hr>
            <div class="col-md-9">
                <?php
                // $idKom = $_GET['komentar_id'];
                $komentar_baru = mysql_query("SELECT * FROM komentar WHERE id_diskusi = '$id' ");
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
                                <?php

                                $_
                                ?>

                                <div class="col-md-10">
                                    <div class="media-body">
                                        <div class="panel panel-default" style="width: 100%;">
                                            <div class="panel-body">
                                                <h4 class="media-heading"><?php echo $baru['nama'] ?>&nbsp;<small><?php echo $baru['email'] ?></small></h4>
                                                <p><?php echo $baru['diskusi'] ?></p>
                                                <div class="text-right">
                                                    <button class="btn btn-primary" onclick="toggleElement('<?php echo $baru['komentar_id']; ?>')">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="elemen-<?php echo $baru['komentar_id']; ?>" style="display: none;">
                                        <form action="aksi_balaskomentar.php" method="POST">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="komentar_id" value="<?php echo $baru['komentar_id'] ?>">
                                                            <input type="hidden" class="form-control" name="kelas_id" value="<?php echo $data['kelas_id'] ?>">
                                                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea id="" cols="30" rows="5" name="sub_komentar" class="form-control" placeholder="Silahkan isikan komentar...."></textarea>
                                                </div>
                                                <input type="hidden" name="id_diskusi" value="<?php echo $id ?>">
                                                <button class="btn btn-primary" type="submit">Reply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <?php
                    $sub_komentar = mysql_query("SELECT * FROM sub_komentar WHERE komentar_id = '$baru[komentar_id]' ORDER BY komentar_id");
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
                                                <h4 class="media-heading"><?php echo $sub['nama'] ?>&nbsp;<small><?php echo $sub['email'] ?></small></h4>
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

    </div>
<?php } ?>
<script>
    function myFunction() {
        document.getElementById("fokus").focus();
        document.getElementById("fokus").scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });


    }
</script>
<script>
    function toggleElement(id) {
        // alert('test');
        var x = document.getElementById("elemen-" + id);
        if (x.style.display === "block") {
            // alert('true')
            x.style.display = "none";
        } else {
            // alert('false');
            x.style.display = "block";
        }
    }
</script>