<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('status_order=0');
        $this->db->join('tbl_paket', 'tbl_order.id_paket = tbl_paket.id_paket', 'left');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('status_order=1');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('status_order=2');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('status_order=3');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_dibatalkan()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('status_order=4');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function update_order($data)
    {
        $this->db->where('id_order', $data['id_order']);
        $this->db->update('tbl_order', $data);
    }

    public function diproses_pesanan()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_rinci_order', 'tbl_order.no_order = tbl_rinci_order.no_order', 'left');
        $this->db->join('tbl_paket', 'tbl_rinci_order.id_paket = tbl_paket.id_paket', 'left');
        return $this->db->get()->row();
    }

    public function proses_kirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        return $this->db->get()->result();
    }
}
