<?php
class c_case extends MY_Controller
{
public function __construct()
{
	parent::__construct();
	$this->isAdmintLogged();
	$this->load->model('admin/case_mod');
	$this->load->model('admin/customer_mod');
	$this->load->model('admin/mission_general_mod');
}

public function edit_case()
{
	
	$post=$this->input->post(); 
	$id=$this->uri->segment(4);
	if($post){
		if ($this->form_validation->run('add_case')) {
            $post['add_edit']=1;
            $case_start_date = $post['case_start_date'];
			$objection_date1 = $post['objection_date'];
			if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="" ) {
			unset($post['case_start_date'],$post['objection_date']);
			$case_start_date = explode('/',$case_start_date);
			$objection_date = explode('/',$objection_date1);
			$post['case_start_date'] = Hijri2Greg($case_start_date[0],$case_start_date[1],$case_start_date[2],true);
			if($objection_date1){
			    $post['objection_date'] = Hijri2Greg($objection_date[0],$objection_date[1],$objection_date[2],true);
			}
			}
			$this->case_mod->edit_case($id,$post); 
			return redirect('admin/customer/list_customer');
			
		}
	}
	$data=$this->case_mod->find_case($id);
	$case_type=$this->case_mod->case_type(); 
	$cus=$this->case_mod->dis_cus(); 
	if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { $lan = "ar";}else {$lan = "en";}
	$ser=$this->case_mod->dis_services($lan); 
	$dep=$this->case_mod->dis_department(); 
	$this->load->view('admin/edit_case',['ser'=>$ser,'dep'=>$dep,'cus'=>$cus, 'case_type'=>$case_type, 'data'=>$data]);	
}
public function delete_audio_files_pan($name,$case_number) {
		$img = $this->db->delete('uploads', ['case_id' => $case_number, 'audio' => $name]);
		if ($img) {
			unlink("uploads/audio/" . $name);
		}
        $action_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$action_log['device'] = getDeviceName();

		$action_log['role'] = '3';
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'audio';
		$action_log['status_type'] = 'delete';
		$action_log['action_id'] = $case_number;
		$this->db->insert('action_log', $action_log);
		$cids = getCaseIdByDocId($case_number);
		return redirect("admin/c_case/pending_case_view/$cids");
}
public function add_case()
{
 
	$post=$this->input->post();
	$service=$this->customer_mod->select_service(); 
	$customers_id=$this->uri->segment(4);
	
	if($post){
		$post['user_id']=$this->session->userdata('admin_id');
		if ($this->form_validation->run('add_case')) {
			$post['active_inactive']=1; 
			$post['customers_id']=$customers_id; 
			$case_start_date = $post['case_start_date'];
			$objection_date1 = $post['objection_date'];
			if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") {
			unset($post['case_start_date'],$post['objection_date']);
			$case_start_date = explode('/',$case_start_date);
			$objection_date = explode('/',$objection_date);
			$post['case_start_date'] = Hijri2Greg($case_start_date[0],$case_start_date[1],$case_start_date[2],true);
			if($objection_date1){
			    $post['objection_date'] = Hijri2Greg($objection_date[0],$objection_date[1],$objection_date[2],true);
			}
			}
				$post = $this->security->xss_clean($post);
			$insert_id = $this->case_mod->store_case($post);
			$temp_app_id['case_number']=$insert_id;
			$temp_app_id['temp_app_id']='';
			$this->db->where('temp_app_id',$this->session->userdata('temp_app_id'))->update('document',$temp_app_id);	
			$json_data['case_id']= $insert_id;
			insertActionLog($json_data,$customers_id,"e-service","add");
			if($this->session->userdata('role_id') ==1)
			{
				return redirect("admin/c_case/padding_case/$customers_id");
			}
			else
			{
				return redirect("admin/c_case/customer_case_list/$customers_id");
			}
		}
	}
	$this->session->unset_userdata('temp_app_id');
	$case_no=$this->case_mod->case_no(); 	
	$str2 = substr($case_no['case_number'], 2) + 1;
	$value3 = 'FN'.$str2;
	$case_no= $value3;
	$case_type=$this->case_mod->case_type(); 
	$cus=$this->case_mod->dis_cus(); 
	if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { $lan = "ar";}else {$lan = "en";}
	$ser=$this->case_mod->dis_services($lan); 
	$dep=$this->case_mod->dis_department(); 
	$this->load->view('admin/add_case',['service'=>$service,'ser'=>$ser,'dep'=>$dep,'cus'=>$cus, 'case_type'=>$case_type, 'case_no'=>$case_no,'data'=>'']);	
}
public function opponent_list()
{
	$data=$this->db->select('*')->where("(opponent_full_name != '')", NULL, FALSE)->order_by("id", "desc")->get('c_case')->result_array();
	$this->load->view('admin/opponent_list',['data'=>$data]);
}

