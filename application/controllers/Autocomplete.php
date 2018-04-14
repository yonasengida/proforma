<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {
	public function index(){
		// $data['title']="Waiting Approval";
		$this->load->view('layout/header');
		// $this->load->model('Transfer_model');
		// $data['profiles']=$this->Transfer_model->get_not_aprove();
		$this->load->view('autocomplete');
		$this->load->view('layout/footer');
	}
	function autocomplete1($a)
	{
	  $i = 0;
	  $this->load->model('Autocomplete_model');
	  $companyList = $this->Autocomplete_model->get_sender($a);

	  if(count($companyList) > 0):
	    echo "<datalist id='categoryname'>";
	    foreach($companyList as $comp):
	      echo "<option id='".$companyList[$i]['sender_tel']."'><a href='#'>".$companyList[$i]['sender_tel']."[".$companyList[$i]['first_name']."]"."</a></option>";
	      $i++;
	    endforeach;
	    echo "</datalist>";
	  endif;
	}

	function autocompletercvr($a)
	{
	  $i = 0;
	  $this->load->model('Autocomplete_model');
	  $companyList = $this->Autocomplete_model->get_rcvr($a);

	  if(count($companyList) > 0):
	    echo "<datalist id='categorynamercvr'>";
	    foreach($companyList as $comp):
	      echo "<option id='".$companyList[$i]['rcvr_tel']."'><a href='#'>".$companyList[$i]['rcvr_tel']."[".$companyList[$i]['rcvr_fname']."]"."</a></option>";
	      $i++;
	    endforeach;
	    echo "</datalist>";
	  endif;
	}
}
