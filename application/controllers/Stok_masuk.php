<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('stok_masuk_model');
    }

    public function index()
    {
        $data['title'] = 'Stok Masuk';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['stok'] = $this->stok_masuk_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('stok_masuk/index', $data);
    }

    public function tambah()
    {
        $kdbarang = $this->input->post('kode_barang');
        $jumlah = $this->input->post('jumlah');
        $stok = $this->stok_masuk_model->getStok($kdbarang)->stok;
        $rumus = max($stok + $jumlah, 0);
        $addStok = $this->stok_masuk_model->addStok($kdbarang, $rumus);

        $tanggal = new DateTime($this->input->post('tanggal'));
        $data = array(
            'tanggal' => $tanggal->format('Y-m-d H:i:s'),
            'kode_barang' => $kdbarang,
            'jumlah' => $jumlah,
            'keterangan' => $this->input->post('keterangan'),
            'vendor' => $this->input->post('vendor')
        );

        $this->db->insert('stok_masuk', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Stok_masuk');
    }

    public function getkodebarang()
    {
        $kod = $this->input->get('kod');
        $query = $this->stok_masuk_model->getkodebarangselect2($kod, 'kode_barang');
        echo json_encode($query);
    }
    public function getvendor()
    {
        $ven = $this->input->get('ven');
        $query = $this->stok_masuk_model->getvendorselect2($ven, 'nama_vendor');
        echo json_encode($query);
    }
}
