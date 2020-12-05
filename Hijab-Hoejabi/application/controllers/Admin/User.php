<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Dashboard_Model');
        $this->load->model('Admin/User_Model');
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->User_Model->DataTabelsUser();
        $data['user'] = $this->User_Model->GetUser();

        if ($this->input->post('keyword')) {
            $data['user'] = $this->User_Model->SearchUser();
        }

        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/User', $data);
        $this->load->view('Template_Admin/Footer', $data);
    }

    //member

    public function user()
    {
        $data['user'] = $this->User_Model->DataTabelsUser();
        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/User', $data);
        $this->load->view('Template_Admin/Footer', $data);
    }

    public function detailUser($id_user)
    {
        $data['title'] = 'Detail User';
        $data['user'] = $this->User_Model->GetUserId($id_user);
        $this->load->view('Template_Admin/Header', $data);
        $this->load->view('Admin/DetailUser');
        $this->load->view('Template_Admin/Footer', $data);
    }

    public function tambahUser()
    {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template_Admin/Header');
            $this->load->view('Admin/TambahUser');
            $this->load->view('Template_Admin/Footer');
        } else {
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['nama'] = $this->input->post('nama');
            $data['nohp'] = $this->input->post('nohp');
            $data['alamat'] = $this->input->post('alamat');

            $this->User_Model->TambahUser($data);
            $this->session->set_flashdata('flash-data', 'ditambah');
            redirect('Admin/User', 'refresh');
        }
    }

    public function EditUser($id_user)
    {
        $data['title'] = 'Form Edit User';
        $data['user'] = $this->User_Model->GetUserId($id_user);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_Admin/Header', $data);
            $this->load->view('Admin/EditUser', $data);
            $this->load->view('Template_Admin/Footer', $data);
        } else {
            $this->User_Model->UbahUser();
            $this->session->set_flashdata('flash-data', 'diubah');
            redirect('Admin/User', 'refresh');
        }
    }

    public function HapusUser($id_user)
    {
        $this->User_Model->HapusUser($id_user);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('Admin/User', 'refresh');
    }
}

/* End of file User.php */
