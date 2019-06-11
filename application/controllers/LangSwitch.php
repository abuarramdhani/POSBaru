<?php
    defined('BASEPATH') or exit('No direct script access allowed');

class LangSwitch extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function switchLanguage($language = '')
    {
        $language = ($language != '') ? $language : 'english';
        $this->input->set_cookie('site_lang',$language,'3600'); 
        redirect(base_url('index.php/Dashboard'));
    }
}
