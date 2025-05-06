<?php
class dashboard_mod extends CI_Model {

	public function todo_list()  {
		if($this->session->userdata('role_id')==1){
			return $this->db->where(['admin_id' => $this->session->userdata('admin_id')])->order_by("id", "desc")->get('to_do_list')->result_array();
		} else {
		return $this->db->where(['user_id' => $this->session->userdata('admin_id')])->order_by("id", "desc")->get('to_do_list')->result_array();
		}
	}
	public function employee_notification()  {
			$user_id = $this->session->userdata('admin_id');
			
			$where  ="(session_mission.follow_up_employee = $user_id OR session_mission.responsible_employee = $user_id) AND session_mission.is_close = 0";
			

			$session_mission =  $this->db->select("session_mission.id")
 	        ->join('c_case', "c_case.id = session_mission.case_id", 'left')
			->where("$where", NULL, FALSE)
			->where("session_mission.status",0) 
			->get('session_mission')
			->result_array();
			$session_mission = array_column($session_mission, 'id');
 
			$where  ="(consultation_mission.follow_up_employee = $user_id OR consultation_mission.responsible_employee = $user_id) AND consultation_mission.is_close = 0";
			$consultation_mission =  $this->db->select("consultation_mission.id")
 	        ->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
			->where("$where", NULL, FALSE)
			->where("consultation_mission.status",0) 
			->get('consultation_mission')
			->result_array();
			$consultation_mission = array_column($consultation_mission, 'id');
  
			$where  ="(general_mission.follow_up_employee = $user_id OR general_mission.responsible_employee = $user_id) AND general_mission.is_close = 0";
			$general_mission =  $this->db->select("general_mission.id")
 	        ->join('c_case', "c_case.id = general_mission.case_id", 'left')
			->where("$where", NULL, FALSE)
			->where("general_mission.status",0) 
			->get('general_mission')
			->result_array();
			$general_mission = array_column($general_mission, 'id');
  
			$where  ="(visiting_mission.follow_up_employee = $user_id OR visiting_mission.responsible_employee = $user_id) AND visiting_mission.is_close = 0";
			$visiting_mission =  $this->db->select("visiting_mission.id")
 	        ->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
			->where("$where", NULL, FALSE)
			->where("visiting_mission.status",0) 
			->get('visiting_mission')
			->result_array();
			$visiting_mission = array_column($visiting_mission, 'id');
  
			$where  ="(writing_misssion.follow_up_employee = $user_id OR writing_misssion.responsible_employee = $user_id) AND writing_misssion.is_close = 0";
			$writing_misssion =  $this->db->select("writing_misssion.id")
 	        ->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
			->where("$where", NULL, FALSE)
			->where("writing_misssion.status",0) 
			->get('writing_misssion')
			->result_array();
			$writing_misssion = array_column($writing_misssion, 'id');
			
			$session_mission = implode(",",$session_mission);
			$consultation_mission = implode(",",$consultation_mission);
			$general_mission = implode(",",$general_mission);
			$visiting_mission = implode(",",$visiting_mission);
			$writing_misssion = implode(",",$writing_misssion);
		/* 	if($session_mission){
				$where .= "(app_id IN ($session_mission) AND type= 'session')";
			}
			if($consultation_mission){
				if($session_mission){ $where .= "OR "; }
				$where .= "(app_id IN ($consultation_mission) AND type= 'consultati')";
			}
			if($general_mission){
				if($consultation_mission){ $where .= "OR "; }
				$where .= "(app_id IN ($general_mission) AND type= 'general')";
			}
			if($visiting_mission){
				if($general_mission){ $where .= "OR "; }
				$where .= "(app_id IN ($visiting_mission) AND type= 'visiting')";
			}
			if($writing_misssion){
				if($visiting_mission){ $where .= "OR "; }
				$where .= "(app_id IN ($writing_misssion) AND type= 'writing')";
			} */
			$project_data=$this->db->select('*') 
			->get('add_project')
			->result_array();
			foreach($project_data as $pd){ 
				if(in_array($this->session->userdata('admin_id'),getGroupByID($pd['add_group'])) ){
					$pdata[] = $pd['id'];
				}
			}
			$project_data = implode(",",$pdata);
			
			$notification =  $this->db->select("id,app_id,note,type,create_date,view")
			->or_group_start()
				->where_in('app_id', $session_mission)
				->where('type', 'session')
			 ->group_end()
			
			->or_group_start()
				->where_in('app_id', $consultation_mission)
				->where('type', 'consultati')
			 ->group_end()
			 
			->or_group_start()
				->where_in('app_id', $visiting_mission)
				->where('type', 'general')
			 ->group_end()
			 
			->or_group_start()
				->where_in('app_id', $writing_misssion)
				->where('type', 'writing')
			 ->group_end()
			 
			->or_group_start()
				->where_in('app_id', $general_mission)
				->where('type', 'general')
			 ->group_end() 
			 
			->or_group_start()
				->where('user_id', $user_id)
				->where('type', 'fine')
			 ->group_end()
			 
			->or_group_start()
				->where('user_id', $user_id)
				->where('type', 'hre')
			 ->group_end()
			 
			->or_group_start()
				->where_in('app_id', $project_data)
				->where('type', 'project')
			 ->group_end()
			 
			->get('case_note')
			->result_array();
			
			
			return $notification;
		}
 
