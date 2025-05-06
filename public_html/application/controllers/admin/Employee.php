<?php
class employee extends MY_Controller {
	public function __construct() {
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/employee_mod');
	}

	public function add_employee() //new admin add karva mate
	{
		$dep = $this->employee_mod->select_department();

		$this->load->view('admin/add_employee', ['dep' => $dep]);
	}

	public function store_employee() //db ma employee add karva mate
	{
		$config = [
			'upload_path' => './uploads',
			'allowed_types' => 'jpg|gif|png|jpeg|txt|doc|pdf|docx',

		];
		$this->load->library('upload', $config);

		$emp = $this->input->post();
		$id = $emp['id'];
		
		if($id == ''){
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('cpassword', 'cpassword', 'trim|required|min_length[4]|matches[password]');
	    $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		}
        //$this->form_validation->set_rules('email', 'email ', 'callback_rolekey_exists');
        //$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		$this->form_validation->set_rules('employee_type', 'employee type', 'required');
		$this->form_validation->set_rules('name', 'name', 'required|callback_alpha_Ar');
		$this->form_validation->set_rules('branch', 'branch', 'required');
		$this->form_validation->set_rules('bank_accounts', 'bank_accounts', 'required');
		$this->form_validation->set_rules('department_id', 'department', 'required');
		$this->form_validation->set_rules('bank_name', 'bank_name', 'trim|required|callback_alpha_Ar');
		$this->form_validation->set_rules('monthly_salary', 'monthly_salary', 'trim|required|numeric');
		$this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');
		$this->form_validation->set_rules('employee_type', 'employee_type', 'required');

        if($this->form_validation->run() != FALSE){
		if($this->session->userdata('admin_site_lang')=="arabic") {
 
		$dob = explode('-',$this->input->post('dob'));
		$start_date = explode('-',$this->input->post('start_date'));
		$contract_date = explode('-',$this->input->post('contract_date'));
	 
		$dob = Hijri2Greg($dob[1],$dob[2],$dob[0],true);
		$start_date = Hijri2Greg($start_date[1],$start_date[2],$start_date[0],true);
		$contract_date = Hijri2Greg($contract_date[1],$contract_date[2],$contract_date[0],true);
 
		} else{
			$dob=$this->input->post('dob');
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
		}
		$contract_file = $_FILES['contract_file']['name'];
		$governmental_id_file = $_FILES['governmental_id_file']['name'];
		$certificate_file = $_FILES['certificate_file']['name'];
		$employees_photo = $_FILES['employees_photo']['name'];

			if ($this->upload->do_upload('contract_file')) {$data = $this->upload->data();}
			if ($this->upload->do_upload('governmental_id_file')) {$data = $this->upload->data();}
			if ($this->upload->do_upload('certificate_file')) {$data = $this->upload->data();}
			if ($this->upload->do_upload('employees_photo')) {$data = $this->upload->data();} //file upload thai

			$emp['password'] = md5($emp['password']);

			$password = md5($this->input->post('password'));
			//user na table ma entry padva mate
			$user = ['name' => $this->input->post('name'),
				'dob' =>$dob,
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => $password,
				'role_id' => '2',
				'status' => '1'];
            $up_user = ['name' => $this->input->post('name'),
				'dob' =>$dob,
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
			 
			 
			 
			 ];


			//employee table ma entry
			$employee = ['amount' => $this->input->post('amount'),
				'employee_type' => $this->input->post('employee_type'),
				'department_id' => $this->input->post('department_id'),
				'branch' => $this->input->post('branch'),
				'bank_accounts' => $this->input->post('bank_accounts'),
				'bank_name' => $this->input->post('bank_name'),
				'monthly_salary' => $this->input->post('monthly_salary'),
				'contract_file' => $contract_file,
				'governmental_id_file' => $governmental_id_file,
				'certificate_file' => $certificate_file,
				'start_date' => $start_date,
				'contract_date' => $contract_date,
				'employees_photo' => $employees_photo];
                if($contract_date == '' ){ unset($employee['contract_date']); }
			$emp['contract_file'] = $contract_file;
			$emp['governmental_id_file'] = $governmental_id_file;
			$emp['certificate_file'] = $certificate_file;
			$emp['employees_photo'] = $employees_photo;
			$emp['admin_id'] = $this->session->userdata('admin_id');
			unset($emp['cpassword']);

			if ($id) //employee edit kari tyare if condition sachi pade
			{

				unset($emp['editemployee']);
				$id = $emp['id'];
				$emp['user_id'] = $id;
				$emp['status'] = '1';
				$emp['add_edit'] = 1;

				unset($emp['id']);

				$this->employee_mod->edit_employee($employee,$id,$up_user);
				$json_data['emp_id']= $id;
				insertActionLog($json_data,0,"employee","update");
				return redirect('admin/employee/list_employee');
			} else { 		
        
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		$this->form_validation->set_rules('employee_type', 'employee type', 'required');
		$this->form_validation->set_rules('name', 'name', 'required|callback_alpha_Ar');
		$this->form_validation->set_rules('branch', 'branch', 'required');
		$this->form_validation->set_rules('bank_accounts', 'bank_accounts', 'required');
		$this->form_validation->set_rules('department_id', 'department', 'required');
		$this->form_validation->set_rules('bank_name', 'bank_name', 'required|callback_alpha_Ar');
		$this->form_validation->set_rules('monthly_salary', 'monthly_salary', 'required|numeric');
		$this->form_validation->set_rules('amount', 'amount', 'required|numeric');
		$this->form_validation->set_rules('employee_type', 'employee_type', 'required');

        if($this->form_validation->run() != FALSE){

   
				unset($emp['addemployee']);
				$emp['status'] = '1';
				$emp['add_edit'] = '0';

				$this->employee_mod->store_employeeinfo($emp, $user, $employee);
				$this->session->set_flashdata('addemployee', 'Employee add successfully');
				return redirect('admin/employee/add_employee');
			} else {
				$dep = $this->employee_mod->select_department();
				$upload_error = $this->upload->display_errors();
				$this->load->view('admin/add_employee', ['dep' => $dep, 'upload_error' => $upload_error]);
			}
				$json_data['emp_id']= $id;
				insertActionLog($json_data,0,"employee","add");
			}
		} else {
			if ($id) //service edit kari tyare aa condition sachi pade
			{
				$dep = $this->employee_mod->select_department();
				$employee = $this->employee_mod->find_employee($id);
				$this->load->view('admin/edit_employee', ['emp' => $employee, 'dep' => $dep]);

			} else {
				$dep = $this->employee_mod->select_department();
				$upload_error = $this->upload->display_errors();
				$this->load->view('admin/add_employee', ['dep' => $dep, 'upload_error' => $upload_error]);
			}

		}
	}
function rolekey_exists($key) { 
  $this->employee_mod->mail_exists($key);
}
	public function list_employee() //employee ma list display karva mte
	{
		$data = $this->employee_mod->list_employee();
		$json_data['page']= "list";
		insertActionLog($json_data,0,"employee","list");
		return $this->load->view('admin/list_employee', ['data' => $data]);
	}

