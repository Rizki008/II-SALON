<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_order', $data);
    }

    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('tbl_rinci_order', $data_rinci);
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id_order)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('id_order', $id_order);
        return $this->db->get()->row();
    }

    //detail pesanan selesai
    public function pesanan_detail($no_order)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_rinci_order', 'tbl_order.no_order = tbl_rinci_order.no_order', 'left');
        $this->db->join('tbl_paket', 'tbl_rinci_order.id_paket = tbl_paket.id_paket', 'left');
        $this->db->where('tbl_order.no_order', $no_order);
        return $this->db->get()->result();
    }

    public function insert_riview()
    {
        $data = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'id_paket' => $this->input->post('id_paket'),
            'nama' => $this->session->userdata('nama'),
            'tanggal' => date('Y-m-d'),
            'isi' => $this->input->post('isi'),
        );
        $this->db->insert('tbl_riview', $data);
    }

    public function info($no_order)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('no_order', $no_order);
        return $this->db->get()->result();
    }
    //and pesanan selesai

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        return $this->db->get()->result();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_order', $data['id_order']);
        $this->db->update('tbl_order', $data);
    }

    public function produk()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }

    public function cek($tgl_resepsi)
    {
        $this->db->from('tbl_order');
        $query = $this->db->query('select count(tgl_resepsi) >=3 from tbl_order where tgl_resepsi= ' . $tgl_resepsi . ' group by tgl_resepsi');
        return $query->result();
    }
}
