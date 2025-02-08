<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_COOKIE['username']) redirect('welcome');
    }

    public function index()
    {
        $page_name     = "users/index";
        $title = "Users";
        $data = $this->db->query("select * from users ")->result_array();
        $this->load->view('index', compact('page_name', 'title', 'data'));
    }
    public function add()
    {
        $page_name     = "users/add";
        $title = "Add Users";
        $this->load->view('index', compact('page_name', 'title'));
    }
    public function tambah()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hash = sha1($password);
        $role = $this->input->post('role');
        $cek = $this->db->query("SELECT username FROM users where username='$username'")->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('info', 'username Sudah digunakan sebelumnya');
            redirect(base_url("users/"), 'refresh');
        } else {
            $this->db->query("INSERT INTO users SET nama='$nama',username='$username',password='$hash',role='$role'");
            redirect(base_url("users/"), 'refresh');
        }
    }

    public function edit($id)
    {
        $page_name     = "users/edit";
        $title = "Ganti Passowrd";
        $data = $this->db->query("select * from users where id = '$id'")->row_array();
        $this->load->view('index', compact('page_name', 'title', 'data', 'id'));
    }
    public function delete($id)
    {
        //$id = $this->input->post('id');
        $hapus = $this->db->query("DELETE FROM users where id='" . $id . "' ");
        redirect(base_url("users/"), 'refresh');
    }
    public function update($id)
    {
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $hash = sha1($password);

        if ($this->input->post('password')) {
            $this->db->query("UPDATE users SET password='$hash' where id='" . $id . "' ");
        }
        if ($_COOKIE['role'] == "admin") {
            redirect(base_url("users/"), 'refresh');
        } else {
            redirect(base_url("dashboard/"), 'refresh');
        }
    }
}
