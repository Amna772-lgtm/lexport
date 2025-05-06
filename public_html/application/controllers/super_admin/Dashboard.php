<?php
class dashboard extends MY_Controller {
	public function __construct() {
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('super_admin/dashboard_mod');
	}
  
	public function read_notification_status() {
			$id = $this->input->post('id');
			$this->db->where('id', $id)->update('case_note',['view' => 1]);
		//if(isset($id)){
			
		//}
		/* $count = $this->db
		->where('customer_id',$this->session->userdata('user_id'))
		->where('read_status',0)
		->get('notification')->num_rows(); */
	}
	public function to_do_list(){
		$post = $this->input->post();
		 if($this->session->userdata('role_id') ==1){
			 $post['admin_id']=$this->session->userdata('admin_id');
		 }else{
			 $post['user_id']=$this->session->userdata('admin_id');
		 }
		
		$post['role_id']=$this->session->userdata('role_id');
		$post['create_date']=date("Y-m-d G:i:s");
		$this->db->insert('to_do_list',$post);
		 if ($post['admin_id']!=0) $bg = "background: #1f3959;";  
		 $dt =  $post['create_date'];
		$date = date("d M Y G:i");
		 if($post['admin_id']!=0) { $un = "By ".getEmployeeName($post['admin_id']); } else { $un = "By You"; }
			$data ='<div class="todotop" style="'.$bg.'">'.$date.' <span style=" float: right; ">'.$un.'</span></div><div class="" style="background: #f3f3f3; padding: 8px 10px 1px 5px;"><div class="m-timeline-3__item m-timeline-3__item--brand">'.$post['note'].' </div></div><br>';
		echo $data;
		
	}
	public function activity($id) {
		$user_activity = $this->dashboard_mod->user_activity($id);
		$this->load->view('super_admin/activity', ['user_activity' => $user_activity]);
	}
	public function activity_ajax() {
		$id = $this->input->post('id');  
		$user_activity = $this->dashboard_mod->user_activity($id);
		echo $this->load->view('super_admin/action_log', ['posts' => $user_activity],true);
	}
	
	public function dashboard_activity_ajax() {
		$id = $this->input->post('id');  
		$active_user = $this->dashboard_mod->active_user();
		echo $this->load->view('super_admin/dashboard_activity_ajax', ['active_user' => $active_user],true);
	}
	public function index()  
	{ 
		/* $all_report = $this->dashboard_mod->all_report(); //new customer mate
		//$total_new_cus=$this->dashboard_mod->total_new_cus();
		$rec_activity_cus = $this->dashboard_mod->rec_activity_cus(); //recent customer display karva mate
		$emp_name = $this->dashboard_mod->emp_name(); //employee fetch karavya
		$admin_name = $this->dashboard_mod->admin_name(); //admin fetch karya
		$rec_activity_emp = $this->dashboard_mod->rec_activity_emp(); //recent employee display karva mate
		$rec_activity_case = $this->dashboard_mod->rec_activity_case(); //recent case display karva mate

		$new_cus = $this->dashboard_mod->new_cus(); //new customer mate
		$recent_case = $this->dashboard_mod->recent_case(); //recent case add thya hoy ena mate
		$no_of_emp = $this->dashboard_mod->no_of_emp(); //ketla employee tena mate
		$no_of_cus = $this->dashboard_mod->no_of_cus(); //ketla customer che tena mate
		$no_of_case = $this->dashboard_mod->no_of_case(); //ketla case che tena mae
    	$all_report_re = $this->dashboard_mod->all_report_re();
    	$employee_notification = $this->dashboard_mod->employee_notification();
    	$todo_list = $this->dashboard_mod->todo_list(); */
    	$active_user = $this->dashboard_mod->active_user();
    	$today_active_users = $this->dashboard_mod->today_active_users();
    	$count_today_active_users = $this->dashboard_mod->count_today_active_users();
    	$count_active_user = $this->dashboard_mod->count_active_user();
    	$invoice_data = $this->dashboard_mod->invoice_data();
    	$mission_data = $this->dashboard_mod->mission_data();
    	$e_service_data = $this->dashboard_mod->e_service_data();
	//	print_r($today_active_users);
		//print_r($employee_notification);
				
		$this->load->view('super_admin/index', ['all_report_re' => $all_report_re,'no_of_emp' => $no_of_emp, 'no_of_cus' => $no_of_cus, 'no_of_case' => $no_of_case, 'recent_case' => $recent_case, 'new_cus' => $new_cus, 'rec_activity_cus' => $rec_activity_cus, 'emp_name' => $emp_name, 'admin_name' => $admin_name, 'rec_activity_emp' => $rec_activity_emp, 'rec_activity_case' => $rec_activity_case,'all_report'=>$all_report,'employee_notification'=>$employee_notification,'todo_list'=>$todo_list,'active_user'=>$active_user,'today_active_users'=>$today_active_users,'count_today_active_users'=>$count_today_active_users,'count_active_user'=>$count_active_user,'invoice_data'=>$invoice_data,'mission_data'=>$mission_data,'e_service_data'=>$e_service_data]);
	}
    
}
?>