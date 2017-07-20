<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controler extends CI_Controller {
	var $hal_admin;				// var global buat di halaman admin

	function __construct(){
		parent::__construct();		
		$this->load->model('koneksi');
		$this->load->model('m_login');
		$this->load->model('m_data');
	}

	function user(){
		$data['user'] = $this->koneksi->ambil_data()->result();
		$this->load->view('welcome/index2.php',$data);
	}
	
	// // // // // // // // //
	// under construction	//
	// // // // // // // // //

	function simpanrumah(){
	$x = $_GET['x'];
	$y = $_GET['y'];
	$nama_lokasi = $_GET['nama_lokasi'];//judul--nama_lokasi
	$alamat = $_GET['alamat']; //alamat-- des
	$jenis  = $_GET['jenis'];
	$id=$_SESSION['id'];
	//$id_lokasi=$_POST['id_lokasi'];
	//$id_lokasi=mysql_fetch_array($data1['id_lokasi'])
	 
	$masuk = mysql_query("insert into lokasi(nama_lokasi,jenis,alamat,latitude,longitude,id)
	values('$nama_lokasi','$jenis','$alamat','$x','$y','$id')")or die (mysql_error());
	if($masuk){
		echo "<script>
				window.alert('Data berhasil disimpan !');
				window.location=(href='../index_rumah.php');
			</script>";
			}else{
				echo "<script>
					alert('Data masih kosong!');
				</script>";
		}
	}	

	// // // // // // // // // //
	//	Admin - Div Panel bar  //
	// // // // // // // // // //

	function set_hal_welcome(){
		$this->session->set_userdata("hal","admin/admin/welcome");
		redirect(base_url('index.php/login/indexadmin'));
	}
	function set_hal_rumah(){
		//$this->session->set_userdata("hal","index.php/controler/tabel_rumah");
		$this->session->set_userdata("hal","admin/admin/tabel_rumah");
		redirect(base_url('index.php/login/indexadmin'));
	}
	function set_hal_lokasi(){
		//$this->session->set_userdata("hal","index.php/login/tabel_lokasi");
		$this->session->set_userdata("hal","admin/admin/tabel_lokasi");
		redirect(base_url('index.php/login/indexadmin'));
	}
	function set_hal_transaksi(){
		//$this->session->set_userdata("hal","index.php/login/tabel_transaksi");
		$this->session->set_userdata("hal","admin/admin/tabel_transaksi");
		redirect(base_url('index.php/login/indexadmin'));
	}
	function set_hal_user(){
		//$this->session->set_userdata("hal","index.php/login/tabel_user");
		$this->session->set_userdata("hal","admin/admin/tabel_user");
		redirect(base_url('index.php/login/indexadmin'));
	}

	// // // // // // // // // //
	// Admin - load Edit user  //
	// // // // // // // // // //

	function set_hal_edit_user(){
		//$this->session->set_userdata("hal","index.php/login/tabel_user");
		if(isset($_GET['id_user'])){
			$id_user=$_GET['id_user'];//$ambil;
			$this->session->set_userdata("hal","admin/admin/edit_user");
			redirect(base_url('index.php/login/indexadmin'));
			//window.location.reload();
		}else{
			die("Error No Id selected");
			redirect(base_url('index.php/login/indexadmin'));
			//window.location.reload();
		}
		//$this->session->set_userdata("hal","admin/admin/edit_user");
		//redirect(base_url('index.php/login/indexadmin'));
	}

	function edit_user($id){
	//if(isset($_GET['id_user'])){
	if(isset($id)){
		$this->session->set_userdata("tampung",$id);
		//$data = array('id_user' => $id);
		//$data = array('id_user' => $_GET['id_user']);
		$this->session->set_userdata("hal","admin/admin/edit_user");
		//$this->load->view('admin/admin/edit_user',$data);
		//redirect(base_url('index.php/login/indexadmin?change=true&id_user='.$_GET['id_user']));
		//redirect(base_url('index.php/login/indexadmin?change=true&id_user='.$id));
		} else {
			die("no id selected");
		}
	}


	// // // // // // // // // // // // // // //
	//	kebawah hanya Fungsi nge-load halaman // 
	// // // // // // // // // // // // // // //

	function indexlatlong(){
		$this->load->view('pemilik/latlong/index');
	}

	function indexlokasi(){
		$this->load->view('pemilik/latlong/simpanlokasi');
	}
}