<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_masuk_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT sm.id,sm.tanggal,sm.jumlah,sm.keterangan,b.kode_barang,b.nama_barang,v.nama_vendor
                    FROM stok_masuk sm
                    LEFT JOIN barang b on sm.kode_barang = b.kode_barang
                    LEFT JOIN vendor v on sm.vendor  = v.id";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getkodebarangselect2($kod)
    {
        $query = "SELECT id ,kode_barang from barang WHERE kode_barang LIKE '%$kod%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getvendorselect2($ven)
    {
        $query = "SELECT id ,nama_vendor from vendor WHERE nama_vendor LIKE '%$ven%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function getStok($kdbarang)
    {
        $this->db->select('stok');
        $this->db->where('kode_barang', $kdbarang);
        return $this->db->get('barang')->row();
    }
    public function addStok($kdbarang, $stok)
    {
        $this->db->where('kode_barang', $kdbarang);
        $this->db->set('stok', $stok);
        return $this->db->update('barang');
    }
}
