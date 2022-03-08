<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dekor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dekor');
        $this->load->model('m_vendor');
        $this->load->model('m_pesan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Dekorasi',
            'dekor' => $this->m_dekor->dekor(),
            'isi' => 'layout/vendor/dekor/v_dekor'
        );
        $this->load->view('layout/vendor/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('id_vendor', 'Nama Vendor', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('nama', 'Nama Dekorasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Data Dekorasi',
                'vendor' => $this->m_vendor->vendor(),
                'isi' => 'layout/vendor/dekor/v_add'
            );
            $this->load->view('layout/vendor/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_vendor' => $this->input->post('id_vendor'),
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            $this->m_dekor->add($data);
            $this->session->set_flashdata('pesan', 'Data berhasil Ditambah');
            redirect('dekor');
        }
    }

    //Update one item
    public function edit($id_detail = NULL)
    {
        $this->form_validation->set_rules('id_vendor', 'Nama Vendor', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('nama', 'Nama Dekorasi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit Dekorasi',
                'vendor' => $this->m_vendor->vendor(),
                'dekor' => $this->m_dekor->detail($id_detail),
                'isi' => 'layout/vendor/dekor/v_edit'
            );
            $this->load->view('layout/vendor/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_detail' => $id_detail,
                'id_vendor' => $this->input->post('id_vendor'),
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            $this->m_dekor->edit($data);
            $this->session->set_flashdata('pesan', 'Data berhasil Ditambah');
            redirect('dekor');
        }
    }

    //Delete one item
    public function delete($id_detail)
    {
        $data = array(
            'id_detail' => $id_detail,
        );
        $this->m_dekor->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('dekor');
    }
}
