<style>
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
	.uu:hover{
		color:#fff;
		background-color:#00A69A;
	}
	<!--.uu2{
		color:#000;
		float:left;
		padding:8px 16px;
		text-decoration:none;
		background-color:#F7BC63;
		margin-left:2px;
	}
	.uu2:hover{
		color:#fff;
		background-color:#00A69A;
	}-->
</style>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	              
							  <h3><center>Table Rumah</center></h3>
	                  	  	  <hr>
                              <thead>
							  <body>
                              <tr>
								
                                  <th> No</th>
                                  <th width="70"> Nama </th>                           
                                  <th width="10"> Alamat</th>                           
                                  <th width="120"> Nama Rumah</th>                           
                                  <th width="120">Tipe Rumah</th>
                                  <th width="80">Harga</th>
                                  <th width="50">Kapasitas</th>
                                  <th width="300">Deskripsi</th>
                                  <th width="80">Status</th>
                                  <th>Option</th>
                                  
                                 
                              </tr>
                              </thead>
                              
                              <tr>
                                  
                              </tr>
                              <?php
								include('configg.php');
								$no=1;
								if(isset($_GET['id_rumah'])){
								mysql_query("delete from rumah where id_rumah='".$_GET['id_rumah']."'")or die(mysql_error());
								}
								/**$query="select * from rumah";**/
								$query="select * from rumah, lokasi,user where lokasi.id_lokasi=rumah.id_lokasi and user.id=rumah.id";
								$perpage=2;
								$page=isset($_GET['page'])? $_GET['page']:"";
								empty($page)?$page=1:"";
								$offset=($page-1)*$perpage;
								$q=mysql_query("$query limit $offset,$perpage");
								$jumlah=ceil(mysql_num_rows(mysql_query($query))/$perpage);
								$return=array("tampung"=>$q,"jumlah"=>$jumlah);
								while($baris=mysql_fetch_array($q)){
									if($baris['verifikasi']==1){
										$verifikasi="Terverifikasi";
									}elseif($baris['verifikasi']==2){
										$verifikasi="Upload";
									}elseif($baris['verifikasi']==3){
										$verifikasi="Dipesan";
									}
								?>
								<tr>
								
									<td><?=$no?></td>
									<td><?=$baris['nama']?></td>
									<td><?=$baris['nama_lokasi']?></td>
									<td><?=$baris['nama_rumah']?></td>
									<td><?=$baris['tipe']?></td>
									<td><?=$baris['harga']?></td>
									<td><?=$baris['kapasitas']?></td>
									<td><?=$baris['deskripsi']?></td>
									
									<td><?=$verifikasi?></td>
									
									<td><a href="index.php?hal=verifikasi&id_rumah=<?=$baris['id_rumah']?>"><button class="btn btn-primary btn-xs">
											<i class="fa fa-check-circle" aria-hidden="true"></i></button></a>
										<a href="index.php?hal=tabel_rumah&id_rumah=<?=$baris['id_rumah']?>"><button class="btn btn-danger btn-xs">
											<i class='fa fa-trash-o '></i></button></a>
										
									
									</td>
									
								</tr>
								<?php
								
								$no++;
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_rumah&page=1'><div class='uu'>Awal</div></a>";
								}
								for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
								if($page==$pagehal){
								echo"<span><div class='uu'>$pagehal</div></span>";
								}else{
									echo"<a href='?hal=tabel_rumah&page=$pagehal'><div class='uu'>$pagehal</div></a>";
								}
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_rumah&page=$jumlah'><div class='uu'>Akhir</div></a>";
								}
							?>
                              
                              
                          </table>
						  </body>
                      </div>
                  </div>
              </div>


     

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>

