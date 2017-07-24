<?php
	if(!$_SESSION['status']) {
    header("location:index");
	}
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
<title>Upload Form</title>
</head>
<body>
<div class="container" style="margin-top:20px;">
    <div class="row-fluid">
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
         <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title">Upload</h3> 
        </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                   <!--  <img alt="User Pic" src="<?php  ?>" class="img-circle img-responsive"> -->
                    <br /> <br />
                </div>
                <div class=" col-md-9 col-lg-9 "> 
		            <?php echo $error;?>

					<?php echo form_open_multipart('user/do_upload');?>

					<input type="file" name="userfile" size="20" />

					<br /><br />

					<input type="submit" value="upload" class="btn btn-primary"/>

					</form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</body>
</html>