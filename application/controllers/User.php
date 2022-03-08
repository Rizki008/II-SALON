<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_pesan');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'Data User',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'layout/backand/user/v_user'
        );
        $this->load->view('layout/backand/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_user->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('user');
    }

    //Update one item
    public function edit($id_user = NULL)
    {
        $data = array(
            'id_user' => $id_user,
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_user->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
        redirect('user');
    }

    //Delete one item
    public function delete($id_user = NULL)
    {
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('user');
    }
}

/* End of file User.php */
