<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{

    //produk
    public function jumlahProduk()
    {
        $query = $this->db->get('produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function tampil_data(){
        return $this->db->get('produk');
    }

    public function detail_produk($id_produk)
    {
        $result =$this->db->where('id_produk', $id_produk)->get('produk');
        if($result->num_rows() > 0){
            return $result->result();
        } else{
            return false;
        }
    }

    // end produk

    //keranjang
    public function getKeranjang()
    {
        return $this->db->get('keranjang')->result();
    }

    public function getKeranjangId($id_keranjang)
    {
        return $this->db->get_where('keranjang', ['id_keranjang' => $id_keranjang])->row();
    }

    public function datatabelsKeranjang()
    {
        $query = $this->db->order_by('id_keranjang', 'DESC')->get('keranjang');
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
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function tambahKeranjang($data)
    {

        $insert_data['id_user'] = $data['id_user'];
        $insert_data['id_produk'] = $data['id_produk'];
        $insert_data['qty'] = $data['qty'];
        $insert_data['subtotal'] = $data['subtotal'];
        $insert_data['harga'] = $data['harga'];
        $insert_data['potongan'] = $data['potongan'];

        $query = $this->db->insert('keranjang', $insert_data);
    }


    public function searchKeranjang()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        return $this->db->get('keranjang')->result_array();
    }

    // end keranjang

    // testimonial
    public function getTestimonial()
    {
        return $this->db->get('testimonial')->result_array();
    }

    public function getTestimonialId($id_testi)
    {
        return $this->db->get_where('testimonial', ['id_testi' => $id_testi])->result_array();
    }

    public function datatabelsTestimonial()
    {
        $query = $this->db->order_by('id_testi', 'DESC')->get('testimonial');
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


    public function searchTestimonial()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_barang', $keyword);
        return $this->db->get('testimonial')->result_array();
    }

    // end testimonial

    // contact
    public function getContact()
    {
        return $this->db->get('contact')->result_array();
    }

    public function getContactId($id)
    {
        return $this->db->get_where('contact', ['id' => $id])->result_array();
    }

    public function datatabelsContact()
    {
        $query = $this->db->order_by('id', 'DESC')->get('contact');
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

    // member

    public function jumlahMember()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // end member

}
