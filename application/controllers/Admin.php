<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author baysptr
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_l');
        $this->load->model('Banner_m');
        $this->load->model('Product_m');
        $this->load->model('Order_m');
        $this->load->model('Lokasi_m');
    }

    public function index() {
        $this->check_login();

        $data['meta'] = $this->Admin_l->meta();
        $data['navbar'] = $this->Admin_l->navbar();
        $data['sidebar'] = $this->Admin_l->sidebar();
        $data['script'] = $this->Admin_l->script();

        $this->load->view('admin/index', $data);
    }

    public function check_login() {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect(base_url());
        }
    }

    public function do_login() {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        if ($user == "admin" && $pass == "admin123") {
            $data_user = [
                "username" => $user,
                "password" => $pass
            ];
            $this->session->set_userdata('logged_in', $data_user);
            redirect(base_url() . "index.php/admin");
        } else {
            redirect(base_url());
        }
    }

    public function do_logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function banner() {
        $this->check_login();

        $data['meta'] = $this->Admin_l->meta();
        $data['navbar'] = $this->Admin_l->navbar();
        $data['sidebar'] = $this->Admin_l->sidebar();
        $data['script'] = $this->Admin_l->script();

        $data['banner'] = $this->Banner_m->show_banner();

        $this->load->view('admin/banner', $data);
    }

    public function add_banner() {
//        print_r($_FILES['gambar']);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());

            echo $error;
        } else {
            $data = $this->upload->data('file_name');

            $query = [
                "id" => $this->Banner_m->generate_id(),
                "photo_slider" => $data,
                "judul" => $this->input->post('judul'),
                "deskripsi" => $this->input->post('deskripsi')
            ];

            if ($this->Banner_m->add_banner($query) == TRUE) {
                $this->banner();
            } else {
                $this->banner();
            }
        }
    }

    public function hapus_banner($id) {
        $this->Banner_m->hapus_banner($id);
        redirect(site_url() . "/admin/banner");
    }

    public function edit_banner($id) {
        $this->check_login();

        $data['meta'] = $this->Admin_l->meta();
        $data['navbar'] = $this->Admin_l->navbar();
        $data['sidebar'] = $this->Admin_l->sidebar();
        $data['script'] = $this->Admin_l->script();

        $data['banner'] = $this->Banner_m->edit_banner($id);

        $this->load->view('admin/show_banner', $data);
    }

    public function product() {
        $this->check_login();

        $data['meta'] = $this->Admin_l->meta();
        $data['navbar'] = $this->Admin_l->navbar();
        $data['sidebar'] = $this->Admin_l->sidebar();
        $data['script'] = $this->Admin_l->script();

        $config['base_url'] = site_url('admin/product');
        $config['total_rows'] = $this->Product_m->get_num_product();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['product'] = $this->Product_m->get_product($config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/product', $data);
    }

    public function add_product() {
        $this->check_login();

        $config['upload_path'] = './product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('display')) {
            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error);
        } else {
            $data = $this->upload->data('file_name');

            $query = [
                "nama_product" => $this->input->post('nama'),
                "ukuran" => $this->input->post('ukuran'),
                "tebal" => $this->input->post('tebal'),
                "berat" => $this->input->post('berat'),
                "stok" => $this->input->post('stock'),
                "gambar_product" => $data,
                "harga" => $this->input->post('harga'),
                "tgl_post" => date("Y-m-d H:i:s")
            ];

            if ($this->Product_m->add_product($query) == TRUE) {
	        redirect(site_url() . "/admin/product");
                echo json_encode(array("status" => TRUE));
            } else {
		echo "<script>alert('Maaf product yang anda masukan error !!!');window.location = 'site_url()/admin/product'</script>";
                echo json_encode(array("status" => FALSE));
            }
        }
    }

    public function hapus_product($id, $mime) {
        unlink($mime);
        $this->Product_m->hapus_product($id);

        redirect(site_url() . "/admin/product");
    }

    public function edit_product($id) {
        $data = $this->Product_m->edit_product($id);

        echo json_encode($data);
    }

    public function order() {
        $this->check_login();

        $data['meta'] = $this->Admin_l->meta();
        $data['navbar'] = $this->Admin_l->navbar();
        $data['sidebar'] = $this->Admin_l->sidebar();
        $data['script'] = $this->Admin_l->script();

        $data['order'] = $this->Order_m->get_rows();
        
        $this->load->view('admin/order', $data);
    }
    
    public function verifikasi($id){
        $this->Order_m->verifikasi($id);
        
        redirect(site_url()."/admin/order");
    }
    
    public function batal_order($id){
        $this->Order_m->batal_order($id);
        
        redirect(site_url()."/admin/order");
    }

}
