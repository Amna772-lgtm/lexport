<?php 
class Reg_of_doc extends CI_Controller{
	public function __construct(){
		parent::__construct();
	$this->isAdmintLogged();
		$this->load->model('admin/reg_of_doc_mod');

	}

	public function add_reg_of_doc()
	{
		$this->load->view('admin/add_reg_of_doc',['data'=>'']);
	}
	public function store_reg_of_doc()
	{
		$config=[
			'upload_path' => './uploads/reg_of_doc/',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		$this->load->library('upload',$config);
		$post=$this->input->post();
		$id=$post['id'];
		$post['upload_file']=$_FILES['upload_file']['name'];
		$post['user_id'] = $this->session->userdata('admin_id');

		unset($post['id']);
		
		if($this->form_validation->run('add_reg_of_doc')) {
			if(isset($post['newdoc'])){ 
				unset($post['newdoc']);
				unset($post['id']);
				$this->db->insert('reg_of_doc',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			}	
			else if($id) {
				$this->db->where('id',$id)->update('reg_of_doc',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			} else {
				$this->db->insert('reg_of_doc',$post);
				if($this->upload->do_upload('upload_file')){$this->upload->data();}
			}
			return redirect('admin/reg_of_doc/list_reg_of_doc');
		} else {
			if($id){
				$this->load->view('admin/add_reg_of_doc',['data'=>'']);
			} else {
				$this->load->view('admin/add_reg_of_doc',['data'=>'']);
			}
		}	
	}

	public function delete_reg_of_doc() 
	{
		$id = $this->input->post('id');
		$this->reg_of_doc_mod->delete_reg_of_doc($id);
		echo json_encode('delete success');
	}

	public function view_reg_of_doc($id) 
	{
		$data = $this->reg_of_doc_mod->find_reg_of_doc($id);
		$this->load->view('admin/view_reg_of_doc', ['data' => $data, ]);
	}

	public function find_reg_of_doc($id)
	{
		$data = $this->reg_of_doc_mod->find_reg_of_doc($id);
		$this->load->view('admin/add_reg_of_doc', ['data' => $data, ]);
	}


	public function list_reg_of_doc(){
		$data = $this->reg_of_doc_mod->list_reg_of_doc();
		$this->load->view('admin/list_reg_of_doc', ['data' => $data]);
	}

	function print_pdf($id){

		
		$filename = time()."_order.pdf";

		$data = $this->reg_of_doc_mod->find_reg_of_doc($id);
		
        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 		$stylesheet = file_get_contents('assets/scss/style.scss'); 
       	// print_r($stylesheet);exit;
 		$html=$this->load->view('admin/print_reg_of_doc.php', ['data' => $data], true);
 		//generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
 

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}


}
?>