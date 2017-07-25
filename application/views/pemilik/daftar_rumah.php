<!-- 										-->
<!-- 										-->
<!-- 			Belum dipakai !!!			-->
<!-- 										-->
<!-- 										-->

<div class="tumpang2">
	<h1>Daftar Rumah</h1><br/>
	<table>
	    <thead>
		    <tr>
				<th>No</th>
                <th width="180px">Nama Rumah</th>
                <th width="80px">Harga</th>
                <th width="80px">Kapasitas</th>
                <th width="250px">Deskripsi</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
		<input type="hidden" name="id" value="<?="".$_SESSION['id'].""?>"/>
		<?php
			include('../lib/koneksi.php');
			$no=1;
			if(isset($_GET['id_rumah'])){
				mysql_query("delete from rumah where id_rumah='".$_GET['id_rumah']."'")or die(mysql_error());
			}
			$query="select * from rumah where id='".$_SESSION['id']."'";
			/**$query="select a.id_rumah, c.nama_lokasi, b.nama, a.tipe, a.harga, a.deskripsi, a.foto, a.kapasitas,
			a.kamar_tidur, a.kamar_mandi, a.parkir, a.internet, a.ac, a.verifkasi, a.dapur, a.mesin_cuci,
			a.tv from rumah a, user b, lokasi c where a.id_lokasi=c.id_lokasi and a.id=b.id";**/
			$perpage=4;
			$page=isset($_GET['page'])? $_GET['page']:"";
			empty($page)?$page=1:"";
			$offset=($page-1)*$perpage;
			$q=mysql_query("$query limit $offset,$perpage");
			$jumlah=ceil(mysql_num_rows(mysql_query($query))/$perpage);
			$return=array("tampung"=>$q,"jumlah"=>$jumlah);
			while($baris=mysql_fetch_array($q)){
				if($baris['verifikasi']==1){
					$verifikasi="Terverifikasi";
				}else{
					$verifikasi="Upload";
				}
		?>
		<tr>
			<td><?=$no?></td>
			<td><?=$baris['nama_rumah']?></td>
			<td><?=$baris['harga']?></td>
			<td><?=$baris['kapasitas']?></td>
			<td><?=$baris['deskripsi']?></td>
			<td><?=$verifikasi?></td>
			<td>
				<a href="index.php?hal=daftar_rumah&id_rumah=<?=$baris['id_rumah']?>" onClick='return hapus()'><button class="btn btn-danger btn-xs">
				<i class='fa fa-trash-o '>Hapus</i></button></a>
				<a href="?hal=edit_rumah&id_rumah=<?=$baris['id_rumah']?>"><button class="btn btn-success btn-xs">
				<i class='fa fa-pencil '>Ubah</i></button></a>
			</td>
		</tr>
		<?php
			$no++;
		}
			if($jumlah>1){
				echo"<a href='index.php?hal=tabel_lokasi&page=1'>Awal</a>";
			}
			for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
				if($page==$pagehal){
					echo"<span>$pagehal</span>";
				}else{
					echo"<a href='?hal=tabel_lokasi&page=$pagehal'>$pagehal</a>";
				}
			}
			if($jumlah>1){
				echo"<a href='index.php?hal=tabel_lokasi&page=$jumlah'>Akhir</a>";
			}
		?>
    </table>
</div>