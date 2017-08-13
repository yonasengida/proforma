<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}

	public function index(){
		$data['title']="Customer Registration Form";
		$this->load->view('layout/header');
		$this->load->model('Customer_model');
		$data['profiles']=$this->Customer_model->get();
		$this->load->view('customer/index',$data);
		$this->load->view('layout/footer');
	}
	public function getById(){
		//	echo $this->input->post('uid');
			$this->load->model('Customer_model');
			echo json_encode($this->Customer_model->get_single($this->input->post('uid')));

	}
	public function get(){
		//	echo $this->input->post('uid');
			$this->load->model('Customer_model');
			echo json_encode($this->Customer_model->get_all());

	}
	public function create(){

    $this->load->model('Customer_model');
		$cust_field= array(
		'customer_name'=> $this->input ->post('name'),
		'customer_tin'    =>$this->input ->post('tin'),
		'customer_mobile'    =>$this->input ->post('mobile')
			);
		// $_SESSION['transfer_id']=$this->input ->post('txt_transfer_id');
		$query= $this->Customer_model->create($cust_field);
	redirect('customer');

  }// End of Create Aprove Function
	public function updateCustomer()
	{
    $data = array
      (
				// 'transfer_id' => $this->input->post('fk_transfer_id'),
        'customer_id' => $this->input->post('u_customer_id'),
				'customer_name' =>$this->input->post('u_name'),
				'customer_mobile' =>$this->input->post('u_mobile'),
				'customer_tin' =>$this->input->post('u_tin'),
			 );
			//echo $data['branch']. $data['email'];

    $this->load->model('Customer_model'); // First load the model
    $this->Customer_model->updateCustomer($data); // call the method from the controller
		redirect('customer');

}

}
