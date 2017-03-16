<?php
	session_start();
	include "lib/koneksi.php";
	$aksi=isset($_GET['aksi'])?$_GET['aksi']:"";
	if($aksi=="login"){
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$query="select * from user where email='$email' and password='$password'";
			$hasil=mysql_query($query) or die (mysql_error());
			$jumlah=mysql_num_rows($hasil);
			$data=mysql_fetch_array($hasil);
			$data1=mysql_fetch_array($hasil);
			$data2=mysql_fetch_array($hasil);
			if ($jumlah>0)
			{
				$_SESSION['email']=$email;
				$_SESSION['password']=$password;
				$_SESSION['id']=$data['id'];
				$_SESSION['nama']=$data1['nama'];
				$_SESSION['nama_belakang']=$data2['nama_belakang'];
				?>
				<script>
					window.alert('Login Sukses !');
					window.location=(href='index2.php');
				</script>
				<?php		
			}
			else
			{
				?>
				<script>
					window.alert('Login Gagal !');
					window.location=(href='index.php');
				</script>
				<?php
			}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bale Dulur</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="dist/css/jquery.gridder.min.css" rel="stylesheet">
        <link href="css/demo.css" rel="stylesheet">


		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-aller.js"></script>
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/coin-slider.min.js"></script>

		<link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="js/js-image-slider.js" type="text/javascript"></script>-->
	
		<!--<link rel="stylesheet" href="css/reset.css">-->
		<link rel="stylesheet" href="css/bs.css">
		<link rel="stylesheet" href="css/table.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style_i.css">
		<style>
			body{
				background:url(images/depan.jpg)fixed;
				background-size:cover;
				font-family:Gill Sans MT;
			}
		</style>

</head>
	<div class="tumpang">
		<h1>Selamat Datang di Bale Dulur</h1>
		Nikmati kenyamanan berwisata dengan kemudahan reservasi rumah tinggal untuk keluarga anda.<br/><br/>
		Sewakan ruang ekstra Anda<br/>
		Baik Anda memiliki kabin di pegunungan maupun kamar ekstra, dapatkan uang tambahan dengan menerima tamu.<br/><br/>
		<center>Salam Hangat,</center>
		<div class="daftar"><a href="#myModal" role="button" data-toggle="modal"><div class="dudul"><img src="images/templatemo_logo.png" width="200px"/></div></a></div>
	</div>
	<div id="adah">
		<a href="penyewa/index.php"><div id="kotak">&nbsp;&nbsp;&nbsp;Mulai Cari Rumah</div></a><br/>
		<a href="pemilik/index.php"><div id="kotak">&nbsp;&nbsp;&nbsp;Menjadi Tuan Rumah</div></a><br/>
		<div class="login"><a href="#"><div id="kotak">&nbsp;&nbsp;&nbsp;Sign In</div></a></div>
		<div id="bg"></div>
				<div id="modal-kotak">
					<div id="atas">
					<form name="login" action="index.php?aksi=login" method="POST">
				<table width="281" height="90">
				<center><img src="images/templatemo_logo.png" alt="" width="300px"/><br/><br/><br/>Pengguna, silahkan 'Sign In' untuk melanjutkan<br/></center>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text" name="email" value="" required="required"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" value="" required="required"></td><br/>
					</tr>
					<tr>
					  <td></td>
					  <td></td>
				      <td><input type="submit" name="login" value="Login" class="btn"> <input type="submit" name="cancel" value="Cancel" class="btn"></td>
					</tr>
			  </table>
			</form>
					</div>
					<div id="bawah">
						<button id="tombol-tutup" class="tombol-tutup">CLOSE</button>
					</div>
				</div>	
			 
				<script type="text/javascript">
					$(document).ready(function(){
						$('.login').click(function(){
							$('#modal-kotak , #bg').fadeIn("slow");
							return false;
						});
						$('.tombol-tutup').click(function(){
							$('#modal-kotak , #bg').fadeOut("slow");
						});
					});
				</script>
				
		<div class="daftar"><a href="#"><div id="kotak">&nbsp;&nbsp;&nbsp;Sing Up</div></a></div><br>
		<div id="bg"></div>
				<div id="modal-kotakdaftar">
					<div id="atas">
					<form name="daftar" action="mail.php" method="POST">
				<table width="281" height="90">
					<center><img src="images/templatemo_logo.png" alt="" width="300px"/><br/><br/><br/>Pengguna, silahkan 'Sign Up' untuk melanjutkan<br/></center>
					<tr>
						<td>First Name</td>
						<td>:</td>
						<td><input type="text" name="f_name" value="" required="required"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td>:</td>
						<td><input type="text" name="l_name" value="" required="required"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text" name="email" value="" required="required"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" value="" required="required"></td><br/>
					</tr>
					<tr>
					  <td colspan="3"><center><input type="submit" name="simpan" value="Sign Up" class="btn"> <input type="submit" name="cancel" value="Cancel" class="btn"></center></td>
					</tr>
			  </table>
			</form>
			
			<?php
			//			$daftar=isset($_GET['daftar'])?$_GET['daftar']:"";
			//			if($daftar=="daftar"){
			//			$f_name=$_POST['f_name'];
			//			$l_name=$_POST['l_name'];
			//			$email=$_POST['email'];
			//		$password=md5($_POST['password']);
			//			$simpan="insert into user (nama, nama_belakang, email, password) values 
			//					('$f_name', '$l_name', '$email', '$password')";
			//			$hasil=mysql_query($simpan)or die(mysql_error());
						
			//			if($hasil){
			//			echo "<script>
			//						window.alert('Untuk melanjutkan silahkan Sign In !');
			//						window.location=(href='?hal=index');
			//					</script>";
			//				}else{
			//				echo "<script>
			//				alert('Data masih kosong!');
			//				</script>";
			//			}
			//		}
			  ?>
					</div>
					<div id="bawah">
						<button id="tombol-tutup2" class="tombol-tutup2">CLOSE</button>
					</div>
				</div>	
			 
				<script type="text/javascript">
					$(document).ready(function(){
						$('.daftar').click(function(){
							$('#modal-kotakdaftar , #bg').fadeIn("slow");
							return false;
						});
						$('.tombol-tutup2').click(function(){
							$('#modal-kotakdaftar , #bg').fadeOut("slow");
						});
					});
				</script>
	</div>
		
		
	</ul>
	
	<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="dist/js/jquery.gridder.js"></script>
        <script>
            jQuery(document).ready(function ($) {

                // Call Gridder
                $(".gridder").gridderExpander({
                    scrollOffset: 60,
                    scrollTo: "panel", // "panel" or "listitem"
                    animationSpeed: 400,
                    animationEasing: "easeInOutExpo",
                    onStart: function () {
                        console.log("Gridder Inititialized");
                    },
                    onExpanded: function (object) {
                        console.log("Gridder Expanded");
                        $(".carousel").carousel();
                    },
                    onChanged: function (object) {
                        console.log("Gridder Changed");
                    },
                    onClosed: function () {
                        console.log("Gridder Closed");
                    }
                });
            });
        </script>
	
	</body>
</html>