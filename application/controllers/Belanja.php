<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Home',
            'isi' => 'layout/frontend/cart/v_belanja'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function add()
    {

        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );

        $this->cart->insert($data);
        redirect('belanja');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function cekout()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('tgl_resepsi', 'Tanggal Resepsi', 'required|is_unique[tbl_order.tgl_resepsi]', array(
            'required' => '%sMohon Untuk Disiis !!!',
            'is_unique' => '%s Sudah ada yang boking !!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Langsung Beli',
                'isi' => 'layout/frontend/cart/v_cekout'
            );
            $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
        } else {
            $tgl1 = date('Y-m-d');
            $tgl2 = date('Y-m-d', strtotime('+ 30 days', strtotime($tgl1)));
            $tgl = $this->input->post('tgl_resepsi');
            if ($tgl <= $tgl2) {
                $this->session->set_flashdata('pesan', 'Pesanan Kurang dari satu bulan');
                redirect('belanja/cekout');
            } else {
                //simpan ke tabel transaksi
                $data = array(
                    'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                    'alamat' => $this->session->userdata('alamat'),
                    'id_paket' => $this->input->post('id_paket'),
                    'no_order' => $this->input->post('no_order'),
                    'tgl_order' => date('Y-m-d'),
                    // 'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                    'no_telpon' => $this->input->post('no_tlp'),
                    'tgl_resepsi' => $this->input->post('tgl_resepsi'),
                    'provinsi' => $this->input->post('provinsi'),
                    'kota' => $this->input->post('kota'),
                    // 'alamat' => $this->input->post('alamat'),
                    'kode_pos' => $this->input->post('kode_pos'),
                    'list_paket' => $this->input->post('list_paket'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'grand_total' => $this->input->post('grand_total'),
                    'status_bayar' => '0',
                    'status_order' => '0',
                );
                $this->m_transaksi->simpan_transaksi($data);

                //simpan ke tabel rinci transaksi
                $i = 1;
                foreach ($this->cart->contents() as $item) {
                    $data_rinci = array(
                        'no_order' => $this->input->post('no_order'),
                        'id_paket' => $item['id'],
                    );

                    $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
                }
                $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
                $this->cart->destroy();
                redirect('pesanan_saya');
            }
        }
    }

    public function cek($tgl_resepsi)
    {
        $data = array(
            'Title' => 'Pesan',
            'cek' => $this->m_transaksi->cek($tgl_resepsi),
            'isi' => 'layout/frontend/cart/v_cekout'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }
}
