<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        if ($this->input->cookie('user_id',TRUE)) {
            redirect('index.php/dashboard', 'refresh');
        } else {
            $this->load->view('login', 'refresh');
        }
    }

    public function login()
    {
        if (isset($_POST['sp_login'])) {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );

            $em = $this->input->post('email');
            $ps = $this->input->post('password');

            if (empty($em)) {
                $this->session->set_flashdata('alert_msg', array('failure', 'Login', 'Please enter your username!'));
                redirect(base_url().'index.php');
            } elseif (empty($ps)) {
                $this->session->set_flashdata('alert_msg', array('failure', 'Login', 'Please enter your password!'));
                redirect(base_url().'index.php');
            } else {
                $result = $this->Auth_model->verifyLogIn($data);
                $user_id = $result[0]['id'];
                $fullname = $result[0]['fullname'];
                $user_email = $result[0]['email'];
                $role_id = $result[0]['role_id'];
                $out_id = $result[0]['outlet_id'];
                $this->input->set_cookie('site_lang','indonesia','3600'); 
                $this->input->set_cookie('user_id',$user_id,'3600'); 
                $this->input->set_cookie('fullname',$fullname,'3600'); 
                $this->input->set_cookie('user_email',$user_email,'3600'); 
                $this->input->set_cookie('role_id',$role_id,'3600'); 
                $this->input->set_cookie('out_id',$out_id,'3600'); 
                $this->session->set_userdata($newdata);
                if ($role_id == 3) {
                   redirect('index.php/pos');
                }else{
                   redirect('index.php/dashboard');
                }
                
            }
        }
    }

    public function logout()
    {
       delete_cookie('site_lang'); 
       delete_cookie('user_id'); 
       delete_cookie('fullname'); 
       delete_cookie('user_email'); 
       delete_cookie('role_id'); 
       delete_cookie('out_id');
        redirect(base_url().'index.php');
    }

    // Function to get the client IP address
    public function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }
}
