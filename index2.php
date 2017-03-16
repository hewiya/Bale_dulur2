<?php
	session_start();
	include "lib/koneksi.php";
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
		
		<script>
		function logout() {
			if (confirm ("Apakah anda yakin akan logout ?")){
			return true;
			}else{
			return false;
			}
		}
		function hapus() {
			if (confirm ("Apakah anda yakin akan logout ?")){
			return true;
			}else{
			return false;
			}
		}
		</script>

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
		<a href="penyewa/index.php"><div id="kotak1">&nbsp;&nbsp;&nbsp;Hello 
			<?php 
				$q=mysql_query("select * from user where  id='".$_SESSION['id']."'");
				while($t=mysql_fetch_array($q)){
					echo $t['nama'],$t['nama_belakang'];
				}
			?>
			</div></a><br/>
		<a href="penyewa/index.php"><div id="kotak">&nbsp;&nbsp;&nbsp;Mulai Cari Rumah</div></a><br/>
		<a href="pemilik/index.php"><div id="kotak">&nbsp;&nbsp;&nbsp;Menjadi Tuan Rumah</div></a><br/>
		<a href="logout.php" onClick='return logout()'><div id="kotak2">&nbsp;&nbsp;&nbsp;Sign Out</div></a><br/>

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