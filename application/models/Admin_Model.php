<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function addBanners($value = '')
    {
        $data = array(
            'bimage' => "image.jpg",
            'bDescription' => $this->input->post('bDescription'),
            'bTitle' => $this->input->post('btitle'),
        );
        if (!empty($_FILES['photo']['name'])) {
            $result = $this->db->insert('banners', $data);
            $id = $this->db->insert_id();
            $path = $_FILES['photo']['name'];
            $newName = $id . "." . pathinfo($path, PATHINFO_EXTENSION);
            $config['overwrite'] = TRUE;
            $config['upload_path'] = './uploads/banners';
            $config['allowed_types'] = "*";
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('photo')) {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->session->set_flashdata('error', 'Something went wrong. Please upload gif | jpg | png file');
            } else {
                $data = $this->upload->data();
                $filename = HOME_PATH . '/uploads/banners/' . $data['file_name'];
            }
            $updateImage = array(
                'bImage' => $filename
            );
            $this->db->set($updateImage)->where('bId', $id)->update('banners');
            $this->session->set_flashdata('success', 'added successfully!!!');
            redirect('banners');
        }
    }
    public function editBanners($value = '')
    {

        $id = $this->input->post('ebId');
        if (!empty($_FILES['ephoto']['name'])) {
            $path = $_FILES['ephoto']['name'];
            $result = $this->db->where('bId', $this->input->post('ebId'))->get('banners')->row();
            $oldImagePath = $result->bImage;
            // print_r($path);exit;
            $imagePath = str_replace(HOME_PATH, "./", $oldImagePath);
            // print_r($imagePath);exit;
            if ($imagePath) {
                @unlink($imagePath);
            }
            $newName = $id . "." . pathinfo($path, PATHINFO_EXTENSION);
            $config['overwrite'] = TRUE;
            $config['upload_path'] = './uploads/banners';
            $config['allowed_types'] = "*";
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('ephoto')) {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->session->set_flashdata('error', 'Something went wrong. Please upload gif | jpg | png file');
            } else {
                $data = $this->upload->data();
                $filename = HOME_PATH . '/uploads/banners/' . $data['file_name'];
            }
        } else {
            $filename = $this->input->post('old_photo');
        }
        $data = array(
            'bTitle' => $this->input->post('btitle'),
            'bDescription' => $this->input->post('bDescription'),
            'bImage' => $filename,
        );
        $this->db->set($data)->where('bId', $id)->update('banners');
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        redirect('banners');
    }
    public function deleteBanners()
    {
        $result = $this->db->where('bId', $this->input->post('dbId'))->get('banners')->row();
        $path = $result->bImage;
        // print_r($path);exit;
        $imagePath = str_replace(HOME_PATH, "./", $path);
        if (@unlink($imagePath)) {
            $this->db->where('bId', $this->input->post('dbId'));
            $this->db->delete('banners');
        };
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        redirect('banners');
    }


    public function addMembers()
    {
        $data = array(
            'rname' => $this->input->post('rname'),
            'cname' => $this->input->post('cname'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'dob'   => $this->input->post('dob'),
            'resturant'   => $this->input->post('resturant'),
            'pdate' => $this->input->post('pdate'),
            'card_no' => $this->input->post('card_no'),
            'address' => $this->input->post('address'),
            'created_date'  => date('Y-m-d H:i:s'),
        );
        // print_r($data);exit;
        $this->db->insert('members', $data);
        $this->session->set_flashdata('success', 'submited successfully!!!');
        $page = $this->input->get('page');
        if ($page == 'admin') {
            redirect('memberslist');
        } else {
            redirect('members');
        }
    }
    public function editMembers()
    {
        $data = array(
            'rname' => $this->input->post('ername'),
            'cname' => $this->input->post('ecname'),
            'phone' => $this->input->post('ephone'),
            'email' => $this->input->post('eemail'),
            'dob'   => $this->input->post('edob'),
            'resturant'   => $this->input->post('eresturant'),
            'pdate' => $this->input->post('epdate'),
            'card_no' => $this->input->post('ecard_no'),
            'address' => $this->input->post('eaddress'),
        );

        // $this->db->insert('members', $data);
        $this->db->set($data)->where('mId', $this->input->post('editId'))->update('members');
        $this->session->set_flashdata('success', 'submited successfully!!!');
        $page = $this->input->get('page');
        if ($page == 'admin') {
            redirect('memberslist');
        } else {
            redirect('members');
        }
    }
    public function deleteMembers()
    {
        $this->db->where('mId', $this->input->post('deleteId'));
        $this->db->delete('members');
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        $page = $this->input->get('page');
        if ($page == 'admin') {
            redirect('memberslist');
        } else {
            redirect('members');
        }
    }


    public function addClientsLogo($value = '')
    {
        $data = array(
            'logo' => "image.jpg",
            'logo_title' => $this->input->post('logo_title'),
            'created_date' => date('Y-m-d H:i:s'),
        );
        $filename = "";
        if (!empty($_FILES['photo']['name'])) {
            $result = $this->db->insert('clientsLogo', $data);
            $id = $this->db->insert_id();
            $path = $_FILES['photo']['name'];
            $newName = $id . "." . pathinfo($path, PATHINFO_EXTENSION);
            $config['overwrite'] = TRUE;
            $config['upload_path'] = './uploads/logos';
            $config['allowed_types'] = "*";
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('photo')) {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->session->set_flashdata('error', 'Something went wrong. Please upload gif | jpg | png file');
            } else {
                $data = $this->upload->data();
                $filename = HOME_PATH . '/uploads/logos/' . $data['file_name'];
            }

            $updateImage = array(
                'logo' => $filename
            );

            $this->db->set($updateImage)->where('logoId', $id)->update('clientsLogo');
            $this->session->set_flashdata('success', 'added successfully!!!');
            redirect('clients-logo');
        }
    }
    public function editClientsLogo($value = '')
    {

        $id = $this->input->post('ebId');
        $filename = "";
        if (!empty($_FILES['ephoto']['name'])) {
            $path = $_FILES['ephoto']['name'];
            $result = $this->db->where('logoId', $this->input->post('ebId'))->get('clientsLogo')->row();
            $oldImagePath = $result->logo;
            // print_r($path);exit;
            $imagePath = str_replace(HOME_PATH, "./", $oldImagePath);
            // print_r($imagePath);exit;
            if ($imagePath) {
                @unlink($imagePath);
            }
            $newName = $id . "." . pathinfo($path, PATHINFO_EXTENSION);
            $config['overwrite'] = TRUE;
            $config['upload_path'] = './uploads/logos';
            $config['allowed_types'] = "*";
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('ephoto')) {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->session->set_flashdata('error', 'Something went wrong. Please upload gif | jpg | png file');
            } else {
                $data = $this->upload->data();
                $filename = HOME_PATH . '/uploads/logos/' . $data['file_name'];
            }
        } else {
            $filename = $this->input->post('old_photo');
        }
        $data = array(
            'logo' => $filename,
            'logo_title' => $this->input->post('elogo_title'),
        );
        $this->db->set($data)->where('logoId', $id)->update('clientsLogo');
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        redirect('edit-clients-logo/' . $id);
    }
    public function deleteClientsLogo()
    {
        $result = $this->db->where('logoId', $this->input->post('dlogoId'))->get('clientsLogo')->row();
        $path = $result->logo;
        $imagePath = str_replace(HOME_PATH, "./", $path);
        if (@unlink($imagePath)) {
            $this->db->where('logoId', $this->input->post('dlogoId'));
            $this->db->delete('clientsLogo');
        } else {
            $this->db->where('logoId', $this->input->post('dlogoId'));
            $this->db->delete('clientsLogo');
        };
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        redirect('clients-logo');
    }


    public function addResturants()
    {
        $data = array(
            'rest_name' => $this->input->post('name'),
            'created_date'  => date('Y-m-d H:i:s'),
        );
        $result = $this->db->insert('resturant', $data);
        $this->session->set_flashdata('success', 'added successfully!!!');
        redirect('resturants');
    }
    public function editResturants()
    {
        $id = $this->input->post('editId');
        $data = array(
            'rest_name' => $this->input->post('ename'),
        );
        $result = $this->db->set($data)->where('rId', $id)->update('resturant');
        $this->session->set_flashdata('success', 'added successfully!!!');
        redirect('resturants');
    }
    public function deleteResturants()
    {
        $this->db->where('rId', $this->input->post('deleteId'));
        $this->db->delete('resturant');
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        redirect('resturants');
    }

    public function deleteFeedBack()
    {
        $this->db->where('cid', $this->input->post('deleteId'));
        $this->db->delete('contacts');
        $this->session->set_flashdata('success', 'deleted successfully!!!');
        redirect('contactslists');
    }


    public function addproduct()
    {
        $data = array(
            'prd_name' => strtoupper($this->input->post('prod_name')),
            'created_date' => date('Y-m-d H:i:s'),
        );
        $insert = $this->db->insert('products', $data);
        $this->session->set_flashdata('success', 'added product successfully!!!');
        redirect('products');
    }
    public function editproduct()
    {
        $id = $this->input->post('eprd_id');
        $data = array(
            'prd_name' => strtoupper($this->input->post('eprod_name'))
        );
        $this->db->set($data)->where('prd_id', $id)->update('products');
        $this->session->set_flashdata('success', 'updated product successfully!!!');
        redirect('products');
    }
    public function deleteproduct()
    {
        $id = $this->input->post('deletId');
        $this->db->where('prd_id', $id)->delete('products');
        $this->session->set_flashdata('success', 'deleted product successfully!!!');
        redirect('products');
    }
}
