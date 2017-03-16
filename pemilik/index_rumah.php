<?php
	//session_start();
	//include "../lib/koneksi.php";
	//if(!isset($_SESSION['email'])){
		//header('location:../index.php');
	//}else{
	session_start();
	include('../lib/koneksi.php');
	$id_lokasi = isset ($_GET['id_lokasi'])?$_GET["id_lokasi"]:"";
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
					require_once ("welcome.php");
				}
			?>
			</div>
			<div class="container-fluid">                
                <!-- modal-->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul"><img src="../images/templatemo_logo.png" width="200px"/></h3>
                    </div>
                    <div class="modal-body">
					<center><b>---  <i>Lengkapi form berikut untuk mempromosikan rumah Anda</i>  ---</b></center>
						<div class="omahtabel">
						<form name="input_rumah" method="post" enctype="multipart/form-data" action="">
							<table>								
								<tr>
									<td width="150px">Lokasi</td>
									<td width="10px">:</td>
									<td><select name="id_lokasi">
										<?php
												include"../lib/koneksi.php";
												$query=mysql_query("select * from lokasi where id='".$_SESSION['id']."' ");
												while($tampung=mysql_fetch_array($query)){
												echo "<option value='$tampung[id_lokasi]'>$tampung[nama_lokasi]</option>";
												}
											?>
										</select>
								</td>
								</tr>
								<tr>
									<td>Nama Rumah</td>
									<td>:</td>
									<td>
									<input type="hidden" name="id" value="<?="".$_SESSION['id'].""?>"/>
									<input type="text" name="nama" value="" required="required" placeholder="Nama Rumah"></td>
								</tr>
								<tr>
									<td>Tipe Rumah</td>
									<td>:</td>
									<td>
										<select name="tipe">
											<option value="">Tipe Rumah</option>										
											<option value="Seluruh Rumah">Seluruh Rumah</option>										
											<option value="Kamar Pribadi">Kamar Pribadi</option>										
											<option value="Kamar Bersama">Kamar Bersama</option>	
										</select>
									</td>
								</tr>
								<tr>
									<td>Kapasitas</td>
									<td>:</td>
									<td><select name="kapasitas">
											<option value="">Kapasitas</option>										
											<option value="1">1</option>										
											<option value="2">2</option>										
											<option value="3">3</option>										
											<option value="4">4</option>										
											<option value="5">5</option>										
											<option value="6">6</option>										
											<option value="7">7</option>										
											<option value="8">8</option>										
											<option value="9">9</option>										
											<option value="10">10</option>										
										</select>
									</td><br/>
								</tr>
								<tr>
									<td>Kamar Tidur</td>
									<td>:</td>
									<td><select name="kamar_t">
										<option value="">Jumlah Kamar Tidur</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
									</td><br/>
								</tr>
								<tr>
									<td>Kamar Mandi</td>
									<td>:</td>
									<td><select name="kamar_m">
										<option value="">Jumlah Kamar Mandi</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
									</td><br/>
								</tr>
								<tr>
									<td>Harga</td>
									<td>:</td>
									<td><input type="text" name="harga" value="" required="required" placeholder="Harga Rumah"></td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td>:</td>
									<td><textarea cols="40" rows="3" name="deskripsi" class="form-control" placeholder="Deskripsi Rumah"></textarea></td>
								</tr>
								<tr>
									<td>Fasilitas</td>
									<td>:</td>
									<td>
										<table>
											<tr>
												<td><input type="checkbox" name="parkir" value="1"/>  Parkir</td>
												<td><input type="checkbox" name="internet" value="1"/>  Internet</td>
												<td><input type="checkbox" name="ac" value="1"/>  AC</td>
											</tr>
											<tr>
												<td><input type="checkbox" name="dapur" value="1"/>  Dapur<br/></td>
												<td><input type="checkbox" name="mesin_cuci" value="1"/>  Mesin Cuci</td>
												<td><input type="checkbox" name="tv" value="1"/>  TV</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>:</td>
									<td><input type="file" name="foto1" accept="image/*">
										<input type="file" name="foto2" accept="image/*">
										<input type="file" name="foto3" accept="image/*">
										<input type="file" name="foto4" accept="image/*">
										<input type="file" name="foto5" accept="image/*">
									</td>
								</tr>
								<tr>
								  <td colspan="3"><center><input type="submit" name="simpan" value="Save" class="btn"> <input type="submit" name="cancel" value="Cancel" class="btn"></center></td>
								</tr>
						  </table>
						</form>
						  <?php
							if(isset($_POST['simpan'])){
								extract($_POST);
								
								$foto1=$_FILES['foto1']['name'];
								$foto2=$_FILES['foto2']['name'];
								$foto3=$_FILES['foto3']['name'];
								$foto4=$_FILES['foto4']['name'];
								$foto5=$_FILES['foto5']['name'];
								$ext=array("image/bmp", "image/jpg", "image/jpeg", "image/gif", "image/png");
								//$nama_baru= $bale."2017bale_dulur.$id_rumah.".end(explode(".",$foto));
								$simpan="insert into rumah(id_lokasi,id,nama_rumah,tipe,harga,deskripsi,kapasitas,kamar_tidur,kamar_mandi,parkir,
										internet,ac,verifikasi,dapur,mesin_cuci,tv) values('$id_lokasi','$id','$nama','$tipe','$harga',
										'$deskripsi','$kapasitas','$kamar_t','$kamar_m','$parkir','$internet','$ac','1',
										'$dapur','$mesin_cuci','$tv')";
								echo $simpan;
								$hasil=mysql_query($simpan)or die(mysql_error());
								$id_rumah=mysql_insert_id();
								if($hasil ){
								
									if(! in_array($_FILES['foto1']['type'],$ext)){
										echo "<script>alert('tipefile salah !')</script>";
									}else{
										$nama_foto1 = "2017bale_dulur".$id_rumah."_1.".end(explode(".",$foto1));
										move_uploaded_file($_FILES['foto1']['tmp_name'],'../upload/'.$nama_foto1);
										mysql_query("insert into gambar(id_rumah,foto) values('$id_rumah', '$nama_foto1')");
										
										$nama_foto2 = "2017bale_dulur".$id_rumah."_2.".end(explode(".",$foto2));
										move_uploaded_file($_FILES['foto2']['tmp_name'],'../upload/'.$nama_foto2);
										mysql_query("insert into gambar(id_rumah,foto) values('$id_rumah', '$nama_foto2')");
										
										$nama_foto3 = "2017bale_dulur".$id_rumah."_3.".end(explode(".",$foto3));
										move_uploaded_file($_FILES['foto3']['tmp_name'],'../upload/'.$nama_foto3);
										mysql_query("insert into gambar(id_rumah,foto) values('$id_rumah', '$nama_foto3')");
										
										$nama_foto4 = "2017bale_dulur".$id_rumah."_4.".end(explode(".",$foto4));
										move_uploaded_file($_FILES['foto4']['tmp_name'],'../upload/'.$nama_foto4);
										mysql_query("insert into gambar(id_rumah,foto) values('$id_rumah', '$nama_foto4')");
										
										$nama_foto5 = "2017bale_dulur".$id_rumah."_5.".end(explode(".",$foto5));
										move_uploaded_file($_FILES['foto5']['tmp_name'],'../upload/'.$nama_foto5);
										mysql_query("insert into gambar(id_rumah,foto) values('$id_rumah', '$nama_foto5')");
										
										echo "<script>
											window.alert('Data berhasil disimpan !');
											window.location=(href='?hal=daftar_rumah');
										</script>";
									}
								}
							}
						?>
						</div>
                    </div>
                </div>
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