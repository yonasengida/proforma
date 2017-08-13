<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->check_isvalidated();
	}

public function index(){
  $this->load->view('layout/header');
  $this->load->model('User_model');
  $data['profiles']=$this->User_model->get();
  $this->load->view('user/index',$data);
  $this->load->view('layout/footer');
}
	public function get(){

		$this->load->model('Rate_setting_model');
		echo json_encode($this->Rate_setting_model->get_all());

	}
	public function getTransferDetailById(){
		//	echo $this->input->post('uid');
			$this->load->model('User_model');
			echo json_encode($this->User_model->get_single($this->input->post('uid')));

	}

	public function create(){

    $this->load->model('User_model');
		$payment_field= array(
    'u_branch'=> $this->input->post('branch'),
		'staff_id'=> $this->input->post('staff_id'),
		'user_name'=> $this->input->post('user_name'),
		'tel' => $this->input ->post('tel'),
    'email' =>  $this->input ->post('email'),
		'password' =>  md5($this->input ->post('password')),
		'status'    => 'active',
		'u_created_at'    => date('Y-m-d H:i:s'),
		'u_updated_at'    =>date('Y-m-d H:i:s'),
);
		$query= $this->User_model->create($payment_field);
    redirect('user');
  }

	public function updateUser()
	{
		// echo "Tes";
		// echo $this->input->post('u_fname');
		// echo $this->input->post('u_lname');
		// echo $this->input->post('user_id');
		//
		// $dataUer = array
		// 	(
		// 		// 'transfer_id' => $this->input->post('fk_transfer_id'),
		// 		'user_id' => $this->input->post('user_id'),
		// 		'first_name' =>$this->input->post('u_fname'),
		// 		'last_name' =>$this->input->post('u_lame'),
		// 		'tel' =>$this->input->post('u_tel'),
		// 		'email' =>$this->input->post('u_email'),
		// 		'1u_branch' =>$this->input->post('u_branch'),
		// 	);
    $data = array
      (
				// 'transfer_id' => $this->input->post('fk_transfer_id'),
        'user_id' => $this->input->post('user_id'),
				'staff_id' =>$this->input->post('u_staff_id'),
				'first_name' =>$this->input->post('u_fname'),
				'last_name' =>$this->input->post('u_lname'),
				'user_name' =>$this->input->post('u_user_name'),
				'tel' =>$this->input->post('u_tel'),
				'email' =>$this->input->post('u_email'),
				'u_branch' =>$this->input->post('u_branch'),
				'status' =>$this->input->post('u_status'),
        'u_updated_at'    =>date('Y-m-d H:i:s')

      );
			//echo $data['branch']. $data['email'];

    $this->load->model('User_model'); // First load the model
    $this->User_model->updateUser($data); // call the method from the controller
		redirect('user');

}
private function check_isvalidated(){
			if(! $this->session->userdata('validated')){
					redirect('auth');
			}
	}
}
