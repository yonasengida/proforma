<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}

	public function index(){
		$data['title']="Brand Registration Form";
		$this->load->view('layout/header');
		$this->load->model('Brand_model');
		$data['profiles']=$this->Brand_model->get_all();
		$this->load->view('brand/index',$data);
		$this->load->view('layout/footer');
	}


	public function getById(){

			$this->load->model('Brand_model');
			echo json_encode($this->Brand_model->get_single($this->input->post('uid')));

	}
	public function get(){

		$this->load->model('Brand_model');
		echo json_encode($this->Brand_model->get_all());

	}
	public function create(){

    $this->load->model('Brand_model');
		$brand_field= array(
    'brand_name'  => $this->input->post('brand_name'),
     );
		$query= $this->Brand_model->create($brand_field);
    redirect('brand');
  }
	public function updateBrand()
	{

		$data = array
			(

				'brand_id' => $this->input->post('u_brand_id'),
				'brand_name' =>$this->input->post('u_brand_name'),
					);
					//echo $this->input->post('u_group_name');
		$this->load->model('Brand_model'); // First load the model
		$this->Brand_model->updateBrand($data); // call the method from the controller
		redirect('brand');

}

}
