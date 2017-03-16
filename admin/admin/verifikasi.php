<?php
	include "configg.php";
	if(isset($_GET['id_rumah'])){
		$id_rumah=$_GET['id_rumah'];
	}else{
		die("Error No Id selected");
	}
	$query="select * from rumah";
		$ada=mysql_query($query)or die(mysql_error());
		$temu=mysql_fetch_array($ada);
	switch ($temu['verifikasi'])
	{
		case 1:
			$verifikasi='Terverifikasi';
		break;
		case 2:
			$verifikasi='Upload';
		break;
	}
	$ganti="update rumah set
		 verifikasi='2' where id_rumah='$id_rumah'";
	$hasil=mysql_query($ganti)or die(mysql_error());
	if($hasil>0)
	{
		echo"<script>
			alert('Data Update');
			location.href='index.php?hal=tabel_rumah';
		</script>";
	}
	else
		{
		echo 
		"<script>
				alert('Data gagal Update');
				location.href='index.php?hal=tabel_rumah';
		</script>";
	
	}

?>
