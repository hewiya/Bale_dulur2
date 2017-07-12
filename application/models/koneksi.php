<?php 

class Koneksi extends CI_Model{
	function ambil_data(){
		return $this->db->get('user');
	}

	function ambil_lokasi(){
		
	}
}