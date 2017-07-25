<?php
// // // // // // // // //
// belum di aplikasikan // // // //
// // // // // // // // //


	include"configg.php";
	if(isset($_GET['id_rumah'])){
	$detail=isset($_GET['id_rumah'])? $_GET['id_rumah']:"";
	$select="select a.id_rumah,b.nama_lokasi,c.nama,a.tipe,a.harga from
			rumah a,lokasi b, user c where a.id_lokasi=b.id_lokasi and a.id=c.id";
	$ada=mysql_query($select)or die(mysql_error());
	$baris=mysql_fetch_array($ada);
?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <section id="container" >
      

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <a href="?hal=form_input_lokasi">Tambah</a>
							  <h4><i class="fa fa-angle-right"></i> Table Lokasi</h4>
	                  	  	  <hr>
                              <thead>
							  <body>
                              <tr>
								
                                  <th><i class="fa fa-bullhorn"></i> No</th>
                                  <th><i class="fa fa-bookmark"></i>Lokasi</th>
                                  <th><i class="fa fa-bookmark"></i>Pemilik</th>
                                  <th><i class="fa fa-bookmark"></i>Harga</th>
                
                                  <th><i class=" fa fa-edit"></i>Option</th>
                                  <th></th>
                              </tr>
                              </thead>
                              
                              <tr>
                                  
                              </tr>
							   <?php
								include('configg.php');
								if(isset($_GET['id_rumah'])){
								mysql_query("delete from rumah where id_rumah='".$_GET['id_rumah']."'")or die(mysql_error());
								}
								$query="select a.id_rumah,b.nama_lokasi,c.nama,a.tipe,a.harga from
										rumah a,lokasi b, user c where a.id_lokasi=b.id_lokasi and a.id=c.id";
								$perpage=4;
								$page=isset($_GET['page'])? $_GET['page']:"";
								empty($page)?$page=1:"";
								$offset=($page-1)*$perpage;
								$q=mysql_query("$query limit $offset,$perpage");
								$jumlah=ceil(mysql_num_rows(mysql_query($query))/$perpage);
								$return=array("tampung"=>$q,"jumlah"=>$jumlah);
								while($baris=mysql_fetch_array($q)){
								?>
	
								<tr>
									<td>
									<td><?=$baris['id_rumah']?></td>
									<td><?=$baris['nama_lokasi']?></td>
									<td><?=$baris['nama']?></td>
									<td><?=$baris['tipe']?></td>
									<td><?=$baris['harga']?></td>
									<td><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <a href="index.php?hal=tabel_lokasi&id_lokasi=<?=$baris['id_lokasi']?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
									<a href="index.php?hal=tampil_map&id_lokasi=<?=$baris['id_lokasi']?>"><button class="btn btn-success btn-xs"><i class="fa fa-file-image-o" aria-hidden="true"></i></button></a>
									</td>
								</tr>
	
								<?php
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
	}
								?>
			</table>
						  </body>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - BaleDulur
              <a href="basic_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

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
</html>
