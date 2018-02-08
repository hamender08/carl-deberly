<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login_model extends CI_Model {
    /*
     * Constructor 
     */

    public function __construct() {
        parent::__construct();
    }

    /*
     * Check Login function
     */

    public function checkLogin() {
        $query = $this->db->select('*')
                ->from('db_users')
                ->where(array('email' => $this->input->post('useremail'), 'password' => md5($this->input->post('userpassword'))))
                ->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $userData = array(
                'USERNAME' => $row->name,
                'USER_ID' => $row->id,
		'ROLE'=>'USER'
            );
            $this->session->set_userdata($userData);
            return true;
        }
        return false;
    }
    
    

}
