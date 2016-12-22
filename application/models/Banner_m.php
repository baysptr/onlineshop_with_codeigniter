<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Banner_m
 *
 * @author baysptr
 */
class Banner_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function generate_id() {
        $id = uniqid("BANNER_");
        return $id;
    }

    public function show_banner() {
        $query = $this->db->select('*')
                ->get("tb_slider");
        return $query->result_array();
    }

    public function get_row_banner() {
        $query = $this->db->select('*')
                ->get('tb_slider')
                ->num_rows();
        return $query;
    }

    public function add_banner($data) {
        $this->db->insert("tb_slider", $data);
        return TRUE;
    }

    public function edit_banner($id) {
        $query = $this->db->select('*')
                ->where('id', $id)
                ->get('tb_slider');
        return $query->result_array();
    }

    public function hapus_banner($id) {
        $this->db->delete('tb_slider', array('id' => $id));
        return TRUE;
    }

}
