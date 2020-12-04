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
		$data['produk'] = $this->hoejabi_model->jumlahProduk();
        $data['member'] = $this->hoejabi_model->jumlahMember();
        $data['keranjang'] = $this->hoejabi_model->jumlahKeranjang();
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
    public function produk()
	{
        $data['produk'] = $this->hoejabi_model->datatabelsProduk();
		$this->load->view('admin/produk', $data);
	}

	public function detailProduk($id_produk)
	{
		$data['produk'] = $this->hoejabi_model->getProdukId($id_produk);
		$this->load->view('admin/detailProduk', $data);
	}

	public function tambahProduk()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tambahProduk');
        } else {
            $config['upload_path'] = APPPATH.'../assets/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']  = '200000';
            $config['overwrite'] = FALSE;
            
            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            
            $data['nama'] = $this->input->post('nama',TRUE);
            $data['harga'] = $this->input->post('harga',true);
            $data['deskripsi'] = $this->input->post('deskripsi',true);
            $data['kategori_produk'] = $this->input->post('kategori_produk',true);
            
            if ( ! $this->upload->do_upload('gambar') ){
                $error = array('error' => $this->upload->display_errors(),
            					'produk' => $this->hoejabi_model->datatabelsProduk());
                $this->load->view('admin/produk', $error);
            }
            else{
               $upload_data = $this->upload->data();
               $data['gambar'] = $upload_data['file_name'];
               $this->hoejabi_model->tambahProduk($data);
            redirect('admin/produk','refresh');
            }
        }
	}

	public function hapusProduk($id_produk)
	{
		$this->hoejabi_model->hapusProduk($id_produk);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('admin/produk','refresh');
	}

	//member

	public function member()
	{
        $data['member'] = $this->hoejabi_model->datatabelsMember();
		$this->load->view('admin/member', $data);
	}

	public function detailMember($id_user)
	{
		$data['member'] = $this->hoejabi_model->getMemberId($id_user);
		$this->load->view('admin/detailMember', $data);
	}

	public function tambahMember()
	{
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('admin/tambahMember', $judul);
        }else{
            $data['nama'] = $this->input->post('nama');
            $data['username'] = $this->input->post('username');
            $data['alamat'] = $this->input->post('alamat');
            $data['nohp'] = $this->input->post('nohp');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->hoejabi_model->daftarmember($data);
            $this->session->set_flashdata('flash-data','ditambah');
            redirect('admin/member','refresh');
        }
	}

	public function editMember($id_user)
	{
		$data['member'] = $this->hoejabi_model->getMemberId($id_user);

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('/admin/edit_member', $data);
        }else{
            $this->polinemaxx_model->ubahmember();
        	$this->session->set_flashdata('flash-data','diubah');
            redirect('admin/member','refresh');
        }
	}

	public function hapusMember($id_user)
	{
		$this->polinemaxx_model->hapusmembers($id_user);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('admin/member','refresh');
	}

}
?>