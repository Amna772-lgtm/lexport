<?php
class Appoinment_mod extends CI_Model
{
	
	public function app_case_data($id){ 
		return $case_data=$this->db->select('*')->where('id',$id)->get('c_case')->row();
	}	
	public function app_data($id){
		return $app_data=$this->db->select('*')->where('appointment_id',$id)->get('appointment_task')->row();
	}
	public function app_note_data($id){
		return $note_data=$this->db->select('*')->where('app_id',$id)->where('type','session')->get('case_note')->result_array();
	}
	public function task_type(){
		return $note_data=$this->db->select('*')->get('task_type')->result_array();
	}
	public function find_general_appoinment($id)
	{
		return $this->db->select('
			general_appoinment.*,
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
			c_case.contact_number,
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
			c_case.note')
			->join('c_case', 'c_case.id = general_appoinment.case_id', 'left')
			->where('general_appoinment.id',$id)->get('general_appoinment')->row();
	}
	
	public function find_appoinment($id)
	{
		return $this->db->select('
			session_appoinment.*,
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
			c_case.contact_number,
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
			c_case.note')
			->join('c_case', 'c_case.id = session_appoinment.case_id', 'left')
			->where('session_appoinment.id',$id)->get('session_appoinment')->row();
	}
	
	public function list_session_appoinment()
	{
		//return  $this->db->select('*')->get('session_appoinment')->result_array();
        $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
			if($role_id == 1){
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="session_appoinment.is_close = 0";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="session_appoinment.is_close = 0";
			}
			else if($this->uri->segment(3) == "list_session_close_mission"){
				$where  ="session_appoinment.is_close = 1";
			} else {
				$where  ="session_appoinment.is_close = 0";
			}
			return  $this->db->select('session_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name,')
 	        ->join('c_case', 'c_case.id = session_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('session_appoinment.status',0)
			//->where('session_appoinment.is_close',0)
			->get('session_appoinment')
			->result_array();
		}
		else
		{
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="session_appoinment.responsible_employee = $user_id AND session_appoinment.is_close = 0";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="session_appoinment.follow_up_employee = $user_id AND session_appoinment.is_close = 0 ";
			} 
			else if($this->uri->segment(3) == "list_session_close_mission"){
				$where  ="session_appoinment.follow_up_employee = $user_id OR session_appoinment.responsible_employee = $user_id AND session_appoinment.is_close = 1";
			} else {
				$where  ="session_appoinment.is_close = 0 ";
			}
			return  $this->db->select('session_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = session_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('session_appoinment.status',0)
			//->where('session_appoinment.is_close',0)
			->get('session_appoinment')
			->result_array();
		}
	}
	public function list_pending_appoinment(){
		  $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			
			return  $this->db->select('session_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name,')
 	        ->join('c_case', 'c_case.id = session_appoinment.case_id', 'left')
			->where('session_appoinment.status',1)
			//->where('session_appoinment.is_close',0)
			->get('session_appoinment')
			->result_array();
		}
		else{
			return  $this->db->select('session_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = session_appoinment.case_id', 'left')
			->where('session_appoinment.status',1)
		//	->where('session_appoinment.is_close',0)
			->get('session_appoinment')
			->result_array();
		}

	}
	public function list_general_appoinment()
	{
// 		return  $this->db->select('*')->get('session_appoinment')->result_array();
        $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		
			if($role_id == 1){
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="general_appoinment.responsible_employee != 0";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="general_appoinment.follow_up_employee <> 0";
			} else {
				$where  ="general_appoinment.responsible_employee <> '' OR  general_appoinment.follow_up_employee <> ''";
			}
			return  $this->db->select('general_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name,')
 	        ->join('c_case', 'c_case.id = general_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			//->where('general_appoinment.is_close',0)
			->get('general_appoinment')
			->result_array();
		}
		else
		{
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="general_appoinment.responsible_employee = $user_id";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="general_appoinment.follow_up_employee = $user_id";
			} else {
				$where  ="general_appoinment.responsible_employee = $user_id OR  general_appoinment.follow_up_employee = $user_id";
			}
			return  $this->db->select('general_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = general_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('general_appoinment.is_close',0)
		//	->where('general_appoinment.user_id',$user_id)
			->get('general_appoinment')
			->result_array();
		}
	
	}

	public function delete_general_appoinment($id) //packages ne delete karva mte
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('general_appoinment');
		return $result; 
	}
	public function delete_appoinment($id) //packages ne delete karva mte
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('session_appoinment');
		return $result; 
	}

	//Writings start
	public function find_writings_appoinment($id)
	{
		return $this->db->select('
			writings_appoinment.*,
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
			c_case.contact_number,
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
			c_case.note')
			->join('c_case', 'c_case.id = writings_appoinment.case_id', 'left')
			->where('writings_appoinment.id',$id)->get('writings_appoinment')->row();
	}
	
	public function list_writings_appoinment()
	{
		//return  $this->db->select('*')->get('writings_appoinment')->result_array();
		
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="writings_appoinment.responsible_employee != 0";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="writings_appoinment.follow_up_employee <> 0";
			} else {
				$where  ="writings_appoinment.responsible_employee <> '' OR  writings_appoinment.follow_up_employee <> ''";
			}
			return  $this->db->select('writings_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.customers_id,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = writings_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('writings_appoinment.is_close',0)
			->get('writings_appoinment')
			->result_array();
		}
		else
		{
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="writings_appoinment.responsible_employee = $user_id";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="writings_appoinment.follow_up_employee = $user_id";
			} else {
				$where  ="writings_appoinment.responsible_employee = $user_id OR  writings_appoinment.follow_up_employee = $user_id";
			}
			return  $this->db->select('writings_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = writings_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('writings_appoinment.is_close',0)
			//->where('writings_appoinment.user_id',$user_id)
			->get('writings_appoinment')
			->result_array();
		}
		
	}

	public function delete_writings_appoinment($id) 
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('writings_appoinment');
		return $result; 
	}
	//Writings End


	//Consultation start
