<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// var $table = $this->mhome->;
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('model');
		// $this->load->model('m_tabel_ss');
		
	}

	function index() {
		// print_r('sini login');
		
		if ($this->input->post('button_login')) {
			// print_r('jalankan login');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($username == 'admin' && $password == 'admin') {
				$this->session->set_flashdata('success', 'Selamat Kembali Admin');
				$this->session->set_userdata('admin', 'admin');
				redirect('/home');
			}
			else
			{
				$this->session->set_flashdata('error', 'Username dan Password salah');
				redirect('/login');
			}
		}
		else
		{
			$this->load->view('login/login');
		}
	}

	
}
?>