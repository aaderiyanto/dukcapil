<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('db3', TRUE);
        if (!$_COOKIE['username']) redirect('welcome');
    }

    public function index()
    {
        $page_name     = "profile/index";
        $title = "Profile";
        $id = $_COOKIE['username'];
        $data = $this->db->query("select * from users where username = '" .  $id . "'")->row_array();
        $customers = $this->db2->query("select * from master_customers")->result_array();
        $this->load->view('index', compact('page_name', 'title', 'data', 'customers', 'id'));
    }
    public function update($id)
    {
        $now = date('Y-m-d H:i:s');
        $customer = $this->input->post('customer');
        $this->db->query("UPDATE users SET CustomerId='$customer',updated_at='$now' WHERE username='" . urldecode($id) . "'");
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect("dashboard");
    }
}
