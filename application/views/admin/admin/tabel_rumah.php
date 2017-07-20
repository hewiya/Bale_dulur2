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
<!-- Sweet alert -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/css/sweetalert.css">
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
                              
                              	$link = mysqli_connect("localhost", "root", "", "bale");
                              	$no=1;
								/**$query="select * from rumah";**/
								$query="select * from rumah, lokasi,user where lokasi.id_lokasi=rumah.id_lokasi and user.id=rumah.id";
								$perpage=5;
								$page=isset($_GET['page'])? $_GET['page']:"";
								empty($page)?$page=1:"";
								$offset=($page-1)*$perpage;
								$q=mysqli_query($link,"$query limit $offset,$perpage");
								$jumlah=ceil(mysqli_num_rows(mysqli_query($link,$query))/$perpage);
								$return=array("tampung"=>$q,"jumlah"=>$jumlah);
								while($baris=mysqli_fetch_array($q)){
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
									
									<td>
										<button class="btn btn-primary btn-xs" id="<?php echo $no ?>" 
										onclick="
											$().ready(function(e){
												var id_rumah = '<?php echo $baris['id_rumah'];?>' ;
												console.log(id_rumah) ; // buat nge-checK kalo dah lancar di komen aja ini consolelog nya !
												// BASEURL/adminpath/indexadmin?change=true&id=/id/
												// url : 'base_url()adminpath/indexadmin?change=true&id=; '+id,
												swal({
										            title: 'Verifikasi ?',
										            text: 'id = '+id_rumah,
										            confirmButtonText: 'Yes!',
										            showCancelButton: true,
										            closeOnConfirm: false
											        },function() {
											            // This function will run ONLY if the user clicked ok
											            // Only here we want to send the request to the server!
											            $.ajax({
											            	//method: 'GET',
											                type: 'GET',
											                url: '<?php echo base_url();?>index.php/controler2/verifikasi?change=true&id_rumah='+id_rumah,
											                success: function (res) {
											                    swal({title: 'Terverifikasi', text: 'id = '+res, type: 'success'},
											                    	function(){
											                    		window.location.reload();
											                    	});	
											                },
											                error : function(err){
																console.log(err) ;
														 	}
											            });
											        });
											}) ;
										">
										<i class="fa fa-check-circle" aria-hidden="true"></i></button>

										<button class="btn btn-danger btn-xs" id="<?php echo $no ?>" 
										onclick="
											$().ready(function(e){
												var id_rumah = '<?php echo $baris['id_rumah'];?>' ;
												console.log(id_rumah) ;
												swal({
										            title: 'Hapus ?',
										            text: 'id = '+id_rumah,
										            type: 'warning',
										            confirmButtonText: 'Yes!',
										            showCancelButton: true,
										            closeOnConfirm: false
											        },function() {
											            // This function will run ONLY if the user clicked ok
											            // Only here we want to send the request to the server!
											            $.ajax({
											            	//method: 'GET',
											                type: 'GET',
											                url: '<?php echo base_url();?>index.php/controler2/delete_verif?change=true&id_rumah='+id_rumah,
											                success: function (res) {
											                    swal({title: 'Berhasil Dihapus', text: 'id = '+res, type: 'success'},
											                    	function(){
											                    		window.location.reload();
											                    	});	
											                },
											                error : function(err){
																console.log(err) ;
														 	}
											            });
											        });
											}) ;
										">
										<i class="fa fa-trash-o" aria-hidden="true"></i></button>
									</td>
									
								</tr>
								<?php
								
								$no++;
								}
								if($jumlah>1){
								echo"<a href='?hal=tabel_rumah&page=1'><div class='uu'>Awal</div></a>";
								}
								for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
								if($page==$pagehal){
								echo"<span><div class='uu'>$pagehal</div></span>";
								}else{
									echo"<a href='?hal=tabel_rumah&page=$pagehal'><div class='uu'>$pagehal</div></a>";
								}
								}
								if($jumlah>1){
								echo"<a href='?hal=tabel_rumah&page=$jumlah'><div class='uu'>Akhir</div></a>";
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

      // $(function(){
      //     $('select.styled').customSelect();
      // });

  </script>

  	<!-- Sweet alert js -->
  	<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/sweetalert.min.js"></script>
	<script type="text/javascript">
		//  $(document).ready(function(){
		// 	// document.getElementById("formAjax")
		// 	$('#verif').on('submit', function(e){
		// 		e.preventDefault() ;
		// 		var id = $('#id').val()
		// 		console.log(id)
		// 		$.ajax({
		// 			url : '?id='+id,
		// 			type : 'GET',
		// 			success : function(res){
		// 				// swal("Halo " +res) ;
		// 				console.log(this.url);
		// 			},
		// 			error : function(err){
		// 				console.log(err) ;
		// 			}
		// 		})
		// 	})
		// }) ;

	</script>

  </body>

