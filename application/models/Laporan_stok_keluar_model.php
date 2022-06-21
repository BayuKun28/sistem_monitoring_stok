<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_stok_keluar_model extends CI_Model
{

    public function read($tglawal,$tglakhir)
    {
        $query = "
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
                     WHERE sm.tanggal BETWEEN '$tglawal' AND '$tglakhir'
                     ORDER BY sm.tanggal DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