public function store_case()//navo case store thai ena mate
{
	$ser=$this->case_mod->dis_services(); 
	$case_type=$this->case_mod->case_type();
	$config=[
		'upload_path'	=> './uploads/case_file/',
		'allowed_types'	=>'jpg|gif|png|jpeg',
	];
	$this->load->library('upload',$config);	
	$post=$this->input->post(); 
	$id=$post['id'];
	$customers_id=$post['customers_id'];
	$post['user_id']=$this->session->userdata('admin_id');
	unset($post['id']);
	unset($post['upload_file']);
	if ($this->form_validation->run('add_case')) {
		
		if($id)
		{			
			// $post['case_id']=$id;
			$post['add_edit']=1;
			if ($this->upload->do_upload('upload_file')) {$data = $this->upload->data();}
			$case_start_date = $post['case_start_date'];
			$objection_date = $post['objection_date'];
			if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") {
			unset($post['case_start_date'],$post['objection_date']);
			$case_start_date = explode('-',$case_start_date);
			$objection_date = explode('-',$objection_date);
			$post['case_start_date'] = Hijri2Greg($case_start_date[1],$case_start_date[2],$case_start_date[0],true);
			$post['objection_date'] = Hijri2Greg($objection_date[1],$objection_date[2],$objection_date[0],true);
			}
			$this->case_mod->edit_case($id,$post);
			return redirect('admin/c_case/list_case');
		
		}
		else
		{	
			$post['active_inactive']=1; 
			$this->case_mod->store_case($post);
			$insert_id = $this->db->insert_id();
			if($this->session->userdata('role_id') ==1)
			{
				return redirect('admin/c_case/padding_case');
			}
			else
			{
				return redirect('admin/c_case/list_case');
			}
		}
	}
	else
	{
		if($id)
		{
			$this->load->view('admin/add_case',['ser'=>$ser,'case_type'=>$case_type,'data'=>'']);
		}
		else
		{	
			$this->load->view('admin/add_case',['ser'=>$ser,'id'=>$customers_id,'case_type'=>$case_type,'data'=>'']);
		}
	}
}
public function reject_case()// assign_case karva mate
{
	$id=$this->input->post('id');

	$notes=$this->input->post('notes');
	$rcase['is_reject'] = 1;
	$rcase['reject_note'] =$notes;
	$rcase = $this->security->xss_clean($rcase);
	$this->db->where('case_id',$id)->update('case_temp',$rcase);

	$case=$this->db->select('*')->where('case_id',$id)->get('case_temp')->row_array();
	$users=$this->db->select('*')->where('id',$case['customers_id'])->get('users')->row_array(); 
	$noti['customer_id'] = $case['customers_id'];
	$noti['case_id'] = $id;;
	$noti['notification_type'] = 'case';
    $noti['create_date']=date("Y-m-d G:i:s");
	$noti['status_type'] = 'reject';
	$this->db->insert('notification', $noti);
	$email = $users['email'];
	$name = $users['name']; 
	$phone = $users['phone']; 
	
	$config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'priority' => '1',
	);
	$this->load->library('email', $config);
	 
	$new = ['to_email' => $email,'case_id' => $id,'notification_type' =>'', 'name' => $name, 'notes' => $notes,'status_type'=>'reject'];
	$from_email = constant("FROM_EMAIL");
	$to_email = $email;
	$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
	$this->email->set_header('Content-type', 'text/html');
	$this->email->from($from_email, constant("SENDER_NAME"));
	$this->email->to($to_email);
	$this->email->subject($this->lang->line('Your_e_service_has_been_rejected').' - '.constant("SENDER_NAME"));
	$body = $this->load->view('admin/add-case-email.php', $new, true);
	$this->email->message($body);
	$this->email->send();
	if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
    $msg = "شريكنا العزيز: لقد تعذر قبول طلب الخدمة القانونية رقم: ". getCaseNumber($noti['case_id'])." لمعرفة التفاصيل يرجى زيارة إحدى منصاتنا الإلكترونية";
	}else{ 
     $msg ="The request for E service No.". getCaseNumber($noti['case_id'])." was refused. For details, please visit one of “Nassr” platforms.";    
	}
	sendSMSProcess($phone,$msg);
	$json_data['case_id']= $noti['case_id'];
	insertActionLog($json_data,$case['customers_id'],"e-service","reject");
}
public function assign_case()// assign_case karva mate
{
	$id=$this->input->post('id');
	$case=$this->db->select('*')->where('id',$id)->get('c_case')->row_array();
	$following_employee_id=$this->input->post('following_employee_id');
	$customers_id=$this->input->post('customers_id');
	$empid=$this->input->post('empid');
	
	$found= $this->db->select('*')->where(['case_id'=>$id,'responsible_employee'=>$empid])->get('assignment')->row();
	if($found){
		echo json_encode('E-service already assign to this employee');
		return false;
	}
	if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") {
		$start_date = explode('/',$this->input->post('start_date'));
		$end_date = explode('/',$this->input->post('end_date'));
		$start_date = Hijri2Greg($start_date[0],$start_date[1],$start_date[2],true);
		$end_date = Hijri2Greg($end_date[0],$end_date[1],$end_date[2],true);
 
		} else{
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
		}
	$start_time=$this->input->post('start_time');
	$end_time=$this->input->post('end_time');
	$note=$this->input->post('notes');
	
	$task['user_id'] = $empid;
	$task['customer_id'] = $customers_id;
	$task['case_id'] = $id;
	$task['follow_up_employee'] = $following_employee_id;
	$task['responsible_employee'] = $empid;
	$task['starting_date'] = $start_date;
