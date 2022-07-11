<?php
// defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Dompdf\Dompdf as Dompdf;
class Rekap_laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('rekap_model');
        $this->load->model('toko_model');
    }

    public function index()
    {
        $data['title'] = 'Rekap Laporan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();


        $xtanggalawal = $this->input->post('tanggalawal');
        $xtanggalakhir = $this->input->post('tanggalakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tanggalawal');
            $xtanggalakhir = $this->input->post('tanggalakhir');
        } else {
            $xtanggalawal = date('Y/m/d');
            $xtanggalakhir = date('Y/m/d', strtotime('+1 days'));
        }

        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;

        $data['rekap'] = $this->rekap_model->read($xtanggalawal,$xtanggalakhir);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('rekap/index', $data);
    }

    public function tanggal_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }
    
    public function cetak()
    {
        $data['title'] = 'Rekap Laporan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->get('tglawal');
        $xtanggalakhir = $this->input->get('tglakhir');

        $data['tanggalawal'] = date('d F Y', strtotime($xtanggalawal));
        $data['tanggalakhir'] = date('d F Y', strtotime($xtanggalakhir));
        $data['rekap'] = $this->rekap_model->read($xtanggalawal,$xtanggalakhir);
        $data['toko'] = $this->toko_model->read();
        $data['hariini'] = $this->tanggal_indo(date('Y-m-d'));

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('rekap/cetak', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Rekap Laporan Tanggal ' . $xtanggalawal . ' Sampai ' . date('Y-m-d'), array("Attachment" => false));
    }
}
