<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calon extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calon_model');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
		if (!$this->Admin_model->current_user()) {
			redirect(site_url());
		}
	}

	public function index()
	{
		$this->data['calon'] = $this->Calon_model->getAll();
		$this->data['user'] = $this->Admin_model->current_user();
		$this->data['content'] = 'calon/v_calon';
		$this->load->view('panitia/v_home', $this->data);
	}

	public function add()
	{
		$Data = $this->Calon_model;
		$validation = $this->form_validation;
		$validation->set_rules($Data->rules());

		if ($validation->run()) {
			$Data->save();
			$this->session->set_flashdata('sukses', 'Data Calon Sudah Berhasil disimpan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Calon Sudah Gagal disimpan');
		}
		redirect(site_url('panitia/calon'));
	}

	public function update()
	{
		$Data = $this->Calon_model;
		$validation = $this->form_validation;
		$validation->set_rules($Data->rules());

		if ($validation->run()) {
			$Data->update();
			$this->session->set_flashdata('sukses', 'Data Calon Sudah Berhasil di ubah');
		} else {
			$this->session->set_flashdata('gagal', 'Data Calon Sudah Gagal di ubah');
		}
		redirect(site_url('panitia/calon'));
	}

	public function hapus($id)
	{
		if (!isset($id)) show_404();
		$cek = $this->Calon_model->cek($id);
		if ($cek < 1) {
			if ($this->Calon_model->delete($id)) {
				$this->session->set_flashdata('gagal', 'Data Calon berhasil di hapus.');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Data Calon tidak bisa dihapus karena sudah di gunakan di data Voting.');
		}
		redirect(site_url('panitia/calon'));
	}
}
