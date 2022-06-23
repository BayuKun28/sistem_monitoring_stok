<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendors extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('vendors_model');
    }

    public function index()
    {
        $data['title'] = 'Vendors';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['vendors'] = $this->vendors_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('vendors/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_vendor' => $this->input->post('nama_vendor'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->insert('vendor', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Vendors');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vendor');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Vendors');
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
        redirect('Vendors');
    }

    public function getdatavendor()
    {
        $ven = $this->input->get('ven');
        $query = $this->vendors_model->getvendorselect2($ven, 'nama_vendor');
        echo json_encode($query);
    }
}
