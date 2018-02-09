<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    //Constructor
    public function __construct() {
	parent::__construct();
    }

    //Index Function
    public function index() {
	$data = array(
	    'title' => 'Delivberry | Home',
	);
	$this->load->view('home/all', $data);
    }
    
    public function home() {
	$data = array(
	    'title' => 'Delivberry | Home',
	);
	$this->load->view('home/home', $data);
    }

}