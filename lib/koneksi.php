<?php
	$host="localhost";
	$user="root";
	$password="";
	$database="bale";
	$koneksi=mysql_connect($host,$user,$password);
	if($koneksi){
		$database=mysql_select_db("$database");
	}else{
		echo "koneksi gagal !";
	}
?>