<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_COOKIE['username']) redirect('welcome');
    }

    public function index()
    {
        $page_name     = "penduduk/index";
        $title = "Penduduk";
        $data = $this->db->query("select * from penduduk")->result_array();
        $this->load->view('index', compact('page_name', 'title', 'data'));
    }
    public function add()
    {
        $page_name     = "penduduk/add";
        $title = "Tambah Penduduk";
        $this->load->view('index', compact('page_name', 'title'));
    }
    public function save()
    {
        $now = date('Y-m-d H:i:s');
        $kk = $this->input->post('kk');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $cek = $this->db->query("SELECT * FROM penduduk where kk='$kk' OR  nik='$nik'")->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('info', 'Data Sudah digunakan sebelumnya');
            redirect(base_url("penduduk/"), 'refresh');
        } else {
            $this->db->query("INSERT INTO penduduk SET kk='$kk',nik='$nik',nama='$nama',hp='$hp', created_at='$now'");
            $this->session->set_flashdata('info', 'Data Berhasil Disimpan');
            redirect(base_url("penduduk/"), 'refresh');
        }
    }

    public function edit($id)
    {
        $page_name     = "penduduk/edit";
        $title = "Edit Penduduk";
        $data = $this->db->query("select * from penduduk where id = '$id'")->row_array();
        $this->load->view('index', compact('page_name', 'title', 'data', 'id'));
    }
    public function delete($id)
    {
        //$id = $this->input->post('id');
        $hapus = $this->db->query("DELETE FROM penduduk where id='" . $id . "' ");
        redirect(base_url("penduduk/"), 'refresh');
    }
    public function update($id)
    {
        $now = date('Y-m-d H:i:s');
        $kk = $this->input->post('kk');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $cek = $this->db->query("SELECT * FROM penduduk where (kk='$kk' OR nik='$nik') AND id!='$id'")->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('info', 'Data Sudah digunakan sebelumnya');
            redirect(base_url("penduduk/"), 'refresh');
        } else {
            $this->db->query("UPDATE penduduk SET kk='$kk',nik='$nik',nama='$nama',hp='$hp', updated_at='$now' WHERE id='$id'");
            $this->session->set_flashdata('info', 'Data Berhasil Disimpan');
            redirect(base_url("penduduk/"), 'refresh');
        }
    }
}
