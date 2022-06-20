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
        $config['upload_path'] = './upload/barang/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 20000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $message = array('error' => $this->upload->display_errors());
            echo "<script>alert('$message');</script>";
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori' => $this->input->post('kategori'),
                'satuan' => $this->input->post('satuan'),
                'harga_modal' => $this->input->post('harga_modal'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stok' => $this->input->post('stok'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $fileData['file_name']
            );
            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', 'Berhasil Ditambah');
            redirect('Barang');
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
        $config['upload_path'] = './upload/barang/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 20000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileedit')) {
            $data = array(
                'kode_barang' => $this->input->post('kode_barangedit'),
                'nama_barang' => $this->input->post('nama_barangedit'),
                'kategori' => $this->input->post('kategoriedit'),
                'satuan' => $this->input->post('satuanedit'),
                'harga_modal' => $this->input->post('harga_modaledit'),
                'harga_jual' => $this->input->post('harga_jualedit'),
                'stok' => $this->input->post('stokedit'),
                'keterangan' => $this->input->post('keteranganedit')
            );
            $this->db->where('id', $id);
            $this->db->update('barang', $data);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Barang');
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'kode_barang' => $this->input->post('kode_barangedit'),
                'nama_barang' => $this->input->post('nama_barangedit'),
                'kategori' => $this->input->post('kategoriedit'),
                'satuan' => $this->input->post('satuanedit'),
                'harga_modal' => $this->input->post('harga_modaledit'),
                'harga_jual' => $this->input->post('harga_jualedit'),
                'stok' => $this->input->post('stokedit'),
                'keterangan' => $this->input->post('keteranganedit'),
                'gambar' => $fileData['file_name']
            );
            $this->db->where('id', $id);
            $this->db->update('barang', $data);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Barang');
        }
    }
}
