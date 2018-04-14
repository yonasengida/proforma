<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get_single($param1){
		$this->db->select('*');
		$this->db->where('group_id',$param1 );
		$query = $this->db->get('tbl_group');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_all(){
		$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('tbl_group');
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
		$query = $this->db->get('tbl_group');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

	public function create($data){

		$this->db->insert('tbl_group',$data);
		if($this->db->affected_rows()>0){
		       return true;
		}else{
			return false;
		}
	}
	public function updateGroup($data)
	{

		$this->db->where('group_id',$data['group_id'] );
		$this->db->update('tbl_group',$data);
	}

}
?>
