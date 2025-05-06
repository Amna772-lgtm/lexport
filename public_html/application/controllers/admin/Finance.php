<?php
class Finance extends MY_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->isAdmintLogged();
		$this->load->model('admin/customer_mod');
		$this->load->model('admin/case_mod');
		$this->load->model('admin/archive_mod');
	}
	
 
	public function transaction(){
		$invoice = $this->db->select("
		transaction.*,invoice_details.*,transaction.id as tid,
		invoice.*,	
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
			c_case.case_number")
		->join('invoice_details', "invoice_details.id = transaction.sub_invoice_id")
		->join('invoice', "invoice.id = invoice_details.invoice_id", 'left')
		->join('c_case', "c_case.id = invoice.case_id")
		->order_by("transaction.id", "desc")
		->get('transaction')->result_array();
		return $this->load->view('admin/transaction',['invoice' => $invoice]);
	}
	public function update_status(){
				
		$id=$this->input->post('id');
		$type=$this->input->post('type');
		$this->db->where('id', $id)->update('invoice_details',['payment_status' => $type]);
		
	    $this->db->where('sub_invoice_id', $id)->update('transaction',['is_read' => 1]);
		if($type == "paid"){
		$row1 = $this->db->where('id',$id)->get('invoice_details')->row();
		$row2 = $this->db->where('id',$row1->invoice_id)->get('invoice')->row();
        $noti['customer_id'] = $row2->customers_id; 
        $noti['appointment_id'] = $id;
        $noti['notification_type'] = 'payment_status';
        $noti['status_type'] =  'paid';
        $noti['case_id'] = $row2->case_id;
        $noti['create_date']=date("Y-m-d G:i:s");
        $this->db->insert('notification', $noti);
		
	    	
		$users=$this->db->select('*')->where('id',$row2->customers_id)->get('users')->row_array(); 
        $email = $users['email'];
        $phone = $users['phone'];
        $name = $users['name']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		
		$this->load->library('email', $config);
		$new = ['to_email' => $email,'case_id' => $row1->invoice_no, 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name];

		$from_email = constant("FROM_EMAIL");
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($email);
		$this->email->subject($this->lang->line('payment_Status_change'));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
		$json_data['case_id'] =$noti['case_id'];
		$json_data['misssion_id'] =$id;
		$json_data['invoice_no'] =$row2->invoice_no;
		insertActionLog($json_data,$row2->customers_id,"status_change",$type);
        if($this->session->userdata('admin_site_lang')=="arabic") { 
            $msg ='شريكنا العزيز:  نفيدكم بأنه تمت عملية الدفع بنجاح للفاتورة رقم '.$row1->invoice_no.' كما سيباشر الفريق المختص على إجراءات تقديم الخدمة القانونية نسعد بخدمتكم، وممتنون لثقتكم';
    	} else { 
		    $msg ='Dear partner: We hope that "nassr service have fulfilled your expectations" we received your payment successfully for invoice #'.$row1->invoice_no.'  and we process your legal E-service to the initiated appropriate team "We are happy to serve you and we are grateful for your trust';
 		}
		sendSMSProcess($phone,$msg);
}	
		
	}
	public function get_cheque_detail(){
		$id=$this->input->post('id');
		$tra=$this->db->select('*')->where('id',$id)->get('transaction')->row();
		$aa = json_decode($tra->extra_details);
		echo "<p><b>Name: </b>".$aa->name."</p>";
		echo "<p><b>Number: </b>".$aa->number."</p>";
		echo "<p><b>Note: </b>".$aa->note."</p>";
			
	}
	public function get_paypal_detail(){
		$id=$this->input->post('id');
		$tra=$this->db->select('*')->where('id',$id)->get('transaction')->row();
		$aa = json_decode($tra->extra_details);
		echo "<p><b>Item Name: </b>".$aa->item_name."</p>";
		echo "<p><b>Transection ID: </b>".$aa->txn_id."</p>";
		echo "<p><b>Payment Amount: </b>".$aa->payment_amt."</p>";
		echo "<p><b>Currency Code: </b>".$aa->currency_code."</p>";
		echo "<p><b>Payment Status: </b>".$aa->status."</p>";
			
	}
	public function add_expenses($cid,$eid){ 
		$get_per_clients=$this->archive_mod->get_per_clients();
		$get_per_case = $this->archive_mod->get_per_case();
		$note_data = array();
		return $this->load->view('admin/add_expenses',['get_per_case' => $get_per_case,'cid'=>$cid,'case_data'=>'','eid'=>$eid]);
	}
	
	public function Index()  
	{
		$list_customer = $this->customer_mod->list_customer();
		$employees=$this->case_mod->get_employee();
		
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			$this->db->select('c_case.*,case_temp.case_id');
			$this->db->from('c_case');
			$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.is_paid','0');
			$this->db->order_by("id", "desc");
			$query=$this->db->get()->result_array();
		}else
		{
			$this->db->select('c_case.*,case_temp.case_id');
			$this->db->from('c_case');
			$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.is_paid','0');
			$this->db->where('c_case.user_id',$this->session->userdata('admin_id'));  
			$this->db->order_by("id", "desc");
			$query=$this->db->get()->result_array();
		}

		$case_data=$this->case_mod->find_case($id);
		
		$post=$this->input->post();

		if($post){
		echo	$cases=$post['cases'];
		echo	$clients=$post['clients'];
			 $where="invoice.case_id='$cases' OR invoice.customers_id='$clients'";
		} else {
			$where = "invoice.id=invoice_details.invoice_id";
		}
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		if($role_id ==1){
		$invoice = $this->db->select("
			invoice.*,invoice_details.*,
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
			c_case.note")
			
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where($where)
			->where('invoice_details.is_approve',0)
			->order_by("invoice.id", "desc")
			
			->get('invoice')->result_array();
		}else{
			$invoice = $this->db->select("
			invoice.*,invoice_details.*,
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
			c_case.note")
			
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where($where)
			->where('invoice_details.is_approve',0)
			->where('invoice.created_by',$this->session->userdata('admin_id'))
			->order_by("invoice.id", "desc")
			->get('invoice')->result_array();
		}	
			$json_data['page']= "list";
			insertActionLog($json_data,0,"invoice","list");
			$get_per_clients=$this->archive_mod->get_per_clients();
			$get_per_case = $this->archive_mod->get_per_case();
		
			return $this->load->view('admin/finance', ['invoice' => $invoice,'get_per_case' => $get_per_case,'get_per_clients'=>$get_per_clients, 'case_data'=>$case_data, 'case_list'=> $query]);
	}
	public function approve_pending_invoice_list()  
	{
		$list_customer = $this->customer_mod->list_customer();
		$employees=$this->case_mod->get_employee();
		
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		$post=$this->input->post();

		if($post){
			$cases=$post['cases'];
			$clients=$post['clients'];
			 $where="invoice.case_id='$cases' OR invoice.customers_id='$clients'";
		} else {
			$where = "invoice.id=invoice_details.invoice_id";
		}
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		if($this->session->userdata('role_id') == 1){ $sts =0;} else{ $sts= 1;  }
		if($role_id ==1){
		$invoice = $this->db->select("
			invoice.*,invoice.id as iid,invoice_details.*,
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
			c_case.note")
			
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			//->where($where)
			->where('invoice_details.is_approve',1)
			->order_by("invoice.id", "desc")
			->get('invoice')->result_array();
		}else{
			$invoice = $this->db->select("
			invoice.*,invoice.id as iid,invoice_details.*,
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
			c_case.note")
			
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where($where)
			->where('invoice.created_by',$this->session->userdata('admin_id'))
			->where('invoice_details.is_approve',$sts)
			->order_by("invoice.id", "desc")
			->get('invoice')->result_array();
		}
			$get_per_clients=$this->archive_mod->get_per_clients();
			$get_per_case = $this->archive_mod->get_per_case();
			$json_data['page']= "pending invoice";
			insertActionLog($json_data,0,"invoice","pending invoice");
		return	$this->load->view('admin/approve_pending_invoice_list', ['invoice' => $invoice,'get_per_case' => $get_per_case,'get_per_clients'=>$get_per_clients]);
	}
	public function expenses_list()  
	{
		$list_customer = $this->customer_mod->list_customer();
		$employees=$this->case_mod->get_employee();
		
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		$post=$this->input->post();

		if($post){
			$cases=$post['cases'];
			$clients=$post['clients'];
			 $where="expense.case_id='$cases' OR expense.customer_id='$clients'";
		} else {
			$where = "expense.case_id <> 0 ";
		}
		if($role_id == 1){ 
		$expense = $this->db->select("
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
			c_case.note")
			->join('c_case', "c_case.id = expense.case_id")
			->where($where)
			->order_by("expense.id", "desc")
			->get('expense')->result_array();
		} else {
			$expense = $this->db->select("
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
			c_case.note")
			->join('c_case', "c_case.id = expense.case_id")
			->where($where)
			->where('c_case.user_id',$this->session->userdata('admin_id'))
			->order_by("expense.id", "desc")
			->get('expense')->result_array();
			
		}	
			$get_per_clients=$this->archive_mod->get_per_clients();
			$get_per_case = $this->archive_mod->get_per_case();
			$json_data['page']= "expense list";
			insertActionLog($json_data,0,"expense","expense list");
			return $this->load->view('admin/expenses_list', ['expenses_list' => $expense,'get_per_case' => $get_per_case,'get_per_clients'=>$get_per_clients]);
	}

	public function find_expenses($id)  
	{

		$expense = $this->db->select("
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
			c_case.note")
			->join('c_case', "c_case.id = expense.case_id")
			->where('expense.id',$id)
			->get('expense')->row();
			$case_id=$expense->case_id;
			$expense_details= $this->db->select('*')->where('expense_id',$id)->get('expense_details')->result_array();
			$note_data=$this->db->select('*')->where('case_id',$case_id)->where('type','expense')->get('case_note')->result_array();
			return $this->load->view('admin/add_expenses', ['case_data' => $expense,'expense_details' => $expense_details,'note_data' => $note_data]);
	}

	public function pending_invoice_list(){
		
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');
		
		if($role_id == 1){
			$this->db->select('c_case.*,case_temp.case_id');
			$this->db->from('c_case');
			$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.is_paid','0');
			$this->db->order_by("id", "desc");
			$query=$this->db->get()->result_array();
		}else
		{
			$this->db->select('c_case.*,case_temp.case_id');
			$this->db->from('c_case');
			$this->db->join('case_temp','case_temp.case_id=c_case.id','left');
			$this->db->where('c_case.active_inactive','0');
			$this->db->where('c_case.is_paid','0');
			$this->db->where('c_case.user_id',$this->session->userdata('admin_id'));  
			$this->db->order_by("id", "desc");
			$query=$this->db->get()->result_array();
		}
			$json_data['page']= "pending invoice";
			insertActionLog($json_data,0,"invoice","pending invoice");
		return $this->load->view('admin/pending_invoice_list',['case_list'=>$query]);
	}
	public function create_invoice($id){
		$case_data=$this->case_mod->find_case($id);
		$note_data=$this->db->select('*')->where('case_id',$id)->where('type','invoice')->get('case_note')->result_array();
		$this->load->view('admin/create_invoice',['case_data'=>$case_data,'data'=>'','note_data'=>$note_data]);
	}
	public function find_case(){
		$case_id=$this->input->post('case_id');
		$case=$this->db->select('*')->where('id',$case_id)->get('c_case')->row();
		echo json_encode($case);
			
	}
	public function edit_invoice($id){
		$invoice = $this->db->select("
			invoice.*,invoice_details.id as iid,invoice_details.*,
			c_case.id as case_id,
			c_case.client_file_number,
			c_case.client_name,
			c_case.service_types,
			c_case.case_number,
			c_case.contact_number,
			c_case.note")
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where("invoice.id=invoice_details.invoice_id")
			->where("invoice_details.id=$id")
			->get('invoice')->row();
		$note_data=$this->db->select('*')->where('case_id',$invoice->case_id)->where('type','invoice')->get('case_note')->result_array();
		$json_data['page']= "edit invoice";
		insertActionLog($json_data,0,"invoice","edit invoice");
		return $this->load->view('admin/edit_invoice', ['case_data' => $invoice,'note_data' => $note_data]);
	}
	public function delete_invoice() 
	{
		$id=$this->input->post();
		$this->db->delete('invoice_details',$id);
		$json_data['invoice_id']= $id['id'];
		insertActionLog($json_data,0,"invoice","delete");
		echo json_encode('Invoice Delete SuccessFully');
	}
	
	public function delete_expenses($get_id="") 
	{
		if($get_id == ''){
			$id=$this->input->post('id');
		} else {
			$id=$get_id;
		}
		$json_data['expense_id']= $id;
		insertActionLog($json_data,0,"expense","delete");
		$this->db->where('expense_id',$id)->delete('expense_details');
		$this->db->where('id',$id)->delete('expense');
		if($get_id == ''){
			echo json_encode('Expense Delete SuccessFully');
		} else {
			$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Expense delete successfully</div>');
			return redirect('admin/finance/expenses_list');
		}
		
	}
	public function delete_expenses_details() 
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id)->delete('expense_details');
		$json_data['invoice_id']= $id;
		insertActionLog($json_data,0,"expense","delete-details");
		echo json_encode('Expense Delete SuccessFully');
	}

	public function generate_receipt($id) {
				$expense = $this->db->select("
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
			c_case.note")
			->join('c_case', "c_case.id = expense.case_id")
			->where('expense.id',$id)
			->get('expense')->row();
			$case_id=$expense->case_id;
			$expense_details= $this->db->select('*')->where('expense_id',$id)->get('expense_details')->result_array();

			$this->load->view('admin/add_expenses', ['case_data' => $expense,'expense_details' => $expense_details]);
		$json_data['expense_id']= $id;
		insertActionLog($json_data,0,"expense","generate");
		$filename = "Expense_receipt_".time().".pdf";
		ob_start();
		$this->load->library('m_pdf');
		$html=$this->load->view('admin/generate_receipt', ['case_data' => $expense], true);  
		ERROR_REPORTING(0);
		$this->m_pdf->pdf->SetHTMLFooter('<tr> <td style="background:#ffffff; padding:10px 20px 20px 20px;"> <table cellpadding="0" cellspacing="0" border="0" width="900"> <tr> <td width="840" style="padding:20px 0px 20px 20px; background:#0F2A4E; color:#CAA457;">Tel. 9 2 0 0 0 2 9 1 6 &nbsp;&nbsp; Riyadh . Jeddah . Makkah &nbsp;&nbsp; www.albarakatilaw.com</td> <td width="60" style="text-align:right; background:#0F2A4E;" align="right"><img src="'.base_url('uploads/report/').'pattern4.png" alt="" height="40" border="0" style="display:block; margin:0px;" /></td> </tr> </table> </td> </tr>'); 
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($filename,"D");  
	}
	public function generate_invoice($id) {
			$invoice = $this->db->select("
			invoice.*,invoice_details.id as iid,invoice_details.*,
			c_case.id as case_id,
			c_case.client_file_number,
			c_case.client_name,
			c_case.service_types,
			c_case.case_number,
			c_case.contact_number,
			c_case.note")
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where("invoice.id=invoice_details.invoice_id")
			->where("invoice_details.id=$id")
			->get('invoice')->row();
		//print_r($invoice);

		$invoice_id= $invoice->invoice_no;
		$json_data['invoice_id']= $id;
		$json_data['invoice_no']= $invoice_id;
		insertActionLog($json_data,0,"invoice","generate");
		$filename = "Invoice_$invoice_id.pdf";
		ob_start();
		$this->load->library('m_pdf');
		$html=$this->load->view('admin/generate_invoice', ['case_data' => $invoice], true);  
		ERROR_REPORTING(0);
		$this->m_pdf->pdf->SetHTMLFooter('<tr> <td style="background:#ffffff; padding:10px 20px 20px 20px;"> <table cellpadding="0" cellspacing="0" border="0" width="900"> <tr> <td width="840" style="padding:20px 0px 20px 20px; background:#0F2A4E; color:#CAA457;">Tel. 9 2 0 0 0 2 9 1 6 &nbsp;&nbsp; Riyadh . Jeddah . Makkah &nbsp;&nbsp; www.albarakatilaw.com</td> <td width="60" style="text-align:right; background:#0F2A4E;" align="right"><img src="'.base_url('uploads/report/').'pattern4.png" alt="" height="40" border="0" style="display:block; margin:0px;" /></td> </tr> </table> </td> </tr>'); 
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($filename,"D");  
	    $pdfFilePath = 'uploads/invoice/'."$filename";
		$this->m_pdf->pdf->Output($pdfFilePath,"F");  
	}
	public function delete_invoice_single($id) 
	{  
	$this->db->where('id',$id)->delete('invoice_details');
	$json_data['invoice_id']= $id;
	insertActionLog($json_data,0,"invoice","delete-single");
	$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Invoice Deleted successfully</div>');
		return redirect('admin/finance');
	}
	public function process_invoice_edit(){
		$post=$this->input->post();
		//$invoice['created_by'] = $this->session->userdata('admin_id');
		//$invoice['case_id'] = $post['case_id'];
		$invoice['invoice_title'] = $post['invoice_title'];
		$id = $post['id'];
		$invoice_id = $post['invoice_id'];
		$close_app = $post['close_app'];
		if($close_app == "Close"){
			$invoice['is_close'] = 1;
		}
		//$invoice['total'] = $post['total_amount'];
		//$invoice['financial_payments'] = $post['financial_payments'];
		$invoice['report'] = $post['report'];
		//$invoice['main_invoice_no'] = "INV".time();
		$invoice = $this->security->xss_clean($invoice);
		$this->db->where('id', $invoice_id)->update('invoice',$invoice);
		//$this->db->insert('invoice', $invoice);
		$insert_id = $this->db->insert_id();
		//	$gettotal = cal_total($post['total_amount'],$post['financial_payments']);
		//	foreach ($post['payment_status'] as $key => $item) {
		//	if($post['payment_status'][$key] !='' ){
		//$invoice_details['invoice_id'] = $insert_id;
		$invoice_details['payment_status'] = $post['payment_status'];
		//$invoice_details['invoice_no'] = $post['invoice_no'][$key];
	//	$invoice_details['due_date'] = $post['due_date'];
		if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {
			$start_date = explode('/',$post['due_date']);
			$invoice_details['due_date']  = Hijri2Greg($start_date[0],$start_date[1],$start_date[2],true);
		} else{
			$invoice_details['due_date'] = $post['due_date'];
		}
		$invoice_details['due_time'] = $post['due_time'];
		//$invoice_details['subtotal'] =$gettotal['subtotal'];
		//$invoice_details['total'] = $gettotal['total'];
		//$this->db->insert('invoice_details', $invoice_details);
		$invoice_details = $this->security->xss_clean($invoice_details);
		$this->db->where('id', $id)->update('invoice_details',$invoice_details);
		$inv = $post['invoice_no'];
		//}
		//}
		$invoice_details['invoice_id']=$insert_id;
		$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Invoice Number #'.$inv.' updated successfully</div>');
		$json_data['invoice_id']= $insert_id;
		$json_data['invoice_no']= $post['invoice_no'];
		$json_data['case_id'] = $post['case_no'];
		$json_data['customer_id'] = $invoice['customers_id'];
		insertActionLog($json_data,0,"invoice","update");
		return redirect('admin/finance');
	}
	
	public function process_expenses(){
		$post=$this->input->post();
		$exp_id = $post['exp_id'];
		if($exp_id){
			$close_app = $post['close_app'];
			if($close_app == "Close"){
				$expense['is_close'] = 1;
			}
			$expense['report'] = $post['report'];
			$expense = $this->security->xss_clean($expense);
			$this->db->where('id', $exp_id)->update('expense',$expense);
			
				foreach ($post['expenses_title'] as $key => $item) {
				$expense_details['expenses_title'] = $post['expenses_title'][$key];
				$expense_details['expenses_amount'] = $post['expenses_amount'][$key];
						
				if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {
					$start_date = explode('/',$post['expenses_date'][$key]);
					$expense_details['expenses_date'] = Hijri2Greg($start_date[0],$start_date[1],$start_date[2],true);
				} else{
					$expense_details['expenses_date'] = $post['expenses_date'][$key];
				}
				
				if(isset($post['expense_id'][$key])) {
				    $expense_details = $this->security->xss_clean($expense_details);
					$this->db->where('id', $post['expense_id'][$key])->update('expense_details',$expense_details);
				} else {
					if($post['expenses_title'][$key] !=''){
						$expense_details['expense_id'] = $exp_id;
						$expense_details = $this->security->xss_clean($expense_details);
						$this->db->insert('expense_details', $expense_details);
					}
				}
			}
			$json_data['expense_id']= $exp_id;
			insertActionLog($json_data,0,"expense","update");
			$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Expense update successfully</div>');
			return redirect('admin/finance/expenses_list');
		}
		else{
			$expense['created_by'] = $this->session->userdata('admin_id');
			$expense['customer_id'] = $post['clients'];
			$expense['case_id'] = $post['cases'];
			$expense['doc_id'] = $post['doc_id'];
			$expense['report'] = $post['report'];
			$expense = $this->security->xss_clean($expense);
			$this->db->insert('expense', $expense);
			$insert_id = $this->db->insert_id();
			
			foreach ($post['expenses_title'] as $key => $item) {
				if($post['expenses_title'][$key] !='' ){
					$expense_details['expense_id'] = $insert_id;
					$expense_details['expenses_title'] = $post['expenses_title'][$key];
					$expense_details['expenses_amount'] = $post['expenses_amount'][$key];
								
				if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {
					$start_date = explode('/',$post['expenses_date'][$key]);
					$expense_details['expenses_date'] = Hijri2Greg($start_date[0],$start_date[1],$start_date[2],true);
				} else{
					$expense_details['expenses_date'] = $post['expenses_date'][$key];
				}
					$this->db->insert('expense_details', $expense_details);
				}
			}
			$json_data['expense_id']= $insert_id;
			$json_data['case_id']= $post['cases'];
			$json_data['customer_id']= $post['customer_id'];
			insertActionLog($json_data,0,"expense","add");
			$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Expense create successfully</div>');
			return redirect('admin/finance/expenses_list');
		}
	}
	public function approve_pending_invoice($id) {
		$post['is_approve'] = 0;
		$this->db->where('id',$id)->update('invoice_details',$post);
		$json_data['invoice_id']= $id;
		insertActionLog($json_data,0,"invoice","approve");
		$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Invoice approved successfully</div>');
		return redirect('admin/finance');
		
	}
	
	public function reject_pending_invoice($id) {
		$post['is_reject'] = 1;
		$this->db->where('id',$id)->update('invoice_details',$post);
		$json_data['invoice_id']= $id;
		insertActionLog($json_data,0,"invoice","reject");
		$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show danger">Invoice rejected successfully</div>');
		return redirect('admin/finance/approve_pending_invoice_list');
		
	}
	public function process_invoice(){
		$post=$this->input->post();
		$invoice['created_by'] = $this->session->userdata('admin_id');
		$invoice['case_id'] = $post['case_id'];
		$case_id = $post['case_id'];
		$invoice['invoice_title'] = $post['invoice_title'];
		$invoice['customers_id'] = $post['customers_id'];
		$invoice['main_total'] = $post['total_amount'];
		$invoice['financial_payments'] = $post['financial_payments'];
		$invoice['report'] = $post['report'];
	//	$invoice['main_invoice_no'] = "INV".time();
        $invoice['main_invoice_no'] = $post['main_invoice_no'];
		$inv = $invoice['main_invoice_no'];
		if($this->session->userdata('role_id')==1){
		$invoice['status'] = 0; 	
		$invoice_details['is_approve'] = 0;
		}else {
		$invoice['status'] = 1; 
		$invoice_details['is_approve'] = 1;
		}
		$invoice['create_date'] = date("Y-m-d G:i:s");
		$invoice = $this->security->xss_clean($invoice);
		$this->db->insert('invoice', $invoice);
		$insert_id = $this->db->insert_id();
		$is_paid['is_paid'] = 1;  
		$case_id = $post['case_id'];
        
		$this->db->where('id', $case_id)->update('c_case',$is_paid);
		$gettotal = cal_total($post['total_amount'],$post['financial_payments']);
		foreach ($post['payment_status'] as $key => $item) {
			if($post['payment_status'][$key] !='' ){
                if($this->session->userdata('role_id')==1){
        	    	$invoice_details['is_approve'] = 0;
        		} else {
        	    	$invoice_details['is_approve'] = 1;
        		}
				$invoice_details['invoice_id'] = $insert_id;
				$invoice_details['payment_status'] = $post['payment_status'][$key];
				$invoice_details['invoice_no'] = $post['invoice_no'][$key];
				//$invoice_details['due_date'] = $post['due_date'][$key];
				if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {
					$start_date = explode('/',$post['due_date'][$key]);
					$invoice_details['due_date'] = Hijri2Greg($start_date[0],$start_date[1],$start_date[2],true);  
				} else{
					$invoice_details['due_date'] = $post['due_date'][$key];
				}
				$invoice_details['due_time'] = $post['due_time'][$key];
				$invoice_details['subtotal'] =$gettotal['subtotal'];
				$invoice_details['total'] = $gettotal['total'];
				
		$invoice_details = $this->security->xss_clean($invoice_details);
				$this->db->insert('invoice_details', $invoice_details);
			$insert_sub_id = $this->db->insert_id();
			 
			$invoice_pdf = $this->db->select("
			invoice.*,invoice_details.id as iid,invoice_details.*,
			c_case.id as case_id,
			c_case.client_file_number,
			c_case.client_name,
			c_case.service_types,
			c_case.case_number,
			c_case.contact_number,
			c_case.note")
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where("invoice.id=invoice_details.invoice_id")
			->where("invoice_details.id=$insert_sub_id")
			->get('invoice')->row();
		 
			$invoice_id= $invoice_pdf->invoice_no;
	 
		$filename = "invoice_".rand().".pdf";
		ob_start();
		$this->load->library('m_pdf');
		$html=$this->load->view('admin/generate_invoice', ['case_data' => $invoice_pdf], true);  
		ERROR_REPORTING(0);
		$this->m_pdf->pdf->SetHTMLFooter('<tr> <td style="background:#ffffff; padding:10px 20px 20px 20px;"> <table cellpadding="0" cellspacing="0" border="0" width="900"> <tr> <td width="840" style="padding:20px 0px 20px 20px; background:#0F2A4E; color:#CAA457;">Tel. 9 2 0 0 0 2 9 1 6 &nbsp;&nbsp; Riyadh . Jeddah . Makkah &nbsp;&nbsp; www.albarakatilaw.com</td> <td width="60" style="text-align:right; background:#0F2A4E;" align="right"><img src="'.base_url('uploads/report/').'pattern4.png" alt="" height="40" border="0" style="display:block; margin:0px;" /></td> </tr> </table> </td> </tr>'); 
		    $this->m_pdf->pdf->WriteHTML($html);
	 
	        $pdfFilePath = 'uploads/invoice/'."$filename";
		    $this->m_pdf->pdf->Output($pdfFilePath,"F");  
    		$this->db->where('id', $insert_sub_id)->update('invoice_details',['file_url' => $filename]);
			}
		}
			$invoice_details['invoice_id']=$insert_id;
			$noti['case_id'] = $case_id;
			$noti['customer_id'] = $invoice['customers_id'];
			$noti['notification_type'] = 'invoice';
			$noti['status_type'] = 'create'; 	
			$noti['create_date']=date("Y-m-d G:i:s");
			$this->db->insert('notification', $noti);
			
			$users=$this->db->select('*')->where('id',$noti['customer_id'])->get('users')->row_array();
			
			$email = $users['email'];
			$phone = $users['phone'];
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
			$this->email->subject($this->lang->line('Your_invoice_for_case'). getCaseNumber($noti['case_id'])); 
			$body = $this->load->view('admin/add-case-email.php', $new, true);
			$this->email->message($body);
			$this->email->send();
			if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {
	 			$msg ="شريكنا العزيز: نأمل أن تكون خدمتنا قد ارتقت لمستوى تطلعاتكم. لقد صَدرت فاتورة للخدمة رقم ". getCaseNumber($noti['case_id'])." ونقدر لكم السداد خلال الساعات القادمة.";
			} else {
    	        $msg="Dear Partner: We hope that  our services have  met your expectations. The invoice for the Legal service number ". getCaseNumber($noti['case_id'])." was issued. We appreciate your payment within the next few hours.";
			}
			
			sendSMSProcess($phone,$msg);
			$json_data['invoice_id']= $insert_id;
			$json_data['invoice_no']= $inv;
			$json_data['case_id'] = $case_id;
			$json_data['customer_id'] = $invoice['customers_id'];
			insertActionLog($json_data,0,"invoice","add");
			$this->session->set_flashdata('showMsg','<div class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Invoice #'.$inv.' create successfully</div>');
			return redirect('admin/finance');
	}
}
?>