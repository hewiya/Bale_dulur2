<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controler extends CI_Controller {
	var $hal_admin;				// var global buat di halaman admin

	function __construct(){
		parent::__construct();		
		$this->load->model('koneksi');
		$this->load->model('m_login');
	}

	function user(){
		$data['user'] = $this->koneksi->ambil_data()->result();
		$this->load->view('welcome/index2.php',$data);
	}
	
	// under construction
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

	//
	//	Admin 
	//
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


	//
	//	di koment aja.
	//
	/*
	function tabel_rumah(){
		$hal = $this->session->userdata("hal");
		if ($hal = "index.php/controler/tabel_rumah") {
			$this->load->view('admin/admin/tabel_rumah');
		}
	}
	function tabel_lokasi(){
		$hal = $this->session->userdata("hal");
		if ($hal = "index.php/login/tabel_lokasi") {
			$this->load->view('admin/admin/tabel_lokasi');
		}
	}
	function tabel_transaksi(){
		$hal = $this->session->userdata("hal");
		if ($hal = "index.php/login/tabel_transaksi") {
			$this->load->view('admin/admin/tabel_transaksi');
		}
	}
	function tabel_user(){
		$hal = $this->session->userdata("hal");
		if ($hal = "index.php/login/tabel_user") {
			$this->load->view('admin/admin/tabel_user');
		}
	}
	*/

	//
	//	kebawah hanya Fungsi nge-load halaman
	//

	function indexlatlong(){
		$this->load->view('pemilik/latlong/index');
	}

	function indexlokasi(){
		$this->load->view('pemilik/latlong/simpanlokasi');
	}
}