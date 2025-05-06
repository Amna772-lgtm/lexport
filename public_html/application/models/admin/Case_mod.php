<?php
class case_mod extends CI_model {
	public function case_no() //case number display krava mate
	{
		 $no =  $this->db->select_max('id')
			->get('c_case')
			->row_array();

			return $this->db->select(['case_number'])
					->where(['id'=>$no['id']])
					->get('c_case')->row_array();

	}

	public function dis_services($lan='') //services display karva mate
	{
	    if($lan == 'ar'){
		$ser = $this->db->select(['id', 'name'])->order_by("id", "desc")
			->get('services');
	    }else { 
	        $ser = $this->db->select(['id', 'name_en'])->order_by("id", "desc")
			->get('services');
	    }
		return $ser->result_array();
	}
	public function case_type($lan="") //services display karva mate
	{
	     if($lan == 'ar'){
		$ct= $this->db->select(['id','service_id','name'])->order_by("id", "desc")
			->get('case_type');
	     } else {
	         	$ct= $this->db->select(['id','service_id','name_en as name'])->order_by("id", "desc")
			->get('case_type');
	     }
		return $ct->result_array();
	}
public function get_employee()//admin nu list display karva mate
	{
				$user_id = $this->session->userdata('admin_id');
		$q=$this->db->select(['id','name'])
				->where("(role_id = 2 AND status=1 AND is_delete = 0 AND id !=$user_id )", NULL, FALSE)
				->order_by("id", "desc")
				->get('users');
		return $q->result_array();
	}

	public function dis_department() //department display krav mate
	{
		$dip = $this->db->select(['id', 'd_name'])
			->get('department');
		return $dip->result_array();
	}

	public function dis_cus() //customer nu list display karva mate
	{
		$cus = $this->db->select(['name', 'id'])
			->where(['role_id' => 3, 'status' => 1])->order_by("id", "desc")
			->get('users');
		return $cus->result_array();
	}

	public function list_case() //all case nu list display karva mate
	{
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
		//	return $this->db->select(['id','client_name','case_number','service_types','contact_number','client_file_number'])->where(['active_inactive'=>0])->get('c_case')->result_array();
		$this->db->select('c_case.*,case_temp.case_id');
			$this->db->from('c_case');
			$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
			$this->db->where('c_case.active_inactive','0');
			$this->db->order_by("c_case.id", "desc");
			return  $query=$this->db->get()->result_array();
		}else
		{
			$this->db->select('c_case.*,case_temp.case_id');
			$this->db->from('c_case');
			$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.user_id',$this->session->userdata('admin_id'));  
            $this->db->or_where('c_case.follow_up_employee',$this->session->userdata('admin_id'));  
             $this->db->or_where('c_case.responsible_employee',$this->session->userdata('admin_id'));  
			$this->db->order_by("c_case.id", "desc");
            $this->db->group_by("c_case.id");
			return  $query=$this->db->get()->result_array();
		//	return $this->db->select(['id','client_name','service_types','contact_number','client_file_number'])->where(['active_inactive'=>0,'user_id'=>$user_id])->get('c_case')->result_array();
		}
		//return $this->db->select(['id','client_name','service_types','contact_number','client_file_number'])->where(['active_inactive'=>0])->get('c_case')->result_array();

	}
	public function list_assignment_case()  
	{
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			$this->db->select('c_case.*,assignment.case_id,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.follow_up_employee,assignment.responsible_employee, assignment.customer_id,assignment.user_id as uid,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('c_case.active_inactive','0');
			$this->db->order_by("assignment.id", "desc");	
            $this->db->group_by("assignment.id");
			return  $query=$this->db->get()->result_array();
		}
		  else  if(in_array($this->session->userdata('admin_id'),getFileManager())){
            $this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.user_id, assignment.customer_id,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('c_case.active_inactive','0');
	        $this->db->where('assignment.responsible_employee',$this->session->userdata('admin_id'));  
            $this->db->or_where('assignment.follow_up_employee',$this->session->userdata('admin_id'));  
			$this->db->order_by("assignment.id", "desc");	
            $this->db->group_by("assignment.id");
			return  $query=$this->db->get()->result_array();
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
			return  $query=$this->db->get()->result_array();
		}

	}
