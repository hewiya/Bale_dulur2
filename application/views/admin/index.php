<?php
	 $this->session->sess_destroy();
	// //include("admin/configg.php");

	// if(!$_SESSION['status']) {
 //    header("location:index");
	// }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LOGIN ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- js placed at the end of the document so the pages load faster //// khusus yg ini di atas, page nya kecil soalnya-->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>

    
  </head>

  <body>

      <!-- ***********************************************************************************************************************************
      MAIN CONTENT
      ************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <!-- <form class="form-login" action="log.php?op=in" method="post" id="login-form"> -->
		      <form class="form-login" action="<?php echo base_url('index.php/login/aksi_login_admin'); ?>" method="post" id="login-form">
		        <h2 class="form-login-heading">LOG IN</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username_admin" id="username_admin" placeholder="Username" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password_admin" id="password_admin" placeholder="Password">
		            <br>
		            <button class="btn btn-theme btn-block" type="submit" name="login"><i class="fa fa-lock"></i> LOG IN</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            
		                
		            </div>
		            
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      
		                     
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url() ?>assets/admin/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
