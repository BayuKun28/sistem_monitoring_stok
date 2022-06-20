<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('satuan_barang_model');
    }

    public function index()
    {
        $data['title'] = 'Satuan barang';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan_barang'] = $this->satuan_barang_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('satuan_barang/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_satuan' => $this->input->post('nama_satuan')
        );
        $this->db->insert('satuan_barang', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Satuan_barang');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('satuan_barang');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Satuan_barang');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_satuan' => $this->input->post('nama_satuanedit')
        );
        $this->db->where('id', $id);
        $this->db->update('satuan_barang', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Satuan_barang');
    }

    public function getdatasatuan()
    {
        $sat = $this->input->get('sat');
        $query = $this->satuan_barang_model->getsatuanselect2($sat, 'nama_satuan');
        echo json_encode($query);
    }
}