	public function no_of_emp()  
	{
		$q=$this->db->select("u.id,u.name,e.branch,e.id as eid,e.employee_type")
		->from('employee e')
		->join('users u','u.id=e.user_id')
		->where(['role_id'=>2,'status'=>1,'is_delete'=>0])->order_by('e.id','desc')
		->get();
		return $q->num_rows();
	}

	public function no_of_cus() //number of customer diaplaqy karva mate
	{
		if($this->session->userdata('role_id') == 1){
		$q = $this->db->get('customers');
		} else {
				$q = $this->db->where(['user_id' => $this->session->userdata('admin_id')])->get('customers');
	
		}
		return $q->num_rows();
	}

	public function no_of_case() //number of case displlay karva mate
	{


		if($this->session->userdata('role_id') == 1){
		$q = $this->db->order_by("id", "ASC")->where('active_inactive',0)->get('c_case');
		} else {
    		$q = $this->db->where(['user_id' => $this->session->userdata('admin_id')])->or_where('follow_up_employee',$this->session->userdata('admin_id'))->or_where('responsible_employee',$this->session->userdata('admin_id'))->where('active_inactive',0)->get('c_case');
	
		}
		return $q->num_rows();
	}

	public function recent_case() //recent case display krava mate
	{
	
		if($this->session->userdata('role_id') == 1){
        $this->db->select('c_case.*,case_temp.case_id,case_temp.is_reject');
		$this->db->from('c_case');
		$this->db->join('case_temp','case_temp.case_id=c_case.id','left')->limit(12)->order_by("id", "desc"); 

		$q =   $this->db->get()->result_array();
		} else {
 
		$this->db->select('c_case.*,case_temp.case_id,case_temp.is_reject');
		$this->db->from('c_case');
		$this->db->join('case_temp','case_temp.case_id=c_case.id','left'); 
		$this->db->where('c_case.manager_id',$this->session->userdata('admin_id'));
		$this->db->or_where('c_case.follow_up_employee',$this->session->userdata('admin_id'));
		$this->db->or_where('c_case.responsible_employee',$this->session->userdata('admin_id'));
		$this->db->limit(12)->order_by("id", "desc");
		$q =   $this->db->get()->result_array();
		}
		return $q;
	}

	public function new_cus() //new customer display karva mate
	{
		if($this->session->userdata('role_id') == 1){
		$q = $this->db->select(['client_name', 'type_of_customer', 'client_file_number','id'])	->order_by("id", "desc")->limit(20)->get('customers');
		} else {
	$q = $this->db->select(['client_name', 'type_of_customer', 'client_file_number','id'])->where(['user_id' => $this->session->userdata('admin_id')])->limit(5)->get('customers');
		 
		}
	
		return $q->result_array();
	}