public function find_consultation_appoinment($id)
	{
		return $this->db->select('
				consultation_appoinment.*,
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
				c_case.contact_number,
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
				c_case.note')
		->join('c_case', 'c_case.id = consultation_appoinment.case_id', 'left')
		->where('consultation_appoinment.id',$id)
		->get('consultation_appoinment')->row();
	}
	
	public function find_consultation_appoinment_02112018($id)
	{
		return $this->db->select('*')->where('id',$id)->get('consultation_appoinment')->row();
	}
	public function list_consultation_appoinment()
	{
        // 		return  $this->db->select('*')->get('consultation_appoinment')->result_array();
        $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('consultation_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = consultation_appoinment.case_id', 'left')
			->get('consultation_appoinment')
			->result_array();
		}
		else
		{
			return  $this->db->select('consultation_appoinment.*,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
			->where('consultation_appoinment.user_id',$user_id)
			->join('c_case', 'c_case.id = consultation_appoinment.case_id', 'left')
			->get('consultation_appoinment')
			->result_array();
		}
	}

	public function list_consultation_appoinment_bk_02112018()
	{
        // 		return  $this->db->select('*')->get('consultation_appoinment')->result_array();
        $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			return  $this->db->select('*')
			->get('consultation_appoinment')
			->result_array();
		}
		else
		{
			return  $this->db->select('*')
			->where('user_id',$user_id)
			->get('consultation_appoinment')
			->result_array();
		}
	}

	public function delete_consultation_appoinment($id) 
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('consultation_appoinment');
		return $result; 
	}
	//Consultation End


	//Visiting start
	public function find_visiting_appoinment($id)
	{
		return $this->db->select('
			visiting_appoinment.*,
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
			c_case.contact_number,
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
			c_case.note')
			->join('c_case', 'c_case.id = visiting_appoinment.case_id', 'left')
			->where('visiting_appoinment.id',$id)->get('visiting_appoinment')->row();
	}
	
	public function list_visiting_appoinment()
	{
		//return  $this->db->select('*')->get('visiting_appoinment')->result_array();
	    $user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="visiting_appoinment.responsible_employee <> 0";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="visiting_appoinment.follow_up_employee <> 0";
			} else {
				$where  ="visiting_appoinment.responsible_employee <> '' OR  visiting_appoinment.follow_up_employee <> ''";
			}
			return  $this->db->select('visiting_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = visiting_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('visiting_appoinment.is_close',0)
			->get('visiting_appoinment')
			->result_array();
		}
		else
		{
		if($this->uri->segment(3) == "list_session_responsible"){
				$where  ="visiting_appoinment.responsible_employee = $user_id";
			}
			else if($this->uri->segment(3) == "list_session_follow_up"){
				$where  ="visiting_appoinment.follow_up_employee = $user_id";
			} else {
				$where  ="visiting_appoinment.responsible_employee = $user_id OR  visiting_appoinment.follow_up_employee = $user_id";
			}
			return  $this->db->select('visiting_appoinment.*,c_case.id as case_id,c_case.client_name,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name')
 	        ->join('c_case', 'c_case.id = visiting_appoinment.case_id', 'left')
			->where("($where)", NULL, FALSE)
			->where('visiting_appoinment.is_close',0)
			//->where('visiting_appoinment.user_id',$user_id)
			->get('visiting_appoinment')
			->result_array();
		}
	    
	}

	public function delete_visiting_appoinment($id) 
	{
	   	$this->db->where('id', $id);
   		$result = $this->db->delete('visiting_appoinment');
		return $result; 
	}
	//Writings End
	
	public function get_case($client_file_number)
	{
		return  $this->db->select('*')
		->where('client_file_number',$client_file_number)
		->get('c_case')
		->first_row();
	
	}
}
?>