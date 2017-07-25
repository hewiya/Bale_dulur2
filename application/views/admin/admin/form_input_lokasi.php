<?php

// // // // // // // // //
// belum di aplikasikan // // // //
// // // // // // // // //

	include ("configg.php");
?>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0SJxq1LevEbF6gZlTLA-xk00eDWArI8Y&sensor=false" type="text/javascript"></script>
  </head>
  <body>
  <section id="container" >
      <h3><i class="fa fa-angle-right"></i> Form Input Lokasi</h3>
      <!--main content start-->
      
          
          	
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
                      <form class="form-horizontal style-form" method="POST" action="#" name="input_lokasi" enctype="multipart/form-data">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Lokasi</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nama_lokasi" class="form-control" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-10">
                                  <input type="text" name="alamat" class="form-control" value="">
                                  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Latittude</label>
                              <div class="col-sm-10">
                                  <input type="text" name="lat" id="lat"class="form-control" value="">
                                  
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                              <div class="col-sm-10">
                                  <input type="text" name="lng" id="lng"class="form-control" value="">
                                  <br>
								  <button type="submit" class="btn btn-theme" name="simpan">Simpan</button>
								  <a href='?hal=tabel_lokasi'>Tampil</a>
                              </div>
							  
							  
							  
                          </div>
           
                      </form>
					  <?php
						if(isset($_POST['simpan'])){
						extract($_POST);
						$sql = "INSERT INTO lokasi(nama_lokasi, alamat, latitude, longitude) VALUES ('$nama_lokasi', '$alamat', '$lat', '$lng')";
						$result = mysql_query($sql) or die (mysql_error());
						if($result){
							echo"<a href='?hal=tampil'>Tampil</a>";
							
						}else{
							
							echo"gagal";
						}
						}	
					?>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
         
          	
          	
          	
		</section><! --/wrapper -->


      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - BaleDulur
              <a href="form_component.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  <script type="text/javascipt">
		document.getElementById('reset').onclick=function(){
			var field1=document.getElementById('lng');
			var field2=document.getElementById('lat');
			field1.value=field1.defaultValue;
			field2.value=field2.defaultValue;
		};
	</script>
	<script type="text/javascipt">
		function updateMarkerPosition(latitudeLongitude){
			document.getElementById('lat').value=[latLng.lat()];
			document.getElementById('lng').value=[latLng.lng()];
		}
		
		var myOptions={
			zoom: 7,
			scaleControl:true,
			center: new google.maps.latLng(-6.2103572705384975,106.85128400000008),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

		var marker1 = new google.maps.Marker({
		 position : new google.maps.LatLng(-6.2103572705384975,106.85128400000008),
		 title : 'lokasi',
		 map : map,
		 draggable : true
		 });
 
 //updateMarkerPosition(latLng);

		 google.maps.event.addListener(marker1, 'drag', function() {
		  updateMarkerPosition(marker1.getPosition());
		 });
</script>

  </body>
</html>

