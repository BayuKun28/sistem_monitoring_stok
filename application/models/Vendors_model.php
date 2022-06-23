<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendors_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT * FROM vendor";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getvendorselect2($ven)
    {
        $query = "SELECT * FROM vendor WHERE nama_vendor LIKE '%$ven%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
