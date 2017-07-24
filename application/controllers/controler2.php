<?php

// // // // // // // // // // // // // // // //
// Controler2 buat function-function admin   //
// // // // // // // // // // // // // // // //

/*
	PKL Vokasi UGM Q.A
	ada file Dokumentasi.txt untuk user guide dan Q.A seputar fungsi-fungsi yg ada di Bale_Dulur
*/

class Controler2 extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('koneksi');
		$this->load->model('m_login');
		$this->load->model('m_data');
	}

	// // // // // // // // // //
	// A D M I N - Tabel Rumah //
	// // // // // // // // // //

	function verifikasi(){
	//function verifikasi($ambil){
	$link = mysqli_connect("localhost", "root", "", "bale");
	if(isset($_GET['id_rumah'])){
	//if($ambil = !null){
		$id_rumah=$_GET['id_rumah'];//$ambil;
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
		echo $id_rumah;
	}else{
		echo 
		"<script>
				alert('Data gagal Update');
				location.href='<php base_url('index.php/controler/set_hal_rumah'); ?>';
		</script>";
	
		}
	}

	function delete_verif(){
		$link = mysqli_connect("localhost", "root", "", "bale");
		if(isset($_GET['id_rumah'])){
			$id_rumah=$_GET['id_rumah'];//$ambil;
		}else{
			die("Error No Id selected");
		}

		$hasil = mysqli_query($link,"delete from rumah where id_rumah='".$_GET['id_rumah']."'")or die(mysqli_error());
		if($hasil>0){
			echo $_GET['id_rumah'];
		} else {
			"<script>
					alert('Data gagal Update');
					location.href='<php base_url('index.php/controler/set_hal_rumah'); ?>';
			</script>";
		}
	}

	// // // // // // // // // // //
	// A D M I N - Tabel Lokasi   //
	// // // // // // // // // // //

	function admin_delete_lokasi(){
		$link = mysqli_connect("localhost", "root", "", "bale");
		if(isset($_GET['id_lokasi'])){
			$id_lokasi=$_GET['id_lokasi'];//$ambil;
		}else{
			die("Error No Id selected");
		}
		// if(isset($_GET['id_lokasi'])){
		// mysqli_query($link,"delete from lokasi where id_lokasi='".$_GET['id_lokasi']."'")or die(mysqli_error($link));
		// }
		$hasil = mysqli_query($link,"delete from lokasi where id_lokasi='".$_GET['id_lokasi']."'")or die(mysqli_error());
		if($hasil>0){
			echo $_GET['id_lokasi'];
		} else {
			"<script>
					alert('Data gagal Update');
					location.href='<php base_url('index.php/controler/set_hal_rumah'); ?>';
			</script>";
		}
	}

	// // // // // // // // // //
	// A D M I N - Tabel User  //
	// // // // // // // // // //

	function update_user(){
		$id = $this->input->get('id');
		$nama = $this->input->get('nama');
		$email = $this->input->get('email');
		$password = $this->input->get('password');
		$privileges = $this->input->get('privileges');

		$where = array(
			'id' => $id,
			'nama' => $nama,
			'email' => $email,
			'password' => md5($password),		// sementara
			//'password' => $password,
			'privileges' => $privileges
			);

		$this->m_data->update_user("user",$where,$id);//->num_rows();
		$this->session->set_userdata("hal","admin/admin/tabel_user");
		redirect(base_url('index.php/login/indexadmin'));

	}

	function hapus_user(){
		$link = mysqli_connect("localhost", "root", "", "bale");
		if(isset($_GET['id_user'])){
			$id_user=$_GET['id_user'];//$ambil;
		}else{
			die("Error No Id selected");
		}
		// if(isset($_GET['id_lokasi'])){
		// mysqli_query($link,"delete from lokasi where id_lokasi='".$_GET['id_lokasi']."'")or die(mysqli_error($link));
		// }
		$hasil = mysqli_query($link,"delete from user where id='".$_GET['id_user']."'")or die(mysqli_error());
		if($hasil>0){
			echo $_GET['id_user'];
		} else {
			"<script>
					alert('Data gagal Update');
					location.href='<php base_url('index.php/controler/set_hal_rumah'); ?>';
			</script>";
		}
	}


	// // // // // //
	// Lain - Lain //
	// // // // // //

	function loadhal($hal){
		$data = array(
                  	'ambil' => '0'
                    );
		$this->load->view($hal,$data);
	}

}
?>