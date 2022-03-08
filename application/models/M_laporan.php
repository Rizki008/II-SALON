<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_order');
        $this->db->join('tbl_order', 'tbl_order.no_order = tbl_rinci_order.no_order', 'left');
        $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_order.id_paket', 'left');
        $this->db->where('DAY(tbl_order.tgl_order)', $tanggal);
        $this->db->where('MONTH(tbl_order.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_order.tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_order');
        $this->db->join('tbl_order', 'tbl_order.no_order = tbl_rinci_order.no_order', 'left');
        $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_order.id_paket', 'left');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_order');
        $this->db->join('tbl_order', 'tbl_order.no_order = tbl_rinci_order.no_order', 'left');
        $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_order.id_paket', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }

    public function lap_stock($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->where('DAY(tbl_order.tgl_order)', $tanggal);
        $this->db->where('MONTH(tbl_order.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_order.tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function print($tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_order');
        $this->db->join('tbl_order', 'tbl_order.no_order = tbl_rinci_order.no_order', 'left');
        $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_order.id_paket', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        return $this->db->get()->result();
    }
}

/* End of file M_laporan.php */
