<?php 
class report extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/report_mod');
		$this->load->model('admin/customer_mod');
		$this->load->model('admin/admin_mod');
	}
	public function by_employees() 
	{
		$post=$this->input->post();
	
		$get_per_clients = $this->admin_mod->get_employee();
		if($post){
		$id = $post['emp'];
		$branch = $post['branch'];
		
/* 		if($id){
			$where  ="c_case.user_id = $id";
		} */
		 
			
		$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.user_id, assignment.customer_id,assignment.note as assign_note')
		->from('c_case')
		->join('assignment','assignment.case_id=c_case.id')
		->where('c_case.active_inactive','0');
		
		$this->db->where('assignment.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		if($id){
			$this->db->where('c_case.user_id',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$asign_case= $this->db->get()->num_rows();
		
		
		
		$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee')
		->from('c_case')
		->join('assignment','assignment.follow_up_employee=c_case.follow_up_employee')
		->where('c_case.active_inactive','0');
		if($id){
			$this->db->where('c_case.follow_up_employee',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		
		$this->db->where('assignment.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		$following_file =  $this->db->get()->num_rows();

		 $this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.note as assign_note')
		->from('c_case')
		->join('assignment','assignment.responsible_employee=c_case.responsible_employee');
		$this->db->where('assignment.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		if($id){	
			$this->db->where('c_case.user_id',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$responsible_file =	$this->db->get()->num_rows();
		
		
		$this->db->select('*')->from('convert_file_assignment');
		if($id){	
			$this->db->where('convert_to',$id);
		}
		$convert_file =$this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		
		$this->db->select('*')->from('assignment_convert')->where('type','');
		if($id){	
			$this->db->where('following_employee_id',$id);
		}
		$convert_case = $this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		
		$this->db->select('*')->from('assignment_convert')->where('type','session');
		if($id){	
			$this->db->where('following_employee_id',$id);
		}
		
		$convert_session = $this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		 $this->db->select('*')->from('assignment_convert')->where('type','writing');
		if($id){	
			$this->db->where('following_employee_id',$id);
		}
		$convert_writing =$this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		
		$this->db->select('*')->from('assignment_convert')->where('type','consultation');
		if($id){	
		 $this->db->where('following_employee_id',$id);
		}
		$convert_consultation = $this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		
		$convert_visiting = $this->db->select('*')->from('assignment_convert')->where('type','visiting');
		if($id){	
		 $this->db->where('following_employee_id',$id);
		}
		$convert_visiting = $this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		$this->db->select('*')->from('assignment_convert')->where('type','general');
		
		if($id){	
		 $this->db->where('following_employee_id',$id);
		}
		$convert_general = $this->db->where('create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"')->get()->num_rows();
		
		
		$ser=$this->customer_mod->select_service();
		$this->db->select('*');
		
		if($id){
			$this->db->where('user_id',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		$case_list=$this->db->get('c_case')->result_array();
		 

		 
		$this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = session_mission.case_id", 'left');
		
		if($id){
			$this->db->where("session_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}

		$this->db->where('session_mission.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		$session = 	$this->db->get('session_mission')->result_array();
 
 
		$this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = writing_misssion.case_id", 'left');
		if($id){
			$this->db->where("writing_misssion.user_id",$id);	
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('writing_misssion.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		$writings =		$this->db->get('writing_misssion')->result_array();
		
 
		$this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
		->where('consultation_mission.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');

		if($id){
			$this->db->where("consultation_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$consultation =$this->db->get('consultation_mission')->result_array();
		
	 
		$this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = general_mission.case_id", 'left');
	
		if($id){
			$this->db->where("general_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('general_mission.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		$general = $this->db->get('general_mission')->result_array();
		
 
		$this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = visiting_mission.case_id", 'left');
		
		if($id){
			$this->db->where("visiting_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('visiting_mission.createdate  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
		$visiting =$this->db->get('visiting_mission')->result_array();
		
	

		
		$project=$this->db->select('*')->where('user_id',$id)->get('add_project')->result_array(); 
		$archives=$this->db->select('*')->where('user_id',$id)->get('archives')->result_array(); 
		$user = $this->db->select(['id', 'name', 'email', 'phone', 'address', 'role_id'])
				->where(['id' => $id])
				->get('users')
				->row_array();
		$this->load->model('admin/archive_mod');
		$get_per_tasks=$this->archive_mod->get_per_tasks();
		$get_per_procuration=$this->archive_mod->get_per_procuration();
 
		return $this->load->view('admin/by_employees', ['data' => 'yes','service'=>$ser,'session'=>$session,'writings'=>$writings,'consultation'=>$consultation,'visiting'=>$visiting,'project'=>$project,'case_list'=>$case_list,'archives'=>$archives,'user'=>$user,'get_per_procuration'=>$get_per_procuration,'get_per_tasks'=>$get_per_tasks,'general'=>$general,'get_per_clients' => $get_per_clients,'asign_case'=>$asign_case,'following_file'=>$following_file,'responsible_file'=>$responsible_file,'convert_file'=>$convert_file,'convert_case'=>$convert_case,'convert_session'=>$convert_session,'convert_writing'=>$convert_writing,'convert_consultation'=>$convert_consultation,'convert_visiting'=>$convert_visiting,'convert_general'=>$convert_general]);
 
			
			}else{
				
			$this->load->view('admin/by_employees',['data'=>'','get_per_clients' => $get_per_clients]);
			
			}
	 
	}
	public function by_task() 
	{
		$post=$this->input->post();
	
		$get_per_clients = $this->admin_mod->get_employee();
		if($post){
		$id = $post['emp'];
		$branch = $post['branch'];
		$date = $post['from'];
		$date = explode('-',$date); 
		$from =  $date[0];
		$from = explode('/',$from); 
		$from = str_replace(' ', '', $from[2]."-".$from[0]."-".$from[1]);;
		
		$to =  $date[1];
		$to = explode('/',$to); 
		$to = str_replace(' ', '', $to[2]."-".$to[0]."-".$to[1]);
	/* 		if($id){
				$where  ="c_case.user_id = $id";
			} */
			 
			
		$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.user_id, assignment.customer_id,assignment.note as assign_note')
		->from('c_case')
		->join('assignment','assignment.case_id=c_case.id')
		->where('c_case.active_inactive','0');
		
		$this->db->where('assignment.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		if($id){
			$this->db->where('c_case.user_id',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$asign_case= $this->db->get()->num_rows();
		
		
		
		$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee')
		->from('c_case')
		->join('assignment','assignment.follow_up_employee=c_case.follow_up_employee')
		->where('c_case.active_inactive','0');
		if($id){
			$this->db->where('c_case.follow_up_employee',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		
		$this->db->where('assignment.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		$following_file =  $this->db->get()->num_rows();

		 $this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.note as assign_note')
		->from('c_case')
		->join('assignment','assignment.responsible_employee=c_case.responsible_employee');
		$this->db->where('assignment.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		if($id){	
			$this->db->where('c_case.user_id',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$responsible_file =	$this->db->get()->num_rows();
		
		
		$this->db->select('*')->from('convert_file_assignment');
		if($id){	
			$this->db->where('convert_to',$id);
		}
		$convert_file =$this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		
		$this->db->select('*')->from('assignment_convert')->where('type','');
		if($id){	
			$this->db->where('following_employee_id',$id);
		}
		$convert_case = $this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		
		$this->db->select('*')->from('assignment_convert')->where('type','session');
		if($id){	
			$this->db->where('following_employee_id',$id);
		}
		
		$convert_session = $this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		 $this->db->select('*')->from('assignment_convert')->where('type','writing');
		if($id){	
			$this->db->where('following_employee_id',$id);
		}
		$convert_writing =$this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		
		$this->db->select('*')->from('assignment_convert')->where('type','consultation');
		if($id){	
		 $this->db->where('following_employee_id',$id);
		}
		$convert_consultation = $this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		
		$convert_visiting = $this->db->select('*')->from('assignment_convert')->where('type','visiting');
		if($id){	
		 $this->db->where('following_employee_id',$id);
		}
		$convert_visiting = $this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		$this->db->select('*')->from('assignment_convert')->where('type','general');
		
		if($id){	
		 $this->db->where('following_employee_id',$id);
		}
		$convert_general = $this->db->where('create_date  BETWEEN "'.$from.'" AND "'.$to.'"')->get()->num_rows();
		
		
		$ser=$this->customer_mod->select_service();
		$this->db->select('*');
		
		if($id){
			$this->db->where('user_id',$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		$case_list=$this->db->get('c_case')->result_array();
		 

		 
		$this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = session_mission.case_id", 'left');
		
		if($id){
			$this->db->where("session_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}

		$this->db->where('session_mission.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		$session = 	$this->db->get('session_mission')->result_array();
 
 
		$this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = writing_misssion.case_id", 'left');
		if($id){
			$this->db->where("writing_misssion.user_id",$id);	
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('writing_misssion.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		$writings =		$this->db->get('writing_misssion')->result_array();
		
 
		$this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
		->where('consultation_mission.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');

		if($id){
			$this->db->where("consultation_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$consultation =$this->db->get('consultation_mission')->result_array();
		
	 
		$this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = general_mission.case_id", 'left');
	
		if($id){
			$this->db->where("general_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('general_mission.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		$general = $this->db->get('general_mission')->result_array();
		
 
		$this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = visiting_mission.case_id", 'left');
		
		if($id){
			$this->db->where("visiting_mission.user_id",$id);
		}
		if($branch){
			$this->db->where('c_case.branch',$branch);
		}
		$this->db->where('visiting_mission.createdate  BETWEEN "'.$from.'" AND "'.$to.'"');
		$visiting =$this->db->get('visiting_mission')->result_array();
		
	

		
		$project=$this->db->select('*')->where('user_id',$id)->get('add_project')->result_array(); 
		$archives=$this->db->select('*')->where('user_id',$id)->get('archives')->result_array(); 
		$user = $this->db->select(['id', 'name', 'email', 'phone', 'address', 'role_id'])
				->where(['id' => $id])
				->get('users')
				->row_array();
		$this->load->model('admin/archive_mod');
		$get_per_tasks=$this->archive_mod->get_per_tasks();
		$get_per_procuration=$this->archive_mod->get_per_procuration();
 
		return $this->load->view('admin/by_task', ['data' => 'yes','service'=>$ser,'session'=>$session,'writings'=>$writings,'consultation'=>$consultation,'visiting'=>$visiting,'project'=>$project,'case_list'=>$case_list,'archives'=>$archives,'user'=>$user,'get_per_procuration'=>$get_per_procuration,'get_per_tasks'=>$get_per_tasks,'general'=>$general,'get_per_clients' => $get_per_clients,'asign_case'=>$asign_case,'following_file'=>$following_file,'responsible_file'=>$responsible_file,'convert_file'=>$convert_file,'convert_case'=>$convert_case,'convert_session'=>$convert_session,'convert_writing'=>$convert_writing,'convert_consultation'=>$convert_consultation,'convert_visiting'=>$convert_visiting,'convert_general'=>$convert_general]);
 
			
			}else{
				
			$this->load->view('admin/by_task',['data'=>'','get_per_clients' => $get_per_clients]);
			
			}
	 
	}
	public function by_employees_value()//by employees ni value fetch kari
	{
			
			if($this->form_validation->run('by_employees'))
			{
				$post=$this->input->post();
						$data=$this->report_mod->by_employees($post);
		 
					//	print_r($by_emp);exit();
			 
						$filename = 'by_employees__'.date('Y-m-d').'.csv'; 
   				header("Content-Description: File Transfer"); 
   				header("Content-Disposition: attachment; filename=$filename"); 
  	 			header("Content-Type: application/csv; "); 
  	 			//data fetch karya
  	 			
  	 				 $file = fopen('php://output', 'w'); 
 
			 $header = array('name','data of birth','address','email','phone','branch','bank_accounts','bank_name','amount','d_name','employee_type','monthly_salary','created');
	 
 
   			fputcsv($file, $header);
			//print_r($post); exit;
 
   			foreach ($data as $key=>$line)
   			{ 
     			fputcsv($file,$line); 
  	 		}
   			fclose($file); 	
				
			}	
			else
			{
					$this->load->view('admin/by_employees');
			}		
	}
//***********************************-----------------------------by cost---------------------------****************************//
		public function by_cost()//by cost report view karva
		{
		 	$get_per_clients = $this->report_mod->employee();
			$post=$this->input->post();
			if($post){
				
			$this->db->select("invoice.*,invoice_details.*,c_case.id,c_case.branch,") 
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where('invoice.status',0);
				
				if($post['emp']){  
					$this->db->where('invoice.created_by',$post['emp']);
				}
				if($post['branch']){ 
					$this->db->where('c_case.branch',$post['branch']);
				}
				
				$this->db->where('invoice.create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
				
				$invoice = $this->db->order_by("invoice.id", "desc")->get('invoice')->result_array();
				
			$this->db->select("
			expense.*,
			c_case.id as case_id,
			c_case.customers_id, 
			c_case.user_id,
			c_case.identification_number,
			c_case.identification_types,
			c_case.other_identification_types,
			c_case.client_file_number,
			c_case.client_name,
			c_case.branch,
			c_case.service_types,
			c_case.case_code,
			c_case.case_type,
			c_case.case_number,
			c_case.case_title,
			c_case.case_date,
			c_case.case_start_date,
			c_case.contact_number,
			c_case.opponent_full_name,
			c_case.opponent_lawyer,
			c_case.case_status,
			c_case.note")->join('c_case', "c_case.id = expense.case_id");
			
			if($id){
				$this->db->where('expense.created_by',$post['emp']);
			}
			if($branch){
				$this->db->where('c_case.branch',$branch);
			}
			$this->db->where('expense.exp_create_date  BETWEEN "'.$post['from'].'" AND "'.$post['to'].'"');
			$expense = $this->db->order_by("expense.id", "desc")->get('expense')->result_array();	
			$this->load->view('admin/by_cost',["data"=>'yes','invoice'=>$invoice,'expense'=>$expense,'get_per_clients'=>$get_per_clients]);
	 	
		
			}else{
			$this->load->view('admin/by_cost',["data"=>"",'get_per_clients'=>$get_per_clients]);
			}
		}	


		public function by_cost_value()//by cost report generate karva mate
		{
			$cost=$this->input->post();
			echo "<pre>";
			print_r($cost);exit();
			echo "</pre>";
			
		}
		
//***********************************-----------------------------by cost---------------------------****************************//
		public function by_payment()//by cost report view karva
		{
			$post=$this->input->post();
			if($post){
				$data=$this->report_mod->by_payment($post); 
				$this->load->view('admin/by_payment',["data"=>$data]);
			}else{
			$this->load->view('admin/by_payment',["data"=>""]);
			}
		}
		//****************************************--------------------------by time------------------------*******************************//
		public function by_time()//by time report generate karva mate
		{
			$post=$this->input->post();
			if($post){
				$date = $post['from'];
				$date = explode('-',$date); 
				$from =  $date[0];
				$from = explode('/',$from); 
				$from = str_replace(' ', '', $from[2]."-".$from[0]."-".$from[1]);;
				
				$to =  $date[1];
				$to = explode('/',$to); 
				$to = str_replace(' ', '', $to[2]."-".$to[0]."-".$to[1]);
				
				$data['total_user'] =$this->db->select('*')->where('role_id',3)->where('created BETWEEN "'.$from.'" AND "'.$to.'"')->get('users')->num_rows();
				
				$data['total_emp'] =$this->db->select('*')->where('role_id',2)->where('created BETWEEN "'.$from.'" AND "'.$to.'"')->get('users')->num_rows();
				
				$data['block_user'] =$this->db->select('*')->where('status',0)->where('created BETWEEN "'.$from.'" AND "'.$to.'"')->get('users')->num_rows();
				
				$data['total_case'] =$this->db->select('*')->where('createdate BETWEEN "'.$from.'" AND "'.$to.'"')->get('c_case')->num_rows();
			
				$this->load->view('admin/by_time',['data'=>$data]);
				}else{
					$this->load->view('admin/by_time',['data'=>'',]);
				}
			
		}

		public function by_time_value()//bytime report ni value fetch kari
		{
			if($this->form_validation->run('by_time'))
			{
				$post=$this->input->post();
	
				$filename = 'by_time_report__'.date('Y-m-d').'.csv'; 
   				header("Content-Description: File Transfer"); 
   				header("Content-Disposition: attachment; filename=$filename"); 
  	 			header("Content-Type: application/csv; "); 
  	 			//data fetch karya
  	 			
  	 				 $file = fopen('php://output', 'w'); 
  	 				 if($post['type']=="case")
  	 				 {
  	 				 		 $header = array('case_number','customer_name','customer_dob','address','email','service_type','amount','discount','case_total_amount','case_situation','final_decision','employee_name','department_name','power_of_attorney','lawyer','judge_name','court_name','reference','package_name','agent','branch','start_date','end_date','created');
  	 				 }
  	 				 if($post['type']=="employee")
  	 				 {
  	 				 	 $header = array('employee_name','employee_dob','employee_address','employee_email','employee_phone','branch','bank_accounts','bank_name','amount','employee_type','monthly_salary','created');
  	 				 }
 
   			fputcsv($file, $header);
			//print_r($post); exit;
			$data=$this->report_mod->by_time($post); 
   			foreach ($data as $key=>$line)
   			{ 
     			fputcsv($file,$line); 
  	 		}
   			fclose($file); 	
   			
			}			
			else
			{
				$this->load->view('admin/by_time');
			}
		}


	//**********------------------------------by evaluation-------------------------------******************************
	

		public function by_evaluation()//by evaluation karva mate
		{
			$dep=$this->report_mod->department();
			$emp=$this->report_mod->employee();
			$branch=$this->report_mod->branch();
	 
		
	 
			$post=$this->input->post();
			if($post){
				$date = $post['from'];
				$date = explode('-',$date); 
				$from =  $date[0];
				$from = explode('/',$from); 
				$from = str_replace(' ', '', $from[2]."-".$from[0]."-".$from[1]);;
				
				$to =  $date[1];
				$to = explode('/',$to); 
				$to = str_replace(' ', '', $to[2]."-".$to[0]."-".$to[1]);
				$branchid = $post['branch'];
				$employeeid = $post['employee'];
				
 
				if($employeeid){
					$follow_rating =$this->db->select_sum('follow_rating')->from('mission_rating')
					->where('follow_id',$employeeid)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get();
					$data['follow_rating']=$follow_rating->row()->follow_rating;
					
					$responsible_rating =$this->db->select_sum('responsible_rating')->from('mission_rating')
					->where('responsible_id',$employeeid)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get();
					$data['responsible_rating']= $responsible_rating->row()->responsible_rating;
					
					$master_rating =$this->db->select_sum('master_rating')->from('mission_rating')
					->where('master_id',$employeeid)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get();
					$data['master_rating']= $master_rating->row()->master_rating;
					
					$data['follow_rating_no'] =$this->db->select('*')->where('follow_id',$employeeid)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get('mission_rating')->num_rows();
					
					$data['responsible_rating_no'] =$this->db->select('*')->where('responsible_id',$employeeid)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get('mission_rating')->num_rows();
					
					$data['master_rating_no'] =$this->db->select('*')->where('master_id',$employeeid)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get('mission_rating')->num_rows();
					
					
					return $this->load->view('admin/by_evaluation',['emp_mission'=>$data,'dep'=>$dep,'emp'=>$emp,'branch'=>$branch]);
					} else {
					$data =$this->db->select('follow_id,responsible_id,master_id')->get('mission_rating')->result_array();
			
					foreach($data as $d){
					 $fid[]= $d['follow_id']; 
					 $fid[]= $d['responsible_id'];
					 $fid[]= $d['master_id'];
					}
		 
					$a = array_unique($fid);
					$bataid = explode('][', trim(str_replace('[0]', '', '['.implode('][', $a).']'), '[]'));
					
					foreach($bataid as $did){
					$mr=0;
					$fr=0;
					$rr=0; 
					$follow_rating =$this->db->select_sum('follow_rating')->from('mission_rating')
					->where('follow_id',$did)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get();
					$fr =$follow_rating->row()->follow_rating;
					
					$responsible_rating =$this->db->select_sum('responsible_rating')->from('mission_rating')
					->where('responsible_id',$did)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get();
					$rr = $responsible_rating->row()->responsible_rating;
					
					$master_rating =$this->db->select_sum('master_rating')->from('mission_rating')
					->where('master_id',$did)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get();
					$mr = $master_rating->row()->master_rating;
					
					$follow_rating_no =$this->db->select('*')->where('follow_id',$did)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get('mission_rating')->num_rows();
					$responsible_rating_no =$this->db->select('*')->where('responsible_id',$did)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get('mission_rating')->num_rows();
					$master_rating_no =$this->db->select('*')->where('master_id',$did)->where('create_date BETWEEN "'.$from.'" AND "'.$to.'"')->get('mission_rating')->num_rows();
				
					$user_sum[$did]['sum'] = $mr+$fr+$rr;
					$user_sum[$did]['count'] = $follow_rating_no+$responsible_rating_no+$master_rating_no;
				
				} 
				// print_r($user_sum);
					return $this->load->view('admin/by_evaluation',['all_mission'=>$user_sum,'dep'=>$dep,'emp'=>$emp,'branch'=>$branch]);
				}
			//	 ->where("($where)", NULL, FALSE)
				
			}else{
				$this->load->view('admin/by_evaluation',['data'=>'','dep'=>$dep,'emp'=>$emp,'branch'=>$branch]);
			}
		}
		public function by_evaluation_value()//by evaluation ni value fetch kari 
		{
			$post=$this->input->post();
			$data=$this->report_mod->by_evaluation($post);	
			
			if($data)
			{
					$filename ='by_evaluation_employee____'.date('Y-m-d').'.csv'; 
   				header("Content-Description: File Transfer"); 
   				header("Content-Disposition: attachment; filename=$filename"); 
  	 			header("Content-Type: application/csv; ");
  	 			//data fetch karya
  	 				 $file = fopen('php://output', 'w'); 
  	 				 $header=array('nmae','address','department_name','branch','bank_accounts','bank_name','employee_type','amount','monthly_salary');				 			
   			fputcsv($file, $header);
   			foreach ($data as $key=>$line)
   			{ 
     			fputcsv($file,$line); 
  	 		}
   			fclose($file); 	
   		}
   		else
   		{
   			return redirect('admin/report/by_evaluation');
   		}
			
		
		}

}
?>
