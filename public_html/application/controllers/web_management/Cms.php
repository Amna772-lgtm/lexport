<?php
error_reporting(0);
class Cms extends MY_Controller {

public function __construct() {
	parent::__construct();
	$this->load->model('admin/admin_mod');
	$this->load->model('admin/login_mod');
	$this->load->library('Ajax_pagination');
	$this->perPage = 10;

}
public function login() //login karva mate
{
	$this->load->view('web_management/login');
}
	function evidence(){
    	 $result['result']=$this->db->select('*')->where('id',1)->get('evidence')->row(); 
        if($this->input->post()){
        	$this->db->where('id',1)->update('evidence',$this->input->post());
            return redirect('web_management/cms/evidence'); exit;
        }
       	$this->load->view('web_management/evidence',$result);
	}
public function login_check(){  
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$info = $this->login_mod->login_check_web($email, $password);
		$this->form_validation->set_rules('email', 'email', 'required|trim|callback_validation');  
		  if ($this->form_validation->run())   {
			
			$this->session->set_userdata('admin_id', $info['id']);
			$this->session->set_userdata('admin_email', $info['email']);
			$this->session->set_userdata('role_id', $info['role_id']);

			return redirect('web_management/cms');
		} else {
			$this->load->view('web_management/login');
		}
}
	public function logout()
	{

		session_destroy();
		return redirect('web_management/cms');
	}
public function validation()  
{
$email = $this->input->post('email');
$password = $this->input->post('password');

$info = $this->login_mod->login_check_web($email, $password); 
if (isset($info) && $info !='')
{
	return true;  
} else {
	$this->form_validation->set_message('validation', 'Incorrect username/password.');  
	return false;  
}  
}  


//*------------------------------------------news mate----------------------------------------------//

	public function index() {
		//news add karva mate
		$this->load->view('web_management/index',['data'=>'']);
	}

	public function add_news() {
		//news add karva mate
		$this->load->view('web_management/add_news',['data'=>'']);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		is_logged_in(); $this->db->insert('action_log', $action_log);
	}

	public function store_news() {
		//news na data fetch karya
		
		$config = [
			'upload_path' => './uploads/news',
			'allowed_types' => 'jpg|gif|png|jpeg',
			'file_name'=>rand(1000000,99999999),

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id=$data['id'];
		unset($data['id']);
		if($id)
		{	
			$image = $_FILES['image']['name'];
					if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('news')->row_array();
					if ($delete_image) {
							unlink("uploads/news/" . $delete_image['image']);
					}
						$pdata =	$this->upload->data();
						$data['image']=$pdata['file_name'];
				
					}
					
                    $this->db->where('id',$id)->update('news',$data);
                    $action_log['admin_id'] = $this->session->userdata('admin_id');
                    $action_log['action_type'] = 'news';
                    $action_log['action_id'] = $id;
                    $action_log['role'] = '1';
                    $action_log['status_type'] = 'edit';
                    is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/list_news');

		} else {
			$image = $_FILES['image']['name'];
		
			if ($this->upload->do_upload('image')) {
			$pdata =	$this->upload->data();
			$data['image']=$pdata['file_name'];
			}
	 
			$this->db->insert('news',$data);
			$id = $this->db->insert_id();

		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		return redirect ('web_management/cms/list_news');
		}

		
	}

	public function find_news($id){
		//je news ne edit karva na che tene find karva mate
		$data=$this->db->get_where('news',['id'=>$id])->row_array();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'edit_view';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/add_news',['data'=>$data]);
	}
	public function list_news(){
		//news nu list display karva mate
		$data=$this->db->get('news')->result_array();
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'list';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/list_news',['data'=>$data]);
	}
	public function list_pages(){
		//news nu list display karva mate
		$data=$this->db->get('pages')->result_array();
		$this->load->view('web_management/list_pages',['data'=>$data]);
	}

