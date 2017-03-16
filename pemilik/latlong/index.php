<?php
	session_start();
	include"../lib/koneksi.php";
	$id_lokasi = isset ($_GET['id_lokasi'])?$_GET["id_lokasi"]:"";
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCYjQzMQgwK8A57sdC30gLSdW09uP5ByXw"></script>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css.css">
<script type="text/javascript">
var peta;
var pertama = 0;
var jenis = "guesthouse";
var nama_lokasix = new Array();
var alamatx = new Array();
var i;
var url;
var gambar_tanda;
function peta_awal(){
    var Yogyakarta = new google.maps.LatLng(-7.797068, 110.370529);
    var petaoption = {
        zoom: 12,
        center: Yogyakarta,
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
        case "guesthouse":
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
 
                //set_icon(msg.wilayah.petak[i].jenis);
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
<div class="tumpang2">
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
	<input type=hidden name=jenis onclick="setjenis(this.value)"><br>
	<input type=hidden name=id value="<?=$_SESSION['id']?>"><br>
	<p>
	X : <input type=text id=x name="x"><p>
	Y : <input type=text id=y name="y"><p>
	Nama:<br>
	<input type=text id="nama_lokasi" name="nama_lokasi" size=32><p>
	Alamat:<br>
	<textarea cols=24 rows=3 id="alamat" name="alamat"></textarea><p>
	<button id="tombol_simpan">Simpan</button>
	<img src="icon/ajax-loader.gif" style="display:none" id="loading">
	</td>
	</tr>
	</table>
	</form>
</body>
</div>