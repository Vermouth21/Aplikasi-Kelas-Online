<?php 
session_start();
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
  <table align="center" >
    <tr>

      <td><img width='60' src='images/logo.png'></td>
      <td align="center">Pemerintahan Provinsi Sumatera Barat <br> Dinas Pendidikan <br>
      KELOMPOK TEKNOLOGI DAN BISNIS MANAJEMEN<br>
      Jln. Tebing Tinggi, Siulak, Kabupaten Kerinci, Jambi 3716 </td>
      <td align="justify" ><img width='100%' src='images/sekolah.png'></td>


    </tr>

  </table>
</span></p><hr>
                    <table class="table table-condensed table-bordered table-hover" border="1" width="80%" align="center">
                    <thead>
                      <td align="center"><font face="Times New Roman, cursive" class=" text-center"><h5>No</h5></font>
                      </td>
            
                      <td  align="center"><font face="Times New Roman, cursive" class="text-center"><h5>Kode Pelanggaran</h5></font>
                      </td>
            
                      <td  align="center"><font face="Times New Roman, cursive" class="text-center"><h5>Jenis</h5></font>
                      </td>
                        
                     
                      <td  align="center"><font face="Times New Roman, cursive" class="text-center"><h5>Bobot</h5></font>
                      </td>
                       
                        
                    </thead>
                    <?php 
          $i = 1;
  $data = mysql_query("SELECT * from jenis_pelanggaran");

						while($baris= mysql_fetch_array($data)){
                    ?>
                    <tbody>
					              <td  align="center"><?php echo $i ?></td>
                        <td align="center">P-<?php echo $baris['kode_pelanggaran'];?></td>
                          <td align="center"><?php echo $baris['jenis'];?></td>
                       <td  align="center"><?php echo $baris['bobot'];?></td>
						 
                    	
                      
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                 <br><br>
                  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="63%" bgcolor="#FFFFFF">
<p align="center"><br/>
</td>
 <td width="37%" bgcolor="#FFFFFF"><div align="center">Kerinci, <?php $tgl = date('d M Y');
 echo " $tgl";?><br/>
Kepala Sekolah
<br/><br/>
<br/><br/>
(...............................)
<br/>
</div>
</td>
</tr></table> 
                    
              