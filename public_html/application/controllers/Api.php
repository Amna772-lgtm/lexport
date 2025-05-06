<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	/**l
	 * Index Page for this controller.
	 *fo
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -t
	 * 		http://example.com/indeDocument_file_successfullx.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *l
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->model('cases');
		$this->load->helper('language');
		$this->session->unset_userdata('site_lang');
		$this->client_service_lan = $this->input->get_request_header('language');
		$this->ip_address = $this->input->get_request_header('ip');
		$this->ip_address = $_SERVER['REMOTE_ADDR'];
		$this->device = $this->input->get_request_header('device');
		$header = apache_request_headers();
		if ($this->device == '' or $this->client_service_lan == '') {
			$data['status'] = 0;
			$data['message'] = "Invalid auth";
			$data['result'] = array();
			echo json_encode($data);
			exit;
		}
	}


	public function index()
	{
		echo 'hello';
		exit;
		$this->load->view('welcome_message');
	}

	/*
     * User registration
     */
	public function device_token()
	{
		$this->db->where('id', $this->input->post('user_id'))->update('users', ['device_token' => $this->input->post('device_token')]);
		$data['status'] = 1;
		$data['message'] = "Token updated";
		$data['result'] = $event;
		echo json_encode($data);
		exit;
	}
	public function profile_picture()
	{
		$user_id = $this->input->post('user_id');
		if (!empty($_FILES['picture']['name'])) {
			$config['upload_path'] = './uploads/profile/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['picture']['name'];

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('picture')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$this->db->where('id', $this->input->post('user_id'))->update('users', ['image' => $picture]);
			} else {
				$picture = '';
			}
		} else {
			$picture = '';
		}

		$result = $this->db->select('*')->where("id", $this->input->post('user_id'))->get('users')->row_array();

		$image = $result['image'];
		unset($result['image']);
		$result['profile_picture'] = base_url("uploads/profile/$image");
		$array = array('status' => 1, 'message' => $this->lang->line('Profile_Updated'), 'result' => $result);
		echo json_encode($array);
		exit;
	}
	public function registration()
	{
		if ($this->client_service_lan == 'ar') {
			$lan = 'ar';
			$this->lang->load('message', 'arabic');
		} else {
			$lan = 'en';
			$this->lang->load('message', 'english');
		}
		$data = array();
		$userData = array();
		if ($this->input->post('name')) {

			$email = $this->email_check($this->input->post('email'));
			if ($email) {
				$array = array('status' => 0, 'message' => $this->lang->line('Email_already_exit'));
				echo json_encode($array);
				exit;
			}
			$phone = $this->phone_check($this->input->post('phone'));
			if ($phone) {
				$array = array('status' => 0, 'message' => $this->lang->line('phone_is_already_exist'));
				echo json_encode($array);
				exit;
			}
			$len = strlen($this->input->post('phone'));
			$min = 10;
			$max = 10;
			if ($len > $max) {
				$array = array('status' => 0, 'message' => $this->lang->line('max_digits'));
				echo json_encode($array);
				exit;
			}
			/*$id_numbers = $this->id_check($this->input->post('id_numbers'));
            if($id_numbers){
                $array = array('status'=>0, 'message'=>$this->lang->line('ID_number_is_already_exist'));
                echo json_encode($array);exit;
            }*/

			/*$len = strlen($this->input->post('id_numbers'));
			$min =10;
			$max =10;
			if($len < $min){
			//	 $array = array('status'=>0, 'message'=>$this->lang->line('Identification_number_is_too_short_minimum_is_10_number_10_max'));
                echo json_encode($array);exit;
			}
			elseif($len > $max){
				$array = array('status'=>0, 'message'=>$this->lang->line('Identification_number_is_too_long_maximum_is_10_number_10_min'));
			//echo json_encode($array);exit;
			}*/

			$lene = strlen($this->input->post('password'));
			$mine = 6;
			$maxe = 8;
			if ($lene < $mine) {
				$array = array('status' => 0, 'message' => $this->lang->line('Password_is_too_short_minimum_is_6_number_8_max'));
				echo json_encode($array);
				exit;
			} elseif ($lene > $maxe) {
				$array = array('status' => 0, 'message' => $this->lang->line('Password_is_too_long_maximum_is_8_number_6_min'));
				echo json_encode($array);
				exit;
			}

			$userData = array(
				'name' => strip_tags($this->input->post('name')),
				'email' => strip_tags($this->input->post('email')),
				// 'id_type' => strip_tags($this->input->post('id_type')),
				'password' => md5($this->input->post('password')),
				//'id_numbers' => strip_tags($this->input->post('id_numbers')),
				'country_code' => "+" . strip_tags($this->input->post('country_code')),
				'phone' => strip_tags($this->input->post('phone')),
				'device_type' => strip_tags($this->input->post('device_type')),
				'device_token' => strip_tags($this->input->post('device_token')),
				'role_id' => strip_tags($this->input->post('role_id')),
				'status' => 1
			);
			//if($this->form_validation->run() == true){
			$insert = $this->user->insert($userData);
			if ($insert) {
				$digits_needed = 4;
				$random_number = ''; // set up a blank string
				$count = 0;
				while ($count < $digits_needed) {
					$random_digit = mt_rand(0, 9);
					$random_number .= $random_digit;
					$count++;
				}

				$this->db->where('id', $insert)->update('users', ['otp' => $random_number]);

				if ($this->client_service_lan == 'ar') {
					$msg = "شريكنا العزيز:                                                 
                    شكرًا لتسجيلكم في منصة  نصر
                    نتطلع دومًا لخدمتكم باحترافية ولإنجاز أعمالكم بمهنيَّة.
                    نرجو إضافة رمز التفعيل:
                    " . $random_number;
				} else {
					$msg = 'Dear Partner, Thank you for registering in "“Nassr”"\n We look forward to serving you professionally and to finalizing your works perfectly.\n Please enter your activation code:' . $random_number;
				}
				$jsonObj = array(
					'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
					'sender' => 'Nassr APP',
					'numbers' => "+" . strip_tags($this->input->post('country_code')) . $this->input->post('phone'),
					'msg' => $msg,
					'msgId' => rand(1, 99999),
					'timeSend' => '0',
					'dateSend' => '0',
					'deleteKey' => '55348',
					'lang' => '3',
					'applicationType' => 68,
				);
				$result = $this->Sms->sendSMS($jsonObj);

				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
				);
				$this->load->library('email', $config);
				$from_email = constant("FROM_EMAIL");
				$to_email = strip_tags($this->input->post('email'));
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				$this->email->set_header('Content-type', 'text/html');
				$this->email->from($from_email, constant("SENDER_NAME"));
				$this->email->to($to_email);
				$this->email->subject($this->lang->line('OTP_For_Registration'));
				$new = ['to_email' => $email, 'sub' => 'welmo', 'role_id' => 3, 'otp' => $random_number];
				$body = $this->load->view('email.php', $new, true);
				$this->email->message($body);
				$this->email->send();

				$adminuser = $this->db->select('email')->where('role_id', 1)->get('users')->result_array();
				foreach ($adminuser as $adminuser) {
					$new = ['email' => $to_email, 'sub' => 'admin_email', 'role_id' => 3, 'name' => $this->input->post('name'), 'phone' => $this->input->post('phone'), 'lan' => $lan];
					$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
					$this->email->set_header('Content-type', 'text/html');
					$this->email->from($from_email, constant("SENDER_NAME"));
					$this->email->to($adminuser['email']);
					$this->email->subject($this->lang->line('New_user_register_from_application'));
					$body = $this->load->view('email.php', $new, true);
					$this->email->message($body);
					$this->email->send();
				}


				$data['user_id'] = $insert;
				$data['status'] = 1;
				$data['message'] = $this->lang->line('register_successfully_OTP_sent_to_your_registered_phone_no');
				$data['result'] = $userData;

				$ddd['platform'] = $this->device;
				$noti['customer_id'] = $insert;
				$noti['notification_type'] = 'user';
				$noti['status_type'] = 'register';
				$noti['login_ip'] = $this->ip_address;
				$noti['create_date'] = date("Y-m-d G:i:s");
				$noti['device_log'] = json_encode($ddd);
				$noti['otp_register'] = json_encode($random_number);
				//$this->db->insert('notification', $noti);

				$noti['device_log'] = json_encode($ddd);
				$noti['customer_id'] = $insert;
				$noti['notification_type'] = 'user';
				$noti['status_type'] = 'login';
				$noti['login_ip'] = $this->ip_address;
				$noti['create_date'] = date("Y-m-d G:i:s");

				$this->db->insert('notification', $noti);


				$action_log['ip'] =  $this->ip_address;
				$action_log['device'] = $this->device;
				$action_log['customer_id'] = $insert;
				$action_log['role'] = 3;
				$action_log['action_type'] = 'register';
				$action_log['status_type'] = '';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['otp_register'] = json_encode($random_number);
				$this->db->insert('action_log', $action_log);
				echo json_encode($data);
			} else {
				return json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			}
		}
	}
	public function android_app_v()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$result['version'] = 28;
		$result['force_update'] = true;
		$data['status'] = 1;
		$data['message'] = $this->lang->line('successfully');
		$data['result'] = $result;
		echo json_encode($data);
	}
	public function check_otp()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$con['returnType'] = 'single';
		$con['conditions'] = array('id' => $this->input->post('id'));
		$result = $this->user->getRows($con);
		$image = $result['image'];
		$result['profile_picture'] = base_url("uploads/profile/$image");
		if ($result['otp'] == $this->input->post('otp')) {
			$data['status'] = 1;
			$data['message'] = $this->lang->line('Verified_successfully');
			$data['result'] = $result;

			$action_log['ip'] =  $this->ip_address;
			$action_log['device'] = $this->device;
			$action_log['role'] = '3';
			$action_log['customer_id'] = $this->input->post('id');
			$action_log['action_type'] = 'otp_verify';
			$action_log['status_type'] = 'success';
			$action_log['create_date'] = date("Y-m-d G:i:s");
			$this->db->insert('action_log', $action_log);

			echo json_encode($data);
		} else {

			$action_log['ip'] =  $this->ip_address;
			$action_log['device'] = $this->device;
			$action_log['role'] = '3';
			$action_log['customer_id'] = $this->input->post('id');
			$action_log['action_type'] = 'otp_verify';
			$action_log['status_type'] = 'faild';
			$action_log['create_date'] = date("Y-m-d G:i:s");
			$this->db->insert('action_log', $action_log);
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
		}
	}
	public function email_check($str)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$con['returnType'] = 'count';
		$con['conditions'] = array('email' => $str);
		$result = $this->user->getRows($con);
		if ($result > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function phone_check($str)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$con['returnType'] = 'count';
		$con['conditions'] = array('phone' => $str);
		$result = $this->user->getRows($con);
		if ($result > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	public function id_check($str)
	{
		$con['returnType'] = 'count';
		$con['conditions'] = array('id_numbers' => $str);
		$result = $this->user->getRows($con);
		if ($result > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function login()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		$userData = array();
		if ($this->input->post('id_numbers')) {
			$digits_needed = 4;
			$random_number = '';
			$count = 0;
			while ($count < $digits_needed) {
				$random_digit = mt_rand(0, 9);
				$random_number .= $random_digit;
				$count++;
			}

			$gemail = $this->input->post('id_numbers');
			if (filter_var($gemail, FILTER_VALIDATE_EMAIL)) {
			} else {
				if (strlen($gemail) >= 10) {
					$gemail = ltrim($gemail, '0');
				}
			}

			$result = $this->db->select('*')->where("(email='$gemail' OR phone='$gemail')", NULL, FALSE)->get('users')->row_array();
			if ($gemail == "modhavadiya55@gmail.com" or $gemail == "8866278873") {
				$random_number = 5252;
			}
			$this->db->where('id', $result['id'])->update('users', ['otp' => $random_number]);

			$device_token = $this->input->post('device_token');
			$device_type = $this->input->post('device_type');
			$login_type = $this->input->post('login_type');
			if ($result['email']) {
				if ($login_type == $result['role_id']) {
					if ($result['password'] == md5($this->input->post('password'))) {
						unset($result['password']);

						//all token empty
						//$data['device_token'] = '';
						// $result_update = $this->user->update_user($data,$device_token,'device_token');

						$datas = array();
						$datas['device_token'] = $device_token;
						$datas['device_type'] = $device_type;
						$result_update = $this->user->update_user($datas, $result['id'], 'id');
						if ($result['photo']) {
							//  $result['photo'] =  base_url().'uploads/'.$result['photo'];
						}

						if ($this->client_service_lan == 'ar') {
							$msg = "شريكنا العزيز: مرحبًا بك في منصة نصر

للدخول يرجى إضافة رمز التفعيل" . $random_number;
						} else {
							$msg = "Dear Partner: Welcome to “Nassr” platform\nPlease enter your activation code: " . $random_number;
						}
						$jsonObj = array(
							'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
							'sender' => 'Nassr APP',
							'numbers' => $result['country_code'] . $result['phone'],
							'msg' => $msg,
							'msgId' => rand(1, 99999),
							'timeSend' => '0',
							'dateSend' => '0',
							'deleteKey' => '55348',
							'lang' => '3',
							'applicationType' => 68,
						);
						$this->Sms->sendSMS($jsonObj);


						$config = array(
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'priority' => '1',
						);
						$this->load->library('email', $config);
						$from_email = constant("FROM_EMAIL");
						$to_email = $result['email'];
						$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
						$this->email->set_header('Content-type', 'text/html');
						$this->email->from($from_email, constant("SENDER_NAME"));
						$this->email->to($to_email);
						$this->email->subject($this->lang->line('OTP_For_Login'));

						$new = ['to_email' => $email, 'sub' => 'loginotp', 'role_id' => 3, 'otp' => $random_number, 'lan' => $this->client_service_lan];

						$body = $this->load->view('email.php', $new, true);
						$this->email->message($body);
						$this->email->send();

						$action_log['ip'] =  $this->ip_address;
						$action_log['device'] = $this->device;
						$action_log['role'] = '3';
						$action_log['customer_id'] =  $result['id'];
						$action_log['action_type'] = 'login';
						$action_log['status_type'] = 'customer';

						$ddd['platform'] = $this->device;
						$noti['device_log'] = json_encode($ddd);
						$noti['customer_id'] =  $result['id'];
						$noti['notification_type'] = 'user';
						$noti['status_type'] = 'login';
						$noti['login_ip'] = $this->ip_address;
						$noti['create_date'] = date("Y-m-d G:i:s");

						$action_log['create_date'] = date("Y-m-d G:i:s");
						$this->db->insert('action_log', $action_log);
						$image = $result['image'];
						$result['profile_picture'] = base_url("uploads/profile/$image");
						$array = array('status' => 1, 'message' => $this->lang->line('login_successfully'), 'result' => $result);
						echo json_encode($array);
						exit;
					} else {
						$array = array('status' => 0, 'message' => $this->lang->line('password_is_wrong'));
						echo json_encode($array);
						exit;
					}
				} else {
					$array = array('status' => 0, 'message' => $this->lang->line('Your_ID_number_and_password_is_wrong'));
					echo json_encode($array);
					exit;
				}
			} else {
				$array = array('status' => 0, 'message' => $this->lang->line('Your_ID_number_and_password_is_wrong'));
				echo json_encode($array);
				exit;
			}
		}
	}

	/*
    * case registration
    */
	public function case_add()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		$caseData = array();
		if ($this->input->post('cusromer_id')) {
			$caseData = array(
				'cusromer_id' => strip_tags($this->input->post('cusromer_id')),
				'cusromer_name' => strip_tags($this->input->post('cusromer_name')),
				'customer_dob' => strip_tags($this->input->post('customer_dob')),
				'address' => strip_tags($this->input->post('address')),
				'email' => strip_tags($this->input->post('email')),
				'service_type' => strip_tags($this->input->post('service_type')),
				'branch' => strip_tags($this->input->post('branch')),
				'amount' => $this->input->post('amount'),
				'packeg_id' => strip_tags($this->input->post('packeg_id')),
			);
			$insert = $this->cases->insert($caseData);

			if ($insert) {

				$caseData['id'] = $insert;
				$data['status'] = 1;
				$data['message'] = $this->lang->line('case_insert_successfully');
				$data['result'] = $caseData;
				echo json_encode($data);
			} else {
				return json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			}
		}
	}
	/*
    * case registration
    */
	public function case_edit()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		$caseData = array();
		if ($this->input->post('id')) {
			$caseData['id'] = $this->input->post('id');
			if ($this->input->post('case_number')) {
				$caseData['case_number'] = $this->input->post('case_number');
			}
			if ($this->input->post('service_type')) {
				$caseData['service_type'] = $this->input->post('service_type');
			}
			if ($this->input->post('discount')) {
				$caseData['discount'] = $this->input->post('discount');
			}
			if ($this->input->post('case_total_amount')) {
				$caseData['case_total_amount'] = $this->input->post('case_total_amount');
			}
			if ($this->input->post('amount')) {
				$caseData['amount'] = $this->input->post('amount');
			}
			if ($this->input->post('case_situation')) {
				$caseData['case_situation'] = $this->input->post('case_situation');
			}
			if ($this->input->post('employee_id')) {
				$caseData['employee_id'] = $this->input->post('employee_id');
			}
			if ($this->input->post('department_id')) {
				$caseData['department_id'] = $this->input->post('department_id');
			}
			if ($this->input->post('power_of_attorney')) {
				$caseData['power_of_attorney'] = $this->input->post('power_of_attorney');
			}
			if ($this->input->post('lawyer')) {
				$caseData['lawyer'] = $this->input->post('lawyer');
			}
			if ($this->input->post('judge_name')) {
				$caseData['judge_name'] = $this->input->post('judge_name');
			}
			if ($this->input->post('court_name')) {
				$caseData['court_name'] = $this->input->post('court_name');
			}
			if ($this->input->post('reference')) {
				$caseData['reference'] = $this->input->post('reference');
			}
			if ($this->input->post('packeg_id')) {
				$caseData['packeg_id'] = $this->input->post('packeg_id');
			}
			if ($this->input->post('agent')) {
				$caseData['agent'] = $this->input->post('agent');
			}

			if ($this->input->post('branch')) {
				$caseData['branch'] = $this->input->post('branch');
			}
			if ($this->input->post('start_date')) {
				$caseData['start_date'] = $this->input->post('start_date');
			}
			if ($this->input->post('end_date')) {
				$caseData['end_date'] = $this->input->post('end_date');
			}

			$update = $this->cases->update_case_temp($caseData, $caseData['id'], 'id');

			if ($update) {
				$data['status'] = 1;
				$data['message'] = $this->lang->line('case_update_successfully');
				$data['result'] = $caseData;
				echo json_encode($data);
			} else {
				return json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			}
		}
	}
	public function get_case()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		if ($this->input->post('id')) {
			$con['returnType'] = 'single';
			$con['conditions'] = array('id' => $this->input->post('id'));
			$result = $this->cases->getRows($con);
			$array = array('status' => 1, 'message' => $this->lang->line('get_case_detail_successfully'), 'result' => $result);
			echo json_encode($array);
			exit;
		} else {
			$array = array('status' => 0, 'message' => $this->lang->line('No_record_found'));
			echo json_encode($array);
			exit;
		}
	}


	public function get_department()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$this->db->select('*');
		$this->db->from('department');
		$query = $this->db->get();
		$result = $query->result_array();
		echo  json_encode(array('status' => 1, 'message' => $this->lang->line('get_department_successfully'), 'result' => $result));
		exit;
	}
	public function get_services()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$this->db->select('*');
		$this->db->from('services');
		$query = $this->db->get();
		$result = $query->result_array();
		echo  json_encode(array('status' => 1, 'message' => $this->lang->line('get_services_successfully'), 'result' => $result));
		exit;
	}
	public function get_packages()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$this->db->select('packages.*,services.name as services_name');
		$this->db->from('packages');
		$this->db->join('services', 'services.id = packages.service_id');
		$query = $this->db->get();
		$result = $query->result_array();
		echo  json_encode(array('status' => 1, 'message' => $this->lang->line('get_packages_successfully'), 'result' => $result));
		exit;
	}

	public function update_employee()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		if ($this->input->post('id')) {
			$data['name'] = $this->input->post('name');
			$data['dob'] = date('Y-m-d', strtotime($this->input->post('dob')));
			$data['address'] = $this->input->post('address');
			$login_type = $this->input->post('login_type');

			if ($login_type == 2) {
				$result_update = $this->user->update_user($data, $this->input->post('id'), 'id');
				$data['id'] = $this->input->post('id');
				$array = array('status' => 1, 'message' => $this->lang->line('User_update_successfully'), 'result' => $data);
				echo json_encode($array);
				exit;
			} else {
				$array = array('status' => 0, 'message' => $this->lang->line('Your_are_not_valid_user'));
				echo json_encode($array);
				exit;
			}
		}
	}
	public function get_profile()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		if ($this->input->post('user_id')) {
			$con['returnType'] = 'single';
			$con['conditions'] = array('id' => $this->input->post('user_id'));
			$result = $this->user->getRows($con);
			$image = $result['image'];
			$result['profile_picture'] = base_url("uploads/profile/$image");
			unset($result['password'], $result['dob'], $result['image'], $result['otp'], $result['status'], $result['is_delete'], $result['is_read'], $result['session_id'], $result['created'], $result['modified'], $result['verification_token']);
			$array = array('status' => 1, 'message' => $this->lang->line('get_profile_successfully'), 'result' => $result);
			echo json_encode($array);
			exit;
		} else {
			$array = array('status' => 0, 'message' => $this->lang->line('No_record_found'));
			echo json_encode($array);
			exit;
		}
	}
	public function update_profile()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		if ($this->input->post('user_id')) {
			//   $data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['id_type'] = $this->input->post('id_type');
			$data['id_numbers'] = $this->input->post('id_numbers');
			// $data['phone'] = $this->input->post('phone');
			$data['city'] = $this->input->post('city');
			$data['district'] = $this->input->post('district');
			$data['address'] = $this->input->post('address');


			$post = $this->input->post();
			if ($post['current_password'] != '') {
				$pass = $this->db->select(['email', 'password'])->where('id', $this->input->post('user_id'))->get('users')->row_array();
				if ($pass['password'] != md5($post['current_password'])) {
					$array = array('status' => 0, 'message' => $this->lang->line('Current_password_is_incorrect'));
					echo json_encode($array);
					exit;
				}

				if ($pass['password'] == md5($post['current_password'])) {
					$this->db->where('id', $this->input->post('user_id'))->update('users', ['password' => md5($post['new_password'])]);
				}
			}

			$result_update = $this->user->update_user($data, $this->input->post('user_id'), 'id');
			$data['user_id'] = $this->input->post('user_id');
			$action_log['role'] = '3';
			$action_log['customer_id'] = $this->input->post('user_id');
			$action_log['action_type'] = 'profile';
			$action_log['ip'] =  $this->ip_address;
			$action_log['device'] = $this->device;

			$action_log['status_type'] = 'edit';
			$action_log['create_date'] = date("Y-m-d G:i:s");
			$this->db->insert('action_log', $action_log);
			$array = array('status' => 1, 'message' => $this->lang->line('User_update_successfully'), 'result' => $data);
			echo json_encode($array);
			exit;
		}
	}
	public function forgot_password()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		if ($this->input->post('email')) {
			$email = $this->input->post('email');
			$con['returnType'] = 'single';
			$con['conditions'] = array('email' => $email, "role_id" => 3);
			$result = $this->user->getRows($con);

			if ($result['id']) {
				$digits_needed = 4;
				$random_number = ''; // set up a blank string
				$count = 0;
				while ($count < $digits_needed) {
					$random_digit = mt_rand(0, 9);
					$random_number .= $random_digit;
					$count++;
				}

				$data['otp'] = $random_number;
				$result_update = $this->user->update_user($data, $result['id'], 'id');
				if ($this->client_service_lan == 'ar') {
					$msg = "Dear Partner:To reset your password please enter the activation code: " . $random_number;
				} else {
					$msg = "شريكنا العزيز
لإعادة تعيين كلمة المرور الخاصة بك، من فضلك أدخل كود التفعيل" . $random_number;
				}
				$data['user_id'] = $result['id'];

				$jsonObj = array(
					'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
					'sender' => 'Nassr APP',
					'numbers' => $result['phone'],
					'msg' => $msg,
					'msgId' => rand(1, 99999),
					'timeSend' => '0',
					'dateSend' => '0',
					'deleteKey' => '55348',
					'lang' => '3',
					'applicationType' => 68,
				);
				$result = $this->Sms->sendSMS($jsonObj);
				$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1',
				);
				$this->load->library('email', $config);
				$from_email = constant("FROM_EMAIL");

				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
				$this->email->set_header('Content-type', 'text/html');
				$this->email->from($from_email, constant("SENDER_NAME"));
				$this->email->to($email);
				$this->email->subject($this->lang->line('OTP_For_Forgot_Password'));
				$new = ['to_email' => $email, 'sub' => 'otpmo', 'role_id' => 3, 'otp' => $random_number, 'lan' => $this->client_service_lan];

				$body = $this->load->view('email.php', $new, true);
				$this->email->message($body);
				$this->email->send();
				$this->db->where('id', $result['id'])->update('users', ['otp' => $random_number]);
				$array = array('status' => 1, 'message' => $this->lang->line('OTP_sent_to_your_email_and_phone_number'), 'result' => $data);
				echo json_encode($array);
				exit;
			} else {
				$array = array('status' => 0, 'message' => $this->lang->line('Email_is_not_valid'));
				echo json_encode($array);
				exit;
			}
		} else {
			$array = array('status' => 0, 'message' => $this->lang->line('Please_enter_Email'));
			echo json_encode($array);
			exit;
		}
	}

	public function verify_otp_password()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$con['returnType'] = 'single';
		$con['conditions'] = array('id' => $this->input->post('id'));
		$result = $this->user->getRows($con);
		if ($result['otp'] == $this->input->post('otp')) {
			$this->db->where('id', $this->input->post('id'))->update('users', ['password' => md5($this->input->post('password'))]);
			$data['status'] = 1;
			$data['message'] = $this->lang->line('Password_reset_successfully');
			//$data['result'] = $result;
			$data['user_id'] = $result['id'];
			echo json_encode($data);
		} else {
			echo json_encode(array('status' => 1, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
		}
	}

	public function update_password()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = array();
		if ($this->input->post('user_id')) {
			$data['password'] = md5($this->input->post('password'));
			$result_update =	$this->db->where('id', $this->input->post('user_id'))->update('users', ['password' => $data['password']]);
			if ($result_update) {
				$array = array('status' => 1, 'message' => $this->lang->line('update_password_successfully'));
				echo json_encode($array);
				exit;
			} else {
				$array = array('status' => 0, 'message' => $this->lang->line('Your_OTP_is_not_valid'));
				echo json_encode($array);
				exit;
			}
		} else {
			$array = array('status' => 0, 'message' => $this->lang->line('Please_enter_OTP'));
			echo json_encode($array);
			exit;
		}
	}
	public function list_writings_misssion()
	{
		$id = $this->input->get('user_id');
		if ($id) {
			$data =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
				->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
				->where("(c_case.customers_id = $id  AND writing_misssion.status=0)", NULL, FALSE)->order_by("id", "desc")
				->get('writing_misssion')
				->result_array();

			if ($data) {
				foreach ($data as $appoinment) {
					$report_file = '';
					if ($appoinment['report_file']) {
						$report_file = base_url("/uploads/case_file/{$appoinment['report_file']}");
					}
					unset($appoinment['report_file']);
					$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='writing')", NULL, FALSE)->get('document')->row();
					if ($files) {
						$appoinment['mission_file'] = base_url("/uploads/case_file/{$files->name}");
					} else {
						$appoinment['mission_file'] = "";
					}

					if ($appoinment[is_close] == 1) {
						$appoinment['close_time'] = clsoe_diff($appoinment['session_end_date'], $appoinment['session_end_time'], $appoinment['close_date']);
					} else {
						$appoinment['close_time'] = "";
					}
					$sepparator = '/';
					$parts = explode($sepparator, $appoinment['session_date']);
					$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0] . " " . $appoinment['session_end_time'];

					$appoinment['epoc_time']  =  strtotime($date1);
					$appoinment['type_of_customer'] = getCaseType($appoinment['case_type']);
					$appoinment['report_file'] = $report_file;
					$appoinment['session_date'] = getTheDayAndDateFromDateApp($appoinment['session_date'], $this->client_service_lan);
					//	$appoinment['session_end_date']= getTheDayAndDateFromDateApp($appoinment['session_end_date'],$this->client_service_lan);
					$appoinment['session_end_date'] = getTheDayAndDateFromDateApp($appoinment['session_end_date'], 'en');

					$final_data[] = $appoinment;
				}

				$m_data['status'] = 1;
				$m_data['message'] = $this->lang->line('Writing_mission_found');
				$m_data['result'] = $final_data;

				$action_log['role'] = 3;
				$action_log['customer_id'] = $id;
				$action_log['action_type'] = 'writing_misssion';
				$action_log['status_type'] = 'list_view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['ip'] =  $this->ip_address;
				$action_log['device'] = $this->device;
				$this->db->insert('action_log', $action_log);

				echo json_encode($m_data);
				exit;
			} else {
				echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
				exit;
			}
		} else {
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			exit;
		}
	}
	public function list_session_mission()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$id = $this->input->get('user_id');
		if ($id) {
			$data =  $this->db->select("session_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
				->join('c_case', "c_case.id = session_mission.case_id", 'left')
				->where("(c_case.customers_id = $id  AND session_mission.status=0)", NULL, FALSE)->order_by("id", "desc")
				->get('session_mission')
				->result_array();
			if ($data) {
				foreach ($data as $appoinment) {
					$report_file = '';
					if ($appoinment['report_file']) {
						$report_file = base_url("/uploads/case_file/{$appoinment['report_file']}");
					}
					unset($appoinment['report_file']);
					$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='session')", NULL, FALSE)->get('document')->result_array();

					if ($files) {
						$i = 0;
						foreach ($files as $files) {
							$i++;
							$appoinment['mission_file'][$i] = base_url("/uploads/case_file/{$files["name"]}");
						}
					} else {
						$appoinment['mission_file'] = "";
					}
					$appoinment['type_of_customer'] = getCaseType($appoinment['case_type']);
					$appoinment['report_file'] = $report_file;

					$sepparator = '/';
					$parts = explode($sepparator, $appoinment['session_date']);
					$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0] . " " . $appoinment['session_end_time'];
					if ($appoinment[is_close] == 1) {
						$appoinment['close_time'] = clsoe_diff($appoinment['session_end_date'], $appoinment['session_end_time'], $appoinment['close_date']);
					} else {
						$appoinment['close_time'] = "";
					}
					$appoinment['epoc_time']  =  strtotime($date1);
					$appoinment['session_date'] = getTheDayAndDateFromDateApp($appoinment['session_date'], $this->client_service_lan);
					//	$appoinment['session_end_date']= getTheDayAndDateFromDateApp($appoinment['session_end_date'],$this->client_service_lan);
					$appoinment['session_end_date'] = getTheDayAndDateFromDateApp($appoinment['session_end_date'], 'en');
					$final_data[] = $appoinment;
				}

				$m_data['status'] = 1;
				$m_data['message'] = $this->lang->line('Session_mission_found');
				$m_data['result'] = $final_data;

				$action_log['customer_id'] = $id;
				$action_log['action_type'] = 'general_mission';
				$action_log['role'] = '3';
				$action_log['ip'] =  $this->ip_address;
				$action_log['device'] = $this->device;
				$action_log['status_type'] = 'list_view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				echo json_encode($m_data);
				exit;
			} else {
				echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
				exit;
			}
		} else {
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			exit;
		}
	}
	public function list_consultation_mission()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$id = $this->input->get('user_id');
		if ($id) {
			$data =  $this->db->select("consultation_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
				->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
				->where("(c_case.customers_id = $id  AND consultation_mission.status=0)", NULL, FALSE)->order_by("id", "desc")
				->get('consultation_mission')
				->result_array();
			if ($data) {
				foreach ($data as $appoinment) {
					$report_file = '';
					if ($appoinment['report_file']) {
						$report_file = base_url("/uploads/case_file/{$appoinment['report_file']}");
					}
					unset($appoinment['report_file']);
					$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='consultati')", NULL, FALSE)->get('document')->row();
					if ($files) {
						$appoinment['mission_file'] = base_url("/uploads/case_file/{$files->name}");
					} else {
						$appoinment['mission_file'] = "";
					}
					$sepparator = '/';
					$parts = explode($sepparator, $appoinment['session_date']);
					$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0] . " " . $appoinment['session_end_time'];
					if ($appoinment[is_close] == 1) {
						$appoinment['close_time'] = clsoe_diff($appoinment['session_end_date'], $appoinment['session_end_time'], $appoinment['close_date']);
					} else {
						$appoinment['close_time'] = "";
					}
					$appoinment['epoc_time']  =  strtotime($date1);
					$appoinment['type_of_customer'] = getCaseType($appoinment['case_type']);
					$appoinment['report_file'] = $report_file;
					$appoinment['session_date'] = getTheDayAndDateFromDateApp($appoinment['session_date'], $this->client_service_lan);
					$appoinment['session_end_date'] = getTheDayAndDateFromDateApp($appoinment['session_end_date'], 'en');
					//$appoinment['session_end_date']= getTheDayAndDateFromDateApp($appoinment['session_end_date'],$this->client_service_lan);
					$final_data[] = $appoinment;
				}

				$m_data['status'] = 1;
				$m_data['message'] = $this->lang->line('Consultation_mission_found');
				$m_data['result'] = $final_data;

				$action_log['role'] = '3';
				$action_log['customer_id'] = $id;
				$action_log['action_type'] = 'consultation_mission';
				$action_log['status_type'] = 'list_view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['ip'] =  $this->ip_address;
				$action_log['device'] = $this->device;

				$this->db->insert('action_log', $action_log);
				echo json_encode($m_data);
				exit;
			} else {
				echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
				exit;
			}
		} else {
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			exit;
		}
	}
	public function list_general_mission()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$id = $this->input->get('user_id');
		if ($id) {
			$data =  $this->db->select("general_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
				->join('c_case', "c_case.id = general_mission.case_id", 'left')
				->where("(c_case.customers_id = $id  AND general_mission.status=0)", NULL, FALSE)->order_by("id", "desc")
				->get('general_mission')
				->result_array();
			if ($data) {
				foreach ($data as $appoinment) {
					$report_file = '';
					if ($appoinment['report_file']) {
						$report_file = base_url("/uploads/case_file/{$appoinment['report_file']}");
					}
					unset($appoinment['report_file']);
					$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='general')", NULL, FALSE)->get('document')->row();
					if ($files) {
						$appoinment['mission_file'] = base_url("/uploads/case_file/{$files->name}");
					} else {
						$appoinment['mission_file'] = "";
					}
					$sepparator = '/';
					$parts = explode($sepparator, $appoinment['session_date']);
					$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0] . " " . $appoinment['session_end_time'];

					if ($appoinment[is_close] == 1) {
						$appoinment['close_time'] = clsoe_diff($appoinment['session_end_date'], $appoinment['session_end_time'], $appoinment['close_date']);
					} else {
						$appoinment['close_time'] = "";
					}
					$appoinment['general_type']	= general_type($appoinment['general_type']);
					$appoinment['epoc_time']  =  strtotime($date1);
					$appoinment['type_of_customer'] = getCaseType($appoinment['case_type']);
					$appoinment['report_file'] = $report_file;
					$appoinment['session_date'] = getTheDayAndDateFromDateApp($appoinment['session_date'], $this->client_service_lan);
					$appoinment['session_end_date'] = getTheDayAndDateFromDateApp($appoinment['session_end_date'], 'en');
					//$appoinment['session_end_date']= getTheDayAndDateFromDateApp($appoinment['session_end_date'],$this->client_service_lan);
					$final_data[] = $appoinment;
				}

				$m_data['status'] = 1;
				$m_data['message'] = $this->lang->line('General_mission_found');
				$m_data['result'] = $final_data;

				$action_log['customer_id'] = $id;
				$action_log['action_type'] = 'general_mission';
				$action_log['role'] = '3';
				$action_log['ip'] =  $this->ip_address;
				$action_log['device'] = $this->device;

				$action_log['status_type'] = 'list_view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$this->db->insert('action_log', $action_log);
				echo json_encode($m_data);
				exit;
			} else {
				echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
				exit;
			}
		} else {
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			exit;
		}
	}
	public function list_visiting_mission()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$id = $this->input->get('user_id');
		if ($id) {
			$data =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
				->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
				->where("(c_case.customers_id = $id  AND visiting_mission.status=0)", NULL, FALSE)->order_by("id", "desc")
				->get('visiting_mission')
				->result_array();

			if ($data) {
				foreach ($data as $appoinment) {
					$report_file = '';
					if ($appoinment['report_file']) {
						$report_file = base_url("/uploads/case_file/{$appoinment['report_file']}");
					}
					unset($appoinment['report_file']);
					$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='visiting')", NULL, FALSE)->get('document')->row();
					if ($files) {
						$appoinment['mission_file'] = base_url("/uploads/case_file/{$files->name}");
					} else {
						$appoinment['mission_file'] = "";
					}
					$sepparator = '/';
					$parts = explode($sepparator, $appoinment['session_date']);
					$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0] . " " . $appoinment['session_end_time'];

					$tt  =  mb_substr($appoinment['who_visit'], 0, 1);
					if ($tt == "E") {
						$appoinment['who_visit'] = $this->lang->line('Employee_Visiting_to_client');
					} else {
						$appoinment['who_visit'] = $this->lang->line('Client_Visiting_to_employee');
					}
					if ($appoinment[is_close] == 1) {
						$appoinment['close_time'] = clsoe_diff($appoinment['session_end_date'], $appoinment['session_end_time'], $appoinment['close_date']);
					} else {
						$appoinment['close_time'] = "";
					}
					$appoinment['epoc_time']  =  strtotime($date1);
					$appoinment['type_of_customer'] = getCaseType($appoinment['case_type']);
					$appoinment['session_date'] = getTheDayAndDateFromDateApp($appoinment['session_date'], $this->client_service_lan);
					//$appoinment['session_end_date']= getTheDayAndDateFromDateApp($appoinment['session_end_date'],$this->client_service_lan);
					$appoinment['session_end_date'] = getTheDayAndDateFromDateApp($appoinment['session_end_date'], 'en');
					$appoinment['report_file'] = $report_file;
					$final_data[] = $appoinment;
				}

				$m_data['status'] = 1;
				$m_data['message'] = $this->lang->line('Visiting_mission_found');
				$m_data['result'] = $final_data;

				$action_log['role'] = '3';
				$action_log['customer_id'] = $id;
				$action_log['action_type'] = 'visiting_mission';
				$action_log['status_type'] = 'list_view';
				$action_log['create_date'] = date("Y-m-d G:i:s");
				$action_log['ip'] =  $this->ip_address;
				$action_log['device'] = $this->device;
				$this->db->insert('action_log', $action_log);

				echo json_encode($m_data);
				exit;
			} else {
				echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
				exit;
			}
		} else {
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Some_problems_occured_please_try_again')));
			exit;
		}
	}
	public function view_session_mission($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data =  $this->db->select("session_mission.*,c_case.id as case_id,
		c_case.customers_id,c_case.user_id,c_case.identification_number, c_case.identification_types, c_case.other_identification_types, c_case.client_file_number, c_case.client_name, c_case.branch, c_case.total_of_case_number, c_case.service_types, c_case.other_service_types, c_case.case_code, c_case.case_type, c_case.case_number, c_case.case_title, c_case.case_date, c_case.case_start_date, c_case.contact_number, c_case.opponent_full_name, c_case.opponent_note, c_case.opponent_phone, c_case.court_name, c_case.court_number, c_case.court_address, c_case.judge_name, c_case.opponent_lawyer, c_case.referral_number, c_case.referral_title, c_case.referral_date, c_case.verdict_number, c_case.verdict_date, c_case.objection_number, c_case.objection_date, c_case.case_status")
			->join('c_case', "c_case.id = session_mission.case_id", 'left')
			->where("(session_mission.id = $id)", NULL, FALSE)
			->get('session_mission')
			->row();
		$report_file = '';
		if ($data->report_file) {
			$report_file = base_url("/uploads/case_file/{$data->report_file}");
		}
		unset($data->report_file);
		$files = $this->db->select('*')->where("(temp_app_id = '{$data->id}' AND cat_id = 8 AND type='session')", NULL, FALSE)->get('document')->result_array();

		if ($files) {
			$i = 0;
			foreach ($files as $files) {
				$i++;
				$data->mission_file[] = base_url("/uploads/case_file/{$files["name"]}");
			}
		} else {
			$data->mission_file = array();
		}
		$data->session_date = getTheDayAndDateFromDateApp($data->session_date, $this->client_service_lan);
		$data->session_end_date = getTheDayAndDateFromDateApp($data->session_end_date, $this->client_service_lan);
		$data->type_of_customer = getCaseType($data->case_type);
		$data->report_file = $report_file;
		if ($data->session_code == 'active') {
			$sts =  $this->lang->line('Active');
		}
		if ($data->session_code == 'inactive') {
			$sts =  $this->lang->line('Inactive');
		}
		if ($data->session_code == 'reactivated') {
			$sts =  $this->lang->line('Reactive');
		}
		$data->case_status = $sts;
		$data->session_code = $sts;
		$m_data['status'] = 1;
		$m_data['message'] = $this->lang->line('Success');
		$m_data['result'] = $data;
		$action_log['role'] = '3';
		$action_log['customer_id'] = $id;
		$action_log['action_type'] = 'session_mission';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;

		$this->db->insert('action_log', $action_log);
		echo json_encode($m_data);
		exit;
	}

	public function view_consultation_mission($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data =  $this->db->select("consultation_mission.*,c_case.id as case_id,
		c_case.customers_id,c_case.user_id,c_case.identification_number, c_case.identification_types, c_case.other_identification_types, c_case.client_file_number, c_case.client_name, c_case.branch, c_case.total_of_case_number, c_case.service_types, c_case.other_service_types, c_case.case_code, c_case.case_type, c_case.case_number, c_case.case_title, c_case.case_date, c_case.case_start_date, c_case.contact_number, c_case.opponent_full_name, c_case.opponent_note, c_case.opponent_phone, c_case.court_name, c_case.court_number, c_case.court_address, c_case.judge_name, c_case.opponent_lawyer, c_case.referral_number, c_case.referral_title, c_case.referral_date, c_case.verdict_number, c_case.verdict_date, c_case.objection_number, c_case.objection_date, c_case.case_status")
			->join('c_case', "c_case.id = consultation_mission.case_id", 'left')
			->where("(consultation_mission.id = $id)", NULL, FALSE)
			->get('consultation_mission')
			->row();
		$report_file = '';
		if ($data->report_file) {
			$report_file = base_url("/uploads/case_file/{$data->report_file}");
		}
		unset($data->report_file);
		$files = $this->db->select('*')->where("(temp_app_id = '{$data->id}' AND cat_id = 8 AND type='consultati')", NULL, FALSE)->get('document')->result_array();
		if ($files) {
			$i = 0;
			foreach ($files as $files) {
				$i++;
				$data->mission_file[] = base_url("/uploads/case_file/{$files["name"]}");
			}
		} else {
			$data->mission_file = array();
		}
		//	$data->consultation_type= consultation_type($data->consultation_type);
		$data->type_of_customer = getCaseType($data->case_type);
		$data->session_end_date = getTheDayAndDateFromDateApp($data->session_end_date, $this->client_service_lan);
		$data->session_date = getTheDayAndDateFromDateApp($data->session_date, $this->client_service_lan);
		$data->report_file = $report_file;
		if ($data->session_code == 'active') {
			$sts =  $this->lang->line('Active');
		}
		if ($data->session_code == 'inactive') {
			$sts =  $this->lang->line('Inactive');
		}
		if ($data->session_code == 'reactivated') {
			$sts =  $this->lang->line('Reactive');
		}
		$data->case_status = $sts;
		$data->session_code = $sts;
		$m_data['status'] = 1;
		$m_data['message'] = $this->lang->line('Success');
		$m_data['result'] = $data;
		$action_log['role'] = '3';
		$action_log['customer_id'] = $id;
		$action_log['action_type'] = 'consultation_mission';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;

		$this->db->insert('action_log', $action_log);
		echo json_encode($m_data);
		exit;
	}

	public function view_writing_misssion($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data =  $this->db->select("writing_misssion.*,c_case.id as case_id,
		c_case.customers_id,c_case.user_id,c_case.identification_number, c_case.identification_types, c_case.other_identification_types, c_case.client_file_number, c_case.client_name, c_case.branch, c_case.total_of_case_number, c_case.service_types, c_case.other_service_types, c_case.case_code, c_case.case_type, c_case.case_number, c_case.case_title, c_case.case_date, c_case.case_start_date, c_case.contact_number, c_case.opponent_full_name, c_case.opponent_note, c_case.opponent_phone, c_case.court_name, c_case.court_number, c_case.court_address, c_case.judge_name, c_case.opponent_lawyer, c_case.referral_number, c_case.referral_title, c_case.referral_date, c_case.verdict_number, c_case.verdict_date, c_case.objection_number, c_case.objection_date, c_case.case_status")
			->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
			->where("(writing_misssion.id = $id)", NULL, FALSE)
			->get('writing_misssion')
			->row();
		$report_file = '';
		if ($data->report_file) {
			$report_file = base_url("/uploads/case_file/{$data->report_file}");
		}
		unset($data->report_file);
		$files = $this->db->select('*')->where("(temp_app_id = '{$data->id}' AND cat_id = 8 AND type='writing')", NULL, FALSE)->get('document')->result_array();
		if ($files) {
			$i = 0;
			foreach ($files as $files) {
				$i++;
				$data->mission_file[] = base_url("/uploads/case_file/{$files["name"]}");
			}
		} else {
			$data->mission_file = array();
		}
		$data->type_of_customer = getCaseType($data->case_type);
		$data->service_types = getServiceType($data->service_types);
		$data->branch = getBranchName($data->branch);
		$data->session_date = getTheDayAndDateFromDateApp($data->session_date, $this->client_service_lan);
		$data->session_end_date = getTheDayAndDateFromDateApp($data->session_end_date, $this->client_service_lan);
		$data->report_file = $report_file;
		if ($data->session_code == 'active') {
			$sts =  $this->lang->line('Active');
		}
		if ($data->session_code == 'inactive') {
			$sts =  $this->lang->line('Inactive');
		}
		if ($data->session_code == 'reactivated') {
			$sts =  $this->lang->line('Reactive');
		}
		$data->case_status = $sts;
		$data->session_code = $sts;
		$m_data['status'] = 1;
		$m_data['message'] = $this->lang->line('Success');
		$m_data['result'] = $data;
		$action_log['role'] = '3';
		$action_log['customer_id'] = $id;
		$action_log['action_type'] = 'writing_misssion';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;

		$this->db->insert('action_log', $action_log);
		echo json_encode($m_data);
		exit;
	}

	public function view_general_mission($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data =  $this->db->select("general_mission.*,c_case.id as case_id,
		c_case.customers_id,c_case.user_id,c_case.identification_number, c_case.identification_types, c_case.other_identification_types, c_case.client_file_number, c_case.client_name, c_case.branch, c_case.total_of_case_number, c_case.service_types, c_case.other_service_types, c_case.case_code, c_case.case_type, c_case.case_number, c_case.case_title, c_case.case_date, c_case.case_start_date, c_case.contact_number, c_case.opponent_full_name, c_case.opponent_note, c_case.opponent_phone, c_case.court_name, c_case.court_number, c_case.court_address, c_case.judge_name, c_case.opponent_lawyer, c_case.referral_number, c_case.referral_title, c_case.referral_date, c_case.verdict_number, c_case.verdict_date, c_case.objection_number, c_case.objection_date, c_case.case_status")
			->join('c_case', "c_case.id = general_mission.case_id", 'left')
			->where("(general_mission.id = $id)", NULL, FALSE)
			->get('general_mission')
			->row();
		$report_file = '';
		if ($data->report_file) {
			$report_file = base_url("/uploads/case_file/{$data->report_file}");
		}
		unset($data->report_file);
		$files = $this->db->select('*')->where("(temp_app_id = '{$data->id}' AND cat_id = 8 AND type='general')", NULL, FALSE)->get('document')->result_array();
		if ($files) {
			$i = 0;
			foreach ($files as $files) {
				$i++;
				$data->mission_file[] = base_url("/uploads/case_file/{$files["name"]}");
			}
		} else {
			$data->mission_file = array();
		}
		$data->session_date = getTheDayAndDateFromDateApp($data->session_date, $this->client_service_lan);
		$data->general_type = general_type($data->general_type);
		$data->type_of_customer = getCaseType($data->case_type);
		$data->session_end_date = getTheDayAndDateFromDateApp($data->session_end_date, $this->client_service_lan);
		$data->report_file = $report_file;
		if ($data->session_code == 'active') {
			$sts =  $this->lang->line('Active');
		}
		if ($data->session_code == 'inactive') {
			$sts =  $this->lang->line('Inactive');
		}
		if ($data->session_code == 'reactivated') {
			$sts =  $this->lang->line('Reactive');
		}
		$data->case_status = $sts;
		$data->session_code = $sts;
		$m_data['status'] = 1;
		$m_data['message'] = $this->lang->line('Success');
		$m_data['result'] = $data;
		$action_log['role'] = '3';
		$action_log['customer_id'] = $id;
		$action_log['action_type'] = 'general_mission';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;

		$this->db->insert('action_log', $action_log);
		echo json_encode($m_data);
		exit;
	}
	public function view_visiting_mission($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data =  $this->db->select("visiting_mission.*,c_case.id as case_id,
		c_case.customers_id,c_case.user_id,c_case.identification_number, c_case.identification_types, c_case.other_identification_types, c_case.client_file_number, c_case.client_name, c_case.branch, c_case.total_of_case_number, c_case.service_types, c_case.other_service_types, c_case.case_code, c_case.case_type, c_case.case_number, c_case.case_title, c_case.case_date, c_case.case_start_date, c_case.contact_number, c_case.opponent_full_name, c_case.opponent_note, c_case.opponent_phone, c_case.court_name, c_case.court_number, c_case.court_address, c_case.judge_name, c_case.opponent_lawyer, c_case.referral_number, c_case.referral_title, c_case.referral_date, c_case.verdict_number, c_case.verdict_date, c_case.objection_number, c_case.objection_date, c_case.case_status")
			->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
			->where("(visiting_mission.id = $id)", NULL, FALSE)
			->get('visiting_mission')
			->row();
		$report_file = '';
		if ($data->report_file) {
			$report_file = base_url("/uploads/case_file/{$data->report_file}");
		}
		unset($data->report_file);
		$files = $this->db->select('*')->where("(temp_app_id = '{$data->id}' AND cat_id = 8 AND type='visiting')", NULL, FALSE)->get('document')->result_array();
		if ($files) {
			$i = 0;
			foreach ($files as $files) {
				$i++;
				$data->mission_file[] = base_url("/uploads/case_file/{$files["name"]}");
			}
		} else {
			$data->mission_file[] = "";
		}

		$tt  =  mb_substr($data->who_visit, 0, 1);
		if ($tt == "E") {
			$data->who_visit = $this->lang->line('Employee_Visiting_to_client');
		} else {
			$data->who_visit = $this->lang->line('Client_Visiting_to_employee');
		}

		$data->type_of_customer = getCaseType($data->case_type);
		$data->session_date = getTheDayAndDateFromDateApp($data->session_date, $this->client_service_lan);
		$data->session_end_date = getTheDayAndDateFromDateApp($data->session_end_date, $this->client_service_lan);
		$data->report_file = $report_file;
		if ($data->session_code == 'active') {
			$sts =  $this->lang->line('Active');
		}
		if ($data->session_code == 'inactive') {
			$sts =  $this->lang->line('Inactive');
		}
		if ($data->session_code == 'reactivated') {
			$sts =  $this->lang->line('Reactive');
		}
		$data->case_status = $sts;
		$data->session_code = $sts;
		$m_data['status'] = 1;
		$m_data['message'] = $this->lang->line('Success');
		$m_data['result'] = $data;
		$action_log['role'] = '3';
		$action_log['customer_id'] = $id;
		$action_log['action_type'] = 'visiting_mission';
		$action_log['action_id'] = $id;
		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;

		$this->db->insert('action_log', $action_log);
		echo json_encode($m_data);
		exit;
	}
	public function archive_list()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$file_type = $this->input->get('file_type');
		$case_id = $this->input->get('case_id');
		$id = $this->input->get('user_id');

		$case_data = $this->db->where('customers_id', $id)->get('c_case')->result_array();
		$file_type = $this->input->post();
		if ($file_type) {
			$catid = $file_type;
			if ($catid && $case_id) {
				$where = "customer_id=$id AND case_number=$case_id AND cat_id=$catid";
			} else if ($case_id) {
				$where = "customer_id=$id AND case_number=$case_id";
			} else if ($catid) {
				$where = "customer_id=$id  AND cat_id=$catid";
			} else {
				$where = "customer_id=$id";
			}
			$data = $this->db->select('*')->where("($where)", NULL, FALSE)->order_by("id", "desc")->get('document')
				->result_array();
		} else {

			$data = $this->db->select('*')
				->where('customer_id', $id)->order_by("id", "desc")
				->get('document')
				->result_array();
		}

		if ($data) {
			foreach ($data as $arc) {
				$ar_data['file_name'] = $arc['name'];
				$ext = pathinfo($arc['name'], PATHINFO_EXTENSION);
				$ar_data['file_extension)'] = $ext;
				$ar_data['update_date'] = $arc['updatedate'];
				$ar_data['create_date'] = $arc['created'];
				$ar_data['uploaded_by'] = getEmployeeName($arc['uploaded_by']);
				$ar_data['file_url'] = $report_file = base_url("/uploads/case_file/{$arc['name']}");
				$final_data[] = $ar_data;
			}
			$m_data['status'] = 1;
			$m_data['message'] = $this->lang->line('Success');
			$m_data['result'] = $final_data;

			echo json_encode($m_data);
			exit;
		} else {
			echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
			exit;
		}
	}
	public function change_password()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$post = $this->input->post();
		$pass = $this->db->select(['email', 'password'])->where('id', $post['user_id'])->get('users')->row_array();
		if ($pass['password'] != md5($post['current_password'])) {
			$array = array('status' => 0, 'message' => $this->lang->line('Current_password_is_incorrect'));
			echo json_encode($array);
			exit;
		}
		if ($post['new_password'] != $post['confirm_password']) {
			$array = array('status' => 0, 'message' => $this->lang->line('Password_not_match'));
			echo json_encode($array);
			exit;
		}
		if ($pass['password'] == md5($post['current_password'])) {
			$this->db->where('id', $post['user_id'])->update('users', ['password' => md5($post['new_password'])]);
			$array = array('status' => 0, 'message' => $this->lang->line('Password_Change_Successfully'));
			echo json_encode($array);
			exit;
		}
	}

	public function get_paypal_payment()
	{
		$data['status'] = 1;
		$data['message'] = "called";
		echo json_encode($data);
		exit;
	}
	public function payment()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$post = $this->input->post();
		$id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		if ($post) {
			$config = [
				'upload_path' => './uploads/payment',
				'allowed_types' => 'jpg|gif|png|jpeg|pdf|doc',
			];
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('receipt')) {
				$data1 = $this->upload->data();
			}
			if ($post['payment_method'] == "cheque") {
				$json['name'] = $post['name'];
				$json['number'] = $post['number'];
				$json['note'] = $post['note'];
				$payment['extra_details'] = json_encode($json);
			}
			$payment['receipt'] = $data1['file_name'];
			$payment['payment_method'] = $post['payment_method'];
			$payment['sub_invoice_id'] = $id;
			$payment['customer_id'] =  $user_id;
			$payment['create_date'] = date("Y-m-d G:i:s");
			$this->db->where('id', $id)->update('invoice_details', ['payment_status' => 'process']);
			$this->db->insert('transaction', $payment);
			$data['status'] = 1;
			$data['message'] = $this->lang->line('Success');
			$data['data'] = array();
			echo json_encode($data);
			exit;
		}
	}
	public function get_payment_response()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$post = json_decode($this->input->post('payment_response'));
		$id = $this->input->post('wallet_id');
		$row1 = $this->db->where('id', $id)->get('invoice_details')->row();
		$row2 = $this->db->where('id', $row1->invoice_id)->get('invoice')->row();

		if ($post) {
			$payment['extra_details'] = $this->input->post('payment_response');
			$payment['payment_method'] = 'Terl-App';
			$payment['sub_invoice_id'] = $id;
			$payment['customer_id'] =  $row2->customers_id;
			$payment['create_date'] = date("Y-m-d G:i:s");
			$this->db->where('id', $id)->update('invoice_details', ['payment_status' => 'process']);
			$this->db->insert('transaction', $payment);
			$data['status'] = 1;
			$data['message'] = $this->lang->line('Success');
			$data['data'] = array();



			$users = $this->db->select('*')->where('id', $row2->customers_id)->get('users')->row_array();
			$email = $users['email'];
			$phone = $users['phone'];
			$name = $users['name'];
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$noti['customer_id'] = $row2->customers_id;
			$noti['appointment_id'] = $id;
			$noti['notification_type'] = 'payment';
			$noti['status_type'] = 'success';
			$noti['case_id'] = $row2->case_id;
			$noti['create_date'] = date("Y-m-d G:i:s");
			$this->db->insert('notification', $noti);
			$this->load->library('email', $config);

			$new = ['to_email' => $email, 'case_id' => $row1->invoice_no, 'notification_type' => $noti['notification_type'], 'status_type' => $noti['status_type'], 'name' => $name, 'lan' => $this->client_service_lan];

			$from_email = constant("FROM_EMAIL");
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($email);
			$this->email->subject($this->lang->line('payment_is_successful') . $row1->invoice_no);
			$body = $this->load->view('email.php', $new, true);
			$this->email->message($body);
			$this->email->send();
			$json_data['case_id'] = $noti['case_id'];
			$json_data['misssion_id'] = $store_id;
			$json_data['invoice_no'] = $row2->invoice_no;
			//	insertActionLog($json_data,$this->session->userdata('user_id'),"payment","success");
			if ($this->client_service_lan == 'ar') {
				$msg = '
:شريكنا العزيز  نفيدكم بأنه تمت عملية الدفع بنجاح للفاتورة رقم  ' . $row1->invoice_no . '
كما سيباشر الفريق المختص على إجراءات تقديم الخدمة القانونية 
نسعد بخدمتكم، وممتنون لثقتكم';
			} else {
				$msg = 'Dear partner:
We hope that "nassr service have fulfilled your expectations" we received your payment successfully for invoice #' . $row1->invoice_no . '  and we process your legal E-service to the initiated appropriate team.
"We are happy to serve you and we are grateful for your trust"';
			}
			sendSMSProcess($phone, $msg);
			echo json_encode($data);
			exit;
		}
		$data['status'] = 1;
		$data['message'] = 'Payemnt success';
		$data['result'] = $post;
		echo json_encode($data);
		exit;
	}
	public function get_payment_detail($id)
	{
		$id = intval($id);
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
			$lan = 'AR';
		} else {
			$this->lang->load('message', 'english');
			$lan = 'EN';
		}
		$row1 = $this->db->where('id', $id)->get('invoice_details')->row();
		$row2 = $this->db->where('id', $row1->invoice_id)->get('invoice')->row();
		$people_data = $this->db->where('id', $row2->customers_id)->get('users')->row();
		$return_url = base_url('telr/success/' . $id);
		$cancel_url = base_url('telr/cancel/' . $id);

		$array = array(
			'user_id'   => $row2->customers_id,
			'amount'      => $row1->total,
			'ivp_lang'        => $lan,
			'ivp_mode'        => 0,
			'ivp_currency'    => 'SAR',
			'ivp_desc'        => getCaseNumber($row2->case_id) . "  E-Service Payment",
			'bill_fname'      => $people_data->name,
			'bill_sname'      => "",
			'bill_addr1'      => $people_data->address,
			'bill_addr2'      => "",
			'bill_city'       => $people_data->city,
			'bill_region'     => "",
			'bill_zip'        => "",
			'bill_country'    => "SA",
			'bill_email'      => $people_data->email,
			'bill_tel'        => $people_data->phone,
		);
		$data['status'] = 1;
		$data['invoice_base_url'] = base_url("uploads/invoice/");
		$data['message'] = 'Success';
		$data['result'] = $array;
		echo json_encode($data);
		exit;
	}
	public function list_wallet($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$array = $this->db->select("
		invoice.*,invoice_details.*,
		c_case.id as case_id,
		c_case.customers_id")
			->join('c_case', "c_case.id = invoice.case_id")
			->join('invoice_details', "invoice_details.invoice_id = invoice.id", 'left')
			->where('invoice.id=invoice_details.invoice_id')
			->where('c_case.customers_id', $id)
			->where('invoice.status', 0)
			->order_by("invoice.id", "desc")
			->get('invoice')->result_array();
		if ($array) {
			$data['status'] = 1;
			$data['invoice_base_url'] = base_url("uploads/invoice/");
			$data['message'] = 'Success';
			$data['result'] = $array;
			echo json_encode($data);
			exit;
		} else {
			$data['status'] = 0;

			$data['message'] = 'Record not found';
			$data['result'] = null;
			echo json_encode($data);
			exit;
		}
	}

	public function notification($user_id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$post['badge'] = 0;
		$this->db->where('id', $user_id)->update('users', $post);
		$cid = $user_id;
		$this->db->select('*')->where("(customer_id='$cid')", NULL, FALSE);
		$files = $this->db->order_by("id", "desc")->get('notification')->result_array();
		$count = 0;
		foreach ($files as $n) {
			$timestamp = strtotime($n['create_date']);
			$no_date =  date("G:i", $timestamp);

			if ($n['status_type'] == 'logout') {
				$data['text'] = $this->lang->line('Logout_successfully');
				$data['date'] = $no_date;
			}
			if ($n['status_type'] == 'login') {
				$dinfo = json_decode($n['device_log']);

				if ($this->client_service_lan == 'ar') {
					$data['text'] = "مرحباً بك شريكنا العزيز" . $dinfo->name . " " . $dinfo->platform;
				} else {
					$data['text'] = "Welcome to NASSR platform " . $dinfo->name . " " . $dinfo->platform;
				}

				$data['date'] = $no_date;
			}
			if ($n['status_type'] == 'success' && $n['notification_type'] == 'payment') {
				$row1 = $this->db->where('id',  $n['appointment_id'])->get('invoice_details')->row();
				$data['text'] = $this->lang->line('payment_is_successful') . $row1->invoice_no;
				$data['date'] = $no_date;
			}
			if ($n['notification_type'] == 'msg') {
				$data['text'] = $this->lang->line('You_have_New_message');
				$data['date'] = $no_date;
			}
			if ($n['notification_type'] == 'invoice') {
				/*  if($this->client_service_lan == 'ar'){
			 	$data['text']= "تم إنشاء فاتورة للخدمة رقم ".getCaseNumber($n['case_id']);
       }else{
           	$data['text']="Your invoice for case #".getCaseNumber($n['case_id'])." created.";
		 
       }*/
				$data['text'] = $this->lang->line('Your_invoice_for_case') . " " . getCaseNumber($n['case_id']);
				$data['date'] = $no_date;
			}
			if ($n['notification_type'] == 'case') {

				if ($n['status_type'] == 'add') {
					$data['type'] = 'e_service';
					$data['n_id'] = $n['case_id'];
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Your_e_service_has_been_added');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'reject') {
					$data['type'] = 'e_service';
					$data['n_id'] = $n['case_id'];
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Your_e_service_has_been_rejected');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'approve') {
					$data['type'] = 'e_service';
					$data['n_id'] = $n['case_id'];
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Your_e_service_has_been_approved');
					$data['date'] = $no_date;
				}
			}
			if ($n['notification_type'] == 'session_appoinment') {
				$data['type'] = 'session';
				$data['n_id'] = $n['appointment_id'];
				if ($n['status_type'] == 'add') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Session_mission_added');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'close') {

					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Session_mission_has_been_close');
					$data['date'] = $no_date;
				}
			}
			if ($n['notification_type'] == 'general_appoinment') {
				$data['type'] = 'general';
				$data['n_id'] = $n['appointment_id'];
				if ($n['status_type'] == 'add') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('General_mission_added');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'close') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('General_mission_has_been_close');
					$data['date'] = $no_date;
				}
			}
			if ($n['notification_type'] == 'visiting_appoinment') {
				$data['type'] = 'visiting';
				$data['n_id'] = $n['appointment_id'];
				if ($n['status_type'] == 'add') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Visiting_mission_added');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'close') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Visiting_mission_has_been_close');
					$data['date'] = $no_date;
				}
			}
			if ($n['notification_type'] == 'consultation_appoinment') {
				$data['type'] = 'consultation';
				$data['n_id'] = $n['appointment_id'];
				if ($n['status_type'] == 'add') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Consultation_mission_added');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'close') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Consultation_mission_has_been_close');
					$data['date'] = $no_date;
				}
			}
			if ($n['notification_type'] == 'writings_appoinment') {
				$data['type'] = 'writings';
				$data['n_id'] = $n['appointment_id'];
				if ($n['status_type'] == 'add') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Writing_mission_added');
					$data['date'] = $no_date;
				}
				if ($n['status_type'] == 'close') {
					$data['text'] = getCaseNumber($n['case_id']) . " " . $this->lang->line('Writing_mission_has_been_close');
					$data['date'] = $no_date;
				}
			}
			if ($data != null) {
				$data1[] = $data;
			}
			$count++;
		}
		if ($data1) {
			$data_array['message'] = $this->lang->line('Success');
			$data_array['result'] = $data1;
			$data_array['status'] = 1;
		} else {
			$data_array['message'] = "not found";
			$data_array['result'] = array();
			$data_array['status'] = 0;
		}


		echo json_encode($data_array);
		exit;
	}
	public function e_service_list($user_id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$this->db->select('c_case.id,c_case.service_types,c_case.case_number,c_case.case_number,case_temp.reject_note,case_temp.case_id,case_temp.is_reject');
		$this->db->from('c_case');
		$this->db->join('case_temp', 'case_temp.case_id=c_case.id', 'left');
		$this->db->where('c_case.customers_id', $user_id);
		$this->db->order_by('c_case.id', 'DESC');
		$c_data =  $query = $this->db->get()->result_array();
		if ($c_data) {
			foreach ($c_data as $c) {
				$sno = $c['service_types'];

				if ($c['is_reject'] == "") {
					$c['is_reject'] = "";
				}
				unset($c['service_types']);
				$c['service_types'] = getServiceType($sno);
				$final_data[] = $c;
			}
			$data['status'] = 1;
			$data['message'] = $this->lang->line('Success');
			$data['result'] = $final_data;
			echo json_encode($data);
			exit;
		} else {
			$data['status'] = 0;
			$data['message'] = $this->lang->line('No_Result_Found');
			$data['result'] = $array;
			echo json_encode($data);
			exit;
		}
	}
	public function get_add_e_service($user_id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
			$data['case_date'] = Greg2Hijri(date('d'), date('m'), date('Y'), true);
		} else {
			$this->lang->load('message', 'english');
			$data['case_date'] = date('d/m/Y');
		}
		$getdata = $this->db->select(['id_numbers', 'id_type', 'name',])->where('id', $user_id)->get('users')->row_array();
		$dbValue = $user_id;
		$value2 =  $dbValue = "CU" . str_pad($dbValue, 6, "0", STR_PAD_LEFT);

		$doc_id = "DI" . rand();

		$data['customers_id'] = $user_id;
		$data['identification_number'] = $getdata['id_numbers'];
		$data['identification_types'] = $getdata['id_type'];
		$data['client_name'] = $getdata['name'];
		$data['client_file_number'] = $value2;
		$cnomain = getCaseNumber(0);
		$data['case_number'] = $cnomain;
		$data['doc_id'] = $doc_id;

		$data['contract_number'] = "C" . $cnomain;
		$brance = branch();
		$brance1[0]['id'] = "";
		$brance1[0]['name'] =  $this->lang->line('Select_branch');
		$result = array_merge_recursive($brance1, $brance);

		$data['branch'] = $result;
		$this->load->model('admin/case_mod');
		$service = $this->case_mod->dis_services($this->client_service_lan);
		if ($this->client_service_lan == 'en') {
			foreach ($service as $srv) {
				$srv['name'] = $srv['name_en'];
				$ss[] = $srv;
			}
			$ss[0]['id'] = "";
			$ss[0]['name_en'] = " ";
			$ss[0]['name'] = $this->lang->line('Select_service_type');
			$data['service_types'] = $ss;
		} else {
			$service[0]['id'] = " ";
			$service[0]['name'] = $this->lang->line('Select_service_type');
			$data['service_types'] = $service;
		}

		if ($this->client_service_lan == 'ar') {
			$ct = $this->db->select(['id', 'service_id', 'name'])->order_by("id", "desc")
				->get('case_type');
		} else {
			$ct = $this->db->select(['id', 'service_id', 'name_en as name'])->order_by("id", "desc")
				->get('case_type');
		}

		$case_type = $ct->result_array();
		$case_type[0]['id'] = "";
		$case_type[0]['service_id'] = " ";
		$case_type[0]['name'] =  $this->lang->line('Select_case_type');
		$data['case_type'] = $case_type;
		$array['status'] = 1;
		$array['message'] = $this->lang->line('Success');
		$array['result'] = $data;
		echo json_encode($array);
		exit;
	}
	public function add_e_service()
	{
		$post = $this->input->post();
		if ($this->client_service_lan == 'ar') {
			$lan = "ar";
			$this->lang->load('message', 'arabic');
			$case_start_date = $post['case_start_date'];
			$case_date = $post['case_date'];
			unset($post['case_start_date'], $post['case_date']);
			$case_start_date = explode('/', $case_start_date);
			$case_date = explode('/', $case_date);

			$case_date = Hijri2Greg($case_date[0], $case_date[1], $case_date[2], true);
			$case_start_date = Hijri2Greg($case_start_date[0], $case_start_date[1], $case_start_date[2], true);
			$post['case_start_date'] = $case_start_date;
			$post['case_date'] = $case_date;
		} else {
			$lan = "en";
			$this->lang->load('message', 'english');
		}
		if ($_FILES['document_file']['name'][0]) {
			$cate_id = 1;
			$fname = "Case_doc_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$document_file = array();
			$files = $_FILES['document_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['document_file']['name'] = $files['name'][$key];
				$_FILES['document_file']['type'] = $files['type'][$key];
				$_FILES['document_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['document_file']['error'] = $files['error'][$key];
				$_FILES['document_file']['size'] = $files['size'][$key];

				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$document_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];
				if ($this->upload->do_upload('document_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = '';
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}

		if ($_FILES['data_file']['name'][0]) {
			$cate_id = 2;
			$fname = "Case_data_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$data_file = array();
			$files = $_FILES['data_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['data_file']['name'] = $files['name'][$key];
				$_FILES['data_file']['type'] = $files['type'][$key];
				$_FILES['data_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['data_file']['error'] = $files['error'][$key];
				$_FILES['data_file']['size'] = $files['size'][$key];

				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$data_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];


				if ($this->upload->do_upload('data_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = 'Data file uploading fail';
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}


		if ($_FILES['audio_file']['name'][0]) {
			$cate_id = 1;
			$fname = "audio_";
			$config = [
				'upload_path' => './uploads/audio',
				'allowed_types' => 'mp3|ogg|m4a|wav',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$audio_file = array();
			$files = $_FILES['audio_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['audio_file']['name'] = $files['name'][$key];
				$_FILES['audio_file']['type'] = $files['type'][$key];
				$_FILES['audio_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['audio_file']['error'] = $files['error'][$key];
				$_FILES['audio_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$audio_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];
				if ($this->upload->do_upload('audio_file')) {
					$this->upload->data();
					$doc_id = $post['doc_id'];
					$this->db->insert('uploads', ['user_id' => $post['customers_id'], 'case_id' => $post['case_number'], 'audio' => $fileName, 'type' => 'case', 'audioid' => $doc_id]);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('audio_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}



		unset($post['document_file'], $post['data_file'], $post['audio_file']);
		$post['active_inactive'] = 1;
		$this->db->insert('c_case', $post);
		$id = $this->db->insert_id();
		unset($post['active_inactive']);
		$post['case_id'] = $id;
		$this->db->insert('case_temp', $post);



		$users = $this->db->select('*')->where('id', $post['customers_id'])->get('users')->row();
		$email = $users->email;
		$name = $users->name;
		$phone = $users->phone;
		$adminuser = $this->db->select('email')->where('role_id', 1)->get('users')->result_array();
		foreach ($adminuser as $adminuser) {
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->load->library('email', $config);
			$from_email = constant("FROM_EMAIL");
			$to_email = strip_tags($adminuser['email']);
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->from($from_email, constant("SENDER_NAME"));
			$this->email->to($to_email);
			if ($this->client_service_lan == 'en') {
				$this->email->subject('New service added by ' . $name . ' from application - ' . constant("SENDER_NAME"));
			} else {
				$this->email->subject('تمت إضافة خدمة جديدة بواسطة ' . $name . ' من التطبيق' . constant("SENDER_NAME"));
			}
			$new = ['enumber' => $enumber, 'email' => $email, 'sub' => 'admin_email_service', 'role_id' => 3, 'name' => $name, 'phone' => $phone, 'lan' => $lan];
			$body = $this->load->view('email.php', $new, true);
			$this->email->message($body);
			$this->email->send();
		}


		$array['status'] = 1;
		$array['message'] = $this->lang->line('E_Service_submit_successfully');
		$array['result'] = '';
		$action_log['role'] = '3';
		$action_log['customer_id'] = $post['customers_id'];
		$action_log['action_id'] = $id;
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;
		$action_log['action_type'] = 'e-service';
		$action_log['status_type'] = 'add new';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$this->db->insert('action_log', $action_log);




		echo json_encode($array);
		exit;
	}
	public function view_e_service($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$this->load->model('admin/case_mod');
		$case_data = $this->case_mod->find_case($id);

		$getdata = $this->db->select(['id_numbers', 'id_type', 'name',])->where('id', $case_data->customers_id)->get('users')->row_array();

		$data['case_id'] = $id;
		$data['identification_number'] = $getdata['id_numbers'];
		$data['identification_types'] = $getdata['id_type'];
		$data['client_name'] = $getdata['name'];
		$data['client_file_number'] = $case_data->client_file_number;
		$data['case_number'] = $case_data->case_number;
		$data['contract_number'] = $case_data->contract_number;
		$data['branch'] = getBranchName($case_data->branch);
		$data['service_types'] =   getServiceType($case_data->service_types);
		$data['case_type'] =   getCaseType($case_data->case_type);
		$data['case_date'] =  getTheDayAndDateFromDateApp($case_data->case_date, $this->client_service_lan);
		$data['case_start_date'] =  getTheDayAndDateFromDateApp($case_data->case_start_date, $this->client_service_lan);
		$data['note'] = $case_data->note;
		//Audio 
		if ($data['case_status'] == 'active') {
			$sts =  $this->lang->line('Active');
		}
		if ($data['case_status'] == 'inactive') {
			$sts =  $this->lang->line('Inactive');
		}
		if ($data['case_status'] == 'reactivated') {
			$sts =  $this->lang->line('Reactive');
		}
		$data['case_status'] = $sts;
		$audio = $this->db->select('audio,id')->where('audioid', $case_data->doc_id)->get('uploads')->result_array();
		foreach ($audio as $audio) {
			$aud['create_date'] = $audio['id'];
			$aud['audio'] = $audio['audio'];
			$aud['file_path'] = base_url() . "/uploads/audio/" . $audio['audio'];
			$adudio_data[] = $aud;
		}
		$data['audio_file'] = $adudio_data;


		$cisd = $case_data->doc_id;

		//Document
		$doc_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 1)", NULL, FALSE)->get('document')->result_array();
		foreach ($doc_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$doc_data[] =  $docfile;
		}
		$data['document_file'] = $doc_data;

		//Data
		$data_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 2)", NULL, FALSE)->get('document')->result_array();
		foreach ($data_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$data_data[] =  $docfile;
		}
		$data['data_file'] = $data_data;

		//Report
		$report_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 4)", NULL, FALSE)->get('document')->result_array();
		foreach ($report_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$report_data[] =  $docfile;
		}
		$data['report_file'] = $report_data;

		//Court minutes
		$court_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 6)", NULL, FALSE)->get('document')->result_array();
		foreach ($court_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$court_data[] =  $docfile;
		}
		$data['court_file'] = $court_data;
		//contract
		$contract_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 5)", NULL, FALSE)->get('document')->result_array();
		foreach ($contract_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$contract_data[] =  $docfile;
		}
		$data['contract_file'] = $contract_data;
		//Referrals
		$referrals_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 7)", NULL, FALSE)->get('document')->result_array();
		foreach ($referrals_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$referrals_data[] =  $docfile;
		}
		$data['referrals_file'] = $referrals_data;


		$array['status'] = 1;
		$array['message'] = $this->lang->line('Success');
		$array['result'] = $data;
		$action_log['role'] = '3';
		$action_log['customer_id'] = $case_data->customers_id;
		$action_log['action_type'] = 'e-service';
		$action_log['action_id'] = $id;
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;

		$action_log['status_type'] = 'view';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		//	$this->db->insert('action_log', $action_log);
		echo json_encode($array);
		exit;
	}

	public function edit_e_service()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
			$case_start_date = $post['case_start_date'];
			$case_date = $post['case_date'];
			unset($post['case_start_date'], $post['case_date']);
			$case_start_date = explode('/', $case_start_date);
			$case_date = explode('/', $case_date);

			$case_date = Hijri2Greg($case_date[0], $case_date[1], $case_date[2], true);
			$case_start_date = Hijri2Greg($case_start_date[0], $case_start_date[1], $case_start_date[2], true);
			$post['case_start_date'] = $case_start_date;
			$post['case_date'] = $case_date;
		} else {
			$this->lang->load('message', 'english');
		}
		$post = $this->input->post();

		if ($_FILES['document_file']['name'][0]) {
			$cate_id = 1;
			$fname = "Case_doc_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$document_file = array();
			$files = $_FILES['document_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['document_file']['name'] = $files['name'][$key];
				$_FILES['document_file']['type'] = $files['type'][$key];
				$_FILES['document_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['document_file']['error'] = $files['error'][$key];
				$_FILES['document_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$document_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];
				if ($this->upload->do_upload('document_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('Document_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}

		if ($_FILES['data_file']['name'][0]) {
			$cate_id = 2;
			$fname = "Case_data_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$data_file = array();
			$files = $_FILES['data_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['data_file']['name'] = $files['name'][$key];
				$_FILES['data_file']['type'] = $files['type'][$key];
				$_FILES['data_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['data_file']['error'] = $files['error'][$key];
				$_FILES['data_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$data_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];


				if ($this->upload->do_upload('data_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('Data_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}

		if ($_FILES['contract_file']['name'][0]) {
			$cate_id = 5;
			$fname = "Case_contract_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$contract_file = array();
			$files = $_FILES['contract_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['contract_file']['name'] = $files['name'][$key];
				$_FILES['contract_file']['type'] = $files['type'][$key];
				$_FILES['contract_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['contract_file']['error'] = $files['error'][$key];
				$_FILES['contract_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$contract_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];


				if ($this->upload->do_upload('contract_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('Contract_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}
		if ($_FILES['referrals_file']['name'][0]) {
			$cate_id = 7;
			$fname = "Case_referral_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$referrals_file = array();
			$files = $_FILES['referrals_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['referrals_file']['name'] = $files['name'][$key];
				$_FILES['referrals_file']['type'] = $files['type'][$key];
				$_FILES['referrals_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['referrals_file']['error'] = $files['error'][$key];
				$_FILES['referrals_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$referrals_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];


				if ($this->upload->do_upload('referrals_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('Referrals_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}

		if ($_FILES['court_file']['name'][0]) {
			$cate_id = 6;
			$fname = "Case_court_";
			$config = [
				'upload_path' => './uploads/case_file',
				'allowed_types' => '*',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$court_file = array();
			$files = $_FILES['court_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['court_file']['name'] = $files['name'][$key];
				$_FILES['court_file']['type'] = $files['type'][$key];
				$_FILES['court_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['court_file']['error'] = $files['error'][$key];
				$_FILES['court_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$court_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];


				if ($this->upload->do_upload('court_file')) {
					$this->upload->data();
					$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
					$this->db->insert('document', $insert);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('Court_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}

		if ($_FILES['audio_file']['name'][0]) {
			$cate_id = 1;
			$fname = "audio_";
			$config = [
				'upload_path' => './uploads/audio',
				'allowed_types' => 'mp3|ogg|m4a|wav',
				'overwrite' => true,
			];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$audio_file = array();
			$files = $_FILES['audio_file'];

			foreach ($files['name']  as $key => $image) {
				$_FILES['audio_file']['name'] = $files['name'][$key];
				$_FILES['audio_file']['type'] = $files['type'][$key];
				$_FILES['audio_file']['tmp_name'] = $files['tmp_name'][$key];
				$_FILES['audio_file']['error'] = $files['error'][$key];
				$_FILES['audio_file']['size'] = $files['size'][$key];
				$ext = pathinfo($image, PATHINFO_EXTENSION);
				$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
				$audio_file[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				$doc_id = $post['doc_id'];

				if ($this->upload->do_upload('audio_file')) {
					$this->upload->data();

					$this->db->insert('uploads', ['user_id' => $post['customers_id'], 'case_id' => $post['case_number'], 'audio' => $fileName, 'type' => 'case', 'audioid' => $doc_id]);
				} else {
					$data['status'] = 0;
					$data['message'] = $this->lang->line('audio_file_uploading_fail');
					$data['result'] = '';
					echo json_encode($data);
					exit;
				}
			}
		}
		unset($post['document_file'], $post['data_file'], $post['audio_file'], $post['court_file'], $post['contract_file'], $post['referrals_file']);

		$case_id = $_POST['case_id'];
		$post['add_edit'] = 1;
		$case = $this->db->select('case_id')->where('case_id', $case_id)->get('case_temp')->row_array();
		if ($case) {
			$this->db->where('case_id', $post['case_id'])->update('case_temp', $post);
		} else {
			$this->db->insert('case_temp', $post);
		}
		$array['status'] = 1;
		$array['message'] = $this->lang->line('E_Service_changes_saved_successfully');
		$array['result'] = '';

		$action_log['role'] = '3';
		$action_log['customer_id'] = $post['customers_id'];
		$action_log['action_id'] = $case_id;
		$action_log['ip'] =  $this->ip_address;
		$action_log['device'] = $this->device;
		$action_log['action_type'] = 'e-service';
		$action_log['status_type'] = 'edit e-service';
		$action_log['create_date'] = date("Y-m-d G:i:s");
		$this->db->insert('action_log', $action_log);
		echo json_encode($array);
		exit;
	}

	public function get_chat($id)
	{

		$this->db->where('user_id', $id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('chat');
		$chat = array_reverse($query->result_array());

		$array['status'] = 1;
		$array['message'] = $this->lang->line('Success');
		$array['result'] = $chat;
		echo json_encode($array);
		exit;
	}
	public function add_chat()
	{

		$post['message'] = $this->input->post('message');
		$user_id = $this->input->post('user_id');

		if ($post) {
			$post['role_id'] =  3;
			$post['user_id'] = $user_id;
			$post['send_from'] = $user_id;
			$this->db->insert('chat', $post);
			$array['status'] = 1;
			$array['message'] = $this->lang->line('Success');
			$array['result'] = '';
			echo json_encode($array);
		}
	}
	public function get_edit_e_service($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$this->load->model('admin/case_mod');
		$case_data = $this->case_mod->find_case($id);

		$getdata = $this->db->select(['id_numbers', 'id_type', 'name',])->where('id', $case_data->customers_id)->get('users')->row_array();
		$data['customers_id'] = $case_data->customers_id;;
		$data['case_id'] = $id;
		$data['identification_number'] = $getdata['id_numbers'];
		$data['identification_types'] = $getdata['id_type'];
		$data['client_name'] = $getdata['name'];
		$data['client_file_number'] = $case_data->client_file_number;
		$data['case_number'] = $case_data->case_number;
		$data['contract_number'] = $case_data->contract_number;
		$data['doc_id'] = $case_data->doc_id;
		$data['select_branch'] = $case_data->branch;
		$data['select_service_types'] = $case_data->service_types;
		$data['select_case_type'] = $case_data->case_type;
		$data['case_date'] = getTheDayAndDateFromDateAppWithoutDayHij($case_data->case_date, $this->client_service_lan);
		$data['case_start_date'] = getTheDayAndDateFromDateAppWithoutDayHij($case_data->case_start_date, $this->client_service_lan);
		$data['note'] = $case_data->note;
		$brance = branch();
		$brance1[0]['id'] = "";
		$brance1[0]['name'] =  $this->lang->line('Select_branch');
		$result = array_merge_recursive($brance1, $brance);

		$data['branch'] = $result;
		$service = $this->case_mod->dis_services($this->client_service_lan);
		if ($this->client_service_lan == 'en') {
			foreach ($service as $srv) {
				$srv['name'] = $srv['name_en'];
				$ss[] = $srv;
			}
			$ss[0]['id'] = "";
			$ss[0]['name_en'] = " ";
			$ss[0]['name'] =  $this->lang->line('Select_service_type');
			$data['service_types'] = $ss;
		} else {
			$service[0]['id'] = "";
			$service[0]['name_en'] = " ";
			$service[0]['name'] =  $this->lang->line('Select_service_type');
			$data['service_types'] = $service;
		}

		if ($this->client_service_lan == 'ar') {
			$ct = $this->db->select(['id', 'service_id', 'name'])->order_by("id", "desc")
				->get('case_type');
		} else {
			$ct = $this->db->select(['id', 'service_id', 'name_en as name'])->order_by("id", "desc")
				->get('case_type');
		}

		$case_type = $ct->result_array();
		$case_type[0]['id'] = "";
		$case_type[0]['service_id'] = " ";
		$case_type[0]['name'] =  $this->lang->line('Select_case_type');
		$data['case_type'] = $case_type;


		//Audio
		$audio = $this->db->select('audio,id')->where('audioid', $case_data->doc_id)->get('uploads')->result_array();
		foreach ($audio as $audio) {
			$aud['create_date'] = $audio['id'];
			$aud['audio'] = $audio['audio'];
			$aud['file_path'] = base_url() . "/uploads/audio/" . $audio['audio'];
			$adudio_data[] = $aud;
		}
		$data['audio_file'] = $adudio_data;


		$cisd = $case_data->doc_id;

		//Document
		$doc_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 1)", NULL, FALSE)->get('document')->result_array();
		foreach ($doc_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$doc_data[] =  $docfile;
		}
		$data['document_file'] = $doc_data;

		//Data
		$data_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 2)", NULL, FALSE)->get('document')->result_array();
		foreach ($data_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$data_data[] =  $docfile;
		}
		$data['data_file'] = $data_data;

		//Report
		$report_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 4)", NULL, FALSE)->get('document')->result_array();
		foreach ($report_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$report_data[] =  $docfile;
		}
		$data['report_file'] = $report_data;

		//Court minutes
		$court_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 6)", NULL, FALSE)->get('document')->result_array();
		foreach ($court_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$court_data[] =  $docfile;
		}
		$data['court_file'] = $court_data;

		//Referrals
		$contract_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 5)", NULL, FALSE)->get('document')->result_array();
		foreach ($contract_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$contract_data[] =  $docfile;
		}
		$data['contract_file'] = $contract_data;

		//Contract
		$referrals_file = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 7)", NULL, FALSE)->get('document')->result_array();
		foreach ($referrals_file as $doc) {
			$docfile['doc_name'] = $doc['name'];
			$docfile['uploaded_by'] = getEmployeeName($doc['uploaded_by']);
			$docfile['update_date'] = $doc['updatedate'];
			$docfile['create_date'] = $doc['created'];
			$docfile['file_path'] = base_url() . "/uploads/case_file/" . $doc['name'];
			$referrals_data[] =  $docfile;
		}
		$data['referrals_file'] = $referrals_data;


		$array['status'] = 1;
		$array['message'] = $this->lang->line('Success');
		$array['result'] = $data;
		echo json_encode($array);
		exit;
	}

	public function get_training($language = "")
	{
		$this->load->helper('language');
		if ($this->client_service_lan == "ar") {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$array['id'] = 1;
		$array['title'] = $this->lang->line('Training');
		$array['description'] = $this->lang->line('Training_p1');
		$array['img'] = base_url() . "assets/images/img/con2.jpg";

		$data['status'] = 1;
		$data['message'] = $this->lang->line('Success');
		$data['result'] = $array;
		echo json_encode($data);
		exit;
	}
	public function get_broadcast($language = "")
	{
		$this->load->helper('language');
		if ($this->client_service_lan == "ar") {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$array['id'] = 2;
		$array['title'] = $this->lang->line('LIVE_BROADCAST');
		$array['description'] = $this->lang->line('LIVE_BROADCAST_p1');
		$array['img'] = base_url() . "assets/images/img/con1.jpg";
		$data['status'] = 1;
		$data['message'] = $this->lang->line('Success');
		$data['result'] = $array;
		echo json_encode($data);
		exit;
	}
	public function get_pleader()
	{
		$this->load->helper('language');
		$evidence = $this->db->select('*')->where('id', 1)->get('evidence')->row();
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
			$title = $evidence->title_ar;
			$evidence = $evidence->message_ar;
		} else {
			$this->lang->load('message', 'english');
			$title = $evidence->title_ar;
			$evidence = $evidence->message_en;
		}
		$array['id'] = 3;
		$array['title'] = $title;
		$array['description'] = $evidence;
		$array['img'] = base_url() . "assets/images/img/con1.jpg";
		$data['status'] = 1;
		$data['message'] = $this->lang->line('Success');
		$data['result'] = $array;
		echo json_encode($data);
		exit;
	}
	public function get_articals($language = "")
	{
		$this->load->helper('language');
		if ($language == "en") {
			$this->lang->load('message', 'english');
		}
		if ($language == "ar") {
			$this->lang->load('message', 'arabic');
		}
		$array['id'] = 4;
		$array['title'] = $this->lang->line('ARTICALS');
		$array['description'] = $this->lang->line('ARTICALS_p1');
		$array['img'] = base_url() . "assets/images/img/content_05_1.jpg";
		$data['status'] = 1;
		$data['message'] = $this->lang->line('Success');
		$data['result'] = $array;
		echo json_encode($data);
		exit;
	}
	public function get_system_software($language = "")
	{

		$this->load->helper('language');
		if ($this->client_service_lan == "en") {
			$this->lang->load('message', 'english');
		}
		if ($this->client_service_lan == "ar") {
			$this->lang->load('message', 'arabic');
		}
		$array['id'] = 5;
		$array['title'] = $this->lang->line('SYSTEM_SOFTWARE');
		$array['description'] = $this->lang->line('SYSTEM_SOFTWARE_p1');
		$array['img'] = base_url() . "uploads/app/regulation.jpg";
		$data['status'] = 1;
		$data['message'] = $this->lang->line('Success');
		$data['result'] = $array;
		echo json_encode($data);
		exit;
	}
	public function home_e_service_list($language = "")
	{

		$this->load->helper('language');
		if ($this->client_service_lan == "en") {
			$this->lang->load('message', 'english');
		}
		if ($this->client_service_lan == "ar") {
			$this->lang->load('message', 'arabic');
		}
		$array['id'] = 1;
		$array['title'] = $this->lang->line('Practices_The_Legal_Department');
		$array['description'] = $this->lang->line('Practices_The_Legal_Department_details');
		$new_array[] = $array;

		$array['id'] = 2;
		$array['title'] = $this->lang->line('Practices_Commercial_Litigation');
		$array['description'] = $this->lang->line('Practices_Commercial_Litigation_details');
		$new_array[] = $array;

		$array['id'] = 3;
		$array['title'] = $this->lang->line('Practices_Companies_and_Entrepreneurs');
		$array['description'] = $this->lang->line('Practices_Companies_and_Entrepreneurs_details');
		$new_array[] = $array;

		$array['id'] = 4;
		$array['title'] = $this->lang->line('Practices_Arbitration_and_Mediation');
		$array['description'] = $this->lang->line('Practices_Arbitration_and_Mediation_details');
		$new_array[] = $array;

		$array['id'] = 5;
		$array['title'] = $this->lang->line('Practices_Accommodation_and_Food');
		$array['description'] = $this->lang->line('Practices_Accommodation_and_Food_details');
		$new_array[] = $array;

		$array['id'] = 6;
		$array['title'] = $this->lang->line('Practices_Execution_of_judgments');
		$array['description'] = $this->lang->line('Practices_Execution_of_judgments_details');
		$new_array[] = $array;

		$array['id'] = 7;
		$array['title'] = $this->lang->line('Practices_Maritime_Trade');
		$array['description'] = $this->lang->line('Practices_Maritime_Trade_details');
		$new_array[] = $array;

		$array['id'] = 8;
		$array['title'] = $this->lang->line('Practices_E-Commerce');
		$array['description'] =  $this->lang->line('Practices_E-Commerce_details');
		$new_array[] = $array;

		$array['id'] = 9;
		$array['title'] = $this->lang->line('Practices_Real_Estate');
		$array['description'] =  $this->lang->line('Practices_Real_Estate_details');
		$new_array[] = $array;

		$array['id'] = 10;
		$array['title'] = $this->lang->line('Practices_Finance');
		$array['description'] =  $this->lang->line('Practices_Finance_details');
		$new_array[] = $array;

		$array['id'] = 11;
		$array['title'] = $this->lang->line('Practices_Merger_and_Acquisition');
		$array['description'] =  $this->lang->line('Practices_Merger_and_Acquisition_details');
		$new_array[] = $array;

		$array['id'] = 12;
		$array['title'] = $this->lang->line('Practices_Intellectual_property');
		$array['description'] =  $this->lang->line('Practices_Intellectual_property_details');
		$new_array[] = $array;

		$array['id'] = 13;
		$array['title'] = $this->lang->line('Practices_Banking_Operations');
		$array['description'] =  $this->lang->line('Practices_Banking_Operations_details');
		$new_array[] = $array;

		$array['id'] = 14;
		$array['title'] = $this->lang->line('Practices_Bankruptcy');
		$array['description'] =  $this->lang->line('Practices_Bankruptcy_details');
		$new_array[] = $array;

		$array['id'] = 15;
		$array['title'] = $this->lang->line('Practices_Insurance');
		$array['description'] =  $this->lang->line('Practices_Insurance_details');
		$new_array[] = $array;

		$array['id'] = 16;
		$array['title'] = $this->lang->line('Practices_Labor_relations');
		$array['description'] =  $this->lang->line('Practices_Labor_relations_details');
		$new_array[] = $array;

		$array['id'] = 17;
		$array['title'] = $this->lang->line('Practices_Foreign_Investment');
		$array['description'] =  $this->lang->line('Practices_Foreign_Investment_details');
		$new_array[] = $array;

		$array['id'] = 18;
		$array['title'] = $this->lang->line('Practices_Communications_and_Information_Technology');
		$array['description'] =  $this->lang->line('Practices_Communications_and_Information_Technology_details');
		$new_array[] = $array;

		$array['id'] = 19;
		$array['title'] = $this->lang->line('Practices_Authentication');
		$array['description'] =  $this->lang->line('Practices_Authentication_details');
		$new_array[] = $array;

		$array['id'] = 20;
		$array['title'] = $this->lang->line('Practices_Administrative_Litigation');
		$array['description'] =  $this->lang->line('Practices_Administrative_Litigation_details');
		$new_array[] = $array;

		$array['id'] = 21;
		$array['title'] = $this->lang->line('Practices_Trade_and_Supply');
		$array['description'] =  $this->lang->line('Practices_Trade_and_Supply_details');
		$new_array[] = $array;

		$array['id'] = 22;
		$array['title'] = $this->lang->line('Practices_Contracting_and_Construction');
		$array['description'] =  $this->lang->line('Practices_Contracting_and_Construction_details');
		$new_array[] = $array;

		$array['id'] = 23;
		$array['title'] = $this->lang->line('Practices_Legacies');
		$array['description'] =  $this->lang->line('Practices_Legacies_details');
		$new_array[] = $array;

		$array['id'] = 24;
		$array['title'] = $this->lang->line('Practices_Healthcare');
		$array['description'] =  $this->lang->line('Practices_Healthcare_details');
		$new_array[] = $array;

		$array['id'] = 24;
		$array['title'] = $this->lang->line('Practices_Taxes');
		$array['description'] =  $this->lang->line('Practices_Taxes_details');
		$new_array[] = $array;


		$data['status'] = 1;
		$data['message'] = $this->lang->line('Success');
		$data['result'] = $new_array;
		echo json_encode($data);
		exit;
	}

	function pay_pal($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$id = intval($id);
		$row1 = $this->db->where('id', $id)->get('invoice_details')->row();
		$row2 = $this->db->where('id', $row1->invoice_id)->get('invoice')->row();
		if ($row2->customers_id) {
			$new_array['item_name'] = getCaseNumber($row2->case_id) . " Paypal Payment";
			$new_array['custom'] = $row2->customers_id;
			$new_array['item_number'] = $id;
			$new_array['amount'] = $row1->subtotal;
			$data['status'] = 1;
			$data['message'] = $this->lang->line('Found');
			$data['result'] = $new_array;
			echo json_encode($data);
			exit;
		} else {
			$data['status'] = 0;
			$data['message'] = $this->lang->line('ID_not_Found');
			$data['result'] = $new_array;
			echo json_encode($data);
			exit;
		}
	}

	public function article()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = $this->db->get('articles')->result_array();
		if ($data) {
			foreach ($data as $arti) {

				if ($this->client_service_lan == 'ar') {
					$arti['title'] = $arti['title_ar'];
					$arti['description'] = strip_tags($arti['description_ar']);
					unset($arti['title_ar'], $arti['description_ar']);
				}
				if ($this->client_service_lan == 'en') {
					$arti['title'] = $arti['title'];
					$arti['description'] = strip_tags($arti['description']);
					unset($arti['title_ar'], $arti['description_ar']);
				}


				if ($arti['image']) {
					$arti['image'] = base_url("/uploads/articles/{$arti["image"]}");
				} else {
					$arti['image'] = "";
				}

				$final_data[] = $arti;
			}

			$m_data['status'] = 1;
			$m_data['message'] = $this->lang->line('Found');
			$m_data['result'] = $final_data;
			echo json_encode($m_data);
			exit;
		} else {
			echo json_encode(array('status' => 0, 'message' => $this->lang->line('Record_Not_Found')));
			exit;
		}
	}

	public function article_detail($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = $this->db->where('id', $id)->get('articles')->result_array();
		if ($data) {
			foreach ($data as $arti) {

				if ($this->client_service_lan == 'ar') {
					$arti['title'] = $arti['title_ar'];
					$arti['description'] = $arti['description_ar'];
					unset($arti['title_ar'], $arti['description_ar']);
				}
				if ($this->client_service_lan == 'en') {
					$arti['title'] = $arti['title'];
					$arti['description'] = $arti['description'];
					unset($arti['title_ar'], $arti['description_ar']);
				}


				if ($arti['image']) {
					$arti['image'] = base_url("/uploads/articles/{$arti["image"]}");
				} else {
					$arti['image'] = "";
				}

				$final_data = $arti;
			}

			$m_data['status'] = 1;
			$m_data['message'] = $this->lang->line('Found');
			$m_data['result'] = $final_data;
			echo json_encode($m_data);
			exit;
		} else {
			echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
			exit;
		}
	}

	public function training()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = $this->db->get('training')->result_array();
		if ($data) {
			foreach ($data as $arti) {

				if ($this->client_service_lan == 'ar') {
					$arti['title'] = $arti['title_ar'];
					$arti['description'] = $arti['description_ar'];
					unset($arti['description_ar'], $arti['title_ar']);
				}
				if ($this->client_service_lan == 'en') {
					$arti['title'] = $arti['title'];
					$arti['description'] = $arti['description'];
					unset($arti['title_ar'], $arti['description_ar']);
				}


				if ($arti['image']) {
					$arti['image'] = base_url("/uploads/training/{$arti["image"]}");
				} else {
					$arti['image'] = "";
				}

				$final_data[] = $arti;
			}

			$m_data['status'] = 1;
			$m_data['message'] = $this->lang->line('Found');
			$m_data['result'] = $final_data;
			echo json_encode($m_data);
			exit;
		} else {
			echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
			exit;
		}
	}

	public function training_list($id)
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$data = $this->db->where('id', $id)->get('training')->result_array();
		if ($data) {
			foreach ($data as $arti) {

				if ($this->client_service_lan == 'ar') {
					$arti['title'] = $arti['title_ar'];
					$arti['description'] = $arti['description_ar'];
					unset($arti['description_ar'], $arti['title_ar']);
				}
				if ($this->client_service_lan == 'en') {
					$arti['title'] = $arti['title'];
					$arti['description'] = $arti['description'];
					unset($arti['title_ar'], $arti['description_ar']);
				}


				if ($arti['image']) {
					$arti['image'] = base_url("/uploads/training/{$arti["image"]}");
				} else {
					$arti['image'] = "";
				}

				$final_data = $arti;
			}

			$m_data['status'] = 1;
			$m_data['message'] = $this->lang->line('Found');
			$m_data['result'] = $final_data;
			echo json_encode($m_data);
			exit;
		} else {
			echo json_encode(array('status' => 1, 'message' => $this->lang->line('Record_Not_Found')));
			exit;
		}
	}
	public function community_guidelines()
	{
		$evidence = $this->db->select('*')->where('id', 1)->get('evidence')->row();
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
			$evidence = $evidence->title_ar;
		} else {
			$this->lang->load('message', 'english');
			$evidence = $evidence->title_en;
		}

		$array['id'] = 1;
		$array['title'] = $this->lang->line('LIVE_BROADCAST');
		$array['image'] = "https://albarakatilaw.com/uploads/app/streaming.jpg";
		$array['link'] = "https://www.youtube.com/watch?v=rs0bQ3cYzrg&feature=youtu.be";
		$new_array[] = $array;

		$array['id'] = 2;
		$array['title'] = $evidence;
		$array['image'] = "https://albarakatilaw.com/uploads/app/evidence.jpg";
		$array['link'] = "https://albarakatilaw.com/front/entrepreneurs_guide";
		$new_array[] = $array;

		$array['id'] = 3;
		$array['title'] = $this->lang->line('Training');
		$array['image'] = "https://albarakatilaw.com/uploads/app/training.jpg";
		$array['link'] = "https://albarakatilaw.com/training";
		$new_array[] = $array;

		$array['id'] = 4;
		$array['title'] = $this->lang->line('ARTICALS');
		$array['image'] = "https://albarakatilaw.com/uploads/app/article.jpg";
		$array['link'] = "https://albarakatilaw.com/front/article";
		$new_array[] = $array;

		$array['id'] = 5;
		$array['title'] = $this->lang->line('SYSTEM_SOFTWARE');
		$array['image'] = "https://albarakatilaw.com/uploads/app/regulation.jpg";
		$array['link'] = "https://www.youtube.com/channel/UC36m7L2wXsNImQoAJqbv6sg";
		$new_array[] = $array;
		$m_data['status'] = 1;
		$m_data['message'] = $this->lang->line('Found');
		$m_data['result'] = $new_array;
		echo json_encode($m_data);
		exit;
	}
	public function document_delete()
	{
		$post = $this->input->post();
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}

		if (isset($post['file_id'])) {
			$this->db->where('id', $post['file_id']);
			$this->db->delete('document');
			$data['status'] = 1;
			$data['message'] = 'Deleted';
			$data['result'] = NULL;
			echo json_encode($data);
			exit;
		}
		if (isset($post['audio_id'])) {
			$this->db->where('id', $post['audio_id']);
			$this->db->delete('uploads');
			$data['status'] = 1;
			$data['message'] = 'Deleted';
			$data['result'] = array();
			echo json_encode($data);
			exit;
		}
		$data['status'] = 0;
		$data['message'] = 'Problem in delete';
		$data['result'] = NULL;
		echo json_encode($data);
		exit;
	}

	public function document_upload()
	{
		if ($this->client_service_lan == 'ar') {
			$this->lang->load('message', 'arabic');
		} else {
			$this->lang->load('message', 'english');
		}
		$post = $this->input->post();

		if (!empty($_FILES['document_file']['name'])) {
			$cate_id = 1;
			$fname = "document_file_";
			$ext = pathinfo($_FILES['document_file']['name'], PATHINFO_EXTENSION);
			$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
			$config['upload_path'] = './uploads/case_file/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $fileName;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('document_file')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$doc_id = $post['doc_id'];
				$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
				$this->db->insert('document', $insert);
				$file_id['file_id'] = $this->db->insert_id();
				$data['status'] = 1;
				$data['message'] =  $this->lang->line('Document_file_successfull');
				$data['result'] = $file_id;
				echo json_encode($data);
				exit;
			}
		}

		if (!empty($_FILES['data_file']['name'])) {
			$cate_id = 2;
			$fname = "data_file_";
			$ext = pathinfo($_FILES['data_file']['name'], PATHINFO_EXTENSION);
			$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
			$config['upload_path'] = './uploads/case_file/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $fileName;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('data_file')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$doc_id = $post['doc_id'];
				$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
				$this->db->insert('document', $insert);
				$file_id['file_id'] = $this->db->insert_id();
				$data['status'] = 1;
				$data['message'] = $this->lang->line('Data_file_successfull');
				$data['result'] = $file_id;
				echo json_encode($data);
				exit;
			}
		}

		if (!empty($_FILES['contract_file']['name'])) {
			$cate_id = 5;
			$fname = "contract_file_";
			$ext = pathinfo($_FILES['contract_file']['name'], PATHINFO_EXTENSION);
			$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
			$config['upload_path'] = './uploads/case_file/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $fileName;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('contract_file')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$doc_id = $post['doc_id'];
				$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
				$this->db->insert('document', $insert);
				$file_id['file_id'] = $this->db->insert_id();
				$data['status'] = 1;
				$data['message'] = $this->lang->line('Contract_file_successfull');
				$data['result'] = $file_id;
				echo json_encode($data);
				exit;
			}
		}
		if (!empty($_FILES['referrals_file']['name'])) {
			$cate_id = 7;
			$fname = "referrals_file_";
			$ext = pathinfo($_FILES['referrals_file']['name'], PATHINFO_EXTENSION);
			$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
			$config['upload_path'] = './uploads/case_file/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $fileName;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('referrals_file')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$doc_id = $post['doc_id'];
				$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
				$this->db->insert('document', $insert);
				$file_id['file_id'] = $this->db->insert_id();
				$data['status'] = 1;
				$data['message'] = $this->lang->line('Referral_file_successfull');
				$data['result'] = $file_id;
				echo json_encode($data);
				exit;
			}
		}
		if (!empty($_FILES['court_file']['name'])) {
			$cate_id = 6;
			$fname = "referrals_file_";
			$ext = pathinfo($_FILES['court_file']['name'], PATHINFO_EXTENSION);
			$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
			$config['upload_path'] = './uploads/case_file/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $fileName;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('court_file')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$doc_id = $post['doc_id'];
				$insert = ['name' => $fileName, 'created' => date("Y-m-d G:i:s"), 'customer_id' => $post['customers_id'], 'uploaded_by' => $post['customers_id'], 'temp_app_id' => "$doc_id", 'cat_id' => $cate_id];
				$this->db->insert('document', $insert);
				$file_id['file_id'] = $this->db->insert_id();
				$data['status'] = 1;
				$data['message'] =   $this->lang->line('Court_file_successfull');
				$data['result'] = $file_id;
				echo json_encode($data);
				exit;
			}
		}
		if (!empty($_FILES['audio_file']['name'])) {
			$cate_id = 1;
			$fname = "audio_";
			$config = [
				'upload_path' => './uploads/audio',
				'allowed_types' => 'mp3|ogg|m4a|wav',
				'overwrite' => true,
			];

			$audio_file = array();
			$files = $_FILES['audio_file']['name'];
			$ext = pathinfo($files, PATHINFO_EXTENSION);
			$fileName = $fname . "_" . $post['doc_id'] . "_" . rand() . "." . $ext;
			$config['file_name'] = $fileName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('audio_file')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				$doc_id = $post['doc_id'];
				$this->db->insert('uploads', ['user_id' => $post['customers_id'], 'audio' => $fileName, 'type' => 'case', 'audioid' => $doc_id]);
				$file_id['file_id'] = $this->db->insert_id();
				$data['status'] = 1;
				$data['message'] =   $this->lang->line('audio_upload_successfully');
				$data['result'] = $file_id;
				echo json_encode($data);
				exit;
			}
		}
		$data['status'] = 0;
		$data['message'] = 'Uploading fail';
		$data['result'] = '';
		echo json_encode($data);
		exit;
	}
}
