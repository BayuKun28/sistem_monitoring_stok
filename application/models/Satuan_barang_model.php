<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_barang_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT * FROM satuan_barang";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getsatuanselect2($sat)
    {
        $query = "SELECT * FROM satuan_barang WHERE nama_satuan LIKE '%$sat%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
