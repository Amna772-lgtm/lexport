<?php
class Mission_writings_mod extends CI_Model
{
	private $table_name= "writing_misssion";
	public function app_case_data($id){ 
		return $case_data=$this->db->select('*')->where('id',$id)->get('c_case')->row();
	}	
	public function app_data($id){
		return $app_data=$this->db->select('*')->where('appointment_id',$id)->get('appointment_task')->row();
	}
	public function app_note_data($id){
		return $note_data=$this->db->select('*')->where('app_id',$id)->where('type','writing')->get('case_note')->result_array();
	}
	public function task_type(){
		return $note_data=$this->db->select('*')->get('task_type')->result_array();
	}
	
	
	public function find_mission($id)
	{
		$table = $this->table_name;
		return $this->db->select("
			$table.*,
			c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.total_of_case_number,
			c_case.service_types,
			c_case.other_service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contract_number,
			c_case.opponent_full_name,
			c_case.opponent_note,
			c_case.opponent_phone,
			c_case.court_name,
			c_case.court_number,
			c_case.court_address,
			c_case.judge_name,
			c_case.opponent_lawyer,
			c_case.referral_number,
			c_case.referral_title,
			c_case.referral_date,
			c_case.verdict_number,
			c_case.verdict_date,
			c_case.objection_number,
			c_case.objection_date,
			c_case.case_status,
			")
			->join('c_case', "c_case.id = $table.case_id", 'left')
			->where("$table.id",$id)->get($this->table_name)->row();
	}
	
	public function list_mission()
	{
	    	// SUb
		if($this->uri->segment(4)){
		    $sub_mission_id = $this->uri->segment(4);
		} else {
		     $sub_mission_id = 0;
		}
		// sub
		$table = $this->table_name;
		//return  $this->db->select('*')->get('session_appoinment')->result_array();
        $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
			if($role_id == 1){
			if($this->uri->segment(3) == "list_responsible"){
				$where  ="{$table}.is_close = 0 AND {$table}.on_review = 0";
			}
			else if($this->uri->segment(3) == "list_follow_up"){
				$where  ="{$table}.is_close = 0 AND {$table}.on_review = 0";
			}
			else if($this->uri->segment(3) == "list_close_mission"){
				$where  ="{$table}.is_close = 1";
			} else {
				$where  ="{$table}.is_close = 0";
			} 
			return  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.customers_id,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id",$sub_mission_id)
			->where("{$table}.status",0)->order_by("{$table}.id", "desc")
			->get($this->table_name)
			->result_array();
		}
		else
		{
		if($this->uri->segment(3) == "list_responsible"){
				$where  ="{$table}.responsible_employee = $user_id AND {$table}.is_close = 0  AND {$table}.on_review = 0";
			}
			else if($this->uri->segment(3) == "list_follow_up"){
				// ASSIGN //
			$where  ="assign_mission.following_employee_id = $user_id AND {$table}.is_close = 0  AND {$table}.on_review = 0 AND assign_mission.type='writing_misssion'";
			return  $this->db->select("assign_mission.*,{$table}.*,c_case.id as case_id,c_case.client_name,c_case.customers_id,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->join('assign_mission', "assign_mission.app_id = {$table}.id",'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id",$sub_mission_id)
			->where("{$table}.status",0)->order_by("{$table}.id", "desc")
			//->where('mission.is_close',0)
			->get($this->table_name)
			->result_array();
			// ASSIGN //
			} 
			else if($this->uri->segment(3) == "list_close_mission"){
				if(in_array($this->session->userdata('admin_id'),getFileManager())){
					$where  ="c_case.manager_id=$user_id AND {$table}.is_close = 1";
				} else {
				$where  ="({$table}.follow_up_employee = $user_id OR {$table}.responsible_employee = $user_id) AND {$table}.is_close = 1";
				}
			} 
			else if(in_array($this->session->userdata('admin_id'),getFileManager())){
            $where  ="{$table}.user_id=$user_id OR {$table}.follow_up_employee = $user_id OR {$table}.responsible_employee = $user_id OR (c_case.manager_id=$user_id AND {$table}.is_close = 0 AND {$table}.on_review = 0 )";
			}
			else {
			    $where  ="{$table}.user_id=$user_id OR {$table}.follow_up_employee = $user_id OR {$table}.responsible_employee = $user_id AND {$table}.on_review = 0";
			}
			return  $this->db->select("{$table}.*,c_case.id as case_id,c_case.client_name,c_case.customers_id,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id",$sub_mission_id)
			->where("{$table}.status",0)->order_by("{$table}.id", "desc")
			//->where('mission.is_close',0)
			->get($this->table_name)
			->result_array();
		}
	}


	public function list_pending_mission(){
		$table = $this->table_name;
	    $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		// SUb
		if($this->uri->segment(4)){
		    $sub_misssion_id = $this->uri->segment(4);
		} else {
		     $sub_misssion_id = 0;
		}
		// sub
		if($role_id == 1){
			
			return  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = $table.case_id", 'left')
			->where("$table.status",1)
			->where("{$table}.sub_mission_id",$sub_misssion_id)
			//->where('mission.is_close',0)
			->get($this->table_name)
			->result_array();
		}
		else if(in_array($this->session->userdata('admin_id'),getFileManager())){
		    
	    	$where  ="c_case.manager_id = $user_id";
			return  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = $table.case_id", 'left')
			->where("$table.status",1)
			->where("($where)", NULL, FALSE)
			->where("{$table}.sub_mission_id",$sub_misssion_id)
			->order_by("{$table}.id", "desc")
			->get($this->table_name)
			->result_array();
		}
		else{
		
			
			$where  ="{$table}.user_id = $user_id";
		
			return  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
 	        ->join('c_case', "c_case.id = $table.case_id", 'left')
			->where("$table.status",1)
			->where("{$table}.sub_mission_id",$sub_misssion_id)
			->where("($where)", NULL, FALSE)
			->order_by("{$table}.id", "desc")
			->get($table)
			->result_array();
		}

	}
	
	public function delete_mission($id) 
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete($this->table_name);
		return $result; 
	}

}
?>