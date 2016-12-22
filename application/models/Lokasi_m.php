<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lokasi_m
 *
 * @author baysptr
 */
class Lokasi_m extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function getProv(){
        $result = $this->db->order_by("namaPropinsi", "asc")
                ->get('list_propinsi');
        if($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return array();
        }
    }
    public function getKota($kodePropinsi){
        $this->db->where('kodePropinsi', $kodePropinsi);
        $result = $this->db->get('list_kabkota');
        if($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return array();
        }
    }
}
