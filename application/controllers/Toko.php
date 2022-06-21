<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Toko extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('toko_model');
    }

    public function index()
    {
        $data['title'] = 'Toko';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->toko_model->read();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('toko/index', $data);
    }
    public function simpan()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_toko' => $this->input->post('nama_toko'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->where('id', $id);
        $this->db->update('toko', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Toko','refresh');
    }
}
