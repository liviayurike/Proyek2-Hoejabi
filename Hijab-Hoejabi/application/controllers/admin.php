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
		$judul['title']='Hoejabi | Login Admin';
        $this->load->view('hoejabi/admin/login-page', $judul);
	}

	public function dashboard()
	{
		$data['title'] = 'Hoejabi | Dashboard Admin';
        $data['hijab'] = $this->hoejabi_model->jumlahHijab();
        $data['acchijab'] = $this->hoejabi_model->jumlahAccHijab();
        $data['pakaian'] = $this->hoejabi_model->jumlahPakaian();
		$data['member'] = $this->hoejabi_model->jumlahMember();
		//$data['testiimonials'] = $this->hoejabi_model->jumlahTestimonials();
		$this->load->view('hoejabi/admin/dashboard', $data);

	}

	//hijab

	public function hijab()
	{
		$data = array(
            'title' => 'Hoejabi | Data Hijab',
            'hijab' => $this->hoejabi_model->datatabelsHijab()
        );
		$this->load->view('hoejabi/admin/hijab', $data);
	}

	public function detailHijab($id_hijab)
	{
		$data['title'] = 'Hoejabi | Detail Hijab';
		$data['hijab'] = $this->hoejabi_model->getHijabId($id_hijab);
		$this->load->view('hoejabi/admin/detailHijab', $data);
	}

	public function tambahHijab()
	{
		$data['title'] = 'Hoejabi | Tambah Hijab';
		$this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('hoejabi/admin/tambahHijab');
        } else {
            $config['upload_path'] = APPPATH.'../assets/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|avi|flv|wmv|mp4';
            $config['max_size']  = '600000';
            $config['overwrite'] = FALSE;
            
            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            
            $data['nama'] = $this->input->post('nama',TRUE);
            $data['harga'] = $this->input->post('harga',true);
            $data['deskripsi'] = $this->input->post('deskripsi',true);
            
            if ( ! $this->upload->do_upload('gambar') ){
                $error = array('error' => $this->upload->display_errors(),
            					'hijab' => $this->hoejabi_model->datatabelsHijab());
                $this->load->view('hoejabi/admin/hijab', $error);
            }
            else{
               $upload_data = $this->upload->data();
               $data['gambar'] = $upload_data['file_name'];
               $this->hoejabi_model->tambahHijab($data);
            redirect('hoejabi/admin/hijab','refresh');
            }
        }
	}

	public function hapusHijab($id_hijab)
	{
		$this->hoejabi_model->hapusHijab($id_hijab);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('hoejabi/admin/hijab','refresh');
	}

	//member

	public function member()
	{
		$data = array(
            'title' => 'Hoejabi | Data Member',
            'member' => $this->hoejabi_model->datatabelsMember()
        );
		$this->load->view('hoejabi/admin/member', $data);
	}

	public function detailMember($id_user)
	{
		$data['title'] = 'Hoejabi | Detail Member';
		$data['member'] = $this->hoejabi_model->getMemberId($id_user);
		$this->load->view('hoejabi/admin/detailMember', $data);
	}

	public function tambahMember()
	{
		$judul['title'] = 'Hoejabi | Tambah Member';
		$this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('hoejabi/admin/tambahMember', $judul);
        }else{
        	$data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['nohp'] = $this->input->post('nohp');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->polinemaxx_model->daftarmember($data);
            $this->session->set_flashdata('flash-data','ditambah');
            redirect('admin/member','refresh');
        }
	}

	public function editMember($id_user)
	{
		$data['title'] = 'Polinemaxx | Edit Member';
		$data['member'] = $this->polinemaxx_model->getMemberId($id_user);

		$this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('polinemaxx/admin/edit_member', $data);
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

	// end member

	/* theatrer

	public function theater()
	{
		$data = array(
            'title' => 'Polinemaxx | Data Theater',
            'theater' => $this->polinemaxx_model->datatabels()
        );
		$this->load->view('polinemaxx/admin/theater', $data);
	}

	public function detailTheater($id)
	{
		$data['title'] = "Polinemaxx | Detail Theater";
		$data['theater'] = $this->polinemaxx_model->getTheaterId($id);
		$this->load->view('polinemaxx/admin/detail_theater', $data);
	}

	public function tambahTheater()
	{
		$judul['title'] = 'Polinemaxx | Tambah Theater';
		$this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('bioskop', 'bioskop', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('polinemaxx/admin/tambah_theater', $judul);
        }else{
        	$data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['nohp'] = $this->input->post('nohp');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->polinemaxx_model->tambahtheater($data);
            $this->session->set_flashdata('flash-data','ditambah');
            redirect('admin/theater','refresh');
        }
	}

	public function editTheater($id)
	{
		$data['title'] = 'Polinemaxx | Edit Theater';
		$data['theater'] = $this->polinemaxx_model->getTheaterId($id);

		$this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('bioskop', 'bioskop', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('polinemaxx/admin/edit_theater', $data);
        }else{
            $this->polinemaxx_model->ubahmember();
        	$this->session->set_flashdata('flash-data','diubah');

            redirect('admin/theater','refresh');
        }
	}

	public function hapusTheater($id)
	{
		$this->polinemaxx_model->hapustheaters($id);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('admin/theater','refresh');
	}

	// end theater

	//laporan

	public function laporan()
	{
		$data = array(
            'title' => 'Polinemaxx | Laporan',
            'laporan' => $this->polinemaxx_model->datatabelsLaporan()
        );
		$this->load->view('polinemaxx/admin/laporan', $data);
	}

	// end laporan

	//login logout
    */
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

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>