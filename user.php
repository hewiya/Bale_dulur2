<?php
	session_start();
	include "lib/koneksi.php";
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}else{
?>
<html>
	<head>
	<title></title>
	</head>
	<body>
		<?php
			if($_SESSION['privileges']!=""){
			if($_SESSION['privileges']=="1"){
		
		?>
		<script>
				window.location=(href='pemilik/index.php');
		</script>
	<?php
		}else if($_SESSION['privileges']==2){
	?>						
		<script>
				window.location=(href='penyewa/index.php');
		</script>			
	<?php
			}
		}
	?>


	</body>
</html>
<?php
	}
?>