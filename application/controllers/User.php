<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    //Constructor
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Common_model', 'User_login_model'));
    }

    //Index Function
    public function signup() {
        ///echo '<pre>'; print_r($this->input->post()); exit;
        $response = '';
        $this->record = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'date_added' => date('Y-m-d H:i:s'),
            'date_modified' => date('Y-m-d H:i:s')
        );
        if ($this->Common_model->add('db_users', $this->record)) {
            $response = "success";
        } else {
            $response = "error";
        }
        echo $response;
    }

    //Check If mail already exist
    public function checkmail() {
        $this->db->select('*');
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('db_users');
        $num = $query->num_rows();
        //echo $num; exit;
        if ($num > 0) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }

    //User Login function
    public function login() {
        $response = "";
        if ($this->User_login_model->checkLogin()) {
            $response = "success";
        } else {
            $response = "error";
        }
        echo $response;
    }

    //User Profile
    public function profile() {
        if ($this->session->userdata('USER_ID') == '') {
            redirect(base_url());
        }
        $this->load->helper(array('form'));
        $data = array(
            'title' => 'Delivberry | User',
            'userdata' => $this->Common_model->select('db_users', '*', array('id' => $this->session->userdata('USER_ID')))
        );
        //echo '<pre>'; print_r($data['userdata']); exit;
        $this->load->view('user/index', $data);
    }

    //Update User Profile
    public function update() {
        if ($this->session->userdata('USER_ID') == '') {
            redirect(base_url());
        }
        //echo '<pre>'; print_r($this->input->post()); exit;
        $arr = array(
            'name' => $this->input->post('uname'),
            'email' => $this->input->post('uemail'),
            'address' => $this->input->post('uaddress')
        );
        if ($this->Common_model->update_record('db_users', array('id' => $this->session->userdata('USER_ID')), $arr)) {
            $this->session->set_flashdata('success', 'Your profile has been successfully updated');
        } else {
            $this->session->set_flashdata('error', 'There is an error updating your profile');
        }
        redirect(base_url('user/profile'), 'refresh');
    }

    //Update Password For user
    public function update_password($argID) {
        $arr = array(
            'password' => md5($this->input->post('password')),
        );
        if ($this->Common_model->update_record('db_users', array('id' => $this->session->userdata('USER_ID')), $arr)) {
            $this->session->set_flashdata('success', 'Your password has been successfully updated');
        } else {
            $this->session->set_flashdata('error', 'There is an error updating your password');
        }
        redirect(base_url('user/profile'), 'refresh');
    }

}
