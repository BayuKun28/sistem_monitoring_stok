<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function read()
    {
        $idk = $this->session->userdata('id');
        $query = "SELECT * FROM pengguna where id <> '$idk' ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function profil($id)
    {
        $query = "SELECT * FROM pengguna where id = '$id' ";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
