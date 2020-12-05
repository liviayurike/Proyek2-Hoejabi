<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk_Model extends CI_Model
{
    public function GetProduk()
    {
        return $this->db->get('produk')->result();
    }

    public function GetProdukId($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
    }

    public function DataTabelsProduk()
    {
        $query = $this->db->order_by('id_produk', 'DESC')->get('produk');
        return $query->result();
    }

    public function TambahProduk($data)
    {

        $insert_data['nama'] = $data['nama'];
        $insert_data['harga'] = $data['harga'];
        $insert_data['deskripsi'] = $data['deskripsi'];
        $insert_data['kategori_produk'] = $data['kategori_produk'];
        $insert_data['stok'] = $data['stok'];
        $insert_data['gambar'] = $data['gambar'];

        $query = $this->db->insert('produk', $insert_data);
    }

    public function HapusProduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }

    public function UbahProduk()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "harga" => $this->input->post('harga', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "kategori_produk" => $this->input->post('kategori_produk', true),
            "stok" => $this->input->post('stok', true),
            "gambar" => $this->input->post('gambar', true),

        ];
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', $data);
    }

    public function SearchProduk()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        return $this->db->get('produk')->result_array();
    }
}
