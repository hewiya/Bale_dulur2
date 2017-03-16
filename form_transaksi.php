<?php
	require_once("lib/koneksi.php");
	$rumah_id = isset($_GET['rumah_id']) ? $_GET["rumah_id"] : "" ;
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="admin/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="admin/admin/assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="admin/admin/assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="admin/admin/assets/css/style.css" rel="stylesheet">
    <link href="admin/admin/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0SJxq1LevEbF6gZlTLA-xk00eDWArI8Y&sensor=false" type="text/javascript"></script>
</head>
<body>
	<section id="container" >
		
		<section class="wrapper">
		<div class="row mt">
		<div class="col-lg-12">
          			<div class="form-panel">
      <h3><i class="fa fa-angle-right"></i> Form Transaksi</h3>
	  <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
				<form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="#">
				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Nama Lokasi</label>
                        <div class="col-sm-10">
						
						<?php
						$lokasi = mysql_fetch_array(mysql_query("SELECT * FROM rumah, lokasi 
				WHERE lokasi.id_lokasi = rumah.id_lokasi
				AND rumah.id_rumah =".$rumah_id));
							
						?>
							<input type='text' class="form-control" name="lokasi" value="<?= $lokasi['nama_lokasi'];?>" />
							</div>
						</div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                         <div class="col-sm-10">
						<select name="id" class="form-control"><option>-Pilih-</option>
						<?php
								
								$query=mysql_query("select * from user");
								while($tampung=mysql_fetch_array($query)){
								echo "<option value='$tampung[id]'>$tampung[nama]</option>";
								}
						?>
							</select>
							</div>
						</div>
				
				
				<div class="form-group">
                   <label class="col-sm-2 col-sm-2 control-label">Harga</label>
					<div class="col-sm-10">
					<input type='text' class="form-control" name="harga" value="<?= $lokasi['harga'];?>"/>
					</div>
				</div>
				
				
				<div class="form-group">
				<label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
                   <div class='col-sm-10'>
						<input type='text' class="form-control" name="mulai"id='datetimepicker4' />
						</div>
						<script type="text/javascript">
						
						</script>
					</div>
					<div class="form-group">
				<label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali</label>
                   <div class='col-sm-10'>
						<input type='text' class="form-control" name="kembali"id='datetimepicker5' />
						</div>
						<script type="text/javascript">
						
						</script>
					</div>
					
				
				
				<br>
					<button type="submit" class="btn btn-theme"name="simpan">Simpan</button>
					
					<button class="btn btn-theme" type="submit" name="batal" onClick="self.history.back()">Batal</button>
					<a href="?hal=tabel_rumah">Tampil</a>
					</div>
				</form>
				</div>
				</div>
				
</body>
	<?php
	
	if(isset($_POST['simpan'])){
		extract($_POST);
		
		$simpan="insert into transaksi(id_transaksi,id_rumah,id,status,tanggal_mulai,tanggal_selesai) values
				('$id_transaksi','$id_rumah','$id','1','$mulai','$selesai')";
		$hasil=mysql_query($simpan)or die(mysql_error());
		
	}
?>
</div>
</div>

 </section>
</section>
<script src="admin/admin/assets/js/jquery.js"></script>
    <script src="admin/admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="admin/admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="admin/admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="admin/admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>



    <!--script for this page-->
    <script src="admin/admin/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="admin/admin/assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="admin/admin/assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	<script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
	
	<script type="text/javascript" src="admin/admin/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	
    
  <script>
      //custom select box
	$(function () {
			$('#datetimepicker4').datetimepicker();
			});
			$(function () {
			$('#datetimepicker5').datetimepicker();
			});
      $(function(){
          $('select.styled').customSelect();
      });

  </script>
 
  </body>
</html>

