<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    /*
     * Constructor 
     */

    public function __construct() {
        parent::__construct();
    }

    /*
     * Check Login function
     */

    public function checkLogin($argPost) {
	$pass=$argPost['password'];
        $query = $this->db->select('*')
                ->from('db_admin')
                ->where(array('email' => $argPost['email'], 'password' => md5($pass)))
                ->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $userData = array(
                'USERNAME' => $row->name,
                'USER_ID' => $row->id
            );
            $this->session->set_userdata($userData);
            return true;
        }
        return false;
    }
    
    

}
