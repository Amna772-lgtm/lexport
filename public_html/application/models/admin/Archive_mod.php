<?php
class archive_mod extends CI_Model
{
	public function select_service(){
		return $this->db->get('services')->result_array();
	}
	public function find_archive($id)
	{
		return $this->db->select('*')->where('id',$id)->get('archives')->row();
	}
	public function list_archive()
	{
		//return  $this->db->select('*')->get('archives')->result_array();
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		$post=$this->input->post();

		if($post){
		  $cases=$post['cases'];
 
		  $file_type=$post['file_type'];
		if($file_type)
		{
			$whr = "AND cat_id='$file_type'";
		}
		if($role_id == 1){
			return  $this->db->select('*')
			->where("(temp_app_id='$cases' $whr)", NULL, FALSE)->order_by("id", "desc")
			->get('document')
			->result_array();
		}
		else
		{  
			return  $this->db->select('*')
			 ->where("(temp_app_id='$cases' $whr )", NULL, FALSE)->order_by("id", "desc")
			->get('document')
			->result_array();
		}
		} else {
		
	
		if($role_id == 1){
			return  $this->db->select('*')->order_by("id", "desc")
			->get('document')
			->result_array();
		}
		else
		{
 
			$user_id = $this->session->userdata('admin_id');
		
			$table="";
			$table = "session_mission";
			$where  ="{$table}.user_id=$user_id OR c_case.manager_id=$user_id OR {$table}.follow_up_employee=$user_id OR  {$table}.responsible_employee=$user_id";
		 
			$data =  $this->db->select("{$table}.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->get($table)->result_array();
			
            foreach($data as $nsd){ $selements[] = $nsd['id']; }
			$sdata =  $this->db->select('*')->where_in('temp_app_id', $selements)->where_in('type', 'session')
			->get('document')->result_array();
			//print_r($sdata);
				$data_new['datanew']= $sdata;
			$table="";
			$table = "consultation_mission";
			$where  ="{$table}.user_id=$user_id OR c_case.manager_id=$user_id OR {$table}.follow_up_employee=$user_id OR  {$table}.responsible_employee=$user_id";
		 
			$datac =  $this->db->select("{$table}.*,c_case.id as case_id")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->get($table)->result_array();
			
            foreach($datac as $nsd){ $celements[] = $nsd['id']; }
			$cdata =  $this->db->select('*')->where_in('temp_app_id', $celements)->where_in('type', 'consultati')
			->get('document')->result_array();
			//print_r($cdata);
			

			$table="";
			$table = "general_mission";
			$where  ="{$table}.user_id=$user_id OR c_case.manager_id=$user_id OR {$table}.follow_up_employee=$user_id OR  {$table}.responsible_employee=$user_id";
		 
			$datag =  $this->db->select("{$table}.*,c_case.id as case_id")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->get($table)->result_array();
			
            foreach($datag as $nsd){ $gelements[] = $nsd['id']; }
			$gdata =  $this->db->select('*')->where_in('temp_app_id', $gelements)->where_in('type', 'general')
			->get('document')->result_array();
			//print_r($gdata);
				$data_new['datanew'] =$gdata;
			
			$table="";
			$table = "writing_misssion";
			$where  ="{$table}.user_id=$user_id OR c_case.manager_id=$user_id OR {$table}.follow_up_employee=$user_id OR  {$table}.responsible_employee=$user_id";
		 
			$dataw =  $this->db->select("{$table}.*,c_case.id as case_id")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->get($table)->result_array();
			
            foreach($dataw as $nsd){ $welements[] = $nsd['id']; }
			$wdata =  $this->db->select('*')->where_in('temp_app_id', $welements)->where_in('type', 'writing')
			->get('document')->result_array();
		//	print_r($wdata);
			$data_new['datanew'] = $wdata;
					
			$table="";
			$table = "visiting_mission";
			$where  ="{$table}.user_id=$user_id OR c_case.manager_id=$user_id OR {$table}.follow_up_employee=$user_id OR  {$table}.responsible_employee=$user_id";
		 
			$datav =  $this->db->select("{$table}.*,c_case.id as case_id")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->get($table)->result_array();
			
            foreach($datav as $nsd){ $velements[] = $nsd['id']; }
			$vdata =  $this->db->select('*')->where_in('temp_app_id', $velements)->where_in('type', 'visiting')
			->get('document')->result_array();
		//	print_r($vdata);
			$data_new['datanew'] =$vdata;
		
			$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.user_id, assignment.customer_id,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.user_id',$this->session->userdata('admin_id'));  
			$this->db->order_by("id", "desc");
            $this->db->group_by("c_case.id");
			$list_assignment_case =$this->db->get()->result_array();
			foreach($list_assignment_case as $nsd){ $case_elements[] = $nsd['doc_id']; }
			 	 
			
			$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee as res');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.follow_up_employee=c_case.follow_up_employee');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.follow_up_employee',$this->session->userdata('admin_id'));  
			$this->db->order_by("id", "desc");	
		
			$list_following_employee=$this->db->get()->result_array();
			foreach($list_following_employee as $nsd){ $case_elements[] = $nsd['doc_id']; }
		 
			$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.responsible_employee=c_case.responsible_employee');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.user_id',$this->session->userdata('admin_id'));  
			$this->db->order_by("id", "desc");   
			 
			$list_responsible_employee=$this->db->get()->result_array();
			foreach($list_responsible_employee as $nsd){ $case_elements[] = $nsd['doc_id']; }
 			
			$managaer_ls = $this->db->select('*')->where('manager_id',$this->session->userdata('admin_id'))->get('c_case')->result_array();
			foreach($managaer_ls as $nsd){ $case_elements[] = $nsd['doc_id']; }
			
			$daatat= $this->db->select('*') 
			->where_in('temp_app_id', $case_elements)
			->get('document')
			->result_array();
			$datapush = array_merge($sdata,$cdata,$gdata,$wdata,$vdata,$daatat);
	 
			return $datapush;
		}
		}
	}
	
	public function delete_archive($id) //packages ne delete karva mte
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('document');
		return $result; 
	}
	public function get_per_case()
	{
		$q=$this->db->select(['*'])
					->get('c_case');
		return $q->result_array();
	}
	public function get_per_clients()
	{
		$q=$this->db->select(['*'])
		->where(['role_id' => 3])
					->get('users');
		return $q->result_array();
	}
	
	public function get_per_procuration()
	{
		$q=$this->db->select(['*'])
					->get('procuration');
		return $q->result_array();
	}
	public function get_per_contract()
	{
		$q=$this->db->select(['*'])
					->get('contract');
		return $q->result_array();
	}
	public function get_per_project()
	{
		$q=$this->db->select(['*'])
					->get('add_project');
		return $q->result_array();
	}
	public function get_per_tasks()
	{
		$q=$this->db->select(['*'])
					->get('add_task');
		return $q->result_array();
	}
}	
?>