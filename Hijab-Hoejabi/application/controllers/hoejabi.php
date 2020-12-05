<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class hoejabi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('hoejabi_model');
    }

    public function index()
    {
        $data['produk']= $this->hoejabi_model->getProduk();
        if ($this->input->post('keyword')){
            $data['produk']=$this->hoejabi_model->searchProduk();
        }
        $this->load->view('/index', $data);
        
    }

    public function detail($id)
    {
        $data['produk']= $this->hoejabi_model->getProdukId($id);
        $this->load->view('/detail',$data);
    }

    public function login()
    {
        $this->load->view('/login');
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect('/login','refresh');
    }

    public function proses_login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars($this->input->post('password'));

        $cekLogin = $this->hoejabi_model->login($email,$password);

        if ($cekLogin) {
            foreach ($cekLogin as $key){
                $session_data = array(
                    'id_user'   => $key->id_user,
                    'nama'   => $key->nama,
                    'alamat'   => $key->alamat,
                    'nohp'   => $key->nohp,
                    'email' => $key->email,
                    'password' => $key->password
                );
            $this->session->set_userdata($session_data);
            redirect('member','refresh'); 
            }
        }else{
            redirect('hoejabi/login','refresh');
        }
    }

    public function daftar()
    {
        $judul['title']='hoejabi | Daftar';
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('ConfPassword','password','required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('hoejabi/daftar',$judul);
        }else {
            $data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['nohp'] = $this->input->post('nohp');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->hoejabi_model->daftarmember($data);
            redirect('hoejabi/login','refresh');
        }
    }

   

}

/* End of file hoejabi.php */

?>