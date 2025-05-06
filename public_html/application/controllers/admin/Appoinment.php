<?php
class Appoinment extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	$this->isAdmintLogged();
$this->load->model('admin/appoinment_mod');
$this->load->model('admin/case_mod'); 
	}

	// session add
	public function add_session_appoinment($id){
		$this->session->unset_userdata('temp_app_id');
		$employees=$this->case_mod->get_employee();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
		
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$task_type=$this->appoinment_mod->task_type();
		$this->session->unset_userdata('temp_app_id');
		$this->load->view('admin/add_session_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'','task_type'=>$task_type]);
	}
	public function add_general_appoinment($id){
		$employees=$this->case_mod->get_employee();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$task_type=$this->appoinment_mod->task_type();
		$this->load->view('admin/add_general_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'task_type'=>$task_type,'app_data'=>'']);
	}
	public function list_session_appoinment(){
		$data = $this->appoinment_mod->list_session_appoinment();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$data = $this->appoinment_mod->list_session_appoinment();
		$list_writings_appoinment = $this->appoinment_mod->list_writings_appoinment();
		$list_consultation_appoinment = $this->appoinment_mod->list_consultation_appoinment();
		$list_visiting_appoinment = $this->appoinment_mod->list_visiting_appoinment();
		$list_general_appoinment = $this->appoinment_mod->list_general_appoinment();
		$this->load->view('admin/list_session_appoinment', ['data' => $data,'list_writings_appoinment' => $list_writings_appoinment,'list_consultation_appoinment' => $list_consultation_appoinment,'list_visiting_appoinment' => $list_visiting_appoinment,'list_general_appoinment' => $list_general_appoinment]);
		//$this->load->view('admin/list_session_appoinment', ['data' => $data]);
	}
	
	public function convert_mission() {
		$id=$this->input->post('id');
		$case_id=$this->input->post('case_id');
		$empid=$this->input->post('empid');
		$eid=$this->input->post('eid');
		$reason=$this->input->post('reason');
		$note=$this->input->post('notes');
		$type=$this->input->post('type');
		
		$convert['case_id']=$case_id;
		$convert['following_employee_id']=$eid;
		$convert['reason']=$reason;
		$convert['notes']=$note;
		$convert['type']=$type;
		
		$this->db->insert('assignment_convert', $convert);
		$task['follow_up_employee'] = $eid;
		$task['is_convert'] = 1;
		$table = $type."_mission";
        $task['read_follow'] =1;
		$this->db->where('id',$id)->update($table,$task);
		$json_data['misssion_id'] =$id;
		$json_data['following_employee_id'] =$eid;
		$json_data['case_id'] = $case_id;
		insertActionLog($json_data,0,"session_mission","convert");
		echo json_encode('Convert Assignment Successfully'); 
	}
	

	public function list_session_responsible(){ 
		$data = $this->appoinment_mod->list_session_appoinment();
		$employees=$this->case_mod->get_employee();
		$this->load->view('admin/list_session_responsible', ['data' => $data,'employees' => $employees,]);
	}
	public function list_session_close_mission(){
		$data = $this->appoinment_mod->list_session_appoinment();
		$this->load->view('admin/list_session_close_mission', ['data' => $data]);
	}
	public function list_pending_appoinment(){
		$data = $this->appoinment_mod->list_pending_appoinment();
		$this->load->view('admin/list_pending_session', ['data' => $data]);
	}
	public function list_session_follow_up(){
		$data = $this->appoinment_mod->list_session_appoinment();
		$this->load->view('admin/list_session_follow_up', ['data' => $data]);
	}

	public function list_general_appoinment(){
		$data = $this->appoinment_mod->list_general_appoinment();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'general_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_general_appoinment', ['data' => $data]);
	}

	public function approve_pending_appoinment($id) {
	
		$post['status'] = 0;
		$this->db->where('id',$id)->update('session_appoinment',$post);
		return redirect('admin/appoinment/list_session_appoinment');
	}
	public function reject_pending_appoinment($id) {
	
		$post['is_reject'] = 1;
		$this->db->where('id',$id)->update('session_appoinment',$post);
		return redirect('admin/appoinment/list_pending_appoinment');
	}
	public function find_general_appoinment($id) 
	{
		$employees=$this->case_mod->get_employee();
		$data = $this->appoinment_mod->find_general_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'general_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit_view';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$app_data=$this->appoinment_mod->app_data($id);
		$this->load->view('admin/add_general_appoinment', ['data' => $data,'employees'=>$employees,'case_data'=>$case_data,'note_data'=>$note_data,'app_data'=>$app_data]);
	}
	public function find_session_appoinment($id) 
	{
		$employees=$this->case_mod->get_employee();
		$data = $this->appoinment_mod->find_appoinment($id);
		$app_data = $this->appoinment_mod->app_data($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit_view';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($data->case_id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$app_data=$this->appoinment_mod->app_data($id);
		$task_type=$this->appoinment_mod->task_type();
		$this->load->view('admin/add_session_appoinment', ['data' => $data,'employees'=>$employees,'case_data'=>$case_data,'note_data'=>$note_data,'app_data'=>$app_data,'task_type'=>$task_type]);
	}

	public function view_general_appoinment($id) 
	{
		$data = $this->appoinment_mod->find_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'general_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit_view';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/view_general_appoinment', ['data' => $data, ]);
	}

	public function view_session_appoinment($id) 
	{
		$data = $this->appoinment_mod->find_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit_view';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/view_session_appoinment', ['data' => $data, ]);
	}

	public function store_session_appoinment(){
		$employees=$this->case_mod->get_employee();

		$config=[
			'upload_path' => './uploads/appoinment/session_appoinment/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$sess_check =isset($post['sess_check'])?$post['sess_check']:0;
		$tasks = [
				'appointment_id'=>isset($post['appointment_id'])
				?$post['appointment_id']:'',
				'sess_start_date'=>$post['sess_start_date'],
				'sess_end_date'=>$post['sess_end_date'],
				'sess_start_time'=>$post['sess_start_time'],
				'sess_end_time'=>$post['sess_end_time'],
				'visitor_start_date'=>$post['visitor_start_date'],
				'visitor_end_date'=>$post['visitor_end_date'],
				'visitor_start_time'=>$post['visitor_start_time'],
				'visitor_end_time'=>$post['visitor_end_time'],
				'writing_start_date'=>$post['writing_start_date'],
				'writing_end_date'=>$post['writing_end_date'],
				'writing_start_time'=>$post['writing_start_time'],
				'writing_end_time'=>$post['writing_end_time'],
				'consolation_start_date'=>$post['consolation_start_date'],
				'consolation_end_date'=>$post['consolation_end_date'],
				'consolation_start_time'=>$post['consolation_start_time'],
				'consolation_end_time'=>$post['consolation_end_time'],
				'task_tital'=>$post['task_tital'],
				'task_type'=>$post['task_type'],
				'general_start_date'=>$post['general_start_date'],
				'general_end_date'=>$post['general_end_date'],
				'general_start_time'=>$post['general_start_time'],
				'general_end_time'=>$post['general_end_time'],
				'sess_check'=>isset($post['sess_check'])?$post['sess_check']:0,
				'visitor_check'=>isset($post['visitor_check'])?$post['visitor_check']:0,
				'writing_check'=>isset($post['writing_check'])?$post['writing_check']:0,
				'consolation_check'=>isset($post['consolation_check'])?$post['consolation_check']:0,
				'general_check'=>isset($post['general_check'])?$post['general_check']:0,
				'no_need'=>isset($post['no_need'])?$post['no_need']:0,
				'type'=>'session',
				];

		unset($post['sess_start_date'],$post['sess_end_date'],$post['sess_start_time'],$post['sess_end_time'],$post['visitor_start_date'],$post['visitor_end_date'],$post['visitor_start_time'],$post['visitor_end_time'],$post['writing_start_date'],$post['writing_end_date'],$post['writing_start_time'],$post['writing_end_time'],$post['consolation_start_date'],$post['consolation_end_date'],$post['consolation_start_time'],$post['consolation_end_time'],$post['task_tital'],$post['task_type'],$post['general_start_date'],$post['general_end_date'],$post['general_start_time'],$post['general_end_time'],$post['sess_check'],$post['visitor_check'],$post['writing_check'],$post['consolation_check'],$post['general_check'],$post['no_need'],$post['mid']);

		$id=$post['id'];
		$post['status'] = $sess_check;
	
		$case_data=$this->db->select('id,case_number,customers_id,follow_up_employee,responsible_employee')->where('id',$post['case_id'])->get('c_case')->row();
		$note_data=$this->db->select('*')->where('id',$id)->get('case_note')->result_array();
		//$post['upload_file']=$_FILES['upload_file']['name'];
	//	$close_app = $post['close_app']; 
		if(isset($post['close_app'])) $close_app = 1; else  $close_app = 0;
		$post['is_close'] = $close_app;

		unset($post['id'],$post['close_app']);
		$post['user_id']=$this->session->userdata('admin_id');
		
		if($this->form_validation->run('add_session_appoinment')) {
		
		if($id) {
		if($sess_check == 1){
			echo $sess_check;
			unset($post['id']);
			$this->db->insert('session_appoinment',$post);
		}

		$tasks['appointment_id'] = $id;
		$mid = isset($post['mid']);
		if(isset($post['mid'])){
		$this->db->where('id',$mid)->update('appointment_task',$tasks);
		}
		unset($post['mid'],$post['status']);
		$this->db->where('id',$id)->update('session_appoinment',$post);
		
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

		//Report
	if($close_app == 1){
		$filename = "session_report_".time().".pdf"; 
	 
		$data = $this->appoinment_mod->find_appoinment($id);
		$case_data=$this->appoinment_mod->app_case_data($data->case_id);
		$session_date=$this->db->select('case_id,session_date')->where('case_id',$data->case_id)->get('session_appoinment')->result_array();
		//print_r($session_date); exit;
		ob_start();
        $pdfFilePath = 'uploads/case_file/'."$filename";
        $this->load->library('m_pdf');
	  	$html=$this->load->view('admin/session_report', ['data' => $data,'case_data'=>$case_data,'session_date'=>$session_date], true);  
		ERROR_REPORTING(0);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath,"F");  
		
		$get_assign=$this->db->select(['assign_id'])->where('case_number',$case_data->id)->get('document')->row();  
		if($get_assign->assign_id != 0){
			$ass_id = $get_assign->assign_id;
		} else { $ass_id  = 0; }
		$insert = ['name' => $filename, 'user_id' => $this->session->userdata('admin_id'), 'customer_id' => $case_data->customers_id, 'case_number' =>$case_data->id, 'cat_id' =>4,'assign_id' =>$ass_id];
		$this->db->insert('document', $insert);
	}
		return redirect('admin/appoinment/list_session_appoinment','refresh');
		
		} else {
				$this->db->insert('session_appoinment',$post);
				$appid = $this->db->insert_id();
				$note_update['app_id']=$appid;
				$this->db->where('temp_app_id',$this->session->userdata('temp_app_id'))->update('case_note',$note_update);
				
				//-----
				$temp_app_id['temp_app_id']=$appid;
				$this->db->where('temp_app_id',$this->session->userdata('temp_app_id'))->update('document',$temp_app_id);
				
				$this->session->unset_userdata('temp_app_id');	
				$tasks['appointment_id'] = $appid;
				$this->db->insert('appointment_task',$tasks); 
				
				if($this->upload->do_upload('upload_file')){
					$this->upload->data();
				}
                $case_data = $this->appoinment_mod->get_case($post['client_file_number']);
				if(isset($case_data->customers_id))
				{
					$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
					$noti['appointment_id'] = $insert_id;
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'session_appoinment';
					$noti['status_type'] = 'add';
					$this->db->insert('notification', $noti);
					//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
				$email = $users['email'];
				$name = $users['name']; 
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
				$this->email->subject('Your session appointment schedule');
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();

				$this->db->insert('notification', $noti);
				$insert_id = $this->db->insert_id();
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
				$action_log['action_type'] = 'session_appoinment';
				if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
				$action_log['status_type'] = 'add';
				$action_log['action_id'] = $insert_id;
				$this->db->insert('action_log', $action_log);
				}				
			}
			return redirect('admin/appoinment/list_session_appoinment');
		} else {
			if($id){
				$this->load->view('admin/add_session_appoinment',['data'=>'','employees'=>$employees,'app_data'=>'','case_data'=>$case_data,'note_data'=>$note_data]);
			} else {
				$this->load->view('admin/add_session_appoinment',['data'=>'','employees'=>$employees,'app_data'=>'','case_data'=>$case_data,'note_data'=>$note_data]);
			}
		}	
	}
	public function store_general_appoinment(){
		$employees=$this->case_mod->get_employee();

		$config=[
			'upload_path' => './uploads/appoinment/session_appoinment/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$tasks = [
				'appointment_id'=>$post['appointment_id'],
				'sess_start_date'=>$post['sess_start_date'],
				'sess_end_date'=>$post['sess_end_date'],
				'sess_start_time'=>$post['sess_start_time'],
				'sess_end_time'=>$post['sess_end_time'],
				'visitor_start_date'=>$post['visitor_start_date'],
				'visitor_end_date'=>$post['visitor_end_date'],
				'visitor_start_time'=>$post['visitor_start_time'],
				'visitor_end_time'=>$post['visitor_end_time'],
				'writing_start_date'=>$post['writing_start_date'],
				'writing_end_date'=>$post['writing_end_date'],
				'writing_start_time'=>$post['writing_start_time'],
				'writing_end_time'=>$post['writing_end_time'],
				'consolation_start_date'=>$post['consolation_start_date'],
				'consolation_end_date'=>$post['consolation_end_date'],
				'consolation_start_time'=>$post['consolation_start_time'],
				'consolation_end_time'=>$post['consolation_end_time'],
				'task_tital'=>$post['task_tital'],
				'task_type'=>$post['task_type'],
				'general_start_date'=>$post['general_start_date'],
				'general_end_date'=>$post['general_end_date'],
				'general_start_time'=>$post['general_start_time'],
				'general_end_time'=>$post['general_end_time'],
				'sess_check'=>isset($post['sess_check'])?$post['sess_check']:0,
				'visitor_check'=>isset($post['visitor_check'])?$post['visitor_check']:0,
				'writing_check'=>isset($post['writing_check'])?$post['writing_check']:0,
				'consolation_check'=>isset($post['consolation_check'])?$post['consolation_check']:0,
				'general_check'=>isset($post['general_check'])?$post['general_check']:0,
				];
				unset($post['sess_start_date'],$post['sess_end_date'],$post['sess_start_time'],$post['sess_end_time'],$post['visitor_start_date'],$post['visitor_end_date'],$post['visitor_start_time'],$post['visitor_end_time'],$post['writing_start_date'],$post['writing_end_date'],$post['writing_start_time'],$post['writing_end_time'],$post['consolation_start_date'],$post['consolation_end_date'],$post['consolation_start_time'],$post['consolation_end_time'],$post['task_tital'],$post['task_type'],$post['general_start_date'],$post['general_end_date'],$post['general_start_time'],$post['general_end_time'],$post['sess_check'],$post['visitor_check'],$post['writing_check'],$post['consolation_check'],$post['general_check']);
		$id=$post['id'];
		$case_data=$this->db->select('id,case_number,follow_up_employee,responsible_employee')->where('id',$post['case_id'])->get('c_case')->row();
		$note_data=$this->db->select('*')->where('id',$id)->get('case_note')->result_array();
		$post['upload_file']=$_FILES['upload_file']['name'];
		unset($post['id']);
		$post['user_id']=$this->session->userdata('admin_id');
		
		if($this->form_validation->run('add_session_appoinment')) {
		
		if($id) {
		$this->db->where('id',$id)->update('general_appoinment',$post);
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
		return redirect('admin/appoinment/list_general_appoinment');
				
			} else {
			
				
			
				$this->db->insert('general_appoinment',$post);
				
				$appid = $this->db->insert_id();
				$tasks['appointment_id'] = $appid;
				$this->db->insert('appointment_task',$tasks); 
				
				
				if($this->upload->do_upload('upload_file')){
					$this->upload->data();
				}
                $case_data = $this->appoinment_mod->get_case($post['client_file_number']);
				if(isset($case_data->customers_id))
				{
					$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
					$noti['appointment_id'] = $insert_id;
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'general_appoinment';
					$noti['status_type'] = 'add';
					//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
				$email = $users['email'];
				$name = $users['name']; 
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
				$this->email->subject('Your session appointment schedule');
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();

				$this->db->insert('notification', $noti);
				$insert_id = $this->db->insert_id();
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
				$action_log['action_type'] = 'general_appoinment';
				if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
				$action_log['status_type'] = 'add';
				$action_log['action_id'] = $insert_id;
				$this->db->insert('action_log', $action_log);
				}				
			}
			return redirect('admin/appoinment/list_general_appoinment');
		} else {
			if($id){
				$this->load->view('admin/add_general_appoinment',['data'=>'','employees'=>$employees,'app_data'=>'','case_data'=>$case_data,'note_data'=>$note_data]);
			} else {
				$this->load->view('admin/add_general_appoinment',['data'=>'','employees'=>$employees,'app_data'=>'','case_data'=>$case_data,'note_data'=>$note_data]);
			}
		}	
	}
		
	public function delete_general_appoinment() 
	{
		$id = $this->input->post('id');
		$this->appoinment_mod->delete_general_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'general_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'delete';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
		echo json_encode('delete success');
	}
	public function delete_appoinment() 
	{
		$id = $this->input->post('id');
		$this->appoinment_mod->delete_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'delete';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
		echo json_encode('delete success');
	}

	function print_session_pdf($id){
		$filename = time()."_order.pdf";
		$data = $this->appoinment_mod->find_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'session_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'pdf';
		$action_log['action_id'] = $id;
		$this->db->insert('action_log', $action_log);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->load->library('m_pdf');
//  		$stylesheet = file_get_contents('assets/scss/style.scss'); 
 		$stylesheet = file_get_contents('assets/css/pdf.css'); 
 		$html=$this->load->view('admin/print_session_appoinment', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	// End session


	// writings start
	public function add_writings_appoinment($id){  
		$employees=$this->case_mod->get_employee();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'add_view';
		$ids = $this->db->insert_id();
		$action_log['action_id'] = $ids;
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id); 
		$this->load->view('admin/add_writings_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
		//$this->load->view('admin/add_writings_appoinment',['data'=>'','employees'=>$employees]);
	}

	public function store_writings_appoinment() {
	$employees=$this->case_mod->get_employee();
		$config=[
			'upload_path' => './uploads/appoinment/writings_appoinment/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);

		$post=$this->input->post();
		$id=$post['id'];
		$post['upload_file']=$_FILES['upload_file']['name'];
		$post['user_id']=$this->session->userdata('admin_id');
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		
		unset($post['id']);
		if($this->form_validation->run('add_writings_appoinment')) {
			if(isset($post['newwritings'])){ 
				unset($post['newwritings']);
				unset($post['id']);
				$this->db->insert('writings_appoinment',$post); 
				$insert_id = $this->db->insert_id();
						if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'add';
		$action_log['action_id'] = $insert_id;
		$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){
					$this->upload->data();
				}
			}	
			else if($id){
				$this->db->where('id',$id)->update('writings_appoinment',$post);
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		$action_log['action_id'] = $id;
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit';
		$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}

			} else {
				$this->db->insert('writings_appoinment',$post);  $insert_id = $this->db->insert_id();
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
				$action_log['action_type'] = 'writings_appoinment';
				$action_log['action_id'] = $insert_id;
				if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
				$action_log['status_type'] = 'add';
				$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				
				$case_data = $this->appoinment_mod->get_case($post['client_file_number']);
				if(isset($case_data->customers_id))
				{
					$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
$noti['appointment_id'] = $insert_id;
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'writings_appoinment';
					$noti['status_type'] = 'add';
					//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
				$email = $users['email'];
				$name = $users['name']; 
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
				$this->email->subject('Your Writing Appointment schedule');
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();
					$this->db->insert('notification', $noti);
				}
				
			}
			return redirect('admin/appoinment/list_writings_appoinment');
		} else {
			if($id){
				
				$this->load->view('admin/add_writings_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
			} else {
			
				$this->load->view('admin/add_writings_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
			}
		}
	}
	public function list_writings_appoinment(){
		$data = $this->appoinment_mod->list_writings_appoinment();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_writings_appoinment', ['data' => $data]);
	}

	public function find_writings_appoinment($id)
	{
		$employees=$this->case_mod->get_employee();
		$data = $this->appoinment_mod->find_writings_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		$action_log['action_id'] = $id;
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);	
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$app_data = $this->appoinment_mod->app_data($id);
		$this->load->view('admin/add_writings_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>$app_data]);
		
	}
	public function view_writings_appoinment($id)
	{
		$data = $this->appoinment_mod->find_writings_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		$action_log['action_id'] = $id;
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/view_writings_appoinment', ['data' => $data, ]);
	}
	public function delete_writings_appoinment() 
	{
		$id = $this->input->post('id');
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		$action_log['action_id'] = $id;
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		$this->appoinment_mod->delete_writings_appoinment($id);
		
		echo json_encode('delete success');
	}
	function print_writings_pdf($id){
		$filename = time()."_order.pdf";
		$data = $this->appoinment_mod->find_writings_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'writings_appoinment';
		$action_log['action_id'] = $id;
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'pdf';
		$this->db->insert('action_log', $action_log);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->load->library('m_pdf');
 		$stylesheet = file_get_contents('assets/scss/style.scss'); 
 		$html=$this->load->view('admin/print_writings_appoinment', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	// writings End

	// Start consultation 
	public function add_consultation_appoinment($id){
		$employees=$this->case_mod->get_employee();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$this->load->view('admin/add_consultation_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
		//$this->load->view('admin/add_consultation_appoinment',['data'=>'','employees'=>$employees]);
	}

	public function store_consultation_appoinment() { $employees=$this->case_mod->get_employee();
		$config=[
			'upload_path' => './uploads/appoinment/consultation_appoinment/',
			'allowed_types' => 'jpg|fig|doc|docx|jpeg|pdf',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$id=$post['id'];
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		
		$post['user_id']=$this->session->userdata('admin_id');
		$post['upload_file']=$_FILES['upload_file']['name'];
		if($this->form_validation->run('add_consultation_appoinment')) {
			if(isset($post['newconsultation'])){ 
				unset($post['newconsultation']); 
				unset($post['id']);
				$this->db->insert('consultation_appoinment',$post);  
				$insert_id = $this->db->insert_id();
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $insert_id;
		$action_log['status_type'] = 'add';
		$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){$this->upload->data();} 
			}	
			else if($id){
				$this->db->where('id',$id)->update('consultation_appoinment',$post);
								$insert_id = $this->db->insert_id();
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit';
		$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			} else {
				$this->db->insert('consultation_appoinment',$post); $insert_id = $this->db->insert_id();
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				
				$case_data = $this->appoinment_mod->get_case($post['client_file_number']);
					$insert_id = $this->db->insert_id();
					if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
					$action_log['action_type'] = 'consultation_appoinment';
					if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
					$action_log['action_id'] = $insert_id;
					$action_log['status_type'] = 'add';
					$this->db->insert('action_log', $action_log);
				if(isset($case_data->customers_id))
				{
					$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
					$noti['appointment_id'] = $insert_id;   $insert_id = $this->db->insert_id();
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'consultation_appoinment';
					$noti['status_type'] = 'add';
						//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
				$email = $users['email'];
				$name = $users['name']; 
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
				$this->email->subject('Your Consultation Appointment schedule');
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();
					$this->db->insert('notification', $noti);
				}
			}
			return redirect('admin/appoinment/list_consultation_appoinment');
	
		} else {
			if($id){
		
				$this->load->view('admin/add_consultation_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
			} else {
		
				$this->load->view('admin/add_consultation_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
			}
		}
	}

	public function list_consultation_appoinment(){
		$data = $this->appoinment_mod->list_consultation_appoinment();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_consultation_appoinment', ['data' => $data,]);
	}	

	public function find_consultation_appoinment($id)
	{
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$employees=$this->case_mod->get_employee();
		$data = $this->appoinment_mod->find_consultation_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$app_data = $this->appoinment_mod->app_data($id);
		$this->load->view('admin/add_consultation_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>$app_data]);
	}
	public function view_consultation_appoinment($id)
	{
		$data = $this->appoinment_mod->find_consultation_appoinment($id);
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/view_consultation_appoinment', ['data' => $data, ]);
	}

	public function delete_consultation_appoinment()
	{
		$id = $this->input->post('id');
		$this->appoinment_mod->delete_consultation_appoinment($id);
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('delete success');
	}
	function print_consultation_pdf($id){
		$filename = time()."_order.pdf";
		$data = $this->appoinment_mod->find_consultation_appoinment($id);
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'consultation_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'pdf';
		$this->db->insert('action_log', $action_log);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->load->library('m_pdf');
 		$stylesheet = file_get_contents('assets/scss/style.scss'); 
 		$html=$this->load->view('admin/print_consultation_appoinment', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	// End 

	// Start Visiting 
	public function add_visiting_appoinment($id){
		$employees=$this->case_mod->get_employee();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'visiting_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$this->load->view('admin/add_visiting_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
		//$this->load->view('admin/add_visiting_appoinment',['data'=>'','employees'=>$employees]);
	}

	public function find_visiting_appoinment($id)
	{
		$employees=$this->case_mod->get_employee();
		$data = $this->appoinment_mod->find_visiting_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'visiting_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$app_data = $this->appoinment_mod->app_data($id);
		$this->load->view('admin/add_visiting_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>$app_data]);
		//$this->load->view('admin/add_visiting_appoinment', ['data' => $data, 'employees'=>$employees]);
	}
	public function view_visiting_appoinment($id)
	{
		$data = $this->appoinment_mod->find_visiting_appoinment($id);
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'visiting_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/view_visiting_appoinment', ['data' => $data, ]);
	}

	public function list_visiting_appoinment(){
		$data = $this->appoinment_mod->list_visiting_appoinment();
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'visiting_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_visiting_appoinment', ['data' => $data]);
	}

	public function store_visiting_appoinment(){
		$employees=$this->case_mod->get_employee();
		$config=[
			'upload_path' => './uploads/appoinment/visiting_appoinment/',
			'allowed_types' => 'jpg|fig|doc|docx|jpeg|pdf',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$id=$post['id'];
		$post['user_id']=$this->session->userdata('admin_id');
		$post['upload_file']=$_FILES['upload_file']['name'];
		if($this->form_validation->run('add_visiting_appoinment')) {
			if(isset($post['newvisiting'])){ 
				unset($post['newvisiting']);
				unset($post['id']);
				$this->db->insert('visiting_appoinment',$post);
				$id = $this->db->insert_id();
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
				$action_log['action_type'] = 'visiting_appoinment';
				if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
				$action_log['action_id'] = $id;
				$action_log['status_type'] = 'add';
				$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){
					$this->upload->data();
				}
			}	
			else if($id){
				$this->db->where('id',$id)->update('visiting_appoinment',$post);
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
				$action_log['action_type'] = 'visiting_appoinment';
				if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
				$action_log['action_id'] = $id;
				$action_log['status_type'] = 'edit';
				$this->db->insert('action_log', $action_log);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			} else {
				$this->db->insert('visiting_appoinment',$post);  $insert_id = $this->db->insert_id();
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
				$action_log['action_type'] = 'visiting_appoinment';
				if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
				$action_log['action_id'] = $insert_id;
				$action_log['status_type'] = 'add';
				$this->db->insert('action_log', $action_log);
				$case_data = $this->appoinment_mod->get_case($post['client_file_number']);
				if(isset($case_data->customers_id))
				{
					$noti['customer_id'] = $case_data->customers_id;
					$noti['case_id'] = $case_data->id;
$noti['appointment_id'] = $insert_id;
					$noti['user_id'] = $case_data->user_id;
					$noti['notification_type'] = 'visiting_appoinment';
					$noti['status_type'] = 'add';
						//email
				$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array(); 
				$email = $users['email'];
				$name = $users['name']; 
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
				$this->email->subject('Your Visiting Appointment schedule');
				$body = $this->load->view('admin/add-case-email.php', $new, true);
				$this->email->message($body);
				$this->email->send();
					$this->db->insert('notification', $noti);
				}
			}
			return redirect('admin/appoinment/list_visiting_appoinment');
		} else {
			if($id){
				//$this->load->view('admin/add_visiting_appoinment',['data'=>'','employees'=>$employees]);
					$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$this->load->view('admin/add_visiting_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
			} else {
				//$this->load->view('admin/add_visiting_appoinment',['data'=>'','employees'=>$employees]);
		$case_data=$this->appoinment_mod->app_case_data($id);
		$note_data=$this->appoinment_mod->app_note_data($id);
		$this->load->view('admin/add_visiting_appoinment',['data'=>'','case_data'=>$case_data,'note_data'=>$note_data,'employees'=>$employees,'app_data'=>'']);
			}
		}
	}
	public function delete_visiting_appoinment() 
	{
		$id = $this->input->post('id');
		$this->appoinment_mod->delete_visiting_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'visiting_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		
		echo json_encode('delete success');
	}
	function print_visiting_pdf($id){
		$filename = time()."_order.pdf";
		$data = $this->appoinment_mod->find_visiting_appoinment($id);
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		$action_log['action_type'] = 'visiting_appoinment';
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'pdf';
		$this->db->insert('action_log', $action_log);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->load->library('m_pdf');
 		$stylesheet = file_get_contents('assets/scss/style.scss'); 
 		$html=$this->load->view('admin/print_visiting_appoinment', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	// Visiting End 
}
?>