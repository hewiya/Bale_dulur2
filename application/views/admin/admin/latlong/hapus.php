<?php

// // // // // // // // //
// belum di aplikasikan // // // //
// // // // // // // // //


include_once 'koneksi.php';
$id=$_GET['id'];
mysql_query("delete from peta_icon where nomor='$id'")or die (mysql_error());
header("location:index.php");
?>