<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proforma_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get_single(){
		$this->db->select('*');
		$this->db->where('reference_no',$this->input->post('uid') );
		$query = $this->db->get('view_proforma');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_all(){
		$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_proforma');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function getRef(){
		$this->db->select_max('ref_no');
	 $this->db->from('tbl_reference_no');
	 $query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_Proforma(){
		//$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_proforma');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_Proforma_Customer(){
		//$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_proforma_summary_by_ref');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

	public function create($data){

		$this->db->insert('tbl_proforma',$data);
		if($this->db->affected_rows()>0){
					 return true;
		}else{
			return false;
		}
	}
	public function createRerence($data){

		$this->db->insert(' tbl_reference_no',$data);
		if($this->db->affected_rows()>0){
					 return true;
		}else{
			return false;
		}
	}
	public function get_by_ref(){

		$this->db->select('*');
		$this->db->where('reference_no',$_SESSION['reference'] );
		$query = $this->db->get('view_proforma');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

}
?>
