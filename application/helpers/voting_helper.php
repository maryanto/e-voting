<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('jml_poin')) {
    function jml_poin($id)
    {
        if ($id != NULL) {
            if ($id == '1') {
                $poin = '5';
            } elseif ($id == '2') {
                $poin = '3';
            } elseif ($id == '3') {
                $poin = '1';
            } else {
                $poin = '0';
            }
        }
        return $poin;
    }
}