//	$task['ending_date'] = $end_date;
	$task['start_time'] = $start_time;
//	$task['ending_time'] = $end_time;
	$task['note'] = $note;
 
	$task = $this->security->xss_clean($task);
	$this->db->insert('assignment', $task);
	
	$noti['customer_id'] = $case['customers_id'];
	$noti['case_id'] = $id;;
	$noti['user_id'] = $empid;
	$noti['notification_type'] = 'case';
	$noti['status_type'] = 'assign';
	$this->db->insert('notification', $noti);
/* 	$notes['note']=$note;
	$notes['case_id']=$id;
	$notes['follow_up_employee'] = $following_employee_id;
	$notes['responsible_employee'] = $empid;
	$notes['user_id']=$this->session->userdata('admin_id');
	$notes['role_id']=$this->session->userdata('role_id');
	$this->db->insert('case_note',$notes); */
	//$this->case_mod->delete_case($id);
	$user = [
    	'user_id' => $empid,
    	'follow_up_employee' => $following_employee_id,
    	'responsible_employee' => $empid,
    ];
	//email
	$users=$this->db->select('*')->where('id',$case['customers_id'])->get('users')->row_array(); 
	$email = $users['email'];
	$name = $users['name']; 
	$config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'priority' => '1',
	);
	$this->load->library('email', $config);
	$emp=$this->db->select('name')->where('id',$noti['user_id'])->get('users')->row_array();	
	$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name, 'ename'=> $emp['name']];
	$from_email = constant("FROM_EMAIL");
	$to_email = $email;
	$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
	$this->email->set_header('Content-type', 'text/html');
	$this->email->from($from_email, constant("SENDER_NAME"));
	$this->email->to($to_email);
	$this->email->subject($this->lang->line('Your_case_has_been_assign'));
	$body = $this->load->view('admin/add-case-email.php', $new, true);
	$this->email->message($body);
	$this->email->send();
	
	//Flow
	$users=$this->db->select('*')->where('id',$following_employee_id)->get('users')->row_array(); 
	$email = $users['email'];
	$name = $users['name']; 
	$config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'priority' => '1',
	);
	$this->load->library('email', $config);
	$emp=$this->db->select('name')->where('id',$noti['user_id'])->get('users')->row_array();	
	
	$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 
	'status_type' => "case_follow_emp", 'name' => $name, 'ename'=> $emp['name']];

	$from_email = constant("FROM_EMAIL");
	$to_email = $email;
	$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
	$this->email->set_header('Content-type', 'text/html');
	$this->email->from($from_email, constant("SENDER_NAME"));
	$this->email->to($to_email);
	$this->email->subject($this->lang->line('assign_as_follower_employee'));
	$body = $this->load->view('admin/add-case-email.php', $new, true);
	$this->email->message($body);
	$this->email->send();
	
	//Respons
	$users=$this->db->select('*')->where('id',$empid)->get('users')->row_array(); 
	$email = $users['email'];
	$name = $users['name']; 
	$config = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'priority' => '1',
	);  
	$this->load->library('email', $config);
	$emp=$this->db->select('name')->where('id',$noti['user_id'])->get('users')->row_array();	
	
	$new = ['to_email' => $email,'case_id' => $noti['case_id'] , 'notification_type' => $noti['notification_type'], 
	'status_type' => "case_res_emp", 'name' => $name, 'ename'=> $emp['name']];

	$from_email = constant("FROM_EMAIL");
	$to_email = $email;
	$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
	$this->email->set_header('Content-type', 'text/html');
	$this->email->from($from_email, constant("SENDER_NAME"));
	$this->email->to($to_email);
	$this->email->subject($this->lang->line('assign_as_responsible_employee'));
	$body = $this->load->view('admin/add-case-email.php', $new, true);
	$this->email->message($body);
	$this->email->send();
	$user = $this->security->xss_clean($user);
	$this->db->where('id',$id)->update('c_case',$user);
	$json_data['follow_up_employee'] = $following_employee_id;
	$json_data['responsible_employee'] = $empid;
	$json_data['case_id']= $id;
	insertActionLog($json_data,$case['customers_id'],"e-service","assign");
	echo json_encode('Assign Case Successfully'); 
}
public function cus_list_add_case($id)//list mathi case add kare tyre
{	
	
}
public function delete_admin_modify_upload_file() {
    $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
    $sanitized_name = basename(preg_replace('/[^a-zA-Z0-9._-]/', '', $name)); // Safe file name

    $filepath = "./uploads/case_file/" . $sanitized_name;

    $this->db->where('name', $sanitized_name);
    $this->db->delete('document');

    if (file_exists($filepath)) {
        unlink($filepath);
    }

    echo "Deleted File " . htmlspecialchars($sanitized_name) . "<br>";
}
public function delete_upload_files($name,$case_number) {

$img = $this->db->delete('document', ['id' => $case_number, 'name' => $name]);

if ($img) {
	unlink("uploads/case_file/" . $name);
}
$send=$_SERVER['HTTP_REFERER'];
$json_data['case_id']= $case_number;
insertActionLog($json_data,0,"e-service","assign");
return redirect($send);

}
public function admin_modify_upload_file() {
	$fid = $_POST['fid'];
		$cat_id = $_POST['cat_id'];
	 	$type = isset($_POST['type'])?$_POST['type']:'';
		if(isset($_POST['customer_id'])){
		$customers_id = $_POST['customer_id'];
		}
		if($type == ''){
			$type = "Case";
		}
		$temp_app_id = isset($_POST['temp_app_id'])?$_POST['temp_app_id']:'';
		$name1 = $_FILES['image']['name'];
		$ext = pathinfo($name1, PATHINFO_EXTENSION);
		$fname = $type."_".time();
		
		$this->load->helper('string');
		$rand = random_string('alnum',5);
		if(!$this->session->userdata('temp_app_id')){
		$this->session->set_userdata('temp_app_id', $rand);	
		}
		if($temp_app_id==0) unset($temp_app_id);
		if($type == "Case"){
			$temp_app_id =  $fid;
		} else {
			$temp_app_id =isset($temp_app_id)?$temp_app_id:$this->session->userdata('temp_app_id') ;
		}
 
		if($type == "expense"){
			$temp_app_id =  $fid;
		}
		
		if($type == "project"){
			$temp_app_id =  $fid;
		}
		$name = $fname."_".$cat_id."_".$fid."_".$this->session->userdata('user_id').".".$ext;
		$case = $this->db->select('*')->where('id',$fid)->get('c_case')->row_array();
		$files = $this->db->select('*')->where("(name = '$name1' AND cat_id = $cat_id AND  temp_app_id='$fid')", NULL, FALSE)->get('document')->row();
		$get_assign=$this->db->select(['assign_id'])->where('case_number',$fid)->get('document')->row();  
		if($get_assign->assign_id!=0){
			$ass_id = $get_assign->assign_id;
		} else {
			$ass_id  = 0;
		}
		if(isset($files->name)){
			$name = $files->name;
		}
		$config = [
			'upload_path' => './uploads/case_file',
			'allowed_types' => 'jpg|gif|png|jpeg|pdf|doc|docx|txt',
			'overwrite' =>true,
			'file_name'	=> $name,
		];
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(isset($files->name)){
			//$this->db->where('id', $files->id)->update('users','name' => $name, );
			if ($this->upload->do_upload('image')) {
				$data = $this->upload->data();
			}
		} else {
		$insert = ['name' => $name, 'created'=>date("Y-m-d G:i:s"),'uploaded_by' => $this->session->userdata('admin_id'), 'user_id' => $this->session->userdata('admin_id'), 'customer_id' =>  isset($case['customers_id'])?$case['customers_id']:$customers_id, 'temp_app_id' =>$fid, 'cat_id' =>$cat_id,  'assign_id' =>$ass_id,'type' =>$type,'temp_app_id' =>$temp_app_id];
		$this->db->insert('document', $insert);
	if ($this->upload->do_upload('image')) {

		$data = $this->upload->data();
	}
 
	}
	$ret['name']= $name;
	$json_data['case_id']= $fid;
	$json_data['file_type']= $cat_id;
	insertActionLog($json_data,isset($case['customers_id'])?$case['customers_id']:$customers_id,"e-service","add-file");
    echo json_encode($ret);
}

