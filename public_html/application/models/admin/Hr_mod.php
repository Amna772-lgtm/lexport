<?php
class hr_mod extends CI_Model
{
	public function select_service(){
		return $this->db->get('services')->result_array();
	}
	public function find_hr($id)
	{
		return $this->db->select('*')->where('id',$id)->get('hr_eservice')->row();
	}
	public function list_hr()
	{
// 		return  $this->db->select('*')->get('hr')->result_array();
	    $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')->order_by("id", "desc")
			->get('hr_eservice')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)->order_by("id", "desc")->order_by("id", "desc")
			->get('hr_eservice')
			->result_array();
		}
	    
	}
	public function list_hr_fine()
	{
// 		return  $this->db->select('*')->get('hr')->result_array();
	    $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')->order_by("id", "desc")->order_by("id", "desc")
			->get('hr_fine')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)->order_by("id", "desc")->order_by("id", "desc")
			->get('hr_fine')
			->result_array();
		}
	    
	}

	public function delete_hr($id)
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('hr');
		return $result; 
	}
}	
?>