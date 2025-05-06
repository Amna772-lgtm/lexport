<?php
class Mission_writings extends MY_Controller {
	private $table_name= "writing_misssion";
	public function __construct() {
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/mission_writings_mod');
		$this->load->model('admin/appoinment_mod');
		$this->load->model('admin/case_mod'); 
	}

	public function add_mission($id){
		$this->session->unset_userdata('temp_app_id');	
		$employees=$this->case_mod->get_employee();
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->mission_writings_mod->app_note_data($id);
		$task_type=$this->mission_writings_mod->task_type();
		$this->session->unset_userdata('temp_app_id');
	return	$this->load->view('admin/writing_mission/add_mission',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'','task_type'=>$task_type]);
	}
	//=====
	public function list_review(){
	     // Submission
	if($this->uri->segment(4)){
	    $sub_mission_id = $this->uri->segment(4);
	} else {
	     $sub_mission_id = 0;
	}
	// Submission
	$table =$this->table_name;
	$this->load->model('admin/customer_mod');
	$list_customer = $this->customer_mod->list_customer(); 
	$role_id = $this->session->userdata('role_id');
	if($role_id == 1){
	$data =  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.manager_id,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = {$table}.case_id", 'left')
	->where("{$table}.on_review",1)
	->where("{$table}.sub_mission_id",$sub_mission_id)
	//->where("{$table}.is_read",0)
	->order_by("$table.id", "desc")
	->get($this->table_name)
	->result_array();
    } else if(in_array($this->session->userdata('admin_id'),getFileManager())){
		$user_id = $this->session->userdata('admin_id');
		$data =  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.manager_id,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = {$table}.case_id", 'left')
	    ->where("({$table}.on_review = 1 AND c_case.manager_id = $user_id)", NULL, FALSE)
	    ->where("{$table}.sub_mission_id",$sub_mission_id)
		->order_by("$table.id", "desc")
		->get($this->table_name)
		->result_array();
	} else {
		$user_id = $this->session->userdata('admin_id');
		$data =  $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.manager_id,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = {$table}.case_id", 'left')
	//	->where("{$table}.on_review",1)
       // ->or_where("c_case.manager_id", $user_id )
	//	->or_where("{$table}.responsible_employee", $user_id )
	//	->where("{$table}.user_id", $user_id )
	    ->where("{$table}.sub_mission_id",$sub_mission_id)
	    ->where("({$table}.on_review = 1 AND ($table.follow_up_employee = $user_id OR {$table}.responsible_employee = $user_id ))", NULL, FALSE)
		->order_by("$table.id", "desc")
		->get($this->table_name)
		->result_array();
	 
	}
	$this->load->view('admin/writing_mission/list_review', ['data' => $data,'list_customer'=>$list_customer]);
}
	public function approve_mission($id) {
		$data = $this->mission_writings_mod->find_mission($id);
		$closepost['close_date'] = date("Y-m-d G:i:s");
    	$this->db->where('id',$id)->update($this->table_name,$closepost);
		$case_data=$this->mission_writings_mod->app_case_data($data->case_id);
		$session_date=$this->db->select('case_id,session_date')->where('case_id',$data->case_id)->get($this->table_name)->result_array();
		$filename = "writing_report_".time().".pdf";
		ob_start();
        $pdfFilePath = 'uploads/case_file/'."$filename";
        $this->load->library('m_pdf');
	  	$html=$this->load->view('admin/writing_mission/report', ['data' => $data,'case_data'=>$case_data,'session_date'=>$session_date], true);  
		ERROR_REPORTING(0);
		
$this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/images/pattern2.jpg" height="396" style="margin-bottom:-55px"/>'); 
$this->m_pdf->pdf->AddPageByArray([
    'margin-left' => 0,
    'margin-right' => -5,
    'margin-top' => 0,
    'margin-bottom' => -5,    
	'padding-left' => 0,
    'padding-right' => 0,
    'padding-top' => 0,
    'padding-bottom' => 0,
    'background' => '#102a4f',
]);

$this->m_pdf->pdf->WriteHTML('<img src="' . base_url() . '/assets/images/report-home.jpg" alt="" border="0" style="margin:0px; padding:0px; width:1100;">'); 
// first page

$this->m_pdf->pdf->AddPageByArray([
    'margin-left' => '0',
    'margin-right' => '0',
    'margin-top' => '0',
    'margin-bottom' => '0',
 
]);

$this->m_pdf->pdf->WriteHTML($html); // other pages
$this->m_pdf->pdf->Output($pdfFilePath,"F");  

		
		$get_assign=$this->db->select(['assign_id'])->where('case_number',$case_data->id)->get('document')->row();  
		if($get_assign->assign_id != 0){
			$ass_id = $get_assign->assign_id;
		} else { $ass_id  = 0; }
		$post['report_file']=$filename;
		$post['on_review'] = 0;
		$post['is_close'] = 1;
		$post = $this->security->xss_clean($post);
		$this->db->where('id',$id)->update($this->table_name,$post);
		$insert = ['name' => $filename,'uploaded_by' => $this->session->userdata('admin_id'), 'user_id' => $this->session->userdata('admin_id'), 'customer_id' => $case_data->customers_id, 'case_number' =>$case_data->id, 'cat_id' =>4,'assign_id' =>$ass_id];
		$this->db->insert('document', $insert);
		$noti['customer_id'] = $case_data->customers_id;
		$noti['case_id'] = $case_data->id;
		$noti['appointment_id'] = $id;
		$noti['user_id'] = $case_data->user_id;
		$noti['notification_type'] = 'writings_appoinment';
		$noti['create_date']=date("Y-m-d G:i:s");
		$noti['status_type'] = 'close'; 	
		$this->db->insert('notification', $noti);
		$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array();
		
		$email = $users['email'];
		$phone = $users['phone'];
		$name = $users['name']; 
		
		 $mid=$this->db->select('*')->where('id',$id)->get("$this->table_name")->result_array();
	$fdata=$this->db->select('following_employee_id')->where('app_id',$id)->where('type',$this->table_name)->get("assign_mission")->result_array();

    foreach($fdata as $fdata){
		$smn[]=$fdata['following_employee_id'];
	} 
	foreach($mid as $sm){
		$smn[]=$sm['user_id'];
		$smn[]=$sm['follow_up_employee'];
		$smn[]=$sm['responsible_employee'];
	}
	$snm = array_unique($smn);
	$snm =array_diff($snm, array($this->session->userdata('admin_id')));
	$user_email = user_email($snm);
    $user_email = implode(',',$user_email);
	 
		
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		
		$this->load->library('email', $config);
		 
		$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];

		$from_email = constant("FROM_EMAIL");
		$to_email = "$user_email";
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject($this->lang->line('Writing_mission_has_been_close'));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
		if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
        $msg = 'شريكنا العزيز:
