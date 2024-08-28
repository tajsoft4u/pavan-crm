<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InterfaceController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }

    public function addproduct()
    {
        $this->Admin_Model->addproduct();
    }
    public function editproduct()
    {
        $this->Admin_Model->editproduct();
    }
    public function deleteproduct()
    {
        $this->Admin_Model->deleteproduct();
    }

    public function getServicerProviderDetails()
    {
        $pincode = $this->input->post('pincode');
        $result = $this->db->where('spincode', $pincode)->get('service_provider')->result();
        echo json_encode($result);
    }
    public function getEachServicerProviderDetails(){
        $id = $this->input->post('id');
        $result = $this->db->where('sid', $id)->get('service_provider')->row();
        echo json_encode($result);
    }
    
    public function ordersInlineEditing(){
        $this->Order_Model->ordersInlineEditing();
    }
}
