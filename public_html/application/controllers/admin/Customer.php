<?php
class customer extends MY_Controller {
	public function __construct() {
		parent::__construct();
				$this->isAdmintLogged();
		$this->load->model('admin/customer_mod');
		$this->load->model('admin/case_mod');
	}

	public function add_customer() //customer add karva mate
	{
		$ser=$this->customer_mod->select_service();
		return $this->load->view('admin/add_customer', ['data' => '','service'=>$ser]);
	}

	public function manage($id)  
	{
		$read['is_read'] = 1;
		$this->db->where('id',$id)->update('customers',$read);
		$customer = $this->input->post();
		if($customer){
			$config = [
			'upload_path' => './uploads/customer_image/',
			'allowed_types' => 'jpg|gif|png|jpeg',
			];
			$this->load->library('upload', $config);

			if($this->form_validation->run('add_customer')) {
				if ($this->upload->do_upload('customer_image')) {$data = $this->upload->data();}
				unset($customer['responsible_employee']);
				$this->db->where('id',$id)->update('customers',$customer);
				$data1 = $this->customer_mod->find_customer($id);
				$user['name'] = $customer['client_name'];
				$user['id_numbers'] = $customer['identification_number'];
				$user['id_type'] = $customer['identification_types']; 
				$this->db->where('id',$data1->customers_id)->update('users',$user);
				$c_case['client_name'] = $customer['client_name'];
				$c_case['identification_number'] = $customer['identification_number'];
				$c_case['identification_types'] = $customer['identification_types']; 
				$this->db->where('customers_id',$data1->customers_id)->update('c_case',$c_case);
				$this->db->where('customers_id',$data1->customers_id)->update('case_temp',$c_case);
			 
				$json_data['customers_id'] =$data1->customers_id;
				insertActionLog($json_data,$data1->customers_id,"customer","update");
				return redirect('admin/customer/list_customer');
			}
		}
		$data = $this->customer_mod->find_customer($id);
		$ser=$this->customer_mod->select_service();

		$q=$this->db->order_by("name","ASC")->get('countries');
		$countries= $q->result();
 
		return $this->load->view('admin/add_customer', ['data' => $data,'service'=>$ser,'countries'=>$countries]);
	}

	public function padding_customer() //padding customer display krava mate
	{
		$padding_cus = $this->customer_mod->padding_customer();
		$json_data="";
		insertActionLog($json_data,$id,"customer","pending-list");
		return $this->load->view('admin/padding_customer', ['list' => $padding_cus]);
	}

	public function Index() //customer nu list displat karva mate
	{
		$list_customer = $this->customer_mod->list_customer();
		$employees=$this->case_mod->get_employee();
		$json_data="";
		insertActionLog($json_data,$id,"customer","list");
		return $this->load->view('admin/list_customer', ['list_customer' => $list_customer,'employees'=>$employees]);

	}
	public function list_customer() //customer nu list displat karva mate
	{
		$list_customer = $this->customer_mod->list_customer();
		$employees=$this->case_mod->get_employee();
		$q=$this->db->order_by("name","ASC")->get('countries');
		$countries= $q->result();
		$case_list=$this->db->select('*')->get('c_case')->result_array(); 
		$json_data="";
		insertActionLog($json_data,0,"customer","list");
		return $this->load->view('admin/list_customer', ['list_customer' => $list_customer,'employees'=>$employees, 'case_list'=>$case_list, 'countries'=>$countries]);

	}
	public function assign_customer()// assign_case karva mate
	{
		$id=$this->input->post('id');
		$nnote=$this->input->post('nnote');
		$empid=$this->input->post('empid');
		$case=$this->db->select('*')->where('id',$id)->get('customers')->row_array();
		$noti['customer_id'] = $case['customers_id'];
		$noti['case_id'] = $id;;
		$noti['user_id'] = $empid;
		$noti['notification_type'] = 'customer';
		$noti['status_type'] = 'assign';
		$noti['create_date']=date("Y-m-d G:i:s");
 
		$user = [ 'user_id' => $empid,'assign_note' => $nnote,'responsible_employee' => $empid ];
		$this->db->where('id',$id)->update('customers',$user);
		
		$ucase['manager_id']=$empid;
		$this->db->where('customers_id',$case['customers_id'])->update('c_case',$ucase);
		
		$json_data['assign_to']=$empid;
		insertActionLog($json_data,$case['customers_id'],"customer","assign");
		echo json_encode('Assign Case Successfully'); 
	}
	public function approve_customer() //approve karva mate
	{
		$id=$this->input->post('id');
		$this->customer_mod->approve_customer($id);
		$json_data="";
		insertActionLog($json_data,$id,"customer","approve");
		echo json_encode('approve successfully');
		
	}

