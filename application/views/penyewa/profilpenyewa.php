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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  		<!-- CSS dan JS profil-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/profil/css/styles.css">
		<script src="<?php echo base_url() ?>assets/profil/js/profil.main.js" type="text/javascript"></script>

	<script>
		function logout() {
			if (confirm ("Apakah anda yakin akan logout ?")){
			return true;
			}else{
			return false;
			}
		}
	</script>
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
	                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
	                
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
	                <div class=" col-md-9 col-lg-9 "> 
	                  <table class="table table-user-information">
	                    <tbody>
	                      <tr>
	                        <td>Nama lengkap:</td>
	                        <td><?php echo $this->session->userdata("nama"); ?></td>
	                      </tr>
	                      <tr>
	                        <td>ID:</td>
	                        <td><?php echo $this->session->userdata("id"); ?></td>
	                      </tr>
	                      <tr>
	                        <td>Email</td>
	                        <td><a href="mailto:<?php echo $this->session->userdata("email"); ?>"><?php echo $this->session->userdata("email"); ?></a></td>
	                      </tr>
	                    </tbody>
	                  </table>
	                  
	                  <a href="#" class="btn btn-primary">Edit Profil</a>
	                  <!-- <a href="#" class="btn btn-primary">Profil Tuan Rumah</a> -->
	                </div>
	              </div>
	            </div>
	                 <div class="panel-footer">
								<p class=" text-info">Last See : <span id="time"></span></p>

								<script>var today = new Date();
 								document.getElementById('time').innerHTML=today;</script>
	                    </div>
	            
	          </div>
	        </div>
	      </div>
	    </div>
    </body>
</html>