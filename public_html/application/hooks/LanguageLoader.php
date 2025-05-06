<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');
        $admin_site_lang = $ci->session->userdata('admin_site_lang');
        if ($ci->uri->segment(1) == "admin" OR $ci->uri->segment(1) == "web_management" OR $ci->uri->segment(1) == "super_admin") {
        if ($admin_site_lang) {
             $ci->config->set_item('language', $ci->session->userdata('admin_site_lang'));
            $ci->lang->load('message',$ci->session->userdata('admin_site_lang'));
        } else {
            $ci->lang->load('message','arabic');
           $ci->config->set_item('language', 'arabic');
        }
		} else {
        if ($site_lang) {
            $ci->config->set_item('language', $ci->session->userdata('site_lang'));
            $ci->lang->load('message',$ci->session->userdata('site_lang'));
        } else {
            $ci->lang->load('message','english');
            $ci->lang->load('message','english');
        }
		}
    }
}