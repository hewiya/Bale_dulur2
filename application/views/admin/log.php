<?php

//
//	OLD session
//
session_start();
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("bale");//sesuaikan dengan nama database anda

$username_admin = $_POST['username_admin'];
$password_admin = md5($_POST['password_admin']);
$op = $_GET['op'];

if($op=="in"){
$cek = mysql_query("SELECT * FROM admin WHERE username_admin='$username_admin' AND password_admin='$password_admin'");
if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
$c = mysql_fetch_array($cek);
$_SESSION['username_admin'] = $c['username_admin'];
$_SESSION['password_admin'] = $c['password_admin'];
if($c['username_admin']==$_SESSION['username_admin']){
header("location:admin/index.php");
}
}else{
die("Data belum Lengkap <a href=\"javascript:history.back()\">kembali</a>");
}
}else if($op=="out"){
unset($_SESSION['username']);
unset($_SESSION['username_admin']);
header("location:../index.php");
}
?>