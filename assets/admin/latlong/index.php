<?php
 include"configg.php";
?>
<html>
<head>
<title>Lat Long Picker</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCYjQzMQgwK8A57sdC30gLSdW09uP5ByXw"></script>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css.css">
<script type="text/javascript">
var peta;
var pertama = 0;
var jenis = "restoran";
var nama_lokasix = new Array();
var alamatx = new Array();
var i;
var url;
var gambar_tanda;
function peta_awal(){
    var klaten = new google.maps.LatLng(-7.712182, 110.596790);
    var petaoption = {
        zoom: 12,
        center: klaten,
        mapTypeId: google.maps.MapTypeId.HYBRID
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
}
 
$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
        var nama_lokasi = $("#nama_lokasi").val();
        var alamat = $("#alamat").val();
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&nama_lokasi="+nama_lokasi+"&alamat="+alamat+"&jenis="+jenis,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#nama_lokasi").val("");
                $("#alamat").val("");
                ambildatabase('akhir');
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());
 
}
 
function set_icon(jenisnya){
    switch(jenisnya){
        case "restoran":
            gambar_tanda = 'icon/restaurant.png';
            break;
        case "piknik":
            gambar_tanda = 'icon/piknik.png';
            break;
        case  "masjid":
            gambar_tanda = 'icon/mosque.png';
            break;
    }
}
 
function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1";
    }else{
        url = "ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                nama_lokasix[i] = msg.wilayah.petak[i].nama_lokasi;
                alamatx[i] = msg.wilayah.petak[i].alamat;
 
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);
 
            }
        }
    });
}
 
function setjenis(jns){
    jenis = jns;
}
 
function setinfo(petak, id_lokasi){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksnama_lokasi").html(nama_lokasix[id_lokasi]);
        $("#teksalamat").html(alamatx[id_lokasi]);
    });
}
</script>
<style>
#jendelainfo{position:absolute;z-index:1000;top:100;
left:400;background-color:yellow;display:none;}
</style>
</head>
<body onload="peta_awal()">
<center>
<form action="latlong/simpanlokasi.php" method="GET">
<h1>INPUT LOKASI</h1>
<table id="jendelainfo" border="1" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="250" height="136">
  <tr>
    <td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnama_lokasi"></span></font></td>
    <td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="RED"><a style="cursor:pointer" id="tutup" title="Tutup"><b><img src="icon/close.png"></b></a></font></td>
  </tr>
  <tr>
    <td width="290" bgcolor="#FFCC00" height="100" valign="top" colspan="2">
    <p align="left"><span id="teksalamat"></span></td>
  </tr>
</table>
<table border=0 width=800>
<tr><td>
<div id="petaku" style="width:600px; height:400px"></div>
</td>
<td valign=top>
Pilih jenis lokasi<p>
<input type=radio checked name=jenis value="restoran" onclick="setjenis(this.value)"><img src="icon/restaurant.png"> Restoran<br>
<input type=radio name=jenis value="piknik" onclick="setjenis(this.value)"><img src="icon/piknik.png"> Rekreasi<br>
<input type=radio name=jenis value="masjid" onclick="setjenis(this.value)"><img src="icon/mosque.png"> Masjid<br>
<p>
X : <input type=text id=x name="x"><p>
Y : <input type=text id=y name="y"><p>
Nama:<br>
<input type=text id="nama_lokasi" name="nama_lokasi" size=32><p>
alamat:<br>
<textarea cols=24 rows=3 id="alamat" name="alamat"></textarea><p>
<button id="tombol_simpan">Simpan</button>
<img src="icon/ajax-loader.gif" style="display:none" id="loading">
</td>
</tr>
</table>
</form>
<br>
<table width="815" border="0" cellspacing="1" cellpadding="2" align="center">
<tr>
	<td>No</td>
	<td>Nama Lokasi</td>
	<td>Alamat</td>
	<td>Option</td>
</tr>
<?php include_once 'configg.php'; 
            $id= isset($_GET['id']) ? $_GET['id'] : "";
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
									<td><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <a href="index.php?hal=tabel_lokasi&id_lokasi=<?=$baris['id_lokasi']?>"><button onclick="myFunction()" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
									<a href="index.php?hal=tampil_map&id_lokasi=<?=$baris['id_lokasi']?>"><button class="btn btn-success btn-xs"><i class="fa fa-file-image-o" aria-hidden="true"></i></button></a>
									</td>
									
								</tr>
								<?php
								$no++;
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
            ?>
          <div class="cleaner"></div>
      </div><!-- End Of welcome area -->
</div>
</body>
</html>