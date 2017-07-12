<?php
   include("koneksi.php");
   $id=$_POST['nomor'];
   $nama=$_POST['nama'];
   $jenis=$_POST['jenis'];
   $deskripsi=$_POST['deskripsi'];
   $lat=$_POST['lat'];
   $lng=$_POST['lng'];
    
   $query = "update peta_icon set nama='$nama', jenis='$jenis', deskripsi='$deskripsi', lat='$lat', lng='$lng' where nomor='$id'";
   $hasil = mysql_query($query);
   if ($hasil){
   echo '<script language="javascript">alert("Data berhasil di update")</script>';
   echo '<script language="javascript">window.location = "index.php"</script>'; 
   }
   ?>