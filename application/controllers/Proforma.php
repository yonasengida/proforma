<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proforma extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}

	public function index(){
		$data['ref']= rand();
		$data['title']="Generate Performa";
		$this->load->view('layout/header');
		// $this->load->model('Transfer_model');
		// $data['profiles']=$this->Transfer_model->get_not_aprove();
		// $this->load->view('aprove/index',$data);
    $this->load->view('proforma/test',$data);
		$this->load->view('layout/footer');

	}
	public function get(){
		$this->load->view('layout/header');
		$this->load->model('Proforma_model');
		$data['profiles']=$this->Proforma_model->get_Proforma();
		$this->load->view('proforma/index',$data);
		$this->load->view('layout/footer');
	}
	public function getSummaryByCustomer(){
		$this->load->view('layout/header');
		$this->load->model('Proforma_model');
		$data['profiles']=$this->Proforma_model->get_Proforma_Customer();
		$this->load->view('proforma/summary',$data);
		$this->load->view('layout/footer');
	}
	public function getReference(){
		$this->load->model('Proforma_model');
		echo json_encode($this->Proforma_model->getRef());
	}
	public function viewProforma(){
		$this->load->model('Proforma_model');
		echo json_encode($this->Proforma_model->get_single());
	}

	public function get1(){

		$this->load->model('Proforma_model');
		echo json_encode($this->Proforma_model->get1());

	}
	public function search_by_ref(){
		$this->load->view('layout/header');
		$this->load->view('proforma/search');
		$this->load->view('layout/footer');
	}
	public function getByRef(){
		$this->load->view('layout/header');
		$this->load->model('Proforma_model');
		$data['profiles']=$this->Proforma_model->get_by_ref();
		$this->load->view('proforma/print',$data);
		$this->load->view('layout/footer');
	}
	public function get_all(){

		$this->load->model('Proforma_model');
		echo json_encode($this->Proforma_model->get());

	}
	public function get_by_ref(){
		echo "Hello";
		// $this->load->model('Proforma_model');
		// echo json_encode($this->Proforma_model->search_by_ref());

	}
	public function create(){
		$this->load->model('Proforma_model');

		$item=$this->input->post('item');
		$unit=$this->input->post('unit');
		$quantity=$this->input->post('quantity');
		$unit_price=$this->input->post('unitprice');
		$total=$this->input->post('total');
	foreach($item as $i => $b){
		 $proforma_field= array(
		 'p_customer'  => $this->input->post('p_customer'),
		 'reference_no'  => $this->input->post('ref'),
		 'p_item_id'  => $item[$i],
		 'unit'  => $unit[$i],
		 'quantity'  => $quantity[$i],
		 'unit_price'  => $unit_price[$i],
		 'total_amount'  =>$quantity[$i]*$unit_price[$i],
	   'date'  => date('Y-m-d H:i:s')
       );
	 $query= $this->Proforma_model->create($proforma_field);

		}
		$ref_no_field= array(
		'ref_no'  => $this->input->post('ref1')
	 );
	$queryRefernce= $this->Proforma_model->createRerence($ref_no_field);

	$_SESSION['reference']=$this->input->post('ref');
	echo $_SESSION['refer_number']=$this->input->post('ref');
	echo $_SESSION['customer_name']=$this->input->post('p_customer');
   redirect('proforma/getByRef');
  }



}
