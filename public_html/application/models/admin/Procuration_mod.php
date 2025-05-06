<?php
class Procuration_mod extends CI_Model
{

	// appoinment 
	public function find_procuration($id)
	{
		return $this->db->select('*')->where('id',$id)->get('procuration')->row();
	}
	
	public function list_procuration()
	{
// 		return  $this->db->select('*')->get('procuration')->result_array();
        $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')
			->get('procuration')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)
			->get('procuration')
			->result_array();
		}
	}

	public function delete_procuration($id) //packages ne delete karva mte
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('procuration');
		return $result; 
	}

}
?>