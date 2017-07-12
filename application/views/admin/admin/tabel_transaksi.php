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
	                  	  	 
							  <h4><i class="fa fa-angle-right"></i> Table Transaksi</h4>
	                  	  	  <hr>
                              <thead>
							  <body>
                              <tr>
								
                                  <th><i ></i> No</th>
                                  
                                  <th><i ></i>Nama Pelanggan</th>
                                  <th><i ></i>Rumah/Lokasi</th>
                                  <th><i ></i>Tanggal Mulai</th>
                                  <th><i ></i>Tanggal Selesai</th>
                                  <th><i ></i>Status</th>
                                  <th><i ></i>Option</th>
                                  
                                 
                              </tr>
                              </thead>
                              
                              <tr>
                                  
                              </tr>
                              <?php
									
                              	$link = mysqli_connect("localhost", "root", "", "bale");
								$no=1;
								if(isset($_GET['id_transaksi'])){
								mysqli_query($link,"delete from transaksi where id_transaksi='".$_GET['id_transaksi']."'")or die(mysqli_error());
								}
								$query="select r.tipe,l.nama_lokasi,l.alamat, u.nama, t.* from rumah r, user u, lokasi l, transaksi t
										where t.id_rumah = r.id_rumah and t.id = u.id and r.id_lokasi = l.id_lokasi
								";
								/**$query="select a.id_rumah, c.nama_lokasi, b.nama, a.tipe, a.harga, a.deskripsi, a.foto, a.kapasitas,
										a.kamar_tidur, a.kamar_mandi, a.parkir, a.internet, a.ac, a.verifkasi, a.dapur, a.mesin_cuci,
										a.tv from rumah a, user b, lokasi c where a.id_lokasi=c.id_lokasi and a.id=b.id";**/
								$perpage=4;
								$page=isset($_GET['page'])? $_GET['page']:"";
								empty($page)?$page=1:"";
								$offset=($page-1)*$perpage;
								$q=mysqli_query($link,"$query limit $offset,$perpage");
								$jumlah=ceil(mysqli_num_rows(mysqli_query($link,$query))/$perpage);
								$return=array("tampung"=>$q,"jumlah"=>$jumlah);
								while($baris=mysqli_fetch_array($q)){
								?>
								<tr>
								
									<td><?=$no?></td>
							
									<td><?=$baris['nama']?></td>
									<td><?=$baris['nama_lokasi']. " ". $baris['alamat']?>
										<br>
										<?= $baris['tipe'];?>
									</td>
									<td><?=$baris['tanggal_mulai']?></td>
									<td><?=$baris['tanggal_selesai']?></td>
									<td><?php
										switch($baris['status'])
										{
											case '1':
												echo 'Belum Bayar';
											break;
											case '2':
												echo 'Sudah Dibayar';
											break;
											case '3':
												echo 'Masih Disewa';
											break;
											case '4':
												echo 'Dicancel';
											break;
										}
									?></td>
									
									<td><a href="index.php?hal=tabel_transaksi&id_transaksi=<?=$baris['id_transaksi']?>"><button class="btn btn-danger btn-xs">
											<i class='fa fa-trash-o '></i></button></a>
                                   
									
									</td>
									
								</tr>
								<?php
								
								$no++;
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_transaksi&page=1'><div class='uu'>Awal</div></a>";
								}
								for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
								if($page==$pagehal){
								echo"<span><div class='uu'>$pagehal</div></span>";
								}else{
									echo"<a href='?hal=tabel_transaksi&page=$pagehal'><div class='uu'>$pagehal</div></a>";
								}
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_transaksi&page=$jumlah'><div class='uu'>Akhir</div></a>";
								}
							?>
                              
                              
                          </table>
						  </body>
                      </div>
                  </div>
              </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
