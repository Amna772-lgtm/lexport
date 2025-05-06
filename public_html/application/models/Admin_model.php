<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database, or any other necessary initialization
        $this->load->database();
    }

    public function get_all_admin_phone_numbers() {
        // Assuming you have a 'users' table with 'phone' and 'country_code' columns
        $this->db->select('phone, country_code');
        $this->db->from('users');
        $this->db->where('role_id', '1'); // Assuming there's a role column
        $query = $this->db->get();
        return $query->result_array();
    }
}
