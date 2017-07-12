<?php
	$host="localhost";
	$user="root";
	$password="";
	$querry;
	$database=$querry;
	$koneksi=mysqli_connect($host,$user,$password,'bale');
	if($koneksi){
		$querry=mysqli_select_db("$koneksi","$database");
	}else{
		echo "koneksi gagal !";
	}
?>