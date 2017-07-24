<?php 

// // // // // // // // // // // // // // // // // // // // // // // // //
// controler login buat function-function yg berhubungan dengan login   //
// // // // // // // // // // // // // // // // // // // // // // // // //

/*
	PKL Vokasi UGM Q.A
	ada file Dokumentasi.txt untuk user guide dan Q.A seputar fungsi-fungsi yg ada di Bale_Dulur
*/

class Login extends CI_Controller{


	function __construct(){
		parent::__construct();		
		$this->load->model('koneksi');
		$this->load->model('m_login');
		$this->load->model('m_data');
	}

	function aksi_login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $username,
			'password' => md5($password)		// sementara
			//'password' => $password
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();	//return nya hasil
		if($cek > 0){
			$cek = $this->m_login->cek_login("user",$where);	//return nya data
			foreach ($cek->result() as $row)
			{
			    echo $row->id;						//menyesuaikan tabel user
			    echo $row->nama;
			    echo $row->email;
			    echo $row->password;
			    echo $row->gambar;
			}
			$nama = $row->nama;
			$id = $row->id;
			$data_session = array(
				'id' => $id,
				'nama' => $nama,
				'email' => $username,
				'status' => "login"
				);
			
			$this->session->set_userdata($data_session);
			?> <script>
				window.alert('Login Sukses !');
				
			</script> <?php
			redirect(base_url('index.php/login/indexlogin'));

		}else{
			?> <script>window.alert('Login Gagal !');
			window.location=(href='<?php echo base_url('index.php/login/index') ?>'); 
			</script> <?php
			echo "Username dan password salah !";
		}
	}

	function aksi_login_admin(){
		$username = $this->input->post('username_admin');
		$password = $this->input->post('password_admin');
		$where = array(
			'username_admin' => $username,
			'password_admin' => md5($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();	//return nya hasil 
		if($cek > 0){
			$cek = $this->m_login->cek_login_admin("admin",$where);	//return nya data
			foreach ($cek->result() as $row)
			{
			    echo $row->id_admin;						//menyesuaikan tabel admin
			    echo $row->username_admin;
			    //echo $row->email;
			    echo $row->password;
			}
			$nama = $row->username_admin;
			$id = $row->id_admin;
			$id_select = "";
			$hal = "index.php/login/indexadmin";
			$data_session = array(
				'id' => $id,
				'nama' => $nama,
				'tab' => $hal,
				'tampung' => $id_select,								// test hal
				//'email' => $username,
				'status' => "login"
				);

			
			$this->session->set_userdata($data_session);
			?> <script>
				window.alert('Login Sukses !');
				
			</script> <?php
			//redirect(base_url('index.php/login/indexadmin'));
			redirect(base_url('index.php/controler/set_hal_welcome'));

		}else{
			?> <script>window.alert('Login Gagal !');
			window.location=(href='<?php echo base_url('index.php/login/loginadmin') ?>'); 
			</script> <?php
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login/index'));
	}

	function logout_admin(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login/loginadmin'));
	}

	
	//
	//		Ke bawah hanya function nge-load halaman kuy
	//
	
	function index(){
		$this->load->view('welcome/index');
	}
	
	function indexlogin(){
		$this->load->view('welcome/index2');
	}
	
	function indexpenyewa(){
		$this->load->view('penyewa/index');
	}
	
	function indexpemilik(){
		$this->load->view('pemilik/index');
	}

	function profilpenyewa(){
		$this->load->view('penyewa/profilpenyewa');
	}

	function loginadmin(){
		$this->load->view('admin/index');
	}

	function indexadmin(){
		$this->load->view('admin/admin/index');
	}



// Ga jadi

	/* 
	function profilpenyewa(){
		
		//

		$where = $this->session->userdata("nama");

		$query = $this->m_data->get_nama('nama',$where);
		//foreach ($query->result() as $row) {
		//	echo $row->nama; 
		//}
		$data = $query;
		$this->load->view('penyewa/profilpenyewa',$data);
	}
	*/
}