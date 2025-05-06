<?php 
class Hr extends CI_Controller{
	public function __construct(){

		parent::__construct();
        if (intval($this->session->userdata('admin_id'))<1) {
            redirect('admin/login', 'refresh');
            exit;
        }
	$this->load->model('admin/hr_mod');
	}
	
	public function delete_hr_fine()
	{

		$id=$this->input->post();

		$this->db->delete('hr_fine',$id);
		echo json_encode('Fine Delete SuccessFully');
	}

	public function delete_hr_service()
	{
		$id = $this->input->post();

		$this->db->delete('hr_eservice', $id);
		echo json_encode('Service Delete Successfully');
	}

	public function list_hr_fine(){
		$data = $this->hr_mod->list_hr_fine();
		$this->load->model('admin/admin_mod');
		$get_per_clients = $this->admin_mod->get_employee();
		$this->load->view('admin/list_hr_fine', ['data' => $data, 'get_per_clients' => $get_per_clients]);
	}
	public function list_hr_eservice(){
		$data = $this->hr_mod->list_hr();
		$this->load->view('admin/list_hr_eservice', ['data' => $data]);
	}
	public function add_hr_fine()
	{
		$this->load->model('admin/admin_mod');
		$get_per_clients = $this->admin_mod->get_employee();
		$this->load->view('admin/add_hr_fine', ['data' => '','get_per_clients' => $get_per_clients]);
	}
	public function find_hr_fine($id) 
	{
		$this->load->model('admin/admin_mod');
		$ser=$this->hr_mod->select_service();
		$get_per_clients = $this->admin_mod->get_employee();
		$data = $this->db->select('*')->where('id',$id)->order_by("id", "desc")->get('hr_fine')->row();
		$this->load->view('admin/add_hr_fine', ['data' => $data,'get_per_clients' => $get_per_clients]);
	}
	public function add_hr_eservice()
	{
		$this->load->view('admin/add_hr_eservice', ['data' => '']);
	}
	public function hr_service_status_change($id,$status){
		
		
		$data['status'] = $status;
		$notes_data = $this->db->select('*')->where('id',$id)->get('hr_eservice')->row();
		$notes['note']=$status;
		$notes['app_id']=$id;
		$notes['create_date']=date("Y-m-d G:i:s");
		$notes['user_id']=$notes_data->user_id;
		$notes['type']= "hre";
		$notes['role_id']=$this->session->userdata('role_id'); 
	   $notes = $this->security->xss_clean($notes);
		$this->db->insert('case_note',$notes); 
		
		$users=$this->db->select('*')->where('id',$notes['user_id'])->get('users')->row_array();
		$email = $users['email'];
		$phone = $users['phone'];
		$name = $users['name']; 
		$config = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		
		$this->load->library('email', $config);
		 
		$new = ['to_email' => $email,'notification_type' => 'hre', 'status_type' =>$notes['note'],'name' => $name];

		$from_email = constant("FROM_EMAIL");
		$to_email = $email;
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($from_email, constant("SENDER_NAME"));
		$this->email->to($to_email);
		$this->email->subject('Your HR service has been '.$notes['note']);
		$body = $this->load->view('admin/add-case-email.php', $new, true);
		$this->email->message($body);
		$this->email->send();
		
		$this->db->where('id', $id)->update('hr_eservice',$data);
		return redirect('admin/hr/list_hr_eservice');
		
	}
	public function store_hr_service()
	{
		$post = $this->input->post();
		$id = $post['id'];
		unset($post['id']);
		
		if ($this->form_validation->run('hr_eservice_add')) {
			if ($id) {
				$this->db->where('id', $id)->update('hr_eservice', $post);
			} else {
				$user_id = $this->session->userdata('admin_id');
				$post['status'] = "pending";
				$post['user_id'] = $user_id;
				$post = $this->security->xss_clean($post);
				$this->db->insert('hr_eservice', $post);
			}
			
			// If the validation passes and the data is saved, send a success response
			if ($this->input->is_ajax_request()) {
				echo json_encode(['status' => 'success']);
				exit;
			} else {
				return redirect('admin/hr/list_hr_eservice');
			}
		} else {
			// If the validation fails, send the errors back as a JSON response
			if ($this->input->is_ajax_request()) {
				$errors = [];
				foreach ($this->input->post() as $key => $value) {
					$errors[$key] = form_error($key);
				}
				echo json_encode(['status' => 'error', 'errors' => $errors]);
				exit;
			} else {
				// If it's not an AJAX request, show the page normally
				$data['errors'] = validation_errors();
				$data['form_data'] = $post;
				$this->load->view('admin/add_hr_eservice', $data);
			}
		}
	}
	public function store_hr_fine()
	{
		$post = $this->input->post();
		$id = $post['id'];
		unset($post['id']);
	
		if ($this->session->userdata('admin_site_lang') == "arabic") {
			$start_date = explode('-', $this->input->post('start_date'));
			unset($post['start_date']);
			$start_date = Hijri2Greg($start_date[1], $start_date[2], $start_date[0], true);
			$post['start_date'] = $start_date;
		}
	
		$this->load->model('admin/admin_mod');
		$get_per_clients = $this->admin_mod->get_employee();
	
		// Run validation rules
		if ($this->form_validation->run('add_hr_fine')) {
			if ($id) {
				$this->db->where('id', $id)->update('hr_fine', $post);
			} else {
				$post = $this->security->xss_clean($post);
				$this->db->insert('hr_fine', $post);
				$insert_id = $this->db->insert_id();
	
				// Save case note
				$notes = [
					'note' => $post['reason'],
					'app_id' => $insert_id,
					'user_id' => $post['user_id'],
					'type' => "fine",
					'create_date' => date("Y-m-d G:i:s"),
					'role_id' => $this->session->userdata('role_id')
				];
				$notes = $this->security->xss_clean($notes);
				$this->db->insert('case_note', $notes);
	
				// Send email notification
				$users = $this->db->select('*')->where('id', $notes['user_id'])->get('users')->row_array();
				if ($users) {
					$email = $users['email'];
					$name = $users['name'];
	
					$config = [
						'mailtype' => 'html',
						'charset' => 'utf-8',
						'priority' => '1',
					];
					$this->load->library('email', $config);
	
					$email_data = ['to_email' => $email, 'notification_type' => 'fine', 'status_type' => $notes['note'], 'name' => $name];
					$from_email = constant("FROM_EMAIL");
	
					$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
					$this->email->set_header('Content-type', 'text/html');
					$this->email->from($from_email, constant("SENDER_NAME"));
					$this->email->to($email);
					$this->email->subject('You have a new fine');
					$body = $this->load->view('admin/add-case-email.php', $email_data, true);
					$this->email->message($body);
					$this->email->send();
				}
			}
	
			// Return JSON response for AJAX
			echo json_encode(['status' => 'success']);
			exit;
		} else {
			// Return validation errors as JSON
			$errors = [];
			foreach ($this->input->post() as $key => $value) {
				if (form_error($key)) {
					$errors[$key] = form_error($key);
				}
			}
			echo json_encode(['status' => 'error', 'errors' => $errors]);
			exit;
		}
	}