public function list_following_employee()  
	{
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee as res,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('assignment.follow_up_employee !=',0);  
			$this->db->where('c_case.active_inactive','0');
			$this->db->order_by("assignment.id", "desc");	
            $this->db->group_by("assignment.id");
			return  $query=$this->db->get()->result_array();
		} else {
			$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee as res,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.follow_up_employee=c_case.follow_up_employee');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('assignment.follow_up_employee',$this->session->userdata('admin_id'));  
			$this->db->order_by("assignment.id", "desc");	
			$this->db->group_by("assignment.id");
			return  $query=$this->db->get()->result_array();
		}

	}
	public function list_responsible_employee()  
		{
			$user_id = $this->session->userdata('admin_id');
			$role_id = $this->session->userdata('role_id');
			
			if($role_id == 1){
				$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.note as assign_note');
				$this->db->from('c_case');
				$this->db->join('assignment','assignment.case_id=c_case.id');
				$this->db->where('assignment.responsible_employee !=',0);  
				$this->db->where('c_case.active_inactive','0');
				$this->db->order_by("assignment.id", "desc");	 
		       $this->db->group_by("assignment.id");
				return  $query=$this->db->get()->result_array();
			}else
			{
				$this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee, assignment.starting_date,assignment.ending_date,
				assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.note as assign_note');
				$this->db->from('c_case');
				$this->db->join('assignment',"assignment.responsible_employee=$user_id",'left');
				$this->db->where('c_case.active_inactive','0');
				$this->db->where('assignment.responsible_employee',$this->session->userdata('admin_id'));  
                $this->db->order_by("assignment.id", "desc");
                $this->db->group_by("assignment.id");
				return  $query=$this->db->get()->result_array();
			}

		}

	public function padding_case() //padding cases display karva mate
	{
		return $this->db->select('*')->where(['is_reject'=>0])->order_by("id", "desc")->get('case_temp')->result_array();

	}
	public function reject_case_list() 
	{
		return $this->db->select(['case_id','client_name','customers_id','is_reject','service_types','contract_number','add_edit','reject_note'])->where(['is_reject'=>1])->order_by("id", "desc")->get('case_temp')->result_array();

	}
	public function store_case($post) //case store karavyo
	{
		if(isset($post['case_id']))
		{
			unset($post['case_id']);
		}
		$this->db->insert('c_case',$post);
		$id=$this->db->insert_id();	$cid=$this->db->insert_id();
		unset($post['active_inactive']);
		$post['case_id']=$id;
		isset($post['customers_id']) ? $noti['customer_id'] = $post['customers_id']:$noti['customer_id'] = '';
		$noti['case_id'] = $post['case_id'];
		$noti['notification_type'] = 'case';
		$noti['status_type'] = 'add';
		$noti['create_date']=date("Y-m-d G:i:s");
		$this->db->insert('notification', $noti);
		$users=$this->db->select('*')->where('id',$post['customers_id'])->get('users')->row_array(); 
		$email = $users['email'];
		$name = $users['name']; 
		$phone = $users['phone']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);

		$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];
		$from_email = constant("FROM_EMAIL");
		$to_email = $email;
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject($this->lang->line('E_Service_delivery').' - '.constant("SENDER_NAME"));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
	    $this->db->insert('case_temp',$post);
        if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
            $msg ="شريكنا العزيز لقد تسلَّمنا طلب خدمة قانونية رقم ". getCaseNumber($noti['case_id'])." وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.";
       } else { 
    	    $msg ="We received your request for legal service No.". getCaseNumber($noti['case_id'])." and we will always update you. For details, please visit any of “Nassr” platforms. ";
       }
    	sendSMSProcess($phone,$msg);
		if( $this->session->userdata('admin_id') == ''){
    	$users=$this->db->select('*')->where('id',$this->session->userdata('user_id'))->get('users')->row();
    	$email = $users->email;
    	$name = $users->name; 
    	$phone = $users->phone; 
    	$enumber = 	$post['case_number'];	
    	$config = Array(
    		'mailtype' => 'html',
    		'charset' => 'utf-8',
    		'priority' => '1',
    	);
    	$this->load->library('email', $config);
    	
        if($this->session->userdata('site_lang')=="arabic"  ) { $lan = "ar";}else {$lan = "en";}
        $adminuser=$this->db->select('email')->where('role_id',1)->get('users')->result_array();
        foreach($adminuser as $adminuser){
         
    	    $new = ['enumber' => $enumber,'email' => $email,'sub' => 'admin_email_service','role_id' => 3,'name'=>$name,'phone'=>$phone,'lan'=>$lan];
    		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
    		$this->email->set_header('Content-type', 'text/html');
    		$this->email->from($from_email, constant("SENDER_NAME"));
    		$this->email->to($adminuser['email']);
    		$this->email->subject('New service added by '.$name.' - '.constant("SENDER_NAME"));
    	 	$body = $this->load->view('email.php', $new, true);
    		$this->email->message($body);
        	$this->email->send();   
        } 
		} 
		 
		return $cid;
	}

	public function document_upload($files) {
		return $this->db->insert('document', $files);
	}

	public function approve_case($id) //case approve karva mate
	{
		$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row_array();
		
		$case['active_inactive']=0;
		$noti['case_id'] = $case['case_id'];
		$noti['customer_id'] = $case['customers_id'];
		$cust['customers_id'] = $case['customers_id'];
		$cust['identification_number'] = $case['identification_number'];
		$cust['other_service_types'] = $case['other_service_types'];
		$cust['other_identification_types'] = $case['other_identification_types'];
		$cust['identification_types'] = $case['identification_types'];
		$cust['client_file_number'] = $case['client_file_number'];
		$cust['client_name'] = $case['client_name'];
		$cust['branch'] = $case['branch'];
		$cust['service_types'] = $case['service_types'];
	

		$users=$this->db->select('*')->where('id',$case['customers_id'])->get('users')->row_array(); 
		$users=$this->db->select('*')->where('id',$case['customers_id'])->get('users')->row_array();
		
		$cust['district'] = $users['district'];
        $cust['contact_number'] = $users['phone'];
		$noti['notification_type'] = 'case';
        $noti['create_date']=date("Y-m-d G:i:s");
		if ($case['add_edit'] == 1) {
			$noti['status_type'] = 'change-approve ';
		} else {
			$noti['status_type'] = 'approve';
		}
	
		$this->db->insert('notification', $noti);
		
		unset($case['case_id'],$case['add_edit'],$case['id']);
		
		$customers=$this->db->select('*')->where('customers_id',$case['customers_id'])->get('customers')->row_array();
		if(!$customers){
			$this->db->insert('customers', $cust);
		} else {
    		$case['manager_id'] = $customers['user_id'];
        	$case['user_id'] = $customers['user_id'];
		}
		$this->db->delete('case_temp',['case_id'=>$id]);
	if ($case['add_edit'] != 1) {

		$email = $users['email'];
		$name = $users['name']; 
		$phone = $users['phone']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);

		$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];
		$from_email = constant("FROM_EMAIL");
		$to_email = $email;
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject('Your Case Approved Successfully - '. constant("SENDER_NAME"));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
        if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
               $msg = "شريكنا العزيز: تم قبول طلب الخدمة القانونية رقم: ". getCaseNumber($noti['case_id'])." لمعرفة التفاصيل يرجى زيارة إحدى منصاتنا الإلكترونية";    
    	} else { 
     	    $msg = "Dear Partner: The request for E service No.". getCaseNumber($noti['case_id'])." was approved. For details, please visit one of “Nassr” platforms. App as in dashboard notification";
    	    
    	}

		sendSMSProcess($phone,$msg);
	}
		unset($case['is_reject'],$case['reject_note']);
	//	$case['user_id'] = $customers['user_id'];
		
		return $this->db->where('id',$id)->update('c_case',$case);
	}
