<?php
class admin_mod extends CI_Model
{
	public function store_admin($admin)//admin add athia tyre
	{
		return $this->db->insert('users',$admin);
	}

	public function delete_user($id) //case delete karva mate
	{
 
		$expense=$this->db->select('*')->where('customers_id',$id)->get('c_case')->row();
		if($expense){ return false; }
	 
		
 
		return $this->db->delete('users',['id'=>$id]);
	}
	public function list_admin()//admin nu list display karva mate
	{
		$q=$this->db->select(['id','name','dob','phone','created'])
					->where(['role_id'=>1,'status'=>1,'is_delete'=>0])
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
function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('action_log');
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('action_type',$params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('action_type',$params['search']['sortBy']);
        }else{
            $this->db->order_by('id','desc');
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
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