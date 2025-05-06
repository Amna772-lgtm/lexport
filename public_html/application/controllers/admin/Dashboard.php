<?php
class dashboard extends MY_Controller {
	public function __construct() {
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/dashboard_mod');
		$this->load->model('admin/customer_mod');
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
		$post = $this->security->xss_clean($post);
		$this->db->insert('to_do_list',$post);
		 if ($post['admin_id']!=0) $bg = "background: #1f3959;";  
		 $dt =  $post['create_date'];
		$date = date("d M Y G:i");
		 if($post['admin_id']!=0) { $un = "By ".getEmployeeName($post['admin_id']); } else { $un = "By You"; }
			$data ='<div class="todotop" style="'.$bg.'">'.$date.' <span style=" float: right; ">'.$un.'</span></div><div class="" style="background: #f3f3f3; padding: 8px 10px 1px 5px;"><div class="m-timeline-3__item m-timeline-3__item--brand">'.$post['note'].' </div></div><br>';
		echo $data;
		
	}
	public function index() 
	{
		$all_report = $this->dashboard_mod->all_report(); 
		//$total_new_cus=$this->dashboard_mod->total_new_cus();
		$rec_activity_cus = $this->dashboard_mod->rec_activity_cus(); 
		$emp_name = $this->dashboard_mod->emp_name(); 
		$admin_name = $this->dashboard_mod->admin_name(); 
		$rec_activity_emp = $this->dashboard_mod->rec_activity_emp(); 
		$rec_activity_case = $this->dashboard_mod->rec_activity_case();

		// $new_cus = $this->dashboard_mod->new_cus();
		$list_customer = $this->customer_mod->list_customer();
		$case_list=$this->db->select('*')->get('c_case')->result_array(); 

		$recent_case = $this->dashboard_mod->recent_case();
		$no_of_emp = $this->dashboard_mod->no_of_emp(); 
		$no_of_cus = $this->dashboard_mod->no_of_cus(); 
		$no_of_case = $this->dashboard_mod->no_of_case(); 
    	$all_report_re = $this->dashboard_mod->all_report_re();
    	$employee_notification = $this->dashboard_mod->employee_notification();
    	$todo_list = $this->dashboard_mod->todo_list();
		//print_r($employee_notification);
				
		$this->load->view('admin/index', ['all_report_re' => $all_report_re,'no_of_emp' => $no_of_emp, 'no_of_cus' => $no_of_cus, 'no_of_case' => $no_of_case, 'recent_case' => $recent_case, 'list_customer' => $list_customer, 'case_list'=>$case_list, 'rec_activity_cus' => $rec_activity_cus, 'emp_name' => $emp_name, 'admin_name' => $admin_name, 'rec_activity_emp' => $rec_activity_emp, 'rec_activity_case' => $rec_activity_case,'all_report'=>$all_report,'employee_notification'=>$employee_notification,'todo_list'=>$todo_list]);
	}

}
?>