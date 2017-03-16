<?php

include ('configg.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>List Maps -</title>
  </head>
  <body>
    <a href="form_input_lokasi.php">Input Lokasi</a> | 
    <a href="tampil.php">Lihat Daftar Lokasi </a><br/><br/>
      <table border="1" >
        <tr>
          <td>No</td>
          
          <td>Nama</td>
		  <td>Alamat</td>
          <td>Peta</td>
        </tr>
        
          <?php
          $cari = mysql_query("select * from lokasi");
          
          while($dapat = mysql_fetch_array($cari)){
            echo "
              <tr>
               <td>$dapat[id_lokasi]</td>
               <td>$dapat[nama_lokasi]</td>
               <td>$dapat[alamat]</td>
              
               <td>
                 <a href='tampil_map.php?id_lokasi=$dapat[id_lokasi]'>Lihat Map</a>
               </td>
              </tr>
            ";
          }
      ?>
	  </table>
  </body>
</html>