<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_vendor');
        $this->load->model('m_pesan');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'Data vendor',
            'vendor' => $this->m_vendor->vendor(),
            'isi' => 'layout/backand/vendor/v_vendor'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_vendor' => $this->input->post('nama_vendor'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'no_telpon' => $this->input->post('no_telpon'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_vendor->add($data);
        $this->session->set_flashdata('pesan', 'vendor Berhasil Ditambahkan!!!');
        redirect('vendor');
    }

    //Update one item
    public function edit($id_vendor = NULL)
    {
        $data = array(
            'id_vendor' => $id_vendor,
            'nama_vendor' => $this->input->post('nama_vendor'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'no_telpon' => $this->input->post('no_telpon'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_vendor->edit($data);
        $this->session->set_flashdata('pesan', 'vendor Berhasil Diedit!!!');
        redirect('vendor');
    }

    //Delete one item
    public function delete($id_vendor = NULL)
    {
        $data = array(
            'id_vendor' => $id_vendor
        );
        $this->m_vendor->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('vendor');
    }
}

/* End of file vendor.php */
