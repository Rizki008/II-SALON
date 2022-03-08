<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vendorr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        //$this->load->model('m_transaksi');
        //$this->load->model('m_produk');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            //'total_produk' => $this->m_admin->total_produk(),
            //'total_pesanan' => $this->m_admin->total_pesanan(),
            //'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'total_transaksi' => $this->m_admin->total_transaksi(),
            //'grafik' => $this->m_transaksi->grafik(),
            //'produk' => $this->m_produk->produk(),
            'isi' => 'v_vendorr'
        );
        $this->load->view('layout/vendor/v_wrapper', $data, FALSE);
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Konfirmasi Transaksi',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'pesanan_dibatalkan' => $this->m_pesanan_masuk->pesanan_dibatalkan(),
            'isi' => 'layout/vendor/transaksi/v_transaksi'
        );
        $this->load->view('layout/vendor/v_wrapper', $data, FALSE);
    }

    public function proses($id_order)
    {
        $data = array(
            'id_order' => $id_order,
            'status_order' => 1
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        redirect('vendorr/pesanan_masuk');
    }

    public function batal($id_order)
    {
        $data = array(
            'id_order' => $id_order,
            'catatan' => $this->input->post('catatan'),
            'status_order' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
        redirect('vendorr/pesanan_masuk');
    }

    public function kirim($id_order)
    {
        $data = array(
            'id_order' => $id_order,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => 2
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di kirim');
        redirect('vendorr/pesanan_masuk');
    }

    public function detail($no_order)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
            'diproses_pesanan' => $this->m_pesanan_masuk->diproses_pesanan(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' =>  'layout/vendor/transaksi/v_detail'
        );
        $this->load->view('layout/vendor/v_wrapper', $data, FALSE);
    }
}
