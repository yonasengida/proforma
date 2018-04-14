<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function _construct(){
		parent:: _construct();

	}


	public function index(){
		$this->load->view('layout/header');
$this->load->view('index');
$this->load->view('layout/footer');


	}





}
