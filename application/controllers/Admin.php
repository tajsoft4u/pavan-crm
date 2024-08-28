<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index($id = '')
    {
        if (!$this->session->userdata('admin_username'))
            redirect('login');
        $this->load->view('layout/admin/header');

        $status =       $this->input->get('status');
        $product =      $this->input->get('product');
        $camfrom =      $this->input->get('camfrom');
        $camto =        $this->input->get('camto');
        $installfrom =  $this->input->get('installfrom');
        $installto =    $this->input->get('installto');
        $name =         strtolower($this->input->get('name'));
        $config = array();
        $config["base_url"] = base_url('home');
        $config["total_rows"] = $this->Fetch_Model->ordersCount('orders', $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['anchor_class'] = 'class="page-link"';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = true;
        $config["per_page"] = 30;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $data['orders'] = $this->Fetch_Model->ordersData('orders', $config["per_page"], $page, $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $this->load->view('layout/admin/home', $data);
        $this->load->view('layout/admin/footer');
    }
    public function dashboard()
    {
        if (!$this->session->userdata('admin_username'))
            redirect('login');
        $this->load->view('layout/admin/header');

        $status =       $this->input->get('status');
        $product =      $this->input->get('product');
        $camfrom =      $this->input->get('camfrom');
        $camto =        $this->input->get('camto');
        $installfrom =  $this->input->get('installfrom');
        $installto =    $this->input->get('installto');
        $name =         strtolower($this->input->get('name'));

        $config = array();
        $config["base_url"] = base_url('home');
        $config["total_rows"] = $this->Fetch_Model->ordersCount('orders', $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['anchor_class'] = 'class="page-link"';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = true;
        $config["per_page"] = 30;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $data['orders'] = $this->Fetch_Model->ordersData('orders', $config["per_page"], $page, $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $this->load->view('layout/admin/home', $data);
        $this->load->view('layout/admin/footer');
    }


    public function products()
    {
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $this->load->view('layout/admin/header');
        $this->load->view('products/products', $data);
        $this->load->view('layout/admin/footer');
    }


    public function completedOrders()
    {
        if (!$this->session->userdata('admin_username'))
            redirect('login');
        $this->load->view('layout/admin/header');
        $status =       $this->input->get('status');
        $product =      $this->input->get('product');
        $camfrom =      $this->input->get('camfrom');
        $camto =        $this->input->get('camto');
        $installfrom =  $this->input->get('installfrom');
        $installto =    $this->input->get('installto');
        $name =         strtolower($this->input->get('name'));
        $config = array();
        $config["base_url"] = base_url('home');
        $config["total_rows"] = $this->Fetch_Model->ordersWithStatusCount('orders', 'COMPLETED', $product, $camfrom, $camto, $installfrom, $installto, $name);
        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['anchor_class'] = 'class="page-link"';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = true;
        $config["per_page"] = 30;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $data['orders'] = $this->Fetch_Model->ordersWithStatusData('orders', $config["per_page"], $page, $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $this->load->view('orders/completed_orders', $data);
        $this->load->view('layout/admin/footer');
    }

    public function pendingOrders()
    {
        if (!$this->session->userdata('admin_username'))
            redirect('login');
        $this->load->view('layout/admin/header');
        $status =       $this->input->get('status');
        $product =      $this->input->get('product');
        $camfrom =      $this->input->get('camfrom');
        $camto =        $this->input->get('camto');
        $installfrom =  $this->input->get('installfrom');
        $installto =    $this->input->get('installto');
        $name =         strtolower($this->input->get('name'));
        $config = array();
        $config["base_url"] = base_url('home');
        $config["total_rows"] = $this->Fetch_Model->ordersWithStatusCount('orders', 'PENDING', $product, $camfrom, $camto, $installfrom, $installto, $name);
        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['anchor_class'] = 'class="page-link"';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = true;
        $config["per_page"] = 30;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $data['orders'] = $this->Fetch_Model->ordersWithStatusData('orders', $config["per_page"], $page, 'PENDING', $product, $camfrom, $camto, $installfrom, $installto, $name);
        $this->load->view('orders/pending_orders', $data);
        $this->load->view('layout/admin/footer');
    }

    public function allOrders()
    {
        if (!$this->session->userdata('admin_username'))
            redirect('login');
        $this->load->view('layout/admin/header');
        $status     =   $this->input->get('status');
        $product    =   $this->input->get('product');
        $camfrom    =   $this->input->get('camfrom');
        $camto      =   $this->input->get('camto');
        $installfrom =  $this->input->get('installfrom');
        $installto  =   $this->input->get('installto');
        $name       =   strtolower($this->input->get('name'));
        $config = array();
        $config["base_url"] = base_url('home');
        $config["total_rows"] = $this->Fetch_Model->ordersCount('orders', $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $config['full_tag_open'] = "<ul class='pagination pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['anchor_class'] = 'class="page-link"';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = true;
        $config["per_page"] = 30;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $data['orders'] = $this->Fetch_Model->ordersData('orders', $config["per_page"], $page, $status, $product, $camfrom, $camto, $installfrom, $installto, $name);
        $this->load->view('orders/all_orders', $data);
        $this->load->view('layout/admin/footer');
    }
}
