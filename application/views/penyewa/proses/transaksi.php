<!-- 										-->
<!-- 										-->
<!-- 			Belum dipakai !!!			-->
<!-- 										-->
<!-- 										-->

<?php
	session_start();
 include"../../lib/koneksi.php";
 $id_rumah = isset($_GET['id_rumah']) ? $_GET["id_rumah"] : "" ;
 if(empty($_SESSION['email']) and empty($_SESSION['password'])){
	 
 }
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="2/bootstrap.css"/>
        <link rel="stylesheet" href="../css/bs.css"/>
		<title>Bale Dulur</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/datepicker.css">
	    <script src="js/bootstrap.js"></script>
	    <script src="js/jquery.js"></script>
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
				margin: 0;
				padding: 20px 0 0 0;
				text-align: center;
				font-size: 16px;
			  }
			  h1 {
				color: #222;
				font-size: 24px;
			  }
			  .tengah{
				margin-left:300px;
				margin-top:50px;
			  }
			  #bt{
				width:120px;
				height:40px;
				background-color:#006363;
				color:#fff;
				border-radius:20px;
			  }
			  #bt:hover{
				background-color:#0067;
			  }
</style>
    </head>
    <body>
			<div class="atas">
				<img src="../../images/templatemo_logo.png" width="400px"/>
			</div>
	<div class="tengah">
			        <form action="" method="post">
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
				<input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
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
				<tr>
						<td></td>
						<td></td>
						<td>
							<button class="submit" id="bt" name="simpan" type="submit">Simpan</button>
							<a href="../index.php"><button class="submit" id="bt" type="submit" name="batal">Batal</button></a>
						</td>
					</tr>
			</table>
			<br>
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
		echo"<script>
				window.alert('Data berhasil disimpan !');
				window.location=(href='../index.php');
			</script>";
	}
?>
		
	</div>	
	
		
    </body>
</html>
<!--harviacode.com-->