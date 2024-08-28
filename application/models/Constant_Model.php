<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Constant_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getCurrencyValue($number)
    {
        setlocale(LC_MONETARY, "en_US");
        $amount = number_format($number, 2);
        return $amount;
    }

    public function getimagesize($image, $mode)
    {
        list($width, $height, $type, $attr) = getimagesize($image);
        if ($mode == 'width') {
            return $width;
        } else if ($mode == 'height') {
            return $height;
        } else {
            return $width + '' + $height;
        }
    }
    public function getStatusText($status)
    {
        if ($status == 0) {
            return 'Offline';
        } else if ($status == 1) {
            return 'Working';
        } else {
            return 'No Internet';
        }
    }
    public function getStatusColors($color)
    {
        switch ($color) {
            case 'COMPLETED':
                return "<i class='fa fa-circle' style='color:#2DCE98'></i>";
            case 'PENDING':
                return "<i class='fa fa-circle' style='color:#F53C56'></i>";
            case 'ON SCHEDULE':
                return "<i class='fa fa-circle' style='color:#11CDEF'></i>";
            case 'NEW':
                return "<i class='fa fa-circle text-primary'></i>";
            case 'DELAYED':
                return "<i class='fa fa-circle' style='color:#FB6340'></i>";
            default:
                return null;
        }
    }

    public function sendResponse($status = 404, $message = 'Internal server error', $result = NULL)
    {
        $phpSapiName = substr(php_sapi_name(), 0, 3);
        if ($phpSapiName == 'cgi' || $phpSapiName == 'fpm') {
            header('Status: ' . $status . ' ' . $message);
        } else {
            $protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
            header($protocol . ' ' . $status . ' ' . $message);
        }
        if ($result)
            if (is_object($result) || is_array($result))
                echo json_encode($result);
            else
                echo $result;
    }

    public function getProductName($name)
    {

        $product = $this->Fetch_Model->fetchQueryWithCondition('products', 'prd_name', 'name')->row();
        if ($name) {
            return $product->prd_name;
        } else {
            return '';
        }
    }
}
