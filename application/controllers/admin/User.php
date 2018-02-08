<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    /*
     * Constructor
     */

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('USER_ID') == '') {
	    redirect(base_url('admin/login'));
	}
	$this->load->library('form_validation');
	$this->load->model('Common_model');
    }

    /*
     * index function
     */
    public function index() {
        $data = array(
            'title' => 'Admin | User',
            'heading' => 'User Management',
            'main' => 'admin/user/index',
            'records'=>$this->Common_model->select('db_users', '*', '')
        );
        //echo '<pre>'; print_r($data['records']); exit;
        $this->load->view('admin/includes/template', $data);
    }

}
