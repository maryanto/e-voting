<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('v_login');
	}

	public function proses()
	{
		$this->load->model('Pemilih_model');
		$this->load->model('Admin_model');

		$this->load->library('form_validation');

		$rules = $this->Pemilih_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			redirect(site_url());
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->Pemilih_model->login($username, $password)) {
			redirect('user/home');
		} elseif ($this->Admin_model->login($username, $password)) {
			redirect('panitia/home');
		} else {
			redirect(site_url());
		}
		redirect(site_url());
	}

	public function logout()
	{
		$this->load->model('Pemilih_model');
		$this->load->model('Admin_model');
		if ($this->Pemilih_model->current_user()) {
			$this->Pemilih_model->logout();
		} elseif ($this->Admin_model->current_user()) {
			$this->Admin_model->logout();
		}
		redirect(site_url());
	}
}
