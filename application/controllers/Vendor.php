<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('vendor_model');
    }

    public function index()
    {
        $data['title'] = 'Vendor';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['vendor'] = $this->vendor_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('vendor/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_vendor' => $this->input->post('nama_vendor'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->insert('vendor', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Vendor');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vendor');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Vendor');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_vendor' => $this->input->post('nama_vendoredit'),
            'alamat' => $this->input->post('alamatedit')
        );
        $this->db->where('id', $id);
        $this->db->update('vendor', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Vendor');
    }

    public function getdatavendor()
    {
        $ven = $this->input->get('ven');
        $query = $this->vendor_model->getvendorselect2($ven, 'nama_vendor');
        echo json_encode($query);
    }
}
