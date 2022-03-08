<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Foto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_foto');
        $this->load->model('m_paket');
        $this->load->model('m_pesan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Gambar paket',
            'foto' => $this->m_foto->gambar(),
            'isi' => 'layout/backand/foto/v_foto'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    public function add($id_paket)
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Gambar paket',
                    'error_upload' => $this->upload->display_errors(),
                    'paket' => $this->m_paket->detail($id_paket),
                    'gambar' => $this->m_foto->detail_gambar($id_paket),
                    'isi' => 'layout/backand/foto/v_add'
                );
                $this->load->view('layout/backand/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_paket' => $id_paket,
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_foto->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('foto/add/' . $id_paket);
            }
        }
        $data = array(
            'title' => 'Tambah Gambar paket',
            'paket' => $this->m_paket->detail($id_paket),
            'gambar' => $this->m_foto->detail_gambar($id_paket),
            'isi' => 'layout/backand/foto/v_add'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }


    public function delete($id_paket, $id_gambar)
    {
        //hapus gambar
        $gambar = $this->m_foto->detail($id_gambar);
        if ($gambar->gambar !== "") {
            unlink('./assets/foto/' . $gambar->gambar);
        }

        $data = array(
            'id_gambar' => $id_gambar
        );
        $this->m_foto->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus');
        redirect('foto/add/' . $id_paket);
    }
}