	public function find_customer($id) //je customer edit karva no 6e te find karva mate
	{
		$data = $this->customer_mod->find_customer($id);
		$ser=$this->customer_mod->select_service();
		$read['is_read'] = 1;
		$this->db->where('id',$id)->update('customers',$read);
		$q=$this->db->order_by("name","ASC")->get('countries');
		$countries= $q->result();
		$json_data="";
		insertActionLog($json_data,$id,"customer","edit-view");
		return $this->load->view('admin/add_customer', ['data' => $data,'service'=>$ser,'countries'=>$countries]);
	}
	public function view_customer($id) //je customer edit karva no 6e te find karva mate
	{
		$read['is_read'] = 1;
		$this->db->where('id',$id)->update('customers',$read);
		$employees=$this->case_mod->get_employee();
		$data = $this->customer_mod->find_customer($id);
		$ser=$this->customer_mod->select_service();
		$cid = $data->customers_id;
		$client_file_number = $data->client_file_number;
		$case_list=$this->db->select('*')->where('customers_id',$cid)->get('c_case')->result_array(); 
		//$session=$this->db->select('*')->where('client_file_number',$client_file_number)->get('session_mission')->result_array();
		
		$session =  $this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = session_mission.case_id", 'left')
		->where("session_mission.client_file_number",$client_file_number)->where("session_mission.sub_mission_id",0)
		->get('session_mission')
		->result_array();
		
		//$writings=$this->db->select('*')->where('client_file_number',$client_file_number)->get('writing_misssion')->result_array(); 
		
		$writings =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
		->where("writing_misssion.client_file_number",$client_file_number)->where("writing_misssion.sub_mission_id",0)
		->get('writing_misssion')
		->result_array();
		
		
		//$consultation=$this->db->select('*')->where('client_file_number',$client_file_number)->get('consultation_mission')->result_array();
		
		$consultation =  $this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
		->where("consultation_mission.client_file_number",$client_file_number)->where("consultation_mission.sub_mission_id",0)
		->get('consultation_mission')
		->result_array();
		
		//$general=$this->db->select('*')->where('client_file_number',$client_file_number)->get('general_mission')->result_array();
		
		$general =  $this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = general_mission.case_id", 'left')
		->where("general_mission.client_file_number",$client_file_number)->where("general_mission.sub_mission_id",0)
		->get('general_mission')
		->result_array();
		
		//$visiting=$this->db->select('*')->where('client_file_number',$client_file_number)->get('visiting_mission')->result_array(); 
		
		$visiting =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.service_types,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name, c_case.judge_name")->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
		->where("visiting_mission.client_file_number",$client_file_number)->where("visiting_mission.sub_mission_id",0)
		->get('visiting_mission')
		->result_array();
		
	

		
		$project=$this->db->select('*')->where('client_file_number',$client_file_number)->get('add_project')->result_array(); 
	 if(!isset($project)) $project = '';
		$archives=$this->db->select('*')->where('clients',$cid)->get('archives')->result_array(); 
		$user = $this->db->select(['id', 'name', 'email', 'phone', 'address', 'role_id'])
				->where(['id' => $data->customers_id])
				->get('users')
				->row_array();
		$this->load->model('admin/archive_mod');
		$get_per_tasks=$this->archive_mod->get_per_tasks();
		$get_per_procuration=$this->archive_mod->get_per_procuration();
		$json_data="";
		insertActionLog($json_data,$data->customers_id,"customer","view");
		return $this->load->view('admin/view_customer', ['data' => $data,'service'=>$ser,'session'=>$session,'writings'=>$writings,'consultation'=>$consultation,'visiting'=>$visiting,'projects'=>$project,'case_list'=>$case_list,'archives'=>$archives,'user'=>$user,'get_per_procuration'=>$get_per_procuration,'get_per_tasks'=>$get_per_tasks,'general'=>$general, 'employees'=>$employees]);
	}

	public function approve_cus_dashboard($id) //approve karva mate
	{
		$this->customer_mod->approve_customer($id);
		$read['is_read'] = 1;
		$this->db->where('id',$id)->update('customers',$read);
		$json_data="";
		insertActionLog($json_data,$id,"customer","approve");
		return redirect('admin/dashboard');
	}

	public function delete_customer() //customer delete karva mate
	{
	    $id = $this->input->post('id');
		$data1 = $this->customer_mod->find_customer($id);
		$cid = $data1->customers_id;
		
		$cases = $this->db->select('*')->where('customers_id',$cid)->get('c_case')->row(); 
		if($cases){ echo 1; return false; exit; }
		
		$data = $this->customer_mod->delete_customer($id);
	
		$json_data="";
		insertActionLog($json_data,$cid,"customer","delete");
		echo  2; 
	}

	function print_customer_pdf($id){
		$json_data['customers_id'] =$data1->customers_id;
		insertActionLog($json_data,$id,"customer","print");
		$filename = time()."_order.pdf";
		$data = $this->customer_mod->find_customer($id);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->load->library('m_pdf');
 		$stylesheet = file_get_contents('assets/scss/style.scss'); 
 		$html=$this->load->view('admin/print_customer', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}

}
?>