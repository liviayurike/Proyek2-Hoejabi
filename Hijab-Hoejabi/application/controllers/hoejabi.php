<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class hoejabi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('hoejabi_model');
    }

    public function index()
    {
        $data['title'] = 'Hoejabi - Hijab Shop';
        $data['hijab']= $this->hoejabi_model->getHijab();
        if ($this->input->post('keyword')){
            $data['hijab']=$this->hoejabi_model->searchHijab();
        }
        $data['acchijab']= $this->hoejabi_model->getAccHijab();
        if ($this->input->post('keyword')){
            $data['acchijab']=$this->hoejabi_model->searchAccHijab();
        }
        $data['pakaian']= $this->hoejabi_model->getPakaian();
        if ($this->input->post('keyword')){
            $data['pakaian']=$this->hoejabi_model->searchPakaian();
        }
        $this->load->view('hoejabi/index', $data);
        
    }

    public function hijab($id_hijab)
    {
        $data['title']='Hoejabi | Hijab';
        $data['hijab']= $this->hoejabi_model->getHijabId($id_hijab);
        $this->load->view('hoejabi/hijab',$data);
    }

    public function acchijab()
    {
        $data = array(
            'title' => 'Hoejabi | Accesories Hijab',
            'acchijab' => $this->hoejabi_model->datatabels()
        );
        $this->load->view('hoejabi/anting', $data);
        $this->load->view('hoejabi/ikatinner', $data);
        $this->load->view('hoejabi/kalung', $data);
    }

    public function pakaian($id_pakaian)
    {
        $data['title']='Hoejabi | Hijab';
        $data['pakaian']= $this->hoejabi_model->getPakaianId($id_pakaian);
        $this->load->view('hoejabi/pakaian',$data);
    }

    public function about()
    {
        $data['title']='Hoejabi | About Hijab';
        $this->load->view('hoejabi/about', $data);
    }

    public function testimonials()
    {
        $data['title']='Hoejabi | Testimonials';
        $this->load->view('hoejabi/testimonials', $data);
    }

    public function contact()
    {
        $data['title']='Hoejabi | Contact Us';
        $this->load->view('hoejabi/contact', $data);
    }

    public function login()
    {
        $judul['title']='Hoejabi | Login';
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