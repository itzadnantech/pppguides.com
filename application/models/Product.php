<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
    
    function __construct() {
        $this->ordTable = 'paymenttable';
    }
	
	/*
     * Fetch order data from the database
     * @param id returns a single record
     */
    public function getOrder($id){
        $this->db->select('r.*');
        $this->db->from($this->ordTable.' as r');
        $this->db->where('r.id', $id);
        $query  = $this->db->get();
        return ($query->num_rows() > 0)?$query->row_array():false;
    }
    
    /*
     * Insert transaction data in the database
     * @param data array
     */
    public function insertOrder($data){
        $insert = $this->db->insert($this->ordTable,$data);
        return $insert?$this->db->insert_id():false;
    }
    
}