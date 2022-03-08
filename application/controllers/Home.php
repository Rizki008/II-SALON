<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_paket');
        //$this->load->model('m_transaksi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'paket' => $this->m_paket->paket(),
            'dekor' => $this->m_home->dekor(),
            'diskon_murah' => $this->m_paket->diskon_murah(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function kategori($id_vendor)
    {
        $kategori = $this->m_home->kategori($id_vendor);
        $data = array(
            'title' => $kategori->nama_vendor,
            'paket' => $this->m_home->paket_all($id_vendor),
            'isi' => 'layout/frontend/kategori/v_kategori_paket'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function detail_paket($id_paket)
    {
        $data = array(
            'title' => 'Detail paket',
            'gambar' => $this->m_home->gambar_paket($id_paket),
            'reviews' => $this->m_home->reviews($id_paket),
            'paket' => $this->m_home->detail_paket($id_paket),
            'isi' => 'layout/frontend/detail/v_detail_paket'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }
}
