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
                                  <th><i class=" fa fa-edit"></i>Option</th>
                                  <th></th>
                              </tr>
							 
                              </thead>
                              
                              <tr>
                                  
                              </tr>
                              <?php
								include('configg.php');
								$no=1;
								if(isset($_GET['id'])){
								mysql_query("delete from user where id='".$_GET['id']."'")or die(mysql_error());
								}
								$query="select * from user";
								$perpage=6;
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
									<td><?=$baris['nama']?></td>
									<td><?=$baris['email']?></td>
									<td>
											<a href="index.php?hal=tabel_user&id=<?=$baris['id']?>"><button onclick="myFunction()" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
											<a href="index.php?hal=edit_user&id=<?=$baris['id']?>"><button class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
									</td>
									
								</tr>
								
								<?php
								$no++;
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_user&page=1'><div class='uu'>Awal</div></a>";
								}
								for($pagehal=1;$pagehal<=$jumlah;$pagehal++){
								if($page==$pagehal){
								echo"<span><div class='uu'>$pagehal</div></span>";
								}else{
									echo"<a href='?hal=tabel_user&page=$pagehal'><div class='uu'>$pagehal</div></a>";
								}
								}
								if($jumlah>1){
								echo"<a href='index.php?hal=tabel_user&page=$jumlah'><div class='uu'>Akhir</div></a>";
								}
							?>
                              
                              
                          </table>
						  </body>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


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