	public function find_employee($id) //je employee edit karvano 6e e find karva
	{
		$dep = $this->employee_mod->select_department();
		$employee = $this->employee_mod->find_employee($id);
		$json_data['page']= "edit";
		insertActionLog($json_data,0,"employee","edit");
		return $this->load->view('admin/edit_employee', ['emp' => $employee, 'dep' => $dep]);
	}

	public function view_employee($id) //je employee edit karvano 6e e find karva
	{
		$dep = $this->employee_mod->select_department();
		$employee = $this->employee_mod->find_employee($id);
		$json_data['emp_id']= $id;
		insertActionLog($json_data,0,"employee","view");
		return $this->load->view('admin/view_employee', ['emp' => $employee, 'dep' => $dep]);
	}

	public function delete_employee() //employee delete karva mate
	{
		$id = $this->input->post('id');
		$json_data['emp_id']= $id;
		
		insertActionLog($json_data,0,"employee","delete");
    	$data =	$this->employee_mod->delete_employee($id);
        if(empty($data)){
            echo json_encode("Failed: Please delete your all E-service related information like Mission, invoice, expense.");
            return false;
        }
		echo json_encode('delete success');
	}

	public function padding_employee() //padding employee display karva mate
	{
		$padding_emp = $this->employee_mod->padding_employee();
		$json_data['page']= "pending";
		insertActionLog($json_data,0,"employee","pending");
		return $this->load->view('admin/padding_employee', ['list' => $padding_emp]);
	}

