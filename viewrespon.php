<?php 
session_start();
include_once("lib/koneksi.php");
include_once "tglindo.php";
 
$per_page = 5; // Batas data per halaman

if (isset($_GET['page'])) {
 $page = $_GET['page'];
}else{
  $page = 1;
}

if($page <= 1) {
  $st = 0;
}else{
  $st = ($page - 1) * $per_page;
}

$prev = $page - 1;
$next = $page + 1;

$st = $st;
$nd = $per_page;

$limit = "limit $st,$nd"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>SMK Negeri 2 Kerinci</title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
         <link href="css/animate.min.css" rel="stylesheet">
          
         <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="themea/twitter.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="dist/sweetalert.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <style type="text/css">

<!--
.style2 {
    font-family: "Times New Roman", Times, serif;
    font-size: 16px;
}
.style7 {
    font-size: 16px;
    font-family: "Trebuchet MS";
}
-->

        
        
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        
        .pagination a:hover:not(.active) {
            background-color: #4CAF50;
            color: white;
        }
        </style>
    </head>
    <body>
        <p align="center">
    <img src="images/smkn2kerinci.jpg" alt="" width="90%"></p>
    
    <div class="navbar" id="menu">
            <?php include_once("menu.php");?>
        </div>
            <div class="page">
            <br>
            <div class="row">
            
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <marquee>Sistem Informasi Pelanggaran Tata Tertib Sekolah di SMK Negeri 2 Kerinci
                        </marquee>
                    </div>
                    <?php
                        $i = 1;
                        $s = mysql_query("SELECT a.*, b.*, c.* FROM pesan a join siswa b join  respon c on a.nis = b.nis and a.id_pesan  = c.id_pesan where a.nis = '$_SESSION[nis]' order by a.tgl_pesan DESC $limit");
                             $no=1;    
                            while($r=mysql_fetch_array($s)){   
                    ?>

                <div class="modal-header">
                    <h3>Riwayat Pesan</h3>
                </div>

                <div style="margin-top:10px" class="text-right">
                    
                </div>
                <div style="margin-top:10px">
                    <h4><?= $r["nama_siswa"];?></h4>
                        <p align="justify" style="font-size: 12px">
                            <?= TanggalIndo($r["tgl_pesan"]);?>
                        </p>
                        <table class="table table-condensed table-bordered table-hover">
                            <tr>
                                <td style="font-size: 14px; color: #000" width="20%">Isi Pesan </td>
                                <td width="1%"> : </td>
                                <td><b><?= $r["pesan"];?></b></td>
                            </tr>
                        </table>
                        
                        <p align="right">
                            <a class="tombol<?php echo $no; ?>" href="#"><i class="fa fa-caret-down"></i> Tampilkan Balasan</p></a>
                        <hr>

                        <div class="balasan<?php echo $no; ?>" style="display: none; color: #000; margin-bottom: 10px; text-align: right;">
                                                <?php 
                        if ($r["respon"] == '') {
                             ?>
                                                    Belum Ada Balasan.
                                                    <?php
                         }else{ ?>
                                                        <h4>Guru</h4>

                                                        <p style="font-size: 12px">
                                                            <?= TanggalIndo($r["tgl_respon"]);?>
                                                        </p>
                                                        <p>
                                                            <?= $r["respon"];?>
                                                        </p>
                                                        <?php } ?>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $(".tombol<?php echo $no; ?>").click(function(event) {
                                $(".balasan<?php echo $no; ?>").toggle("slow");
                                return false;
                            });
                            });
                        </script>
                        <?php $no++; } ?>

                    </div>

                
                    <?php 
                    $exec2 = mysql_query("SELECT * FROM pesan");
                    $hitung_data = mysql_num_rows($exec2);
                    $hitung_data = ceil($hitung_data/$per_page);
                    ?>

                <div id="cc" style="float: right;">
                    <div class="pagination">
                        <?php
                            if($prev < 1) {
                              echo "<a class='page'>&laquo; Sebelumnya</a>";
                            }else{
                              echo "<a href='pesan.php&page=$prev' class='page'>&laquo; Sebelumnya</a>";
                            }

                            for($i=1; $i<=$hitung_data; $i++) {
                              if($page == $i) {
                                echo " <a class='page'>" . $i . "</a> ";
                              }else{
                                echo " <a class='page' href='pesan.php&page=$i'>" . $i . "</a> ";
                              }
                            }

                            if($next > $hitung_data) {
                              echo "<a class='page'>Selanjutnya &raquo;</a>";
                            }else{
                              echo "<a class='page' href='pesan.php&page=$next'>Selanjutnya &raquo;</a>";
                            }
                            ?>
                   </div>
               </div><br><br><br>
            </div>
            
            <div class="col-md-4">
                <div class="sidebar-module">
                    <?php
                        include "sidebar.php";
                    ?>
                </div>
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
            