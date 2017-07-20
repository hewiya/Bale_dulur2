<?php 
 
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}
 
	function input_data($data,$table){
			$this->db->insert($table,$data);
	}

	function cek_data($table,$where){
		return $this->db->get_where($table,$where);
	}

	function get_nama($nama,$session){
		$query = $this->db->query("SELECT nama  FROM user WHERE $nama = $session;");
		//return $this->db->where($email,$session);
	}

	function update_user($table,$where,$id){
		$this->db->where('id',$id);
		$this->db->update($table,$where);
	}

}