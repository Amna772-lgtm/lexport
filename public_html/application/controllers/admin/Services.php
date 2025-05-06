<?php
class services extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/services_mod');
	}

	public function services()//services display karva mate ane add karva mate
	{
		$services='';
		$data=$this->services_mod->services();
		$this->load->view('admin/services_view',['data'=>$data,'services'=>$services]);
	}

	public function add_services()//services add karva mate
	{
		$admin=$this->input->post();
		unset($admin['submit']);

		if($this->form_validation->run('add_services')) 
		{     
			if($admin['id'])
		{
		 $id=$admin['id']; unset($admin['id']);
		$this->services_mod->edit_services($id,$admin);    
		 }     
		 else    
		  {
				$this->services_mod->add_services($admin);
			}
			return redirect('admin/services/services');
		}
		else
		{
			if($admin['id'])
			{
				$data=$this->services_mod->services();
				$services=$this->services_mod->fetch_services($admin['id']);
				$this->load->view('admin/services_view',['data'=>$data,'services'=>$services]);
			}
			else
			{
				$services='';
			$data=$this->services_mod->services();
			$this->load->view('admin/services_view',['data'=>$data,'services'=>$services]);
			}
			
		}
	
	}

	public function delete_services()//services delete karva mate
	{
		$id=$this->input->post();
		$this->services_mod->delete_services($id);
		echo json_encode('delete services SuccessFully');
	}

	public function find_services($id)//je services update karva no 6e e find karva mate
	{
		$data=$this->services_mod->services();
		$services=$this->services_mod->fetch_services($id);
		$this->load->view('admin/services_view',['data'=>$data,'services'=>$services]);
	}

	

	


}
?>