<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model{
	public function __construct() {
    parent::__construct();

      $this->load->database();

}
public function searchByDate(){

 if(empty($_POST)){
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d');
}
else {
			$start_date=$this->input->post('fromdate');
			$end_date=$this->input->post('todate');

// echo $end_date."|".$start_date;
			$this->db->select('*');
		  $this->db->where('p_created_at >=',$start_date);
			$this->db->where('p_created_at <=',$end_date);
			$this->db->where('receiving_branch',$this->session->userdata('branch'));
			$query = $this->db->get('view_payments');
			if($query->num_rows()>0){
				return $query->result();
			}else{

				return false;
			}
	}
}
public function get_today(){
	$this->db->select('*');
	$this->db->where('receiving_branch',$this->session->userdata('branch'));
	$this->db->where('p_created_at',date('Y-m-d'));
	$query = $this->db->get('view_payments');
	if($query->num_rows()>0){
		return $query->result();
	}else{

		return false;
	}
}
public function get_today_branch(){
	$this->db->select('*');
	$this->db->where('receiving_branch',$this->input->post('uid'));
	$this->db->where('p_created_at',date('Y-m-d'));
	$query = $this->db->get('view_payments');
	if($query->num_rows()>0){
		return $query->result();
	}else{

		return false;
	}
}
/* Get Today Receive Report**/
public function get_today_summary(){
	$this->db->select('*');
	$this->db->where('receiving_branch',$this->session->userdata('branch'));
	$query = $this->db->get('view_today_receive');
	if($query->num_rows()>0){
		return $query->result();
	}else{

		return false;
	}
}
/* Get Today(All Branch) Payment Report**/
public function get_all_today_summary(){
	$this->db->select('*');
	//$this->db->where('sending_branch',$this->session->userdata('branch'));
	$query = $this->db->get('view_today_receive');
	if($query->num_rows()>0){
		return $query->result();
	}else{

		return false;
	}
}
	public function getTotalPaid(){
		$this->db->select('*');
		$this->db->where('tm_status','paid');
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_summary_report');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function getTotalUnPaid(){
		$this->db->select('*');
		$this->db->where('tm_status','unpaid');
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_summary_report');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function getTodayUnPaid(){
		$this->db->select('*');
		$this->db->where('status','unpaid');
		$this->db->where('send_date',date('Y-m-d'));
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_transfer_summary_by_date');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function getTodayPaid(){
		$this->db->select('*');
		//$this->db->where('status','paid');
		$this->db->where('payment_date',date('Y-m-d'));
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_payment_summary');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function getTodayPayment(){
		$this->db->select('*');
		//$this->db->where('status','paid');
		$this->db->where('payment_date',date('Y-m-d'));
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_payments');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function get_all(){

		$query=$this->db->get('tbl_payments');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	function get_paid() {

		$this->db->select('*');
		$this->db->where('tm_status','paid');
		$this->db->where('receiving_branch',$this->session->userdata('branch'));
		$query = $this->db->get('view_payments');
		if($query->num_rows()>0){
			return $query->result();
		}else{

			return false;
		}
	}
	public function create($data){

		$this->db->insert('tbl_payments',$data);
		if($this->db->affected_rows()>0){
		 $insert_id = $this->db->insert_id();
       return true;
		}else{
			return false;
		}
	}
	public function updateTransfer($data)
	{
	   $this->db->set('tm_status',$data['status'])
	         ->where('transfer_money_id',$data['transfer_id'])
	        ->update('tbl_transfer_money');
	}


}
?>
