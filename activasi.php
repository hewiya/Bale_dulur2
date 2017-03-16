<?php
	include_once("lib/koneksi.php");
	$token = isset($_GET['token']) ? $_GET['token'] : "";
	
	$act = mysql_query("update user set confirm='yes' where token='$token'") or die(mysql_error());
	echo "<script>alert('Berhasil dikonfirmasi')</script> <script>location.href='index.php'</script>";
?>