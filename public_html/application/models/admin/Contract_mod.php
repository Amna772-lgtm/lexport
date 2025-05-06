<?php
class contract_mod extends CI_Model
{
	public function select_service(){
		return $this->db->get('services')->result_array();
	}
	public function find_contract($id)
	{
		return $this->db->select('*')->where('id',$id)->get('contract')->row();
	}
	public function list_contract()
	{
		return  $this->db->select('*')
			->get('contract')->result_array();
	}
	
	public function delete_contract($id) //packages ne delete karva mte
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('contract');
		return $result; 
	}
}	
?>