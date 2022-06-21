<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_keluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('stok_keluar_model');
        $this->load->model('stok_masuk_model');
    }

    public function index()
    {
        $data['title'] = 'Stok Keluar';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['stok'] = $this->stok_keluar_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('stok_keluar/index', $data);
    }

    public function tambah()
    {
        $kdbarang = $this->input->post('kode_barang');
        $jumlah = $this->input->post('jumlah');
        $stok = $this->stok_masuk_model->getStok($kdbarang)->stok;
        $rumus = max($stok - $jumlah, 0);
        $addStok = $this->stok_masuk_model->addStok($kdbarang, $rumus);

        $tanggal = new DateTime($this->input->post('tanggal'));
        $data = array(
            'tanggal' => $tanggal->format('Y-m-d H:i:s'),
            'kode_barang' => $kdbarang,
            'jumlah' => $jumlah,
            'keterangan' => $this->input->post('keterangan'),
            'vendor' => $this->input->post('vendor')
        );

        $this->db->insert('stok_keluar', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Stok_keluar');
    }
}
