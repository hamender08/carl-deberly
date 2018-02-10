<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    //Constructor
    public function __construct() {
        parent::__construct();
        if (($this->session->userdata('USER_ID') == '') && ($this->session->userdata('ROLE')!='USER')) {
            redirect(base_url());
        }
    }

    //Index Function
    public function index() {
        $data = array(
            'title' => 'Delivberry | Products',
           
        );
        $this->load->view('home/product', $data);
    }


}
