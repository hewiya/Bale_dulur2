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
		$this->load->model('m_tambah_rumah');
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

	// // // // // // // // //
	// Menjadi Tuan Rumah   //
	// // // // // // // // //

	function indexpemilik(){
	$this->load->library('session');
		if($this->session->userdata('status')){
			$this->load->view('pemilik/index');
		} else {
			?> <script>
				window.alert('Silahkan login terlebih dahulu !');
				window.location=(href='<?php echo base_url('index.php/login/index') ?>');
			</script> <?php
		}
	}

	function simpanrumah(){
		$x = $this->input->post('x');
		$y=$this->input->post('y');
		$nama_lokasi = $this->input->post('nama_lokasi');
		$alamat = $this->input->post('alamat');
		$kota= $this->input->post('kota');
		$kode_pos = $this->input->post('kode_pos');
		$id = $this->input->post('id');

		$input_data = array(
					'nama_lokasi' => $nama_lokasi,
					'alamat'=> $alamat,
					'latitude' => $x,
					'longitude' => $y,
					'kota' => $kota,
					'kode_pos' => $kode_pos,
					);

		$this->m_tambah_rumah->insert('lokasi',$input_data);
		$insert_id = $this->db->insert_id();

		$input_data = array(
					'id' => $insert_id,
					'nama_lokasi' => $nama_lokasi,
					'alamat'=> $alamat,
					'latitude' => $x,
					'longitude' => $y,
					'kota' => $kota,
					'kode_pos' => $kode_pos,
					);

 		$this->session->set_userdata('lokasi', $input_data);//insert('lokasi', $input_data);
		$this->load->view('pemilik/formFasilitas.php'/*,$this->data*/);
	}

	function simpanfasilitas(){
		$fk_id_lokasi = $this->input->post('id_lokasi');
		$jml_ruang = $this->input->post('jml_ruang');
		$panjang = $this->input->post('panjang');
		$lebar = $this->input->post('lebar');
		$jmlPengguna = $this->input->post('jumlah');
		$jenisPengguna = $this->input->post('pengguna');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$ruang_tamu = $this->input->post('quantity');
		$ruang_keluarga = $this->input->post('quantity1');
		$ruang_makan = $this->input->post('quantity2');
		$kamar_tidur = $this->input->post('quantity3');
		$kamar_mandi = $this->input->post('quantity4');
		$almari = $this->input->post('almari');
		$dapur = $this->input->post('dapur');
		$internet =$this->input->post('internet');
		$kulkas = $this->input->post('kulkas');
		$tv = $this->input->post('tv');
		$parkir = $this->input->post('parkir');
		$ac = $this->input->post('ac');
		$mesin_cuci = $this->input->post('mesincuci');

		if($parkir == ''){
			echo 'TIDAK ADA';
		}

		$input_data = array(
					'fk_id_lokasi' => $fk_id_lokasi,
					'jml_ruang'=> $jml_ruang,
					'panjang' => $panjang,
					'lebar' => $lebar ,
					'kapasitas' => $jmlPengguna,
					'jns_pengguna' => $jenisPengguna, 
					'harga' => $harga, 
					'deskripsi' => $deskripsi,
					'ruang_tamu' => $ruang_tamu, 
					'ruang_keluarga' => $ruang_keluarga, 
					'ruang_makan' => $ruang_makan, 
					'kamar_tidur' => $kamar_tidur, 
					'kamar_mandi' => $kamar_mandi, 
					'parkir' => $parkir, 
					'internet' => $internet, 
					'ac' => $ac, 
					'dapur' => $dapur,
					'mesin_cuci' => $mesin_cuci, 
					'tv'=> $tv, 
					'kulkas' => $kulkas, 
					'almari'=> $almari,
					
					);


		$this->m_tambah_rumah->insert('fasilitas',$input_data);
 		$this->session->set_userdata('fasilitas', $input_data);//insert('lokasi', $input_data);
		$this->load->view('pemilik/uploadFoto.php'/*,$this->data*/);
	}

	function simpanfoto() {

		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './gambar/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
                $gbr = $this->upload->data();
                $data = array(
                		'fk_id_lokasi' => $this->input->post('id_lokasi'),
                	 	'nama_gambar' => $gbr['file_name'],
                        'deskripsi' => $this->input->post('keterangan'),
                        'judul' => $this->input->post('judul')
                 		);

                $this->model_upldgbr->get_insert($data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/hasil_resize/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('upload'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('upload/add'); //jika gagal maka akan ditampilkan form upload
            
	        }
	    }
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