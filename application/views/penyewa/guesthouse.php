<!-- 										-->
<!-- 										-->
<!-- 			Belum dipakai !!!			-->
<!-- 										-->
<!-- 										-->

<?php
	include"../lib/koneksi.php";
	$id_rumah = isset($_GET['id_rumah']) ? $_GET["id_rumah"] : "" ;
 if(empty($_SESSION['email']) and empty($_SESSION['password'])){
	 
 }
?>		
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bs.css">
		<link rel="stylesheet" href="css/table.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>

<style>
	.tls{
		font-family:nyala;
	}
	.tls2{
		font-family:nyala;
		font-size:26px;
	}
	.dudul{	
		background:#00A69A;
		height:40px;
		width:180px;
		padding-top:10px;
		padding-left:8px;
		color:#fff;
		border:0px;
		border-radius:4px;
		text-decoration:none;
		display:inline-block;
		font-family:nyala;
		font-size:20px;
	}
	.dudul:hover{	
		background:#29B8F3;
		color:#000;
	}	
	.uu{
		display:inline-block;
		color:#000;
		float:left;
		padding:8px 16px;
		text-decoration:none;
		background-color:#F7BC63;
		margin-left:2px;
	}
	.uu{
		color:#000;
		float:left;
		padding:8px 16px;
		text-decoration:none;
		background-color:#F7BC63;
		margin-left:2px;
	}
	.uu a:hover{
		color:#fff;
		background-color:#00A69A;
	}
