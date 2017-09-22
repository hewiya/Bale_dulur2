<?php
  if(!$_SESSION['status']) {
    header("location:loginadmin");
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Dashboard Admin </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/assets/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/admin/assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url('index.php/controler/set_hal_welcome'); ?>" class="logo"><b>DASHBOARD ADMIN</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
              <li><p class="hello">Hello , <?php echo $this->session->userdata("nama"); ?></p></li>
                    <li><button class="logout" id="logout_btn" onclick="return logout()"><a href="<?php echo base_url('index.php/login/logout_admin'); ?>">Logout</a></button></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"></a></p>
              	  <h2 class="centered">ADMIN</h2>
              	  	
					<li class="sub-menu">
                      <a href="<?php echo base_url('index.php/controler/set_hal_welcome'); ?>" >
                          <i class="fa fa-th"></i>
                          <span>Dashboard</span>
                      </a>
					
                  <li class="sub-menu">
                      <a href="<?php echo base_url('index.php/controler/set_hal_rumah'); ?>">
                          <i class="fa fa-home" aria-hidden="true"></i>
                          <span>Rumah</span>
                      </a>
                      
                  </li>
				  <li class="sub-menu">
                      <a href="<?php echo base_url('index.php/controler/set_hal_lokasi'); ?>" >
                          <i class="fa fa-desktop"></i>
                          <span>Lokasi</span>
                      </a>
                      
                  </li>
				   <li class="sub-menu">
                      <a href="<?php echo base_url('index.php/controler/set_hal_transaksi'); ?>" >
                          <i class="fa fa-usd" aria-hidden="true"></i>
                          <span>Transaksi</span>
                      </a>
                      
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url('index.php/controler/set_hal_user'); ?>" >
                          <i class="fa fa-tasks"></i>
                          <span>User</span>
                      </a>
                      
                  </li>
			
                  
                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
			  <div class="col-lg-9 main-chart">
				
			   
					<?php 
                /* //OLD
								$hal=isset($_GET['hal'])?$_GET['hal']:"";
								if($hal){
								require_once("".$hal.".php");
								} else{
									require_once("welcome.php");
								}
                */
                $hal = $this->session->userdata("hal");
                //$data = array(
                //        'ambil' => '0'
                //        );
                if(isset($data)){
                  $this->load->view($hal,$data);
                } else {
                  $this->load->view($hal);
                }
							?>
					<div class="col-lg-9 main-chart">
					
				
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                 </div> 
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
				 
                 </div><!--/row -->
              
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/sparkline-chart.js"></script>    
	 <script src="<?php echo base_url() ?>assets/admin/assets/js/zabuto_calendar.js"></script>	
	
	<!--<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>-->
	
	<script type="application/javascript">
        //
        //  Date
        //

        // $(document).ready(function () {
        //     $("#date-popover").popover({html: true, trigger: "manual"});
        //     $("#date-popover").hide();
        //     $("#date-popover").click(function (e) {
        //         $(this).hide();
        //     });
        
        //     $("#my-calendar").zabuto_calendar({
        //         action: function () {
        //             return myDateFunction(this.id, false);
        //         },
        //         action_nav: function () {
        //             return myNavFunction(this.id);
        //         },
        //         ajax: {
        //             url: "show_data.php?action=1",
        //             modal: true
        //         },
        //         legend: [
        //             {type: "text", label: "Special event", badge: "00"},
        //             {type: "block", label: "Regular event", }
        //         ]
        //     });
        // });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }

        function logout() {
          if (confirm ("ingin logout ?")){
            return true;
            }else{
            return false;
            } 
        }
         
    </script>
  

  </body>
</html>
