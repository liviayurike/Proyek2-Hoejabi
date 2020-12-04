<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class hoejabi_model extends CI_Model {

    //produk
    public function getProduk(){
        return $this->db->get('produk')->result();
    }

    public function getProdukId($id_produk)
    {
        return $this->db->get_where('produk',['id_produk' => $id_produk])->row();
    }

    public function datatabelsProduk()
    {
        $query = $this->db->order_by('id_produk','DESC')->get('produk');
        return $query->result();
    }

    public function hapusproduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }

    public function jumlahProduk()
    {
        $query = $this->db->get('produk');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function tambahProduk($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['harga'] = $data['harga'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['kategori_produk'] = $data['kategori_produk'];
        $insert_data['gambar'] = $data['gambar'];

            $query = $this->db->insert('produk', $insert_data);
        
    }


    public function searchProduk(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        return $this->db->get('produk')->result_array();
    }

    // end produk

    //keranjang
    public function getKeranjang(){
        return $this->db->get('keranjang')->result();
    }

    public function getKeranjangId($id_keranjang)
    {
        return $this->db->get_where('keranjang',['id_keranjang' => $id_keranjang])->row();
    }

    public function datatabelsKeranjang()
    {
        $query = $this->db->order_by('id_keranjang','DESC')->get('keranjang');
        return $query->result();
    }

    public function hapuskeranjang($id_keranjang)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->delete('keranjang');
    }

    public function jumlahKeranjang()
    {
        $query = $this->db->get('keranjang');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function tambahKeranjang($data)
    {
        
        $insert_data['nama'] = $data['nama'];    
        $insert_data['harga'] = $data['harga'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['kategori_produk'] = $data['kategori_produk'];
        $insert_data['gambar'] = $data['gambar'];

            $query = $this->db->insert('produk', $insert_data);
        
    }


    public function searchProduk(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama',$keyword);
        return $this->db->get('produk')->result_array();
    }

    // end keranjang

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