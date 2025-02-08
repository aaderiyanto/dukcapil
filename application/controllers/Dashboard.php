<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$_COOKIE['username']) redirect('welcome');
    }

    public function index()
    {
        $page_name     = "dashboard/index";
        $title = "Dashboard";
        $this->load->view('index', compact('page_name', 'title'));
    }
}
