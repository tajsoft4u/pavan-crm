<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }

    public function addNewOrder()
    {
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $this->load->view('layout/admin/header');
        $this->load->view('orders/add_new_order', $data);
        $this->load->view('layout/admin/footer');
    }

    public function allOrders()
    {
        $data['orders'] = $this->db->get('orders');
        $this->load->view('layout/admin/header');
        $this->load->view('orders/all_orders', $data);
        $this->load->view('layout/admin/footer');
    }
    public function pendingOrders()
    {
        $data['orders'] = $this->db->where('status', 'pending')->get('orders');
        $this->load->view('layout/admin/header');
        $this->load->view('orders/pending_orders', $data);
        $this->load->view('layout/admin/footer');
    }
    public function completedOrders()
    {
        $data['orders'] = $this->db->get('orders');
        $data['services'] = $this->Fetch_Model->fetchQuery('service_provider');
        $this->load->view('layout/admin/header');
        $this->load->view('orders/completed_orders', $data);
        $this->load->view('layout/admin/footer');
    }
    public function editOrder($id)
    {
        $this->load->view('layout/admin/header');
        $data['order'] = $this->Fetch_Model->fetchQueryById('orders', 'oid', $id)->row();
        $data['service'] = $this->Fetch_Model->fetchQueryById('service_provider', 'sid', $data['order']->serviceprovider);
        $data['product'] = $this->Fetch_Model->fetchQueryOrder('products', 'desc');
        $this->load->view('orders/edit_orders', $data);
        $this->load->view('layout/admin/footer');
    }

    public function insertNewOrders()
    {
        $this->Order_Model->addNewOrder();
    }
    public function bulkNewOrders()
    {
        $this->Order_Model->uploadNewOrders();
    }

    public function exportOrders()
    {
        $this->Order_Model->exportOrderDetails();
    }
    public function deleteOrders()
    {
        $this->Order_Model->deleteOrders();
    }
    public function updateOrders()
    {
        $this->Order_Model->editOrders();
    }
}
