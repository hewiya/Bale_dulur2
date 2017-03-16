<?php
include "configg.php";
 
$x = $_GET['x'];
$y = $_GET['y'];
$nama_lokasi = $_GET['nama_lokasi'];//judul--nama_lokasi
$alamat = $_GET['alamat']; //alamat-- des
$jenis  = $_GET['jenis'];
 
$masuk = mysql_query("insert into lokasi(nama_lokasi,jenis,alamat,latitude,longitude)
values('$nama_lokasi','$jenis','$alamat','$x','$y')")or die (mysql_error());
if($masuk){
    echo "Data berhasil disimpan";
}else{
    echo "Data gagal disimpan";
}
?>