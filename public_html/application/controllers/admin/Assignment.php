<?php
class Assignment extends MY_Controller {
	public function __construct() {
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/customer_mod');
		$this->load->model('admin/case_mod');
	}
	public function Index()  
	{
		$list_customer = $this->customer_mod->list_customer();
		$employees=$this->case_mod->get_employee();
		$json_data="";
		insertActionLog($json_data,0,"assignment","assignment file list");
		$this->load->view('admin/list_assignment', ['list_customer' => $list_customer,'employees'=>$employees]);

	}
	public function list_following_employee(){
	
	$list=$this->case_mod->list_following_employee();
	$employees=$this->case_mod->get_employee();
	$case_type=$this->case_mod->case_type();
	$json_data="";
	insertActionLog($json_data,0, "assignment","follow-list");
	$this->load->view('admin/list_following_employee',['list'=>$list,'employees'=>$employees,'case_type'=>$case_type]);
		
	}
	public function list_responsible_employee(){
	
	$list=$this->case_mod->list_responsible_employee();
	$employees=$this->case_mod->get_employee();
	$case_type=$this->case_mod->case_type();
	$json_data="";
	insertActionLog($json_data,0,"assignment","responsible-list");
	$this->load->view('admin/list_responsible_employee',['list'=>$list,'employees'=>$employees,'case_type'=>$case_type]);
		
	}
	public function list_send_assignment()  {
		
		if($role_id == 1){
		$list =	$this->db->select('c_case.*,assignment.case_id,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.follow_up_employee,assignment.responsible_employee, assignment.customer_id,assignment.user_id as uid,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
			$this->db->where('c_case.active_inactive','0');
			$this->db->order_by("assignment.id", "desc");	
            $this->db->group_by("assignment.id");
			 $list = $this->db->get()->result_array();
		}
		  else  if(in_array($this->session->userdata('admin_id'),getFileManager())){
          $this->db->select('c_case.*,assignment.case_id,assignment.follow_up_employee,assignment.starting_date,assignment.ending_date, assignment.start_time,assignment.ending_time,assignment.responsible_employee,assignment.user_id, assignment.customer_id,assignment.note as assign_note');
			$this->db->from('c_case');
			$this->db->join('assignment','assignment.case_id=c_case.id');
	        $this->db->where('c_case.user_id',$this->session->userdata('admin_id')); 
			$this->db->order_by("assignment.id", "desc");	
            $this->db->group_by("assignment.id");
			$list =  $this->db->get()->result_array();
        }
		$this->load->view('admin/list_send_assignment',['list'=>$list]);
	}
	public function list_assignment_case()  
	{

	$list=$this->case_mod->list_assignment_case();
	$employees=$this->case_mod->get_employee();
	$case_type=$this->case_mod->case_type();
	$json_data="";
	insertActionLog($json_data,0,"assignment","list-assignment-case");
	$this->load->view('admin/list_assignment_case',['list'=>$list,'employees'=>$employees,'case_type'=>$case_type]);
	}
	public function padding_assigenment_list()
	{
	$list=$this->db->select('*')->where('is_reject',0)->where('user_id',$this->session->userdata('admin_id'))->order_by("id", "desc")->get('case_temp')->result_array(); 
 	$json_data="";
	insertActionLog($json_data,0,"assignment","pending-assignment-case");
	$this->load->view('admin/padding_assigenment_list',['list'=>$list]);
	}
	public function add_note() {
		$post=$this->input->post();
		$note=$this->input->post('note');
		$case_id=$this->input->post('case_id');
		$type=$this->input->post('type');
		$this->load->helper('string');
		$rand = random_string('alnum',5);
		if(!$this->session->userdata('temp_app_id')){
		$this->session->set_userdata('temp_app_id', $rand);	
		}
		
		$temp_app_id = $this->session->userdata('temp_app_id');
		$notes['note']=$note;
		$notes['app_id']=isset($post['app_id'])?$post['app_id']:'';
		$notes['type']=$type;
    	$notes['create_date']=date("Y-m-d G:i:s");
		$notes['case_id']=$case_id;
	//	$notes['follow_up_employee'] = $following_employee_id;
		$notes['user_id']=$this->session->userdata('admin_id');
		$notes['role_id']=$this->session->userdata('role_id');
		$notes['temp_app_id']=$this->session->userdata('temp_app_id');
	    $notes = $this->security->xss_clean($notes);
		$this->db->insert('case_note',$notes);
		$insert_id = $this->db->insert_id();
		$cn = $this->db->select('*')->where(['id'=>$insert_id])->get('case_note')->row();
		if($type=="session"){
			$table="session_mission";
			$msgd="session mission";
		}
		if($type=="consultati"){
			$table="consultation_mission";
			$msgd="consultation mission";
		}
		if($type=="general"){
			$table="general_mission";
			$msgd="general mission";
		}
		if($type=="writing"){
			$table="writing_misssion";
			$msgd="writing mission";
		}
		if($type=="visiting"){
			$table="visiting_mission";
			$msgd="visiting mission";
		}
				
		if($type=="session" OR $type=="consultati" OR $type=="general" OR $type=="writing" OR $type=="visiting"){
	 
			$mid=$this->db->select('*')->where('id',$cn->app_id)->get("$table")->result_array();
			$fdata=$this->db->select('following_employee_id')->where('app_id',$cn->app_id)->where('type',$table)->get("assign_mission")->result_array();
		  
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
			 
			$new = ['notification_type' => 'mission_note', 'status_type' =>$note,'msgd'=>$msgd];
 
			$from_email = constant("FROM_EMAIL");
			$to_email ="$user_email";
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject($this->lang->line('Youhavenewmessagein').$msgd);
			$body = $this->load->view('admin/add-case-email.php', $new, true);
			$this->email->message($body);
			$this->email->send();
			}
	 
		if($type=="project"){
			$mid1=$this->db->select('add_group')->where('id',$cn->app_id)->get("add_project")->row();

	        $mid2=$this->db->select('employee_name')->where('id', $mid1->add_group)->get("employee_group")->row();
	       
	       $js = json_decode($mid2->employee_name);
  
			$snm = array_unique($js);
			$snm =array_diff($snm, array($this->session->userdata('admin_id')));
			$user_email = user_email($snm);
             $user_email = implode(',',$user_email);
             
			$config = Array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			
			 
			$this->load->library('email', $config);
			 
			$new = ['notification_type' => 'project', 'status_type' =>$note,'msgd'=>'project'];

			$from_email = constant("FROM_EMAIL");
			$to_email ="$user_email";
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject($this->lang->line('Youhavenewmessageinproject'));
			$body = $this->load->view('admin/add-case-email.php', $new, true);
			$this->email->message($body);
			$this->email->send();
		} 
		
		
		?>
		<div class="alert alert-<?php if($cn->role_id == 1) echo "info"; if($cn->role_id == 2) echo "warning"; if($cn->role_id == 4) echo "success"; ?>">
			<?php echo $cn->note; ?> <small><i class="float-right"><?php echo getEmployeeName($cn->user_id);?> &nbsp;<?php $timestamp = strtotime($cn->create_date); echo  date("d M Y G:i",$timestamp);?></i></small>
			</div> 
		<?php
	}
	public function convert_file_assignment() {
		$id=$this->input->post('id');
		$convert_from=$this->input->post('convert_from_id');
		$convert_to=$this->input->post('eid');
		$reason=$this->input->post('reason');
		$note=$this->input->post('notes');
						
		$convert['convert_from']=$convert_from;
		$convert['convert_to']=$convert_to;
		$convert['reason']=$reason;
		$convert['notes']=$note;
		$convert_update['user_id']= $convert_to;
		$convert = $this->security->xss_clean($convert);
		$this->db->insert('convert_file_assignment', $convert);
		$this->db->where('id',$id)->update('customers',$convert_update);
		$json_data['reason']= $reason;
		$json_data['note']= $note;
		$getcustomers=$this->db->select('*')->where('id',$id)->get('customers')->row();
		
		$ucase['manager_id']=$getcustomers['user_id'];
		$this->db->where('customers_id',$getcustomers['customers_id'])->update('c_case',$ucase);
		
		
	//Respons
	$users=$this->db->select('*')->where('id',$convert_to)->get('users')->row_array(); 
	$email = $users['email'];
	$name = $users['name']; 
	$config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'priority' => '1',
	);
	$this->load->library('email', $config);
	$emp=$this->db->select('name')->where('id',$noti['user_id'])->get('users')->row_array();	
	
	$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => 'case', 
	'status_type' => "case_convert", 'name' => $name, 'ename'=> $emp['name']];

