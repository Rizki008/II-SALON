<?php
class M_pesan extends CI_Model
{
    public function select_chat()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('tbl_pesan');
        $this->db->join('tbl_pelanggan', 'tbl_pesan.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->where('tbl_pesan.id_pelanggan=', $id_pelanggan);
        return $this->db->get()->result();
    }

    //tbl_pesan admin
    public function daftar_chat()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesan');
        $this->db->join('tbl_pelanggan', 'tbl_pesan.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->group_by('tbl_pesan.id_pelanggan');
        return $this->db->get()->result();
    }
    public function chatting($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pesan');
        $this->db->join('tbl_pelanggan', 'tbl_pesan.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->where('tbl_pesan.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }

    public function jml_chatting()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesan');
        $this->db->group_by('id_pelanggan');
        return $this->db->get()->num_rows();
    }
}
