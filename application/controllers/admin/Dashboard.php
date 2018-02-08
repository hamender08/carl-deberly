<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    /*
     * Constructor
     */

    public function __construct() {
	parent::__construct();
    }

    /*
     * Index Function
     */
    public function index() {
	$data = array(
	    'title' => 'Admin | Dashboard',
	    'heading' => 'Dashboard',
	    'main' => 'admin/dashboard/index'
	);
	$this->load->view('admin/includes/template', $data);
    }

}
