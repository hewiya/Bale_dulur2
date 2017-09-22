<?php
if(!$_SESSION['status']) {
    header("location:index");
	}
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/penyewa/2/bootstrap.css"/>
		<title>Bale Dulur</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/penyewa/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/penyewa/dist/css/jquery.gridder.min.css" el="stylesheet">
        <link href="<?php echo base_url() ?>assets/penyewa/css/demo.css" rel="stylesheet">


		<link href="<?php echo base_url() ?>assets/penyewa/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/cufon-yui.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/cufon-aller.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/script.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/coin-slider.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYjQzMQgwK8A57sdC30gLSdW09uP5ByXw&callback=initMap"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/pemilik/latlong/jquery-1.7.1.min.js"></script>
		

		<link href="<?php echo base_url() ?>assets/penyewa/js/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url() ?>assets/penyewa/js/js-image-slider.js" type="text/javascript"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/penyewa/css/style_i.css">
	
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/penyewa/css/reset.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/penyewa/css/bs.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/penyewa/css/table.css">
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/jquery-1.3.2.js"></script>
	
	<script type="text/javascript">
		function initialize() {
            var latlng = new google.maps.LatLng(-7.797068, 110.370529);
            var myOptions = {
                zoom: 8,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("petaku"),
        myOptions);
        }

      $(document).ready(function(){
        var Yogyakarta = new google.maps.LatLng(-7.797068, 110.370529);
        var map = new google.maps.Map(document.getElementById('petaku'), {
          zoom: 12,
          center:  Yogyakarta
        });      
       <?php 
        // $db = mysqli_connect("localhost","root","","bale"); //keep your db nam
		// $sql="select * from lokasi, rumah where rumah.id_lokasi = lokasi.id_lokasi";
		// $sth = $db->query($sql);
		$query = $this->db->query("select * from lokasi, rumah where rumah.id_lokasi = lokasi.id_lokasi");

		$i=0;
		// while($result=mysqli_fetch_array($sth)){ 
		foreach ($query->result_array() as $result){
			?>
		var lokasi<?php echo $i?> = new google.maps.LatLng(<?php echo $result['latitude']?>, <?php echo $result['longitude']?>);
		var contentString<?php echo $i?> = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<?php echo '<img style="width:50px;" src="data:image/jpeg;base64,'.base64_encode( $result['foto'] ).'"/>';?>'+
      '<h3 id="firstHeading" class="firstHeading"><?php echo $result['nama_lokasi']?></h3>'+
      '<div id="bodyContent">'+      
      '<p>Rp. <?php echo $result['harga']?></p>'+
      '<p>Klik untuk melihat detail</p>'+
      '</div>'+
      '</div>';
        var marker<?php echo $i?> = new google.maps.Marker({
          position: lokasi<?php echo $i?> ,
          map: map,
          icon: '<?php echo base_url() ?>assets/pemilik/icon/restaurant.png',
        });
        var infowindow<?php echo $i?> = new google.maps.InfoWindow({
    	content: contentString<?php echo $i?>,
    	maxWidth : 200
  });
        marker<?php echo $i?>.addListener('mousemove', function() {
    infowindow<?php echo $i?>.open(map, marker<?php echo $i?>);
  });
         marker<?php echo $i?>.addListener('mouseout', function() {
    infowindow<?php echo $i?>.close(map, marker<?php echo $i?>);
  });
         marker<?php echo $i?>.addListener('click', function() {
					window.open('<?php echo base_url() ?>index.php/login/detail?id=<?php echo $result['id_lokasi']?>')
  });
         
        <?php $i++;}?>
      });
      
</script>

			<style>
			  body {
				background: #f5f5f5;
				margin: 0;
				padding: 20px 0 0 0;
				text-align: center;
				font-size: 16px;
			  }
			  h1 {
				color: #222;
				font-size: 24px;
			  }

.search_foto{
	width: 200px;
	height: 150px;
}
.data{
	
	width: 500px;
}
</style>
	
	
	
    </head>
    <body>
    <div class="atas">
		<center><img src="<?php echo base_url() ?>assets/images/templatemo_logo.png" width="400px"/></center>
		<a href="<?php echo base_url('index.php/login/logout'); ?>" onClick='return logout()'><div class="pojok1">Sign Out</div></a>
		<a href="<?php echo base_url('index.php/login/indexlogin'); ?>"<div class="pojok">Kembali</div></a>
			</div>
			
			
        
					<div class="modal-body">					
					<div id="petaku" style="width:100%; height:450px"></div>
					<!--<?php foreach ($query->result_array() as $row)
	{ ?>
					<p> <?php echo $row['id_lokasi'];?></p>
					<?php } ?>-->
                    </div>				
					
                </div>
            </div>
        </div>
    </body>
</html>