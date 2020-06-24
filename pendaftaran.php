<li><a data-toggle="modal" data-target="#myModal">Register</a></li>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Masukkan data anda dengan benar !!!</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Nama :</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama anda..." name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="email" class="form-control" placeholder="Masukkan email anda..." name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input type="password" class="form-control" placeholder="Masukkan password anda..." name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No HP :</label>
                        <input type="number" class="form-control" placeholder="Masukkan nomor anda..." name="nohp">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat :</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat anda..." name="alamat">
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
        <?php
        if (isset($_POST['simpan'])) {
            $nama          = $_POST['nama'];
            $email         = $_POST['email'];
            $password      = $_POST['password'];
            $pass          = md5($password);
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $nohp          = $_POST['nohp'];
            $alamat        = $_POST['alamat'];

            $simpan = mysql_query("INSERT INTO `pendaftaran`(nama, email, password, jenis_kelamin, nohp, alamat, level) 
                                                            VALUES
                                                            ('$nama','$email','$pass','$jenis_kelamin','$nohp','$alamat','Member')");
            if ($simpan) {
                echo "<script>alert('Anda Telah Berhasil Mendaftar, Silahkan Login'); window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('Gagal mendaftar, Silahkan ulangi kembali'); window.location.href='index.php</script>";
            }
        }
        ?>
    </div>
</div>