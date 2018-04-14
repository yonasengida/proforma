<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->check_isvalidated();
	}


	public function index(){
		// $this->load->view('layout/header');
		// $this->load->view('payment/index');
		// $this->load->view('layout/footer');
		$data['title']="UnPaid Payment History";
		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['profiles']=$this->Transfer_model->get_unpaid();
		$this->load->view('payment/index',$data);
		$this->load->view('layout/footer');
	}
	public function get(){
		$data['title']="UnPaid Payment History";
		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['profiles']=$this->Transfer_model->get_unpaid();
		$this->load->view('payment/index',$data);
		$this->load->view('layout/footer');
	}// end of get function


	public function getPaidPayment(){
			$data['title']="Paid Payment History";
		$this->load->view('layout/header');
		$this->load->model('Payment_model');
		$data['profiles']=$this->Payment_model->get_paid();
		$this->load->view('payment/paidpayment',$data);
		$this->load->view('layout/footer');
	}// end of get function
	public function search(){
		$data['title']="Paid Payment History";
		$this->load->view('layout/header');
		$this->load->model('Payment_model');
		$data['profiles']=$this->Payment_model->get_paid();
		$this->load->view('payment/search',$data);
		$this->load->view('layout/footer');
	}// end of get function

	public function search_by_date(){

		// $data['title']="Paid Payment History";
		$this->load->view('layout/header');
		$this->load->model('Payment_model');
		//$data['from']=$this->Payment_model->searchByDate();
		$data['profiles']=$this->Payment_model->searchByDate();

		$this->load->view('payment/payment_report',$data);
		$this->load->view('layout/footer');
	}// end of get function


	public function create(){

    $this->load->model('Payment_model');
		$payment_field= array(
		'fk_transfer_id'=> $this->input ->post('txt_transfer_id'),
		'p_branch' => $this->session->userdata('branch'),
		'p_created_by'    =>$this->session->userdata('user_id'),
		'p_created_at'    => date('Y-m-d H:i:s'),
		'p_updated_at'    => date('Y-m-d H:i:s'),
		);
		$_SESSION['transfer_id']=$this->input ->post('txt_transfer_id');
		$query= $this->Payment_model->create($payment_field);
		if($query== true){
			//redirect('payment/get');
		 $query= $this->updateTransferStatus();
		}

  }// End of Create Function


	public function updateTransferStatus()
	{
    $data = array
      (
				// 'transfer_id' => $this->input->post('fk_transfer_id'),
        'transfer_id' => $_SESSION['transfer_id'],
        'status' =>'paid'
      );

    $this->load->model('Payment_model'); // First load the model
    $this->Payment_model->updateTransfer($data); // call the method from the controller
		redirect('payment/get');

}
public function getTodayPayment(){
		$this->load->model('Payment_model');
	echo json_encode($this->Payment_model->getTodayPayment());
 }

 private function check_isvalidated(){
 			if(! $this->session->userdata('validated')){
 					redirect('auth');
 			}
 	}
	public function getToday(){

		 $this->load->model('Payment_model');
		echo json_encode($this->Payment_model->get_today());
	 }
	 public function getTodayBranch(){
	 // 	$this->load->view('layout/header');
			$this->load->model('Payment_model');
		 echo json_encode($this->Payment_model->get_today_branch());
	 // 	$this->load->view('transfer/today_transfer_report',$data);
	 // 	$this->load->view('layout/footer');


		}
	public function getTodaySummary(){
		$this->load->view('layout/header');
		$this->load->model('Payment_model');
		$data['today']=$this->Payment_model->get_today_summary();
		$this->load->view('payment/today_payment_report',$data);
		$this->load->view('layout/footer');


	 }
	public function getDailyReport(){
    $this->load->view('layout/header');
		$this->load->model('Payment_model');
		$data['profiles']=$this->Payment_model->get_today();
	  $this->load->view('payment/daily_payment_report',$data);
	  $this->load->view('layout/footer');


	}
	public function getAllTodaySummary(){
		$this->load->view('layout/header');
		$this->load->model('Payment_model');
		$data['today']=$this->Payment_model->get_all_today_summary();
		$this->load->view('payment/today_all_payment_report',$data);
		$this->load->view('layout/footer');

	}


}
