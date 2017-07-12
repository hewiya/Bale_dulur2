<?php
	session_start();
	include('../lib/koneksi.php');
	if(!isset($_SESSION['email'])){
		echo "<script>alert('Anda belum login, silahkan Sign In untuk melanjutkan');</script>";
		echo "<script>location.href='../index.php'</script>";
		die("Anda belum login");
	}
	if(!isset($_SESSION['password'])){
		die("Anda belum terdaftar, silahkan Sign In untuk melanjutkan");
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

        <link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
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
		<script src="js/js-image-slider.js" type="text/javascript"></script>
		
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style_i.css">
	
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bs.css">
		<link rel="stylesheet" href="css/table.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>

		<script>
		function logout() {
			if (confirm ("Apakah anda yakin akan logout ?")){
			return true;
			}else{
			return false;
			}
		}
	</script>
</head>
	<div class="atas">
		<center><img src="../images/templatemo_logo.png" width="400px"/></center>
		<a href="../logout.php" onClick='return logout()'><div class="pojok1">Sign Out</div></a>
		<a href="../index2.php"<div class="pojok">Kembali</div></a>
	</div>
	<div class="tengah">
			<?php
			$hal2=isset($_GET['hal2'])?$_GET['hal2']:"";
			if($hal2){
				require_once ($hal2.".php");
			}else{
				require_once ("guesthouse.php");
			}
		?>
	</div>	
	
		
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