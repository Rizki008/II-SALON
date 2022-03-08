<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Boking
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_transaksi');
    }

    public function boking($tgl_resepsi)
    {
        $cek = $this->ci->m_transaksi->cek($tgl_resepsi);
        if ($cek >= 3) {
            $tgl_resepsi = $cek->tgl_resepsi;
            //session
            $this->ci->session->set_userdata('tgl_resepsi', $tgl_resepsi);
            $this->ci->session->set_flashdata('pesan', 'Tanggal resepsi Kosong');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('penuh', 'Tanggal Resepsi Sudah ada yang Boking');
            redirect('belanja/cekout');
        }
    }
}
