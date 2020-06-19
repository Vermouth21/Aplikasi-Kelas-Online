
<?php

include_once("lib/koneksi.php");
	$i = 1;

	$nis=$_POST['nama'];
	
		$s1 = mysql_query("SELECT * from pelanggaran_siswa,siswa,jenis_pelanggaran,kelas where pelanggaran_siswa.nis=siswa.nis and pelanggaran_siswa.kode_pelanggaran=jenis_pelanggaran.kode_pelanggaran and pelanggaran_siswa.nis='$nis' and siswa.kode_kelas=kelas.kode_kelas");
		
		$data1=mysql_fetch_array($s1);
	
?>

<body onLoad="window.print()">
<table align="center" >
    <tr>

      <td><img width='60' src='images/logo.png'></td>
      <td align="center">Pemerintahan Provinsi Sumatera Barat <br> Dinas Pendidikan <br>
      KELOMPOK TEKNOLOGI DAN BISNIS MANAJEMEN<br>
      Jln. Tebing Tinggi, Siulak, Kabupaten Kerinci, Jambi 37161 </td>
      <td align="justify" ><img width='100%' src='images/sekolah.png'></td>


    </tr>

  </table></span></p><hr>
			
				<table  class='table table-hover' align="center" width="80%">
				<tr><td width="13%">NIS</td>
                        <td width="87%">: <?php echo $data1['nis'];?></td>
				</tr>
                     <tr><td>Nama Siswa</td>   <td>: <?php echo $data1['nama_siswa'];?></td></tr>
                       <tr><td>Kelas</td> <td>: <?php echo $data1['nama_kelas'];?></td></tr>
				</table>
                    <table class="table table-condensed table-bordered table-hover" border="1" align="center" width="80%">
                 
                   	  <td width="2%"><font face="Comic Sans MS, cursive" class="text-error text-center">
                    	<h5 align="center">No</h5></font></td>
                       

                          <td width="20%" align="center">                             Jenis Pelanggaran</td>
						  


                           <td width="20%" align="center">                             Tanggal Pelanggaran</td>

                            <td width="20%" align="center">                             Bobot</td>
						  
				      
                    </thead>
                      <div align="center"></div>
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
                    
			