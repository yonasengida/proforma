<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stock_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}
public function get(){
		$this->db->select('*');
		// $this->db->where('status','active' );
		$query = $this->db->get('view_stocks');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

	public function get_all(){
		$this->db->select('*');
		// $this->db->where('status','active' );
		$query = $this->db->get('view_stocks');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

  public function create($data){

		$this->db->insert('tbl_stocks',$data);
		if($this->db->affected_rows()>0){
		       return true;
		}else{
			return false;
		}
	}
	public function get_single($param1){
		$this->db->select('*');
		$this->db->where('stocks_id',$param1 );
		$query = $this->db->get('view_stocks');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function updateBrand($data)
	{

		$this->db->where('stocks_id',$data['stocks_id'] );
		$this->db->update('tbl_stocks',$data);
	}


}
?>
