<?php
$config = [

	'add_hr_fine' => [
		[
			'field' => 'user_id',
			'label' => 'Employee',
			'rules' => 'required',
		],
		[
			'field' => 'fine_type',
			'label' => 'fine type',
			'rules' => 'required',
		],
		[
			'field' => 'start_date',
			'label' => 'start date',
			'rules' => 'required',
		],
		[
			'field' => 'reason',
			'label' => 'reason',
			'rules' => 'required',
		],
	],
	'writing_type' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar',
		],
		 
	],
	'hr_eservice_add' => [
	 
		[
			'field' => 'service_type',
			'label' => 'service type',
			'rules' => 'required',
		],
		[
			'field' => 'start_date',
			'label' => 'start date',
			'rules' => 'required',
		],
		[
			'field' => 'end_date',
			'label' => 'end date',
			'rules' => 'required',
		],
		[
			'field' => 'reason',
			'label' => 'reason',
			'rules' => 'required',
		],
		 
	],
	'fine_type' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar',
		],
		 
	],
	'department_type' => [
		[
			'field' => 'd_name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|is_unique[department.d_name]',
		],
		 
	],
	'marketing_banner' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required',
		],
		 
	],
	'employee_type' => [
		[
			'field' => 'd_name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|is_unique[employee_type.d_name]',
		],
		 
	],
	'judge_master' => [
		[
			'field' => 'judge_name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|is_unique[judge_master.judge_name]',
		],
		 
	],
	'branch_master' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|is_unique[branches.name]',
		],
		 
	],
	'court_master' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar',
		],
		[
			'field' => 'number',
			'label' => 'number',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'address',
			'label' => 'address',
			'rules' => 'required',
		],
		[
			'field' => 'judicial_circuit',
			'label' => 'judicial circuit',
			'rules' => 'required',
		],
		 
	],
	'project_type' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|is_unique[project_type.name]',
		],
		 
	],
	'hr_eservice_type' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|is_unique[hr_eservice_type.name]',
		],
		 
	],
	'add_group' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar',
		],
		 
	],
	'consultation_type' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar',
		],
		 
	],
	'login_check' => [
		[
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required',
		],
		[
			'field' => 'password',
			'label' => 'password',
			'rules' => 'required',
		],
	],
	'forgotpassword' => [
		[
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required',
		],
	],
	'user_create' => [
		[
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required',
		],
		[
			'field' => 'confirm_password',
			'label' => 'confirm password',
			'rules' => 'trim|required',
		],
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required',
		],
		[
			'field' => 'phone',
			'label' => 'phone',
			'rules' => 'required',
		],
		[
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'trim|required|valid_email',
		]
	],
	'add_judge' => [
		[
			'field' => 'judge_name',
			'label' => 'judge name',
			'rules' => 'required',
		],
	],
	'audio_record' => [
		[
			'field' => 'user_id',
			'label' => 'user id',
			'rules' => 'required',
		],
		[
			'field' => 'audio_name',
			'label' => 'audio name',
			'rules' => 'required',
		],
		[
			'field' => 'date',
			'label' => 'date',
			'rules' => 'required',
		],
		[
			'field' => 'note',
			'label' => 'note',
			'rules' => 'required',
		],
		 
	],
	'add_note' => [
		[
			'field' => 'user_id',
			'label' => 'user id',
			'rules' => 'required',
		],
		[
			'field' => 'case_id',
			'label' => 'E-service',
			'rules' => 'required',
		],
		[
			'field' => 'mission_type',
			'label' => 'mission type',
			'rules' => 'required',
		],
		[
			'field' => 'discription',
			'label' => 'note',
			'rules' => 'required',
		],
		[
			'field' => 'date',
			'label' => 'date',
			'rules' => 'required',
		],
	],
	'add_user' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required',
		],
		 
		[
			'field' => 'id_numbers',
			'label' => 'ID',
			'rules' => 'required|is_unique[users.id_numbers]|max_length[10]|min_length[10]',
		],
		[
			'field' => 'id_type',
			'label' => 'ID Type',
			'rules' => 'required',
		],
		[
			'field' => 'address',
			'label' => 'address',
			'rules' => 'required',
		],
		[
			'field' => 'phone',
			'label' => 'phone',
			'rules' => 'required|max_length[12]|min_length[10]|is_unique[users.phone]',
		],
		[
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'trim|required|valid_email',
		],
		[
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|min_length[4]',
		],
		[
			'field' => 'cpassword',
			'label' => 'cpassword',
			'rules' => 'trim|required|min_length[4]|matches[password]',
		],
	],
	'edit_user' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required',
		],
		 
		[
			'field' => 'id_numbers',
			'label' => 'ID',
			'rules' => 'required|max_length[10]|min_length[10]',
		],
		[
			'field' => 'id_type',
			'label' => 'ID Type',
			'rules' => 'required',
		],
		[
			'field' => 'address',
			'label' => 'address',
			'rules' => 'required',
		],
		[
			'field' => 'phone',
			'label' => 'phone',
			'rules' => 'required|max_length[12]|min_length[10]',
		],
		[
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'trim|required|valid_email',
		],
		[
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|min_length[4]',
		],
		[
			'field' => 'cpassword',
			'label' => 'cpassword',
			'rules' => 'min_length[4]|matches[password]',
		],
	],

	'add_admin' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required',
		],
		 
		[
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'trim|required|valid_email',
		],
	/*	[
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|min_length[4]',
		],
		[
			'field' => 'cpassword',
			'label' => 'cpassword',
			'rules' => 'trim|required|min_length[4]|matches[password]',
		],*/
	],

	'add_employee' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|callback_alpha_Ar|max_length[255]',
		],
		[
			'field' => 'department_id',
			'label' => 'department name',
			'rules' => 'required',
		],
		[
			'field' => 'employee_type',
			'label' => 'employee type',
			'rules' => 'required',
		],
		[
			'field' => 'dob',
			'label' => 'Date Of Birth',
			'rules' => 'required',
		],
		[
			'field' => 'address',
			'label' => 'address',
			'rules' => 'required',
		],
		[
			'field' => 'phone',
			'label' => 'phone',
			'rules' => 'required|numeric|xss_clean',
		],
		[
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'trim|required|valid_email',
		],