لقد أنجزت مهمةُ الكتابة القانونية للخدمة رقم: '. getCaseNumber($noti['case_id']).'​، ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية.

"نسعد بخدمتكم، وممتنون لثقتكم"';    
		} else {
			
	 		$msg = 'Dear Partner: Your legal writing service task No. '. getCaseNumber($noti['case_id']).' was successfully accomplished. For details, please visit any of “Nassr” platforms. "We are happy to serve you and we are grateful for your trust';
		}
		sendSMSProcess($phone,$msg);
		$json_data['case_id'] =$noti['case_id'];
		$json_data['misssion_id'] =$id;
		insertActionLog($json_data,$case_data->customers_id,"writing_mission","approve");

		return redirect("admin/admin/review_mission/$id/writing_misssion",'refresh');
	}
	
	
	public function list_mission(){
		$data = $this->mission_writings_mod->list_mission();
		$json_data['page']='full list';
		insertActionLog($json_data,0,"writing_mission","visit");
		$this->load->view('admin/writing_mission/list_mission', ['data' => $data]);
	
	}

	public function list_responsible(){ 
		$data = $this->mission_writings_mod->list_mission();
		$employees=$this->case_mod->get_employee();
		$json_data['page']='full list';
		insertActionLog($json_data,0,"writing_mission","visit");
		return $this->load->view('admin/writing_mission/list_responsible', ['data' => $data,'employees' => $employees,]);
	}
	
	public function list_close_mission(){
		$data = $this->mission_writings_mod->list_mission();
		$json_data['page']='close list';
		insertActionLog($json_data,0,"writing_mission","visit");
		return $this->load->view('admin/writing_mission/list_close_mission', ['data' => $data]);
	}
	public function list_pending_misssion(){
		$data = $this->mission_writings_mod->list_pending_mission();
		$json_data['page']='pending list';
		insertActionLog($json_data,0,"writing_mission","visit");
		return $this->load->view('admin/writing_mission/list_pending_misssion', ['data' => $data]);
	}
	public function list_follow_up(){
		$data = $this->mission_writings_mod->list_mission();
		$json_data['page']='follow list';
		insertActionLog($json_data,0,"writing_mission","visit");
		return$this->load->view('admin/writing_mission/list_follow_up', ['data' => $data]);
	}
	public function approve_pending_mission($id) {
	    $post['on_review'] = 0;
		$post['status'] = 0;
        $this->db->where('id',$id)->update($this->table_name,$post);
  		$data = $this->mission_writings_mod->find_mission($id);
        $case_data=$this->mission_writings_mod->app_case_data($data->case_id);
			$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
					$noti['appointment_id'] = $id;
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'writings_appoinment';
					$noti['create_date']=date("Y-m-d G:i:s");
					$noti['status_type'] = 'add';

					//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
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
				$this->email->subject($this->lang->line('Writing_mission_added'));
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();

				$this->db->insert('notification', $noti);
				$insert_id = $this->db->insert_id();
		if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
 		    $msg="شريكنا العزيز:
لقد أنشئت مهمة كتابة قانونية للخدمة رقم ". getCaseNumber($noti['case_id'])."​ وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.";
		} else {
           $msg = "Dear Partner: A legal writing task has been created for service No.". getCaseNumber($noti['case_id'])." and we will always update you. For details, please visit any of “Nassr” platforms.App as in dashboard notification";
		}
        sendSMSProcess($phone,$msg);
        
        $json_data['page']='pending list';
		$json_data['misssion_id'] =$id;
		insertActionLog($json_data,0,"writing_mission","pending-approve");
		return redirect('admin/mission_writings/list_pending_misssion');
	}
	public function reject_pending_mission($id) {
	
		$post['is_reject'] = 1;
		$this->db->where('id',$id)->update($this->table_name,$post);
		$json_data['misssion_id'] =$id;
		insertActionLog($json_data,0,"writing_mission","reject");
		return redirect('admin/mission_writings/list_pending_misssion');
	}
	
	public function find_mission($id) 
	{
		$employees=$this->case_mod->get_employee();
		$data = $this->mission_writings_mod->find_mission($id);
		$app_data = $this->mission_writings_mod->app_data($id);
		$case_data=$this->mission_writings_mod->app_case_data($data->case_id);
		$note_data=$this->mission_writings_mod->app_note_data($id);
		$task_type=$this->mission_writings_mod->task_type();
				$json_data['misssion_id'] =$id;
		$json_data['page'] ='edit';
		insertActionLog($json_data,0,"writing_mission","visit");
		return $this->load->view('admin/writing_mission/add_mission', ['data' => $data,'employees'=>$employees,'case_data'=>$case_data,'note_data'=>$note_data,'app_data'=>$app_data,'task_type'=>$task_type]);
	}
	public function view_mission($id)
	{
        ###
		$r = $_SERVER['HTTP_REFERER']; 
		$r = explode('/', $r);
		$r = array_filter($r);
		$r = array_merge($r, array()); 
		$r = preg_replace('/\?.*/', '', $r);
		$slug = $r[4];
		
        $data = $this->mission_writings_mod->find_mission($id);
        $role_id = $this->session->userdata('role_id');
        
        if($role_id == 1){
            $read['read_admin'] =1;  
        } else if(in_array($this->session->userdata('admin_id'),getFileManager())){
            $read['read_manager'] =1; 
        } else { 
			$read['read_follow'] =1;
			$read['read_response'] =1;
		}
		/*else if($this->session->userdata('admin_id')== $data->follow_up_employee){
            $read['read_follow'] =1;  
        } else if($this->session->userdata('admin_id') == $data->responsible_employee){
            $read['read_response'] =1;
        } */
        ###
		$this->db->where('id',$id)->update($this->table_name,$read);
	//	$data = $this->mission_writings_mod->find_mission($id);
		$json_data['misssion_id'] =$id;
		insertActionLog($json_data,0,"writing_mission","view");
		return $this->load->view('admin/writing_mission/view_mission', ['data' => $data, ]);
	}
	
	public function print_pdf($id)
	{
		$data = $this->mission_writings_mod->find_mission($id);
		$pdfFilePath = "mission_writings".time().".pdf";
        $this->load->library('m_pdf'); 
 		$stylesheet = file_get_contents('assets/css/pdf.css'); 
 		$html=$this->load->view('admin/print_session_appoinment', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
 
	}
	public function delete_mission() 
	{
		$id = $this->input->post('id');
		$this->mission_writings_mod->delete_mission($id);
		$json_data['misssion_id'] =$id;
		insertActionLog($json_data,0,"writing_mission","delete");
		echo json_encode('Delete success');
	}
	public function store_mission(){
		$employees=$this->case_mod->get_employee();
		$config=[
			'upload_path' => './uploads/appoinment/session_appoinment/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$onreview=$this->input->post('onreview');
		unset($post['onreview']);
		if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {
			$session_date = $post['session_date'];
			$session_end_date = $post['session_end_date'];
			unset($post['session_date'],$post['session_end_date']);
			$session_date = explode('/',$session_date);
			$session_end_date = explode('/',$session_end_date);
			$session_date = Hijri2Greg($session_date[0],$session_date[1],$session_date[2],true);
			$session_end_date = Hijri2Greg($session_end_date[0],$session_end_date[1],$session_end_date[2],true);
			$post['session_date'] = $session_date;
			$post['session_end_date'] = $session_end_date;
		}
		$post['on_review'] = isset($onreview)?'1':'0';
        $post['is_read'] = isset($onreview)?'0':'1';
		$sess_check =isset($post['sess_check'])?$post['sess_check']:0;
		
		###
        $post['read_manager'] = isset($onreview)?'0':'0';   $post['read_admin'] =isset($onreview)?'0':'0';   
        $post['read_follow'] =isset($onreview)?'0':'0';   $post['read_response'] =isset($onreview)?'0':'0';
	    ###
	
		unset($post['sess_start_date'],$post['sess_end_date'],$post['sess_start_time'],$post['sess_end_time'],$post['visitor_start_date'],$post['visitor_end_date'],$post['visitor_start_time'],$post['visitor_end_time'],$post['writing_start_date'],$post['writing_end_date'],$post['writing_start_time'],$post['writing_end_time'],$post['consolation_start_date'],$post['consolation_end_date'],$post['consolation_start_time'],$post['consolation_end_time'],$post['task_tital'],$post['task_type'],$post['general_start_date'],$post['general_end_date'],$post['general_start_time'],$post['general_end_time'],$post['sess_check'],$post['visitor_check'],$post['writing_check'],$post['consolation_check'],$post['general_check'],$post['no_need'],$post['mid']);

		$id=$post['id'];
		$post['status'] = $sess_check;
	
		$case_data=$this->db->select('id,case_number,client_file_number,customers_id,user_id,follow_up_employee,responsible_employee')->where('id',$post['case_id'])->get('c_case')->row();
		$note_data=$this->db->select('*')->where('id',$id)->get('case_note')->result_array();
		//Submission
         if(isset($post['close_app_new'])) { $close_app_new = 1; } else { $close_app_new = 0; }
		if(isset($post['close_app']) OR isset($post['close_app_new'])) {
	 
		    $close_app = 1; $is_read = 0;
 
		    
		} else { $close_app = 0; $is_read = 1; } 
		$post['is_close'] = $close_app;
 
		unset($post['id'],$post['close_app'],$post['close_app_new']);//Submission
		$post['user_id']=$this->session->userdata('admin_id');
		
		if($this->form_validation->run('add_writings_appoinment')) {
		
		if($id) {
		if($sess_check == 1){
			echo $sess_check;
			unset($post['id']);
			$post = $this->security->xss_clean($post);
			$this->db->insert($this->table_name,$post);
		}

		$tasks['appointment_id'] = $id;
		$mid = isset($post['mid']);
		if(isset($post['mid'])){
		//	$this->db->where('id',$mid)->update('appointment_task',$tasks);
		}
		unset($post['mid'],$post['status']);
		$post = $this->security->xss_clean($post);
		$this->db->where('id',$id)->update($this->table_name,$post);
		$insert_id = $this->db->insert_id();
		if($this->upload->do_upload('upload_file')){
			$this->upload->data();
		}
		$insert_id = $this->db->insert_id();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log); 
		if(isset($case_data->customers_id))
		{
			$noti['customer_id'] = $case_data->customers_id;
			$noti['case_id'] = $case_data->id;
			$noti['appointment_id'] = $id;
			$noti['user_id'] = $case_data->user_id;
			$noti['notification_type'] = 'writings_appoinment';
			$noti['create_date']=date("Y-m-d G:i:s");
			$noti['status_type'] = 'update'; 	
		//	$this->db->insert('notification', $noti);	
		$json_data['misssion_id'] =$id;
		$json_data['case_id'] =$case_data->id;
		insertActionLog($json_data,0,"writing_mission","update");
		}
		//Report
		if($close_app == 1){
		$post['is_read'] = $is_read;
		###
        $post['read_manager'] =$is_read;   $post['read_admin'] =$is_read;   
        $post['read_follow'] =$is_read;   $post['read_response'] =$is_read;
	    ###
	    $data = $this->mission_writings_mod->find_mission($id);
		$closepost['close_date'] = date("Y-m-d G:i:s");
    	$this->db->where('id',$id)->update($this->table_name,$closepost);
		$case_data=$this->mission_writings_mod->app_case_data($data->case_id);
		$session_date=$this->db->select('case_id,session_date')->where('case_id',$data->case_id)->get($this->table_name)->result_array();
		$filename = "writings_report_".time().".pdf";
		ob_start();
        $pdfFilePath = 'uploads/case_file/'."$filename";
        $this->load->library('m_pdf');
	  	$html=$this->load->view('admin/writing_mission/report', ['data' => $data,'case_data'=>$case_data,'session_date'=>$session_date], true);  
		ERROR_REPORTING(0);

$this->m_pdf->pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/images/pattern2.jpg" height="396" style="margin-bottom:-55px"/>'); 
$this->m_pdf->pdf->AddPageByArray([
    'margin-left' => 0,
    'margin-right' => -5,
    'margin-top' => 0,
    'margin-bottom' => -5,    
	'padding-left' => 0,
    'padding-right' => 0,
    'padding-top' => 0,
    'padding-bottom' => 0,
    'background' => '#102a4f',
]);

$this->m_pdf->pdf->WriteHTML('<img src="' . base_url() . '/assets/images/report-home.jpg" alt="" border="0" style="margin:0px; padding:0px; width:1100;">'); 
// first page

$this->m_pdf->pdf->AddPageByArray([
    'margin-left' => '0',
    'margin-right' => '0',
    'margin-top' => '0',
    'margin-bottom' => '0',
 
]);

$this->m_pdf->pdf->WriteHTML($html); // other pages
$this->m_pdf->pdf->Output($pdfFilePath,"F");  

		
		$get_assign=$this->db->select(['assign_id'])->where('case_number',$case_data->id)->get('document')->row();  
		if($get_assign->assign_id != 0){
			$ass_id = $get_assign->assign_id;
		} else { $ass_id  = 0; }
		$appfilename['report_file']=$filename;
		$this->db->where('id',$id)->update($this->table_name,$appfilename);
		$insert = ['name' => $filename,'uploaded_by' => $this->session->userdata('admin_id'), 'user_id' => $this->session->userdata('admin_id'), 'customer_id' => $case_data->customers_id, 'case_number' =>$case_data->id, 'cat_id' =>4,'assign_id' =>$ass_id];
		$this->db->insert('document', $insert);
		$noti['customer_id'] = $case_data->customers_id;
		$noti['case_id'] = $case_data->id;
		$noti['appointment_id'] = $id;
		$noti['user_id'] = $case_data->user_id;
		$noti['notification_type'] = 'writings_appoinment';
		$noti['create_date']=date("Y-m-d G:i:s");
		$noti['status_type'] = 'close'; 	
		$this->db->insert('notification', $noti);
		$json_data['misssion_id'] =$id;
		$json_data['case_id'] =$case_data->id;
		insertActionLog($json_data,$case_data->customers_id,"session_mission","close");
		$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
		
		$email = $users['email'];
		$phone = $users['phone'];
		$name = $users['name']; 
		
		 $mid=$this->db->select('*')->where('id',$id)->get("$this->table_name")->result_array();
	$fdata=$this->db->select('following_employee_id')->where('app_id',$id)->where('type',$this->table_name)->get("assign_mission")->result_array();

    foreach($fdata as $fdata){
		$smn[]=$fdata['following_employee_id'];
	} 
	foreach($mid as $sm){
		$smn[]=$sm['user_id'];
		$smn[]=$sm['follow_up_employee'];
		$smn[]=$sm['responsible_employee'];
	}
	$snm = array_unique($smn);
	$snm =array_diff($snm, array($this->session->userdata('admin_id')));
	$user_email = user_email($snm);
    $user_email = implode(',',$user_email);
	 
		
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		
		$this->load->library('email', $config);
		 
		$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];

		$from_email = constant("FROM_EMAIL");
		$to_email = "$user_email";
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject($this->lang->line('Writing_mission_has_been_close'));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
		if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
        $msg = 'شريكنا العزيز:
لقد أنجزت مهمةُ الكتابة القانونية للخدمة رقم: '. getCaseNumber($noti['case_id']).'​، ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية.

"نسعد بخدمتكم، وممتنون لثقتكم"';    
		} else {
			
	 		$msg = 'Dear Partner: Your legal writing service task No. '. getCaseNumber($noti['case_id']).' was successfully accomplished. For details, please visit any of “Nassr” platforms. "We are happy to serve you and we are grateful for your trust';
		}
		sendSMSProcess($phone,$msg);
		//Submission
		$eid = $noti['case_id'];
        return redirect("admin/admin/review_mission/$id/writing_misssion/?is_new=$close_app_new&eid=$eid",'refresh');
        //Submission

	}
        return redirect('admin/mission_writings/list_mission');
		} else {
			$role_id = $this->session->userdata('role_id');
				if(in_array($this->session->userdata('admin_id'),getFileManager()) ||  $role_id == 1){
					$post['status'] =0;  
				} else{
						$post['status'] = 1;  
				}
				
				 if(!in_array($this->session->userdata('admin_id'),getFileManager()) AND $role_id == 2){
				     
				    if($this->session->userdata('admin_id') == $case_data->follow_up_employee){
				            $post['follow_up_employee'] = $this->session->userdata('admin_id');
				    } else {
				            $post['follow_up_employee'] = $case_data->follow_up_employee;
				    }
				    
			        if($this->session->userdata('admin_id') == $case_data->responsible_employee){
				        $post['responsible_employee'] = $this->session->userdata('admin_id');
				    } else {
				        $post['responsible_employee'] = $case_data->responsible_employee;
				    }
				
				    
				 }
				 $post['is_read'] = 0; 
				 $post = $this->security->xss_clean($post);
				$this->db->insert($this->table_name,$post);
				$appid = $this->db->insert_id();
				
								
				// ASSIGN //
				$post_data['user_id']=$this->session->userdata('admin_id');
				$post_data['app_id']=$appid;
				$post_data['case_id']=$case_data->id;
				if(isset($post_data['notes'])){
				$post_data['notes']=$post['note'];
				}
				$post_data['following_employee_id']=$case_data->follow_up_employee;
				$post_data['customers_id']=$case_data->customers_id;
				$post_data['type']='writing_misssion';
				$post_data['create_date']=date("Y-m-d G:i:s");
				$this->db->insert('assign_mission', $post_data);	
				// ASSIGN //
				
				$note_update['app_id']=$appid;
				$this->db->where('temp_app_id',$this->session->userdata('temp_app_id'))->update('case_note',$note_update);
				//-----
				$temp_app_id['temp_app_id']=$appid;
				
				$this->db->where('temp_app_id',$this->session->userdata('temp_app_id'))->update('document',$temp_app_id);
				
				$this->session->unset_userdata('temp_app_id');	
				//$tasks['appointment_id'] = $appid;
				//$this->db->insert('appointment_task',$tasks); 
				
				if($this->upload->do_upload('upload_file')){
					$this->upload->data();
				}
				if(isset($case_data->customers_id))
				{
				    if($this->session->userdata('role_id') ==1){
					$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
					$noti['appointment_id'] = $appid;
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'writings_appoinment';
					$noti['create_date']=date("Y-m-d G:i:s");
					$noti['status_type'] = 'add';
					$json_data['misssion_id'] =$appid;
					$json_data['case_id'] = $case_data->id;
					insertActionLog($json_data,$case_data->customers_id,"writing_mission","add");
					//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
				$email = $users['email'];
				$name = $users['name']; 
				$phone = $users['phone']; 
				$config = Array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
				);
				$this->load->library('email', $config);
				$emp=$this->db->select('name')->where('id',$post['follow_up_employee'])->get('users')->row_array();	
				
				$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name, 'ename'=> $emp['name']];
				
				$from_email = constant("FROM_EMAIL");
				$to_email = $email;
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				$this->email->set_header('Content-type', 'text/html');
				$this->email->from($from_email, constant("SENDER_NAME"));
				$this->email->to($to_email);
				$this->email->subject($this->lang->line('Writing_mission_added'));
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();

				$this->db->insert('notification', $noti);
				$insert_id = $this->db->insert_id();
		if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
 		    $msg="شريكنا العزيز:
لقد أنشئت مهمة كتابة قانونية للخدمة رقم ". getCaseNumber($noti['case_id'])."​ وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.";
		} else {
           $msg = "Dear Partner: A legal writing task has been created for service No.". getCaseNumber($noti['case_id'])." and we will always update you. For details, please visit any of “Nassr” platforms.App as in dashboard notification";
		}

				sendSMSProcess($phone,$msg);
				}
				}
			}
			return redirect('admin/mission_writings/list_mission');
		} else {
			if($id){
				$this->load->view('admin/writing_mission/add_mission',['data'=>'','employees'=>$employees,'app_data'=>'','case_data'=>$case_data,'note_data'=>$note_data]);
			} else {
				$this->load->view('admin/writing_mission/add_mission',['data'=>'','employees'=>$employees,'app_data'=>'','case_data'=>$case_data,'note_data'=>$note_data]);
			}
		}	
	}
}
?>