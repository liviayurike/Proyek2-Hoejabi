<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('hoejabi_model');
	}

	public function index()
	{
        $this->load->view('admin/login');
    }
    public function dashboard()
	{
		$data['produk'] = $this->hoejabi_model->jumlahProduct();
		$data['member'] = $this->hoejabi_model->jumlahMember();
        $data['keranjang'] = $this->hoejabi_model->jumlahKeranjang();
        $data['transaksi'] = $this->hoejabi_model->jumlahTransaksi();
		$this->load->view('admin/dashboard', $data);

    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect('admin/','refresh');
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $cekLogin = $this->hoejabi_model->loginAdmin($username,$password);

        if ($cekLogin) {
            foreach ($cekLogin as $key){
                $session_data = array(
                'id'   => $key->id,
                'nama'   => $key->nama,
                'username' => $key->username,
                'password' => $key->password
            );
                $this->session->set_userdata($session_data);
                redirect('admin/dashboard','refresh');
            }
        }else{
            redirect('admin/dashboard','refresh');
        }
    }

}
?>