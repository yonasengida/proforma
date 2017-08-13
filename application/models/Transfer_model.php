<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}

public function get_autocomplete(){
			$this->db->select('*');
		// $this->db->where('fiedl3',1);
		$this->db->like('sender_tel',$this->input->post('queryString'));
		return $this->db->get('tbl_sender_profile', 10);
		}
public function checkKeyExistence($newKey){
	//  // Prep the query
	 $this->db->where('secuirity_code', $newKey);
	 // Run the query
	 $query = $this->db->get('view_transfer_detial');
//   echo $query->num_rows()."TEst";
	 // Let's check if there are any results
	 if($query->num_rows() == 1)
	 {
		 return true;
	 }
	 else{
		 return false;
	 }
}
public function getTodayCommision(){
	$this->db->select('*');
	$this->db->where('send_date',date('Y-m-d'));
	$this->db->where('sending_branch',$this->session->userdata('branch'));
	$query = $this->db->get('commision_summary_by_date');
	if($query->num_rows()>0){
		return $query->result();
	}else{

		return false;
	}
}
public function getTotalCommision(){
	$this->db->select('*');
	$this->db->where('sending_branch',$this->session->userdata('branch'));
	$query = $this->db->get('view_commision_summary');
	if($query->num_rows()>0){
		return $query->result();
	}else{

		return false;
	}
}
	public function get_single($param1){
		$this->db->select('*');
		$this->db->where('transfer_money_id',$param1 );
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	/* Get Today Transfer Report**/
	public function get_today_summary(){
		$this->db->select('*');
		$this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_today_transfer');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_today_branch(){
		$this->db->select('*');
		$this->db->where('sending_branch',$this->input->post('uid'));
		$this->db->where('tm_created_at',date('Y-m-d'));
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_today(){
		$this->db->select('*');
		$this->db->where('sending_branch',$this->session->userdata('branch'));
		$this->db->where('tm_created_at',date('Y-m-d'));
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	/* Get Today(All Branch) Transfer Report**/
	public function get_all_today_summary(){
		$this->db->select('*');
		//$this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_today_transfer');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_all_today(){
		$this->db->select('*');
		// $this->db->where('sending_branch',$this->session->userdata('branch'));
		$this->db->where('tm_created_at',date('Y-m-d'));
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->where('sending_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_transfer_detial');
		// $query=$this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	function get_unpaid() {

		$this->db->select('*');
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$this->db->where('tm_status','unpaid');
		$this->db->where('aprove_status','aprove');
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
  }
	function get_not_aprove() {

		$this->db->select('*');
		$this->db->where('sending_branch',$this->session->userdata('branch'));
		// $this->db->where('tm_status','unpaid');
		$this->db->where('aprove_status','notaprove');
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
  }
	function get_Aproved() {

		$this->db->select('*');
		$this->db->where('sending_branch',$this->session->userdata('branch'));
		// $this->db->where('tm_status','paid');
		$this->db->where('aprove_status','aprove');
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
  }
	function get_by_code($code) {

		$this->db->select('*');
		$this->db->where('secuirity_code',$code );
		$query = $this->db->get('view_transfer_detial');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
  }

	function get_by_tel($code) {
		// $search_term=$code;
		// $search_term="%".$search_term."%";
		// $sql="SELECT * FROM tbl_sender_profile WHERE sender_tel LIKE  ";
		// $query=$this->db->query($sql,array($search_term));
		// $query=$query->result();
		$this->db->select('*');
		$this->db->like('sender_tel',$code, 'both' );//like('title', 'match', 'before')
		$query = $this->db->get('tbl_sender_profile');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
  }
	function search_by_tel($code) {
		// $search_term=$code;
		// $search_term="%".$search_term."%";
		// $sql="SELECT * FROM tbl_sender_profile WHERE sender_tel LIKE  ";
		// $query=$this->db->query($sql,array($search_term));
		// $query=$query->result();
		$this->db->select('*');
		$this->db->where('sender_tel',$code);//like('title', 'match', 'before')
		$query = $this->db->get('tbl_sender_profile');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}

	function search_rcvr_by_tel($code) {
		// $search_term=$code;
		// $search_term="%".$search_term."%";
		// $sql="SELECT * FROM tbl_sender_profile WHERE sender_tel LIKE  ";
		// $query=$this->db->query($sql,array($search_term));
		// $query=$query->result();
		$this->db->select('*');
		$this->db->where('rcvr_tel',$code);//like('title', 'match', 'before')
		$query = $this->db->get('tbl_transfer_money');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function searchByDate(){

	 if(empty($_POST)){
		$start_date=date('Y-m-d');
		$end_date=date('Y-m-d');
	}
	else {
				$start_date=$this->input->post('fromdate');
				$end_date=$this->input->post('todate');


				$this->db->select('*');
			  $this->db->where('tm_created_at >=',$start_date);
				$this->db->where('tm_created_at <=',$end_date);
				$this->db->where('sending_branch',$this->session->userdata('branch'));
				$query = $this->db->get('view_transfer_detial');
				if($query->num_rows()>0){
					return $query->result();
				}else{

					return false;
				}
		}
	}
	public function createProfile($data){

		$this->db->insert('tbl_sender_profile',$data);
		if($this->db->affected_rows()>0){
		 $insert_id = $this->db->insert_id();
       return  $insert_id;
		}else{
			return false;
		}
	}
	public function sendMoney($data){
		$this->db->insert('tbl_transfer_money',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}

	public function getBranchs(){
		$query=$this->db->get('tbl_branchs');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function aproveTransfer($data)
	{
		$this->db->where('transfer_money_id',$data['transfer_money_id'] );
		$this->db->update('tbl_transfer_money',$data);
	}
	function searchSender($tel) {

		$this->db->select('*');
		$this->db->where('sender_tel',$tel );
		$query = $this->db->get('tbl_sender_profile');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
  }
	public function validateProfile(){
		 $this->db->select('*');
		 //  // Prep the query
			$this->db->where('sender_tel', $_SESSION['profile']['sender_tel']);
			// Run the query
			$query = $this->db->get('tbl_sender_profile');

			return $query->num_rows();

	}
	public function getProfileId(){

		$sender = $this->db->select('sender_id')
                  ->get_where('tbl_sender_profile', array('sender_tel' =>  $_SESSION['profile']['sender_tel']))
                  ->row()
                  ->sender_id;

		if($sender){
			 return $sender;
		}



	}
}
?>
