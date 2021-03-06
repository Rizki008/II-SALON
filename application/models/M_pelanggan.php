<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
    }

    public function detail($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('tbl_pelanggan', $data);
    }

    public function profil()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where('id_pelanggan');
        return $this->db->get()->row();
    }
}

/* End of file M_pelanggan.php */
