<!DOCTYPE html>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>assets/css/w2ui-1.4.2.min.css">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/w2ui-1.4.2.min.js"></script>
  <script type="text/javascript">

  
  	function readURL(input) {
		if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#image-preview').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
 
	$(document).ready(function() {
		$("#upload-image").change(function(){
	
		    readURL(this);
		});
	});

	function popup() {
    w2popup.open({
        title: 'Preview',
        body: '<img id="image-preview" src="default.png" alt="your image" /> '
    });
}


  </script>
<style>
#image-preview {
	width: 140px;
	height: 150px;
	margin-left: 140px;


		
}

.konten {
text-align: left;
background-color:#deb887;
width: fixed;
height: 480px;
padding-left: 5%; 
padding-right: 5%; 
padding-top: 20px;
line-height: 50px;
font-size: 20px;
color: white;
margin-right: 20%;
margin-left: 20%;

}
.konten1{

	background-size: cover;
	width: 100%;
	height: 100%;


}

	.w2ui-field > div > span {
		margin-left: 20px;
	}
	
	.w2ui-field label {
	color: black;
	margin-left: 20px; 
	}
	.firsttab li{
	padding : 5px;
	}

}

body{
	font-family:Gill Sans MT;
	font-size:17px;
	background:url('../../assets/images/eew.jpg') ;
}

</style>
<?php
if (!empty($query)) {
		$row = $query->row_array();
	}else {
		$row['judul'] = '';
		$row['deskripsi'] = '';
	}?>
  <body>

  <center><h1 style="color: black">UNGGAH FOTO</h1></center>
 <div class="konten">
<form enctype='multipart/form-data' method="post" action="<?php echo base_url();?>index.php/foto/simpanfoto">



<div style="height: 20px"></div>
			<div class="w2ui-field w2ui">
<hr>	<label>Lanjutan pengisian data Dari lokasi ( <?php echo $_SESSION['lokasi']['nama_lokasi'] ?> )</label>
<hr>		<input type="hidden" name="id_lokasi" value="<? echo $_SESSION['lokasi']['id']; ?>">
				<label>Judul  : </label>
				<div><input type="text" name="judul" <?php $row=['judul'] ?>></div>
				</div>
			<div style="height: 10px"></div>
			<div class="w2ui-field w2ui">
				<label>Deskripsi  : </label>

				<div> <textarea name="keterangan" type="text" style="width: 385px; height: 80px; resize: none" <?php $row=['deskripsi'] ?>></textarea>
            </div>
			</div>
<table>
		
			<div style="height: 20px"></div>
			<div class="w2ui-field w2ui" ">
					<tbody>
<div style="padding-left: 20px;"">
	<tr id="red">
		<td style="text-align : center;">
			<img id="image-preview" src="<?php echo base_url() ?>assets/images/upload.png" alt="your image" /></td>
			<td style="text-align : center;"><input name="gambar" type="file" id="upload-image"/></td>
		
	</tr></div>
	</table><hr>
	<button class="w2ui-btn" type='submit' name="submit" style="float: right; ">Simpan</button>
                 
</form>
</div>
</div>
</body>
</html>