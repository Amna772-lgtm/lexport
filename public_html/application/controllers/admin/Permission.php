<?php 
class Permission extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->isAdmintLogged();
		$this->load->model('admin/admin_mod');
		$this->load->model('admin/employee_mod');
	}

public function permission_user()
{ 
$dep = $this->employee_mod->select_department();
$permission = $this->admin_mod->get_permission();
$this->load->view('admin/permission_user', ['permission'=>$permission,'dep'=>$dep]);
}

	public function user_store_permission()
	{
		if ($this->form_validation->run('user_create')) {
		
			$user['name'] = $_POST['name']; 
			$user['role_id'] = $_POST['role_id']; 
			$user['email'] = $_POST['email']; 
			$user['phone'] = $_POST['phone']; 
			$user['status'] = $_POST['user_type']; 
			$user['password'] = md5($_POST['password']);

			$this->db->insert('users',$user);		
			echo $user_id = $this->db->insert_id();  
$employee['user_id'] = $user_id;
$employee['employee_type'] =  $_POST['employee_type'];
$employee['department_id'] =  $_POST['department_id'];

$this->db->insert('employee',$employee);	
			foreach ($_POST['pm'] as $key => $value) {
				for($v=1; $v<=6;$v++)
				{
					$data[$v] = 0;	
				}
				for($i=0; $i< count($value);$i++)
				{
					$data[$value[$i]] = 1;
				}
				$datas[$key] = $data;
			}
		
			$row['user_id'] = $user_id;
			$row['data'] = json_encode($datas);
			$this->db->insert('permissions_settings',$row);
			redirect('admin/permission/add_permission');
		}
		else
		{
			$permission = $this->admin_mod->get_permission();
			$this->load->view('admin/permission_user', ['permission'=>$permission]);
		}	
	}
	public function add_permission()
	{

		$employee = $this->admin_mod->get_employee();
		$permission = $this->admin_mod->get_permission();

		$this->load->view('admin/permission', ['employees' => $employee,'permission'=>$permission]);
	}

	public function store_permission()
	{
		foreach ($_POST['pm'] as $key => $value) {
				
			for($v=1; $v<=7;$v++)
			{
				$data[$v] = 0;	
			}
			for($i=0; $i< count($value);$i++)
			{
				$data[$value[$i]] = 1;
			}

			$datas[$key] = $data;
		}
		
		$row['user_id'] = $_POST['user_id'];
		$row['data'] = json_encode($datas);
		
		$permission = $this->admin_mod->get_permission_model($_POST['user_id']);
		if(count($permission)>0)
		{
			$this->db->where('user_id',$_POST['user_id'])->update('permissions_settings',$row);
		}
		else
		{
			$this->db->insert('permissions_settings',$row);
		}
		redirect('admin/permission/add_permission');

	}
    public function get_permission()
	{	
		$permission = $this->admin_mod->get_permission_model($_POST['id']);
		if($permission->id)
		{
			$permission_model = $this->admin_mod->get_permission();
			$empty_date = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0);
			$fix_data = array();
			for ($i=1; $i < count($permission_model)+1; $i++) { 
				$fix_data[$i] = $empty_date;	
			}

			$data = (array)json_decode($permission->data,true);
			foreach ($data as $key => $value) {
				$fix_data[$key] = $value;			
			}			

			echo  json_encode($fix_data);exit;
		}
	}
}
?>