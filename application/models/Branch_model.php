<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get(){
		$this->db->select('*');
		$this->db->where('b_status','active' );
		$query = $this->db->get('tbl_branchs');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

  public function create($data){

		$this->db->insert('tbl_branchs',$data);
		if($this->db->affected_rows()>0){
		       return true;
		}else{
			return false;
		}
	}
	public function get_single($param1){

		$this->db->select('*');
		$this->db->where('branch_id',$param1 );
		$query = $this->db->get('tbl_branchs');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function updateBranch($data)
	{

		$this->db->where('branch_id',$data['branch_id'] );
		$this->db->update('tbl_branchs',$data);
	}


}
?>
