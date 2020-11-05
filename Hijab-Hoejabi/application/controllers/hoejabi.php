<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class hoejabi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('hoejabi_model');
        
    }

    public function index()
    {
        
        $data['hijab']= $this->hoejabi_model->getHijab();
        $this->load->view('hoejabi/index', $data);
        
    }

    public function hijab($id_hijab)
    {
        $data['hijab']= $this->hoejabi_model->getHijabId($id_hijab);
        $this->load->view('hoejabi/hijab',$data);
    }

    public function acchijab($id_acchijab)
    {
        $data['acchijab']=$this->hoejabi_model->getAccHijabId($id_acchijab);
        $this->load->view('hoejabi/acchijab', $data);
    }

    public function pakaian($id_pakaian)
    {
        $data['pakaian']= $this->hoejabi_model->getPakaianId($id_pakaian);
        $this->load->view('hoejabi/pakaian',$data);
    }

    public function about()
    {
        $this->load->view('hoejabi/about', $data);
    }

    public function testimonials()
    {
        $this->load->view('hoejabi/testimonials', $data);
    }

    public function contact()
    {
        $this->load->view('hoejabi/contact', $data);
    }

    public function login()
    {
        $this->load->view('hoejabi/login', $judul);
        
    }

    public function logout()
    {
        $this->session->sess_destroy();   
        redirect('hoejabi/login','refresh');
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $cekLogin = $this->hoejabi_model->login($username,$password);

        if ($cekLogin) {
            foreach ($cekLogin as $key){
                $session_data = array(
                    'id_user'   => $key->id_user,
                    'email' => $key->email,
                    'username' => $key->username,
                    'password' => $key->password,
                    'nama'   => $key->nama,
                    'nohp'   => $key->nohp,
                    'alamat'   => $key->alamat             
                );
            $this->session->set_userdata($session_data);
            redirect('member','refresh'); 
            }
        }else{
            redirect('hoejabi/login','refresh');
        }
    }


}

/* End of file hoejabi.php */

?>