public function list_case()//case nu list display karva mate
{
	$list=$this->case_mod->list_case();
	$employees=$this->case_mod->get_employee();
	$case_type=$this->case_mod->case_type();
	
	$json_data="";
	insertActionLog($json_data,0,"e-service","list");
	return	$this->load->view('admin/list_case',['list'=>$list,'employees'=>$employees,'case_type'=>$case_type]);
}	
public function customer_case_list($id)
{
$list=$this->db->select('*')->where('customers_id',$id)->order_by("id", "desc")->get('c_case')->result_array(); 
$this->db->select('c_case.*,case_temp.case_id,case_temp.is_reject');
$this->db->from('c_case');
$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
$this->db->where('c_case.customers_id',$id);
$this->db->order_by('c_case.id', 'DESC');
$list =  $query=$this->db->get()->result_array();
$employees=$this->case_mod->get_employee();
$case_type=$this->case_mod->case_type();
$json_data ='';
insertActionLog($json_data,$id,"e-service","list");
return $this->load->view('admin/list_case',['list'=>$list,'employees'=>$employees,'case_type'=>$case_type]);
}	


public function padding_case()//padding case display karava mate
{
	$padding_case=$this->case_mod->padding_case();
	$json_data="";
	insertActionLog($json_data,0,"e-service","padding-list");
	return $this->load->view('admin/padding_case',['padding_case'=>$padding_case]);
}
public function reject_case_list()//padding case display karava mate
{
	$padding_case=$this->case_mod->reject_case_list();
	$json_data="";
	insertActionLog($json_data,0,"e-service","reject-list");
	return $this->load->view('admin/reject_case_list',['padding_case'=>$padding_case]);
}
function padding_list(){
	$padding_case=$this->case_mod->padding_case();
	$json_data="";
	insertActionLog($json_data,0,"e-service","padding-list");
	return $this->load->view('admin/padding_case',['padding_case'=>$padding_case]);
}
public function approve_case($id)//case approve karyo
{
	$approve=$this->case_mod->approve_case($id); 
	$json_data['case_id'] =$id;
	insertActionLog($json_data,0,"e-service","approve");
	return redirect('admin/c_case/padding_case');
}

