<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{
  function __construct(){
       parent::__construct();
   }

   public function validate(){
       // grab user input
       $username = $this->security->xss_clean($this->input->post('username'));
       $password = md5($this->security->xss_clean($this->input->post('password')));

      //  // Prep the query
       $this->db->where('user_name', $username);
       $this->db->where('password', $password);
       $this->db->where('status', 'active');

       // Run the query
       $query = $this->db->get('view_users');
    //   echo $query->num_rows()."TEst";
       // Let's check if there are any results
       if($query->num_rows() == 1)
       {
           // If there is a user, then create session data
           $row = $query->row();
           $data = array(
                   'user_id' => $row->user_id,
                   'user_name' => $row->user_name,
                   'branch' => $row->branch_name,
                   'branch_code' => $row->branch_code,
                   'status' => $row->status,
                   'tel' => $row->tel,
                   'staff_id' => $row->staff_id,
                   'validated' => true
                   );
           $this->session->set_userdata($data);
           return true;
       }
       // If the previous process did not validate
       // then return false.
       return false;
   }

}
?>
