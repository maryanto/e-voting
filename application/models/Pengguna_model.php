<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{

    private $_table = "t_admin";
    const SESSION_KEY = 'ID_ADMIN';

    public function rules()
    {
        return [

            [
                'field' => 'nm_admin',
                'label' => 'Nama Admin',
                'rules' => 'required'
            ]
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    // login pengguna pegawai
    public function login($username, $password)
    {
        $this->db->where('USERNAME', $username);
        $query = $this->db->get($this->_table);
        $user = $query->row();

        if (!$user) {
            return FALSE;
        }

        if (md5($password) != $user->PASSWORD) {
            return FALSE;
        }

        $this->session->set_userdata([self::SESSION_KEY => $user->ID_PEMILIH]);

        return $this->session->has_userdata(self::SESSION_KEY);
    }


    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['ID_PEMILIH' => $user_id]);
        return $query->row();
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->NM_PEMILIH = $post["nm_pemilih"];
        $this->USERNAME = $post["username"];
        $this->PASSWORD = md5($post["password"]);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_PEMILIH = $post["id_pemilih"];
        $this->NM_PEMILIH = $post["nm_pemilih"];
        $this->USERNAME = $post["username"];
        if (!empty($post['password'])) {
            $this->PASSWORD = md5($post["password"]);
        } else {
            $this->PASSWORD = $post["old_password"];
        }
        $this->db->update($this->_table, $this, array('ID_PEMILIH' => $post['id_pemilih']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('ID_PEMILIH' => $id));
    }
}
