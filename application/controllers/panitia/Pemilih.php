<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pemilih_model');
		$this->load->model('Admin_model');
		$this->load->library('Votinglib');
		$this->load->library('form_validation');

		if (!$this->Admin_model->current_user()) {
			redirect(site_url());
		}
	}

	public function index()
	{
		$this->data['pemilih'] = $this->Pemilih_model->getAll();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'pemilih/v_pemilih';
		$this->load->view('panitia/v_home', $this->data);
	}

	public function status()
	{
		$this->data['pemilih'] = $this->Pemilih_model->getAll();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'pemilih/v_pemilih_status';
		$this->load->view('panitia/v_home', $this->data);
	}

	public function add()
	{
		$Data = $this->Pemilih_model;
		$validation = $this->form_validation;
		$validation->set_rules($Data->rules());

		if ($validation->run()) {
			$Data->save();
			$this->session->set_flashdata('sukses', 'Data Pemilih Sudah Berhasil disimpan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pemilih Sudah Gagal disimpan');
		}
		redirect(site_url('panitia/pemilih'));
	}

	public function update()
	{
		$Data = $this->Pemilih_model;
		$validation = $this->form_validation;
		$validation->set_rules($Data->rules());

		if ($validation->run()) {
			$Data->update();
			$this->session->set_flashdata('sukses', 'Data Pemilih Sudah Berhasil di ubah');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pemilih Sudah Gagal di ubah');
		}
		redirect(site_url('panitia/pemilih'));
	}

	public function hapus($id)
	{
		if (!isset($id)) show_404();
		$cek = $this->Pemilih_model->cek($id);
		if ($cek < 1) {
			if ($this->Pemilih_model->delete($id)) {
				$this->session->set_flashdata('gagal', 'Data Pemilih berhasil di hapus.');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Data Pemilih tidak bisa dihapus karena sudah di gunakan di data Voting.');
		}
		redirect(site_url('panitia/pemilih'));
	}
}
