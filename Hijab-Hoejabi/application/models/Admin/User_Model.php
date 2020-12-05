<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function GetUser()
    {
        return $this->db->get('user')->result();
    }

    public function GetUserId($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->result_array();
    }

    public function DataTabelsUser()
    {
        $query = $this->db->order_by('id_user', 'DESC')->get('user');
        return $query->result_array();
    }

    public function TambahUser($data)
    {
        //$this->db->insert('Table', $object)
        $this->db->insert('user', $data);
    }

    public function HapusUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function UbahUser()
    {
        $data = [
            "email" => $this->input->post('email', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "nama" => $this->input->post('nama', true),
            "nohp" => $this->input->post('nohp', true),
            "alamat" => $this->input->post('alamat', true)

        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function SearchUser()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        return $this->db->get('user')->result_array();
    }
}

/* End of file User_Model.php */
