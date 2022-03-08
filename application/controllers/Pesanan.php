<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesan');
    }
    public function index()
    {
        $this->form_validation->set_rules('pesan', 'Pesan', 'required', array(
            'pesan' => '%s Harus Diisii!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'chat' => $this->m_pesan->select_chat(),
                'isi' => 'layout/frontend/pesan/v_pesan'
            );
            $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'isi' => $this->input->post('pesan'),
                'balas' => '0'
            );
            $this->db->insert('tbl_pesan', $data);
            redirect('pesanan');
        }
    }
}
