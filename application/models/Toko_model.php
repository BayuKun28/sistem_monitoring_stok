<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko_model extends CI_Model
{

    public function read()
    {
        $query = "
                    SELECT * FROM toko WHERE id = 1";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
