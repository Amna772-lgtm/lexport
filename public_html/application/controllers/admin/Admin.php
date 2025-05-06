<?php
error_reporting(0);
class admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->isAdmintLogged();
		$this->load->model('admin/admin_mod');

		$this->load->library('Ajax_pagination');
		$this->perPage = 50;
	}

	function send_notification()
	{
		if ($this->input->post('message')) {
			$find_package = $this->db->select('device_token')->get('users')->result_array();
			foreach ($find_package as $result) {
				if ($result['device_token'] != "" or $result['device_token'] != null)
					$ids[] =  $result['device_token'];
			}
			static_send_android_notification('', $ids, $this->input->post('message'));
			$this->session->set_flashdata('send_notification', '<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success">' . $this->lang->line('send_notification_msg') . '</div>');
			return redirect('admin/admin/send_notification');
			exit;
		}
		$this->load->view('admin/send_notification');
	}
	public function assign_mission_following_emp()
	{

		$type = $this->input->post('type');
		$user_id = $this->session->userdata('admin_id');
		$notes = $this->input->post('notes');
		$following_employee_id = $this->input->post('following_employee_id');
		$customers_id = $this->input->post('customers_id');
		$app_id = $this->input->post('id');
		$case_id = $this->input->post('case_id');
		$found = $this->db->select('*')->where(['app_id' => $app_id, 'following_employee_id' => $following_employee_id, 'type' => $type])->get('assign_mission')->row();
		if ($found) {
			echo json_encode('Mission already assign to this employee');
			return false;
		}
		if ($type == "session_mission") {
			$msgt =  $this->lang->line("Session_Mission");
		}
		if ($type == "consultation_mission") {
			$msgt =  $this->lang->line("Consultation_Mission");
		}
		if ($type == "general_mission") {
			$msgt =  $this->lang->line("General_Mission");
		}
		if ($type == "writing_misssion") {
			$msgt =  $this->lang->line("Visiting_Mission");
		}
		if ($type == "visiting_mission") {
			$msgt =  $this->lang->line("Update_E_Service");
		}
		$post_data['user_id'] = $user_id;
		$post_data['app_id'] = $app_id;
		$post_data['case_id'] = $case_id;
		$post_data['notes'] = $notes;
		$post_data['following_employee_id'] = $following_employee_id;
		$post_data['customers_id'] = $customers_id;
		$post_data['type'] = $type;
		$post_data['create_date'] = date("Y-m-d G:i:s");
		$this->db->insert('assign_mission', $post_data);

		$users = $this->db->select('*')->where('id', $following_employee_id)->get('users')->row_array();

		$email = $users['email'];
		$name = $users['name'];
		$phone = $users['phone'];
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);

		$new = [
			'to_email' => $email, 'case_id' => $case_id, 'notification_type' => 'mission',
			'name' => $name, 'status_type' => 'mission_asssign', 'msg' => $msgt
		];

		$from_email = constant("FROM_EMAIL");
		$to_email = $email;
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject('You assign as following in ' . $msgt . '-' . constant("SENDER_NAME"));
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();

		echo json_encode('Mission Assign Successfully');
	}
	public function review_mission($id = "", $table = "")
	{
		$post = $this->input->post();
		if ($post) {

			$user_id = $this->session->userdata('admin_id');
			$role_id = $this->session->userdata('role_id');
			$post = $this->input->post();
			$folloup_id = $this->input->post('follow_up_id');
			$eid = $this->input->post('eid');
			$is_new = $this->input->post('is_new');
			$folloup_rate = $this->input->post('follow_rating');
			unset($post['follow_up_id'], $post['follow_rating'], $post['follow_id'], $post['is_new'], $post['eid']);
			$post['follow_id'] = json_encode($folloup_id);
			$post['follow_rating'] = json_encode($folloup_rate);
			if ($role_id == 1) {
				$post['admin_id'] = $user_id;
			} else {
				$post['user_id'] = $user_id;
			}

			$getapp = $this->db->select('*')->where('mission_id', $post['mission_id'])->where('mission_type', $post['mission_type'])->get('mission_rating')->num_rows();

			if ($getapp > 0) {
				$this->db->where('mission_id', $post['mission_id'])->update('mission_rating', $post);
			} else {
				$this->db->insert('mission_rating', $post);
			}

			if ($table == "session_mission") {
				if ($is_new == 1) {
					return redirect("admin/mission_session/add_mission/$eid");
				} else {
					return redirect('admin/mission_session/list_close_mission');
				}
			}
			if ($table == "general_mission") {
				if ($is_new == 1) {
					return redirect("admin/mission_general/add_mission/$eid");
				} else {
					return redirect('admin/mission_general/list_close_mission');
				}
			}
			if ($table == "visiting_mission") {
				if ($is_new == 1) {
					return redirect("admin/mission_visiting/add_mission/$eid");
				} else {
					return redirect('admin/mission_visiting/list_close_mission');
				}
			}
			if ($table == "writing_misssion") {
				if ($is_new == 1) {
					return redirect("admin/mission_writings/add_mission/$eid");
				} else {
					return redirect('admin/mission_writings/list_close_mission');
				}
			}

			if ($table == "consultation_mission") {
				if ($is_new == 1) {
					return redirect("admin/mission_consultation/add_mission/$eid");
				} else {
					return redirect('admin/mission_consultation/list_close_mission');
				}
			}
		} else {

			$data = $this->db->select("$table.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.manager_id,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
				->join('c_case', "c_case.id = {$table}.case_id", 'left')
				->where("$table.id", $id)->get($table)->row();
			$p_data = $this->db->select('*')->where('mission_id', $data->id)->where('mission_type', $table)->get('mission_rating')->row();

			$this->load->view('admin/review_mission', ['data' => $data, "p_data" => $p_data]);
		}
	}
	public function add_rating()
	{
		$post = $this->input->post();
		$this->db->insert('mission_rating', $post);
	}
	public function new_file()
	{
		$data = file_get_contents($_FILES['file']['tmp_name']);
		if (isset($_FILES['file'])) {
			$audio = file_get_contents($_FILES['file']['tmp_name']);
			//write_file('uploads/audio/file3.wav', base64_decode(urldecode($data)));
			$this->db->insert('uploads', ['audio' => $audio]);
		}
	}
	public function chat($id = "")
	{
		$read['is_read'] = 1;
		$this->db->where('user_id', $id)->update("chat", $read);
		$post = $this->input->post();
		if ($post) {
			$post['role_id'] = $this->session->userdata('role_id');
			$post['user_id'] =  $id;
			$post['send_from'] =  $this->session->userdata('admin_id');
			$this->db->insert('chat', $post);
			return redirect('admin/admin/chat/' . $id);
		}

		$this->db->where('user_id', $id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('chat');
		$chat = array_reverse($query->result_array());
		if ($this->session->userdata('role_id') == 1) {
			$users =  $this->db->select("users.*,chat.create_date,chat.user_id")->join('chat', "chat.user_id = users.id", 'left')
				->where("users.role_id", 3)->order_by('chat.create_date', 'DESC')->group_by('users.id')
				->get("users")
				->result_array();
		} else {
			$users =  $this->db->select("customers.*,chat.create_date,chat.user_id")->join('chat', "chat.user_id = customers.user_id", 'left')
				->where("customers.user_id", $this->session->userdata('admin_id'))->order_by('chat.create_date', 'DESC')->group_by('customers.user_id')
				->get("customers")
				->result_array();
		}

		//	$users = $this->db->select('id,name')->where("(role_id=3)", NULL, FALSE)->get('users')->result_array(); 

		$this->load->view('admin/chat', ['chat' => $chat, 'users' => $users, 'userid' => $id]);
	}
	public function send_cust_msg()
	{
		$post = $this->input->post();
		$customers_id = $this->input->post('customers_id');
		$message = $this->input->post('message');
		$noti['user_id'] = $this->session->userdata('admin_id');
		$noti['customer_id'] = $customers_id;
		$noti['case_id'] = 0;
		$noti['notification_type'] = 'msg';
		$noti['status_type'] = $message;
		$this->db->insert('notification', $noti);
		$this->db->insert('user_message', $post);
		echo json_encode('Message Sent SuccessFully');
	}
	public function send_selceted_msg()
	{

		$customers_id = $this->input->post('customers_id');
		$message = $this->input->post('message');
		$jsonObj = array(
			'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
			'sender' => 'Nassr APP',
			'numbers' => $customers_id,
			'msg' => $message,
			'msgId' => rand(1, 99999),
			'timeSend' => '0',
			'dateSend' => '0',
			'deleteKey' => '55348',
			'lang' => '3',
			'applicationType' => 68,
		);
		return $result = $this->Sms->sendSMS($jsonObj);
	}
	public function view_user($id)
	{
		$row = $this->db->select('*')
			->where("(id=$id)", NULL, FALSE)
			->get('users')
			->row();
		$read['is_read'] = 1;
		$this->db->where('id', $id)->update('users', $read);
		$this->load->view('admin/view_user', ['data' => $row]);
	}
	public function all_users()
	{
		$all_users = $this->db->select('*')
			->where("(role_id=3)", NULL, FALSE)->order_by("id", "DESC")
			->get('users')
			->result_array();
		$this->load->view('admin/all_users', ['all_users' => $all_users]);
	}
	public function court_master()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('court_master');
		$court_master = $q->result();

		$this->load->view('admin/court_master', ['court_master' => $court_master]);
	}
	public function case_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('case_type');
		$case_type = $q->result();
		$this->load->model('admin/services_mod');
		$data1 = $this->services_mod->services();
		$this->load->view('admin/case_type', ['case_type' => $case_type, 'data1' => $data1]);
	}
	public function add_group()
	{
		$post = $this->input->post();
		if ($this->form_validation->run('add_group')) {
			if ($post) {
				$id = $this->input->post('id');
				$employees['employee_name'] = json_encode($this->input->post('employees'));
				$employees['name'] = $this->input->post('name');
				if ($id) {
					$this->db->where('id', $id)->update('employee_group', $employees);
				} else {
					$this->db->insert('employee_group', $employees);
				}
				redirect('admin/admin/add_group');
			} else {
				$this->load->model('admin/case_mod');
				$employees = $this->case_mod->get_employee();
				$q = $this->db->order_by("id", "desc")
					->get('employee_group');
				$group = $q->result();
				$this->load->view('admin/add_group', ['group' => $group, 'employees' => $employees]);
			}
		} else {
			$this->load->model('admin/case_mod');
			$employees = $this->case_mod->get_employee();
			$q = $this->db->order_by("name", "ASC")
				->get('employee_group');
			$group = $q->result();

			return $this->load->view('admin/add_group', ['group' => $group, "employees" => $employees]);
		}
	}
	public function add_court_master()
	{
		$post = $this->input->post();
		if ($this->form_validation->run('court_master')) {
			if ($post) {
				$id = $this->input->post('id');

				if ($id) {
					$this->db->where('id', $id)->update('court_master', $post);
				} else {
					$this->db->insert('court_master', $post);
				}
				redirect('admin/admin/court_master');
			} else {
				$this->load->model('admin/case_mod');

				$q = $this->db->order_by("id", "desc")
					->get('court_master');
				$group = $q->result();
				$this->load->view('admin/court_master', ['group' => $group]);
			}
		} else {
			$q = $this->db->order_by("name", "ASC")
				->get('court_master');
			$court_master = $q->result();

			return $this->load->view('admin/court_master', ['court_master' => $court_master]);
		}
		redirect('admin/admin/court_master');
	}
	public function find_group($id) //je services update karva no 6e e find karva mate
	{
		$this->load->model('admin/case_mod');
		$employees = $this->case_mod->get_employee();
		$q = $this->db->select('*')
			->where('id', $id)
			->get('employee_group');
		$data = $q->row();
		$q1 = $this->db->order_by("id", "desc")
			->get('employee_group');
		$group = $q1->result();
		$this->load->view('admin/add_group', ['group' => $group, 'data' => $data, 'employees' => $employees]);
	}
	public function delete_group() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('employee_group', $id);
		echo json_encode('Group Delete SuccessFully');
	}
	public function delete_court_master() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('court_master', $id);
		echo json_encode('Court Delete SuccessFully');
	}
	public function consultation_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('consultation_type');
		$consultation_type = $q->result();

		$this->load->view('admin/consultation_type', ['consultation_type' => $consultation_type]);
	}
	public function writing_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('writing_type');
		$writing_type = $q->result();

		$this->load->view('admin/writing_type', ['writing_type' => $writing_type]);
	}
	public function task_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('task_type');
		$task_type = $q->result();

		$this->load->view('admin/task_type', ['task_type' => $task_type]);
	}
	public function marketing_banner()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('marketing_banner');
		$marketing_banner = $q->result();

		$this->load->view('admin/marketing_slider', ['marketing_banner' => $marketing_banner]);
	}
	public function project_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('project_type');
		$project_type = $q->result();

		$this->load->view('admin/project_type', ['project_type' => $project_type]);
	}
	public function fine_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('fine_type');
		$fine_type = $q->result();

		$this->load->view('admin/fine_type', ['fine_type' => $fine_type]);
	}

	public function hr_eservice_type()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('hr_eservice_type');
		$hr_eservice_type = $q->result();

		$this->load->view('admin/hr_eservice_type', ['hr_eservice_type' => $hr_eservice_type]);
	}
	public function add_case_type() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		$name['name_en'] = $this->input->post('name_en');
		$name['service_id'] = $this->input->post('service_id');
		if ($id) {
			$this->db->where('id', $id)->update('case_type', $name);
		} else {
			$this->db->insert('case_type', $name);
		}
		redirect('admin/admin/case_type');
	}
	public function add_project_type() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($this->form_validation->run('project_type')) {
			if ($id) {
				$this->db->where('id', $id)->update('project_type', $name);
			} else {
				$this->db->insert('project_type', $name);
			}
		} else {
			$q = $this->db->order_by("name", "ASC")
				->get('project_type');
			$project_type = $q->result();

			return $this->load->view('admin/project_type', ['project_type' => $project_type]);
		}
		redirect('admin/admin/project_type');
	}
	public function department_type() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['d_name'] = $this->input->post('d_name');

		if ($name['d_name']) {
			if ($this->form_validation->run('department_type')) {
				if ($id) {
					$this->db->where('id', $id)->update('department', $name);
				} else {
					$this->db->insert('department', $name);
				}
				redirect('admin/admin/department_type');
			} else {
				$q = $this->db->order_by("d_name", "ASC")
					->get('department');
				$department_type = $q->result();

				return $this->load->view('admin/department_type', ['department_type' => $department_type]);
			}
		} else {
			$q = $this->db->order_by("d_name", "ASC")
				->get('department');
			$department_type = $q->result();

			$this->load->view('admin/department_type', ['department_type' => $department_type]);
		}
	}
	public function employee_type() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['d_name'] = $this->input->post('d_name');
		if ($name['d_name']) {
			if ($this->form_validation->run('employee_type')) {
				if ($id) {
					$this->db->where('id', $id)->update('employee_type', $name);
				} else {
					$this->db->insert('employee_type', $name);
				}
			} else {
				$q = $this->db->order_by("d_name", "ASC")
					->get('employee_type');
				$employee_type = $q->result();

				return $this->load->view('admin/employee_type', ['employee_type' => $employee_type]);
			}
			redirect('admin/admin/employee_type');
		} else {
			$q = $this->db->order_by("d_name", "ASC")
				->get('employee_type');
			$employee_type = $q->result();
			$this->load->view('admin/employee_type', ['employee_type' => $employee_type]);
		}
	}
	public function add_hr_eservice_type() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($this->form_validation->run('hr_eservice_type')) {
			if ($id) {
				$this->db->where('id', $id)->update('hr_eservice_type', $name);
			} else {
				$this->db->insert('hr_eservice_type', $name);
			}
		} else {
			$q = $this->db->order_by("name", "ASC")
				->get('hr_eservice_type');
			$hr_eservice_type = $q->result();
			return $this->load->view('admin/hr_eservice_type', ['hr_eservice_type' => $hr_eservice_type]);
		}
		redirect('admin/admin/hr_eservice_type');
	}
	public function add_fine_type() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($this->form_validation->run('fine_type')) {
			if ($id) {
				$this->db->where('id', $id)->update('fine_type', $name);
			} else {
				$this->db->insert('fine_type', $name);
			}
		} else {
			$q = $this->db->order_by("name", "ASC")
				->get('fine_type');
			$fine_type = $q->result();
			return $this->load->view('admin/fine_type', ['fine_type' => $fine_type]);
		}
		redirect('admin/admin/fine_type');
	}
	public function add_task_type()
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($id) {
			$this->db->where('id', $id)->update('task_type', $name);
		} else {
			$this->db->insert('task_type', $name);
		}
		redirect('admin/admin/task_type');
	}
	public function add_consultation_type()
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($this->form_validation->run('consultation_type')) {
			if ($id) {
				$this->db->where('id', $id)->update('consultation_type', $name);
			} else {
				$this->db->insert('consultation_type', $name);
			}
		} else {
			$q = $this->db->order_by("name", "ASC")
				->get('consultation_type');
			$consultation_type = $q->result();

			return $this->load->view('admin/consultation_type', ['consultation_type' => $consultation_type]);
		}
		redirect('admin/admin/consultation_type');
	}
	public function add_writing_type()
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($this->form_validation->run('writing_type')) {
			if ($id) {
				$this->db->where('id', $id)->update('writing_type', $name);
			} else {
				$this->db->insert('writing_type', $name);
			}
		} else {
			$q = $this->db->order_by("name", "ASC")
				->get('writing_type');
			$writing_type = $q->result();

			return $this->load->view('admin/writing_type', ['writing_type' => $writing_type]);
		}
		redirect('admin/admin/writing_type');
	}
	public function delete_case_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('case_type', $id);
		echo json_encode('Case Type Delete SuccessFully');
	}
	public function delete_user() // approve case delete karva mate
	{
		$id = $this->input->post('id');
		$data = $this->admin_mod->delete_user($id);
		if (empty($data)) {
			echo json_encode("Failed: Please delete your all user related information like File, Mission, invoice, expense.");
			return false;
		}
		echo "true";
		exit;
	}
	public function delete_marketing_banner() //services delete karva mate
	{
		$id = $this->input->post();
		$this->db->delete('marketing_banner', $id);
		echo json_encode('Marketing Banner Delete SuccessFully');
	}
	public function delete_project_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('project_type', $id);
		echo json_encode('Project Type Delete SuccessFully');
	}
	public function delete_department_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('department', $id);
		echo json_encode('Department Delete SuccessFully');
	}
	public function delete_hr_eservice_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('hr_eservice_type', $id);
		echo json_encode('HR E-Service Type Delete SuccessFully');
	}
	public function delete_fine_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('fine_type', $id);
		echo json_encode('Fine Type Delete SuccessFully');
	}
	public function delete_task_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('task_type', $id);
		echo json_encode('Task Type Delete SuccessFully');
	}
	public function delete_consultation_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('consultation_type', $id);
		echo json_encode('Consultation Type Delete SuccessFully');
	}
	public function delete_writing_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('writing_type', $id);
		echo json_encode('Writing Type Delete SuccessFully');
	}
	public function find_case_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select('*')
			->where('id', $id)
			->get('case_type');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('case_type');
		$case_type = $q->result();
		$this->load->model('admin/services_mod');
		$data1 = $this->services_mod->services();
		$this->load->view('admin/case_type', ['data' => $data, 'data1' => $data1, 'case_type' => $case_type]);
	}
	public function find_marketing_banner($id)
	{

		$q = $this->db->select('*')->where('id', $id)->get('marketing_banner');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('marketing_banner');
		$marketing_banner = $q->result();

		$this->load->view('admin/marketing_slider', ['data' => $data, 'marketing_banner' => $marketing_banner]);
	}
	public function ajax_case_type()
	{
		$id = $this->input->post('id');
		$qury = $this->db->select('*')
			->where('service_id', $id)
			->get('case_type')->result_array();
		echo "<option value=''>Select E-Service Type</option>";
		foreach ($qury as $q) {
			echo "<option value='" . $q['id'] . "'>" . $q['name'] . "</option>";
		}
	}
	public function find_court_master($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select('*')
			->where('id', $id)
			->get('court_master');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('court_master');
		$court_master = $q->result();
		$this->load->view('admin/court_master', ['data' => $data, 'court_master' => $court_master]);
	}
	public function find_project_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('project_type');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('project_type');
		$project_type = $q->result();
		$this->load->view('admin/project_type', ['data' => $data, 'project_type' => $project_type]);
	}
	public function find_department_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'd_name'])
			->where('id', $id)
			->get('department');
		$data = $q->row();
		$q = $this->db->order_by("d_name", "ASC")
			->get('department');
		$department_type = $q->result();
		$this->load->view('admin/department_type', ['data' => $data, 'department_type' => $department_type]);
	}
	public function find_employee_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'd_name'])
			->where('id', $id)
			->get('employee_type');
		$data = $q->row();
		$q = $this->db->order_by("d_name", "ASC")
			->get('employee_type');
		$employee_type = $q->result();
		$this->load->view('admin/employee_type', ['data' => $data, 'employee_type' => $employee_type]);
	}
	public function find_hr_eservice_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('hr_eservice_type');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('hr_eservice_type');
		$hr_eservice_type = $q->result();
		$this->load->view('admin/hr_eservice_type', ['data' => $data, 'hr_eservice_type' => $hr_eservice_type]);
	}
	public function find_fine_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('fine_type');
		$data = $q->row();
		$q1 = $this->db->order_by("name", "ASC")
			->get('fine_type');
		$fine_type = $q1->result();
		$this->load->view('admin/fine_type', ['data' => $data, 'fine_type' => $fine_type]);
	}
	public function find_task_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('task_type');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('task_type');
		$task_type = $q->result();
		$this->load->view('admin/task_type', ['data' => $data, 'task_type' => $task_type]);
	}
	public function find_consultation_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('consultation_type');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('consultation_type');
		$consultation_type = $q->result();
		$this->load->view('admin/consultation_type', ['data' => $data, 'consultation_type' => $consultation_type]);
	}
	public function find_writing_type($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('writing_type');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('writing_type');
		$writing_type = $q->result();
		$this->load->view('admin/writing_type', ['data' => $data, 'writing_type' => $writing_type]);
	}
	public function add_branch() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		if ($this->form_validation->run('branch_master')) {
			if ($id) {
				$this->db->where('id', $id)->update('branches', $name);
			} else {
				$this->db->insert('branches', $name);
			}
		} else {
			$q = $this->db->order_by("id", "DESC")->get('branches');
			$branch = $q->result();
			return $this->load->view('admin/branch', ['branch' => $branch]);
		}
		redirect('admin/admin/branch');
	}
	public function add_city() //services add karva mate
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		$name['state_id'] = $this->input->post('state');
		$this->db->insert('cities', $name);

		redirect('admin/admin/branch');
	}
	public function delete_branch() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('branches', $id);
		echo json_encode('Branch Delete SuccessFully');
	}
	public function delete_employee_type() //services delete karva mate
	{
		$id = $this->input->post();

		$this->db->delete('employee_type', $id);
		echo json_encode('Employee Delete SuccessFully');
	}

	public function find_branch($id) //je services update karva no 6e e find karva mate
	{

		$q = $this->db->select(['id', 'name'])
			->where('id', $id)
			->get('branches');
		$data = $q->row();
		$q = $this->db->order_by("name", "ASC")
			->get('branches');
		$branch = $q->result();
		$this->load->view('admin/branch', ['data' => $data, 'branch' => $branch]);
	}

	public function branch()
	{
		$q = $this->db->order_by("name", "ASC")
			->get('branches');
		$branch = $q->result();

		$this->load->view('admin/branch', ['branch' => $branch]);
	}
	public function city()
	{
		$q = $this->db->order_by("name", "ASC")->get('countries');
		$countries = $q->result();
		$this->load->view('admin/city', ['country' => $countries]);
	}
	public function add_cites()
	{
		$id = $this->input->post('id');
		$name['name'] = $this->input->post('name');
		$name['state_id'] = $this->input->post('state');
		$this->db->insert('cities', $name);

		redirect('admin/admin/city');
	}
	public function country_list()
	{
		$id = $this->input->post('id');
		$state = $this->db->select('*')->where('country_id', $id)->get('states')->result();
		echo '<option value="">Select state</option>';
		foreach ($state as $state) {
			echo "<option data-sid='$state->id' value='$state->id'>$state->name</option>";
		}
	}
	public function city_list()
	{
		$id = $this->input->post('id');
		$city = $this->db->select('*')->where('state_id', $id)->get('cities')->result();
		echo '<option value="">Select city</option>';
		foreach ($city as $city) {
			echo "<option value='$city->id'>$city->name</option>";
		}
	}
	public function add_admin() //new admin add karva mate
	{
		$this->load->view('admin/add_admin', ['data' => '']);
	}
	public function change_pass() //new admin add karva mate
	{
		$employees = $this->admin_mod->get_employee();
		$customer = $this->admin_mod->get_customer();
		$this->load->view('admin/change_pass', ['employees' => $employees, 'customer' => $customer]);
	}
	public function change_info()
	{
		$post = $this->input->post();
		$block = 1;
		if (isset($_POST['block'])) {
			$block =  $post['block'];
		}
		$this->db->where('id', $post['user_id'])->update('users', ['status' => $block, 'phone' =>  $post['phone'], 'email' =>  $post['email']]);
		redirect('admin/admin/change_pass?infosuccess=success', 'refresh');
	}
	public function unblock_user($id)
	{
		$this->db->where('id', $id)->update('users', ['status' => 1]);
		redirect('admin/admin/all_users?infosuccess=Un-Block', 'refresh');
	}
	public function block_user($id)
	{
		$this->db->where('id', $id)->update('users', ['status' => 0]);
		redirect('admin/admin/all_users?infosuccess=Block', 'refresh');
	}


	public function change_password()
	{

		//password change thai tyare
		$post = $this->input->post();

		if ($this->form_validation->run('change_password_admin')) {
			$pass = $this->db->select(['email', 'password', 'role_id'])->where('id', $post['user_id'])->get('users')->row_array();
			$this->db->where('id', $post['user_id'])->update('users', ['password' => md5($post['new_password']), 'session_id' => 1]);

			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->load->library('email', $config);

			$new = ['role_id' => $pass['role_id'], 'sub' => 'change', 'to_email' => $pass['email'], 'password' => $post['new_password']];
			$from_email = constant("FROM_EMAIL");
			$to_email = $pass['email'];
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject('Your password change ');
			$body = $this->load->view('email.php', $new, true);
			$this->email->message($body);
			$this->email->send();
			return redirect(base_url() . 'admin/admin/change_pass?status=success');
		} else {
			$employees = $this->admin_mod->get_employee();
			$customer = $this->admin_mod->get_customer();
			$this->load->view('admin/change_pass', ['employees' => $employees, 'customer' => $customer]);
		}
	}
	public function action_log() //new admin add karva mate
	{
		$data = array();

		//total rows count
		$totalRec = count($this->admin_mod->getRows());

		//pagination configuration
		$config['target']      = '#postList';
		$config['base_url']    = base_url() . 'admin/admin/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['num_links']    = $totalRec;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);

		//get the posts data
		$data['posts'] = $this->admin_mod->getRows(array('limit' => $this->perPage));
		//$data = $this->admin_mod->action_log();
		$this->load->view('admin/action_log', $data);
	}
	function ajaxPaginationData()
	{
		$conditions = array();

		//calc offset number
		$page = $this->input->post('page');
		if (!$page) {
			$offset = 0;
		} else {
			$offset = $page;
		}

		//set conditions for search
		$keywords = $this->input->post('keywords');
		$sortBy = $this->input->post('sortBy');
		if (!empty($keywords)) {
			$conditions['search']['keywords'] = $keywords;
		}
		if (!empty($sortBy)) {
			$conditions['search']['sortBy'] = $sortBy;
		}

		//total rows count
		$totalRec = count($this->admin_mod->getRows($conditions));

		//pagination configuration
		$config['target']      = '#postList';
		$config['base_url']    = base_url() . 'admin/admin/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['num_links']    = $totalRec;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);

		//set start and limit
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;

		//get posts data
		$data['posts'] = $this->admin_mod->getRows($conditions);

		//load the view
		$this->load->view('admin/action_log_ajax_pagination', $data, false);
	}
	public function store_admin() //new admin je info add kre e db ma add karva
	{
		$admin = $this->input->post();
		unset($admin['addadmin']);
		unset($admin['cpassword']);
		$admin['password'] = md5($admin['password']);
		if ($this->form_validation->run('add_admin')) {
			if ($admin['id']) {
				$id = $admin['id'];
				unset($admin['id']);

				$this->admin_mod->edit_admin($id, $admin);
				echo json_encode('successfully edit');
			} else {
				$admin['role_id'] = '1';
				$admin['status'] = '1';
				$this->admin_mod->store_admin($admin);
				echo json_encode('successfully add');
			}
		} else {
			if ($admin['id']) {
				$data = $this->admin_mod->find_admin($admin['id']);
				$this->load->view('admin/add_admin', ['data' => $data]);
			} else {
				$this->load->view('admin/add_admin', ['data' => '']);
			}
		}
	}
	public function list_admin() //admin nu list displat karva mate
	{
		$list = $this->admin_mod->list_admin();
		$this->load->view('admin/list_admin', ['list' => $list]);
	}
	public function block_list() //admin nu list displat karva mate
	{
		$list = $this->admin_mod->block_list();
		$this->load->view('admin/block_list', ['list' => $list]);
	}
	public function find_admin($id)
	{
		$data = $this->admin_mod->find_admin($id);
		$this->load->view('admin/add_admin', ['data' => $data]);
	}
	public function delete_admin() //admin ne delete karva mate
	{
		$id = $this->input->post('id');
		$this->admin_mod->delete_admin($id);

		echo json_encode('Delete Success');
	}

	public function add_judge()
	{
		//judge ne add karva mate
		$this->load->view('admin/list_judge', ['data' => '']);
	}

	public function store_judge()
	{
		//judge ne store karva mate
		$data = $this->input->post();
		$id = $data['id'];
		$data['added_id'] = $this->session->userdata('admin_id');
		unset($data['id']);
		if ($data) {
			if ($this->form_validation->run('judge_master')) {
				if ($id) {
					$this->db->where('id', $id)->update('judge_master', $data);
					$action_log['admin_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'judge';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					$this->db->insert('action_log', $action_log);
				} else {
					$this->db->insert('judge_master', $data);
					$insert_id = $this->db->insert_id();
					$action_log['admin_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'judge';
					$action_log['role'] = '1';
					$action_log['action_id'] = $insert_id;
					$action_log['status_type'] = 'add';
					$this->db->insert('action_log', $action_log);
				}
			} else {
				$data = $this->db->get_where('judge_master', ['is_delete' => 0])->result_array();

				return $this->load->view('admin/list_judge', ['data' => $data]);
			}
			return redirect('admin/admin/list_judge');
		} else {
			if ($id) {
				$data = $this->db->get_where('judge_master', ['id' => $id])->row_array();
				$this->load->view('admin/list_judge', ['data' => $data]);
			} else {
				$this->load->view('admin/list_judge', ['data' => '']);
			}
		}
	}

	public function list_judge()
	{
		//judge nu list display krva mate
		$data = $this->db->order_by('id', 'DESC')->get_where('judge_master', ['is_delete' => 0])->result_array();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'judge';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_judge', ['data' => $data]);
	}

	public function find_judge($id)
	{
		$data = $this->db->get_where('judge_master', ['added_id' => $this->session->userdata('admin_id'), 'is_delete' => 0])->result_array();
		//je judge edit karva no che tene find karva mate
		$q = $this->db->select('*')
			->where('id', $id)
			->get('judge_master');
		$data1 = $q->row();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'judge';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_judge', ['data1' => $data1, 'data' => $data]);
	}

	public function view_judge($id)
	{
		//je judge edit karva no che tene find karva mate
		$data = $this->db->get_where('judge_master', ['id' => $id])->row_array();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'judge';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/view_judge', ['data' => $data]);
	}

	public function delete_judge()
	{
		//judge delete karva mate
		$id = $this->input->post('id');
		$this->db->where('id', $id)->update('judge_master', ['is_delete' => 1]);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'judge';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode("judge delte successfully");
	}


	//*------------------------------------------news mate----------------------------------------------//


	public function add_news()
	{
		//news add karva mate
		$this->load->view('admin/add_news', ['data' => '']);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
	}

	public function store_news()
	{
		//news na data fetch karya

		$config = [
			'upload_path' => './uploads/news',
			'allowed_types' => 'jpg|gif|png|jpeg',

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		if ($id) {
			$image = $_FILES['image']['name'];
			if ($this->upload->do_upload('image')) {
				$delete_image = $this->db->select('image')->where('id', $id)->get('news')->row_array();
				if ($delete_image) {
					unlink("uploads/news/" . $delete_image['image']);
				}
				$data['image'] = $image;
				$this->upload->data();
			}
			$this->db->where('id', $id)->update('news', $data);
			$action_log['admin_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'news';
			$action_log['action_id'] = $id;
			$action_log['role'] = '1';
			$action_log['status_type'] = 'edit';
			$this->db->insert('action_log', $action_log);
			return redirect('admin/admin/list_news');
		} else {
			$image = $_FILES['image']['name'];

			if ($this->upload->do_upload('image')) {
				$this->upload->data();
				$data['image'] = $image;
			}
			$this->db->insert('news', $data);
			$id = $this->db->insert_id();

			$action_log['admin_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'news';
			$action_log['action_id'] = $id;
			$action_log['role'] = '1';
			$action_log['status_type'] = 'add';
			$this->db->insert('action_log', $action_log);
			return redirect('admin/admin/list_news');
		}
	}
	public function add_marketing_banner()
	{

		$config = [
			'upload_path' => './uploads/banner',
			'allowed_types' => 'jpg|gif|png|jpeg',

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		if ($this->form_validation->run('marketing_banner')) {
			if ($id) {
				$image = $_FILES['image']['name'];
				if ($this->upload->do_upload('image')) {
					$delete_image = $this->db->select('image')->where('id', $id)->get('marketing_banner')->row_array();
					if ($delete_image) {
						unlink("uploads/banner/" . $delete_image['image']);
					}

					$data1 = $this->upload->data();
					$data['image'] = $data1['file_name'];
				}
				$this->db->where('id', $id)->update('marketing_banner', $data);

				return redirect('admin/admin/marketing_banner');
			} else {
				$image = $_FILES['image']['name'];

				if ($this->upload->do_upload('image')) {
					$data1 = $this->upload->data();;
					$data['image'] = $data1['file_name'];
				}
				$this->db->insert('marketing_banner', $data);
			}
		} else {
			$q = $this->db->order_by("id", "DESC")
				->get('marketing_banner');
			$marketing_banner = $q->result();

			return $this->load->view('admin/marketing_slider', ['marketing_banner' => $marketing_banner]);
		}
		return redirect('admin/admin/marketing_banner');
	}

	public function find_news($id)
	{
		//je news ne edit karva na che tene find karva mate
		$data = $this->db->get_where('news', ['id' => $id])->row_array();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/add_news', ['data' => $data]);
	}
	public function list_news()
	{
		//news nu list display karva mate
		$data = $this->db->get('news')->result_array();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_news', ['data' => $data]);
	}

	public function  delete_news()
	{
		//news delete karva mate
		$id = $this->input->post('id');
		$data = $this->db->select('image')->where('id', $id)->get('news')->row_array();
		if ($data) {
			unlink("uploads/news/" . $data['image']);
		}
		$this->db->delete('news', ['id' => $id]);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('news delete successfully');
	}

	//*------------------------------------------Jobs mate----------------------------------------------//


	public function add_job()
	{
		//job add karva mate
		$this->load->view('admin/add_job', ['data' => '']);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'job';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
	}

	public function store_job()
	{
		//job na data fetch karya

		$config = [
			'upload_path' => './uploads/job',
			'allowed_types' => 'jpg|gif|png|jpeg',

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		if ($id) {
			$image = $_FILES['image']['name'];
			if ($this->upload->do_upload('image')) {
				$delete_image = $this->db->select('image')->where('id', $id)->get('job')->row_array();
				if ($delete_image) {
					unlink("uploads/job/" . $delete_image['image']);
				}
				$data['image'] = $image;
				$this->upload->data();
			}
			$this->db->where('id', $id)->update('job', $data);
			$action_log['customer_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'job';
			$action_log['role'] = '1';
			$action_log['action_id'] = $id;
			$action_log['status_type'] = 'edit';
			$this->db->insert('action_log', $action_log);
			return redirect('admin/admin/list_job');
		} else {
			$image = $_FILES['image']['name'];

			if ($this->upload->do_upload('image')) {
				$this->upload->data();
				$data['image'] = $image;
			}
			$this->db->insert('job', $data);
			$id = $this->db->insert_id();
			$action_log['customer_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'job';
			$action_log['role'] = '1';
			$action_log['action_id'] = $id;
			$action_log['status_type'] = 'add';
			$this->db->insert('action_log', $action_log);
			return redirect('admin/admin/list_job');
		}
	}

	public function find_job($id)
	{
		//je job ne edit karva na che tene find karva mate
		$data = $this->db->get_where('job', ['id' => $id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'job';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/add_job', ['data' => $data]);
	}
	public function list_job()
	{
		//job nu list display karva mate
		$data = $this->db->get('job')->result_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'job';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_job', ['data' => $data]);
	}

	public function  delete_job()
	{
		//job delete karva mate
		$id = $this->input->post('id');
		$data = $this->db->select('image')->where('id', $id)->get('job')->row_array();
		if ($data) {
			unlink("uploads/job/" . $data['image']);
		}
		$this->db->delete('job', ['id' => $id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'job';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('Job delete successfully');
	}


	//*--------------------*******--------team members mate--------------------------------**************//


	public function add_team_members()
	{
		//team members add karava mate
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'team';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/add_team_members', ['data' => '']);
	}

	public function store_team_members()
	{
		//team member ne store karav mate
		$config = [
			'upload_path' => './uploads/team',
			'allowed_types' => 'jpg|gif|png|jpeg',
			'max_size'	=>	'300*300',

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		if ($this->form_validation->run('team_members')) {
			if ($id) {

				$image = $_FILES['image']['name'];
				if ($this->upload->do_upload('image')) {
					$delete_image = $this->db->select('image')->where('id', $id)->get('team_members')->row_array();
					if ($delete_image) {
						unlink("uploads/team/" . $delete_image['image']);
					}
					$data['image'] = $image;
					$this->upload->data();
				}
				$this->db->where('id', $id)->update('team_members', $data);
				$action_log['customer_id'] = $this->session->userdata('admin_id');
				$action_log['action_type'] = 'team';
				$action_log['role'] = '1';
				$action_log['action_id'] = $id;
				$action_log['status_type'] = 'edit';
				$this->db->insert('action_log', $action_log);
				return redirect('admin/admin/list_team_members');
			} else {
				$image = $_FILES['image']['name'];
				if ($this->upload->do_upload('image')) {
					$this->upload->data();
				}
				$data['image'] = $image;
				$this->db->insert('team_members', $data);
				$id = $this->db->insert_id();
				$action_log['customer_id'] = $this->session->userdata('admin_id');
				$action_log['action_type'] = 'team';
				$action_log['role'] = '1';
				$action_log['action_id'] = $id;
				$action_log['status_type'] = 'edit';
				$this->db->insert('action_log', $action_log);
				return redirect('admin/admin/list_team_members');
			}
		} else {
			if ($id) {
				$data = $this->db->get_where('team_members', ['id' => $id])->row_array();
				$this->load->view('admin/add_team_members', ['data' => $data]);
			} else {
				$this->load->view('admin/add_team_members', ['data' => '']);
			}
		}
	}

	public function list_team_members()
	{
		//team members nu list display karva mate
		$data = $this->db->get('team_members')->result_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'team';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'list';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_team_members', ['data' => $data]);
	}

	public function find_team_members($id)
	{
		//je member edit karva no che tene find krva mate
		$data = $this->db->get_where('team_members', ['id' => $id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'team';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/add_team_members', ['data' => $data]);
	}

	public function delete_team_members()
	{ //team na members ne delete krva mate
		$id = $this->input->post('id');
		$data = $this->db->select('image')->where('id', $id)->get('team_members')->row_array();
		if ($data) {
			unlink("uploads/team/" . $data['image']);
		}
		$this->db->delete('team_members', ['id' => $id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'team';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('Member delete successfully');
	}


	//*******--------------------------------clients mate------------------------------------************//


	public function add_clients()
	{
		//clients ne add karva mate
		$this->load->view('admin/add_clients', ['data' => '']);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'client';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
	}

	public function store_clients()
	{
		//clients ne store karva mate
		$config = [
			'upload_path' => './uploads/clients',
			'allowed_types' => 'jpg|png|jpeg|gif',
		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$data['user_id'] = $this->session->userdata('admin_id');
		$id = $data['id'];
		unset($data['id']);
		if ($id) {
			$image = $_FILES['image']['name'];
			if ($this->upload->do_upload('image')) {
				$delete_image = $this->db->select('image')->where('id', $id)->get('clients')->row_array();
				if ($delete_image) {
					unlink("uploads/clients/" . $delete_image['image']);
				}
				$data['image'] = $image;
				$this->upload->data();
			}
			$this->db->where('id', $id)->update('clients', $data);
			$action_log['customer_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'client';
			$action_log['role'] = '1';
			$action_log['action_id'] = $id;
			$action_log['status_type'] = 'edit';
			$this->db->insert('action_log', $action_log);
			return redirect('admin/admin/list_clients');
		} else {
			$image = $_FILES['image']['name'];
			if ($this->upload->do_upload('image')) {
				$this->upload->data();
				$data['image'] = $image;
			}
			$this->db->insert('clients', $data);
			$id = $this->db->insert_id();
			$action_log['customer_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'client';
			$action_log['role'] = '1';
			$action_log['action_id'] = $id;
			$action_log['status_type'] = 'add';
			$this->db->insert('action_log', $action_log);

			return redirect('admin/admin/list_clients');
		}
	}

	public function list_clients()
	{
		//clients nu list display karva mate
		$user_id = $this->session->userdata('admin_id');
		$role_id = $this->session->userdata('role_id');

		$data = $this->db->select('*')
			->get('clients')
			->result_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'client';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/list_clients', ['data' => $data]);
	}

	public function find_clients($id)
	{
		//je clients ne delete karva no che tene delete karva mate
		$data = $this->db->get_where('clients', ['id' => $id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'client';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$this->load->view('admin/add_clients', ['data' => $data]);
	}
	public function delete_clients()
	{
		//clients ne delete karva mate
		$id = $this->input->post('id');
		$data = $this->db->select('image')->where('id', $id)->get('clients')->row_array();
		if ($data) {
			unlink("uploads/clients/" . $data['image']);
		}
		$this->db->delete('clients', ['id' => $id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'client';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('Clients delete successfully');
	}

	//-*************---------------------------note mate------------------------------------***********//
	//

	public function add_note()
	{
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'note';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		$customer = $this->admin_mod->get_customer();
		$this->db->insert('action_log', $action_log);
		$this->load->model('admin/archive_mod');
		$get_per_case = $this->archive_mod->get_per_case();
		$this->load->view('admin/add_note', ['data' => '', 'customer' => $customer, 'get_per_case' => $get_per_case]);
	}

	public function find_note_user()
	{

		$id = $this->input->post('id');
		$data = $this->db->select('*')->where('id', $id)->get('users')->row_array();

		if ($data['role_id'] == 2) {
			$nof = $this->db->where(['user_id' => $id])->get('c_case')->num_rows();
		} else {
			$nof = $this->db->where(['customers_id' => $id])->get('c_case')->num_rows();
		}

		$data['nof'] = $nof;
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode();
		}
	}
	public function get_court_details()
	{

		$id = $this->input->post('id');
		$data = $this->db->select('*')->where('id', $id)->get('court_master')->row_array();
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode();
		}
	}
	// public function store_note()
	// {
	// 	$this->load->model('admin/archive_mod');
	// 	$customer = $this->admin_mod->get_customer();
	// 	$get_per_case = $this->archive_mod->get_per_case();
	// 	//notes ne store karva mate
	// 	$data = $this->input->post();
	// 	$id = $data['id'];
	// 	unset($data['id']);
	// 	$data['added_id'] = $this->session->userdata('admin_id');
	// 	if ($this->form_validation->run('add_note')) {
	// 		if ($id) {
	// 			$this->db->where('id', $id)->update('note', $data);
	// 			$action_log['customer_id'] = $this->session->userdata('admin_id');
	// 			$action_log['action_type'] = 'note';
	// 			$action_log['role'] = '1';
	// 			$action_log['action_id'] = $id;
	// 			$action_log['status_type'] = 'edit';
	// 			$this->db->insert('action_log', $action_log);
	// 		} else {
	// 			$this->db->insert('note', $data);
	// 			$id = $this->db->insert_id();
	// 			$action_log['customer_id'] = $this->session->userdata('admin_id');
	// 			$action_log['action_type'] = 'note';
	// 			$action_log['role'] = '1';
	// 			$action_log['action_id'] = $id;
	// 			$action_log['status_type'] = 'add';
	// 			$this->db->insert('action_log', $action_log);
	// 		}
	// 		return redirect('admin/admin/list_note');
	// 	} else {
	// 		$data = $this->db->get_where('note', ['id' => $id])->row_array();
	// 		$this->load->view('admin/add_note', ['data' => $data, 'customer' => $customer, 'get_per_case' => $get_per_case]);
	// 	}
	// }

	public function store_note() {
		$this->load->model('admin/archive_mod');
		$customer = $this->admin_mod->get_customer();
		$get_per_case = $this->archive_mod->get_per_case();
		$post = $this->input->post();
	
		if ($post) {
			$id = $post['id'];
			unset($post['id']);
			$post['added_id'] = $this->session->userdata('admin_id');
	
			if ($this->form_validation->run('add_note')) {
				if ($id) {
					$this->db->where('id', $id)->update('note', $post);
					$action_log = [
						'customer_id' => $this->session->userdata('admin_id'),
						'action_type' => 'note',
						'role' => '1',
						'action_id' => $id,
						'status_type' => 'edit'
					];
					$this->db->insert('action_log', $action_log);
				} else {
					$this->db->insert('note', $post);
					$id = $this->db->insert_id();
					$action_log = [
						'customer_id' => $this->session->userdata('admin_id'),
						'action_type' => 'note',
						'role' => '1',
						'action_id' => $id,
						'status_type' => 'add'
					];
					$this->db->insert('action_log', $action_log);
				}
	
				echo json_encode(['status' => 'success']);
				exit;
			} else {
				$errors = [];
				foreach ($post as $key => $value) {
					if (form_error($key)) {
						$errors[$key] = form_error($key);
					}
				}
				echo json_encode(['status' => 'error', 'errors' => $errors]);
				exit;
			}
		} else {
			$id = $this->input->get('id');  // fallback if no post
			$data = $this->db->get_where('note', ['id' => $id])->row_array();
			$this->load->view('admin/add_note', ['data' => $data, 'customer' => $customer, 'get_per_case' => $get_per_case]);
		}
	}
	

	public function find_note($id)
	{
		$data = $this->db->get_where('note', ['id' => $id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'note';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'edit_view';
		$this->db->insert('action_log', $action_log);
		$this->load->model('admin/archive_mod');
		$get_per_case = $this->archive_mod->get_per_case();
		$customer = $this->admin_mod->get_customer();
		$this->load->view('admin/add_note', ['data' => $data, 'customer' => $customer, 'get_per_case' => $get_per_case]);
	}

	public function list_note()
	{
		// Load the archive_mod model
		$this->load->model('admin/archive_mod');

		// Fetch notes for the logged-in admin
		$data = $this->db->select('*')
			->where('added_id', $this->session->userdata('admin_id'))
			->order_by("id", "desc")
			->get('note')
			->result_array();

		// Fetch additional case data
		$get_per_case = $this->archive_mod->get_per_case();

		// Log the action
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'note';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'list';
		
		$this->db->insert('action_log', $action_log);

		// Load the view and pass the additional data
		$this->load->view('admin/list_note', ['data' => $data, 'get_per_case' => $get_per_case]);
	}


	public function delete_note()
	{
		$id = $this->input->post('id');
		$this->db->delete('note', ['id' => $id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'note';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('note deleted successfully');
	}
	public function find_audio($id)
	{
		$data = $this->db->get_where('audio', ['id' => $id])->row_array();
		$customer = $this->admin_mod->get_customer();
		$this->load->view('admin/add_audio_record', ['data' => $data, 'customer' => $customer,]);
	}
	public function audio_list()
	{
		$data = $this->db->select('*')->where('add_by', $this->session->userdata('admin_id'))->order_by("id", "desc")->get('audio')->result_array();
		$this->load->view('admin/audio_list', ['data' => $data]);
	}
	

	public function add_audio_record() {
		$post = $this->input->post();
		$customer = $this->admin_mod->get_customer();
	
		if ($post) {
			$id = $this->input->post('id');
	
			// Run the form validation for audio record
			if ($this->form_validation->run('audio_record')) {
				if ($id) {
					$this->db->where('id', $id)->update('audio', $post);  // Update record
				} else {
					$post = $this->security->xss_clean($post);  // Clean input data
					$post['add_by'] = $this->session->userdata('admin_id');
					$this->db->insert('audio', $post);  // Insert new record
				}
	
				// Return success response
				echo json_encode(['status' => 'success']);
				exit;
			} else {
				// Return validation errors as JSON (strip HTML tags)
				$errors = [];
				foreach ($this->input->post() as $key => $value) {
					if (form_error($key)) {
						$errors[$key] = form_error($key);  // Strip HTML tags
					}
				}
				echo json_encode(['status' => 'error', 'errors' => $errors]);
				exit;
			}
		}
	}
	

	public function store_audio_record()
	{
		$post = $this->input->post();
		if ($this->form_validation->run('audio_record')) {
			$id = $this->input->post('id');
			if ($id) {
				$this->db->where('id', $id)->update('court_master', $post);
			} else {
				$this->db->insert('court_master', $post);
			}
			redirect('admin/admin/audio_list');
		} else {
			return $this->load->view('admin/add_audio_record', ['data' => '']);
		}
		redirect('admin/admin/court_master');
	}
	public function delete_audio()
	{
		$id = $this->input->post('id');
		$this->db->delete('audio', ['id' => $id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'audio';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'delete';
		$this->db->insert('action_log', $action_log);
		echo json_encode('Audio deleted successfully');
	}
	public function db_backup()
	{
		$this->load->dbutil();
		$db_format = array('format' => 'zip', 'filename' => 'my_db_backup.sql');
		$backup = &$this->dbutil->backup($db_format);
		$dbname = 'backup-on-' . date('Y-m-d h:i:s', time()) . '.zip';
		$save = 'assets/db_backup/' . $dbname;
		write_file($save, $backup);
		force_download($dbname, $backup);
		return redirect('admin/dashboard');
	}
}
