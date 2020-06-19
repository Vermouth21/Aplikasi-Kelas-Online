<?php 
session_start();
include_once("lib/koneksi.php");

    $nis = $_POST['nama'];
$data = mysql_query("SELECT siswa.nis, siswa.nama_siswa,kelas.nama_kelas, sum(bobot) as jumlah from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas");
$baris= mysql_fetch_array($data);



if($baris['jumlah'] <=50){
  $per='Peringatan 1';
}
if($baris['jumlah'] >=50 && $baris['jumlah'] <=100 ){
  $per='Peringatan 2';
}
if($baris['jumlah'] >=100){
  $per='Peringatan 3';
}


?>
<style type="text/css">
<!--
.style1 {
	font-size: 22px;
	font-weight: bold;
}
-->
</style>
<body onLoad="window.print()">
<p align="center"><span class="style1">SMK Negeri 2 Kerinci
</span><br></p><hr>
                    <table class="table table-condensed table-bordered table-hover"  width="80%" align="center">
                    <thead>
                      <td align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>No</h5></font>
                      </td>
            
                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>ID Aset</h5></font>
                      </td>
            
                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Nama</h5></font>
                      </td>
                        
                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Tanggal Perolehan</h5></font>
                      </td>

                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Jumlah</h5></font>
                      </td>

                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Satuan</h5></font>
                      </td>

                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Tanggal Service</h5></font>
                      </td>
                       
                        
                    </thead>
                    <?php 
          $i = 1;
  
    $s = mysql_query("SELECT *
 from aset");
						while($data=mysql_fetch_array($s)){
                    ?>
                    <tbody>
					              <td  align="center"><?php echo $i ?></td>
                        <td align="center">Aset-<?php echo $data['id_aset'];?></td>
                        <td align="center"><?php echo $data['nama'];?></td>
                         <td align="center"><?php echo $data['tgl_perolehan'];?></td>
                          <td align="center"><?php echo $data['jumlah'];?></td>
                        <td align="center"><?php echo $data['satuan'];?></td>
                         <td  align="center"><?php echo $data['tgl_service'];?></td>
						 
                    	
                      
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                 <br><br>
                    <table width=100%>
  <tr>
    <td width="30%">
    </td>

    <td width="30%">

    </td>

    <td >
		<center>
        <table>
            <tr>
              <td>Padang,</td>
              <td> <?php echo date("d M Y"); ?></td></tr>
        </table>        
          Mengetahui,<br>
          <br><br><br>

          <b><u><?php echo $dat['nama'];?></u><br>
         
         </b>
        </center>
    </td>
  </tr>
</table> 
                    
              
                    
              