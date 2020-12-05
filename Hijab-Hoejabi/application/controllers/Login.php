<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form', 'url');
        $this->load->model('Login_Model');
    }

    public function index()
    {
        $this->load->view('Template_Auth/Header');
        $this->load->view('Login');
        $this->load->view('Template_Auth/Footer');
    }

    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template_Auth/Header');
            $this->load->view('Login');
            $this->load->view('Template_Auth/Footer');
        } else {

            $cek = $this->Login_Model->cek_login();

            if ($cek == FAlSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('Login/login');
            } else {
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role_id', $cek->role_id);

                switch ($cek->role_id) {
                    case 1:
                        redirect('Admin/Dashboard');
                        break;
                    case 2:
                        redirect('Home');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib Diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib Diisi!']);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }
}

/* End of file login.php */