	public function rec_activity_cus() //recente activity count karva mate
	{
		return $this->db->select(['customer_id','client_name', 'number_of_customer', 'id', 'add_edit'])
			->get('customers_temp')
			->result_array();
	}

	public function emp_name() //employee name fetch karva mate
	{
		return $this->db->select(['id', 'name'])
			->where('role_id', 2)
			->get('users')
			->result_array();
	}

	public function admin_name() //admin name fetch karva mate
	{
		return $this->db->select(['id', 'name'])
			->where('role_id', 1)
			->get('users')
			->result_array();
	}

	public function rec_activity_emp() //recnet activity na employee display karva mate
	{
		return $this->db->select(['user_id', 'name', 'admin_id', 'add_edit'])
			->get('employee_temp')
			->result_array();
	}

	public function rec_activity_case() //recent case display karva mate
	{
/* 		return $this->db->select(['c.identification_number', 'c.case_number', 'c.add_edit', 'u.name'])
			->from('case_temp c')
			->join('users u', 'c.identification_number=u.id')
			->order_by("c.id", "desc")
			->get()
			->result_array();	 */
			
			return $this->db->select(['*'])
			->from('case_temp')
			->order_by("id", "desc")
			->get()
			->result_array();
	}
	public function all_report()
	{
		
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');

		$next_week_start_date = strtotime(date('Y-m-d', strtotime('next week monday')));
		$previous_week_end_date = strtotime(date('Y-m-d', strtotime('next week sunday')));

		$next_day_first =  strtotime(date('Y-m-d',strtotime('first day of +1 month')));
		$next_day_last = strtotime(date('Y-m-d',strtotime('last day of +1 month')));

		$all_report = array();

		// Project 		
		$timeSQL = '';
		$timeSQL = ' sum(starting_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(starting_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(starting_date >= "'.$next_week_start_date.'" AND starting_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(starting_date >= "'.$next_day_first.'" AND starting_date <= "'.$next_day_last.'" ) as next_month';
    	if($role_id == 1)
    	{
	    	//$Sql = "SELECT ".$timeSQL." FROM add_project";
	    	$Sql = "SELECT starting_date FROM add_project";
	 	}
	 	else
	 	{
			//$Sql = "SELECT ".$timeSQL." FROM add_project where user_id = '".$user_id."'";
			$Sql = "SELECT starting_date FROM add_project where user_id = '".$user_id."'";
	 	}
			
		$project  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($project as $date){
			$date = explode('/',$date['starting_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			if($date == date('Y-m-d')){ $td++; }
			if($date == date('Y-m-d', strtotime(' +1 day'))){ $tw++; }
			if(strtotime($date) >= $next_week_start_date){ $nw++; }
			if(strtotime($date) >= $next_day_last){ $nm++; }
		}
		$all_report[0][1] = $td; 
		$all_report[1][1] = $tw; 
		$all_report[2][1] = $nw; 
		$all_report[3][1] = $nm; 
		
/* 
	 	$project = $this->db->query($Sql)->row_array();
	 	$all_report[0][1] = $project['today']; 
		$all_report[1][1] = $project['tomorrow']; 
		$all_report[2][1] = $project['next_week']; 
		$all_report[3][1] = $project['next_month'];  */

		// Task  		
		$timeSQL = '';
		$timeSQL = ' sum(starting_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(starting_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(starting_date >= "'.$next_week_start_date.'" AND starting_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(starting_date >= "'.$next_day_first.'" AND starting_date <= "'.$next_day_last.'" ) as next_month';
	    
	    if($role_id == 1)
    	{
    		//$Sql = "SELECT ".$timeSQL." FROM assignment";
    		$Sql = "SELECT starting_date FROM assignment";
	 	}
	 	else
	 	{
	 		//$Sql = "SELECT ".$timeSQL." FROM assignment where user_id='".$user_id."'";
	 		$Sql = "SELECT starting_date  FROM assignment where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."' ";
	 	}
		
		$task  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($task as $date){
			$date = explode('/',$date['starting_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			if(strtotime($date) == strtotime(date('Y-m-d'))){ $td++; }
			if(strtotime($date)  == strtotime(date('Y-m-d', strtotime(' +1 day')))){ $tw++; }
			if(strtotime($date) >= $next_week_start_date){ $nw++; }
			if(strtotime($date) >= $next_day_last){ $nm++; }
		}
		$all_report[0][2] = $td; 
		$all_report[1][2] = $tw; 
		$all_report[2][2] = $nw; 
		$all_report[3][2] = $nm; 
	 /* $task  = $this->db->query($Sql)->row_array();

	 	$all_report[0][2] = $task['today']; 
		$all_report[1][2] = $task['tomorrow']; 
		$all_report[2][2] = $task['next_week']; 
		$all_report[3][2] = $task['next_month']; 
	 	 */

	 	// consultation_appoinment  		
		$timeSQL = '';
		$timeSQL = ' sum(session_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(session_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(session_date >= "'.$next_week_start_date.'" AND session_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(session_date >= "'.$next_day_first.'" AND session_date <= "'.$next_day_last.'" ) as next_month';
	    
   		if($role_id == 1)
    	{
	    	//$Sql = "SELECT ".$timeSQL." FROM consultation_mission";
	    	$Sql = "SELECT session_date FROM consultation_mission";
			
		}
		else
		{
			//$Sql = "SELECT ".$timeSQL." FROM consultation_mission where user_id='".$user_id."'";
			$Sql = "SELECT session_date FROM consultation_mission where user_id='".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'";
		}
		$consultation  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($consultation as $date){
			$date = explode('/',$date['session_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			if(strtotime($date) == strtotime(date('Y-m-d'))){ $td++; }
			if(strtotime($date)  == strtotime(date('Y-m-d', strtotime(' +1 day')))){ $tw++; }
			if(strtotime($date) >= $next_week_start_date){ $nw++; }
			if(strtotime($date) >= $next_day_last){ $nm++; }
		}
		$all_report[0][3] = $td; 
		$all_report[1][3] = $tw; 
		$all_report[2][3] = $nw; 
		$all_report[3][3] = $nm; 

		// visiting_appoinment  		
		$timeSQL = '';
		$timeSQL = ' sum(session_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(session_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(session_date >= "'.$next_week_start_date.'" AND session_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(session_date >= "'.$next_day_first.'" AND session_date <= "'.$next_day_last.'" ) as next_month';
   		if($role_id == 1)
    	{
	 	  // $Sql = "SELECT ".$timeSQL." FROM visiting_mission";
	 	   $Sql = "SELECT session_date FROM visiting_mission";
		}
		else
		{
		  // $Sql = "SELECT ".$timeSQL." FROM visiting_mission where user_id='".$user_id."'";
		   $Sql = "SELECT session_date FROM visiting_mission where user_id='".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'";
		}
 
		$visiting  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($visiting as $date){
			$date = explode('/',$date['session_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			if(strtotime($date) == strtotime(date('Y-m-d'))){ $td++; }
			if(strtotime($date)  == strtotime(date('Y-m-d', strtotime(' +1 day')))){ $tw++; }
			if(strtotime($date) >= $next_week_start_date){ $nw++; }
			if(strtotime($date) >= $next_day_last){ $nm++; }
		}
		$all_report[0][4] = $td; 
		$all_report[1][4] = $tw; 
		$all_report[2][4] = $nw; 
		$all_report[3][4] = $nm; 

/* 		$all_report[0][4] = $visiting['today']; 
		$all_report[1][4] = $visiting['tomorrow']; 
		$all_report[2][4] = $visiting['next_week']; 
		$all_report[3][4] = $visiting['next_month']; 
 */

	 	// writings_appoinment  		
	 	$Project  = $this->db->query($Sql)->row_array(); 		
		$timeSQL = '';
		$timeSQL = ' sum(session_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(session_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(session_date >= "'.$next_week_start_date.'" AND session_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(session_date >= "'.$next_day_first.'" AND session_date <= "'.$next_day_last.'" ) as next_month';
	    if($role_id == 1)
    	{
	    	//$Sql = "SELECT ".$timeSQL." FROM writing_misssion";
	    	$Sql = "SELECT session_date FROM writing_misssion";
	 	}
	 	else
	 	{
	 		$Sql = "SELECT session_date FROM writing_misssion where user_id = '".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'";
	 		//$Sql = "SELECT ".$timeSQL." FROM writing_misssion where user_id = '".$user_id."'";
	 	}
		$writings  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($writings as $date){
			$date = explode('/',$date['session_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			if(strtotime($date) == strtotime(date('Y-m-d'))){ $td++; }
			if(strtotime($date)  == strtotime(date('Y-m-d', strtotime(' +1 day')))){ $tw++; }
			if(strtotime($date) >= $next_week_start_date){ $nw++; }
			if(strtotime($date) >= $next_day_last){ $nm++; }
		}
		$all_report[0][5] = $td; 
		$all_report[1][5] = $tw; 
		$all_report[2][5] = $nw; 
		$all_report[3][5] = $nm; 
		
	 //	$writings  = $this->db->query($Sql)->row_array();

/* 	 	$all_report[0][5] = $writings['today']; 
		$all_report[1][5] = $writings['tomorrow']; 
		$all_report[2][5] = $writings['next_week']; 
		$all_report[3][5] = $writings['next_month'];  */

	 	// session_appoinment  		
	 	$Project  = $this->db->query($Sql)->row_array(); 		
		$timeSQL = '';
		$timeSQL = ' sum(session_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(session_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(session_date >= "'.$next_week_start_date.'" AND session_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(session_date >= "'.$next_day_first.'" AND session_date <= "'.$next_day_last.'" ) as next_month';
        if($role_id == 1)
    	{
		     //$Sql = "SELECT ".$timeSQL." FROM session_mission";
		     $Sql = "SELECT session_date FROM session_mission";
	 	}
	 	else
	 	{ 
 	 	   // $Sql = "SELECT ".$timeSQL." FROM session_mission where user_id = '".$user_id."'";
	 	    $Sql = "SELECT session_date FROM session_mission where user_id = '".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'";
	 	}
	 	//$session  = $this->db->query($Sql)->row_array();
		$session  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($session as $date){

			$date = explode('/',$date['session_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			
			/*echo $date;
			echo "<br>";
			echo strtotime(date('Y-m-d'));
			echo "<br>";		
			echo date('Y-m-d');
			echo "<br>";
			echo strtotime($date) ;
			echo "<br>";	 */
			if(strtotime($date) == strtotime(date('Y-m-d'))){ $td++; }
			if(strtotime($date)  == strtotime(date('Y-m-d', strtotime(' +1 day')))){ $tw++; }
			if($date >= $next_week_start_date){ $nw++; }
			if($date >= $next_day_last){ $nm++; }
		}
		$all_report[0][6] = $td; 
		$all_report[1][6] = $tw; 
		$all_report[2][6] = $nw; 
		$all_report[3][6] = $nm; 
		




		// general  		
	 	$Project  = $this->db->query($Sql)->row_array(); 		
		$timeSQL = '';
		$timeSQL = ' sum(session_date = CURDATE()) AS today,';
	 	$timeSQL .= ' sum(session_date =  CURDATE() + INTERVAL 1 DAY) as tomorrow,';
    	$timeSQL .= ' sum(session_date >= "'.$next_week_start_date.'" AND session_date <= "'.$previous_week_end_date.'" ) as next_week , ';
    	$timeSQL .= ' sum(session_date >= "'.$next_day_first.'" AND session_date <= "'.$next_day_last.'" ) as next_month';
        if($role_id == 1)
    	{
		     $Sql = "SELECT session_date FROM general_mission";
	 	}
	 	else
	 	{
	 	    $Sql = "SELECT session_date FROM general_mission where user_id = '".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'";
	 	}
	 	//$general  = $this->db->query($Sql)->row_array();
		$general  = $this->db->query($Sql)->result_array(); 		
		$td=0;
		$tw=0;
		$nw=0;
		$nm=0;
		foreach($general as $date){
			$date = explode('/',$date['session_date']);
			$date = $date[2]."-".$date[1]."-".$date[0];
			if(strtotime($date) == strtotime(date('Y-m-d'))){ $td++; }
			if(strtotime($date)  == strtotime(date('Y-m-d', strtotime(' +1 day')))){ $tw++; }
			if(strtotime($date) >= $next_week_start_date){ $nw++; }
			if(strtotime($date) >= $next_day_last){ $nm++; }
		}
		$all_report[0][7] = $td; 
		$all_report[1][7] = $tw; 
		$all_report[2][7] = $nw; 
		$all_report[3][7] = $nm; 
		

/* 
	 	$all_report[0][6] = $session['today']; 
		$all_report[1][6] = $session['tomorrow']; 
		$all_report[2][6] = $session['next_week']; 
		$all_report[3][6] = $session['next_month']; 
		
	 	$all_report[0][7] = $general['today']; 
		$all_report[1][7] = $general['tomorrow']; 
		$all_report[2][7] = $general['next_week']; 
		$all_report[3][7] = $general['next_month'];  */


		
		$all_report[0][8] = $this->lang->line('Today'); 
		$all_report[1][8] = $this->lang->line('Tomorrow'); 
		$all_report[2][8] = $this->lang->line('Next_Week');  
		$all_report[3][8] = $this->lang->line('Next_Month'); 


		return $all_report;
	}
	public function all_report_re()
	{
		$todaydate = date('Y-m-d');
		$todaydate=date('Y-m-d', strtotime($todaydate));
 
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
 
		$all_report = array();
 
   		if($role_id == 1)
    	{
 	    	$Sql = "SELECT session_date,session_end_date FROM consultation_mission  WHERE is_close = 0";
 	    	$Sql1 = "SELECT session_date,session_end_date FROM consultation_mission WHERE is_close = 1";
			
		}
		
        else if(in_array($this->session->userdata('admin_id'),getFileManager())){
 
		    $Sql = "SELECT `consultation_mission`.*, `c_case`.`id` as `case_id` FROM `consultation_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `consultation_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND consultation_mission.is_close = 0)";
			$Sql1 = "SELECT `consultation_mission`.*, `c_case`.`id` as `case_id` FROM `consultation_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `consultation_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND consultation_mission.is_close = 1)";

    	}
		else
		{
			$Sql = "SELECT session_date,session_end_date FROM consultation_mission where user_id='".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'  AND is_close = 0";
			$Sql1 = "SELECT session_date,session_end_date FROM consultation_mission where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'  AND is_close=1";
		}
		$consultation  = $this->db->query($Sql)->result_array(); 		
		$consultation1  = $this->db->query($Sql1)->result_array(); 	
		$ccc  = $this->db->query($Sql1)->num_rows(); 	
		$close=0;
		$run=0;
		foreach($consultation as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
			if ((strtotime($todaydate) >= strtotime($session_date)) && (strtotime($todaydate) <= strtotime($session_end_date))){
	
				 $run++;
			}
		}
		foreach($consultation1 as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
		if ((strtotime($todaydate) >= strtotime($session_date)) && (strtotime($todaydate) <= strtotime($session_end_date))){
				 $close++;
			}
		}
		$all_report[0][3] = $run; 
		$all_report[1][3] = $ccc; 
 

		// visiting_appoinment  		
  
	 if($role_id == 1)
    	{
 	    	$Sql = "SELECT session_date,session_end_date FROM visiting_mission WHERE is_close = 0";
 	    	$Sql1 = "SELECT session_date,session_end_date FROM visiting_mission WHERE is_close = 1";
		}
			
        else if(in_array($this->session->userdata('admin_id'),getFileManager())){
 
		    $Sql = "SELECT `visiting_mission`.*, `c_case`.`id` as `case_id` FROM `visiting_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `visiting_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND visiting_mission.is_close = 0)";
			$Sql1 = "SELECT `visiting_mission`.*, `c_case`.`id` as `case_id` FROM `visiting_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `visiting_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND visiting_mission.is_close = 1)";

    	}
		else
		{
			$Sql = "SELECT session_date,session_end_date FROM visiting_mission where user_id='".$user_id."' OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'  AND is_close = 0";
	
			$Sql1 = "SELECT session_date,session_end_date FROM visiting_mission where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."'  AND is_close=1";
		}
		$visiting   = $this->db->query($Sql)->result_array(); 		
		$visiting1  = $this->db->query($Sql1)->result_array(); 		
		$ccc  = $this->db->query($Sql1)->num_rows(); 	
		$close=0;
		$run=0;
		foreach($visiting as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
		if ((strtotime($todaydate) >= strtotime($session_date)) && (strtotime($todaydate) <= strtotime($session_end_date))){
				 $run++;
			}
		}
		foreach($visiting1 as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
			if (($todaydate >= $session_date) && ($todaydate <= $session_end_date)){
				 $close++;
			}
		}
 		$all_report[0][4] = $run; 
		$all_report[1][4] = $ccc; 
	// writings_appoinment  		
  
	 if($role_id == 1)
    	{
 	    	$Sql = "SELECT session_date,session_end_date FROM writing_misssion WHERE is_close = 0";
 	    	$Sql1 = "SELECT session_date,session_end_date FROM writing_misssion WHERE is_close = 1";
			
		}
		
        else if(in_array($this->session->userdata('admin_id'),getFileManager())){
 
		    $Sql = "SELECT `writing_misssion`.*, `c_case`.`id` as `case_id` FROM `writing_misssion` LEFT JOIN `c_case` ON `c_case`.`id` = `writing_misssion`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND writing_misssion.is_close = 0)";
			$Sql1 = "SELECT `writing_misssion`.*, `c_case`.`id` as `case_id` FROM `writing_misssion` LEFT JOIN `c_case` ON `c_case`.`id` = `writing_misssion`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND writing_misssion.is_close = 1)";

    	}
		else
		{
			$Sql = "SELECT session_date,session_end_date FROM writing_misssion where (user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."')  AND is_close = 0";
			$Sql1 = "SELECT session_date,session_end_date FROM writing_misssion where (user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."')  AND is_close=1";
		}
		$writing   = $this->db->query($Sql)->result_array(); 		
		$writing1  = $this->db->query($Sql1)->result_array(); 	
		$ccc  = $this->db->query($Sql1)->num_rows(); 			
		$close=0;
		$run=0;
		foreach($writing as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
		if ((strtotime($todaydate) >= strtotime($session_date)) && (strtotime($todaydate) <= strtotime($session_end_date))){
				 $run++;
			}
		}
		foreach($writing1 as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
			if (($todaydate >= $session_date) && ($todaydate <= $session_end_date)){
				 $close++;
			}
		}
 		$all_report[0][5] = $run; 
		$all_report[1][5] = $ccc; 
 
	// session_appoinment  		
	    
	 if($role_id == 1)
    	{
 	    	$Sql = "SELECT session_date,session_end_date FROM session_mission WHERE is_close = 0";
 	    	$Sql1 = "SELECT session_date,session_end_date FROM session_mission WHERE is_close = 1";
 
		}
        else if(in_array($this->session->userdata('admin_id'),getFileManager())){
 
		    $Sql = "SELECT `session_mission`.*, `c_case`.`id` as `case_id` FROM `session_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `session_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND session_mission.is_close = 0)";
			$Sql1 = "SELECT `session_mission`.*, `c_case`.`id` as `case_id` FROM `session_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `session_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND session_mission.is_close = 1)";

    	}
		else
		{
				$Sql = "SELECT session_date,session_end_date FROM session_mission where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."' AND is_close = 0";
			$Sql1 = "SELECT session_date,session_end_date FROM session_mission where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."' AND is_close=1";
		}
		$session  = $this->db->query($Sql)->result_array(); 		
		$session1  = $this->db->query($Sql1)->result_array(); 
		$ccc  = $this->db->query($Sql1)->num_rows(); 			
		$close=0;
		$run=0;
		foreach($session as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
			if ((strtotime($todaydate) >= strtotime($session_date)) && (strtotime($todaydate) <= strtotime($session_end_date))){
				 $run++;
			}
		}
		foreach($session1 as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
			if (($todaydate >= $session_date) && ($todaydate <= $session_end_date)){
				 $close++;
			}
		}
 		$all_report[0][6] = $run; 
		$all_report[1][6] = $ccc; 
	// general  		
         if($role_id == 1)
    	{
 	    	$Sql = "SELECT session_date,session_end_date FROM general_mission WHERE is_close = 0";
 	    	$Sql1 = "SELECT session_date,session_end_date FROM general_mission WHERE is_close = 1";
			
		}
        else if(in_array($this->session->userdata('admin_id'),getFileManager())){
 
		    $Sql = "SELECT `general_mission`.*, `c_case`.`id` as `case_id` FROM `general_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `general_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND general_mission.is_close = 0)";
			$Sql1 = "SELECT `general_mission`.*, `c_case`.`id` as `case_id` FROM `general_mission` LEFT JOIN `c_case` ON `c_case`.`id` = `general_mission`.`case_id` WHERE (c_case.manager_id='".$user_id."' AND general_mission.is_close = 1)";

    	}
		else
		{
			$Sql = "SELECT session_date,session_end_date FROM general_mission where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."' AND is_close = 0";
			$Sql1 = "SELECT session_date,session_end_date FROM general_mission where user_id='".$user_id."'  OR follow_up_employee = '".$user_id."' OR responsible_employee = '".$user_id."' AND is_close=1";
		}
		$general  = $this->db->query($Sql)->result_array(); 		
		$general1  = $this->db->query($Sql1)->result_array(); 		
		$ccc  = $this->db->query($Sql1)->num_rows(); 		
		$close=0;
		$run=0;
		foreach($general as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
		if ((strtotime($todaydate) >= strtotime($session_date)) && (strtotime($todaydate) <= strtotime($session_end_date))){
				 $run++;
			}
		}
		foreach($general1 as $date){
			$session_date = explode('/',$date['session_date']);
			$session_date = $session_date[2]."-".$session_date[1]."-".$session_date[0];
		
			$session_end_date = explode('/',$date['session_end_date']);
			$session_end_date = $session_end_date[2]."-".$session_end_date[1]."-".$session_end_date[0];
			if (($todaydate >= $session_date) && ($todaydate <= $session_end_date)){
				 $close++;
			}
		}
		$all_report[0][7] = $run; 
		$all_report[1][7] = $ccc; 
 
 
 
		 if($role_id == 1)
    	{
 	    	$Sql = "SELECT starting_date FROM assignment";
     		$assign  = $this->db->query($Sql)->num_rows(); 	
		}
        else if(in_array($this->session->userdata('admin_id'),getFileManager())){
		$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.user_id, assignment.customer_id,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('c_case.active_inactive','0');
	        $this->db->where('c_case.responsible_employee',$this->session->userdata('admin_id'));  
            $this->db->or_where('c_case.follow_up_employee',$this->session->userdata('admin_id'));  
			$this->db->order_by("assignment.id", "desc");	
            $this->db->group_by("assignment.id");
		    $assign=$this->db->get()->num_rows();
    	}
		else
		{
			  $this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee as res,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('c_case.active_inactive','0');
	        $this->db->where('assignment.responsible_employee',$this->session->userdata('admin_id'));  
            $this->db->or_where('assignment.follow_up_employee',$this->session->userdata('admin_id'));  
			$this->db->order_by("assignment.id", "desc");	
			$this->db->group_by("assignment.id");
		    $assign=$this->db->get()->num_rows();
        }
        
 
		$all_report[0][8] = $assign; 
		$all_report[1][8] = '-'; 

		$all_report[0][9] = $this->lang->line('Running');
		$all_report[1][9] = $this->lang->line('Close'); 
 


		return $all_report;
	}
      
}

?>