/* 		[
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|min_length[4]',
		],
		[
			'field' => 'cpassword',
			'label' => 'cpassword',
			'rules' => 'trim|required|min_length[4]|matches[password]',
		], */
		//case side na validation
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],
		[
			'field' => 'bank_accounts',
			'label' => 'bank accounts',
			'rules' => 'required',
		],
		[
			'field' => 'bank_name',
			'label' => 'bank name',
			'rules' => 'required|callback_alpha_Ar',
		],
		[
			'field' => 'monthly_salary',
			'label' => 'monthly salary',
			'rules' => 'required|numeric|xss_clean',
		],
		[
			'field' => 'amount',
			'label' => 'amount',
			'rules' => 'required|numeric|xss_clean',
		],
		[
			'field' => 'employee_type',
			'label' => 'employee type',
			'rules' => 'required',
		],
		[
			'field' => 'department_id',
			'label' => 'department id',
			'rules' => 'required',
		],
	],
	'add_customer' => [
		[
			'field' => 'type_of_customer',
			'label' => 'type of customer',
			'rules' => 'required',
		],
		[
			'field' => 'client_status',
			'label' => 'client status',
			'rules' => 'required',
		],
		[
			'field' => 'identification_types',
			'label' => 'identification types',
			'rules' => 'required',
		],
		[
			'field' => 'contact_type',
			'label' => 'contact type',
			'rules' => 'required',
		],
		[

			'field' => 'client_file_number',
			'label' => 'client file number',
			'rules' => 'required',
		],
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],
 
		[
			'field' => 'identification_number',
			'label' => 'identification number',
			'rules' => 'required|numeric|max_length[10]|min_length[10]',
		],
		[
			'field' => 'client_name',
			'label' => 'client name',
			'rules' => 'required|max_length[45]|min_length[15]|callback_alpha_Ar',
		],
		[
			'field' => 'nationality',
			'label' => 'nationality',
			'rules' => 'required',
		],
		[
			'field' => 'city',
			'label' => 'city',
			'rules' => 'required',
		],
		[
			'field' => 'gender',
			'label' => 'gender',
			'rules' => 'required',
		],

		[
			'field' => 'country',
			'label' => 'country',
			'rules' => 'required',
		],
 
		[
			'field' => 'notes',
			'label' => 'notes',
			'rules' => 'required',
		],
		[
			'field' => 'contact_number',
			'label' => 'contact number',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'contact_number1',
			'label' => 'contact number',
			'rules' => 'numeric',
		],
		[
			'field' => 'contact_number2',
			'label' => 'contact number',
			'rules' => 'numeric',
		],
		[
			'field' => 'contact_number3',
			'label' => 'contact number',
			'rules' => 'numeric',
		],
		
	],

	'add_packages' => [
		[
			'field' => 'package_name',
			'label' => 'package name',
			'rules' => 'trim|required',
		],
		[
			'field' => 'description',
			'label' => 'description',
			'rules' => 'trim|required',
		],
		[
			'field' => 'duration',
			'label' => 'duration',
			'rules' => 'trim|required',
		],
		[
			'field' => 'amount',
			'label' => 'amount',
			'rules' => 'trim|required',
		],
	],
	'add_services' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required',
		],
		
	],
	'team_members' => [
		[
			'field' => 'name',
			'label' => 'name',
			'rules' => 'trim|required',
		],
	],

	'add_case' => [


 
		[
			'field' => 'client_name',
			'label' => 'client name',
			'rules' => 'required',
		],
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],

		[
			'field' => 'case_type',
			'label' => 'case type',
			'rules' => 'required',
		],
		[
			'field' => 'case_number',
			'label' => 'case number',
			'rules' => 'required',
		],
		[
			'field' => 'service_types',
			'label' => 'service types',
			'rules' => 'required',
		],
		[
			'field' => 'case_date',
			'label' => 'case date',
			'rules' => 'required',
		],
		[
			'field' => 'case_start_date',
			'label' => 'case start date',
			'rules' => 'required',
		],
		[
			'field' => 'contract_number',
			'label' => 'contract number',
			'rules' => 'required',
		],
		 
		[
			'field' => 'note',
			'label' => 'note',
			'rules' => 'required',
		],
	],


	'add_session_appoinment' => [
		[
			'field' => 'session_number',
			'label' => 'session number',
			'rules' => 'required',
		],
		[
			'field' => 'session_date',
			'label' => 'session date',
			'rules' => 'required',
		],
		[
			'field' => 'session_time',
			'label' => 'session time',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_date',
			'label' => 'session end date',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_time',
			'label' => 'session end time',
			'rules' => 'required',
		],
		[
			'field' => 'session_code',
			'label' => 'status',
			'rules' => 'required',
		],

		[
			'field' => 'entry_no',
			'label' => 'entry no',
			'rules' => 'required',
		],
		[
			'field' => 'department',
			'label' => 'department',
			'rules' => 'required',
		],
		[
			'field' => 'note',
			'label' => 'requirement',
			'rules' => 'required',
		],
	],
	'add_writings_appoinment' => [

		[
			'field' => 'session_number',
			'label' => 'number',
			'rules' => 'required',
		],
		[
			'field' => 'session_date',
			'label' => ' date',
			'rules' => 'required',
		],
		[
			'field' => 'session_time',
			'label' => 'time',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_date',
			'label' => 'end date',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_time',
			'label' => 'end time',
			'rules' => 'required',
		],
 
		 
	],
	'add_consultation_appoinment' => [
		[
			'field' => 'session_number',
			'label' => 'consultation number',
			'rules' => 'required',
		],
		[
			'field' => 'session_date',
			'label' => 'consultation date',
			'rules' => 'required',
		],
		[
			'field' => 'session_time',
			'label' => 'consultation time',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_date',
			'label' => 'consultation end date',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_time',
			'label' => 'consultation end time',
			'rules' => 'required',
		],
		[
			'field' => 'session_code',
			'label' => 'consultation status',
			'rules' => 'required',
		],
 
 
	],

	'add_visiting_appoinment' => [

		[
			'field' => 'session_number',
			'label' => 'visiting number',
			'rules' => 'required',
		],
		[
			'field' => 'session_date',
			'label' => 'visiting date',
			'rules' => 'required',
		],
		[
			'field' => 'session_time',
			'label' => 'visiting time',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_date',
			'label' => 'visiting end date',
			'rules' => 'required',
		],
		[
			'field' => 'session_end_time',
			'label' => 'visiting end time',
			'rules' => 'required',
		],
		[
			'field' => 'session_code',
			'label' => 'visiting status',
			'rules' => 'required',
		],
 
		[
			'field' => 'note',
			'label' => 'requirement',
			'rules' => 'required',
		],
	],

	'add_procuration' => [

		[
			'field' => 'identification_number',
			'label' => 'identification number',
			'rules' => 'required',
		],

		[
			'field' => 'identification_types',
			'label' => 'identification types',
			'rules' => 'required',
		],
		[
			'field' => 'client_file_number',
			'label' => 'client file number',
			'rules' => 'required',
		],
		[
			'field' => 'client_name',
			'label' => 'client name',
			'rules' => 'required',
		],
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],
		[
			'field' => 'case_code',
			'label' => 'case code',
			'rules' => 'required',
		],
		[
			'field' => 'case_type',
			'label' => 'case type',
			'rules' => 'required',
		],
		[
			'field' => 'case_number',
			'label' => 'case number',
			'rules' => 'required',
		],
		[
			'field' => 'contact_number',
			'label' => 'contact number',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_title',
			'label' => 'procuration title',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_code',
			'label' => 'procuration code',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_type',
			'label' => 'procuration type',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_number',
			'label' => 'procuration number',
			'rules' => 'required',
		],
		[
			'field' => 'total_of_procuration_number',
			'label' => 'total of procuration number',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_date',
			'label' => 'procuration date',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_status',
			'label' => 'procuration status',
			'rules' => 'required',
		],
		
		[
			'field' => 'responsible_employee',
			'label' => 'responsible employee',
			'rules' => 'required',
		],
		[
			'field' => 'follow_up_employee',
			'label' => 'follow up employee',
			'rules' => 'required',
		],
		[
			'field' => 'note',
			'label' => 'note',
			'rules' => 'required',
		],
	],
	'add_reg_of_doc' => [

		[
			'field' => 'identification_number',
			'label' => 'identification number',
			'rules' => 'required',
		],
		[
			'field' => 'identification_types',
			'label' => 'identification types',
			'rules' => 'required',
		],
		[
			'field' => 'client_file_number',
			'label' => 'client file number',
			'rules' => 'required',
		],
		[
			'field' => 'client_name',
			'label' => 'client name',
			'rules' => 'required',
		],
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],
		[
			'field' => 'case_code',
			'label' => 'case code',
			'rules' => 'required',
		],
		[
			'field' => 'contact_number',
			'label' => 'contact number',
			'rules' => 'required',
		],
		[
			'field' => 'document_title',
			'label' => 'document title',
			'rules' => 'required',
		],
		[
			'field' => 'document_code',
			'label' => 'document code',
			'rules' => 'required',
		],
		[
			'field' => 'document_type',
			'label' => 'document type',
			'rules' => 'required',
		],
		[
			'field' => 'document_number',
			'label' => 'document number',
			'rules' => 'required',
		],
		[
			'field' => 'total_of_procuration_number',
			'label' => 'total of procuration number',
			'rules' => 'required',
		],
		[
			'field' => 'procuration_date',
			'label' => 'procuration date',
			'rules' => 'required',
		],
		[
			'field' => 'responsible_employee',
			'label' => 'responsible employee',
			'rules' => 'required',
		],
		[
			'field' => 'follow_up_employee',
			'label' => 'follow up employee',
			'rules' => 'required',
		],
		[
			'field' => 'note',
			'label' => 'note',
			'rules' => 'required',
		],
	],
	'add_task' => [

		[
			'field' => 'employee_name',
			'label' => 'employee name',
			'rules' => 'required',
		],

		[
			'field' => 'case_name',
			'label' => 'case name',
			'rules' => 'required',
		],

		[
			'field' => 'task_status',
			'label' => 'task status',
			'rules' => 'required',
		],
		[
			'field' => 'employee_number',
			'label' => 'employee number',
			'rules' => 'required',
		],
		[
			'field' => 'position_name',
			'label' => 'position name',
			'rules' => 'required',
		],
		[
			'field' => 'department',
			'label' => 'department',
			'rules' => 'required',
		],
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],
		[
			'field' => 'task_type',
			'label' => 'task type',
			'rules' => 'required',
		],
		[
			'field' => 'task_relation',
			'label' => 'task relation',
			'rules' => 'required',
		],
		[
			'field' => 'client',
			'label' => 'client',
			'rules' => 'required',
		],
		[
			'field' => 'project',
			'label' => 'project',
			'rules' => 'required',
		],
		[
			'field' => 'other',
			'label' => 'other',
			'rules' => 'required',
		],
		[
			'field' => 'task_title',
			'label' => 'task title',
			'rules' => 'required',
		],
		[
			'field' => 'task_number',
			'label' => 'task number',
			'rules' => 'required',
		],
		[
			'field' => 'starting_date',
			'label' => 'starting date',
			'rules' => 'required',
		],
		[
			'field' => 'ending_date',
			'label' => 'ending date',
			'rules' => 'required',
		],
		[
			'field' => 'start_time',
			'label' => 'start time',
			'rules' => 'required',
		],
		[
			'field' => 'ending_time',
			'label' => 'ending time',
			'rules' => 'required',
		],
		[
			'field' => 'reminder_and_alerts',
			'label' => 'reminder and alerts',
			'rules' => 'required',
		],
		[
			'field' => 'reminder_and_alerts_type',
			'label' => 'reminder and alerts type',
			'rules' => 'required',
		],
		[
			'field' => 'list_of_tasks',
			'label' => 'list of tasks',
			'rules' => 'required',
		],
		[
			'field' => 'responsible_employee',
			'label' => 'responsible employee',
			'rules' => 'required',
		],
		[
			'field' => 'follow_up_employee',
			'label' => 'follow up employee',
			'rules' => 'required',
		],
		[
			'field' => 'expected_completion_rate',
			'label' => 'expected completion rate',
			'rules' => 'required',
		],
		[
			'field' => 'note',
			'label' => 'note',
			'rules' => 'required',
		],
		[
			'field' => 'client_file_number',
			'label' => 'client file number',
			'rules' => 'required',
		],
		[
			'field' => 'client_name',
			'label' => 'client name',
			'rules' => 'required',
		],
		[
			'field' => 'case_code',
			'label' => 'case code',
			'rules' => 'required',
		],
		[
			'field' => 'case_number',
			'label' => 'case number',
			'rules' => 'required',
		],
		[
			'field' => 'session_code',
			'label' => 'session code',
			'rules' => 'required',
		],
		[
			'field' => 'session_number',
			'label' => 'session number',
			'rules' => 'required',
		],
		[
			'field' => 'writing_number',
			'label' => 'writing number',
			'rules' => 'required',
		],
		[
			'field' => 'consultation_code',
			'label' => 'consultation code',
			'rules' => 'required',
		],
		[
			'field' => 'consultation_number',
			'label' => 'consultation number',
			'rules' => 'required',
		],

		[
			'field' => 'visiting_code',
			'label' => 'visiting code',
			'rules' => 'required',
		],
		[
			'field' => 'visiting_number',
			'label' => 'visiting number',
			'rules' => 'required',
		],
		[
			'field' => 'project_name',
			'label' => 'project name',
			'rules' => 'required',
		],
		[
			'field' => 'project_number',
			'label' => 'project number',
			'rules' => 'required',
		],
	],

	'add_convert_task' => [
		[
			'field' => 'task_number',
			'label' => 'task number',
			'rules' => 'required',
		],
		[
			'field' => 'employee_name',
			'label' => 'employee name',
			'rules' => 'required',
		],
		[
			'field' => 'employee_number',
			'label' => 'employee number',
			'rules' => 'required',
		],
		[
			'field' => 'current_achievement_ratio',
			'label' => 'current achievement ratio',
			'rules' => 'required',
		],
		[
			'field' => 'designated_employee_name',
			'label' => 'designated employee name',
			'rules' => 'required',
		],
		[
			'field' => 'department',
			'label' => 'department',
			'rules' => 'required',
		],
		[
			'field' => 'branch',
			'label' => 'branch',
			'rules' => 'required',
		],
		[
			'field' => 'starting_date',
			'label' => 'starting date',
			'rules' => 'required',
		],
		[
			'field' => 'ending_date',
			'label' => 'ending date',
			'rules' => 'required',
		],
		[
			'field' => 'start_time',
			'label' => 'start time',
			'rules' => 'required',
		],
		[
			'field' => 'ending_time',
			'label' => 'ending time',
			'rules' => 'required',
		],
		[
			'field' => 'reminder_and_alerts',
			'label' => 'reminder and alerts',
			'rules' => 'required',
		],
		[
			'field' => 'reminder_and_alerts_type',
			'label' => 'reminder and alerts type',
			'rules' => 'required',
		],
		[
			'field' => 'list_of_tasks',
			'label' => 'list of tasks',
			'rules' => 'required',
		],
		[
			'field' => 'responsible_employee',
			'label' => 'responsible employee',
			'rules' => 'required',
		],
		[
			'field' => 'follow_up_employee',
			'label' => 'follow up employee',
			'rules' => 'required',
		],
		[
			'field' => 'expected_completion_rate',
			'label' => 'expected completion rate',
			'rules' => 'required',
		],
		[
			'field' => 'note',
			'label' => 'note',
			'rules' => 'required',
		],
	],

	'add_project' => [
		[
			'field' => 'project_name',
			'label' => 'project name',
			'rules' => 'required',
		],
 
		[
			'field' => 'project_type',
			'label' => 'project type',
			'rules' => 'required',
		],
		[
			'field' => 'project_relation',
			'label' => 'project relation',
			'rules' => 'required',
		],
 
 
		[
			'field' => 'project_team_manager',
			'label' => 'project team manager',
			'rules' => 'required',
		],
		 
		[
			'field' => 'project_number',
			'label' => 'project number',
			'rules' => 'required',
		],
		[
			'field' => 'starting_date',
			'label' => 'starting date',
			'rules' => 'required',
		],
		[
			'field' => 'ending_date',
			'label' => 'ending date',
			'rules' => 'required',
		],
		[
			'field' => 'start_time',
			'label' => 'start time',
			'rules' => 'required',
		],
		[
			'field' => 'ending_time',
			'label' => 'ending time',
			'rules' => 'required',
		],
     
	],
	'by_employees' => [
		[
			'field' => 'from',
			'label' => 'from',
			'rules' => 'required',
		],
		[
			'field' => 'to',
			'label' => 'to',
			'rules' => 'required',
		],
	],
	'by_time' => [
		[
			'field' => 'from',
			'label' => 'from',
			'rules' => 'required',
		],
		[
			'field' => 'to',
			'label' => 'to',
			'rules' => 'required',
		],
		[
			'field' => 'type',
			'label' => 'type',
			'rules' => 'required',
		],
	],
	'change_password_admin' => [
		[
			'field' => 'new_password',
			'label' => 'alphabet, number, special character',
			'rules' => 'trim|required|min_length[6]|regex_match[/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/]',
		],
		[
			'field' => 'confirm_password',
			'label' => 'confirm password',
			'rules' => 'trim|required|min_length[6]|matches[new_password]',
		],
	],
	'change_password' => [
		[
			'field' => 'current_password',
			'label' => 'current password',
			'rules' => 'trim|required|min_length[4]',
		],
		[
			'field' => 'new_password',
			'label' => 'new password',
			'rules' => 'trim|required|min_length[4]',
		],
		[
			'field' => 'confirm_password',
			'label' => 'confirm password',
			'rules' => 'trim|required|min_length[4]|matches[new_password]',
		],
	],
	'front_law_suite' => [
		[
			'field' => 'firstname',
			'label' => 'firstname',
			'rules' => 'trim|required',
		],
		[
			'field' => 'lastname',
			'label' => 'lastname',
			'rules' => 'trim|required',
		],
		[
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email',
		],
		[
			'field' => 'phone',
			'label' => 'phone',
			'rules' => 'trim|required',
		],
		[
			'field' => 'city',
			'label' => 'city',
			'rules' => 'trim|required',
		],
	],

	'front_contact_us' => [
		[
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email',
		],
	],

	'contract' => [
		[
			'field' => 'contract_start_date',
			'label' => 'contract start date',
			'rules' => 'trim',
		],
		[
			'field' => 'ending_contract_date',
			'label' => 'ending contract date',
			'rules' => 'trim|required',
		],
		[
			'field' => 'contract_number',
			'label' => 'contract number',
			'rules' => 'trim|required',
		],
		[
			'field' => 'contract_type',
			'label' => 'contract type',
			'rules' => 'trim|required',
		],
		[
			'field' => 'service_types',
			'label' => 'service types',
			'rules' => 'trim|required',
		],
		[
			'field' => 'client_name',
			'label' => 'client name',
			'rules' => 'trim|required',
		],
		[
			'field' => 'identification_number',
			'label' => 'identification number',
			'rules' => 'trim|required',
		],
		[
			'field' => 'identification_types',
			'label' => 'identification types',
			'rules' => 'trim|required',
		],
		[
			'field' => 'number_of_cases',
			'label' => 'number of cases',
			'rules' => 'trim|required',
		],
		[
			'field' => 'legal_consultation',
			'label' => 'legal consultation',
			'rules' => 'trim|required',
		],
		[
			'field' => 'contract_price',
			'label' => 'contract price',
			'rules' => 'trim|required',
		],
		[
			'field' => 'contract_start_date',
			'label' => 'contract start date',
			'rules' => 'trim|required',
		],
		[
			'field' => 'notes',
			'label' => 'notes',
			'rules' => 'trim|required',
		],
		[
			'field' => 'responsible_employee',
			'label' => 'responsible employee',
			'rules' => 'trim|required',
		],
		[
			'field' => 'case_status',
			'label' => 'case status',
			'rules' => 'trim|required',
		],

	],
	'hr' => [
		[
			'field' => 'client_full_name',
			'label' => 'name',
			'rules' => 'required',
		],
		[
			'field' => 'identification_types',
			'label' => 'identification types',
			'rules' => 'required',
		],
		[
			'field' => 'employee_type',
			'label' => 'employee types',
			'rules' => 'required',
		]
	],
	'archive' => [
		[
			'field' => 'file_type',
			'label' => 'file type',
			'rules' => 'required',
		],
		[
			'field' => 'notes',
			'label' => 'notes',
			'rules' => 'required',
		],
		[
			'field' => 'others',
			'label' => 'file others',
			'rules' => 'required',
		],
		[
			'field' => 'file_title',
			'label' => 'file title',
			'rules' => 'required',
		],
		[
			'field' => 'file_note',
			'label' => 'file note',
			'rules' => 'required',
		],
		[
			'field' => 'responsible_employee',
			'label' => 'responsible employee',
			'rules' => 'required',
		],
	
	],
	
]
?>