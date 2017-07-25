<?php 

// // // // // // // // //
// sudah di controler   //
// // // // // // // // //

session_start();
include "admin/config.php";
$username_admin = $_POST['username_admin'];
$password_admin= $_POST['password_admin'];
// query untuk mendapatkan record dari username
$query = "SELECT * FROM admin 
		  WHERE username_admin = '$username_admin'";
		  // query untuk menmpilkan isi tabel daftar dimana username_admin(database)=username_admin(dari inputan)
$hasil = mysql_query($query);//eksekusi $query
$data = mysql_fetch_array($hasil);//memecah tiap field
 
// mengecek kesesuaian password_adminword
if ($password_admin == $data['password_admin'])//di enkripsi agar di db password_adminword tdk terlihat
{
    // menyimpan username ke dalam session
    $_SESSION['username_admin'] = $data['username_admin'];
	
	
	// tampilkan menu
	include "admin/index.html";
 
}
else echo/*jika login gagal akan kembali ke login.htm*/
 "<br>
           Login gagal, silahkan login kembali.<br><br>
           <a href=index.html>Klik untuk login</a>";//link ke hal login.html
 
?>
