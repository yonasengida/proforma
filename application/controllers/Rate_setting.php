<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_setting extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->check_isvalidated();
	}



	public function get(){

		$this->load->model('Rate_setting_model');
		echo json_encode($this->Rate_setting_model->get_all());

		//echo sizeof($data['profiles']);
	}
	public function getRate(){

		$this->load->model('Rate_setting_model');
		$this->load->view('layout/header');
		$data['profiles']=$this->Rate_setting_model->get_all();
		$this->load->view('rate/index',$data);
		$this->load->view('layout/footer');
		//echo sizeof($data['profiles']);
	}

	public function updateRate(){
		$data = array
			(
			//		'rate_value' => 0.25
				'rate_value' => $this->input->post('txt_rate_value')
						);
		$this->load->model('Rate_setting_model'); // First load the model
		$this->Rate_setting_model->updateRate($data); // call the method from the controller
		redirect('Rate_setting/getrate');
	  }
		private function check_isvalidated(){
					if(! $this->session->userdata('validated')){
							redirect('auth');
					}
			}
}
