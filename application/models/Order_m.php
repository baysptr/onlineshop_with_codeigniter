<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author baysptr
 */
class Order_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('tb_order', $data);
        return TRUE;
    }

    public function get_rows() {
        $query = $this->db->select("*")
                ->order_by('tgl_post', 'asc')
                ->get('tb_order');
        return $query->result_array();
    }

    public function verifikasi($id) {
        $this->db->set('status', 'berhasil')
                ->where('id', $id)
                ->update('tb_order');

        return TRUE;
    }
    
    public function batal_order($id){
        $this->db->where('id', $id)
                ->delete('tb_order');
        
        return TRUE;
    }

}
