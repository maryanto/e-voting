<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Voting_model extends CI_Model
{

    private $_table = "t_voting";

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


    public function getRekapSuara()
    {
        return $this->db->get('v_jumlah_suara')->result();
    }

    public function getRekapBidang($id, $limit)
    {
        $query_rekap = "
        SELECT
        t_voting.ID_CALON,
        t_calon.NM_CALON,
        t_calon.FOTO,
        COUNT(t_voting.ID_VOTING) AS JML_SUARA,
        SUM(t_voting.POIN) AS JML_POIN
        FROM
        t_voting
        LEFT JOIN
        t_calon ON t_voting.ID_CALON = t_calon.ID_CALON
        WHERE 
        t_voting.ID_BIDANG = '" . $id . "'
        GROUP BY
        t_voting.ID_CALON
        ORDER BY
        SUM(t_voting.POIN) DESC
        LIMIT " . $limit . "
        ";
        $query = $this->db->query($query_rekap);
        return $query->result();
    }

    public function getGrafik()
    {
        $query_rekap = "
        SELECT
        t_voting.ID_CALON,
        t_calon.NM_CALON,
        SUM(t_voting.POIN) AS JUMLAH
        FROM
        t_voting
        LEFT JOIN
        t_calon ON t_voting.ID_CALON = t_calon.ID_CALON
        GROUP BY
        t_voting.ID_CALON
        LIMIT 10
        ";
        $query = $this->db->query($query_rekap);
        return $query->result();
    }

    public function getJumlahSuara()
    {
        return $this->db->get($this->_table)->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getPeringkat($id_pemilih, $id_bidang)
    {
        return $this->db->get_where($this->_table, array('ID_PEMILIH' => $id_pemilih, 'ID_BIDANG' => $id_bidang))->num_rows();
    }

    public function jmlPilihan($id_pemilih)
    {
        return $this->db->get_where($this->_table, array('ID_PEMILIH' => $id_pemilih))->num_rows();
    }

    public function jmlPilihanBidang($id_pemilih, $id_bidang)
    {
        return $this->db->get_where($this->_table, array('ID_PEMILIH' => $id_pemilih, 'ID_BIDANG' => $id_bidang))->num_rows();
    }

    public function getPilihan($id_pemilih, $id_bidang)
    {
        $where = array(
            'ID_PEMILIH' => $id_pemilih,
            'ID_BIDANG' => $id_bidang
        );
        $this->db->select('t_voting.ID_CALON');
        $this->db->select('t_voting.PERINGKAT');
        $this->db->select('t_calon.NM_CALON');
        $this->db->join('t_calon', 't_voting.ID_CALON = t_calon.ID_CALON', 'LEFT');
        $this->db->order_by('t_voting.PERINGKAT', 'ASC');
        return $this->db->get_where('t_voting', $where)->result();
    }

    public function save($id_pemilih, $id_calon, $id_bidang, $peringkat, $poin)
    {
        $this->ID_PEMILIH = $id_pemilih;
        $this->ID_CALON = $id_calon;
        $this->ID_BIDANG = $id_bidang;
        $this->PERINGKAT = $peringkat;
        $this->POIN = $poin;
        $this->db->insert($this->_table, $this);
    }
}
