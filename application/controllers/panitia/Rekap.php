<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calon_model');
		$this->load->model('Voting_model');
		$this->load->model('Admin_model');
		$this->load->library('Votinglib');

		if (!$this->Admin_model->current_user()) {
			redirect(site_url());
		}
	}

	public function index()
	{
		$this->data['jml_suara'] = $this->Voting_model->getRekapSuara();
		$this->data['calon'] = $this->Calon_model->getAll();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'calon/v_calon_rekap';
		$this->load->view('panitia/v_home', $this->data);
	}

	public function bidang()
	{
		$this->data['kurikulum'] = $this->Voting_model->getRekapBidang('1', 10);
		$this->data['sarpras'] = $this->Voting_model->getRekapBidang('2', 10);
		$this->data['kesiswaan'] = $this->Voting_model->getRekapBidang('3', 10);
		$this->data['humas'] = $this->Voting_model->getRekapBidang('4', 10);
		$this->data['ismuba'] = $this->Voting_model->getRekapBidang('5', 10);


		$this->data['calon'] = $this->Calon_model->getAll();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'calon/v_calon_bidang_rekap';
		$this->load->view('panitia/v_home', $this->data);
	}

	public function calon()
	{
		$this->data['calon'] = $this->Calon_model->getAll();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'calon/v_calon_poin_rekap';
		$this->load->view('panitia/v_home', $this->data);
	}
}
