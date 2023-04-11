<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bidang_model');
		$this->load->model('Pemilih_model');
		$this->load->model('Voting_model');
		if (!$this->Pemilih_model->current_user()) {
			redirect(site_url());
		}
	}


	public function index()
	{
		$this->data['jml_pilihan'] = $this->Voting_model->jmlPilihan($this->Pemilih_model->current_user()->ID_PEMILIH);
		$this->data['bidang'] = $this->Bidang_model->getAll();
		$this->data['user'] = $this->Pemilih_model->current_user();
		$this->data['contents'] = 'user/v_default';
		$this->load->view('user/v_home', $this->data);
	}
}
