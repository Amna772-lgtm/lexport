<?php
class Project_mod extends CI_Model
{
	public function find_project($id)
	{
		return $this->db->select('*')->where('id',$id)->get('add_project')->row();
	}
	public function lists_project()
	{
		//return  $this->db->select('*')->get('add_project')->result_array();
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')->order_by("id", "desc")
			->get('add_project')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
		//	->where('user_id',$user_id)
			->get('add_project')
			->result_array();
		}
	}
	
	public function find_convert_project($id)
	{
		return $this->db->select('*')->where('id',$id)->get('add_convert_project')->row();
	}
	public function list_convert_project()
	{
		//return  $this->db->select('*')->get('add_convert_project')->result_array();
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')->order_by("id", "desc")
			->get('add_convert_project')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)->order_by("id", "desc")
			->get('add_convert_project')
			->result_array();
		}
	}
	
	public function delete_convert_project($id) 
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('add_convert_project');
		return $result; 
	}
	public function delete_project($id) 
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('add_project');
		return $result; 
	}
}
?>