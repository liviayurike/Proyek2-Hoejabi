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
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('kategori_produk', 'kategori_produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template_Admin/Header');
            $this->load->view('Admin/TambahProduk');
            $this->load->view('Template_Admin/Footer');
        } else {
            $config['upload_path'] = APPPATH . '../assets/film/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|avi|flv|wmv|mp4';
            $config['max_size']  = '600000';
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $data['nama'] = $this->input->post('nama', TRUE);
            $data['harga'] = $this->input->post('harga', true);
            $data['deskripsi'] = $this->input->post('deskripsi', true);
            $data['kategori_produk'] = $this->input->post('kategori_produk', true);

            if (!$this->upload->do_upload('gambar') && !$this->upload->do_upload('produk')) {
                $error = array(
                    'error' => $this->upload->display_errors(),
                    'film' => $this->Produk_Model->DataTabelsProduk()
                );
                $this->load->view('Template_Admin/Header');
                $this->load->view('Admin/Produk', $error);
                $this->load->view('Template_Admin/Footer');
            } else {
                if (isset($_POST['submit'])) {
                    $data['nama'] = $this->input->post('nama', TRUE);
                    $data['harga'] = $this->input->post('harga', true);
                    $data['deskripsi'] = $this->input->post('deskripsi', true);
                    $data['kategori_produk'] = $this->input->post('kategori_produk', true);
                } else {
                    $this->load->view('Template_Admin/Header');
                    $this->load->view('Admin/Produk', $data);
                    $this->load->view('Template_Admin/Footer');
                }
            }
        }
    }

    public function EditProduk($id_produk)
    {
        $data['title'] = 'Form Edit Produk';
        $data['produk'] = $this->Produk_Model->GetProdukrId($id_produk);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('kategori_produk', 'kategori_produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('polinemaxx/admin/edit_film', $data);
        } else {
            $config['upload_path'] = APPPATH . '../assets/film/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|avi|flv|wmv|mp4';
            $config['max_size']  = '600000';
            $config['overwrite'] = FALSE;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            $data['nama'] = $this->input->post('nama', TRUE);
            $data['harga'] = $this->input->post('harga', true);
            $data['deskripsi'] = $this->input->post('deskripsi', true);
            $data['kategori_produk'] = $this->input->post('kategori_produk', true);

            if (!$this->upload->do_upload('gambar') && !$this->upload->do_upload('produk')) {
                $data['gambar'] = $this->input->post('fotoLama', TRUE);
                $data['produk'] = $this->input->post('gambarLama', TRUE);
                $this->Produk_Model->UbahProduk($data);
                $this->session->set_flashdata('flash-data', 'diubah');
                redirect('Admin/Produk', 'refresh');
            } elseif (!$this->upload->do_upload('gambar') && $this->upload->do_upload('produk')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $this->input->post('fotoLama', TRUE);
                $data['produk'] = $upload_data['file_name'];
                $this->Produk_Model->UbahProduk($data);
                $this->session->set_flashdata('flash-data', 'diubah');
                redirect('Admin/Produk', 'refresh');
            } elseif ($this->upload->do_upload('gambar') && !$this->upload->do_upload('produk')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
                $data['produk'] = $this->input->post('gambarLama', TRUE);
                $this->Produk_Model->UbahProduk($data);
                $this->session->set_flashdata('flash-data', 'diubah');
                redirect('Admin/Produk', 'refresh');
            } else {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
                $data['produk'] = $this->input->post('gambarLama', TRUE);
                $this->Produk_Model->UbahProduk($data);
                $this->session->set_flashdata('flash-data', 'diubah');
                redirect('Admin/Produk', 'refresh');
            }
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
