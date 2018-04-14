<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete_model extends CI_Model{
	public function get_sender($name)
	{
	    //$this->db->_compile_select();
			$this->db->like('sender_tel', $name, 'after');
	    // $this->db->like('first_name', $name, 'after');

	    //$this->db->where('id', $name);

	    $query = $this->db->get('tbl_sender_profile');

	    //echo $this->db->last_query();
	    //echo $query->num_rows();
	    $companies = array();
	    $i = 0;
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row)
	        {
	            $companies[$i]['sender_id'] = $row->sender_id;
							$companies[$i]['sender_tel'] = $row->sender_tel;
	            $companies[$i]['first_name'] = $row->first_name;
	            $i++;
	        }


	    }

	    //print_r($companies);
	    return $companies;


	}
	public function get_rcvr($name)
	{
	    //$this->db->_compile_select();
			$this->db->like('rcvr_tel', $name, 'after');
	    // $this->db->like('first_name', $name, 'after');

	    //$this->db->where('id', $name);

	    $query = $this->db->get('tbl_transfer_money');

	    //echo $this->db->last_query();
	    //echo $query->num_rows();
	    $companies = array();
	    $i = 0;
	    if($query->num_rows() > 0)
	    {
	        foreach ($query->result() as $row)
	        {
	            $companies[$i]['transfer_money_id'] = $row->transfer_money_id;
							$companies[$i]['rcvr_tel'] = $row->rcvr_tel;
	            $companies[$i]['rcvr_fname'] = $row->rcvr_fname;
	            $i++;
	        }


	    }

	    //print_r($companies);
	    return $companies;


	}
}
?>
