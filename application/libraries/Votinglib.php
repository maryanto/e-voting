<?php
defined('BASEPATH') or exit('No direct script access allowed');

class votinglib
{
    function jmlSuara($id_pemilih)
    {
        $this->ci = &get_instance();
        $where = array(
            'ID_PEMILIH' => $id_pemilih
        );
        $hasil = $this->ci->db->get_where('t_voting', $where)->num_rows();
        if ($hasil != NULL) {
            return $hasil;
        } else {
            return $hasil = '0';
        }
    }

    function jmlPoinCalon($id_calon, $id_bidang)
    {
        $this->ci = &get_instance();
        $where = array(
            'ID_CALON' => $id_calon,
            'ID_BIDANG' => $id_bidang
        );
        $this->ci->db->select("SUM(t_voting.POIN) AS JUMLAH");
        $hasil = $this->ci->db->get_where('t_voting', $where)->row();
        if ($hasil != NULL) {
            return $hasil = $hasil->JUMLAH;
        } else {
            return $hasil = '0';
        }
    }
}
