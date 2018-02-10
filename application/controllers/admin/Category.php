<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
     * Index Function
     */

    public function index() {
        $data = array(
            'title' => 'Admin | Category',
            'heading' => 'Category Management',
            'main' => 'admin/category/index',
            'record' => $this->Common_model->select('db_categories', '*', '')
        );
        $this->load->view('admin/includes/template', $data);
    }

    /*
     * Add Category
     */

    public function add() {
        $data = array(
            'title' => 'Category | Add',
            'heading' => 'Category Management',
            'main' => 'admin/category/add'
            
        );
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[db_categories.name]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<span class="text-danger"><small>', '</small></span>');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'slug' => $this->input->post('slug'),
                'status' => $this->input->post('status'),
                'date_added' => date('Y-m-d H:i:S'),
                'date_modifed' => date('Y-m-d H:i:S')
            );
            if ($this->Common_model->add('db_categories', $data)) {
                $this->session->set_flashdata('success', 'Category Successfully added');
            } else {
                $this->session->set_flashdata('error', 'There is an error in adding category');
            }
            redirect(base_url('admin/category'), 'refresh');
        }
        $this->load->view('admin/includes/template', $data);
    }

    /*
     * Edit Function
     */

    public function edit($argID) {
        $data = array(
            'title' => 'Category | Edit',
            'heading' => 'Category Management',
            'main' => 'admin/category/edit',
            'data' => $this->Common_model->edit('db_categories', array('id' => $argID))
        );
        $this->load->view('admin/includes/template', $data);
    }

    /*
     * Update Product
     */

    public function update($argID) {
        $data = array(
            'name' => $this->input->post('name'),
            'slug' => $this->input->post('slug'),
            'status' => $this->input->post('status'),
            'date_modifed' => date('Y-m-d H:i:S')
        );
        if ($this->Common_model->update_record('db_categories', array('id' => $argID), $data)) {
            $this->session->set_flashdata('success', 'Category Successfully updated');
        } else {
            $this->session->set_flashdata('error', 'There is an error in updating category!');
        }
        redirect(base_url('admin/category'), 'refresh');
    }
    
    // delete //
     public function remove($argID) {
        $data = array(
            'title' => 'Category | Delete',
            'main' => 'admin/category/index',
            'heading' => 'Category Management',
            'data' => $this->Common_model->delete('db_categories', array('id' => $argID)),
            'record' => $this->Common_model->select('db_categories', '*', '')
        );
        if($data['data']==0){
            $this->session->set_flashdata('warning', 'There is an error because products of this category are exist !');
        }
        //echo '<pre>'; print_r($data);die;
        $this->load->view('admin/includes/template', $data);
    }
    
/*
     * Add Sub-Category
     */

public function subcategory($argID) {
        $data = array(
            'title' => 'SubCategory | Add',
            'heading' => '',
            'main' => 'admin/category/subcategory',
            'category' => $this->Common_model->select('db_categories', '*', array('id' => $argID)),
            'subcategory' => $this->Common_model->select('db_subcategory', '*', array('cid' => $argID))
        );
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[db_categories.name]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<span class="text-danger"><small>', '</small></span>');
        } else {
            $data = array(
                'cid' => $argID,
                'name' => $this->input->post('name'),
                'slug' => $this->input->post('slug'),
                'status' => $this->input->post('status'),
                'date_added' => date('Y-m-d H:i:S')
            );
            if ($this->Common_model->add('db_subcategory', $data)) {
                $this->session->set_flashdata('success', 'Sub-Category Successfully added');
            } else {
                $this->session->set_flashdata('error', 'There is an error in adding sub-category');
            }
            redirect(base_url('admin/category/subcategorylist/'.$argID), 'refresh');
        }
        $this->load->view('admin/includes/template', $data);
    }    

    public function subcategorylist($argID) {
        $data = array(
            'title' => 'SubCategory | Add',
            'heading' => '',
            'main' => 'admin/category/subcatdetail',
            'category' => $this->Common_model->select('db_categories', '*', array('id' => $argID)),
            'subcategory' => $this->Common_model->select('db_subcategory', '*', array('cid' => $argID))
        );
        
        $this->load->view('admin/includes/template', $data);
    }
    
    /*
     * Edit Function
     */

    public function subcategoryedit($argID) {
        $data = array(
            'title' => 'SubCategory | Edit',
            'heading' => 'Category Management',
            'main' => 'admin/category/subcategoryedit',
            'data' => $this->Common_model->edit('db_subcategory', array('id' => $argID))
        );
        $this->load->view('admin/includes/template', $data);
    }

    /*
     * Update Product
     */

    public function subcategoryupdate($argID) {
        $data = array(
            'name' => $this->input->post('name'),
            'slug' => $this->input->post('slug'),
            'status' => $this->input->post('status'),
            'date_added' => date('Y-m-d H:i:S')
        );
        if ($this->Common_model->update_record('db_subcategory', array('id' => $argID), $data)) {
            $this->session->set_flashdata('success', 'Category Successfully updated');
        } else {
            $this->session->set_flashdata('error', 'There is an error in updating category!');
        }
        redirect(base_url('admin/category'), 'refresh');
    }
    
    public function subcategoryremove($argCatID,$argID) {
        $data = array(
            'title' => 'Category | Delete',
            'heading' => '',
            'main' => 'admin/category/subcatdetail',
            'data' => $this->Common_model->delete('db_subcategory', array('id' => $argID)),
            'category' => $this->Common_model->select('db_categories', '*', array('id' => $argCatID)),
            'subcategory' => $this->Common_model->select('db_subcategory', '*', array('cid' => $argCatID))
        );
        if($data['data']==0){
            $this->session->set_flashdata('warning', 'There is an error because products of this category are exist !');
        }
        //echo '<pre>'; print_r($data);die;
        $this->load->view('admin/includes/template', $data);
    }

}
