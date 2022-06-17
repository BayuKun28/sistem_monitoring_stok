<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_barang_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT * FROM kategori_barang";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
