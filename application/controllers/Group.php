<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}

	public function index(){
		$data['title']="Group Registration Form";
		$this->load->view('layout/header');
		$this->load->model('Group_model');
		$data['profiles']=$this->Group_model->get();
		$this->load->view('group/index',$data);
		$this->load->view('layout/footer');
	}

	public function create(){

    $this->load->model('Group_model');
		$group_field= array(
    'group_name'  => $this->input->post('group_name'),
     );
		$query= $this->Group_model->create($group_field);
    redirect('group');
  }
	public function getById(){

			$this->load->model('Group_model');
			echo json_encode($this->Group_model->get_single($this->input->post('uid')));

	}
	public function get(){

		$this->load->model('Group_model');
		echo json_encode($this->Group_model->get());

	}

	public function updateGroup()
	{

		$data = array
			(

				'group_id' => $this->input->post('u_group_id'),
				'group_name' =>$this->input->post('u_group_name'),
					);
					//echo $this->input->post('u_group_name');
		$this->load->model('Group_model'); // First load the model
		$this->Group_model->updateGroup($data); // call the method from the controller
		redirect('group');

}

}
