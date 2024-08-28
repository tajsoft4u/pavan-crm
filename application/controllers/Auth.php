<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    // Admin Logins
    public function authLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login_user_details = $this->Auth_Model->verifyAdminUsername($username);
        if ($login_user_details->num_rows() > 0) {

            $login_user_details = $login_user_details->row();
            if ($login_user_details->password == $password) {
                $_SESSION['admin_username'] = $login_user_details->username;
                $_SESSION['admin_id'] = $login_user_details->authId;
                $this->session->set_flashdata('login-success', 'login success...');
                redirect('');
            } else {
                $this->session->set_flashdata('error', 'incorrect password!!!');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'no account found with this username..');
            redirect('login');
        }
    }
    public function resetPassword()
    {
        if (!$this->session->userdata('admin_username')) redirect('login');
        $this->load->view('layout/admin/header');
        $this->load->view('auth/resetpassword');
        $this->load->view('layout/admin/footer');
    }
    public function authLogout()
    {
        if (!$this->session->userdata('admin_username')) redirect('login');
        $this->session->set_flashdata('logout-success', 'Logout successful');
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_member_id');
        redirect('login');
    }

    public function checkPassword()
    {
        $this->Auth_Model->checkPassword();
    }
}