public function approve_case_pending($id) //case approve karva mate
	{
		$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row_array();
		
		$case['active_inactive']=0;
		$noti['case_id'] = $case['case_id'];
		$noti['customer_id'] = $case['customers_id'];
		$cust['customers_id'] = $case['customers_id'];
		$cust['identification_number'] = $case['identification_number'];
		$cust['other_service_types'] = $case['other_service_types'];
		$cust['other_identification_types'] = $case['other_identification_types'];
		$cust['identification_types'] = $case['identification_types'];
		$cust['client_file_number'] = $case['client_file_number'];
		$cust['client_name'] = $case['client_name'];
		$cust['branch'] = $case['branch'];
		$cust['service_types'] = $case['service_types'];
	

		$users=$this->db->select('*')->where('id',$case['customers_id'])->get('users')->row_array(); 
		$users=$this->db->select('*')->where('id',$case['customers_id'])->get('users')->row_array();
		
		$cust['district'] = $users['district'];
        $cust['contact_number'] = $users['phone'];
		$noti['notification_type'] = 'case';
        $noti['create_date']=date("Y-m-d G:i:s");
		if ($case['add_edit'] == 1) {
			$noti['status_type'] = 'change-approve ';
		} else {
			$noti['status_type'] = 'approve';
		}
	
		$this->db->insert('notification', $noti);
		
		unset($case['case_id'],$case['add_edit'],$case['id']);
		
		$customers=$this->db->select('*')->where('customers_id',$case['customers_id'])->get('customers')->row_array();
		if(!$customers){
			$this->db->insert('customers', $cust);
		} else {
    		$case['manager_id'] = $customers['user_id'];
        	$case['user_id'] = $customers['user_id'];
		}
		$this->db->delete('case_temp',['case_id'=>$id]);
	if ($case['add_edit'] != 1) {

		$email = $users['email'];
		$name = $users['name']; 
		$phone = $users['phone']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);

		$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];
		$from_email = constant("FROM_EMAIL");
		$to_email = $email;
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject('Your Case Approved Successfully - '. constant("SENDER_NAME"));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
	//	$this->email->send();
        if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
               $msg = "شريكنا العزيز: تم قبول طلب الخدمة القانونية رقم: ". getCaseNumber($noti['case_id'])." لمعرفة التفاصيل يرجى زيارة إحدى منصاتنا الإلكترونية";    
    	} else { 
     	    $msg = "Dear Partner: The request for E service No.". getCaseNumber($noti['case_id'])." was approved. For details, please visit one of “Nassr” platforms. App as in dashboard notification";
    	    
    	}

	//	sendSMSProcess($phone,$msg);
	}
		unset($case['is_reject'],$case['reject_note']);
	//	$case['user_id'] = $customers['user_id'];
		
		return $this->db->where('id',$id)->update('c_case',$case);
	}
	public function delete_case($id) //case delete karva mate
	{
		$consultation_mission=$this->db->select('*')->where('case_id',$id)->get('consultation_mission')->row();
		if($consultation_mission){ return false; }
		$general_mission=$this->db->select('*')->where('case_id',$id)->get('general_mission')->row();
		if($general_mission){ return false; }
		$session_mission=$this->db->select('*')->where('case_id',$id)->get('session_mission')->row();
		if($session_mission){ return false; }
		$visiting_mission=$this->db->select('*')->where('case_id',$id)->get('visiting_mission')->row();
		if($visiting_mission){ return false; }
		
		$writing_misssion=$this->db->select('*')->where('case_id',$id)->get('writing_misssion')->row();
		if($writing_misssion){ return false; }
		
		$expense=$this->db->select('*')->where('case_id',$id)->get('expense')->row();
		if($expense){ return false; }
		
		$invoice=$this->db->select('*')->where('case_id',$id)->get('invoice')->row();
		if($invoice){ 
		    // return false;
		}
		
		$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row();
		if($case){
			$this->db->delete('case_temp',['case_id'=>$id]);
		}
		return $this->db->delete('c_case',['id'=>$id]);
	}
	public function find_case($id) //je case edit karva no 6e e find karva mate
	{
		$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row();
		if($case){
			return $case;
		}
		return $this->db->select('*, c_case.id as case_id')->where('id',$id)->get('c_case')->row();
	}
	public function find_document($id) //je case edit karva no 6e ena document find karva mate
	{
		return $this->db->select('name')
			->where('case_number', $id)
			->get('document')
			->result_array();
	}

	public function edit_case($id, $post) //case edit karyo
	{
		$role_id = $this->session->userdata('role_id');
		if($role_id == 1)
		{  $post['case_id'] = $id; 
			$case=$this->db->select('case_id')->where('case_id',$id)->get('case_temp')->row_array();
			if($case){
				$this->db->delete('case_temp',['case_id'=>$id]);
			}
			return $this->db->insert('case_temp',$post);
		}
		else
		{
			if($post['case_id'])
			{
				return $this->db->where('case_id', $post['case_id'])->update('case_temp', $post);
			}
			else{
				$post['case_id'] = $id;
				return $this->db->insert('case_temp',$post);
			}
		}
	}
	
		public function find_case_cus($id) //je case edit karva no 6e e find karva mate
	{
		$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row();
		if($case){
			return $case;
		}
		return $this->db->select('*')->where('id',$id)->get('c_case')->row();
	}

	public function edit_case_cust($id, $post) //case edit karyo
	{
		if($post['case_id'])
		{
				$post['case_id'] = $id;
			// $case=$this->db->select('case_id')->where('case_id',)->get('case_temp')->row_array();
			return $this->db->where('case_id', $post['case_id'])->update('case_temp', $post);
		}
		else{
		$noti['customer_id'] = $post['customers_id'];
		$noti['case_id'] = $id;
		$noti['notification_type'] = 'case';
		$noti['status_type'] = 'edit';
		$post['case_id'] = $id;
	//	$this->db->insert('notification', $noti);
		$post['case_id'] = $id;
		
		//email
		$users=$this->db->select('*')->where('id',$post['customers_id'])->get('users')->row_array(); 
		$email = $users['email'];
		$name = $users['name']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);

		$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];
		$from_email = constant("FROM_EMAIL");
		$to_email = $email;
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject('Your Case Edit Successfully - '.constant("SENDER_NAME"));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
	//	$this->email->send();
		return $this->db->insert('case_temp',$post);
		}
	}
	public function delete_case_tmp($id) //case delete karva mate
	{
		$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row();
		if($case){
			return $this->db->delete('case_temp',['case_id'=>$id]);
		}
	}

}
?>