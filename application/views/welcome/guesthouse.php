<!-- 										-->
<!-- 										-->
<!-- 			Belum dipakai !!!			-->
<!-- 										-->
<!-- 										-->

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
</style>
		
<div class="container">
<br>
           <ul class="gridder">
			   <?php
						
				?>
			</ul>

			<?php
				
			?>
           <div id="gridder-content-<?= $i ?>" class="gridder-content">
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
												<img src="admin/upload/<?= $row_foto['foto'];?>" class="img-responsive" />
													<div class="carousel-caption">
														<?=$r['nama_rumah']?>
													</div>
											</div>
										<?php 
										
										}else{
										?>
											<div class="item">
												<img src="admin/upload/<?= $row_foto['foto'];?>" class="img-responsive" />
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
							<div class="tls2"><center>-- <?=$r['nama_rumah']?> --</center></div>
                </div>
				<div class="col-sm-6">
				<table>
					<tbody>
					<tr>
						<td>Type</td>
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
				</table>
						<center><input type="submit" name="pesan" value="Pesan Sekarang!"/></center>
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
		