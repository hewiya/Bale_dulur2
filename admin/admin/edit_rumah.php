<?php

include('configg.php');
	if(isset($_GET['id_rumah'])){
	$id_rumah=isset($_GET['id_rumah'])? $_GET['id_rumah']:"";
	$find="select * from rumah where id_rumah='$id_rumah'";
	$f2=mysql_query($find) or die(mysql_error());
	$f3=mysql_fetch_array($f2);
	$id_rumah = stripslashes ($f3['id_rumah']);
	$id_lokasi = stripslashes ($f3['id_lokasi']);
	$id = stripslashes ($f3['id']);
	$nama_rumah = stripslashes ($f3['nama_rumah']);
	$tipe = stripslashes ($f3['tipe']);
	$harga= stripslashes ($f3['harga']);
	$deskripsi = stripslashes ($f3['deskripsi']);
	$kapasitas = stripslashes ($f3['kapasitas']);
	$kamar_tidur = stripslashes ($f3['kamar_tidur']);
	$kamar_mandi = stripslashes ($f3['kamar_mandi']);
	$parkir = stripslashes ($f3['parkir']);
	$internet = stripslashes ($f3['internet']);
	$ac = stripslashes ($f3['ac']);

	$dapur = stripslashes ($f3['dapur']);
	$mesin_cuci = stripslashes ($f3['mesin_cuci']);
	$tv = stripslashes ($f3['tv']);
		
	if(isset($_POST['edit'])){
	extract($_POST);
		$update="update rumah set nama_rumah='$nama_rumah', tipe='$tipe', harga='$harga', deskripsi='$deskripsi', kapasitas='$kapasitas', 
			kamar_tidur='$kamar_tidur', kamar_mandi='$kamar_mandi', parkir='$parkir', internet='$internet', ac='$ac',
			dapur='$dapur', mesin_cuci='$mesin_cuci', tv='$tv' where id_rumah='$id_rumah'";
		$proses=mysql_query($update) or die (mysql_error());
		
		if($proses){
			echo "<script>
				window.alert('Perubahan berhasil disimpan !');
				window.location=(href='?hal=tabel_rumah');
			</script>";
		}else{
			echo "<script>
			alert('Data masih kosong!');
			</script>";
		}
	}
	
	$find="select * from gambar where id_rumah='$id_rumah'";
	$f2=mysql_query($find) or die(mysql_error());
	$f3=mysql_fetch_array($f2);
	$id_gambar = stripslashes ($f3['id_gambar']);
	$id_rumah = stripslashes ($f3['id_rumah']);
	$foto = stripslashes ($f3['foto']['name']);
	}
	
	$find="select * from lokasi ";
	$f2=mysql_query($find) or die(mysql_error());
	$f3=mysql_fetch_array($f2);
	$id_lokasi = stripslashes ($f3['id_lokasi']);
	$nama_lokasi = stripslashes ($f3['nama_lokasi']);
	
	$find="select * from user ";
	$f2=mysql_query($find) or die(mysql_error());
	$f3=mysql_fetch_array($f2);
	$id = stripslashes ($f3['id']);
	$nama = stripslashes ($f3['nama']);
	
	if(isset($_POST['gbr'])){
		$id_gambar=isset($_POST['id_gambar'])?$_POST['id_gambar']:"";
		$foto1=$_FILES['foto1'];
		$ext=array("image/bmp", "image/jpg", "image/jpeg", "image/gif", "image/png");
		$id_rumah=mysql_insert_id();
		$update_foto1="update gambar set foto='$foto1' where id_gambar='$id_gambar' and set=id_rumah='$id_rumah'";
		$proses_foto1=mysql_query($update_foto1) or die (mysql_error());
		if($proses_foto1){
			if(! in_array($_FILES['foto1']['type'],$ext)){
				echo "<script>alert('tipefile salah !')</script>";
			}else{
				$nama_foto1 = "2017bale_dulur".$id_rumah."_1.".end(explode(".",$foto1));
				move_uploaded_file($_FILES['foto1']['tmp_name'],'../upload/'.$nama_foto1);
						
				echo "<script>
					window.alert('Data berhasil disimpan !');
					window.location=(href='?hal=tabel_rumah');
				</script>";
			}
		}
	}
	
?>

