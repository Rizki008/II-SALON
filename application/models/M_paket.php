<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_paket extends CI_Model
{
    // List all your items
    public function paket()
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_paket.id_vendor', 'left');
        // $this->db->join('tbl_detail_vendor', 'tbl_detail_vendor.id_detail = tbl_paket.id_vendor', 'left');
        //$this->db->join('tbl_deskripsi', 'tbl_paket.id_paket = tbl_deskripsi.id_paket', 'left');
        $this->db->order_by('id_paket', 'desc');
        return $this->db->get()->result();
    }

    // List all your items
    public function detail($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_paket.id_vendor', 'left');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->row();
    }

    public function diskon_murah()
    {
        $this->db->from('tbl_paket');
        $this->db->where('is_available', 1);
        $this->db->order_by('diskon', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    //bagus produk
    public function best_deal_paket()
    {
        $this->db->select('*');
        $this->db->select('tbl_paket.gambar');
        $this->db->from('tbl_rinci_order');
        $this->db->join('tbl_paket', 'tbl_rinci_order.id_paket = tbl_paket.id_paket', 'left');
        $this->db->where('tbl_rinci_order.id_paket');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function dekor()
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_vendor');
        $this->db->order_by('id_detail', 'desc');
        return $this->db->get()->result();
    }

    // Add a new item
    public function add($data)
    {
        $this->db->insert('tbl_paket', $data);
    }

    //Update one item
    public function edit($data)
    {
        $this->db->where('id_paket', $data['id_paket']);
        $this->db->update('tbl_paket', $data);
    }

    //Delete one item
    public function delete($data)
    {
        $this->db->where('id_paket', $data['id_paket']);
        $this->db->delete('tbl_paket', $data);
    }

    public function total_paket()
    {
        return $this->db->get('tbl_paket')->num_rows();
    }
}

/* End of file M_paket.php */
