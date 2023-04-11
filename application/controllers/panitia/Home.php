<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pemilih_model');
		$this->load->model('Voting_model');
		$this->load->model('Admin_model');
		if (!$this->Admin_model->current_user()) {
			redirect(site_url());
		}
	}

	public function index()
	{
		$this->data['kurikulum'] = $this->Voting_model->getRekapBidang('1', 3);
		$this->data['sarpras'] = $this->Voting_model->getRekapBidang('2', 3);
		$this->data['kesiswaan'] = $this->Voting_model->getRekapBidang('3', 3);
		$this->data['humas'] = $this->Voting_model->getRekapBidang('4', 3);
		$this->data['ismuba'] = $this->Voting_model->getRekapBidang('5', 3);

		$this->data['TotalPemilih'] = $this->Pemilih_model->getJumlahPemilih();
		$this->data['TotalVoting'] = $this->Voting_model->getJumlahSuara();

		$this->data['grafik'] = $this->Voting_model->getGrafik();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'panitia/v_default';
		$this->load->view('panitia/v_home', $this->data);
	}
}
