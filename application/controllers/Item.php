<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}

	public function index(){
		//$data['title']="Ite Registration Form";
		$this->load->view('layout/header');
		$this->load->model('Item_model');
		$data['profiles']=$this->Item_model->get_all();
		$this->load->view('item/index',$data);
		$this->load->view('layout/footer');
	}


	public function getById(){

			$this->load->model('Item_model');
			echo json_encode($this->Item_model->get_single($this->input->post('uid')));


	}
	public function get(){

		$this->load->model('Item_model');
		echo json_encode($this->Item_model->get());

	}
	public function create(){

    $this->load->model('Item_model');
		$item_field= array(
		'item_name'  => $this->input->post('item_name'),
    'item_brand_id'  => $this->input->post('brand'),
		'item_category'  => $this->input->post('category'),
);
		$query= $this->Item_model->create($item_field);
    redirect('item');
  }
	public function updateItem()
	{

		$data = array
			(

				'item_id'  => $this->input->post('u_item_id'),
				'item_name'  => $this->input->post('u_item'),
		    'item_brand_id'  => $this->input->post('u_brand'),
				'item_category'  => $this->input->post('u_category'),
					);
					//echo $this->input->post('u_group_name');
		$this->load->model('Item_model'); // First load the model
		$this->Item_model->updateItem($data); // call the method from the controller
		redirect('item');


}}
