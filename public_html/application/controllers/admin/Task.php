<?php
class Task extends CI_Controller {
	public function __construct(){
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/task_mod');
		$this->load->model('admin/case_mod');
	}

	public function add_task(){
		$this->load->view('admin/add_task',['data'=>'']);
	}
	public function list_task(){
		$data = $this->task_mod->list_task();
		$employees=$this->case_mod->get_employee();

		$this->load->view('admin/list_task', ['data' => $data,'employees'=>$employees]);
	}
	
	public function find_task($id) 
	{
		$ser=$this->task_mod->select_service();
		$data = $this->task_mod->find_task($id);
		$this->load->view('admin/add_task', ['data' => $data,'service'=>$ser ]);
	}
	public function delete_task() 
	{
		$id = $this->input->post('id');
		$this->task_mod->delete_task($id);
		echo json_encode('delete success');
	}
	public function view_task($id)
	{	
		$data = $this->task_mod->find_task($id);
		$this->load->view('admin/view_task', ['data' => $data]);
	}
	public function store_task(){
		$config=[
			'upload_path' => './uploads/task/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$post['user_id'] = $this->session->userdata('admin_id');

		$id=$post['id'];
		$post['upload_file']=$_FILES['upload_file']['name'];
		unset($post['id']);
		if($this->form_validation->run('add_task')) {
			if($id) {
				$this->db->where('id',$id)->update('add_task',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/task/list_task');
			} else {
				$this->db->insert('add_task',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/task/list_task');
			}
		} else {
			if($id){
				$this->load->view('admin/add_task',['data'=>'']);
			} else {
				$this->load->view('admin/add_task',['data'=>'']);
			}
		}	
	}

	public function add_convert_task(){
		$this->load->view('admin/add_convert_task',['data'=>'']);
	}
	public function list_convert_task(){
		$data = $this->task_mod->list_convert_task();
		$this->load->view('admin/list_convert_task', ['data' => $data]);
	}
	
	public function find_convert_task($id) 
	{
		$data = $this->task_mod->find_convert_task($id);
		$this->load->view('admin/add_convert_task', ['data' => $data ]);
	}
	public function delete_convert_task() 
	{
		$id = $this->input->post('id');
		$this->task_mod->delete_convert_task($id);
		echo json_encode('Delete Success');
	}
	public function view_convert_task($id)
	{	
		$data = $this->task_mod->find_convert_task($id);
		$this->load->view('admin/view_convert_task', ['data' => $data]);
	}
	public function store_convert_task(){
		$config=[
			'upload_path' => './uploads/task/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$post['user_id'] = $this->session->userdata('admin_id');
		
		$id=$post['id'];
		$post['upload_file']=$_FILES['upload_file']['name'];
		unset($post['id']);
		$i=1;
		if($this->form_validation->run('add_convert_task')) {
			if($id) {
				$this->db->where('id',$id)->update('add_convert_task',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/task/list_convert_task');
			} else {
				$this->db->insert('add_convert_task',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/task/list_convert_task');
			}
		} else {
			if($id){
				$this->load->view('admin/add_convert_task',['data'=>'']);
			} else {
				$this->load->view('admin/add_convert_task',['data'=>'']);
			}
		}	
	}
	public function assign_task()// assign_task karva mate
	{
		$id=$this->input->post('id');
		$empid=$this->input->post('empid');
		$user = [
					'user_id' => $empid,
				];
		$this->db->where('id',$id)->update('add_task',$user);
		echo json_encode('Assign task Successfully'); 
	}
} 
?>