<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function paket()
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_paket.id_vendor', 'left');
        $this->db->join('tbl_detail_vendor', 'tbl_detail_vendor.id_detail = tbl_paket.id_detail', 'left');
        $this->db->order_by('id_paket', 'desc');
        return $this->db->get()->result();
    }

    public function dekor()
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_vendor');
        $this->db->order_by('id_detail', 'desc');
        return $this->db->get()->result();
    }

    public function kategori_vendor()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->order_by('id_vendor', 'desc');
        return $this->db->get()->result();
    }

    public function detail_paket($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_paket.id_vendor', 'left');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->row();
    }

    public function gambar_paket($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->result();
    }

    public function kategori($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('id_vendor', $id_vendor);
        return $this->db->get()->row();
    }

    public function paket_all($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_paket.id_vendor', 'left');
        $this->db->where('tbl_paket.id_vendor', $id_vendor);
        return $this->db->get()->result();
    }

    public function reviews($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_riview');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->result();
    }

    public function riview($nama_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tbl_riview');
        $this->db->join('tbl_pelanggan', 'tbl_riview.nama_pelanggan = tbl_pelanggan.nama_pelanggan', 'left');
        $this->db->where('nama_pelanggan', $nama_pelanggan);
        return $this->db->get()->result();
    }
}
