<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public function read()
    {
        $query = "SELECT b.id, b.kategori as kdkategori,b.satuan as kdsatuan,
        			b.kode_barang,
					b.nama_barang,
					kb.nama_kategori,
					sb.nama_satuan,
					b.harga,
					b.stok,
					b.gambar,
					b.keterangan
				FROM barang b 
				LEFT JOIN kategori_barang kb on (b.kategori = kb.id)
				LEFT JOIN satuan_barang sb on (b.satuan = sb.id)";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
