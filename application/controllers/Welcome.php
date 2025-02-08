<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('FunctionModel');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function save()
	{
		$now = date('Y-m-d H:i:s');
		$nextid = $this->FunctionModel->nextid("id", "users");
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hash = sha1($password);
		$cek = $this->db->query("SELECT username FROM users where username='$username' OR email='$email'")->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('warning', 'Email dan Username Sudah Digunakan Sebelumnya');
			redirect("welcome/register");
		} else {
			$this->db->query("INSERT INTO users SET id='$nextid',name='$nama',email='$email',username='$username',password='$hash',role='customer',created_at='$now'");
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect("welcome");
		}
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$cek = $this->db->query("select * from users where username='" . $username . "' AND password='" . $password . "'")->num_rows();
		// exit;
		if ($cek > '0') {
			$result = $this->db->query("select * from users where username='" . $username . "' AND password='" . $password . "'")->row_array();
			setcookie("id", $result['id'], 0, "/");
			setcookie("name",  $result['name'], 0, "/");
			setcookie("username",  $result['username'], 0, "/");
			setcookie("email",  $result['email'], 0, "/");
			setcookie("role",  $result['role'], 0, "/");
			echo '1';
		} else {
			$this->session->set_flashdata('info', 'Username & Password Salah');
			echo '2';
		}
	}
	public function logout()
	{
		//unset all cookies
		setcookie("id", "", time() - 1, "/");
		setcookie("name", "", time() - 1, "/");
		setcookie("username", "", time() - 1, "/");
		setcookie("email", "", time() - 1, "/");
		setcookie("role", "", time() - 1, "/");
		$this->session->sess_destroy();
		session_destroy();
		redirect(base_url("welcome"));
	}
}
