<?php
error_reporting(0);
class administrator  extends MY_Controller {
	public function __construct() {
		parent::__construct();
	 
		$this->load->model('super_admin/administrator_mod');
 
	}
		public function add_admin() //new admin add karva mate
	{
		$this->load->view('super_admin/add_admin', ['data' => '']);
	}
	public function add_user() //new admin add karva mate
	{
		$admin = $this->input->post();
		if($admin){
		unset($admin['addadmin']);  
		unset($admin['cpassword']);
		if($admin['password']){
			$admin['password'] = md5($admin['password']);
		} else {
			unset($admin['password']);
		}
			if ($admin['id']) {
				if ($this->form_validation->run('edit_user')) {
					$id = $admin['id'];unset($admin['id']);
					$this->administrator_mod->edit_admin($id, $admin);
					redirect(base_url('super_admin/administrator/list_user'));
				} else {
					$data = $this->administrator_mod->find_admin($admin['id']);
					$this->load->view('super_admin/add_user', ['data' => $data]);
				}
			} else {
				if ($this->form_validation->run('add_user')) {
					$admin['role_id'] = '3';
					$admin['status'] = '3';
					$this->administrator_mod->store_admin($admin);
					redirect(base_url('super_admin/administrator/list_user'));
				}else {
					$this->load->view('super_admin/add_user', ['data' => '']);
				}
			}
		}  
		else {
			$this->load->view('super_admin/add_user', ['data' => '']);
		}
	}
	
	public function list_admin() //admin nu list displat karva mate
	{
		$list = $this->administrator_mod->list_admin();
		
		$this->load->view('super_admin/list_admin', ['list' => $list]);
	}
	 
	public function list_user() //admin nu list displat karva mate
	{
		$list = $this->administrator_mod->list_user();
		$this->load->view('super_admin/list_users', ['list' => $list]);
	}
	 
	public function change_password() {
	
		//password change thai tyare
		$post = $this->input->post();
 
		if ($this->form_validation->run('change_password_admin')) {
		$pass = $this->db->select(['email', 'password','role_id'])->where('id', $post['user_id'])->get('users')->row_array();
		$this->db->where('id', $post['user_id'])->update('users', ['password' => md5($post['new_password'])]);

		$config = Array(
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
		return redirect(base_url().'admin/admin/change_pass?status=success');
		} else {
		$employees = $this->administrator_mod->get_employee();
		$customer = $this->administrator_mod->get_customer();
		$this->load->view('super_admin/change_pass', ['employees' =>$employees,'customer'=>$customer]);
		} 
	}
	 
	public function store_admin() //new admin je info add kre e db ma add karva
	{
		$admin = $this->input->post();
		unset($admin['addadmin']);  
		unset($admin['cpassword']);
		$pm = $admin['pm'];
		unset($admin['pm']);
		if($admin['password']){
			$admin['password'] = md5($admin['password']);
		} else {
			unset($admin['password']);
		} 
		if ($this->form_validation->run('add_admin')) {
			if ($admin['id']) {
				$id = $admin['id'];unset($admin['id']);
              
				$this->administrator_mod->edit_admin($id, $admin);
				$row['data'] = json_encode($pm);
				$this->db->where('user_id',$id)->update('admin_permissions',$row);
				setMsg('success', 'Admin updated');
				redirect(base_url('super_admin/administrator/list_admin'));
			} else {
				$admin['role_id'] = '1';
				$admin['status'] = '1';
				
				$iid=$this->administrator_mod->store_admin($admin);
				
	 			$row['user_id'] = $iid;
			/* 	foreach ($pm as $key => $value) {
				for($v=1; $v<=1;$v++)
				{
					$data[$v] = 0;	
				}
				for($i=0; $i< count($value);$i++)
				{
					$data[$value[$i]] = 1;
				}
				$datas[$key] = $data;
				} */
				$row['data'] = json_encode($pm);
				$this->db->insert('admin_permissions',$row);
				setMsg('success', 'Admin added');
				redirect(base_url('super_admin/administrator/list_admin'));
			}
		} else {
			if ($admin['id']) {
				
			$data = $this->administrator_mod->find_admin($admin['id']);
			$admin_permissions=$this->db->select('data')->where('user_id',$id)->get('admin_permissions')->row();
		 
	        $this->load->view('super_admin/add_admin', ['data' => $data,'admin_permissions'=>$admin_permissions->data]);
			/* foreach ($pm as $key => $value) {
				for($v=1; $v<=1;$v++)
				{
					$data[$v] = 0;	
				}
				for($i=0; $i< count($value);$i++)
				{
					$data[$value[$i]] = 1;
				}
				$datas[$key] = $data;
				} */
				//print_r($pm); exit;
			//	$row['data'] = json_encode($pm);
				//$this->db->where('user_id',$admin['id'])->update('admin_permissions',$row);
				//redirect(base_url('super_admin/administrator/list_admin'));
				 
	             
			 
			} else {
				$this->load->view('super_admin/add_admin', ['data' => '']);
			}
		}
		
	}
	public function find_user($id)
	{
		$data = $this->administrator_mod->find_admin($id);
		$this->load->view('super_admin/add_user', ['data' => $data]);
	}
	public function find_admin($id)
	{
		$data = $this->administrator_mod->find_admin($id);
		$admin_permissions=$this->db->select('data')->where('user_id',$id)->get('admin_permissions')->row();
		 
		$this->load->view('super_admin/add_admin', ['data' => $data,'admin_permissions'=>$admin_permissions->data]);
	}
	public function delete_admin() //admin ne delete karva mate
	{
		$id = $this->input->post('id');
		$this->administrator_mod->delete_admin($id);

		echo json_encode('Delete Success');
	}
 

}
?>
