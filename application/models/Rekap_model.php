<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
{

    public function read($tglawal,$tglakhir)
    {
        $query = "SELECT * FROM 
                    (
                    SELECT sm.id,
                            sm.tanggal,
                            sm.jumlah,
                            sm.keterangan,
                            b.kode_barang,
                            b.nama_barang,
                            v.nama_vendor
                     FROM stok_masuk sm
                     LEFT JOIN barang b on sm.kode_barang = b.kode_barang
                     LEFT JOIN vendor v on sm.vendor  = v.id
                     UNION ALL
                     SELECT sm.id,
                            sm.tanggal,
                            sm.jumlah,
                            sm.keterangan,
                            b.kode_barang,
                            b.nama_barang,
                            v.nama_vendor
                     FROM stok_keluar sm
                     LEFT JOIN barang b on sm.kode_barang = b.kode_barang
                     LEFT JOIN vendor v on sm.vendor  = v.id
                    ) a
                    WHERE a.tanggal BETWEEN '$tglawal' AND '$tglakhir'
                    ORDER BY a.tanggal DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
