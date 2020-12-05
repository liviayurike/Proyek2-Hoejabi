<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_akhir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_Model');
    }

    public function index()
    {
        $data['produk'] = $this->Dashboard_Model->tampil_data()->result();
        //$this->load->view('Templates_Admin/Header');
        $this->load->view('Dashboard', $data);
        //$this->load->view('Templates_Admin/Footer');
    }

    public function detail($id_produk)
    {
        $data['produk'] = $this->Dashboard_Model->detail_produk($id_produk);
        //$this->load->view('Templates_Admin/Header');
        $this->load->view('detail_produk', $data);
        //$this->load->view('Templates_Admin/Footer');
    }

}

/* End of file Dashboard_akhir.php */

?>