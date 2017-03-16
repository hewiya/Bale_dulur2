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
					 <center> <h3> Table Lokasi</h3></center>
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <hr>
                              <thead>
							  <body>
                              <tr>
								
                                  <th width="50"><i ></i> No</th>
                                  <th width="120"><i ></i>Nama Lokasi</th>
                                  <th width="300"><i ></i>Alamat</th>
                                  <th width="100"><i ></i>Latitude</th>
                                  <th width="100"><i ></i>Longitude</th>
                
                                  <th width="150"><i class=" fa fa-edit"></i>Option</th>
                                  <th></th>
                              </tr>
                              </thead>
                              
                              <tr>
                                  
                              </tr>
                              <?php
								include('configg.php');
								$no=1;
								if(isset($_GET['id_lokasi'])){
								mysql_query("delete from lokasi where id_lokasi='".$_GET['id_lokasi']."'")or die(mysql_error());
								}
								$query="select * from lokasi";
								$perpage=2;
								$page=isset($_GET['page'])? $_GET['page']:"";
								empty($page)?$page=1:"";
								$offset=($page-1)*$perpage;
								$q=mysql_query("$query limit $offset,$perpage");
								$jumlah=ceil(mysql_num_rows(mysql_query($query))/$perpage);
								$return=array("tampung"=>$q,"jumlah"=>$jumlah);
								while($baris=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$baris['nama_lokasi']?></td>
									<td><?=$baris['alamat']?></td>
									<td><?=$baris['latitude']?></td>
									<td><?=$baris['longitude']?></td>
									<td></i></button>
                                    <a href="index.php?hal=tabel_lokasi&id_lokasi=<?=$baris['id_lokasi']?>"><button onclick="myFunction()" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
									<a href="index.php?hal=tampil_map&id_lokasi=<?=$baris['id_lokasi']?>"><button class="btn btn-success btn-xs"><i class="fa fa-file-image-o" aria-hidden="true"></i></button></a>
									</td>
									
								</tr>
								<?php
								$no++;
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_lokasi&page=1'><div class='uu'>Awal</div></a>";
								}
								for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
								if($page==$pagehal){
								echo"<span><div class='uu'>$pagehal</div></span>";
								}else{
									echo"<a href='?hal=tabel_lokasi&page=$pagehal'><div class='uu'>$pagehal</div></a>";
								}
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_lokasi&page=$jumlah'><div class='uu'>Akhir</div></a>";
								}
							?>
                              
                              
                          </table>
						  </body>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		<!--</section><! --/wrapper -->
    
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
  <script>
  
	function myFunction() {
		var tanya=confirm("Aapakah Anda yakin untuk menhapus data ?");
		if (tanya == true){
			return true;
		}else{
			return false;
		}
		}
</script>

  </body>
</html>
