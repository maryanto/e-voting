<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilih extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bidang_model');
		$this->load->model('Calon_model');
		$this->load->model('Voting_model');
		$this->load->helper('voting_helper');
		$this->load->model('Pemilih_model');
		if (!$this->Pemilih_model->current_user()) {
			redirect(site_url());
		}
	}

	public function index()
	{
		redirect(site_url('user/home'));
	}

	public function calon($id)
	{
		$this->data['bidang'] = $this->Bidang_model->getById($id);
		$this->data['calon'] = $this->Calon_model->getCalon($this->Pemilih_model->current_user()->ID_PEMILIH);
		$this->data['pilihan'] = $this->Voting_model->getPilihan($this->Pemilih_model->current_user()->ID_PEMILIH, $id);
		$this->data['jml_pilihan'] = $this->Voting_model->jmlPilihanBidang($this->Pemilih_model->current_user()->ID_PEMILIH, $id);
		$this->data['user'] = $this->Pemilih_model->current_user();
		$this->data['contents'] = 'user/v_pilih';
		$this->load->view('user/v_home', $this->data);
	}

	public function simpan($id_bidang = null, $id_calon = null)
	{
		$jml_pilihan = $this->Voting_model->jmlPilihanBidang($this->Pemilih_model->current_user()->ID_PEMILIH, $id_bidang);
		if ($jml_pilihan <= 3) {
			$cekPeringkat = $this->Voting_model->getPeringkat($this->Pemilih_model->current_user()->ID_PEMILIH, $id_bidang);
			$peringkat = $cekPeringkat + 1;
			//simpan pilihan
			$id_pemilih = $this->Pemilih_model->current_user()->ID_PEMILIH;
			$id_calon = $id_calon;
			$id_bidang = $id_bidang;
			$poin = jml_poin($peringkat);
			$simpan = $this->Voting_model->save($id_pemilih, $id_calon, $id_bidang, $peringkat, $poin);
		}
		redirect(site_url('user/pilih/calon/' . $id_bidang));
	}
}
