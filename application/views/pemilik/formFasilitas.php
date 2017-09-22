<?php
    if(!$_SESSION['status']) {
        header("location:index");
    }
    //$id_lokasi = isset ($_GET['id_lokasi'])?$_GET["id_lokasi"]:"";
    $user_data = $this->session->userdata('lokasi');
?>

<!DOCTYPE html>

	<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/asset/js/jQuery.headroom.min.js"></script>
	<script src="<?php echo base_url() ?>assets/asset/js/template.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>assets/asset/css/field.css">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>assets/asset/css/bootstrap.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/asset/css/main.css">
  <script type="text/javascript" >
  $(document).ready(function(){
    // This button will increment the value
    $('.qtyplus,.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)&& currentVal <16) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus,.qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1 ) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
            }
            });
            });     

  </script>
<script type="text/javascript" >
$(document).ready(function(){
      $("#autoUpdate").ready(function(){
      $("#autoUpdate").hide(0);
    });
$('#rt').change(function(){
    if($(this).is(":checked"))
    $('#autoUpdate').fadeIn('slow');
    else
    $('#autoUpdate').fadeOut('slow');

    });
});
$(document).ready(function(){
      $("#autoUpdate1").ready(function(){
      $("#autoUpdate1").hide(0);
    });
$('#rk').change(function(){
    if($(this).is(":checked"))
    $('#autoUpdate1').fadeIn('slow');
    else
    $('#autoUpdate1').fadeOut('slow');

    });
});

$(document).ready(function(){
      $("#autoUpdate2").ready(function(){
      $("#autoUpdate2").hide(0);
    });
$('#rm').change(function(){
    if($(this).is(":checked"))
    $('#autoUpdate2').fadeIn('slow');
    else
    $('#autoUpdate2').fadeOut('slow');

    });
});

$(document).ready(function(){
      $("#autoUpdate3").ready(function(){
      $("#autoUpdate3").hide(0);
    });
$('#kt').change(function(){
    if($(this).is(":checked"))
    $('#autoUpdate3').fadeIn('slow');
    else
    $('#autoUpdate3').fadeOut('slow');

    });
});

$(document).ready(function(){
      $("#autoUpdate4").ready(function(){
      $("#autoUpdate4").hide(0);
    });
$('#km').change(function(){
    if($(this).is(":checked"))
    $('#autoUpdate4').fadeIn('slow');
    else
    $('#autoUpdate4').fadeOut('slow');

    });
});



</script>
	</head>
<style>

label{
	text-align: left;
}

#btn1{
  float: left;
  display: inline-block;
  width: 100px;
  margin-left: 120px;
  margin-bottom: 20px;
  margin-top: 20px;
  
}
#btn2{
  float: right;
  display: inline-block;
  width: 100px;
  margin-right: 75px;
  margin-bottom: 20px;
  margin-top: 20px;

  }
  .container{
    position: n ;
    padding-top: 25px;
    padding-bottom: 10px;
    margin-left:45px; 
    background-color:#B98849;
   

  }
	
