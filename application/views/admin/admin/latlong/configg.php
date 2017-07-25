<?php

// // // // // // // // // // // //
// pake mysqli di model harunysa // // // //
// // // // // // // // // // // //

	$host="localhost";
	$user="root";
	$password="";
	$db="bale";
	$koneksi=mysql_connect($host,$user,$password);
	if(!$koneksi){
		echo"koneksi gagal";
	}
	mysql_select_db($db,$koneksi)or die("database tidak ditemukan");
?>