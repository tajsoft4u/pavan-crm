<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }

    public function index()
    {
        $data['banners'] = $this->Fetch_Model->fetchQuery('banners');
        $data['logos'] = $this->Fetch_Model->fetchQuery('clientsLogo');
        $this->load->view('layout/web/header');
        $this->load->view('layout/web/home',$data);
        $this->load->view('layout/web/footer',$data);
    }
    public function aboutUs()
    {
        $data['logos'] = $this->Fetch_Model->fetchQuery('clientsLogo');
        $this->load->view('layout/web/header');
        $this->load->view('layout/web/about');
        $this->load->view('layout/web/footer',$data);
    }
    public function marketingStrategies()
    {
        $data['logos'] = $this->Fetch_Model->fetchQuery('clientsLogo');
        $this->load->view('layout/web/header');
        $this->load->view('layout/web/marketing_strategies');
        $this->load->view('layout/web/footer',$data);
    }
    public function contactUs()
    {
        $data['logos'] = $this->Fetch_Model->fetchQuery('clientsLogo');
        $this->load->view('layout/web/header');
        $this->load->view('layout/web/contact_us');
        $this->load->view('layout/web/footer',$data);
    }
    public function whyUs()
    {
        $data['logos'] = $this->Fetch_Model->fetchQuery('clientsLogo');
        $this->load->view('layout/web/header');
        $this->load->view('layout/web/why_us');
        $this->load->view('layout/web/footer',$data);
    }
}
