<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_paket()
    {
        return $this->db->get('tbl_paket')->num_rows();
    }

    public function total_vendor()
    {
        return $this->db->get('tbl_vendor')->num_rows();
    }

    public function total_pesanan()
    {
        return $this->db->get('tbl_order')->num_rows();
    }

    public function total_pelanggan()
    {
        return $this->db->get('tbl_pelanggan')->num_rows();
    }

    public function total_transaksi()
    {
        return $this->db->get('tbl_rinci_order')->num_rows();
    }

    public function grafik()
    {
        $this->db->select('*');
        return $this->db->get('tbl_order')->result();
    }

    public function data_grafik($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where($data);
        $this->db->group_by('produk');
        return $this->db->get()->result();
    }

    public function get_produk()
    {
        $this->db->select('distinct(nama_produk)');
    }
}
