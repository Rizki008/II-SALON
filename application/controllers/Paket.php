<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_paket');
        $this->load->model('m_vendor');
        $this->load->model('m_pesan');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => "Data Paket",
            'paket' => $this->m_paket->paket(),
            //'deskripsi' => $this->m_paket->deskripsi(),
            'total_paket' => $this->m_paket->total_paket(),
            'isi' => 'layout/backand/paket/v_paket'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('id_vendor', 'Nama vendor', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('tipe_paket', 'tipe_paket paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        //$this->form_validation->set_rules('deskripsi[]', 'Deskripsi paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah paket',
                    'vendor' => $this->m_vendor->vendor(),
                    'dekor' => $this->m_paket->dekor(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/backand/paket/v_add'
                );
                $this->load->view('layout/backand/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_paket' => $this->input->post('nama_paket'),
                    'id_vendor' => $this->input->post('id_vendor'),
                    'harga' => $this->input->post('harga'),
                    'tipe_paket' => $this->input->post('tipe_paket'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    //'id_detail' => $this->input->post('id_detail'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );
                $this->m_paket->add($data);
                
				/*$id_paket = $this->db->insert_id();
                $deskipsi = count($this->input->post('deskripsi'));

                for ($i = 0; $i < $deskipsi; $i++) {
                    $datas[$i] = array(
                        'id_paket' => $id_paket,
                        'deskripsi' => $this->input->post('deskripsi[' . $i . ']')
                    );

                    $this->db->insert('tbl_deskripsi', $datas[$i]);
                }*/

                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('paket');
            }
        }

        $data = array(
            'title' => 'Tambah paket',
            'vendor' => $this->m_vendor->vendor(),
            'dekor' => $this->m_paket->dekor(),
            'isi' => 'layout/backand/paket/v_add'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    //Edit one item
    public function edit($id_paket = NULL)
    {
        $this->form_validation->set_rules('nama_paket', 'Nama paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('id_vendor', 'Nama vendor', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        // $this->form_validation->set_rules('diskon', 'Diskon paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('tipe_paket', 'tipe_paket paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        //$this->form_validation->set_rules('id_detail', 'Deskripsi paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit paket',
                    'vendor' => $this->m_vendor->vendor(),
                    'dekor' => $this->m_paket->dekor(),
                    'paket' => $this->m_paket->detail($id_paket),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/backand/paket/v_edit'
                );
                $this->load->view('layout/backand/v_wrapper', $data, FALSE);
            } else {
                //hapus gambar di folder
                $paket = $this->m_paket->detail($id_paket);
                if ($paket->gambar !== "") {
                    unlink('./assets/gambar/' . $paket->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_paket' => $id_paket,
                    'nama_paket' => $this->input->post('nama_paket'),
                    'id_vendor' => $this->input->post('id_vendor'),
                    'harga' => $this->input->post('harga'),
                    'diskon' => $this->input->post('diskon'),
                    'tipe_paket' => $this->input->post('tipe_paket'),
                    //'id_detail' => $this->input->post('id_detail'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_paket->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('paket');
            } //tanpa ganti gambar
            $data = array(
                'id_paket' => $id_paket,
                'nama_paket' => $this->input->post('nama_paket'),
                'id_vendor' => $this->input->post('id_vendor'),
                //'id_detail' => $this->input->post('id_detail'),
                'harga' => $this->input->post('harga'),
                'diskon' => $this->input->post('diskon'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tipe_paket' => $this->input->post('tipe_paket'),
            );
            $this->m_paket->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('paket');
        }

        $data = array(
            'title' => 'Edit paket',
            'vendor' => $this->m_vendor->vendor(),
            'dekor' => $this->m_paket->dekor(),
            'paket' => $this->m_paket->detail($id_paket),
            'isi' => 'layout/backand/paket/v_edit'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($id_paket = NULL)
    {
        //hapus gambar
        $paket = $this->m_paket->detail($id_paket);
        if ($paket->gambar !== "") {
            unlink('./assets/gambar/' . $paket->gambar);
        }
        $data = array(
            'id_paket' => $id_paket
        );
        $this->m_paket->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('paket');
    }
}

/* End of file Paket.php */
