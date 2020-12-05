<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Login_Model');
    }

    public function index()
    {
        $this->load->view('Template_Auth/Header');
        $this->load->view('Login');
        $this->load->view('Template_Auth/Footer');
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $cekLogin = $this->Login_Model->login($username, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $key) {
                $session_data = array(
                    'id'   => $key->id,
                    'nama'   => $key->nama,
                    'username' => $key->username,
                    'password' => $key->password
                );
                $this->session->set_userdata($session_data);
                redirect('Admin/Dashboard', 'refresh');
            }
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Template_Auth/Header');
            $this->load->view('Registrasi');
            $this->load->view('Template_Auth/Footer');
        } else {
            $data = [
                'email' => $this->input->post('email', true),
                'username' => $this->input->post('username', true),
                'password' => $this->input->post('password', true),
                'nama' => $this->input->post('nama', true),
                'nohp' => $this->input->post('nohp', true),
                'alamat' => $this->input->post('alamat', true),
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            Congratulation!! your account has been created!!! </div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}

/* End of file login.php */
