<?php
class services_mod extends CI_Model
{
	public function services()//services display krava mate
	{	
		$q=$this->db->order_by("id","DESC")
					->get('services');
		return $q->result();
	}

	public function add_services($data)//services add karva mate
	{
		return $this->db->insert('services',$data);
	}

	public function delete_services($id)//services delete karva mate
	{
		return $this->db->delete('services',$id);
	}

	public function  fetch_services($id)//je services edit karvani 6e te fund karva ni 6e
	{
		$q=$this->db->select(['id','name','name_en'])
					->where('id',$id)
					->get('services');
			return $q->row();
	}

	public function edit_services($id,$admin)//services edit kari
	{
		return $this->db->where('id',$id)
				->update('services',$admin);
	}
}
?>