</style>

	<body>
    
	<form method="POST" action="<?php echo base_url();?>index.php/user/simpanfasilitas">

      <!-- Article main content -->
      <center>
   
          <h2 style="color: white;">INPUT FASILITAS</h2>
        </center>
        <div class="container" >
        <div class="col-md-12">
        <div class="panel panel-default">
						<div class="panel-body"  style="background-color: #dab887; padding : 0px 20px 20px 20px;">
                 <div class="top-margin">
                 <label>Lanjutan pengisian data Dari lokasi ( <?php echo $_SESSION['lokasi']['nama_lokasi'] ?> )</label>
                <input type="hidden" name="id_lokasi" value="<?php echo $_SESSION['lokasi']['id']; ?>"><?php
                        // // // // // // // // // // // // // // // // //
                        // ^buat ngambil id_lokasi yang terkahir di buat//
                        // // // // // // // // // // // // // // // // //
                        //echo $_SESSION['lokasi']['id'] 
                        ?>
                </div>
                 
                 <div class="top-margin"><br>
                      <label>Jumlah Ruang<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="jml_ruang" placeholder="inputkan angka" required oninvalid="this.setCustomValidity('Jumlah ruang harus diisi')" oninput="setCustomValidity('')">
                 </div><hr>
                 <div class="top-margin">
                <label>Ukuran Rumah</label>
                </div>
                 <div class="top-margin">
                      
                        <input type="text" class="form-control" name="panjang" value="" placeholder="Panjang (m)" required oninvalid="this.setCustomValidity('ukuran panjang harus diisi')" oninput="setCustomValidity('')">
               </div><br>
              <div class="top-margin">
                        <input type="text" class="form-control" name="lebar" value="" placeholder="Lebar (m)" required oninvalid="this.setCustomValidity('ukuran lebar harus diisi')" oninput="setCustomValidity('')">
                 </div>
            <hr>
                
                 <div class="top-margin">
                <label>Pengguna Rumah<span class="text-danger">*</span></label>
                </div>
                
                 <div class="top-margin">
                 <div>
                  <select class="form-control" name ='jumlah' required oninvalid="this.setCustomValidity('pilih jumlah pengguna')" onselect="setCustomValidity('')">
                      <option>----pilih jumlah pengguna----</option>
                      <option name='pertama'>1-3</option>
                      <option name='kedua'>4-6</option>
                      <option name='ketiga'>7-9</option>
                      <option name='keempat'>9</option>
                      </select>
                 </div>
                 </div><br>
                 <div class="top-margin">
                 <div>
                 
                  <select class="form-control" name ='pengguna'>
                      <option>----pilih pengguna rumah----</option>
                      <option name='anak'>Anak-anak</option>
                      <option name='remaja'>Remaja</option>
                      <option name='dewasa'>Dewasa</option>
                      <option name='lansia'>Lansia</option>
                      <option name='other'>Lain-lain</option>
                      </select>
                 </div>
                 </div>
                 <div class="top-margin">
            
                 <hr>
                 <div class="top-margin">
                      <label>Harga<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="harga" placeholder="inputkan angka" />
                 </div><hr>
                 <label>Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control" value="" placeholder="Deskripsi Rumah"></textarea>
                    <br><hr>

                     <label>Jenis Ruang<span class="text-danger">*</span></label><br>
              
                <input type="checkbox" id="rt" value="1">   Ruang Tamu
                <div id="autoUpdate" class="autoUpdate"><br>
                 <input type='button' value='-' class='qtyminus' field='quantity' style="width:30px; height:30px ; border-radius: 2; margin-left:18px " />

                <input type="text" name='quantity' placeholder="1-16" class='qty' style="width: 50px; padding-left:2px ;text-align:center; ; height: 30px; "/>

                <input type='button' value='+' class='qtyplus' field='quantity' style="width:30px; height:30px ; border-radius: 2" /><br>
                </div><br>

                <input type="checkbox" name="rk" id="rk" value="2">   Ruang Keluarga
                <div id="autoUpdate1" class="autoUpdate1"><br>
                 <input type='button' value='-' class='qtyminus' field='quantity1' style="width:30px; height:30px ; border-radius: 2; margin-left:18px " />

                <input type="text" name='quantity1' placeholder="1-16" class='qty' style="width: 50px; padding-left:2px ;text-align:center; ; height: 30px; "/>

                <input type='button' value='+' class='qtyplus' field='quantity1' style="width:30px; height:30px ; border-radius: 2" /><br>
                </div><br>
                <input type="checkbox" name="rm" id="rm" value="3">   Ruang Makan
                <div id="autoUpdate2" class="autoUpdate2"><br>
                <input type='button' value='-' class='qtyminus' field='quantity2' style="width:30px; height:30px ; border-radius: 2; margin-left:18px " />

                <input type="text" name='quantity2' placeholder="1-16" class='qty' style="width: 50px; padding-left:2px ;text-align:center; ; height: 30px; "/>

                <input type='button' value='+' class='qtyplus' field='quantity2' style="width:30px; height:30px ; border-radius: 2" /><br>
                </div><br>

                <input type="checkbox" name="kt" id="kt" value="4">   Kamar Tidur
                <div id="autoUpdate3" class="autoUpdate3"><br>
                <input type='button' value='-' class='qtyminus' field='quantity3' style="width:30px; height:30px ; border-radius: 2; margin-left:18px " />

                <input type="text" name='quantity3' placeholder="1-16" class='qty' style="width: 50px; padding-left:2px ;text-align:center; ; height: 30px; "/>

                <input type='button' value='+' class='qtyplus' field='quantity3' style="width:30px; height:30px ; border-radius: 2" /><br>
                </div><br>

                <input type="checkbox" name="km" id="km" value="4">   Kamar Mandi
                <div id="autoUpdate4" class="autoUpdate4"><br>
                <input type='button' value='-' class='qtyminus' field='quantity4' style="width:30px; height:30px ; border-radius: 2; margin-left:18px " />

                <input type="text" name='quantity4' placeholder="1-16" class='qty' style="width: 50px; padding-left:2px ;text-align:center; ; height: 30px; "/>

                <input type='button' value='+' class='qtyplus' field='quantity4' style="width:30px; height:30px ; border-radius: 2" /><br>
                </div>
                
                <hr>
                <div class="top-margin">
                <label>Fasilitas Rumah<span class="text-danger">*</span></label>
                </div><br>

               <!-- <img src="asset/images/fasilitas.jpg" style="width: 100px; height: 150px; position:relative;">-->
                
                <center>
                  <input type="hidden" name="almari" value="TIDAK ADA" />
                <input type="checkbox" name="almari" value="ADA" style="width:20px; height: 20px;"><img src="<?php echo base_url() ?>assets/images/fasilitas/almari.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px; ">
                  <input type="hidden" name="ac" value="TIDAK ADA" />
                <input type="checkbox" name="ac" value="ADA" style="width:20px; height: 20px;"><img src="<?php echo base_url() ?>assets/images/fasilitas/ac.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px; ">

                <input type="hidden" name="tv" value="TIDAK ADA" />
                <input type="checkbox" name="tv" value="ADA" style="width:20px; height: 20px;"> <img src="<?php echo base_url() ?>assets/images/fasilitas/tv.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px; ">

               <input type="hidden" name="kulkas" value="TIDAK ADA" />
                <input type="checkbox" name="kulkas" value="ADA" style="width:20px; height: 20px;"> <img src="<?php echo base_url() ?>assets/images/fasilitas/kulkas.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px;">
                 
                 <input type="hidden" name="internet" value="TIDAK ADA" />
                 <input type="checkbox" name="internet" value="ADA" style="width:20px; height: 20px;">  <img src="<?php echo base_url() ?>assets/images/fasilitas/wifi.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px;">

                 <input type="hidden" name="parkir" value="TIDAK ADA" />
                 <input type="checkbox" name="parkir" value="ADA" style="width:20px; height: 20px;"> <img src="<?php echo base_url() ?>assets/images/fasilitas/garasi.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px;">

                 <input type="hidden" name="mesincuci" value="TIDAK ADA" />
                 <input type="checkbox" name="mesincuci" value="ADA" style="width:20px; height: 20px;"> <img src="<?php echo base_url() ?>assets/images/fasilitas/mesincuci.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px;">

                 <input type="hidden" name="dapur" value="TIDAK ADA" />
                  <input type="checkbox" name="dapur" value="ADA" style="width:20px; height: 20px;"> <img src="<?php echo base_url() ?>assets/images/fasilitas/kitchen.png" style="width: 80px; height: 90px; position:relative;margin-right: 20px;">
                  </center>
            
                  </div>
                  </div>
                  
            </div>
          </div>

        </div>

        
 



      <!-- /Article -->

    
   <!-- /container -->

               

  </div>              



</div>
 </div>
 <footer>
      <button id="btn2" name="submit">Simpan</button>  
</footer>
	</form>
  
	</body>
</html>