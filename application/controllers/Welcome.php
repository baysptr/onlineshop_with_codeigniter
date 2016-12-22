<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('User_l');
        $this->load->model('Banner_m');
        $this->load->model('Product_m');
        $this->load->model('Order_m');
        $this->load->model('Lokasi_m');
    }

    public function index() {
        $data['meta'] = $this->User_l->meta();
        $data['navbar'] = $this->User_l->navbar();
        $data['script'] = $this->User_l->script();

        $data['row_banner'] = $this->Banner_m->get_row_banner();
        $data['banner'] = $this->Banner_m->show_banner();

        $config['base_url'] = site_url('welcome/index');
        $config['total_rows'] = $this->Product_m->get_num_product();
        $config['per_page'] = 6;
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

        $this->load->view('index', $data);
    }

    public function show_product($id) {
        $data = $this->Product_m->edit_product($id);

        echo json_encode($data);
    }

    public function order($id) {
        $data['meta'] = $this->User_l->meta();
        $data['navbar'] = $this->User_l->navbar();
        $data['script'] = $this->User_l->script();

        $data['product'] = $this->Product_m->edit_product($id);
        $data['provinsi'] = $this->Lokasi_m->getProv();

        $this->load->view('order', $data);
    }

    public function getKota() {
        $kodePropinsi = $this->input->post('kodePropinsi');
        $kota = $this->Lokasi_m->getKota($kodePropinsi);
        $data .= "<option value=''>--Pilih Kota--</option>";
        foreach ($kota as $kt) {
            $data .= "<option value='$kt[kodeKabKota]'>$kt[namaKabKota]</option>";
        }
        echo $data;
    }

    public function test() {
        $CI = & get_instance();
        $prov = $CI->db->select("namaPropinsi")
                        ->where("kodePropinsi", 16)
                        ->get("list_propinsi")->result_array();
        $kota = $CI->db->select("namaKabKota")
                        ->where("kodeKabKota", 221)
                        ->get("list_kabkota")->result_array();
        echo $prov[0]['namaPropinsi'];
        echo $kota[0]['namaKabKota'];
    }

    public function checkout() {
        $CI = & get_instance();
        $prov = $CI->db->select("namaPropinsi")
                        ->where("kodePropinsi", $this->input->post('provinsi'))
                        ->get("list_propinsi")->result_array();
        $kota = $CI->db->select("namaKabKota")
                        ->where("kodeKabKota", $this->input->post('kota'))
                        ->get("list_kabkota")->result_array();
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'gender' => $this->input->post('jk'),
            'usia' => $this->input->post('usia'),
            'propinsi' => $prov[0]['namaPropinsi'],
            'kota' => $kota[0]['namaKabKota'],
            'alamat' => $this->input->post('alamat'),
            'id_product' => $this->input->post('id_product'),
            'tgl_post' => date('Y-m-d H:i:s')
        ];
        $this->Order_m->insert($data);

        echo "<script>alert('Terimakasih, Mohon Tunggu Konfirmasi dari Kami.');window.location = '" . base_url() . "'</script>";
    }

}
