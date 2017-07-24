<?php 

// // // // // // // // // // // // // // // // // // // //
// controler user buat function-function User penyewa    //
// // // // // // // // // // // // // // // // // // // //

/*
	PKL Vokasi UGM Q.A
	ada file Dokumentasi.txt untuk user guide dan Q.A seputar fungsi-fungsi yg ada di Bale_Dulur
*/

class User extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('koneksi');
		$this->load->model('m_data');
		$this->load->helper(array('form', 'url'));

		//if($this->session->userdata('status') != "login"){
			//redirect(base_url("index.php/login/indexlogin"));
		//}
	}

	// // // // //
	// Sign-up  //
	// // // // //

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

	// // // // // //
	// Profil User //
	// // // // // //

	function update_profil(){
		$link = mysqli_connect("localhost", "root", "", "bale");
		// // // // // // // // //
		// Old Method uploading //
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
		// $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		// $ekstensi = strtolower(end(explode('.', $_FILES['file']['name'])));
		// $ukuran	= $_FILES['file']['size'];
		//
		// if(in_array($ekstensi, $ekstensi_diperbolehkan)){
		// 	if($ukuran < 1044070){
		// 		$query = mysqli_query($link,"UPDATE user SET gambar = '".$_FILES['file']['name']."' WHERE id = '".$_SESSION['id']."'");
		// 		if($query){
		// 			move_uploaded_file($_FILES['file']['tmp_name'],"gambar/".$_FILES['file']['name']);
		// 		}else{
		// 			echo 'GAGAL MENGUPLOAD GAMBAR';
		// 		}
		// 	}else{
		// 		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		// 	}
		// }
		// $nama = $_POST['nama'];
		// $email = $_POST['email'];
		// $tanggal_lahir = $_POST['tanggal_lahir'];
		// $telpon = $_POST['telpon'];
		// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
		
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$telpon = $this->input->post('telpon');

		$query = mysqli_query($link,"UPDATE user SET nama = '$nama', email = '$email', tanggal_lahir = '$tanggal_lahir', telpon = '$telpon' WHERE id = '".$_SESSION['id']."'");
		
		redirect(base_url('index.php/login/profilpenyewa'));
		// <!-- <script>
		// 	window.location=(href='index2.php');
		// </script> -->
		
	}

	function do_upload(){
		$link = mysqli_connect("localhost", "root", "", "bale");
		$config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('penyewa/profilpenyewa_upload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $nama = $this->upload->data('file_name');
                        $query = mysqli_query($link,"UPDATE user SET gambar = '$nama' WHERE id = '".$_SESSION['id']."'");

                        //   buat ngechek data
                        //
                        //$this->load->view('penyewa/upload_succes', $data);
                        //

                        $this->load->view('penyewa/profilpenyewa_edit', $data);
                }
	}
	
	function profil_upload(){
		$this->load->view('penyewa/profilpenyewa_upload',array('error' => ' ', ));
	}

	function edit_profil(){
		$this->load->view('penyewa/profilpenyewa_edit');
	}

	// // // // // //
	// lain-lain   //
	// // // // // //

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