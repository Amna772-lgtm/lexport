<?php 
class Archive extends CI_Controller{
	public function __construct(){
		parent::__construct();
        if (intval($this->session->userdata('admin_id'))<1) {
            // $this->session->set_userdata('redirect_url', currentURL());
            redirect('admin/login', 'refresh');
            exit;
        }
		$this->load->model('admin/archive_mod');
	}

	public function add_archive()
	{
		$get_per_case = $this->archive_mod->get_per_case();
		$ser=$this->archive_mod->select_service();
		$get_per_clients=$this->archive_mod->get_per_clients();
		$get_per_procuration=$this->archive_mod->get_per_procuration();
		$get_per_contract=$this->archive_mod->get_per_contract();
		$get_per_project=$this->archive_mod->get_per_project();
		$get_per_tasks=$this->archive_mod->get_per_tasks();
		
		if($this->session->userdata('role_id') == 1){ $action_log['admin_id'] = $this->session->userdata('admin_id'); } else { $action_log['user_id'] = $this->session->userdata('admin_id'); }
		if($this->session->userdata('role_id') == 1){ $action_log['role'] = '1'; } else { $action_log['role'] = '2'; }
		$action_log['action_type'] = 'archive';
		$action_log['status_type'] = 'add_view';
		$this->db->insert('action_log', $action_log);
		
		$this->load->view('admin/add_archive', ['data' => '','service'=>$ser,'get_per_case'=>$get_per_case,'get_per_clients'=>$get_per_clients,'get_per_procuration'=>$get_per_procuration,'get_per_contract'=>$get_per_contract,'get_per_project'=>$get_per_project,'get_per_tasks'=>$get_per_tasks]);
	}
	
	public function list_archive(){
		$data = $this->archive_mod->list_archive();
		$get_per_clients=$this->archive_mod->get_per_clients();
		$get_per_case = $this->archive_mod->get_per_case();
		$this->load->view('admin/list_archive', ['data' => $data,'get_per_case' => $get_per_case,'get_per_clients' => $get_per_clients]);
	}
	public function select_case(){
		$id=$this->input->post('id');
		$qury=$this->db->select(['id','case_number','doc_id'])
		->where('customers_id',$id)
		->get('c_case')->result_array();
		echo "<option value=''>Select Case</option>"; foreach($qury as $q){ echo "<option value='".$q['doc_id']."'>".$q['case_number']."</option>"; }

		
	}
	
	public function select_case_id(){
		$id=$this->input->post('id');
		$qury=$this->db->select(['id','case_number','doc_id'])
		->where('customers_id',$id)
		->get('c_case')->result_array();
		echo "<option value=''>Select Case</option>"; foreach($qury as $q){ echo "<option value='".$q['id']."'>".$q['case_number']."</option>"; }

		
	}
	public function find_archive($id) 
	{
		$data = $this->archive_mod->find_archive($id);
		$get_per_case = $this->archive_mod->get_per_case();
		$ser=$this->archive_mod->select_service();
		$get_per_clients=$this->archive_mod->get_per_clients();
		$get_per_procuration=$this->archive_mod->get_per_procuration();
		$get_per_contract=$this->archive_mod->get_per_contract();
		$get_per_project=$this->archive_mod->get_per_project();
		$get_per_tasks=$this->archive_mod->get_per_tasks();
		
		$this->load->view('admin/add_archive', ['data' => $data,'service'=>$ser,'get_per_case'=>$get_per_case,'get_per_clients'=>$get_per_clients,'get_per_procuration'=>$get_per_procuration,'get_per_contract'=>$get_per_contract,'get_per_project'=>$get_per_project,'get_per_tasks'=>$get_per_tasks]);  
	}
	public function delete_archive() 
	{
		$id = $this->input->post('id');
		$this->archive_mod->delete_archive($id);
		echo json_encode('delete success');
	}
	public function view_archive($id)
	{	
		$data = $this->archive_mod->find_archive($id);
		$this->load->view('admin/view_archive', ['data' => $data]);
	}
	public function store_archive()
	{

		$get_per_case = $this->archive_mod->get_per_case();
		$ser=$this->archive_mod->select_service();
		$get_per_clients=$this->archive_mod->get_per_clients();
		$get_per_procuration=$this->archive_mod->get_per_procuration();
		$get_per_contract=$this->archive_mod->get_per_contract();
		$get_per_project=$this->archive_mod->get_per_project();
		$get_per_tasks=$this->archive_mod->get_per_tasks();
		$config=[
			'upload_path' => './uploads/contract/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$id=$post['id'];
		$post['upload_file'] = $_FILES['upload_file']['name'];
		$post['user_id'] = $this->session->userdata('admin_id');

		unset($post['id']);
		$ser=$this->archive_mod->select_service();
		if($this->form_validation->run('archive')) { 
			if($id) { 
				$this->db->where('id',$id)->update('archives',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/archive/list_archive');
			} else { 	
				$this->db->insert('archives',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
				return redirect('admin/archive/list_archive');
			}
		} else {
			if($id){
						$this->load->view('admin/add_archive', ['data' => '','service'=>$ser,'get_per_case'=>$get_per_case,'get_per_clients'=>$get_per_clients,'get_per_procuration'=>$get_per_procuration,'get_per_contract'=>$get_per_contract,'get_per_project'=>$get_per_project,'get_per_tasks'=>$get_per_tasks]);  
			} else {
					$this->load->view('admin/add_archive', ['data' => '','service'=>$ser,'get_per_case'=>$get_per_case,'get_per_clients'=>$get_per_clients,'get_per_procuration'=>$get_per_procuration,'get_per_contract'=>$get_per_contract,'get_per_project'=>$get_per_project,'get_per_tasks'=>$get_per_tasks]);  
			}
		}	
	}
}
?>