<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    private $_table = "t_admin";
    const SESSION_KEY = 'ID_ADMIN';

    public function rules()
    {
        return [

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|max_length[255]'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, array('ID_ADMIN' => $id))->row();
    }

    public function rules_update()
    {
        return [

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ]
        ];
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

        $this->session->set_userdata([self::SESSION_KEY => $user->ID_ADMIN]);

        return $this->session->has_userdata(self::SESSION_KEY);
    }


    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['ID_ADMIN' => $user_id]);
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
        $this->NM_ADMIN = $post["nm_admin"];
        $this->USERNAME = $post["username"];
        $this->PASSWORD = md5($post["password"]);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_ADMIN = $post["id_admin"];
        $this->NM_ADMIN = $post["nm_admin"];
        $this->USERNAME = $post["username"];
        if (!empty($post['password'])) {
            $this->PASSWORD = md5($post["password"]);
        } else {
            $this->PASSWORD = $post["old_password"];
        }
        $this->db->update($this->_table, $this, array('ID_ADMIN' => $post['id_admin']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('ID_ADMIN' => $id));
    }
}
