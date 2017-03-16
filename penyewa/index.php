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
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="2/bootstrap.css"/>
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
	
		
	    <style>
		.datepicker{z-index:1151;}
	    </style>
	    <script>
		$(function(){
		    $("#tanggal").datepicker({
			format:'yyyy-mm-dd'
		    });
			
                });
		$(function(){
			$("#tanggal1").datepicker({
			format:'yyyy-mm-dd'
		    });
		});
	    </script>
			<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
			<script src="assets/js/jquery-ui.js" type="text/javascript"></script>
			<style>
			  body {
				background: #f5f5f5;
				margin: 0;
				padding: 20px 0 0 0;
				text-align: center;
				font-size: 16px;
			  }
			  h1 {
				color: #222;
				font-size: 24px;
			  }
</style>
	
	
	
    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
					<?php
						$id_rumah = isset($_GET['id_rumah']) ? $_GET["id_rumah"] : "" ;
					?>
					<form action="" method="post">
					<div class="modal-body">
						<table>
							<tr>
								<td>Nama Lokasi</td>
								<td>:</td>
								<td><?php
									$query="SELECT * FROM rumah, lokasi 
										WHERE lokasi.id_lokasi = rumah.id_lokasi
										AND rumah.id_rumah =".$id_rumah;
									$a=mysql_query($query);
										$lokasi = mysql_fetch_array(($a));
													
									?>
								<input type="text" name="lokasi" 
									value="<?= $lokasi['nama_lokasi'];?>"> </td>
							</tr>
							<tr>
								<td>Nama User</td>
								<td>:</td>
								<td><input type="text" name="id" value="<?= $_SESSION['id']; ?>"></td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>:</td>
								<td><input type="text" name="harga" value="<?= $lokasi['harga'];?>"></td>
							</tr>
							<tr class="modal-body">
								<td>Tanggal Mulai</td>
								<td>:</td>
								<td><input type="text" name="mulai"  id="tanggal"></td>
								<script type="text/javascript">
									
									</script>
							</tr>
							<tr class="modal-body">
								<td>Tanggal Selesai</td>
								<td>:</td>
								<td><input type="text" name="selesai"  id="tanggal1"></td>
							<script type="text/javascript">
									
									</script>
							</tr>
					</table>
					<table>
					<tr>
						<td><button class="submit" name="simpan" type="submit">Simpan</td>
						<td><button class="submit" type="submit" name="batal" onClick="self.history.back()">Batal</button></td>
					</tr>
					</table>
					
					
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="simpan btn btn-primary" class="submit" name="simpan" type="submit">Save changes</button>
                    </div>
					</form>
					<script src="js/bootstrap-modal.js"></script>
					<script src="js/bootstrap-transition.js"></script>
					<script src="js/bootstrap-datepicker.js"></script>
					<?php
						if(isset($_POST['simpan'])){
							extract($_POST);
							
							$simpan="insert into transaksi(id_rumah,id,status,tanggal_mulai,tanggal_selesai) values
									('$id_rumah',$id,'1','$mulai','$selesai')";
							$ganti="update rumah set
							 verifikasi='3' where id_rumah='$id_rumah'";
							$hasil1=mysql_query($ganti)or die(mysql_error());
							$hasil=mysql_query($simpan)or die(mysql_error());
							echo"berhasil";
						}
					?>
					
					
                </div>
            </div>
        </div>
		
		
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
	
        <script src="2/jquery-1.11.2.min.js"></script>
        <script src="2/bootstrap.js"></script>
        <script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
    </body>
</html>
<!--harviacode.com-->