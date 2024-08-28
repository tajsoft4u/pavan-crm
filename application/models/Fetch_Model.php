<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Fetch_Model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function fetchQuery($table)
  {
    return $this->db->order_by('created_date', 'DESC')->get($table);
  }

  public function fetchQueryOrder($table, $order)
  {
    return $this->db->order_by('created_date', $order)->get($table);
  }

  public function checkIsExist($table, $column, $value)
  {
    return $this->db->where($column, $value)->get($table);
  }


  public function fetchQueryWithCondition($table, $column, $status)
  {
    return $this->db->where($column, $status)->order_by('created_date', 'DESC')->get($table);
  }
  public function fetchQueryWithCreadtedByCondition($table, $column, $status)
  {
    $createdBy = $this->session->userdata('admin_id');
    $isAdmin = $this->session->userdata('admin_member_role');
    if ($isAdmin == 1) {
      return $this->db->where($column, $status)->order_by('created_date', 'DESC')->get($table);
    } else {
      return $this->db->where($column, $status)->where('created_by', $createdBy)->order_by('created_date', 'DESC')->get($table);
    }
  }
  public function fetchFeatureImages($id)
  {
    print_r("inside here");
    exit;
    return $this->db->where('fProdId', $id)->order_by('created_date', 'DESC')->get('featureimages');
  }

  public function fetchQueryByLimit($table, $limit)
  {
    $this->db->order_by('pId', 'RANDOM');
    $this->db->limit($limit);
    return $this->db->get($table);
  }

  public function fetchQueryWithJoinCondition($table, $column, $status)
  {
    return $this->db->distinct()->select('feedback.fserverName,s.serverName,s.serverId')->join('server as s', 's.serverId=feedback.fserverName')->where($column, $status)->order_by('feedback.created_date', 'DESC')->get($table);
  }
  public function fetchQueryById($table, $column, $id)
  {
    return $this->db->where($column, $id)->get($table);
  }


  public function tablesLimit($table, $limit, $start)
  {
    $this->db->limit($limit, $start);
    return $this->db->get($table);
  }

  public function tablesjoinLimit($table, $limit, $start)
  {
    $this->db->limit($limit, $start);
    return $this->db->get($table);
  }
  public function tablesjoinLimitWithCondtion($table, $table2, $condition, $limit, $start)
  {
    $createdBy = $this->session->userdata('admin_id');
    $isAdmin = $this->session->userdata('admin_member_role');
    if ($isAdmin == 1) {
      $this->db->limit($limit, $start);
      $this->db->join($table2, $condition, 'left');
      $this->db->where('isAdmin', 0);
      return $this->db->get($table);
    } else {
      $this->db->limit($limit, $start);
      $this->db->join($table2, $condition, 'left');
      $this->db->where('isAdmin', 0);
      $this->db->where('createdBy', $createdBy);
      return $this->db->get($table);
    }
  }

  public function productDetails($limit, $start)
  {
    $createdBy = $this->session->userdata('admin_id');
    $isAdmin = $this->session->userdata('admin_member_role');
    if ($isAdmin == 1) {
      // $this->db->join($table2, $condition, 'left');
      $this->db->limit($limit, $start);
      $this->db->join('vendors', 'vendors.vId=products.pVendorId', 'left');
      $this->db->join('categories', 'categories.cId=products.pCategoryId', 'left');
      // $this->db-join('vendors','vendors.vId=products.pVendorId')
      return $this->db->get('products');
    } else {
      // $this->db->join($table2, $condition, 'left');
      $this->db->limit($limit, $start);
      $this->db->join('vendors', 'vendors.vId=products.pVendorId', 'left');
      $this->db->join('categories', 'categories.cId=products.pCategoryId', 'left');
      $this->db->where('createdBy', $createdBy);
      return $this->db->get('products');
    }
  }

  public function fetchProductById($id)
  {
    $this->db->where('pId', $id);
    $this->db->join('vendors', 'vendors.vId=products.pVendorId', 'left');
    return $this->db->get('products');
  }

  public function getMembersCounts()
  {
    $value = $this->input->get('resturant');
    if ($value) {
      return $this->db->where('resturant', $value)->count_all_results('members');
    } else {
      return $this->db->count_all_results('members');
    }
  }
  public function membersLimit($limit, $start)
  {
    $value = $this->input->get('resturant');
    $this->db->limit($limit, $start);
    if ($value) {
      return $this->db->where('resturant', $value)->join('resturant', 'resturant.rId=members.resturant')->get('members');
    } else {
      return $this->db->join('resturant', 'resturant.rId=members.resturant')->get('members');
    }
  }

  public function tablesCounts($table)
  {
    return $this->db->count_all_results($table);
  }
  public function ordersCount($table, $status, $product, $camfrom, $camto, $installfrom, $installto, $name)
  {
    if ($status != '') {
      return  $this->db->where('status', $status)->get('orders')->num_rows();
    } else if ($product) {
      return  $this->db->like('modle', $product)->get('orders')->num_rows();
    } else if ($name) {
      return  $this->db->like('serviceprovider', $name)->get('orders')->num_rows();
    } else if ($camfrom && $camto) {
      return  $this->db->where('camdate >=', $camfrom)->where('camdate <=', $camto)->get('orders')->num_rows();
    } else if ($installfrom && $installto) {
      return $this->db->where('installdate >=', $installfrom)->where('installdate <=', $installto)->get('orders')->num_rows();
    } else {
      return $this->db->count_all_results($table);
    }
  }
  public function ordersData($table, $limit, $start, $status, $product, $camfrom, $camto, $installfrom, $installto, $name)
  {
    $this->db->limit($limit, $start);
    if ($status != '') {
      return  $this->db->where('status', $status)->get('orders');
    } else if ($product) {
      return  $this->db->like('modle', $product)->get('orders');
    } else if ($name) {
      return  $this->db->like('serviceprovider', $name)->get('orders');
    } else if ($camfrom && $camto) {
      return  $this->db->where('camdate >=', $camfrom)->where('camdate <=', $camto)->get('orders');
    } else if ($installfrom && $installto) {
      return $this->db->where('installdate >=', $installfrom)->where('installdate <=', $installto)->get('orders');
    } else {
      return  $this->db->get('orders');
    }
  }
  public function ordersWithStatusCount($table, $status, $product, $camfrom, $camto, $installfrom, $installto, $name){
    if ($status != '') {
      return  $this->db->where('status', $status)->get('orders')->num_rows();
    } else if ($product) {
      return  $this->db->like('modle', $product)->get('orders')->num_rows();
    } else if ($name) {
      return  $this->db->like('serviceprovider', $name)->get('orders')->num_rows();
    } else if ($camfrom && $camto) {
      return  $this->db->where('camdate >=', $camfrom)->where('camdate <=', $camto)->get('orders')->num_rows();
    } else if ($installfrom && $installto) {
      return $this->db->where('installdate >=', $installfrom)->where('installdate <=', $installto)->get('orders')->num_rows();
    } else {
      return $this->db->count_all_results($table);
    }
  }
  public function ordersWithStatusData($table, $limit, $start, $status, $product, $camfrom, $camto, $installfrom, $installto, $name)
  {
    $this->db->limit($limit, $start);
    if ($status != '') {
      return  $this->db->where('status', $status)->get($table);
    } else if ($product) {
      return  $this->db->like('modle', $product)->get($table);
    } else if ($name) {
      return  $this->db->like('serviceprovider', $name)->get($table);
    } else if ($camfrom && $camto) {
      return  $this->db->where('camdate >=', $camfrom)->where('camdate <=', $camto)->get($table);
    } else if ($installfrom && $installto) {
      return $this->db->where('installdate >=', $installfrom)->where('installdate <=', $installto)->get($table);
    } else {
      return  $this->db->get('orders');
    }
  }

  public function get_count($table)
  {
    return $this->db->count_all($table);
  }

  public function fetchSubCategories()
  {
    $this->db->from('categories as subcat');
    $this->db->select('subcat.cName as cName,subcat.cId as cId,subcat.cParentId as cParentId,cat.cName as catName, cat.cId as catId,cat.cParentId as catParent');
    $this->db->join('categories as cat', 'cat.cId=subcat.cParentId', 'left');
    return $this->db->where('subcat.cParentId > ', 0)->get()->result();
  }

  public function fetchBokingsTableLimit($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->join('users', 'users.uId=bookings.bUserId', 'left');
    $this->db->join('vendors', 'vendors.vId=bVendorId', 'left');
    $this->db->join('products', 'products.pId=bookings.bProductId', 'left');
    return $this->db->get('bookings');
  }

  public function fetchBookingDetail($id)
  {
    $result = $this->db->join('products', 'products.pId=bookings.bProductId')->where('bId', $id)->get('bookings')->row();
    return  $result;
  }




  public function deleteImage($id, $table, $column)
  {
    $data = $this->db->where($column, $id)->get($table)->row();
    $path = $data->fImage;
    if ($path != '') {
      $imagePath = str_replace(HOME_PATH, "./", $path);
      if (@unlink($imagePath)) {
        return  $this->db->where($column, $id)->delete($table);
      }
    } else {
      return $this->db->where($column, $id)->delete($table);
    }
  }
}
