<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    protected $record = array();

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
	    'title' => 'Admin | Product',
	    'heading' => 'Product Management',
	    'main' => 'admin/products/index',
	    'record' => $this->Common_model->getProducts()
	);
	$this->load->view('admin/includes/template', $data);
    }

    /*
     * Add Function
     */

    public function add() {
	$data = array(
	    'title' => 'Product | Add',
	    'heading' => 'Product Management',
	    'main' => 'admin/products/add',
            'category' => $this->Common_model->select('db_categories', '*', '')
	);
	$test = '';
	$this->form_validation->set_rules('name', 'Name', 'required');
	$this->form_validation->set_rules('price', 'Price', 'required|numeric');
	$this->form_validation->set_rules('code', 'Product Code', 'required');
	if ($this->form_validation->run() == FALSE) {
	    $this->form_validation->set_error_delimiters('<span class="text-danger"><small>', '</small></span>');
	} else {
	    $this->record = array(
		'name' => $this->input->post('name'),
		'category' => $this->input->post('category'),
		'price' => $this->input->post('price'),
		'code' => $this->input->post('code'),
		'description' => $this->input->post('description'),
		'date_added' => date('Y-m-d H:i:s'),
		'date_modified' => date('Y-m-d H:i:s'),
		'status' => $this->input->post('status')
	    );
	    if ($this->Common_model->add('db_products', $this->record)) {
		$insert_id = $this->db->insert_id();
		//File Upload Code Starts Here
		$test = count(array_filter($_FILES['file']['name']));
		if ($test > 0) {
		    //echo '<pre>'; print_r(count($_FILES['file']['name']));
		    //echo 'Hi'; exit;
		    $uploadPath = 'uploads/products/' . $insert_id . '/';
		    $files = $_FILES;
		    $cpt = count($_FILES['file']['name']);
		    $arr = array();
		    $this->load->library('upload');
		    for ($i = 0; $i < $cpt; $i++) {
			$_FILES['file']['name'] = $files['file']['name'][$i];
			$_FILES['file']['type'] = $files['file']['type'][$i];
			$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
			$_FILES['file']['error'] = $files['file']['error'][$i];
			$_FILES['file']['size'] = $files['file']['size'][$i];

			//Creating Directory
			if (!is_dir($uploadPath)) {
			    mkdir($uploadPath, 0777, true);
			}
			//Upload Settings
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$tmp = $this->upload->data();
			//Thumbnail configs
			$this->load->library('image_lib');
			$config_t['image_library'] = 'gd2';
			$config_t['source_image'] = './uploads/products/' . $insert_id . '/' . $tmp['file_name'];
			$config_t['new_image'] = './uploads/products/' . $insert_id . '/';
			$config_t['create_thumb'] = TRUE; ///change this
			$config_t['maintain_ratio'] = TRUE;
			$config_t['thumb_marker'] = '_thumb';
			$config_t['width'] = 80;
			$config_t['height'] = 80;
			//end of configs
			$this->image_lib->initialize($config_t);
			if (!$this->image_lib->resize()) {
			    echo $this->image_lib->display_errors();
			}
			$this->image_lib->clear();
			if ($tmp['file_name'] != '') {
			    $arr[$i] = array(
				'product_id' => $insert_id,
				'image' => $tmp['file_name'],
				'date_added' => date('Y-m-d H:i:s'),
			    );
			}
		    }
		    $this->db->insert_batch('db_produt_images', $arr);
		}
		$this->session->set_flashdata('success', 'Product Successfully added');
	    } else {
		$this->session->set_flashdata('error', 'There is an error adding produt');
	    }
	    redirect(base_url('admin/product'), 'refresh');
	}
      //  echo '<pre>'; print_r($data);        die();
	$this->load->view('admin/includes/template', $data);
    }

    /*
     * Edit Function
     */

    public function edit($argID) {
	$data = array(
	    'title' => 'Product | Edit',
	    'heading' => 'Product Management',
	    'main' => 'admin/products/edit',
	    'data' => $this->Common_model->edit('db_products', array('id' => $argID)),
	    'images' => $this->Common_model->select('db_produt_images', '*', array('product_id' => $argID))
	);
	$this->load->view('admin/includes/template', $data);
    }

    /*
     * Update Product
     */

    public function update($argID) {
	$this->record = array(
	    'name' => $this->input->post('name'),
	    'category' => $this->input->post('category'),
	    'price' => $this->input->post('price'),
	    'code' => $this->input->post('code'),
	    'description' => $this->input->post('description'),
	    'date_modified' => date('Y-m-d H:i:s'),
	    'status' => $this->input->post('status')
	);
	if ($this->Common_model->update_record('db_products', array('id' => $argID), $this->record)) {
	    $this->session->set_flashdata('success', 'Product Successfully updated');
	} else {
	    $this->session->set_flashdata('error', 'There is an error in updating product!');
	}
	redirect(base_url('admin/product'), 'refresh');
    }

    /*
     * Update Image
     */

    public function update_image($argID) {
	//echo '<pre>'; print_r($_FILES);
	$test = count(array_filter($_FILES['file']['name']));
	if ($test > 0) {
	    //echo '<pre>'; print_r(count($_FILES['file']['name']));
	    //echo 'Hi'; exit;
	    $uploadPath = 'uploads/products/' . $argID . '/';
	    $files = $_FILES;
	    $cpt = count($_FILES['file']['name']);
	    $arr = array();
	    $this->load->library('upload');
	    for ($i = 0; $i < $cpt; $i++) {
		$_FILES['file']['name'] = $files['file']['name'][$i];
		$_FILES['file']['type'] = $files['file']['type'][$i];
		$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
		$_FILES['file']['error'] = $files['file']['error'][$i];
		$_FILES['file']['size'] = $files['file']['size'][$i];

		//Creating Directory
		if (!is_dir($uploadPath)) {
		    mkdir($uploadPath, 0777, true);
		}
		//Upload Settings
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = FALSE;
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		$tmp = $this->upload->data();
		//Thumbnail configs
		$this->load->library('image_lib');
		$config_t['image_library'] = 'gd2';
		$config_t['source_image'] = './uploads/products/' . $argID . '/' . $tmp['file_name'];
		$config_t['new_image'] = './uploads/products/' . $argID . '/';
		$config_t['create_thumb'] = TRUE; ///change this
		$config_t['maintain_ratio'] = TRUE;
		$config_t['thumb_marker'] = '_thumb';
		$config_t['width'] = 80;
		$config_t['height'] = 80;
		//end of configs
		$this->image_lib->initialize($config_t);
		if (!$this->image_lib->resize()) {
		    echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
		if ($tmp['file_name'] != '') {
		    $arr[$i] = array(
			'product_id' => $argID,
			'image' => $tmp['file_name'],
			'date_added' => date('Y-m-d H:i:s'),
		    );
		}
	    }
	    if ($this->db->insert_batch('db_produt_images', $arr)) {
		$this->session->set_flashdata('success', 'New images successfully added');
	    } else {
		$this->session->set_flashdata('error', 'There is an erro in adding new images !');
	    }
	    redirect(base_url('admin/product'), 'refresh');
	} else {
	    $this->session->set_flashdata('error', 'Please select an image for upload');
	    redirect(base_url('admin/product/edit/' . $argID), 'refresh');
	}
    }

    /*
     * Delete product image
     */

    public function delete_image($argID) {
	$data = $this->Common_model->select('db_produt_images', '*', array('id' => $argID));
	//echo '<pre>';	print_r($data[0]); exit;
	if ($this->Common_model->delete('db_produt_images', array('id' => $argID))) {
	    //upload image from folder
	    $file_path = './uploads/products/' . $data[0]->product_id . '/' . $data[0]->image;
	    //thumbnial path
	    $img = explode('.', $data[0]->image);
	    $thumb_path = './uploads/products/' . $data[0]->product_id . '/' . $img[0] . '_thumb.' . $img[1];
	    //echo $file_path.$thumb_path; exit;
	    //delete image from directory
	    if (file_exists($file_path)) {
		unlink($file_path);
	    }
	    //delete thumb from folder
	    if (file_exists($thumb_path)) {
		unlink($thumb_path);
	    }
	    $this->session->set_flashdata('success', 'Image successfully deleted');
	} else {
	    $this->session->set_flashdata('error', 'There is an error in deleting image !');
	}
	redirect(base_url('admin/product/edit/' . $data[0]->product_id), 'refresh');
    }

    /*
     * Delete Poduct
     */

    public function remove($argID) {
	if ($this->Common_model->delete('db_products', array('id' => $argID))) {
	    //Remove Product Folder and all its images
	    $folder = './uploads/products/' . $argID;
	    $this->load->helper("file"); // load the helper
	    delete_files($folder, true);
	    rmdir($folder);
	    $this->session->set_flashdata('success', 'Product successfully deleted');
	} else {
	    $this->session->set_flashdata('error', 'There is an error in deleting product !');
	}
	redirect(base_url('admin/product'), 'refresh');
    }

}
