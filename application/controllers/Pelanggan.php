<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }

    // List all your items
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'is_unique' => '%s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('password', 'Password Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'matches' => '%s Password Tidak Sama !!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat Pelanggan', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));



        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Regiseter Pelanggan',
                'isi' => 'layout/frontend/register/v_register'
            );
            $this->load->view('layout/frontend/register/v_register');
        } else {
            $email = $this->input->post('email');
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => ($email),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'rol_id' => 2,
                'is_active' => 0,

            );

            //token bilangan rendem
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->m_pelanggan->register($data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Aktivasi Akun!!!');
            redirect('pelanggan/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rizkihasbiallah06@gmail.com',
            'smtp_pass' => 'KIKI170796@',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('rizkihasbiallah06@gmail.com', 'II Salon');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Akun verifikasi');
            $this->email->message('Silahkan Klik disini Untuk Aktifasi Akun : <a 
            href="' . base_url() . 'pelanggan/verify?email=' . $this->input->post('email') . '& token=' . $token . '">Active</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_pelanggan', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] <  (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_pelanggan');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login Akun!!!');
                    redirect('pelanggan/login');
                } else {

                    $this->db->delete('tbl_pelanggan', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', 'Expayer');
                    redirect('pelanggan/login');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Register gagal!!!');
                redirect('pelanggan/login');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Data Error !!!');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'layout/frontend/login/v_login_pelanggan'
        );
        $this->load->view('layout/frontend/login/v_login_pelanggan', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'isi' => 'layout/frontend/login/v_akun'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    //$this->pelanggan_login->proteksi_halaman();
    //$data = array(
    //'title' => 'Akun Saya',
    // 'isi' => 'layout/frontend/login/v_edit'
    //);
    //$this->load->view('layout/frontend/v_wrapper', $data, FALSE);
}

/* End of file Pelanggan.php */
