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
				 <center> <h3> Table User</h3></center>
                      <table class="table table-striped table-advance table-hover">
                  	  	  
						  
                  	  	  <hr>
                          <thead>
						  <body>
						  <center>
                          <tr>
							
                              <th width="90"><i ></i> No</th>
                              <th width="200"><i ></i>Nama </th>
                              <th width="250"><i ></i>Email</th>
                              <th width="100"><i ></i>Privileges</th>
                              <th><i class=" fa fa-edit"></i>Option</th>
                              <th></th>
                          </tr>
						 
                          </thead>
                          
                          <tr>
                              
                          </tr>
                          <?php
								
							$link = mysqli_connect("localhost", "root", "", "bale");
							$no=1;
							// if(isset($_GET['id'])){
							// mysqli_query($link,"delete from user where id='".$_GET['id']."'")or die(mysqli_error($link));
							// }
							$query="select * from user";
							$perpage=6;
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
								<td><?=$baris['email']?></td>
								<td><?=$baris['privileges']?></td>
								<!-- <? /* <td>
										<a href="?hal=tabel_user&id=<?=$baris['id']?>"><button onclick="myFunction()" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
										<a href="?hal=edit_user&id=<?=$baris['id']?>"><button class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
								</td> */ ?> --> 
								<td>
								<button class="btn btn-success btn-xs" id="<?php echo $no ?>" 
										onclick="
											$().ready(function(e){
												var id_user = '<?php echo $baris['id'];?>' ;
												console.log(id_user) ;
										            $.ajax({
										            	//method: 'GET',
										                type: 'GET',
										                //url: '<?php //echo base_url();?>index.php/controler/edit_user?change=true&id_user='+id_user
										                url: '<?php echo base_url();?>index.php/controler/edit_user/'+id_user,
										                success: function (res) {
										                    console.log(this.url);
										                    window.location.reload();
										                },
										                error: function(err){
															console.log(err) ;
													 	}
										            });
											}) ;
										">
									<i class="fa fa-pencil" aria-hidden="true"></i></button>

								<button class="btn btn-danger btn-xs" id="<?php echo $no ?>" 
										onclick="
											$().ready(function(e){
												var id_user = '<?php echo $baris['id'];?>' ;
												console.log(id_user) ;
												swal({
										            title: 'Hapus ?',
										            text: 'id = '+id_user,
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
											                url: '<?php echo base_url();?>index.php/controler2/hapus_user?change=true&id_user='+id_user,
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
							echo"<a href='?hal=tabel_user&page=1'><div class='uu'>Awal</div></a>";
							}
							for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
							if($page==$pagehal){
							echo"<span><div class='uu'>$pagehal</div></span>";
							}else{
								echo"<a href='?hal=tabel_user&page=$pagehal'><div class='uu'>$pagehal</div></a>";
							}
							}
							if($jumlah>1){
							echo"<a href='?hal=tabel_user&page=$jumlah'><div class='uu'>Akhir</div></a>";
							}
						?>
                          
                          
                      </table>
					  </body>
                  </div><!-- /content-panel -->
              </div><!-- /col-md-12 -->
          </div><!-- /row -->


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

      //$(function(){
      //    $('select.styled').customSelect();
      //});

  </script>
  <!-- Sweet alert js -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/sweetalert.min.js"></script>
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


