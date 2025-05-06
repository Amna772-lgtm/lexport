<?php 
class Project extends CI_Controller{
	public function __construct(){
		parent::__construct();
        if (intval($this->session->userdata('admin_id'))<1) {
            redirect('admin/login', 'refresh');
            exit;
        }
		$this->load->model('admin/project_mod');
		$this->load->model('admin/case_mod');
	}

	public function add_project(){

		$employees=$this->case_mod->get_employee();
		$this->load->view('admin/add_project',['data'=>'','employees' => $employees,'note_data' => '']);
	}

	public function store_project(){
		 
 
		$post=$this->input->post();
		$post['user_id'] = $this->session->userdata('admin_id');

		$id=$post['id']; 
		unset($post['id']);
		if($this->form_validation->run('add_project')) {
			if($id) {
				$this->db->where('id',$id)->update('add_project',$post);
 
				return redirect('admin/project/list_project');
			} else {
				$this->db->insert('add_project',$post);
				$appid = $this->db->insert_id();
				$temp_app_id['temp_app_id']=$appid;
				$this->db->where('temp_app_id',$this->session->userdata('temp_app_id'))->update('document',$temp_app_id);
				$this->load->view('admin/list_projects',['data'=>'']);
				return redirect('admin/project/list_project');
			}
		} else {
			if($id){
				$this->load->view('admin/add_project',['data'=>'']);
			} else {
				$this->load->view('admin/add_project',['data'=>'']);
			}
		}	
	}
	public function list_project(){
		$data = $this->project_mod->lists_project();
 
		$this->load->view('admin/list_projects', ['data' => $data]);
	}	
	public function find_project($id)
	{
		$data = $this->project_mod->find_project($id);
		$employees=$this->case_mod->get_employee();
	    $note_data=$this->db->select('*')->where('app_id',$id)->where('type','project')->get('case_note')->result_array();
		$this->load->view('admin/add_project', ['data' => $data,'employees' => $employees,'note_data' => $note_data]);
	}

	public function view_project($id) 
	{
		$data = $this->project_mod->find_project($id);
		$this->load->view('admin/view_project', ['data' => $data, ]);
	}
		function print_pdf($id){

		
		$filename = time()."_order.pdf";

		$data = $this->project_mod->find_project($id);
		// $html =	$this->load->view('admin/view_reg_of_doc', ['data' => $data, ]);
		
		//load the view and saved it into $html variable
        $html=$this->load->view('admin/print_project', ['data' => $data], true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}



	public function list_convert_project(){
		$data = $this->project_mod->list_convert_project();
		$this->load->view('admin/list_convert_project', ['data' => $data]);
	}	
	public function find_convert_project($id)
	{
		$data = $this->project_mod->find_convert_project($id);
		$this->load->view('admin/add_convert_project', ['data' => $data, ]);
	}
	public function add_convert_project(){
		$this->load->view('admin/add_convert_project',['data'=>'']);
	}
	public function delete_convert_project() 
	{
		$id = $this->input->post('id');
		$this->project_mod->delete_convert_project($id);
		echo json_encode('Delete Success');
	}
	public function delete_project() 
	{
		$id = $this->input->post('id');
		$this->project_mod->delete_project($id);
		echo json_encode('Delete Success');
	}
	public function store_convert_project(){
		$config=[
			'upload_path' => './uploads/project/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];

		$this->load->library('upload',$config);
		$post=$this->input->post();
		$post['user_id'] = $this->session->userdata('admin_id');
		$id=$post['id'];
		$post['upload_file']=$_FILES['upload_file']['name'];
		unset($post['id']);
		if($this->form_validation->run('add_convert_project')) {
			if($id) {
				$this->db->where('id',$id)->update('add_convert_project',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
					return redirect('admin/project/list_convert_project');
			} else {
				$this->db->insert('add_convert_project',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
					return redirect('admin/project/list_convert_project');
			}
		} else {
			if($id){
				$this->load->view('admin/add_convert_project',['data'=>'']);
			} else {
				$this->load->view('admin/add_convert_project',['data'=>'']);
			}
		}	
	}
}
?>