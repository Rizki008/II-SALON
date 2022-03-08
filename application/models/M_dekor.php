<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dekor extends CI_Model
{
    public function dekor()
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_vendor');
        $this->db->join('tbl_vendor', 'tbl_detail_vendor.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->order_by('id_detail', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_detail)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_vendor');
        $this->db->join('tbl_vendor', 'tbl_detail_vendor.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->order_by('id_detail', $id_detail);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_detail_vendor', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_detail', $data['id_detail']);
        $this->db->update('tbl_detail_vendor', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_detail', $data['id_detail']);
        $this->db->delete('tbl_detail_vendor', $data);
    }
}