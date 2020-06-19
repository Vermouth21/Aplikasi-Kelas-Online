<?php
session_start();
include_once("lib/koneksi.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>SMK Negeri 2 Kerinci</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="themea/twitter.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="dist/sweetalert.min.js"></script>
    <style type="text/css">
        .style2 {
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
        }

        .style7 {
            font-size: 16px;
            font-family: "Trebuchet MS";
        }
    </style>
</head>

<body>
    <p align="center">
        <img src="images/smkn2kerinci.jpg" alt="" width="90%"></p>

    <div class="navbar" id="menu">
        <?php include_once("menu1.php"); ?>
    </div>
    <div class="page">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
                    </marquee>
                </div>
                <div>
                    <div class="modal-header">
                        <h3>List Kelas Online</h3>
                    </div>
                    <div style="margin-top:10px" class="text-right">
                        <a href="tambah_online.php"><input name="tambah" type="submit" id="dataTable" value="Tambah Kelas" class="btn btn-primary"></a>
                    </div>
                    <div style="margin-top:15px" class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <td width="2%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>No</h5>
                                    </font>
                                </td>
                                <td width="3%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Kategori</h5>
                                    </font>
                                </td>
                                <td width="10%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Nama Kelas</h5>
                                    </font>
                                </td>
                                <td width="8%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Jenis Kelas</h5>
                                    </font>
                                </td>
                                <td width="8%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Gambar</h5>
                                    </font>
                                </td>
                                <td width="5%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Tingkatan</h5>
                                    </font>
                                </td>
                                <td width="10%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Deskripsi</h5>
                                    </font>
                                </td>
                                <td width="8%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Fasilitas</h5>
                                    </font>
                                </td>
                                <td width="5%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Nama Mentor</h5>
                                    </font>
                                </td>
                                <td width="10%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Keterangan</h5>
                                    </font>
                                </td>
                                <td width="5%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Harga</h5>
                                    </font>
                                </td>

                                <td width="12%">
                                    <font face="Comic Sans MS, cursive" class="text-error text-center">
                                        <h5>Aksi</h5>
                                    </font>
                                </td>
                            </thead>

                            <?php
                            $no = 1;
                            $s = mysql_query("SELECT * FROM kelas_online");
                            while ($data = mysql_fetch_array($s)) {
                            ?>
                                <tbody align="center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['kategori_id']; ?></td>
                                    <td><?php echo substr($data['judul'], 0, 20); ?>...</td>
                                    <td><?php echo $data['kategori']; ?></td>
                                    <td>
                                        <center>
                                            <img width="75px" src="images/<?php echo $data['gambar'] ?>" alt="Tidak Ada Gambar">
                                        </center>
                                    </td>
                                    <td><?php echo $data['tingkatan']; ?></td>
                                    <td><?php echo substr($data['deskripsi'], 0, 20); ?>...</td>
                                    <td><?php echo $data['fasilitas']; ?></td>
                                    <td><?php echo $data['mentor_id']; ?></td>
                                    <td><?php echo substr($data['keterangan'], 0, 20); ?>...</td>
                                    <td><?php echo $data['biaya']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="edit_online.php?id=<?php echo $data['kelas_id']; ?>">
                                            Edit</a>
                                        <a class="btn btn-danger" href="hapus_online.php?id=<?php echo $data['kelas_id']; ?>">
                                            Delete</a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <!-- <div class="sidebar-module">
                    <?php

                    include "sidebar.php";
                    ?>
                </div> -->
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <h6>&copy; Copyright <?php echo date('Y');  ?> All Right Reserved . All Right Reserved. <strong>SMK Negeri 2 Kerinci</strong></h6>
    </div>
    <?php
    include_once("modal-login.php");
    ?>
</body>

</html>