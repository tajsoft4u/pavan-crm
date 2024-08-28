<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServiceProvider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }
    public function serviceProviders()
    {
        $this->load->view('layout/admin/header');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $this->load->view('serviceprovider/service_providers', $data);
        $this->load->view('layout/admin/footer');
    }
    public function editServiceProviders($id)
    {
        $this->load->view('layout/admin/header');
        $data['service'] = $this->Fetch_Model->fetchQuery('service_provider')->row();
        $this->load->view('serviceprovider/edit_service_provider', $data);
        $this->load->view('layout/admin/footer');
    }
    public function updateServiceProviders()
    {
        $this->Service_Model->editProviders();
    }
    public function addServiceProviders()
    {
        $this->load->view('layout/admin/header');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $this->load->view('serviceprovider/add_provider', $data);
        $this->load->view('layout/admin/footer');
    }
    public function particularserviceprovider($id)
    {
        $this->load->view('layout/admin/header');
        $data['service'] = $this->Fetch_Model->checkIsExist('service_provider', 'sid', $id)->row();
        $data['pending'] = $this->db->where('serviceprovider', $id)->where('status', "pending")->get('orders')->num_rows();
        $data['completed'] = $this->db->where('serviceprovider', $id)->where('status', "completed")->get('orders')->num_rows();
        $this->load->view('serviceprovider/single_service_provider', $data);
        $this->load->view('layout/admin/footer');
    }
    public function insertServiceProviders()
    {
        $this->Service_Model->insertProviders();
    }
    public function importServiceProvider()
    {
        $this->Service_Model->importServiceProvider();
    }
}
