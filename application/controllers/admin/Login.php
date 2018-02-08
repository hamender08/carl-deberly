<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    /*
     * Constructor;
     */

    public function __construct() {
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->model('Login_model');
    }

    /*
     * index function
     */

    public function index() {
	$data['title'] = 'ADMIN | LOGIN';
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	if ($this->form_validation->run() == FALSE) {
	    $this->form_validation->set_error_delimiters('<span class="text-danger"><small>', '</small></span>');
	} else {
	    $post = $this->security->xss_clean($this->input->post());
//	    echo '<pre>';
//	    print_r($post);
//	    exit;
	    $varCheckLogin = $this->Login_model->checkLogin($post);
	    if ($varCheckLogin) {
		redirect(base_url('admin/dashboard'));
	    } else {
		$this->session->set_flashdata('error', 'Invalid username and password!');
		redirect(base_url('admin/login'));
	    }
	}
	$this->load->view('admin/login/index', $data);
    }

}
