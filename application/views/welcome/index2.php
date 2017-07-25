<?php   
	if(!$_SESSION['status']) {
    header("location:index");
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
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bs.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/table.css">
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.3.2.js"></script>
		
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style_i.css">
		<style>
			body{
				background:url(<?php echo base_url() ?>assets/images/depan.jpg)fixed;
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
		<div class="daftar"><a href="#myModal" role="button" data-toggle="modal"><div class="dudul"><img src="<?php echo base_url() ?>assets/images/templatemo_logo.png" width="200px"/></div></a></div>
	</div>
	<div id="adah">
		<a href="<?php echo base_url('index.php/login/profilpenyewa'); //link kalo nge-klik hello ?>"><div id="kotak1">&nbsp;&nbsp;&nbsp;Hello ,<?php echo $this->session->userdata("nama"); ?></div></a><br/>
		<a href="<?php echo base_url('index.php/login/indexpenyewa'); ?>"><div id="kotak">&nbsp;&nbsp;&nbsp;Mulai Cari Rumah</div></a><br/>
		<a href="<?php echo base_url('index.php/login/indexpemilik'); ?>"><div id="kotak">&nbsp;&nbsp;&nbsp;Menjadi Tuan Rumah</div></a><br/>
		<a href="<?php echo base_url('index.php/login/logout'); ?>" onClick='return logout()'><div id="kotak2">&nbsp;&nbsp;&nbsp;Sign Out</div></a><br/>

		<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/jquery.gridder.js"></script>
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