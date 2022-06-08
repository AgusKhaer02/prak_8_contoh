<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        $this->load->view('login_form_view');
    }

	// proses submit
    public function exlogin()
    {
		// memberikan nilai username dan password pada model login_m
        $this->login_m->setUsernamePass($this->input->post('username'), $this->input->post('password'));

		// memanggil function login_check() dari model login_m
        if ($this->login_m->login_check() == true) {
			// input session username, name, email, dan level
            $this->session->set_userdata('username', $this->login_m->username);
            $this->session->set_userdata('name', $this->login_m->name);
            $this->session->set_userdata('email', $this->login_m->email);
            $this->session->set_userdata('level', $this->login_m->level);

			// pindah ke halaman success
            redirect(base_url('Welcome/success'));
		
        } else {
		
			// jika tidak ada akun pada database maka kembali ke halaman login form
            redirect(base_url('Welcome/index'));
        }
    }


	// function ini untuk memanggil halaman login success view
    public function success()
    {
        $this->load->view('login_success_view');
    }


    public function logout()
    {
		// ketika punya nilai session yang berisi username
        if ($this->session->has_userdata('username')) {
            // maka lakukan destroy = penghapusan nilai  session bagi user yang sebelumnya sudah login
            $this->session->sess_destroy();
            // memanggil halaman form login lagi
            redirect(base_url('Welcome/index'));
        }
    }
}
