<?php
include "../configg.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM lokasi ORDER BY id_lokasi DESC LIMIT 1";
}else{
    $query = "SELECT * FROM lokasi";
}
$data = mysql_query($query);
 
$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id":"'.$x['id_lokasi'].'",
        "judul":"'.htmlspecialchars($x['nama_lokasi']).'",
        "alamat":"'.htmlspecialchars($x['alamat']).'",
        "x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'",
        "jenis":"'.$x['jenis'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';
 
$json .= '}}';
echo $json;
 
?>