<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
         parent::__construct();
     }


    public function index($msg = NULL){

        // Load our view to be displayed
        // to the user
         $data['msg'] = $msg;
				//  $date['err']=$err;
         $this->load->view('auth/index', $data);
    }

    public function process(){
			// echo $this->input->post('num1');
			// echo $this->input->post('num2');
			$sum=$this->input->post('num1')+$this->input->post('num2');

        $this->load->model('Auth_model');
        // Validate the user can login
        $result = $this->Auth_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate,
            // Send them to members area

            redirect('home');
        }


    }
		public function logout(){
        $this->session->sess_destroy();
        redirect('auth/index');
    }


	}
