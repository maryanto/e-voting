<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Calon_model extends CI_Model
{

    private $_table = "t_calon";

    public function rules()
    {
        return [
            [
                'field' => 'nm_calon',
                'label' => 'Nama Calon',
                'rules' => 'required'
            ]
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, array('ID_CALON' => $id))->row();
    }


    public function cek($id)
    {
        return $this->db->get_where('t_voting', array('ID_CALON' => $id))->num_rows();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->NM_CALON = $post["nm_calon"];
        if (!empty($_FILES["foto"]["name"])) {
            $this->FOTO = $this->_uploadFile();
        } else {
            $this->FOTO = "no_pic.png";
        }
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_CALON = $post["id_calon"];
        $this->NM_CALON = $post["nm_calon"];
        if (!empty($_FILES["foto"]["name"])) {
            $this->FOTO = $this->_uploadFile();
        } else {
            $this->FOTO = $post["old_foto"];
        }
        $this->db->update($this->_table, $this, array('ID_CALON' => $post["id_calon"]));
    }

    private function _uploadFile()
    {
        $config['upload_path']          = './foto/';
        $config['allowed_types']        = 'png|jpg|jpeg|bmp';
        $config['overwrite']            = true;
        $config['max_size']             = 10024; // 1MB
        $config['encrypt_name']            = TRUE;
        //$config['file_name']            = $this->ID_USER;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
    }

    private function _deleteFile($id)
    {
        $dok = $this->Calon_model->getById($id);
        $filename = explode(".", $dok->FILE_SURAT)[0];
        return array_map('unlink', glob(FCPATH . "foto/$filename.*"));
    }

    public function delete($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete($this->_table, array('ID_CALON' => $id));
    }

    public function getCalon($id_pemilih)
    {
        $query_calon = "
        SELECT
        *
        FROM 
        t_calon
        WHERE NOT EXISTS (SELECT * FROM t_voting WHERE t_voting.ID_PEMILIH = '" . $id_pemilih . "' AND t_calon.ID_CALON = t_voting.ID_CALON)
        ";
        $query = $this->db->query($query_calon);
        return $query->result();
    }

    public function getAll()
    {
        $this->db->order_by('ID_CALON', 'ASC');
        return $this->db->get($this->_table)->result();
    }
}
