<?php
class Reg_of_doc_mod extends CI_Model
{

	// appoinment 
	public function find_reg_of_doc($id)
	{
		return $this->db->select('*')->where('id',$id)->get('reg_of_doc')->row();
	}
	
	public function list_reg_of_doc()
	{
// 		return  $this->db->select('*')->get('reg_of_doc')->result_array();
	    $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')
			->get('reg_of_doc')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)
			->get('reg_of_doc')
			->result_array();
		}
	    
	    
	}

	public function delete_reg_of_doc($id) //packages ne delete karva mte
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('reg_of_doc');
		return $result; 
	}

}
?>