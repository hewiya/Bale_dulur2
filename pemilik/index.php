<?php
	//session_start();
	//include "../lib/koneksi.php";
	//if(!isset($_SESSION['email'])){
		//header('location:../index.php');
	//}else{
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
	
<!DOCTYPE html>
    <html>
        <head>
            <title>Sewakan Rumah Tinggal</title>
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/bs.css">
			<link rel="stylesheet" href="css/style.css">
			<script src="js/bootstrap.js"></script>
			<script src="js/jquery.js"></script>
			<script>
				function logout() {
					if (confirm ("Apakah anda yakin akan logout ?")){
					return true;
					}else{
					return false;
					}
				}
				function hapus() {
					if (confirm ("Apakah anda yakin akan menghapus data ini ?")){
					return true;
					}else{
					return false;
					}
				}
				function update() {
					if (confirm ("Apakah anda yakin akan mengubah data ini?")){
					return true;
					}else{
					return false;
					}
				}
			</script>
			<style>
			.datepicker{z-index:1151;}
			</style>
			<script>
			$(function(){
				$("#tanggal").datepicker({
				format:'yyyy/dd/mm'
				});
					});
			</script>
		</head>
        <body>
			<a href="../logout.php" onClick='return logout()'><div class="pojok">Sign Out</div></a>
			<a href="../index2.php"<div class="pojok1">Kembali</div></a>
			<a href="?hal=daftar_rumah&id=<?=$_SESSION['id']?>"><div class="pojok2">Lihat Daftar</div></a>
			<div class="coklat">
			<?php
				$hal=isset($_GET['hal'])?$_GET['hal']:"";
				if($hal){
					require_once ($hal.".php");
				}else{
					require_once ("welomelokasi.php");
				}
			?>
			</div>
			
            
            <!--javascript here-->
            <script src="js/bootstrap-modal.js"></script>
            <script src="js/bootstrap-transition.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
        </body>
    </html>
<?php
//	}
?>