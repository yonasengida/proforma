<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprove extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->check_isvalidated();
	}

	public function index(){
		$data['title']="Waiting Approval";
		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['profiles']=$this->Transfer_model->get_not_aprove();
		$this->load->view('aprove/index',$data);
		$this->load->view('layout/footer');
	}
	public function getAproved(){
		$data['title']="Aproved Money Transfer";
		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['profiles']=$this->Transfer_model->get_Aproved();
		$this->load->view('aprove/aproved',$data);
		$this->load->view('layout/footer');
	}// end of get function

	public function createAprove(){

    $this->load->model('Transfer_model');
		$aprove_field= array(
		'transfer_money_id'=> $this->input ->post('txt_transfer_id'),
		'aprover_id'    =>$this->session->userdata('user_id'),
		't_aproved_by'    =>$this->session->userdata('user_name'),
		't_aproved_at'    => date('Y-m-d H:i:s'),
		'aprove_status'    => 'aprove',
		);
		// $_SESSION['transfer_id']=$this->input ->post('txt_transfer_id');
		$query= $this->Transfer_model->aproveTransfer($aprove_field);
	redirect('aprove');

  }// End of Create Aprove Function
	private function check_isvalidated(){
				if(! $this->session->userdata('validated')){
						redirect('auth');
				}
		}

}
