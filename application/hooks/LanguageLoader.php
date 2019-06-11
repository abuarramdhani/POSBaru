<?php

class LanguageLoader
{
    /*
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $ci->lang->load('message', 'english');
    }
*/
    public function initialize()
    {
        $ci = &get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->input->cookie('site_lang', TRUE);
        if ($site_lang) {
            $ci->lang->load('message', $ci->input->cookie('site_lang', TRUE));
        } else {
            $ci->lang->load('message', 'english');
        }
    }
}