</style>
<div class="container">
<br>
           <ul class="gridder">
			   <?php
						$hasil="select * from rumah where verifikasi='2'";					
						$i=1;
						$perpage=2;
						$page=isset($_GET['page'])? $_GET['page']:"";
						empty($page)?$page=1:"";
						$offset=($page-1)*$perpage;
						$q=mysql_query("$hasil limit $offset,$perpage");
						$jumlah=ceil(mysql_num_rows(mysql_query($hasil))/$perpage);
						$return=array("tampung"=>$q,"jumlah"=>$jumlah);
						while($r=mysql_fetch_array($q)){
						echo '<li class="gridder-list" data-griddercontent="#gridder-content-'.$i.'">';
						$foto = mysql_fetch_array(mysql_query("select * from gambar where id_rumah='".$r['id_rumah']."'"));
						
						echo '			<img src="../upload/'.$foto['foto'].'" class="img-responsive"/>
										<div class="tls"><center>'.$r['nama_rumah'].'<br/>IDR '.$r['harga'].'</center>
										</div>
							  </li>';
							 $i++;
								}
								if($jumlah>1){
									?>
								<a href='index.php?hal=guesthouse&page=1'>Awal</a></div>
								<?php
								}
								for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
								if($page==$pagehal){
								echo"<div class='uu'><span>$pagehal</span></div>";
								}else{
									echo"<div class='uu'><a href='?hal=guesthouse&page=$pagehal'>$pagehal</a></div>";
								}
								}
								if($jumlah>1){
									echo"<div class='uu'><a href='index.php?hal=guesthouse&page=$jumlah'>Akhir</a></div>";
								} 
					
				?>
				
				
				
			</ul>
			<center>
			<?php
							  
					
				?>
			</center>
			
			

			<?php
				$hasil=mysql_query ('select * from rumah where verifikasi="2"');					
				$i=1;
				while($r=mysql_fetch_array($hasil)){
					
			?>
           <div id="gridder-content-<?= $i ?>" class="gridder-content">
		   <?php
				include"../lib/koneksi.php";
				$id_rumah = isset($_GET['id_rumah']) ? $_GET["id_rumah"] : "" ;
			 if(empty($_SESSION['email']) and empty($_SESSION['password'])){
				 
			 }
			?>
                <div class="row">
                   <div class="col-sm-6">

                            <div id="carousel-<?= $i ?>" class="carousel slide">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-<?= $i ?>" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-<?= $i ?>" data-slide-to="1"></li>
                                    <li data-target="#carousel-<?= $i ?>" data-slide-to="2"></li>
                                    <li data-target="#carousel-<?= $i ?>" data-slide-to="3"></li>
                                    <li data-target="#carousel-<?= $i ?>" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <?php
										$foto = mysql_query("select * from gambar where id_rumah='".$r['id_rumah']."'");
										while($row_foto = mysql_fetch_array($foto))
										{
											$ft = $row_foto['foto'];
											$explode = explode("_", $ft);
											$awal = end($explode);
											$no = explode(".", $awal);
											
											if($no[0] == "1")
											{
										?>
											
											<div class="item active">
												<img src="../upload/<?= $row_foto['foto'];?>" class="img-responsive" />
													<div class="carousel-caption">
														<?=$r['nama_rumah']?>
													</div>
											</div>
										<?php 
										
										}else{
										?>
											<div class="item">
												<img src="../upload/<?= $row_foto['foto'];?>" class="img-responsive" />
													<div class="carousel-caption">
														<?=$r['nama_rumah']?>
													</div>
											</div>
										<?php
										}
									
                                    
									
										}
									?>
                                </div>
								<a class="left carousel-control" href="#carousel-<?= $i ?>" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-<?= $i ?>" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
							<br/>
							<div class="tls2"><center>-- <?=$r['nama_rumah']?> --</center></div><br></br>
							<center><a href="proses/transaksi.php?id_rumah=<?=$r['id_rumah']?>"><!--<a href="#myModal" data-id="<?=$r['id_rumah']?>" role="button" data-toggle="modal">--><div class="dudul">Pesan Sekarang !</div></a></center>
							
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
								  <td colspan="3"><center><input type="submit" name="simpan" value="Save" class="btn"> <input type="submit" name="cancel" value="Cancel" class="btn"></center></td>
								</tr>
						  </table>
						</form>
						  <?php
							
						?>
						</div>
                    </div>
                </div>
							
							
							
							
                </div>
				<div class="col-sm-6">
				<table>
					<tbody>
					
					<tr>
						<td width="180">Type</td>
						<td>:</td>
						<td><?php echo $r['tipe'];?></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>:</td>
						<td>IDR <?php echo $r['harga'];?></td>
					</tr>
					<tr>
						<td>Kapasitas</td>
						<td>:</td>
						<td><?php echo $r['kapasitas'];?></td>
					</tr>
					<tr>
						<td>Kamar Tidur</td>
						<td>:</td>
						<td><?php echo $r['kamar_tidur'];?></td>
					</tr>
					<tr>
						<td>Kamar Mandi</td>
						<td>:</td>
						<td><?php echo $r['kamar_mandi'];?></td>
					</tr>
					<tr>
						<td>Parkir</td>
						<td>:</td>
						<td><?php if($r['parkir']==0){echo "unvailable";}else{echo "available";};?></td>
					</tr>
					<tr>
						<td>Internet</td>
						<td>:</td>
						<td><?php if($r['internet']==0){echo "unvailable";}else{echo "available";};?></td>
					</tr>
					<tr>
						<td>AC</td>
						<td>:</td>
						<td><?php if($r['ac']==0){echo "unvailable";}else{echo "available";};?></td>
					</tr>
					<tr>
						<td>Dapur</td>
						<td>:</td>
						<td><?php if($r['dapur']==0){echo "unvailable";}else{echo "available";};?></td>
					</tr>
					<tr>
						<td>Mesin Cuci</td>
						<td>:</td>
						<td><?php if($r['mesin_cuci']==0){echo "unvailable";}else{echo "available";};?></td>
					</tr>
					<tr>
						<td>TV</td>
						<td>:</td>
						<td><?php if($r['tv']==0){echo "unvailable";}else{echo "available";};?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td><?php echo $r['deskripsi'];?></td>
					</tr>
					</tbody>
					<style>
					</style>
				</table>
						
                </div>
            </div>
            <?php
			$i++;
			}
			?>
 
</div>
		
	</div>
	</div>
	</div>
		