	public function  delete_news(){
		//news delete karva mate
		$id = $this->input->post('id');
		$data=$this->db->select('image')->where('id',$id)->get('news')->row_array();
		if ($data) {
			unlink("uploads/news/" . $data['image']);
		}
		$this->db->delete('news',['id'=>$id]);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'news';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'delete';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		echo json_encode('news delete successfully');
	}	
	public function  delete_evidence(){
		//news delete karva mate
		$id = $this->input->post('id'); 
	 
		$this->db->delete('evidence_list',['id'=>$id]);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'evidence';
		$action_log['action_id'] = $id;
		$action_log['role'] = '1';
		$action_log['status_type'] = 'delete';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		echo json_encode('news delete successfully');
	}

//*------------------------------------------Jobs mate----------------------------------------------//


	public function add_job() {
		//job add karva mate
		$this->load->view('web_management/add_job',['data'=>'']);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'job';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		is_logged_in(); $this->db->insert('action_log', $action_log);
	}public function add_pages() {
		//job add karva mate
		$this->load->view('web_management/add_pages',['data'=>'']);
	  
	}
	public function add_article() {
		//job add karva mate
		$this->load->view('web_management/add_article',['data'=>'']);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'article';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		is_logged_in(); $this->db->insert('action_log', $action_log);
	}
	public function add_evidence() {
		//job add karva mate
		$this->load->view('web_management/evidence_add',['data'=>'']);
		$action_log['admin_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'evidence';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add';
		is_logged_in(); $this->db->insert('action_log', $action_log);
	}
	public function add_training() {
		//job add karva mate
			$config = [
			'upload_path' => './uploads/training',
			'allowed_types' => 'jpg|gif|png|jpeg',

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id=$data['id'];
		unset($data['id']);
		if($data){
		if($id)
		{	
			$image = $_FILES['image']['name'];
					if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('training')->row_array();
					if ($delete_image) {
							unlink("uploads/training/" . $delete_image['image']);
					}
						$data['image']=$image;
						$this->upload->data();
					}
					$this->db->where('id',$id)->update('training',$data);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
  
					return redirect('web_management/cms/training');

		} else {
			$image = $_FILES['image']['name'];
			if ($this->upload->do_upload('image')) {
				$this->upload->data();
				$data['image']=$image;
			}
			$this->db->insert('training',$data);
            return redirect ('web_management/cms/training');
		}
		}
		$this->load->view('web_management/add_training',['data'=>'']);
 
	}
	public function store_job() {
		//job na data fetch karya
		
		$config = [
			'upload_path' => './uploads/job',
			'allowed_types' => 'jpg|gif|png|jpeg',
			'file_name'=>rand(1000000,99999999)

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id=$data['id'];
		unset($data['id']);
		if($id)
		{	
			$image = $_FILES['image']['name'];
					if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('job')->row_array();
					if ($delete_image) {
							unlink("uploads/job/" . $delete_image['image']);
					}
    				$pdata =	$this->upload->data();
    			    $data['image']=$pdata['file_name'];
					}
					$this->db->where('id',$id)->update('job',$data);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'job';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/list_job');

		} else {
			$image = $_FILES['image']['name'];
		
			if ($this->upload->do_upload('image')) {
            	$pdata =	$this->upload->data();
			    $data['image']=$pdata['file_name'];
			}
			$this->db->insert('job',$data);
				$id = $this->db->insert_id();
				$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'job';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'add';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		return redirect ('web_management/cms/list_job');
		}
	}
	public function store_pages() {
		//job na data fetch karya
		
		 
		$data = $this->input->post();
		$id=$data['id'];
		$des_ar = htmlspecialchars_decode($this->input->post('des_ar'));
		unset($data['id'],$data['des_ar']);
        $data['des_ar'] = $des_ar;

		if($id)
		{	 
			$this->db->where('id',$id)->update('pages',$data);
			$action_log['customer_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'pages';
			$action_log['role'] = '1';
			$action_log['action_id'] = $id;
			$action_log['status_type'] = 'edit';
			is_logged_in(); $this->db->insert('action_log', $action_log);
			return redirect('web_management/cms/list_pages');
		} else {
			$this->db->insert('pages',$data);
			$id = $this->db->insert_id();
			$action_log['customer_id'] = $this->session->userdata('admin_id');
			$action_log['action_type'] = 'pages';
			$action_log['role'] = '1';
			$action_log['action_id'] = $id;
			$action_log['status_type'] = 'add';
			is_logged_in(); $this->db->insert('action_log', $action_log);
			return redirect ('web_management/cms/list_pages');
		}
	}
	public function store_article() {
		//job na data fetch karya
		
		$config = [
			'upload_path' => './uploads/articles',
			'allowed_types' => 'jpg|gif|png|jpeg',
			'file_name'=>rand(10000000,99999999)

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id=$data['id'];
		unset($data['id']);
		if($id)
		{	
			$image = $_FILES['image']['name'];
					if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('articles')->row_array();
					if ($delete_image) {
							unlink("uploads/articles/" . $delete_image['image']);
					}
						$pdata =	$this->upload->data();
    			    $data['image']=$pdata['file_name'];
					}
					$this->db->where('id',$id)->update('articles',$data);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'articles';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/list_articles');

		} else {
			$image = $_FILES['image']['name'];
		
			if ($this->upload->do_upload('image')) {
			$pdata =	$this->upload->data();
    			    $data['image']=$pdata['file_name'];
			}
			$this->db->insert('articles',$data);
				$id = $this->db->insert_id();
				$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'articles';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'add';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		return redirect ('web_management/cms/list_articles');
		}
	}
	
	public function store_evidence() {
		//job na data fetch karya
		
		$config = [
			'upload_path' => './uploads/articles',
			'allowed_types' => 'jpg|gif|png|jpeg',

		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
		$id=$data['id'];
		unset($data['id']);
		if($id)
		{	
			$image = $_FILES['image']['name'];
					if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('evidence_list')->row_array();
					if ($delete_image) {
							unlink("uploads/evidence/" . $delete_image['image']);
					}
						$data['image']=$image;
						$this->upload->data();
					}
					$this->db->where('id',$id)->update('evidence_list',$data);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'evidence';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/evidence_list');

		} else {
			$image = $_FILES['image']['name'];
		
			if ($this->upload->do_upload('image')) {
				$this->upload->data();
				$data['image']=$image;
			}
			$this->db->insert('evidence_list',$data);
				$id = $this->db->insert_id();
				$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'evidence';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'add';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		return redirect ('web_management/cms/evidence_list');
		}
	}
	public function find_job($id){
		//je job ne edit karva na che tene find karva mate
		$data=$this->db->get_where('job',['id'=>$id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'job';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit_view';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/add_job',['data'=>$data]);
	}
	public function find_evidence($id){
		//je job ne edit karva na che tene find karva mate
		$data=$this->db->get_where('evidence_list',['id'=>$id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'evidence';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit_view';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/evidence_add',['data'=>$data]);
	}
	public function find_articles($id){
		//je job ne edit karva na che tene find karva mate
		$data=$this->db->get_where('articles',['id'=>$id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'articles';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit_view';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/add_article',['data'=>$data]);
	}
	public function find_pages($id){
		//je job ne edit karva na che tene find karva mate
		$data=$this->db->get_where('pages',['id'=>$id])->row_array();
	 
		$this->load->view('web_management/add_pages',['data'=>$data]);
	}
	
	public function view_job($id)
	{
		$data=$this->db->get_where('job',['id'=>$id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'job';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'view_job';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/view_job',['data'=>$data]);
	}
	public function find_training($id)
	{
		//je job ne edit karva na che tene find karva mate
		$data=$this->db->get_where('training',['id'=>$id])->row_array();
 
		$this->load->view('web_management/add_training',['data'=>$data]);
	}
	
	public function view_training($id)
	{
		$data=$this->db->get_where('training',['id'=>$id])->row_array();
 
		$this->load->view('web_management/view_training',['data'=>$data]);
	}
	public function list_job(){
		//job nu list display karva mate
		$data=$this->db->get('job')->result_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'job';
					$action_log['role'] = '1';
					$action_log['status_type'] = 'list';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/list_job',['data'=>$data]);
	}	
	public function list_articles(){
		//job nu list display karva mate
		$data=$this->db->get('articles')->result_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'articles';
					$action_log['role'] = '1';
					$action_log['status_type'] = 'list';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/list_article',['data'=>$data]);
	}	
		public function evidence_list(){
		//job nu list display karva mate
		$data=$this->db->get('evidence_list')->result_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'evidence_list';
					$action_log['role'] = '1';
					$action_log['status_type'] = 'list';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/evidence_list',['data'=>$data]);
	}
	public function training(){
		//job nu list display karva mate
		$data=$this->db->get('training')->result_array();
		 
		$this->load->view('web_management/training',['data'=>$data]);
	}

	public function  delete_job(){
		//job delete karva mate
		$id = $this->input->post('id');
		$data=$this->db->select('image')->where('id',$id)->get('job')->row_array();
		if ($data) {
			unlink("uploads/job/" . $data['image']);
		}
		$this->db->delete('job',['id'=>$id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'job';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		echo json_encode('Job delete successfully');
	}

	public function  delete_articles(){
		//job delete karva mate
		$id = $this->input->post('id');
		$data=$this->db->select('image')->where('id',$id)->get('articles')->row_array();
		if ($data) {
			unlink("uploads/articles/" . $data['image']);
		}
		$this->db->delete('articles',['id'=>$id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'articles';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		echo json_encode('Article delete successfully');
	}

	public function  delete_training(){
		//job delete karva mate
		$id = $this->input->post('id');
		$data=$this->db->select('image')->where('id',$id)->get('training')->row_array();
		if ($data) {
			unlink("uploads/training/" . $data['image']);
		}
		$this->db->delete('training',['id'=>$id]);
 
		echo json_encode('training delete successfully');
	}

//*--------------------*******--------team members mate--------------------------------**************//

	public function add_team_members(){
		//team members add karava mate
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'team';
		$action_log['role'] = '1';
		$action_log['status_type'] = 'add_view';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/add_team_members',['data'=>'']);
	}

	public function store_team_members(){
	 
		$config = [
			'upload_path' => './uploads/team',
			'allowed_types' => 'jpg|gif|png|jpeg',
			'file_name' =>rand(1000000,99999999),
		];
		$this->load->library('upload', $config);
		$data = $this->input->post();
	 
		$id=$data['id'];
		unset($data['id']);
		if($this->form_validation->run('team_members'))
		{	
				if($id){
				 
					$image = $_FILES['image']['name'];
					if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('team_members')->row_array();
					if ($delete_image) {
							unlink("uploads/team/" . $delete_image['image']);
					}
					
					$imf =	$this->upload->data();
							$data['image']=$imf['file_name'];
					}
					$this->db->where('id',$id)->update('team_members',$data);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'team';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/list_team_members');
				} else {
					$image = $_FILES['image']['name'];
					
					if ($this->upload->do_upload('image')) {
					    $this->upload->data(); 
					    $imf =	$this->upload->data();
                        $data['image']=$imf['file_name'];
					}
                    
 
					$this->db->insert('team_members',$data);
					$id = $this->db->insert_id();
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'team';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/list_team_members');
				}
		}
		else
		{
			if($id){
				$data=$this->db->get_where('team_members',['id'=>$id])->row_array();
				$this->load->view('web_management/add_team_members',['data'=>$data]);
			} else {
				$this->load->view('web_management/add_team_members',['data'=>'']);
			}
		}
	}

	public function list_team_members(){
		//team members nu list display karva mate
		$data=$this->db->get('team_members')->result_array();
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'team';
					$action_log['role'] = '1';
					$action_log['status_type'] = 'list';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/list_team_members',['data'=>$data]);
	}

	public function find_team_members($id){
		//je member edit karva no che tene find krva mate
		            $data=$this->db->get_where('team_members',['id'=>$id])->row_array();
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'team';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit_view';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/add_team_members',['data'=>$data]);
	}

	public function delete_team_members()
	{ //team na members ne delete krva mate
		$id = $this->input->post('id');
		$data=$this->db->select('image')->where('id',$id)->get('team_members')->row_array();
		if ($data) {
			unlink("uploads/team/" . $data['image']);
		}
		$this->db->delete('team_members',['id'=>$id]);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'team';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'delete';
					is_logged_in(); $this->db->insert('action_log', $action_log);
		echo json_encode('Member delete successfully');
	}


//*******--------------------------------clients mate------------------------------------************//


	public function add_clients(){
		//clients ne add karva mate
		$this->load->view('web_management/add_clients',['data'=>'']);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'client';
					$action_log['role'] = '1';
					$action_log['status_type'] = 'add_view';
					is_logged_in(); $this->db->insert('action_log', $action_log);
	}

	public function store_clients(){
		//clients ne store karva mate
		$config=[
			'upload_path' => './uploads/clients',
			'allowed_types' => 'jpg|png|jpeg|gif',
			'file_name'=>rand(1000000,99999999)
		];
		$this->load->library('upload', $config);
		$data=$this->input->post();
		$data['user_id'] = $this->session->userdata('admin_id');
        $id=$data['id'];
		unset($data['id']);
		if($id)
		{
				 $image = $_FILES['image']['name'];
				if ($this->upload->do_upload('image')) {
						$delete_image=$this->db->select('image')->where('id',$id)->get('clients')->row_array();
					if ($delete_image) {
							unlink("uploads/clients/" . $delete_image['image']);
					}
					$pdata =	$this->upload->data();
    			    $data['image']=$pdata['file_name'];
					}
					$this->db->where('id',$id)->update('clients',$data);
					$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'client';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'edit';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					return redirect('web_management/cms/list_clients');	


		}else
		{
			$image=$_FILES['image']['name'];
			if($this->upload->do_upload('image')){
			$pdata =	$this->upload->data();
		    $data['image']=$pdata['file_name'];
			}
			$this->db->insert('clients',$data);
			$id = $this->db->insert_id();
			$action_log['customer_id'] = $this->session->userdata('admin_id');
					$action_log['action_type'] = 'client';
					$action_log['role'] = '1';
					$action_log['action_id'] = $id;
					$action_log['status_type'] = 'add';
					is_logged_in(); $this->db->insert('action_log', $action_log);
					
			return redirect('web_management/cms/list_clients');
		}
		
	}

	public function list_clients(){
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
		is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/list_clients',['data'=>$data]);
	}

	public function find_clients($id){
		//je clients ne delete karva no che tene delete karva mate
		$data=$this->db->get_where('clients',['id'=>$id])->row_array();
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'client';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'edit_view';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		$this->load->view('web_management/add_clients',['data'=>$data]);
		
	}
	public function delete_clients(){
		//clients ne delete karva mate
		$id = $this->input->post('id');
		$data=$this->db->select('image')->where('id',$id)->get('clients')->row_array();
		if ($data) {
			unlink("uploads/clients/" . $data['image']);
		}
		$this->db->delete('clients',['id'=>$id]);
		$action_log['customer_id'] = $this->session->userdata('admin_id');
		$action_log['action_type'] = 'client';
		$action_log['role'] = '1';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'delete';
		is_logged_in(); $this->db->insert('action_log', $action_log);
		echo json_encode('Clients delete successfully');
	}
	
		public function contact_inquery() {
		//contact inquery na data display karva mate
		$data = $this->db->get('contact_us')->result_array();
		$this->load->view('web_management/contact_inquery', ['data' => $data]);
	}

	public function subscriber_list() {
		//all appoinment display karva mate
		$data = $this->db->get('newsletter')->result_array();
		$this->load->view('web_management/subscriber_list', ['data' => $data]);
	}
}
?>
