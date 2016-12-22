<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_l
 *
 * @author baysptr
 */
class Product_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_product($data) {
        $this->db->insert("tb_product", $data);
        return TRUE;
    }

    public function get_product($limit, $start) {
        return $this->db->select("*")
                        ->limit($limit, $start)
                        ->get("tb_product")
                        ->result_array();
    }

    public function get_num_product() {
        return $this->db->select('*')
                        ->get('tb_product')
                        ->num_rows();
    }
    
    public function edit_product($id){
        return $this->db->select("*")
                        ->where('id', $id)
                        ->get("tb_product")
                        ->row();
    }
    
    public function hapus_product($id) {
        $this->db->delete('tb_product', array('id' => $id));
        return TRUE;
    }

}
