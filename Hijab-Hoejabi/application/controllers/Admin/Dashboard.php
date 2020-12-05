<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_Model');
    }

    public function index()
    {
        $data['produk'] = $this->Dashboard_Model->jumlahProduk();
        $data['member'] = $this->Dashboard_Model->jumlahMember();
        $data['keranjang'] = $this->Dashboard_Model->jumlahKeranjang();


        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/Dashboard', $data);
        $this->load->view('Template_Admin/Footer', $data);
    }
}
