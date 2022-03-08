<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_foto extends CI_Model
{

    public function gambar()
    {
        $this->db->select('tbl_paket.*,COUNT(tbl_gambar.id_paket)as total_gambar');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_gambar', 'tbl_gambar.id_paket = tbl_paket.id_paket', 'left');
        $this->db->group_by('tbl_paket.id_paket');
        $this->db->order_by('tbl_paket.id_paket', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();
    }

    public function detail_gambar($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_gambar', $data);
    }

    //Delete one item
    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tbl_gambar', $data);
    }
}
