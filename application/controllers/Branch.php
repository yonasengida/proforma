<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->check_isvalidated();
	}


public function index(){
  $this->load->view('layout/header');
  $this->load->model('Branch_model');
  $data['profiles']=$this->Branch_model->get();
	$this->load->view('branch/index',$data);
  $this->load->view('layout/footer');
}
	public function get(){

		$this->load->model('Branch_model');
		echo json_encode($this->Branch_model->get());

	}
	public function getById(){
		//	echo $this->input->post('uid');
			$this->load->model('Branch_model');
			echo json_encode($this->Branch_model->get_single($this->input->post('uid')));

	}

	public function create(){

    $this->load->model('Branch_model');
		$branch_field= array(
    'branch_name'=> $this->input->post('branch_name'),
		'branch_code'=> $this->input->post('branch_code'),
		'remark'=> $this->input->post('remark'),
		'b_status'    => 'active',
		'b_created_at'    => date('Y-m-d H:i:s'),

);
		$query= $this->Branch_model->create($branch_field);
    redirect('branch');
  }

	public function updateBranch()
	{
	    $data = array
      (
				// 'transfer_id' => $this->input->post('fk_transfer_id'),
        'branch_id' => $this->input->post('u_branch_id'),
				'branch_code' =>$this->input->post('u_branch_code'),
				'branch_name' =>$this->input->post('u_branch_name'),
				'remark' =>$this->input->post('u_remark'),
				// 'user_name' =>$this->input->post('u_user_name'),
			//  '_updated_at'    =>date('Y-m-d H:i:s')

      );
			//echo $data['branch']. $data['email'];
// echo $data['branch_code'].$data['branch_id'];
    $this->load->model('Branch_model'); // First load the model
    $this->Branch_model->updateBranch($data); // call the method from the controller
		redirect('branch');

}
private function check_isvalidated(){
			if(! $this->session->userdata('validated')){
					redirect('auth');
			}
	}
}
