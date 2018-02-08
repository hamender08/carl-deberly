<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {
    /*
     * Constructor 
     */

    public function __construct() {
	parent::__construct();
    }

    /*
     * Add Function
     */

    public function add($table, $arr) {
        
	if ($this->db->insert($table, $arr)) {
	    return true;
	}
        echo 'hii';die;
	return false;
    }

    /*
     * Edit Function
     */

    public function edit($table, $condition) {
	return $this->db->get_where($table, $condition)->row();
    }

    /*
     * Update Function
     */

    public function update_record($table, $condition, $arr) {

	$this->db->where($condition);
	if ($this->db->update($table, $arr)) {
	    return true;
	}
	return false;
    }

    /*
     * Select Record
     */

    public function select($table, $fileds, $conditions) {
	if(is_array($conditions) && count($conditions) > 0)
	{
	    $this->db->where($conditions);
	}
	return $this->db->select($fileds)
			->from($table)
			->get()->result();
    }

    /*
     * Get Joins 
     */

    public function get_joins($table, $columns, $joins) {
	$this->db->select($columns)->from($table);
	if (is_array($joins) && count($joins) > 0) {
	    foreach ($joins as $k => $v) {
		$this->db->join($v['table'], $v['condition'], $v['jointype']);
	    }
	}
	return $this->db->get()->result_array();
    }
    
    /*
     * Delete Function
     */
    public function delete($table, $condition)
    {
       
	$this->db->where($condition);
	if($this->db->delete($table))
	{
            return 1;
	}
        $error  = $this->db->error ();
        if ($error != 0){
	  return 0;
        }
    }

    /*
     * Get Custom Products
     */
    public function getProducts() {
	return $this->db->select('a.*, b.image, MIN(b.id), b.product_id')
			->from('db_products AS a')
			->join('db_produt_images AS b', 'a.id=b.product_id', 'left')
			->group_by('a.id')
			->order_by('a.id', 'desc')
			->get()->result_array();
    }

}
