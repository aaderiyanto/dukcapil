<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$_COOKIE['username']) redirect('welcome');
    }

    public function index()
    {
        $page_name     = "kunjungan/index";
        $title = "Dashboard";
        $data = $this->db->query("select * from kunjungan ")->result_array();
        $this->load->view('index', compact('page_name', 'title', 'data'));
    }
    public function add()
    {
        $page_name     = "kunjungan/add";
        $title = "Tambah kunjungan";
        $penduduk = $this->db->query("select * from penduduk ")->result_array();
        $this->load->view('index', compact('page_name', 'title', 'penduduk'));
    }
    public function save()
    {
        $now = date('Y-m-d H:i:s');
        $tanggal = $this->input->post('tanggal');
        $penduduk = $this->input->post('penduduk');
        $tujuan = $this->input->post('tujuan');
        $this->db->query("INSERT INTO kunjungan SET tanggal='$tanggal',id_penduduk='$penduduk',tujuan='$tujuan', created_at='$now'");
        $this->session->set_flashdata('info', 'Data Berhasil Disimpan');
        redirect(base_url("kunjungan/"), 'refresh');
    }
    public function edit($id)
    {
        $page_name     = "kunjungan/edit";
        $title = "Edit kunjungan";
        $penduduk = $this->db->query("select * from penduduk ")->result_array();
        $data = $this->db->query("select * from kunjungan where id = '$id'")->row_array();
        $this->load->view('index', compact('page_name', 'title', 'data', 'id', 'penduduk'));
    }
    public function delete($id)
    {
        //$id = $this->input->post('id');
        $hapus = $this->db->query("DELETE FROM kunjungan where id='" . $id . "' ");
        redirect(base_url("kunjungan/"), 'refresh');
    }
    public function update($id)
    {
        $now = date('Y-m-d H:i:s');
        $tanggal = $this->input->post('tanggal');
        $penduduk = $this->input->post('penduduk');
        $tujuan = $this->input->post('tujuan');

        $this->db->query("UPDATE kunjungan SET tanggal='$tanggal',id_penduduk='$penduduk',tujuan='$tujuan', updated_at='$now' WHERE id='$id'");
        $this->session->set_flashdata('info', 'Data Berhasil Disimpan');
        redirect(base_url("kunjungan/"), 'refresh');
    }
}
