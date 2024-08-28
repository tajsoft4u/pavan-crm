<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_Model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function verifyAdminUsername($id)
  {
    $result = $this->db->where('username', $id)->get('auth');
    return $result;
  }

  public function checkPassword()
  {
    $id = $this->session->userdata('admin_member_id');
    $old_password = $this->input->post('old_password');
    $confirm_password = $this->input->post('confirm_password');
    $checkOldPassword = $this->db->where('vId', $id)->where('password', $old_password)->get('vendors');
    if ($checkOldPassword->num_rows() > 0) {
      $data = array(
        'password' => $confirm_password,
      );
      $update = $this->db->set($data)->where('authId', $id)->update('auth');
      if ($update) {
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_member_id');
        $this->session->set_flashdata('success', 'password updated successfully login again!!');
        redirect('login');
      }
    } else {
      $this->session->set_flashdata('error', 'old password is incorrect');
      redirect('reset-password');
    }
  }
  // Server


  public function addUser()
  {
    $username = $this->input->post('username');
    $checkUserNameExist = $this->Fetch_Model->checkIsExist('auth', 'username', $username);
    if ($checkUserNameExist->num_rows() > 0) {
      $this->session->set_flashdata('error', 'username already exist!!!');
      redirect('users');
    } else {
      $data = array(
        'username' => $username,
        'password'  => $this->input->post('password'),
        'role'  => 1,
        'created_date'  => date('Y-m-d H:i:s'),
      );
      $this->db->insert('auth', $data);
      $this->session->set_flashdata('success', 'added successfully!!!');
      redirect('users');
    }
  }
  public function editUser($value = '')
  {
    $id = $this->input->post('editId');
    $data = array(
      'username' => $this->input->post('eusername'),
      'password'  => $this->input->post('epassword'),
    );
    $result = $this->db->set($data)->where('authId', $id)->update('auth');
    $this->session->set_flashdata('success', 'updated successfully!!!');
    redirect('users');
  }
  public function deleteUser()
  {
    $this->db->where('authId', $this->input->post('deleteId'));
    $this->db->delete('auth');
    $this->session->set_flashdata('success', 'deleted successfully!!!');
    redirect('users');
  }
}
