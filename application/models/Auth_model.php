<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function verifyLogIn($data){
        $email = $data['email'];
        $password = $data['password'];
        $query = $this->db->get_where('users', array(
            'email' => $email,
            'password' => md5($password)
        ));
        $user_data = $query->num_rows();
        if ($user_data > 0) {
            return $query->result_array();
        } else {
            
        }
    }

    public function encryptPassword($password)
    {
        return md5("$password");
    }
}
