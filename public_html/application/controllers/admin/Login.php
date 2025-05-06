<?php
class login extends CI_Controller {
public function __construct() {
	parent::__construct();
	$this->load->model('admin/login_mod');
	$this->load->model('admin/admin_mod');
    $this->load->helper('captcha');
}
public function index() //login karva mate
{
$config = array(
    'img_path'      => 'uploads/',
    'img_url'       => base_url().'uploads/',
    'font_path'     =>  base_url().'system/fonts/texb.ttf',
    'img_width'     => '160',
    'img_height'    => 50,
    'word'   =>rand(1000,9999),
    'word_length'   => 4,
    'font_size'     => 20
);
$captcha = create_captcha($config);

// Unset previous captcha and set new captcha word
$this->session->unset_userdata('captchaCode');
$this->session->set_userdata('captchaCode', $captcha['word']);

// Pass captcha image to view
$data['captchaImg'] = $captcha['image'];
	$this->load->view('admin/login', $data);
}
public function refresh(){
// Captcha configuration

$config = array(
    'img_path'      => 'uploads/',
    'img_url'       => base_url().'uploads/',
    'font_path'     =>  base_url().'system/fonts/texb.ttf',
    'img_width'     => '160',
    'img_height'    => 50,'word'   =>rand(1000,9999),
    'word_length'   => 4,
    'font_size'     => 20
);
$captcha = create_captcha($config);

// Unset previous captcha and set new captcha word
$this->session->unset_userdata('captchaCode');
$this->session->set_userdata('captchaCode',$captcha['word']);

// Display captcha image
echo $captcha['image'];
}
public function forgotpassword() //forgot password mate
{
	$this->load->view('admin/forgotpassword');

}

public function check_forgotpassword() //password forgot karyo
{

	if ($this->form_validation->run('forgotpassword')) {

		$email = $this->input->post('email');
		$pass = random_string('alnum', 6);
		$data = $this->login_mod->check_forgotpassword($email, $pass);
		if ($data) {

			$config = Array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->load->library('email', $config);

			$new = ['role_id' => 1, 'sub' => 'forgot', 'to_email' => $email, 'password' => $pass];
			$from_email = constant("FROM_EMAIL");
			$to_email = $email;
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject('Your forgot password');
			$body = $this->load->view('admin/email.php', $new, true);
			$this->email->message($body);

			$this->email->send();
			return redirect('admin/login');
		}
	} else {
		$this->load->view('admin/forgotpassword');
	}
}

public function login_check() //login check krva mate
{
	
		   
$config = array(
    'img_path'      => 'uploads/',
    'img_url'       => base_url().'uploads/',
     'font_path'     =>  base_url().'system/fonts/texb.ttf',
    'img_width'     => '160',
    'img_height'    => 50,'word'   =>rand(1000,9999),
    'word_length'   => 4,
    'font_size'     => 20
);
$captcha = create_captcha($config);

		$aa = $captcha['word'];
		$data['captchaImg'] = $captcha['image'];
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$captcha = $this->input->post('captcha'); 
		$info = $this->login_mod->login_check($email, $password);
		$this->form_validation->set_rules('captcha', 'captcha:', 'required|trim|callback_captchvalidation');  
		$this->form_validation->set_rules('email', 'email', 'required|trim|callback_validation');  
		  if ($this->form_validation->run())   {
		//if ($this->session->userdata('captchaCode') == $captcha) {
			$this->session->set_userdata('admin_id', $info['id']);
			$this->session->set_userdata('admin_email', $info['email']);
			$this->session->set_userdata('role_id', $info['role_id']);

			 $ip = $_SERVER['REMOTE_ADDR'];
			 $this->db->insert('activity',['user_id'=>$this->session->userdata('admin_id'),'ip_address'=>$ip]);
			 $activity_id=$this->db->insert_id();
			 $this->session->set_userdata('activity_id',$activity_id);
			$sessionid['session_id'] = rand(100000,9999999);
			$tm['last_login_time'] = date("Y-m-d G:i:s");
			$tm['ip'] = $_SERVER['REMOTE_ADDR'];
			$this->db->where('id',$this->session->userdata('admin_id'))->update('users',$tm );
			$this->session->set_userdata('session_id', $sessionid['session_id']);
			$this->db->where('id', $this->session->userdata('admin_id'))->update('users',$sessionid );
			$permission = $this->admin_mod->get_permission_model($this->session->userdata('admin_id'));
		//	if(sizeof($permission)> 0 ){
				//$this->session->set_userdata('permission',$permission->data);
		//	} 
		//	}
			return redirect('admin/dashboard');
		} else { 
			$this->session->unset_userdata('captchaCode');
			$this->session->set_userdata('captchaCode', $aa); 
			  $this->session->userdata('captchaCode');
			$this->load->view('admin/login',$data);
		}

}
public function captchvalidation()  
{
	$captcha = $this->input->post('captcha');
 	if( $this->session->userdata('captchaCode') == $captcha){
    return true;  
   
    }else {
    //$this->form_validation->set_message('captchvalidation', 'Incorrect captcha Code.');  
    return true;  
} 
}  
public function validation()  
{
$email = $this->input->post('email');
$password = $this->input->post('password');

$info = $this->login_mod->login_check($email, $password); 
if ($info=='')
{
     $this->form_validation->set_message('validation', 'Incorrect email/password');  
    return false; 
} 		
else if (isset($info) && $info['status'] == 0) { 
     $this->form_validation->set_message('validation', 'You are block by admin by some reason');  
    return false;  
}else{
   
    return true;  
}  
}  
public function change_password() //password changge karva mate
{
	$this->load->view('admin/change_password');
}

public function change_passsword_check() //password chnage thai tyare
{
	if ($this->form_validation->run('change_password')) {
		$post = $this->input->post();
	//	$post['email'] = $this->session->userdata('admin_email');
	//	echo  $this->session->userdata('admin_email'); exit;

		$success = $this->login_mod->change_password($post);

		if ($success) {

			$config = Array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->load->library('email', $config);

			$new = ['role_id' => 1, 'sub' => 'change', 'to_email' => $post['email'], 'password' => $post['new_password']];
			$from_email = constant("FROM_EMAIL");
			$to_email = $post['email'];
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			$this->email->subject('Your forgot password');
			$body = $this->load->view('admin/email.php', $new, true);

			$this->email->message($body);

			$this->email->send();
		
			return redirect('admin/logout');
		} else {
			$this->load->view('admin/change_password');
		}
	} else {
		$this->load->view('admin/change_password');
	}

}
}
?>
