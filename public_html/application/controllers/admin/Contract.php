<?php 
class Contract extends CI_Controller{
	public function __construct(){
		parent::__construct();
	$this->isAdmintLogged();
	$this->isAdmintLogged();
	$this->load->model('admin/contract_mod');
	}

	public function add_contract()
	{
		$ser=$this->contract_mod->select_service();
		$this->load->view('admin/add_contract', ['data' => '','service'=>$ser]);
	}
	
	public function list_contract(){
		$data = $this->contract_mod->list_contract();
		$this->load->view('admin/list_contract', ['data' => $data]);
	}
	public function find_contract($id) 
	{
		$ser=$this->contract_mod->select_service();
		$data = $this->contract_mod->find_contract($id);
		$this->load->view('admin/add_contract', ['data' => $data,'service'=>$ser ]);
	}
	public function delete_contract() 
	{
		$id = $this->input->post('id');
		$this->contract_mod->delete_contract($id);
		echo json_encode('delete success');
	}
	public function view_contract($id)
	{	
		$data = $this->contract_mod->find_contract($id);
		$this->load->view('admin/view_contract', ['data' => $data]);
	}
	public function store_contract()
	{
		$config=[
			'upload_path' => './uploads/contract/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$id=$post['id'];
		$post['contract_file']=$_FILES['contract_file']['name'];
		unset($post['id']);
		$ser=$this->contract_mod->select_service();
		if($this->form_validation->run('contract')) {
			if($id) {
				$this->db->where('id',$id)->update('contract',$post);
				if($this->upload->do_upload('contract_file')){$this->upload->data();}
				return redirect('admin/contract/list_contract');
			} else {
			    $post = $this->security->xss_clean($post);
				$this->db->insert('contract',$post);
				if($this->upload->do_upload('contract_file')){$this->upload->data();}
				return redirect('admin/contract/list_contract');
			}
		} else {
			if($id){
				$this->load->view('admin/add_contract',['data'=>'','service'=>$ser]);
			} else {
				$this->load->view('admin/add_contract',['data'=>'','service'=>$ser]);
			}
		}	
	}
}
?>