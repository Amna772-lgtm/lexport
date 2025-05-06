<?php
class my_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Riyadh');
        if (!$this->session->userdata('admin_id') && $this->uri->segment(1) == "admin") {
            return redirect('admin/login');
        }
        if (isset($_GET['vefrify']) == "true") {
            $this->session->set_userdata('verify', 'true');
        }
        if ($this->session->userdata('admin_id')) {
            $this->load->model('admin/admin_mod');
            $permission = $this->admin_mod->get_permission_model($this->session->userdata('admin_id'));
            if (count($permission) > 0) {
                $this->session->set_userdata('permission', $permission->data);
            }
        }
        $admin_permissions = $this->db->select('data')->where('user_id', $this->session->userdata('admin_id'))->get('admin_permissions')->row();
        if ($admin_permissions) {
            $this->session->set_userdata('admin_permission', $admin_permissions->data);
        }
        if ($this->session->userdata('user_id') != '') {

            if ($this->session->userdata('session_id') != getUserSession($this->session->userdata('user_id')) && (getUserSession($this->session->userdata('user_id')) != 0 || getUserSession($this->session->userdata('user_id')) != 1)) {
                session_destroy();
                return redirect(base_url());
            }
        }
        if ($this->uri->segment(1) == "admin") {
            if ($this->session->userdata('admin_id') != '') {
                if ($this->session->userdata('session_id') != getUserSession($this->session->userdata('admin_id')) && (getUserSession($this->session->userdata('admin_id')) != 0 ||  getUserSession($this->session->userdata('admin_id')) != 1)) {
                    session_destroy();
                    return redirect(base_url('admin'));
                }
            }
        }
    }
    public function customAlpha($str)
    {
        if (! preg_match('/^[a-zA-Z\s]+$/', $str)) {
            $this->form_validation->set_message('customAlpha', 'The %s field may only contain alpha characters & White spaces');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function isClientLogged()
    {
        if (intval($this->session->userdata('user_id')) < 1) {
            // $this->session->set_userdata('redirect_url', currentURL());
            redirect(base_url(), 'refresh');
            exit;
        }
    }
    public function isAdmintLogged()
    {
        if (intval($this->session->userdata('admin_id')) < 1) {
            // $this->session->set_userdata('redirect_url', currentURL());
            redirect('admin/login', 'refresh');
            exit;
        }
    }
    public function alpha_Ar($str)
    {

        //if (! preg_match("/^[\-_ \d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$/ui", $str)) {
        if (! preg_match("/^[\p{Arabic}a-zA-Z\- .ـ]+$/u", $str)) {
            $this->form_validation->set_message('alpha_Ar', 'The %s field may only contain alpha characters');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function recaptchaSecret() {
        return $this->config->item('recaptcha_secret');
    }
}
