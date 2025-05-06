<?php
class client extends MY_Controller {
	public function __construct() {
		parent::__construct();
	$this->isAdmintLogged();
	}

	public function contact_inquery() {
		//contact inquery na data display karva mate
		$data = $this->db->get('contact_us')->result_array();
		$this->load->view('admin/contact_inquery', ['data' => $data]);
	}

	public function appoinment_list() {
		//all appoinment display karva mate
		$data = $this->db->get('appoinment')->result_array();
		$this->load->view('admin/appoinment_list', ['data' => $data]);
	}
}
?>