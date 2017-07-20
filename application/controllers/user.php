<?php 
// MalasNgoding.com
// kalo di contoh Class Admin

/*
	PKL Vokasi UGM Q.A
	ada file Dokumentasi.txt untuk user guide dan Q.A seputar fungsi-fungsi yg ada di Bale_Dulur
*/

class User extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('koneksi');
		$this->load->model('m_data');

		//if($this->session->userdata('status') != "login"){
			//redirect(base_url("index.php/login/indexlogin"));
		//}
	}

	//Sign-up
	function tambah_aksi(){
		$fname = $this->input->post('f_name');
		$lname = $this->input->post('l_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		 
 		$nama = $fname.' '.$lname;
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => md5($password),		// sementara
			//'password' => $password,
			'privileges' => 2
			);
		
		$cek = $this->m_data->cek_data('user',$data)->num_rows();
		if ($cek < 1){
			$this->m_data->input_data($data,'user');
			?> <script>
					window.alert('Data berhasil di tambah ! Silahkan coba login ');
				</script> <?php
			redirect(base_url('index.php'));
		} else { 
			?> <script>
					window.alert('Data sudah ada, coba ganti !');
					window.location=(href='<?php echo base_url('index.php/login/index') ?>');
				</script> <?php
		}
	}

	//Get
	function get_nama(){
		$where = $this->session->userdata("nama");

		$query = $this->m_data->get_nama('user',$where);
		foreach ($query->result() as $row) {
			echo $row->nama; 
		}
		
	}

	function index(){
		$this->load->view('welcome/index');
	}
}
?>