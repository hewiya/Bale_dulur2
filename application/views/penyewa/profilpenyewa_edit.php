<?php
	//session_start();
	//include('../lib/koneksi.php');
	//if(!isset($_SESSION['email'])){
	//	echo "<script>alert('Anda belum login, silahkan Sign In untuk melanjutkan');</script>";
	//	echo "<script>location.href='../index.php'</script>";
	//	die("Anda belum login");
	//}
	//if(!isset($_SESSION['password'])){
	//	die("Anda belum terdaftar, silahkan Sign In untuk melanjutkan");
	//}   
    //session_start();
	if(!$_SESSION['status']) {
    header("location:index");
	}
?>
<!doctype html>
<html>
    <head>
		<title>Bale Dulur</title>
		
		<!-- Bootstrap,Jquerry,Js -->
		<link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link href="<?php echo base_url() ?>assets/dist/css/jquery.gridder.min.css" rel="stylesheet">
  		<link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.css" rel="stylesheet">

  		<!-- CSS dan JS profil-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/profil/css/styles.css">
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/cufon-yui.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/cufon-aller.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.4.2.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/reset.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bs.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/table.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/penyewa/datepicker/css/datepicker.css">
		<script src="<?php echo base_url() ?>assets/penyewa/datepicker/js/bootstrap-transition.js"></script>
        <script src="<?php echo base_url() ?>assets/penyewa/datepicker/js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/coin-slider.css" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/coin-slider.min.js"></script>
        <link href="<?php echo base_url() ?>assets/penyewa/js/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url() ?>assets/penyewa/js/js-image-slider.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/penyewa/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/penyewa/css/style_i.css">

	<script>
		function logout() {
			if (confirm ("Apakah anda yakin akan logout ?")){
			return true;
			}else{
			return false;
			}
		}
	</script>
	<style>
		.datepicker{z-index:1151;}
	    </style>
	    
			<script src="<?php echo base_url() ?>assets/penyewa/js/jquery-1.10.2.js" type="text/javascript"></script>
			<script src="<?php echo base_url() ?>assets/penyewa/js/jquery-ui.js" type="text/javascript"></script>
			<script>
				$(function() {
					$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
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
	</style> 
    </head>
    <body>
    <div class="atas">
		<center><img src="<?php echo base_url() ?>assets/images/templatemo_logo.png" width="400px"/></center>
		<a href="<?php echo base_url('index.php/login/logout'); ?>" onClick='return logout()'><div class="pojok1">Sign Out</div></a>
		<a href="<?php echo base_url('index.php/login/indexlogin'); ?>"<div class="pojok">Kembali</div></a>
	</div>
		
		<div class="container">
	      <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
	   
	   
	          <div class="panel panel-info">
	            <div class="panel-heading">
	              <h3 class="panel-title">Profile</h3>
	            </div>
	            <div class="panel-body">
	              <div class="row">
	                <div class="col-md-3 col-lg-3 " align="center"> 
	                <?php
					$link = mysqli_connect("localhost", "root", "", "bale");
					$q=mysqli_query($link,"select * from user where  email='".$_SESSION['email']."'");
					while($t=mysqli_fetch_array($q)){
						$data=$t['gambar'];
					}
					if($data == ""){
						?> <img src='<?php echo base_url('assets/images/default.jpg'); ?>' width='100px' height='100px' class='img-circle img-responsive'> <?php
					}else{							// echo base_url('assets/images/'.$data);
						?> <img src="<?php echo base_url('images/'.$data); ?>" width='100px' height='100px' class="img-circle img-responsive"/> <?php  // masih harus di benarkan !
					}
					?> 
					</div>
	                
	                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
	                  <dl>
	                    <dt>DEPARTMENT:</dt>
	                    <dd>Administrator</dd>
	                    <dt>HIRE DATE</dt>
	                    <dd>11/12/2013</dd>
	                    <dt>DATE OF BIRTH</dt>
	                       <dd>11/12/2013</dd>
	                    <dt>GENDER</dt>
	                    <dd>Male</dd>
	                  </dl>
	                </div>-->
	                <center><a href="<?php echo base_url('index.php/user/profil_upload'); ?>" class="btn btn-primary" >upload</a></center>
					</form>
	                <form action="<?php echo base_url('index.php/user/update_profil'); ?>" method="post" enctype="multipart/form-data">
						<!-- <center><input type="file" name="file"> -->
	                <div class=" col-md-9 col-lg-9 "> 
	                  <table class="table table-user-information">
	                    <tbody>
	                      <tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><?php
								$q=mysqli_query($link,"select * from user where  id='".$_SESSION['id']."'");
								while($t=mysqli_fetch_array($q)){
								?><input type="text" name="nama" value="<?php echo $t['nama']; ?>"><?php
								}		
								?>
								
							</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php
								$q=mysqli_query($link,"select * from user where  id='".$_SESSION['id']."'");
								while($t=mysqli_fetch_array($q)){
								?><input type="text" name="email" value="<?php echo $t['email']; ?>"><?php
								}		
							?>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><?php
								$q=mysqli_query($link,"select * from user where  id='".$_SESSION['id']."'");
								while($t=mysqli_fetch_array($q)){
								?><input type="text" name="tanggal_lahir" id="datepicker" value="<?php echo $t['tanggal_lahir']; ?>"><?php
								}		
							?>
							</td>
						</tr>
						<tr>
							<td>No. Telpon</td>
							<td>:</td>
							<td><?php
								$q=mysqli_query($link,"select * from user where  id='".$_SESSION['id']."'");
								while($t=mysqli_fetch_array($q)){
								?><input type="text" name="telpon" value="<?php echo $t['telpon']; ?>"><?php
								}		
							?>
							</td>
						</tr>

	                    </tbody>
	                  </table>
	                  <input type="submit" name="submit" class="btn btn-primary" value="Save">
	                  <!-- <a href="#" class="btn btn-primary">Edit Profil</a> -->
	                  <!-- <a href="#" class="btn btn-primary">Profil Tuan Rumah</a> -->
	                </div>
	                </form></center>
	              </div>
	            </div>
	            
	          </div>
	        </div>
	      </div>
	    </div> 
    </body>
</html>
