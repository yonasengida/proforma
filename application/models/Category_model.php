<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get_single($param1){
		$this->db->select('*');
		$this->db->where('category_id',$param1 );
		$query = $this->db->get('view_categrories');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_all(){
		$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_categrories');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get(){
		//$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('tbl_category');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

	public function updateCatgegory($data)
	{
	  $this->db->where('category_id',$data['category_id'] );
		$this->db->update('tbl_category',$data);
	}



}
?>
