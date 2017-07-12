<?php

include ('configg.php');

  $carimap = mysql_query("select * from lokasi where id_lokasi='$_GET[id_lokasi]'");
  $dcari = mysql_fetch_array($carimap);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Maps <?php echo $dcari['nama_lokasi']; ?> </title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; }
      #map-canvas { height: 100% }
    </style>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0SJxq1LevEbF6gZlTLA-xk00eDWArI8Y&sensor=false" type="text/javascript"></script>
  </head>

  <body>
    <a href="form_input_lokasi.php">Input Lokasi</a> | 
    <a href="tampil.php">Lihat Daftar Lokasi </a><br/>
    <h3>Lokasi : <?php echo $dcari['nama_lokasi']; ?></h3>
    <div id="map-canvas" style="max-width:500px;max-height: 300px;"/>
  </body>
</html>

<script type="text/javascript">
        function initialize() {
    var mapOptions = {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo "$dcari[latitude], $dcari[longitude]"; ?>)
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
    
    setMarkers(map, beaches);
  }

  var beaches = [
    ['<?php echo "$dcari[nama_lokasi]"; ?>', <?php echo "$dcari[latitude], $dcari[longitude]"; ?>],
  ];

  function setMarkers(map, locations) {
    var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
    };
    var infoWindow = new google.maps.InfoWindow;
    for (var i = 0; i < locations.length; i++) {
      var beach = locations[i];
      var myLatitudeLongitude = new google.maps.LatLng(beach[1], beach[2]);
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: beach[4],
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
      });
      var html = 'Lokasi : '+beach[0]+'<br/>Latitude : '+beach[1]+'<br/>Longitude : '+beach[2]+'';
      bindInfoWindow(marker, map, infoWindow, html);
    }
  }
 function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>