<form name="data" method="post" enctype="multipart/form-data" action="">
	<table>
		<tr>
			<td><input type="hidden" name="id_rumah" value="<? echo $id_rumah?>"></td>
		</tr>
		<tr>
			<td>Nama Lokasi</td>
			<td>:</td>
			<td><select name="id_lokasi" class="form-control"><option value="<? echo $nama_lokasi?>"><? echo $nama_lokasi?></option>
						<?php
							include"configg.php";
							$query=mysql_query("select * from lokasi");
							while($tampung=mysql_fetch_array($query)){
							echo "<option value='$tampung[id_lokasi]'>$tampung[nama_lokasi]</option>";
							}
						?>
							</select></td>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td><select name="id" class="form-control"><option value="<? echo $nama?>"><? echo $nama?></option>
						<?php
								include"configg.php";
								$query=mysql_query("select * from user");
								while($tampung=mysql_fetch_array($query)){
								echo "<option value='$tampung[id]'>$tampung[nama]</option>";
								}
						?>
							</select></td>
		</tr>
		<tr>
			<td>Nama Rumah</td>
			<td>:</td>
			<td><input type="text" name="nama_rumah" value="<? echo $nama_rumah?>"></td>
		</tr>
		<tr>
			<td>Tipe</td>
			<td>:</td>
			<td><input type="text" name="tipe" value="<? echo $tipe?>"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input type="text" name="harga" value="<? echo $harga?>"></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td>:</td>
			<td><textarea name="deskripsi" value="<? echo $deskripsi?>"><? echo $deskripsi?></textarea>
			</td>
	
		</tr>
		<tr>
			<td>Kapasitas</td>
			<td>:</td>
			<td><input type="text" name="kapasitas" value="<? echo $kapasitas?>"></td>
		</tr>
		<tr>
			<td>Kamar Tidur</td>
			<td>:</td>
			<td><input type="text" name="kamar_tidur" value="<? echo $kamar_tidur?>"></td>
		</tr>
		<tr>
			<td>Kamar Mandi</td>
			<td>:</td>
			<td><input type="text" name="kamar_mandi" value="<? echo $kamar_mandi?>"></td>
		</tr>
		<tr>
			<td>Parkir</td>
			<td>:</td>
			<td><input type="checkbox" name="parkir" value="<?echo $parkir?>"<?php if($parkir==1){
				echo 'checked="checked"';
			}?>/>
			</td>
		</tr>
		<tr>
			<td>Internet</td>
			<td>:</td>
			<td><input type="checkbox" name="internet" value="<? echo $internet?>" <?php if($internet==1){
				echo 'checked="checked"';
			}?>/>
			</td>
		</tr>
		<tr>
			<td>AC</td>
			<td>:</td>
			<td><input type="checkbox" name="ac" value="<? echo $ac?>"<?php if($ac==1){
				echo 'checked="checked"';
			}?>/></td>
		</tr>
		<tr>
			<td>Dapur</td>
			<td>:</td>
			<td><input type="checkbox" name="dapur" value="<? echo $dapur?>"<?php if($dapur==1){
				echo 'checked="checked"';
			}?>/></td>
		</tr>
		<tr>
			<td>Mesin cuci</td>
			<td>:</td>
			<td><input type="checkbox" name="mesin_cuci" value="<? echo $mesin_cuci?>"<?php if($mesin_cuci==1){
				echo 'checked="checked"';
			}?>/></td>
		</tr>
		<tr>
			<td>TV</td>
			<td>:</td>
			<td><input type="checkbox" name="tv" value="<? echo $tv?>" <?php if($tv==1){
				echo 'checked="checked"';
			}?>/></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="edit" value="Edit" class="btn"></td>
		</tr>
	</table>
</form>
<form name="foto" method="POST" enctype="multipart/form-data" action="">
	<table>
		<tr>
			<td><input type="hidden" name="id_gambar" value="<?echo $id_gambar?>"></td>
			<td><input type="hidden" name="id_rumah" value="<?echo $id_rumah?>"></td>
		</tr>
		<tr>
			<td><center>Foto</center></td>
		</tr>
		<tr>
			<td><img src="../upload/<? echo $foto1?>" width="150" height="200"></img></td>
		</tr>
		<tr>
			<td><input type="file" name="foto1" class="text" value=""></td>
		</tr>
		<tr>
			<td><input type="submit" name="gbr" value="Edit" class="btn"></td>
		</tr>
	</table>
</form>
<?php

	
	
	?>