
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get(){
		$query=$this->db->get('tbl_customer');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

  public function create($data){

		$this->db->insert('tbl_customer',$data);
		if($this->db->affected_rows()>0){
		       return true;
		}else{
			return false;
		}
	}
	public function get_all(){

		$this->db->select('*');
		// $this->db->where('customer_id',$param1 );
		$query = $this->db->get('tbl_customer');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
}}
	public function get_single($param1){

		$this->db->select('*');
		$this->db->where('customer_id',$param1 );
		$query = $this->db->get('tbl_customer');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function updateCustomer($data)
	{
	  $this->db->where('customer_id',$data['customer_id'] );
		$this->db->update('tbl_customer',$data);
	}


}
?>
