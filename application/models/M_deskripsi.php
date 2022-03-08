<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_deskripsi extends CI_Model
{

    public function gambar()
    {
        $this->db->select('tbl_paket.*,COUNT(tbl_desk.id_paket)as total_gambar');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_desk', 'tbl_desk.id_paket = tbl_paket.id_paket', 'left');
        $this->db->group_by('tbl_paket.id_paket');
        $this->db->order_by('tbl_paket.id_paket', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_desk)
    {
        $this->db->select('*');
        $this->db->from('tbl_desk');
        $this->db->where('id_desk', $id_desk);
        return $this->db->get()->row();
    }

    public function detail_gambar($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_desk');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_desk', $data);
    }

    //Delete one item
    public function delete($data)
    {
        $this->db->where('id_desk', $data['id_desk']);
        $this->db->delete('tbl_desk', $data);
    }
}
