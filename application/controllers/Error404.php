<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }

    public function index()
    {
        // if (!$this->session->userdata('admin_username')) redirect('login');
       // $this->load->view('layout/header');
    	 $this->output->set_status_header('404'); 
        $this->load->view('layout/error');
       // $this->load->view('layout/footer');
    }
}?>