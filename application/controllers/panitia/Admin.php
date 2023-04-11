<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->data['admin'] = $this->Admin_model->getAll();
        $this->data['user'] = $this->Admin_model->current_user();
        $this->data['content'] = 'pengguna/v_admin';
        $this->load->view('panitia/v_home', $this->data);
    }

    public function add()
    {
        $Data = $this->Admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($Data->rules());

        if ($validation->run()) {
            $Data->save();
            $this->session->set_flashdata('sukses', 'Data Admin Sudah Berhasil disimpan');
        } else {
            $this->session->set_flashdata('gagal', 'Data Admin Gagal disimpan');
        }
        redirect(site_url('panitia/admin'));
    }

    public function update()
    {
        $Data = $this->Admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($Data->rules());

        if ($validation->run()) {
            $Data->update();
            $this->session->set_flashdata('sukses', 'Data Admin Sudah Berhasil di ubah');
        } else {
            $this->session->set_flashdata('gagal', 'Data Admin  Gagal di ubah');
        }
        redirect(site_url('panitia/admin'));
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();

        $admin =  $this->Admin_model->getById($id);

        if (!$admin->USERNAME == 'admin.voting') {
            if ($this->Admin_model->delete($id)) {
                $this->session->set_flashdata('gagal', 'Data Admin berhasil di hapus.');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data User Admin ini tida boleh di hapus.');
        }

        redirect(site_url('panitia/admin'));
    }
}
