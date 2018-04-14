<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_setting_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

	public function get_all(){

		$query=$this->db->get('tbl_rate_setting');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function updateRate($data)
	{
	   $this->db->set('rate_value',$data['rate_value'])
	      	        ->update('tbl_rate_setting');
	}


}
?>
