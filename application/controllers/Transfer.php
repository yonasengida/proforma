<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->check_isvalidated();
	}

	function autocomplete()
	{
	    $this->load->model('model','Transfer_model');
	    $query= $this->get_data->get_autocomplete();

	    foreach($query->result() as $row):
	        echo "<li id='$row->sender_tel'>".$row->first_name."</li>";
	    endforeach;
	}
	public function generateCode(){
		//$randomCode = rand();
		$branchCode=$this->session->userdata('branch_code').rand();

		//$response=$this->checkInDB($branchCode);
			echo json_encode($this->checkInDB($branchCode));
		}

	private function checkInDB($key){
		$this->load->model('Transfer_model');
		$result=$this->Transfer_model->checkKeyExistence($key);
		  if(! $result){
				//echo "Not Found"
				return $key;

			}else{
			//	echo "Found";
				$this->generateCode();
			}
	}
	public function index()
	{
		/*Generate key*/

		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['branches']=$this->Transfer_model->get_all();
		//$data['code']=$this->generateCode();
		$this->load->view('transfer/transfer',$data);
	 	$this->load->view('layout/footer');
	}
	public function newtransfer()
	{
		$this->load->view('layout/header');
		$this->load->view('transfer/transfer');
		$this->load->view('layout/footer');

	}

	public function search_by_date(){

		// $data['title']="Paid Payment History";
		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['profiles']=$this->Transfer_model->searchByDate();
		$this->load->view('transfer/transfer_report',$data);
		$this->load->view('layout/footer');
	}// end of get function
	public function get(){
		$this->load->view('layout/header');
		$this->load->model('Transfer_model');
		$data['profiles']=$this->Transfer_model->get_all();
		$this->load->view('transfer/index',$data);
		$this->load->view('layout/footer');

	}

	public function create(){

				if (isset($_POST['confrim'] ) ) {

					$this->load->view('layout/header');

					// The below array is for confrimation purpose only
					$transfer_money_field_for_confrimation= array(
						'first_name'=> $this->input ->post('sender_fname'),
						'middle_name'=> $this->input->post('sender_mname'),
						'last_name' => $this->input ->post('sender_lname'),
						'sender_gender'    => $this->input ->post('sender_gender'),
						'sender_kebele'    => $this->input ->post('sender_kebele'),
						'sender_tel'    => $this->input ->post('sender_tel'),
						'sender_id_no'    => $this->input ->post('sender_id_no'),
						'sender_house_number'    => $this->input ->post('sender_house_number'),
						'rcvr_fname'=> $this->input->post('rcvr_fname'),
						'rcvr_mname'=> $this->input->post('rcvr_mname'),
						'rcvr_lname'=> $this->input->post('rcvr_lname'),
						'rcvr_gender'=> $this->input->post('rcvr_gender'),
						'rcvr_house_number'=> $this->input->post('rcvr_house_number'),
						'rcvr_kebele'=> $this->input->post('rcvr_kebele'),
						'rcvr_tel'=> $this->input->post('rcvr_tel'),
						'rcvr_id_no'=> $this->input->post('rcvr_id_no'),
						'secuirity_code'=> $this->input->post('secuirity_code'),
						'amount'=> $this->input->post('amount'),
						'rate'=> $this->input->post('rate'),
						'commision_amount'=> $this->input->post('commision_amount'),
						'net_amount'=> $this->input->post('netamount'),
						'purpose'=> $this->input->post('purpose'),
						'receiving_branch'=> $this->input->post('receiving_branch'),
						'sending_staff'=> $this->input->post('sending_staff'),
						'approver'=> $this->input->post('approver'),
						'amount'=> $this->input->post('amount'),

						);
					$_SESSION['confrim_data'] = $transfer_money_field_for_confrimation;
					$this->load->view('transfer/confrim_transfer');
					$this->load->view('layout/footer');
			        //get Sender profile from Form
					$profile_field= array(
					'first_name'=> $this->input ->post('sender_fname'),
					'middle_name'=> $this->input->post('sender_mname'),
					'last_name' => $this->input ->post('sender_lname'),
					'sender_gender'    => $this->input ->post('sender_gender'),
					'sender_kebele'    => $this->input ->post('sender_kebele'),
					'sender_tel'    => $this->input ->post('sender_tel'),
					'sender_id_no'    => $this->input ->post('sender_id_no'),
					'sender_house_number'    => $this->input ->post('sender_house_number'),
					'sp_user_id'    => $this->input ->post('sending_staff'),
					'sp_created_at'=>date('Y-m-d H:i:s')

					);

					$_SESSION['profile']=$profile_field;

					$transfer_money_field= array(
					'rcvr_fname'=> $this->input->post('rcvr_fname'),
					'rcvr_mname'=> $this->input->post('rcvr_mname'),
					'rcvr_lname'=> $this->input->post('rcvr_lname'),
					'rcvr_gender'=> $this->input->post('rcvr_gender'),
					'rcvr_house_number'=> $this->input->post('rcvr_house_number'),
					'rcvr_kebele'=> $this->input->post('rcvr_kebele'),
					'rcvr_tel'=> $this->input->post('rcvr_tel'),
					'rcvr_id_no'=> $this->input->post('rcvr_id_no'),
					'secuirity_code'=> $this->input->post('secuirity_code'),
					'amount'=> $this->input->post('amount'),
					'net_amount'=> $this->input->post('netamount'),
					'rate'=> $this->input->post('rate'),
					'commision_amount'=> $this->input->post('commision_amount'),
					'purpose'=> $this->input->post('purpose'),
					'receiving_branch'=> $this->input->post('receiving_branch'),
					'sending_branch'=> $this->input->post('sending_branch'),
					'sending_staff'=> $this->input->post('sending_staff'),
					'approver'=> "approver",
					'send_date'=>date('Y-m-d H:i:s'),
					'tm_created_at'=>date('Y-m-d H:i:s'),
					'tm_user_id'   => $this->session->userdata('user_id'),
					'tm_status'=>'unpaid',
					'aprove_status'=>'notaprove'
				//	'p_created_by'    =>$this->session->userdata('user_id'),

					);
					//$_SESSION['sender_tel']=
				$_SESSION['money_transfer']=$transfer_money_field;

				}else{

			$profile_field=$_SESSION['profile'];
			//load Transfer MOdel
			$this->load->model('Transfer_model');

			$check= $this->Transfer_model->validateProfile();

			if($check >= 1){
				// $this->session->set_flashdata('fail',"The  Sender Telephone  is Already Exist");
				// redirect('transfer');
				// create only transfer Here.
				// get profile Id
				// echo "Call";
				$sender_profileID=$this->Transfer_model->getProfileId();
				// echo $sender_profileID;
				$transfer_money_field=	$_SESSION['money_transfer'];
				// Push Sender id in Money transfer information
				$transfer_money_field['fk_sender_id'] = $sender_profileID;
				$query= $this->Transfer_model->sendMoney($transfer_money_field);
				$this->session->set_flashdata('item',"Successfully Transfered" );
					redirect('transfer');

			}else{
				//Pass Sender profile to Transfer Model and retrieve recent/ last id
				$sender_profileID= $this->Transfer_model->createProfile($profile_field);
				//Register Transfer money
				$transfer_money_field=	$_SESSION['money_transfer'];
				// Push Sender id in Money transfer information
				$transfer_money_field['fk_sender_id'] = $sender_profileID;
				$query= $this->Transfer_model->sendMoney($transfer_money_field);
				$this->session->set_flashdata('item',"Successfully Transfered" );
					redirect('transfer');
			}

	}
  }// end of Create Function

	  public function getAll(){
		    $this->load->model('Transfer_model');
				echo json_encode($this->Transfer_model->get_all());
		 }

		public function getTransferDetailById(){
				$this->load->model('Transfer_model');
				echo json_encode($this->Transfer_model->get_single($this->input->post('uid')));

		}
		public function getSenderByTel(){
				$this->load->model('Transfer_model');
				echo json_encode($this->Transfer_model->searchSender($this->input->post('tel')));

		}