	public function add_hr()
	{
		$ser=$this->hr_mod->select_service();
		$this->load->view('admin/add_hr', ['data' => '','service'=>$ser]);
	}
	
	public function list_hr(){
		$data = $this->hr_mod->list_hr();
		$this->load->view('admin/list_hr', ['data' => $data]);
	}

	public function find_hr_eservice($id) 
	{
		$data = $this->hr_mod->find_hr($id); 
		$this->load->view('admin/add_hr_eservice', ['data' => $data ]);
	}
	public function delete_hr() 
	{
		$id = $this->input->post('id');
		$this->hr_mod->delete_hr($id);
		echo json_encode('delete success');
	}
	public function view_hr($id)
	{	
		$data = $this->hr_mod->find_hr($id);
		$this->load->view('admin/view_hr', ['data' => $data]);
	}
	public function store_hr()
	{
		$config=[
			'upload_path' => './uploads/hr/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();

		$post['userid'] = $this->session->userdata('admin_id');
		$id=$post['id'];
		$post['upload_file']=$_FILES['upload_file']['name'];
		unset($post['id']);
		
		$ser=$this->hr_mod->select_service();
		
		if($this->form_validation->run('hr')) {
		    
			if($id) {
				$this->db->where('id',$id)->update('hr',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/hr/list_hr');
			} else {
				$post = $this->security->xss_clean($post);
				$this->db->insert('hr',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/hr/list_hr');
			}
		} else {
			if($id){
				$this->load->view('admin/add_hr',['data'=>'','service'=>$ser]);
			} else {
				$this->load->view('admin/add_hr',['data'=>'','service'=>$ser]);
			}
		}
	}
}
?>