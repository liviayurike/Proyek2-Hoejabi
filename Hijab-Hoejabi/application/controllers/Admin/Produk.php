<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Dashboard_Model');
        $this->load->model('Admin/Produk_Model');
    }

    public function index()
    {
        $data['title'] = 'Data Produk';
        $data['produk'] = $this->Produk_Model->DataTabelsProduk();
        $data['produk'] = $this->Produk_Model->GetProduk();

        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Produk_Model->SearchProduk();
        }

        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/Produk', $data);
        $this->load->view('Template_Admin/Footer', $data);
    }

    public function produk()
    {
        $data['produk'] = $this->Produk_Model->DataTabelsProduk();
        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/Produk', $data);
        $this->load->view('Template_Admin/Footer', $data);
    }

    public function detailProduk($id_produk)
    {
        $data['title'] = 'Detail Produk';
        $data['Produk'] = $this->Produk_Model->GetProdukId($id_produk);
        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/DetailProduk', $data);
        $this->load->view('Template_Admin/Footer', $data);
    }

    public function TambahProduk()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $kategori_produk = $this->input->post('kategori_produk');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload! (Format Gambar:jpg/jpeg/png/gif)";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama' => $nama,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'kategori_produk' => $kategori_produk,
            'stok' => $stok,
            'gambar' => $gambar

        );

        $this->Produk_Model->TambahProduk($data, 'produk');
        redirect('Admin/Produk');
    }

    public function EditProduk($id_produk)
    {
        $data['title'] = 'Form Edit Produk';
        $data['produk'] = $this->Produk_Model->GetProdukId($id_produk);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('kategori_produk', 'kategori_produk', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_Admin/Header', $data);
            $this->load->view('Admin/EditProduk', $data);
            $this->load->view('Template_Admin/Footer', $data);
        } else {
            $this->Produk_Model->UbahProduk();
            $this->session->set_flashdata('flash-data', 'diubah');
            redirect('Admin/Produk', 'refresh');
        }
    }

    public function HapusProduk($id_produk)
    {
        $this->Produk_Model->HapusProduk($id_produk);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('Admin/Produk', 'refresh');
    }
}

/* End of file User.php */
