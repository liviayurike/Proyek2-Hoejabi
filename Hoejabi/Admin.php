<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function contact()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/form_masuk';
		$isi['id_contact']	='';
		$isi['nama']	='';
		$isi['email']='';
		$isi['subject']='';
		$isi['message']	='';
		$isi['data'] 		 = $this->db->get('contact');
		$this->load->view('admin/tampilan_admin',$isi);

	}
	public function simpanlaundry()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		
		$key = $this->input->post('id_laundry'); 	
		$data['id_laundry']    = $this->input->post('id_laundry');
		$data['nama_konsumen'] 	= $this->input->post('nama_konsumen');
		$data['berat'] 	= $this->input->post('berat');
		$data['status'] 		= $this->input->post('status');
		$data['bayar'] 		= $this->input->post('bayar');
		$data['tgl_masuk'] 	 	= $this->input->post('tgl_masuk');
		$data['tgl_keluar'] 	 	= $this->input->post('tgl_keluar');	
		$data['paket_id_paket'] 		= $this->input->post('paket_id_paket');

		$this->load->model('model_laundry');
		$query = $this->model_laundry->getdata($key);

		if($query->num_rows()>0)
		{
			$this->model_laundry->getupdate($key,$data);
			$this->session->set_flashdata('info','<div class="btn btn-success">
										Data Berhasil di Update
										<br />
									</div>');
		}
		else
		{
			$this->model_laundry->getinsert($data);
			$this->session->set_flashdata('info','<div class="btn btn-success">
										Data Berhasil di Simpan
										<br />
									</div>');
		}
		redirect('admin/tambahlaundry');
	}


	public function paket()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/paket';
		$isi['id_paket']	='';
		$isi['nama_paket']='';
		$isi['harga']='';
		$isi['data'] 		 = $this->db->get('paket');
		$this->load->view('admin/tampilan_admin',$isi);	
	}

	public function editpaket()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/form_editpaket';
		
		$key = $this->uri->segment(3);
		$this->db->where('id_paket',$key);
		$query =$this->db->get('paket');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_paket']	 =$row->id_paket;
				$isi['nama_paket'] =$row->nama_paket;
				$isi['harga'] =$row->harga;
			
			}
		}
		else
		{
				$isi['id_paket']	='';
				$isi['nama_paket']='';
				$isi['harga']='';

		}
		$this->load->view('admin/tampilan_admin',$isi);
	}
	public function simpanadmin()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		
		$key = $this->input->post('id_paket'); 	
		$data['id_paket']    = $this->input->post('id_paket');
		$data['nama_paket'] 	= $this->input->post('nama_paket');
		$data['harga'] 		= $this->input->post('harga');	

		$this->load->model('model_paket');
		$query = $this->model_paket->getdata($key);

		if($query->num_rows()>0)
		{
			$this->model_paket->getupdate($key,$data);
			$this->session->set_flashdata('info','<div class="btn btn-success">
										Data Berhasil di Update
										<br />
									</div>');
		}
		else
		{
			$this->model_paket->getinsert($data);
			$this->session->set_flashdata('info','<div class="btn btn-success">
										Data Berhasil di Simpan
										<br />
									</div>');
		}
		redirect('admin/paket');
	}
	public function deletepaket()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('Model_paket');

		$key = $this->uri->segment(3);
		$this->db->where('id_paket',$key);
		$query =$this->db->get('paket');
		if($query->num_rows()>0)
		{
			$this->Model_paket->getdelete($key);
		}
		redirect('admin/paket');
	}

	public function detailpaket()
	{

		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/paket';
		
		$key = $this->uri->segment(3);
		$this->db->where('id_paket',$key);
		$query =$this->db->get('paket');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_paket']	=$row->id_paket;
				$isi['nama_paket']=$row->nama_paket;
				$isi['harga']=$row->harga;

			}
		}
		else
		{
				$isi['id_paket']	='';
				$isi['nama_paket']='';
				$isi['harga']='';

		}
		$this->load->view('admin/paket',$isi);

	}

	public function masuk()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_admin');
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/masuk';
		$isi['data'] 		 = $this->model_admin->masuk();
		$this->load->view('admin/tampilan_admin',$isi);

			
	}

	public function ambillaundry()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/form_ambillaundry';
		
		$key = $this->uri->segment(3);
		$this->db->where('id_laundry',$key);
		$query =$this->db->get('laundry');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_laundry']	 =$row->id_laundry;
				$isi['nama_konsumen'] =$row->nama_konsumen;
				$isi['berat'] =$row->berat;
				$isi['status']	 =$row->status;
				$isi['bayar'] =$row->bayar;
				$isi['tgl_masuk'] =$row->tgl_masuk;
				$isi['tgl_keluar'] =$row->tgl_keluar;
				$isi['paket_id_paket'] =$row->paket_id_paket;
			
			}
		}
		else
		{
				$isi['id_laundry']	='';
				$isi['nama_konsumen']='';
				$isi['berat']='';
				$isi['status']	='';
				$isi['bayar']='';
				$isi['tgl_masuk']='';
				$isi['tgl_keluar']='';
				$isi['paket_id_paket']='';

		}
		$this->load->view('admin/tampilan_admin',$isi);
	}


	
	public function editlaundry()
	{
		$this->model_squrity->getsqurity();
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/form_editlaundry';
		
		$key = $this->uri->segment(3);
		$this->db->where('id_laundry',$key);
		$query =$this->db->get('laundry');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$isi['id_laundry']	 =$row->id_laundry;
				$isi['nama_konsumen'] =$row->nama_konsumen;
				$isi['berat'] =$row->berat;
				$isi['status']	 =$row->status;
				$isi['bayar'] =$row->bayar;
				$isi['tgl_masuk'] =$row->tgl_masuk;
				$isi['tgl_keluar'] =$row->tgl_keluar;
				$isi['paket_id_paket'] =$row->paket_id_paket;
			
			}
		}
		else
		{
				$isi['id_laundry']	='';
				$isi['nama_konsumen']='';
				$isi['berat']='';
				$isi['status']	='';
				$isi['bayar']='';
				$isi['tgl_masuk']='';
				$isi['tgl_keluar']='';
				$isi['paket_id_paket']='';

		}
		$this->load->view('admin/tampilan_admin',$isi);
	}

	public function deletelaundrymasuk()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_laundry');

		$key = $this->uri->segment(3);
		$this->db->where('id_laundry',$key);
		$query =$this->db->get('laundry');
		if($query->num_rows()>0)
		{
			$this->model_laundry->getdelete($key);
		}
		redirect('admin/masuk');
	}

	public function deletelaundry()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_laundry');

		$key = $this->uri->segment(3);
		$this->db->where('id_laundry',$key);
		$query =$this->db->get('laundry');
		if($query->num_rows()>0)
		{
			$this->model_laundry->getdelete($key);
		}
		redirect('admin/keluar');
	}

	

	public function keluar()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_admin');
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/keluar';
		$isi['data'] 		 = $this->model_admin->keluar();
		$this->load->view('admin/tampilan_admin',$isi);

			
	}
	
	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_userdata('is_login', FALSE);
		redirect('/');
	} 

}