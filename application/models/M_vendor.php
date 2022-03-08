<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_vendor extends CI_Model
{
    public function vendor()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->order_by('id_vendor', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('id_vendor', $id_vendor);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_vendor', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_vendor', $data['id_vendor']);
        $this->db->update('tbl_vendor', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_vendor', $data['id_vendor']);
        $this->db->delete('tbl_vendor', $data);
    }
}
