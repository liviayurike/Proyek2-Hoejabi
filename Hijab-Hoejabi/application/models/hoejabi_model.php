<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class hoejabi_model extends CI_Model {

    //hijab
    public function getHijab(){
        return $this->db->get('hijab')->result_array();
    }

    public function getHijabId($id_hijab)
    {
        return $this->db->get_where('hijab',['id_hijab' => $id_hijab])->result_array();
    }

    public function datatabelsHijab()
    {
        $query = $this->db->order_by('id_hijab','DESC')->get('hijab');
        return $query->result_array();
    }

    public function hapushijab($id_hijab)
    {
        $this->db->where('id_hijab', $id_hijab);
        $this->db->delete('hijab');
    }

    public function jumlahHijab()
    {
        $query = $this->db->get('hijab');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function tambahHijab($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['harga'] = $data['harga'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['gambar'] = $data['gambar'];

            $query = $this->db->insert('hijab', $insert_data);
        
    }


    public function searchHijab(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        return $this->db->get('hijab')->result_array();
    }

    // end hijab

    //accesories hijab
    public function getAccHijab(){
        return $this->db->get('acchijab')->result_array();
    }

    public function getAccHijabId($id_acchijab)
    {
        return $this->db->get_where('acchijab',['id_acchijab' => $id_acchijab])->result_array();
    }

    public function datatabelsAccHijab()
    {
        $query = $this->db->order_by('id_acchijab','DESC')->get('acchijab');
        return $query->result_array();
    }

    public function hapusAcchijab($id_acchijab)
    {
        $this->db->where('id_acchijab', $id_acchijab);
        $this->db->delete('acchijab');
    }

    public function jumlahAccHijab()
    {
        $query = $this->db->get('acchijab');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function tambahAccHijab($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['harga'] = $data['harga'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['gambar'] = $data['gambar'];

            $query = $this->db->insert('acchijab', $insert_data);
        
    }


    public function searchAccHijab(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        return $this->db->get('acchijab')->result_array();
    }

    // end accesories hijab
    // pakaian
    public function getPakaian(){
        return $this->db->get('pakaian')->result_array();
    }

    public function getPakaianId($id_pakaian)
    {
        return $this->db->get_where('pakaian',['id_pakaian' => $id_pakaian])->result_array();
    }

    public function datatabelsPakaian()
    {
        $query = $this->db->order_by('id_pakaian','DESC')->get('pakaian');
        return $query->result_array();
    }

    public function hapusPakaian($id_pakaian)
    {
        $this->db->where('id_pakaian', $id_pakaian);
        $this->db->delete('pakaian');
    }

    public function jumlahPakaian()
    {
        $query = $this->db->get('pakaian');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function tambahPakaian($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['harga'] = $data['harga'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['gambar'] = $data['gambar'];

            $query = $this->db->insert('pakaian', $insert_data);
        
    }


    public function searchPakaian(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        return $this->db->get('pakaian')->result_array();
    }

    // end pakaian

    // testimonial
    public function getTestimonial(){
        return $this->db->get('testimonial')->result_array();
    }

    public function getTestimonialId($id_testi)
    {
        return $this->db->get_where('testimonial',['id_testi' => $id_testi])->result_array();
    }

    public function datatabelsTestimonial()
    {
        $query = $this->db->order_by('id_testi','DESC')->get('testimonial');
        return $query->result_array();
    }

    public function hapusTestimonial($id_testi)
    {
        $this->db->where('id_testi', $id_testi);
        $this->db->delete('testimonial');
    }

    public function tambahTestimonial($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['type'] = $data['type'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['nama_barang'] = $data['nama_barang'];

            $query = $this->db->insert('testimonial', $insert_data);
        
    }


    public function searchTestimonial(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama_barang',$keyword);
        return $this->db->get('testimonial')->result_array();
    }

    // end testimonial

    // contact
    public function getContact(){
        return $this->db->get('contact')->result_array();
    }

    public function getContactId($id)
    {
        return $this->db->get_where('contact',['id' => $id])->result_array();
    }

    public function datatabelsContact()
    {
        $query = $this->db->order_by('id','DESC')->get('contact');
        return $query->result_array();
    }

    public function hapusContact($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('contact');
    }

    public function tambahContact($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['email'] = $data['email'];
        $insert_data['subject'] = $data['subject'];
        $insert_data['message'] = $data['message'];

            $query = $this->db->insert('contact', $insert_data);
        
    }

    // end contact

    public function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows()==1) {
            return $query->result();
        }else{
            return false;
        }
    }

    public function loginAdmin($username,$password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows()==1) {
            return $query->result();
        }else{
            return false;
        }
    }

    // member

    public function daftarmember($data)
    {
        //$this->db->insert('Table', $object)
        $this->db->insert('user', $data);
    }

    public function datatabelsMember()
    {
        $query = $this->db->order_by('id_user','DESC')->get('user');
        return $query->result_array();
    }

    public function jumlahMember()
    {
        $query = $this->db->get('user');
        if($query->num_rows()>0)
        {
        return $query->num_rows();
        }
        else
        {
        return 0;
        }
    }

    public function getMemberId($id_user)
    {
        return $this->db->get_where('user',['id_user' => $id_user])->result_array();
    }

    public function hapusmembers($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function ubahmember()
    {
        $data = [
            "email" => $this->input->post('email',true),
            "username" => $this->input->post('username',true),
            "password" => $this->input->post('password',true),
            "nama" => $this->input->post('nama',true),
            "nohp" => $this->input->post('nohp',true),
            "alamat" => $this->input->post('alamat',true)    
            
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    // end member

}
?>