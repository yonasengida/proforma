<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index(){
        // If the user is validated, then this function will run
      //  echo 'Congratulations, you are logged in.';
      //  echo $this->session->userdata('user_id');
        //$this->load->view('layout/test');
        $this->load->view('layout/header');
        // $this->load->model('Transfer_model');
        // $data['commision']=$this->Transfer_model->getTotalCommision();
        // $data['todaycommision']=$this->Transfer_model->getTodayCommision();
        //
        // $this->load->model('Payment_model');
        //
    		// $data['paid']=$this->Payment_model->getTotalPaid();
        // $data['unpaid']=$this->Payment_model->getTotalUnPaid();
        // $data['todaypaid']=$this->Payment_model->getTodayPaid();
        // $data['todayunpaid']=$this->Payment_model->getTodayUnPaid();
        // $this->load->view('transfer/home',$data);
        $this->load->view('layout/footer');



    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('auth');
        }
    }
 }
 ?>
