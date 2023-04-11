<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_model extends CI_Model
{

    private $_table = "r_bidang";

    public function rules()
    {
        return [
            [
                'field' => 'nm_bidang',
                'label' => 'Nama Bidang',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, array('ID_BIDANG' => $id))->row();
    }
}