function search_tel() {

	$this->load->model('Transfer_model');
	echo json_encode($this->Transfer_model->search_by_tel($this->input->post('uid')));

}
function search_rcvr_tel() {

	$this->load->model('Transfer_model');
	echo json_encode($this->Transfer_model->search_rcvr_by_tel($this->input->post('uid')));

}
		function get_tel() {

			$this->load->model('Transfer_model');
			echo json_encode($this->Transfer_model->get_by_tel($this->input->post('uid')));

   }
		function get_by_security_code() {

			$this->load->model('Transfer_model');
			echo json_encode($this->Transfer_model->get_by_code($this->input->post('uid')));
		//	echo json_encode($this->input->post('code'));
   }
	 private function check_isvalidated(){
	 			if(! $this->session->userdata('validated')){
	 					redirect('auth');
	 			}
	 	}
		public function getTodaySummary(){
			$this->load->view('layout/header');
			$this->load->model('Transfer_model');
      $data['today']=$this->Transfer_model->get_today_summary();
			$this->load->view('transfer/today_transfer_report',$data);
			$this->load->view('layout/footer');


		 }
		 public function getTodayBranch(){
		 // 	$this->load->view('layout/header');
				$this->load->model('Transfer_model');
			 echo json_encode($this->Transfer_model->get_today_branch());
		 // 	$this->load->view('transfer/today_transfer_report',$data);
		 // 	$this->load->view('layout/footer');


			}
		 public function getDailyReport(){
 		$this->load->view('layout/header');
 		   $this->load->model('Transfer_model');
       $data['profiles']=$this->Transfer_model->get_today();
 		 $this->load->view('transfer/daily_transfer_report',$data);
 			$this->load->view('layout/footer');


 		 }
		 public function getToday(){
		 // 	$this->load->view('layout/header');
				$this->load->model('Transfer_model');
			 echo json_encode($this->Transfer_model->get_today());
		 // 	$this->load->view('transfer/today_transfer_report',$data);
		 // 	$this->load->view('layout/footer');


			}
		 public function getAllTodaySummary(){
			 $this->load->view('layout/header');
			 $this->load->model('Transfer_model');
			 $data['today']=$this->Transfer_model->get_all_today_summary();
			 $this->load->view('transfer/today_all_transfer_report',$data);
			 $this->load->view('layout/footer');

 		 }

}
