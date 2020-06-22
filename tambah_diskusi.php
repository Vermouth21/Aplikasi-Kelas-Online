<?php
$id = $_GET['id'];
$data_informasi = mysql_fetch_assoc(mysql_query("SELECT * FROM kelas_online WHERE kelas_id='$id'"));
$data_materi = mysql_fetch_assoc(mysql_query("SELECT * FROM modul WHERE id='$id'"));
$data_diskusi = mysql_fetch_assoc(mysql_query("SELECT tb_diskusi WHERE id='$id'"));
?>



<div class="nvabar-inner">
    <div class="card">
        <ul class="nav nav-tabs">
            <li><a href="?p=detail_kelas&id=<?php echo $pecah['kelas_id']; ?>">Deskripsi Kelas</a></li>
            <li><a href="">Materi</a></li>
            <li class="active"><a href="?p=detail_diskusi&id=<?php echo $pecah['kelas_id']; ?>">Diskusi Materi</a></li>
        </ul>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <div class="control-group">
                            <label>Judul kelas</label>
                            <div class="controls">
                                <select class="form-control" name="kelas">
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $id = $_GET['id'];
                                    $c = mysql_query("SELECT * FROM kelas_online WHERE kelas_id='$id'");
                                    while ($d = mysql_fetch_assoc($c)) {
                                        echo '<option value="' . $d['kelas_id'] . '">' . $d['judul'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <div class="control-group">
                            <label>Modul</label>
                            <div class="controls">
                                <select class="form-control" name="modul">
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $id = $_GET['id'];
                                    $c = mysql_query("SELECT * FROM modul WHERE kelas_id='$id'");
                                    while ($d = mysql_fetch_assoc($c)) {
                                        echo '<option value="' . $d['id'] . '">' . $d['modul'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" placeholder="Upload Gambar">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="editor1" type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" name="simpan" value="simpan" id="simpan" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-primary" onclick="goBack()">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $username    = $_POST['username'];
            $kelas       = $_POST['kelas'];
            $modul       = $_POST['modul'];
            $judul       = $_POST['judul'];
            $nama_gambar = $_FILES['gambar']['name'];
            $lokasi      = $_FILES['gambar']['tmp_name'];
            $deskripsi   = $_POST['deskripsi'];
            $date        = date('Y-m-d');

            if (!empty($lokasi)) {
                move_uploaded_file($lokasi, "images/" . $nama_gambar);
            }

            $simpan = mysql_query("INSERT INTO `tb_diskusi`(username,
                                                            kelas_id, 
                                                            judul, 
                                                            modul_id, 
                                                            gambar,
                                                            keterangan,
                                                            date) 
                                                            VALUES
                                                            ('$username',
                                                            '$kelas',
                                                            '$judul',
                                                            '$modul',
                                                            '$nama_gambar',
                                                            '$deskripsi',
                                                            '$date'
                                                            )");

            if ($simpan) {
                echo "
            <script language=javascript>
            var id = " . $kelas . "
                alert('Data Tersimpan');
                window.location.href='index.php?p=detail_kelas&id='+ id;
            </script>
            ";
            } else {
                echo "
                    <script language=javascript>
                    var id = " . $kelas_id . "
                        alert('Data tidak Tersimpan');
                        window.location.href='index.php?p=detail_kelas&id='+ id;
                    </script>
        ";
            }
        }

        if (isset($_POST['batal'])) {
            echo "<script language=javascript>
                window.location = 'index.php?p=detail_kelas';
            </script>";
            exit;
        }
        ?>

    </div>
</div>