<?php 
@session_start();
include_once("lib/koneksi.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<title>SMK Negeri 2 Kerinci </title>
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

	$nis=$_SESSION['nis'];
	
		$s1 = mysql_query("SELECT * from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas");
		
		$data1=mysql_fetch_array($s1);
	
?>

			<div>
            	<div class="modal-header">
                	<h3>Data Pelanggaran</h3>
                </div>
            	<div style="margin-top:10px" class="text-right">
            		
                </div>
                <div style="margin-top:10px">
				<table  class='table table-hover'>
				<tr><td>NIS</td>
                        <td>: <?php echo $data1['nis'];?></td></tr>
                     <tr><td>Nama Siswa</td>   <td>: <?php echo $data1['nama_siswa'];?></td></tr>
                       <tr><td>Kelas</td> <td>: <?php echo $data1['nama_kelas'];?></td></tr>
				</table>
                    <table class="table table-condensed table-bordered table-hover">
                 
                   	  <td width="2%"><font face="Comic Sans MS, cursive" class="text-error text-center">
                    	<h5>No</h5></font></td>
                       

                           <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center">
                          <h5>Jenis Pelanggaran</h5></font></td>
						  


                           <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center">
                          <h5>Tanggal Pelanggaran</h5></font></td>

                            <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center">
                          <h5>Bobot</h5></font></td>
						  
				      
                    </thead>
                    <?php 
					$total=0;
					$s = mysql_query("SELECT * from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas");
						while($data=mysql_fetch_array($s)){
							$total=$total+$data['bobot'];
                    ?>
                    <tbody align="center">
                    	 <td><?php echo $i ?></td>
                         <td><?php echo $data['jenis'];?></td>
                           <td><?php echo $data['tgl_pelanggaran'];?></td>
                             <td><?php echo $data['bobot'];?></td>
                      
                    
                    </tbody>
					
                    <?php $i++; } ?>
					<tr>
					<td colspan="3" align="center">Total</td><td align="center"><?php echo $total;?></td>
					</tr>
                    </table>
                
                    
                    
                </div>
				</div>
                    
                    
                    
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
			<h6>&copy 2019 All Right Reserved . <strong>SMK Negeri 2 Kerinci</strong></h6>
		</div>
		<?php 
			include_once("modal-login.php");
		?>
	</body>
</html>
			