<?php

class Controler2 extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('koneksi');
		$this->load->model('m_login');
	}

	function verifikasi($ambil){
	$link = mysqli_connect("localhost", "root", "", "bale");
	//if(isset($_GET['id_rumah'])){
	if($ambil = !null){
		$id_rumah=$ambil;//$_GET['id_rumah'];
	}else{
		die("Error No Id selected");
	}
	$query="select * from rumah";
		$ada=mysqli_query($link,$query)or die(mysqli_error());
		$temu=mysqli_fetch_array($ada);
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
	$hasil=mysqli_query($link,$ganti)or die(mysqli_error());
	if($hasil>0)
	{
		echo"<script>
			alert('Data Update');
			location.href='<php base_url('index.php/controler/set_hal_rumah'); ?>';
		</script>";
	}
	else
		{
		echo 
		"<script>
				alert('Data gagal Update');
				location.href='<php base_url('index.php/controler/set_hal_rumah'); ?>';
		</script>";
	
		}
	}

	function loadhal($hal){
		$data = array(
                  	'ambil' => '0'
                    );
		$this->load->view($hal,$data);
	}

}
?>