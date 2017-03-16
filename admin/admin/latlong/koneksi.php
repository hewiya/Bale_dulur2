<?php
$host="localhost";
$user="root";
$passwd="";
$db="peta_icon";
 
$koneksi=mysql_connect($host,$user,$passwd) or die (mysql_error());
mysql_select_db($db, $koneksi) or die (mysql_error());
 
?>