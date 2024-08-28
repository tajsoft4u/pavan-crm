<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function editProviders()
    {

        $servicedata = array(
            'sname'     => $this->input->post('service_provider_name'),
            'contact1'  => $this->input->post('contact_number1'),
            'contact2'  => $this->input->post('contact_number2'),
            'contact3'  => $this->input->post('contact_number3'),
            'staluk'    => $this->input->post('city'),
            'sdistrict' => $this->input->post('district'),
            'sstate'    => $this->input->post('state'),
            'spincode'  => $this->input->post('pincode'),
            'pincodeserved' => $this->input->post('extra_item'),
            'gstin'         => $this->input->post('gstin'),
            'centername'    => $this->input->post('service_center_name'),
            'details'       => $this->input->post('service_center_details'),
        );
        $this->db->where('sid', $this->input->post('sid'));
        $this->db->update('service_provider', $servicedata);
        $this->session->set_flashdata('success', 'updated successfully!!!');
        redirect('particularserviceprovider/' . $this->input->post('sid'));
    }
    public function insertProviders()
    {
        $servicedata = array(
            'sname'     => $this->input->post('service_provider_name'),
            'contact1'  => $this->input->post('contact_number1'),
            'contact2'  => $this->input->post('contact_number2'),
            'contact3'  => $this->input->post('contact_number3'),
            'staluk'    => $this->input->post('city'),
            'sdistrict' => $this->input->post('district'),
            'sstate'    => $this->input->post('state'),
            'spincode'  => $this->input->post('pincode'),
            'pincodeserved' => $this->input->post('extra_item'),
            'gstin'         => $this->input->post('gstin'),
            'centername'    => $this->input->post('service_center_name'),
            'details'       => $this->input->post('service_center_details'),
        );
        $this->db->insert('service_provider', $servicedata);
        $this->session->set_flashdata('success', 'inserted successfully!!!');
        redirect('serviceproviders');
    }

    public function importServiceProvider()
    {
        $this->load->library('excel');
        require_once './application/libraries/PHPExcel.php';
        require_once './application/libraries/PHPExcel/IOFactory.php';
        $file = $_FILES["file"]["tmp_name"];
        if (!empty($file)) {
            $valid = false;
            $types = array('Excel2007', 'Excel5');

            foreach ($types as $type) {
                $reader = PHPExcel_IOFactory::createReader($type);
                if ($reader->canRead($file)) {
                    $valid = true;
                }
            }
            if ($valid) {
                try {
                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                } catch (Exception $e) {
                    die("Error loading file :" . $e->getMessage());
                }
            }
        }
        // print_r($file);exit;
        $data1 = array();
        if (isset($_FILES["file"]["name"])) {
            //print_r($_FILES["file"]["tmp_name"]);exit;
            $path = $_FILES["file"]["tmp_name"];
            include("PHPExcel/IOFactory.php");
            $object = PHPExcel_IOFactory::load($path);
            // $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $state = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $taluk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $district = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $pincode = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $servicecenter = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $contact1 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $data1[] = array(
                        'contact1'    => $contact1,
                        'staluk'    => $taluk,
                        'sstate'    => $state,
                        'sdistrict' => $district,
                        'spincode'    => $pincode,
                        'centername'    => $servicecenter,
                        'created_date' => date('Y-m-d H:i:s'),
                    );
                }
            }
            //	print_r($data1);exit;
            $this->db->insert_batch('service_provider', $data1);
        }
        $this->session->set_flashdata('success', 'File Uploaded Successfully');
        redirect('serviceproviders');
    }
}
