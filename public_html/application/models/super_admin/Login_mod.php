<?php
class login_mod extends CI_Model {
	public function login_check($email, $password) //login check karva mate
	{
		$q = $this->db->select('*')
			->where("(email='$email' and role_id !=3)", NULL, FALSE)
			->get('super_admin')
			->row_array(); 

		if ($q['password'] == md5($password) && ($q['role_id'] == 1 || $q['role_id'] == 2) && $q['is_delete'] == 0) {
			return $q;
		} else {
			return false;
		}
	}
	public function login_check_web($email, $password) //login check karva mate
	{
		$q = $this->db->select('*')
			->where("(email='$email' and role_id =5)", NULL, FALSE)
			->get('super_admin')
			->row_array(); 

		if ($q['password'] == md5($password) && ($q['role_id'] == 5 && $q['is_delete'] == 0)) {
		return $q;
		} else {
			return false;
		}
	}
	public function check_forgotpassword($email, $pass) //password forgot thia tyare
	{
		return $this->db->where('email', $email)
			->update('super_admin', ['password' => md5($pass)]);
	}

	public function change_password($post) //password change karva mate
	{
		$q = $this->db->select('password')
			->where('id', $this->session->userdata('admin_id'))
			->get('super_admin')
			->row_array();
		if (md5($post['current_password']) == $q['password']) {
			$pass = md5($post['new_password']);
			return $this->db->where(['id' => $this->session->userdata('admin_id')])
				->update('super_admin', ['password' => $pass]);
		} else {
			return false;
		}
	}

}
?>