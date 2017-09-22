<?php
    if(!$_SESSION['status']) {
        header("location:index");
    }
    $id_lokasi = isset ($_GET['id_lokasi'])?$_GET["id_lokasi"]:"";

?>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>assets/pemilik/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/w2ui-1.4.2.min.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/w2ui-1.4.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCYjQzMQgwK8A57sdC30gLSdW09uP5ByXw"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/pemilik/latlong/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css.css">
<script type="text/javascript">
// // // // // // // 
// Google Map --- //
// // // // // // // // / // // // // // // // // // // / // // // // // // // // // // / // //
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

$(document).ready(function(){
    var people = ['Kota Yogyakarta','Sleman','Bantul','Gunung Kidul','Kulon Progo'];
    $('input[type=list]').w2field('list', { items: people });
    
});
// // // // // // // // // / // // // // // // // // // // / // // // // // // // // // // / // //
</script>
<style>

#jendelainfo{position:absolute;z-index:1000;top:500;
;background-color:yellow;display:none; margin-top:20px;}

    .tumpang22{
        width: fixed;
        float: center;
    margin-top:10px;
    padding-top:5px;
    padding-bottom:30px;
    background-color:#B98849;
    opacity:0.85;
    color:#fff;
    font-family:Gill Sans MT;
    font-size:17px;
    position: absolute;
}
.tabel {
    background-color: #000;
    border-collapse: collapse;
    border-spacing: 0;
    margin-right:30px
        padding-left:30px
}

table th, table td {
    padding-top: 8px;
    line-height: 20px;
    text-align: left;
    vertical-align: top;
    width:100%;
  
}
#btn1{
    float: left;
    display: inline-block;
    width: 100px;
    margin-left: 20px;
}
#btn2{
    float: right;
    display: inline-block;
    width: 100px;
    margin-right: 20px;
    }
    
</style>

    <body onload="peta_awal()">
    <center>
    <form method="POST" action="<?php echo base_url();?>index.php/user/simpanrumah">

    <div class="tumpang22">
    <h1>INPUT LOKASI</h1>
    
    <table class="tabel" id="jendelainfo" border="1" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="50" height="136">
      
      <tr>
        <td width="200" bgcolor="#000000" height="19"><font color=white><span id="teksnama_lokasi"></span></font></td>
        <td width="30" bgcolor="#000000" height="19">
        <p align="center"><font color="RED"><a style="cursor:pointer" id="tutup" title="Tutup"><b><img src="icon/close.png"></b></a></font></td>
      </tr>
      <tr>
        <td width="290" bgcolor="#FFCC00" height="100" valign="top" colspan="2">
        <p align="left"><span id="teksalamat"></span></td>
      </tr>
    </table>
    
    <table class="tabel" border=0 width=200>
        <tr>
            <td>
                <div id="petaku" style="width:800px; height:450px; margin-top:20px; margin-bottom:15px;margin-right:50px;float:right;padding-right: 20px;"></div>
            </td>
            <td>
                <input type=hidden name=jenis onclick="setjenis(this.value)">
                <input type=hidden name=id value="<?=$_SESSION['id']?>">
                
                X : <input type="text" id="x" name="x" required oninvalid="this.setCustomValidity(' longitude tidak boleh kosong')" oninput="setCustomValidity('')"><p><br>
                
                Y : <input type=text id=y name="y" required oninvalid="this.setCustomValidity('latitude tidak boleh kosong')" oninput="setCustomValidity('')"><p>

                Nama:<br>
                <input type=text id="nama_lokasi" name="nama_lokasi" size=32 required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')"><p>
                
                    Kota:<br>
                    <select name="kota" required oninvalid="this.setCustomValidity('Kota harus dipilih')" oninput="setCustomValidity('')">
                    <option value='judul'>--Pilih Kota--</option>
                        <option value='Bantul' >Bantul</option>
                        <option value='Kota Yogyakarta' >Kota Yogyakarta</option>
                        <option value='Sleman' >Sleman</option>
                        <option value='Gunung Kidul' >Gunung Kidul</option>
                        <option value='Kulon Progo' >Kulon Progo</option>
                    </select>
                        <!--<input type="list" name="kota" required oninvalid ="this.setCustomValidity('Pilih kota')"oninout="setCustomValidity('')"><p>-->
                        
                    Kode Pos:<br>
                <input type=text id="kode_pos" name="kode_pos" size=32 required oninvalid="this.setCustomValidity('Kode Pos tidak boleh kosong')" oninput="setCustomValidity('')"><p>
                    Alamat:<br>
                <textarea cols=24 rows=3 id="alamat" name="alamat"></textarea><p>
                
            
            <img src="icon/ajax-loader.gif" style="display:none" id="loading">
            
            </td>
        </tr>
    </table>
            
            <button class="btn" id="btn2" name="submit">Simpan</button>
    
    </div>
    </form>
</body>
