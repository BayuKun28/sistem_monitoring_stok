<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('kategori_barang_model');
    }

    public function index()
    {
        $data['title'] = 'Kategori Barang';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori_barang'] = $this->kategori_barang_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kategori_barang/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->db->insert('kategori_barang', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Kategori_barang');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori_barang');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kategori_barang');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategoriedit')
        );
        $this->db->where('id', $id);
        $this->db->update('kategori_barang', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Kategori_barang');
    }

    public function getdatakategori()
    {
        $kat = $this->input->get('kat');
        $query = $this->kategori_barang_model->getkategoriselect2($kat, 'nama_kategori');
        echo json_encode($query);
    }
}