public function approve_case_pending($id)//case approve karyo
{
	$approve=$this->case_mod->approve_case_pending($id); 
	$json_data['case_id'] =$id;
	insertActionLog($json_data,0,"e-service","approve");
	return redirect('admin/c_case/padding_case');
}

public function approve_case_dashboard($id)//case approve karyo
{
	$approve=$this->case_mod->approve_case($id);
	$json_data['case_id'] =$id;
	insertActionLog($json_data,0,"e-service","approve");
	return redirect('admin/dashboard');
}	
public function delete_case()// approve case delete karva mate
{
	$id=$this->input->post('id');
	$data = $this->case_mod->delete_case($id);
	if(empty($data)){
		echo $this->lang->line('employe_delete_notice');
		return false;
	}
	$json_data['case_id'] =$id;
	insertActionLog($json_data,0,"e-service","delete");
	echo "true"; exit; 
}
public function find_case($id)//je case edit karva no 6e te find karva mate
{		
	$ser=$this->case_mod->dis_services();
	$case_type=$this->case_mod->case_type();
	$data=$this->case_mod->find_case($id);//cuse na data
	$ser=$this->case_mod->dis_services();//service display mate
	return $this->load->view('admin/add_case',['service'=>$ser,'data'=>$data, 'ser'=>$ser,'case_type'=>$case_type]);	
}
public function view_case($id)//je case edit karva no 6e te find karva mate
{	
	$data=$this->case_mod->find_case($id); 
	$ser=$this->case_mod->dis_services(); 
	$list=$this->case_mod->list_case();
	$employees=$this->case_mod->get_employee();
	$task_type=$this->mission_general_mod->task_type();
	$json_data['case_id'] =$id;
	
		$session =  $this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = session_mission.case_id", 'left')
		->where("session_mission.case_id",$id)->where("session_mission.sub_mission_id",0)
		->get('session_mission')
		->result_array();
		
		//$writings=$this->db->select('*')->where('client_file_number',$client_file_number)->get('writing_misssion')->result_array(); 
		
		$writings =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
		->where("writing_misssion.case_id",$id)->where("writing_misssion.sub_mission_id",0)
		->get('writing_misssion')
		->result_array();
		
		
		//$consultation=$this->db->select('*')->where('client_file_number',$client_file_number)->get('consultation_mission')->result_array();
		
		$consultation =  $this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
		->where("consultation_mission.case_id",$id)->where("consultation_mission.sub_mission_id",0)
		->get('consultation_mission')
		->result_array();
		
		//$general=$this->db->select('*')->where('client_file_number',$client_file_number)->get('general_mission')->result_array();
		
		$general =  $this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = general_mission.case_id", 'left')
		->where("general_mission.case_id",$id)->where("general_mission.sub_mission_id",0)
		->get('general_mission')
		->result_array();
		
		//$visiting=$this->db->select('*')->where('client_file_number',$client_file_number)->get('visiting_mission')->result_array(); 
		
		$visiting =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
		->where("visiting_mission.case_id",$id)->where("visiting_mission.sub_mission_id",0)
		->get('visiting_mission')
		->result_array();

		$notes = $this->db->select("note.*, c_case.id as case_id, c_case.client_name, c_case.service_types, c_case.case_number, c_case.opponent_full_name, c_case.case_title, c_case.court_name, c_case.judge_name")->join('c_case', 'c_case.id = note.case_id', 'left')
        ->where('note.case_id', $id)
        ->get('note')
        ->result_array();
	
	insertActionLog($json_data,0,"e-service","view");
	return $this->load->view('admin/view_case',['service'=>$ser,'data'=>$data,'session'=>$session,'general'=>$general,'writings'=>$writings,'consultation'=>$consultation,'visiting'=>$visiting, 'notes' => $notes, 'employees'=>$employees, 'list'=>$list, 'task_type'=>$task_type]);	
}
public function pending_case_view($id)
{		
    print_r();
	$json_data['case_id'] =$id;

	    $session =  $this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = session_mission.case_id", 'left')
		->where("session_mission.case_id",$id)->where("session_mission.sub_mission_id",0)
		->get('session_mission')
		->result_array();
	    
		//$writings=$this->db->select('*')->where('client_file_number',$client_file_number)->get('writing_misssion')->result_array(); 
		
		$writings =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
		->where("writing_misssion.case_id",$id)->where("writing_misssion.sub_mission_id",0)
		->get('writing_misssion')
		->result_array();
		
		
		//$consultation=$this->db->select('*')->where('client_file_number',$client_file_number)->get('consultation_mission')->result_array();
		
		$consultation =  $this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
		->where("consultation_mission.case_id",$id)->where("consultation_mission.sub_mission_id",0)
		->get('consultation_mission')
		->result_array();
		
		//$general=$this->db->select('*')->where('client_file_number',$client_file_number)->get('general_mission')->result_array();
		
		$general =  $this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = general_mission.case_id", 'left')
		->where("general_mission.case_id",$id)->where("general_mission.sub_mission_id",0)
		->get('general_mission')
		->result_array();
		
		//$visiting=$this->db->select('*')->where('client_file_number',$client_file_number)->get('visiting_mission')->result_array(); 
		
		$visiting =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
		->where("visiting_mission.case_id",$id)->where("visiting_mission.sub_mission_id",0)
		->get('visiting_mission')
		->result_array();
		
	insertActionLog($json_data,0,"e-service","pending-view");
	$read['is_read'] = 1;
	$read = $this->security->xss_clean($read);
	$this->db->where('case_id',$id)->update('case_temp',$read);
	$data=$this->case_mod->find_case($id); 
	$ser=$this->case_mod->dis_services(); 
	return $this->load->view('admin/pending_case_view',['service'=>$ser,'data'=>$data,'session'=>$session,'writings'=>$writings,'consultation'=>$consultation,'visiting'=>$visiting]);	
	 
}

function print_case_pdf($id){
	
	$filename = time()."_order.pdf";
	$data = $this->case_mod->find_case($id);
	$pdfFilePath = "output_pdf_name.pdf";
	$this->load->library('m_pdf');
	$stylesheet = file_get_contents('assets/scss/style.scss'); 
	$html=$this->load->view('admin/print_case_pdf', ['data' => $data], true);
	$this->m_pdf->pdf->WriteHTML($stylesheet,1);
	$this->m_pdf->pdf->WriteHTML($html);
	$this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	$json_data['case_id'] =$id;
	insertActionLog($json_data,0,"e-service","print");
}	

}
?>