<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $email = $cek->email;
            $username = $cek->username;
            $level = $cek->level;
            $id_user = $cek->id_user;

            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('level', $level);
            $this->ci->session->set_userdata('level', $id_user);
            if ($level == 1) {
                redirect('admin');
            } else if($level == 2){
                redirect('vendorr');
            }
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('auth/login_user');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_user');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('level');
        $this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
        redirect('auth/login_user');
    }
}
