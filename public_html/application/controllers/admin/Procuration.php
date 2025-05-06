<?php
class Procuration extends CI_Controller{
	public function __construct(){
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/procuration_mod');
	}

	public function add_procuration(){
		$this->load->view('admin/add_procuration',['data'=>'']);
	}

	public function store_procuration(){
		$config=[
			'upload_path' => './uploads/procuration/',
			'allowed_types' => 'jpg|fig|doc|docx|jpeg|pdf',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$id=$post['id'];

		$post['upload_file']=$_FILES['upload_file']['name'];
		$post['user_id'] = $this->session->userdata('admin_id');
	
		if($this->form_validation->run('add_procuration')) {
			if(isset($post['newprocuration'])){ 
				unset($post['newprocuration']);
				unset($post['id']);
				$this->db->insert('procuration',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			}	
			else if($id){
				$this->db->where('id',$id)->update('procuration',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			} else {
				$this->db->insert('procuration',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
					// return redirect('admin/procuration/add_procuration');
			}

			return redirect('admin/procuration/list_procuration');
		
		} else {
			if($id){
				$this->load->view('admin/add_procuration',['data'=>'']);
			} else {
				$this->load->view('admin/add_procuration',['data'=>'']);
			}
		}
	}


	public function list_procuration(){
		$data = $this->procuration_mod->list_procuration();
		$this->load->view('admin/list_procuration', ['data' => $data]);
	}

	public function find_procuration($id) 
	{
		$data = $this->procuration_mod->find_procuration($id);
		$this->load->view('admin/add_procuration', ['data' => $data, ]);
	}

	public function delete_procuration() 
	{
		$id = $this->input->post('id');
		$this->procuration_mod->delete_procuration($id);
		echo json_encode('delete success');
	}

	public function view_procuration($id) 
	{
		$data = $this->procuration_mod->find_procuration($id);
		$this->load->view('admin/view_procuration', ['data' => $data, ]);
	}
	
	function print_pdf($id){

		$filename = time()."_order.pdf";
		$data = $this->procuration_mod->find_procuration($id);
		$pdfFilePath = "output_pdf_name.pdf";
 		$this->load->library('m_pdf');
        $stylesheet = file_get_contents('assets/scss/style.scss');
        $html=$this->load->view('admin/print_procuration.php', ['data' => $data], true);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
		$this->m_pdf->pdf->WriteHTML($html);
 		//download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}

} 
?>