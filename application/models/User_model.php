<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get(){
		$query=$this->db->get('view_users');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

  public function create($data){

		$this->db->insert('view_users',$data);
		if($this->db->affected_rows()>0){
		       return true;
		}else{
			return false;
		}
	}
	public function get_single($param1){

		$this->db->select('*');
		$this->db->where('user_id',$param1 );
		$query = $this->db->get('view_users');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function updateUser($data)
	{
		//  $this->db->set('first_name',$data['u_fname'],'last_name',$data['u_lname'])
		//  				//->('last_name',$data['u_lname'])
		// 			 ->where('user_id',$data['user_id'])
		// 			->update('tbl_users');
		$this->db->where('user_id',$data['user_id'] );
		$this->db->update('tbl_users',$data);
	}


}
?>
