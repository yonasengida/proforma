<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}

	public function index(){
		$data['title']="Catgory Registration Form";
		$this->load->view('layout/header');
		$this->load->model('Category_model');
		$data['profiles']=$this->Category_model->get_all();
		$this->load->view('category/index',$data);
		$this->load->view('layout/footer');
	}
	public function get(){

			$this->load->model('Category_model');
			echo json_encode($this->Category_model->get_all());

	}

	public function getById(){

			$this->load->model('Category_model');
			echo json_encode($this->Category_model->get_single($this->input->post('uid')));

	}
	public function updateCatgegory()
	{
		$data = array
			(

				'category_id' => $this->input->post('category_id'),
				'category_name' => $this->input->post('u_category_name'),

			 );
		$this->load->model('Category_model'); // First load the model
		$this->Category_model->updateCatgegory($data); // call the method from the controller
		redirect('category');

}

}
