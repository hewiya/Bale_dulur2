<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class m_lokasi extends CI_Model{
	private $table_name = 'lokasi';
	
	function __construct(){
		parent :: __construct();
	}
	function get_records($criteria = '', $order = '',$limit= '', $offset = 0){
		$this->db->select('*');
		$this->db->from($this->table_name);
		if($criteria != '')
			$this->db->where($criteria);
		if($order != '')
			$this->db->order_by($order);
		if($limit != '')
			$this->db->limit($limit,$offset);
		$query = $this->db->get();
		return $query;
	}
	function insert($data){
		$query= $this->db->insert($this->table_name, $data);
		return $query;
	}
	function update_by_id($data, $id){
		$this->db->where("id_lokasi = '$id'");
		$query= $this->db->update($this->table_name, $data);
		return $query;
	}
	function delete_by_id($id){
		$query = $this->db->delete($this->table_name,"id_lokasi = '$id'");
		return $query;
	}
	function tampil_data($criteria = '', $order = '', $limit = '', $offset = 0){
    //$SQL ="select * from lokasi, rumah where rumah.id_lokasi = lokasi.id_lokasi";
	//return $this->db->query($SQL)->result_array();
	/*$this->db->select('*'); 
    $this->db->from('rumah'); 
    $this->db->join('lokasi', 'rumah.id_lokasi = lokasi.id_lokasi');
     return $this->db->get()->result_array();
     */

		$this->db->from('rumah'); 
    	$this->db->join('lokasi', 'rumah.id_lokasi = lokasi.id_lokasi');
		if($criteria != '')
			$this->db->where($criteria);
		if($order != '')
			$this->db->order_by($order);
		if($limit != '')
			$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query;
	
	}

	function tampil_detail($criteria = '', $order = '', $limit = '', $offset = 0){
		$this->db->from('rumah'); 
    	$this->db->join('lokasi', 'rumah.id_lokasi = lokasi.id_lokasi');
    	$this->db->join('fasilitas', 'rumah.id_fasilitas = fasilitas.id_fasilitas');
		if($criteria != '')
			$this->db->where($criteria);
		if($order != '')
			$this->db->order_by($order);
		if($limit != '')
			$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query;
	}
}