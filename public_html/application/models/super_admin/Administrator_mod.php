<?php
class administrator_mod extends CI_Model
{
	public function store_admin($admin)//admin add athia tyre
	{
		 $this->db->insert('users',$admin);
			return $this->db->insert_id();  
	}

	public function delete_user($id) //case delete karva mate
	{
		$expense=$this->db->select('*')->where('customers_id',$id)->get('c_case')->row();
		if($expense){ return false; }
		return $this->db->delete('users',['id'=>$id]);
	}
	public function list_admin()//admin nu list display karva mate
	{ 
	$q=$this->db->select(['id','name','email','phone','created'])
					->where(['role_id'=>1,'is_delete'=>0])->order_by('created', 'DESC')
					->get('users');
		return $q->result_array();
	}
	public function list_user()//admin nu list display karva mate
	{ 
	$q=$this->db->select(['id','name','email','phone','created'])
					->where(['role_id'=>3,'is_delete'=>0])->order_by('created', 'DESC')
					->get('users');
		return $q->result_array();
	}
	public function block_list()//admin nu list display karva mate
	{
		$q=$this->db->select(['*'])
					->where(['status'=>0])
					->get('users');
		return $q->result_array();
	}
		 
	public function find_admin($id)//je admin ne edit karvano 6e te find karva mate
	{
		$q=$this->db->select(['id','name','dob','address','phone','email'])
					->where('id',$id)
					->get('users');
		return $q->row();
	}

	public function edit_admin($id,$admin)//admin ne edit karva mate
	{
		return $this->db->where('id',$id)
										->update('users',$admin);
	}
	
	public function delete_admin($id)//admin ne delete karva mate
	{
		return $this->db->where('id',$id)
						->update('users',['is_delete'=>1]);
	}
	public function get_employee()//admin nu list display karva mate
	{
		$q=$this->db->select(['id','name'])
					->where(['role_id'=>2,'status'=>1,'is_delete'=>0])
					->get('users');
		return $q->result_array();
	}

	public function get_customer()//admin nu list display karva mate
	{
		$q=$this->db->select(['id','name'])
					->where(['role_id'=>3])
					->get('users');
		return $q->result_array();
	}

	public function get_permission()//admin nu list display karva mate
	{
		$q=$this->db->select(['*'])
					->get('permissions_module');
		return $q->result_array();
	}

    public function get_permission_model($id=145)//admin nu list display karva mate
	{
		$q=$this->db->select(['*'])
					->where(['user_id'=>$id])
					->get('permissions_settings')->row();
		return $q;


		$q=$this->db->select(['*'])->get('permissions_settings');
		return $q->result_array();
	}
}
?>