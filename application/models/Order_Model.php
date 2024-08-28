<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function generateRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public function getOrderByDate($fdate, $tdate, $colum, $limit, $start)
    {
        $this->db->limit($limit, $start);
        if ($colum == 'fromdate') {
            $data = $this->db->where('fromdate >=', $fdate)->where('fromdate <=', $tdate)->get('orders');
        } else {
            $data = $this->db->where('todate >=', $fdate)->where('todate <=', $tdate)->get('orders');
        }
        return $data;
    }
    
    public function getOrderByStatus($status, $limit, $start)
    {

        $this->db->limit($limit, $start);
        $data = $this->db->where('status', $status)->get('orders');


        return $data;
    }
    public function getOrderAll($limit, $start)
    {

        $this->db->limit($limit, $start);
        $data = $this->db->get('orders');


        return $data;
    }
    public function addNewOrder()
    {
        $serviceid = $this->generateRandomString(18);
        $data = array(
            'order_id' => $this->input->post('order_id'),
            'complainnum' => $this->input->post('complaint_number'),
            'camdate' => $this->input->post('camdate'),
            'installdate' => $this->input->post('installdate'),
            'otype' => $this->input->post('type'),
            'customername'   => $this->input->post('customer_name'),
            'contactone'   => $this->input->post('contact_number1'),
            'contacttwo' => $this->input->post('contact_number2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'pincode'  => $this->input->post('pincode'),
            'modle' => strtoupper($this->input->post('model')),
            'status' => $this->input->post('status'),
            'address' => $this->input->post('customer_address'),
            'serviceprovider' => strtolower($this->input->post('service_provider')),
            'sconatct1' => $this->input->post('service_contact_number1'),
            'scontact2' => $this->input->post('service_contact_number2'),
            'scity' => $this->input->post('service_city'),
            'sstate' => $this->input->post('service_state'),
            'spincode' => $this->input->post('service_pincode'),
            'amount' => $this->input->post('amount_paid'),
            'paidby' => $this->input->post('paid_by'),
            'rawtds' => $this->input->post('raw_tds'),
            'puretds' => $this->input->post('pure_tds'),
            'extraitem' => $this->input->post('extra_item'),
            'extraitemcost' => $this->input->post('extra_item_cost'),
            'feedback' => $this->input->post('feedback'),
            'problem' => $this->input->post('problem'),
            'promotionkit' => $this->input->post('promotion_kit_given'),
            'ordersource' => $this->input->post('order_source'),
            'firstservice' => $this->input->post('1st_service'),
            'secondservice' => $this->input->post('2nd_service'),
            'thirdservice' => $this->input->post('3rd_service'),
            'kitpurchasedue' => $this->input->post('kitpurchasedue'),
        );
        $this->db->insert('orders', $data);
        $this->session->set_flashdata('success', 'submited successfully!!!');
        redirect('addneworder');
    }
    public function uploadNewOrders()
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
            if (!empty($valid)) {
                try {
                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                } catch (Exception $e) {
                    die("Error loading file :" . $e->getMessage());
                }
            }
        }
        $data1 = array();
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            include("PHPExcel/IOFactory.php");
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $highestRow; $row++) {
                    //$slno= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $camdate = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $installdate = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $cno = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $modle = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $type = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $cname = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $orderno = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $contactno1 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $contact2 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $address1 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $city = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $states = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $pincode = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $cam = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($camdate));
                    $install = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($installdate));
                    if ($camdate != '' && $installdate != '') {
                        $data1[] = array(
                            'camdate' => $cam,
                            'installdate' => $install,
                            'complainnum' => $cno,
                            'modle' => strtoupper($modle),
                            'otype' => strtoupper($type),
                            'status' => strtoupper($status),
                            'customername'   => $cname,
                            'contactone'   => $contactno1,
                            'order_id' => $orderno,
                            'contacttwo' => $contact2,
                            'address' => $address,
                            'address2' => $address1,
                            'city' => $city,
                            'state' => $states,
                            'pincode'  => $pincode,
                        );
                    }
                }
            }
            

            $this->db->insert_batch('orders', $data1);
        }
        $this->session->set_flashdata('success', 'File Uploaded Successfully');
        redirect(base_url());
    }

    public function exportOrderDetails()
    {
        //print_r('sm');exit;
        $order_details = $this->input->post('orderselect');
        if ($order_details == null) {
            $this->session->set_flashdata('warning', 'no rows selection');
            redirect('home');
        }
        $this->load->library('excel');
        require_once './application/libraries/PHPExcel.php';
        require_once './application/libraries/PHPExcel/IOFactory.php';
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Aquatec Plus');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sl.No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'CAM DATE');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'INSTALL DATE');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'COMPLAINT NO');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'MODLE');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'TYPE');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'STATUS');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'CUSTOMER NAME');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'ORDER NO');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'CONTACT NO');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'CONTACT NO');
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'ADDRESS');
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'ADDRESS 1');
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'CITY');
        $objPHPExcel->getActiveSheet()->setCellValue('O1', 'STATE');
        $objPHPExcel->getActiveSheet()->setCellValue('P1', 'PINCODE');
        $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'JOB ALLOTED  SERVICE CENTER');
        $objPHPExcel->getActiveSheet()->setCellValue('R1', 'CONTACT');
        $objPHPExcel->getActiveSheet()->setCellValue('S1', 'CONTACT');
        $objPHPExcel->getActiveSheet()->setCellValue('T1', 'PAID');
        $objPHPExcel->getActiveSheet()->setCellValue('U1', 'AMOUNT PAID');
        $objPHPExcel->getActiveSheet()->setCellValue('V1', 'EXTRA ITEM');
        $objPHPExcel->getActiveSheet()->setCellValue('W1', 'FEEDBACK');
        $objPHPExcel->getActiveSheet()->setCellValue('X1', 'PROBLEM');
        $objPHPExcel->getActiveSheet()->setCellValue('Y1', '1st service');
        $objPHPExcel->getActiveSheet()->setCellValue('Z1', '2nd service ');
        $objPHPExcel->getActiveSheet()->setCellValue('AA1', '3rd serivce');
        $objPHPExcel->getActiveSheet()->setCellValue('AB1', 'kit purchase Due');
        $objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Promotion Kit');
        $rows = 3;
        $vdata = array();
        if ($this->input->post('orderselect')) {

            foreach ($order_details as $row) {
                if ($row == '') {
                    continue;
                }
                $getOrderData = $this->db->where('oid', $row)->get('orders')->row();
                array_push($vdata, $getOrderData);
            }
        }

        if ($vdata) {
            $index = 1;
            foreach ($vdata as $val) {
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $rows, $index);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $rows, date('d-m-Y', strtotime($val->camdate)));
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $rows, date('d-m-Y', strtotime($val->installdate)));
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $val->complainnum);
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $val->modle);
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $rows, $val->otype);
                $objPHPExcel->getActiveSheet()->setCellValue('G' . $rows, $val->status);
                $objPHPExcel->getActiveSheet()->setCellValue('H' . $rows, $val->customername);
                $objPHPExcel->getActiveSheet()->setCellValue('I' . $rows, $val->order_id);
                $objPHPExcel->getActiveSheet()->setCellValue('J' . $rows, $val->contactone);
                $objPHPExcel->getActiveSheet()->setCellValue('K' . $rows, $val->contacttwo);
                $objPHPExcel->getActiveSheet()->setCellValue('L' . $rows, $val->address);
                $objPHPExcel->getActiveSheet()->setCellValue('M' . $rows, $val->address2);
                $objPHPExcel->getActiveSheet()->setCellValue('N' . $rows, $val->city);
                $objPHPExcel->getActiveSheet()->setCellValue('O' . $rows, $val->state);
                $objPHPExcel->getActiveSheet()->setCellValue('P' . $rows, $val->pincode);
                $objPHPExcel->getActiveSheet()->setCellValue('Q' . $rows, $val->pincode);
                $objPHPExcel->getActiveSheet()->setCellValue('R' . $rows, $val->pincode);
                $objPHPExcel->getActiveSheet()->setCellValue('S' . $rows, $val->paidby);
                $objPHPExcel->getActiveSheet()->setCellValue('T' . $rows, $val->amount);
                $objPHPExcel->getActiveSheet()->setCellValue('U' . $rows, $val->rawtds);
                $objPHPExcel->getActiveSheet()->setCellValue('V' . $rows, $val->puretds);
                $objPHPExcel->getActiveSheet()->setCellValue('W' . $rows, $val->feedback);
                $objPHPExcel->getActiveSheet()->setCellValue('X' . $rows, $val->problem);
                $objPHPExcel->getActiveSheet()->setCellValue('Y' . $rows, $val->firstservice);
                $objPHPExcel->getActiveSheet()->setCellValue('Z' . $rows, $val->secondservice);
                $objPHPExcel->getActiveSheet()->setCellValue('AA1' . $rows, $val->thirdservice);
                $objPHPExcel->getActiveSheet()->setCellValue('AB1' . $rows, $val->kitpurchasedue);
                $objPHPExcel->getActiveSheet()->setCellValue('AC1' . $rows, $val->promotionkit);
                $rows++;
                $index = $index + 1;
            }
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=' . "Aquatec Plus.xls");
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
    public function deleteOrders()
    {
        if ($this->input->post('id')) {
            $order_details = $this->input->post('id');

            foreach ($order_details as $stud) {
                if ($stud == '') {
                    continue;
                }
                $getOrderData = $this->db->where('oid', $stud)->delete('orders');
            }
            echo 1;
            exit;
        } else {
            $this->db->delete('orders');
            echo 1;
            exit;
        }
    }

    public function editOrders()
    {
        $data = array(
            'order_id' => $this->input->post('order_id'),
            'complainnum' => $this->input->post('complaint_number'),
            'camdate' =>  date('Y-m-d H:i:s', strtotime($this->input->post('camdate'))),
            'installdate' =>  date('Y-m-d H:i:s', strtotime($this->input->post('installdate'))),
            'otype' => $this->input->post('type'),
            'customername'   => $this->input->post('customer_name'),
            'contactone'   => $this->input->post('contact_number1'),
            'contacttwo' => $this->input->post('contact_number2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'pincode'  => $this->input->post('pincode'),
            'address' => $this->input->post('customer_address'),
            'serviceprovider' => strtolower($this->input->post('service_provider')),
            'sconatct1' => $this->input->post('service_contact_number1'),
            'scontact2' => $this->input->post('service_contact_number2'),
            'scity' => $this->input->post('service_city'),
            'sstate' => $this->input->post('service_state'),
            'spincode' => $this->input->post('service_pincode'),
            'saddress' => $this->input->post('service_provider_address'),
            'amount' => $this->input->post('amount_paid'),
            'paidby' => $this->input->post('paid_by'),
            'rawtds' => $this->input->post('raw_tds'),
            'puretds' => $this->input->post('pure_tds'),
            'extraitem' => $this->input->post('extra_item'),
            'extraitemcost' => $this->input->post('extra_item_cost'),
            'feedback' => $this->input->post('feedback'),
            'problem' => $this->input->post('problem'),
            'promotionkit' => $this->input->post('promotion_kit_given'),
            'ordersource' => $this->input->post('order_source'),
            'firstservice' => $this->input->post('fst_service'),
            'secondservice' => $this->input->post('snd_service'),
            'thirdservice' => $this->input->post('trd_service'),
            'kitpurchasedue' => $this->input->post('kitpurchasedue'),
            'modle' => strtolower($this->input->post('model')),
            'status' => $this->input->post('status'),
        );

        $rid = $this->input->post('orderid');
        $this->db->where('oid', $rid);
        $this->db->update('orders', $data);
        $this->session->set_flashdata('success', 'updated successfully!!!');
        redirect(base_url());
    }


    public function ordersInlineEditing()
    {
        if (($_POST['action'] == 'edit') && !empty($_POST['id'])) {
            $data = array(
                'camdate' =>  $this->input->post('camdate'),
                'installdate' =>  $this->input->post('installdate'),
                'complainnum' => $this->input->post('complainnum'),
                'modle' => strtoupper($this->input->post('modle')),
                'otype' => $this->input->post('otype'),
                'status' => $this->input->post('status'),
                'customername'   => $this->input->post('customername'),
                'contactone'   => $this->input->post('contactone'),
                'contacttwo' => $this->input->post('contact_number2'),
                'order_id' => $this->input->post('order_id'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode'  => $this->input->post('pincode'),
                'address' => $this->input->post('address'),
                'address2' => $this->input->post('address2'),
                'serviceprovider' => $this->input->post('serviceprovider'),
                'sconatct1' => $this->input->post('sconatct1'),
                'scontact2' => $this->input->post('scontact2'),
                'paidby' => $this->input->post('paidby'),
                'amount' => $this->input->post('amount'),
                'rawtds' => $this->input->post('rawtds'),
                'puretds' => $this->input->post('puretds'),
                'extraitem' => $this->input->post('extraitem'),
                'feedback' => $this->input->post('feedback'),
                'problem' => $this->input->post('problem'),
                'firstservice' => $this->input->post('firstservice'),
                'secondservice' => $this->input->post('secondservice'),
                'thirdservice' => $this->input->post('thirdservice'),
                'kitpurchasedue' => $this->input->post('kitpurchasedue'),
                'promotionkit' => $this->input->post('promotionkit'),
                'ordersource' => $this->input->post('ordersource'),
                'scity' => $this->input->post('scity'),
                'sstate' => $this->input->post('sstate'),
                'spincode' => $this->input->post('spincode'),
                'saddress' => $this->input->post('saddress'),

            );
            $this->db->where('oid', $_POST['id']);
            $update = $this->db->update('orders', $data);
            if ($update) {
                $response = array(
                    'status' => 1,
                    'msg' => 'Member data has been updated successfully.',
                    'data' => $data
                );
            } else {
                $response = array(
                    'status' => 0,
                    'msg' => 'Something went wrong!'
                );
            }
            echo json_encode($response);
        }
    }
}
