<?php 
@session_start();
include_once("lib/koneksi.php");




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
<table align="center">
    <tr>

      <td><img width='60' src='images/logo.png'></td>
      <td align="center">Pemerintahan Provinsi Sumatera Barat <br> Dinas Pendidikan <br>
      KELOMPOK TEKNOLOGI DAN BISNIS MANAJEMEN<br>
      Jln. Tebing Tinggi, Siulak, Kabupaten Kerinci, Jambi 3716 </td>
      <td align="justify" ><img width='100%' src='images/sekolah.png'></td>


    </tr>

  </table></span></p><hr>
                    <table class="table table-condensed table-bordered table-hover" border="1" width="80%" align="center">
                    <thead>
                      <td align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>No</h5></font>
                      </td>
            
                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Nis</h5></font>
                      </td>
            
                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Nama Siswa</h5></font>
                      </td>
                        
                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Kelas</h5></font>
                      </td>

                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Jenis Pelanggaran</h5></font>
                      </td>

                      <td  align="center"><font face="Times New Roman, cursive" class="text-error text-center"><h5>Tanggal Pelanggaran</h5></font>
                      </td>
                       
                        
                    </thead>
                    <?php 
          $i = 1;
          @session_start();
  $data = mysql_query("SELECT * from siswa,kelas,pelanggaran_siswa,jenis_pelanggaran where pelanggaran_siswa.nis=siswa.nis and siswa.kode_kelas=kelas.kode_kelas and kelas.wali_kelas='$_SESSION[nip]' and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran");

						while($baris= mysql_fetch_array($data)){
                    ?>
                    <tbody>
					              <td  align="center"><?php echo $i ?></td>
                        <td align="center"><?php echo $baris['nis'];?></td>
                        <td align="center"><?php echo $baris['nama_siswa'];?></td>
                         <td align="center"><?php echo $baris['nama_kelas'];?></td>
                          <td align="center"><?php echo $baris['jenis'];?></td>
                        <td align="center"><?php echo $baris['tgl_pelanggaran'];?></td>
                        
                    	
                      
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

          <b><u><?php echo $_SESSION['nama_guru'];?></u><br>
         
         </b>
        </center>
    </td>
  </tr>
</table> 
                    
              
                    
              