	public function approve_employee($id) //je employee approve karyo hoy tena matee
	{
		$approve = $this->employee_mod->approve_employee($id);

		$user = array('name' => $approve['name'], 'dob' => $approve['dob'], 'address' => $approve['address'], 'phone' => $approve['phone'], 'email' => $approve['email'], 'password' => $approve['password'], 'status' => 1);

		$emp = array('branch' => $approve['branch'], 'bank_accounts' => $approve['bank_accounts'], 'bank_name' => $approve['bank_name'], 'monthly_salary' => $approve['monthly_salary'], 'amount' => $approve['amount'], 'employee_type' => $approve['employee_type'], 'department_id' => $approve['department_id']);
		if ($approve['contract_file']) {
			$emp['contract_file'] = $approve['contract_file'];
		}
		if ($approve['governmental_id_file']) {
			$emp['governmental_id_file'] = $approve['governmental_id_file'];
		}
		if ($approve['certificate_file']) {
			$emp['certificate_file'] = $approve['certificate_file'];
		}
		if ($approve['employees_photo']) {
			$emp['employees_photo'] = $approve['employees_photo'];
		}
		$this->employee_mod->user_employee($id, $user, $emp);
		$json_data['emp_id']= $id;
		insertActionLog($json_data,0,"employee","approve");
		return redirect('admin/employee/padding_employee');
	}

	public function approve_employee_dashboard($id) //je employee approve karyo hoy tena matee
	{
		$approve = $this->employee_mod->approve_employee($id);

		$user = array('name' => $approve['name'], 'dob' => $approve['dob'], 'address' => $approve['address'], 'phone' => $approve['phone'], 'email' => $approve['email'], 'password' => $approve['password'], 'status' => 1);

		$emp = array('branch' => $approve['branch'], 'bank_accounts' => $approve['bank_accounts'], 'bank_name' => $approve['bank_name'], 'monthly_salary' => $approve['monthly_salary'], 'amount' => $approve['amount'], 'employee_type' => $approve['employee_type'], 'department_id' => $approve['department_id']);
		if ($approve['contract_file']) {
			$emp['contract_file'] = $approve['contract_file'];
		}
		if ($approve['governmental_id_file']) {
			$emp['governmental_id_file'] = $approve['governmental_id_file'];
		}
		if ($approve['certificate_file']) {
			$emp['certificate_file'] = $approve['certificate_file'];
		}
		if ($approve['employees_photo']) {
			$emp['employees_photo'] = $approve['employees_photo'];
		}
		$this->employee_mod->user_employee($id, $user, $emp);
		$json_data['emp_id']= $id;
		insertActionLog($json_data,0,"employee","approve");
		return redirect('admin/dashboard');
	}
		function print_employee_pdf($id){
		$json_data['emp_id']= $id;
		insertActionLog($json_data,0,"employee","print");
		$filename = time()."_order.pdf";
		$employee = $this->employee_mod->find_employee($id);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->load->library('m_pdf');
 		$stylesheet = file_get_contents('assets/scss/style.scss'); 
 		$html=$this->load->view('admin/print_employee', ['emp' => $employee], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}

}
?>