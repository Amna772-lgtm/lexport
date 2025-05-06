<?php
class logout extends MY_Controller
{
	public function index()
	{
		date_default_timezone_set('Asia/Kolkata');
		$now = date('Y-m-d H:i:s');
		$this->db->where('id',$this->session->userdata('activity_id'))->update('activity',['logout_time'=>$now]);
		session_destroy();
		return redirect('super_admin/login');
	}
} 
?>