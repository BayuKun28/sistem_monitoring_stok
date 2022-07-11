<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Barang';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->barang_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('barang/index', $data);
    }

    public function tambah()
    {   
        $kdbarang = $this->input->post('kode_barang');
        $cek = $this->barang_model->cekkodebarang($kdbarang);

        if ($cek['cekkode'] > 0 ) 
        {
            $this->session->set_flashdata('message', 'Kode Barang Sudah Ada');
            redirect('Barang','refresh');
        } else {
            $data = array(
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori' => $this->input->post('kategori'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'bahan' => $this->input->post('bahan'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', 'Berhasil Ditambah');
            redirect('Barang','refresh');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Barang');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'kode_barang' => $this->input->post('kode_barangedit'),
            'nama_barang' => $this->input->post('nama_barangedit'),
            'kategori' => $this->input->post('kategoriedit'),
            'satuan' => $this->input->post('satuanedit'),
            'harga' => $this->input->post('hargaedit'),
            'stok' => $this->input->post('stokedit'),
            'bahan' => $this->input->post('bahanedit'),
            'keterangan' => $this->input->post('keteranganedit')
        );
        $this->db->where('id', $id);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Barang');
    }
}
