<?php
class customer_mod extends CI_Model {
	public function store_customer($customer) //customer ne store karva mate
	{
		$this->db->insert('users', $customer);
		$id = $this->db->insert_id();

		unset($customer['role_id']);
		$customer['add_edit'] = 0;
		$customer['user_id'] = $id;
		$customer['emp_id'] = $this->session->userdata('admin_id');

		return $this->db->insert('customer_temp', $customer);

	}

	public function select_service(){
		//all service select kri
		return $this->db->get('services')->result_array();
	}

	public function padding_customer() //padding customer display krav mate
	{
				if($this->session->userdata('role_id') == 1){
 
			$q = $this->db->select(['customer_id', 'type_of_customer', 'client_name', 'city','add_edit'])
			->get('customers_temp');
		} else {

			$q = $this->db->select(['customer_id', 'type_of_customer', 'client_name', 'city','add_edit'])
			->where(['user_id' => $this->session->userdata('admin_id')])->order_by("id", "desc")->get('customers_temp');
		}
		
		return $q->result_array();
	}

	public function approve_customer($id) //customer approve kari tyare
	{
		$approve = $this->db->select('*')->where('customer_id', $id)->get('customers_temp')->row_array();
		unset($approve['customer_id'],$approve['id'],$approve['add_edit']);		
		$this->db->delete('customers_temp', ['customer_id' => $id]);
			 $this->db->where('id',$id);
			return $this->db->update('customers',$approve);			
	}

	public function list_customer() //customer nu list displat karva mate
	{
		if($this->session->userdata('role_id') == 1){
			return  $this->db->select(['id', 'type_of_customer', 'client_name', 'city','branch','user_id','client_file_number','service_types','customers_id','assign_note'])->order_by("id", "desc")
			->get('customers')->result_array();
		} 
		else {
				return  $this->db->select(['id', 'type_of_customer', 'client_name', 'city','branch','user_id','client_file_number','service_types','customers_id','assign_note'])
			->where(['user_id' => $this->session->userdata('admin_id')])->order_by("id", "desc")->get('customers')->result_array();
		}

	
	}

	public function delete_customer($id) //customer delete karva mate
	{
		$customer=$this->db->select('id')->where('customer_id',$id)->get('customers_temp')->row_array();
		if($customer){
			$this->db->delete('customers_temp',['customers_id'=>$id]);
		}
		return $this->db->delete('customers',['id'=>$id]);
	}

	public function find_customer($id) //je customer edit karva no 6e te find karva mate
	{
		return  $this->db->select('*')->where('id', $id)->get('customers')->row();
	}

	public function edit_customer($id, $customer) //customr edit karyo
	{
		return $this->db->insert('customer_temp', $customer);
	}
}
?>