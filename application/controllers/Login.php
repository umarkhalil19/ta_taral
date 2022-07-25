<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function cek()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->index();
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cek = $this->db->get_where('users', ['username' => $username]);
            if ($cek->num_rows()) {
                $cek = $cek->row();
                $pass = password_verify($password, $cek->password);
                if ($pass) {
                    $session = [
                        'id' => $cek->username,
                        'level' => $cek->level,
                        'status' => $cek->status
                    ];
                    $this->session->set_userdata($session);
                    if ($cek->level == 'admin') {
                        redirect('admin');
                    } elseif ($cek->level == 'guru') {
                        redirect('guru');
                    } elseif ($cek->level == 'siswa') {
                        redirect('siswa');
                    } else {
                        $this->session->set_flashdata('error', 'Anda tidak memeliki akses!!!');
                        redirect('login?notif=error');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Username atau Password anda salah!!!');
                    redirect('login?notif=error');
                }
            } else {
                $this->session->set_flashdata('error', 'Akun anda tidak terdaftar!!!');
                redirect('login?notif=error');
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
