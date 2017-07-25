<!-- 										-->
<!-- 										-->
<!-- 			Harus nya di controler		-->
<!-- 										-->
<!-- 										-->

<?php
session_start();
include "../../lib/koneksi.php";
//$this->model->load(koneksi);
 
$x = $_GET['x'];
$y = $_GET['y'];
$nama_lokasi = $_GET['nama_lokasi'];//judul--nama_lokasi
$alamat = $_GET['alamat']; //alamat-- des
$jenis  = $_GET['jenis'];
$id=$_SESSION['id'];
//$id_lokasi=$_POST['id_lokasi'];
//$id_lokasi=mysql_fetch_array($data1['id_lokasi'])
 
$masuk = mysql_query("insert into lokasi(nama_lokasi,jenis,alamat,latitude,longitude,id)
values('$nama_lokasi','$jenis','$alamat','$x','$y','$id')")or die (mysql_error());
if($masuk){
	echo "<script>
			window.alert('Data berhasil disimpan !');
			window.location=(href='../index_rumah.php');
		</script>";
		}else{
			echo "<script>
				alert('Data masih kosong!');
			</script>";
}
?>

