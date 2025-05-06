<?php
class task_mod extends CI_Model
{
	public function select_service(){
		return $this->db->get('add_task')->result_array();
	}
	public function find_task($id)
	{
		return $this->db->select('*')->where('id',$id)->get('add_task')->row();
	}
	public function list_task()
	{
	    $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')
			->get('add_task')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)
			->get('add_task')
			->result_array();
		}
		
		//return  $this->db->select('*')->get('add_task')->result_array();
	}
	
	public function delete_task($id)
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('add_task');
		return $result; 
	}
	
	//convert
	public function find_convert_task($id)
	{
		return $this->db->select('*')->where('id',$id)->get('add_convert_task')->row();
	}
	public function list_convert_task()
	{
		//return  $this->db->select('*')->get('add_convert_task')->result_array();
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')
			->get('add_convert_task')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)
			->get('add_convert_task')
			->result_array();
		}
	}
	
	public function delete_convert_task($id)
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('add_convert_task');
		return $result; 
	}
}	
?>