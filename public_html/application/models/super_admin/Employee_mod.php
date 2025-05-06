<?php
class employee_mod extends CI_Model
{
	public function select_department()//department na dropdown mate
	{
		$dep=$this->db->get('department');
		return $dep->result_array();
	}
	function mail_exists($key)
	{
		$this->db->where('email',$key);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function store_employeeinfo($emp,$user,$employee)//user na table ma je entry pade 
	{
			$this->db->insert('users',$user);
			$user_id=$this->db->insert_id();

			$employee['user_id']=$user_id;
			$this->db->insert('employee',$employee);

			$emp['user_id']=$user_id;
			return $this->db->insert('employee_temp',$emp);
	}

	public function list_employee()//employee nu list display karva mate
	{
			$q=$this->db->select("u.id,u.name,e.branch,e.id as eid,e.employee_type,e.department_id")
			->from('employee e')
			->join('users u','u.id=e.user_id') 
			->where(['role_id'=>2,'status'=>1,'is_delete'=>0])->order_by('e.id','desc')
			->get();
			
		return $q->result_array();
	}

	public function find_employee($id)//je employee edit karvano 6e e find karva
	{
		$q=$this->db->select("*")
					->from('employee')
					->join('users','users.id=employee.user_id','left')
					->join('department','employee.department_id=department.id','left')
					->where(['users.id'=>$id])
					->get();
		return $q->row_array();
	}

	public function edit_employee($emp,$id,$up_user)//employee edit krava mate
	{ 
	      	$this->db->where('user_id',$id)->update('employee',$emp);
	 	     return	$this->db->where('id',$id)->update('users',$up_user);

			
	}
	public function delete_employee($id)//employee delete karva mate
	{
		$this->db->where('id', $id)->delete('users');
		$result = $this->db->where('user_id', $id)->delete('employee');
		return $result;  
	}

	public function padding_employee()//padding employee display karva mate
	{
		$q=$this->db->select(['e.user_id','e.name','e.employee_type','e.add_edit','d.d_name'])
							->from('employee_temp e')
							->join('department d','e.department_id=d.id')
							->get();
		return $q->result_array();
	}

	public function approve_employee($id)//je approve karva no 6e e select karva mate
	{
			$approve=$this->db->select('*')
			->where('user_id',$id)->order_by("id", "desc")
			->get('employee_temp');
			return $approve->row_array();
	}

	public function user_employee($id,$user,$emp)//approve thai gyelo keyword user na insert krava mate
	{

		$this->db->delete('employee_temp',['user_id'=>$id]);
			$this->db->where('id',$id)
										->update('users',$user);
			return $this->db->where('user_id',$id)
										->update('employee',$emp);
	}
}	
?>