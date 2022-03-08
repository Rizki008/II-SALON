<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->model('m_pesan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Laporan',
            'isi' => 'layout/backand/laporan/v_laporan'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
            //'isi' => 'layout/backand/laporan/v_lap_bulanan'
        );
        $this->load->view('layout/backand/laporan/v_lap_bulanan', $data);
    }

    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
            //'isi' => 'layout/backand/laporan/v_lap_tahunan'
        );
        $this->load->view('layout/backand/laporan/v_lap_tahunan', $data);
    }

    public function lap_stock()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Stock Barang',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'isi' => 'layout/backand/laporan/v_lap_stock'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    public function print()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
            'isi' => 'layout/backand/laporan/v_tahun'
        );
        $this->load->view('layout/backand/laporan/v_tahun', $data);
    }
}