	$from_email = constant("FROM_EMAIL");
	$to_email = $email;
	$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
	$this->email->set_header('Content-type', 'text/html');
	$this->email->from($from_email, constant("SENDER_NAME"));
	$this->email->to($to_email);
	$this->email->subject($this->lang->line('assign_as_convert_employee')); 
	$body = $this->load->view('admin/add-case-email.php', $new, true);
	$this->email->message($body);
	$this->email->send();
	
		
		
		insertActionLog($json_data,$getcustomers->customers_id,"assignment","convert-file");
		$this->load->view('admin/padding_assigenment_list',['list'=>$list]);
		echo json_encode('Convert File Assignment Successfully'); 
	}
	public function convert_assignment() {
		$id=$this->input->post('id');
		$case_id=$this->input->post('case_id');
		$empid=$this->input->post('empid');
		$eid=$this->input->post('eid');
		$reason=$this->input->post('reason');
		$note=$this->input->post('notes');
		
		$convert['case_id']=$case_id;
		$convert['following_employee_id']=$eid;
		$convert['reason']=$reason;
		$convert['notes']=$note;
		$convert = $this->security->xss_clean($convert);
		$this->db->insert('assignment_convert', $convert);
		$task['follow_up_employee'] = $eid;
		if(isset($empid)){
		$task['responsible_employee'] = $empid; 
		$task1['responsible_employee'] = $empid; 
		$task1['follow_up_employee']=$eid;
		$task1['user_id'] = $empid; 
		$this->db->where('id',$case_id)->update('c_case',$task1);
		}
		$task['note'] = $note;
		$this->db->where('case_id',$case_id)->update('assignment',$task);
		$json_data['reason']= $reason;
		$json_data['note']= $note;
		$json_data['emp_id']= $eid;
		$json_data['responsible_employee']= $empid;
		$json_data['case_id']= $case_id;
		insertActionLog($json_data,$id,"assignment","convert");
		echo json_encode('Convert Assignment Successfully'); 
	}
	
	public function update_assign_case() 
	{
		$id=$this->input->post('id');
		$following_employee_id=$this->input->post('following_employee_id');
		$note=$this->input->post('notes');
		$task['follow_up_employee'] = $following_employee_id;
		//$task['note'] = $note;
		/*$notes['note']=$note;
		$notes['case_id']=$id;
		$notes['follow_up_employee'] = $following_employee_id;
		$notes['user_id']=$this->session->userdata('admin_id');
		$notes['role_id']=4;
		$this->db->insert('case_note',$notes); */
		$this->db->where('case_id',$id)->update('assignment',$task);
		$this->db->where('id',$id)->update('c_case',$task);
		$json_data['case_id']= $id;
		$json_data['following_employee_id']= $following_employee_id;
		insertActionLog($json_data,0,"assignment","update-assign");
		echo json_encode('Assign Case Successfully'); 
	}
}
?>